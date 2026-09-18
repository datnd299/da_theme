# POD Variant System — Kế hoạch triển khai

Ghi lại kiến trúc và các bước để chuyển theme sang bán sản phẩm print-on-demand
(~20.000 sản phẩm, mỗi sản phẩm có nhiều Style × Color × Size) mà không phình
database theo cơ chế WC variation mặc định.

## 1. Mục tiêu

- Lưu ma trận biến thể (style/color/size, giá, ảnh, sku) trong bảng riêng thay
  vì `wp_posts` + `wp_postmeta` của WooCommerce Variable Product.
- Trang sản phẩm tự vẽ bộ chọn Style/Color/Size, tính giá & đổi ảnh theo lựa chọn.
- Cart / Checkout / Order / Thanh toán / Email vẫn do WooCommerce xử lý nguyên vẹn —
  không viết lại các phần này.

## 2. Quyết định đã chốt (qua trao đổi)

- Mỗi sản phẩm gốc là **1 WC simple product** (không tạo variation con trong WC).
- Lựa chọn biến thể được gắn vào cart item qua hook chuẩn của WooCommerce, không
  đụng vào core cart/checkout.
- Table prefix thực tế của site là `wp_` (đã kiểm tra trong container) — khớp với
  tên bảng trong schema đề xuất.
- Không cần `stock_quantity` cho từng variant (POD = tồn kho không giới hạn), trừ
  khi có yêu cầu khác sau này.

## 3. Thiết kế dữ liệu

```sql
CREATE TABLE wp_pod_variants (
  id          BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id  BIGINT UNSIGNED NOT NULL,      -- ID sản phẩm WC gốc
  type_id     SMALLINT UNSIGNED NOT NULL,    -- Style: Tee, Hoodie...
  color_id    SMALLINT UNSIGNED NOT NULL,
  price       DECIMAL(10,2) NOT NULL,        -- giá gốc cho style+color (chưa cộng size)
  sale_price  DECIMAL(10,2) NULL,
  image_urls  JSON NOT NULL,                 -- mảng URL ảnh ngoài site, ["https://...", ...] phần tử đầu = ảnh chính
  sku         VARCHAR(64) NOT NULL,
  is_active   TINYINT(1) NOT NULL DEFAULT 1,
  created_at  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY uq_variant (product_id, type_id, color_id),
  KEY idx_type_color (type_id, color_id),
  KEY idx_sku (sku)
) ENGINE=InnoDB;

CREATE TABLE wp_pod_size_prices (
  type_id   SMALLINT UNSIGNED NOT NULL,
  size_id   SMALLINT UNSIGNED NOT NULL,
  surcharge DECIMAL(10,2) NOT NULL DEFAULT 0,
  PRIMARY KEY (type_id, size_id)
) ENGINE=InnoDB;

-- Lookup tables tự quản lý (không dùng WP taxonomy) — nhập liệu qua API riêng
CREATE TABLE wp_pod_types (
  id          SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name        VARCHAR(64) NOT NULL,
  slug        VARCHAR(64) NOT NULL,
  sort_order  SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  UNIQUE KEY uq_slug (slug)
) ENGINE=InnoDB;

CREATE TABLE wp_pod_colors (
  id          SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name        VARCHAR(64) NOT NULL,
  slug        VARCHAR(64) NOT NULL,
  hex_code    CHAR(7) NULL,             -- vd. #1A1A1A, để render swatch
  sort_order  SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  UNIQUE KEY uq_slug (slug)
) ENGINE=InnoDB;

CREATE TABLE wp_pod_sizes (
  id          SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name        VARCHAR(16) NOT NULL,     -- S, M, L, 2XL...
  slug        VARCHAR(16) NOT NULL,
  sort_order  SMALLINT UNSIGNED NOT NULL DEFAULT 0,  -- S<M<L<...<3XL không sort được theo alphabet
  UNIQUE KEY uq_slug (slug)
) ENGINE=InnoDB;
```

Ghi chú thiết kế:

- Giá cuối = `wp_pod_variants.price` (+ `sale_price` nếu có) `+ wp_pod_size_prices.surcharge`
  theo `type_id` của variant đó. Việc tách size ra bảng phụ giữ số dòng ở mức
  product × style × color thay vì nhân thêm size (tránh nổ số dòng gấp 8 lần).
- Không có size cho 1 type nào đó → đơn giản là không insert row trong
  `wp_pod_size_prices` cho cặp đó; UI ẩn size không tồn tại, server cũng từ chối
  tổ hợp (type_id, size_id) không có trong bảng khi add-to-cart.
- `wp_pod_size_prices` chỉ ~64 dòng cho toàn store (8 style × 8 size) vì phụ phí
  theo size (vd. 2XL +2$, 3XL +4$) phụ thuộc loại áo chứ không phụ thuộc design —
  tách riêng để không phải lặp lại phụ phí này trên từng dòng của 20.000 design
  (nếu gộp size vào `wp_pod_variants` sẽ thành ~640 dòng/design thay vì ~80).
  Đổi giá phôi hàng loạt (vd. xưởng tăng giá hoodie 3XL) chỉ cần sửa 1 dòng, áp
  dụng ngay cho toàn bộ 20.000 design.
- Vì bảng chỉ ~64 dòng và dùng chung cho mọi trang sản phẩm, nạp 1 lần rồi cache
  (object cache/transient hoặc biến static trong request) thay vì query lại cho
  từng cart item; có thể xuất thành 1 file JSON tĩnh dùng chung cho mọi trang sản
  phẩm (cache được ở CDN), JS tự cộng surcharge khi khách đổi size.
- **Ảnh (`image_urls`)**: tất cả ảnh sản phẩm là link ngoài (không upload vào WP
  Media Library), mỗi variant có thể có nhiều ảnh (gallery) → dùng cột `JSON`
  lưu mảng URL thay vì 1 URL đơn, thay vì tách bảng `wp_pod_variant_images`
  riêng (đơn giản hơn cho việc import hàng loạt vì mỗi variant vẫn chỉ là 1 dòng).
  Đọc bằng `json_decode()` trong PHP khi render. Vì là ảnh ngoài site nên
  `inc/responsive-images.php` (vốn xử lý srcset cho attachment nội bộ) **không
  áp dụng** được cho ảnh variant — trang single product cần tự thêm
  `loading="lazy"` và width/height cố định (nếu biết trước) để tránh CLS, không
  trông chờ WP tạo srcset cho các URL này.
- Không dùng FOREIGN KEY (đúng convention WP, tránh vấn đề khi xoá post) — thay
  vào đó xử lý dọn dẹp bằng hook `before_delete_post` (xoá các row
  `wp_pod_variants` có `product_id` tương ứng).
- `type_id` / `color_id` / `size_id`: **đã chốt** — dùng 3 bảng lookup tự quản lý
  (`wp_pod_types`, `wp_pod_colors`, `wp_pod_sizes`) thay vì WP taxonomy, vì dữ
  liệu nhập qua API riêng (không cần UI wp-admin của taxonomy) và tránh join qua
  `wp_terms`/`wp_term_taxonomy`/`wp_term_relationships`. Nếu sau này cần filter
  shop theo màu/style thì tự viết `WHERE type_id IN (...)` join `wp_pod_variants`,
  không cần `tax_query`.

### 3.1. Mở rộng tuỳ chọn cho `wp_pod_size_prices` (chưa cần làm ngay, ghi lại để dùng khi phát sinh)

- **Giá không đổi theo size**: bỏ cột `surcharge`, bảng chỉ còn danh sách
  (type_id, size_id) hợp lệ để giới hạn size hiển thị theo loại áo.
- **Một vài design cần phụ phí size riêng** (khác mức chung): thêm bảng ghi đè
  `wp_pod_size_price_overrides(product_id, type_id, size_id, surcharge)`. Khi
  tính giá, ưu tiên đọc override trước, không có mới fallback về
  `wp_pod_size_prices`.
- **Phụ phí phụ thuộc cả màu** (hiếm gặp): thêm `color_id` vào khoá chính, bảng
  tăng tối đa lên ~640 dòng (8 style × 10 màu × 8 size) — vẫn rất nhỏ, không
  ảnh hưởng hiệu năng.

## 4. Luồng hoạt động

1. **Trang sản phẩm** (`single-product`): JS đọc dữ liệu variant (render sẵn dạng
   JSON từ PHP theo `product_id` hiện tại) → khách chọn Style → Color → Size →
   tính giá, đổi ảnh, enable nút Add to cart khi tổ hợp hợp lệ (`is_active = 1`
   và có row trong `wp_pod_size_prices`).
2. **Add to cart**: form gửi kèm `pod_variant_id` (khoá tới `wp_pod_variants`) +
   `pod_size_id`. Hook `woocommerce_add_cart_item_data` lưu 2 giá trị này vào
   cart item data (**không** lưu giá tính từ client) → WooCommerce tự tách
   thành dòng cart riêng cho mỗi tổ hợp khác nhau (khác cart item data → khác
   cart item key).
3. **Tính giá trong cart**: hook `woocommerce_before_calculate_totals` luôn tính
   lại giá từ server dựa trên `pod_variant_id` + `pod_size_id`, không tin giá
   gửi từ client (chặn gian lận giá qua devtools). Ví dụ tham khảo:

   ```php
   add_action('woocommerce_before_calculate_totals', function ($cart) {
       global $wpdb;
       // 64 dòng size_prices nên nạp 1 lần/request (static var hoặc object cache),
       // không query lại cho từng cart item như ví dụ rút gọn dưới đây.
       foreach ($cart->get_cart() as $item) {
           if (empty($item['pod_variant_id'])) continue;

           $variant = $wpdb->get_row($wpdb->prepare(
               "SELECT type_id, price, sale_price FROM {$wpdb->prefix}pod_variants WHERE id = %d AND is_active = 1",
               $item['pod_variant_id']
           ));
           if (!$variant) continue;

           $surcharge = (float) $wpdb->get_var($wpdb->prepare(
               "SELECT surcharge FROM {$wpdb->prefix}pod_size_prices WHERE type_id = %d AND size_id = %d",
               $variant->type_id, $item['pod_size_id']
           ));

           $base = $variant->sale_price !== null ? $variant->sale_price : $variant->price;
           $item['data']->set_price($base + $surcharge);
       }
   });
   ```
4. **Hiển thị trong cart/mini-cart/checkout**: hook `woocommerce_get_item_data`
   thêm dòng "Style / Color / Size" dưới tên sản phẩm.
5. **Lưu vào đơn hàng**: hook `woocommerce_checkout_create_order_line_item` copy
   style/color/size/sku thành order item meta → tự hiển thị trong admin order,
   email, invoice (WC render item meta mặc định, không cần code thêm).
6. **Side cart** hiện có (`inc/side-cart.php`) cần kiểm tra có tự động hiển thị
   `woocommerce_get_item_data` hay đang tự render — nếu tự render riêng thì phải
   sửa thêm ở đó.

## 5. File đã tạo / sửa (trạng thái: **đã triển khai xong bản v1**, xem mục 9)

Theo convention hiện có của theme (`inc/*.php` được require từ `functions.php`):

- `inc/pod-variants.php` — **đã tách thành loader mỏng** (xem mục 10), chỉ còn
  `define('POD_VARIANTS_DB_VERSION', ...)` + `require_once` từng file con dưới
  `inc/pod-variants/`. Toàn bộ logic (bảng DB, cache lookup, helper đọc
  variant, `pod_sync_product_price()`, REST endpoint
  `POST /wp-json/pod/v1/products/{id}/sync`, hook cart/order ở mục 4, trang
  settings ở mục 10, và phần render front-end gallery + bộ chọn variant) nằm
  trong các file con đó — xem mục 9 để biết vì sao **không** tạo file template
  `content-single-product.php` riêng.
- `functions.php` — thêm `require_once .../inc/pod-variants.php`.
- `assets/js/pod-variants.js` (mới, file JS riêng chứ không gộp vào `main.js`
  vì chỉ cần trên trang single product của sản phẩm POD, gộp vào `main.js` sẽ
  nạp code không dùng tới cho mọi trang khác) — logic chọn variant, tính giá,
  đổi ảnh gallery, bật/tắt nút Add to cart.
- `assets/css/product.css` — thêm block `.pod-variant-selector` (đã nằm trong
  phạm vi được phép sửa, không cần mở rộng scope).
- Nhập liệu sản phẩm/biến thể: qua **API riêng bên ngoài theme** (ghi trực
  tiếp vào `wp_posts` cho product + 4 bảng `wp_pod_*`). Sau khi ghi/sửa
  variant, API đó gọi `POST /wp-json/pod/v1/products/{product_id}/sync`
  (auth = WP user có quyền `edit_products`, vd. Application Password) để đồng
  bộ `_price`/`_regular_price`/`_stock_status` của WC product + bust cache
  lookup — **đã chốt, đã code xong**, không cần theme tự đoán API riêng làm gì.

## 6. Các giai đoạn triển khai đề xuất

1. Tạo bảng DB (`inc/pod-variants.php` + activation hook), viết vài row test bằng
   SQL trực tiếp để kiểm tra schema.
2. Viết helper PHP đọc variant theo `product_id` → JSON cho JS dùng.
3. Xây trang single product mới với bộ chọn Style/Color/Size (chưa cần đẹp, cần
   đúng logic trước).
4. Nối hook cart (`add_cart_item_data`, `before_calculate_totals`, `get_item_data`).
5. Nối hook order (`checkout_create_order_line_item`), kiểm tra hiển thị trong
   admin order + email.
6. Kiểm tra side cart (`inc/side-cart.php`) hiển thị đúng thông tin variant.
7. Style lại theo design system (`assets/css/product.css`).
8. Giải quyết bài toán nhập liệu 20.000 sản phẩm × biến thể (import tool).

## 7. Việc cần xác nhận trước khi code

- [x] type/color/size: đã chốt — 3 bảng lookup tự quản lý
      (`wp_pod_types`/`wp_pod_colors`/`wp_pod_sizes`), không dùng WP taxonomy.
- [x] Cách nhập 20.000 sản phẩm + variant: đã chốt — qua **API riêng** bên ngoài
      theme, không cần admin UI/import CSV trong wp-admin.
- [x] Đã chốt & code xong: theme expose `POST /wp-json/pod/v1/products/{id}/sync`
      (auth qua `edit_products` capability) để API riêng gọi vào sau khi ghi
      variant, tự đồng bộ `_price`/`_regular_price`/`_stock_status` + bust cache.

## 9. Trạng thái triển khai (v1) — 2026-09-15

Đã code + lint (`php -l`) + test end-to-end (seed data → `add_to_cart_validation`
→ `before_calculate_totals` → `get_item_data` → session restore) trên container
`wpxx-wp-1`, tất cả pass. Chi tiết:

- **5 bảng DB** tạo thành công qua `pod_maybe_upgrade_db()` (hook `init` +
  `after_switch_theme`, versioned nên không chạy `dbDelta()` mỗi request).
- **Không tạo `woocommerce/content-single-product.php`** như dự kiến ban đầu ở
  mục 5 — thay vào đó **hook trực tiếp vào template mặc định của WooCommerce**
  (`woocommerce_before_single_product_summary`, `woocommerce_single_product_summary`,
  `woocommerce_before_add_to_cart_button`) để chèn gallery ảnh ngoài site + bộ
  chọn Style/Color/Size + hidden input, chỉ kích hoạt khi sản phẩm thực sự có
  variant trong `wp_pod_variants` (`pod_product_has_variants()`). Lý do đổi:
  viết lại toàn bộ file template sẽ phải tái tạo đúng y hệt markup gallery/tabs/
  reviews mặc định mà CSS hiện có đang style theo — rủi ro cao hơn nhiều so với
  chỉ chèn thêm vào đúng chỗ cần, sản phẩm không phải POD hoàn toàn không bị ảnh
  hưởng.
- **Bug đã sửa trong lúc code** (so với code mẫu ở mục 4): thêm hook
  `woocommerce_get_cart_item_from_session` — nếu thiếu, `pod_variant_id`/
  `pod_size_id` sẽ mất ngay sau khi giỏ hàng phục hồi từ session (WC chỉ giữ
  lại các key mà filter này chủ động gắn lại). Cũng thêm
  `woocommerce_add_to_cart_validation` để chặn combo không hợp lệ **trước khi**
  vào giỏ, thay vì chỉ dựa vào `before_calculate_totals` (vốn chỉ `continue` và
  để lại giá cũ/sai nếu variant không hợp lệ).
- **Lưu ý vận hành**: lúc test, hàm `pod_sync_product_price()` đã được chạy
  thật trên sản phẩm có sẵn "Summer shorts" (SKU 897565-04, ID 7151) — set
  `_price`/`_regular_price` = 35.00, `_stock_status` = instock. Dữ liệu test
  (variant/type/color/size) đã được xoá sạch nên sản phẩm này không còn bị coi
  là POD product nữa, nhưng **chưa xác minh được giá 35.00 có đúng là giá gốc
  trước test hay không** — cần kiểm tra lại trong wp-admin.
- **Chưa làm** (nằm ngoài phạm vi v1 này): style lại bộ chọn variant theo design
  system kỹ hơn (hiện chỉ là nút bấm cơ bản), test trên trình duyệt thật (mới
  test qua PHP CLI, chưa mở site xem giao diện), và toàn bộ mục "Việc cần xác
  nhận" còn lại nếu phát sinh khi API riêng bắt đầu đổ dữ liệu thật vào.
- [x] Ảnh variant: lưu mảng URL ngoài site (`image_urls` JSON), không dùng
      attachment_id / Media Library — đã chốt.
- [x] Validate giá server-side: đã chốt — cart chỉ lưu `pod_variant_id` +
      `pod_size_id`, giá luôn tính lại từ DB ở `woocommerce_before_calculate_totals`
      (xem code mẫu mục 4), không tin giá client gửi lên.

## 8. Rà soát bổ sung — cần xử lý khi code

- [ ] **Đồng bộ `_price`/`_regular_price` của WC product gốc** = giá thấp nhất
      trong các variant active (kiểu "from $X"), cập nhật lại mỗi khi variant
      đổi giá. Nếu bỏ qua: shop archive hiển thị giá sai/$0, sort theo giá không
      hoạt động, JSON-LD/Google Merchant feed sai.
- [ ] **Chặn add-to-cart ở `woocommerce_add_to_cart_validation`** (kiểm tra
      `pod_variant_id`/`pod_size_id` tồn tại, `is_active=1`, có row trong
      `wp_pod_size_prices`) — không chỉ dựa vào `before_calculate_totals`. Code
      mẫu ở mục 4 hiện `continue` khi không tìm thấy variant, nghĩa là item vẫn
      ở lại giỏ với giá gốc (sai/0) thay vì bị từ chối ngay từ đầu.
- [ ] **Cache invalidation cho `wp_pod_size_prices`**: bust cache (transient/
      object cache/file JSON tĩnh) mỗi khi admin sửa surcharge, nếu không tính
      năng "đổi giá hàng loạt tức thì" (mục 3) sẽ không phản ánh ngay.
- [ ] **Gallery/zoom ảnh**: JS zoom/lightbox mặc định của WooCommerce
      (PhotoSwipe/flexslider) gắn với attachment nội bộ, không tự hoạt động với
      `image_urls` ngoài site — cần tự làm hoặc dùng lib khác.
- [ ] **`_stock_status`** của WC product gốc set `instock` khi tạo, tránh WC
      chặn Add to cart mặc định.
- [ ] **Migration versioning**: lưu option `pod_variants_db_version`, chỉ chạy
      lại `dbDelta()` khi schema thật sự đổi thay vì mỗi request.
- [ ] **WooCommerce Analytics gộp theo `product_id`**, không tách theo
      style/color/size — nếu cần báo cáo theo biến thể phải tự query order item
      meta, không có sẵn trong Admin > Analytics.

## 10. Trang settings quản lý Type/Color/Size + tách file — 2026-09-15

### 10.1. Trang settings wp-admin

Thêm 1 trang settings trong wp-admin (WooCommerce > POD Variants,
`manage_woocommerce` capability) để CRUD 3 bảng lookup nhỏ
(`wp_pod_types`/`wp_pod_colors`/`wp_pod_sizes`, ~10-30 dòng mỗi bảng) — **không**
đụng đến quyết định ở mục 7 rằng 20.000 sản phẩm × biến thể vẫn nhập qua API
riêng bên ngoài theme. Hai việc tách biệt: bảng lookup (Type/Color/Size) nhỏ,
đổi không thường xuyên, hợp lý để có UI trong wp-admin thay vì phải chạy SQL
tay; còn ma trận variant (giá/ảnh/sku theo từng design) mới là thứ cần API
riêng vì quy mô 20k dòng.

- 3 tab (Type / Color / Size) trên cùng 1 trang, mỗi tab: form thêm/sửa bên
  trái + bảng danh sách bên phải, xoá có confirm JS.
- Field chung: `name`, `slug` (tự sinh từ `name` nếu để trống qua
  `sanitize_title()`), `sort_order`. Riêng Color có thêm `hex_code`.
- Ghi DB qua `admin-post.php` (`admin_post_pod_save_lookup` /
  `admin_post_pod_delete_lookup`), nonce riêng cho save/delete, capability
  `manage_woocommerce`. Trùng `slug` (UNIQUE KEY) bị `$wpdb->insert/update`
  chặn ở tầng DB → trang hiển thị lỗi `duplicate_slug` thay vì insert âm thầm
  thất bại.
- Sau mỗi lần lưu/xoá gọi `pod_flush_lookup_cache()` — nếu quên bước này thì
  admin sửa xong mà trang sản phẩm vẫn thấy dữ liệu cũ tới khi transient 12h
  tự hết hạn (xem mục 3, phần cache).
- **Đã test end-to-end** trên container `wpxx-wp-1` bằng cách gọi trực tiếp
  `pod_admin_save_lookup()`/`pod_admin_delete_lookup()` với `$_POST`/`$_GET` +
  nonce giả lập (bootstrap `wp-load.php` qua `php -r`, không dùng wp-cli vì
  không có sẵn trong container): insert, update, delete, và insert trùng slug
  bị chặn đúng như kỳ vọng — tất cả pass.
- **Chưa làm**: chưa mở thật trên trình duyệt (mới test qua PHP CLI gọi thẳng
  hàm), chưa có UI kéo-thả đổi `sort_order` (hiện phải gõ số tay), chưa có nút
  xoá style CSS đẹp hơn (đang dùng inline `style=""` cơ bản, đủ dùng cho
  trang settings nội bộ nhưng chưa theo design system).

### 10.2. Tách `inc/pod-variants.php` thành nhiều file nhỏ

Theo yêu cầu "dễ kiểm soát" — file gốc đã phình lên ~900 dòng gộp chung
schema/cache/cart/REST/admin/frontend, khó review khi cần sửa 1 phần riêng lẻ.
Tách thành:

```
inc/pod-variants.php              — loader mỏng: define(POD_VARIANTS_DB_VERSION)
                                     + require_once từng file dưới đây
inc/pod-variants/schema.php       — tên bảng + dbDelta install/upgrade
inc/pod-variants/lookup-cache.php — pod_get_types/colors/sizes/size_prices,
                                     pod_flush_lookup_cache()
inc/pod-variants/variant-data.php — pod_get_variant(), pod_get_variants_for_product(),
                                     pod_product_has_variants(), pod_sync_product_price()
inc/pod-variants/rest-api.php     — REST route POST /wp-json/pod/v1/products/{id}/sync
inc/pod-variants/cart.php         — toàn bộ hook add_to_cart/calculate_totals/
                                     get_item_data/checkout_create_order_line_item
inc/pod-variants/admin-settings.php — trang settings mục 10.1 (menu, save/delete
                                     handler, render page)
inc/pod-variants/product-metabox.php — metabox theo từng sản phẩm, mục 11
                                     (add_meta_box, save/delete variant, render)
inc/pod-variants/frontend.php     — enqueue script, build payload JSON, gallery
                                     override, render bộ chọn variant + hidden input
```

- `functions.php` **không đổi** — vẫn chỉ `require_once .../inc/pod-variants.php`
  một dòng như cũ; loader tự require các file con nên không phải sửa thêm chỗ
  nào khác khi thêm/bớt file trong `inc/pod-variants/`.
- Thứ tự require trong loader không bắt buộc (mọi hàm chỉ thực thi lúc hook
  chạy, không phải lúc file được nạp) nhưng vẫn giữ theo trình tự logic
  (schema → cache → data → REST → cart → admin → frontend) để dễ đọc.
- Đã `php -l` lint tất cả 8 file (loader + 7 file con) qua container
  `wpxx-wp-1`, không lỗi cú pháp; đã bootstrap `wp-load.php` để xác nhận các
  hàm (`pod_render_settings_page`, `pod_get_types`, `pod_build_variant_payload`,
  ...) vẫn tồn tại và hoạt động đúng sau khi tách file.

## 11. Metabox quản lý variant theo từng sản phẩm — 2026-09-15

Thêm `inc/pod-variants/product-metabox.php` (file con thứ 8, require trong
loader) — 1 metabox "BigPod Variants & Pricing" trên màn hình sửa sản phẩm
(wp-admin > Products > Edit), cho phép admin xem/thêm/sửa/xoá **variant của
riêng sản phẩm đang mở** (Type + Color + giá + giá sale + SKU + danh sách
URL ảnh + active) mà không cần gọi API riêng — hữu ích để test nhanh hoặc sửa
tay 1-2 sản phẩm, khác với luồng nhập hàng loạt 20.000 sản phẩm ở mục 7 (vẫn
giữ nguyên, không đổi).

- Bảng liệt kê variant hiện có của sản phẩm + form thêm/sửa bên dưới, cùng
  pattern với trang settings ở mục 10 (submit qua `admin-post.php`, nonce
  riêng `pod_save_variant`/`pod_delete_variant`, capability `edit_products`).
- Trùng tổ hợp (product_id, type_id, color_id) bị chặn ở tầng DB (UNIQUE KEY
  `uq_variant`) → hiển thị lỗi `duplicate_variant` thay vì insert âm thầm
  thất bại — đã test thực tế bằng cách insert trùng, DB trả lỗi, `$wpdb->insert()`
  trả `false`, trang redirect kèm thông báo lỗi đúng như mong đợi.
- Sau **mỗi lần** thêm/sửa/xoá variant, tự động gọi `pod_sync_product_price()`
  ngay trong request đó (không cần đợi API riêng gọi REST sync) — giá
  `_price`/`_regular_price`/`_stock_status` của sản phẩm cập nhật tức thì.
  Đã test: xoá variant rẻ nhất → giá WC product tự chuyển sang variant rẻ
  tiếp theo còn active.
- Cập nhật/xoá variant chặn thêm `product_id` trong mệnh đề `WHERE` (không chỉ
  `id`) — tránh trường hợp sửa `id` trên form để thao túng variant của sản
  phẩm khác.
- Ảnh nhập dưới dạng textarea (mỗi dòng 1 URL ngoài site, dòng đầu = ảnh
  chính) thay vì input JSON thô, để nhập tay dễ hơn — parse bằng
  `preg_split()` + `esc_url_raw()` từng dòng rồi `wp_json_encode()` lại thành
  `image_urls`.
- **Giới hạn đã biết**: metabox chỉ quản lý variant (Type × Color) của 1 sản
  phẩm, **không** có UI cho ma trận phụ phí `wp_pod_size_prices` (Type × Size)
  — bảng đó vẫn dùng chung toàn site nên sửa 1 sản phẩm không hợp lý, để dành
  cho 1 UI riêng nếu cần (xem mục 3.1). Đăng ký metabox
  (`add_meta_box()`/`add_meta_boxes` hook) chỉ verify được đầy đủ khi mở thật
  trong trình duyệt — test qua PHP CLI (`wp-load.php` không có `WP_Screen`
  context thật) cho thấy hàm render hoạt động đúng (liệt kê đúng variant có
  sẵn, form hiển thị đúng) nhưng bản thân `add_meta_box()` fallback vào
  `_invalid` screen do thiếu bối cảnh trang admin thật — đây là hạn chế của
  môi trường test CLI, không phải lỗi code (pattern đăng ký giống hệt mọi
  plugin/theme khác dùng `add_meta_box`).

## 12. REST endpoint ghi variant hàng loạt — 2026-09-15

Thêm `POST /wp-json/pod/v1/products/{id}/variants` trong `rest-api.php`, bên
cạnh `/sync` sẵn có — cho phép hệ thống ngoài **ghi variant qua HTTP** thay vì
bắt buộc phải giữ kết nối DB trực tiếp tới MySQL của site (cách nhập liệu gốc
ở mục 5/7 vẫn dùng được song song, hai đường không loại trừ nhau: đường DB
trực tiếp phù hợp cho ETL 20k sản phẩm 1 lần, đường REST này phù hợp khi
caller không tiện có DB access hoặc cần update lai rai từng sản phẩm).

- Body: `{"variants": [{"type": "<type slug>", "color": "<color slug>",
  "price": 19.99, "sale_price": 15.99, "sku": "...", "image_urls": [...],
  "is_active": true}, ...]}` — tối đa 500 phần tử/request. `type`/`color`
  dùng **slug** (không phải numeric id) — chốt qua trao đổi vì hệ thống gọi
  API không cần tra ID nội bộ trước, và đổi tên Type/Color trong wp-admin
  không phải sửa integration bên ngoài.
- Upsert theo khoá `(product_id, type_id, color_id)` — dò `SELECT id` trước
  rồi `update`/`insert` (không dùng `INSERT ... ON DUPLICATE KEY` vì cần
  `sale_price = NULL` chạy qua `$wpdb->update()`/`insert()` mới ra đúng `NULL`
  thay vì bị ép kiểu `%f` thành `0`). Đây không phải patch từng phần — mỗi
  item ghi đè toàn bộ dòng (kể cả `image_urls`/`sale_price` nếu không gửi thì
  bị xoá về rỗng/null), giống hệt cách metabox mục 11 submit form, để hành vi
  nhất quán giữa 2 đường ghi.
- Mỗi phần tử trong mảng được validate/ghi **độc lập** — 1 dòng sai (`type`
  hoặc `color` không khớp slug nào, hoặc `price <= 0`) trả `status: "error"`
  kèm `error: "invalid_fields"` trong `results[]`, không làm hỏng cả batch.
  Response luôn `200` (trừ 400 khi thiếu `variants`/sai định dạng, 404 khi
  `product_id` không phải sản phẩm WC) — caller phải tự kiểm `results[].status`
  per item.
- Sau khi xử lý xong toàn bộ mảng, tự gọi `pod_sync_product_price()` 1 lần
  (không phải gọi thêm `/sync` riêng cho product đó) — trả về trong
  `synced: true/false`.
- Auth giống `/sync`: `current_user_can('edit_products')`.
- **Đã test end-to-end** trên `wpxx-wp-1` bằng `WP_REST_Request` gọi thẳng
  `pod_rest_upsert_variants()` với product test tạo/xoá trong lúc test: tạo
  mới 2 variant, 1 item slug sai bị từ chối đúng như kỳ vọng mà 2 item còn lại
  vẫn ghi thành công, ghi đè lại 1 variant đã tồn tại (update đúng theo khoá
  unique, giá đồng bộ lại `_price` của WC product = giá thấp nhất), `sale_price`
  null được lưu đúng là `NULL` chứ không phải `0`. Đã `php -l` qua container.

### 12.1. Đổi `type`/`color` sang Name + tự tạo lookup nếu chưa có — 2026-09-15

Theo yêu cầu tiếp theo: đổi payload của `/variants` từ **slug** sang **Name**
(vd. `"T Shirt"`, `"Black"` thay vì `"t-shirt"`, `"black"`), và nếu Name chưa
tồn tại trong `wp_pod_types`/`wp_pod_colors` thì **tự tạo mới** thay vì trả lỗi
— caller không cần vào trang settings tạo Type/Color trước khi gửi variant.

- Thêm `pod_get_or_create_lookup_id($table, $cache_key, $name)` (+ 2 wrapper
  `pod_get_or_create_type_id()`/`pod_get_or_create_color_id()`) trong
  `lookup-cache.php`: match Name **case-insensitive** (đã `trim()`) với các
  row cache sẵn; không thấy thì `slug = sanitize_title($name)` rồi insert,
  `sort_order`/`hex_code` để mặc định cột (0 / NULL — sửa lại thủ công trên
  trang settings sau nếu cần swatch màu/thứ tự hiển thị). Insert lỗi (đụng
  UNIQUE KEY `uq_slug` — race hoặc 2 Name khác nhau ra cùng slug) thì fallback
  `SELECT id WHERE slug = ...` lấy row đã có thay vì báo lỗi.
- `pod_rest_upsert_variants()` build map `strtolower(name) => id` 1 lần từ
  lookup hiện có, rồi **lớn dần trong lúc loop**: gặp Name mới thì gọi
  `pod_get_or_create_*_id()` 1 lần và ghi luôn vào map cục bộ — nếu cùng 1
  Name mới xuất hiện nhiều lần trong cùng batch (khác hoa/thường) thì chỉ
  insert 1 lần, các item sau tái dùng id vừa tạo thay vì insert trùng.
- Field lỗi mới `lookup_create_failed` (khác với `invalid_fields`) cho
  trường hợp hiếm insert lookup thất bại và fallback slug cũng không tìm ra
  — phân biệt với lỗi do thiếu `type`/`color`/`price` không hợp lệ.
- **Đã test end-to-end** trên `wpxx-wp-1`: gửi Type/Color đã có sẵn (khớp
  đúng theo tên, không phân biệt hoa thường) → dùng lại id cũ; gửi
  `"Long Sleeve"`/`"Navy Blue"` chưa tồn tại → tự tạo 1 row mới mỗi bảng, slug
  đúng `long-sleeve`/`navy-blue`; gửi lại đúng 2 tên đó với casing khác
  (`"long sleeve"`/`"navy blue"`) trong **cùng batch** → khớp đúng vào row vừa
  tạo, **không tạo trùng**, update lại variant thay vì insert lần 2; `type`
  rỗng bị từ chối `invalid_fields` như cũ. Đã dọn variant/product/2 row
  lookup test sau khi xong. Đã `php -l` qua container.

## 13. Đổi namespace REST sang `wc-pod/v1` để dùng chung Consumer Key/Secret của WooCommerce — 2026-09-15

Theo yêu cầu dùng credential WooCommerce (Consumer Key/Secret) thay vì WP
Application Password cho 2 endpoint `/sync` và `/variants` (mục 5/12) —
namespace đổi từ `pod/v1` sang **`wc-pod/v1`**, path con giữ nguyên
(`/products/{id}/sync`, `/products/{id}/variants`).

- Lý do bắt buộc phải đổi: `WC_REST_Authentication` (class xử lý Basic
  Auth/OAuth1.0a bằng consumer key/secret) chỉ tự kích hoạt cho route bắt đầu
  bằng `wc/` hoặc `wc-` (`is_wc_namespace()` trong
  `wp-content/plugins/woocommerce/includes/class-wc-rest-authentication.php`).
  Namespace `pod/v1` cũ không khớp điều kiện này nên consumer key/secret gửi
  lên bị bỏ qua hoàn toàn, request tới `permission_callback` với user rỗng →
  luôn `403`. Đổi sang `wc-pod/v1` (tiền tố `wc-` — theo đúng comment trong
  chính source WooCommerce: "lets third party plugins use our authentication
  methods") để route được nhận diện là "trong phạm vi" của 1 API key
  WooCommerce.
- `permission_callback` giữ nguyên `current_user_can('edit_products')` —
  không đổi logic phân quyền, chỉ đổi namespace để cơ chế xác thực chuẩn của
  WooCommerce resolve ra đúng user trước khi capability check chạy.
- Không đăng ký thẳng thêm route vào namespace `wc/v3` sẵn có (dù cũng sẽ
  match) để tránh lẫn với các REST controller gốc của WooCommerce trong cùng
  namespace đó.
- Consumer Key/Secret xác thực qua Basic Auth chỉ hoạt động khi request qua
  HTTPS (`is_ssl()`); site chạy HTTP thuần (vd. local dev) phải ký request
  bằng OAuth1.0a thay vì Basic Auth thô.
- Đã cập nhật `.plans/pod-import-guide.md` (tài liệu hướng dẫn import cho hệ
  thống bên ngoài) theo namespace + cơ chế auth mới. Đã `php -l` qua
  container `wpxx-wp-1`.
