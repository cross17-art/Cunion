<?php
// =============================================================================
// CONTAINERS.PHP
// -----------------------------------------------------------------------------
// Hybric Composer containers front-end components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. SCROLL BOX - Documentation and demo: framework-y.com/containers/others.html#scroll-box
//   02. GRID TABLE - Documentation and demo: framework-y.com/components/components.html#table-bootgrid
//   03. PAGE LIGHTBOX - Documentation and demo: framework-y.com/containers/lightbox-popup.html
//   04. PAGE POPUPS - Documentation and demo: framework-y.com/containers/lightbox-popup.html
//   05. SLIDER - Documentation and demo: framework-y.com/containers/sliders.html
//   06. TAB - Documentation and demo: framework-y.com/containers/others.html#tabs
//   07. ACCORDION - Documentation and demo: framework-y.com/containers/others.html#accordion-lists
//   08. COLLAPSE - Documentation and demo: framework-y.com/containers/others.html#cbox
//   09. GRID LIST - Documentation and demo: framework-y.com/containers/list-grid.html
//   10. MASONRY LIST - Documentation and demo: framework-y.com/containers/list-masonry.html
//   11. ALBUM - Documentation and demo: framework-y.com/containers/list-masonry.html#maso-gallery-albums
//   12. FIXED AREA - Documentation and demo: framework-y.com/components/components-base.html#base-javascript
//   13. POPOVER - Documentation and demo: framework-y.com/components/components-bootstrap.html#popovers
//   14. STEPS - Documentation and demo: framework-y.com/components/containers/others.html#steps
// =============================================================================

if (!defined("HC_FRONT")) {
    define("HC_FRONT", (((isset($_GET["hc"]) && $_GET["hc"] == "front") || (isset($_POST["action"]) && $_POST["action"] == "hc_ajax_front_functions")) ? true: false));
}

function hc_include_hc_scroll_box(&$Y_NOW,$EXTRA) {
    echo '<div id="' . hc_get($Y_NOW, "id") . '"' . hc_combine(hc_get($Y_NOW, "remove_height"), 'data-offset="', '"') . ' class="hc-cmp-scroll-box scroll-box ' . hc_get_component_classes($Y_NOW,$EXTRA) . ' ' . hc_get($Y_NOW, "responsive") . '" data-height="' . hc_get($Y_NOW,"height", "100") . '"' . hc_combine(hc_get($Y_NOW,"data_options"), ' data-options="', '"') . hc_combine(hc_get($Y_NOW ,"custom_css_styles"), ' style="', '"') . " " . hc_get_animation($Y_NOW) . '>';
    if (isset($Y_NOW["content"])) {
        $CURRENT_SECTION = $Y_NOW["content"];
        for ($i = 0; $i < count($CURRENT_SECTION); $i++) {
            hc_get_content_recursive($CURRENT_SECTION[$i],$EXTRA);
        }
    }
    echo '</div>';
}
function hc_include_hc_grid_table(&$Y_NOW,$EXTRA) {
    $CURRENT_SECTION = hc_get($Y_NOW, "content");
    if ($CURRENT_SECTION == "") $CURRENT_SECTION = array();
    $cols = $Y_NOW["cols"];
    $css = "hc-component hc-cmp-grid-table table table-grid " . hc_get($Y_NOW, "style") . " " . hc_get($Y_NOW, "responsive") . " " . hc_get_component_classes($Y_NOW,$EXTRA) . (hc_true($Y_NOW, "full_mobile") ? "table-full-sm" : "");
?>
<table id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="<?php echo $css; ?>" style="<?php echo hc_get($Y_NOW, "custom_css_styles"); ?>" <?php echo hc_get_animation($Y_NOW) ?>>
    <tbody>
        <?php
    for ($i = 0; $i < $Y_NOW["rows"]; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $Y_NOW["cols"]; $j++) {
            echo "<td>";
            $index = $i * $cols + $j;
            if ($index < count($CURRENT_SECTION) && isset($CURRENT_SECTION[$i * $cols + $j])) {
                $item = $CURRENT_SECTION[$i * $cols + $j];
                hc_get_content_recursive($item, $EXTRA);
            }
            echo "</td>";
        }
        echo "</tr>";
    }
        ?>
    </tbody>
</table>
<?php }
function hc_include_hc_image_slider(&$Y_NOW,$EXTRA) {
    $html = '<ul id="' . hc_get($Y_NOW, "id") . '"' . ' class="hc-component hc-cmp-image-slider slider ' . hc_get_component_classes($Y_NOW,$EXTRA) . '"' . hc_combine(hc_get($Y_NOW, "data_options"), ' data-options="', '"') . hc_combine(hc_get($Y_NOW, "custom_css_styles"), ' style="', '"') . hc_combine(hc_get($Y_NOW, "trigger"), ' data-trigger="','"') . " " . hc_get_animation($Y_NOW) . '>';
    $arr = hc_get($Y_NOW, "slides", array());
    $lightbox_animation = hc_combine(hc_get($Y_NOW, "lightbox_animation"), ' data-lightbox-anima="', '"');
    $lightbox = hc_true($Y_NOW, "lightbox");
    $css = ($lightbox ? "lightbox" : "") . hc_combine(hc_get($Y_NOW, "image_animation"), " img-", "") . (hc_true($Y_NOW, "png") ? " img-png" : "") . " " . hc_get($Y_NOW, "custom_classes");
    for ($i = 0; $i < count($arr); $i++) {
        $link = hc_get($arr[$i],"link");
        if ($link != "") {
            $href =  ($lightbox ?  hc_get_img($link, hc_get($Y_NOW, "image_size", "ultra-large")) : "#");
            $html .= '<li><a class="img-box ' . $css . '" href="' . $href . '"' . $lightbox_animation . '><img alt="slide" src="'.  hc_get_img($link, $Y_NOW["thumb_size"]) . '" /></a></li>';
        }
    }
    echo $html . '</ul>';
}
function hc_include_hc_slider(&$Y_NOW,$EXTRA) {
    echo '<ul id="' . hc_get($Y_NOW, "id") . '"' . ' class="hc-cmp-slider slider ' . hc_get_component_classes($Y_NOW,$EXTRA) . '"' . hc_combine(hc_get($Y_NOW, "data_options"), ' data-options="', '"') . hc_combine(hc_get($Y_NOW, "custom_css_styles"), ' style="', '"') . hc_combine(hc_get($Y_NOW, "trigger"), ' data-trigger="','"') . " " . hc_get_animation($Y_NOW) . '>';
    $arr = hc_get($Y_NOW,"content", []);
    $CURRENT_SECTION = hc_get($Y_NOW, "content", []);
    for ($i = 0; $i < count($arr); $i++) {
        echo '<li>';
        hc_get_content_recursive($CURRENT_SECTION[$i], $EXTRA);
        echo '</li>';
    }
    echo '</ul>';
}
function hc_include_hc_tab(&$Y_NOW,$EXTRA) {
    $menu = '<ul class="tab-nav ' . hc_get($Y_NOW, "alignment") . '">';
    $style =  hc_get($Y_NOW, "style");
    $css = hc_get($Y_NOW, "style") . (hc_get($Y_NOW, "icon_1") != "" ? " tab-icon" : "");
    $inverted = (($style == "tab-inverse" || $style == "tab-vertical tab-inverse") ? true : false);
    echo '<div id="' . hc_get($Y_NOW, "id") . '"' . ' class="hc-component hc-cmp-tab tab-box ' . hc_get_component_classes($Y_NOW,$EXTRA) . ' ' . $css . '"' . hc_combine(hc_get($Y_NOW ,"tab_animation"), ' data-tab-anima="', '"') . hc_combine(hc_get($Y_NOW ,"custom_css_styles"), ' style="', '"') . " " . hc_get_animation($Y_NOW) . '>';
    for ($i = 1; $i < 9; $i++) {
        $name = hc_get($Y_NOW, "name_" . $i);
        if ($name != "") {
            $menu .= '<li' . (($i == 1) ? ' class="active"' : '') . '><a href="#">' . hc_combine(hc_get($Y_NOW, "icon_" . $i), '<i class="', '"></i>') . $name . '</a></li>';
        }
    }
    $menu .= '</ul>';
    if (!$inverted) {
        echo $menu;
    }
    for ($i = 1; $i < 9; $i++) {
        if (hc_get($Y_NOW, "name_" . $i) != "") {
            $CURRENT_SECTION = hc_get($Y_NOW, "content_". $i, array());
            echo '<div class="panel' . (($i == 1) ? " active" : "") . '">';
            for ($j = 0; $j < count($CURRENT_SECTION); $j++) {
                hc_get_content_recursive($CURRENT_SECTION[$j], $EXTRA);
            }
            echo '</div>';
        }
    }
    if ($inverted) {
        echo $menu;
    }
    echo '</div>';
}
function hc_include_hc_accordion(&$Y_NOW,$EXTRA) {
    echo '<ul id="' . hc_get($Y_NOW, "id") . '" class="hc-component hc-cmp-accordion accordion-list ' . hc_get_component_classes($Y_NOW, $EXTRA) . '"' . hc_combine(hc_get($Y_NOW, "open_type"), ' data-type="', '"') . hc_combine(hc_get($Y_NOW, "time"), ' data-time="', '"') . hc_combine(hc_get($Y_NOW, "open"), ' data-open="','"') . hc_combine(hc_get($Y_NOW, "custom_css_styles"),' style="','"') . ' ' .  hc_get_animation($Y_NOW) . '>';
    for ($i = 1; $i < 11; $i++) {
        if (hc_get($Y_NOW, "name_" . $i)) {
            $arr = hc_get($Y_NOW, "content_" . $i, array());
            $CURRENT_SECTION = hc_get($Y_NOW, "content_" . $i, array());
?>
<li>
    <a href="#">
        <?php echo hc_get($Y_NOW, "name_" . $i) ?>
    </a>
    <div class="content">
        <?php
            for ($j = 0; $j < count($arr); $j++) {
                hc_get_content_recursive($CURRENT_SECTION[$j], $EXTRA);
            }
        ?>
    </div>
</li>
<?php  }
    }
    echo '</ul>';
}
function hc_include_hc_steps(&$Y_NOW,$EXTRA) {
    $steps_num = 1;
    $col = hc_get($Y_NOW, "columns", "");
    if (hc_get($Y_NOW, "name_2") != "") { $steps_num = 2; }
    if (hc_get($Y_NOW, "name_3") != "") { $steps_num = 3; }
    if (hc_get($Y_NOW, "name_4") != "") { $steps_num = 4; }
    if (hc_get($Y_NOW, "name_5") != "") { $steps_num = 5; }
    if (hc_get($Y_NOW, "name_6") != "") { $steps_num = 6; }
    echo '<div id="' . hc_get($Y_NOW, "id") . '" data-columns="' . $col . '" class="hc-component hc-cmp-steps box-steps ' . hc_get_component_classes($Y_NOW, $EXTRA) . ' ' . hc_get($Y_NOW, "direction") . '"' . hc_combine(hc_get($Y_NOW, "custom_css_styles"),' style="','"') . ' ' .  hc_get_animation($Y_NOW) . '>';
    for ($i = 1; $i <= $steps_num; $i++) {
        echo '<div class="step-item"><span>' . hc_get($Y_NOW, "number_" . $i) . '</span><div class="content"><h3>' . hc_get($Y_NOW, "name_" . $i) . '</h3><div>';
        if (isset($Y_NOW["content_" . $i]) && count($Y_NOW["content_" . $i]) > 0) {
            $CURRENT_SECTION = hc_get($Y_NOW, "content_" . $i, array());
            for ($j = 0; $j < count($CURRENT_SECTION); $j++) {
                hc_get_content_recursive($CURRENT_SECTION[$j], $EXTRA);
            }
        }
        echo '</div></div></div>';
    }
    echo '</div>';
}
function hc_include_hc_collapse(&$Y_NOW,$EXTRA) { ?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="hc-component hc-cmp-collapse collapse-box <?php echo hc_get_component_classes($Y_NOW, $EXTRA) . " " . hc_get($Y_NOW, "alignment"); ?>" <?php hc_combine_echo(hc_get($Y_NOW, "height"), " data-height='", "'");  hc_combine_echo(hc_get($Y_NOW, "time")," data-time='", "'") ?> style="<?php  echo hc_get($Y_NOW,"custom_css_styles"); ?>" <?php echo hc_get_animation($Y_NOW) ?>>
    <div class="content">
        <?php
    $arr = $Y_NOW["content"];
    $CURRENT_SECTION = $Y_NOW["content"];
    for ($i = 0; $i < count($arr); $i++) {
        hc_get_content_recursive($CURRENT_SECTION[$i],$EXTRA);
    } ?>
    </div>
    <?php echo '<div class="collapse-button"><a data-button-open-text="' . hc_get($Y_NOW,"button_open_text","Close") . '">' . hc_get($Y_NOW,"button_text","Show all") . '</a></div>'; ?>
</div>
<?php }
function hc_include_hc_grid_list(&$Y_NOW,$EXTRA) {
    echo '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-component hc-cmp-grid-list grid-list' . hc_get_component_classes($Y_NOW,$EXTRA) . '" data-columns="' . hc_get($Y_NOW, "column", "1") . '"' . hc_combine(hc_get($Y_NOW, "column_lg"), ' data-columns-lg="','"') . hc_combine(hc_get($Y_NOW, "column_md"), ' data-columns-md="','"') . hc_combine(hc_get($Y_NOW, "column_sm"), ' data-columns-sm="','"') . hc_combine(hc_get($Y_NOW, "column_xs"), ' data-columns-xs="','"') . hc_combine(hc_get($Y_NOW, "custom_css_styles"),' style="','"') . ' ' .  hc_get_animation($Y_NOW) . '>';
    echo '<div class="grid-box"' . hc_combine(hc_get($Y_NOW, "margins"), ' style="grid-gap: ', 'px"') . '>';
    $arr = hc_get($Y_NOW, "content", array());
    $CURRENT_SECTION = hc_get($Y_NOW, "content", array());
    for ($i = 0; $i < count($arr); $i++) {
        echo '<div class="grid-item">';
        hc_get_content_recursive($CURRENT_SECTION[$i], $EXTRA);
        echo '</div>';
    }
    if (HC_FRONT && count($arr) == 0) {
        echo '<div class="grid-item"></div>';
    }
    echo '</div>';
    hc_set_pagination($Y_NOW);
    echo '</div>';
}
function hc_include_hc_masonry_list(&$Y_NOW,$EXTRA = array()) {
    echo '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-component hc-cmp-masonry-list maso-list' . hc_get_component_classes($Y_NOW, $EXTRA) . (hc_true($Y_NOW, "auto_masonry") ? " maso-layout" : "") . '" data-columns="' . hc_get($Y_NOW, "column", "1") . '"' . hc_combine(hc_get($Y_NOW, "column_lg"), ' data-columns-lg="','"') . hc_combine(hc_get($Y_NOW, "column_md"), ' data-columns-md="','"') . hc_combine(hc_get($Y_NOW, "column_sm"), ' data-columns-sm="','"') . hc_combine(hc_get($Y_NOW, "column_xs"), ' data-columns-xs="','"') . hc_combine(hc_get($Y_NOW, "custom_css_styles"),' style="','"') . ' ' .  hc_get_animation($Y_NOW) . '>';
    if (hc_true($Y_NOW, "menu")) {
        $html = '<div class="menu-inner ' . hc_get($Y_NOW, "menu_alignment") . '"><div><i class="menu-btn"></i><span>' . __("Menu","hc") . '</span></div><ul>';
        if (hc_true($Y_NOW, "menu_btn_all")) {
            $html .= '<li class="active"><a data-filter="maso-item" class="active" href="#">' . hc_get($Y_NOW, "all_text", "All") . '</a></li>';
        }
        for ($i = 1; $i < 11; $i++) {
            if (hc_get($Y_NOW, "name_" . $i) != "") $html .= '<li><a data-filter="cat-'. esc_attr($i) .'">' . esc_attr($Y_NOW["name_" . $i]) . '</a></li>';
        }
        if (hc_true($Y_NOW, "menu_btn_order")) {
            $html .= '<li><a class="maso-order" data-sort="asc"></a></li>';
        }
        echo $html . '</ul></div>';
    }
    echo '<div class="maso-box"' . hc_combine(hc_get($Y_NOW, "margins"), ' style="margin: -', 'px"') . '>';
    $padding = hc_combine(hc_get($Y_NOW, "margins"), ' style="padding: ', 'px"');
    $index = 0;
    for ($j = 1; $j < 11; $j++)  {
        $arr = hc_get($Y_NOW, "content_" . $j, array());
        if (count($arr) > 0) {
            $CURRENT_SECTION = $Y_NOW["content_" . $j];
            for ($i = 0; $i < count($arr); $i++) {
                $index = $index + 1;
                echo '<div data-sort="' . $index . '" class="maso-item cat-' . $j . '"' . $padding . '>';
                hc_get_content_recursive($CURRENT_SECTION[$i], $EXTRA);
                echo '</div>';
            }
        }
    }
    if (HC_FRONT && $index == 0) {
        echo '<div class="maso-item"></div>';
    }
    echo '</div>';
    hc_set_pagination($Y_NOW);
    echo '</div>';
}
function hc_include_hc_image_grid_list(&$Y_NOW,$EXTRA) {
    $lightbox_size = hc_get($Y_NOW, "lightbox_size", "ultra-large");
    $thumb_size = hc_get($Y_NOW, "thumb_size", "extra-large");
    $css = hc_get_component_classes($Y_NOW, $EXTRA) . " list-gallery";
    $image_css = hc_get($Y_NOW, "css");
    $arr = hc_get($Y_NOW, "images", array());
    $icon_animation = hc_combine(hc_get($Y_NOW, "icon_animation"), ' data-anima="','" data-trigger="hover"' . (hc_true($Y_NOW, "hide_icon") ? ' data-hidden="hide"' : ''));
    $icon = hc_combine(hc_get($Y_NOW, "icon"), '<i class="' . (($icon_animation != "") ? "anima " : ""), '"></i>');
    $html = "";
    echo '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-component hc-cmp-image-grid-list grid-list' . $css . '" data-columns="' . hc_get($Y_NOW, "column", "1") . '"' . hc_combine(hc_get($Y_NOW, "column_lg"), ' data-columns-lg="','"') . hc_combine(hc_get($Y_NOW, "column_md"), ' data-columns-md="','"') . hc_combine(hc_get($Y_NOW, "column_sm"), ' data-columns-sm="','"') . hc_combine(hc_get($Y_NOW, "column_xs"), ' data-columns-xs="','"') . hc_combine(hc_get($Y_NOW, "custom_css_styles"),' style="','"') . hc_combine(hc_get($Y_NOW, "lightbox_animation"), ' data-lightbox-anima="', '"') . ' ' .  hc_get_animation($Y_NOW) . '>';
    echo '<div class="grid-box"' . hc_combine(hc_get($Y_NOW, "margins"), ' style=" grid-gap: ', 'px"') . '>';
    for ($i = 0; $i < count($arr); $i++)  {
        $html .= '<div class="grid-item"><a class="img-box ' . $image_css . hc_combine(hc_get($Y_NOW, "hover_animation")," img-") . '"' . $icon_animation . ' href="' . hc_get_img($arr[$i]["link"], $lightbox_size) . '">' .  $icon . '<img alt="" src="' . hc_get_img($arr[$i]["link"], $thumb_size) . '" /></a></div>';
    }
    echo $html;
    echo '</div>';
    hc_set_pagination($Y_NOW);
    echo '</div>';
}
function hc_include_hc_image_masonry_list(&$Y_NOW,$EXTRA = array()) {
    $lightbox_size = hc_get($Y_NOW, "lightbox_size", "ultra-large");
    $thumb_size = hc_get($Y_NOW, "thumb_size", "extra-large");
    $css = hc_get_component_classes($Y_NOW, $EXTRA) . " list-gallery " . (hc_true($Y_NOW, "auto_masonry") ? " maso-layout" : "");
    $image_css = hc_get($Y_NOW, "css");
    $arr = hc_get($Y_NOW, "images", array());
    $icon_animation = hc_combine(hc_get($Y_NOW, "icon_animation"), ' data-anima="','" data-trigger="hover"' . (hc_true($Y_NOW, "hide_icon") ? ' data-hidden="hide"' : ''));
    $icon = hc_combine(hc_get($Y_NOW, "icon"), '<i class="' . (($icon_animation != "") ? "anima " : ""), '"></i>');
    $html = "";
    echo '<div id="' . hc_get($Y_NOW, "id") . '" class="hc-component hc-cmp-image-masonry-list maso-list' . $css . '" data-columns="' . hc_get($Y_NOW, "column", "1") . '"' . hc_combine(hc_get($Y_NOW, "column_lg"), ' data-columns-lg="','"') . hc_combine(hc_get($Y_NOW, "column_md"), ' data-columns-md="','"') . hc_combine(hc_get($Y_NOW, "column_sm"), ' data-columns-sm="','"') . hc_combine(hc_get($Y_NOW, "column_xs"), ' data-columns-xs="','"') . hc_combine(hc_get($Y_NOW, "custom_css_styles"),' style="','"') . hc_combine(hc_get($Y_NOW, "lightbox_animation"), ' data-lightbox-anima="', '"') . ' ' .  hc_get_animation($Y_NOW) . '>';
    if (hc_true($Y_NOW, "menu")) {
        $html = '<div class="menu-inner ' . hc_get($Y_NOW, "menu_alignment") . '"><div><i class="menu-btn"></i><span>' . __("Menu","hc") . '</span></div><ul>';
        if (hc_true($Y_NOW, "menu_btn_all")) {
            $html .= '<li class="maso-auto active"><a data-filter="maso-item" href="#">' . hc_get($Y_NOW, "all_text", "All") . '</a></li>';
        }
        for ($i = 1; $i < 11; $i++) {
            if (hc_get($Y_NOW, "name_" . $i) != "") $html .= '<li><a data-filter="cat-'. $i .'">' . hc_get($Y_NOW, "name_" . $i) . '</a></li>';
        }
        if (hc_true($Y_NOW, "menu_btn_order")) {
            $html .= '<li class="maso-auto"><a class="maso-order" data-sort="asc"></a></li>';
        }
        echo $html . '</ul></div>';
    }
    echo '<div class="maso-box"' . hc_combine(hc_get($Y_NOW, "margins"), ' style="margin: -', 'px"') . '>';
    $padding = hc_combine(hc_get($Y_NOW, "margins"), ' style="padding: ', 'px"');
    $index = 0;
    $html = "";
    for ($j = 1; $j < 11; $j++)  {
        $arr = hc_get($Y_NOW, "images_" . $j, array());
        if (hc_get($Y_NOW, "name_" . $j) != "" && count($arr) > 0) {
            for ($i = 0; $i < count($arr); $i++) {
                $index = $index + 1;
                $html .= '<div data-menu="' . $j .  '" data-sort="' . $index . '" class="maso-item cat-' . $j . '"' . $padding . '>';
                $html .= '<a class="img-box ' . $image_css . hc_combine(hc_get($Y_NOW, "hover_animation")," img-") . '"' . $icon_animation . '" href="' . hc_get_img($arr[$i]["link"], $lightbox_size) . '">' .  $icon . '<img alt="" src="' . hc_get_img($arr[$i]["link"], $thumb_size) . '" /></a>';
                $html .= '</div>';
            }
        }
    }
    echo $html;
    echo '</div>';
    hc_set_pagination($Y_NOW);
    echo '</div>';
}
function hc_include_hc_album(&$Y_NOW,$EXTRA = array()) { ?>
<div id="<?php echo hc_get($Y_NOW, "id") ?>" class="hc-component hc-cmp-album album <?php echo hc_get_component_classes($Y_NOW,$EXTRA); ?>" <?php hc_combine_echo(hc_get($Y_NOW, "album_animation"), 'data-album-anima="', '"') . hc_combine_echo(hc_get($Y_NOW, "custom_css_styles"), 'style="', '"') ?> <?php echo hc_get_animation($Y_NOW) . 'data-columns="' . hc_get($Y_NOW, "column", "3") . '"' . hc_combine(hc_get($Y_NOW, "column_md"), ' data-columns-md="','"') . hc_combine(hc_get($Y_NOW, "column_sm"), ' data-columns-sm="','"') . hc_combine(hc_get($Y_NOW, "column_xs"), ' data-columns-xs="','"') ?>>
    <div class="album-list">
        <?php
    $CURRENT_SECTION = $Y_NOW["menu_items"];
    for ($i = 0; $i < count($CURRENT_SECTION); $i++) { ?>
        <div class="album-box">
            <a href="#" class="img-box img-<?php echo hc_get($Y_NOW, "image_animation"); ?>">
                <img src="<?php echo hc_get_img($CURRENT_SECTION[$i]["album_image"], 'ultra-large'); ?>" alt="" />
            </a>
            <div class="caption">
                <h3>
                    <?php echo hc_get($CURRENT_SECTION[$i], "album_name"); ?>
                </h3>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="cnt-album-box">
        <p class="album-title">
            <span>...</span>
            <a>
                <?php esc_html_e("Album list","hc"); ?>
            </a>
        </p>
        <?php
    $CURRENT_SECTION = hc_get($Y_NOW, "content", array());
    for ($i = 0; $i < count($Y_NOW["menu_items"]); $i++) {
        if ($Y_NOW["menu_items"][$i] != "") {
            echo '<div class="album-item">';
            if (isset($CURRENT_SECTION[$i])) {
                array_push($EXTRA,"hc_album");
                hc_get_content_recursive($CURRENT_SECTION[$i],$EXTRA);
            }
            echo '<div class="clear"></div></div>';
        }
    }
        ?>
    </div>
</div>
<?php
}
function hc_include_hc_fixed_area(&$Y_NOW,$EXTRA) {   ?>
<div id="<?php echo esc_attr($Y_NOW["id"]) ?>" class="hc-component hc-cmp-fixed-area fixed-area <?php echo hc_get_component_classes($Y_NOW,$EXTRA); ?>" <?php hc_combine_echo(hc_get($Y_NOW, "top"), "data-offset='", "'"); ?> style="<?php  echo hc_get($Y_NOW,"custom_css_styles"); ?>" <?php echo hc_get_animation($Y_NOW) ?>>
    <?php
    $CURRENT_SECTION = $Y_NOW["content"];
    for ($i = 0; $i < count($CURRENT_SECTION); $i++) {
        hc_get_content_recursive($CURRENT_SECTION[$i],$EXTRA);
    }
    ?>
</div>
<?php }
?>