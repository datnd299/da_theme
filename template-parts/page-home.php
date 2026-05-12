<?php
/**
 * Template Name: Home
 * Template Part: page-home
 */

$ccm_image = static function ($file) {
    return get_template_directory_uri() . '/assets/img/gallery/CCM/' . rawurlencode($file);
};
?>

<main id="primary" class="bg-[#FAF7F2] text-[#2F2A28] font-body">

    <!-- Hero -->
    <section id="khong-gian" class="relative min-h-[78vh] overflow-hidden bg-[#123D2A] text-white">
        <img src="<?php echo esc_url($ccm_image('faa6de0a-885b-49cd-84d6-4ee0c69bc773.png')); ?>"
             alt="<?php esc_attr_e('Toàn cảnh Chuyện Của Mưa bên ao nước, nhà tre, đồng lúa và núi xa', 'dawp'); ?>"
             class="absolute inset-0 h-full w-full object-cover"
             loading="eager"
             fetchpriority="high">
        <div class="absolute inset-0 bg-gradient-to-r from-[#123D2A]/92 via-[#123D2A]/58 to-black/18"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_28%_45%,rgba(18,61,42,0.62)_0%,rgba(18,61,42,0.42)_28%,rgba(18,61,42,0.12)_52%,transparent_74%)]"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/18 via-transparent to-black/18"></div>
        <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-[#FAF7F2] to-transparent"></div>

        <div class="relative mx-auto flex min-h-[78vh] max-w-7xl items-center px-4 py-20 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-5 text-sm font-black uppercase tracking-[0.2em] text-[#E7C873]">
                    <?php esc_html_e('Chuyện Của Mưa • Thành phố Điện Biên', 'dawp'); ?>
                </p>

                <h1 class="font-heading text-5xl font-black uppercase leading-[1.04] text-white sm:text-6xl lg:text-7xl">
                    <?php esc_html_e('Chậm lại một chút, nghe Chuyện Của Mưa.', 'dawp'); ?>
                </h1>

                <p class="mt-6 max-w-2xl text-base leading-8 text-white/90 md:text-lg">
                    <?php esc_html_e('Một quán nhỏ bên ao, sau lưng là cánh đồng lúa, nơi mỗi người có thể mang theo câu chuyện của mình và ngồi lại trong một khoảng bình yên.', 'dawp'); ?>
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="#ben-ao"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#E7C873] px-7 text-sm font-black uppercase tracking-wide text-[#2F2A28] transition hover:bg-[#F2DFA2]">
                        <?php esc_html_e('Khám phá không gian', 'dawp'); ?>
                    </a>
                    <a href="#mo-cua"
                       class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/35 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#2F2A28]">
                        <?php esc_html_e('Theo dõi ngày mở cửa', 'dawp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro Story -->
    <section class="relative overflow-hidden bg-[#FAF7F2] py-16 lg:py-24">
        <div class="pointer-events-none absolute left-0 top-10 h-px w-full bg-[#D8C7A3]/55"></div>
        <div class="pointer-events-none absolute right-8 top-16 hidden font-heading text-[120px] font-black uppercase leading-none text-[#123D2A]/5 lg:block">
            <?php esc_html_e('Mưa', 'dawp'); ?>
        </div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 border-y border-[#D8C7A3]/60 px-4 py-10 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:px-8 lg:py-14">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#8A6F35]">
                    <?php esc_html_e('Một cái tên, nhiều câu chuyện', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black uppercase leading-[1.12] text-[#123D2A] lg:text-6xl">
                    <?php esc_html_e('Mưa có khi buồn, có khi vui, có khi chỉ là một lý do để ngồi lại.', 'dawp'); ?>
                </h2>
                <div class="mt-7 flex flex-wrap gap-3">
                    <?php foreach (['Vui', 'Buồn', 'Nhớ', 'Yên'] as $mood) : ?>
                        <span class="rounded-full border border-[#D8C7A3] bg-white/55 px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#8A6F35]">
                            <?php echo esc_html($mood); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="space-y-5 text-base leading-8 text-[#6F625D] lg:border-l lg:border-[#D8C7A3]/70 lg:pl-10">
                <p><?php esc_html_e('Nhắc đến mưa, mỗi người lại nhớ về một điều khác nhau. Có người nhớ một buổi chiều lãng mạn, có người nhớ gia đình, bạn bè, những câu chuyện cũ, hoặc một ngày dài chỉ muốn tìm chỗ để lòng mình dịu xuống.', 'dawp'); ?></p>
                <p><?php esc_html_e('Chuyện Của Mưa được tạo ra để đón nhận những điều ấy. Mỗi vị khách đến quán đều mang theo một câu chuyện riêng, và chúng mình mong nơi này đủ yên để câu chuyện ấy được lắng nghe.', 'dawp'); ?></p>
                <div class="border-l-4 border-[#E7C873] bg-white/65 px-5 py-4 text-sm font-bold leading-7 text-[#3A342F]">
                    <?php esc_html_e('Một cái tên không chỉ để gọi, mà để giữ lại những vui buồn rất đời thường.', 'dawp'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Pond Space -->
    <section id="ben-ao" class="bg-white py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <img src="<?php echo esc_url($ccm_image('download.png')); ?>"
                     alt="<?php esc_attr_e('Góc ngồi ven ao với sen, cá và nhà tre của Chuyện Của Mưa', 'dawp'); ?>"
                     class="col-span-2 aspect-[16/10] w-full rounded-lg object-cover shadow-xl shadow-black/10">
                <img src="<?php echo esc_url($ccm_image('c12fc4f1-a8c3-46b6-b18c-6a938535670c.png')); ?>"
                     alt="<?php esc_attr_e('Những gian tre nằm sát mặt nước tại Chuyện Của Mưa', 'dawp'); ?>"
                     class="aspect-[4/3] w-full rounded-lg object-cover">
                <img src="<?php echo esc_url($ccm_image('Ảnh#1.png')); ?>"
                     alt="<?php esc_attr_e('Ao cá, hoa sen và những mái tre bên đồng lúa', 'dawp'); ?>"
                     class="aspect-[4/3] w-full rounded-lg object-cover">
            </div>

            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#8A6F35]">
                    <?php esc_html_e('Bên ao', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black uppercase leading-[1.12] text-[#123D2A] lg:text-6xl">
                    <?php esc_html_e('Ngồi gần mặt nước, nghe ngày trôi chậm lại.', 'dawp'); ?>
                </h2>
                <p class="mt-6 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Những gian tre được đặt sát bên ao để mỗi buổi gặp gỡ có thêm một chút gió, một chút mặt nước và một chút yên bình. Dưới ao là đàn cá bơi, trên bàn là ly trà mát, xung quanh là những câu chuyện được kể rất tự nhiên.', 'dawp'); ?>
                </p>

                <div class="mt-8 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <?php
                    $pond_highlights = [
                        'Góc ngồi ven ao',
                        'Không gian mở',
                        'Cá, sen và mặt nước',
                        'Phù hợp bạn bè, gia đình, cặp đôi',
                    ];
                    foreach ($pond_highlights as $highlight) :
                        ?>
                        <div class="rounded-lg border border-[#E6DDCC] bg-[#FAF7F2] px-4 py-3 text-sm font-bold text-[#3A342F]">
                            <?php echo esc_html($highlight); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Rice Field -->
    <section class="relative overflow-hidden bg-[#EAF1D8] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#607234]">
                    <?php esc_html_e('Sau lưng là đồng lúa', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black uppercase leading-[1.12] text-[#123D2A] lg:text-6xl">
                    <?php esc_html_e('Một mặt là ao nước, một mặt là hương đồng gió nội.', 'dawp'); ?>
                </h2>
                <p class="mt-6 text-base leading-8 text-[#54604A]">
                    <?php esc_html_e('Ở Chuyện Của Mưa, chỉ cần quay lưng lại, bạn đã thấy cánh đồng lúa mở ra phía sau. Có những ngày lúa xanh, có những ngày nắng vàng, có những chiều gió thổi qua mái lá khiến mọi thứ trở nên rất đỗi bình thường mà cũng rất đáng nhớ.', 'dawp'); ?>
                </p>
            </div>

            <img src="<?php echo esc_url($ccm_image('d2f7d2e7-96be-4629-a10a-c67f517a3e76.png')); ?>"
                 alt="<?php esc_attr_e('Nhà tre Chuyện Của Mưa bên ao, phía sau là đồng lúa và núi xanh', 'dawp'); ?>"
                 class="aspect-[16/10] w-full rounded-lg object-cover shadow-xl shadow-black/10">
        </div>
    </section>

    <!-- Materials -->
    <section class="bg-[#2F2A28] py-16 text-white lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E7C873]">
                        <?php esc_html_e('Tre, trúc và mái lá', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black uppercase leading-[1.12] lg:text-6xl">
                        <?php esc_html_e('Mộc mạc từ những điều chạm tay được.', 'dawp'); ?>
                    </h2>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/78">
                        <?php esc_html_e('Chúng mình muốn không gian của Mưa giữ lại cảm giác gần gũi của làng quê Việt Nam. Từ mái lá, cột tre, lan can trúc đến những chiếc bàn nhỏ bên ao, mọi chi tiết đều được tạo ra để bạn thấy nhẹ nhàng hơn khi bước vào.', 'dawp'); ?>
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <?php
                    $material_cards = [
                        'Gian ngồi riêng tư',
                        'Bàn ghế tre dân dã',
                        'Mái lá gần thiên nhiên',
                        'Góc chụp ảnh tự nhiên',
                    ];
                    foreach ($material_cards as $index => $card) :
                        ?>
                        <div class="rounded-lg border border-white/12 bg-white/8 p-5">
                            <span class="text-sm font-black text-[#E7C873]"><?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                            <p class="mt-4 font-heading text-2xl font-black uppercase leading-[1.18]">
                                <?php echo esc_html($card); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu -->
    <section id="menu" class="bg-[#FAF7F2] py-16 lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.92fr_1.08fr] lg:px-8">
            <div class="order-2 lg:order-1">
                <img src="<?php echo esc_url($ccm_image('download copy.png')); ?>"
                     alt="<?php esc_attr_e('Ly đồ uống trong gian tre bên ao của Chuyện Của Mưa', 'dawp'); ?>"
                     class="aspect-[4/5] w-full rounded-lg object-cover shadow-xl shadow-black/10">
            </div>

            <div class="order-1 lg:order-2">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#8A6F35]">
                    <?php esc_html_e('Menu của Mưa', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black uppercase leading-[1.12] text-[#123D2A] lg:text-6xl">
                    <?php esc_html_e('Một ly trà mát, một tách cà phê, và câu chuyện còn dài.', 'dawp'); ?>
                </h2>
                <p class="mt-6 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Ở Chuyện Của Mưa, đồ uống không cần quá cầu kỳ để trở nên đáng nhớ. Chỉ cần đủ ngon, đủ mát, đủ hợp với buổi ngồi lâu bên ao. Từ cà phê quen vị, trà chanh tươi mát đến những ly trà trái cây nhẹ nhàng, mỗi món đều được chuẩn bị để đi cùng câu chuyện của bạn.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <?php
                    $menu_groups = ['Cà phê', 'Trà chanh', 'Trà trái cây', 'Đồ uống mát', 'Đồ uống theo mùa', 'Món nhâm nhi'];
                    foreach ($menu_groups as $group) :
                        ?>
                        <span class="rounded-md border border-[#D8C7A3] bg-white px-4 py-2 text-sm font-bold text-[#3A342F]">
                            <?php echo esc_html($group); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- People -->
    <section class="relative overflow-hidden bg-white py-16 lg:py-24">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-[#E6DDCC]"></div>
        <div class="pointer-events-none absolute -right-10 top-14 hidden h-72 w-72 rounded-full border border-[#D8C7A3]/45 lg:block"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 border-b border-[#E6DDCC] pb-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-end">
                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#8A6F35]">
                        <?php esc_html_e('Câu chuyện của bạn', 'dawp'); ?>
                    </p>
                    <h2 class="font-heading text-4xl font-black uppercase leading-[1.12] text-[#123D2A] lg:text-6xl">
                        <?php esc_html_e('Có người đến để vui, có người đến để yên, có người đến chỉ để được ngồi lại.', 'dawp'); ?>
                    </h2>
                </div>
                <div class="border-l border-[#D8C7A3] pl-6">
                    <p class="text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Mỗi vị khách mang theo một câu chuyện khác nhau. Có câu chuyện của bạn bè lâu ngày gặp lại, câu chuyện của gia đình trong một buổi cuối tuần, câu chuyện của đôi người đang thương, và cả những câu chuyện không cần nói thành lời.', 'dawp'); ?>
                    </p>
                    <div class="mt-6 grid grid-cols-3 gap-2 text-center text-xs font-black uppercase tracking-[0.14em] text-[#8A6F35]">
                        <span class="border-y border-[#E6DDCC] py-2"><?php esc_html_e('Bạn bè', 'dawp'); ?></span>
                        <span class="border-y border-[#E6DDCC] py-2"><?php esc_html_e('Gia đình', 'dawp'); ?></span>
                        <span class="border-y border-[#E6DDCC] py-2"><?php esc_html_e('Một mình', 'dawp'); ?></span>
                    </div>
                </div>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php
                $experiences = [
                    ['title' => 'Đi cùng bạn bè', 'text' => 'Một bàn đủ rộng cho tiếng cười và những chuyện chưa kể hết.'],
                    ['title' => 'Đi cùng gia đình', 'text' => 'Không gian mở, thoáng và gần gũi cho một buổi ngồi lâu.'],
                    ['title' => 'Đi cùng người thương', 'text' => 'Một góc bên ao vừa đủ riêng để chiều trôi nhẹ hơn.'],
                    ['title' => 'Đi một mình cũng được', 'text' => 'Một chỗ ngồi yên để đọc sách, nhìn nước và nghỉ lại.'],
                ];
                foreach ($experiences as $item) :
                    ?>
                    <article class="rounded-lg border border-[#E6DDCC] bg-[#FAF7F2] p-6">
                        <h3 class="font-heading text-2xl font-black uppercase leading-[1.18] text-[#123D2A]">
                            <?php echo esc_html($item['title']); ?>
                        </h3>
                        <p class="mt-3 text-sm leading-6 text-[#6F625D]">
                            <?php echo esc_html($item['text']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section id="thu-vien" class="relative overflow-hidden bg-[#FAF7F2] py-16 lg:py-24">
        <div class="pointer-events-none absolute left-0 top-24 hidden h-px w-1/3 bg-[#D8C7A3]/70 lg:block"></div>
        <div class="pointer-events-none absolute right-0 top-24 hidden h-px w-1/3 bg-[#D8C7A3]/70 lg:block"></div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 max-w-3xl border-l-4 border-[#E7C873] pl-6">
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#8A6F35]">
                    <?php esc_html_e('Khoảnh khắc của Mưa', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black uppercase leading-[1.12] text-[#123D2A] lg:text-6xl">
                    <?php esc_html_e('Mỗi góc nhỏ đều có một câu chuyện để giữ lại.', 'dawp'); ?>
                </h2>
                <p class="mt-5 text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Có thể là ánh nắng rơi trên mái tre, một bông sen cạnh mặt nước, ly trà đặt trên bàn, hay nụ cười của người ngồi đối diện. Những điều rất nhỏ ấy đôi khi lại là thứ khiến ta nhớ lâu nhất.', 'dawp'); ?>
                </p>
            </div>

            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
                <?php
                $gallery_images = [
                    ['file' => 'c12fc4f1-a8c3-46b6-b18c-6a938535670c copy.png', 'class' => 'col-span-2 row-span-2 aspect-[4/3]', 'alt' => 'Toàn cảnh ao cá và những gian tre của Chuyện Của Mưa'],
                    ['file' => 'download.png', 'class' => 'aspect-square', 'alt' => 'Hoa sen, ao cá và góc ngồi bên mái tre'],
                    ['file' => 'd2f7d2e7-96be-4629-a10a-c67f517a3e76 copy.png', 'class' => 'aspect-square', 'alt' => 'Biển gỗ Chuyện Của Mưa trên gian nhà tre'],
                    ['file' => 'Ảnh#1 copy.png', 'class' => 'aspect-square', 'alt' => 'Đàn cá dưới ao cạnh hoa sen và nhà tre'],
                    ['file' => 'faa6de0a-885b-49cd-84d6-4ee0c69bc773.png', 'class' => 'aspect-square', 'alt' => 'Nhà tre ven ao với đồng lúa phía sau'],
                ];
                foreach ($gallery_images as $image) :
                    ?>
                    <img src="<?php echo esc_url($ccm_image($image['file'])); ?>"
                         alt="<?php echo esc_attr($image['alt']); ?>"
                         class="<?php echo esc_attr($image['class']); ?> w-full rounded-lg object-cover shadow-sm">
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Opening -->
    <section id="mo-cua" class="bg-[#123D2A] py-16 text-white lg:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#E7C873]">
                    <?php esc_html_e('Hẹn gặp bạn tháng 8', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black uppercase leading-[1.12] lg:text-6xl">
                    <?php esc_html_e('Mưa đang chuẩn bị những góc ngồi đầu tiên để đón bạn.', 'dawp'); ?>
                </h2>
                <p class="mt-6 text-base leading-8 text-white/80">
                    <?php esc_html_e('Chuyện Của Mưa dự kiến mở cửa vào tháng 8 này tại thành phố Điện Biên. Chúng mình đang chuẩn bị từng mái tre, từng chiếc bàn, từng góc nhìn ra ao để khi bạn ghé đến, mọi thứ đủ yên, đủ ấm và đủ gần để câu chuyện bắt đầu.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#lien-he"
                       class="inline-flex min-h-12 items-center justify-center rounded-md bg-[#E7C873] px-7 text-sm font-black uppercase tracking-wide text-[#2F2A28] transition hover:bg-[#F2DFA2]">
                        <?php esc_html_e('Theo dõi ngày mở cửa', 'dawp'); ?>
                    </a>
                    <a href="#thu-vien"
                       class="inline-flex min-h-12 items-center justify-center rounded-md border border-white/25 px-7 text-sm font-black uppercase tracking-wide text-white transition hover:bg-white hover:text-[#123D2A]">
                        <?php esc_html_e('Lưu lại để ghé Mưa', 'dawp'); ?>
                    </a>
                </div>
            </div>

            <img src="<?php echo esc_url($ccm_image('c12fc4f1-a8c3-46b6-b18c-6a938535670c.png')); ?>"
                 alt="<?php esc_attr_e('Những gian tre của Chuyện Của Mưa đang chờ ngày đón khách', 'dawp'); ?>"
                 class="aspect-[16/11] w-full rounded-lg object-cover shadow-2xl shadow-black/20">
        </div>
    </section>

    <!-- Contact -->
    <section id="lien-he" class="relative overflow-hidden bg-[#FAF7F2] py-16 lg:py-24">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-[#D8C7A3]/70"></div>
        <div class="pointer-events-none absolute bottom-10 left-8 hidden font-heading text-[120px] font-black uppercase leading-none text-[#123D2A]/5 lg:block">
            <?php esc_html_e('Điện Biên', 'dawp'); ?>
        </div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8">
            <div>
                <p class="mb-3 text-sm font-black uppercase tracking-[0.2em] text-[#8A6F35]">
                    <?php esc_html_e('Ghé Mưa khi bạn cần một chỗ ngồi yên', 'dawp'); ?>
                </p>
                <h2 class="font-heading text-4xl font-black uppercase leading-[1.12] text-[#123D2A] lg:text-6xl">
                    <?php esc_html_e('Chuyện Của Mưa luôn chào đón câu chuyện của bạn.', 'dawp'); ?>
                </h2>
                <p class="mt-6 max-w-3xl text-base leading-8 text-[#6F625D]">
                    <?php esc_html_e('Dù bạn đến cùng niềm vui, một nỗi buồn, một người bạn, gia đình, hay chỉ là một buổi chiều muốn ngồi yên, Mưa vẫn ở đó. Bên ao nước, sau lưng là đồng lúa, chờ bạn ghé qua khi quán mở cửa vào tháng 8.', 'dawp'); ?>
                </p>

                <div class="mt-8 flex max-w-3xl items-center gap-4 text-xs font-black uppercase tracking-[0.18em] text-[#8A6F35]">
                    <span class="h-px flex-1 bg-[#D8C7A3]"></span>
                    <span><?php esc_html_e('Lưu lại để ghé Mưa', 'dawp'); ?></span>
                    <span class="h-px flex-1 bg-[#D8C7A3]"></span>
                </div>
            </div>

            <aside class="rounded-lg border border-[#D8C7A3] bg-white p-6 shadow-sm">
                <div class="space-y-5">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-[#8A6F35]"><?php esc_html_e('Địa chỉ', 'dawp'); ?></p>
                        <p class="mt-2 font-bold text-[#2F2A28]"><?php esc_html_e('Thành phố Điện Biên, Việt Nam', 'dawp'); ?></p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-[#8A6F35]"><?php esc_html_e('Giờ mở cửa', 'dawp'); ?></p>
                        <p class="mt-2 font-bold text-[#2F2A28]"><?php esc_html_e('Sắp cập nhật', 'dawp'); ?></p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-[#8A6F35]"><?php esc_html_e('Mở cửa dự kiến', 'dawp'); ?></p>
                        <p class="mt-2 font-bold text-[#2F2A28]"><?php esc_html_e('Tháng 8', 'dawp'); ?></p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-[#8A6F35]"><?php esc_html_e('Facebook & số điện thoại', 'dawp'); ?></p>
                        <p class="mt-2 font-bold text-[#2F2A28]"><?php esc_html_e('Sắp cập nhật', 'dawp'); ?></p>
                    </div>
                </div>
            </aside>
        </div>
    </section>

</main>
