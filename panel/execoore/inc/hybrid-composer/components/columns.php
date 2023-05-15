<?php

// =============================================================================
// COLUMNS.PHP
// -----------------------------------------------------------------------------
// Hybric Composer columns front-end component
// =============================================================================

if (!defined("HC_FRONT")) {
    define("HC_FRONT", (((isset($_GET["hc"]) && $_GET["hc"] == "front")) ? true: false));
}
function hc_include_hc_column(&$Y_NOW,$EXTRA = array()) {
    $CURRENT_COLUMN = hc_get($Y_NOW, "main_content", array());
    $count = count($CURRENT_COLUMN);
    $css = str_replace("-md-","-lg-", $Y_NOW["column_width"]) . " " . hc_get($Y_NOW,"css_classes") . " " . hc_get($Y_NOW,"custom_css_classes");
    if (in_array("timeline", $EXTRA)) {
        $css .= " anima"; 
        if (!empty($Y_NOW["animation"])) $css .= " anima-" . $Y_NOW["animation"];
    }
    if ($count == 0) $css .= " hc-empty";
?>
<div id="<?php echo esc_attr($Y_NOW['id']); ?>" class="hc-cmp-column hc-column <?php echo $css ?>"
    style="<?php echo hc_get($Y_NOW,"custom_css_styles"); ?>" <?php echo hc_get_scroll_animation(hc_get($Y_NOW,"animation"),hc_get($Y_NOW,"animation_time"),hc_get($Y_NOW,"timeline_animation"),hc_get($Y_NOW,"timeline_delay"),hc_get($Y_NOW,"timeline_order"),(in_array("fullpage", $EXTRA) ? "fullpage":"")) ?>>
    <?php
    for ($i = 0; $i < $count; $i++) {
        hc_get_content_recursive($CURRENT_COLUMN[$i],$EXTRA);
    }
    ?>
</div>
<?php }
function hc_include_hc_row(&$Y_NOW,$EXTRA = array()) {
    echo '<div id="' . esc_attr($Y_NOW['id']) . '" class="hc-cmp-row row" ' .  hc_get_scroll_animation(hc_get($Y_NOW,"animation"),hc_get($Y_NOW,"animation_time"),hc_get($Y_NOW,"timeline_animation"),hc_get($Y_NOW,"timeline_delay"),hc_get($Y_NOW,"timeline_order"),(in_array("fullpage", $EXTRA) ? "fullpage":"")) . '>';
    $cols = hc_get($Y_NOW, "main_content", array());
    if (hc_get($Y_NOW,"timeline_animation") == "true") array_push($EXTRA, "timeline");
    for ($i = 0; $i < count($cols); $i++) {
        hc_include_hc_column($cols[$i], $EXTRA);
    }
    echo "</div>";
}
function hc_include_hc_container(&$Y_NOW,$EXTRA = array()) {
    $CURRENT_COLUMN = hc_get($Y_NOW, "content", array());
    echo '<div id="' . $Y_NOW['id'] . '" class="hc-container hc-cmp-container hc-component">';
    for ($i = 0; $i < count($CURRENT_COLUMN); $i++) {
        hc_get_content_recursive($CURRENT_COLUMN[$i], $EXTRA);
    }
    echo '</div>';
}
?>
