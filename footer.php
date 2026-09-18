<?php
/**
 * Theme footer.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;
?>

<style>
.footer { border-top: 1px solid var(--line); padding: 70px 0 28px; }
.footer-top { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; }
.footer-brand { font-size: clamp(50px, 8vw, 115px); font-weight: 800; letter-spacing: -.07em; }
.footer-links { display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; }
.footer-links small { display: block; color: #717770; font-size: 9px; margin-bottom: 15px; }
.footer-links a,
.footer-links span { display: block; margin: 10px 0; color: #c3c7c1; font-size: 13px; }
.footer-bottom { display: flex; justify-content: space-between; gap: 20px; margin-top: 60px; padding-top: 22px; border-top: 1px solid var(--line); font-size: 10px; color: #737972; }
@media (max-width: 900px) {
  .footer-top { grid-template-columns: 1fr; }
}
@media (max-width: 600px) {
  .footer-links { grid-template-columns: 1fr 1fr; }
  .footer-bottom { flex-direction: column; }
}
</style>

<footer class="footer">
  <div class="container">
    <div class="footer-top">
      <div class="footer-brand">CLIXFRAME</div>
      <div class="footer-links">
        <div>
          <small><?php esc_html_e('EXPLORE', 'dawp'); ?></small>
          <a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('Services', 'dawp'); ?></a>
          <a href="<?php echo esc_url(home_url('/how-we-grow/')); ?>"><?php esc_html_e('How We Grow', 'dawp'); ?></a>
          <a href="<?php echo esc_url(home_url('/work/')); ?>"><?php esc_html_e('Work', 'dawp'); ?></a>
        </div>
        <div>
          <small><?php esc_html_e('PLATFORMS', 'dawp'); ?></small>
          <span>Meta</span>
          <span>Google</span>
          <span>TikTok</span>
          <span>Instagram</span>
        </div>
        <div>
          <small><?php esc_html_e('CONNECT', 'dawp'); ?></small>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Start Growing', 'dawp'); ?></a>
          <a href="mailto:hello@clixframe.com"><?php esc_html_e('Contact', 'dawp'); ?></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?php echo esc_html(date_i18n('Y')); ?> CLIXFRAME</span>
      <span><?php esc_html_e('Privacy / Terms', 'dawp'); ?></span>
      <span><?php esc_html_e('TURN ATTENTION INTO GROWTH.', 'dawp'); ?></span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
