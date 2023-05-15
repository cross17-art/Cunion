<?php
// =============================================================================
// IMAGE_BOX.PHP
// -----------------------------------------------------------------------------
// Hybric Composer image boxes front-end components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. IMAGE BOX - Documentation and demo: framework-y.com/components/image-box.html
//   02. ADVANCED IMAGE BOX - Documentation and demo: framework-y.com/components/image-box.html#advanced-image-box
//   03. IMAGE - Static image
// =============================================================================

function hc_include_hc_image_box(&$Y_NOW,$EXTRA) {
    $img = hc_get_img_arr($Y_NOW['image']);
    $css = "hc-cmp-image-box img-box " . hc_get_component_classes($Y_NOW, $EXTRA);
    $text = hc_get($Y_NOW, "caption_img_box");
    $img_animation = hc_get($Y_NOW, "image_animation");
    $icon_animation = hc_get($Y_NOW, "icon_animation");
    $icon = hc_get($Y_NOW, "icon");
    if ($img_animation != "") $css .= " img-" . $img_animation;
    if ($icon_animation != "") {
        $icon_animation = 'data-anima="'. hc_get($Y_NOW, 'icon_animation') . '" data-trigger="hover"';
        if (hc_true($Y_NOW,'icon_hidden')) $icon_animation .= ' data-hidden="true"';
    }
    if ($text != "") {
        $css .= " img-box-caption ";
    }
    $html = '<a id="' . hc_get($Y_NOW, "id") . '" ' . hc_get_link_settings($Y_NOW, $css) . hc_combine(hc_get($Y_NOW,"custom_css_styles"), ' style="', '" ') . $icon_animation . '>';
    $html .= '<img src="' . hc_get_img(hc_get($Y_NOW, "image"), hc_get($Y_NOW, "thumb_size", "large")) . '" alt="' . hc_get($Y_NOW, "alt") . '" data-width="' . $img[2] . '" data-height="' . $img[1] . '">';
    if ($text != "") {
        $html .= '<span>' . $text . '</span>';
    }
    if ($icon != "") {
        $html .= '<i class="' . $icon . (($icon_animation != "") ? ' anima':'') . '"></i>';
    }
    echo $html . '</a>';
    hc_set_content_lightbox($Y_NOW);
}
function hc_include_hc_media_box(&$Y_NOW,$EXTRA) {
    $css = "hc-cmp-media-box media-box media-box-" .  hc_get($Y_NOW, "box_style") . " " . hc_get_component_classes($Y_NOW, $EXTRA) . hc_combine(hc_get($Y_NOW, "image_animation"), " img-", "") . " " . hc_get($Y_NOW, "alignment");
    $animation = hc_combine(hc_get($Y_NOW, "content_animation"), ' data-anima="', '" data-trigger="hover" data-hidden="true"');
    $html = '<a id="' . hc_get($Y_NOW, "id") . '" ' . hc_get_link_settings($Y_NOW, $css) . hc_combine(hc_get($Y_NOW, "custom_css_styles"),' style="','"') . $animation . '>';
    $html .= '<img alt="' . hc_get($Y_NOW, "alt") . '" src="' . hc_get_img(hc_get($Y_NOW, "image"), hc_get($Y_NOW, "thumb_size", "large")) . '" />';
    $html .= '<div class="caption' . ($animation == "" ? "" : " anima") . '"><h2>' . hc_get($Y_NOW, "title") . '</h2>'. hc_combine(hc_get($Y_NOW, "extra_content"), '<div class="extra-field">', '</div>') . hc_combine(hc_get($Y_NOW, "subtitle"), '<h3>', '</h3>') . '<p>' . hc_get($Y_NOW, "text") . '</p></div></a>';
    echo $html;
    hc_set_content_lightbox($Y_NOW);
}
function hc_include_hc_image(&$Y_NOW,$EXTRA) {
    echo '<div' . hc_combine(hc_get($Y_NOW, "id"),' id="','" ') . hc_combine(hc_get($Y_NOW, "custom_css_styles"), ' style="', '" ') . 'class="hc-cmp-image' . hc_get_component_classes($Y_NOW,$EXTRA) . '"><img src="'. hc_get_img($Y_NOW['image'], hc_get($Y_NOW,"thumb_size","large")) . '" alt="' . esc_attr(hc_get($Y_NOW,'alt')) . '" ' . hc_get_animation($Y_NOW) . ' /></div>';
} ?>
