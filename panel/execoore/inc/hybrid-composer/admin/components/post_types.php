<?php
// =============================================================================
// POST_TYPES.PHP
// -----------------------------------------------------------------------------
// Hybric Composer post types admin components
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
// =============================================================================

?>

<div id="cnt_hc_pt_grid_list">
    <div data-hc-id="_ID" data-hc-component="hc_pt_grid_list" data-hc-setting="main_content" class="hc-pt-grid-list hc-cnt-component">
        <input type="hidden" class="file_require" value="content_box">
        <input type="hidden" class="file_require" value="media_box" />
        <input type="hidden" class="file_require" value="pagination">
        <?php hc_e_composer_item_menu("Grid list - List Post Type") ?>
        <div>
            <div class="button-inner-options big-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_pt_grid_list") ?>
            </div>
        </div>
    </div>
</div>
<div id="cnt_hc_pt_masonry_list">
    <div data-hc-id="_ID" data-hc-component="hc_pt_masonry_list" data-hc-setting="main_content" class="hc-pt-masonry-list hc-cnt-component">
        <input type="hidden" class="file_require" value="masonry">
        <input type="hidden" class="file_require" value="content_box" />
        <input type="hidden" class="file_require" value="media_box" />
        <input type="hidden" class="file_require" value="pagination" />
        <?php hc_e_composer_item_menu("Masonry list - List Post Type") ?>
        <div>
            <div class="button-inner-options big-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_pt_masonry_list") ?>
            </div>
        </div>
    </div>
</div>
<div id="cnt_hc_pt_slider">
    <div data-hc-id="_ID" data-hc-component="hc_pt_slider" data-hc-setting="main_content" class="hc-pt-slider hc-cnt-component">
        <input type="hidden" class="file_require" value="glide">
        <input type="hidden" class="file_require" value="content_box" />
        <input type="hidden" class="file_require" value="media_box" />
        <?php hc_e_composer_item_menu("Slider - List Post Type") ?>
        <div>
            <div class="button-inner-options big-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_pt_slider") ?>
            </div>
            <a class="input-row" data-hc-setting="data_options" data-hc-component="value" data-value="" href="#popover-box-glide"><i class="button-icon input-row hc-icon-gear"></i></a>
        </div>
    </div>
</div>
<div id="cnt_hc_pt_menu">
    <div data-hc-id="_ID" data-hc-component="hc_pt_menu" data-hc-setting="main_content" class="hc-pt-menu hc-cnt-component">
        <?php hc_e_composer_item_menu("Menu - List Post Type") ?>
        <div>
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_pt_menu") ?>
            </div>
        </div>
    </div>
</div>
<div id="cnt_hc_pt_tag_cloud">
    <div data-hc-id="_ID" data-hc-component="hc_pt_tag_cloud" data-hc-setting="main_content" class="hc-pt-tag-cloud hc-cnt-component">
        <?php hc_e_composer_item_menu("Tag cloud - List Post Type") ?>
        <div>
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_pt_tag_cloud") ?>
            </div>
        </div>
    </div>
</div>
<div id="cnt_hc_pt_navigation">
    <div data-hc-id="_ID" data-hc-component="hc_pt_navigation" data-hc-setting="main_content" class="hc-pt-navigation hc-cnt-component">
        <?php hc_e_composer_item_menu("Navigation - List Post Type") ?>
        <div class="text-center">
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_pt_navigation") ?>
            </div>
        </div>
    </div>
</div>
<div id="cnt_hc_pt_post_informations">
    <div data-hc-id="_ID" data-hc-component="hc_pt_post_informations" data-hc-setting="main_content" class="hc-pt-post-informations hc-cnt-component">
        <?php hc_e_composer_item_menu("Post informations - List Post Type") ?>
        <div class="text-center">
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_pt_post_informations") ?>
            </div>
        </div>
    </div>
</div>
