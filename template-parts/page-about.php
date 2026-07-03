<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap');

  :root{
    --navy:#0B1F3A;
    --navy-light:#12294f;
    --orange:#F97316;
    --orange-dark:#DB5F0B;
    --white:#FFFFFF;
    --gray-bg:#F5F6F8;
    --text:#111827;
    --text-soft:#6B7280;
    --border:#E5E7EB;
  }
  *{box-sizing:border-box; margin:0; padding:0;}
  html{scroll-behavior:smooth;}
  body{
    font-family:'Inter', sans-serif;
    color:var(--text);
    background:var(--white);
    -webkit-font-smoothing:antialiased;
    text-rendering:optimizeLegibility;
  }
  h1,h2,h3,h4{
    font-family:'Plus Jakarta Sans', sans-serif;
    color:var(--navy);
    line-height:1.15;
    overflow-wrap:break-word;
  }
  p,span,a,strong,button{ overflow-wrap:break-word; }
  a{text-decoration:none; color:inherit;}
  img{max-width:100%; display:block;}
  ul{list-style:none;}
  button{font-family:inherit; cursor:pointer;}
  .container{max-width:1280px; margin:0 auto; padding:0 20px;}
  @media(min-width:768px){ .container{padding:0 32px;} }

  .eyebrow{
    display:inline-flex; align-items:center; gap:8px;
    font-size:13px; font-weight:700; letter-spacing:0.08em; text-transform:uppercase;
    color:var(--orange);
  }
  .eyebrow::before{
    content:""; width:18px; height:2px; background:var(--orange); display:inline-block; border-radius:2px;
  }

  .btn{
    display:inline-flex; align-items:center; justify-content:center; gap:8px;
    min-height:48px; padding:0 26px; border-radius:10px; font-weight:700; font-size:15px;
    border:none; transition:transform .15s ease, box-shadow .15s ease, background .15s ease, border-color .15s ease;
    white-space:nowrap;
  }
  .btn:active{ transform:translateY(1px); }
  .btn-primary{ background:var(--orange); color:#fff; box-shadow:0 8px 20px -8px rgba(249,115,22,.55); }
  .btn-primary:hover{ background:var(--orange-dark); }
  .btn-secondary{ background:var(--navy); color:#fff; }
  .btn-secondary:hover{ background:var(--navy-light); }
  .btn-outline{ background:#fff; color:var(--navy); border:1.5px solid var(--border); }
  .btn-outline:hover{ border-color:var(--navy); }

  section{ padding:64px 0; }
  .section-head{ text-align:center; max-width:660px; margin:0 auto 40px; }
  .section-head h2{ font-size:clamp(26px,3.4vw,36px); margin-top:12px; }
  .section-head p{ color:var(--text-soft); margin-top:12px; font-size:15.5px; line-height:1.6; }
  .section-head.left{ text-align:left; margin:0 0 34px; max-width:720px; }
  .bg-gray{ background:var(--gray-bg); }

  /* ===== ABOUT HERO ===== */
  .about-hero{
    position:relative;
    background:
      radial-gradient(1100px 480px at 86% -8%, rgba(249,115,22,.18), transparent 60%),
      linear-gradient(180deg, var(--navy) 0%, #0d2547 62%, #0f2a52 100%);
    color:#fff;
    overflow:hidden;
  }
  .tread-line{
    position:absolute; inset:auto 0 0 0; height:10px;
    background-image:repeating-linear-gradient(100deg, rgba(255,255,255,.12) 0 10px, transparent 10px 22px);
    opacity:.5;
  }
  .about-hero-inner{
    display:grid; grid-template-columns:1fr; gap:40px;
    padding:56px 0 54px;
  }
  @media(min-width:1024px){
    .about-hero-inner{ grid-template-columns:1.02fr .98fr; align-items:center; padding:78px 0 68px; }
  }
  .about-hero-copy h1{
    font-size:clamp(32px, 5vw, 52px);
    font-weight:800; margin:16px 0 18px;
    color:#fff; line-height:1.12; text-wrap:balance;
  }
  .about-hero-copy p{
    font-size:17px; color:rgba(255,255,255,.84); max-width:590px; line-height:1.65;
  }
  .hero-ctas{ display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .about-hero-stats{ display:flex; gap:28px; margin-top:36px; flex-wrap:wrap; }
  .about-hero-stats div strong{ display:block; font-family:'Plus Jakarta Sans'; font-size:22px; color:#fff; }
  .about-hero-stats div span{ font-size:12.5px; color:rgba(255,255,255,.74); text-transform:uppercase; letter-spacing:.05em;}
  .about-visual{ position:relative; }
  .about-photo{
    border-radius:20px; overflow:hidden; box-shadow:0 30px 60px -20px rgba(0,0,0,.5);
    border:1px solid rgba(255,255,255,.1);
  }
  .about-photo img{ width:100%; height:360px; object-fit:cover; }
  .float-badge{
    position:absolute; bottom:-22px; left:-18px;
    background:#fff; color:var(--navy); border-radius:14px;
    padding:14px 18px; box-shadow:0 16px 30px -10px rgba(0,0,0,.35);
    display:flex; align-items:center; gap:12px;
  }
  .float-badge .ring{
    width:42px; height:42px; border-radius:50%; background:var(--gray-bg);
    display:flex; align-items:center; justify-content:center;
  }
  .float-badge strong{ font-family:'Plus Jakarta Sans'; font-size:15px; display:block; }
  .float-badge span{ font-size:12px; color:var(--text-soft); }
  @media(max-width:640px){ .float-badge{ display:none; } }

  /* ===== STORY ===== */
  .story-grid{ display:grid; grid-template-columns:1fr; gap:34px; align-items:center; }
  @media(min-width:960px){ .story-grid{ grid-template-columns:.92fr 1.08fr; } }
  .story-image{
    border-radius:18px; overflow:hidden; border:1px solid var(--border);
    box-shadow:0 22px 44px -28px rgba(11,31,58,.35);
  }
  .story-image img{ width:100%; height:420px; object-fit:cover; }
  .story-copy h2{ font-size:clamp(26px,3.4vw,38px); margin-top:12px; }
  .story-copy p{ color:var(--text-soft); margin-top:14px; font-size:15.5px; line-height:1.75; }
  .story-points{ display:grid; grid-template-columns:1fr; gap:14px; margin-top:24px; }
  @media(min-width:620px){ .story-points{ grid-template-columns:repeat(2,1fr); } }
  .point{
    background:#fff; border:1px solid var(--border); border-radius:14px; padding:18px;
    display:flex; gap:12px; align-items:flex-start;
  }
  .point-icon{
    flex:0 0 auto; width:38px; height:38px; border-radius:10px; background:var(--navy);
    color:#fff; display:flex; align-items:center; justify-content:center;
  }
  .point strong{ display:block; color:var(--navy); font-family:'Plus Jakarta Sans'; font-size:14.5px; }
  .point span{ display:block; color:var(--text-soft); font-size:13.5px; line-height:1.5; margin-top:3px; }

  /* ===== VALUES ===== */
  .value-grid{ display:grid; grid-template-columns:1fr; gap:18px; }
  @media(min-width:640px){ .value-grid{ grid-template-columns:repeat(2,1fr); } }
  @media(min-width:1024px){ .value-grid{ grid-template-columns:repeat(4,1fr); } }
  .value-card{
    background:#fff; border:1px solid var(--border); border-radius:16px; padding:26px 22px;
    transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease;
  }
  .value-card:hover{ transform:translateY(-4px); box-shadow:0 18px 34px -18px rgba(11,31,58,.25); border-color:transparent; }
  .value-icon{ width:48px; height:48px; border-radius:12px; background:var(--gray-bg); color:var(--navy); display:flex; align-items:center; justify-content:center; margin-bottom:16px;}
  .value-card:hover .value-icon{ background:var(--orange); color:#fff; }
  .value-card h3{ font-size:16.5px; }
  .value-card p{ font-size:13.5px; color:var(--text-soft); margin-top:8px; line-height:1.55; }

  /* ===== PROCESS ===== */
  .process-wrap{
    background:linear-gradient(120deg, var(--navy) 0%, #163a6b 100%);
    border-radius:24px; padding:48px 32px; color:#fff; position:relative; overflow:hidden;
  }
  .process-wrap::before{
    content:""; position:absolute; right:-60px; top:-60px; width:280px; height:280px; border-radius:50%;
    background:radial-gradient(circle, rgba(249,115,22,.35), transparent 70%);
  }
  .process-head{ position:relative; display:flex; justify-content:space-between; gap:22px; align-items:flex-end; flex-wrap:wrap; margin-bottom:30px; }
  .process-head h2{ color:#fff; font-size:clamp(26px,3.4vw,34px); margin-top:12px; }
  .process-head p{ color:rgba(255,255,255,.84); max-width:480px; line-height:1.6; }
  .process-grid{ display:grid; grid-template-columns:1fr; gap:14px; position:relative; }
  @media(min-width:800px){ .process-grid{ grid-template-columns:repeat(3,1fr); } }
  .process-card{
    background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.14); border-radius:14px;
    padding:22px; backdrop-filter:blur(2px);
  }
  .process-num{
    width:38px; height:38px; border-radius:50%; display:flex; align-items:center; justify-content:center;
    background:var(--orange); color:#fff; font-family:'Plus Jakarta Sans'; font-weight:800; margin-bottom:14px;
  }
  .process-card h3{ color:#fff; font-size:16px; }
  .process-card p{ color:rgba(255,255,255,.78); font-size:13.5px; line-height:1.6; margin-top:8px; }

  /* ===== TRUST ===== */
  .trust-grid{ display:grid; grid-template-columns:1fr; gap:18px; align-items:stretch; }
  @media(min-width:900px){ .trust-grid{ grid-template-columns:1.08fr .92fr; } }
  .trust-panel{
    border:1px solid var(--border); border-radius:18px; padding:30px; background:#fff;
  }
  .trust-panel h2{ font-size:clamp(24px,3vw,32px); }
  .trust-panel p{ color:var(--text-soft); line-height:1.7; margin-top:12px; }
  .metric-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:14px; margin-top:24px; }
  .metric{
    background:var(--gray-bg); border-radius:14px; padding:20px;
  }
  .metric strong{ display:block; font-family:'Plus Jakarta Sans'; color:var(--navy); font-size:24px; }
  .metric span{ display:block; color:var(--text-soft); font-size:12.5px; line-height:1.45; margin-top:4px; text-transform:uppercase; letter-spacing:.04em; }
  .support-list{ display:grid; gap:12px; margin-top:22px; }
  .support-item{ display:flex; gap:12px; align-items:flex-start; color:var(--text-soft); font-size:14px; line-height:1.55; }
  .check{
    flex:0 0 auto; width:24px; height:24px; border-radius:50%; background:rgba(249,115,22,.12);
    color:var(--orange); display:flex; align-items:center; justify-content:center; font-weight:800;
  }

  /* ===== CTA ===== */
  .about-cta{
    background:var(--orange);
    border-radius:24px; padding:44px 32px; color:#fff; text-align:center;
  }
  .about-cta h2{ color:#fff; font-size:clamp(24px,3vw,30px); }
  .about-cta p{ color:rgba(255,255,255,.9); margin:10px auto 0; max-width:560px; line-height:1.6; }
  .about-cta-actions{ display:flex; justify-content:center; flex-wrap:wrap; gap:12px; margin-top:26px; }

  .reveal{ opacity:0; transform:translateY(16px); transition:opacity .6s ease, transform .6s ease; }
  .reveal.in{ opacity:1; transform:none; }
  @media (prefers-reduced-motion: reduce){
    .reveal{ opacity:1; transform:none; transition:none; }
    html{ scroll-behavior:auto; }
  }
</style>

<!-- ===================== ABOUT HERO ===================== -->
<section class="about-hero">
  <div class="container about-hero-inner">
    <div class="about-hero-copy">
      <span class="eyebrow">About Rubyinstar</span>
      <h1>Making Tire Shopping Easier For Everyday Drivers</h1>
      <p>Rubyinstar helps customers find affordable, dependable tires online with clear product information, straightforward delivery, and support when choosing the right fit.</p>
      <div class="hero-ctas">
        <a href="/shop/" class="btn btn-primary">Shop Tires</a>
        <a href="/contact-us/" class="btn btn-outline" style="background:transparent;color:#fff;border-color:rgba(255,255,255,.3);">Contact Support</a>
      </div>
      <div class="about-hero-stats">
        <div><strong>50 States</strong><span>Delivery Reach</span></div>
        <div><strong>30 Days</strong><span>Easy Returns</span></div>
        <div><strong>Simple</strong><span>Online Ordering</span></div>
      </div>
    </div>

    <div class="about-visual">
      <div class="about-photo">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/gallery/Rubyinstar/tire-hero-road.png' ); ?>" alt="Everyday vehicle on the road with reliable tires">
      </div>
      <div class="float-badge">
        <span class="ring">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0B1F3A" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg>
        </span>
        <div>
          <strong>Built On Trust</strong>
          <span>Clear choices, fair value</span>
        </div>
      </div>
    </div>
  </div>
  <div class="tread-line"></div>
</section>

<!-- ===================== OUR STORY ===================== -->
<section class="bg-gray">
  <div class="container">
    <div class="story-grid reveal">
      <div class="story-image">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/gallery/Rubyinstar/all-season-tread.png' ); ?>" alt="Close-up of all-season tire tread">
      </div>
      <div class="story-copy">
        <span class="eyebrow">Our Story</span>
        <h2>A Better Way To Buy Tires Online</h2>
        <p>Buying tires should not feel confusing or stressful. Rubyinstar was created to give drivers a cleaner shopping experience with practical tire categories, visible pricing, and easy paths to compare options for daily driving, family SUVs, trucks, and seasonal needs.</p>
        <p>We focus on the essentials that matter most: fit, value, delivery, and confidence. Every page is designed to help customers move from uncertainty to the right tire choice faster.</p>

        <div class="story-points">
          <div class="point">
            <div class="point-icon">
              <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
            <div><strong>Focused On Tires</strong><span>Clear tire categories and product details for common vehicle needs.</span></div>
          </div>
          <div class="point">
            <div class="point-icon">
              <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <div><strong>Fair Everyday Value</strong><span>Affordable options without a complicated buying experience.</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== VALUES ===================== -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">What We Believe</span>
      <h2>Simple Standards Behind Every Order</h2>
      <p>Our store is shaped around practical decisions that make tire shopping feel more reliable from the first search to final delivery.</p>
    </div>

    <div class="value-grid reveal">
      <div class="value-card">
        <div class="value-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
        </div>
        <h3>Clear Choices</h3>
        <p>Product information is organized so customers can compare tires without digging through clutter.</p>
      </div>
      <div class="value-card">
        <div class="value-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 9h18"/></svg>
        </div>
        <h3>Easy Ordering</h3>
        <p>A straightforward online store helps drivers move quickly from browsing to checkout.</p>
      </div>
      <div class="value-card">
        <div class="value-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h13l-3-4M16 12l-3 4M21 12v4a1 1 0 0 1-1 1h-2M3 12V8a1 1 0 0 1 1-1h6v5"/></svg>
        </div>
        <h3>Reliable Delivery</h3>
        <p>Orders are handled with a focus on dependable shipment and practical delivery expectations.</p>
      </div>
      <div class="value-card">
        <div class="value-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3>Helpful Support</h3>
        <p>When questions come up, customers can reach out for guidance before or after purchase.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== PROCESS ===================== -->
<section>
  <div class="container">
    <div class="process-wrap reveal">
      <div class="process-head">
        <div>
          <span class="eyebrow">How It Works</span>
          <h2>From Tire Search To Delivery</h2>
        </div>
        <p>Rubyinstar keeps the buying path simple so customers can focus on fit, price, and confidence.</p>
      </div>

      <div class="process-grid">
        <div class="process-card">
          <div class="process-num">1</div>
          <h3>Find Your Tire</h3>
          <p>Browse by category, tire type, vehicle need, brand, or common sizing paths.</p>
        </div>
        <div class="process-card">
          <div class="process-num">2</div>
          <h3>Compare With Confidence</h3>
          <p>Review size, tire type, price, and shipping details before placing your order.</p>
        </div>
        <div class="process-card">
          <div class="process-num">3</div>
          <h3>Get It Delivered</h3>
          <p>Complete checkout online and receive order updates as your tires move toward delivery.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== TRUST ===================== -->
<section class="bg-gray">
  <div class="container">
    <div class="trust-grid reveal">
      <div class="trust-panel">
        <span class="eyebrow">Why Drivers Trust Us</span>
        <h2>Built For Practical Tire Buyers</h2>
        <p>Rubyinstar is not trying to make tire shopping feel complicated or overly technical. We organize the experience around what everyday drivers actually need to decide: what fits, what it costs, how it ships, and where to get help.</p>
        <div class="metric-grid">
          <div class="metric"><strong>6-9</strong><span>Average delivery days</span></div>
          <div class="metric"><strong>30</strong><span>Day return window</span></div>
          <div class="metric"><strong>24/7</strong><span>Online shopping access</span></div>
          <div class="metric"><strong>50</strong><span>States shipped</span></div>
        </div>
      </div>

      <div class="trust-panel">
        <h2>Our Customer Promise</h2>
        <p>Every order should feel clear before checkout and supported afterward.</p>
        <div class="support-list">
          <div class="support-item"><span class="check">✓</span><span>Clear product presentation with tire size, type, price, and shipping details visible.</span></div>
          <div class="support-item"><span class="check">✓</span><span>Convenient online ordering for busy customers and everyday drivers.</span></div>
          <div class="support-item"><span class="check">✓</span><span>Accessible support for questions about orders, policies, and tire selection.</span></div>
          <div class="support-item"><span class="check">✓</span><span>Helpful policy pages for shipping, returns, privacy, terms, FAQs, and tracking.</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== CTA ===================== -->
<section>
  <div class="container">
    <div class="about-cta reveal">
      <h2>Ready To Find The Right Tires?</h2>
      <p>Start with popular tire categories or contact Rubyinstar support if you need help choosing the best option for your vehicle.</p>
      <div class="about-cta-actions">
        <a href="/shop/" class="btn btn-secondary">Shop Tires</a>
        <a href="/contact-us/" class="btn btn-outline">Ask A Question</a>
      </div>
    </div>
  </div>
</section>

<script>
  // Scroll reveal
  const io = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); } });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el=> io.observe(el));
</script>
