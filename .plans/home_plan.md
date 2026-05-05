# 🏠 Home Page Specification — Fashion E-commerce (Conversion-First)

## 1. Page Goal

Trang chủ KHÔNG phải để “giới thiệu thương hiệu”.
Trang chủ có 3 mục tiêu chính:

1. Đưa user đến sản phẩm nhanh nhất
2. Highlight deal / BST mới để kích thích mua
3. Tạo trust để user yên tâm mua ngay

---

## 2. Global Layout Structure (Top → Bottom)

1. Header (sticky)
2. Trust strip (optional nhưng khuyến nghị)
3. Hero section (primary conversion block)
4. Category shortcuts
5. Featured products (best sellers / new arrivals)
6. Promotional banner (sale / campaign)
7. Product grid (explore thêm)
8. Social proof / reviews
9. Brand story (rất ngắn, không dài dòng)
10. Footer

---

## 3. Detailed Section Breakdown

---

### 3.1 Header (Sticky)

**Mục tiêu:** Navigation + Search + Cart access

**Desktop:**
```

[Logo] [Nam | Nữ | BST mới | Sale] [Search bar] [Wishlist] [Cart] [Account]

```

**Mobile:**
```

[☰] [Logo] [🔍] [🛒]

```

**Yêu cầu:**
- Sticky top
- Search bar visible (desktop)
- Cart có badge số lượng
- Height: ~64px desktop / ~56px mobile

---

### 3.2 Trust Strip (Above Hero)

**Mục tiêu:** Giảm friction ngay lập tức

**Content:**
- 🚚 Miễn phí ship đơn từ $50
- 🔄 Đổi trả 7 ngày
- 🔒 Thanh toán an toàn

**Style:**
- Background nhẹ (neutral hoặc accent very light)
- Text nhỏ `text-xs md:text-sm`
- Flex center, gap đều

---

### 3.3 Hero Section (Primary Conversion Block)

**Layout:** Full-bleed image + overlay text

**Content:**
- Heading rõ ràng (KHÔNG mơ hồ)
  - ✅ "SUMMER 2026 - UP TO 30% OFF"
- Subtext ngắn (1 dòng)
- CTA:
  - "Shop Now"
  - "Xem BST"

**Image:**
- Model mặc sản phẩm thật
- Desktop: 16:9
- Mobile: 4:5

**CTA Rules:**
- Primary button nổi bật (đen/trắng contrast cao)
- Positioned above-the-fold

---

### 3.4 Category Shortcuts

**Mục tiêu:** Giúp user vào đúng category ngay

**Layout:**
- Mobile: 2 columns
- Desktop: 4 columns

**Items:**
- Áo
- Quần
- Phụ kiện
- Sale

**Design:**
- Image + label
- Clickable toàn bộ card
- Aspect ratio: square

---

### 3.5 Featured Products (Best Sellers / New Arrivals)

**Mục tiêu:** Đưa sản phẩm hot ra ngay

**Section title:**
- "Best Sellers"
- hoặc "New Arrivals"

**Grid:**
- Mobile: 2 cột
- Desktop: 4 cột

**Product Card gồm:**
- Ảnh (3:4)
- Tên sản phẩm
- Giá (bắt buộc visible)
- Giá sale (nếu có)
- Badge (Sale / New)

**KHÔNG:**
- Không animation entry
- Không ẩn giá

---

### 3.6 Promotional Banner (Mid-page Campaign)

**Mục tiêu:** Push sale / urgency

**Layout:**
- Full width banner hoặc split 50/50

**Content:**
- "FLASH SALE - 48 HOURS ONLY"
- CTA: "Shop Sale"

**Design:**
- Background khác biệt rõ với phần trên
- Có thể dùng màu accent

---

### 3.7 Product Grid (Explore More)

**Mục tiêu:** Cho user browse thêm

**Title:**
- "You May Also Like"
- hoặc "Explore More"

**Grid:**
- Mobile: 2 cột
- Tablet: 3 cột
- Desktop: 4 cột

**Behavior:**
- Lazy load (trừ first 4 items)
- Có thể có nút "Load More"

---

### 3.8 Social Proof / Reviews

**Mục tiêu:** Tăng trust

**Content:**
- Rating summary (⭐ 4.8/5)
- 2–3 review nổi bật
- User avatar + name

**Optional:**
- Instagram gallery (UGC)

---

### 3.9 Brand Story (Short)

**Mục tiêu:** Branding nhẹ (KHÔNG dài)

**Content:**
- 2–3 dòng:
  - "We create everyday essentials for modern lifestyle"

**CTA:**
- "Learn More"

**Lưu ý:**
- Không viết essay dài
- Không chiếm nhiều space

---

### 3.10 Footer

**Cấu trúc:**

**Column 1:**
- Logo
- Short description

**Column 2:**
- Shop (Nam, Nữ, Sale)

**Column 3:**
- Support (Contact, Shipping, Returns)

**Column 4:**
- Newsletter signup

**Bottom:**
- Payment icons (Visa, MasterCard…)
- Copyright

---

## 4. Spacing Rules

- Section spacing: `py-12 md:py-16`
- Grid gap: `gap-3 md:gap-4`
- Container: `max-w-7xl mx-auto px-4 md:px-6`

---

## 5. Performance Rules

- Hero image:
  - `fetchpriority="high"`
  - KHÔNG lazy load
- First 4 products:
  - `loading="eager"`
- Remaining:
  - `loading="lazy"`
- Use WebP + proper width/height

---

## 6. Mobile-First Rules

- Product grid luôn 2 cột
- CTA button ≥ 44px height
- Không popup ngay khi load
- Search dễ access (icon → expand)
- Không sticky banner che nội dung

---

## 7. Conversion Checklist

- [ ] CTA rõ ràng trong hero
- [ ] Giá visible trên mọi sản phẩm
- [ ] Có section Best Sellers
- [ ] Có trust signals
- [ ] Không animation làm chậm UX
- [ ] Layout đơn giản, dễ scan
- [ ] Mobile tối ưu

---

## 8. Anti-Patterns (TUYỆT ĐỐI TRÁNH)

- Hero chỉ có slogan mơ hồ
- Grid 1 cột trên mobile
- Giá bị ẩn
- Quá nhiều màu sắc
- Popup xuất hiện ngay khi load
- Carousel chạy quá nhanh
- Design giống template cũ (Bootstrap style)

---

## 9. Summary

Home page tốt = user:

1. Hiểu bạn bán gì trong 3 giây
2. Thấy sản phẩm ngay
3. Có lý do để mua (sale / trust / social proof)
4. Click vào sản phẩm mà không cần suy nghĩ

👉 Nếu user phải “tìm hiểu” cách mua → fail.
👉 Nếu user thấy sản phẩm và muốn mua ngay → success.
```

---

Nếu bạn muốn, mình có thể **convert file này thành HTML + Tailwind full trang home (production-ready)** theo đúng spec này (chuẩn mobile + tối ưu conversion).
