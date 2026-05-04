# 🛒 Documentation: Home Page Structure - POD Clothing Store

Tài liệu hướng dẫn chi tiết về nội dung, bố cục và chiến lược UX cho trang chủ, tập trung vào đối tượng Gen Z & Millennials Mỹ.

---

## 1. Tổng quan chiến lược (The "Vibe" Strategy)
*   **Mục tiêu:** Giảm tỷ lệ thoát (Bounce rate) trong 3 giây đầu bằng hình ảnh mạnh mẽ và chuyển đổi nhanh qua Mobile-first UI.
*   **Ngôn ngữ:** Sassy, tự tin, dùng slang phù hợp (no cringe).
*   **Ưu tiên:** Hình ảnh Lifestyle > Ảnh Studio.

---

## 2. Bố cục chi tiết (Section-by-Section)

### 2.1. Global Header (Sticky)
*   **Trái:** Hamburger Menu (Mở ra Bottom Sheet).
*   **Giữa:** Logo (Typography-based, bold).
*   **Phải:** Search icon & Shopping Cart (có badge số lượng).
*   **Behavior:** Nền trong suốt trên Hero, chuyển sang White Paper (`--color-paper`) khi cuộn.

### 2.2. Hero Section (The Hook)
*   **Visual:** Full-bleed image/video (Tỷ lệ 9:16 trên mobile). Ảnh model mặc "Key Look" của bộ sưu tập mới nhất.
*   **Content:**
    *   **Headline:** `--text-hero`. Nội dung: "NEW DRIP JUST DROPPED" hoặc "MAIN CHARACTER ENERGY".
    *   **Sub-headline:** "Limited edition pieces for the bold."
*   **CTA:** Button Primary (`--color-ink`). Text: "Shop the Fit →".
*   **UX Note:** Đặt CTA trong "Thumb Zone" (cách đáy màn hình khoảng 1/3).

### 2.3. Quick Nav / Categories (The Shortcut)
*   **Visual:** Hàng ngang scroll (Horizontal scroll). Các item hình tròn kèm label bên dưới.
*   **Items:** `Tees`, `Hoodies`, `Accessories`, `Best Sellers`, `Sale 🔥`.
*   **Mục đích:** Giúp user lọc nhanh nhu cầu mà không cần mở menu.

### 2.4. Featured Collection (The Meat)
*   **Headline:** `--text-h2` - "Weekly Must-Cops".
*   **Layout:** Grid 2 cột trên Mobile / 4 cột trên Desktop.
*   **Product Card Components:**
    *   Ảnh tỷ lệ 4:5.
    *   Hover effect (Desktop): Đổi sang ảnh detail.
    *   Badge: "New" (Lime) hoặc "Limited" (Accent).
*   **CTA:** Nút "Quick Add +" nhỏ ở góc card hoặc text link "View Details".

### 2.5. Editorial / Brand Moment (The Story)
*   **Visual:** 1 ảnh lớn hoặc 2 ảnh lệch trục (asymmetry).
*   **Content:** Giới thiệu về chất liệu hoặc ý nghĩa bộ sưu tập.
*   **Copy:** "Not just a tee, it's a statement. Sustainably made, uniquely yours."
*   **Tone:** Khẳng định cá tính thương hiệu.

### 2.6. Social Proof / Community (The Trust)
*   **Headline:** "Styled by You #BrandName".
*   **Layout:** Masonry Grid (kiểu Pinterest/Instagram).
*   **Content:** Ảnh User-Generated Content (UGC).
*   **Interaction:** Click vào ảnh hiện ra sản phẩm khách đang mặc để "Shop the look".

### 2.7. Value Props (The Logic)
*   **Giao diện:** Đơn giản, dùng `--font-mono`.
*   **3 cột/icon:**
    *   📦 Fast Shipping (US wide).
    *   ♻️ Printed on Demand (No waste).
    *   🔒 Secure Checkout.

### 2.8. Newsletter (The Retain)
*   **Background:** `--color-lime` hoặc `--gray-900` để tách biệt với phần trên.
*   **Copy:** "Don't ghost us. Get early access to drops."
*   **Input:** Border-bottom only hoặc tối giản. Button All-caps.

---

## 3. Quy tắc nội dung (Copywriting Guidelines)

| Vị trí | Nên dùng (Do) | Không nên dùng (Don't) |
| :--- | :--- | :--- |
| **CTA** | "Grab yours", "Lock it in", "Shop the drop" | "Buy now", "Purchase", "See more" |
| **Thông báo** | "Low stock! Moving fast 💨" | "Out of stock soon" |
| **Tiêu đề** | "Your new uniform", "The OG collection" | "Our Products", "Featured Items" |

---

## 4. Danh sách kiểm tra Mobile UX (Checklist)

1.  [ ] **Target size:** Mọi nút bấm tối thiểu 48px cao.
2.  [ ] **One-hand navigation:** Menu và các bộ lọc quan trọng nằm ở nửa dưới màn hình.
3.  [ ] **Loading:** Sử dụng Skeleton screen cho Product Cards.
4.  [ ] **Typography:** Body text không nhỏ hơn 16px để tránh zoom lỗi trên iOS.
5.  [ ] **Imagery:** Ảnh đã được nén WebP, đảm bảo LCP (Largest Contentful Paint) < 2s.

---

## 5. Cấu trúc CSS Tokens áp dụng (Snippet)
```css
/* Áp dụng cho Container Trang chủ */
.home-container {
  background-color: var(--color-paper);
  padding-bottom: var(--space-12); /* Tránh Home Indicator của iPhone */
}

/* Khoảng cách giữa các Section */
section {
  margin-bottom: var(--space-16); /* 64px - Tạo sự thoáng đãng (breathable) */
}

/* Headline Hero Mobile */
.hero-title {
  font-family: var(--font-display);
  font-size: var(--text-hero);
  line-height: 1.05;
  letter-spacing: -0.04em;
}