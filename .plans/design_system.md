# Design System — POD Clothing Store

> **Quy định Design System cho website bán quần áo Print-on-Demand**
> Đối tượng: Gen Z & Millennials Mỹ (16–32 tuổi)
> Định hướng: Hiện đại, năng động, dễ nhìn, tối ưu mobile-first

---

## 1. Design Principles (Nguyên tắc thiết kế)

| Nguyên tắc | Mô tả |
|---|---|
| **Mobile-first, always** | Mọi component được thiết kế cho màn hình ≤ 390px trước, sau đó scale lên desktop. Trên 70% traffic của Gen Z đến từ điện thoại. |
| **Bold but breathable** | Màu sắc và typography mạnh mẽ, nhưng luôn có không gian nghỉ (whitespace) để mắt người xem không bị quá tải. |
| **Speed of thumb** | Mọi tương tác chính phải đạt được trong vùng "thumb zone" (1/3 dưới màn hình). CTA luôn dễ chạm. |
| **Personality > Perfection** | Ưu tiên cá tính, "vibe" hơn là sự trau chuốt khô khan. Cho phép sự lệch trục, asymmetry có chủ đích. |
| **Accessibility là bắt buộc** | Tuân thủ WCAG 2.1 AA. Contrast tối thiểu 4.5:1 cho text. |

---

## 2. Brand Voice & Tone

- **Voice**: Trẻ trung, tự tin, hơi sassy nhưng không kiêu ngạo. Như một người bạn thân hiểu thời trang.
- **Tone**: Casual, dùng tiếng Anh đời thường, có thể chèn slang (`fit`, `drip`, `vibe`, `must-cop`) nhưng không lạm dụng.
- **Tránh**: Ngôn ngữ corporate (`leverage`, `synergy`), formal (`Dear customer`), hoặc quá trẻ con.

**Ví dụ:**
- ❌ "Please complete your purchase."
- ✅ "Lock in your fit →"

---

## 3. Color System

### 3.1. Primary Palette

| Token | HEX | Usage |
|---|---|---|
| `--color-ink` | `#0A0A0A` | Text chính, header, button primary |
| `--color-paper` | `#FAFAF7` | Background mặc định (warm white, không trắng lạnh) |
| `--color-accent` | `#FF4D2E` | CTA chính, highlight, sale badge (màu cam-đỏ năng lượng) |
| `--color-lime` | `#D4FF3D` | Accent phụ, hover state, "new drop" badge |

### 3.2. Neutral Scale

```
--gray-50:  #F5F5F2
--gray-100: #E8E8E3
--gray-200: #D1D1CA
--gray-400: #8B8B82
--gray-600: #4A4A44
--gray-900: #1A1A18
```

### 3.3. Semantic Colors

| Token | HEX | Dùng cho |
|---|---|---|
| `--color-success` | `#0E8A4A` | Order confirmed, in-stock |
| `--color-warning` | `#E8A317` | Low stock, shipping delay |
| `--color-error` | `#D63B2C` | Form error, out of stock |

### 3.4. Quy tắc sử dụng màu

- **60-30-10 rule**: 60% neutral (paper/ink), 30% secondary, 10% accent.
- KHÔNG dùng gradient tím-hồng generic. Nếu cần gradient: dùng accent → ink, hoặc lime → paper.
- Dark mode: invert sang `--color-ink` làm background, `--color-paper` làm text.

---

## 4. Typography

### 4.1. Font Families

```css
--font-display: "Clash Display", "Inter Display", sans-serif;
--font-body:    "Satoshi", "Inter", -apple-system, sans-serif;
--font-mono:    "JetBrains Mono", "Menlo", monospace;
```

> **Note**: Tránh các font sáo mòn như Inter làm display. Clash Display + Satoshi tạo cảm giác hiện đại, có cá tính riêng.

### 4.2. Type Scale (Mobile-first)

| Token | Mobile | Desktop | Weight | Use case |
|---|---|---|---|---|
| `--text-hero` | 44px / 1.05 | 88px / 1 | 700 | Hero headline |
| `--text-h1` | 32px / 1.1 | 56px / 1.05 | 700 | Page title |
| `--text-h2` | 24px / 1.2 | 36px / 1.15 | 600 | Section title |
| `--text-h3` | 20px / 1.3 | 24px / 1.25 | 600 | Card title |
| `--text-body` | 16px / 1.5 | 16px / 1.6 | 400 | Body text |
| `--text-small` | 14px / 1.45 | 14px / 1.5 | 400 | Caption, label |
| `--text-micro` | 12px / 1.4 | 12px / 1.4 | 500 | Badge, tag |

### 4.3. Quy tắc typography

- Body text **không bao giờ** nhỏ hơn 16px trên mobile (tránh iOS auto-zoom).
- Line-length tối ưu: 50–75 ký tự.
- Letter-spacing âm cho heading lớn (`-0.02em` đến `-0.04em`).
- All-caps chỉ dùng cho label/badge với letter-spacing `+0.05em`.

---

## 5. Spacing & Layout

### 5.1. Spacing Scale (4px base)

```
--space-1:  4px
--space-2:  8px
--space-3:  12px
--space-4:  16px
--space-6:  24px
--space-8:  32px
--space-12: 48px
--space-16: 64px
--space-24: 96px
```

### 5.2. Container & Grid

| Breakpoint | Width | Columns | Gutter | Margin |
|---|---|---|---|---|
| Mobile (default) | < 640px | 4 | 16px | 16px |
| Tablet | 640–1024px | 8 | 24px | 32px |
| Desktop | ≥ 1024px | 12 | 32px | 64px |
| Max container | 1440px | — | — | auto |

### 5.3. Mobile Layout Rules

- **Thumb zone**: CTA chính nằm trong vùng 1/3 dưới màn hình.
- **Sticky elements**: Add-to-cart button luôn sticky bottom trên product page.
- **Safe area**: Padding bottom 24px tối thiểu (tránh home indicator iOS).
- **One-hand reach**: Nav menu mở từ phía dưới (bottom sheet) thay vì top dropdown.

---

## 6. Components

### 6.1. Buttons

| Variant | Background | Text | Border | Use |
|---|---|---|---|---|
| **Primary** | `--color-ink` | `--color-paper` | none | CTA chính (Add to cart, Checkout) |
| **Accent** | `--color-accent` | white | none | Sale, Limited drop |
| **Secondary** | transparent | `--color-ink` | 1.5px solid ink | Action phụ |
| **Ghost** | transparent | `--color-ink` | none | Tertiary action |

**Specs:**
- Height: 48px (mobile), 52px (desktop) — đủ to để chạm thoải mái
- Padding: 16px 24px
- Border-radius: `--radius-pill` (999px) cho CTA chính, `--radius-md` (8px) cho secondary
- Font: 16px / weight 600
- Hover: scale(0.98), bg darken 10%
- Active: scale(0.96)
- Transition: `200ms cubic-bezier(0.4, 0, 0.2, 1)`

### 6.2. Product Card

```
┌─────────────────────┐
│                     │
│     [Image 4:5]     │  ← aspect-ratio luôn 4:5
│                     │
│   [NEW] [♡]         │  ← badge top-left, wishlist top-right
└─────────────────────┘
  Oversized Tee
  $34.99    ★ 4.8 (120)
```

- Image aspect-ratio: **4:5** (tỷ lệ chuẩn cho fashion)
- Hover: image swap sang shot thứ 2 (back/detail view)
- Loading: skeleton với shimmer effect
- Spacing dưới image: 12px
- Title: 16px / weight 500
- Price: 16px / weight 700, accent color khi sale

### 6.3. Forms

- Input height: 52px (mobile-friendly)
- Border: 1.5px solid `--gray-200`, focus → `--color-ink`
- Border-radius: 8px
- Font-size input: **16px** (BẮT BUỘC để tránh iOS zoom)
- Label: 14px, position trên input (không dùng floating label cho form dài)
- Error state: border `--color-error`, message bên dưới với icon
- Padding: 14px 16px

### 6.4. Navigation

**Mobile (< 1024px):**
- Top bar: 56px, sticky, blur backdrop
- Logo center, hamburger trái, cart icon phải với badge số lượng
- Menu mở dạng full-screen overlay với animation slide-up
- Bottom tab bar (optional): Home, Shop, Wishlist, Account

**Desktop:**
- Top bar: 72px
- Logo trái, mega-menu giữa, search/account/cart phải
- Sticky on scroll, transparent → solid background

### 6.5. Other Components

- **Badges**: Pill shape, 12px text, padding 4px 8px. Variants: NEW (lime), SALE (accent), LOW STOCK (warning)
- **Modal/Sheet**: Mobile dùng bottom sheet, desktop dùng centered modal. Backdrop blur 8px.
- **Toast**: Bottom-center mobile, bottom-right desktop. Auto-dismiss 4s.
- **Skeleton loader**: Background `--gray-100` với shimmer animation 1.5s linear infinite.

---

## 7. Imagery & Iconography

### 7.1. Product Photography

- **Aspect ratios**: 4:5 cho card, 1:1 cho thumbnail, 3:4 cho hero
- **Style**: Lifestyle shots > studio plain. Phải có model thực tế, đa dạng (size, race, gender).
- **Background**: Tránh white box studio quá nhiều — mix với context (street, room, outdoor).
- **Color treatment**: Saturation hơi nâng nhẹ (+5–10), contrast vừa phải, warm tone nhẹ.

### 7.2. Iconography

- **Style**: Outline, stroke 1.75px, rounded join
- **Library gợi ý**: Lucide, Phosphor (regular weight), hoặc custom set
- **Size**: 20px (inline), 24px (button), 32px (feature)
- KHÔNG mix nhiều style icon (filled + outline) trên cùng 1 trang

---

## 8. Motion & Interaction

### 8.1. Easing

```css
--ease-out:    cubic-bezier(0.4, 0, 0.2, 1);
--ease-spring: cubic-bezier(0.34, 1.56, 0.64, 1);
--ease-in:     cubic-bezier(0.4, 0, 1, 1);
```

### 8.2. Duration

- Micro (hover, button press): **150–200ms**
- Standard (modal, drawer): **300ms**
- Large (page transition): **400–500ms**
- Hero/decorative: **600–800ms**

### 8.3. Quy tắc motion

- Tôn trọng `prefers-reduced-motion` — disable animation khi user set.
- Không animate quá 3 element cùng lúc (gây rối mắt).
- Stagger delay 50–80ms cho list reveal.
- Page load: hero text fade-up 400ms, image scale từ 1.05 → 1.

---

## 9. Mobile Optimization Checklist

### 9.1. Performance

- [ ] **LCP < 2.5s**, FID < 100ms, CLS < 0.1
- [ ] Image: WebP/AVIF, lazy load, responsive `srcset`
- [ ] Font: preload critical, `font-display: swap`
- [ ] CSS critical inline, defer non-critical
- [ ] Total JS bundle < 200KB gzipped trên mobile

### 9.2. UX Mobile-specific

- [ ] Touch target tối thiểu **44×44px** (Apple HIG) / **48×48px** (Material)
- [ ] Khoảng cách giữa các tap target ≥ 8px
- [ ] Form input có `inputmode` đúng (`numeric`, `email`, `tel`)
- [ ] Autofill attributes (`autocomplete="cc-number"`, etc.)
- [ ] Disable double-tap zoom: `touch-action: manipulation` cho button
- [ ] Sticky CTA Add-to-cart trên product detail page
- [ ] Pull-to-refresh trên collection page
- [ ] Swipe gesture: image gallery, size selector

### 9.3. Checkout Mobile

- [ ] One-page checkout (không multi-step lằng nhằng)
- [ ] Apple Pay / Google Pay / Shop Pay button ưu tiên trên cùng
- [ ] Guest checkout không bắt tạo account
- [ ] Hiển thị tổng giá + ship cost rõ ràng từ đầu
- [ ] Progress indicator nếu có > 1 step

---

## 10. Accessibility (A11y)

- Contrast ratio ≥ **4.5:1** cho text thường, **3:1** cho text lớn
- Focus state luôn visible: outline 2px solid `--color-accent`, offset 2px
- Alt text mô tả cho mọi product image
- ARIA labels cho icon-only button
- Keyboard navigation: tất cả interactive element phải reach được bằng Tab
- Form: label luôn liên kết với input qua `for`/`id`
- Skip-to-content link cho keyboard user
- Test với VoiceOver (iOS) và TalkBack (Android)

---

## 11. CSS Tokens (sample)

```css
:root {
  /* Color */
  --color-ink: #0A0A0A;
  --color-paper: #FAFAF7;
  --color-accent: #FF4D2E;
  --color-lime: #D4FF3D;

  /* Radius */
  --radius-sm: 4px;
  --radius-md: 8px;
  --radius-lg: 16px;
  --radius-pill: 999px;

  /* Shadow */
  --shadow-sm: 0 1px 2px rgba(0,0,0,0.04);
  --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
  --shadow-lg: 0 12px 32px rgba(0,0,0,0.12);

  /* Z-index */
  --z-dropdown: 100;
  --z-sticky: 200;
  --z-modal: 1000;
  --z-toast: 2000;
}
```

---

## 12. Do's & Don'ts

### ✅ Do

- Dùng ảnh sản phẩm chất lượng cao, có lifestyle context
- Giữ nav đơn giản, max 5 mục chính
- Sticky Add-to-cart trên mobile product page
- Hiển thị review, social proof gần CTA
- Dùng motion để tạo cảm xúc, không phải decoration

### ❌ Don't

- KHÔNG dùng auto-play video có âm thanh
- KHÔNG dùng popup chặn full-screen ngay khi vào trang
- KHÔNG dùng font < 16px cho body trên mobile
- KHÔNG đặt CTA quan trọng ở góc khó với tay
- KHÔNG dùng > 2 font family trên cùng 1 trang
- KHÔNG dùng gradient tím/hồng generic — đã quá sáo mòn

---

## 13. Versioning

| Version | Date | Changes |
|---|---|---|
| 1.0.0 | 2026-05 | Initial design system |

---

**Maintainer**: Design Team
**Last reviewed**: May 2026