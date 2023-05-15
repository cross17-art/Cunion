<?php
// =============================================================================
// POST_TYPES.PHP
// -----------------------------------------------------------------------------
// Hybric Composer post types front-end components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. GRID LIST - POST TYPE - Show the items of selected custom Post Type - Lists with the grid component. Grid documentation and demo: framework-y.com/containers/list-grid.html
//   02. MASONRY LIST - POST TYPE - Show the items of selected custom Post Type - Lists with the masonry component. Masonry documentation and demo: framework-y.com/containers/list-masonry.html
//   03. SLIDER LIST - POST TYPE - Show the items of selected custom Post Type - Lists with the slider component. Slider documentation and demo: framework-y.com/containers/sliders.html
//   04. COVERFLOW LIST - POST TYPE - Show the items of selected custom Post Type - Lists with the coverflow component. Coverflow documentation and demo: framework-y.com/containers/sliders.html#coverflow
//   05. MENU - POST TYPE - Show the categories menu of selected custom Post Type - Lists with the inner menu component. Inner menu documentation and demo: framework-y.com/components/menu/menu-inner-horizontal.html
//   06. TAG CLOUD - POST TYPE - Show the tags of post's blog
//   07. MENU NAVIGATION - POST TYPE - Show next post, previous post and archive page buttons
//   08. POST INFORMATIONS - POST TYPE - Show author, post date, post categories informations.
// =============================================================================

function hc_get_post_pagination($prev_text="", $next_text="", $pag_size="") {
	//if (is_singular()) return;

	global $hc_wp_query;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

	if( $hc_wp_query->max_num_pages <= 1 )	return;
	$max   = intval( $hc_wp_query->max_num_pages );
    $links = array();
	if ($paged >= 1) $links[] = $paged;
	if ($paged >= 3) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	if (($paged + 2 ) <= $max) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<ul class="pagination pagination-wp' . esc_attr($pag_size) . '">' . "\n";

    /**	Back Post Link */
    printf('<li%s><a href="%s">' . $prev_text . '</a></li>' . "\n", " class='prev" . ($paged == 1 ? " disabled":"") . "'", esc_url(get_pagenum_link($paged-1)),$paged-1);
	if (!in_array(1, $links)) {
		$class = 1 == $paged ? ' class="active page"' : ' class="page"';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1' );
		if (!in_array(2, $links)) echo '<li></li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort($links);
	foreach ((array)$links as $link ) {
		$class = $paged == $link ? ' class="active page"' : ' class="page"';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
	}

	/**	Link to last page, plus ellipses if necessary */
	if (!in_array($max, $links)) {
		if (!in_array($max - 1, $links)) echo '<li><a>...</a></li>' . "\n";
		$class = $paged == $max ? ' class="active"' : ' class="page"';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
	}

	/**	Next Post Link */
    if ($paged != $max) {
        printf('<li%s><a href="%s">' . $next_text .'</a></li>' . "\n", " class='next'", esc_url(get_pagenum_link($paged+1)),$paged+1);
    }

	echo '</ul>' . "\n";
    wp_reset_query();
}
function hc_echo_box_text($type, $subtitle = "",  $text = "", $subtitle_class = "", $text_class = "", $extra = "") {
    $html = "";
    if ($subtitle_class != "") {
        $subtitle_class = ' class="' . $subtitle_class . '"';
    }
    if ($text_class != "") {
        $text_class = ' class="' . $text_class . '"';
    }
    if (($type == "" || $type == "subtitle") && $subtitle != "") {
        $html .= '<p' . $subtitle_class . '>' . esc_attr($subtitle) . '</p>';
    }
    if ($type == "" && $subtitle == "" && $extra != "")  {
        $html .= '<p' . $subtitle_class . '>' . esc_attr($extra) . '</p>';
    }
    if (($type == "" ||$type == "description") && $text != "") {
        $html .= '<p' . $text_class . '>' . esc_attr($text) . '</p>';
    }
    if ($type == "extra" && $extra != "")  {
        $html .= '<p' . $text_class . '>' . esc_attr($extra) . '</p>';
    }
    echo $html;
}
function hc_get_post_type_item_box($item, &$Y_NOW) {
    $box_type = $Y_NOW["box"];
    $content = hc_get($Y_NOW,"content");
    $css = " " . hc_get($Y_NOW,"custom_css");
    $id = esc_attr($Y_NOW["id"]) . "_" . $item["id"];
    $button = hc_get($Y_NOW,"button_style","hidden");
    $data_href = "";
    if ($button == "hidden" || $Y_NOW["button_text"] == "") {
        $data_href = ' data-href="' . esc_url($item["link"]) . '"';
        $button = "";
    }
    if ($Y_NOW["button_text"] != "") {
        if ($button == "square") $button = "btn btn-default ";
        if ($button == "circle")  $button = "btn btn-circle ";
        if ($button == "square-border") $button = "btn btn-border ";
        if ($button == "circle-border") $button =  "btn btn-circle btn-border ";
        if ($button == "link") {
            $button =  "btn-text";
        } else {
            $button .= hc_get($Y_NOW, "button_dimensions", "btn-sm");
            if (hc_true($Y_NOW,"button_animation") && hc_true($Y_NOW, "button_icon")) $button .= " btn-anima btn-icon";
        }
        $button = '<a class="' . $button . '" href="' . esc_url($item["link"]) . '">' . ((hc_get($Y_NOW,"button_icon") != "") ? '<i class="' . hc_get($Y_NOW,"button_icon") . '"></i> ':'') . hc_json($Y_NOW["button_text"]) . '</a>';
    }
    $title_len = hc_get($Y_NOW,"title_length","-1");
    $excerpt_len = hc_get($Y_NOW,"excerpt_length","-1");
    $title_size = hc_get($Y_NOW,"title_size");
    $title = $item["title"];
    $extra_1 = (hc_true($Y_NOW, "extra") ? hc_combine($item["extra_1"],'<div class="extra-field">','</div>') : '');
    $excerpt = $item["excerpt"];
    $img = hc_get_img($item["image"], "large");
    if ($title_len != "-1" && strlen($title) > $title_len) $title = mb_substr($title,0,$title_len) . " ...";
    if ($excerpt_len != "-1" && strlen($excerpt) > $excerpt_len) $excerpt = mb_substr($excerpt,0,$excerpt_len) . " ...";
    if ($excerpt_len == 0) $excerpt = "";
    if (hc_true($Y_NOW, "boxed")) $css .= " boxed";
    $alt = "";
    $title = "<h2" . hc_combine(hc_get($Y_NOW, "title_size"), ' class="', '"') . ">" . $title . "</h2>";
    if (isset($item["image"])) {
        $arr = hc_get_img_arr($item["image"]);
        if (count($arr) >= 4) {
            $alt = get_post_meta($arr[3], '_wp_attachment_image_alt', true);
        }
    }
    $html = '';
    if ($box_type == "side_content" || $box_type == "top_icon_image") {
        switch ($box_type) {
            case "side_content":
                $css .= " cnt-box-side";
                break;
            case "top_icon_image":
                $css .= " cnt-box-top";
                break;
        }
        $html = '<div id="' . $id . '" class="cnt-box' . $css . '"' . $data_href . '>' . hc_combine($img, '<a href="' . esc_url($item["link"]) . '" class="img-box"><img src="', '" alt="' . $alt . '" /></a>');
        $html .= '<div class="caption">' . $title . $extra_1 . '<p>' . $excerpt . '</p>' . $button . '</div></div>';
    }
    if ($box_type == "blog_side" || $box_type == "blog_top") {
        $date = '<div class="blog-date"><span>' . date('d', $item["date"]) . '</span><span>' . date_i18n('M', $item["date"]) . ' ' . date('Y', $item["date"]) . '</span></div>';
        switch ($box_type) {
            case "blog_side":
                $css .= " cnt-box-blog-side";
                break;
            case "blog_top":
                $css .= " cnt-box-blog-top";
                break;
        }
        $html .= '<div id="' . $id . '" class="cnt-box' . $css . '"' . $data_href . '><a href="' . esc_url($item["link"]) . '" class="img-box">' . $date . hc_combine($img, '<img src="', '" alt="' . $alt . '" />' ) . '</a>';
        $html .= '<div class="caption">' . $title . $extra_1;
        $html .= hc_get_post_tags($item, $Y_NOW["post_type_slug"], true, true, false);
        $html .= '<p>' . $excerpt . '</p>' . $button . '</div></div>';
    }
    if ($box_type == "image_half_content" || $box_type == "image_full_content" || $box_type == "image_down_text" || $box_type == "image_classic_box") {
         switch ($box_type) {
            case "image_half_content":
                $css .= " media-box-half";
                break;
            case "image_full_content":
                $css .= " media-box-full";
                break;
            case "image_down_text":
                $css .= " media-box-down";
                break;
            case "image_classic_box":
                $css .= " media-box-reveal";
                break;
        }
        $html .= '<a href="' . esc_url($item["link"]) . '" class="media-box ' . $css . '"><img src="' . $img . '" alt="' . $alt . '" />';
        $html .= '<div class="caption">' . $title . ($box_type == "image_classic_box" ? '<h3>' . $item["subtitle"] . '</h3>' : '') . $extra_1 . '<p>' . $excerpt . '</p>' . '</div></a>';
    }
    return $html;
}
function hc_include_hc_pt_grid_list(&$Y_NOW, $EXTRA) {   ?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" data-columns="<?php echo hc_get($Y_NOW, "column", "1") ?>" <?php echo hc_combine(hc_get($Y_NOW, "column_lg"), ' data-columns-lg="','"') . hc_combine(hc_get($Y_NOW, "column_md"), ' data-columns-md="','"') . hc_combine(hc_get($Y_NOW, "column_sm"), ' data-columns-sm="','"') ?> class="grid-list <?php echo hc_get_component_classes($Y_NOW,$EXTRA) ?>" style="<?php echo hc_get($Y_NOW,"custom_css_styles"); ?>">
    <div class="grid-box" <?php hc_combine_echo(hc_get($Y_NOW, "margins"), 'style="grid-gap: ','px;"') ?> <?php echo hc_get_animation($Y_NOW) ?>>
    <?php
    global $HC_PT_CATEGORY;
    $cat = (($HC_PT_CATEGORY == "") ? $Y_NOW["post_type_category"]:$HC_PT_CATEGORY);
    $arr = hc_get_post_type_items($Y_NOW["post_type_slug"],$cat,((hc_get($Y_NOW, "pag_type") == "pagination_wp" || hc_get($Y_NOW, "pag_type") == "") ? $Y_NOW["pag_items"] : "9999"));
    $count = count($arr);
    if ($count > 0) {
        $grid_container =  '<div class="grid-item">';
        $boxed = "";
        if ($Y_NOW["boxed"] == "true") $boxed = "boxed";
        for ($i = 0; $i < count($arr); $i++) {
            echo $grid_container;
            echo hc_get_post_type_item_box($arr[$i],$Y_NOW);
            echo '</div>';
        }
    } else echo "<div class='align-center' style='width: 100%;'>" . esc_attr__("We didn't find any ","hc") . $Y_NOW["post_type_slug"] . ".</div>";
        ?>
    </div>
    <?php
    if ($count > 0) {
        hc_set_pagination($Y_NOW);
    }
    ?>
</div>
<?php }
function hc_include_hc_pt_masonry_list(&$Y_NOW,$EXTRA) {
    global $HC_PT_CATEGORY;
    $catsArr = ($Y_NOW["post_type_slug"] != "post" ? get_terms(array('taxonomy' => $Y_NOW["post_type_slug"] . '-cat','hide_empty' => true)) : get_categories());
    $cat = (($HC_PT_CATEGORY == "") ? $Y_NOW["post_type_category"]:$HC_PT_CATEGORY);
    $arr = hc_get_post_type_items($Y_NOW["post_type_slug"],$cat,(($Y_NOW["pag_type"] == "pagination_wp" || $Y_NOW["pag_type"] == "") ? $Y_NOW["pag_items"] : "9999"));
    $count = count($arr);
    echo '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-component hc-cmp-masonry-list maso-list' . hc_get_component_classes($Y_NOW, $EXTRA) . (hc_true($Y_NOW, "auto_masonry") ? " maso-layout" : "") . '" data-columns="' . hc_get($Y_NOW, "column", "1") . '"' . hc_combine(hc_get($Y_NOW, "column_lg"), ' data-columns-lg="','"') . hc_combine(hc_get($Y_NOW, "column_md"), ' data-columns-md="','"') . hc_combine(hc_get($Y_NOW, "column_sm"), ' data-columns-sm="','"') . hc_combine(hc_get($Y_NOW, "column_xs"), ' data-columns-xs="','"') . hc_combine(hc_get($Y_NOW, "custom_css_styles"),' style="','"') . ' ' .  hc_get_animation($Y_NOW) . '>';
    if (hc_true($Y_NOW, "menu") && $count > 0) {
        $html = '<div class="menu-inner ' . hc_get($Y_NOW, "menu_position") . '"><div><i class="menu-btn"></i><span>' . __("Menu","hc") . '</span></div><ul>';
        if (hc_true($Y_NOW, "menu_btn_all")) {
            $html .= '<li class="active"><a data-filter="maso-item" class="active" href="#">' . hc_get($Y_NOW, "all_text", "All") . '</a></li>';
        }
        if (!is_wp_error($catsArr)) {
            foreach ($catsArr as $term) {
                $html .= '<li><a data-filter="cat-'. urldecode(esc_attr($term->slug)) .'">'. esc_attr($term->name) .'</a></li>';
            }
        }
        if (hc_true($Y_NOW, "menu_btn_order")) {
            $html .= '<li><a class="maso-order" data-sort="asc"></a></li>';
        }
        echo $html . '</ul></div>';
    }
    echo '<div class="maso-box"' . hc_combine(hc_get($Y_NOW, "margins"), ' style="margin: -', 'px"') . '>';
    $padding = hc_combine(hc_get($Y_NOW, "margins"), ' style="padding: ', 'px"');
    $boxed = "";
    if (hc_true($Y_NOW, "boxed")) $boxed = "boxed";
    for ($i = 0; $i < count($arr); $i++) {
        if ($Y_NOW["post_type_slug"] == "post") $post_categories = get_the_category($arr[$i]["id"]);
        else $post_categories = get_the_terms($arr[$i]["id"], $Y_NOW["post_type_slug"] . '-cat');
        $cat_html = "";
        if ($post_categories != false && !isset($post_categories->errors)) {
            foreach($post_categories as $c){
                $cat_html .= ' cat-'. urldecode($c->slug);
            }
        }
        echo '<div data-sort="' . $i .'" class="maso-item cat-' . esc_attr($cat_html) . '"' . $padding . '>';
        echo hc_get_post_type_item_box($arr[$i],$Y_NOW);
        echo '</div>';
    }
    echo '</div>';
    hc_set_pagination($Y_NOW);
    echo '</div>';
}
function hc_include_hc_pt_slider(&$Y_NOW,$EXTRA) {
    echo '<ul id="' . hc_get($Y_NOW, "id") . '"' . ' class="slider ' . hc_get_component_classes($Y_NOW,$EXTRA) . '"' . hc_combine(hc_get($Y_NOW, "data_options"), ' data-options="', '"') . hc_combine(hc_get($Y_NOW, "custom_css_styles"), ' style="', '"') . hc_combine(hc_get($Y_NOW, "trigger"), ' data-trigger="','"') . " " . hc_get_animation($Y_NOW) . '>';
    global $HC_PT_CATEGORY;
    $cat = (($HC_PT_CATEGORY == "") ? $Y_NOW["post_type_category"]:$HC_PT_CATEGORY);
    $arr = hc_get_post_type_items($Y_NOW["post_type_slug"],$cat,$Y_NOW["num_items"]);

    for ($i = 0; $i < count($arr); $i++) {
        echo '<li>';
        echo hc_get_post_type_item_box($arr[$i],$Y_NOW);
        echo '</li>';
    }
    echo '</ul>';
}
function hc_include_hc_pt_menu(&$Y_NOW,$EXTRA) {
    global $HC_PT_CATEGORY;
    $menu_html = '';
    $menu_type =  $Y_NOW["type"];
    $slug = $Y_NOW["post_type_slug"];
    $menu_html = '<ul id="hc-inner-menu">';
    if ($Y_NOW["all_button_text"] != "") $menu_html .= '<li ' . (($HC_PT_CATEGORY == "") ? 'class="active"':'') . '><a href="' . (($Y_NOW["post_type_slug"] != "post") ? esc_url(get_post_type_archive_link($Y_NOW["post_type_slug"])):esc_url(get_page_link(hc_get_setting('blog-page')))) . '">' . esc_attr($Y_NOW["all_button_text"]) . '</a></li>';
    if ($slug == "") $slug = "post";
    if ($slug != "post") {
        $arr = get_terms(array('taxonomy' => $Y_NOW["post_type_slug"] . '-cat','hide_empty' => true));
        foreach ($arr as $term) {
            $menu_html .= '<li ' . (($HC_PT_CATEGORY == $term->slug) ? 'class="active"':'') . '><a href="' . get_term_link($term->term_id) . '">' . $term->name . '</a></li>';
        }
    }  else {
        $arr = get_categories();
        foreach ($arr as $term ) {
            if ($term->term_id > 1 && $term->cat_name != "Uncategorized") $menu_html .= '<li ' . (($HC_PT_CATEGORY == $term->slug) ? 'class="active"':'') . '><a href="' . get_category_link($term->term_id) .'">' . $term->name . '</a></li>';
        }
    }

    $menu_html .= '</ul>';
    if ($menu_type == "horizontal") echo '<div id="' . esc_attr($Y_NOW["id"]) . '" class="menu-inner ' . esc_attr($Y_NOW["style"]) . ' ' . esc_attr($Y_NOW["alignment"]) . ' ' . hc_get_component_classes($Y_NOW,$EXTRA) .'" style="' . hc_get($Y_NOW,"custom_css_styles") .'" ' . hc_get_animation($Y_NOW) . '><div><i class="menu-btn"></i><span>' . esc_attr__("Menu","hc") . '</span></div>' . $menu_html . '</div>';
    if ($menu_type == "vertical") echo '<div id="' . esc_attr($Y_NOW["id"]) . '"  class="menu-inner menu-inner-vertical ' . hc_get_component_classes($Y_NOW,$EXTRA) .'" style="' . hc_get($Y_NOW,"custom_css_styles") .'" ' . hc_get_animation($Y_NOW) . '>' . $menu_html . '</div>';
}
function hc_include_hc_pt_tag_cloud(&$Y_NOW,$EXTRA) {
    $arr = get_tags( array("orderby" => $Y_NOW["orderby"],"order" => $Y_NOW["order"],"number" => $Y_NOW["items"]));
    $html = '';
    for ($i = 0; $i < count($arr); $i++){
        $html .= '<a href="' . esc_url(get_tag_link($arr[$i]->term_id)) .'">' . esc_attr($arr[$i]->name) . '</a>';
    }
    echo '<div id="' . esc_attr($Y_NOW["id"]) . '" class="tagbox" ' . hc_get_animation($Y_NOW) . '>' . $html . '</div>';
}
function hc_include_hc_pt_navigation(&$Y_NOW,$EXTRA) {
    global $HC_PT_CATEGORY;
    $prev = get_previous_post_link('%link',esc_attr($Y_NOW["previous_text"]));
    $next = get_next_post_link('%link',esc_attr($Y_NOW["next_text"]));
    $link = hc_get($Y_NOW,"archive_link");
    if ($link == "") $link = (($Y_NOW["post_type_slug"] != "post") ? esc_url(get_post_type_archive_link($Y_NOW["post_type_slug"])) : esc_url(get_permalink(hc_get_setting('blog-page'))));
?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="list-nav <?php echo hc_get_component_classes($Y_NOW,$EXTRA); ?>" <?php hc_combine_echo(hc_get($Y_NOW,"custom_css_styles"),'style="','"'); ?>>
    <?php if (strlen($prev) > 0) { echo $prev; } else { echo '<a class="hidden"></a>'; } ?>
    <a class="list-archive" href="<?php echo esc_url($link) ?>"></a>
    <?php if (strlen($next) > 0) { echo $next; } else { echo '<a class="hidden"></a>'; } ?>
</div>
<?php
}
function hc_include_hc_pt_post_informations(&$Y_NOW,$EXTRA) {
    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day   = get_the_time('d');
    $txt = "";
    $txt .= '<ul class="icon-list icon-list-horizontal list-post-info ' . hc_get($Y_NOW, "position") . '">';
    if (hc_true($Y_NOW, "date")) {
        $txt .= '<li><i class="icon-calendar"></i> <a href="' . get_day_link( $archive_year, $archive_month, $archive_day) . '">' . get_the_date() . '</a></li>';
    }
    if (hc_true($Y_NOW, "categories")) {
        $txt .= '<li><i class="icon-bookmark"></i> ';
        $categories = get_the_category();
        $separator = ', ';
        $output = '';
        $index = 0;
        if ( ! empty( $categories ) ) {
            foreach( $categories as $category ) {
                $index++;
                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
            }
            $txt .= trim($output, $separator) . '</li>';
        }
    }
    if (hc_true($Y_NOW, "author")) {
        $txt .= '<li><i class="icon-user"></i><a href="' . get_author_posts_url(get_the_author_meta("ID")) . '">' . get_the_author() . '</a></li>';
    }
    echo $txt . '</ul>';
} ?>

