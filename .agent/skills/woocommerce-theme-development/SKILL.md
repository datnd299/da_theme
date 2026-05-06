---
name: woocommerce-theme-development
description: Kỹ năng dành cho các AI agent (Claude Code, Cursor, Windsurf...) để phát triển một theme WooCommerce đơn giản, tập trung vào bán hàng. Nội dung các trang được fix cứng để đảm bảo dễ phát triển trang load nhanh. Xác định rõ phạm vi file được phép chỉnh sửa.
---

# Kỹ năng: WooCommerce Theme Developer (Tối ưu chuyển đổi)

## 1. Cấu trúc dự án và phạm vi file

Thông tin website được định nghĩa trong `.plans/site.md` — **PHẢI TUÂN THỦ NGHIÊM NGẶT**.
Mô tả design system được định nghĩa trong `.plans/design_system.md` — **PHẢI TUÂN THỦ NGHIÊM NGẶT**.
HTML template tham chiếu được định nghĩa trong `/.plans/templates/*.html` — **ĐƯỢC ĐỌC để hiểu cấu trúc HTML, nhưng KHÔNG được chỉnh sửa

### 1.1. Cấu trúc thư mục theme & quy tắc file — BẮT BUỘC TUÂN THỦ, Nội dung các File phải tuân thuộc `.plans/site.md` và `.plans/design_system.md`

**File CSS chính, AI ĐƯỢC PHÉP chỉnh sửa**
* `assets/css/main.css` → File CSS chính, dùng cho tất cả các trang, chỉ chứa CSS thuần (không dùng Tailwind), ngắn gọn, chứa các css chung (variable, css cho các component phổ biến)

**Header & Footer, AI ĐƯỢC PHÉP chỉnh sửa**
* `header.php` → Header dùng HTML + PHP + Tailwind
* `footer.php` → Footer dùng HTML + PHP + Tailwind

**Các trang tĩnh AI ĐƯỢC PHÉP chỉnh sửa, dùng tailwind cho các trang này**
* `assets/css/tailwind-input.css` → chứa các variable cho theme
* `template-parts/page-home.php` → Nội dung cho trang chủ dùng HTML + PHP + Tailwind
* `template-parts/page-contact.php` → Nội dung cho trang liên hệ dùng HTML + PHP + Tailwind
* `template-parts/page-about.php` → Nội dung cho trang About Us dùng HTML + PHP + Tailwind
* `template-parts/page-faq.php` → Nội dung cho trang FAQ dùng HTML + PHP + Tailwind
* `template-parts/page-privacy.php` → Nội dung cho trang Privacy Policy dùng HTML + PHP + Tailwind
* `template-parts/page-shipping-returns.php` → Nội dung cho trang Shipping & Returns dùng HTML + PHP + Tailwind
* `template-parts/page-terms.php` → Nội dung cho trang Terms & Conditions dùng HTML + PHP + Tailwind
* `404.php` → Nội dung cho trang 404 dùng HTML + PHP + Tailwind

**Các trang của Woocommerce và CSS của nó AI ĐƯỢC PHÉP chỉnh sửa**,
* `woocommerce/archive-product.php` → Nội dung trang shop (dùng HTML + PHP, không dùng Tailwind)
* `woocommerce/content-product.php` → Nội dung trang sản phẩm (dùng HTML + PHP, không dùng Tailwind)
* `assets/css/shop.css` → CSS cho trang shop (CSS cho các class của woocommerce, không dùng Tailwind) cấu trúc html tham chiếu trong `.plans/templates/shop.html`
* `assets/css/product.css` → CSS cho trang sản phẩm (CSS cho các class của woocommerce, không dùng Tailwind) cấu trúc html tham chiếu trong `.plans/templates/product.html`
* `assets/css/cart.css` → CSS cho trang giỏ hàng (CSS cho các class của woocommerce, không dùng Tailwind) cấu trúc html tham chiếu trong `.plans/templates/cart.html`
* `assets/css/checkout.css` → CSS cho trang checkout và thank you page (CSS cho các class của woocommerce, không dùng Tailwind) cấu trúc html tham chiếu trong `.plans/templates/checkout.html` và `.plans/templates/thank-you.html`
* `assets/css/track-order.css` → CSS cho trang Track Order (CSS cho các class của woocommerce, không dùng Tailwind) cấu trúc html tham chiếu trong `.plans/templates/track-order.html`

**File JS chung, AI ĐƯỢC PHÉP chỉnh sửa**
* `assets/js/main.js` → File JS chính, dùng cho tất cả các trang, chỉ chứa JS thuần, ngắn gọn

### 1.2. Các folder, file không cần đọc và chỉnh sửa
* `assets/css/tw/**` → Folder chứa các file Tailwind đã build, không cần đọc và chỉnh sửa
* `dist/**` → Folder chứa theme đã build không cần đọc và chỉnh sửa

---

## 2. Quy tắc CSS — CSS thuần + Variables

### 2.1. Nguyên tắc bắt buộc

**KHÔNG được dùng `@apply`** với utility của Tailwind trong file CSS.
Lý do: cần tách rõ “theme tokens” (định nghĩa trong `tailwind-input.css`) và “style WooCommerce” (CSS thuần ở các file còn lại). Khi token thay đổi, toàn bộ style WooCommerce sẽ tự động cập nhật.

**CHỈ ĐƯỢC DÙNG:**

* CSS thuần (selector + property)
* CSS variables từ `tailwind-input.css` (dùng `var(--color-foreground)`, ...)
* Pseudo-class, pseudo-element, media query chuẩn
* CSS nesting hiện đại (được hỗ trợ tốt từ 2023)

---

### 2.2. Cấu trúc của `tailwind-input.css`

Đây là **nguồn duy nhất (single source of truth)** cho theme tokens.
Mọi giá trị về màu sắc, font, spacing, easing phải được định nghĩa tại đây.

```css
@import "tailwindcss";

@theme {
  /* === COLORS === */
  /* Background layers */
  --color-background: #FDFBF7;        /* Nền chính */
  --color-surface: #FFFFFF;           /* Card, modal */
  --color-surface-alt: #F5F2EC;       /* Nền phụ, hover */

  /* Text */
  --color-foreground: #1A1512;        /* Text chính */
  --color-foreground-muted: #6B635C;  /* Text phụ */
  --color-muted: #8B9D83;             /* Caption, placeholder */
}
```

**Quy tắc khi chỉnh sửa `tailwind-input.css`:**

* Chỉ thêm/sửa biến trong block `@theme`, KHÔNG viết CSS rule
* Dùng naming: `--color-*`, `--font-*`, `--radius-*`, `--shadow-*`
* Khi thêm biến mới, phải group theo comment (COLORS, TYPOGRAPHY...)
* KHÔNG xóa các biến mặc định (background, surface, foreground, muted, font-sans, font-heading, ease-fluid)

---

### 2.4. Nguyên tắc selector

* **Ưu tiên class WooCommerce mặc định** (`.woocommerce`, `.product`, `.cart_item`, `.woocommerce-Price-amount`, ...)
* **Không dùng `!important`** trừ khi override inline style của plugin (phải có comment giải thích)
* **Không nesting quá 3 cấp**
* **Không dùng ID selector** (`#...`) để style
* **Specificity tối thiểu** — chỉ cần 1 class, tránh kết hợp với tag

---

## 6. Workflow chuẩn cho AI Agent

Khi nhận request, AI phải làm theo thứ tự:

### Bước 1: Xác định phạm vi

Request thuộc trang nào? Shop / Product / Cart / Checkout / Theme tokens?
→ Xác định 1–2 file cần chỉnh trong phạm vi cho phép.

---

### Bước 2: Đọc HTML tham chiếu

Đọc file tương ứng trong `templates/[page].html` để hiểu:

* WooCommerce render HTML như thế nào
* Các class được sử dụng
* Những phần tử cần style

---

### Bước 3: Kiểm tra theme tokens

Xem `tailwind-input.css` hiện tại.
Nếu thiếu biến cần thiết → thêm vào trong `@theme`.

---

### Bước 4: Viết CSS

Chỉnh sửa file CSS phù hợp, tuân thủ:

* CSS thuần, không dùng `@apply`
* Mọi màu/font/radius/easing phải dùng `var(--*)`
* Selector ngắn gọn, ưu tiên class WooCommerce
* Mobile-first: base cho mobile, dùng `@media (min-width: ...)` cho desktop

---

### Bước 5: Tự kiểm tra

Đối chiếu checklist ở Section 7 trước khi hoàn thành.

---

### Bước 6: Báo cáo

Tóm tắt:

* Các file đã chỉnh sửa
* Các block CSS thêm/sửa
* Biến mới thêm vào `tailwind-input.css` (nếu có)
* Ghi chú cho user (nếu có phụ thuộc HTML template)

---

## 7. Checklist trước khi output

AI phải kiểm tra:

* [ ] Chỉ chỉnh sửa trong 5 file được phép?
* [ ] Không dùng `@apply`?
* [ ] Không hard-code màu hex/rgb? Tất cả dùng `var(--color-*)`?
* [ ] Không hard-code font? Dùng `var(--font-*)`?
* [ ] Easing & duration dùng `var(--ease-*)`, `var(--duration-*)`?
* [ ] Không dùng `!important` (hoặc có giải thích hợp lý)?
* [ ] Không dùng ID selector?
* [ ] Specificity tối thiểu?
* [ ] Mobile-first?
* [ ] Animation chỉ dùng `transform`, `opacity`, `color`, `background`?
* [ ] Border radius nhất quán (card lg, button pill, input md)?
* [ ] CTA chính nổi bật, tương phản cao?
* [ ] Giá sản phẩm hiển thị rõ trên product card?
* [ ] Grid sản phẩm mobile là 2 cột (không phải 1)?
* [ ] Touch target ≥ 44px trên mobile?
* [ ] Input form có trạng thái focus rõ ràng?
* [ ] Không có animation chặn hiển thị grid sản phẩm?

---

## 8. Khi nào phải dừng và hỏi user

AI **PHẢI dừng lại và hỏi** nếu:

1. User yêu cầu sửa file ngoài 5 file cho phép
2. User yêu cầu thêm JS, plugin, hoặc thay đổi build pipeline
3. HTML trong `templates/` không khớp với class WooCommerce thực tế
4. Cần thay đổi theme tokens (màu, font) → phải xác nhận trước
5. Request mâu thuẫn với checklist Section 7

**Không tự ý mở rộng phạm vi. Hỏi thêm còn hơn phá vỡ theme.**
