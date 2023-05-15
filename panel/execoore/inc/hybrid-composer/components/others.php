<?php
// =============================================================================
// OTHERS.PHP
// -----------------------------------------------------------------------------
// Hybric Composer various front-end components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. TITLE TAG - H1 to H6 title tags
//   03. VIDEO - Video
//   04. BUTTON -  Documentation and demo: framework-y.com/components/components-bootstrap.html
//   05. TITLE TAG - H1 to H6 title tags
//   06. SUBTITLE - Documentation and demo: framework-y.com/components/typography.html
//   07. TEXT BLOCK -  Basic row text and html block
//   08. WYSIWYG EDITOR - Documentation and demo: wysiwygjs.github.io
//   09. ICON LIST - Documentation and demo: framework-y.com/components/components.html
//   10. ICON BOX - Documentation and demo: framework-y.com/components/components.html
//   11. TEXT LIST - Documentation and demo: framework-y.com/components/components.html#lists
//   12. COUNTER - Documentation and demo: framework-y.com/components/components.html#counter
//   13. COUNTDOWN - Documentation and demo: framework-y.com/components/components.html#countdown
//   14. PROGRESS BAR - Documentation and demo: framework-y.com/components/components.html#progress-bar
//   15. CIRCLE PROGRESS BAR - Documentation and demo: framework-y.com/components/components.html#circle-progress-bar
//   16. TIMELINE - Documentation and demo: framework-y.com/components/components.html#timeline
//   17. GOOGLE MAP - Documentation and demo: framework-y.com/components/components.html#google-maps
//   18. SOCIAL FEEDS - Documentation and demo: framework-y.com/components/social.html
//   19. SOCIAL SHARE BUTTONS - Documentation and demo: framework-y.com/components/social.html#social
//   20. QUOTE - Documentation and demo: framework-y.com/components/typography.html#block-quotes
//   21. SEPARATORS - Documentation and demo: framework-y.com/components/typography.html#separators
//   22. SPACE - Documentation and demo: framework-y.com/components/components-base.html
//   23. TABLE - Documentation and demo: framework-y.com/components/components.html#table-bootgrid
//   24. FULL-PAGE MENU - Part of composer-side.php, this component is outside the main container. Documentation and demo:  framework-y.com/templates/fullpage/template-fullpage-documentation.html
//   25. INNER MENU - Documentation and demo: framework-y.com/components/menu/menu-inner-horizontal.html
//   26. CONTACT FORM - Documentation and demo: framework-y.com/components/php-contact-form.html
//   27. WORDPRESS EDITOR - Wordpress WYSIWYG editor
//   28. CODE BLOCK - Raw code string
//   29. FULLPAGE COMPONENTS - Exclusive fullpage template components
// =============================================================================

function hc_include_hc_title_tag(&$Y_NOW,$EXTRA) {
    echo "<" . esc_attr($Y_NOW["tag"]) . " " . hc_combine(esc_attr($Y_NOW["id"]),'id="','"') . " class='hc-cmp-title-tag ". hc_get_component_classes($Y_NOW,$EXTRA) . "' style='" .  hc_get($Y_NOW,"custom_css_styles") . "' " . hc_get_animation($Y_NOW) . ">" . wp_kses_post($Y_NOW["text"]) . "</" . esc_attr($Y_NOW["tag"]) . ">";
}
function hc_include_hc_video(&$Y_NOW,$EXTRA) {
    $width = "100%";
    if ($Y_NOW['width'] != "") $width = esc_attr($Y_NOW['width']) . "px";
    if (strpos($Y_NOW['link'],'.mp4') !== false) { ?>
<video <?php hc_combine_echo(esc_attr($Y_NOW["id"]),'id="','" '); ?>
    <?php if ($Y_NOW['autoplay'] == "true") echo "autoplay ";
          if ($Y_NOW['loop'] == "true") echo "loop ";
          if ($Y_NOW['muted'] == "true") echo "muted "; 
          if ($Y_NOW['controls'] == "true") echo "controls "; 
          hc_combine_echo(esc_attr($Y_NOW['height']),'height="','"')?> class="hc-cmp-video video-box <?php echo hc_get_component_classes($Y_NOW,$EXTRA) ?>" style="<?php echo 'width: ' . esc_attr($width) . '; ' .  hc_get($Y_NOW,"custom_css_styles") ?>" <?php echo hc_get_animation($Y_NOW) ?>>
    <source src="<?php echo esc_url($Y_NOW['link']); ?>" type="video/mp4">
</video>
<?php } else {
        $att = "?modestbranding=1&rel=0&showinfo=0";
        if ($Y_NOW['autoplay'] == "true") $att .= "&autoplay=1";
        if ($Y_NOW['loop'] == "true") $att .= "&loop=1&playlist=" . hc_get_youtube_id($Y_NOW['link']);
        if ($Y_NOW['controls'] != "true") $att .= "&controls=0";
?>

<iframe <?php hc_combine_echo(esc_attr($Y_NOW["id"]),'id="','"'); ?> <?php hc_combine_echo(esc_attr($Y_NOW['height']),' height="','"') ?>
    src="<?php echo esc_url('//www.youtube.com/embed/' . hc_get_youtube_id($Y_NOW['link']) . $att); ?>" allowfullscreen class="hc-cmp-video video-box <?php echo hc_get_component_classes($Y_NOW,$EXTRA) ?>" style="border:none; <?php echo 'width: ' . esc_attr($width) . '; ' . hc_get($Y_NOW,"custom_css_styles") ?>" <?php echo hc_get_animation($Y_NOW) ?>></iframe>
<?php }
}
function hc_include_hc_text_block(&$Y_NOW,$EXTRA) {
    $content = str_replace("\n", "<br />", $Y_NOW["content"]);
    $content = hc_json($content);
    echo "<p " . hc_combine(esc_attr($Y_NOW["id"]),'id="','"') . " class='hc-cmp-text-block ". hc_get_component_classes($Y_NOW,$EXTRA) . "' style='" . hc_get($Y_NOW,"custom_css_styles") . "' " . hc_get_animation($Y_NOW) . ">" . do_shortcode($content) . "</p>";
}
function hc_include_hc_wp_editor(&$Y_NOW,$EXTRA) {  ?>
<div <?php hc_combine_echo(esc_attr($Y_NOW["id"]),'id="','"'); ?> class="hc-cmp-wp-editor wp-editor <?php echo hc_get_component_classes($Y_NOW,$EXTRA); ?>" style="<?php  echo hc_get($Y_NOW,"custom_css_styles"); ?>" <?php echo hc_get_animation($Y_NOW) ?>>
    <?php
    $tmp = wpautop(hc_json($Y_NOW["editor_content"]));
    $tmp = str_replace("\n&nbsp;\n","<br /><br />",$tmp);
    echo do_shortcode($tmp);
    ?>
</div>
<?php } ?>
<?php
function hc_include_hc_button(&$Y_NOW,$EXTRA) {
    $css_classes = "hc-cmp-button " . hc_get_component_classes($Y_NOW, $EXTRA) . " " . hc_get_button_style(hc_get($Y_NOW, "style"));
    $icon = "";
    $cnt = "";
    $cnt_end = "";
    if (hc_get($Y_NOW, "style") != "link") $css_classes .=  " " . hc_get($Y_NOW, "size");
    if (hc_true($Y_NOW, "inner_animation"))  $css_classes .=  " btn-anima ";
    if (hc_get($Y_NOW, "position")  == "full")  $css_classes .=  " full-width ";
    if (hc_get($Y_NOW, "icon") != "") { $css_classes .=  " btn-icon ";  $icon = '<i class="' . hc_get($Y_NOW, "icon") . '"></i>'; }
    if (hc_get($Y_NOW, "position") == "center") { $cnt = '<div class="align-center">'; $cnt_end = '</div>'; }
    if (hc_get($Y_NOW, "position") == "right") { $cnt = '<div class="align-right">'; $cnt_end = '</div>'; }
    echo $cnt . '<a ' .  hc_combine(hc_get($Y_NOW, "id"), 'id="', '" ') . hc_get_link_settings($Y_NOW, $css_classes) . hc_get_animation($Y_NOW) . hc_combine(hc_get($Y_NOW, "custom_css_styles"), ' style="', '" ') . '>' . $icon . hc_json(hc_get($Y_NOW, "text")) . '</a>' . $cnt_end;
    hc_set_content_lightbox($Y_NOW);
}
function hc_include_hc_icon_list(&$Y_NOW,$EXTRA) {
    $css =  hc_get_component_classes($Y_NOW, $EXTRA) . " " . hc_get($Y_NOW, "style") . " " . hc_get($Y_NOW, "size") . " " . hc_get($Y_NOW, "direction");
    echo '<ul ' . hc_combine(hc_get($Y_NOW, "id"), 'id="', '"') . ' class="hc-cmp-icon-list icon-list ' . $css . '" ' . hc_combine(hc_get($Y_NOW, "custom_css_styles"), 'style="', '" ') . hc_get_animation($Y_NOW) . '>';
    $html = "";
    $arr = $Y_NOW["rows"];
    for ($i = 0; $i < count($arr); $i++) {
        $html .= '<li>' . hc_combine($arr[$i]["icon"],'<i class="','"></i>') . '<p>' . $arr[$i]["text"] . '</p></li>';
    }
    echo $html . '</ul>';
}
function hc_include_hc_icon_box(&$Y_NOW,$EXTRA) {
    $css = hc_get($Y_NOW,"icon_position", "icon-box-left") . " " . hc_get_component_classes($Y_NOW,$EXTRA) . " " . hc_get($Y_NOW, "alignment");
    echo '<div' .  hc_combine(hc_get($Y_NOW,"id"),' id="','"') . ' class="hc-cmp-icon-box icon-box ' . $css. '"' . hc_combine(hc_get($Y_NOW,"custom_css_styles"), ' style="','" ') . hc_get_animation($Y_NOW) . '><i class="' . hc_get($Y_NOW,"icon") . ' ' . hc_get($Y_NOW, "icon_size") . '"></i><div class="caption"><h3' . hc_combine(hc_get($Y_NOW,"title_size"),' class="','"') . '>' .  hc_get($Y_NOW,"title") . '</h3><p' . hc_combine(hc_get($Y_NOW,"text_size"),' class="','"') . '>' . hc_json($Y_NOW["subtitle"]) . '</p></div></div>';
}
function hc_include_hc_text_list(&$Y_NOW,$EXTRA) {
    $arr = hc_get($Y_NOW, "rows");
    $type = hc_get($Y_NOW, "type");
    $html = '<ul id="' . hc_get($Y_NOW, "id") . '" class="hc-cmp-text-list text-list text-list-' . $type . ' ' . hc_get_component_classes($Y_NOW,$EXTRA) . '"' . hc_combine(hc_get($Y_NOW,"custom_css_styles"),' style="','"') . hc_get_animation($Y_NOW) . '>';
    if ($type == "base" || $type ==  "side") {
        for ($i = 0; $i < count($arr); $i++) {
            $html .= '<li><h3>' . hc_get($arr[$i], "title") . '</h3><p>' . hc_get($arr[$i], "subtitle") . '</p>' . hc_combine(hc_get($arr[$i], "extra"), "<div>", "</div>") . '</li>';
        }
    }
    if ($type == "image") {
        for ($i = 0; $i < count($arr); $i++) {
            $html .= '<li><img src="' .  hc_get_img(hc_get($arr[$i], "image_link", "http://placehold.it/90x90"), "medium") . '" alt="" /><div class="content"><h3>' . hc_get($arr[$i], "title") . '</h3><p>' . hc_get($arr[$i], "subtitle") . '</p>' . hc_combine(hc_get($arr[$i], "extra"), "<div>", "</div>") . '</div></li>';
        }
    }
    if ($type == "line" || $type == "bold") {
        $hr = ($type == "line" ? "<hr />":"");
        for ($i = 0; $i < count($arr); $i++) {
            $html .= '<li><b>' . hc_get($arr[$i], "title") . '</b>' . $hr . '<p>' . hc_get($arr[$i], "subtitle") . hc_combine(hc_get($arr[$i], "extra"), "<span>", "</span>") . '</p></li>';
        }
    }
    echo $html . '</ul>';
}
function hc_include_hc_counter(&$Y_NOW, $EXTRA) {
?>
<div id="<?php echo hc_get($Y_NOW, "id") ?>" class="hc-cmp-counter counter counter-icon <?php echo hc_get($Y_NOW, "style") . " " . hc_get_component_classes($Y_NOW,$EXTRA); ?>" <?php hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','" '); echo hc_get_animation($Y_NOW) ?>>
    <?php echo hc_get_icon(hc_get($Y_NOW, "icon"), hc_get($Y_NOW, "icon_style"), hc_get($Y_NOW, "icon_image"), hc_get($Y_NOW, "icon_size","text-md")) ?>
    <div>
        <?php hc_combine_echo(hc_get($Y_NOW, "title"), "<h3>", "</h3>"); ?>
        <div class="value">
            <span class="<?php echo hc_get($Y_NOW, "text_size", "text-md"); ?>" data-to="<?php echo hc_get($Y_NOW, "count_to"); ?>" <?php hc_combine_echo(hc_get($Y_NOW, "from"),' data-from="','"'); hc_combine_echo(hc_get($Y_NOW, "speed"),' data-speed="','"'); hc_combine_echo(hc_get($Y_NOW, "separator"),' data-separator="','"'); hc_combine_echo(hc_get($Y_NOW, "interval"),' data-refresh-interval="','"'); ?>>0</span>
            <?php hc_combine_echo(hc_get($Y_NOW, "subtitle"), "<span class='" .  hc_get($Y_NOW, "text_size_2") . "'>", "</span>"); ?>
        </div>
    </div>
</div>
<?php
}
function hc_include_hc_countdown(&$Y_NOW,$EXTRA) {
    $number_size = hc_get($Y_NOW, "number_size", "text-md");
    $text_size = hc_get($Y_NOW, "text_size", "");
?>
<div id="<?php echo hc_get($Y_NOW, "id") ?>" class="hc-cmp-countdown countdown <?php echo hc_get($Y_NOW, "style") . " " . hc_get_component_classes($Y_NOW,$EXTRA); ?>" <?php hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','" '); echo  hc_get_animation($Y_NOW) ?>>
    <?php hc_combine_echo(hc_get($Y_NOW, "title"), "<h3>", "</h3>"); ?>
    <div data-time="<?php echo hc_get($Y_NOW, "date") ?>" data-utc-offset="<?php echo hc_get($Y_NOW, "offset") ?>">
        <?php
    $html = "";
    if (hc_true($Y_NOW, "days")) $html .= '<div><span class="days ' . $number_size . '">00</span><span class="label-days ' . $text_size . '">' . hc_get($Y_NOW,"days_text") .'</span></div>';
    if (hc_true($Y_NOW, "hours")) $html .= '<div><span class="hours ' . $number_size . '">00</span><span class="label-hours ' . $text_size . '">' . hc_get($Y_NOW,"hours_text") .'</span></div>';
    if (hc_true($Y_NOW, "minutes")) $html .= '<div><span class="minutes ' . $number_size . '">00</span><span class="label-minutes ' . $text_size . '">' . hc_get($Y_NOW,"minutes_text") .'</span></div>';
    if (hc_true($Y_NOW, "seconds")) $html .= '<div><span class="seconds ' . $number_size . '">00</span><span class="label-seconds ' . $text_size . '">' . hc_get($Y_NOW,"seconds_text") .'</span></div>';
    echo $html;
        ?>
    </div>
    <?php hc_combine_echo(hc_get($Y_NOW, "subtitle"), "<p>", "</p>"); ?>
</div>
<?php
}
function hc_include_hc_progress_bar(&$Y_NOW,$EXTRA) {
    $html = '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-cmp-progress-bar progress-bar ' . hc_get_component_classes($Y_NOW,$EXTRA) . '"' . hc_combine(hc_get($Y_NOW,"custom_css_styles"),' style="','" ') . hc_combine(hc_get($Y_NOW, "trigger"),' data-trigger="','" ') . hc_get_animation($Y_NOW) . '>';
    $html .= '<h4>' . hc_get($Y_NOW, "title") . '</h4><div><div data-progress="' . hc_get($Y_NOW, "progress") . '"><span class="counter" data-to="' . hc_get($Y_NOW, "progress") . '" data-speed="2000" data-unit="' . hc_get($Y_NOW, "unit", "%") . '"></span></div></div></div>';
    echo $html;
}
function hc_include_hc_circle_progress_bar(&$Y_NOW,$EXTRA) {
    $progress = hc_get($Y_NOW, "progress");
    $html = '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-cmp-circle-progress-bar progress-circle ' . hc_get_component_classes($Y_NOW,$EXTRA) . '"' . hc_combine(hc_get($Y_NOW,"custom_css_styles"),' style="','" ') . hc_combine(hc_get($Y_NOW, "trigger"),' data-trigger="','" ');
    $html .= ' data-color="' .  hc_get($Y_NOW, "color", hc_get_setting('main-color')) . '" data-progress="' . $progress . '" data-size="' . hc_get($Y_NOW, "size") . '"' . hc_combine(hc_get($Y_NOW, "size_md"),' data-size-md="','"') . hc_combine(hc_get($Y_NOW, "size_sm"),' data-size-sm="','"') . hc_combine(hc_get($Y_NOW, "data_options"), ' data-options="', '"') . hc_get_animation($Y_NOW) .'>';
    $html .= '<div class="content">' . hc_combine(hc_get($Y_NOW, "title"), '<h4>', '</h4>') . hc_combine(hc_get($Y_NOW, "subtitle"), '<p>', '</p>');
    if (!hc_true($Y_NOW, "hide_percentage")) {
        $html .= '<div class="counter" data-to="' . hc_get($Y_NOW, "progress") . '" data-speed="2000" data-unit="' . hc_get($Y_NOW, "unit", "%") . '"></div>';
    }
    echo $html . '</div></div>';
}
function hc_include_hc_timeline(&$Y_NOW,$EXTRA) {
    $html = '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-cmp-timeline timeline ' . hc_get_component_classes($Y_NOW,$EXTRA) . '" ' . hc_combine(hc_get($Y_NOW,"custom_css_styles"), 'style="', '" ') . hc_get_animation($Y_NOW) . '>';
    $arr = $Y_NOW["rows"];
    for ($i = 0; $i < count($arr); $i++) {
        $html .= '<div' . (hc_get($arr[$i], "position") == "right" ? ' class="inverted"' : '' ) . '><div class="badge"><p>' . hc_get($arr[$i], "date") .  '</p><span>' . hc_get($arr[$i], "date_subtitle") .  '</span></div><div class="panel"><h3 class="timeline-title">' . hc_get($arr[$i], "title") .  '</h3><p>' . hc_get($arr[$i], "content") .  '</p></div></div>';
    }
    echo $html . "</div>";
}
function hc_include_hc_google_map(&$Y_NOW,$EXTRA) {   ?>
<div id="<?php echo hc_get($Y_NOW, "id") ?>" class="hc-cmp-google-map google-map <?php echo hc_get_component_classes($Y_NOW,$EXTRA); echo " " . $Y_NOW["map_skin"] . "-map"; ?>" data-address="<?php echo esc_attr($Y_NOW["map_address"]); ?>"
    data-zoom="<?php if (strlen($Y_NOW["map_zoom"]) > 0) echo esc_attr($Y_NOW["map_zoom"]); else echo "12"; ?>"
    data-coords="<?php echo esc_attr($Y_NOW["map_coordinates"]); ?>"
    data-marker-pos="<?php echo esc_attr($Y_NOW["marker_position"]); ?>"
    data-skin="<?php echo esc_attr($Y_NOW["map_skin"]); ?>"
    data-marker-pos-top="<?php echo esc_attr($Y_NOW["marker_position_top"]); ?>"
    data-marker-pos-left="<?php echo esc_attr($Y_NOW["marker_position_left"]); ?>"
    <?php hc_combine_echo(hc_get($Y_NOW,"trigger"),'data-trigger="','"') ?>
    <?php if (strlen($Y_NOW["marker_image"]) > 0) echo ' data-marker="' . hc_get_img($Y_NOW["marker_image"]) . '"'; ?> style="<?php echo hc_get($Y_NOW,"custom_css_styles") . hc_combine(esc_attr($Y_NOW["map_height"]),"height: ","px;"); ?>" <?php echo hc_get_animation($Y_NOW) ?>></div>
<?php }
function hc_include_hc_social_feeds(&$Y_NOW,$EXTRA) {
    $type = hc_get($Y_NOW, "container_type");
    $source_type = hc_get($Y_NOW, "type");
    $css = hc_get_component_classes($Y_NOW,$EXTRA);
    $anima =  hc_get_animation($Y_NOW);
    $data_options = hc_get($Y_NOW, "data_options_" . $source_type);
    if ($type == "") {
?>
<div id="<?php echo hc_get($Y_NOW, "id") ?>" class="hc-cmp-social-feeds <?php echo 'social-feed-' . $source_type . ' ' . $css;  ?>" data-social-id="<?php echo esc_attr($Y_NOW["page_id"]); ?>" data-token="<?php echo esc_attr($Y_NOW["access_token"]); ?>" data-options="<?php echo $data_options ?>" <?php echo $anima ?>></div>
<?php }
    if ($type == "scroll_box") {
        $arr_opt = hc_get_arr_options(hc_get($Y_NOW, "data_sub_options_scroll_box"));
        $css .= " " . hc_get($arr_opt, "responsive");
?>
<div id="<?php echo hc_get($Y_NOW, "id") ?>" class="hc-cmp-social-feeds scroll-box <?php echo $css ?>" data-height="<?php echo hc_get($arr_opt, "height", "300") ?>" <?php hc_combine_echo(esc_attr(hc_get($arr_opt, "height_remove")), 'data-height-remove="','"') ?> data-options="<?php echo hc_get($Y_NOW,"data_options_scroll_box"); ?>" <?php echo $anima ?>>
    <div class="<?php echo 'social-feed-' . $source_type ?>" data-social-id="<?php echo esc_attr($Y_NOW["page_id"]); ?>" data-token="<?php echo esc_attr($Y_NOW["access_token"]); ?>" data-options="<?php echo $data_options ?>"></div>
</div>
<?php }
    if ($type == "slider") {
?>
<div id="<?php echo hc_get($Y_NOW, "id") ?>" class="hc-cmp-social-feeds <?php echo 'social-feed-' . $source_type . ' ' . $css; ?> social-slider"
    data-social-id="<?php echo hc_get($Y_NOW, "page_id"); ?>"
    data-token="<?php echo hc_get($Y_NOW, "access_token"); ?>"
    data-options="<?php echo $data_options; hc_combine_echo(hc_get($Y_NOW,"data_options_slider"),","); ?>"
    <?php echo hc_combine(hc_get($Y_NOW, "trigger"), 'data-trigger="','" ') . $anima ?>></div>
<?php }
}
function hc_include_hc_social_share_buttons(&$Y_NOW,$EXTRA) {
    $style = hc_get($Y_NOW, "style");
    $css = (hc_true($Y_NOW, "social_colors") ? "social-colors " : "") . $style . " " . hc_get($Y_NOW, "size") . " " . " " . hc_get($Y_NOW, "alignment") . hc_get_component_classes($Y_NOW, $EXTRA);
    $html = '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-cmp-social-share-buttons icon-links icon-social ' . $css . '"'.  hc_combine(hc_get($Y_NOW,"custom_css_styles"),' style="','" ') . '>';
    $html .= ($style == "icon-links-popup" ? "<i></i><div>" : "");
    $link_type = "data-social-url";
    $social_attr = "data-social";
    if (hc_get($Y_NOW, "type") == "link") {
        $link_type =  "target='_blank' href";
        $social_attr = "data-link";
    }

    if (hc_true($Y_NOW,"fb"))  $html .= '<a ' . $social_attr . '="share-facebook" ' . hc_combine(hc_get($Y_NOW, "fb_link"),$link_type. '="','"') . ' class="facebook"><i class="icon-facebook"></i></a>';
    if (hc_true($Y_NOW,"tw"))  $html .= '<a ' . $social_attr . '="share-twitter" ' . hc_combine(hc_get($Y_NOW, "tw_link"),$link_type.'="','"') . ' class="twitter"><i class="icon-twitter"></i></a>';
    if (hc_true($Y_NOW,"pi"))  $html .= '<a ' . $social_attr . '="share-pinterest" ' . hc_combine(hc_get($Y_NOW, "pi_link"),$link_type.'="','"') . ' class="pinterest"><i class="icon-pinterest"></i></a>';
    if (hc_true($Y_NOW,"li"))  $html .= '<a ' . $social_attr . '="share-linkedin" ' . hc_combine(hc_get($Y_NOW, "li_link"),$link_type.'="','"') . ' class="linkedin"><i class="icon-linkedin"></i></a>';
    echo $html . "</div>";
    if ($style == "icon-links-popup") echo "</div>";
}
function hc_include_hc_icon_links(&$Y_NOW,$EXTRA) {
    $style = hc_get($Y_NOW, "style");
    $css = (hc_true($Y_NOW, "social_colors") ? "social-colors " : "") . $style . " " . hc_get($Y_NOW, "size") . " " . " " . hc_get($Y_NOW, "alignment") . hc_get_component_classes($Y_NOW, $EXTRA);
    $html = '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-cmp-hc-icon-links icon-links ' . $css . '"'.  hc_combine(hc_get($Y_NOW,"custom_css_styles"),' style="','" ') . hc_get_animation($Y_NOW) . '>';
    $html .= ($style == "icon-links-popup" ? "<i></i><div>" : "");
    $arr = $Y_NOW["rows"];
    for ($i = 0; $i < count($arr); $i++) {
        $html .= '<a href="' . esc_url(hc_get($arr[$i], "link")) . '"><i class="' . esc_attr(hc_get($arr[$i], "icon")) . '"></i></a>';
    }
    echo $html . "</div>";
    if ($style == "icon-links-popup") echo "</div>";
}
function hc_include_hc_subtitle(&$Y_NOW,$EXTRA) {
    $css = "title " . hc_get_component_classes($Y_NOW,$EXTRA) . ' ' . hc_get($Y_NOW, "alignment");
    echo '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-cmp-subtitle ' . $css . '" ' . hc_combine(hc_get($Y_NOW, "custom_css_styles"),'style="','" ') .  hc_get_animation($Y_NOW) . '><h2>' . hc_get($Y_NOW, "title") . '</h2><p>' . hc_get($Y_NOW, "subtitle") . '</p></div>';
}
function hc_include_hc_quote(&$Y_NOW,$EXTRA) {
    $css = "quote " . hc_get_component_classes($Y_NOW,$EXTRA) . ' ' . hc_get($Y_NOW, "style");
    echo '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-cmp-quote ' . $css . '" ' . hc_combine(hc_get($Y_NOW, "custom_css_styles"),'style="','" ') .  hc_get_animation($Y_NOW) . '><p>' . hc_get($Y_NOW,"text") . hc_combine(hc_get($Y_NOW, "author"),'</p><span class="quote-author">','</span>') . '</div>';
}
function hc_include_hc_separator(&$Y_NOW,$EXTRA) {
    echo '<hr />';
}
function hc_include_hc_table(&$Y_NOW,$EXTRA) {
    $col_num = hc_get($Y_NOW, "columns");
    $css = "table " . hc_get($Y_NOW, "style") . " " . hc_get_component_classes($Y_NOW,$EXTRA) . (hc_true($Y_NOW, "full_mobile") ? "table-full-sm" : "");
    if ($col_num == "") $col_num = hc_get($Y_NOW, "tab_index") + 1;
    $html = '<table id="' . hc_get($Y_NOW, "id") . '" class="hc-cmp-table ' . $css . '"' . hc_combine(hc_get($Y_NOW,"custom_css_styles"),' style="','"') . ' ' . hc_get_animation($Y_NOW) . '>';
    $html .= '<thead><tr>';
    for ($i = 1; $i <= $col_num; $i++) {
        $html .= "<th>" . $Y_NOW["table"]["c" . $col_num . "_" . $i . "_header"] . "</th>";
    }
    $html .= '</tr></thead><tbody>';
    if (isset($Y_NOW["table"])) {
        for ($i = 0; $i < count($Y_NOW["table"]["rows"]); $i++) {
            $html .= "<tr>";
            for ($j = 1; $j <= $col_num; $j++)  $html .= "<td>" . hc_get($Y_NOW["table"]["rows"][$i],"c" . $col_num . "_" . $j . "_content") . "</td>";
            $html .= "</tr>";
        }
    }
    echo $html . "</tbody></table>";
}
function hc_include_hc_inner_menu(&$Y_NOW,$EXTRA) {
    global $HC_PAGE_ARR;
    $menu_html = '<ul>';
    $menu_type =  hc_get($Y_NOW, "type");
    $menu_items = hc_get($Y_NOW, "rows", array());
    $active = (int)hc_get($Y_NOW, "active_item", -1);
    $count = count($menu_items);
    for ($i = 0; $i < $count; $i++) {
        $active_class = ($active == $i ? "active":"");
        if (hc_get($menu_items[$i],"child") != "true") {
            if ($i + 1 < $count && hc_get($menu_items[$i + 1],"child") == "true") {
                $menu_html .= '<li class="' . $active_class . 'dropdown"><a href="#">' . hc_get_icon($menu_items[$i]["icon"],"","","")  . '<span class="menu-text">' . esc_attr($menu_items[$i]["text"]) . '</span></a>';
                $html = '<ul>';
                $j = $i + 1;
                while ($j < $count && hc_get($menu_items[$j],"child") == "true") {
                    $sub_link = esc_url(hc_get($menu_items[$j-1],"link"));
                    $html .= '<li><a href="' . $sub_link . '">'. hc_get_icon($menu_items[$j]["icon"],"","","") . '<span class="menu-text">' . esc_attr($menu_items[$j]["text"]) . '</span></a></li>';
                    $j++;
                }
                $i = $j-1;
                $menu_html .=  $html . '</ul></li>';
            } else {
                $menu_html .= '<li class="' . $active_class . '"><a href="' . esc_url(hc_get($menu_items[$i],"link")) . '">'. hc_get_icon($menu_items[$i]["icon"],"","","") . '<span class="menu-text">' .  esc_attr($menu_items[$i]["text"]) . '</span></a></li>';
            }
        }
    }
    $menu_html .= '</ul>';
    if ($menu_type == "horizontal") echo '<div data-scroll-detect="true" id="' . esc_attr($Y_NOW["id"]) . '" class="hc-cmp-inner-menu menu-inner ' . hc_get($Y_NOW ,"alignment") . ' ' . hc_get_component_classes($Y_NOW,$EXTRA) .'" style="' . hc_get($Y_NOW,"custom_css_styles") .'" ' . hc_get_animation($Y_NOW) . '><div><i class="menu-btn"></i><span>' . esc_attr__("Menu","hc") . '</span></div>' . $menu_html . '</div>';
    if ($menu_type == "vertical") echo '<div data-scroll-detect="true" id="' . esc_attr($Y_NOW["id"]) . '"  class="hc-cmp-inner-menu menu-inner menu-inner-vertical ' . hc_get($Y_NOW ,"alignment") . ' ' . hc_get_component_classes($Y_NOW,$EXTRA) .'" style="' . hc_get($Y_NOW,"custom_css_styles") .'" ' . hc_get_animation($Y_NOW) . '>' . $menu_html . '</div>';
}
function hc_include_hc_contact_form(&$Y_NOW,$EXTRA) {
    $css = hc_get_component_classes($Y_NOW,$EXTRA);
    $button_position = hc_get($Y_NOW,"button_position");
    if ($Y_NOW["label"] == "true") $css .= " label-visible";
    if ($button_position == "inline") $css .= " form-inline";
?>
<form id="<?php echo hc_get($Y_NOW, "id") ?>" action="<?php echo HC_PLUGIN_URL ?>/scripts/contact-form/contact-form.php" class="hc-cmp-contact-form form-box form-ajax form-ajax-wp <?php echo $css ?>" method="post" data-email="<?php echo $Y_NOW["recipient_email"]; ?>" <?php hc_combine_echo(hc_get($Y_NOW,"subject"),'data-subject="','"') ?> <?php hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','"'); ?> <?php echo hc_get_animation($Y_NOW) ?>>
    <div class="row">
        <?php
    $button = "";
    $button_text = hc_get($Y_NOW,"button_text", "Send message");
    $button =  hc_get_button_style($Y_NOW["button_style"]);
    $icon = "";
    if (hc_get($Y_NOW,"button_style") != "link") {
        $button .= " " . hc_get($Y_NOW,"button_dimensions","btn-sm");
        if (hc_true($Y_NOW,"button_animation")) $button .= " btn-anima ";
    }
    if (hc_get($Y_NOW,"button_icon") != "") {
        $icon = "<i class='" . hc_get($Y_NOW,"button_icon") . "'></i>";
        $button .= " btn-icon ";
    }
    if ($button_position == "inline") {
        $button = '<div class="col-lg-4"><button class="' . $button . '" type="submit">' .$icon . $button_text . '</button></div>';
    } else {
        $button = '<button class="' . $button . '" type="submit">' .$icon . $button_text . '</button>';
    }
    $arr = hc_get($Y_NOW, "rows", 0);
    $html = "";
    for ($i = 0; $i < count($arr); $i++) {
        $text = hc_get($arr[$i], "text");
        $id = str_replace(" ","-",$text);
        $placeholder = ((hc_true($Y_NOW,"placeholder")) ? 'placeholder="' . $text . '"':'');
        $required = ((hc_true($arr[$i],"required")) ? 'required':'');
        $html = '<div class="' . $arr[$i]["column"] . '">';
        if ($Y_NOW["label"] == "true") $html .= '<p>' . $text . '</p>';
        if ($arr[$i]["input_type"] == "text") $html .= '<input id="' . $id . '" name="' . $text . '" ' . $placeholder . ' type="text" class="input-text" ' . $required . '>';
        if ($arr[$i]["input_type"] == "email") $html .= '<input id="' . $id . '" name="' . $text . '" ' . $placeholder . ' type="email" class="input-text" ' . $required . '>';
        if ($arr[$i]["input_type"] == "number") $html .= '<input id="' . $id . '" name="' . $text . '" ' . $placeholder . ' type="number" class="input-text" ' . $required . '>';
        if ($arr[$i]["input_type"] == "link") $html .= '<input id="' . $id . '" name="' . $text . '" ' . $placeholder . ' type="url" class="input-text" ' . $required . '>';
        if ($arr[$i]["input_type"] == "textarea") $html .= '<textarea id="' . $id . '" name="' . $text . '" ' . $placeholder . ' class="input-textarea" ' . $required . '></textarea>';
        if ($arr[$i]["input_type"] == "select") $html .= '<select id="' . $id . '" name="' . $text . '" class="input-select" ' . $required . '><option value="" label="--">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10+">10+</option></select>';
        if ($arr[$i]["input_type"] == "calendar") $html .= '<input id="' . $id . '" name="' . $text . '" ' . $placeholder . ' type="text" data-toggle="datepicker" class="input-text" ' . $required . '>';
        echo $html . '</div>';
    }
    $loader = '<img class="cf-loader" src="' . HC_PLUGIN_URL . '/media/loader.svg" alt="" />';
    if ($button_position == "inline") {
        echo $button;
    }
        ?>
    </div><?php
    if (hc_get($Y_NOW,"checkbox") != "") echo '<div class="form-checkbox"><input type="checkbox" id="check" name="check" value="check" required><label for="check">' . hc_get($Y_NOW,"checkbox") . '</label></div>';
    if ($button_position == "left" || $button_position == "") echo $button . $loader;
    if ($button_position == "center") echo '<div class="align-center">' . $button . $loader . '</div>';
    if ($button_position == "right") echo '<div class="align-right">' . $button . $loader . '</div>';
    ?>
    <div class="success-box">
        <div class="alert alert-success">
            <?php echo hc_get($Y_NOW,"success_message"); ?>
        </div>
    </div>
    <div class="error-box">
        <div class="alert alert-warning">
            <?php echo hc_get($Y_NOW,"error_message"); ?>
        </div>
    </div>
</form>
<?php }
function hc_include_hc_space(&$Y_NOW,$EXTRA) {   ?>
<hr id="<?php echo hc_get($Y_NOW, "id") ?>" class="hc-cmp-space <?php echo hc_get($Y_NOW, "size", "space") . ' ' . hc_get_component_classes($Y_NOW, $EXTRA); ?>" <?php hc_combine_echo(esc_attr($Y_NOW["custom_css_styles"] . hc_combine(hc_get($Y_NOW,"height")," height: ","px")),'style="','"') ?> />
<?php }
function hc_include_hc_breadcrumbs(&$Y_NOW,$EXTRA) {
    echo hc_get_breadcrumb("hc-cmp-breadcrumbs hc-component " . $Y_NOW["position"] . " " . hc_get_component_classes($Y_NOW, $EXTRA), $Y_NOW["id"], hc_combine(hc_get($Y_NOW, "custom_css_styles"),' style="','" ') . hc_get_animation($Y_NOW));
}
function hc_include_hc_code_block(&$Y_NOW,$EXTRA) {
    echo '<div id="' . esc_attr($Y_NOW["id"]) . '" class="hc-cmp-code-block ' . hc_get_component_classes($Y_NOW, $EXTRA) . '" ' . hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','"') . '>';
    if (ctype_xdigit($Y_NOW["content"])) {
        $content = hex2binX($Y_NOW["content"]);
        $content = iconv(mb_detect_encoding($content, mb_detect_order(), true), "UTF-8", $content);
        $content = str_replace("&#39;",'"',str_replace('&#34;','"',$content));
        if ($Y_NOW["language"] == "js") echo "<script>" . $content . "</script>";
        if ($Y_NOW["language"] == "css") echo "<style>" . $content . "</style>";
        if ($Y_NOW["language"] == "") echo $content;
    }
    echo '</div>';
}
function hc_uchr($codes) {
    if (is_scalar($codes)) $codes= func_get_args();
    $str= '';
    foreach ($codes as $code) $str.= html_entity_decode('&#'.$code.';',ENT_NOQUOTES,'UTF-8');
    return $str;
}
function hex2binX($hex) {
    $hexes = str_split($hex, 4);
    $back = "";
    for ($j = 0; $j < count($hexes); $j++) {
        $back .= hc_uchr(intval($hexes[$j],16));
    }
    return $back;
}
?>