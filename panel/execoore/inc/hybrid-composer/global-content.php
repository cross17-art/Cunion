<?php
// =============================================================================
// GLOBAL-CONTENT.PHP
// -----------------------------------------------------------------------------
// Theme functions and others codes for front-end side.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Constants
//   02. Main loop
//   03. Admin files
//   04. Functions
// =============================================================================

// CONSTANTS
// =============================================================================
global $HC_PAGE_ARR;
global $HC_PAGE_SETTINGS;
global $HC_INCLUDE_ARR;
global $HC_IS_ARCHIVE;
global $HC_CLASSIC_CONTENT;

$HC_INCLUDE_ARR = array(
    "hc_title" => "components/header.php",
    "hc_column" => "components/columns.php",
    "hc_section" =>"components/sections.php",
    "hc_section_two_blocks" => "components/sections.php",
    "hc_section_map" =>"components/sections.php",
    "hc_title_tag" =>"components/others.php",
    "hc_subtitle" =>"components/others.php",
    "hc_text_block" =>"components/others.php",
    "hc_wp_editor" =>"components/others.php",
    "hc_button" =>"components/others.php",
    "hc_icon_list" =>"components/others.php",
    "hc_icon_list_simple" =>"components/others.php",
    "hc_text_list" =>"components/others.php",
    "hc_icon_links" =>"components/others.php",
    "hc_icon_box" =>"components/others.php",
    "hc_counter" =>"components/others.php",
    "hc_countdown" =>"components/others.php",
    "hc_progress_bar" =>"components/others.php",
    "hc_circle_progress_bar" =>"components/others.php",
    "hc_timeline" =>"components/others.php",
    "hc_google_map" =>"components/others.php",
    "hc_social_feeds" =>"components/others.php",
    "hc_social_share_buttons" =>"components/others.php",
    "hc_quote" =>"components/others.php",
    "hc_separator" =>"components/others.php",
    "hc_table" =>"components/others.php",
    "hc_inner_menu" => "components/others.php",
    "hc_contact_form" => "components/others.php",
    "hc_space" => "components/others.php",
    "hc_breadcrumbs" => "components/others.php",
    "hc_video" => "components/others.php",
    "hc_code_block" => "components/others.php",
    "hc_fp_bottom_top_container" => "components/others.php",
    "hc_fp_slides" => "components/others.php",
    "hc_image_box" =>"components/image_box.php",
    "hc_media_box" =>"components/image_box.php",
    "hc_image" =>"components/image_box.php",
    "hc_content_box" =>"components/content_box.php",
    "hc_info_box" => "components/content_box.php",
    "hc_adv_content_box" =>"components/content_box.php",
    "hc_niche_content_box_blog" =>"components/content_box.php",
    "hc_niche_content_box_testimonials" =>"components/content_box.php",
    "hc_niche_content_box_team" =>"components/content_box.php",
    "hc_niche_content_box_pricing_table" =>"components/content_box.php",
    "hc_niche_content_box_call" =>"components/content_box.php",
    "hc_page_lightbox" =>"components/containers.php",
    "hc_page_popup" =>"components/containers.php",
    "hc_popover" => "components/containers.php",
    "hc_scroll_box" =>"components/containers.php",
    "hc_grid_table" =>"components/containers.php",
    "hc_image_slider" =>"components/containers.php",
    "hc_slider" =>"components/containers.php",
    "hc_adv_slider" =>"components/containers.php",
    "hc_image_coverflow" =>"components/containers.php",
    "hc_coverflow" =>"components/containers.php",
    "hc_tab" =>"components/containers.php",
    "hc_accordion" =>"components/containers.php",
    "hc_collapse" =>"components/containers.php",
    "hc_image_grid_list" =>"components/containers.php",
    "hc_grid_list" =>"components/containers.php",
    "hc_image_masonry_list" =>"components/containers.php",
    "hc_masonry_list" => "components/containers.php",
    "hc_album" => "components/containers.php",
    "hc_fixed_area" => "components/containers.php",
    "hc_background_icon_box" => "components/containers.php",
    "hc_steps" => "components/containers.php",
    "hc_pt_grid_list" => "components/post_types.php",
    "hc_pt_masonry_list" => "components/post_types.php",
    "hc_pt_slider" => "components/post_types.php",
    "hc_pt_coverflow" => "components/post_types.php",
    "hc_pt_menu" => "components/post_types.php",
    "hc_pt_tag_cloud" => "components/post_types.php",
    "hc_pt_navigation" => "components/post_types.php",
    "hc_pt_post_informations" => "components/post_types.php"
    );
if (HC_IS_CUSTOM_HC) {
    include(HC_PLUGIN_PATH . "/custom/custom-components.php");
    global $HC_CUSTOM_COMPONENTS;
    for ($i = 0; $i < count($HC_CUSTOM_COMPONENTS); $i++) {
        $HC_INCLUDE_ARR[$HC_CUSTOM_COMPONENTS[$i]["id"]] = "custom/custom-components.php";
    }
}

//Gutenberg start
$HC_CLASSIC_CONTENT = false;
if (!defined("HC_PLUGIN_PATH")) {
    $HC_CLASSIC_CONTENT = true;
} else {
    $editor_mode = get_post_meta(get_the_ID(),"hc-editor-mode");
    if (($editor_mode != false && $editor_mode[0] == "classic" && !isset($_GET['hc_preview_id']))) {
        $HC_CLASSIC_CONTENT = true;
    }
}

// MAIN LOOP
// -----------------------------------------------------------------------------
// The main loop that fetch the content of all the pages.
// =============================================================================

if (!$HC_IS_ARCHIVE) {
    if (!$HC_CLASSIC_CONTENT) {
        while (have_posts()):
            the_post();
            $content;
            if (isset($_GET['hc_preview_id']) && current_user_can('edit_posts')) {
                if (session_status() == PHP_SESSION_NONE) session_start();
                $content = $_SESSION["hc-preview-" . $_GET['hc_preview_id']];
            } else {
                $content = get_the_content();
            }
            $HC_PAGE_ARR = json_decode($content, true);
        endwhile;
    }
    if (!isset($HC_PAGE_ARR)) hc_set_default_page_content_arr();
}
//Gutenberg end
function hc_set_default_page_content_arr() {
    global $HC_PAGE_ARR;
    $HC_PAGE_ARR = array();
    $HC_PAGE_ARR["page_setting"] = array("settings" => array());
    $HC_PAGE_ARR["css_page"] = "";
    $HC_PAGE_ARR["scripts"] = array();
}
$HC_CLASSIC_CONTENT = false;
if (!defined("HC_PLUGIN_PATH")) {
    $HC_CLASSIC_CONTENT = true;
} else {
    $editor_mode = get_post_meta(get_the_ID(),"hc-editor-mode");
    if ($editor_mode != false && $editor_mode[0] == "classic" || count($HC_PAGE_ARR) < 5) {
        $HC_CLASSIC_CONTENT = true;
    }
}

// APPLY HYBRID COMPOSER CONTENT
$hc_loop_init;
function hc_apply_content($content) {
    global $hc_loop_init;
    if (!$hc_loop_init || $hc_loop_init < 3) {
        $hc_loop_init = $hc_loop_init + 1;
        return hc_get_hc_content();
    }
}
if (!$HC_CLASSIC_CONTENT) {
    add_filter('the_content','hc_apply_content');
} else {
    add_filter('body_class', function($classes) {
        return array_merge($classes, array('hc-classic'));
    });
}

// FUNCTIONS
// =============================================================================
function hc_get_hc_content($post_id = "") {
    global $HC_PAGE_ARR;
    if ($post_id != "")  $HC_PAGE_ARR = json_decode(get_post_field('post_content', $post_id), true);
    ob_start();
    foreach ($HC_PAGE_ARR as $key => $value) {
        if (is_array($value) && $key != "main-title") {
            hc_get_content_recursive($value);
        }
    }
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
function hc_get_content_recursive($ARR, $EXTRA = array()) {
    global $HC_INCLUDE_ARR;
    foreach ($ARR as $key => $value) {
        if ($key == "component" && $value != "repeater_item") {
            $Y_NOW = $ARR;
            $component_name = $HC_INCLUDE_ARR[$value];
            include_once(HC_PLUGIN_PATH ."/". $component_name);
            $component_name = "hc_include_" . $value;
            $component_name($Y_NOW,$EXTRA);
        }
    }
}
function hc_get_icon($icon, $style, $img, $classes, $css_style="") {
    if (strlen($icon) > 0 || ($style != "circle" && $style != "square" && $style != "" && strlen($img) > 0)) {
        $html = '<i class="' . $classes . ' ' . $icon . ' ';
        if ($style == "circle") $html .= "circle";
        elseif ($style == "circle_image") $html .= "circle onlycover";
        elseif ($style == "circle_image_icon") $html .= "circle cover";
        elseif ($style == "square") $html .= "square";
        elseif ($style == "square_image") $html .= "square onlycover";
        elseif ($style == "square_image_icon") $html .= "square cover";
        $html .= '" ';
        if (strlen($img) > 0 && $style != "circle" && $style != "square" && $style != "") $html .= 'style="background-image:url(' . hc_get_img($img,"medium") .'); ' . $css_style . '"';
        else  $html .= hc_combine($css_style," style='","'");
        $html .= '></i>';
        return $html; //Escape not possible wp_kses remove style attribute background-image
    }
    return "";
}
function hc_get_title($post_id = "", $title = "", $subtitle = "") {
    global $HC_PAGE_ARR;
    if ($post_id != "") $HC_PAGE_ARR = json_decode(get_post_field('post_content', $post_id),true);
    if (isset($HC_PAGE_ARR['main-title'])) {
        $Y_NOW = $HC_PAGE_ARR['main-title'];
        if ($title != "") {
            $Y_NOW['title'] = $title;
        }
        if ($Y_NOW['title'] == "") {
            $Y_NOW['title'] = get_the_title($post_id);
        }
        if ($subtitle != "") {
            $Y_NOW['subtitle'] = $subtitle;
        }
        $CURRENT_SUB_CONTENT = $Y_NOW['title_content'];
        include("components/header.php");
    }
}
function hc_get_arr_options($tring) {
    $arr_new = array();
    if (strlen($tring) > 0) {
        $arr =  explode(",", $tring);

        for ($i = 0; $i < count($arr); $i++){
            $val = explode(":", $arr[$i]);
            $arr_new[$val[0]] = $val[1];
        }
    }
    return $arr_new;
}
function hc_get_container_template() {
    $val = "";
    global $HC_PAGE_ARR;
    if (hc_get_setting('footer-type') == "parallax") $val = "footer-parallax-container";
    if (isset($HC_PAGE_ARR['template_setting']['settings']['sidebars']) && $HC_PAGE_ARR['template_setting']['settings']['sidebars'] != "" && hc_get_setting('footer-type') == "parallax") $val .= ' bg-color';
    return $val;
}
function hc_set_container_template() {
    echo hc_get_container_template();
}
function hc_get_img_arr($img) {
    if (strlen($img)>0)  return explode("|",$img);
    return array("","","","");
}
function hc_get_img($img, $size="hd") {
    $link = $img;
    if (strlen($img) > 0) {
        if (strpos($img,"|") > 0) {
            $tmp = explode("|",$img);
            $link = "";
            $prefix = "";
            if ($size == "") return "";
            if ($size == "hd" || $size == "ultra-large") $prefix = "y-theme-";
            $arr = wp_get_attachment_image_src($tmp[3], $prefix . $size);
            $link = esc_url($arr[0]);
            if ($link == "") {
                $arr = wp_get_attachment_image_src($tmp[3], "hc-" . $size);
                $link = esc_url($arr[0]);
            }
        }
        return $link;
    }
    return "";
}
//gutenberg start
function hc_combine_echo($content, $prepend = "", $append = "") {
    $val = hc_combine($content, $prepend, $append);
    if ($val != "") {
        echo $val;
    }
}
function hc_combine($content, $prepend = "", $append = "") {
    if ($content != "") return $prepend . hc_json($content) . $append;
    else return "";
}
function hc_get($arr, $key, $default = "") {
    $result = "";
    if (is_string($key)) {
        if(isset($arr[$key])) $result = $arr[$key];
        else $result = $default;
    } else {
        $count = count($key);
        if ($count == 1) {
            if(isset($arr[$key[0]])) $result = $arr[$key[0]];
            else $result = $default;
        }
        if ($count == 2) {
            if(isset($arr[$key[0]][$key[1]])) $result = $arr[$key[0]][$key[1]];
            else $result = $default;
        }
        if ($count == 3) {
            if(isset($arr[$key[0]][$key[1]][$key[2]])) $result = $arr[$key[0]][$key[1]][$key[2]];
            else $result = $default;
        }
        if ($count == 4) {
            if(isset($arr[$key[0]][$key[1]][$key[2]][$key[3]])) $result = $arr[$key[0]][$key[1]][$key[2]][$key[3]];
            else $result = $default;
        }
        if ($count == 5) {
            if(isset($arr[$key[0]][$key[1]][$key[2]][$key[3]][$key[4]])) $result = $arr[$key[0]][$key[1]][$key[2]][$key[3]][$key[4]];
            else $result = $default;
        }
    }
    if ($result == "") return $default;
    else return hc_json($result);
}
function hc_true($val, $extra = "") {
    if ($extra != "") {
        $val = hc_get($val, $extra);
    }
    return ($val == "true" || ($val != "false" && $val == true));
}
function hc_get_button_style($style) {
    if ($style == "square" || $style == "square-anima") return "btn";
    if ($style == "circle" || $style == "circle-anima") return "btn btn-circle";
    if ($style == "square-border") return "btn btn-border";
    if ($style == "circle-border") return "btn btn-circle btn-border";
    if ($style == "link") return "btn-text";
    return "btn";
}
//gutenberg end
function hc_get_scroll_animation($animation,$time,$timeline="false",$timeline_delay="",$timeline_order="",$type="") {
    $html = "";
    if ($animation != "") {
        if ($type == "fullpage") $html = 'data-fullpage-anima="'. esc_attr($animation) . '" ';
        else $html = 'data-anima="'. esc_attr($animation) . '" ';
        if(strlen($time) > 0 ) $html .= ' data-time="'. esc_attr($time) . '" ';
        if($timeline == "true") {
            if(strlen($timeline_order) > 0 )  $html .= ' data-timeline="'. esc_attr($timeline_order) . '" ';
            else  $html .= ' data-timeline="asc" ';
            if(strlen($timeline_delay) > 0 )  $html .= ' data-timeline-time="'. esc_attr($timeline_delay) .'" ';
        }
    }
    return $html;
}
function hc_get_animation(&$Y_NOW) {
    $a = hc_get($Y_NOW, "animation");
    $at = hc_get($Y_NOW, "animation_time", "500");
    if ($a != "") {
        return ' data-anima="'. $a . '" data-time="'. $at . '"';
    }
    return "";
}
function hc_set_pagination(&$Y_NOW) {
    $items_number = hc_get($Y_NOW, "pag_items");
    if (hc_get($Y_NOW, "pag_type") == "pagination") {
        $cols = hc_get($Y_NOW, "column", "");
        $data_options = hc_get($Y_NOW,"pag_data_options");
        $responsive = "";
        if ($cols == $items_number) {
            $responsive = hc_combine(hc_get($Y_NOW, "column_lg"), ' data-page-items-lg="','"') . hc_combine(hc_get($Y_NOW, "column_md"), ' data-page-items-md="','"') . hc_combine(hc_get($Y_NOW, "column_sm"), ' data-page-items-sm="','"');
        }
        if (hc_true($Y_NOW, "pag_scroll_top")) {
            $data_options .= ",scrollTop:true";
        }
        if (hc_get($Y_NOW, "pag_button_prev") != "") {
            $data_options .= ",prev:" . hc_get($Y_NOW, "pag_button_prev");
        }
        if (hc_get($Y_NOW, "pag_button_next") != "") {
            $data_options .= ",next:" . hc_get($Y_NOW, "pag_button_next");
        }
        echo '<div class="list-pagination">';
        echo '<ul class="pagination ' . hc_get($Y_NOW, "pag_size") . ' ' . hc_get($Y_NOW,"pag_position") . '" data-page-items="' . (($items_number != "") ?  $items_number: "3") . '" data-pagination-anima="' . hc_get($Y_NOW,"pag_animation","fade-in") . '" data-options="' . $data_options . '"' . $responsive . '></ul>';
        echo '</div>';
    }
    if (hc_get($Y_NOW, "pag_type") == "load_more") {
        echo '<div class="list-pagination ' . hc_get($Y_NOW, "pag_position") . '">';
        echo '<a class="btn load-more ' . (hc_get($Y_NOW, "pag_size") == "pagination-lg" ? " btn-lg" : " btn-sm") . '" data-pagination-anima="' .  hc_get($Y_NOW, "pag_animation", "fade-in") . '" data-page-items="' . $items_number . '"' . ($Y_NOW["lm_lazy"] == "true" ? ' data-options="lazyLoad:true"' : '') . '>' . hc_get($Y_NOW, "lm_button_text", "Load more") . '</a>';
        echo '</div>';
    }
    if (hc_get($Y_NOW, "pag_type") == "pagination_wp") {
        echo '<div class="list-pagination ' . hc_get($Y_NOW, "pag_position") . '">';
        hc_get_post_pagination(hc_get($Y_NOW, "pag_button_prev", "Previous"), hc_get($Y_NOW, "pag_button_next", "Next"), hc_get($Y_NOW, "pag_size"));
        echo '</div>';
    }

}
function hc_get_link_classes(&$Y_NOW) {
    $css = "";
    $link_type = $Y_NOW["link_type"];
    if (hc_get_now($Y_NOW,"gallery") != "true" && ($link_type == "lightbox" || $link_type == "custom")) $css .= "lightbox ";
    if (hc_get_now($Y_NOW,"gallery") == "true" && $link_type == "custom") $css .= "mfp-inline ";
    if(strpos($Y_NOW["link"],"youtube") > 0) $css .= "mfp-iframe ";
    else {
        $pos = strpos($Y_NOW["link"],"#");
        if ($pos === 0 && $pos !== false && $link_type != "lightbox" && $link_type != "custom") $css .= "scroll-to ";
    }
    return $css;
}
function hc_set_link_settings($Y_NOW, $css_classes) {
    echo hc_get_link_settings($Y_NOW, $css_classes);
}
function hc_get_link_settings($Y_NOW, $css_classes) {
    $link_type = $Y_NOW["link_type"];
    $result = ' class="'. $css_classes . ' ' . hc_get_link_classes($Y_NOW) . '"';
    if ($link_type == "custom") $result .= ' href="#lightbox_' . $Y_NOW["id"] . '"'; else  $result .= ' href="' . esc_url($Y_NOW["link"]) . '"';
    if (strlen($Y_NOW["lightbox_animation"]) > 0) $result .= ' data-lightbox-anima="' . $Y_NOW["lightbox_animation"] .'"';
    if ($Y_NOW["new_window"] == "true") $result .= " target='_blank'";
    $result .=  hc_combine($Y_NOW["caption"]," title='","'");
    if ($Y_NOW["inner_caption"] == "true") $result .= ' data-options="mainClass:inner"';
    return $result;
}

function hc_set_content_lightbox($Y_NOW, $TRIGGER='', $EXPIRE='') {
    if ($Y_NOW["link_type"] == "custom") { ?>
<div id="lightbox_<?php echo esc_attr($Y_NOW["id"]); ?>" class="box-lightbox custom-lightbox <?php echo esc_attr($Y_NOW["lightbox_size"]); ?>" <?php if ($TRIGGER=="load") echo 'data-trigger="load"';hc_combine_echo($EXPIRE,' data-expire="','"'); ?>>
    <?php
        if ($Y_NOW["scrollbox"] == "true") echo ' <div class="scroll-content scroll-mobile-disabled" data-height="fullscreen" data-height-remove="260">';
        $CURRENT_SECTION = $Y_NOW["link_content"];
        for ($i = 0; $i < count($CURRENT_SECTION); $i++) {
            hc_get_content_recursive($CURRENT_SECTION[$i]);
        }
        if ($Y_NOW["scrollbox"] == "true") echo '<div class="clear"></div></div>';
    ?>
    <div class="clear"></div>
</div>
<?php }
}
function hc_get_youtube_id($link) {
    if (strpos($link,"http:") != -1 || strpos($link,"www.you") != -1 || strpos($link,"youtu.be") != -1) {
        if (strpos($link,"?v=") != -1) $link = mb_substr($link, strpos($link,"v=") + 1);
        if (strpos($link,"youtu.be") != -1) $link =  mb_substr($link, strrpos($link,"/") + 1);
    }
    return $link;
}
function hc_get_component_classes(&$Y_NOW,$EXTRA) {
    $classes = ' ' . esc_attr($Y_NOW["css_classes"] . ' ' . $Y_NOW["custom_css_classes"]) . ' ';
    if (in_array("timeline",$EXTRA)) $classes .= "anima" . ' ';
    return $classes;
}
function hc_get_the_title($archive_id = null) {
    global $wp_query;
    $title = "";
    $subtitle = "";
    $date = "";

    if (is_category() || is_tag()) $title = $wp_query->queried_object->name;
    else $title = get_the_title($archive_id);

    if (class_exists('woocommerce')) {
        if (is_product_category()) {
            $title = $wp_query->queried_object->name;
            $subtitle =  __("Products for category ","hc") . $title;
        }
        if (is_product_tag()) {
            $title = $wp_query->queried_object->name;
            $subtitle =  __("Products for tag ","hc") . $title;
        }
        if (is_shop()) {
            $title = hc_get_setting("title-shop",__("Shop","hc"));
            $subtitle = hc_get_setting("subtitle-shop",__("Shop's items list","hc"));
        }
    }
    if (is_search()) {
        $title = hc_get_setting("title-search",__("Search results for ","hc")) . '<b>' . get_search_query(). '</b>';
        $subtitle = hc_get_setting("subtitle-search",__("Search results for ","hc")) . '<b>' . get_search_query() . '</b>';
    }
    if (is_author()) {
        $title = esc_attr__("Posts by ","hc") . ucfirst(get_the_author());
    }
    if (is_day()) $date = get_the_date();
    if (is_month()) $date = get_the_date('F Y');
    if (is_year()) $date = get_the_date('Y');
    if ($date != "") {
        $title = ucfirst($date);
    }
    return array(ucfirst($title),ucfirst($subtitle));
}
function hc_get_sidebars_width($sidebar) {
    $left = hc_get_setting("sidebar-left-width","col-lg-3");
    $right = hc_get_setting("sidebar-right-width","col-lg-3");
    $arr = array("left"=>"col-lg-3","right"=>"col-lg-3","content"=>"col-lg-9");

    $left_n = 0;
    $right_n = 0;
    if ($left == "col-md-2") $left_n = 2;
    if ($left == "col-md-3") $left_n = 3;
    if ($left == "col-md-4") $left_n = 4;
    if ($left == "col-md-5") $left_n = 5;
    if ($left == "col-md-6") $left_n = 6;
    if ($right == "col-md-2") $right_n = 2;
    if ($right == "col-md-3") $right_n = 3;
    if ($right == "col-md-4") $right_n = 4;
    if ($right == "col-md-5") $right_n = 5;
    if ($right == "col-md-6") $right_n = 6;
    $left = str_replace("-md-","-lg-", $left);
    $right = str_replace("-md-","-lg-", $right);
    if ($left == "" && $right == "" && $sidebar == "right-left") $arr["content"] = "col-lg-6";
    if ($sidebar == "left") {
        $arr = array("left"=>$left ,"right"=>"","content"=>"col-lg-" . (12 - $left_n));
    }
    if ($sidebar == "right") {
        $arr = array("left"=>"" ,"right"=>$right,"content"=>"col-lg-" . (12 - $right_n));
    }
    if ($sidebar == "right-left") {
        $arr = array("left"=>$left,"right"=>$right,"content"=>"col-lg-" . (12 - $right_n - $left_n));
    }
    return $arr;
}
function hc_default_blog($cat = "", $tag = "", $date = "") {
    $content = "";
    $title = "";
    $subtitle = "";
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $args = array(' post_type' => 'post','posts_per_page' => 10,'paged' => $paged);
    if ($cat != "") $args['category_name'] = $cat;
    if ($tag != "") $args['tag'] = $tag;
    if ($date != "") {
        $args['monthnum'] = date("m",strtotime($date));
        $args['year'] = date("Y",strtotime($date));
    }
    $content_classic = "";
    $content_hc = "";
    $wp_query = new WP_Query($args);
    hc_default_title();
?>
 
<div class="full-screen-size default-wp-page">
    <div class="container content">
        <div class="row">
            <div class="col-md-9 col-center">
                <?php
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $content_classic = get_the_content();
            $content_hc = json_decode($content_classic, true);
                ?>
                <div class="advs-box advs-box-side boxed-inverse <?php if (is_sticky()) echo "sticky-post"; ?>" data-anima="fade-left" data-trigger="hover">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>
                                <a href="<?php echo esc_url(get_the_permalink()) ?>">
                                    <?php echo esc_attr(get_the_title()) ?>
                                </a>
                            </h3>
                            <hr class="anima" />
                            <p>
                                <?php echo get_the_excerpt(); ?>
                            </p>
                            <hr class="space s" />
                            <a class="circle-button btn btn-sm" href="<?php echo esc_url(get_the_permalink()) ?>">
                                <?php esc_attr_e("Read more","hc") ?>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="space m" />
                <?php
        }
        wp_reset_postdata();
    }
                ?>
                <?php if ($wp_query->max_num_pages > 1) {  ?>
                <ul class="pagination-sm pagination-grid pagination" data-page-items="3" data-pagination-anima="show-scale">
                    <li class="prev">
                        <?php echo get_previous_posts_link( '<i class="fa fa-angle-left"></i> Previous' ); ?>
                    </li>
                    <li class="next">
                        <?php echo get_next_posts_link( 'Next <i class="fa fa-angle-right"></i>', $wp_query->max_num_pages ); ?>
                    </li>
                </ul>
                <?php }  ?>
            </div>
        </div>
    </div>
</div>
<?php
}
function hc_default_title() {
    $type = hc_get_setting("title-type","base");
    $image_1 = hc_get_setting("title-image");
    $parallax = hc_is_setted("title-parallax");
    $ken_burn = hc_get_setting("title-ken-burn");
    $full_screen = hc_is_setted("title-fullscreen");
    $overlay = hc_get_setting("title-overlay");
    $tmp = hc_get_the_title();
    $title = $tmp[0];
    $subtitle = $tmp[1];
    $subtitle_class = (($subtitle == "") ? " no-subtitle":"");
    if ($type == "image") {
?>
<div class="header-title overlay-container white <?php echo esc_attr($ken_burn); if ($full_screen) echo " full-screen-title"; echo $subtitle_class; ?>"
    <?php  
        if ($parallax != "") {
            echo 'data-parallax="scroll" data-position="top" data-image-src="' . esc_url($image_1) . '"';
        } else echo ' style="background-image: url(' . esc_url($image_1) . ');"' ?>>
    <?php hc_combine_echo($overlay,'<div class="bg-overlay ','"></div>') ?>
    <div class="overlay-content overlaybox">
        <div class="container">
            <div class="title-base">
                <hr class="anima" />
                <h1>
                    <?php echo $title ?>
                </h1>
                <?php hc_combine_echo($subtitle,"<p>","</p>") ?>
            </div>
        </div>
    </div>
</div>
<?php }
    if ($type == "slider") {
        $image_2 = hc_get_setting("title-image-2");
        $image_3 = hc_get_setting("title-image-3");
?>
<div class="header-slider white <?php if ($full_screen) echo " full-screen-title"; if ($parallax) echo " header-parallax"; echo $subtitle_class; ?>">
    <?php if ($parallax) echo '<div class="layer-parallax">'; ?>
    <?php hc_combine_echo(esc_attr($overlay),'<div class="bg-overlay ','"></div>') ?>
    <div class="flexslider slider">
        <ul class="slides">
            <?php
        hc_combine_echo(esc_url($image_1),'<li><div class="bg-cover" style="background-image: url(',')"></div></li>');
        hc_combine_echo(esc_url($image_2),'<li><div class="bg-cover" style="background-image: url(',')"></div></li>');
        hc_combine_echo(esc_url($image_3),'<li><div class="bg-cover" style="background-image: url(',')"></div></li>');
            ?>
        </ul>
    </div>
    <?php if ($parallax) echo '</div>'; ?>
    <div class="overlaybox">
        <div class="container">
            <div class="title-base">
                <hr class="anima" />
                <h1>
                    <?php echo $title ?>
                </h1>
                <?php hc_combine_echo($subtitle,"<p>","</p>") ?>
            </div>
        </div>
    </div>
</div>
<?php }
    if ($type == "video") {
?>
<div class="header-video white <?php if ($full_screen) echo " full-screen-title"; if ($parallax) echo " header-parallax"; echo $subtitle_class;?>">
    <?php hc_combine_echo($overlay,'<div class="bg-overlay video ','"></div>') ?>
    <div class="videobox <?php if ($parallax) echo " layer-parallax" ?>">
        <?php $tmp = hc_get_setting("title-video");
              if (strpos($tmp,'.mp4') !== false) { ?>
        <video autoplay loop muted poster="<?php echo esc_url($image_1) ?>">
            <source src="<?php echo esc_url($tmp); ?>" type="video/mp4">
        </video>
        <?php } else { ?>
        <div class="videobox <?php if ($parallax) echo 'layer-parallax'; ?>">
            <div data-video-youtube="<?php echo ((strpos($tmp,'http') !== false) ? esc_url($tmp):esc_attr($tmp)) ?>"></div>
            <div class="mobile-poster" style="background-image:url(<?php echo esc_url($image_1) ?>)"></div>
        </div>
        <?php }  ?>
    </div>
    <div class="overlaybox">
        <div class="container">
            <div class="title-base">
                <hr class="anima" />
                <h1>
                    <?php echo $title ?>
                </h1>
                <?php hc_combine_echo($subtitle,"<p>","</p>") ?>
            </div>
        </div>
    </div>
</div>
<?php }
    if ($type == "base") {
?>
<header class="header-base" <?php hc_combine_echo(esc_url($image_1),'style="background-image: url(',')"') ?>>
    <div class="container">
        <h1><?php echo $title ?></h1>
        <?php hc_combine_echo($subtitle,"<h2>","</h2>") ?>
        <?php echo hc_get_breadcrumb(); ?>
    </div>
</header>
<?php }
}
?>
