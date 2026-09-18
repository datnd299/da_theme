<?php
/**
 * Theme header.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;650;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class('clixframe-site'); ?>>
<?php wp_body_open(); ?>

<style>
:root {
  --void: #070807;
  --carbon: #101210;
  --graphite: #181b18;
  --cloud: #f3f5ef;
  --paper: #fafbf7;
  --lime: #c8ff3d;
  --blue: #5c7cff;
  --violet: #9b72ff;
  --cyan: #57e8ff;
  --white: #f5f6f1;
  --muted: #a4aaa2;
  --dark: #111310;
  --dark2: #555b54;
  --line: rgba(255, 255, 255, .11);
  --container: 1360px;
  --r: 18px;
}

* { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body.clixframe-site {
  margin: 0;
  background: var(--void);
  color: var(--white);
  font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
  overflow-x: hidden;
}

.clixframe-site a { color: inherit; text-decoration: none; }
.clixframe-site button { font: inherit; }
.container { width: min(calc(100% - 48px), var(--container)); margin: auto; }

.header {
  position: fixed;
  z-index: 50;
  top: 0;
  left: 0;
  right: 0;
  height: 78px;
  display: flex;
  align-items: center;
  border-bottom: 1px solid transparent;
  transition: .25s;
}

.header.scrolled {
  background: rgba(7, 8, 7, .78);
  backdrop-filter: blur(18px);
  border-color: var(--line);
}

.header-inner {
  width: min(calc(100% - 48px), var(--container));
  margin: auto;
  display: flex;
  align-items: center;
  gap: 36px;
}

.logo { font-weight: 800; letter-spacing: -.055em; font-size: 22px; }
.logo b { color: var(--lime); }
.nav { display: flex; gap: 28px; margin-left: auto; font-size: 14px; color: #d7dbd4; }
.nav a:hover { color: var(--lime); }

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  min-height: 48px;
  padding: 0 22px;
  border: 1px solid var(--line);
  border-radius: 12px;
  font-weight: 700;
  font-size: 14px;
  transition: .2s;
}

.btn:hover { transform: translateY(-2px); }
.btn.primary { background: var(--lime); color: #090a08; border-color: var(--lime); }
.btn.ghost { background: rgba(255, 255, 255, .03); }
.menu {
  display: none;
  position: relative;
  width: 46px;
  height: 46px;
  margin-left: auto;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(255, 255, 255, .16);
  border-radius: 12px;
  background: rgba(255, 255, 255, .05);
  color: var(--white);
  cursor: pointer;
  transition: background .2s, border-color .2s, transform .2s;
}

.menu:hover,
.menu:focus-visible {
  background: rgba(255, 255, 255, .1);
  border-color: rgba(200, 255, 61, .55);
  outline: none;
}

.menu span,
.menu::before,
.menu::after {
  content: "";
  position: absolute;
  width: 18px;
  height: 2px;
  border-radius: 999px;
  background: currentColor;
  transition: transform .22s ease, opacity .18s ease;
}

.menu::before { transform: translateY(-6px); }
.menu::after { transform: translateY(6px); }

.header.menu-open .menu span { opacity: 0; }
.header.menu-open .menu::before { transform: rotate(45deg); }
.header.menu-open .menu::after { transform: rotate(-45deg); }

.mobile-nav {
  display: none;
}

@media (max-width: 900px) {
  .container,
  .header-inner { width: min(calc(100% - 32px), var(--container)); }
  .nav,
  .header .btn { display: none; }
  .menu { display: inline-flex; }

  .mobile-nav {
    display: block;
    position: fixed;
    z-index: 49;
    top: 78px;
    left: 16px;
    right: 16px;
    padding: 12px;
    border: 1px solid rgba(255, 255, 255, .12);
    border-radius: 16px;
    background: rgba(12, 14, 12, .96);
    box-shadow: 0 24px 70px rgba(0, 0, 0, .36);
    backdrop-filter: blur(18px);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: opacity .22s ease, transform .22s ease, visibility .22s ease;
  }

  .header.menu-open + .mobile-nav {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .mobile-nav a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 54px;
    padding: 0 14px;
    border-radius: 10px;
    color: #e7ebe3;
    font-size: 15px;
    font-weight: 700;
  }

  .mobile-nav a::after {
    content: "";
    width: 7px;
    height: 7px;
    border-top: 2px solid currentColor;
    border-right: 2px solid currentColor;
    opacity: .45;
    transform: rotate(45deg);
  }

  .mobile-nav a:hover,
  .mobile-nav a:focus-visible {
    background: rgba(255, 255, 255, .06);
    color: var(--lime);
    outline: none;
  }

  .mobile-nav .mobile-nav-cta {
    margin-top: 8px;
    background: var(--lime);
    color: #090a08;
  }

  .mobile-nav .mobile-nav-cta:hover,
  .mobile-nav .mobile-nav-cta:focus-visible {
    background: #d8ff70;
    color: #090a08;
  }
}

@media (prefers-reduced-motion: reduce) {
  * { scroll-behavior: auto !important; animation: none !important; transition: none !important; }
}
</style>

<header class="header" id="header">
  <div class="header-inner">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">CLI<b>X</b>FRAME</a>
    <nav class="nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
      <a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('Services', 'dawp'); ?></a>
      <a href="<?php echo esc_url(home_url('/how-we-grow/')); ?>"><?php esc_html_e('How We Grow', 'dawp'); ?></a>
      <a href="<?php echo esc_url(home_url('/work/')); ?>"><?php esc_html_e('Work', 'dawp'); ?></a>
      <a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About', 'dawp'); ?></a>
    </nav>
    <a class="btn primary" href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Start Growing', 'dawp'); ?></a>
    <button class="menu" type="button" aria-label="<?php esc_attr_e('Open menu', 'dawp'); ?>" aria-controls="mobileNav" aria-expanded="false"><span></span></button>
  </div>
</header>
<nav class="mobile-nav" id="mobileNav" aria-label="<?php esc_attr_e('Mobile navigation', 'dawp'); ?>">
  <a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('Services', 'dawp'); ?></a>
  <a href="<?php echo esc_url(home_url('/how-we-grow/')); ?>"><?php esc_html_e('How We Grow', 'dawp'); ?></a>
  <a href="<?php echo esc_url(home_url('/work/')); ?>"><?php esc_html_e('Work', 'dawp'); ?></a>
  <a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About', 'dawp'); ?></a>
  <a class="mobile-nav-cta" href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Start Growing', 'dawp'); ?></a>
</nav>

<script>
(function() {
  var header = document.getElementById('header');
  var menuButton = header ? header.querySelector('.menu') : null;
  var mobileNav = document.getElementById('mobileNav');
  if (!header) {
    return;
  }

  function updateHeaderState() {
    header.classList.toggle('scrolled', window.scrollY > 24);
  }

  updateHeaderState();
  window.addEventListener('scroll', updateHeaderState, { passive: true });

  if (!menuButton || !mobileNav) {
    return;
  }

  function setMenuOpen(isOpen) {
    header.classList.toggle('menu-open', isOpen);
    menuButton.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    menuButton.setAttribute('aria-label', isOpen ? '<?php echo esc_js(__('Close menu', 'dawp')); ?>' : '<?php echo esc_js(__('Open menu', 'dawp')); ?>');
  }

  menuButton.addEventListener('click', function() {
    setMenuOpen(!header.classList.contains('menu-open'));
  });

  mobileNav.addEventListener('click', function(event) {
    if (event.target.closest('a')) {
      setMenuOpen(false);
    }
  });

  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      setMenuOpen(false);
    }
  });

  window.addEventListener('resize', function() {
    if (window.innerWidth > 900) {
      setMenuOpen(false);
    }
  });
})();
</script>
