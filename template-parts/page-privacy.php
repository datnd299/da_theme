<?php
/**
 * Privacy Policy.
 */

defined('ABSPATH') || exit;

$dawp_support_email = dawp_brand('support_email');
?>

<section class="c-policy-hero">
    <div class="container">
        <div class="c-policy-hero__inner">
            <nav class="c-policy-breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'dawp'); ?></a>
                <span aria-hidden="true">/</span>
                <span><?php esc_html_e('Privacy Policy', 'dawp'); ?></span>
            </nav>
            <span class="c-rule" aria-hidden="true"></span>
            <p class="c-eyebrow"><?php esc_html_e('Legal', 'dawp'); ?></p>
            <h1><?php esc_html_e('Privacy Policy', 'dawp'); ?></h1>
            <p><?php esc_html_e('What we collect, why we hold it, and how to have it removed.', 'dawp'); ?></p>
        </div>
    </div>
</section>

<section class="c-policy-body">
    <div class="container-narrow">

        <section>
            <h2><?php esc_html_e('1. Who we are', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: brand name */
                    esc_html__('%s operates chronelwatches.com and is the data controller for the information described here. Questions about this policy go to the address in section 11.', 'dawp'),
                    esc_html(dawp_brand('name'))
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('2. What we collect', 'dawp'); ?></h2>
            <ul>
                <li><?php esc_html_e('Order information: name, billing and delivery address, email, telephone number, and what you bought.', 'dawp'); ?></li>
                <li><?php esc_html_e('Payment information: handled by our payment provider. We receive a confirmation and the last four digits of the card. We never see or store the full card number.', 'dawp'); ?></li>
                <li><?php esc_html_e('Ownership records: the serial number of your watch, the components fitted, and any service carried out.', 'dawp'); ?></li>
                <li><?php esc_html_e('Correspondence: messages you send through the contact and bespoke enquiry forms.', 'dawp'); ?></li>
                <li><?php esc_html_e('Technical information: IP address, browser, device type, and pages viewed.', 'dawp'); ?></li>
                <li><?php esc_html_e('Marketing preferences: your email address, if you join the register.', 'dawp'); ?></li>
            </ul>
        </section>

        <section>
            <h2><?php esc_html_e('3. Why we hold it', 'dawp'); ?></h2>
            <ul>
                <li><?php esc_html_e('To take payment, fulfil your order, and arrange insured delivery.', 'dawp'); ?></li>
                <li><?php esc_html_e('To answer your messages and provide client care.', 'dawp'); ?></li>
                <li><?php esc_html_e('To service your watch correctly for as long as it exists. The ownership record is what makes the lifetime service programme possible.', 'dawp'); ?></li>
                <li><?php esc_html_e('To screen transactions for fraud.', 'dawp'); ?></li>
                <li><?php esc_html_e('To meet tax, accounting, and consumer law obligations.', 'dawp'); ?></li>
                <li><?php esc_html_e('To send you email about new references, if you asked us to.', 'dawp'); ?></li>
            </ul>
        </section>

        <section>
            <h2><?php esc_html_e('4. Legal basis', 'dawp'); ?></h2>
            <p><?php esc_html_e('We process order and service data to perform our contract with you; fraud screening and site security on our legitimate interests; tax and accounting records to comply with the law; and marketing email on your consent, which you may withdraw at any time.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('5. Who we share it with', 'dawp'); ?></h2>
            <p><?php esc_html_e('We share only what is necessary, and only with:', 'dawp'); ?></p>
            <ul>
                <li><?php esc_html_e('Our payment provider, to take and secure payment.', 'dawp'); ?></li>
                <li><?php esc_html_e('Our insured carrier, to deliver your watch.', 'dawp'); ?></li>
                <li><?php esc_html_e('Our hosting and email providers, who process data on our instructions.', 'dawp'); ?></li>
                <li><?php esc_html_e('Law enforcement or regulators, where we are legally required to.', 'dawp'); ?></li>
            </ul>
            <p><?php esc_html_e('We do not sell personal information, and we do not share it with advertisers.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('6. Cookies', 'dawp'); ?></h2>
            <p><?php esc_html_e('We use essential cookies for the cart, login state, and checkout security. Without them the store cannot function. We also use a small number of analytics cookies to understand which pages are read. You can clear or block cookies in your browser, but blocking essential cookies will prevent checkout from working.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('7. How long we keep it', 'dawp'); ?></h2>
            <ul>
                <li><?php esc_html_e('Order and tax records: seven years, as required by law.', 'dawp'); ?></li>
                <li><?php esc_html_e('Ownership and service records: for the life of the watch, so it can always be serviced correctly.', 'dawp'); ?></li>
                <li><?php esc_html_e('Correspondence: three years from the last message.', 'dawp'); ?></li>
                <li><?php esc_html_e('Marketing preferences: until you unsubscribe.', 'dawp'); ?></li>
            </ul>
        </section>

        <section>
            <h2><?php esc_html_e('8. Your rights', 'dawp'); ?></h2>
            <p><?php esc_html_e('Depending on where you live, you may have the right to access the information we hold, correct it, have it deleted, restrict or object to how we use it, receive a portable copy, and withdraw consent to marketing. We do not discriminate against anyone who exercises these rights.', 'dawp'); ?></p>
            <p><?php esc_html_e('Deletion has one limit worth stating plainly: if you ask us to erase your ownership record, we will, but we can no longer verify your warranty or service the watch under the lifetime programme.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('9. Security', 'dawp'); ?></h2>
            <p><?php esc_html_e('The site is served over TLS. Payment details are transmitted directly to our payment provider and never touch our servers. Access to order and ownership records is limited to staff who need it. No system is perfect, and we will tell you promptly if a breach affects your data.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('10. Children', 'dawp'); ?></h2>
            <p><?php esc_html_e('This store is not intended for anyone under 18, and we do not knowingly collect information from children. If you believe we have, write to us and we will delete it.', 'dawp'); ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('11. Contact', 'dawp'); ?></h2>
            <p><?php
                printf(
                    /* translators: %s: support email link */
                    esc_html__('Write to %s for any privacy request. We respond within 30 days.', 'dawp'),
                    '<a href="mailto:' . esc_attr($dawp_support_email) . '">' . esc_html($dawp_support_email) . '</a>'
                );
            ?></p>
        </section>

        <section>
            <h2><?php esc_html_e('12. Changes', 'dawp'); ?></h2>
            <p><?php esc_html_e('If this policy changes materially, we will post the updated version on this page and, where the change affects how we use information you have already given us, tell you by email.', 'dawp'); ?></p>
        </section>
    </div>
</section>
