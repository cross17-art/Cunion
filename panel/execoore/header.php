<?php
// =============================================================================
// HEADER.PHP
// -----------------------------------------------------------------------------
// Header of the theme.
// =============================================================================
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    if (defined("HC_PLUGIN_PATH")) {
        global $HC_THEME_SETTINGS;
        global $HC_PAGE_ARR;
        include_once(HC_PLUGIN_PATH . "/inc/front-functions.php");
        include_once(HC_PLUGIN_PATH ."/global-content.php");
        
        if (!function_exists('has_site_icon') || !has_site_icon()) {   ?>
        <link rel="shortcut icon" href="<?php echo esc_url(hc_get_setting("favicon")) ?>" />
        <?php }
        wp_head();
        ?>
    </head>
    <body <?php body_class() ?>>
        <?php
        hc_header_engine();
    } else { 
        //The code block below is only a default code block. It is applied only at first time theme activation and disabled when the theme's plugin is activated. 
        //The logo can be changed from the theme options panel once the plugin has been activated.
        wp_head();
        ?>
        </head>
        <body <?php body_class() ?>>
            <nav class="menu-classic" data-menu-anima="fade-in">
                <div class="container">
                    <div class="menu-brand">
                        <a href="<?php echo esc_url(home_url()) ?>">
                           <img src="<?php echo get_template_directory_uri() . "/inc/logo.svg" ?>" alt="<?php echo esc_attr(get_bloginfo("name")) ?>" />
                        </a>
                    </div>
                    <i class="menu-btn"></i>
                    <div class="menu-cnt">
                        <ul>
                            <?php execoore_set_default_menu() ?>
                        </ul>
                        <div class="menu-right"></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </nav> 
<?php }
?>