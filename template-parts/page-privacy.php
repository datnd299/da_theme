<?php
/**
 * Template Part: Privacy Policy Page
 */

defined('ABSPATH') || exit;

$support_email = 'support@myveganblog.com';
$updated_date  = 'May 28, 2026';
$privacy_image = get_template_directory_uri() . '/assets/img/All_image/image copy 8.png';

$privacy_sections = [
    [
        'number' => '01',
        'title'  => __('Information We Collect', 'dawp'),
        'body'   => [
            __('When you visit or shop with Myveganblog, we may collect information needed to operate our women\'s shoes, handbags, and accessories store. This may include your name, email address, phone number, billing address, shipping address, order details, and payment confirmation details processed through secure payment providers.', 'dawp'),
            __('We may also collect device and browsing information such as IP address, browser type, pages viewed, referring pages, general location data, and cookie identifiers to help keep the site secure and improve the shopping experience.', 'dawp'),
        ],
    ],
    [
        'number' => '02',
        'title'  => __('How We Use Information', 'dawp'),
        'body'   => [
            __('We use customer information to process orders, arrange shipping, send order confirmations, provide tracking updates, respond to customer service requests, manage returns, prevent fraud, and maintain the functionality of our website.', 'dawp'),
            __('If you subscribe to updates, we may use your email address to send new arrival notes, style updates, product news, or promotional messages related to Myveganblog. You may unsubscribe from marketing emails at any time.', 'dawp'),
        ],
    ],
    [
        'number' => '03',
        'title'  => __('Cookies & Site Analytics', 'dawp'),
        'body'   => [
            __('Our website may use cookies and similar technologies to remember preferences, support cart and checkout features, measure site performance, understand customer browsing behavior, and help protect the site from misuse.', 'dawp'),
            __('You can usually adjust cookie settings through your browser. Some cookies are necessary for core store functions, including cart, checkout, account, and security features.', 'dawp'),
        ],
    ],
    [
        'number' => '04',
        'title'  => __('Sharing Information', 'dawp'),
        'body'   => [
            __('We share information only as needed to operate the store and fulfill customer orders. This may include trusted service providers such as payment processors, shipping carriers, order management tools, email service providers, analytics providers, fraud prevention services, and website hosting partners.', 'dawp'),
            __('We may also disclose information when required by law, regulation, legal process, or to protect the rights, safety, and security of Myveganblog, our customers, or others.', 'dawp'),
        ],
    ],
    [
        'number' => '05',
        'title'  => __('Data Retention & Security', 'dawp'),
        'body'   => [
            __('We retain order and customer service records for as long as needed to provide service, meet business needs, comply with legal obligations, resolve disputes, and maintain accurate store records.', 'dawp'),
            __('We use reasonable administrative, technical, and organizational safeguards to help protect personal information. No online system can be guaranteed completely secure, so customers should also protect account credentials and use secure networks when shopping online.', 'dawp'),
        ],
    ],
    [
        'number' => '06',
        'title'  => __('Your Privacy Choices', 'dawp'),
        'body'   => [
            __('Depending on where you live, you may have the right to request access to, correction of, deletion of, or restriction of certain personal information. You may also opt out of marketing communications by using the unsubscribe link in our emails.', 'dawp'),
            __('To make a privacy request, contact us using the support email below. We may need to verify your identity before processing certain requests.', 'dawp'),
        ],
    ],
];
?>

<main class="bg-[#F8F3EC] text-[#2F2A28]">
    <section class="relative overflow-hidden bg-[#241F1D] px-4 py-20 text-white sm:px-6 lg:px-8 lg:py-24">
        <div class="absolute inset-0 opacity-35">
            <img src="<?php echo esc_url($privacy_image); ?>" alt="<?php esc_attr_e('Women\'s handbags styled for everyday outfits', 'dawp'); ?>" class="h-full w-full object-cover" loading="eager">
            <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(36,31,29,0.98)_0%,rgba(36,31,29,0.76)_55%,rgba(36,31,29,0.42)_100%)]"></div>
        </div>
        <div class="relative mx-auto grid w-[min(100%,1180px)] gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
            <div class="max-w-3xl">
                <span class="inline-flex border-b border-[#E8D8C8] pb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Privacy Policy', 'dawp'); ?></span>
                <h1 class="mt-7 font-serif text-4xl leading-tight text-white sm:text-6xl"><?php esc_html_e('How we handle your information.', 'dawp'); ?></h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                    <?php esc_html_e('This Privacy Policy explains how Myveganblog collects, uses, shares, and protects information when you browse our site, place an order, or contact our customer support team.', 'dawp'); ?>
                </p>
            </div>
            <div class="rounded-[28px] border border-white/18 bg-white/10 p-6 backdrop-blur sm:p-8">
                <dl class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Brand', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php esc_html_e('Myveganblog', 'dawp'); ?></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Updated', 'dawp'); ?></dt>
                        <dd class="mt-2 font-serif text-2xl text-white"><?php echo esc_html($updated_date); ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-8 lg:grid-cols-[280px_1fr]">
            <aside class="h-fit rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] lg:sticky lg:top-24">
                <h2 class="font-serif text-2xl text-[#2F2A28]"><?php esc_html_e('Policy Overview', 'dawp'); ?></h2>
                <p class="mt-4 text-sm leading-6 text-[#6F625D]"><?php esc_html_e('We collect only the information needed to support secure shopping, order fulfillment, customer care, and clear communication.', 'dawp'); ?></p>
                <a href="<?php echo esc_url('mailto:' . $support_email); ?>" class="mt-6 inline-flex min-h-11 w-full items-center justify-center rounded-full bg-[#2F2A28] px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-[#C98A8A]">
                    <?php echo esc_html($support_email); ?>
                </a>
            </aside>

            <div class="space-y-5">
                <?php foreach ($privacy_sections as $section) : ?>
                    <article class="rounded-[28px] border border-[#D8CEC6] bg-white p-6 shadow-[0_12px_30px_rgba(47,42,40,0.06)] sm:p-8 lg:p-10">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#F4ECE5] font-serif text-xl text-[#C98A8A]"><?php echo esc_html($section['number']); ?></span>
                            <div>
                                <h2 class="font-serif text-2xl leading-tight text-[#2F2A28] sm:text-3xl"><?php echo esc_html($section['title']); ?></h2>
                                <div class="mt-5 space-y-4 text-base leading-8 text-[#6F625D]">
                                    <?php foreach ($section['body'] as $paragraph) : ?>
                                        <p><?php echo esc_html($paragraph); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
        <div class="mx-auto grid w-[min(100%,1180px)] gap-6 rounded-[28px] bg-[#2F2A28] p-8 text-white sm:p-10 lg:grid-cols-[1fr_auto] lg:items-center lg:p-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#E8D8C8]"><?php esc_html_e('Privacy Questions', 'dawp'); ?></span>
                <h2 class="mt-4 font-serif text-3xl leading-tight sm:text-4xl"><?php esc_html_e('Need help with your information?', 'dawp'); ?></h2>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-white/76">
                    <?php printf(esc_html__('Contact %s during Business Hours: Monday-Friday, 9:00 AM-5:00 PM, GMT-08:00.', 'dawp'), esc_html($support_email)); ?>
                </p>
            </div>
            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full bg-[#C98A8A] px-7 py-3 text-sm font-bold text-white transition-colors hover:bg-white hover:text-[#2F2A28]">
                <?php esc_html_e('Contact Support', 'dawp'); ?>
            </a>
        </div>
    </section>
</main>
