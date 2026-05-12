<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

$current_year = date_i18n('Y');
$home_url     = home_url('/');

$footer_story_links = [
    ['title' => __('Câu chuyện', 'dawp'), 'url' => $home_url . '#khong-gian'],
    ['title' => __('Bên ao', 'dawp'), 'url' => $home_url . '#ben-ao'],
    ['title' => __('Menu của Mưa', 'dawp'), 'url' => $home_url . '#menu'],
    ['title' => __('Thư viện ảnh', 'dawp'), 'url' => $home_url . '#thu-vien'],
];

$footer_visit_links = [
    ['title' => __('Ngày mở cửa', 'dawp'), 'url' => $home_url . '#mo-cua'],
    ['title' => __('Liên hệ', 'dawp'), 'url' => $home_url . '#lien-he'],
    ['title' => __('Lưu lại để ghé Mưa', 'dawp'), 'url' => $home_url . '#lien-he'],
];
?>

</div><!-- #content -->

<footer id="colophon" class="bg-rainMoss text-white" role="contentinfo">
    <section class="border-b border-white/10 bg-[#2F2A28]">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-4 px-4 py-8 sm:px-6 md:grid-cols-3 lg:px-8">
            <div class="rounded-lg border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase leading-tight text-rainStraw">
                    <?php esc_html_e('Bên ao nước', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/72">
                    <?php esc_html_e('Những gian tre nhỏ nằm gần mặt nước, đủ yên cho một buổi ngồi lâu.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-lg border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase leading-tight text-rainStraw">
                    <?php esc_html_e('Sau lưng là đồng lúa', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/72">
                    <?php esc_html_e('Gió đồng, mái lá, tre trúc và một khoảng trời Điện Biên thật gần.', 'dawp'); ?>
                </p>
            </div>

            <div class="rounded-lg border border-white/10 bg-white/5 p-5">
                <p class="font-heading text-2xl font-black uppercase leading-tight text-rainStraw">
                    <?php esc_html_e('Hẹn gặp tháng 8', 'dawp'); ?>
                </p>
                <p class="mt-2 text-sm leading-6 text-white/72">
                    <?php esc_html_e('Mưa đang chuẩn bị những góc ngồi đầu tiên để đón bạn.', 'dawp'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-[linear-gradient(135deg,#123D2A_0%,#2F2A28_70%,#4A2F1B_100%)]"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.25fr_0.75fr_0.75fr_0.9fr] lg:px-8 lg:py-20">
            <div>
                <a href="<?php echo esc_url($home_url); ?>"
                   class="font-heading text-5xl font-black uppercase leading-none text-white"
                   aria-label="<?php esc_attr_e('Về trang chủ Chuyện Của Mưa', 'dawp'); ?>">
                    <?php esc_html_e('Chuyện Của Mưa', 'dawp'); ?>
                </a>

                <p class="mt-5 max-w-lg text-base leading-8 text-white/78">
                    <?php esc_html_e('Một quán nhỏ bên ao ở thành phố Điện Biên, nơi mỗi người có thể mang theo câu chuyện của mình và ngồi lại trong một khoảng bình yên.', 'dawp'); ?>
                </p>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($home_url . '#ben-ao'); ?>"
                       class="inline-flex min-h-11 items-center justify-center rounded-md bg-rainStraw px-5 text-xs font-black uppercase tracking-wide text-rainWood transition hover:bg-[#F2DFA2]">
                        <?php esc_html_e('Khám phá không gian', 'dawp'); ?>
                    </a>
                    <a href="<?php echo esc_url($home_url . '#lien-he'); ?>"
                       class="inline-flex min-h-11 items-center justify-center rounded-md border border-white/20 px-5 text-xs font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-rainMoss">
                        <?php esc_html_e('Liên hệ với Mưa', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <nav aria-label="<?php esc_attr_e('Các phần trên trang chủ', 'dawp'); ?>">
                <h2 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-rainStraw">
                    <?php esc_html_e('Dạo quanh Mưa', 'dawp'); ?>
                </h2>

                <ul class="space-y-3">
                    <?php foreach ($footer_story_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-rainStraw">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <nav aria-label="<?php esc_attr_e('Thông tin ghé quán', 'dawp'); ?>">
                <h2 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-rainStraw">
                    <?php esc_html_e('Ghé Mưa', 'dawp'); ?>
                </h2>

                <ul class="space-y-3">
                    <?php foreach ($footer_visit_links as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="text-sm font-bold text-white/72 transition hover:text-rainStraw">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div>
                <h2 class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-rainStraw">
                    <?php esc_html_e('Thông tin', 'dawp'); ?>
                </h2>

                <div class="space-y-5">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-white/45">
                            <?php esc_html_e('Địa chỉ', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm font-bold leading-6 text-white/78">
                            <?php esc_html_e('Thành phố Điện Biên, Việt Nam', 'dawp'); ?>
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-white/45">
                            <?php esc_html_e('Mở cửa dự kiến', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm font-bold leading-6 text-white/78">
                            <?php esc_html_e('Tháng 8', 'dawp'); ?>
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-white/45">
                            <?php esc_html_e('Fanpage & số điện thoại', 'dawp'); ?>
                        </p>
                        <p class="mt-2 text-sm font-bold leading-6 text-white/78">
                            <?php esc_html_e('Sắp cập nhật', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-6 text-sm text-white/60 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <p>
                &copy; <?php echo esc_html($current_year); ?> <?php esc_html_e('Chuyện Của Mưa. Giữ lại một chút bình yên.', 'dawp'); ?>
            </p>

            <p class="font-black uppercase tracking-[0.18em] text-rainStraw">
                <?php esc_html_e('Thành phố Điện Biên', 'dawp'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
