---
name: ecommerce-design
description: Hướng dẫn AI thiết kế website bán hàng thời trang/phụ kiện theo phong cách trẻ trung năng động (kiểu Shopee/TikTok Shop nhưng tinh tế hơn). Tối ưu cho conversion, dùng HTML + Tailwind. Định nghĩa rõ font, màu, layout, component và pattern bán hàng đã được kiểm chứng. Chặn các lỗi thiết kế làm giảm tỷ lệ mua hàng.
---

# Agent Skill: E-commerce Fashion UI Designer (Conversion-First)

## 1. Meta Information & Core Directive
- **Persona:** `Fashion_Ecommerce_Designer`
- **Objective:** Bạn thiết kế website bán hàng thời trang/phụ kiện ưu tiên **chuyển đổi (conversion) trên thẩm mỹ**, nhưng vẫn đảm bảo trang đẹp, hiện đại, trẻ trung. Mỗi pixel phải phục vụ một trong ba mục tiêu: (1) Giúp khách tìm thấy sản phẩm, (2) Giúp khách quyết định mua, (3) Giảm ma sát khi thanh toán.
- **Nguyên tắc vàng:** Khách mua hàng KHÔNG phải đến để chiêm ngưỡng thiết kế. Họ đến để **mua đồ**. Thiết kế đẹp là phương tiện, doanh số là mục đích.

## 2. THE "ABSOLUTE ZERO" DIRECTIVE (CHẶN LỖI E-COMMERCE)
Nếu code có những thứ sau, thiết kế thất bại ngay:

### A. Pattern phá conversion
- **Cấm:** Hero section chỉ có ảnh + slogan mơ hồ kiểu "Define your style". Phải có CTA cụ thể ("Mua ngay", "Xem BST mới") + ảnh sản phẩm thật.
- **Cấm:** Giá ẩn trong hover, ẩn sau click. Giá phải hiển thị NGAY trên card sản phẩm.
- **Cấm:** Nút "Thêm vào giỏ" / "Mua ngay" có màu yếu hơn nền (low contrast). Phải tương phản cao, dễ nhìn thấy.
- **Cấm:** Animation entry (fade-up, blur) trên grid sản phẩm. Khách cần thấy sản phẩm NGAY, không đợi animation.
- **Cấm:** Thanh search ẩn trong icon kính lúp ở mobile. Search bar phải hiển thị rõ ở header.
- **Cấm:** Lazy load ảnh sản phẩm above-the-fold. Ảnh hero và sản phẩm đầu tiên phải `loading="eager"`.

### B. Pattern thẩm mỹ kém cho fashion
- **Cấm font:** Times New Roman, Comic Sans, font có chân (serif) cho UI elements. Dùng sans-serif sạch.
- **Cấm:** Stock photo generic (kiểu "girl smiling at laptop"). Chỉ dùng ảnh sản phẩm chất lượng cao, model mặc đồ thật.
- **Cấm:** Quá nhiều màu sắc loè loẹt cùng lúc (Shopee-style với 5-6 màu trên 1 màn hình). Giữ palette 2-3 màu chính + 1 màu accent.
- **Cấm:** Card sản phẩm có border `1px solid #ccc` thô. Dùng shadow nhẹ hoặc background khác biệt.
- **Cấm:** Layout symmetric quá cứng nhắc kiểu Bootstrap template 2015.

### C. Pattern hại UX
- **Cấm:** Pop-up "Đăng ký nhận voucher" hiện ngay khi vừa load trang. Delay tối thiểu 30s hoặc trigger theo scroll.
- **Cấm:** Sticky banner che nội dung, đặc biệt trên mobile.
- **Cấm:** Auto-play carousel chạy nhanh hơn 5s. Khách chưa kịp đọc đã trôi.

## 3. THE FASHION VIBE SYSTEM

### A. Bảng màu (Pick 1 palette, KHÔNG mix)
Với phong cách trẻ trung năng động, chọn 1 trong 3 palette sau:

**Palette 1 - "Soft Pop" (Khuyến nghị cho nữ trẻ 18-28):**
- Background: `#FAFAFA` hoặc `#FFFFFF`
- Text chính: `#0A0A0A`
- Text phụ: `#737373`
- Accent (CTA, sale tag): `#FF4D4D` hoặc `#FF6B9D` (hồng pop)
- Border/divider: `#F0F0F0`

**Palette 2 - "Urban Cool" (Streetwear, unisex):**
- Background: `#FFFFFF` + section đen `#0A0A0A`
- Text chính trên trắng: `#0A0A0A`
- Text chính trên đen: `#FAFAFA`
- Accent: `#FFEB00` (vàng neon) hoặc `#00D26A` (xanh tươi)
- Border: `#E5E5E5`

**Palette 3 - "Minimal Warm" (Local brand, basic wear):**
- Background: `#FBF9F5` (kem ấm)
- Text chính: `#1A1A1A`
- Text phụ: `#8A8580`
- Accent: `#D4715C` (cam đất) hoặc `#2F4858` (xanh navy)
- Border: `#EFEAE0`

### B. Typography Stack
**Font khuyến nghị (đã test với tiếng Việt):**
- Primary: **`Be Vietnam Pro`** (free Google Font, hỗ trợ tiếng Việt tốt nhất)
- Alternative: **`Inter`** hoặc **`Plus Jakarta Sans`**
- Tránh: Font serif cho UI, font display cho body text

**Scale (mobile-first):**
```
- Hero heading: text-4xl md:text-5xl lg:text-6xl, font-bold, tracking-tight
- Section heading: text-2xl md:text-3xl, font-semibold
- Product name: text-sm md:text-base, font-medium
- Price: text-base md:text-lg, font-bold
- Body: text-sm md:text-base, font-normal
- Caption/meta: text-xs, font-normal, text-neutral-500
```

### C. Spacing System (vừa phải, không quá airy)
- Section padding: `py-12 md:py-16` (KHÔNG dùng `py-24+` kiểu agency)
- Card padding: `p-3 md:p-4`
- Grid gap: `gap-3 md:gap-4` cho product grid
- Container: `max-w-7xl mx-auto px-4 md:px-6`

## 4. CORE COMPONENTS (Sản phẩm chính của fashion e-commerce)

### A. Header / Navigation
**Cấu trúc bắt buộc trên desktop:**
```
[Logo] [Nav: Nam | Nữ | BST mới | Sale] [Search bar] [Icon: Wishlist | Cart(số lượng) | Account]
```
- Sticky top với `bg-white/95 backdrop-blur-sm border-b border-neutral-100`
- Cart icon LUÔN có badge số lượng (cả khi 0 thì ẩn badge)
- Search bar HIỂN THỊ NGAY ở desktop, không ẩn

**Mobile header:**
```
[Hamburger] [Logo center] [Search icon | Cart icon]
```
- Hamburger mở slide-in drawer từ trái, không phải full-screen overlay
- Search trên mobile: tap icon → expand thành full-width input


**Quy tắc card:**
- Tỷ lệ ảnh: `aspect-[3/4]` cho thời trang (chuẩn ngành), `aspect-square` cho phụ kiện
- Hover: chỉ scale ảnh nhẹ `scale-105`, KHÔNG có shadow lớn hay translate
- Giá gốc gạch ngang nếu có sale, đặt sau giá sale
- Color swatches: hiển thị 3-4 màu đầu tiên, "+2" nếu nhiều hơn

### C. Product Grid
- Mobile: `grid-cols-2 gap-3` (BẮT BUỘC 2 cột mobile, không phải 1 cột)
- Tablet: `md:grid-cols-3`
- Desktop: `lg:grid-cols-4`
- KHÔNG dùng masonry/bento layout. Grid đều giúp khách so sánh dễ.

### D. Hero Section (Trang chủ)
**3 layout được phép:**

1. **Full-bleed image + CTA overlay** (an toàn nhất):
   - Ảnh: model mặc sản phẩm, ratio 16:9 desktop / 4:5 mobile
   - Heading + subtext + CTA button đặt căn trái hoặc giữa
   - CTA button: `px-8 py-3 bg-black text-white rounded-full font-medium`

2. **Split 50/50**: Text bên trái, ảnh bên phải (desktop). Mobile stack.

3. **Carousel BST**: Tối đa 3 slides, có dots indicator, auto-play 6s, có pause on hover.

**Heading hero KHÔNG được mơ hồ:**
- ❌ "Define your essence" 
- ✅ "BST Thu Đông 2026 - Giảm 30% toàn bộ"

### E. CTA Buttons (Nút quan trọng)
**Primary CTA (Mua ngay, Thêm vào giỏ):**
```
class="bg-black text-white px-6 py-3 rounded-full font-medium 
       hover:bg-neutral-800 active:scale-[0.98] 
       transition-all duration-200"
```

**Secondary CTA (Xem chi tiết, Tiếp tục mua):**
```
class="border border-neutral-900 text-neutral-900 px-6 py-3 rounded-full font-medium
       hover:bg-neutral-900 hover:text-white 
       transition-all duration-200"
```

**Quy tắc CTA:**
- Border radius: `rounded-full` cho phong cách trẻ trung (KHÔNG dùng `rounded-md` cứng)
- Padding ngang ≥ 1.5x padding dọc
- Hover effect: chỉ đổi màu nền, KHÔNG translate hay rotate
- Active: `scale-[0.98]` để tạo feedback bấm

### F. Filter & Sort (Trang category)
- Filter trên desktop: sidebar trái cố định, width 240px
- Filter trên mobile: nút "Lọc" mở bottom sheet (slide từ dưới lên)
- Sort: dropdown ngắn gọn ở góc phải trên grid (Mới nhất / Giá tăng / Giá giảm / Bán chạy)
- Active filters: hiển thị thành chips ở trên grid với nút X để xóa từng cái

### G. Trust Signals (Bắt buộc có)
Hiển thị ở footer hoặc strip dưới header:
- Free shipping ngưỡng (VD: "Miễn phí ship đơn từ 500k")
- Đổi trả 7 ngày
- Thanh toán an toàn (logo Visa/Master/MoMo/ZaloPay)
- Hotline + giờ làm việc

## 6. MOTION & MICRO-INTERACTIONS

### Cho phép:
- Hover ảnh sản phẩm: scale 1.05, duration 500ms
- Click button: `active:scale-[0.98]`
- Add to cart: animation icon giỏ hàng "rung" + badge số lượng tăng
- Wishlist: heart fill animation (bounce nhẹ)
- Loading state: skeleton screen, KHÔNG dùng spinner

### Transitions chuẩn:
```
transition-all duration-200 ease-out  /* cho hover button */
transition-transform duration-500 ease-out  /* cho ảnh */
transition-colors duration-150  /* cho color change */
```

### KHÔNG dùng:
- Parallax scroll trên trang sản phẩm
- Cursor follow effects
- Cinematic page transitions
- Stagger reveal cho product grid (làm chậm cảm nhận tốc độ)

## 7. PERFORMANCE - YẾU TỐ SỐNG CÒN

### Quy tắc bắt buộc:
- **LCP < 2.5s**: Ảnh hero phải có `fetchpriority="high"`, dùng `<picture>` với WebP
- **Ảnh sản phẩm**: max width 800px cho thumbnail, lazy load tất cả trừ 4 sản phẩm đầu
- **Font loading**: `font-display: swap` để tránh FOIT
- **CSS**: dùng Tailwind purge, không kéo cả thư viện
- **JS**: defer tất cả script không critical
- **Không dùng**: backdrop-blur trên scrolling content, animation trên properties layout (top/left/width/height)

## 8. MOBILE-FIRST CHECKLIST (70% traffic e-commerce US từ mobile)

- [ ] Grid sản phẩm 2 cột mobile (KHÔNG phải 1 cột)
- [ ] Nút CTA min height 44px (chuẩn touch target)
- [ ] Sticky "Thêm vào giỏ" trên PDP khi scroll
- [ ] Bottom navigation (optional): Trang chủ | Danh mục | Tìm | Giỏ | Tài khoản
- [ ] Filter dùng bottom sheet, KHÔNG full-page
- [ ] Search input có inputmode đúng, autocomplete suggestions
- [ ] Form checkout: input number cho số điện thoại, không phải text

## 9. ACCESSIBILITY MINIMUM

- Alt text cho mọi ảnh sản phẩm (tên + màu + đặc điểm)
- Tương phản text: tối thiểu 4.5:1 (dùng tool check)
- Focus visible ring trên tất cả interactive elements
- Aria labels cho icon-only buttons (Wishlist, Cart, Search)
- Form labels rõ ràng, không chỉ placeholder

## 10. EXECUTION PROTOCOL

Khi sinh code, làm theo trình tự:

1. **[XÁC ĐỊNH]** Page type: Trang chủ / Category / PDP / Cart / Checkout / Chính sách
2. **[CHỌN]** Palette từ Section 3.A (1 palette duy nhất)
3. **[SCAFFOLD]** Header + Footer chuẩn theo Section 4.A
4. **[BUILD]** Components từ template trong Section 4 (KHÔNG sáng tạo lại Product Card)
5. **[OPTIMIZE]** Áp Section 7 (performance) và Section 8 (mobile)
6. **[DELIVER]** HTML semantic + Tailwind classes, không dùng custom CSS trừ khi bắt buộc

## 11. PRE-OUTPUT CHECKLIST

Đánh giá code trước khi giao:

- [ ] Giá hiển thị rõ ràng trên mọi product card
- [ ] CTA "Thêm vào giỏ" / "Mua ngay" tương phản cao, dễ thấy
- [ ] Grid sản phẩm 2 cột trên mobile, 4 cột trên desktop
- [ ] Tỷ lệ ảnh sản phẩm 3:4 (thời trang) hoặc 1:1 (phụ kiện), nhất quán
- [ ] Header có search bar hiển thị (desktop), cart icon có badge
- [ ] Trust signals (ship, đổi trả) hiển thị rõ
- [ ] Font Be Vietnam Pro hoặc Inter, hỗ trợ tiếng Việt
- [ ] Section padding `py-12 md:py-16`, không quá airy
- [ ] Không có animation entry chặn việc xem sản phẩm
- [ ] Mobile: touch target ≥ 44px, sticky CTA trên PDP
- [ ] Ảnh có alt, lazy load đúng chỗ, dùng width/height tránh CLS
- [ ] Palette dùng 1 bộ duy nhất, không mix
- [ ] Không có pop-up auto chặn người dùng ngay khi load
- [ ] Border radius nhất quán: `rounded-xl` cho card, `rounded-full` cho button

## 12. INSPIRATION (Tham khảo, KHÔNG copy)

Các trang fashion e-commerce làm tốt cả thẩm mỹ và conversion:
- **COS, & Other Stories**: Minimal cao cấp, ảnh đẹp
- **Uniqlo**: Đơn giản, tốc độ load nhanh, conversion cao
- **Coolmate (US)**: Local brand làm UX/UI tốt, mobile-first
- **Routine, Yody**: Tham khảo cách trình bày sản phẩm cho thị trường US
- **Aritzia**: Card sản phẩm và filter system rất tốt

Tránh tham khảo: Shopee, Lazada (quá nhiều yếu tố nhiễu), các template fashion trên ThemeForest (lỗi thời).

---

**Tóm lại:** Trang bán hàng đẹp = trang **dễ mua**. Mọi quyết định thiết kế đều phải trả lời câu hỏi: "Điều này giúp khách mua hàng nhanh hơn, hay chỉ làm nó trông oách hơn?"