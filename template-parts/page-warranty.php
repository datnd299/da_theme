<?php
/**
 * Template Part: page-warranty
 *
 * Corvel 2-Year Limited Warranty. Applies to every Corvel automatic mechanical
 * watch. Terms mirror the WarrantyPromise node added in inc/seo.php.
 *
 * @package dawp
 */

$store_name     = 'Corvel';
$support_email  = function_exists('dawp_contact_support_email') ? dawp_contact_support_email() : 'support@corvelshop.com';
$store_address  = function_exists('dawp_get_store_address_line') ? dawp_get_store_address_line() : '';
$support_portal = home_url('/contact-us/');
?>

<style>
  .qb-page { --qb-obsidian:#0D0F0F; --qb-ivory:#F5F2EB; --qb-white:#FFFFFF; --qb-carbon:#171A19; --qb-green:#263C33; --qb-gold:#B38A52; --qb-silver:#B8B8B2; --qb-gray:#F5F2EB; --qb-text:#5E625F; --qb-border:#B8B8B2; --qb-plum:#171A19; --qb-peach:#D7B987; background:var(--qb-ivory); color:var(--qb-text); font-family:"DM Sans","Inter",system-ui,sans-serif; }
  .qb-page * { box-sizing:border-box; }
  .qb-page a { color:inherit; text-decoration:none; }
  .qb-wrap { width:min(100% - 32px,1160px); margin-inline:auto; }
  .qb-section { padding:68px 0; }
  .qb-eyebrow { margin:0 0 12px; color:var(--qb-gold); font-size:12px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
  .qb-title { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(36px,5vw,64px); line-height:1.04; }
  .qb-updated { margin:16px 0 0; color:var(--qb-plum); font-size:14px; font-weight:800; line-height:1.4; }
  .qb-copy { margin:18px 0 0; max-width:780px; color:var(--qb-text); font-size:17px; line-height:1.75; }
  .qb-button { display:inline-flex; min-height:48px; align-items:center; justify-content:center; border:1px solid var(--qb-plum); border-radius:999px; background:var(--qb-plum); color:#fff !important; padding:0 22px; font-size:14px; font-weight:800; transition:.2s ease; }
  .qb-button:hover { border-color:var(--qb-gold); background:var(--qb-gold); color:var(--qb-plum) !important; }
  .qb-button--secondary { background:#fff; color:var(--qb-plum) !important; }
  .qb-button--secondary:hover { border-color:var(--qb-plum); background:var(--qb-ivory); color:var(--qb-plum) !important; }
  .qb-actions { display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .qb-hero { position:relative; overflow:hidden; background:linear-gradient(135deg,rgba(245,242,235,.98),rgba(255,255,255,.94) 50%,rgba(38,60,51,.13)),#F5F2EB; }
  .qb-hero::after { content:""; position:absolute; right:7%; bottom:-92px; width:360px; height:360px; border:1px solid rgba(179,138,82,.22); border-radius:999px; background:rgba(255,255,255,.2); }
  .qb-hero__grid { position:relative; z-index:1; display:grid; grid-template-columns:minmax(0,1fr); gap:28px; align-items:center; padding:78px 0 84px; }
  .qb-hero__content { max-width:760px; margin-inline:auto; text-align:center; }
  .qb-hero .qb-copy { max-width:700px; margin-inline:auto; }
  .qb-hero .qb-actions { justify-content:center; }
  .qb-soft { background:var(--qb-gray); }
  .qb-glance-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:14px; margin-top:26px; }
  .qb-glance-item { border:1px solid var(--qb-border); border-radius:16px; background:#fff; padding:18px; }
  .qb-glance-item strong { display:block; color:var(--qb-plum); font-size:14px; line-height:1.35; }
  .qb-glance-item span { display:block; margin-top:8px; color:#5E625F; font-size:14px; line-height:1.55; }
  .qb-policy-stack { display:grid; gap:20px; }
  .qb-policy-card { border:1px solid var(--qb-border); border-radius:20px; padding:clamp(24px,4vw,38px); background:#fff; box-shadow:0 18px 46px rgba(13,15,15,.06); }
  .qb-policy-card:nth-child(even) { background:var(--qb-ivory); }
  .qb-policy-card h2 { margin:0; color:var(--qb-plum); font-family:Georgia,"Times New Roman",serif; font-size:clamp(25px,3vw,38px); line-height:1.12; }
  .qb-policy-card h3 { margin:24px 0 0; color:var(--qb-plum); font-size:18px; line-height:1.35; }
  .qb-policy-card p, .qb-policy-card li { color:#5E625F; font-size:15px; line-height:1.72; }
  .qb-policy-card p { margin:14px 0 0; }
  .qb-policy-card ul, .qb-policy-card ol { display:grid; gap:9px; margin:16px 0 0; padding-left:1.15rem; }
  .qb-policy-card ul { list-style:disc outside; }
  .qb-policy-card ol { list-style:decimal outside; }
  .qb-callout { border-left:4px solid var(--qb-gold); border-radius:0 16px 16px 0; background:rgba(179,138,82,.12); padding:15px 18px; margin-top:18px; }
  .qb-contact-card { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:14px; margin-top:22px; }
  .qb-contact-item { border:1px solid var(--qb-border); border-radius:14px; background:#fff; padding:16px; }
  .qb-contact-item strong { display:block; color:var(--qb-plum); font-size:14px; }
  .qb-contact-item span { display:block; margin-top:7px; color:#5E625F; font-size:14px; line-height:1.6; overflow-wrap:anywhere; }
  @media (max-width:920px) { .qb-hero__grid, .qb-glance-grid { grid-template-columns:1fr 1fr; } }
  @media (max-width:680px) {
    .qb-section { padding:44px 0; }
    .qb-hero__grid { gap:24px; padding:46px 0 50px; }
    .qb-glance-grid { grid-template-columns:1fr; }
    .qb-contact-card { grid-template-columns:1fr; }
    .qb-actions { flex-direction:column; }
    .qb-button { width:100%; }
  }
</style>

<div class="qb-page qb-warranty">
  <section class="qb-hero">
    <div class="qb-wrap qb-hero__grid">
      <div class="qb-hero__content">
        <p class="qb-eyebrow"><?php esc_html_e('Warranty', 'dawp'); ?></p>
        <h1 class="qb-title"><?php esc_html_e('2-Year Limited Warranty', 'dawp'); ?></h1>
        <p class="qb-updated"><?php esc_html_e('Last Updated: September 11, 2026', 'dawp'); ?></p>
        <p class="qb-copy"><?php esc_html_e('Every Corvel automatic mechanical watch is covered against defects in the movement and in materials and workmanship for two years from the delivery date.', 'dawp'); ?></p>
        <div class="qb-actions">
          <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Start a Warranty Claim', 'dawp'); ?></a>
          <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('Warranty FAQ', 'dawp'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="qb-section qb-soft">
    <div class="qb-wrap">
      <div class="qb-glance-grid">
        <div class="qb-glance-item">
          <strong><?php esc_html_e('Coverage Period', 'dawp'); ?></strong>
          <span><?php esc_html_e('2 years (24 months) from the delivery date.', 'dawp'); ?></span>
        </div>
        <div class="qb-glance-item">
          <strong><?php esc_html_e('What It Covers', 'dawp'); ?></strong>
          <span><?php esc_html_e('Mechanical movement defects and manufacturing defects in materials and workmanship.', 'dawp'); ?></span>
        </div>
        <div class="qb-glance-item">
          <strong><?php esc_html_e('Who It Covers', 'dawp'); ?></strong>
          <span><?php esc_html_e('The original purchaser, with proof of purchase from Corvel. Non-transferable.', 'dawp'); ?></span>
        </div>
        <div class="qb-glance-item">
          <strong><?php esc_html_e('Cost', 'dawp'); ?></strong>
          <span><?php esc_html_e('Covered repairs, parts, labor, and return shipping are free within the United States.', 'dawp'); ?></span>
        </div>
      </div>

      <div class="qb-policy-stack" style="margin-top:28px;">
        <section id="scope" class="qb-policy-card">
          <h2><?php esc_html_e('What the Warranty Covers', 'dawp'); ?></h2>
          <p><?php esc_html_e('Corvel warrants that each new Corvel watch purchased from Corvel will be free from defects in the mechanical movement and in materials and workmanship under normal use for a period of two (2) years from the date the order is delivered.', 'dawp'); ?></p>
          <p><?php esc_html_e('During the coverage period, Corvel will repair or, at its discretion, replace the affected part or watch at no charge when the issue is caused by:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('A fault in the automatic (self-winding) mechanical movement that affects timekeeping, winding, or the power reserve.', 'dawp'); ?></li>
            <li><?php esc_html_e('A defect in the case, case back, crown, pushers, crystal seating, dial, hands, or bracelet/strap hardware that is present from manufacture.', 'dawp'); ?></li>
            <li><?php esc_html_e('Failure of factory-fitted gaskets or seals to perform to the stated water resistance rating under normal conditions.', 'dawp'); ?></li>
            <li><?php esc_html_e('Assembly or workmanship faults, such as loose components or misaligned parts, that are not the result of use.', 'dawp'); ?></li>
          </ul>
          <div class="qb-callout">
            <p><?php esc_html_e('Mechanical watches keep time within a wider tolerance than quartz. A normal daily rate variation for this type of movement is not a defect and is not covered by adjustment requests outside the timekeeping fault described above.', 'dawp'); ?></p>
          </div>
        </section>

        <section id="exclusions" class="qb-policy-card">
          <h2><?php esc_html_e('What the Warranty Does Not Cover', 'dawp'); ?></h2>
          <p><?php esc_html_e('This warranty does not apply to:', 'dawp'); ?></p>
          <ul>
            <li><?php esc_html_e('Normal wear and aging, including scratches and marks on the case, crystal, or strap, and fading of finish, coating, or plating over time.', 'dawp'); ?></li>
            <li><?php esc_html_e('Damage from accident, drops, impact, crushing, or misuse.', 'dawp'); ?></li>
            <li><?php esc_html_e('Water damage caused by exceeding the stated water resistance rating, operating the crown or pushers while the watch is wet or submerged, or a crown left unscrewed or not fully pushed in.', 'dawp'); ?></li>
            <li><?php esc_html_e('Damage from strong magnetic fields, extreme temperatures, or chemicals, solvents, and perfumes.', 'dawp'); ?></li>
            <li><?php esc_html_e('Any watch that has been opened, adjusted, repaired, or modified by anyone other than Corvel or a partner authorized by Corvel.', 'dawp'); ?></li>
            <li><?php esc_html_e('Straps, batteries (Corvel movements are automatic and use no battery), and routine maintenance such as cleaning, lubrication, or gasket replacement outside of a covered repair.', 'dawp'); ?></li>
            <li><?php esc_html_e('Loss or theft of the watch, and any watch with a removed, altered, or unreadable serial number.', 'dawp'); ?></li>
            <li><?php esc_html_e('Products not purchased from Corvel, or purchased from an unauthorized reseller.', 'dawp'); ?></li>
          </ul>
        </section>

        <section id="claim" class="qb-policy-card">
          <h2><?php esc_html_e('How to Make a Warranty Claim', 'dawp'); ?></h2>
          <ol>
            <li><?php esc_html_e('Contact us through the Contact Us page or by email with your order number, the email address used at checkout, a description of the problem, and clear photos or a short video showing the issue.', 'dawp'); ?></li>
            <li><?php esc_html_e('Our support team will review the claim, usually within 2 business days, and confirm whether it is covered.', 'dawp'); ?></li>
            <li><?php esc_html_e('If the claim is covered, we will email you a Return Authorization and the address to send the watch to. Please do not send any watch back before you receive this.', 'dawp'); ?></li>
            <li><?php esc_html_e('Pack the watch securely. Within the United States, Corvel covers inbound and return shipping for covered claims.', 'dawp'); ?></li>
            <li><?php esc_html_e('We repair or replace the watch and ship it back to you. Typical turnaround is 2 to 4 weeks after we receive it, depending on parts availability.', 'dawp'); ?></li>
          </ol>
          <p><?php esc_html_e('If an inspection finds the issue is not covered by this warranty, we will contact you with a repair estimate before any work or charge. You may also choose to have the watch returned unrepaired.', 'dawp'); ?></p>
        </section>

        <section id="repairs" class="qb-policy-card">
          <h2><?php esc_html_e('Repairs and Replacements', 'dawp'); ?></h2>
          <p><?php esc_html_e('Warranty repairs use genuine Corvel parts. If a part or model is no longer available, Corvel may replace the watch with the same model or one of equal or greater value.', 'dawp'); ?></p>
          <p><?php esc_html_e('Repairs or replacements do not extend or restart the original two-year period. Coverage continues for the remainder of the original term or for 90 days from the completed repair, whichever is longer.', 'dawp'); ?></p>
        </section>

        <section id="legal" class="qb-policy-card">
          <h2><?php esc_html_e('Limitations and Your Legal Rights', 'dawp'); ?></h2>
          <p><?php esc_html_e('This is a limited warranty. To the extent permitted by law, Corvel is not liable for incidental or consequential damages, and any implied warranties are limited to the two-year warranty period.', 'dawp'); ?></p>
          <p><?php esc_html_e('This warranty gives you specific legal rights. You may also have other rights under the consumer protection laws of your state, and those rights are not affected by this warranty. This warranty applies to purchases delivered within the United States.', 'dawp'); ?></p>
          <p><?php esc_html_e('This warranty is separate from our Return & Refund Policy, which covers change-of-mind and order issues within 30 days of delivery.', 'dawp'); ?></p>
        </section>

        <section id="contact" class="qb-policy-card">
          <h2><?php esc_html_e('Warranty Contact', 'dawp'); ?></h2>
          <p><?php esc_html_e('For warranty questions or to start a claim, contact our support team. We aim to reply within 1 business day.', 'dawp'); ?></p>
          <div class="qb-contact-card">
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Store Name', 'dawp'); ?></strong>
              <span><?php echo esc_html($store_name); ?></span>
            </div>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Warranty Email', 'dawp'); ?></strong>
              <span><a href="mailto:<?php echo esc_attr($support_email); ?>"><?php echo esc_html($support_email); ?></a></span>
            </div>
            <?php if ($store_address) : ?>
              <div class="qb-contact-item">
                <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
                <span><?php echo esc_html($store_address); ?></span>
              </div>
            <?php endif; ?>
            <div class="qb-contact-item">
              <strong><?php esc_html_e('Customer Service Hours', 'dawp'); ?></strong>
              <span><?php esc_html_e('Monday-Friday, 9:00 AM-6:00 PM PST.', 'dawp'); ?></span>
            </div>
          </div>
          <div class="qb-actions">
            <a class="qb-button" href="<?php echo esc_url($support_portal); ?>"><?php esc_html_e('Contact Support', 'dawp'); ?></a>
            <a class="qb-button qb-button--secondary" href="<?php echo esc_url(home_url('/return-refund-policy/')); ?>"><?php esc_html_e('Return & Refund Policy', 'dawp'); ?></a>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>
