<?php
/**
 * Shared Clixframe page patterns.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

function dawp_clixframe_email() {
    return 'hello@clixframe.com';
}

function dawp_clixframe_pages_style() {
    static $printed = false;
    if ($printed) {
        return;
    }
    $printed = true;
    ?>
    <style>
    .cf-page { background: var(--void); color: var(--white); overflow: hidden; }
    .cf-hero { position: relative; min-height: 78svh; display: flex; align-items: center; padding: 132px 0 74px; border-bottom: 1px solid var(--line); }
    .cf-hero:before { content: ""; position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.035) 1px, transparent 1px); background-size: 54px 54px; mask-image: linear-gradient(to bottom, black, transparent 90%); }
    .cf-hero:after { content: "X"; position: absolute; right: -6vw; top: 4vh; color: rgba(200,255,61,.035); font-size: min(46vw, 620px); font-weight: 900; line-height: .8; }
    .cf-hero__grid { position: relative; z-index: 1; display: grid; grid-template-columns: 1.04fr .96fr; gap: clamp(38px, 6vw, 86px); align-items: center; }
    .cf-hero__grid > *, .cf-panel { min-width: 0; }
    .cf-eyebrow { display: flex; align-items: center; gap: 10px; color: var(--muted); font-size: 11px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
    .cf-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--lime); box-shadow: 0 0 18px var(--lime); }
    .cf-hero h1, .cf-section h2, .cf-final h2 { margin: 18px 0 24px; font-weight: 650; letter-spacing: -.06em; line-height: .92; }
    .cf-hero h1 { font-size: clamp(48px, 5.8vw, 84px); }
    .cf-section h2 { font-size: clamp(36px, 4.4vw, 64px); }
    .cf-hero em, .cf-section em, .cf-final em { color: var(--lime); font-style: normal; }
    .cf-lead { max-width: 650px; color: #b8bdb5; font-size: 18px; line-height: 1.65; }
    .cf-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 32px; }
    .cf-panel, .cf-card, .cf-mini, .cf-table { border: 1px solid var(--line); border-radius: 18px; background: linear-gradient(145deg, rgba(255,255,255,.075), rgba(255,255,255,.025)); box-shadow: 0 30px 80px rgba(0,0,0,.28); backdrop-filter: blur(12px); }
    .cf-panel { padding: 22px; }
    .cf-topline { display: flex; justify-content: space-between; gap: 16px; padding-bottom: 18px; color: var(--muted); font-size: 10px; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; }
    .cf-status { color: var(--lime); }
    .cf-metrics { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
    .cf-metric { padding: 18px; border: 1px solid var(--line); border-radius: 14px; background: rgba(0,0,0,.18); }
    .cf-metric small, .cf-card small, .cf-mini small { display: block; color: var(--muted); font-size: 10px; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; }
    .cf-metric strong { display: block; margin-top: 8px; font-size: 28px; letter-spacing: -.04em; }
    .cf-bars { height: 210px; display: flex; align-items: end; gap: 8px; margin-top: 14px; padding: 18px; border: 1px solid var(--line); border-radius: 14px; }
    .cf-bars i { flex: 1; height: var(--h); border-radius: 5px 5px 1px 1px; background: linear-gradient(to top, rgba(200,255,61,.16), var(--lime)); }
    .cf-demo { display: block; margin-top: 10px; color: #747a72; font-size: 9px; text-align: right; letter-spacing: .08em; }
    .cf-section { padding: 132px 0; }
    .cf-section:not(.cf-section--paper):not(.cf-section--cloud) { border-bottom: 1px solid var(--line); }
    .cf-section--paper { background: var(--paper); color: var(--dark); }
    .cf-section--cloud { background: var(--cloud); color: var(--dark); }
    .cf-section--paper .cf-eyebrow, .cf-section--cloud .cf-eyebrow { color: #666c65; }
    .cf-intro { max-width: 930px; margin-bottom: 52px; }
    .cf-intro p, .cf-copy { max-width: 720px; color: var(--muted); font-size: 17px; line-height: 1.7; }
    .cf-section--paper .cf-intro p, .cf-section--cloud .cf-intro p, .cf-section--paper .cf-copy, .cf-section--cloud .cf-copy { color: var(--dark2); }
    .cf-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; }
    .cf-grid--2, .cf-grid--balanced-4 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .cf-card { position: relative; isolation: isolate; overflow: hidden; padding: 28px 24px 24px; min-height: 230px; transition: transform .28s ease, border-color .28s ease, box-shadow .28s ease, background .28s ease; }
    .cf-card:before { content: ""; position: absolute; inset: 0; z-index: -2; background: radial-gradient(circle at 16% 0%, rgba(200,255,61,.18), transparent 34%), linear-gradient(135deg, rgba(255,255,255,.1), transparent 48%); opacity: .72; }
    .cf-card:after { content: ""; position: absolute; top: 18px; right: 18px; width: 42px; height: 42px; border-top: 1px solid rgba(200,255,61,.55); border-right: 1px solid rgba(200,255,61,.55); opacity: .76; }
    .cf-card h3 { margin: 18px 0 12px; font-size: 25px; letter-spacing: -.045em; }
    .cf-card p { margin: 0; color: var(--muted); line-height: 1.6; }
    .cf-card small { position: relative; padding-left: 20px; }
    .cf-card small:before { content: ""; position: absolute; left: 0; top: 50%; width: 9px; height: 9px; border-radius: 50%; background: var(--lime); box-shadow: 0 0 16px rgba(200,255,61,.85); transform: translateY(-50%); }
    .cf-card:hover { transform: translateY(-4px); border-color: rgba(200,255,61,.42); box-shadow: 0 28px 80px rgba(0,0,0,.34), 0 0 0 1px rgba(200,255,61,.08) inset; }
    .cf-section--paper .cf-card, .cf-section--cloud .cf-card { border-color: rgba(10,20,24,.14); background: linear-gradient(150deg, rgba(255,255,255,.92), rgba(255,255,255,.62)); box-shadow: 0 18px 45px rgba(15, 26, 22, .06), inset 0 1px 0 rgba(255,255,255,.86); }
    .cf-section--paper .cf-card:before, .cf-section--cloud .cf-card:before { background: linear-gradient(90deg, rgba(200,255,61,.72), rgba(40,222,255,.42), transparent 58%), radial-gradient(circle at 92% 0%, rgba(40,222,255,.14), transparent 34%), linear-gradient(rgba(12,24,28,.04) 1px, transparent 1px), linear-gradient(90deg, rgba(12,24,28,.035) 1px, transparent 1px); background-size: 100% 3px, auto, 36px 36px, 36px 36px; background-repeat: no-repeat, no-repeat, repeat, repeat; opacity: 1; }
    .cf-section--paper .cf-card:after, .cf-section--cloud .cf-card:after { border-color: rgba(18,28,30,.24); }
    .cf-section--paper .cf-card small, .cf-section--cloud .cf-card small { color: #7a8279; }
    .cf-section--paper .cf-card p, .cf-section--cloud .cf-card p { color: var(--dark2); }
    .cf-section--paper .cf-card:hover, .cf-section--cloud .cf-card:hover { border-color: rgba(40,222,255,.42); box-shadow: 0 24px 70px rgba(16,36,58,.12), 0 0 0 1px rgba(200,255,61,.18) inset; }
    .cf-flow { display: flex; align-items: center; gap: 10px; max-width: 100%; overflow-x: auto; overscroll-behavior-x: contain; -webkit-overflow-scrolling: touch; padding-bottom: 12px; scroll-snap-type: x proximity; }
    .cf-flow div { flex: 0 0 auto; padding: 16px 18px; border: 1px solid currentColor; border-color: rgba(255,255,255,.16); border-radius: 12px; font-size: 12px; font-weight: 800; white-space: nowrap; scroll-snap-align: start; }
    .cf-section--paper .cf-flow div, .cf-section--cloud .cf-flow div { border-color: rgba(0,0,0,.16); }
    .cf-flow .active { background: var(--lime); color: #090a08; border-color: var(--lime); }
    .cf-flow span { flex: 0 0 auto; color: var(--lime); white-space: nowrap; scroll-snap-align: center; }
    .cf-list { display: grid; gap: 12px; margin: 0; padding: 0; list-style: none; }
    .cf-list li { display: flex; justify-content: space-between; gap: 18px; padding: 16px 0; border-bottom: 1px solid var(--line); color: #dce0d8; }
    .cf-section--paper .cf-list li, .cf-section--cloud .cf-list li { border-color: rgba(0,0,0,.14); color: var(--dark); }
    .cf-list span { color: var(--muted); font-size: 12px; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; }
    .cf-band { overflow: hidden; background: var(--lime); color: #090a08; padding: 18px 0; }
    .cf-track { display: flex; width: max-content; gap: 34px; font-size: 18px; font-weight: 900; white-space: nowrap; animation: cf-marquee 24s linear infinite; }
    @keyframes cf-marquee { to { transform: translateX(-50%); } }
    .cf-form { display: grid; gap: 13px; }
    .cf-form label { display: grid; gap: 7px; color: var(--muted); font-size: 10px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
    .cf-form input, .cf-form select, .cf-form textarea { width: 100%; min-height: 48px; padding: 12px 14px; border: 1px solid var(--line); border-radius: 12px; background: rgba(255,255,255,.04); color: var(--white); outline: 0; }
    .cf-form input[type="checkbox"] { width: auto; min-height: 0; margin-right: 8px; accent-color: var(--lime); }
    .cf-form textarea { min-height: 140px; resize: vertical; }
    .cf-hidden { position: absolute; left: -9999px; }
    .cf-alert { padding: 13px 14px; border-radius: 12px; margin-bottom: 16px; border: 1px solid rgba(200,255,61,.28); background: rgba(200,255,61,.08); color: var(--white); }
    .cf-final { position: relative; padding: 150px 0 105px; text-align: center; }
    .cf-final .cf-eyebrow { justify-content: center; }
    .cf-final h2 { font-size: clamp(46px, 5.8vw, 86px); }
    .cf-final p { max-width: 620px; margin: 0 auto 32px; color: var(--muted); font-size: 18px; line-height: 1.6; }
    @media (max-width: 900px) {
      .cf-hero__grid, .cf-grid, .cf-grid--2, .cf-grid--balanced-4 { grid-template-columns: 1fr; }
      .cf-hero { min-height: auto; }
      .cf-section { padding: 96px 0; }
      .cf-section:not(.cf-section--paper):not(.cf-section--cloud) { padding-bottom: 72px; }
      .cf-section:not(.cf-section--paper):not(.cf-section--cloud) + .cf-final { padding-top: 78px; }
    }
    @media (max-width: 600px) {
      .cf-hero { padding-top: 112px; }
      .cf-hero h1 { font-size: clamp(40px, 11vw, 58px); }
      .cf-metrics { grid-template-columns: 1fr; }
      .cf-actions { flex-direction: column; align-items: stretch; }
      .cf-topline, .cf-list li { flex-direction: column; }
      .cf-panel { overflow: hidden; }
      .cf-flow { margin-inline: -22px; padding: 0 22px 14px; }
      .cf-flow div { min-width: max-content; }
      .cf-intro { margin-bottom: 42px; }
      .cf-final { padding-bottom: 82px; }
      .cf-stage-slider { display: flex; gap: 14px; margin-inline: -20px; padding: 0 20px 14px; overflow-x: auto; overscroll-behavior-x: contain; -webkit-overflow-scrolling: touch; scroll-snap-type: x mandatory; scrollbar-width: none; }
      .cf-stage-slider::-webkit-scrollbar { display: none; }
      .cf-stage-slider .cf-card { flex: 0 0 min(84vw, 340px); min-height: 250px; scroll-snap-align: start; scroll-snap-stop: always; }
      .cf-band { overflow-x: auto; overscroll-behavior-x: contain; -webkit-overflow-scrolling: touch; scroll-snap-type: x proximity; }
      .cf-track { padding-inline: 20px; animation: none; scroll-snap-align: start; }
    }
    </style>
    <?php
}

function dawp_cf_bars($heights = [25, 34, 31, 46, 43, 58, 54, 68, 63, 82, 76, 94]) {
    echo '<div class="cf-bars">';
    foreach ($heights as $height) {
        echo '<i style="--h:' . esc_attr((int) $height) . '%"></i>';
    }
    echo '</div>';
}
