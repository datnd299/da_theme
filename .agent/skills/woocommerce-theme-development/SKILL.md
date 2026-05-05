---
name: woocommerce-theme-design
description: Skill cho AI agent (Claude Code, Cursor, Windsurf...) phát triển một WooCommerce theme đơn giản tập trung vào bán hàng thời trang/phụ kiện. Định nghĩa rõ phạm vi file được phép sửa, cách viết CSS thuần với CSS variables để style các class của WooCommerce, và pattern thiết kế trẻ trung năng động tối ưu cho conversion. Tuyệt đối không sửa file ngoài phạm vi cho phép.
---

# Skill: WooCommerce Theme Developer (Conversion-First, CSS Variables Only)

## 1. Cấu trúc dự án và phạm vi file


### 1.1. Sơ đồ thư mục theme,  Quy tắc file - TUYỆT ĐỐI tuân thủ

**AI ĐƯỢC PHÉP sửa:**
- `assets/css/tailwind-input.css` Theme cho tailwind
- `assets/css/shop.css` File css dành riêng cho trang shop - không dính đến tailwind, chỉ CSS thuần
- `assets/css/product.css` File css dành riêng cho trang shop - không dính đến tailwind, chỉ CSS thuần
- `assets/css/cart.css` File css dành riêng cho trang shop - không dính đến tailwind, chỉ CSS thuần
- `assets/css/checkout.css` File css dành riêng cho trang shop - không dính đến tailwind, chỉ CSS thuần
- `template-parts/*.php` File cho các trang khác dùng html + php + tailwind (không dính đến các file css khác)

**AI ĐƯỢC PHÉP đọc (để hiểu cấu trúc HTML):**
- Toàn bộ `/.plans/templates/*.html`

## 2. Quy tắc viết CSS - CSS thuần + Variables

### 2.1. Nguyên tắc bất di bất dịch

**KHÔNG dùng @apply** với Tailwind utilities trong các file CSS. Lý do: tách biệt rõ giữa "theme tokens" (define ở `tailwind-input.css`) và "WooCommerce styling" (CSS thuần ở 4 file còn lại). Khi user đổi token, mọi style WooCommerce tự cập nhật.

**CHỈ dùng:**
- CSS thuần (selector + properties)
- CSS variables từ `tailwind-input.css` (truy cập qua `var(--color-foreground)` v.v.)
- Pseudo-classes, pseudo-elements, media queries chuẩn
- CSS nesting hiện đại (browser hỗ trợ tốt từ 2023)

### 2.2. Cấu trúc `tailwind-input.css`

Đây là **single source of truth** cho theme tokens. Mọi giá trị màu, font, spacing, easing đều phải định nghĩa ở đây.

```css
@import "tailwindcss";

@theme {
  /* === COLORS === */
  /* Background layers */
  --color-background: #FDFBF7;        /* Nền chính */
  --color-surface: #FFFFFF;            /* Card, modal */
  --color-surface-alt: #F5F2EC;        /* Nền phụ, hover state */

  /* Text */
  --color-foreground: #1A1512;         /* Text chính */
  --color-foreground-muted: #6B635C;   /* Text phụ */
  --color-muted: #8B9D83;              /* Caption, placeholder */
}
```

**Quy tắc khi sửa `tailwind-input.css`:**
- Chỉ thêm/sửa biến trong khối `@theme`, KHÔNG viết CSS rules
- Đặt tên biến theo pattern `--color-*`, `--font-*`, `--radius-*`, `--shadow-*`
- Khi thêm biến mới, group theo section comment (COLORS, TYPOGRAPHY...)
- KHÔNG xóa biến mặc định (background, surface, foreground, muted, font-sans, font-heading, ease-fluid)

### 2.4. Nguyên tắc selector

- **Ưu tiên class WooCommerce gốc** (`.woocommerce`, `.product`, `.cart_item`, `.woocommerce-Price-amount`...)
- **Không dùng `!important`** trừ khi override style inline của plugin (và phải comment lý do)
- **Không nesting quá 3 cấp** để dễ đọc
- **Không dùng ID selector** (`#...`) cho styling
- **Specificity tối thiểu** - một class là đủ, không cộng thêm tag

## 6. Workflow chuẩn cho AI agent

Khi nhận yêu cầu, AI agent phải làm theo trình tự sau:

### Bước 1: Xác định phạm vi
Yêu cầu thuộc trang nào? Shop / Product / Cart / Checkout / Theme tokens?
→ Xác định 1-2 file cần sửa trong 5 file được phép.

### Bước 2: Đọc HTML reference
Đọc file `templates/[trang].html` tương ứng để hiểu:
- Cấu trúc HTML WooCommerce render ra sao
- Class nào đang được dùng
- Element nào cần style

### Bước 3: Kiểm tra theme tokens
Đọc `tailwind-input.css` hiện tại. Nếu thiếu biến cần dùng → bổ sung trong khối `@theme`.

### Bước 4: Viết CSS
Vào file CSS tương ứng. Tuân thủ:
- CSS thuần, không `@apply`
- Mọi giá trị màu/font/radius/easing dùng `var(--*)`
- Selector ngắn gọn, ưu tiên class WooCommerce gốc
- Mobile-first: viết base styles cho mobile, dùng `@media (min-width: ...)` cho desktop

### Bước 5: Self-check
Chạy qua checklist Section 7 trước khi báo xong.

### Bước 6: Báo cáo
Tóm tắt:
- File đã sửa
- Block CSS đã thêm/đổi
- Biến mới thêm vào `tailwind-input.css` (nếu có)
- Lưu ý cho user (nếu có dependency với HTML mẫu)

## 7. Pre-output checklist

Trước khi commit CSS, AI tự kiểm:

- [ ] Chỉ sửa file trong danh sách 5 file được phép?
- [ ] Không có `@apply` nào?
- [ ] Không có hex/rgb hard-code? Tất cả màu dùng `var(--color-*)`?
- [ ] Không có font name hard-code? Dùng `var(--font-*)`?
- [ ] Easing và duration dùng `var(--ease-*)`, `var(--duration-*)`?
- [ ] Không có `!important` (hoặc có comment lý do)?
- [ ] Không có ID selector cho styling?
- [ ] Specificity tối thiểu?
- [ ] Mobile-first (base = mobile, media query = desktop)?
- [ ] Animation chỉ dùng `transform`, `opacity`, `color`, `background`?
- [ ] Border radius nhất quán (theo system: card lg, button pill, input md)?
- [ ] CTA chính có tương phản cao, dễ nhìn thấy?
- [ ] Giá hiển thị rõ trên product card?
- [ ] Grid sản phẩm 2 cột mobile, không phải 1 cột?
- [ ] Touch target ≥ 44px trên mobile (buttons, links, qty controls)?
- [ ] Form input có focus state rõ ràng?
- [ ] Không animation entry blocking trên product grid?

## 8. Khi nào dừng và hỏi user

AI agent phải dừng và hỏi nếu:

1. User yêu cầu sửa file ngoài 5 file được phép
2. User yêu cầu thêm JS, plugin, hoặc thay đổi build pipeline
3. HTML mẫu trong `templates/` không khớp với class WooCommerce thực tế (báo để user check)
4. Cần thay đổi token theme (màu/font chính) - confirm trước khi sửa `tailwind-input.css`
5. Yêu cầu mâu thuẫn với checklist Section 7

KHÔNG tự ý mở rộng phạm vi. Thà hỏi nhiều, còn hơn phá theme.