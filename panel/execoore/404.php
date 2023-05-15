<?php
// =============================================================================
// TEMPLATE NAME: 404
// -----------------------------------------------------------------------------
// 404 Page Not Found template. This template is hidden.
// =============================================================================
$logo = EXECOORE_URL . "/inc/logo.png";
get_header();
if (defined("HC_PLUGIN_PATH")) {
    $tmp = hc_get_setting("logo");
    if ($tmp != "") $logo = $tmp;
}
?>
<main>
    <section class="section-base">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 align-center">
                    <hr class="space-lg" />
                    <h1>
                        <?php esc_html_e("404","execoore") ?>
                    </h1>
                    <h3>
                        <?php esc_html_e("PAGE NOT FOUND","execoore") ?>
                    </h3>
                    <p>
                        <?php esc_html_e("The page you were looking for can not be found.","execoore") ?>
                    </p>
                    <hr class="space-sm" />
                    <a class="btn-sm btn" href="<?php echo esc_url(home_url()) ?>">
                        <?php esc_html_e("Go back to home","execoore") ?>
                    </a>
                    <hr class="space-lg" />
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>