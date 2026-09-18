<?php
defined('ABSPATH') || exit;
dawp_clixframe_pages_style();
?>
<div class="cf-page">
  <section class="cf-hero">
    <div class="container cf-hero__grid">
      <div>
        <div class="cf-eyebrow"><span class="cf-dot"></span>WORK AND PERFORMANCE</div>
        <h1>RESULTS SHOULD BE MEASURED, NOT <em>DECORATED.</em></h1>
        <p class="cf-lead">Clixframe frames work through challenge, strategy, execution and result. Public case studies only use verified performance data; demo interface numbers are clearly illustrative.</p>
      </div>
      <div class="cf-panel">
        <div class="cf-topline"><b>CASE STUDY FORMAT</b><span class="cf-status">VERIFICATION FIRST</span></div>
        <ul class="cf-list">
          <li><strong>Challenge</strong><span>Context</span></li>
          <li><strong>Strategy</strong><span>Plan</span></li>
          <li><strong>Execution</strong><span>Build</span></li>
          <li><strong>Result</strong><span>Measured</span></li>
        </ul>
      </div>
    </div>
  </section>
  <section class="cf-section cf-section--cloud">
    <div class="container">
      <header class="cf-intro"><div class="cf-eyebrow">PERFORMANCE AREAS</div><h2>What Clixframe tracks when growth work goes live.</h2></header>
      <div class="cf-grid">
        <article class="cf-card"><small>ACQUISITION</small><h3>Customer acquisition</h3><p>Are campaigns reaching the right people and producing qualified demand?</p></article>
        <article class="cf-card"><small>EFFICIENCY</small><h3>Ad spend quality</h3><p>Which audiences, creatives and channels deserve more budget or tighter control?</p></article>
        <article class="cf-card"><small>CONVERSION</small><h3>Journey movement</h3><p>Where do clicks become leads, conversations, customers and repeat revenue?</p></article>
      </div>
    </div>
  </section>
  <section class="cf-section">
    <div class="container">
      <header class="cf-intro"><div class="cf-eyebrow">DEMO PERFORMANCE INTERFACE</div><h2>Signals that help decide the next move.</h2></header>
      <div class="cf-panel">
        <div class="cf-topline"><b>GROWTH DASHBOARD</b><span class="cf-status">ILLUSTRATIVE DATA</span></div>
        <div class="cf-metrics">
          <div class="cf-metric"><small>Revenue</small><strong>$128.4K</strong></div>
          <div class="cf-metric"><small>ROAS</small><strong>4.82x</strong></div>
          <div class="cf-metric"><small>Customers</small><strong>3,284</strong></div>
        </div>
        <?php dawp_cf_bars([25, 35, 32, 46, 42, 58, 55, 70, 64, 78, 73, 90, 84, 98]); ?>
        <small class="cf-demo">DEMO DATA FOR INTERFACE VISUALIZATION</small>
      </div>
    </div>
  </section>
  <section class="cf-final">
    <div class="container"><div class="cf-eyebrow"><span class="cf-dot"></span>READY TO BUILD PROOF?</div><h2>LET PERFORMANCE TELL THE <em>STORY.</em></h2><p>Start with clear objectives, connected execution and reporting that supports better decisions.</p><a class="btn primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Start Growing</a></div>
  </section>
</div>
