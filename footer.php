<?php
/**
 * Theme footer for the doctor portfolio.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');

$footer_primary_links = [
    ['title' => __('Trang chủ', 'dawp'), 'url' => home_url('/')],
    ['title' => __('Giới thiệu bác sĩ', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Hành trình chuyên môn', 'dawp'), 'url' => home_url('/#hanh-trinh')],
    ['title' => __('Chuyên môn Nhi khoa', 'dawp'), 'url' => home_url('/#chuyen-mon')],
    ['title' => __('Triết lý chăm sóc', 'dawp'), 'url' => home_url('/#triet-ly')],
];

$footer_support_links = [
    ['title' => __('Liên hệ', 'dawp'), 'url' => home_url('/#lien-he')],
    ['title' => __('Câu hỏi thường gặp', 'dawp'), 'url' => home_url('/faq/')],
    ['title' => __('Chính sách bảo mật', 'dawp'), 'url' => home_url('/privacy-policy/')],
    ['title' => __('Điều khoản sử dụng', 'dawp'), 'url' => home_url('/terms-conditions/')],
];
?>

    </div><!-- #content -->

    <footer id="colophon" class="doctor-site-footer" role="contentinfo">
        <section class="doctor-footer-stats" aria-label="<?php esc_attr_e('Tóm tắt chuyên môn', 'dawp'); ?>">
            <div class="doctor-footer-stats__grid">
                <div class="doctor-footer-stat">
                    <span><?php esc_html_e('Chuyên môn', 'dawp'); ?></span>
                    <p><?php esc_html_e('Bác sĩ Chuyên khoa I Nhi khoa', 'dawp'); ?></p>
                </div>
                <div class="doctor-footer-stat">
                    <span><?php esc_html_e('Kinh nghiệm', 'dawp'); ?></span>
                    <p><?php esc_html_e('Từ y tế cơ sở, bệnh viện đến quản lý chuyên môn phòng khám', 'dawp'); ?></p>
                </div>
                <div class="doctor-footer-stat">
                    <span><?php esc_html_e('Vai trò hiện tại', 'dawp'); ?></span>
                    <p><?php esc_html_e('Giám đốc chuyên môn Phòng khám The Medcare Hà Nội', 'dawp'); ?></p>
                </div>
            </div>
        </section>

        <section class="doctor-footer-main">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="doctor-brand doctor-footer-brand" aria-label="<?php esc_attr_e('Trang chủ Bác sĩ Lê Thị Thu Hiền', 'dawp'); ?>">
                    <span class="doctor-brand__mark">LH</span>
                    <span>
                        <span class="doctor-brand__name"><?php esc_html_e('Bác sĩ Lê Thị Thu Hiền', 'dawp'); ?></span>
                        <span class="doctor-brand__role"><?php esc_html_e('Chuyên khoa I Nhi khoa', 'dawp'); ?></span>
                    </span>
                </a>

                <p class="doctor-footer-copy">
                    <?php esc_html_e('Đồng hành cùng phụ huynh trong chăm sóc sức khỏe trẻ em bằng chuyên môn, sự cẩn trọng và thấu hiểu.', 'dawp'); ?>
                </p>

                <div class="doctor-footer-note">
                    <h2><?php esc_html_e('Lưu ý y tế', 'dawp'); ?></h2>
                    <p>
                        <?php esc_html_e('Thông tin trên website mang tính giới thiệu chuyên môn và tham khảo, không thay thế cho thăm khám và tư vấn trực tiếp với bác sĩ.', 'dawp'); ?>
                    </p>
                </div>
            </div>

            <nav aria-label="<?php esc_attr_e('Liên kết chính', 'dawp'); ?>">
                <h2><?php esc_html_e('Nội dung chính', 'dawp'); ?></h2>
                <ul>
                    <?php foreach ($footer_primary_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Hỗ trợ và chính sách', 'dawp'); ?>">
                <h2><?php esc_html_e('Thông tin', 'dawp'); ?></h2>
                <ul>
                    <?php foreach ($footer_support_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="doctor-footer-contact">
                <h2><?php esc_html_e('Liên hệ', 'dawp'); ?></h2>
                <p>
                    <strong><?php esc_html_e('Địa điểm:', 'dawp'); ?></strong>
                    <?php esc_html_e('Phòng khám The Medcare Hà Nội', 'dawp'); ?>
                </p>
                <p>
                    <strong><?php esc_html_e('Số điện thoại:', 'dawp'); ?></strong>
                    <?php esc_html_e('Sắp cập nhật', 'dawp'); ?>
                </p>
                <p>
                    <strong><?php esc_html_e('Email:', 'dawp'); ?></strong>
                    <?php esc_html_e('Sắp cập nhật', 'dawp'); ?>
                </p>

                <a href="<?php echo esc_url(home_url('/#lien-he')); ?>" class="doctor-btn doctor-btn--light doctor-footer-cta">
                    <?php esc_html_e('Liên hệ đặt lịch', 'dawp'); ?>
                </a>
            </div>
        </section>

        <div class="doctor-footer-bottom">
            <div class="doctor-footer-bottom__inner">
                <p>&copy; <?php echo esc_html($current_year); ?> <?php esc_html_e('Bác sĩ Lê Thị Thu Hiền.', 'dawp'); ?></p>
                <p><?php esc_html_e('Portfolio chuyên môn Nhi khoa', 'dawp'); ?></p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
