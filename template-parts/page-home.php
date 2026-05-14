<?php
/**
 * Home page template part for the doctor portfolio.
 *
 * @package dawp
 */

$image_base = get_template_directory_uri() . '/assets/img/gallery/bshien/';

$resume_items = [
    [
        'years' => '1993 - 1998',
        'title' => __('Đại học Y Thái Nguyên', 'dawp'),
        'text'  => __('Theo học ngành Y, xây dựng nền tảng y khoa chính quy cho hành trình làm nghề và gắn bó lâu dài với chăm sóc sức khỏe trẻ em.', 'dawp'),
    ],
    [
        'years' => '1998 - 2002',
        'title' => __('Trạm xá Y tế xã Hoàng Khai, Yên Sơn, Tuyên Quang', 'dawp'),
        'text'  => __('Công tác tại tuyến y tế cơ sở, tiếp xúc trực tiếp với chăm sóc sức khỏe ban đầu và các vấn đề sức khỏe cộng đồng.', 'dawp'),
    ],
    [
        'years' => '2002 - 2008',
        'title' => __('Bệnh viện Yên Sơn, tỉnh Tuyên Quang', 'dawp'),
        'text'  => __('Tích lũy kinh nghiệm bệnh viện qua nhiều tình huống lâm sàng, trong đó có các vấn đề sức khỏe thường gặp ở trẻ em.', 'dawp'),
    ],
    [
        'years' => '2008 - 2010',
        'title' => __('Chuyên khoa I Nhi khoa - Đại học Y Hà Nội', 'dawp'),
        'text'  => __('Đào tạo chuyên sâu về Nhi khoa, củng cố kiến thức và kỹ năng thăm khám, tư vấn sức khỏe trẻ nhỏ.', 'dawp'),
    ],
    [
        'years' => '2010 - 2016',
        'title' => __('Trưởng khoa Nhi - Bệnh viện Yên Sơn', 'dawp'),
        'text'  => __('Đảm nhiệm vai trò Trưởng khoa Nhi, kết hợp kinh nghiệm chuyên môn với năng lực quản lý trong môi trường bệnh viện.', 'dawp'),
    ],
    [
        'years' => '2016 - 2026',
        'title' => __('Giám đốc chuyên môn Phòng khám The Medcare Hà Nội', 'dawp'),
        'text'  => __('Công tác tại hệ thống phòng khám nhi khoa The Medcare, phụ trách chuyên môn và đồng hành cùng phụ huynh trong chăm sóc sức khỏe trẻ em.', 'dawp'),
    ],
];

$profile_points = [
    __('Bác sĩ Chuyên khoa I Nhi khoa', 'dawp'),
    __('Nguyên Trưởng khoa Nhi', 'dawp'),
    __('Giám đốc chuyên môn The Medcare Hà Nội', 'dawp'),
    __('Kinh nghiệm từ y tế cơ sở, bệnh viện đến phòng khám', 'dawp'),
];

$care_principles = [
    __('Lắng nghe phụ huynh', 'dawp'),
    __('Thăm khám nhẹ nhàng', 'dawp'),
    __('Giải thích rõ ràng', 'dawp'),
    __('Đồng hành sau thăm khám', 'dawp'),
];

$service_cards = [
    [
        'title' => __('Thăm khám Nhi khoa tổng quát', 'dawp'),
        'text'  => __('Đánh giá tình trạng sức khỏe của trẻ và tư vấn hướng chăm sóc phù hợp sau thăm khám.', 'dawp'),
    ],
    [
        'title' => __('Tư vấn chăm sóc sức khỏe trẻ em', 'dawp'),
        'text'  => __('Hỗ trợ phụ huynh hiểu rõ hơn về các vấn đề sức khỏe thường gặp trong quá trình chăm sóc con.', 'dawp'),
    ],
    [
        'title' => __('Theo dõi tăng trưởng và phát triển', 'dawp'),
        'text'  => __('Quan tâm đến sự phát triển thể chất, dinh dưỡng và sức khỏe tổng thể của trẻ theo từng giai đoạn.', 'dawp'),
    ],
    [
        'title' => __('Đồng hành cùng phụ huynh', 'dawp'),
        'text'  => __('Trao đổi dễ hiểu để gia đình có thêm thông tin, yên tâm hơn trong quá trình chăm sóc trẻ.', 'dawp'),
    ],
];

$role_highlights = [
    __('Quản lý chuyên môn', 'dawp'),
    __('Thăm khám và tư vấn nhi khoa', 'dawp'),
    __('Đồng hành cùng phụ huynh', 'dawp'),
    __('Xây dựng chất lượng chăm sóc trẻ em', 'dawp'),
];

$contact_items = [
    __('Địa điểm: Phòng khám The Medcare Hà Nội', 'dawp'),
    __('Số điện thoại: Sắp cập nhật', 'dawp'),
    __('Email: Sắp cập nhật', 'dawp'),
    __('Giờ làm việc: Sắp cập nhật', 'dawp'),
];
?>

<div id="primary" class="doctor-shell">
    <section class="doctor-hero" aria-labelledby="home-hero-title">
        <div class="doctor-container doctor-hero__grid">
            <div>
                <p class="doctor-eyebrow"><?php esc_html_e('Portfolio chuyên môn Nhi khoa', 'dawp'); ?></p>
                <h1 id="home-hero-title" class="doctor-hero__title">
                    <?php esc_html_e('Bác sĩ Lê Thị', 'dawp'); ?>
                    <span><?php esc_html_e('Thu Hiền', 'dawp'); ?></span>
                </h1>
                <p class="doctor-hero__intro">
                    <?php esc_html_e('Bác sĩ Chuyên khoa I Nhi khoa, có hành trình công tác từ tuyến y tế cơ sở, bệnh viện, Trưởng khoa Nhi đến vai trò Giám đốc chuyên môn Phòng khám The Medcare Hà Nội.', 'dawp'); ?>
                </p>
                <div class="doctor-button-row">
                    <a class="doctor-btn doctor-btn--primary" href="#hanh-trinh"><?php esc_html_e('Xem hành trình chuyên môn', 'dawp'); ?></a>
                    <a class="doctor-btn doctor-btn--secondary" href="#lien-he"><?php esc_html_e('Liên hệ đặt lịch', 'dawp'); ?></a>
                </div>

                <div class="doctor-hero__meta" aria-label="<?php esc_attr_e('Thông tin nổi bật', 'dawp'); ?>">
                    <div class="doctor-meta-card">
                        <strong>CKI</strong>
                        <span><?php esc_html_e('Chuyên khoa Nhi khoa', 'dawp'); ?></span>
                    </div>
                    <div class="doctor-meta-card">
                        <strong>2010</strong>
                        <span><?php esc_html_e('Bắt đầu vai trò Trưởng khoa Nhi', 'dawp'); ?></span>
                    </div>
                    <div class="doctor-meta-card">
                        <strong>2016</strong>
                        <span><?php esc_html_e('Gắn bó với The Medcare Hà Nội', 'dawp'); ?></span>
                    </div>
                </div>
            </div>

            <div class="doctor-portrait-wrap">
                <div class="doctor-portrait-card">
                    <img src="<?php echo esc_url($image_base . 'Bsi-Hien.png'); ?>" alt="<?php esc_attr_e('Chân dung Bác sĩ Lê Thị Thu Hiền', 'dawp'); ?>">
                </div>
                <div class="doctor-floating-note">
                    <b><?php esc_html_e('Triết lý làm nghề:', 'dawp'); ?></b>
                    <?php esc_html_e('thăm khám cẩn trọng, lắng nghe phụ huynh và đồng hành với từng gia đình trong chăm sóc sức khỏe trẻ nhỏ.', 'dawp'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="doctor-section doctor-section--soft" aria-labelledby="profile-title">
        <div class="doctor-container doctor-profile-grid">
            <aside class="doctor-profile-card">
                <img src="<?php echo esc_url($image_base . '116011520_2713605472293353_1474453608355257715_n.jpg'); ?>" alt="<?php esc_attr_e('Bác sĩ Lê Thị Thu Hiền thăm khám cho trẻ nhỏ', 'dawp'); ?>">
                <h2><?php esc_html_e('Hồ sơ chuyên môn', 'dawp'); ?></h2>
                <p><?php esc_html_e('Một hồ sơ ngắn gọn giúp phụ huynh hiểu bác sĩ là ai, đã công tác ở đâu và hiện đảm nhiệm vai trò chuyên môn nào.', 'dawp'); ?></p>
                <div class="doctor-profile-list">
                    <?php foreach ($profile_points as $point) : ?>
                        <span><?php echo esc_html($point); ?></span>
                    <?php endforeach; ?>
                </div>
            </aside>

            <div id="hanh-trinh" class="doctor-resume-panel">
                <p class="doctor-eyebrow"><?php esc_html_e('Hành trình đào tạo và công tác', 'dawp'); ?></p>
                <h2 id="profile-title" class="doctor-heading"><?php esc_html_e('Kinh nghiệm được xây dựng qua nhiều môi trường y tế khác nhau.', 'dawp'); ?></h2>
                <p class="doctor-copy">
                    <?php esc_html_e('Từ đào tạo y khoa chính quy, công tác tại tuyến cơ sở, bệnh viện tuyến huyện, chuyên khoa Nhi đến quản lý chuyên môn phòng khám, hành trình của bác sĩ được trình bày như một CV chuyên môn rõ ràng và dễ kiểm chứng.', 'dawp'); ?>
                </p>

                <div class="doctor-resume-grid">
                    <?php foreach ($resume_items as $item) : ?>
                        <article class="doctor-resume-item">
                            <div class="doctor-resume-year"><?php echo esc_html($item['years']); ?></div>
                            <div>
                                <h3><?php echo esc_html($item['title']); ?></h3>
                                <p><?php echo esc_html($item['text']); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="triet-ly" class="doctor-section doctor-section--cream" aria-labelledby="care-title">
        <div class="doctor-container doctor-split">
            <div>
                <p class="doctor-eyebrow"><?php esc_html_e('Triết lý chăm sóc', 'dawp'); ?></p>
                <h2 id="care-title" class="doctor-heading"><?php esc_html_e('Nhi khoa là lắng nghe cả trẻ nhỏ và sự lo lắng của cha mẹ.', 'dawp'); ?></h2>
                <blockquote class="doctor-quote">
                    <?php esc_html_e('“Mỗi lần thăm khám không chỉ là xem một triệu chứng, mà là lắng nghe cả những điều trẻ chưa thể diễn đạt trọn vẹn.”', 'dawp'); ?>
                </blockquote>
                <p class="doctor-copy">
                    <?php esc_html_e('Trong chăm sóc trẻ nhỏ, sự cẩn trọng và cách giải thích rõ ràng cho phụ huynh rất quan trọng. Bác sĩ hướng tới việc thăm khám nhẹ nhàng, tiếp nhận kỹ thông tin từ gia đình và tư vấn phù hợp với từng trường hợp.', 'dawp'); ?>
                </p>
                <div class="doctor-pill-grid">
                    <?php foreach ($care_principles as $principle) : ?>
                        <span class="doctor-pill"><?php echo esc_html($principle); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="doctor-image-card">
                <img src="<?php echo esc_url($image_base . '429666892_436560252050581_4873857152481017_n.png'); ?>" alt="<?php esc_attr_e('Bác sĩ tư vấn cho phụ huynh và trẻ nhỏ', 'dawp'); ?>">
            </div>
        </div>
    </section>

    <section id="chuyen-mon" class="doctor-section" aria-labelledby="services-title">
        <div class="doctor-container">
            <p class="doctor-eyebrow"><?php esc_html_e('Chuyên môn Nhi khoa', 'dawp'); ?></p>
            <h2 id="services-title" class="doctor-heading"><?php esc_html_e('Các nhóm nội dung thăm khám và tư vấn được trình bày an toàn, rõ ràng.', 'dawp'); ?></h2>
            <p class="doctor-copy">
                <?php esc_html_e('Website giới thiệu năng lực chuyên môn và phạm vi tư vấn, không thay thế cho việc thăm khám trực tiếp hay đưa ra cam kết điều trị.', 'dawp'); ?>
            </p>

            <div class="doctor-services">
                <?php foreach ($service_cards as $card) : ?>
                    <article class="doctor-service-card">
                        <div class="doctor-service-icon" aria-hidden="true">
                            <svg width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"></path>
                            </svg>
                        </div>
                        <h3><?php echo esc_html($card['title']); ?></h3>
                        <p><?php echo esc_html($card['text']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="doctor-section doctor-section--navy" aria-labelledby="role-title">
        <div class="doctor-container doctor-role-grid">
            <div>
                <p class="doctor-eyebrow"><?php esc_html_e('Vai trò hiện tại', 'dawp'); ?></p>
                <h2 id="role-title" class="doctor-heading"><?php esc_html_e('Giám đốc chuyên môn Phòng khám The Medcare Hà Nội.', 'dawp'); ?></h2>
                <p class="doctor-copy">
                    <?php esc_html_e('Từ năm 2016 đến 2026, bác sĩ công tác tại hệ thống phòng khám nhi khoa The Medcare, kết hợp kinh nghiệm thăm khám Nhi khoa với công tác quản lý chuyên môn trong môi trường phòng khám hiện đại.', 'dawp'); ?>
                </p>
                <div class="doctor-highlight-grid">
                    <?php foreach ($role_highlights as $highlight) : ?>
                        <div class="doctor-highlight"><?php echo esc_html($highlight); ?></div>
                    <?php endforeach; ?>
                </div>
                <div class="doctor-button-row">
                    <a class="doctor-btn doctor-btn--light" href="#lien-he"><?php esc_html_e('Liên hệ đặt lịch', 'dawp'); ?></a>
                </div>
            </div>

            <div class="doctor-image-card">
                <img src="<?php echo esc_url($image_base . '689235060_1476398857515209_8311699732582292443_n.jpg'); ?>" alt="<?php esc_attr_e('Thông tin chuyên môn của Bác sĩ Lê Thị Thu Hiền tại The Medcare', 'dawp'); ?>">
            </div>
        </div>
    </section>

    <section class="doctor-section" aria-labelledby="parent-note-title">
        <div class="doctor-container doctor-parent-note">
            <div class="doctor-image-card">
                <img src="<?php echo esc_url($image_base . '116011520_2713605472293353_1474453608355257715_n.jpg'); ?>" alt="<?php esc_attr_e('Bác sĩ Lê Thị Thu Hiền trong phòng khám nhi khoa', 'dawp'); ?>">
            </div>
            <div>
                <p class="doctor-eyebrow"><?php esc_html_e('Gửi phụ huynh', 'dawp'); ?></p>
                <h2 id="parent-note-title" class="doctor-heading"><?php esc_html_e('Một buổi thăm khám tốt cần giúp gia đình hiểu và yên tâm hơn.', 'dawp'); ?></h2>
                <p class="doctor-copy">
                    <?php esc_html_e('Khi con không khỏe, sự lo lắng của cha mẹ là điều dễ hiểu. Bên cạnh đánh giá tình trạng của trẻ, việc giải thích rõ ràng để phụ huynh biết cách theo dõi và chăm sóc sau thăm khám cũng là một phần quan trọng trong quá trình chăm sóc sức khỏe trẻ nhỏ.', 'dawp'); ?>
                </p>
                <blockquote class="doctor-quote">
                    <?php esc_html_e('“Lắng nghe kỹ hơn để tư vấn đúng hơn, giải thích rõ hơn để phụ huynh yên tâm hơn.”', 'dawp'); ?>
                </blockquote>
            </div>
        </div>
    </section>

    <section id="lien-he" class="doctor-section doctor-section--soft" aria-labelledby="contact-title">
        <div class="doctor-container">
            <div class="doctor-contact-card">
                <div class="doctor-contact-grid">
                    <div>
                        <p class="doctor-eyebrow"><?php esc_html_e('Liên hệ', 'dawp'); ?></p>
                        <h2 id="contact-title" class="doctor-heading"><?php esc_html_e('Cần tư vấn hoặc đặt lịch thăm khám?', 'dawp'); ?></h2>
                        <p class="doctor-copy">
                            <?php esc_html_e('Phụ huynh có thể liên hệ để tìm hiểu thêm thông tin thăm khám, đặt lịch hoặc biết thêm về thời gian làm việc của bác sĩ tại phòng khám.', 'dawp'); ?>
                        </p>
                        <div class="doctor-button-row">
                            <a class="doctor-btn doctor-btn--primary" href="<?php echo esc_url(home_url('/contact-us/')); ?>"><?php esc_html_e('Liên hệ đặt lịch', 'dawp'); ?></a>
                            <a class="doctor-btn doctor-btn--secondary" href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('Tìm hiểu thêm về bác sĩ', 'dawp'); ?></a>
                        </div>
                    </div>

                    <div>
                        <ul class="doctor-contact-list">
                            <?php foreach ($contact_items as $item) : ?>
                                <li><?php echo esc_html($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="doctor-disclaimer">
                            <?php esc_html_e('Thông tin trên website mang tính giới thiệu chuyên môn và tham khảo, không thay thế cho thăm khám và tư vấn trực tiếp với bác sĩ.', 'dawp'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
