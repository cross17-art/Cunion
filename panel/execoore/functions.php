<?php
// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Theme functions.
// =============================================================================

define("EXECOORE_URL", get_template_directory_uri());
define("EXECOORE_PATH", get_template_directory());  
require_once(EXECOORE_PATH . "/inc/class-tgm-plugin-activation.php");
add_theme_support('post-thumbnails');
function execoore_register_required_plugins() {
	$plugins = array(
         array(
            'name'               => esc_html__('Slider Revolution',"execoore"),
            'slug'               => 'revslider',
            'source'             => EXECOORE_PATH . '/inc/revslider.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        array(
			'name'               => esc_html__('Hybrid Composer',"execoore"),
			'slug'               => 'hybrid-composer',
			'source'             => EXECOORE_PATH . '/inc/hybrid-composer.zip',
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		)
	);
	$config = array(
		'id'           => 'theme-tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => ''
	);
	tgmpa( $plugins, $config );
}
add_action('tgmpa_register', 'execoore_register_required_plugins' );
if (!isset($content_width )) $content_width = 1200;
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
function execoore_enqueue_front_end_script() {
    if (!defined("HC_PLUGIN_PATH")) {      //EXECOORE_URL DECLARED ABOVE <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  
        wp_enqueue_script("execoore-script",  EXECOORE_URL . '/inc/default.js', array("jquery"), "1.0",true);
        wp_enqueue_style("execoore-style", EXECOORE_URL . "/style.css", array(), "1.0", "all");
        wp_enqueue_style("bootstrap", EXECOORE_URL . "/css/bootstrap-grid.css", array(), "1.0", "all");
        wp_enqueue_style("execoore-skin", EXECOORE_URL . "/css/skin.css", array(), "1.0", "all");
        wp_enqueue_style("execoore-google-fonts", execoore_get_fonts_url("Montserrat:500,600,700,800"), array(), "1.0", "all"); 
    }
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) wp_enqueue_script('comment-reply');
}
function execoore_get_fonts_url($url_attr) {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off',"execoore") ) {
       
    }
    return  $font_url = add_query_arg( 'family', $url_attr, "//fonts.googleapis.com/css" );;
}
add_action('wp_enqueue_scripts', 'execoore_enqueue_front_end_script');
add_action('save_post', function () {
    if (isset($_POST['sidebars-menu'])) {
        $sidebar = $_POST['sidebars-menu'];
        update_post_meta($_POST['post_ID'], 'wptf-sidebar', $sidebar);
    }
}, 10, 2);
function execoore_sidebar() {
    add_meta_box('wptf_sidebar', esc_html__('Sidebars','execoore'), function () {
        $sidebar = get_post_meta(get_the_ID(), 'wptf-sidebar');
        if (is_countable($sidebar) && count($sidebar) > 0) $sidebar = $sidebar[0];
        else $sidebar = "";
?>
<select data-hc-setting="sidebars" id="sidebars-menu" name="sidebars-menu">
    <option value="" <?php if ($sidebar == "") echo "selected" ?>><?php esc_html_e("None","execoore") ?></option>
    <option value="right" <?php if ($sidebar == "right") echo "selected" ?>><?php esc_html_e("Right","execoore") ?></option>
    <option value="left" <?php if ($sidebar == "left") echo "selected" ?>><?php esc_html_e("Left","execoore") ?></option>
    <option value="right-left" <?php if ($sidebar == "right-left") echo "selected" ?>><?php esc_html_e("Right and left","execoore") ?></option>
</select>
<?php
    }, array(array('Posts','post'), array('Pages','page'),array('Post Types','y-post-types'),array('Post Types Archivies','y-post-types-arc')), 'side', 'low' );
}
add_action('add_meta_boxes', 'execoore_sidebar');

function execoore_theme_add_editor_styles() {
    add_editor_style(EXECOORE_URL . "/css/tiny-mce.css");
}
add_action('admin_init', 'execoore_theme_add_editor_styles');

//MENU
function execoore_init_menus() {
    register_nav_menus(
          array(
            'header-menu' => esc_html__('Header Menu','execoore')
          )
    );
    load_theme_textdomain("execoore", EXECOORE_URL . '/languages' );
}
add_action('after_setup_theme', 'execoore_init_menus');

//WIDGETS
function execoore_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__('Right Sidebar',"execoore"),
        'id'            => 'right_side_bar',
        'description'   => esc_html__('Global sidebar for pages, enable it on single page.',"execoore"),
        'before_widget' => '<div id="%1$s" class="menu-inner menu-inner-vertical %2$s">',
        'after_widget'  => '</div><hr class="space-sm">',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    register_sidebar(array(
        'name'          => esc_html__('Left Sidebar',"execoore"),
        'id'            => 'left_side_bar',
        'description'   => esc_html__('Global sidebar for pages, enable it on single page.',"execoore"),
        'before_widget' => '<div id="%1$s" class="menu-inner menu-inner-vertical %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    if (class_exists('woocommerce')) {
        register_sidebar(array(
           'name'          => esc_html__('WooCommerce Shop Sidebar Left',"execoore"),
           'id'            => 'woocommerce_shop_left_side_bar',
           'description'   => esc_html__('Shop sidebar, enable it on Theme options > List Post Types',"execoore"),
           'before_widget' => '<div id="%1$s" class="menu-inner menu-inner-vertical %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3>',
           'after_title'   => '</h3>',
       ));
        register_sidebar(array(
          'name'          => esc_html__('WooCommerce Shop Sidebar Right',"execoore"),
          'id'            => 'woocommerce_shop_right_side_bar',
          'description'   => esc_html__('Shop sidebar, enable it on Theme options > List Post Types',"execoore"),
          'before_widget' => '<div id="%1$s" class="menu-inner menu-inner-vertical %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3>',
          'after_title'   => '</h3>',
      ));
        register_sidebar(array(
          'name'          => esc_html__('WooCommerce Item Sidebar Left',"execoore"),
          'id'            => 'woocommerce_single_left_side_bar',
          'description'   => esc_html__('Single product sidebar, enable it on Theme options > List Post Types',"execoore"),
          'before_widget' => '<div id="%1$s" class="menu-inner menu-inner-vertical %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3>',
          'after_title'   => '</h3>',
      ));
        register_sidebar(array(
          'name'          => esc_html__('WooCommerce Item Sidebar Right',"execoore"),
          'id'            => 'woocommerce_single_right_side_bar',
          'description'   => esc_html__('Single product sidebar, enable it on Theme options > List Post Types',"execoore"),
          'before_widget' => '<div id="%1$s" class="menu-inner menu-inner-vertical %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3>',
          'after_title'   => '</h3>',
       ));
    }
}
add_action( 'widgets_init', 'execoore_widgets_init' );

function execoore_pingback_header() {
	if (is_singular() && pings_open()) {
		echo '<link rel="pingback" href="', esc_url(get_bloginfo("pingback_url")), '">';
	}
}
add_action("wp_head", "execoore_pingback_header");


//MAIN CONTENT
function execoore_get_post_info() {
    $archive_year  = get_the_time('Y'); 
    $archive_month = get_the_time('m'); 
    $archive_day   = get_the_time('d');
    $txt = "";
    $txt .= '<ul class="icon-list icon-list-horizontal list-post-info">';
    $txt .= '<li><i class="icon-calendar"></i> <a href="' . get_day_link( $archive_year, $archive_month, $archive_day) . '">' . get_the_date() . '</a></li>';
    $txt .= '<li><i class="icon-bookmark"></i> ';
    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    $index = 0;
    if ( ! empty( $categories ) ) {
        foreach( $categories as $category ) {
            if ($index < 1) {
                $index++;
                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __("View all posts in %s","execoore"), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                
            }
        }
        $txt .= trim( $output, $separator );
    }
    $txt .= '</li><li><i class="icon-user"></i><a href="' . get_author_posts_url(get_the_author_meta("ID")) . '">' . get_the_author() . '</a></li>';
    return $txt . '</ul>';
}

function execoore_the_content() {
    function show_the_content() {
        global $HC_CLASSIC_CONTENT;
        while (have_posts()) {
            the_post();
            if (defined("HC_PLUGIN_PATH"))  {
                if (hc_get_setting("featured-image")) { 
                    the_post_thumbnail("large");
                } 
            } else { ?>
<div class="featured-image">
    <?php the_post_thumbnail("large"); ?>
</div>
             <?php }
            the_content();
            if ($HC_CLASSIC_CONTENT || !isset($HC_CLASSIC_CONTENT)) {
                if (get_post_type() == "post") {
                    echo wp_kses_post(execoore_get_post_info());
                }   
            }  
            wp_link_pages(array('before' => '<div class="pagination post-pagination">','after' => '</div>','link_before' => '<span>','link_after' => '</span>','pagelink' => '%'));
            if (comments_open() || !defined("HC_PLUGIN_PATH")) { ?>
<section class="section-base section-comments">
    <div class="container">
        <div class="comments-cnt">
             <?php comments_template() ?>
        </div>
    </div>
</section>
<?php }
        }
    }
    $default_content = false;
    if (!defined("HC_PLUGIN_PATH")) {
        $default_content = true;
    } else {
        global $HC_CLASSIC_CONTENT;
        if ($HC_CLASSIC_CONTENT == true) $default_content = true;
    }
    if ($default_content) {
?>
<header class="header-base">
    <div class="container">
        <h1>
            <?php the_title() ?>
        </h1>
    </div>
</header>
<main>
<?php
    } else {
        hc_get_title();
    }
    $post_type_id = 0;
    $post_type = get_post_type();
    if ($post_type != "post" && $post_type != "page") {
        $current_post_type = get_post_type_object(get_post_type());
        $lists_ids = array();
        $args = array( 'post_type' => 'y-post-types', 'posts_per_page' => 999 );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                if (strcasecmp($current_post_type->label,$the_query->post->post_name) == 0) {
                    $post_type_id = $the_query->post->ID;
                }
            }
        }
    } else {
        $post_type_id = get_the_ID();
    }
    $sidebar = get_post_meta($post_type_id, 'wptf-sidebar');
    $sw = array("left"=>"col-lg-3","right"=>"col-lg-3","content"=>"col-lg-9");
    
    if (is_countable($sidebar) && count($sidebar) > 0) {
        $sidebar = $sidebar[0];
        $woocommerce_prefix = "";
        if (defined("HC_PLUGIN_PATH") && hc_get_setting("shop-page") == $post_type_id) $woocommerce_prefix = "woocommerce_shop_";
        if (defined("HC_PLUGIN_PATH")) $sw = hc_get_sidebars_width($sidebar);
    }
    else $sidebar = "";
    if ($default_content) {
        echo '<section class="section-base"><div class="container">';
    }
    if ($sidebar == "left") { ?>
    <section class="section-base">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr($sw["left"]) ?> widget">
                    <?php if (is_active_sidebar("left_side_bar")) dynamic_sidebar($woocommerce_prefix . "left_side_bar"); ?>
                </div>
                <div class="<?php echo esc_attr($sw["content"]) ?>">
                    <?php show_the_content() ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    if ($sidebar == "right") {
    ?>
    <section class="section-base">
        <div class="container">
             <div class="row">
                <div class="<?php echo esc_attr($sw["content"]) ?>">
                    <?php show_the_content() ?>
                </div>
                <div class="<?php echo esc_attr($sw["right"]) ?> widget">
                    <?php if (is_active_sidebar("right_side_bar")) dynamic_sidebar($woocommerce_prefix . "right_side_bar"); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    if ($sidebar == "right-left") {
    ?>
    <section class="section-base">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr($sw["left"]) ?> widget">
                    <?php if (is_active_sidebar("left_side_bar")) dynamic_sidebar($woocommerce_prefix . "left_side_bar"); ?>
                </div>
                <div class="<?php echo esc_attr($sw["content"]) ?>">
                    <?php show_the_content() ?>
                </div>
                <div class="<?php echo esc_attr($sw["right"]) ?> widget">
                    <?php if (is_active_sidebar("right_side_bar")) dynamic_sidebar($woocommerce_prefix . "right_side_bar"); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    if ($sidebar == "") {
        show_the_content();
    } 
    if ($default_content) { echo '</div></section>'; }
    ?>
</main>
    <?php   
}
function execoore_search() {
    if (defined("HC_PLUGIN_PATH")) { hc_default_title(); }
    else {
    ?>
<header class="header-base">
    <div class="container">
        <h1><?php echo esc_html__("Search results for ","execoore") . esc_html(get_search_query()) ?></h1>
        <h2><?php esc_html_e("Search results for ","execoore"); echo '<b><i>' . esc_html(get_search_query()) . '</i></b>'; ?></h2>
    </div>
</header>
    <?php } ?>
<main>
    <section class="section-base">
        <div class="container">
            <form role="search" name="s" method="get" id="searchform" class="form-box" action="<?php echo esc_url(home_url()) ?>">
                <div class="input-text-btn">
                   <input class="input-text" name="s" id="sw" type="text" placeholder="<?php esc_attr_e("Search ...","execoore") ?>"><input type="submit" value="<?php esc_html_e("Search","execoore"); ?>" class="btn" /> 
                </div>
            </form>
                <?php
    global $query_string;
    global $wp_query;
    $query_args = explode("&", $query_string);
    $search_query = array();
    if( strlen($query_string) > 0 ) {
        foreach($query_args as $key => $string) {
            $query_split = explode("=", $string);
            $search_query[$query_split[0]] = urldecode($query_split[1]);
        }
    }
    echo '<div class="grid-list" data-columns="1"><div class="grid-box">';
    if ($wp_query->found_posts > 0) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $link = get_the_permalink();
            echo '<div class="grid-item"><div class="cnt-box"><div class="caption">
                      <h2>' . esc_html(get_the_title()) . '</h2><p>' . (defined("HC_PLUGIN_PATH") ? wp_kses_post(hc_get_the_excerpt(get_the_excerpt())) : wp_kses_post(get_the_excerpt())) . '</p>
                      <a class="btn-text" href="' . esc_url($link) . '">' . esc_html__("Read more", "execoore"). '</a></div></div></div>';
        }
        echo '</div></div>';
    } else { 
        echo "<h2 class='no-search-results'>" . esc_html__("No results found ...","execoore") . "</h2>";
    }
                ?>
            </div>
    </section>
</main>
 <?php
}
function execoore_set_default_menu() {
    if (($locations = get_nav_menu_locations()) && isset($locations["header-menu"])) {
        $menu = wp_get_nav_menu_object($locations["header-menu"]);
        if (isset($menu->term_id)) {
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            $menu_count = count($menu_items);
            for ($i = 0; $i < $menu_count; $i++) {
                $menu_item = $menu_items[$i];
                if ($menu_item->ID != "-1") {
                    if ($i < $menu_count - 1 && $menu_items[$i + 1]->menu_item_parent == $menu_item->ID) { ?>
                        <li class="dropdown">
                            <a href="#"><?php echo esc_attr($menu_item->title) ?></a>
                            <ul>
                                <?php
                                for ($j = $i; $j < $menu_count; $j++) {
                                    $menu_sub_item_a = $menu_items[$j];
                                    if ($menu_items[$j]->menu_item_parent == $menu_item->ID) {
                                        if ($j < $menu_count - 1 && $menu_items[$j + 1]->menu_item_parent == $menu_sub_item_a->ID) {
                                            ?>
                                            <li class="dropdown-submenu">
                                                <a href="#"><?php echo esc_attr($menu_sub_item_a->title) ?> </a>
                                                <ul>
                                                    <?php
                                                    for ($y = $j; $y < $menu_count; $y++) {
                                                        $menu_sub_item_b = $menu_items[$y];
                                                        if ($menu_items[$y]->menu_item_parent == $menu_sub_item_a->ID) {
                                                            $menu_items[$y]->ID = "-1";
                                                            ?>
                                                            <li><a href="<?php echo esc_url($menu_sub_item_b->url) ?>"><?php echo esc_html($menu_sub_item_b->title) ?></a></li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li><a href="<?php echo esc_url($menu_sub_item_a->url) ?>"><?php echo esc_attr($menu_sub_item_a->title) ?></a></li>
                                            <?php
                                        }
                                        $menu_items[$j]->ID = "-1";
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    <?php
                    } else {
                        ?>
                        <li><a href="<?php echo esc_url($menu_item->url) ?>"><?php echo esc_html($menu_item->title) ?></a></li>
                        <?php
                    }
                }
            }
        }
    }
}
function execoore_default_blog() {
    global $wp_query;
    $html = "";

    if (have_posts()) {
        $html = '<div class="grid-list" data-columns="1"><div class="grid-box">';
        while (have_posts()) {
            the_post(); 
            $date = get_the_date("U");
            $img = get_the_post_thumbnail_url();
            $link = esc_url(get_the_permalink());
            $html .= '<div class="grid-item">
                                    <div class="cnt-box cnt-box-blog-side boxed' . (is_sticky() ? " sticky-post" : "") . ($img == "" ? ' no-img' : '') . '" data-href="' . esc_url($link) . '">
                                        <a href="' . esc_url($link) . '" class="img-box" ' . ($img == "" ? '' : 'style="background-image:url(' . get_the_post_thumbnail_url() . ')"') . '>
                                            <div class="blog-date">
                                                <span>' . date('d', $date) . '</span>
                                                <span>' . date_i18n('M', $date) . ' ' . date('Y', $date) . '</span>
                                            </div>  
                                        </a>
                                        <div class="caption">
                                            <h2><a href="' . esc_url($link) . '">' . wp_kses_post(get_the_title()) . '</a></h2>' . execoore_get_post_info() . '<p>' . get_the_excerpt() . '</p>
                                             <a class="btn-text" href="' . esc_url($link) . '">' . esc_html__("Read more", "execoore") . '</a>
                                        </div>
                                    </div>
                                </div>';
        }
        wp_reset_postdata();
        get_the_tag_list();
        if ($wp_query->max_num_pages > 1) { 
            $html .= '</div><div class="list-pagination"><ul class="pagination">' . (get_previous_posts_link() ? '<li class="prev"><a href="' . esc_url(get_previous_posts_page_link()) . '">' . esc_html("Previous","execoore") . '</a></li>' : "") . (get_next_posts_link() ? '<li class="next"><a href="' . esc_url(get_next_posts_page_link()) . '">' . esc_html("Next","execoore") . '</a></li>' : "") . '</ul></div></div>';
        } else {
            $html .=  '</div></div>';
        }
    }   
    $ls = is_active_sidebar("left_side_bar");
    $rs = is_active_sidebar("right_side_bar");
    if ($ls && !$rs) { ?>
       <div class="row"><div class="col-lg-3 widget"><?php dynamic_sidebar("left_side_bar"); ?></div><div class="col-lg-9"><?php echo wp_kses_post($html) ?></div></div>
   <?php }
    if ($rs && !$ls) { ?>
       <div class="row"><div class="col-lg-9"><?php echo wp_kses_post($html) ?></div><div class="col-lg-3 widget"><?php dynamic_sidebar("right_side_bar"); ?></div></div>
   <?php }
    if ($rs && $ls) { ?>
       <div class="row"><div class="col-lg-3 widget"><?php dynamic_sidebar("left_side_bar"); ?></div><div class="col-lg-6"><?php echo wp_kses_post($html) ?></div><div class="col-lg-3 widget"><?php dynamic_sidebar("right_side_bar"); ?></div></div>
   <?php }
    if (!$rs && !$ls) {
       echo wp_kses_post($html);
    }
}
?>