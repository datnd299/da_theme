<?php
/**
 * Theme footer.
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

<footer id="colophon" class="bg-[#12324A] text-white" role="contentinfo">
    <section class="border-b border-white/10 bg-[#0F2B3F]">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 py-8 sm:px-6 md:grid-cols-3 lg:px-8">
            <div class="rounded-[22px] border border-white/10 bg-white/5 p-5">
                <p class="text-sm font-bold text-[#7FC8C2]"><?php esc_html_e('Chuyên môn', 'dawp'); ?></p>
                <p class="mt-2 text-base font-semibold leading-7 text-white"><?php esc_html_e('Bác sĩ Chuyên khoa I Nhi khoa', 'dawp'); ?></p>
            </div>
            <div class="rounded-[22px] border border-white/10 bg-white/5 p-5">
                <p class="text-sm font-bold text-[#7FC8C2]"><?php esc_html_e('Kinh nghiệm', 'dawp'); ?></p>
                <p class="mt-2 text-base font-semibold leading-7 text-white"><?php esc_html_e('Từ y tế cơ sở, bệnh viện đến quản lý chuyên môn phòng khám', 'dawp'); ?></p>
            </div>
            <div class="rounded-[22px] border border-white/10 bg-white/5 p-5">
                <p class="text-sm font-bold text-[#7FC8C2]"><?php esc_html_e('Vai trò', 'dawp'); ?></p>
                <p class="mt-2 text-base font-semibold leading-7 text-white"><?php esc_html_e('Giám đốc chuyên môn Phòng khám The Medcare Hà Nội', 'dawp'); ?></p>
            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[1.25fr_0.75fr_0.75fr_1fr] lg:px-8 lg:py-18">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-3" aria-label="<?php esc_attr_e('Trang chủ Bác sĩ Lê Thị Thu Hiền', 'dawp'); ?>">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#DFF3F8] text-lg font-extrabold text-[#2F80A8]">LH</span>
                    <span>
                        <span class="block text-lg font-extrabold leading-5 text-white"><?php esc_html_e('Bác sĩ Lê Thị Thu Hiền', 'dawp'); ?></span>
                        <span class="mt-1 block text-sm font-semibold text-white/70"><?php esc_html_e('Chuyên khoa I Nhi khoa', 'dawp'); ?></span>
                    </span>
                </a>

                <p class="mt-5 max-w-md text-base leading-8 text-white/75">
                    <?php esc_html_e('Đồng hành cùng phụ huynh trong chăm sóc sức khỏe trẻ em bằng chuyên môn, sự cẩn trọng và thấu hiểu.', 'dawp'); ?>
                </p>

                <div class="mt-6 rounded-[22px] border border-white/10 bg-white/5 p-5">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#7FC8C2]"><?php esc_html_e('Lưu ý y tế', 'dawp'); ?></p>
                    <p class="mt-3 text-sm leading-7 text-white/72">
                        <?php esc_html_e('Thông tin trên website mang tính giới thiệu chuyên môn và tham khảo, không thay thế cho thăm khám và tư vấn trực tiếp với bác sĩ.', 'dawp'); ?>
                    </p>
                </div>
            </div>

            <nav aria-label="<?php esc_attr_e('Liên kết chính', 'dawp'); ?>">
                <h2 class="mb-5 text-sm font-bold uppercase tracking-[0.18em] text-[#7FC8C2]"><?php esc_html_e('Nội dung chính', 'dawp'); ?></h2>
                <ul class="space-y-3">
                    <?php foreach ($footer_primary_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>" class="text-sm font-semibold text-white/72 transition hover:text-white">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Hỗ trợ và chính sách', 'dawp'); ?>">
                <h2 class="mb-5 text-sm font-bold uppercase tracking-[0.18em] text-[#7FC8C2]"><?php esc_html_e('Thông tin', 'dawp'); ?></h2>
                <ul class="space-y-3">
                    <?php foreach ($footer_support_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>" class="text-sm font-semibold text-white/72 transition hover:text-white">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div>
                <h2 class="mb-5 text-sm font-bold uppercase tracking-[0.18em] text-[#7FC8C2]"><?php esc_html_e('Liên hệ', 'dawp'); ?></h2>
                <div class="space-y-3 text-sm leading-7 text-white/75">
                    <p><strong class="text-white"><?php esc_html_e('Địa điểm:', 'dawp'); ?></strong> <?php esc_html_e('Phòng khám The Medcare Hà Nội', 'dawp'); ?></p>
                    <p><strong class="text-white"><?php esc_html_e('Số điện thoại:', 'dawp'); ?></strong> <?php esc_html_e('Sắp cập nhật', 'dawp'); ?></p>
                    <p><strong class="text-white"><?php esc_html_e('Email:', 'dawp'); ?></strong> <?php esc_html_e('Sắp cập nhật', 'dawp'); ?></p>
                    <p><strong class="text-white"><?php esc_html_e('Giờ làm việc:', 'dawp'); ?></strong> <?php esc_html_e('Sắp cập nhật', 'dawp'); ?></p>
                </div>

                <a href="<?php echo esc_url(home_url('/#lien-he')); ?>" class="mt-6 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-6 text-sm font-bold text-[#12324A] transition hover:bg-[#DFF3F8]">
                    <?php esc_html_e('Liên hệ đặt lịch', 'dawp'); ?>
                </a>
            </div>
        </div>
    </section>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-6 text-sm text-white/60 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p>&copy; <?php echo esc_html($current_year); ?> <?php esc_html_e('Bác sĩ Lê Thị Thu Hiền.', 'dawp'); ?> <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <p class="font-semibold text-white/70"><?php esc_html_e('Portfolio chuyên môn Nhi khoa', 'dawp'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
