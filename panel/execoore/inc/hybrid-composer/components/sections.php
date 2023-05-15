<?php
// =============================================================================
// SECTIONS.PHP
// -----------------------------------------------------------------------------
// Hybric Composer sections front-end components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. SECTION MANAGER BLOCK - Container for all the sections
//   02. SECTION IMAGE - Documentation and demo: framework-y.com/components/title/template-title-image.html
//   03. SECTION SLIDER - Documentation and demo: framework-y.com/components/title/template-title-slider.html
//   04. SECTION VIDEO - Documentation and demo: framework-y.com/components/title/template-title-video-mp4.html
//   05. SECTION ANIMATION - Documentation and demo: framework-y.com/components/title/template-title-animation.html
//   06. SECTION TWO BLOCKS - Documentation and demo: framework-y.com/sections/section-two-blocks.html
//   07. SECTION MAP - Documentation and demo: framework-y.com/sections/section-map.html
// =============================================================================

if (!defined("HC_FRONT")) {
    define("HC_FRONT", (((isset($_GET["hc"]) && $_GET["hc"] == "front")) ? true: false));
}

function hc_get_section_content($Y_NOW, $classes, $EXTRA = array()) {
?>
<div class="container <?php echo esc_attr($classes); ?>">
    <div class="row">
        <?php
    $CURRENT_SECTION = $Y_NOW["section_content"];
    for ($i = 0; $i < count($CURRENT_SECTION); $i++) {
        hc_get_content_recursive($CURRENT_SECTION[$i], $EXTRA);
    }
        ?>
    </div>
</div>
<?php }
function hc_include_hc_section(&$Y_NOW,$EXTRA) {
    $SUB_EXTRA = array();
    $SECTION_SETTINGS = hc_get($Y_NOW, "section_settings");

    $section_css = "hc-cmp-section " . hc_get_component_classes($Y_NOW,$EXTRA);
    $container_css = "";
    $attributes = "";
    $section_styles = hc_get($Y_NOW, "custom_css_styles");
    $animation_string = hc_get_scroll_animation(hc_get($Y_NOW,"animation"),hc_get($Y_NOW,"animation_time"),hc_get($Y_NOW,"timeline_animation"),hc_get($Y_NOW,"timeline_delay"),hc_get($Y_NOW,"timeline_order"));

    if (hc_true($SECTION_SETTINGS, "full_screen")) { $section_css .= " full-screen"; $attributes .= ' data-offset="' . hc_get($SECTION_SETTINGS, "full_screen_height") . '" '; }
    if (hc_true($Y_NOW, "vertical_row")) $section_css .= " section-center";
    if (hc_get($Y_NOW, "section_width") == "full-width") $section_css .= " section-full-width";
    if (hc_get($Y_NOW, "animation") != "" && !hc_true($Y_NOW,"timeline_animation")) $container_css = " anima ";
    if (hc_get($Y_NOW, "timeline_animation") == "true") array_push($SUB_EXTRA, "timeline");
    if (hc_get($Y_NOW, "css_height") != "") $section_styles .= " height:" . hc_get($Y_NOW, "css_height") . "px";

    if (!empty($SECTION_SETTINGS)) {
        if ($SECTION_SETTINGS["component"] == "hc_section_image") {
            $image_post = hc_get($SECTION_SETTINGS,"bg_pos");
            $parallax = "";
            if (hc_true($SECTION_SETTINGS,"parallax")) {
                $image = hc_get_img_arr($SECTION_SETTINGS['image']);
                $section_css .= " " . hc_get($SECTION_SETTINGS, "ken_burn");
                if ($image_post == "bg-top") $image_post = "top";
                if ($image_post == "bg-bottom") $image_post = "bottom";
                $parallax =  ' data-parallax="scroll" data-natural-height="' . $image[1] . '" data-natural-width="' . $image[2] . '" data-position="' . $image_post . '" data-image-src="' . hc_get_img($SECTION_SETTINGS['image'], "hd") . '"' . hc_combine(hc_get($SECTION_SETTINGS,"bleed"),' data-bleed="','" ');
            } else {
                $section_css .= " " . $image_post;
                $section_styles .= 'background-image: url(' . hc_get_img($SECTION_SETTINGS['image'], "hd") . ');';
            }
?>
<section id="<?php echo esc_attr($Y_NOW['id']); ?>" class="section-image <?php echo $section_css ?>" <?php echo $animation_string . $parallax . $attributes; hc_combine_echo($section_styles,' style="','"') ?>>
    <?php hc_get_section_content($Y_NOW, $container_css, $SUB_EXTRA) ?>
</section>
<?php }
        if ($SECTION_SETTINGS["component"] == "hc_section_slider") {
            $attributes .= hc_combine(hc_get($SECTION_SETTINGS, "interval"), ' data-interval="', '"');
            if (hc_true($SECTION_SETTINGS, "slider_parallax"))  $attributes .= ' data-slider-parallax="true"';
?>
<section id="<?php echo esc_attr($Y_NOW['id']); ?>" class="section-slider <?php echo $section_css ?>" <?php echo $animation_string . $attributes; hc_combine_echo($section_styles,' style="','"') ?>>
    <div class="background-slider">
        <?php
            $tmp = $SECTION_SETTINGS["slides"];
            $html = "";
            for ($i = 0; $i < count($tmp); $i++) {
                $html .= '<div' . (($i == 0) ? ' class="active"':'') . ' style="background-image: url(' .  hc_get_img($tmp[$i]["link"],"hd") .')"></div>';
            }
            echo $html;
        ?>
    </div>
    <?php hc_get_section_content($Y_NOW, $container_css, $SUB_EXTRA) ?>
</section>
<?php }
        if ($SECTION_SETTINGS["component"] == "hc_section_video") {
?>
<section id="<?php echo esc_attr($Y_NOW['id']); ?>" class="section-video <?php echo $section_css ?>" <?php echo $animation_string . $attributes; hc_combine_echo($section_styles,' style="','"') ?>>
    <video autoplay playsinline loop muted poster="<?php echo hc_get_img(hc_get($SECTION_SETTINGS, "image"),"hd"); ?>">
        <source src="<?php echo esc_url($SECTION_SETTINGS['video']); ?>" type="video/mp4">
    </video>
    <?php hc_get_section_content($Y_NOW, $container_css, $SUB_EXTRA) ?>
</section>
<?php }
        if ($SECTION_SETTINGS["component"] == "hc_section_empty") { ?>
<section id="<?php echo esc_attr($Y_NOW['id']); ?>" class="section-base <?php echo $section_css ?>" <?php echo $animation_string . $attributes; hc_combine_echo($section_styles,' style="','"') ?>>
    <?php hc_get_section_content($Y_NOW, $container_css, $SUB_EXTRA) ?>
</section>
<?php }
    } else {
?>
<section id="<?php echo esc_attr($Y_NOW['id']); ?>" class="section-base <?php echo $section_css ?>" <?php echo $animation_string . $attributes; hc_combine_echo($section_styles,' style="','"') ?>>
    <?php hc_get_section_content($Y_NOW, $container_css, $SUB_EXTRA) ?>
</section>
<?php }
}
function hc_include_hc_section_two_blocks(&$Y_NOW,$EXTRA) {
    $animation_string = hc_get_scroll_animation(hc_get($Y_NOW,"animation"),hc_get($Y_NOW,"animation_time"), hc_get($Y_NOW,"timeline_animation"), hc_get($Y_NOW,"timeline_delay"), hc_get($Y_NOW,"timeline_order"));
    $section_css = hc_get_component_classes($Y_NOW,$EXTRA);
    $section_styles = hc_get($Y_NOW, "custom_css_styles");
    if (hc_true($Y_NOW,"inverse")) $section_css .= " section-block-right";
    if (hc_get($Y_NOW,"section_width") == "full-width") $section_css .= " section-full-width";
    if (hc_true($Y_NOW,"full")) $section_css .= " section-block-full";
?>
<section id="<?php echo esc_attr($Y_NOW['id']); ?>" class="section-block <?php echo $section_css ?>" <?php echo $animation_string; hc_combine_echo($section_styles,' style="','"') ?>>
    <div class="block-media">
        <?php
    if ($Y_NOW["video"] != "") {
        echo '<video autoplay loop muted poster="' . hc_get_img(hc_get($Y_NOW, "image"), "hd") . '"><source src="' . esc_url($Y_NOW['video']) . '" type="video/mp4"></video>';
    } else {
        if (hc_true($Y_NOW,"parallax")) {
            $image = hc_get_img_arr($Y_NOW['image']);
            echo '<div class="image" data-parallax="scroll" data-natural-height="' . $image[1] . '" data-natural-width="' . $image[2] . '" data-image-src="' . hc_get_img($Y_NOW['image'], "hd") . '"></div>';
        } else {
            echo '<div class="image" style="background-image:url(' . hc_get_img(hc_get($Y_NOW, "image"), "hd") . ')"></div>';
        }
    }
        ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
    $CURRENT_SECTION = $Y_NOW["section_content"];
    for ($i = 0; $i < count($CURRENT_SECTION); $i++) {
        hc_get_content_recursive($CURRENT_SECTION[$i], $EXTRA);
    }
                ?>
            </div>
            <div class="col">
                <?php
    $CURRENT_SECTION = $Y_NOW["custom_content"];
    for ($i = 0; $i < count($CURRENT_SECTION); $i++) {
        hc_get_content_recursive($CURRENT_SECTION[$i],$EXTRA);
    }
                ?>
            </div>
        </div>
    </div>
</section>
<?php }
function hc_include_hc_section_map(&$Y_NOW,$EXTRA) {
    $animation_string = hc_get_scroll_animation(hc_get($Y_NOW,"animation"),hc_get($Y_NOW,"animation_time"), hc_get($Y_NOW,"timeline_animation"), hc_get($Y_NOW,"timeline_delay"), hc_get($Y_NOW,"timeline_order"));
    $section_css = hc_get_component_classes($Y_NOW,$EXTRA);
    $section_styles = hc_get($Y_NOW, "custom_css_styles");
    $container_css = "";
    if (hc_get($Y_NOW,"animation") != "" && !hc_true($Y_NOW,"timeline_animation")) $container_css = " anima";
    if (hc_get($Y_NOW,"section_width") == "full-width") $section_css .= " section-full-width";
?>
<section class="section-map <?php echo hc_get($Y_NOW,"position") . " " . $section_css ?>" <?php echo $animation_string; hc_combine_echo($section_styles,' style="','"') ?>>
    <div class="google-map" data-address="<?php echo esc_attr($Y_NOW["map_address"]); ?>"
        data-zoom="<?php if (hc_get($Y_NOW,"map_zoom") != "") echo esc_attr($Y_NOW["map_zoom"]); else echo "12"; ?>"
        data-coords="<?php echo hc_get($Y_NOW,"map_coordinates"); ?>"
        data-marker-pos="<?php echo (hc_get($Y_NOW,"position") == "" ? "right" : "left"); ?>"
        data-skin="<?php echo hc_get($Y_NOW,"map_skin"); ?>"
        data-marker-offset-top="<?php echo hc_get($Y_NOW,"marker_position_top"); ?>"
        data-marker-offset-left="<?php echo hc_get($Y_NOW,"marker_position_left"); ?>"
        <?php if (strlen($Y_NOW["marker_image"]) > 0) echo ' data-marker="'. hc_get_img($Y_NOW["marker_image"]).'"'; ?>></div>
    <div class="container<?php echo $container_css ?>">
        <?php
    $CURRENT_SECTION = $Y_NOW["section_content"];
    for ($i = 0; $i < count($CURRENT_SECTION); $i++) {
        hc_get_content_recursive($CURRENT_SECTION[$i], $EXTRA);
    }
        ?>
    </div>
</section>
<?php }
?>


