<?php
/**
 * Homepage content for Clixframe.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;
?>

<style>
.eyebrow { display: flex; align-items: center; gap: 10px; font-size: 11px; letter-spacing: .12em; font-weight: 700; color: var(--muted); text-transform: uppercase; }
.dot { width: 7px; height: 7px; border-radius: 50%; background: var(--lime); box-shadow: 0 0 18px var(--lime); animation: pulse 1.8s infinite; }
@keyframes pulse { 50% { opacity: .35; } }
.hero { min-height: 100svh; position: relative; display: flex; align-items: center; padding: 128px 0 70px; overflow: hidden; }
#signalCanvas, #heroCursorCanvas { position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; }
#signalCanvas { opacity: .8; }
#heroCursorCanvas { z-index: 1; opacity: .95; mix-blend-mode: screen; }
.grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.035) 1px, transparent 1px); background-size: 54px 54px; mask-image: linear-gradient(to bottom, black, transparent 90%); }
.glow { position: absolute; width: 650px; height: 650px; border-radius: 50%; right: -160px; top: 12%; background: radial-gradient(circle, rgba(200,255,61,.12), transparent 67%); filter: blur(20px); }
.hero-inner { position: relative; z-index: 2; display: grid; grid-template-columns: 1.02fr .98fr; gap: 70px; align-items: center; }
.hero-inner > *, .interface, .dashboard, .scene { min-width: 0; }
.hero h1 { font-size: clamp(50px, 5.6vw, 88px); line-height: .92; letter-spacing: -.06em; margin: 22px 0 28px; font-weight: 650; }
.hero h1 em { font-style: normal; color: var(--lime); }
.lead { max-width: 610px; color: #b8bdb5; font-size: 18px; line-height: 1.6; }
.actions { display: flex; gap: 12px; margin-top: 32px; }
.interface, .scene, .dashboard { border: 1px solid var(--line); border-radius: 22px; background: linear-gradient(145deg, rgba(255,255,255,.075), rgba(255,255,255,.025)); box-shadow: 0 35px 90px rgba(0,0,0,.35); backdrop-filter: blur(14px); }
.interface { padding: 18px; transform: perspective(1100px) rotateY(-4deg) rotateX(2deg); }
.bar { display: flex; justify-content: space-between; align-items: center; padding: 6px 2px 18px; font-size: 11px; letter-spacing: .08em; color: var(--muted); }
.status { color: var(--lime); }
.platforms { display: flex; gap: 8px; flex-wrap: wrap; }
.pill { padding: 8px 11px; border: 1px solid var(--line); border-radius: 999px; font-size: 10px; }
.pill.on { border-color: rgba(200,255,61,.35); color: var(--lime); }
.metrics { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin: 16px 0; }
.metric { padding: 17px; border: 1px solid var(--line); border-radius: 14px; background: rgba(0,0,0,.18); }
.metric small { display: block; color: var(--muted); font-size: 10px; }
.metric strong { display: block; font-size: 25px; margin: 7px 0; }
.metric span { font-size: 11px; color: var(--lime); }
.chart { height: 170px; display: flex; align-items: end; gap: 8px; padding: 18px; border: 1px solid var(--line); border-radius: 14px; }
.chart i { flex: 1; height: var(--h); background: linear-gradient(to top, rgba(200,255,61,.16), var(--lime)); border-radius: 5px 5px 1px 1px; animation: bars 1.2s both; transform-origin: bottom; }
@keyframes bars { from { transform: scaleY(.08); opacity: .2; } }
.demo { display: block; margin-top: 10px; color: #6f756e; font-size: 9px; text-align: right; }
.section { padding: 150px 0; }
.intro { max-width: 970px; margin-bottom: 70px; }
.intro h2 { font-size: clamp(36px, 4.4vw, 64px); line-height: 1; letter-spacing: -.05em; font-weight: 450; margin: 18px 0; }
.intro h2 strong { font-weight: 650; }
.engine-stage { position: relative; isolation: isolate; min-height: 650px; border: 1px solid var(--line); border-radius: 28px; overflow: hidden; background: radial-gradient(circle at 50% 45%, rgba(200,255,61,.08), transparent 35%), #0a0b0a; transition: border-color .35s ease, box-shadow .35s ease; }
.engine-stage:before { content: ""; position: absolute; inset: -1px; z-index: -1; background: radial-gradient(circle at 50% 48%, rgba(200,255,61,.16), transparent 34%), linear-gradient(115deg, transparent 15%, rgba(200,255,61,.08), transparent 44%); opacity: 0; transition: opacity .35s ease; }
.engine-stage:after { content: ""; position: absolute; inset: 0; pointer-events: none; background-image: linear-gradient(rgba(200,255,61,.05) 1px, transparent 1px), linear-gradient(90deg, rgba(200,255,61,.05) 1px, transparent 1px); background-size: 46px 46px; mask-image: radial-gradient(circle at 50% 50%, black, transparent 70%); opacity: 0; transition: opacity .35s ease; }
.engine-stage:hover, .engine-stage:focus-within { border-color: rgba(200,255,61,.32); box-shadow: inset 0 0 45px rgba(200,255,61,.045), 0 0 70px rgba(200,255,61,.06); }
.engine-stage:hover:before, .engine-stage:hover:after, .engine-stage:focus-within:before, .engine-stage:focus-within:after { opacity: 1; }
.engine-core { position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); width: 230px; height: 230px; border: 1px solid rgba(200,255,61,.3); border-radius: 50%; display: grid; place-items: center; text-align: center; box-shadow: 0 0 90px rgba(200,255,61,.08); transition: border-color .35s ease, box-shadow .35s ease, transform .35s ease; }
.engine-core:before { content: ""; position: absolute; inset: -18px; border-radius: inherit; border: 1px solid rgba(200,255,61,.08); opacity: 0; transform: scale(.92); transition: opacity .35s ease, transform .35s ease; }
.engine-stage:hover .engine-core, .engine-stage:focus-within .engine-core { border-color: rgba(200,255,61,.72); box-shadow: 0 0 28px rgba(200,255,61,.26), 0 0 120px rgba(200,255,61,.18); transform: translate(-50%, -50%) scale(1.035); }
.engine-stage:hover .engine-core:before, .engine-stage:focus-within .engine-core:before { opacity: 1; transform: scale(1); }
.engine-core b { font-size: 24px; letter-spacing: -.05em; }
.engine-core b span { color: var(--lime); }
.engine-core small { display: block; color: var(--muted); font-size: 9px; letter-spacing: .12em; margin-top: 5px; }
.float { position: absolute; width: 260px; padding: 18px; border: 1px solid var(--line); border-radius: 16px; overflow: hidden; background: linear-gradient(145deg, rgba(20,23,20,.94), rgba(10,12,10,.9)); transition: transform .28s ease, border-color .28s ease, box-shadow .28s ease, background .28s ease; }
.float:before { content: ""; position: absolute; inset: 0; pointer-events: none; background: radial-gradient(circle at 18% 18%, rgba(200,255,61,.22), transparent 36%), linear-gradient(115deg, transparent 12%, rgba(200,255,61,.18), transparent 32%); opacity: 0; transform: translateX(-18%); transition: opacity .28s ease, transform .45s ease; }
.float:after { content: ""; position: absolute; left: 18px; right: 18px; top: 0; height: 1px; background: linear-gradient(90deg, transparent, rgba(200,255,61,.72), transparent); opacity: 0; transition: opacity .28s ease; }
.float:hover, .float:focus-within { transform: translateY(-8px) scale(1.025); border-color: rgba(200,255,61,.65); box-shadow: 0 0 22px rgba(200,255,61,.18), 0 24px 58px rgba(0,0,0,.34); background: linear-gradient(145deg, rgba(28,33,24,.98), rgba(11,14,10,.94)); }
.float:hover:before, .float:focus-within:before { opacity: 1; transform: translateX(0); }
.float:hover:after, .float:focus-within:after { opacity: 1; }
.float > * { position: relative; z-index: 1; }
.float:hover small, .float:focus-within small { color: rgba(200,255,61,.82); }
.float:hover strong, .float:focus-within strong { text-shadow: 0 0 18px rgba(200,255,61,.28); }
.float small { color: var(--muted); font-size: 9px; letter-spacing: .1em; }
.float strong { display: block; font-size: 22px; margin: 8px 0; }
.float p { margin: 0; color: var(--muted); font-size: 12px; line-height: 1.5; }
.f1 { left: 7%; top: 12%; } .f2 { right: 7%; top: 15%; } .f3 { left: 10%; bottom: 11%; } .f4 { right: 9%; bottom: 10%; }
.band { overflow: hidden; background: var(--lime); color: #090a08; padding: 18px 0; }
.track { display: flex; width: max-content; gap: 35px; align-items: center; font-size: 18px; font-weight: 800; letter-spacing: -.02em; white-space: nowrap; animation: marquee 22s linear infinite; }
.track i { font-style: normal; font-weight: 400; }
@keyframes marquee { to { transform: translateX(-50%); } }
.process { background: var(--paper); color: var(--dark); }
.process .eyebrow { color: #666c65; }
.process-grid { display: grid; grid-template-columns: 280px 1fr; gap: 70px; }
.process-nav { position: sticky; top: 120px; height: max-content; display: flex; flex-direction: column; border-top: 1px solid rgba(0,0,0,.14); }
.process-nav a { padding: 19px 0; border-bottom: 1px solid rgba(0,0,0,.14); font-size: 17px; color: #777d76; }
.process-nav a.active { color: var(--dark); font-weight: 700; }
.process-nav span { display: inline-block; width: 38px; font-size: 10px; color: #90958f; }
.step { min-height: 70vh; padding: 0 0 74px; }
.step h3 { font-size: clamp(34px, 3.5vw, 54px); letter-spacing: -.045em; line-height: 1; margin: 0 0 18px; }
.step > p { max-width: 650px; color: var(--dark2); line-height: 1.6; margin-bottom: 30px; }
.scene { --mx: 50%; --my: 50%; position: relative; isolation: isolate; overflow: hidden; background: #101210; color: var(--white); padding: 26px; min-height: 318px; display: grid; align-content: center; transition: border-color .28s ease, box-shadow .28s ease; }
.scene:before { content: ""; position: absolute; inset: 0; z-index: -1; background: radial-gradient(circle at var(--mx) var(--my), rgba(200,255,61,.24), rgba(75,255,176,.08) 24%, transparent 46%); opacity: 0; transition: opacity .22s ease; }
.scene:after { content: ""; position: absolute; inset: 1px; pointer-events: none; border-radius: inherit; background: radial-gradient(circle at var(--mx) var(--my), rgba(255,255,255,.18), transparent 22%); opacity: 0; transition: opacity .22s ease; }
.scene:hover, .scene:focus-within, .scene.is-touch-hot { border-color: rgba(200,255,61,.34); box-shadow: 0 34px 90px rgba(0,0,0,.36), 0 0 42px rgba(200,255,61,.09); }
.scene:hover:before, .scene:hover:after, .scene:focus-within:before, .scene:focus-within:after, .scene.is-touch-hot:before, .scene.is-touch-hot:after { opacity: 1; }
.scene > * { position: relative; z-index: 1; }
.flow { display: flex; align-items: center; justify-content: center; gap: 12px; flex-wrap: wrap; }
.scene .metric, .flow div, .winner, .message { transition: border-color .24s ease, box-shadow .24s ease, background .24s ease, transform .24s ease; }
.scene:hover .metric, .scene:focus-within .metric, .scene.is-touch-hot .metric, .scene:hover .flow div, .scene:focus-within .flow div, .scene.is-touch-hot .flow div, .scene:hover .winner, .scene:focus-within .winner, .scene.is-touch-hot .winner { border-color: rgba(200,255,61,.2); background: linear-gradient(145deg, rgba(200,255,61,.055), rgba(255,255,255,.018)); }
.scene .metric:hover, .flow div:hover, .winner:hover { transform: translateY(-3px); border-color: rgba(200,255,61,.52); box-shadow: 0 0 26px rgba(200,255,61,.13); }
.flow div { min-width: 125px; padding: 22px; border: 1px solid var(--line); border-radius: 14px; }
.flow div.active { border-color: var(--lime); box-shadow: 0 0 30px rgba(200,255,61,.08); }
.flow small { display: block; color: #7c837b; }
.flow strong { font-size: 16px; }
.flow > span { color: var(--lime); }
.inbox { max-width: 720px; margin: auto; width: 100%; }
.message { display: flex; align-items: center; gap: 14px; padding: 16px 0; border-bottom: 1px solid var(--line); }
.message i { width: 8px; height: 8px; border-radius: 50%; background: var(--lime); }
.message div { flex: 1; }
.message small { display: block; color: var(--muted); margin-top: 4px; }
.message > span { font-size: 9px; color: var(--lime); }
.scale-ui { text-align: center; }
.winner { display: inline-block; padding: 24px 32px; border: 1px solid rgba(200,255,61,.35); border-radius: 16px; }
.winner small { display: block; color: var(--muted); }
.winner strong { display: block; font-size: 28px; margin: 8px; }
.out { display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; margin-top: 35px; }
.out span { padding: 10px 14px; border: 1px solid var(--line); border-radius: 999px; font-size: 11px; }
.journey { background: var(--cloud); color: var(--dark); padding: 140px 0; }
.journey h2 { font-size: clamp(42px, 5vw, 76px); letter-spacing: -.055em; line-height: .94; margin: 20px 0 70px; }
.journey h2 em { font-style: normal; color: #6f8d18; }
.journey-track { display: flex; align-items: center; gap: 10px; max-width: 100%; overflow-x: auto; overscroll-behavior-x: contain; -webkit-overflow-scrolling: touch; padding-bottom: 20px; scroll-snap-type: x proximity; }
.journey-track div { flex: 0 0 auto; white-space: nowrap; border: 1px solid rgba(0,0,0,.16); padding: 16px 18px; border-radius: 12px; font-weight: 700; font-size: 12px; scroll-snap-align: start; }
.journey-track .active { background: var(--lime); }
.journey-track span { flex: 0 0 auto; color: #8a9088; white-space: nowrap; scroll-snap-align: center; }
.journey-copy { max-width: 700px; font-size: 18px; line-height: 1.6; color: var(--dark2); margin-top: 35px; }
.dashboard { padding: 28px; }
.dash-top { display: flex; justify-content: space-between; gap: 20px; align-items: center; }
.dash-top h3 { font-size: 26px; margin: 7px 0; }
.filters { display: flex; gap: 6px; }
.filters button { border: 1px solid var(--line); background: transparent; color: var(--muted); border-radius: 999px; padding: 8px 12px; font-size: 9px; }
.filters .active { background: var(--lime); color: #090a08; border-color: var(--lime); }
.dash-metrics { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin: 26px 0; }
.dash-metrics div { padding: 20px; border: 1px solid var(--line); border-radius: 14px; }
.dash-metrics small { display: block; color: var(--muted); }
.dash-metrics strong { display: block; font-size: 28px; margin: 8px 0; }
.dash-metrics span { font-size: 11px; color: var(--lime); }
.big-chart { height: 280px; border: 1px solid var(--line); border-radius: 16px; padding: 22px; display: flex; align-items: end; gap: 8px; }
.big-chart i { flex: 1; height: var(--h); background: linear-gradient(to top, rgba(92,124,255,.05), rgba(200,255,61,.9)); border-radius: 4px 4px 0 0; }
.ecosystem { background: var(--paper); color: var(--dark); }
.network { display: grid; grid-template-columns: 1fr 260px 1fr; gap: 40px; align-items: center; }
.nodes { display: grid; gap: 10px; }
.nodes span { --accent: var(--lime); position: relative; isolation: isolate; overflow: hidden; border: 1px solid rgba(8,12,10,.14); border-radius: 13px; padding: 18px 20px; text-align: center; font-size: 12px; font-weight: 800; letter-spacing: .03em; background: linear-gradient(135deg, rgba(255,255,255,.88), rgba(247,249,244,.58)); box-shadow: inset 0 1px 0 rgba(255,255,255,.78), 0 16px 34px rgba(10,13,10,.05); transition: transform .22s ease, border-color .22s ease, box-shadow .22s ease, color .22s ease; }
.nodes span:before { content: ""; position: absolute; inset: 0; z-index: -1; background: radial-gradient(circle at 12% 50%, color-mix(in srgb, var(--accent) 28%, transparent), transparent 34%), linear-gradient(90deg, transparent, color-mix(in srgb, var(--accent) 16%, transparent), transparent); opacity: 0; transform: translateX(-18%); transition: opacity .22s ease, transform .38s ease; }
.nodes span:after { content: ""; position: absolute; left: 14px; top: 50%; width: 7px; height: 7px; border-radius: 50%; background: var(--accent); box-shadow: 0 0 18px var(--accent); transform: translateY(-50%) scale(.72); opacity: .45; transition: transform .22s ease, opacity .22s ease; }
.nodes span:hover { transform: translateY(-4px); border-color: color-mix(in srgb, var(--accent) 54%, rgba(0,0,0,.12)); color: #070907; box-shadow: inset 0 1px 0 rgba(255,255,255,.9), 0 20px 42px color-mix(in srgb, var(--accent) 18%, transparent); }
.nodes span:hover:before { opacity: 1; transform: translateX(0); }
.nodes span:hover:after { transform: translateY(-50%) scale(1); opacity: 1; }
.nodes span:nth-child(2) { --accent: #6ea8ff; }
.nodes span:nth-child(3) { --accent: #ff5fb8; }
.nodes span:nth-child(4) { --accent: #8d6bff; }
.nodes span:nth-child(5) { --accent: #ff4646; }
.core { aspect-ratio: 1; border-radius: 50%; background: var(--dark); color: white; display: grid; place-items: center; text-align: center; box-shadow: 0 30px 80px rgba(0,0,0,.16); }
.core strong { font-size: 28px; letter-spacing: -.05em; }
.core strong b { color: var(--lime); }
.core small { display: block; color: var(--muted); font-size: 9px; margin-bottom: 7px; }
.final { position: relative; padding: 170px 0 110px; text-align: center; overflow: hidden; }
.final:before { content: "X"; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); font-size: min(62vw, 850px); font-weight: 900; color: rgba(200,255,61,.025); line-height: 1; }
.final .container { position: relative; }
.final .eyebrow { justify-content: center; }
.final h2 { font-size: clamp(48px, 5.8vw, 88px); line-height: .92; letter-spacing: -.06em; margin: 24px 0; }
.final h2 em { font-style: normal; color: var(--lime); }
.final p { max-width: 600px; margin: 0 auto 35px; color: var(--muted); font-size: 18px; line-height: 1.6; }
@media (max-width: 900px) {
  .hero-inner { grid-template-columns: 1fr; }
  .hero-interface { max-width: 650px; }
  .hero h1 { font-size: clamp(42px, 11vw, 62px); }
  .section { padding: 100px 0; }
  .engine-stage { min-height: 780px; }
  .float { width: 42%; }
  .f1 { left: 5%; top: 7%; } .f2 { right: 5%; top: 10%; } .f3 { left: 5%; bottom: 8%; } .f4 { right: 5%; bottom: 5%; }
  .process-grid { grid-template-columns: 1fr; }
  .process-nav { position: relative; top: auto; flex-direction: row; overflow: auto; }
  .process-nav a { min-width: 150px; }
  .step { min-height: auto; padding-bottom: 72px; }
  .dash-metrics { grid-template-columns: 1fr 1fr; }
  .network { grid-template-columns: 1fr; }
  .core { width: 220px; margin: auto; }
}
@media (max-width: 600px) {
  .section { padding: 72px 0; }
  .intro { margin-bottom: 42px; }
  .process-grid { gap: 42px; }
  .step { padding-bottom: 50px; }
  .step > p { margin-bottom: 22px; }
  .scene { min-height: 238px; padding: 20px; align-content: center; border-radius: 20px; }
  .metrics { grid-template-columns: 1fr 1fr; }
  .metric:last-child { grid-column: 1 / -1; }
  .actions { flex-direction: column; align-items: stretch; }
  .engine-stage { display: grid; gap: 12px; padding: 14px; min-height: auto; }
  .engine-core, .float { position: relative; inset: auto; transform: none; width: 100%; }
  .engine-core { height: 180px; border-radius: 20px; }
  .engine-stage:hover .engine-core, .engine-stage:focus-within .engine-core { transform: scale(1.02); }
  .dash-top { align-items: flex-start; flex-direction: column; }
  .filters { overflow: auto; width: 100%; }
  .dash-metrics { grid-template-columns: 1fr; }
  .big-chart { height: 210px; }
  .band { overflow-x: auto; overscroll-behavior-x: contain; -webkit-overflow-scrolling: touch; scroll-snap-type: x proximity; }
  .track { padding-inline: 20px; animation: none; scroll-snap-align: start; }
  .flow { flex-wrap: nowrap; justify-content: flex-start; max-width: 100%; overflow-x: auto; overscroll-behavior-x: contain; -webkit-overflow-scrolling: touch; padding-bottom: 10px; scroll-snap-type: x proximity; }
  .flow div { min-width: 124px; padding: 20px 22px; }
  .flow div, .flow > span { flex: 0 0 auto; scroll-snap-align: start; }
  .journey-track { margin-inline: -20px; padding-inline: 20px; }
}
</style>

<section class="hero">
  <canvas id="signalCanvas"></canvas><canvas id="heroCursorCanvas"></canvas><div class="grid"></div><div class="glow"></div>
  <div class="container hero-inner">
    <div>
      <div class="eyebrow"><span class="dot"></span>DIGITAL GROWTH, BUILT FOR PERFORMANCE</div>
      <h1>WE TURN ATTENTION<br>INTO <em>GROWTH.</em></h1>
      <p class="lead">Advertising, marketing and digital operations built to accelerate businesses across Meta, Google, TikTok and beyond.</p>
      <div class="actions"><a class="btn primary" href="#contact">Start Growing</a><a class="btn ghost" href="#engine">Explore Clixframe</a></div>
    </div>
    <div class="interface hero-interface">
      <div class="bar"><b>CLIXFRAME / GROWTH ENGINE</b><span class="status">SYSTEM ACTIVE</span></div>
      <div class="platforms"><span class="pill on">META</span><span class="pill on">GOOGLE</span><span class="pill on">TIKTOK</span><span class="pill">INSTAGRAM</span></div>
      <div class="metrics">
        <div class="metric"><small>Revenue</small><strong>$128.4K</strong><span>+24.8%</span></div>
        <div class="metric"><small>ROAS</small><strong>4.82x</strong><span>+18.2%</span></div>
        <div class="metric"><small>Customers</small><strong>3,284</strong><span>+12.4%</span></div>
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
      <article class="float f1"><small>PAID MEDIA</small><strong>Campaign Control</strong><p>Meta / Google / TikTok<br>Acquisition systems running together.</p></article>
      <article class="float f2"><small>INTELLIGENCE</small><strong>4.82x ROAS</strong><p>Performance signals surface what deserves more budget.</p></article>
      <article class="float f3"><small>CUSTOMER PIPELINE</small><strong>284 to 67</strong><p>Lead to conversation to customer.</p></article>
      <article class="float f4"><small>OPERATIONS</small><strong>Always moving.</strong><p>Campaigns, channels and customer care stay connected.</p></article>
    </div>
  </div>
</section>

<section class="band"><div class="track">
  <span>META</span><i>x</i><span>GOOGLE</span><i>x</i><span>TIKTOK</span><i>x</i><span>INSTAGRAM</span><i>x</i><span>YOUTUBE</span><i>x</i>
  <span>META</span><i>x</i><span>GOOGLE</span><i>x</i><span>TIKTOK</span><i>x</i><span>INSTAGRAM</span><i>x</i><span>YOUTUBE</span><i>x</i>
</div></section>

<section class="section process" id="how">
  <div class="container">
    <header class="intro"><div class="eyebrow">HOW CLIXFRAME WORKS</div><h2><strong>One connected system</strong> from first click to lasting growth.</h2></header>
    <div class="process-grid">
      <nav class="process-nav" id="processNav"><a href="#attract" class="active"><span>01</span>Attract</a><a href="#convert"><span>02</span>Convert</a><a href="#operate"><span>03</span>Operate</a><a href="#scale"><span>04</span>Scale</a></nav>
      <div>
        <article class="step" id="attract"><h3>Get the right attention.</h3><p>Reach high-intent audiences through performance advertising, creative and digital marketing.</p><div class="scene"><div class="bar"><b>CAMPAIGN BUILDER</b><span class="status">ACTIVE</span></div><div class="platforms"><span class="pill on">META</span><span class="pill on">GOOGLE</span><span class="pill on">TIKTOK</span></div><div class="metrics"><div class="metric"><small>Objective</small><strong>Acquire</strong><span>LIVE</span></div><div class="metric"><small>Audience</small><strong>High intent</strong><span>READY</span></div><div class="metric"><small>Creative</small><strong>12 ads</strong><span>TESTING</span></div></div></div></article>
        <article class="step" id="convert"><h3>Turn attention into customers.</h3><p>Optimize the journey between every click, lead, conversation and conversion.</p><div class="scene"><div class="flow"><div><small>01</small><strong>AD</strong></div><span>to</span><div><small>02</small><strong>CLICK</strong></div><span>to</span><div><small>03</small><strong>LEAD</strong></div><span>to</span><div class="active"><small>04</small><strong>CUSTOMER</strong></div></div></div></article>
        <article class="step" id="operate"><h3>Keep every touchpoint moving.</h3><p>Connect campaigns, channels, leads and customer care into one continuous operation.</p><div class="scene"><div class="inbox"><div class="bar"><b>CUSTOMER OPERATIONS</b><span class="status">24 ACTIVE</span></div><div class="message"><i></i><div><strong>New Lead</strong><small>Meta campaign / just now</small></div><span>NEW</span></div><div class="message"><i></i><div><strong>Customer Follow-up</strong><small>Conversation active</small></div><span>OPEN</span></div><div class="message"><i></i><div><strong>Purchase Completed</strong><small>Customer journey</small></div><span>DONE</span></div></div></div></article>
        <article class="step" id="scale"><h3>Find what works. Push it further.</h3><p>Turn winning campaigns and customer signals into repeatable growth across channels.</p><div class="scene scale-ui"><div><div class="winner"><small>WINNING CAMPAIGN</small><strong>Creative / 04</strong><span class="status">4.82x ROAS</span></div><div class="out"><span>META</span><span>GOOGLE</span><span>TIKTOK</span><span>INSTAGRAM</span></div></div></div></article>
      </div>
    </div>
  </div>
</section>

<section class="journey">
  <div class="container">
    <div class="eyebrow">BEYOND ACQUISITION</div>
    <h2>FROM FIRST CLICK<br>TO <em>LASTING CUSTOMER.</em></h2>
    <div class="journey-track"><div>ATTENTION</div><span>to</span><div>CLICK</div><span>to</span><div>LEAD</div><span>to</span><div>CONVERSATION</div><span>to</span><div>CUSTOMER</div><span>to</span><div>RETENTION</div><span>to</span><div class="active">REVENUE</div></div>
    <p class="journey-copy">Clixframe doesn't stop at acquisition. We connect marketing, conversion, operations and customer care into one continuous growth system.</p>
  </div>
</section>

<section class="section" id="performance">
  <div class="container">
    <header class="intro"><div class="eyebrow">PERFORMANCE INTELLIGENCE</div><h2><strong>NO GUESSWORK.</strong><br>JUST SIGNALS THAT DRIVE GROWTH.</h2></header>
    <div class="dashboard">
      <div class="dash-top"><div><small>PERFORMANCE OVERVIEW</small><h3>Growth Dashboard</h3></div><div class="filters"><button class="active">ALL</button><button>META</button><button>GOOGLE</button><button>TIKTOK</button></div></div>
      <div class="dash-metrics"><div><small>Revenue</small><strong>$128.4K</strong><span>+24.8%</span></div><div><small>ROAS</small><strong>4.82x</strong><span>+18.2%</span></div><div><small>CPA</small><strong>$18.40</strong><span>-12.6%</span></div><div><small>Customers</small><strong>3,284</strong><span>+21.4%</span></div></div>
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
  <div class="container"><div class="eyebrow"><span class="dot"></span>READY FOR WHAT'S NEXT?</div><h2>YOUR NEXT STAGE<br>OF <em>GROWTH</em><br>STARTS HERE.</h2><p>Advertising is only the beginning. Build a connected digital growth system with Clixframe.</p><a class="btn primary" href="mailto:hello@clixframe.com">Start Growing</a></div>
</section>

<script>
(function() {
  const sections = [...document.querySelectorAll('.step')];
  const links = [...document.querySelectorAll('.process-nav a')];
  if ('IntersectionObserver' in window && sections.length && links.length) {
    const obs = new IntersectionObserver(entries => entries.forEach(entry => {
      if (entry.isIntersecting) {
        links.forEach(link => link.classList.toggle('active', link.getAttribute('href') === '#' + entry.target.id));
      }
    }), { rootMargin: '-35% 0px -55% 0px' });
    sections.forEach(section => obs.observe(section));
  }

  document.querySelectorAll('.scene').forEach(scene => {
    let touchTimer;
    const updateSceneGlow = (clientX, clientY) => {
      const rect = scene.getBoundingClientRect();
      scene.style.setProperty('--mx', `${clientX - rect.left}px`);
      scene.style.setProperty('--my', `${clientY - rect.top}px`);
    };

    scene.addEventListener('pointermove', event => {
      updateSceneGlow(event.clientX, event.clientY);
    }, { passive: true });
    scene.addEventListener('pointerleave', () => {
      scene.style.setProperty('--mx', '50%');
      scene.style.setProperty('--my', '50%');
    });
    scene.addEventListener('touchstart', event => {
      const touch = event.touches[0];
      if (!touch) return;
      clearTimeout(touchTimer);
      scene.classList.add('is-touch-hot');
      updateSceneGlow(touch.clientX, touch.clientY);
    }, { passive: true });
    scene.addEventListener('touchmove', event => {
      const touch = event.touches[0];
      if (!touch) return;
      clearTimeout(touchTimer);
      scene.classList.add('is-touch-hot');
      updateSceneGlow(touch.clientX, touch.clientY);
    }, { passive: true });
    scene.addEventListener('touchend', () => {
      touchTimer = setTimeout(() => scene.classList.remove('is-touch-hot'), 320);
    }, { passive: true });
    scene.addEventListener('touchcancel', () => {
      scene.classList.remove('is-touch-hot');
    }, { passive: true });
  });

  const canvas = document.getElementById('signalCanvas');
  if (!canvas || matchMedia('(prefers-reduced-motion: reduce)').matches) {
    return;
  }

  const hero = document.querySelector('.hero');
  const trailCanvas = document.getElementById('heroCursorCanvas');
  const trailCtx = trailCanvas?.getContext('2d');
  const ctx = canvas.getContext('2d');
  let pts = [];
  let sparks = [];
  let isHeroHot = false;
  let mx = innerWidth * .72;
  let my = innerHeight * .42;
  let heroMouseX = 0;
  let heroMouseY = 0;

  function resize() {
    const d = Math.min(devicePixelRatio || 1, 2);
    canvas.width = innerWidth * d;
    canvas.height = innerHeight * d;
    canvas.style.width = innerWidth + 'px';
    canvas.style.height = innerHeight + 'px';
    ctx.setTransform(d, 0, 0, d, 0, 0);
    pts = Array.from({ length: 55 }, () => ({
      x: Math.random() * innerWidth,
      y: Math.random() * innerHeight,
      vx: (Math.random() - .5) * .18,
      vy: (Math.random() - .5) * .18
    }));

    if (hero && trailCanvas && trailCtx) {
      const rect = hero.getBoundingClientRect();
      trailCanvas.width = rect.width * d;
      trailCanvas.height = rect.height * d;
      trailCanvas.style.width = rect.width + 'px';
      trailCanvas.style.height = rect.height + 'px';
      trailCtx.setTransform(d, 0, 0, d, 0, 0);
    }
  }

  addEventListener('resize', resize);
  addEventListener('pointermove', event => {
    mx = event.clientX;
    my = event.clientY;
  });
  if (hero && trailCanvas && trailCtx) {
    hero.addEventListener('pointerenter', () => {
      isHeroHot = true;
    });
    hero.addEventListener('pointerleave', () => {
      isHeroHot = false;
    });
    hero.addEventListener('pointermove', event => {
      const rect = hero.getBoundingClientRect();
      heroMouseX = event.clientX - rect.left;
      heroMouseY = event.clientY - rect.top;
      sparks.push({
        x: heroMouseX,
        y: heroMouseY,
        px: heroMouseX,
        py: heroMouseY,
        vx: (Math.random() - .5) * 1.9,
        vy: (Math.random() - .5) * 1.9,
        life: 1,
        size: 18 + Math.random() * 32,
        hue: 78 + Math.random() * 34
      });
      if (sparks.length > 95) sparks.splice(0, sparks.length - 95);
    }, { passive: true });
  }
  resize();

  function drawHeroTrail() {
    if (!trailCtx || !trailCanvas) return;

    const width = trailCanvas.clientWidth;
    const height = trailCanvas.clientHeight;
    trailCtx.clearRect(0, 0, width, height);

    if (isHeroHot) {
      const glow = trailCtx.createRadialGradient(heroMouseX, heroMouseY, 0, heroMouseX, heroMouseY, 145);
      glow.addColorStop(0, 'rgba(200,255,61,.46)');
      glow.addColorStop(.22, 'rgba(166,255,84,.24)');
      glow.addColorStop(.58, 'rgba(42,255,170,.08)');
      glow.addColorStop(1, 'rgba(42,255,170,0)');
      trailCtx.fillStyle = glow;
      trailCtx.beginPath();
      trailCtx.arc(heroMouseX, heroMouseY, 145, 0, Math.PI * 2);
      trailCtx.fill();

      trailCtx.fillStyle = 'rgba(210,255,76,.95)';
      trailCtx.shadowColor = 'rgba(200,255,61,.8)';
      trailCtx.shadowBlur = 28;
      trailCtx.beginPath();
      trailCtx.arc(heroMouseX, heroMouseY, 4.2, 0, Math.PI * 2);
      trailCtx.fill();
      trailCtx.shadowBlur = 0;
    }

    sparks = sparks.filter(spark => spark.life > .025);
    for (const spark of sparks) {
      spark.px = spark.x;
      spark.py = spark.y;
      spark.x += spark.vx;
      spark.y += spark.vy;
      spark.vx *= .965;
      spark.vy *= .965;
      spark.life *= .93;

      const line = trailCtx.createLinearGradient(spark.px, spark.py, spark.x, spark.y);
      line.addColorStop(0, `hsla(${spark.hue}, 100%, 62%, ${spark.life * .75})`);
      line.addColorStop(.55, `hsla(145, 100%, 58%, ${spark.life * .28})`);
      line.addColorStop(1, 'rgba(200,255,61,0)');
      trailCtx.strokeStyle = line;
      trailCtx.lineWidth = Math.max(1, spark.size * spark.life * .08);
      trailCtx.lineCap = 'round';
      trailCtx.beginPath();
      trailCtx.moveTo(spark.px, spark.py);
      trailCtx.lineTo(spark.x, spark.y);
      trailCtx.stroke();

      const aura = trailCtx.createRadialGradient(spark.x, spark.y, 0, spark.x, spark.y, spark.size);
      aura.addColorStop(0, `hsla(${spark.hue}, 100%, 62%, ${spark.life * .22})`);
      aura.addColorStop(1, 'rgba(200,255,61,0)');
      trailCtx.fillStyle = aura;
      trailCtx.beginPath();
      trailCtx.arc(spark.x, spark.y, spark.size, 0, Math.PI * 2);
      trailCtx.fill();
    }
  }

  function draw() {
    ctx.clearRect(0, 0, innerWidth, innerHeight);
    for (const point of pts) {
      point.x += point.vx;
      point.y += point.vy;
      if (point.x < 0 || point.x > innerWidth) point.vx *= -1;
      if (point.y < 0 || point.y > innerHeight) point.vy *= -1;
      const dx = mx - point.x;
      const dy = my - point.y;
      const distance = Math.hypot(dx, dy);
      if (distance < 190) {
        ctx.strokeStyle = `rgba(200,255,61,${(1 - distance / 190) * .16})`;
        ctx.beginPath();
        ctx.moveTo(point.x, point.y);
        ctx.lineTo(mx, my);
        ctx.stroke();
      }
      ctx.fillStyle = 'rgba(245,246,241,.35)';
      ctx.beginPath();
      ctx.arc(point.x, point.y, 1.1, 0, Math.PI * 2);
      ctx.fill();
    }
    drawHeroTrail();
    requestAnimationFrame(draw);
  }

  draw();
})();
</script>
