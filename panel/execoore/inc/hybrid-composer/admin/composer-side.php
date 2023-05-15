<?php
/*
 * =============================================================================
 * COMPOSER-SIDE.PHP
 * -----------------------------------------------------------------------------
 * Hybrid Composer side contents.
 * =============================================================================
 *
 * HYBRID COMPOSER META BOX
 * -----------------------------------------------------------------------------
 * Hybrid Composer meta box for admin pages
 * =============================================================================
 */
function hc_block_composer_side() {
    $post_id = "";
    if (isset($_GET['post'])) $post_id =  $_GET['post'];
?>
<!--gutenberg start-->
<div class="hc-co-box"> 
    <div class="hc-co-item hc-co-item-mode">
        <label>Mode</label>
        <div id="mode_button_hc" title="Editor mode" class="input-row small-input input-select button">
            <select class="select-mode-button-hc">
                <option value="composer" selected><?php esc_attr_e("Composer","hc") ?></option>
                <option value="classic"><?php esc_attr_e("Classic","hc") ?></option>
            </select>
        </div>
    </div>
    <div class="hc-co-item">
        <label>Locked mode</label>
        <a id="lock_button_hc" title="Locked mode" class="button lock-button-hc btn-icon-only" onclick=""><i class="hc-icon-unlock"></i></a>
    </div>
    <div class="hc-co-item">
        <label>Json array</label>
        <a id="update_button_hc" title="Composer content" class="button btn-icon-only" onclick="showPageContentArr()"><i class="hc-icon-code-fork"></i></a>
    </div>
  
    <div class="hc-co-item">
        <label>Templates</label>
        <a id="composer_templates_button_hc" title="Composer templates" class="button  btn-icon" onclick="showComposerTemplatesBox()"><i class="hc-icon-folder-open"></i><?php esc_attr_e("Templates","hc") ?></a>
    </div>
    <div class="hc-co-item">
        <label>Clear cache</label>
        <a id="composer_clear_cache" title="Clear page cache and reload" class="button btn-icon-only" onclick="window.location = window.location.href + '&hc=cache' "><i class="hc-icon-android-sync"></i></a>
    </div>
    <div class="hc-co-item">
        <label>Page css</label>
        <a id="css_button_hc" title="Page CSS" class="button btn-icon" onclick="showPageCSSbox()"><i class="hc-icon-css3"></i>CSS</a>
    </div>
    <div class="hc-co-item">
        <label>Page options</label>
        <a class="button" href="#" id="hc-page-settings" onclick="showPageSettingsBox()"><i class="hc-icon-gear"></i></a>
    </div>
</div>
<div id="hc-notice-box">

</div>
<!--gutenberg end-->
<div class="clear"></div>
<div id="css-code-box" class="box-lightbox l">
    <div class="popover-title" style="border: none;">
        <h4>CSS</h4>
        <a class="button button-primary float-right" style="margin-left: 15px" onclick="$('.mfp-close').click();">X</a>
        <a class="button button-2 button-primary float-right" onclick="$('#css-page').val($('#css-code-box textarea').val()); $('.mfp-close').click();"><?php esc_attr_e("Save changes","hc") ?></a>
    </div>
    <div class="input-row full-input only-input">
        <textarea spellcheck="false" placeholder=""></textarea>
    </div>
</div>
<div id="composer-templates-box" class="box-lightbox l">
    <div class="popover-title">
        <h4><?php _e("Composer Templates","hc") ?></h4>
        <a class="button button-primary float-right" style="margin-left: 15px" onclick="$('.mfp-close').click();">X</a>
    </div>
    <div class="tab-box">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#"><?php esc_attr_e("My Templates","hc") ?></a></li>
            <li><a href="#"><?php esc_attr_e("Built-in Templates","hc") ?></a></li>
        </ul>
        <div class="panel active">
            <div class="scroll-content" data-height="350">
                <div class="save-template-box">
                    <div class="result-box">
                    </div>
                    <p><b><?php esc_attr_e("Save current page as a template","hc") ?></b></p>
                    <div class="flex-box">
                        <input id="current-page-template-name" class="full-input" placeholder="<?php esc_attr_e("Template name","hc") ?>" type="text" value="" />
                        <a class="button button-primary float-right" onclick="saveHCTemplate($('#current-page-template-name').val())"><?php esc_attr_e("Save template","hc") ?></a>
                    </div>
                    <hr class="space xs" />
                    <p><b><?php esc_attr_e("My Templates","hc") ?></b></p>
                    <ul id="hc_templates_list" class="list buttons-list"></ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="scroll-content" data-height="400">
                <ul id="hc_default_templates_list" class="list buttons-list">
                    <?php
    $html = "";
    if (file_exists(HC_PLUGIN_PATH . '/custom/templates.php')) {
        include(HC_PLUGIN_PATH . "/custom/templates.php");
        if (isset($HC_TEMPLATES)) {
            foreach($HC_TEMPLATES as $key => $value) {
                $name = ucfirst(str_replace("_", " ",$key));
                $html .= '<li class="li-component"><div class="component-box" data-hc-target="' . $key . '"><span class="sch">' . $name . '</span></div></li>';
            }
        }
    }
    if ($html != "") echo $html;
    else echo "<div style='padding-left: 3px;'>" . __("No templates available.") . "</div>";
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="page-code-box" class="box-lightbox l">
    <pre class="scroll-content prettyprint" data-height="300"></pre>
    <br />
    <br />
    <a class="button button-primary float-right" style="margin-left: 15px" onclick="$('.mfp-close').click();">X</a>
    <a class="button button-primary float-right" onclick="$('.wp-editor-area').val('')"><?php _e("Delete all content","hc") ?></a>
    <br />
    <br />
</div>
<div id="popover-box-page-settings" class="popover-box popover-box-big popover-list box-lightbox l">
    <span class="close-button" onclick="jQuery('.mfp-close').click();"></span>
    <div class="popover-title">
        <h4><?php _e("Page options","hc") ?></h4>
    </div>
    <div class="scroll-content settings-cnt" data-height="400">
        <input type="hidden" class="save_array_json" value='<?php if (isset($post_id)) echo esc_attr(str_replace('\\"','"', get_option("hc-page-settings-" . $post_id))) ?>'>
        <hr class="space s" />
        <ul class="list">
            <li class="input-row input-select">
                <p>Menu type</p>
                <select data-setting="menu-type">
                    <option value="">Default</option>
                    <option value="classic">Classic</option>
                    <option value="big-logo">Big logo</option>
                    <option value="subline">Subline</option>
                    <option value="subtitle">Subtitle</option>
                    <option value="middle-logo">Middle logo</option>
                    <option value="middle-box">Middle box</option>
                    <option value="icons">Icons</option>
                    <option value="side">Side menu</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Menu position</p>
                <select data-setting="menu-position">
                    <option value="">Default</option>
                    <option value="left">Left</option>
                    <option value="right">Right</option>
                </select>
            </li>
            <li class="input-row input-checkbox">
                <p>Hide menu</p>
                <input data-setting="menu-hide" type="checkbox">
            </li>
            <li class="input-row input-select">
                <p>Menu language</p>
                <select data-setting="menu-language">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Search box</p>
                <select data-setting="menu-search">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Search button</p>
                <select data-setting="menu-search-button">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-text">
                <p>Menu css classes</p>
                <input data-setting="menu-css" placeholder="" type="text">
            </li>
            <li class="input-row input-select">
                <p>Menu transparent</p>
                <select data-setting="menu-transparent">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Wide menu</p>
                <select data-setting="menu-wide-area">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Centered menu</p>
                <select data-setting="menu-center">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Top logo</p>
                <select data-setting="menu-top-logo">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Top menu</p>
                <select data-setting="menu-top-area">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Menu fixed top</p>
                <select data-setting="menu-fixed">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Wide footer</p>
                <select data-setting="footer-wide">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
            <li class="input-row input-checkbox">
                <p>Hide footer</p>
                <input data-setting="footer-hide" type="checkbox">
            </li>
            <li class="input-row input-text">
                <p>Footer css classes</p>
                <input data-setting="footer-css" placeholder="" type="text">
            </li>
            <li class="input-row input-select">
                <p>Layout</p>
                <select data-setting="layout-type">
                    <option value="">Default</option>
                    <option value="full-width">Full width</option>
                    <option value="boxed">Boxed</option>
                </select>
            </li>
            <li class="input-row input-text">
                <p>Site width</p>
                <input data-setting="site-width" placeholder="" type="text">
            </li>
            <li class="input-row input-text">
                <p>Full width padding X</p>
                <input data-setting="section-padding-x" placeholder="" type="text">
            </li>
            <li class="input-row input-text">
                <p>Full width padding Y</p>
                <input data-setting="section-padding-y" placeholder="" type="text">
            </li>
            <li class="input-row input-select">
                <p>Left sidebar width</p>
                <select id="sidebar-left-width">
                    <option value="">Default</option>
                    <option value="col-md-2">20% col-md-2</option>
                    <option value="col-md-3">25% col-md-3</option>
                    <option value="col-md-4">33% col-md-4</option>
                    <option value="col-md-5">41% col-md-5</option>
                    <option value="col-md-6">50% col-md-6</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>Right sidebar width</p>
                <select id="sidebar-right-width">
                    <option value="">Default</option>
                    <option value="col-md-2">20% col-md-2</option>
                    <option value="col-md-3">25% col-md-3</option>
                    <option value="col-md-4">33% col-md-4</option>
                    <option value="col-md-5">41% col-md-5</option>
                    <option value="col-md-6">50% col-md-6</option>
                </select>
            </li>
            <li class="input-row input-select">
                <p>RTL - Right To Left</p>
                <select data-setting="rtl">
                    <option value="">Default</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </li>
        </ul>
        <hr class="space s" />
        <a class="button button-primary settings-save-btn" onclick="indipendentSaveSystem(this, ''); jQuery('.mfp-close').click();"><?php _e("Save settings","hc") ?></a>
    </div>
    <div class="clear"></div>
</div>
<?php
}
 
// HYBRID COMPOSER CUSTOM POST TYPE ARCHIVE ARRAY
// -----------------------------------------------------------------------------
// Array for default contents of archive pages of custom Post Types - Lists
// =============================================================================
function hc_default_content_post_type($title,$slug) {
    return array(
         'post_type' => 'page',
         'post_title'    => wp_strip_all_tags($title),
         'post_content'  => '{
	"main-title": {
		"component": "hc_title",
		"id": "main-title",
		"subtitle": "Archive page for ' . $title . '",
		"title_content": {
			"component": "hc_title_base",
			"id": "title-base",
			"image": ""
		},
		"title": "' . $title . '"
	},
	"section_1": {
		"component": "hc_section",
		"id": "section_1",
		"section_width": "",
		"animation": "",
		"animation_time": "",
		"timeline_animation": "",
		"timeline_delay": "",
		"timeline_order": "",
		"vertical_row": "",
		"box_middle": "",
		"css_classes": "",
		"custom_css_classes": "",
		"custom_css_styles": "",
		"section_content": [
			{
				"component": "hc_column",
				"id": "column_1",
				"column_width": "col-lg-2",
				"animation": "",
				"animation_time": "",
				"timeline_animation": "",
				"timeline_delay": "",
				"timeline_order": "",
				"css_classes": "",
				"custom_css_classes": "",
				"custom_css_styles": "",
				"main_content": []
			},
			{
				"component": "hc_column",
				"id": "column_2",
				"column_width": "col-lg-8",
				"animation": "",
				"animation_time": "",
				"timeline_animation": "",
				"timeline_delay": "",
				"timeline_order": "",
				"css_classes": "",
				"custom_css_classes": "",
				"custom_css_styles": "",
				"main_content": [
					{
						"component": "hc_pt_grid_list",
						"id": "5ZtkF",
						"css_classes": "",
						"custom_css_classes": "",
						"custom_css_styles": "",
						"post_type_slug": "' . $slug . '",
						"post_type_category": "",
						"box": "blog_side",
						"column": "col-lg-12",
						"row": "",
						"margins": "",
						"pag_type": "pagination",
						"pag_items": "8",
						"pag_animation": "fade-bottom",
						"button_size": "pagination-sm",
						"boxed": true,
						"boxed_inverse": false,
						"button_text": "Read more",
						"hidden_content": false,
						"box_animation": "",
						"pag_scroll_top": true,
						"pag_centered": true,
						"pag_button_prev": "Prev",
						"pag_button_next": "Next",
						"lm_lazy": false,
						"lm_button_text": "Load more",
						"data_options_pagination": ""
					}
				]
			},
			{
				"component": "hc_column",
				"id": "column_3",
				"column_width": "col-lg-2",
				"animation": "",
				"animation_time": "",
				"timeline_animation": "",
				"timeline_delay": "",
				"timeline_order": "",
				"css_classes": "",
				"custom_css_classes": "",
				"custom_css_styles": "",
				"main_content": []
			}
		],
		"section_settings": ""
	},
	"scripts": {
		"pagination": "jquery.twbsPagination.min.js"
	},
	"css": {
		"content_box": "css/content-box.css",
		"image_box": "css/image-box.css"
	},
	"css_page": "",
	"template_setting": {},
	"template_setting_top": {},
	"page_setting": {
		"settings": []
	}
}',
         'post_status'   => 'publish',
         'post_author'   => 1,
         'post_category' => array(8,39)
       );
}
// HYBRID COMPOSER CUSTOM POST TYPE ITEM META BOX
// -----------------------------------------------------------------------------
// Meta box of Post Types - Lists admin page
// =============================================================================
function hc_block_post_types_area() {
?>
<form name='hc_lists_form' id="hc_lists_form" method='post' class="">
    <div class="row">
        <div class="col-md-1">
            <i id="post-type-icon" class="input-row button-icon button-icons-list-wp dashicons dashicons-plus" data-hc-component="value" data-value=""></i>
        </div>
        <div class="col-md-3">
            <div class="input-text input-row full-input input-blue">
                <p><?php esc_attr_e("Name","hc") ?></p>
                <input name="post-type-name" id="post-type-name" type="text" placeholder="<?php esc_attr_e("Plural name","hc") ?>" value="" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-text input-row full-input input-blue">
                <p><?php esc_attr_e("Singular Name","hc") ?></p>
                <input name="post-type-name-singular" id="post-type-name-singular" type="text" placeholder="<?php esc_attr_e("Singual name","hc") ?>" value="" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-text input-row full-input input-blue">
                <p><?php esc_attr_e("Unique ID","hc") ?></p>
                <input name="post-type-slug" id="post-type-slug" type="text" placeholder="<?php esc_attr_e("Must be unique and alphanumeric only","hc") ?>" value="" />
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="space m"></div>
    <div id="y-post-type-links" class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-3">
            <a id="link-archive-view" href="#" target="_blank" class="button button-primary button-large" style="opacity: 0.2;"><?php esc_attr_e("View archive","hc"); ?></a>
            <a id="link-items-page" href="#" class="button button-primary button-large" style="opacity: 0.2;"><?php esc_attr_e("Edit items","hc"); ?></a>
        </div>
        <div class="col-md-6 col-list-archive">
            <div id="archive-page-list" class="input-select input-row full-input input-blue" style="display: none;">
                <p><?php esc_attr_e("Archive page","hc") ?></p>
                <?php hc_get_pages_list() ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</form>
<div class="clear"></div>
<input type="hidden" id="lists-archive-arr" value='<?php echo json_encode(get_option('y_theme_lists_archives')) ?>'>
<div id="post-type-error" class="notice error">
    <p><?php esc_attr_e("Name, singular name and id are required.","hc"); ?></p>
</div>
<div id="single-item-box">
    <p class="title"><?php esc_attr_e("Single item template","hc"); ?></p>
    <p class="desc">
        <?php esc_attr_e("Create the single item template here. Add the components you want, usually without contents, and you're done. Every item of your list will use this template.","hc"); ?>
        <a target="_blank" href="http://wordpress.framework-y.com/documentation/lists/"><?php esc_attr_e("Documentation","hc"); ?></a>
    </p>
</div>
<?php
}
// HYBRID COMPOSER CUSTOM POST TYPE ITEM META BOX
// -----------------------------------------------------------------------------
// Meta box of single item admin page of custom Post Types - Lists
// =============================================================================
function hc_block_post_types_single_area() {
?>
<div data-hc-component="hc_upload_image" class="input-box input-row full-input input-top">
    <p><?php esc_attr_e("Featured image","hc") ?></p>
    <div class="upload-box upload-row full-input">
        <span class="close-button"></span>
        <div class="upload-container">
            <div id="post-type-image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn"></div>
        </div>
    </div>
</div>
<div class="input-textarea input-row full-input input-top">
    <p><?php esc_attr_e("Excerpt","hc") ?></p>
    <textarea id="post-type-excerpt" placeholder=""></textarea>
</div>
<div class="input-text input-row full-input">
    <p><?php esc_attr_e("Extra","hc") ?></p>
    <input id="post-type-extra-1" type="text" placeholder="" value="" />
</div>
<div id="post-type-error" class="notice error">
    <p><?php esc_attr_e("Featured image and excerpt are required.","hc"); ?></p>
</div>
<?php
}
// MENU META BOXES
// -----------------------------------------------------------------------------
// Meta boxes of menu, added on Apparence > Menu admin page
// =============================================================================
function hc_init_meta_box_divider() {
    global $_nav_menu_placeholder, $nav_menu_selected_id;
    $_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;
?>
<div id="meta-box-divider">
    <div class="tabs-panel tabs-panel-active">
        <ul class="categorychecklist form-no-clear">
            <li>
                <label class="menu-item-default">
                    <input type="checkbox" checked class="menu-item-checkbox" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-object-id]" value="-1">
                </label>
                <input type="hidden" class="menu-item-type" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-type]" value="custom">
                <input type="hidden" class="menu-item-title" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-title]" value="Divider">
                <input type="hidden" class="menu-item-url" name="menu-item[<?php echo esc_url($_nav_menu_placeholder); ?>][menu-item-url]" value="#">
                <input type="hidden" class="menu-item-classes" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-classes]" value="_divider">
            </li>
        </ul>
    </div>
    <p class="button-controls">
        <span class="add-to-menu">
            <input type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu','hc'); ?>" name="add-post-type-menu-item" id="submit-meta-box-divider">
            <span class="spinner"></span>
        </span>
    </p>
</div>
<?php
}
function hc_init_meta_box_mega_menu() {
    global $_nav_menu_placeholder, $nav_menu_selected_id;
    $_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;
?>
<div id="meta-box-mega-menu">
    <div class="tabs-panel tabs-panel-active">
        <label class="menu-item-small-width">
            <input type="checkbox" value="">
            <span><?php esc_attr_e("Small width dropdown","hc") ?></span>
        </label>
        <ul class="categorychecklist form-no-clear">
            <li>
                <label class="menu-item-default">
                    <input type="checkbox" checked class="menu-item-checkbox" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-object-id]" value="-1">
                </label>
                <label class="menu-item-classes howto">
                    <span><?php esc_attr_e("Background image link","hc") ?></span>
                    <input type="text" class="menu-item-url" name="menu-item[<?php echo esc_url($_nav_menu_placeholder); ?>][menu-item-url]" value="">
                </label>
                <div class="clear"></div>
                <input type="hidden" class="menu-item-type" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-type]" value="custom">
                <input type="hidden" class="menu-item-title" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-title]" value="Mega menu">
                <input type="hidden" class="menu-item-classes" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-classes]" value="_mega_menu">
            </li>
        </ul>
    </div>
    <p class="button-controls">
        <span class="add-to-menu">
            <input type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu','hc'); ?>" name="add-post-type-menu-item" id="submit-meta-box-mega-menu">
            <span class="spinner"></span>
            <a class="button-secondary upload-button"><?php esc_attr_e("Upload","hc") ?></a>
        </span>
    </p>
</div>
<?php
}
function hc_init_meta_box_mega_menu_col() {
    global $_nav_menu_placeholder, $nav_menu_selected_id;
    $_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;
?>
<div id="meta-box-mega-menu-col">
    <div class="tabs-panel tabs-panel-active">
        <ul class="categorychecklist form-no-clear">
            <li>
                <label class="menu-item-default">
                    <input type="checkbox" checked class="menu-item-checkbox" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-object-id]" value="-1">
                </label>
                <input type="hidden" class="menu-item-url" name="menu-item[<?php echo esc_url($_nav_menu_placeholder); ?>][menu-item-url]" value="#">
                <input type="hidden" class="menu-item-type" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-type]" value="custom">
                <input type="hidden" class="menu-item-title" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-title]" value="Mega menu column">
                <input type="hidden" class="menu-item-classes" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-classes]" value="_mega_menu_col">
            </li>
        </ul>
    </div>
    <p class="button-controls">
        <span class="add-to-menu">
            <input type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu','hc'); ?>" name="add-post-type-menu-item" id="submit-meta-box-mega-menu-col">
            <span class="spinner"></span>
        </span>
    </p>
</div>
<?php
}
function hc_init_meta_box_mega_menu_title() {
    global $_nav_menu_placeholder, $nav_menu_selected_id;
    $_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;
?>
<div id="meta-box-mega-menu-title">
    <div class="tabs-panel tabs-panel-active">
        <ul class="categorychecklist form-no-clear">
            <li>
                <label class="menu-item-default">
                    <input type="checkbox" checked class="menu-item-checkbox" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-object-id]" value="-1">
                </label>
                <label class="menu-item-title howto">
                    <span>Title</span>
                    <input type="text" class="menu-item-title" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-title]" value="">
                </label>
                <input type="hidden" class="menu-item-url" name="menu-item[<?php echo esc_url($_nav_menu_placeholder); ?>][menu-item-url]" value="#">
                <input type="hidden" class="menu-item-type" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-type]" value="custom">
                <input type="hidden" class="menu-item-classes" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-classes]" value="_mega_menu_title">
            </li>
        </ul>
    </div>
    <p class="button-controls">
        <span class="add-to-menu">
            <input type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu','hc'); ?>" name="add-post-type-menu-item" id="submit-meta-box-mega-menu-title">
            <span class="spinner"></span>
        </span>
    </p>
</div>
<?php
}
function hc_init_meta_box_mega_menu_tab() {
    global $_nav_menu_placeholder, $nav_menu_selected_id;
    $_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;
?>
<div id="meta-box-mega-menu-tab">
    <div class="tabs-panel tabs-panel-active">
        <ul class="categorychecklist form-no-clear">
            <li>
                <label class="menu-item-default">
                    <input type="checkbox" checked class="menu-item-checkbox" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-object-id]" value="-1">
                </label>
                <label class="menu-item-title howto">
                    <span><?php esc_attr_e("Tab name","hc") ?></span>
                    <input type="text" class="menu-item-title" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-title]" value="">
                </label>
                <input type="hidden" class="menu-item-url" name="menu-item[<?php echo esc_url($_nav_menu_placeholder); ?>][menu-item-url]" value="#">
                <input type="hidden" class="menu-item-type" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-type]" value="custom">
                <input type="hidden" class="menu-item-classes" name="menu-item[<?php echo esc_attr($_nav_menu_placeholder); ?>][menu-item-classes]" value="_mega_menu_tab">
            </li>
        </ul>
    </div>
    <p class="button-controls">
        <span class="add-to-menu">
            <input type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu','hc'); ?>" name="add-post-type-menu-item" id="submit-meta-box-mega-menu-tab">
            <span class="spinner"></span>
        </span>
    </p>
</div>
<?php
}
