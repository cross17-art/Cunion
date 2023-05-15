<?php
// =============================================================================
// HEADER.PHP
// -----------------------------------------------------------------------------
// Hybric Composer titles front-end components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. TITLE IMAGE - Documentation and demo: framework-y.com/components/title/template-title-image.html
//   02. TITLE SLIDER - Documentation and demo: framework-y.com/components/title/template-title-slider.html
//   03. TITLE VIDEO - Documentation and demo: framework-y.com/components/title/template-title-video-mp4.html
//   04. TITLE BASE - Documentation and demo: framework-y.com/components/title/template-title-base-1.html
// =============================================================================

$NOW_SUB = $Y_NOW['title_content'];
$css = (hc_true($NOW_SUB, "light") ? "light " : "") . (hc_true($NOW_SUB, "full_screen") ? "full-screen " : "") . hc_get($NOW_SUB, "alignment") . " ";
$parallax = hc_get($NOW_SUB,'parallax');
$fullscreen_offset = hc_combine(hc_get($NOW_SUB, "full_screen_height"),' data-offset="','"');
$title_content = '<div class="container"><h1>' . hc_json(hc_get_the_title($post_id)[0]) . '</h1>' . hc_combine(hc_get($Y_NOW, "subtitle"), "\n<h2>", "</h2>") . (hc_true($NOW_SUB,"breadcrumbs") ? hc_get_breadcrumb("", $post_id) : "") . '</div>';

if ($NOW_SUB["component"] == "hc_title_image") {
    $image_code = "";
    $tmp = explode("|", hc_get($NOW_SUB,'image'));
    if ($parallax && count($tmp) > 1) {
        $image_code = 'data-parallax="scroll" data-natural-height="' .  $tmp[1] . '" data-natural-width="' . $tmp[2] . '" data-position="top" data-image-src="' . hc_get_img($NOW_SUB['image'],"hd") . '"' . hc_combine(hc_get($NOW_SUB,"bleed"),' data-bleed="','"');
    } else { 
        $image_code = 'style="background-image: url(' . hc_get_img(hc_get($NOW_SUB,'image'), "hd") . ');"'; 
    }
?>
<header id="header" class="hc-cmp-header hc-component header-image <?php echo $css . esc_attr(hc_get($NOW_SUB,'ken_burn')); ?>" <?php echo $image_code . $fullscreen_offset ?>>
    <?php echo $title_content; ?>
</header>
<?php }
if ($NOW_SUB["component"] == "hc_title_slider") {
?>
<header id="header" class="hc-cmp-header hc-component header-slider <?php echo $css ?>" <?php echo $fullscreen_offset . hc_combine(hc_get($NOW_SUB, "interval"),' data-interval="','"') ?>>
    <div class="background-slider">
    <?php
    $tmp = $NOW_SUB["slides"];
    $html = "";
    for ($i = 0; $i < count($tmp); $i++) {
        $html .= '<div' . (($i == 0) ? ' class="active"':'') . ' style="background-image: url(' .  hc_get_img($tmp[$i]["link"],"hd") .')"></div>';
    }
    echo $html;
    ?>
    </div>
    <?php echo $title_content; ?>
</header>
<?php }
if ($NOW_SUB["component"] == "hc_title_video") {
?>
<header id="header" class="hc-cmp-header hc-component header-video <?php echo $css . ($parallax ? "video-parallax":"") ?>" <?php echo $fullscreen_offset ?>>
    <video autoplay loop muted poster="<?php echo hc_get_img(hc_get($NOW_SUB, "image"),"hd"); ?>">
        <source src="<?php echo esc_url($NOW_SUB['video']); ?>" type="video/mp4">
    </video>
    <?php echo $title_content; ?>
</header>
<?php }
if ($NOW_SUB["component"] == "hc_title_base") {
?>
<header id="header" class="hc-cmp-header hc-component header-base <?php echo $css ?>" <?php hc_combine_echo(hc_get_img(hc_get($NOW_SUB,'image')),'style="background-image: url(',')"') ?>>
   <?php echo $title_content; ?>
</header>
<?php } ?>
<main>
