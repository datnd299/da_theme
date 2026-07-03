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
  p,span,a,strong,button,label,select,input{ overflow-wrap:break-word; }
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
    height:48px; padding:0 26px; border-radius:10px; font-weight:700; font-size:15px;
    border:none; transition:transform .15s ease, box-shadow .15s ease, background .15s ease;
    white-space:nowrap;
  }
  .btn:active{ transform:translateY(1px); }
  .btn-primary{ background:var(--orange); color:#fff; box-shadow:0 8px 20px -8px rgba(249,115,22,.55); }
  .btn-primary:hover{ background:var(--orange-dark); }
  .btn-secondary{ background:var(--navy); color:#fff; }
  .btn-secondary:hover{ background:var(--navy-light); }
  .btn-outline{ background:#fff; color:var(--navy); border:1.5px solid var(--border); }
  .btn-outline:hover{ border-color:var(--navy); }

  /* ===== HERO ===== */
  .hero{
    position:relative;
    background:
      radial-gradient(1100px 480px at 85% -10%, rgba(249,115,22,.16), transparent 60%),
      linear-gradient(180deg, var(--navy) 0%, #0d2547 60%, #0f2a52 100%);
    color:#fff;
    overflow:hidden;
  }
  .tread-line{
    position:absolute; inset:auto 0 0 0; height:10px;
    background-image:repeating-linear-gradient(100deg, rgba(255,255,255,.12) 0 10px, transparent 10px 22px);
    opacity:.5;
  }
  .hero-inner{
    display:grid; grid-template-columns:1fr; gap:40px;
    padding:56px 0 48px;
  }
  @media(min-width:1024px){
    .hero-inner{ grid-template-columns:1.05fr .95fr; align-items:center; padding:76px 0 64px; }
  }
  .hero-copy h1{
    font-size:clamp(32px, 5vw, 52px);
    font-weight:800; margin:16px 0 18px;
    color:#fff;
    line-height:1.12;
    text-wrap:balance;
  }
  .hero-copy p{
    font-size:17px; color:rgba(255,255,255,.84); max-width:560px; line-height:1.65;
  }
  .hero-ctas{ display:flex; flex-wrap:wrap; gap:14px; margin-top:28px; }
  .hero-stats{ display:flex; gap:28px; margin-top:36px; flex-wrap:wrap; }
  .hero-stats div strong{ display:block; font-family:'Plus Jakarta Sans'; font-size:22px; color:#fff; }
  .hero-stats div span{ font-size:12.5px; color:rgba(255,255,255,.74); text-transform:uppercase; letter-spacing:.05em;}

  .hero-visual{ position:relative; }
  .hero-visual .tire-photo{
    border-radius:20px; overflow:hidden; box-shadow:0 30px 60px -20px rgba(0,0,0,.5);
    border:1px solid rgba(255,255,255,.1);
  }
  .hero-visual img{ width:100%; height:340px; object-fit:cover; }
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

  /* Tire Finder card */
  .finder-card{
    background:#fff; color:var(--text); border-radius:18px;
    padding:22px; margin-top:34px;
    box-shadow:0 24px 50px -18px rgba(0,0,0,.45);
  }
  .finder-tabs{ display:flex; gap:6px; background:var(--gray-bg); padding:5px; border-radius:12px; margin-bottom:18px; width:fit-content;}
  .finder-tab{
    border:none; background:transparent; padding:9px 16px; border-radius:9px;
    font-size:13.5px; font-weight:700; color:var(--text-soft);
  }
  .finder-tab.active{ background:var(--navy); color:#fff; }
  .finder-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:12px; }
  @media(min-width:560px){ .finder-grid{ grid-template-columns:repeat(4,1fr); } }
  .finder-panel{ display:none; }
  .finder-panel.active{ display:block; }
  select{
    width:100%; height:46px; border-radius:9px; border:1.5px solid var(--border);
    padding:0 12px; font-size:14px; font-family:inherit; color:var(--text); background:#fff;
    appearance:none;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%236B7280' stroke-width='1.6' fill='none' fill-rule='evenodd'/%3E%3C/svg%3E");
    background-repeat:no-repeat; background-position:right 14px center;
  }
  .field-label{ font-size:12px; font-weight:700; color:var(--text-soft); margin-bottom:6px; display:block; text-transform:uppercase; letter-spacing:.04em;}
  .finder-submit{ margin-top:16px; width:100%; }
  @media(min-width:560px){ .finder-submit{ width:auto; } }

  /* ===== SECTION GENERIC ===== */
  section{ padding:64px 0; }
  .section-head{ text-align:center; max-width:640px; margin:0 auto 40px; }
  .section-head h2{ font-size:clamp(26px,3.4vw,36px); margin-top:12px; }
  .section-head p{ color:var(--text-soft); margin-top:12px; font-size:15.5px; line-height:1.6; }
  .section-head.left{ text-align:left; margin:0; max-width:none; display:flex; align-items:flex-end; justify-content:space-between; gap:20px; flex-wrap:wrap; }

  /* ===== CATEGORIES ===== */
  .bg-gray{ background:var(--gray-bg); }
  .cat-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:18px; }
  @media(min-width:768px){ .cat-grid{ grid-template-columns:repeat(3,1fr); } }
  @media(min-width:1080px){ .cat-grid{ grid-template-columns:repeat(5,1fr); } }
  .cat-card{
    background:#fff; border:1px solid var(--border); border-radius:16px; padding:22px 18px;
    transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    display:flex; flex-direction:column; gap:14px;
  }
  .cat-card:hover{ transform:translateY(-4px); box-shadow:0 18px 34px -18px rgba(11,31,58,.25); border-color:transparent;}
  .cat-icon{
    width:52px; height:52px; border-radius:12px; background:var(--gray-bg);
    display:flex; align-items:center; justify-content:center; color:var(--navy);
  }
  .cat-card:hover .cat-icon{ background:var(--orange); color:#fff; }
  .cat-card h3{ font-size:17px; }
  .cat-card p{ font-size:13.5px; color:var(--text-soft); line-height:1.5; flex:1; }
  .cat-link{ font-size:13.5px; font-weight:700; color:var(--orange); display:inline-flex; align-items:center; gap:5px; }

  /* ===== PRODUCTS ===== */
  .prod-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:18px; margin-top:36px; }
  @media(min-width:768px){ .prod-grid{ grid-template-columns:repeat(4,1fr); } }
  .prod-card{
    border:1px solid var(--border); border-radius:16px; overflow:hidden; background:#fff;
    display:flex; flex-direction:column; transition:box-shadow .18s ease, transform .18s ease;
  }
  .prod-card:hover{ box-shadow:0 20px 40px -20px rgba(11,31,58,.3); transform:translateY(-3px); }
  .prod-thumb{ position:relative; background:var(--gray-bg); aspect-ratio:4/3; overflow:hidden; }
  .prod-thumb img{ width:100%; height:100%; object-fit:cover; }
  .prod-badge{
    position:absolute; top:10px; left:10px; background:var(--navy); color:#fff;
    font-size:11px; font-weight:700; padding:5px 10px; border-radius:999px; letter-spacing:.02em;
  }
  .prod-badge.orange{ background:var(--orange); }
  .prod-body{ padding:16px; display:flex; flex-direction:column; gap:6px; flex:1;}
  .prod-brand{ font-size:12px; font-weight:700; color:var(--orange); text-transform:uppercase; letter-spacing:.04em;}
  .prod-model{ font-size:15.5px; font-weight:700; color:var(--navy); font-family:'Plus Jakarta Sans';}
  .prod-meta{ display:flex; gap:8px; font-size:12.5px; color:var(--text-soft); margin-top:2px; flex-wrap:wrap;}
  .tag{ background:var(--gray-bg); padding:3px 8px; border-radius:6px; font-weight:600; }
  .prod-foot{ display:flex; align-items:center; justify-content:space-between; margin-top:10px; padding-top:12px; border-top:1px dashed var(--border);}
  .prod-price{ font-family:'Plus Jakarta Sans'; font-weight:800; font-size:18px; color:var(--navy);}
  .prod-ship{ font-size:11.5px; color:var(--text-soft); margin-top:2px;}
  .mini-cta{
    height:36px; padding:0 14px; border-radius:8px; font-size:13px; font-weight:700;
    background:var(--navy); color:#fff; border:none;
  }
  .mini-cta:hover{ background:var(--orange); }

  /* ===== DEALS BANNER ===== */
  .deals{
    background:linear-gradient(120deg, var(--navy) 0%, #163a6b 100%);
    border-radius:24px; padding:48px 32px; color:#fff; position:relative; overflow:hidden;
    margin-top:0;
  }
  .deals::before{
    content:""; position:absolute; right:-60px; top:-60px; width:280px; height:280px; border-radius:50%;
    background:radial-gradient(circle, rgba(249,115,22,.35), transparent 70%);
  }
  .deals-grid{ display:grid; grid-template-columns:1fr; gap:32px; position:relative; }
  @media(min-width:900px){ .deals-grid{ grid-template-columns:1fr 1fr; align-items:center; } }
  .deals h2{ color:#fff; font-size:clamp(26px,3.4vw,34px); }
  .deals p{ color:rgba(255,255,255,.84); margin-top:12px; max-width:420px; line-height:1.6; }
  .deal-cards{ display:grid; grid-template-columns:repeat(3,1fr); gap:14px; }
  @media(max-width:640px){ .deal-cards{ grid-template-columns:1fr; } }
  .deal-card{
    background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.14); border-radius:14px;
    padding:18px; backdrop-filter:blur(2px);
  }
  .deal-card .pct{ font-family:'Plus Jakarta Sans'; font-weight:800; font-size:24px; color:var(--orange); }
  .deal-card h4{ color:#fff; font-size:14.5px; margin-top:6px; }
  .deal-card span{ font-size:12px; color:rgba(255,255,255,.78); }

  /* ===== WHY CHOOSE ===== */
  .why-grid{ display:grid; grid-template-columns:1fr; gap:18px; margin-top:36px;}
  @media(min-width:640px){ .why-grid{ grid-template-columns:repeat(2,1fr); } }
  @media(min-width:1024px){ .why-grid{ grid-template-columns:repeat(4,1fr); } }
  .why-card{ background:#fff; border:1px solid var(--border); border-radius:16px; padding:26px 22px; }
  .why-icon{ width:48px; height:48px; border-radius:12px; background:var(--navy); color:#fff; display:flex; align-items:center; justify-content:center; margin-bottom:16px;}
  .why-card h3{ font-size:16.5px; }
  .why-card p{ font-size:13.5px; color:var(--text-soft); margin-top:8px; line-height:1.55; }

  /* ===== TESTIMONIALS ===== */
  .quote-track{ display:flex; gap:18px; overflow-x:auto; scroll-snap-type:x mandatory; padding-bottom:8px; margin-top:36px; }
  .quote-track::-webkit-scrollbar{ height:6px; }
  .quote-track::-webkit-scrollbar-thumb{ background:var(--border); border-radius:6px;}
  .quote-card{
    scroll-snap-align:start; min-width:300px; background:#fff; border:1px solid var(--border); border-radius:16px;
    padding:24px; flex:1;
  }
  .stars{ color:var(--orange); font-size:15px; letter-spacing:2px; }
  .quote-card p{ font-size:14.5px; color:var(--text); margin-top:12px; line-height:1.6; }
  .quote-foot{ display:flex; align-items:center; gap:10px; margin-top:16px; }
  .quote-avatar{ width:38px; height:38px; border-radius:50%; background:var(--gray-bg); display:flex; align-items:center; justify-content:center; color:var(--navy); font-weight:700; font-size:13px; font-family:'Plus Jakarta Sans';}
  .quote-foot strong{ font-size:13.5px; display:block; }
  .quote-foot span{ font-size:12px; color:var(--text-soft); }

  /* ===== NEWSLETTER ===== */
  .newsletter{
    background:var(--orange);
    border-radius:24px; padding:44px 32px; color:#fff; text-align:center;
  }
  .newsletter h2{ color:#fff; font-size:clamp(24px,3vw,30px); }
  .newsletter p{ color:rgba(255,255,255,.9); margin-top:10px; max-width:480px; margin-inline:auto; }
  .news-form{
    display:flex; flex-direction:column; align-items:stretch; gap:12px;
    width:100%; max-width:520px; margin:26px auto 0;
  }
  @media(min-width:560px){ .news-form{ flex-direction:row; justify-content:center; } }
  .news-form input{
    flex:1 1 0; min-width:0; width:100%; height:50px; border-radius:10px;
    border:1px solid rgba(255,255,255,.42); background:#fff; color:var(--text);
    padding:0 18px; font-size:14.5px; font-family:inherit; outline:none;
    box-shadow:0 12px 24px -18px rgba(11,31,58,.45);
  }
  .news-form input::placeholder{ color:#6B7280; opacity:1; }
  .news-form input:focus{
    border-color:var(--navy);
    box-shadow:0 0 0 3px rgba(11,31,58,.18), 0 12px 24px -18px rgba(11,31,58,.45);
  }
  .news-form .btn-secondary{ height:50px; flex:0 0 auto; }
  @media(max-width:559px){ .news-form .btn-secondary{ width:100%; } }

  .reveal{ opacity:0; transform:translateY(16px); transition:opacity .6s ease, transform .6s ease; }
  .reveal.in{ opacity:1; transform:none; }
  @media (prefers-reduced-motion: reduce){
    .reveal{ opacity:1; transform:none; transition:none; }
    html{ scroll-behavior:auto; }
  }
</style>


<!-- ===================== HERO + FINDER ===================== -->
<section class="hero" id="finder">
  <div class="container hero-inner">
    <div class="hero-copy">
      <span class="eyebrow">Online Tire Shopping Made Simple</span>
      <h1>Find The Right Tires<br>For Your Vehicle</h1>
      <p>Shop quality tires online with competitive prices, convenient delivery, and an easier buying experience &mdash; built for everyday American drivers.</p>
      <div class="hero-ctas">
        <a href="#featured" class="btn btn-primary">Shop Tires</a>
        <a href="#finder-card" class="btn btn-outline" style="background:transparent;color:#fff;border-color:rgba(255,255,255,.3);">Find My Tire Size</a>
      </div>
      <div class="hero-stats">
        <div><strong>6&ndash;9 Days</strong><span>Avg. Delivery</span></div>
        <div><strong>30 Days</strong><span>Easy Returns</span></div>
        <div><strong>All 50</strong><span>States Shipped</span></div>
      </div>
    </div>

    <div class="hero-visual">
      <div class="tire-photo">
        <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=1000&auto=format&fit=crop" alt="Vehicle driving on the road, ready for a tire upgrade">
      </div>
      <div class="float-badge">
        <span class="ring">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0B1F3A" stroke-width="2"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/></svg>
        </span>
        <div>
          <strong>Free Shipping</strong>
          <span>On most tire orders</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Tire Finder Card -->
  <div class="container" style="position:relative;">
    <div class="finder-card" id="finder-card">
      <div class="finder-tabs">
        <button type="button" class="finder-tab active" data-tab="vehicle">Find By Vehicle</button>
        <button type="button" class="finder-tab" data-tab="size">Find By Tire Size</button>
      </div>

      <div class="finder-panel active" data-panel="vehicle">
        <div class="finder-grid">
          <div>
            <label class="field-label" for="finder-year">Year</label>
            <select id="finder-year"><option>Select Year</option><option>2026</option><option>2025</option><option>2024</option><option>2023</option><option>2022</option></select>
          </div>
          <div>
            <label class="field-label" for="finder-make">Make</label>
            <select id="finder-make"><option>Select Make</option><option>Toyota</option><option>Honda</option><option>Ford</option><option>Chevrolet</option><option>Nissan</option></select>
          </div>
          <div>
            <label class="field-label" for="finder-model">Model</label>
            <select id="finder-model"><option>Select Model</option><option>Camry</option><option>CR-V</option><option>F-150</option><option>Equinox</option></select>
          </div>
          <div>
            <label class="field-label" for="finder-trim">Trim</label>
            <select id="finder-trim"><option>Select Trim</option><option>Base</option><option>LE</option><option>Sport</option><option>Limited</option></select>
          </div>
        </div>
        <a href="#featured" class="btn btn-primary finder-submit">Search Tires</a>
      </div>

      <div class="finder-panel" data-panel="size">
        <div class="finder-grid">
          <div>
            <label class="field-label" for="finder-width">Width</label>
            <select id="finder-width"><option>Select Width</option><option>195</option><option>205</option><option>215</option><option>225</option><option>235</option></select>
          </div>
          <div>
            <label class="field-label" for="finder-ratio">Aspect Ratio</label>
            <select id="finder-ratio"><option>Select Ratio</option><option>45</option><option>50</option><option>55</option><option>60</option><option>65</option></select>
          </div>
          <div>
            <label class="field-label" for="finder-wheel-size">Wheel Size</label>
            <select id="finder-wheel-size"><option>Select Size</option><option>16"</option><option>17"</option><option>18"</option><option>19"</option><option>20"</option></select>
          </div>
        </div>
        <a href="#featured" class="btn btn-primary finder-submit">Search Tires</a>
      </div>
    </div>
  </div>
  <div class="tread-line"></div>
</section>

<!-- ===================== CATEGORIES ===================== -->
<section class="bg-gray" id="categories">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Shop By Category</span>
      <h2>Tires For Every Vehicle And Driving Need</h2>
      <p>Browse by vehicle type to quickly narrow down tires that actually fit &mdash; no guesswork required.</p>
    </div>

    <div class="cat-grid reveal">
      <div class="cat-card">
        <div class="cat-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="9" width="18" height="7" rx="2"/><circle cx="7.5" cy="18" r="1.7"/><circle cx="16.5" cy="18" r="1.7"/><path d="M5 9l2-4h10l2 4"/></svg>
        </div>
        <h3>Passenger Car Tires</h3>
        <p>Reliable tires for daily driving and everyday vehicles.</p>
        <a class="cat-link" href="#featured">Shop Now &rarr;</a>
      </div>
      <div class="cat-card">
        <div class="cat-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 10l1.5-4h8l3 4H20a1 1 0 0 1 1 1v5h-2"/><circle cx="8" cy="17" r="1.8"/><circle cx="16" cy="17" r="1.8"/><path d="M3 16v-4h1"/></svg>
        </div>
        <h3>SUV &amp; Crossover Tires</h3>
        <p>Comfortable and dependable tires for family vehicles.</p>
        <a class="cat-link" href="#featured">Shop Now &rarr;</a>
      </div>
      <div class="cat-card">
        <div class="cat-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 12V8a1 1 0 0 1 1-1h6v5"/><path d="M10 12h8l2 3v3h-2"/><circle cx="7.5" cy="18" r="1.7"/><circle cx="16.5" cy="18" r="1.7"/></svg>
        </div>
        <h3>Truck Tires</h3>
        <p>Durable options for pickups and work vehicles.</p>
        <a class="cat-link" href="#featured">Shop Now &rarr;</a>
      </div>
      <div class="cat-card">
        <div class="cat-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8z"/></svg>
        </div>
        <h3>Performance Tires</h3>
        <p>Designed for better handling and driving experience.</p>
        <a class="cat-link" href="#featured">Shop Now &rarr;</a>
      </div>
      <div class="cat-card">
        <div class="cat-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"/><circle cx="12" cy="12" r="3.2"/></svg>
        </div>
        <h3>All Season Tires</h3>
        <p>Convenient year-round tire solutions.</p>
        <a class="cat-link" href="#featured">Shop Now &rarr;</a>
      </div>
    </div>
  </div>
</section>

<!-- ===================== FEATURED PRODUCTS ===================== -->
<section id="featured">
  <div class="container">
    <div class="section-head left reveal">
      <div>
        <span class="eyebrow">Featured Tires</span>
        <h2>Popular Tires For Everyday Drivers</h2>
      </div>
      <a href="#" class="btn btn-outline">View All Tires</a>
    </div>

    <div class="prod-grid reveal">
      <!-- Product 1 -->
      <div class="prod-card">
        <div class="prod-thumb">
          <span class="prod-badge">Best Seller</span>
          <img src="https://images.unsplash.com/photo-1621361365424-06f0e1eb0e57?q=80&w=600&auto=format&fit=crop" alt="Michelin Defender 2 all-season tire">
        </div>
        <div class="prod-body">
          <span class="prod-brand">Michelin</span>
          <h3 class="prod-model">Defender 2</h3>
          <div class="prod-meta"><span class="tag">215/55R17</span><span class="tag">All Season</span></div>
          <div class="prod-foot">
            <div>
              <div class="prod-price">$189.99</div>
              <div class="prod-ship">Free shipping</div>
            </div>
            <button type="button" class="mini-cta">Shop Now</button>
          </div>
        </div>
      </div>
      <!-- Product 2 -->
      <div class="prod-card">
        <div class="prod-thumb">
          <span class="prod-badge orange">Popular Choice</span>
          <img src="https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?q=80&w=600&auto=format&fit=crop" alt="Goodyear Assurance all-season tire">
        </div>
        <div class="prod-body">
          <span class="prod-brand">Goodyear</span>
          <h3 class="prod-model">Assurance WeatherReady</h3>
          <div class="prod-meta"><span class="tag">225/60R18</span><span class="tag">All Season</span></div>
          <div class="prod-foot">
            <div>
              <div class="prod-price">$174.50</div>
              <div class="prod-ship">Free shipping</div>
            </div>
            <button type="button" class="mini-cta">Shop Now</button>
          </div>
        </div>
      </div>
      <!-- Product 3 -->
      <div class="prod-card">
        <div class="prod-thumb">
          <img src="https://images.unsplash.com/photo-1601362840469-51e4d8d58785?q=80&w=600&auto=format&fit=crop" alt="Bridgestone Dueler SUV tire">
        </div>
        <div class="prod-body">
          <span class="prod-brand">Bridgestone</span>
          <h3 class="prod-model">Dueler H/L Alenza</h3>
          <div class="prod-meta"><span class="tag">235/65R17</span><span class="tag">SUV</span></div>
          <div class="prod-foot">
            <div>
              <div class="prod-price">$205.00</div>
              <div class="prod-ship">Ships in 1&ndash;2 days</div>
            </div>
            <button type="button" class="mini-cta">Shop Now</button>
          </div>
        </div>
      </div>
      <!-- Product 4 -->
      <div class="prod-card">
        <div class="prod-thumb">
          <span class="prod-badge">Free Shipping</span>
          <img src="https://images.unsplash.com/photo-1590510696618-64bc9a0a3946?q=80&w=600&auto=format&fit=crop" alt="Continental TrueContact tire">
        </div>
        <div class="prod-body">
          <span class="prod-brand">Continental</span>
          <h3 class="prod-model">TrueContact Tour</h3>
          <div class="prod-meta"><span class="tag">205/55R16</span><span class="tag">All Season</span></div>
          <div class="prod-foot">
            <div>
              <div class="prod-price">$149.99</div>
              <div class="prod-ship">Free shipping</div>
            </div>
            <button type="button" class="mini-cta">Shop Now</button>
          </div>
        </div>
      </div>
      <!-- Product 5 -->
      <div class="prod-card">
        <div class="prod-thumb">
          <img src="https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?q=80&w=600&auto=format&fit=crop" alt="Pirelli Scorpion truck tire">
        </div>
        <div class="prod-body">
          <span class="prod-brand">Pirelli</span>
          <h3 class="prod-model">Scorpion All Terrain</h3>
          <div class="prod-meta"><span class="tag">265/70R17</span><span class="tag">Truck</span></div>
          <div class="prod-foot">
            <div>
              <div class="prod-price">$228.75</div>
              <div class="prod-ship">Ships in 1&ndash;2 days</div>
            </div>
            <button type="button" class="mini-cta">Shop Now</button>
          </div>
        </div>
      </div>
      <!-- Product 6 -->
      <div class="prod-card">
        <div class="prod-thumb">
          <span class="prod-badge orange">Popular Choice</span>
          <img src="https://images.unsplash.com/photo-1553440569-bcc63803a83d?q=80&w=600&auto=format&fit=crop" alt="Yokohama performance tire">
        </div>
        <div class="prod-body">
          <span class="prod-brand">Yokohama</span>
          <h3 class="prod-model">ADVAN Sport</h3>
          <div class="prod-meta"><span class="tag">245/40R19</span><span class="tag">Performance</span></div>
          <div class="prod-foot">
            <div>
              <div class="prod-price">$219.00</div>
              <div class="prod-ship">Free shipping</div>
            </div>
            <button type="button" class="mini-cta">Shop Now</button>
          </div>
        </div>
      </div>
      <!-- Product 7 -->
      <div class="prod-card">
        <div class="prod-thumb">
          <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=600&auto=format&fit=crop" alt="Hankook Kinergy all-season tire">
        </div>
        <div class="prod-body">
          <span class="prod-brand">Hankook</span>
          <h3 class="prod-model">Kinergy GT</h3>
          <div class="prod-meta"><span class="tag">195/65R15</span><span class="tag">All Season</span></div>
          <div class="prod-foot">
            <div>
              <div class="prod-price">$118.40</div>
              <div class="prod-ship">Free shipping</div>
            </div>
            <button type="button" class="mini-cta">Shop Now</button>
          </div>
        </div>
      </div>
      <!-- Product 8 -->
      <div class="prod-card">
        <div class="prod-thumb">
          <span class="prod-badge">Best Seller</span>
          <img src="https://images.unsplash.com/photo-1503736334956-4c8f8e92946d?q=80&w=600&auto=format&fit=crop" alt="Cooper Discoverer SUV tire">
        </div>
        <div class="prod-body">
          <span class="prod-brand">Cooper</span>
          <h3 class="prod-model">Discoverer SRX</h3>
          <div class="prod-meta"><span class="tag">255/55R18</span><span class="tag">SUV</span></div>
          <div class="prod-foot">
            <div>
              <div class="prod-price">$196.20</div>
              <div class="prod-ship">Ships in 1&ndash;2 days</div>
            </div>
            <button type="button" class="mini-cta">Shop Now</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== DEALS ===================== -->
<section id="deals">
  <div class="container">
    <div class="deals reveal">
      <div class="deals-grid">
        <div>
          <span class="eyebrow" style="color:var(--orange);">Best Deals</span>
          <h2>Quality Tires At Better Prices</h2>
          <p>Explore affordable tire options designed for everyday driving needs, hand-picked for the season ahead.</p>
          <a href="#featured" class="btn btn-primary" style="margin-top:22px;">Shop Deals</a>
        </div>
        <div class="deal-cards">
          <div class="deal-card">
            <div class="pct">Save</div>
            <h4>All Season Deals</h4>
            <span>Everyday driving picks</span>
          </div>
          <div class="deal-card">
            <div class="pct">Save</div>
            <h4>SUV Tire Savings</h4>
            <span>Family vehicle comfort</span>
          </div>
          <div class="deal-card">
            <div class="pct">Save</div>
            <h4>Truck Tire Offers</h4>
            <span>Built for hauling & work</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== WHY CHOOSE US ===================== -->
<section class="bg-gray">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Why Rubyinstar</span>
      <h2>Why Drivers Choose Rubyinstar</h2>
    </div>
    <div class="why-grid reveal">
      <div class="why-card">
        <div class="why-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 9h18"/></svg></div>
        <h3>Easy Online Shopping</h3>
        <p>Find and order tires from the comfort of your home, any time.</p>
      </div>
      <div class="why-card">
        <div class="why-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
        <h3>Competitive Pricing</h3>
        <p>Affordable tire options built for everyday, budget-conscious drivers.</p>
      </div>
      <div class="why-card">
        <div class="why-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M3 12h13l-3-4M16 12l-3 4M21 12v4a1 1 0 0 1-1 1h-2M3 12V8a1 1 0 0 1 1-1h6v5"/></svg></div>
        <h3>Reliable Delivery</h3>
        <p>Track your order every step of the way, from shipment to arrival.</p>
      </div>
      <div class="why-card">
        <div class="why-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
        <h3>Customer Support</h3>
        <p>Help whenever you need assistance choosing the right tires.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===================== TESTIMONIALS ===================== -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Customer Feedback</span>
      <h2>What Customers Say</h2>
    </div>
    <div class="quote-track reveal">
      <div class="quote-card">
        <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>"Easy shopping experience and clear product information from start to finish."</p>
        <div class="quote-foot">
          <div class="quote-avatar">S.</div>
          <div><strong>Verified Buyer</strong><span>Sedan Owner</span></div>
        </div>
      </div>
      <div class="quote-card">
        <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>"Great value and a convenient delivery process &mdash; my tires arrived right on schedule."</p>
        <div class="quote-foot">
          <div class="quote-avatar">M.</div>
          <div><strong>Verified Buyer</strong><span>SUV Owner</span></div>
        </div>
      </div>
      <div class="quote-card">
        <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>"Found the right tires for my truck without the complicated buying process."</p>
        <div class="quote-foot">
          <div class="quote-avatar">J.</div>
          <div><strong>Verified Buyer</strong><span>Truck Owner</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== NEWSLETTER ===================== -->
<section>
  <div class="container">
    <div class="newsletter reveal">
      <h2>Get Tire Deals &amp; Updates</h2>
      <p>Receive new offers, tire tips, and product updates straight to your inbox.</p>
      <form class="news-form" onsubmit="event.preventDefault(); this.reset(); alert('Thanks for subscribing!');">
        <input type="email" placeholder="Enter your email" required>
        <button type="submit" class="btn btn-secondary">Subscribe</button>
      </form>
    </div>
  </div>
</section>


<script>
  // Tire finder tabs
  document.querySelectorAll('.finder-tab').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      document.querySelectorAll('.finder-tab').forEach(b=>b.classList.remove('active'));
      document.querySelectorAll('.finder-panel').forEach(p=>p.classList.remove('active'));
      btn.classList.add('active');
      document.querySelector('.finder-panel[data-panel="'+btn.dataset.tab+'"]').classList.add('active');
    });
  });

  // Scroll reveal
  const io = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); } });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el=> io.observe(el));
</script>
