# Hướng dẫn import Sản phẩm chính + Variants (POD)

Tài liệu thao tác cho hệ thống/API import bên ngoài theme, dựa trên kiến trúc
đã chốt & code xong ở [`pod-variants-plan.md`](./pod-variants-plan.md). Đọc file
đó nếu cần hiểu *tại sao* thiết kế thế này; file này chỉ tập trung **làm sao để
import** một sản phẩm + biến thể của nó vào site.

Quy trình gồm 4 bước, theo đúng thứ tự:

1. Tạo **sản phẩm chính** (WC simple product) qua WooCommerce REST API.
2. Đảm bảo **Size** + bảng phụ phí size đã tồn tại (chỉ làm 1 lần, không phải
   mỗi sản phẩm).
3. Import **variants** (Style × Color, giá, ảnh, sku) qua REST endpoint riêng
   của theme.
4. (Chỉ khi ghi thẳng DB, bỏ qua nếu đã dùng bước 3) gọi **sync giá**.

---

## 0. Auth cần chuẩn bị trước

**Chỉ 1 cơ chế auth duy nhất cho cả 3 endpoint** — WooCommerce Consumer
Key/Secret (WooCommerce > Settings > Advanced > REST API, tạo key với quyền
tối thiểu **Read/Write**), user gắn với key đó phải có quyền `edit_products`
(vd. Shop Manager trở lên):

| Việc | Endpoint |
|---|---|
| Tạo sản phẩm chính | `wc/v3/products` (REST API chuẩn của WooCommerce) |
| Import variants | `wc-pod/v1/products/{id}/variants` (theme tự đăng ký) |
| Sync giá thủ công | `wc-pod/v1/products/{id}/sync` (theme tự đăng ký) |

2 endpoint riêng của theme nằm trong
[`inc/pod-variants/rest-api.php`](../inc/pod-variants/rest-api.php), đăng ký
dưới namespace **`wc-pod/v1`** (không phải `pod/v1`) — tiền tố `wc-` là quy
ước của chính WooCommerce để cơ chế xác thực Consumer Key/Secret của nó
(`WC_REST_Authentication`) nhận diện và authenticate route của bên thứ ba;
class đó chỉ tự kích hoạt cho route bắt đầu bằng `wc/` hoặc `wc-`, nên nếu để
`pod/v1` như ban đầu thì consumer key/secret sẽ **không** xác thực được
(request tới với user rỗng → `403`). Chọn `wc-` thay vì đăng ký thẳng thêm
route vào namespace `wc/v3` để tránh đụng namespace controller gốc của
WooCommerce.

**Basic Auth (Consumer Key làm username, Secret làm password) chỉ hoạt động
qua HTTPS** (`is_ssl()` bắt buộc) — nếu site chạy HTTP thuần (vd. local dev
qua Docker không có TLS), phải dùng OAuth1.0a signature thay vì Basic Auth
thô; xem tài liệu WooCommerce REST API Authentication.

---

## 1. Tạo sản phẩm chính

Dùng WooCommerce REST API chuẩn (không phải code riêng của theme) — sản phẩm
POD **luôn là 1 simple product**, không tạo variation con:

```bash
curl -X POST "https://<site>/wp-json/wc/v3/products" \
  -u "<consumer_key>:<consumer_secret>" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Vintage Sunset Tee",
    "type": "simple",
    "status": "publish",
    "regular_price": "19.99",
    "categories": [{"id": 42}],
    "images": [{"src": "https://cdn.example.com/mockup-main.jpg"}]
  }'
```

Response trả về `id` — chính là `product_id` dùng ở bước 3.

**Lưu ý quan trọng:**

- **`images` ở đây bắt buộc phải có ít nhất 1 ảnh** dù ở bước 3 ảnh variant là
  link ngoài site không qua Media Library. Lý do: card sản phẩm ở trang Shop
  (`woocommerce/content-product.php`) dùng
  `$product->get_image_id()` — tức ảnh đại diện WC chuẩn (Media Library) —
  **không** đọc `wp_pod_variants.image_urls`. Ảnh variant chỉ được dùng ở
  trang single product (gallery theo Style/Color đã chọn). Bỏ qua bước này →
  card ở trang Shop hiển thị ảnh placeholder mặc định của WooCommerce.
- `regular_price` gửi ở đây sẽ bị **ghi đè ngay** khi bước 3/4 chạy
  `pod_sync_product_price()` (tự set = giá thấp nhất trong các variant
  active) — điền giá tạm bất kỳ (vd. `"0.01"`) cũng được, không cần tính
  trước giá thật.
- `categories`/mô tả/SEO fields khác set theo nhu cầu, không liên quan tới hệ
  thống POD.

---

## 2. Size + bảng phụ phí size (chỉ 1 lần, không lặp lại theo sản phẩm)

Khác với Style/Color, **Size và phụ phí Size KHÔNG có REST endpoint** — bảng
`wp_pod_sizes` + `wp_pod_size_prices` chỉ ~8 style × 8 size ≈ 64 dòng dùng
chung cho toàn site, quản lý qua UI **WooCommerce > POD Variants** trong
wp-admin (3 tab Type/Color/Size).

**Trước khi import lô sản phẩm đầu tiên**, phải đảm bảo trong wp-admin đã có:

1. Các **Size** cần dùng (S, M, L, XL, 2XL...) — tab *Size*.
2. Với **mỗi Type** (Style) sẽ import ở bước 3, có đủ dòng phụ phí trong
   `wp_pod_size_prices` cho các size hợp lệ của type đó — hiện chưa có UI
   riêng cho ma trận này qua trang settings 3-tab, cần thao tác trực tiếp
   (SQL hoặc metabox theo từng sản phẩm, xem mục 11 trong
   `pod-variants-plan.md`).

**Vì sao bước này quan trọng:** nếu Type mới được auto-tạo ở bước 3 (theo tên,
xem bên dưới) mà chưa có dòng nào trong `wp_pod_size_prices` cho type đó, thì
**không có size nào hợp lệ để chọn** — front-end sẽ ẩn hết size, khách không
add-to-cart được (server cũng chặn ở
`woocommerce_add_to_cart_validation` nếu tổ hợp type+size không tồn tại
trong bảng phụ phí). Tạo Type mới qua tên lạ ở bước 3 mà quên bước này là lỗi
import phổ biến nhất.

---

## 3. Import variants (Style × Color)

```
POST /wp-json/wc-pod/v1/products/{product_id}/variants
Authorization: Basic <base64(consumer_key:consumer_secret)>
Content-Type: application/json
```

```json
{
  "variants": [
    {
      "type": "T Shirt",
      "color": "Black",
      "price": 19.99,
      "sale_price": 15.99,
      "sku": "VST-001-TSH-BLK",
      "image_urls": [
        "https://cdn.example.com/vst-001/tshirt-black-1.jpg",
        "https://cdn.example.com/vst-001/tshirt-black-2.jpg"
      ],
      "is_active": true
    },
    {
      "type": "Hoodie",
      "color": "Navy Blue",
      "price": 34.99,
      "sku": "VST-001-HOOD-NAVY",
      "image_urls": ["https://cdn.example.com/vst-001/hoodie-navy-1.jpg"]
    }
  ]
}
```

### Field spec

| Field | Bắt buộc | Ghi chú |
|---|---|---|
| `type` | **có** | Tên Type (Style), vd. `"T Shirt"` — **không phải slug**. Không phân biệt hoa/thường khi match. Chưa tồn tại → tự tạo mới (slug = `sanitize_title(name)`). Sau khi tạo mới **nhớ set phụ phí size cho type đó** (mục 2) và có thể cần sửa `sort_order`/size chart trong wp-admin. |
| `color` | **có** | Tương tự `type`, nhưng cho Color. Auto-tạo không có `hex_code` (NULL) — vào wp-admin gán màu swatch sau nếu cần. |
| `price` | **có** | Giá gốc của tổ hợp Style+Color này (chưa cộng phụ phí size). Phải `> 0`, ngược lại cả item bị từ chối (`invalid_fields`). |
| `sale_price` | không | Bỏ qua hoặc gửi `null` → không giảm giá. |
| `sku` | không | Bỏ trống → tự sinh `POD-{product_id}-{type_id}-{color_id}`. |
| `image_urls` | không | Mảng URL **ngoài site** (không phải Media Library) — phần tử đầu là ảnh chính hiển thị khi khách chọn tổ hợp Style+Color này. |
| `is_active` | không | Mặc định `true`. Set `false` để ẩn tổ hợp mà không xoá (vd. hết hàng phôi). |

**Giới hạn:** tối đa 500 phần tử/request — sản phẩm nào có nhiều hơn thì chia
làm nhiều request (endpoint là upsert theo khoá `(product_id, type_id,
color_id)` nên gọi nhiều lần không sao, lần sau ghi đè lần trước cho cùng tổ
hợp).

**Toàn bộ dòng bị ghi đè, không phải patch từng field** — gọi lại cho tổ hợp
Style+Color đã tồn tại mà không gửi `image_urls`/`sale_price` thì 2 field đó
bị xoá về rỗng/null. Muốn cập nhật 1 field, vẫn phải gửi đủ toàn bộ variant.

### Response

```json
{
  "product_id": 123,
  "results": [
    {"index": 0, "id": 501, "type": "T Shirt", "color": "Black", "status": "created"},
    {"index": 1, "id": 502, "type": "Hoodie", "color": "Navy Blue", "status": "updated"}
  ],
  "synced": true
}
```

HTTP status luôn `200` trừ 2 trường hợp: `400` (thiếu/sai định dạng
`variants`), `404` (`product_id` không phải sản phẩm WooCommerce). **Mỗi
phần tử trong `variants` được xử lý độc lập** — 1 dòng sai không làm hỏng cả
batch, nên **bắt buộc phải kiểm tra `results[].status` từng item**, không chỉ
nhìn HTTP status code:

| `status` | Ý nghĩa |
|---|---|
| `created` / `updated` | Thành công. |
| `error` (`invalid_fields`) | Thiếu `type`/`color`, hoặc `price <= 0`. |
| `error` (`lookup_create_failed`) | Hiếm — auto-tạo Type/Color mới thất bại. |
| `error` (`db_error`) | Lỗi ghi DB. |
| `error` (`invalid_item`) | Phần tử trong mảng `variants` không phải object. |

Sau khi xử lý xong toàn bộ mảng, endpoint **tự động** chạy
`pod_sync_product_price()` — `_price`/`_regular_price`/`_stock_status` của
sản phẩm WC được cập nhật ngay (`synced: true`), **không cần gọi thêm bước 4**
nếu đã import qua endpoint này.

---

## 4. Sync giá thủ công (chỉ cần nếu ghi thẳng vào DB, bỏ qua nếu dùng bước 3)

Nếu hệ thống import có kết nối DB trực tiếp và tự `INSERT`/`UPDATE` vào
`wp_pod_variants` thay vì gọi endpoint ở bước 3, phải tự gọi endpoint này sau
khi ghi xong để đồng bộ giá + bust cache lookup:

```bash
curl -X POST "https://<site>/wp-json/wc-pod/v1/products/{product_id}/sync" \
  -u "<consumer_key>:<consumer_secret>"
```

Trả `{"synced": true}` (200) hoặc `{"synced": false}` (404, sản phẩm không có
variant active nào — `_stock_status` sẽ bị set `outofstock`).

---

## 5. Checklist sau khi import 1 sản phẩm

- [ ] Sản phẩm có ảnh đại diện (Media Library) — không chỉ có `image_urls`
      của variant.
- [ ] Mọi Type mới xuất hiện lần đầu đã có dòng phụ phí trong
      `wp_pod_size_prices` (mục 2) — nếu không, mở trang single product xem
      thử: không có size nào chọn được là dấu hiệu thiếu bước này.
- [ ] `results[].status` của mọi item trong response bước 3 là `created`
      hoặc `updated`, không còn `error` nào chưa xử lý.
- [ ] `synced: true` ở response cuối cùng (bước 3 hoặc bước 4).
- [ ] Mở trang single product thật trên trình duyệt, thử chọn Style → Color →
      Size, kiểm tra giá + ảnh đổi đúng, Add to cart hoạt động.

---

## 6. Import hàng loạt (~20.000 sản phẩm)

Với quy mô lớn, lặp lại bước 1 → 3 cho từng sản phẩm là cách được chốt (xem
mục 7 trong `pod-variants-plan.md`) — **không có** cơ chế import CSV/bulk
trong wp-admin. Gợi ý vận hành:

- Chạy bước 2 (Size + phụ phí size) **một lần duy nhất** trước cả lô, không
  phải theo từng sản phẩm.
- Khi tạo Type mới hàng loạt, gom danh sách Type name distinct của cả lô lại
  trước, tạo/kiểm tra phụ phí size cho từng Type đó **trước khi** chạy import
  variants, để tránh vừa import vừa phát hiện thiếu size ở giữa chừng.
- Theme cache lookup Type/Color/Size 12h (transient) — nếu vừa tạo Type/Color
  mới qua wp-admin rồi import ngay bằng script khác trong cùng request/tiến
  trình riêng, cache tự invalidate đúng (mỗi lần settings CRUD hoặc REST
  auto-create đều gọi `pod_flush_lookup_cache()`), không cần đợi 12h.
- Endpoint `/variants` xử lý tối đa 500 item/request — nếu 1 sản phẩm có ít
  hơn 500 tổ hợp Style×Color (thực tế hiếm khi vượt vài chục), mỗi sản phẩm
  chỉ cần 1 request là đủ.
