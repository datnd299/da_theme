<?php
/**
 * Template Part: Handcraft Shoe — Return & Refund Policy Page
 * GMC-safe return policy page.
 * Visual direction follows Handcraft Shoe homepage/design system:
 * Ink Navy, Vintage Pine, Faded Sage, Fog Gray, Soft Ivory.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$store_name     = 'Handcraft Shoe';
$website_domain = 'handcraftshoe.com';
$support_email  = 'support@handcraftshoe.com';
$contact_url    = home_url( '/contact-us/' );
$shipping_url   = home_url( '/shipping-policy/' );
$faq_url        = home_url( '/faq/' );
?>

<section class="bg-[#F7F3EC] py-16 md:py-24">
  <div class="mx-auto w-[min(100%-32px,1180px)]">
    <!-- Page Header -->
    <div class="mb-14 text-center">
      <span class="mb-4 block text-sm font-bold uppercase tracking-[0.18em] text-[#2F4A43]">Return & Refund Policy</span>
      <h1 class="font-serif text-4xl font-semibold leading-tight tracking-[-0.03em] text-[#17212B] md:text-6xl">
        Clear returns for handmade leather footwear.
      </h1>
      <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-[#6E7472]">
        This policy explains return eligibility, footwear condition requirements, refund timing, exchanges, custom footwear limitations, and how to request support from <?php echo esc_html( $store_name ); ?>.
      </p>
    </div>

    <div class="grid gap-8 lg:grid-cols-12 lg:items-start">
      <!-- Sidebar Navigation -->
      <aside class="hidden lg:sticky lg:top-24 lg:col-span-3 lg:block">
        <nav class="space-y-3" aria-label="Return and refund policy sections">
          <a href="#easy-returns" class="block rounded-2xl border border-[#D8DAD4] bg-white p-4 font-bold text-[#202326] transition hover:border-[#2F4A43] hover:text-[#2F4A43]">30-Day Returns</a>
          <a href="#return-overview" class="block rounded-2xl border border-[#D8DAD4] bg-white p-4 font-bold text-[#202326] transition hover:border-[#2F4A43] hover:text-[#2F4A43]">Policy Overview</a>
          <a href="#return-costs" class="block rounded-2xl border border-[#D8DAD4] bg-white p-4 font-bold text-[#202326] transition hover:border-[#2F4A43] hover:text-[#2F4A43]">Return Costs</a>
          <a href="#return-scenarios" class="block rounded-2xl border border-[#D8DAD4] bg-white p-4 font-bold text-[#202326] transition hover:border-[#2F4A43] hover:text-[#2F4A43]">Common Scenarios</a>
          <a href="#how-to-return" class="block rounded-2xl border border-[#D8DAD4] bg-white p-4 font-bold text-[#202326] transition hover:border-[#2F4A43] hover:text-[#2F4A43]">How To Return</a>
          <a href="#footwear-condition" class="block rounded-2xl border border-[#D8DAD4] bg-white p-4 font-bold text-[#202326] transition hover:border-[#2F4A43] hover:text-[#2F4A43]">Footwear Condition</a>
          <a href="#refund-exchanges" class="block rounded-2xl border border-[#D8DAD4] bg-white p-4 font-bold text-[#202326] transition hover:border-[#2F4A43] hover:text-[#2F4A43]">Refunds & Exchanges</a>
          <a href="#contact-information" class="block rounded-2xl border border-[#D8DAD4] bg-white p-4 font-bold text-[#202326] transition hover:border-[#2F4A43] hover:text-[#2F4A43]">Contact Information</a>
        </nav>
      </aside>

      <!-- Main Content -->
      <div class="space-y-8 lg:col-span-9">
        <!-- Quick Facts -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
          <div class="rounded-2xl border border-[#D8DAD4] bg-white p-6 shadow-[0_12px_30px_rgba(23,33,43,0.08)]">
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">Return Window</p>
            <p class="text-2xl font-bold text-[#17212B]">30 Days</p>
            <p class="mt-2 text-sm leading-6 text-[#6E7472]">From the day your order is delivered.</p>
          </div>
          <div class="rounded-2xl border border-[#D8DAD4] bg-white p-6 shadow-[0_12px_30px_rgba(23,33,43,0.08)]">
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">Restocking Fee</p>
            <p class="text-2xl font-bold text-[#17212B]">$0</p>
            <p class="mt-2 text-sm leading-6 text-[#6E7472]">No restocking fee for eligible returns.</p>
          </div>
          <div class="rounded-2xl border border-[#D8DAD4] bg-white p-6 shadow-[0_12px_30px_rgba(23,33,43,0.08)]">
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">Authorization</p>
            <p class="text-2xl font-bold text-[#17212B]">Required</p>
            <p class="mt-2 text-sm leading-6 text-[#6E7472]">Please contact us before sending items back.</p>
          </div>
          <div class="rounded-2xl border border-[#D8DAD4] bg-white p-6 shadow-[0_12px_30px_rgba(23,33,43,0.08)]">
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">Refund Timing</p>
            <p class="text-2xl font-bold text-[#17212B]">Up To 7 Days</p>
            <p class="mt-2 text-sm leading-6 text-[#6E7472]">After inspection and approval, depending on payment provider.</p>
          </div>
        </div>

        <!-- 30-Day Easy Returns -->
        <div id="easy-returns" class="rounded-[28px] border border-[#D8DAD4] bg-white p-8 shadow-[0_12px_30px_rgba(23,33,43,0.08)] md:p-12">
          <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#E7E8E3] text-[#2F4A43]">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>
            </div>
            <div>
              <h2 class="font-serif text-3xl font-semibold text-[#17212B]">30-Day Easy Returns</h2>
              <p class="mt-2 text-[#6E7472]">Eligible items may be returned within 30 days from delivery.</p>
            </div>
          </div>
          <div class="space-y-4 leading-8 text-[#6E7472]">
            <p>At <?php echo esc_html( $store_name ); ?>, we want customers to shop handmade leather footwear with confidence. You may request a return within 30 days from the day your order is delivered for most eligible items.</p>
            <p>To qualify, footwear must be unused, unworn, undamaged, and in original condition. Items should be returned with original packaging, tags, inserts, accessories, and included documents where applicable.</p>
            <p><strong class="text-[#202326]">Restocking Fee:</strong> $0. We do not charge restocking fees for eligible returns.</p>
          </div>
        </div>

        <!-- Return Overview -->
        <div id="return-overview" class="rounded-[28px] border border-[#D8DAD4] bg-white p-8 shadow-[0_12px_30px_rgba(23,33,43,0.08)] md:p-12">
          <h2 class="mb-6 font-serif text-3xl font-semibold text-[#17212B]">Return Policy Overview</h2>
          <div class="grid gap-6 md:grid-cols-2">
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Eligible Condition</h3>
              <p class="leading-8 text-[#6E7472]">Items must be unused, unworn, undamaged, in original condition, and returned with original packaging where applicable.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Return Authorization</h3>
              <p class="leading-8 text-[#6E7472]">Please contact us and wait for approval before sending any product back. Returns sent without authorization may not be accepted.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Original Shipping</h3>
              <p class="leading-8 text-[#6E7472]">Original shipping costs are non-refundable unless the return is due to store error, product damage, incorrect item, or carrier-related damage.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Custom Footwear</h3>
              <p class="leading-8 text-[#6E7472]">Custom, personalized, made-to-order, or modified footwear may have different return limitations and should be reviewed on the product page before ordering.</p>
            </div>
          </div>
        </div>

        <!-- Return Costs -->
        <div id="return-costs" class="rounded-[28px] border border-[#D8DAD4] bg-white p-8 shadow-[0_12px_30px_rgba(23,33,43,0.08)] md:p-12">
          <h2 class="mb-6 font-serif text-3xl font-semibold text-[#17212B]">Return Costs</h2>
          <div class="grid gap-6 md:grid-cols-2">
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <p class="mb-3 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">No Cost To Customer</p>
              <h3 class="mb-4 text-xl font-bold text-[#202326]">Damaged, Defective, Or Incorrect Items</h3>
              <p class="leading-8 text-[#6E7472]">We cover return shipping or provide a prepaid return label if you received the wrong item, the item arrived damaged due to the carrier, or the item is defective, missing essential parts, or not functioning as intended.</p>
              <p class="mt-4 leading-8 text-[#6E7472]">We may request photos or videos of the item, packaging, and shipping label to help review the issue quickly.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <p class="mb-3 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">Customer Pays Return Shipping</p>
              <h3 class="mb-4 text-xl font-bold text-[#202326]">Customer Remorse / Change Of Mind</h3>
              <p class="leading-8 text-[#6E7472]">Customers are responsible for the actual return shipping cost when the wrong item, size, color, model, or compatibility was selected, the item does not fit or match personal preference, the customer no longer wants the item, or the order was placed by mistake.</p>
              <p class="mt-4 font-bold leading-8 text-[#202326]">Original shipping costs are non-refundable.</p>
            </div>
          </div>
        </div>

        <!-- Common Scenarios -->
        <div id="return-scenarios" class="rounded-[28px] border border-[#D8DAD4] bg-white p-8 shadow-[0_12px_30px_rgba(23,33,43,0.08)] md:p-12">
          <h2 class="mb-6 font-serif text-3xl font-semibold text-[#17212B]">Common Return Scenarios</h2>
          <div class="grid gap-6 md:grid-cols-2">
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Order Cancellations</h3>
              <p class="leading-8 text-[#6E7472]">You may request an order cancellation within 9 hours after placing the order, as long as the order has not been processed or shipped. Once an order has shipped, it can no longer be canceled.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Damaged On Arrival</h3>
              <p class="leading-8 text-[#6E7472]">If your order arrives damaged, contact us within 30 days of delivery and include photos of the item, packaging, and shipping label. We will help with a replacement or refund after review.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Wrong Product / Missing Items</h3>
              <p class="leading-8 text-[#6E7472]">If you received the wrong product or your order is missing items, parts, or accessories, contact us within 30 days of delivery. We may request photos for verification.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Lost Packages</h3>
              <p class="leading-8 text-[#6E7472]">If tracking shows no updates for an extended period or the package is marked delivered but not received, contact us within 30 days of the delivery date or latest tracking status.</p>
            </div>
          </div>
        </div>

        <!-- How To Return -->
        <div id="how-to-return" class="rounded-[28px] border border-[#D8DAD4] bg-white p-8 shadow-[0_12px_30px_rgba(23,33,43,0.08)] md:p-12">
          <h2 class="mb-6 font-serif text-3xl font-semibold text-[#17212B]">How To Return An Item</h2>
          <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <span class="mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-[#2F4A43] text-sm font-bold text-white">01</span>
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Contact Us</h3>
              <p class="leading-7 text-[#6E7472]">Contact support with your order number, email used at checkout, item details, and reason for return.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <span class="mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-[#2F4A43] text-sm font-bold text-white">02</span>
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Wait For Approval</h3>
              <p class="leading-7 text-[#6E7472]">Please wait for return authorization and instructions before sending footwear back.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <span class="mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-[#2F4A43] text-sm font-bold text-white">03</span>
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Pack Securely</h3>
              <p class="leading-7 text-[#6E7472]">Repack the item with original packaging, tags, inserts, accessories, and documents where applicable.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <span class="mb-4 flex h-11 w-11 items-center justify-center rounded-full bg-[#2F4A43] text-sm font-bold text-white">04</span>
              <h3 class="mb-3 text-xl font-bold text-[#202326]">Ship It Back</h3>
              <p class="leading-7 text-[#6E7472]">Ship the return using the instructions provided in your return authorization email.</p>
            </div>
          </div>
        </div>

        <!-- Footwear Condition -->
        <div id="footwear-condition" class="rounded-[28px] border border-[#D8DAD4] bg-[#2F4A43] p-8 text-white shadow-[0_12px_30px_rgba(23,33,43,0.12)] md:p-12">
          <h2 class="mb-6 font-serif text-3xl font-semibold text-[#F7F3EC]">Footwear Return Condition</h2>
          <p class="mb-6 leading-8 text-white/75">Because leather footwear can show wear quickly, please try shoes or sandals on a clean indoor surface and review fit carefully before outdoor use.</p>
          <div class="grid gap-4 md:grid-cols-2">
            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
              <h3 class="mb-2 font-bold text-[#F7F3EC]">Eligible Footwear Must Be</h3>
              <p class="leading-7 text-white/75">Unworn, undamaged, free of outdoor wear, stains, odor, heavy creasing, or sole marks.</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
              <h3 class="mb-2 font-bold text-[#F7F3EC]">Packaging Requirements</h3>
              <p class="leading-7 text-white/75">Original packaging, tags, inserts, accessories, dust bags, or documents should be included where applicable.</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
              <h3 class="mb-2 font-bold text-[#F7F3EC]">Custom Footwear</h3>
              <p class="leading-7 text-white/75">Custom, personalized, made-to-order, or modified footwear may be non-returnable unless defective, damaged, incorrect, or required by applicable law.</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
              <h3 class="mb-2 font-bold text-[#F7F3EC]">Size & Fit Review</h3>
              <p class="leading-7 text-white/75">Please review size guide, fit notes, material details, and care instructions before placing an order.</p>
            </div>
          </div>
        </div>

        <!-- Refund Process & Exchanges -->
        <div id="refund-exchanges" class="rounded-[28px] border border-[#D8DAD4] bg-white p-8 shadow-[0_12px_30px_rgba(23,33,43,0.08)] md:p-12">
          <h2 class="mb-6 font-serif text-3xl font-semibold text-[#17212B]">Refund Process & Exchanges</h2>
          <div class="grid gap-6 md:grid-cols-2">
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-4 text-xl font-bold text-[#202326]">Refund Process</h3>
              <p class="leading-8 text-[#6E7472]">Once we receive your return, we will inspect it to confirm that it meets our return criteria. After approval, your refund will be processed to the original payment method. It typically takes up to 7 days for the refund to appear, depending on your bank or payment provider.</p>
              <p class="mt-4 leading-8 text-[#6E7472]">If the item is missing parts, shows signs of use, or is returned in non-original condition, we may be unable to issue a refund and may offer to send the item back to you.</p>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-6">
              <h3 class="mb-4 text-xl font-bold text-[#202326]">Exchanges</h3>
              <p class="leading-8 text-[#6E7472]">If you would like to exchange an item for a different size, color, model, or available option, please contact our support team. Exchanges are subject to product availability.</p>
              <p class="mt-4 leading-8 text-[#6E7472]">In some cases, the fastest option is to return the original item for a refund and place a new order.</p>
            </div>
          </div>
        </div>

        <!-- Non-Returnable Items -->
        <div class="rounded-[28px] border border-[#D8DAD4] bg-white p-8 shadow-[0_12px_30px_rgba(23,33,43,0.08)] md:p-12">
          <h2 class="mb-6 font-serif text-3xl font-semibold text-[#17212B]">Non-Returnable Items</h2>
          <div class="grid gap-4 md:grid-cols-2">
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-5 text-[#6E7472]">Items marked Final Sale or Non-Returnable.</div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-5 text-[#6E7472]">Gift cards or digital products/downloads.</div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-5 text-[#6E7472]">Items that have been used, worn, modified, damaged, or altered after delivery.</div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-5 text-[#6E7472]">Footwear with outdoor wear, sole marks, stains, odor, heavy creasing, or missing packaging where applicable.</div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-5 text-[#6E7472]">Items missing original packaging, accessories, labels, manuals, or included parts.</div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-[#F7F3EC] p-5 text-[#6E7472]">Custom, personalized, made-to-order, or modified footwear unless defective, damaged, incorrect, or required by applicable law.</div>
          </div>
        </div>

        <!-- Contact Information -->
        <div id="contact-information" class="rounded-[28px] border border-dashed border-[#2F4A43]/40 bg-[#E7E8E3] p-8 md:p-10">
          <h2 class="mb-6 font-serif text-3xl font-semibold text-[#17212B]">Contact Information</h2>
          <dl class="grid gap-4 text-sm md:grid-cols-2">
            <div class="rounded-2xl border border-[#D8DAD4] bg-white p-5">
              <dt class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">Store Name</dt>
              <dd class="font-bold text-[#202326]"><?php echo esc_html( $store_name ); ?></dd>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-white p-5">
              <dt class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">Website</dt>
              <dd class="font-bold text-[#202326]"><?php echo esc_html( $website_domain ); ?></dd>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-white p-5">
              <dt class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">Email</dt>
              <dd><a href="mailto:<?php echo esc_attr( $support_email ); ?>" class="font-bold text-[#202326] hover:text-[#2F4A43]"><?php echo esc_html( $support_email ); ?></a></dd>
            </div>
            <div class="rounded-2xl border border-[#D8DAD4] bg-white p-5">
              <dt class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-[#2F4A43]">Service Hours</dt>
              <dd class="font-bold leading-6 text-[#202326]">Monday – Friday, 9:00 AM – 5:00 PM, GMT-08:00 Pacific Standard Time (Los Angeles)</dd>
            </div>
          </dl>
          <div class="mt-8 flex flex-wrap gap-3">
            <a href="<?php echo esc_url( $contact_url ); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F4A43] bg-[#2F4A43] px-6 text-sm font-bold text-white transition hover:bg-[#17212B] hover:border-[#17212B]">Contact Support</a>
            <a href="<?php echo esc_url( $shipping_url ); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F4A43] bg-white px-6 text-sm font-bold text-[#2F4A43] transition hover:bg-[#F7F3EC]">Shipping Policy</a>
            <a href="<?php echo esc_url( $faq_url ); ?>" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#2F4A43] bg-white px-6 text-sm font-bold text-[#2F4A43] transition hover:bg-[#F7F3EC]">Read FAQs</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
