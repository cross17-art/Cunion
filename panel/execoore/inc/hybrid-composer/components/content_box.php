<?php
// =============================================================================
// CONTENT_BOX.PHP
// -----------------------------------------------------------------------------
// Hybric Composer content boxes front-end components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. CONTENT BOX - Documentation and demo: framework-y.com/components/content-box.html
//   02. NICHE CONTENT BOX BLOG - Documentation and demo: framework-y.com/components/content-box.html#niche-box
//   03. NICHE CONTENT BOX TESTIMONIALS - Documentation and demo: framework-y.com/components/content-box.html#niche-box
//   04. NICHE CONTENT BOX TEAM - Documentation and demo: framework-y.com/components/content-box.html#niche-box
//   05. NICHE CONTENT BOX PRICING TABLES - Documentation and demo: framework-y.com/components/content-box.html#niche-box
//   06. NICHE CONTENT BOX CALL TO ACTION - Documentation and demo: framework-y.com/components/content-box.html#niche-box
// =============================================================================

function hc_include_hc_content_box(&$Y_NOW,$EXTRA) {
    $style = $Y_NOW['box_style'];
    $css = "cnt-box hc-cmp-content-box " . hc_get($Y_NOW, "alignment");
    $title = '<h2' . ((hc_get($Y_NOW,"title_size") != "") ? ' class="' . hc_get($Y_NOW,"title_size") . '"':'') . '>' . hc_get($Y_NOW,"title") . '</h2>';
    $text_size = hc_get($Y_NOW,"text_size");
    if (hc_true($Y_NOW,"boxed")) $css .= " boxed";
    if (hc_get($Y_NOW,"extra_content") != "") $css .= " extra-field-cnt";
    $button = "";
    $button_out = "";
    if (hc_get($Y_NOW,"button_style") == "hidden" || hc_get($Y_NOW, "button_text") == "") {
        $css .= " " . hc_get_link_classes($Y_NOW);
        if (hc_get($Y_NOW, "link_type") == "custom") {
            $button_out .= ' data-href="#lightbox_' . $Y_NOW["id"] . '"';
        } else {
            $button_out = ' data-href="' . $Y_NOW["link"] . '"';
        }
        if (hc_true($Y_NOW, "new_window")) $button_out .= ' data-target="_blank"';
        if (hc_get($Y_NOW, "lightbox_animation") > 0) $button_out .= ' data-lightbox-anima="' . hc_get($Y_NOW, "lightbox_animation") .'"';
    } else {
        if (hc_get($Y_NOW, "button_text") != "") {
            $icon = hc_combine(hc_get($Y_NOW, "button_icon"), '<i class="', '"></i>');
            $button = '<a ' . hc_get_link_settings($Y_NOW, hc_get_button_style(hc_get($Y_NOW, "button_style"), hc_get($Y_NOW, "button_dimensions", "btn-sm"), $icon, hc_true($Y_NOW, "button_animation")))  . '>' . $icon . hc_json(hc_get($Y_NOW, "button_text")) . '</a>';
        }
    }
    $component_code = hc_combine(hc_get($Y_NOW, "custom_css_styles"),'style="','" ') . $button_out . hc_get_animation($Y_NOW);
    if ($style == "side_content") {
?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box-side <?php echo hc_get_component_classes($Y_NOW,$EXTRA) . $css; ?>" <?php echo $component_code ?>>
    <a <?php if ($button_out == "") echo hc_get_link_settings($Y_NOW, "img-box") ?>>
        <img src="<?php echo hc_get_img($Y_NOW["image"], "ultra-large") ?>" alt="<?php echo hc_get($Y_NOW, "alt") ?>" />
    </a>
    <div class="caption">
        <?php
        echo $title;
        hc_combine_echo(hc_get($Y_NOW,"extra_content"),'<div class="extra-field">','</div>');
        echo '<p class="' . $text_size . '">' . hc_json(hc_get($Y_NOW,"text")) . '</p>';
        echo $button
        ?>
    </div>
</div>
<?php hc_set_content_lightbox($Y_NOW); ?>
<?php }
    if ($style == "top_icon_image") {
?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box-top <?php echo hc_get_component_classes($Y_NOW,$EXTRA) . $css; ?>" <?php echo $component_code ?>>
    <a <?php if ($button_out == "") echo hc_get_link_settings($Y_NOW, "img-box") ?>>
        <img src="<?php echo hc_get_img($Y_NOW["image"],"ultra-large") ?>" alt="<?php echo hc_get($Y_NOW, "alt") ?>" />
    </a>
    <div class="caption">
        <?php
        echo $title;
        hc_combine_echo(hc_get($Y_NOW,"extra_content"),'<div class="extra-field">','</div>');
        echo '<p class="' . $text_size . '">' . hc_json(hc_get($Y_NOW,"text")) . '</p>';
        echo $button
        ?>
    </div>
</div>
<?php }
    if ($style == "top_icon") {
?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box-top-icon <?php echo hc_get_component_classes($Y_NOW,$EXTRA) . $css; ?>" <?php echo $component_code ?>>
    <?php echo hc_get_icon(hc_get($Y_NOW,"icon"), hc_get($Y_NOW,"icon_style"), hc_get($Y_NOW,"icon_image"), ""); ?>
    <div class="caption">
        <?php
        echo $title;
        hc_combine_echo(hc_get($Y_NOW,"extra_content"),'<div class="extra-field">','</div>');
        echo '<p class="' . $text_size . '">' . hc_json(hc_get($Y_NOW,"text")) . '</p>';
        echo $button
        ?>
    </div>
</div>
<?php }
    if ($style == "side_icon") {
?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box-side-icon <?php echo hc_get_component_classes($Y_NOW,$EXTRA) . $css; ?>" <?php echo $component_code ?>>
    <?php echo hc_get_icon(hc_get($Y_NOW,"icon"), hc_get($Y_NOW,"icon_style"), hc_get($Y_NOW,"icon_image"), ""); ?>
    <div class="caption">
        <?php
        echo $title;
        hc_combine_echo(hc_get($Y_NOW,"extra_content"),'<div class="extra-field">','</div>');
        echo '<p class="' . $text_size . '">' . hc_json(hc_get($Y_NOW,"text")) . '</p>';
        echo $button
        ?>
    </div>
</div>
<?php }
    if ($style == "multiple_box") {
        $icon = hc_get_icon(hc_get($Y_NOW,"icon"), hc_get($Y_NOW,"icon_style"), hc_get($Y_NOW,"icon_image"), "");
?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box-badge <?php echo hc_get_component_classes($Y_NOW,$EXTRA) . $css; ?>" <?php echo $component_code ?>>
    <a <?php if ($button_out == "") echo hc_get_link_settings($Y_NOW, "img-box") ?>>
        <img src="<?php echo hc_get_img($Y_NOW["image"],"ultra-large") ?>" alt="<?php echo hc_get($Y_NOW, "alt") ?>" />
    </a>
    <div class="caption">
        <?php
        echo '<div class="badge">' . ($icon == "" ?  hc_get($Y_NOW,"extra_content") : $icon) . '</div>';
        echo $title;
        if ($icon != "") hc_combine_echo(hc_get($Y_NOW,"extra_content"),'<div class="extra-field">','</div>');
        echo '<p class="' . $text_size . '">' . hc_json(hc_get($Y_NOW,"text")) . '</p>';
        echo $button
        ?>
    </div>
</div>
<?php }
}
function hc_include_hc_info_box(&$Y_NOW,$EXTRA) {
    $css = "cnt-box hc-cmp-content-box " . hc_get($Y_NOW, "alignment");
    $title = '<h2' . ((hc_get($Y_NOW,"title_size") != "") ? ' class="' . hc_get($Y_NOW,"title_size") . '"':'') . '>' . hc_get($Y_NOW,"title") . '</h2>';
    $text_size = hc_get($Y_NOW,"text_size");
    if (hc_true($Y_NOW,"boxed")) $css .= " boxed";
    $button = "";
    $button_out = "";
    if (hc_get($Y_NOW,"button_style") == "hidden" || hc_get($Y_NOW, "button_text") == "") {
        $css .= " " . hc_get_link_classes($Y_NOW);
        if (hc_get($Y_NOW, "link_type") == "custom") {
            $button_out .= ' data-href="#lightbox_' . $Y_NOW["id"] . '"';
        } else {
            $button_out = ' data-href="' . $Y_NOW["link"] . '"';
        }
        if (hc_true($Y_NOW, "new_window")) $button_out .= ' data-target="_blank"';
        if (hc_get($Y_NOW, "lightbox_animation") > 0) $button_out .= ' data-lightbox-anima="' . hc_get($Y_NOW, "lightbox_animation") .'"';
    } else {
        if (hc_get($Y_NOW, "button_text") != "") {
            $icon = hc_combine(hc_get($Y_NOW, "button_icon"), '<i class="', '"></i>');
            $button = '<a ' . hc_get_link_settings($Y_NOW, hc_get_button_style(hc_get($Y_NOW, "button_text"), hc_get($Y_NOW, "button_dimensions", "btn-sm"), $icon, hc_true($Y_NOW, "button_animation")))  . '>' . $icon . hc_json(hc_get($Y_NOW, "button_text")) . '</a>';
        }
    }
    $component_code = hc_combine(hc_get($Y_NOW, "custom_css_styles"),'style="','" ') . $button_out . hc_get_animation($Y_NOW);
?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box-info <?php echo hc_get_component_classes($Y_NOW,$EXTRA) . $css; ?>" <?php echo $component_code ?>>
    <?php hc_combine_echo(hc_get($Y_NOW,"extra_content"),'<div class="extra-field">','</div>'); ?>
    <a <?php if ($button_out == "") echo hc_get_link_settings($Y_NOW, "img-box") ?>>
        <img src="<?php echo hc_get_img($Y_NOW["image"], "ultra-large") ?>" alt="<?php echo hc_get($Y_NOW, "alt") ?>" />
    </a>
    <div class="caption">
        <?php echo $title ?>
        <div class="cnt-info">
            <?php
    hc_combine_echo(hc_get($Y_NOW,"info_1"),'<div>','</div>');
    hc_combine_echo(hc_get($Y_NOW,"info_2"),'<div>','</div>');
    hc_combine_echo(hc_get($Y_NOW,"info_3"),'<div>','</div>');
    hc_combine_echo(hc_get($Y_NOW,"info_4"),'<div>','</div>');
            ?>
        </div>
        <?php echo '<p class="' . $text_size . '">' . hc_json(hc_get($Y_NOW,"text")) . '</p>' ?>
        <?php hc_combine_echo(hc_get($Y_NOW,"bottom_content"),'<div class="bottom-info">','</div>'); ?>
        <?php echo $button ?>
    </div>
</div>
<?php hc_set_content_lightbox($Y_NOW);
}
function hc_include_hc_niche_content_box_testimonials(&$Y_NOW,$EXTRA) {
    if ($Y_NOW["box_style"] == "style_1") { ?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box hc-cmp-niche-content-box-testimonials cnt-box-testimonials <?php echo hc_get_component_classes($Y_NOW,$EXTRA) ?>" <?php hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','" '); echo hc_get_animation($Y_NOW) ?>>
    <img src="<?php echo hc_get_img($Y_NOW["image"], "thumbnail") ?>" alt="<?php echo hc_get($Y_NOW, "alt") ?>" />
    <p>
        <?php echo nl2br(hc_json(hc_get($Y_NOW, "text"))) ?>
    </p>
    <p class="testimonial-info">
        <?php echo '<span>' . hc_get($Y_NOW, "title") . '</span><span>' . hc_get($Y_NOW, "subtitle") . '</span>' ?>
    </p>
</div>
<?php }
    if ($Y_NOW["box_style"] == "style_2") { ?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box hc-cmp-niche-content-box-testimonials cnt-box-testimonials-bubble <?php echo hc_get_component_classes($Y_NOW,$EXTRA) ?>" <?php hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','" '); echo hc_get_animation($Y_NOW) ?>>
    <p>
        <?php echo nl2br(hc_json(hc_get($Y_NOW, "text"))) ?>
    </p>
    <div class="thumb-bar">
        <img src="<?php echo hc_get_img($Y_NOW["image"], "thumbnail") ?>" alt="<?php echo hc_get($Y_NOW, "alt") ?>" />
        <p>
            <?php echo '<span>' . hc_get($Y_NOW, "title") . '</span><span>' . hc_get($Y_NOW, "subtitle") . '</span>' ?>
        </p>
    </div>
</div>
<?php }
}
function hc_include_hc_niche_content_box_team(&$Y_NOW,$EXTRA) { ?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box hc-cmp-niche-content-box-team cnt-box-team <?php echo hc_get_component_classes($Y_NOW,$EXTRA) ?>" <?php hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','" '); hc_combine_echo(hc_get($Y_NOW,"link"),' data-href="','" '); echo hc_get_animation($Y_NOW) ?>>
    <img src="<?php echo hc_get_img($Y_NOW["image"], "large") ?>" alt="<?php echo hc_get($Y_NOW, "alt") ?>" />
    <div class="caption">
        <h2>
            <?php echo esc_attr(hc_get($Y_NOW,"title")) ?>
        </h2>
        <span>
            <?php echo esc_attr(hc_get($Y_NOW,"subtitle")) ?>
        </span>
        <span class="icon-links">
            <?php
    hc_combine_echo(esc_url(hc_get($Y_NOW, "social_fb")),' <a target="_blank" href="','"><i class="icon-facebook"></i></a>');
    hc_combine_echo(esc_url(hc_get($Y_NOW, "social_tw")),' <a target="_blank" href="','"><i class="icon-twitter"></i></a>');
    hc_combine_echo(esc_url(hc_get($Y_NOW, "social_pi")),' <a target="_blank" href="','"><i class="icon-pinterest"></i></a>');
    hc_combine_echo(esc_url(hc_get($Y_NOW, "social_in")),' <a target="_blank" href="','"><i class="icon-linkedin"></i></a>');
    hc_combine_echo(esc_url(hc_get($Y_NOW, "social_yt")),' <a target="_blank" href="','"><i class="icon-youtube"></i></a>');
    hc_combine_echo(esc_url(hc_get($Y_NOW, "social_ig")),' <a target="_blank" href="','"><i class="icon-instagram"></i></a>');
            ?>
        </span>
        <p>
            <?php echo hc_get($Y_NOW, "text") ?>
        </p>
    </div>
</div>
<?php }
function hc_include_hc_niche_content_box_pricing_table(&$Y_NOW,$EXTRA) {
    $css = hc_get_component_classes($Y_NOW,$EXTRA);
    if (hc_true($Y_NOW, "featured")) {
        $css .= " pricing-table-big";
    }
?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box hc-cmp-niche-content-box-pricing-table cnt-pricing-table <?php echo $css ?>" <?php hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','" '); echo hc_get_animation($Y_NOW) ?>>
    <div class="top-area">
        <h2>
            <?php echo hc_get($Y_NOW, "title") ?>
        </h2>
        <div class="price">
            <?php echo "<label>" . hc_get($Y_NOW, "price_unit") . "</label>"  . "<span>" . hc_get($Y_NOW, "price") .  "</span>" ?>
        </div>
        <p>
            <?php echo hc_get($Y_NOW, "subtitle") ?>
        </p>
    </div>
    <ul>
        <?php
    $arr = $Y_NOW["rows"];
    $html = "";
    for ($i = 0; $i < count($arr); $i++) {
        $html .= "<li>" . $arr[$i]["text"] . "</li>";
    }
    echo $html;
        ?>
    </ul>
    <?php
    $link = hc_get($Y_NOW, "button_link");
    if ($link != "") echo '<div class="bottom-area"><a class="' . hc_get_button_style(hc_get($Y_NOW,"button_style")) . ' btn-sm" href="' . esc_url($link) . '">' . hc_get($Y_NOW, "button_text", "Details") .'</a></div>';
    ?>
</div>
<?php }
function hc_include_hc_niche_content_box_call(&$Y_NOW,$EXTRA) { ?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="cnt-box hc-cmp-niche-content-box-call cnt-call <?php echo hc_get_component_classes($Y_NOW,$EXTRA) ?>" <?php hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','" '); echo hc_get_animation($Y_NOW) ?>>
    <?php echo hc_get_icon(hc_get($Y_NOW,"icon"), hc_get($Y_NOW,"icon_style"), hc_get($Y_NOW,"icon_image"), ""); ?>
    <div class="caption">
        <?php
    hc_combine_echo(hc_get($Y_NOW,"title"),'<h2>','</h2>');
    hc_combine_echo(hc_json(hc_get($Y_NOW,"content")),"<p>","</p>");
        ?>
        <a <?php hc_set_link_settings($Y_NOW, " btn btn-xs btn-border"); ?>>
            <?php echo esc_attr(hc_get($Y_NOW,"button_text")); ?>
        </a>
    </div>
</div>
<?php hc_set_content_lightbox($Y_NOW);
} ?>

