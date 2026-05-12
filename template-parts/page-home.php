<?php
$theme_uri = get_template_directory_uri();

$home_image = static function ($path) use ($theme_uri) {
  return esc_url($theme_uri . $path);
};

$professional_cards = [
  [
    'icon' => '✚',
    'title' => 'Bác sĩ Chuyên khoa I Nhi khoa',
    'copy' => 'Được đào tạo chuyên sâu về Nhi khoa tại Đại học Y Hà Nội giai đoạn 2008 - 2010.',
  ],
  [
    'icon' => '⌁',
    'title' => 'Kinh nghiệm bệnh viện',
    'copy' => 'Từng công tác nhiều năm tại Bệnh viện Yên Sơn, tỉnh Tuyên Quang.',
  ],
  [
    'icon' => '◌',
    'title' => 'Nguyên Trưởng khoa Nhi',
    'copy' => 'Đảm nhiệm chức vụ Trưởng khoa Nhi tại Bệnh viện Yên Sơn giai đoạn 2010 - 2016.',
  ],
  [
    'icon' => '▣',
    'title' => 'Quản lý chuyên môn phòng khám',
    'copy' => 'Đảm nhiệm vai trò Giám đốc chuyên môn Phòng khám The Medcare Hà Nội giai đoạn 2016 - 2026.',
  ],
];

$timeline_items = [
  [
    'year' => '1993 - 1998',
    'title' => 'Đại học Y Thái Nguyên',
    'copy' => 'Theo học ngành Y tại Đại học Y Thái Nguyên, đặt nền tảng cho hành trình làm nghề y.',
  ],
  [
    'year' => '1998 - 2002',
    'title' => 'Trạm xá Y tế xã Hoàng Khai',
    'copy' => 'Công tác tại tuyến y tế cơ sở ở Yên Sơn, Tuyên Quang, tích lũy kinh nghiệm chăm sóc sức khỏe ban đầu cho cộng đồng.',
  ],
  [
    'year' => '2002 - 2008',
    'title' => 'Bệnh viện Yên Sơn, tỉnh Tuyên Quang',
    'copy' => 'Công tác tại bệnh viện, tiếp cận nhiều ca bệnh và tích lũy kinh nghiệm lâm sàng thực tế.',
  ],
  [
    'year' => '2008 - 2010',
    'title' => 'Chuyên khoa I Nhi khoa - Đại học Y Hà Nội',
    'copy' => 'Tham gia đào tạo chuyên sâu về Nhi khoa, củng cố kiến thức và kỹ năng thăm khám trẻ em.',
  ],
  [
    'year' => '2010 - 2016',
    'title' => 'Trưởng khoa Nhi - Bệnh viện Yên Sơn',
    'copy' => 'Đảm nhiệm vai trò Trưởng khoa Nhi, thể hiện kinh nghiệm chuyên môn và năng lực quản lý tại bệnh viện.',
  ],
  [
    'year' => '2016 - 2026',
    'title' => 'Giám đốc chuyên môn Phòng khám The Medcare Hà Nội',
    'copy' => 'Công tác tại hệ thống phòng khám nhi khoa The Medcare, đảm nhiệm vai trò quản lý chuyên môn và đồng hành cùng phụ huynh trong chăm sóc sức khỏe trẻ em.',
  ],
];

$care_principles = [
  'Lắng nghe phụ huynh',
  'Thăm khám cẩn trọng',
  'Giải thích dễ hiểu',
  'Đồng hành sau thăm khám',
];

$specialty_cards = [
  [
    'title' => 'Thăm khám Nhi khoa tổng quát',
    'copy' => 'Đánh giá tình trạng sức khỏe của trẻ và tư vấn hướng chăm sóc phù hợp sau thăm khám.',
  ],
  [
    'title' => 'Tư vấn chăm sóc sức khỏe trẻ em',
    'copy' => 'Hỗ trợ phụ huynh hiểu rõ hơn về các vấn đề sức khỏe thường gặp trong quá trình chăm sóc con.',
  ],
  [
    'title' => 'Theo dõi tăng trưởng và phát triển',
    'copy' => 'Quan tâm đến sự phát triển thể chất và sức khỏe tổng thể của trẻ theo từng giai đoạn.',
  ],
  [
    'title' => 'Đồng hành cùng phụ huynh',
    'copy' => 'Giải thích rõ ràng, dễ hiểu để phụ huynh yên tâm hơn trong quá trình chăm sóc trẻ.',
  ],
];
?>

<section class="bg-[#EEF9FC]">
  <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-12 lg:px-8 lg:py-24">
    <div class="lg:col-span-6">
      <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80A8]">Bác sĩ Chuyên khoa I Nhi khoa</p>
      <h1 class="mt-4 max-w-3xl text-4xl font-bold leading-tight text-[#12324A] sm:text-5xl lg:text-6xl">
        Bác sĩ Lê Thị Thu Hiền
      </h1>
      <p class="mt-6 max-w-2xl text-lg leading-8 text-[#52606D]">
        Với hành trình nhiều năm gắn bó cùng Nhi khoa, Bác sĩ Lê Thị Thu Hiền đồng hành cùng phụ huynh trong thăm khám, tư vấn và chăm sóc sức khỏe trẻ em bằng sự cẩn trọng, thấu hiểu và chuyên môn vững vàng.
      </p>
      <div class="mt-6 rounded-2xl border border-[#DFF3F8] bg-white/80 p-5 text-base font-semibold leading-7 text-[#12324A] shadow-sm">
        Giám đốc chuyên môn Phòng khám The Medcare Hà Nội
      </div>
      <div class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="#hanh-trinh" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2F80A8] px-7 text-sm font-bold text-white transition hover:bg-[#12324A]">
          Xem hành trình chuyên môn
        </a>
        <a href="#lien-he" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F80A8] bg-white px-7 text-sm font-bold text-[#2F80A8] transition hover:bg-[#DFF3F8]">
          Liên hệ đặt lịch
        </a>
      </div>
      <div class="mt-8 grid grid-cols-1 gap-3 text-sm font-semibold text-[#12324A] sm:grid-cols-3">
        <span class="rounded-full bg-white px-4 py-3 shadow-sm">Chuyên khoa I Nhi khoa</span>
        <span class="rounded-full bg-white px-4 py-3 shadow-sm">Nguyên Trưởng khoa Nhi</span>
        <span class="rounded-full bg-white px-4 py-3 shadow-sm">The Medcare Hà Nội</span>
      </div>
    </div>

    <div class="lg:col-span-6">
      <div class="relative overflow-hidden rounded-[28px] bg-white p-3 shadow-xl shadow-[#12324A]/10">
        <img src="<?php echo $home_image('/assets/img/gallery/bshien/Bsi-Hien.png'); ?>" alt="Bác sĩ Lê Thị Thu Hiền" class="aspect-[4/3] w-full rounded-[22px] object-cover" />
        <div class="absolute bottom-6 left-6 max-w-xs rounded-2xl bg-white/95 p-4 shadow-lg">
          <p class="text-sm font-bold text-[#2F80A8]">Chăm sóc trẻ nhỏ</p>
          <p class="mt-1 text-sm leading-6 text-[#52606D]">Cẩn trọng trong thăm khám, rõ ràng trong tư vấn, nhẹ nhàng với gia đình.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="bg-white py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-10 max-w-3xl">
      <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80A8]">Tổng quan chuyên môn</p>
      <h2 class="mt-3 text-3xl font-bold leading-tight text-[#12324A] sm:text-4xl">
        Kinh nghiệm Nhi khoa được xây dựng qua nhiều môi trường y tế.
      </h2>
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($professional_cards as $card) : ?>
      <article class="rounded-[24px] border border-[#DFF3F8] bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg hover:shadow-[#12324A]/10">
        <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-[#E8F7F4] text-xl font-bold text-[#2F80A8]"><?php echo esc_html($card['icon']); ?></div>
        <h3 class="text-lg font-bold leading-snug text-[#12324A]"><?php echo esc_html($card['title']); ?></h3>
        <p class="mt-3 text-sm leading-6 text-[#52606D]"><?php echo esc_html($card['copy']); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="hanh-trinh" class="bg-[#FFF8EF] py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto mb-12 max-w-3xl text-center">
      <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80A8]">Hành trình chuyên môn</p>
      <h2 class="mt-3 text-3xl font-bold leading-tight text-[#12324A] sm:text-4xl">
        Từ nền tảng y khoa chính quy đến vai trò quản lý chuyên môn Nhi khoa.
      </h2>
      <p class="mt-5 text-base leading-7 text-[#52606D]">
        Hành trình của Bác sĩ Lê Thị Thu Hiền trải qua nhiều môi trường y tế khác nhau, từ tuyến y tế cơ sở, bệnh viện, đào tạo chuyên khoa Nhi đến vai trò quản lý chuyên môn tại hệ thống phòng khám nhi khoa.
      </p>
    </div>

    <div class="relative mx-auto max-w-5xl">
      <div class="absolute left-4 top-0 hidden h-full w-px bg-[#7FC8C2]/50 md:left-1/2 md:block"></div>
      <div class="space-y-6">
        <?php foreach ($timeline_items as $index => $item) : ?>
        <article class="relative grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-10">
          <div class="<?php echo $index % 2 ? 'md:col-start-2' : ''; ?> rounded-[24px] border border-[#DFF3F8] bg-white p-6 shadow-sm">
            <span class="inline-flex rounded-full bg-[#DFF3F8] px-4 py-2 text-sm font-bold text-[#2F80A8]"><?php echo esc_html($item['year']); ?></span>
            <h3 class="mt-4 text-xl font-bold leading-snug text-[#12324A]"><?php echo esc_html($item['title']); ?></h3>
            <p class="mt-3 text-sm leading-6 text-[#52606D]"><?php echo esc_html($item['copy']); ?></p>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section id="triet-ly" class="bg-[#E8F7F4] py-16 lg:py-24">
  <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
    <div>
      <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80A8]">Triết lý chăm sóc</p>
      <h2 class="mt-3 text-3xl font-bold leading-tight text-[#12324A] sm:text-4xl">
        Nhi khoa không chỉ là xem triệu chứng, mà là lắng nghe cả gia đình.
      </h2>
      <blockquote class="mt-6 rounded-[24px] border-l-4 border-[#2F80A8] bg-white p-6 text-xl font-semibold leading-9 text-[#12324A] shadow-sm">
        “Với bác sĩ nhi khoa, mỗi lần thăm khám không chỉ là xem một triệu chứng, mà là lắng nghe cả sự lo lắng của cha mẹ và sự khó chịu mà trẻ chưa thể diễn đạt trọn vẹn.”
      </blockquote>
      <p class="mt-6 text-base leading-8 text-[#52606D]">
        Trong chăm sóc trẻ nhỏ, sự cẩn trọng và cách giải thích rõ ràng cho phụ huynh là điều rất quan trọng. Bác sĩ luôn hướng tới việc thăm khám nhẹ nhàng, lắng nghe kỹ thông tin từ gia đình và đưa ra tư vấn phù hợp với từng trẻ.
      </p>
    </div>

    <div>
      <img src="<?php echo $home_image('/assets/img/gallery/bshien/429666892_436560252050581_4873857152481017_n.png'); ?>" alt="Hình ảnh chuyên môn của bác sĩ Lê Thị Thu Hiền" class="aspect-[4/3] w-full rounded-[28px] object-cover shadow-xl shadow-[#12324A]/10" />
      <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">
        <?php foreach ($care_principles as $principle) : ?>
        <div class="rounded-2xl bg-white px-5 py-4 text-sm font-bold text-[#12324A] shadow-sm"><?php echo esc_html($principle); ?></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section id="chuyen-mon" class="bg-white py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-10 max-w-3xl">
      <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80A8]">Chuyên môn Nhi khoa</p>
      <h2 class="mt-3 text-3xl font-bold leading-tight text-[#12324A] sm:text-4xl">
        Đồng hành cùng phụ huynh trong chăm sóc sức khỏe trẻ em.
      </h2>
      <p class="mt-5 text-base leading-8 text-[#52606D]">
        Với nền tảng chuyên khoa Nhi và kinh nghiệm thực tế trong bệnh viện, phòng khám, bác sĩ tập trung vào thăm khám, tư vấn và theo dõi sức khỏe trẻ em theo hướng an toàn, cẩn trọng và phù hợp với từng trường hợp.
      </p>
    </div>

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
      <?php foreach ($specialty_cards as $card) : ?>
      <article class="rounded-[24px] border border-[#DFF3F8] bg-[#EEF9FC] p-6">
        <h3 class="text-xl font-bold text-[#12324A]"><?php echo esc_html($card['title']); ?></h3>
        <p class="mt-3 text-base leading-7 text-[#52606D]"><?php echo esc_html($card['copy']); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="bg-[#12324A] py-16 text-white lg:py-24">
  <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
    <div class="order-2 lg:order-1">
      <img src="<?php echo $home_image('/assets/img/gallery/bshien/689235060_1476398857515209_8311699732582292443_n.jpg'); ?>" alt="Bác sĩ Lê Thị Thu Hiền trong hoạt động chuyên môn" class="aspect-[4/3] w-full rounded-[28px] object-cover" />
    </div>
    <div class="order-1 lg:order-2">
      <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#7FC8C2]">Vai trò chuyên môn hiện tại</p>
      <h2 class="mt-3 text-3xl font-bold leading-tight sm:text-4xl">
        Giám đốc chuyên môn Phòng khám The Medcare Hà Nội.
      </h2>
      <p class="mt-5 text-base leading-8 text-white/80">
        Từ năm 2016 đến 2026, Bác sĩ Lê Thị Thu Hiền công tác tại hệ thống phòng khám nhi khoa The Medcare và đảm nhiệm vai trò Giám đốc chuyên môn Phòng khám The Medcare Hà Nội. Đây là giai đoạn bác sĩ kết hợp kinh nghiệm thăm khám Nhi khoa với công tác quản lý chuyên môn trong môi trường phòng khám hiện đại.
      </p>
      <div class="mt-7 grid grid-cols-1 gap-3 sm:grid-cols-2">
        <?php foreach (['Quản lý chuyên môn', 'Thăm khám và tư vấn nhi khoa', 'Đồng hành cùng phụ huynh', 'Xây dựng chất lượng chăm sóc trẻ em'] as $highlight) : ?>
        <span class="rounded-2xl border border-white/15 bg-white/10 px-4 py-3 text-sm font-semibold text-white"><?php echo esc_html($highlight); ?></span>
        <?php endforeach; ?>
      </div>
      <a href="#lien-he" class="mt-8 inline-flex min-h-12 items-center justify-center rounded-full bg-white px-7 text-sm font-bold text-[#12324A] transition hover:bg-[#DFF3F8]">
        Liên hệ đặt lịch
      </a>
    </div>
  </div>
</section>

<section class="bg-[#FFF8EF] py-16 lg:py-24">
  <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
    <div class="lg:col-span-7">
      <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80A8]">Gửi phụ huynh</p>
      <h2 class="mt-3 text-3xl font-bold leading-tight text-[#12324A] sm:text-4xl">
        Mỗi đứa trẻ cần được thăm khám bằng sự cẩn trọng và thấu hiểu.
      </h2>
      <p class="mt-5 text-base leading-8 text-[#52606D]">
        Khi con không khỏe, sự lo lắng của cha mẹ là điều rất dễ hiểu. Một buổi thăm khám tốt không chỉ giúp đánh giá tình trạng của trẻ, mà còn giúp phụ huynh hiểu rõ hơn về cách chăm sóc con sau đó. Với bác sĩ, sự yên tâm của gia đình cũng là một phần quan trọng trong quá trình chăm sóc sức khỏe trẻ nhỏ.
      </p>
      <p class="mt-6 rounded-[24px] bg-white p-6 text-xl font-semibold leading-8 text-[#12324A] shadow-sm">
        “Lắng nghe kỹ hơn để tư vấn đúng hơn, giải thích rõ hơn để phụ huynh yên tâm hơn.”
      </p>
    </div>
    <div class="lg:col-span-5">
      <img src="<?php echo $home_image('/assets/img/gallery/bshien/116011520_2713605472293353_1474453608355257715_n.jpg'); ?>" alt="Chân dung bác sĩ Lê Thị Thu Hiền" class="aspect-[4/5] w-full rounded-[28px] object-cover shadow-xl shadow-[#12324A]/10" />
    </div>
  </div>
</section>

<section id="lien-he" class="bg-white py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="overflow-hidden rounded-[28px] bg-[#EEF9FC]">
      <div class="grid grid-cols-1 gap-0 lg:grid-cols-2">
        <div class="p-8 sm:p-10 lg:p-12">
          <p class="text-sm font-bold uppercase tracking-[0.18em] text-[#2F80A8]">Liên hệ</p>
          <h2 class="mt-3 text-3xl font-bold leading-tight text-[#12324A] sm:text-4xl">
            Cần tư vấn hoặc đặt lịch thăm khám?
          </h2>
          <p class="mt-5 text-base leading-8 text-[#52606D]">
            Phụ huynh có thể liên hệ để tìm hiểu thêm thông tin thăm khám, đặt lịch hoặc biết thêm về thời gian làm việc của bác sĩ tại phòng khám.
          </p>
          <div class="mt-7 space-y-3 text-base leading-7 text-[#12324A]">
            <p><strong>Địa điểm:</strong> Phòng khám The Medcare Hà Nội</p>
            <p><strong>Số điện thoại:</strong> Sắp cập nhật</p>
            <p><strong>Email:</strong> Sắp cập nhật</p>
            <p><strong>Giờ làm việc:</strong> Sắp cập nhật</p>
          </div>
          <div class="mt-8 flex flex-col gap-3 sm:flex-row">
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#2F80A8] px-7 text-sm font-bold text-white transition hover:bg-[#12324A]">
              Liên hệ đặt lịch
            </a>
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F80A8] bg-white px-7 text-sm font-bold text-[#2F80A8] transition hover:bg-[#DFF3F8]">
              Tìm hiểu về bác sĩ
            </a>
          </div>
        </div>
        <div class="bg-[#12324A] p-8 text-white sm:p-10 lg:p-12">
          <h3 class="text-2xl font-bold">Lưu ý nội dung y tế</h3>
          <p class="mt-4 text-base leading-8 text-white/80">
            Thông tin trên website mang tính giới thiệu chuyên môn và tham khảo, không thay thế cho thăm khám và tư vấn trực tiếp với bác sĩ.
          </p>
          <img src="<?php echo $home_image('/assets/img/gallery/bshien/429666892_436560252050581_4873857152481017_n.png'); ?>" alt="Thông tin giới thiệu bác sĩ Lê Thị Thu Hiền" class="mt-8 aspect-[16/10] w-full rounded-[22px] object-cover opacity-95" />
        </div>
      </div>
    </div>
  </div>
</section>
