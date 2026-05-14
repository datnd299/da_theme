<?php
/**
 * Template Part: Home - Personal Portfolio.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

$portfolio_email = 'huyen.trang@example.com';
$linkedin_url = 'https://www.linkedin.com/in/hohuyentrang/';
$cv_url = home_url('/wp-content/uploads/huyen-trang-cv.pdf');
$project_video_url = '#featured-project';

$metrics = [
    [
        'value' => '3.63/4',
        'label' => 'GPA - Xếp loại Xuất sắc',
        'context' => 'Trường Đại học Ngoại ngữ - ĐHQGHN',
        'tone' => 'blue',
    ],
    [
        'value' => '260M VND/tháng',
        'label' => 'Top KPI Intern Performance',
        'context' => 'Góp phần vào tổng doanh số tour du lịch tại TRIPUS',
        'tone' => 'gold',
    ],
    [
        'value' => '95%',
        'label' => 'Positive Customer Feedback',
        'context' => 'Từ khách hàng mới và khách hàng cũ trong quá trình chăm sóc',
        'tone' => 'blue',
    ],
    [
        'value' => '90%',
        'label' => 'Trial Students Continued',
        'context' => 'Học viên đăng ký khóa tiếp theo sau buổi học thử',
        'tone' => 'blue',
    ],
    [
        'value' => 'C1 English',
        'label' => 'VNU TEST - 8.0/10',
        'context' => 'Năng lực ngoại ngữ phục vụ học thuật và giao tiếp',
        'tone' => 'blue',
    ],
    [
        'value' => 'Award Video',
        'label' => 'Video truyền thông xuất sắc nhất',
        'context' => 'Cuộc thi Kỹ năng Hướng dẫn viên Du lịch 2025',
        'tone' => 'gold',
    ],
];

$experiences = [
    [
        'period' => '04/2025 - 07/2025',
        'role' => 'Thực tập sinh du lịch',
        'company' => 'Công ty TNHH Thương mại và Dịch vụ TRIPUS',
        'title' => 'Tourism Communication & Customer Consulting',
        'description' => 'Tham gia thiết kế nội dung quảng bá, tư vấn tour theo nhu cầu khách hàng và chăm sóc khách hàng trong quá trình tìm hiểu, lựa chọn dịch vụ du lịch.',
        'results' => [
            'Reached 80% potential customers',
            'Highest KPI among interns',
            '260M VND/month total sales contribution',
            '95% positive customer feedback',
        ],
        'skills' => ['Customer Consulting', 'Tour Planning', 'Sales Support', 'Promotional Content', 'Customer Care'],
    ],
    [
        'period' => '03/2024 - 12/2024',
        'role' => 'Giáo viên tiếng Anh',
        'company' => 'CTCP Dream Viet Education - KYNA PTE. LTD. / KYNA English',
        'title' => 'English Teaching & Learner Engagement',
        'description' => 'Giảng dạy tiếng Anh cho học viên thuộc nhiều độ tuổi, hỗ trợ người học cải thiện phát âm, điểm số và sự tự tin trong quá trình học.',
        'results' => [
            '90% trial students registered for the next course',
            'Positive feedback from parents and learners',
            'Supported beginner learners with pronunciation and score improvement',
            'Handled unexpected classroom situations',
        ],
        'skills' => ['English Teaching', 'Learner Engagement', 'Parent Communication', 'Classroom Handling', 'Pronunciation Support'],
    ],
];

$certificates = [
    ['name' => 'VNU TEST - English C1', 'score' => '8.0/10', 'issuer' => 'English proficiency certificate'],
    ['name' => 'Chinese HSK 3', 'score' => '295/300', 'issuer' => 'Chinese language certificate'],
    ['name' => 'HSKK Intermediate', 'score' => 'Speaking', 'issuer' => 'Chinese speaking certificate'],
];

$skill_groups = [
    [
        'title' => 'Communication',
        'items' => ['Public speaking', 'Customer communication', 'Presentation', 'Teamwork', 'Interpersonal communication'],
    ],
    [
        'title' => 'Marketing & Content',
        'items' => ['Digital marketing basics', 'Promotional content design', 'Tourism communication', 'Content planning', 'Customer-focused messaging'],
    ],
    [
        'title' => 'Languages',
        'items' => ['English - C1', 'Chinese - HSK 3', 'Chinese Speaking - HSKK Intermediate'],
    ],
    [
        'title' => 'Education & Training',
        'items' => ['English teaching', 'Learner engagement', 'Pronunciation support', 'Class situation handling', 'Beginner learner support'],
    ],
    [
        'title' => 'Workplace Skills',
        'items' => ['Basic computer skills', 'Problem-solving', 'Customer care', 'Tour planning support', 'KPI-oriented working style'],
    ],
];
?>

<main class="portfolio-home bg-white text-[#222222]">
    <section class="relative overflow-hidden bg-[#DCEEFF]">
        <div class="absolute inset-x-0 top-0 h-32 bg-white/45" aria-hidden="true"></div>
        <div class="relative mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 lg:grid-cols-[1.06fr_0.94fr] lg:items-center lg:px-8 lg:py-24">
            <div>
                <p class="inline-flex rounded-full border border-[#0F3D5E]/15 bg-white px-4 py-2 text-sm font-semibold text-[#0F3D5E]">
                    Final-year English Language Student
                </p>
                <h1 class="mt-6 text-4xl font-extrabold leading-tight text-[#0F3D5E] sm:text-5xl lg:text-6xl">
                    Hồ Thị Huyền Trang
                </h1>
                <p class="mt-5 max-w-3xl text-xl font-semibold leading-8 text-[#12384F]">
                    Tourism - Communication - Customer Experience - Education
                </p>
                <p class="mt-5 max-w-3xl text-base leading-8 text-[#334155] sm:text-lg">
                    Sinh viên năm cuối ngành Ngôn ngữ Anh với kinh nghiệm trong tư vấn du lịch, thiết kế nội dung quảng bá, chăm sóc khách hàng và giảng dạy tiếng Anh. Nổi bật với tư duy giao tiếp, khả năng ngoại ngữ và các thành tích thực tế trong môi trường làm việc.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#portfolio" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#0F3D5E] px-6 text-sm font-bold text-white transition hover:bg-[#0A2F48]">
                        Xem Portfolio
                    </a>
                    <a href="<?php echo esc_url($cv_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#0F3D5E] bg-white px-6 text-sm font-bold text-[#0F3D5E] transition hover:bg-[#F6EFE7]">
                        Tải CV
                    </a>
                    <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F80ED] bg-white px-6 text-sm font-bold text-[#2F80ED] transition hover:bg-white/75">
                        Xem LinkedIn
                    </a>
                </div>

                <div class="mt-8 flex flex-wrap gap-2">
                    <?php foreach (['English C1', 'Tourism Communication', 'Customer Experience', 'Teaching Experience', 'Award-Winning Video'] as $badge) : ?>
                        <span class="rounded-full bg-white/80 px-4 py-2 text-sm font-semibold text-[#0F3D5E] shadow-sm">
                            <?php echo esc_html($badge); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="relative">
                <div class="rounded-[2rem] border border-white/70 bg-white p-4 shadow-2xl shadow-[#0F3D5E]/15">
                    <div class="relative flex aspect-[4/5] min-h-[430px] items-end overflow-hidden rounded-[1.5rem] bg-[#F6EFE7]">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_24%_20%,rgba(47,128,237,0.24),transparent_34%),radial-gradient(circle_at_82%_16%,rgba(217,164,65,0.24),transparent_30%)]" aria-hidden="true"></div>
                        <div class="relative mx-auto mb-12 flex h-48 w-48 items-center justify-center rounded-full border-8 border-white bg-[#0F3D5E] text-6xl font-extrabold text-white shadow-xl">
                            HT
                        </div>
                        <div class="absolute bottom-5 left-5 right-5 rounded-3xl bg-white/92 p-5 shadow-lg">
                            <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#D9A441]">Available for opportunities</p>
                            <p class="mt-2 text-base font-semibold text-[#0F3D5E]">Internship / Entry-level roles in tourism, communication, customer experience and education.</p>
                        </div>
                    </div>
                </div>
                <div class="absolute -right-2 top-8 hidden rounded-3xl bg-[#0F3D5E] p-5 text-white shadow-xl lg:block">
                    <p class="text-3xl font-extrabold">C1</p>
                    <p class="mt-1 text-sm text-white/80">English level</p>
                </div>
            </div>
        </div>
    </section>

    <nav class="border-b border-[#E5E7EB] bg-white/95 backdrop-blur">
        <div class="mx-auto flex max-w-7xl gap-2 overflow-x-auto px-4 py-3 text-sm font-semibold text-[#0F3D5E] sm:px-6 lg:px-8">
            <?php foreach ([['About', '#about'], ['Experience', '#experience'], ['Project', '#featured-project'], ['Certificates', '#education'], ['Awards', '#awards'], ['Contact', '#contact']] as $nav_item) : ?>
                <a href="<?php echo esc_url($nav_item[1]); ?>" class="shrink-0 rounded-full px-4 py-2 transition hover:bg-[#DCEEFF]">
                    <?php echo esc_html($nav_item[0]); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>

    <section id="portfolio" class="bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80ED]">Achievement Highlights</p>
                <h2 class="mt-3 text-3xl font-extrabold text-[#0F3D5E] sm:text-4xl">Kết quả nổi bật có thể đo lường</h2>
            </div>
            <div class="mt-9 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($metrics as $metric) : ?>
                    <article class="rounded-3xl border border-[#E5E7EB] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        <p class="text-3xl font-extrabold leading-tight <?php echo $metric['tone'] === 'gold' ? 'text-[#D9A441]' : 'text-[#0F3D5E]'; ?>">
                            <?php echo esc_html($metric['value']); ?>
                        </p>
                        <h3 class="mt-4 text-lg font-bold text-[#222222]"><?php echo esc_html($metric['label']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]"><?php echo esc_html($metric['context']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="about" class="bg-[#F6EFE7] py-14 sm:py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.15fr_0.85fr] lg:px-8">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#D9A441]">About Me</p>
                <h2 class="mt-3 max-w-4xl text-3xl font-extrabold leading-tight text-[#0F3D5E] sm:text-4xl">
                    Kết nối con người qua ngôn ngữ, nội dung và trải nghiệm.
                </h2>
                <div class="mt-6 grid gap-5 text-base leading-8 text-[#334155] sm:text-lg">
                    <p>
                        Tôi là Hồ Thị Huyền Trang, sinh viên năm cuối ngành Ngôn ngữ Anh tại Trường Đại học Ngoại ngữ - ĐHQGHN. Với nền tảng ngoại ngữ cùng kinh nghiệm trong tư vấn du lịch, chăm sóc khách hàng và giảng dạy tiếng Anh, tôi mong muốn phát triển trong những lĩnh vực nơi giao tiếp, nội dung và trải nghiệm khách hàng đóng vai trò quan trọng.
                    </p>
                    <p>
                        Tôi yêu thích các công việc cho phép mình kết nối với con người, truyền tải thông tin rõ ràng và tạo ra giá trị thực tế qua từng dự án, từng lớp học hoặc từng trải nghiệm khách hàng.
                    </p>
                </div>
            </div>
            <aside class="rounded-3xl border border-white/80 bg-white p-7 shadow-sm">
                <p class="text-xl font-bold leading-8 text-[#0F3D5E]">
                    "Mỗi trải nghiệm với khách hàng, học viên hoặc dự án đều là cơ hội để tôi học cách giao tiếp tốt hơn và tạo ra giá trị rõ ràng hơn."
                </p>
                <div class="mt-8 grid gap-4">
                    <?php foreach ([['Major', 'English Language'], ['Location', 'Hanoi, Vietnam'], ['Career focus', 'Tourism, Communication, Education']] as $item) : ?>
                        <div class="rounded-2xl bg-[#DCEEFF] p-4">
                            <p class="text-sm font-semibold text-[#667085]"><?php echo esc_html($item[0]); ?></p>
                            <p class="mt-1 font-bold text-[#0F3D5E]"><?php echo esc_html($item[1]); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </aside>
        </div>
    </section>

    <section id="experience" class="bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80ED]">Experience</p>
                <h2 class="mt-3 text-3xl font-extrabold text-[#0F3D5E] sm:text-4xl">Kinh nghiệm thực tế theo dạng case card</h2>
            </div>
            <div class="mt-9 grid gap-6 lg:grid-cols-2">
                <?php foreach ($experiences as $experience) : ?>
                    <article class="rounded-3xl border border-[#E5E7EB] bg-white p-6 shadow-sm sm:p-8">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div>
                                <span class="rounded-full bg-[#DCEEFF] px-4 py-2 text-sm font-bold text-[#0F3D5E]"><?php echo esc_html($experience['period']); ?></span>
                                <h3 class="mt-5 text-2xl font-extrabold text-[#0F3D5E]"><?php echo esc_html($experience['title']); ?></h3>
                                <p class="mt-2 font-semibold text-[#222222]"><?php echo esc_html($experience['role']); ?></p>
                                <p class="mt-1 text-sm leading-6 text-[#667085]"><?php echo esc_html($experience['company']); ?></p>
                            </div>
                        </div>
                        <p class="mt-5 text-base leading-7 text-[#334155]"><?php echo esc_html($experience['description']); ?></p>
                        <div class="mt-6 rounded-3xl bg-[#F8FAFC] p-5">
                            <p class="font-bold text-[#0F3D5E]">Key results</p>
                            <ul class="mt-3 grid gap-3 text-sm leading-6 text-[#334155]">
                                <?php foreach ($experience['results'] as $result) : ?>
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-[#D9A441]" aria-hidden="true"></span>
                                        <span><?php echo esc_html($result); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="mt-5 flex flex-wrap gap-2">
                            <?php foreach ($experience['skills'] as $skill) : ?>
                                <span class="rounded-full border border-[#DCEEFF] px-3 py-1.5 text-xs font-bold text-[#0F3D5E]"><?php echo esc_html($skill); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="featured-project" class="bg-[#0F3D5E] py-14 text-white sm:py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8">
            <div class="rounded-3xl border border-white/15 bg-white/10 p-3 shadow-2xl shadow-black/20">
                <div class="flex aspect-video items-center justify-center rounded-2xl bg-[#08283E] p-6 text-center">
                    <div>
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#D9A441] text-[#0F3D5E]">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M8 5v14l11-7z"></path>
                            </svg>
                        </div>
                        <p class="mt-5 text-lg font-bold">Video project placeholder</p>
                        <p class="mt-2 max-w-md text-sm leading-6 text-white/70">Replace this block with YouTube, Google Drive, Vimeo or MP4 embed link.</p>
                    </div>
                </div>
            </div>
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#D9A441]">Featured Project</p>
                <span class="mt-4 inline-flex rounded-full bg-[#D9A441] px-4 py-2 text-sm font-extrabold text-[#0F3D5E]">Award-Winning Project</span>
                <h2 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl">Video truyền thông đạt giải xuất sắc</h2>
                <p class="mt-4 text-base font-semibold leading-7 text-white/90">
                    Đạt giải "Video truyền thông xuất sắc nhất" - Cuộc thi Kỹ năng Hướng dẫn viên Du lịch 2025
                </p>
                <p class="mt-5 text-base leading-8 text-white/75">
                    Dự án video truyền thông được thực hiện trong khuôn khổ Cuộc thi Kỹ năng Hướng dẫn viên Du lịch 2025. Sản phẩm thể hiện khả năng xây dựng thông điệp, kể chuyện bằng hình ảnh và truyền tải nội dung du lịch một cách hấp dẫn.
                </p>
                <p class="mt-4 text-base leading-8 text-white/75">
                    Tham gia vào quá trình xây dựng nội dung, truyền tải thông điệp và hoàn thiện sản phẩm truyền thông cùng nhóm dự án.
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    <?php foreach (['Storytelling', 'Tourism Communication', 'Content Planning', 'Teamwork', 'Presentation', 'Visual Communication'] as $skill) : ?>
                        <span class="rounded-full bg-white/10 px-3 py-2 text-sm font-semibold text-white"><?php echo esc_html($skill); ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url($project_video_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-6 text-sm font-bold text-[#0F3D5E] transition hover:bg-[#DCEEFF]">
                        Xem video dự án
                    </a>
                    <a href="#awards" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-6 text-sm font-bold text-white transition hover:bg-white/10">
                        Xem thêm hoạt động
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="education" class="bg-[#F8FAFC] py-14 sm:py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:px-8">
            <article class="rounded-3xl bg-white p-7 shadow-sm sm:p-8">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80ED]">Education</p>
                <h2 class="mt-4 text-3xl font-extrabold text-[#0F3D5E]">Cử nhân ngành Ngôn ngữ Anh</h2>
                <p class="mt-3 text-base font-semibold text-[#222222]">Trường Đại học Ngoại ngữ - ĐHQGHN</p>
                <p class="mt-1 text-sm text-[#667085]">10/2022 - 06/2026</p>
                <div class="mt-7 grid gap-3 sm:grid-cols-2">
                    <div class="rounded-2xl bg-[#DCEEFF] p-5">
                        <p class="text-3xl font-extrabold text-[#0F3D5E]">3.63/4</p>
                        <p class="mt-1 text-sm font-semibold text-[#667085]">GPA</p>
                    </div>
                    <div class="rounded-2xl bg-[#F6EFE7] p-5">
                        <p class="text-3xl font-extrabold text-[#D9A441]">Xuất sắc</p>
                        <p class="mt-1 text-sm font-semibold text-[#667085]">Academic classification</p>
                    </div>
                </div>
            </article>

            <div class="grid gap-4 sm:grid-cols-3 lg:grid-cols-1">
                <?php foreach ($certificates as $certificate) : ?>
                    <article class="rounded-3xl border border-[#E5E7EB] bg-white p-6 shadow-sm">
                        <p class="text-sm font-bold text-[#667085]"><?php echo esc_html($certificate['issuer']); ?></p>
                        <h3 class="mt-2 text-xl font-extrabold text-[#0F3D5E]"><?php echo esc_html($certificate['name']); ?></h3>
                        <p class="mt-3 inline-flex rounded-full bg-[#DCEEFF] px-4 py-2 text-sm font-bold text-[#0F3D5E]"><?php echo esc_html($certificate['score']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80ED]">Skills</p>
                <h2 class="mt-3 text-3xl font-extrabold text-[#0F3D5E] sm:text-4xl">Nhóm kỹ năng phục vụ công việc</h2>
            </div>
            <div class="mt-9 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($skill_groups as $group) : ?>
                    <article class="rounded-3xl bg-[#DCEEFF] p-6">
                        <h3 class="text-xl font-extrabold text-[#0F3D5E]"><?php echo esc_html($group['title']); ?></h3>
                        <div class="mt-5 flex flex-wrap gap-2">
                            <?php foreach ($group['items'] as $item) : ?>
                                <span class="rounded-full bg-white px-3 py-2 text-sm font-semibold text-[#334155]"><?php echo esc_html($item); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="awards" class="bg-[#F6EFE7] py-14 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#D9A441]">Activities & Awards</p>
                <h2 class="mt-3 text-3xl font-extrabold text-[#0F3D5E] sm:text-4xl">Hoạt động nổi bật ngoài học tập</h2>
            </div>
            <div class="mt-9 grid gap-5 lg:grid-cols-2">
                <article class="rounded-3xl bg-white p-7 shadow-sm">
                    <p class="inline-flex rounded-full bg-[#D9A441] px-4 py-2 text-sm font-extrabold text-[#0F3D5E]">Award</p>
                    <h3 class="mt-5 text-2xl font-extrabold text-[#0F3D5E]">Best Communication Video</h3>
                    <p class="mt-3 text-base leading-7 text-[#334155]">Đạt giải "Video truyền thông xuất sắc nhất" - Cuộc thi Kỹ năng Hướng dẫn viên Du lịch 2025.</p>
                    <a href="#featured-project" class="mt-6 inline-flex font-bold text-[#2F80ED]">Xem dự án video</a>
                </article>
                <article class="rounded-3xl bg-white p-7 shadow-sm">
                    <p class="inline-flex rounded-full bg-[#DCEEFF] px-4 py-2 text-sm font-extrabold text-[#0F3D5E]">Volunteer</p>
                    <h3 class="mt-5 text-2xl font-extrabold text-[#0F3D5E]">Outstanding Volunteer - SCF Social Fund</h3>
                    <p class="mt-3 text-base leading-7 text-[#334155]">Tình nguyện viên xuất sắc của Quỹ xã hội SCF, được ghi nhận thành tích đóng góp trong các chương trình hỗ trợ cộng đồng.</p>
                </article>
            </div>
        </div>
    </section>

    <section id="contact" class="bg-[#0F3D5E] py-14 text-white sm:py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1fr_0.9fr] lg:items-center lg:px-8">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#D9A441]">Let's connect</p>
                <h2 class="mt-3 text-3xl font-extrabold leading-tight sm:text-4xl">Sẵn sàng cho những cơ hội mới</h2>
                <p class="mt-5 max-w-3xl text-base leading-8 text-white/75">
                    Tôi luôn sẵn sàng trao đổi về các cơ hội thực tập, vị trí entry-level hoặc dự án liên quan đến du lịch, truyền thông, chăm sóc khách hàng và giáo dục.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="mailto:<?php echo esc_attr($portfolio_email); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-white px-6 text-sm font-bold text-[#0F3D5E] transition hover:bg-[#DCEEFF]">
                        Liên hệ với tôi
                    </a>
                    <a href="<?php echo esc_url($cv_url); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-6 text-sm font-bold text-white transition hover:bg-white/10">
                        Tải CV
                    </a>
                    <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 px-6 text-sm font-bold text-white transition hover:bg-white/10">
                        Xem LinkedIn
                    </a>
                </div>
            </div>
            <div class="rounded-3xl border border-white/15 bg-white/10 p-7">
                <dl class="grid gap-5">
                    <div>
                        <dt class="text-sm font-bold uppercase tracking-[0.16em] text-white/55">Location</dt>
                        <dd class="mt-1 text-lg font-bold">Hanoi, Vietnam</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-bold uppercase tracking-[0.16em] text-white/55">Availability</dt>
                        <dd class="mt-1 text-lg font-bold">Internship / entry-level opportunities</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-bold uppercase tracking-[0.16em] text-white/55">Email</dt>
                        <dd class="mt-1 text-lg font-bold">
                            <a href="mailto:<?php echo esc_attr($portfolio_email); ?>" class="break-all transition hover:text-[#D9A441]"><?php echo esc_html($portfolio_email); ?></a>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-bold uppercase tracking-[0.16em] text-white/55">LinkedIn</dt>
                        <dd class="mt-1 text-lg font-bold">
                            <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer" class="break-all transition hover:text-[#D9A441]">linkedin.com/in/hohuyentrang</a>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>
</main>
