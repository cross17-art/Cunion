<?php
// =============================================================================
// FOOTER.PHP
// -----------------------------------------------------------------------------
// The footer of the theme.
// This file generate the following footer types:

// 01. FOOTER BASE - framework-y.com/components/footer/footer-base.html
// 02. FOOTER PARALLAX - framework-y.com/components/footer/footer-parallax.html
// 03. FOOTER MINIMAL- framework-y.com/components/footer/footer-minimal.html
// =============================================================================

if (defined("HC_PLUGIN_PATH")) {
    hc_get_footer_engine();
} else { ?>
<footer class="default-wp-footer">
    <div class="footer-bar">
        <div class="container">
            <span><?php echo esc_html__("Copyright Schiocco | All Rights Reserved | Powered by","execoore") ?> <a href="<?php echo esc_url("http//wordpress.org") ?>"><?php echo esc_html__("WordPress","execoore") ?></a></span><span></span>
        </div>
    </div>
</footer>      
<?php } 
wp_footer();
?>
</body>
</html>