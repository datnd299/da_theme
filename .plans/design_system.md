# Design System: Urban Dynamic (E-commerce Fashion)

## 1. Core Identity & Vibe
*   **Persona:** Trẻ trung, hiện đại, tối giản nhưng năng động (Urban Cool).
*   **Mục tiêu:** Giảm tối đa "ma sát" khi mua hàng, tăng tốc độ duyệt sản phẩm và độ tin tưởng.
*   **Phong cách:** Kết hợp giữa sự tinh tế của các thương hiệu cao cấp (COS) và tính thực dụng, tốc độ của sàn TMĐT (TikTok Shop).

---

## 2. Color Palette (Urban Cool)
Hệ màu này tạo cảm giác sạch sẽ, làm nổi bật hình ảnh sản phẩm là trung tâm.

| Vai trò | Mã màu | Ứng dụng |
| :--- | :--- | :--- |
| **Primary Background** | `#FFFFFF` | Nền trang chính, tạo cảm giác rộng rãi. |
| **Secondary Background** | `#F5F5F5` | Nền cho Section xám nhạt, Product Card background. |
| **Primary Text** | `#0A0A0A` | Heading, tên sản phẩm, nội dung quan trọng. |
| **Secondary Text** | `#737373` | Mô tả ngắn, meta data, giá gốc (gạch ngang). |
| **Accent (CTA)** | `#000000` | Nút "Mua ngay", "Thêm vào giỏ" (Tương phản tuyệt đối). |
| **Sale/Alert** | `#FF4D4D` | Giá giảm, Badge Sale, thông báo khẩn cấp. |
| **Success** | `#00D26A` | Thông báo đã thêm vào giỏ, thanh toán thành công. |
| **Border/Divider** | `#E5E5E5` | Đường kẻ phân cách, viền input. |

---

## 3. Typography
Sử dụng **Be Vietnam Pro** để tối ưu hiển thị tiếng Việt và mang lại cảm giác hiện đại.

*   **Font Family:** `font-family: 'Be Vietnam Pro', sans-serif;`
*   **Scale Hệ thống (Tailwind classes):**
    *   **Hero Heading:** `text-4xl md:text-6xl font-bold tracking-tight`
    *   **Section Title:** `text-2xl md:text-3xl font-semibold`
    *   **Product Name:** `text-sm md:text-base font-medium text-neutral-900`
    *   **Price:** `text-base md:text-lg font-bold text-black`
    *   **Body Text:** `text-sm md:text-base leading-relaxed text-neutral-600`
    *   **Label/Caption:** `text-xs uppercase tracking-wider font-semibold text-neutral-500`

---

## 4. UI Components & Patterns

### A. Product Card (Linh hồn của website)
*   **Tỷ lệ ảnh:** `aspect-[3/4]` (Bắt buộc cho fashion để thấy toàn thân model).
*   **Giá:** Phải hiển thị ngay dưới tên sản phẩm. Không giấu giá.
*   **Badge:** Đặt ở góc trái trên (VD: "New Arrival", "-30%").
*   **Interaction:** 
    *   Hover: Ảnh scale nhẹ (1.05).
    *   Nút "Thêm nhanh" xuất hiện ở bottom card khi hover trên desktop.

### B. Buttons (Hành động chuyển đổi)
*   **Primary Button:** `rounded-full bg-black text-white px-8 py-4 text-sm font-bold uppercase transition-all hover:bg-neutral-800 active:scale-95`
*   **Secondary Button:** `rounded-full border border-black bg-white text-black px-8 py-4 text-sm font-bold hover:bg-black hover:text-white`
*   **Mobile Sticky CTA:** Trên trang chi tiết sản phẩm (PDP), nút "Mua ngay" luôn dính (sticky) ở dưới cùng màn hình.

### C. Header & Navigation
*   **Desktop:** Logo bên trái, Menu trung tâm, Search bar hiển thị rõ, Icon giỏ hàng bên phải (luôn có số lượng).
*   **Mobile:** Header rút gọn, ưu tiên Search Icon và Cart Icon. Menu dạng Slide-out từ trái.

---

## 5. Layout & Spacing
*   **Container:** `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8`
*   **Grid:**
    *   Mobile: 2 cột (Ưu tiên hiển thị nhiều sản phẩm nhất có thể).
    *   Desktop: 4 cột.
*   **Section Spacing:** `py-12 md:py-16` (Đủ thoáng để sản phẩm "thở", nhưng không quá rộng làm loãng thông tin).

---

## 6. Conversion Anti-Errors (Chặn lỗi bán hàng)
1.  **Tốc độ:** Ảnh đầu trang (Hero) dùng `loading="eager"` và `fetchpriority="high"`.
2.  **Minh bạch:** Không dùng "Liên hệ để biết giá". Giá là thông tin quan trọng nhất.
3.  **Niềm tin:** Dưới nút "Mua ngay" luôn có 3 icon nhỏ: *Đổi trả 7 ngày - Kiểm hàng trước khi nhận - Freeship đơn >500k*.
4.  **Ma sát:** Form thanh toán tối giản. Không bắt buộc đăng ký tài khoản mới được mua hàng (Guest Checkout).

---

## 7. Motion & Micro-interactions
*   **Hỗ trợ:**
    *   `duration-200` cho tất cả hiệu ứng hover màu sắc.
    *   `duration-500` cho hiệu ứng chuyển ảnh.
    *   `Skeleton screen` khi đang load danh sách sản phẩm thay vì spinner quay tròn.
*   **Cấm:** 
    *   Mọi hiệu ứng làm chậm quá trình đọc thông tin sản phẩm (như scroll-reveal quá đà).
    *   Pop-up che màn hình ngay khi khách vừa vào trang < 30s.