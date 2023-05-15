<?php
// =============================================================================
// NAV.PHP
// -----------------------------------------------------------------------------
// All navigation menus.
// This file generate the following menu types:

// 01. MENU CLASSIC - framework-y.com/components/menu/menu-classic.html
// 02. MENU CLASSIC TRANSPARENT - framework-y.com/components/menu/menu-classic-transparent.html
// 03. MENU BIG LOGO - framework-y.com/components/menu/menu-big-logo.html
// 04. MENU MIDDLE LOGO - framework-y.com/components/menu/menu-middle-logo.html
// 05. MENU MIDDLE LOGO TOP - framework-y.com/components/menu/menu-middle-logo-top.html
// 06. MENU MIDDLE BOX - framework-y.com/components/menu/menu-big-box.html
// 07. MENU MIDDLE BOX - framework-y.com/components/menu/menu-icons.html
// 08. MENU MIDDLE BOX - framework-y.com/components/menu/menu-icons-top.html

// Documentation: framework-y.com/components/menu/menu-documentation.html
// =============================================================================

$home_url = home_url();
$menu_count =  count($menu_arr);
$tab_animation = hc_get_setting('menu-animation');
if (strlen($tab_animation) > 0) $tab_animation = " data-tab-anima='" . $tab_animation . "'";

$hc_is_transparent = hc_is_setted('menu-transparent');
$hc_logo_margin_top = hc_get_setting('logo-margin-top');
$hc_menu_animation = hc_get_setting('menu-animation');
if ($hc_logo_margin_top != "") $hc_logo_margin_top = "margin-top: " . $hc_logo_margin_top . "px";
if ($hc_menu_animation != "") $hc_menu_animation = 'data-menu-anima="' . $hc_menu_animation . '"';

$logo = hc_get_setting("logo");
$logo_2 = hc_get_setting("logo-2");
$logo_3 =  hc_get_setting("logo-3");
$logo_retina = hc_get_setting("logo-retina");
$logo_retina_2 = hc_get_setting("logo-2-retina");
if ($logo == "") $logo = HC_THEME_URL . "/inc/logo.svg";
if ($logo_retina == "") $logo_retina = $logo;
if ($logo_retina_2 == "")  $logo_retina_2 = $logo_2;
$alt_logo = hc_get_setting("logo-alt");
$menu_id = "main-menu";
$menu_html = '<ul id="' . $menu_id . '">';

for ($i = 0; $i < $menu_count; $i++) {
    $menu_item = $menu_arr[$i];
    $menu_css = hc_get_menu_css($menu_item[4]);
    if ($menu_css[0] != "menu-obj") {
        if (count($menu_item[2]) == 0 || $hc_menu_type == "subline") {
            $menu_html .= '<li' . $menu_css[1] . '><a ' . (($menu_item[5] == "_blank") ? 'target="_blank" ':'') . 'href="' . esc_url($menu_item[1]) . '">'. hc_get_icon_menu($hc_menu_type,$menu_item) . $menu_item[0] . (($hc_menu_type == "subtitle") ? "<span>" . $menu_item[3] ."</span>" : "") . '</a></li>';
        } else {
            $is_mega = (($menu_item[2][0][4] == "_mega_menu") ? true : false);
            $is_tab = (($is_mega && $menu_item[2][0][2][0][4] == "_mega_menu_tab") ? true : false);
            $menu_html .= '<li class="' . $menu_css[2] . ' ' . (($menu_item[0] == "Mega menu" || $menu_item[0] == "Mega menu single" || $menu_item[0] == "Mega menu tab") ? ' mega-dropdown ':' dropdown ') . (($is_tab) ? "mega-tabs " : "") . '"><a href="' . esc_url($menu_item[1]) . '">'. hc_get_icon_menu($hc_menu_type,$menu_item) . esc_attr($menu_item[0]) . (($hc_menu_type == "subtitle") ? "<span>" . $menu_item[3] ."</span>" : "") . '</a>' . (($is_mega) ? '' : '<ul class="dropdown-menu">');
            for ($j = 0; $j < count($menu_item[2]); $j++) {
                $sub_menu_item = $menu_item[2][$j];
                $menu_css = hc_get_menu_css($sub_menu_item[4]);
                if ($menu_css[1] == "_divider") {
                    $menu_html .= '<li role="separator" class="divider"></li>';
                } else {
                    if (count($sub_menu_item[2]) == 0) {
                        $menu_html .= '<li' . $menu_css[1] . '><a ' . (($sub_menu_item[5] == "_blank") ? 'target="_blank" ':'') . 'href="' . esc_url($sub_menu_item[1]) . '">' . $sub_menu_item[0] . '</a></li>';
                    } else {
                        if ($is_mega) {
                            if ($sub_menu_item[1] != "") $menu_html .= '<div class="mega-menu" style="background-image:url(' . esc_url($sub_menu_item[1]) . ')">';
                            else $menu_html .= '<div class="mega-menu">';
                            if ($is_tab) {
                                $menu_html .= '<div class="tab-box"'. $tab_animation .'><ul class="tab-nav">';
                                for ($y = 0; $y < count($sub_menu_item[2]); $y++) $menu_html .= '<li class="'. (($y==0) ? 'active ':'') . $menu_css[2] . '"><a href="#">'. $sub_menu_item[2][$y][0] .'</a></li>';
                                $menu_html .= '</ul>';
                            }
                            for ($y = 0; $y < count($sub_menu_item[2]); $y++) {
                                $sub_sub_menu_item = $sub_menu_item[2][$y];
                                $menu_css = hc_get_menu_css($sub_sub_menu_item[4]);
                                if (!$is_tab) {
                                    $menu_html .= hc_set_menu_col($sub_sub_menu_item,$menu_css[1]);
                                } else {
                                    $menu_html .= '<div class="panel'. (($y==0) ? ' active':'') .'">';
                                    for ($x = 0; $x < count($sub_sub_menu_item[2]); $x++) {
                                        $menu_html .= hc_set_menu_col($sub_sub_menu_item[2][$x],$menu_css[1]);
                                    }
                                    $menu_html .= '</div>';
                                }
                            }
                            $menu_html .= '</div>';
                            if ($is_tab) $menu_html .= '</div>';
                        } else {
                            $menu_html .= '<li class="dropdown-submenu' . $menu_css[2] . '"><a href="' . esc_url($sub_menu_item[1]) . '">' . $sub_menu_item[0] . '</a><ul>';
                            for ($y = 0; $y < count($sub_menu_item[2]); $y++) {
                                $menu_css = hc_get_menu_css($sub_menu_item[2][$y][4]);
                                $menu_html .= '<li' . $menu_css[1] . '><a ' . (($sub_menu_item[2][$y][5] == "_blank") ? 'target="_blank" ':'') . 'href="' . esc_url($sub_menu_item[2][$y][1]) . '">' . $sub_menu_item[2][$y][0] . '</a></li>';
                            }
                        }
                        if (!$is_mega) $menu_html.= '</ul>';
                    }
                }
            }
            if (!$is_mega) $menu_html.= '</ul>';
        }
    }
}
function hc_set_menu_col($sub_sub_menu_item,$classes="") {
    $css = "";
    $style = "";
    if (isset($sub_sub_menu_item[2][0])) {
        $icon = $sub_sub_menu_item[2][0][4];
        if ($icon == "_mega_menu_title") {
            $icon = $sub_sub_menu_item[2][1][4];
        }
        if ($icon == "") {
            $css = " no-icons";
            $style = '  style="margin-left:0"';
        }
    }
    $menu_html = '<div class="col"><ul class="icon-list' . $css . '"' . $style .'>';
    for ($x = 0; $x < count($sub_sub_menu_item[2]); $x++) {
        $sub_sub_sub_menu_item = $sub_sub_menu_item[2][$x];
        if ($sub_sub_sub_menu_item[4] == "_mega_menu_title") {
            if ($x == 0) {
                $menu_html = '<div class="col"><h5>' . $sub_sub_sub_menu_item[0] . '</h5><ul class="icon-list' . $css . '"' . $style .'>';
            } else {
                $menu_html .= '</ul><h5>' . $sub_sub_sub_menu_item[0] . '</h5><ul class="icon-list">';
            }

        } else {
            if ($sub_sub_sub_menu_item[4] == "_divider") {
                $menu_html .= '<li role="separator" class="divider"></li>';
            } else {
                $menu_html .= '<li' . str_replace("_mega_menu_tab","", $classes) . '>'. ((strlen($sub_sub_sub_menu_item[4]) == 0) ? "": "<i class='fa-li " . $sub_sub_sub_menu_item[4] . "'></i>") .'<a ' . (($sub_sub_sub_menu_item[5] == "_blank") ? 'target="_blank" ':'') . 'href="' . esc_url($sub_sub_sub_menu_item[1]) . '">' . $sub_sub_sub_menu_item[0] . '</a></li>';
            }
        }
    }
    $menu_html .= '</ul></div>';
    return $menu_html;
}
function hc_get_icon_menu($hc_menu_type,$menu_item) {
    $bg = ((strpos($menu_item[4],'fa-') !== false || strpos($menu_item[4],'im-') !== false) ? false:true);
    return (($hc_menu_type == "icon" || $hc_menu_type == "icon-top") ? "<i class='" . (!$bg ? $menu_item[4] : "onlycover") . "'" . (!$bg ? "":" style='background-image:url(" . esc_url(str_replace("-I-","/",str_replace("-D-",".",str_replace("-T-",":",$menu_item[4]))))  . ")'") . "></i>" : "");
}
function hc_menu_top_area($home_url) {
    $top_menu_arr = hc_get_menu_array("extra-menu");
    $top_menu_html = "";
    for ($i = 0; $i < count($top_menu_arr); $i++) {
        $menu_item = $top_menu_arr[$i];
        $top_menu_html .= '<li><a href="' . esc_url($menu_item[1]) . '">'. (($menu_item[4] != "") ? "<i class='" . $menu_item[4] . "'></i>" : "") . esc_attr($menu_item[0]) .'</a></li>';
    }
    if ($top_menu_html != "") $top_menu_html = "<ul>" . $top_menu_html . "</ul>";
?>
<div class="menu-mini <?php if (hc_is_setted('menu-top-scroll-hide')) echo "scroll-hide" ?>">
    <div class="container">
        <?php  echo $top_menu_html ?>
        <div class="menu-right">
            <?php
    if (hc_is_setted('menu-top-search')) {  ?>
            <form role="search" method="get" id="searchform" class="search-bar" action="<?php echo $home_url ?>">
                <input type="text" name="s" id="s" class="form-control" placeholder="<?php esc_attr_e("Search ...","hc"); ?>" />
                <input type="submit" value="<?php esc_attr_e("Go","hc"); ?>" />
            </form>
            <?php } ?>
            <?php if (hc_is_setted('menu-top-social')) { ?>
            <div class="hc-icon-links icon-social social-colors-hover">
                <?php hc_get_social_links() ?>
            </div>
            <?php } ?>
            <?php if (hc_is_setted('menu-custom-top-area')) { ?>
            <div class="menu-custom-area">
                <?php echo html_entity_decode(hc_get_setting('menu-custom-top-area')); ?>
            </div>
            <?php }
                  if (hc_is_setted('menu-top-language')) echo hc_get_wpml_menu();
            ?>
        </div>
    </div>
</div>
<?php
}
$menu_html .= '</ul>';
$menu_fixed = hc_is_setted('menu-fixed');
$menu_side = (($hc_menu_type == "side" || $hc_menu_type == "side-collapse") ? true:false);
$header_css =  "menu-". $hc_menu_type . " " . hc_get_setting("menu-css");
if ($menu_fixed && $hc_menu_type != "side") $header_css .= " menu-fixed ";
if ($hc_is_transparent) $header_css .= "menu-transparent light ";
if (hc_is_setted("menu-wide-area")) $header_css .= "menu-wide ";
if (hc_get_setting("menu-position") == "right") $header_css .= "align-right ";
if ($hc_menu_type == "icon-top") $header_css .= " menu-icon";
if ($hc_menu_type == "side-collapse") $header_css .= " menu-side";
if (hc_is_setted('menu-one-page')) $header_css .= " menu-one-page";
?>
<nav id="nav" class="scroll-change <?php echo $header_css ?>" <?php echo $hc_menu_animation; if (hc_is_setted('menu-one-page')) echo ' data-scroll-detect="true"'; ?>>
    <?php if (hc_is_setted('menu-top-area') && !$menu_side) hc_menu_top_area($home_url) ?>
    <?php if (!$menu_side) echo '<div class="container">'; ?>
    <div class="menu-brand">
        <?php
        $css = "";
        if ($menu_fixed && $logo_2 != "") {
            $css = " scroll-hide";
            echo "<a href='" . $home_url . "'><img class='logo-default scroll-show' src='" . $logo_2 . "' alt='" . $alt_logo . "' style='" . $hc_logo_margin_top . "' />
                  <img class='logo-retina scroll-show' src='" . esc_url($logo_retina_2) . "' alt='" . $alt_logo . "' style='" . esc_attr($hc_logo_margin_top) . "' /></a>";
        }
        echo "<a href='" . $home_url . "'><img class='logo-default" . $css . "' src='" . ($hc_is_transparent && $logo_3 != "" ? $logo_3 : $logo) . "' alt='" . $alt_logo . "' style='" . $hc_logo_margin_top . "' />
                  <img class='logo-retina" . $css . "' src='" . ($hc_is_transparent && $logo_3 != "" ? $logo_3 : $logo_retina)  . "' alt='" . $alt_logo . "' style='" . esc_attr($hc_logo_margin_top) . "' /></a>";
        ?>
    </div>
    <i class="menu-btn"></i>
    <div class="menu-cnt">
        <?php echo $menu_html ?>
        <?php if (!$menu_side) { ?>
        <div class="menu-right">
            <?php
            if (hc_is_setted('menu-custom-area')) echo '<div class="menu-custom-area">' . html_entity_decode(hc_get_setting('menu-custom-area')) . '</div>';
            if (hc_is_setted('menu-search')) {  ?>
            <form role="search" method="get" id="searchform" class="search-bar" action="<?php echo $home_url ?>">
                <input type="text" name="s" id="s" class="form-control" placeholder="<?php esc_attr_e("Search ...","hc"); ?>" />
                <input type="submit" value="<?php esc_attr_e("Go","hc"); ?>" />
            </form>
            <?php } ?>
            <?php
            if (hc_is_setted('menu-shop')) hc_get_shop_menu();
            if (hc_is_setted('menu-search-button')) { ?>
            <form role="search" method="get" id="searchform" class="search-btn" onsubmit="return true" action="<?php echo esc_url(HC_SITE_URL) ?>">
                <div class="search-box-menu">
                    <input name="s" id="s" type="text" placeholder="<?php esc_attr_e("Search ...","hc"); ?>" />
                    <input type="submit" id="searchsubmit" value="<?php esc_attr_e("Go","hc"); ?>" />
                    <i></i>
                </div>
            </form>
            <?php } ?>
            <?php if (hc_is_setted('menu-social')) { ?>
            <div class="hc-icon-links icon-social social-colors-hover">
                <?php hc_get_social_links() ?>
            </div>
            <?php } ?>
            <?php
                  if (hc_is_setted('menu-language')) echo hc_get_wpml_menu();
            ?>
        </div>
        <?php } ?>
    </div>
    <?php if ($hc_menu_type == "big-box") { ?>
    <div class="menu-box scroll-hide">
        <?php echo html_entity_decode(hc_get_setting('menu-big-box')); ?>
    </div>
    <?php } ?>
    <?php if ($hc_menu_type == "subline") { ?>
    <div class="subline-bar">
        <div class="container">
            <?php
              $menu_sub_html = "";
              for ($i = 0; $i < count($menu_arr); $i++) {
                  $menu_item = $menu_arr[$i];
                  if (count($menu_item[2]) == 0) $menu_sub_html .= '<ul></ul>';
                  else {
                      $menu_sub_html .= '<ul>';
                      for ($j = 0; $j < count($menu_item[2]); $j++) {
                          $sub_menu_item = $menu_item[2][$j];
                          $menu_sub_html .= '<li><a href="' . esc_url($sub_menu_item[1]) . '">' . esc_attr($sub_menu_item[0]) . '</a></li>';
                      }
                      $menu_sub_html .= '</ul>';
                  }
              }
              echo $menu_sub_html;
            ?>
        </div>
    </div>
    <?php } ?>
    <?php if ($menu_side) { ?>
    <div class="bottom-area">
        <?php
              if (hc_is_setted('menu-language')) echo hc_get_wpml_menu("list");
              if (hc_is_setted('menu-social')) { ?>
        <div class="hc-icon-links icon-social social-colors-hover align-center">
            <?php hc_get_social_links() ?>
        </div>
        <?php }
              if (hc_is_setted('menu-custom-area')) echo '<div class="menu-custom-area">' . html_entity_decode(hc_get_setting('menu-custom-area')) . '</div>';
        ?>
    </div>
    <?php } else {
              echo '</div>';
          }
    ?>
</nav>