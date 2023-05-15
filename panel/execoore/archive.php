<?php
// =============================================================================
// TEMPLATE NAME: Archive
// -----------------------------------------------------------------------------
// Archive template for all custom Post Types - Lists and for blog posts. This template is hidden.
// This template not show any direct content, but fetch the content of the archive page built by the user for the specific Post Type.
// =============================================================================
if (defined("HC_PLUGIN_PATH")) {
    hc_archive_engine();
} else {
    get_header();
    $filter = "";
    $date = "";
    $title = "";

    if (is_author()) {
        $title = esc_html__("Author's posts of ","execoore") . get_the_author() ;
    }
    if (is_day()) $date = get_the_date();
    if (is_month()) $date = get_the_date('F Y');
    if (is_year()) $date = get_the_date('Y');

    if (count($wp_query->tax_query->queries) > 0) {
        $args['category_name'] = $wp_query->tax_query->queries[0]['terms'][0];
        $title = esc_html__("Archives with tag ","execoore") . $wp_query->queried_object->name;
    }
    if ($date != "") {
        $title = esc_html__("Archives with date ","execoore") . $date;
    }

    $content = "";
    $paged = get_query_var( 'paged' ) ? absint(get_query_var('paged')) : 1;

    if ($date != "") {
        $args['monthnum'] = date("m",strtotime($date));
        $args['year'] = date("Y",strtotime($date));
    }
?>
<header class="header-base">
    <div class="container">
        <h1>
            <?php echo esc_html($title) ?>
        </h1>
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
}
get_footer();
?>