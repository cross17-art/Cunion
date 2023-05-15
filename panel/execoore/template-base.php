<?php
// =============================================================================
// TEMPLATE NAME: Base
// -----------------------------------------------------------------------------
// Base template.
// =============================================================================


get_header();
if (is_home()) { ?>
<header class="header-base">
    <div class="container">
        <h1><?php esc_html_e("Blog","execoore") ?></h1>
    </div>
</header>
<main>
    <section class="section-base">
        <div class="container">
            <?php execoore_default_blog() ?>
        </div>
    </section>
</main>
<?php
} else {
   execoore_the_content();
}
get_footer();
?>