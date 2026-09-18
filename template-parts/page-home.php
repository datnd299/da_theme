<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Clixframe — Turn Attention Into Growth</title>
<meta name="description" content="Clixframe combines performance marketing, advertising and digital operations into one connected growth system.">
<style>
:root{
  --void:#070807;--carbon:#101210;--graphite:#181b18;--cloud:#f3f5ef;--paper:#fafbf7;
  --lime:#c8ff3d;--blue:#5c7cff;--violet:#9b72ff;--cyan:#57e8ff;
  --white:#f5f6f1;--muted:#a4aaa2;--dark:#111310;--dark2:#555b54;
  --line:rgba(255,255,255,.11);--container:1360px;--r:18px
}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--void);color:var(--white);font-family:Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;overflow-x:hidden}
a{color:inherit;text-decoration:none}button{font:inherit}.container{width:min(calc(100% - 48px),var(--container));margin:auto}
.header{position:fixed;z-index:50;top:0;left:0;right:0;height:78px;display:flex;align-items:center;border-bottom:1px solid transparent;transition:.25s}
.header.scrolled{background:rgba(7,8,7,.78);backdrop-filter:blur(18px);border-color:var(--line)}
.header-inner{width:min(calc(100% - 48px),var(--container));margin:auto;display:flex;align-items:center;gap:36px}
.logo{font-weight:800;letter-spacing:-.055em;font-size:22px}.logo b{color:var(--lime)}
.nav{display:flex;gap:28px;margin-left:auto;font-size:14px;color:#d7dbd4}.nav a:hover{color:var(--lime)}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;min-height:48px;padding:0 22px;border:1px solid var(--line);border-radius:12px;font-weight:700;font-size:14px;transition:.2s}
.btn:hover{transform:translateY(-2px)}.btn.primary{background:var(--lime);color:#090a08;border-color:var(--lime)}.btn.ghost{background:rgba(255,255,255,.03)}
.menu{display:none;background:none;color:white;border:0}
.eyebrow{display:flex;align-items:center;gap:10px;font-size:11px;letter-spacing:.12em;font-weight:700;color:var(--muted);text-transform:uppercase}.dot{width:7px;height:7px;border-radius:50%;background:var(--lime);box-shadow:0 0 18px var(--lime);animation:pulse 1.8s infinite}
@keyframes pulse{50%{opacity:.35}}
.hero{min-height:100svh;position:relative;display:flex;align-items:center;padding:128px 0 70px;overflow:hidden}
#signalCanvas{position:absolute;inset:0;width:100%;height:100%;opacity:.8}
.grid{position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.035) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.035) 1px,transparent 1px);background-size:54px 54px;mask-image:linear-gradient(to bottom,black,transparent 90%)}
.glow{position:absolute;width:650px;height:650px;border-radius:50%;right:-160px;top:12%;background:radial-gradient(circle,rgba(200,255,61,.12),transparent 67%);filter:blur(20px)}
.hero-inner{position:relative;z-index:2;display:grid;grid-template-columns:1.02fr .98fr;gap:70px;align-items:center}
.hero h1{font-size:clamp(58px,6.5vw,106px);line-height:.9;letter-spacing:-.065em;margin:22px 0 28px;font-weight:650}.hero h1 em{font-style:normal;color:var(--lime)}
.lead{max-width:610px;color:#b8bdb5;font-size:18px;line-height:1.6}.actions{display:flex;gap:12px;margin-top:32px}
.interface,.scene,.dashboard{border:1px solid var(--line);border-radius:22px;background:linear-gradient(145deg,rgba(255,255,255,.075),rgba(255,255,255,.025));box-shadow:0 35px 90px rgba(0,0,0,.35);backdrop-filter:blur(14px)}
.interface{padding:18px;transform:perspective(1100px) rotateY(-4deg) rotateX(2deg)}
.bar{display:flex;justify-content:space-between;align-items:center;padding:6px 2px 18px;font-size:11px;letter-spacing:.08em;color:var(--muted)}.status{color:var(--lime)}
.platforms{display:flex;gap:8px;flex-wrap:wrap}.pill{padding:8px 11px;border:1px solid var(--line);border-radius:999px;font-size:10px}.pill.on{border-color:rgba(200,255,61,.35);color:var(--lime)}
.metrics{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin:16px 0}.metric{padding:17px;border:1px solid var(--line);border-radius:14px;background:rgba(0,0,0,.18)}.metric small{display:block;color:var(--muted);font-size:10px}.metric strong{display:block;font-size:25px;margin:7px 0}.metric span{font-size:11px;color:var(--lime)}
.chart{height:170px;display:flex;align-items:end;gap:8px;padding:18px;border:1px solid var(--line);border-radius:14px}.chart i{flex:1;height:var(--h);background:linear-gradient(to top,rgba(200,255,61,.16),var(--lime));border-radius:5px 5px 1px 1px;animation:bars 1.2s both;transform-origin:bottom}
@keyframes bars{from{transform:scaleY(.08);opacity:.2}}
.demo{display:block;margin-top:10px;color:#6f756e;font-size:9px;text-align:right}
.section{padding:150px 0}.intro{max-width:970px;margin-bottom:70px}.intro h2{font-size:clamp(42px,5vw,76px);line-height:1;letter-spacing:-.05em;font-weight:450;margin:18px 0}.intro h2 strong{font-weight:650}
.engine-stage{position:relative;min-height:650px;border:1px solid var(--line);border-radius:28px;overflow:hidden;background:radial-gradient(circle at 50% 45%,rgba(200,255,61,.08),transparent 35%),#0a0b0a}
.engine-core{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:230px;height:230px;border:1px solid rgba(200,255,61,.3);border-radius:50%;display:grid;place-items:center;text-align:center;box-shadow:0 0 90px rgba(200,255,61,.08)}
.engine-core b{font-size:24px;letter-spacing:-.05em}.engine-core b span{color:var(--lime)}.engine-core small{display:block;color:var(--muted);font-size:9px;letter-spacing:.12em;margin-top:5px}
.float{position:absolute;width:260px;padding:18px;border:1px solid var(--line);border-radius:16px;background:rgba(16,18,16,.9);transition:.25s}.float:hover{transform:translateY(-5px);border-color:rgba(200,255,61,.35)}.float small{color:var(--muted);font-size:9px;letter-spacing:.1em}.float strong{display:block;font-size:22px;margin:8px 0}.float p{margin:0;color:var(--muted);font-size:12px;line-height:1.5}.f1{left:7%;top:12%}.f2{right:7%;top:15%}.f3{left:10%;bottom:11%}.f4{right:9%;bottom:10%}
.band{overflow:hidden;background:var(--lime);color:#090a08;padding:18px 0}.track{display:flex;width:max-content;gap:35px;align-items:center;font-size:18px;font-weight:800;letter-spacing:-.02em;animation:marquee 22s linear infinite}.track i{font-style:normal;font-weight:400}
@keyframes marquee{to{transform:translateX(-50%)}}
.process{background:var(--paper);color:var(--dark)}.process .eyebrow{color:#666c65}.process-grid{display:grid;grid-template-columns:280px 1fr;gap:70px}.process-nav{position:sticky;top:120px;height:max-content;display:flex;flex-direction:column;border-top:1px solid rgba(0,0,0,.14)}.process-nav a{padding:19px 0;border-bottom:1px solid rgba(0,0,0,.14);font-size:17px;color:#777d76}.process-nav a.active{color:var(--dark);font-weight:700}.process-nav span{display:inline-block;width:38px;font-size:10px;color:#90958f}
.step{min-height:82vh;padding:0 0 100px}.step h3{font-size:clamp(38px,4vw,62px);letter-spacing:-.045em;line-height:1;margin:0 0 18px}.step>p{max-width:650px;color:var(--dark2);line-height:1.6;margin-bottom:36px}.scene{background:#101210;color:var(--white);padding:26px;min-height:400px;display:grid;align-content:center}
.flow{display:flex;align-items:center;justify-content:center;gap:12px;flex-wrap:wrap}.flow div{min-width:125px;padding:22px;border:1px solid var(--line);border-radius:14px}.flow div.active{border-color:var(--lime);box-shadow:0 0 30px rgba(200,255,61,.08)}.flow small{display:block;color:#7c837b}.flow strong{font-size:16px}.flow>span{color:var(--lime)}
.inbox{max-width:720px;margin:auto;width:100%}.message{display:flex;align-items:center;gap:14px;padding:16px 0;border-bottom:1px solid var(--line)}.message i{width:8px;height:8px;border-radius:50%;background:var(--lime)}.message div{flex:1}.message small{display:block;color:var(--muted);margin-top:4px}.message>span{font-size:9px;color:var(--lime)}
.scale-ui{text-align:center}.winner{display:inline-block;padding:24px 32px;border:1px solid rgba(200,255,61,.35);border-radius:16px}.winner small{display:block;color:var(--muted)}.winner strong{display:block;font-size:28px;margin:8px}.out{display:flex;justify-content:center;gap:8px;flex-wrap:wrap;margin-top:35px}.out span{padding:10px 14px;border:1px solid var(--line);border-radius:999px;font-size:11px}
.journey{background:var(--cloud);color:var(--dark);padding:140px 0}.journey h2{font-size:clamp(48px,6vw,92px);letter-spacing:-.06em;line-height:.92;margin:20px 0 70px}.journey h2 em{font-style:normal;color:#6f8d18}.journey-track{display:flex;align-items:center;gap:10px;overflow-x:auto;padding-bottom:20px}.journey-track div{white-space:nowrap;border:1px solid rgba(0,0,0,.16);padding:16px 18px;border-radius:12px;font-weight:700;font-size:12px}.journey-track .active{background:var(--lime)}.journey-track span{color:#8a9088}.journey-copy{max-width:700px;font-size:18px;line-height:1.6;color:var(--dark2);margin-top:35px}
.dashboard{padding:28px}.dash-top{display:flex;justify-content:space-between;gap:20px;align-items:center}.dash-top h3{font-size:26px;margin:7px 0}.filters{display:flex;gap:6px}.filters button{border:1px solid var(--line);background:transparent;color:var(--muted);border-radius:999px;padding:8px 12px;font-size:9px}.filters .active{background:var(--lime);color:#090a08;border-color:var(--lime)}
.dash-metrics{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin:26px 0}.dash-metrics div{padding:20px;border:1px solid var(--line);border-radius:14px}.dash-metrics small{display:block;color:var(--muted)}.dash-metrics strong{display:block;font-size:28px;margin:8px 0}.dash-metrics span{font-size:11px;color:var(--lime)}
.big-chart{height:280px;border:1px solid var(--line);border-radius:16px;padding:22px;display:flex;align-items:end;gap:8px}.big-chart i{flex:1;height:var(--h);background:linear-gradient(to top,rgba(92,124,255,.05),rgba(200,255,61,.9));border-radius:4px 4px 0 0}
.ecosystem{background:var(--paper);color:var(--dark)}.network{display:grid;grid-template-columns:1fr 260px 1fr;gap:40px;align-items:center}.nodes{display:grid;gap:10px}.nodes span{border:1px solid rgba(0,0,0,.13);border-radius:13px;padding:17px;text-align:center;font-size:12px;font-weight:700}.core{aspect-ratio:1;border-radius:50%;background:var(--dark);color:white;display:grid;place-items:center;text-align:center;box-shadow:0 30px 80px rgba(0,0,0,.16)}.core strong{font-size:28px;letter-spacing:-.05em}.core strong b{color:var(--lime)}.core small{display:block;color:var(--muted);font-size:9px;margin-bottom:7px}
.final{position:relative;padding:170px 0 110px;text-align:center;overflow:hidden}.final:before{content:"X";position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);font-size:min(62vw,850px);font-weight:900;color:rgba(200,255,61,.025);line-height:1}.final .container{position:relative}.final .eyebrow{justify-content:center}.final h2{font-size:clamp(55px,7vw,110px);line-height:.88;letter-spacing:-.065em;margin:24px 0}.final h2 em{font-style:normal;color:var(--lime)}.final p{max-width:600px;margin:0 auto 35px;color:var(--muted);font-size:18px;line-height:1.6}
.footer{border-top:1px solid var(--line);padding:70px 0 28px}.footer-top{display:grid;grid-template-columns:1fr 1fr;gap:50px}.footer-brand{font-size:clamp(50px,8vw,115px);font-weight:800;letter-spacing:-.07em}.footer-links{display:grid;grid-template-columns:repeat(3,1fr);gap:25px}.footer-links small{display:block;color:#717770;font-size:9px;margin-bottom:15px}.footer-links a,.footer-links span{display:block;margin:10px 0;color:#c3c7c1;font-size:13px}.footer-bottom{display:flex;justify-content:space-between;gap:20px;margin-top:60px;padding-top:22px;border-top:1px solid var(--line);font-size:10px;color:#737972}
@media(max-width:900px){
 .container,.header-inner{width:min(calc(100% - 32px),var(--container))}.nav,.header .btn{display:none}.menu{display:block;margin-left:auto}
 .hero-inner{grid-template-columns:1fr}.hero-interface{max-width:650px}.hero h1{font-size:clamp(52px,14vw,80px)}
 .section{padding:100px 0}.engine-stage{min-height:780px}.float{width:42%}.f1{left:5%;top:7%}.f2{right:5%;top:10%}.f3{left:5%;bottom:8%}.f4{right:5%;bottom:5%}
 .process-grid{grid-template-columns:1fr}.process-nav{position:relative;top:auto;flex-direction:row;overflow:auto}.process-nav a{min-width:150px}
 .step{min-height:auto;padding-bottom:90px}.dash-metrics{grid-template-columns:1fr 1fr}.network{grid-template-columns:1fr}.core{width:220px;margin:auto}.footer-top{grid-template-columns:1fr}
}
@media(max-width:600px){
 .metrics{grid-template-columns:1fr 1fr}.metric:last-child{grid-column:1/-1}.actions{flex-direction:column;align-items:stretch}
 .engine-stage{display:grid;gap:12px;padding:14px;min-height:auto}.engine-core,.float{position:relative;inset:auto;transform:none;width:100%}.engine-core{height:180px;border-radius:20px}
 .dash-top{align-items:flex-start;flex-direction:column}.filters{overflow:auto;width:100%}.dash-metrics{grid-template-columns:1fr}.big-chart{height:210px}
 .footer-links{grid-template-columns:1fr 1fr}.footer-bottom{flex-direction:column}
}
@media(prefers-reduced-motion:reduce){*{scroll-behavior:auto!important;animation:none!important;transition:none!important}}
</style>
</head>
<body>
<header class="header" id="header">
  <div class="header-inner">
    <a class="logo" href="#">CLI<b>X</b>FRAME</a>
    <nav class="nav"><a href="#engine">Services</a><a href="#how">How We Grow</a><a href="#performance">Work</a><a href="#ecosystem">About</a></nav>
    <a class="btn primary" href="#contact">Start Growing ↗</a>
    <button class="menu">Menu</button>
  </div>
</header>

<main>
<section class="hero">
  <canvas id="signalCanvas"></canvas><div class="grid"></div><div class="glow"></div>
  <div class="container hero-inner">
    <div>
      <div class="eyebrow"><span class="dot"></span>DIGITAL GROWTH, BUILT FOR PERFORMANCE</div>
      <h1>WE TURN ATTENTION<br>INTO <em>GROWTH.</em></h1>
      <p class="lead">Advertising, marketing and digital operations built to accelerate businesses across Meta, Google, TikTok and beyond.</p>
      <div class="actions"><a class="btn primary" href="#contact">Start Growing ↗</a><a class="btn ghost" href="#engine">Explore Clixframe</a></div>
    </div>
    <div class="interface">
      <div class="bar"><b>CLIXFRAME / GROWTH ENGINE</b><span class="status">● SYSTEM ACTIVE</span></div>
      <div class="platforms"><span class="pill on">META</span><span class="pill on">GOOGLE</span><span class="pill on">TIKTOK</span><span class="pill">INSTAGRAM</span></div>
      <div class="metrics">
        <div class="metric"><small>Revenue</small><strong>$128.4K</strong><span>↑ 24.8%</span></div>
        <div class="metric"><small>ROAS</small><strong>4.82x</strong><span>↑ 18.2%</span></div>
        <div class="metric"><small>Customers</small><strong>3,284</strong><span>↑ 12.4%</span></div>
      </div>
      <div class="chart"><i style="--h:25%"></i><i style="--h:34%"></i><i style="--h:31%"></i><i style="--h:46%"></i><i style="--h:43%"></i><i style="--h:58%"></i><i style="--h:54%"></i><i style="--h:68%"></i><i style="--h:63%"></i><i style="--h:82%"></i><i style="--h:76%"></i><i style="--h:94%"></i></div>
      <small class="demo">ILLUSTRATIVE UI / DEMO DATA</small>
    </div>
  </div>
</section>

<section class="section" id="engine">
  <div class="container">
    <header class="intro"><div class="eyebrow">ONE CONNECTED GROWTH SYSTEM</div><h2><strong>Everything your business needs</strong> to move faster.</h2></header>
    <div class="engine-stage">
      <div class="engine-core"><div><b>CLI<span>X</span>FRAME</b><small>GROWTH ENGINE / ACTIVE</small></div></div>
      <article class="float f1"><small>PAID MEDIA</small><strong>Campaign Control</strong><p>Meta · Google · TikTok<br>Acquisition systems running together.</p></article>
      <article class="float f2"><small>INTELLIGENCE</small><strong>4.82x ROAS</strong><p>Performance signals surface what deserves more budget.</p></article>
      <article class="float f3"><small>CUSTOMER PIPELINE</small><strong>284 → 67</strong><p>Lead → conversation → customer.</p></article>
      <article class="float f4"><small>OPERATIONS</small><strong>Always moving.</strong><p>Campaigns, channels and customer care stay connected.</p></article>
    </div>
  </div>
</section>

<section class="band"><div class="track">
  <span>META</span><i>×</i><span>GOOGLE</span><i>×</i><span>TIKTOK</span><i>×</i><span>INSTAGRAM</span><i>×</i><span>YOUTUBE</span><i>×</i>
  <span>META</span><i>×</i><span>GOOGLE</span><i>×</i><span>TIKTOK</span><i>×</i><span>INSTAGRAM</span><i>×</i><span>YOUTUBE</span><i>×</i>
</div></section>

<section class="section process" id="how">
  <div class="container">
    <header class="intro"><div class="eyebrow">HOW CLIXFRAME WORKS</div><h2><strong>One connected system</strong> from first click to lasting growth.</h2></header>
    <div class="process-grid">
      <nav class="process-nav" id="processNav"><a href="#attract" class="active"><span>01</span>Attract</a><a href="#convert"><span>02</span>Convert</a><a href="#operate"><span>03</span>Operate</a><a href="#scale"><span>04</span>Scale</a></nav>
      <div>
        <article class="step" id="attract"><h3>Get the right attention.</h3><p>Reach high-intent audiences through performance advertising, creative and digital marketing.</p><div class="scene"><div class="bar"><b>CAMPAIGN BUILDER</b><span class="status">● ACTIVE</span></div><div class="platforms"><span class="pill on">META</span><span class="pill on">GOOGLE</span><span class="pill on">TIKTOK</span></div><div class="metrics"><div class="metric"><small>Objective</small><strong>Acquire</strong><span>LIVE</span></div><div class="metric"><small>Audience</small><strong>High intent</strong><span>READY</span></div><div class="metric"><small>Creative</small><strong>12 ads</strong><span>TESTING</span></div></div></div></article>
        <article class="step" id="convert"><h3>Turn attention into customers.</h3><p>Optimize the journey between every click, lead, conversation and conversion.</p><div class="scene"><div class="flow"><div><small>01</small><strong>AD</strong></div><span>→</span><div><small>02</small><strong>CLICK</strong></div><span>→</span><div><small>03</small><strong>LEAD</strong></div><span>→</span><div class="active"><small>04</small><strong>CUSTOMER</strong></div></div></div></article>
        <article class="step" id="operate"><h3>Keep every touchpoint moving.</h3><p>Connect campaigns, channels, leads and customer care into one continuous operation.</p><div class="scene"><div class="inbox"><div class="bar"><b>CUSTOMER OPERATIONS</b><span class="status">24 ACTIVE</span></div><div class="message"><i></i><div><strong>New Lead</strong><small>Meta campaign · just now</small></div><span>NEW</span></div><div class="message"><i></i><div><strong>Customer Follow-up</strong><small>Conversation active</small></div><span>OPEN</span></div><div class="message"><i></i><div><strong>Purchase Completed</strong><small>Customer journey</small></div><span>DONE</span></div></div></div></article>
        <article class="step" id="scale"><h3>Find what works. Push it further.</h3><p>Turn winning campaigns and customer signals into repeatable growth across channels.</p><div class="scene scale-ui"><div><div class="winner"><small>WINNING CAMPAIGN</small><strong>Creative / 04</strong><span class="status">4.82x ROAS</span></div><div class="out"><span>META</span><span>GOOGLE</span><span>TIKTOK</span><span>INSTAGRAM</span></div></div></div></article>
      </div>
    </div>
  </div>
</section>

<section class="journey">
  <div class="container">
    <div class="eyebrow">BEYOND ACQUISITION</div>
    <h2>FROM FIRST CLICK<br>TO <em>LASTING CUSTOMER.</em></h2>
    <div class="journey-track"><div>ATTENTION</div><span>→</span><div>CLICK</div><span>→</span><div>LEAD</div><span>→</span><div>CONVERSATION</div><span>→</span><div>CUSTOMER</div><span>→</span><div>RETENTION</div><span>→</span><div class="active">REVENUE</div></div>
    <p class="journey-copy">Clixframe doesn't stop at acquisition. We connect marketing, conversion, operations and customer care into one continuous growth system.</p>
  </div>
</section>

<section class="section" id="performance">
  <div class="container">
    <header class="intro"><div class="eyebrow">PERFORMANCE INTELLIGENCE</div><h2><strong>NO GUESSWORK.</strong><br>JUST SIGNALS THAT DRIVE GROWTH.</h2></header>
    <div class="dashboard">
      <div class="dash-top"><div><small>PERFORMANCE OVERVIEW</small><h3>Growth Dashboard</h3></div><div class="filters"><button class="active">ALL</button><button>META</button><button>GOOGLE</button><button>TIKTOK</button></div></div>
      <div class="dash-metrics"><div><small>Revenue</small><strong>$128.4K</strong><span>+24.8%</span></div><div><small>ROAS</small><strong>4.82x</strong><span>+18.2%</span></div><div><small>CPA</small><strong>$18.40</strong><span>−12.6%</span></div><div><small>Customers</small><strong>3,284</strong><span>+21.4%</span></div></div>
      <div class="big-chart"><i style="--h:25%"></i><i style="--h:35%"></i><i style="--h:32%"></i><i style="--h:46%"></i><i style="--h:42%"></i><i style="--h:58%"></i><i style="--h:55%"></i><i style="--h:70%"></i><i style="--h:64%"></i><i style="--h:78%"></i><i style="--h:73%"></i><i style="--h:90%"></i><i style="--h:84%"></i><i style="--h:98%"></i></div>
      <small class="demo">DEMO DATA FOR INTERFACE VISUALIZATION</small>
    </div>
  </div>
</section>

<section class="section ecosystem" id="ecosystem">
  <div class="container">
    <header class="intro"><div class="eyebrow">CONNECTED ECOSYSTEM</div><h2><strong>EVERY CHANNEL.</strong><br>ONE GROWTH SYSTEM.</h2></header>
    <div class="network"><div class="nodes"><span>META</span><span>GOOGLE</span><span>TIKTOK</span><span>INSTAGRAM</span><span>YOUTUBE</span></div><div class="core"><div><small>GROWTH ENGINE</small><strong>CLI<b>X</b>FRAME</strong></div></div><div class="nodes"><span>MARKETING</span><span>CONVERSION</span><span>OPERATIONS</span><span>CUSTOMER CARE</span><span>ANALYTICS</span></div></div>
  </div>
</section>

<section class="final" id="contact">
  <div class="container"><div class="eyebrow"><span class="dot"></span>READY FOR WHAT'S NEXT?</div><h2>YOUR NEXT STAGE<br>OF <em>GROWTH</em><br>STARTS HERE.</h2><p>Advertising is only the beginning. Build a connected digital growth system with Clixframe.</p><a class="btn primary" href="mailto:hello@clixframe.com">Start Growing ↗</a></div>
</section>
</main>

<footer class="footer">
  <div class="container">
    <div class="footer-top"><div class="footer-brand">CLIXFRAME</div><div class="footer-links"><div><small>EXPLORE</small><a href="#engine">Services</a><a href="#how">How We Grow</a><a href="#performance">Work</a></div><div><small>PLATFORMS</small><span>Meta</span><span>Google</span><span>TikTok</span><span>Instagram</span></div><div><small>CONNECT</small><a href="#contact">Start Growing ↗</a><a href="mailto:hello@clixframe.com">Contact</a></div></div></div>
    <div class="footer-bottom"><span>© 2026 CLIXFRAME</span><span>Privacy · Terms</span><span>TURN ATTENTION INTO GROWTH.</span></div>
  </div>
</footer>

<script>
const header=document.getElementById('header');
addEventListener('scroll',()=>header.classList.toggle('scrolled',scrollY>24));

const sections=[...document.querySelectorAll('.step')],links=[...document.querySelectorAll('.process-nav a')];
const obs=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting){links.forEach(a=>a.classList.toggle('active',a.getAttribute('href')==='#'+e.target.id))}}),{rootMargin:'-35% 0px -55% 0px'});
sections.forEach(s=>obs.observe(s));

const c=document.getElementById('signalCanvas'),ctx=c.getContext('2d');let pts=[],mx=innerWidth*.72,my=innerHeight*.42;
function resize(){const d=Math.min(devicePixelRatio||1,2);c.width=innerWidth*d;c.height=innerHeight*d;c.style.width=innerWidth+'px';c.style.height=innerHeight+'px';ctx.setTransform(d,0,0,d,0,0);pts=Array.from({length:55},()=>({x:Math.random()*innerWidth,y:Math.random()*innerHeight,vx:(Math.random()-.5)*.18,vy:(Math.random()-.5)*.18}))}
addEventListener('resize',resize);addEventListener('pointermove',e=>{mx=e.clientX;my=e.clientY});resize();
function draw(){ctx.clearRect(0,0,innerWidth,innerHeight);for(const p of pts){p.x+=p.vx;p.y+=p.vy;if(p.x<0||p.x>innerWidth)p.vx*=-1;if(p.y<0||p.y>innerHeight)p.vy*=-1;const dx=mx-p.x,dy=my-p.y,d=Math.hypot(dx,dy);if(d<190){ctx.strokeStyle=`rgba(200,255,61,${(1-d/190)*.16})`;ctx.beginPath();ctx.moveTo(p.x,p.y);ctx.lineTo(mx,my);ctx.stroke()}ctx.fillStyle='rgba(245,246,241,.35)';ctx.beginPath();ctx.arc(p.x,p.y,1.1,0,Math.PI*2);ctx.fill()}requestAnimationFrame(draw)}
if(!matchMedia('(prefers-reduced-motion: reduce)').matches)draw();
</script>
</body>
</html>