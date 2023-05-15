<?php
// =============================================================================
// CONTAINERS.PHP
// -----------------------------------------------------------------------------
// Hybric Composer containers admin components
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
?>

<div id="cnt_hc_scroll_box">
    <div data-hc-id="_ID" data-hc-component="hc_scroll_box" data-hc-setting="main_content" class="hc-scroll-box hc-cnt-component">
        <input type="hidden" class="file_require" value="slimscroll"><?php hc_e_composer_item_menu("Scroll box") ?>
        <div data-hc-setting="content" data-hc-id="main_content" data-hc-container="repeater" class="row ">
            <div class="clear"></div>
            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_scroll_box") ?>
            </div>
            <a class="input-row data-options-button" data-hc-setting="data_options" data-hc-component="value" data-value="" data-default-values="" href="#popover-box-scroll-box">
                <i class="button-icon input-row hc-icon-settings"></i>
            </a>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="popover-box-scroll-box" class="popover-box popover-list search-filter" data-search-class="sch" style="display: none">
    <span class="close-button"></span>
    <div class="popover-title"><h4><?php _e("Scroll box options","hc") ?></h4></div>
    <div class="input-text input-row">
        <p><?php _e("Search","hc") ?></p>
        <input class="search" placeholder="<?php _e("Search...","hc") ?>" />
    </div>
    <ul class="list">
        <li class="divider data-sub-option"><?php _e("Options","hc") ?></li>
        <li class="input-row input-text small-input">
            <p><?php _e("Height","hc") ?></p>
            <input data-sub-option-id="height" placeholder="0" value="300" data-mask="number" type="text">
        </li>
        <li class="input-row input-text small-input">
            <p><?php _e("Offset height","hc") ?></p>
            <input data-sub-option-id="height_remove" placeholder="0" data-mask="number" type="text">
        </li>
        <li class="divider data-sub-option"><?php _e("All options","hc") ?></li>
        <li class="input-row input-text small-input">
            <p><?php _e("Size","hc") ?></p>
            <input data-option-id="size" placeholder="4px" type="text">
        </li>
        <li class="input-row input-select">
            <p class="sch"><?php _e("Position","hc") ?></p>
            <select data-option-id="direction" data-default="right">
                <option selected value="right"><?php _e("Right","hc") ?></option>
                <option value="left"><?php _e("Left","hc") ?></option>
            </select>
        </li>
        <li class="input-row input-text">
            <p class="sch"><?php _e("Color","hc") ?></p>
            <input data-option-id="color" placeholder="#464646" type="text">
        </li>
        <li class="input-row input-checkbox">
            <p class="sch"><?php _e("Always visible","hc") ?></p>
            <input data-option-id="alwaysVisible" data-default="false" type="checkbox">
        </li>
        <li class="input-row input-text small-input">
            <p class="sch"><?php _e("Distance","hc") ?></p>
            <input data-option-id="distance" type="text" placeholder="1px" />
        </li>
        <li class="input-row input-text small-input">
            <p class="sch"><?php _e("Start","hc") ?></p>
            <input data-option-id="start" type="text" />
        </li>
        <li class="input-row input-text">
            <p class="sch"><?php _e("Wheel step","hc") ?></p>
            <input data-option-id="wheelStep" type="text" placeholder="20" data-mask="number">
        </li>
        <li class="input-row input-checkbox">
            <p class="sch"><?php _e("Rail visible","hc") ?></p>
            <input data-option-id="railVisible" data-default="false" type="checkbox">
        </li>
        <li class="input-row input-text">
            <p class="sch"><?php _e("Rail color","hc") ?></p>
            <input data-option-id="railColor" placeholder="#333333" type="text">
        </li>
        <li class="input-row input-text">
            <p class="sch"><?php _e("Rail opacity","hc") ?></p>
            <input data-option-id="railOpacity" type="text" placeholder="1">
        </li>
        <li class="input-row input-text small-input">
            <p class="sch"><?php _e("Allow page scroll","hc") ?></p>
            <input data-option-id="allowPageScroll" data-default="false" type="checkbox">
        </li>
        <li class="input-row input-text small-input">
            <p class="sch"><?php _e("Touch scroll step","hc") ?></p>
            <input data-option-id="touchScrollStep" type="text" placeholder="200" data-mask="number" value="" />
        </li>
    </ul>
    <div class="clear"></div>
    <a class="button button-primary button-large popover-box-save"><?php _e("SAVE SETTINGS","hc") ?></a>
</div>
<div id="cnt_hc_grid_table">
    <div data-hc-id="_ID" data-hc-component="hc_grid_table" data-hc-setting="main_content" class="hc-grid-table hc-cnt-component"><?php hc_e_composer_item_menu("Grid table") ?>
        <div data-hc-setting="content" data-hc-id="main_content" data-hc-container="repeater" class="row ">
            <div class="clear"></div>
            <div class="hc-add-component"><i class="hc-icon-add"></i></div>  
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="input-row input-text small-input">
                <p><?php _e("Rows","hc") ?></p>
                <input data-hc-setting="rows" placeholder="1" type="text" data-mask="number" data-layout="column" value="1">
            </div>
            <div class="input-row input-text small-input">
                <p><?php _e("Columns","hc") ?></p>
                <input data-hc-setting="cols" placeholder="1" type="text" data-mask="number" data-layout="column" value="1">
            </div>
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i><?php hc_echo_component_options("hc_grid_table") ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_image_slider">
    <div data-hc-id="_ID" data-hc-component="hc_image_slider" data-hc-setting="main_content" class="hc-image-slider hc-cnt-component">
        <input type="hidden" class="file_require" value="glide">
        <input type="hidden" class="file_require" value="lightbox">
        <?php hc_e_composer_item_menu("Image slider") ?>
        <div class="upload-box upload-multi upload-row upload-fixed" data-hc-setting="slides" data-hc-id="slides" data-hc-container="repeater">
            <span class="close-button"></span>
            <div class="upload-container upload-add">
                <div data-hc-component="upload" class="upload-btn"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_image_slider") ?>
            </div>
            <a class="input-row" data-hc-setting="data_options" data-hc-component="value" data-value="" href="#popover-box-glide">
                <i class="button-icon input-row hc-icon-settings"></i>
            </a>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_slider">
    <div data-hc-id="_ID" data-hc-component="hc_slider" data-hc-setting="main_content" class="hc-slider hc-cnt-component">
        <input type="hidden" class="file_require" value="glide"><?php hc_e_composer_item_menu("Slider") ?>
        <div data-hc-setting="content" data-hc-id="main_content" data-hc-container="repeater" class="row flex-repeater">
            <div class="clear"></div>
            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i><?php hc_echo_component_options("hc_slider") ?>
            </div>
            <a class="input-row" data-hc-setting="data_options" data-hc-component="value" data-value="" href="#popover-box-glide">
                <i class="button-icon input-row hc-icon-settings"></i>
            </a>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_tab">
    <div data-hc-id="_ID" data-hc-component="hc_tab" data-hc-setting="main_content" class="hc-tab hc-cnt-component">
        <input type="hidden" class="file_require" value="components">
        <input type="hidden" class="file_require" value="tab_accordion"><?php hc_e_composer_item_menu("Tab") ?>
        <div class="tab-box inverse">
            <div class="panel active">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Tab name","hc") ?></p>
                        <input data-hc-setting="name_1" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_1" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_1" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_1" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_1" data-hc-id="main_content_1" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Tab name","hc") ?></p>
                        <input data-hc-setting="name_2" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_2" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_2" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_2" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_2" data-hc-id="main_content_2" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Tab name","hc") ?></p>
                        <input data-hc-setting="name_3" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_3" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_3" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_3" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_3" data-hc-id="main_content_3" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Tab name","hc") ?></p>
                        <input data-hc-setting="name_4" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_4" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_4" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_4" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_4" data-hc-id="main_content_4" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Tab name","hc") ?></p>
                        <input data-hc-setting="name_5" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_5" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_5" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_5" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_5" data-hc-id="main_content_5" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Tab name","hc") ?></p>
                        <input data-hc-setting="name_6" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_6" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_6" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_6" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_6" data-hc-id="main_content_6" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Tab name","hc") ?></p>
                        <input data-hc-setting="name_7" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_7" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_7" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_7" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_7" data-hc-id="main_content_7" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Tab name","hc") ?></p>
                        <input data-hc-setting="name_8" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_8" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_8" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_8" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_8" data-hc-id="main_content_8" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
            </ul>
        </div>
        <div class="button-inner-options">
            <i class="button-icon input-row hc-icon-gear"></i>
            <?php hc_echo_component_options("hc_tab") ?>
        </div>
    </div>
</div>
<div id="cnt_hc_collapse">
    <div data-hc-id="_ID" data-hc-component="hc_collapse" data-hc-setting="main_content" class="hc-collapse hc-cnt-component">
        <input type="hidden" class="file_require" value="components">
        <input type="hidden" class="file_require" value="tab_accordion"><?php hc_e_composer_item_menu("Collapse") ?>
        <div data-hc-setting="content" data-hc-id="main_content" data-hc-container="repeater" class="row ">
            <div class="clear"></div>
            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i><?php hc_echo_component_options("hc_collapse") ?>
            </div>
        </div>
    </div>
</div>
<div id="cnt_hc_accordion">
    <div data-hc-id="_ID" data-hc-component="hc_accordion" data-hc-setting="main_content" class="hc-accordion hc-cnt-component">
        <input type="hidden" class="file_require" value="components">
        <input type="hidden" class="file_require" value="tab_accordion"><?php hc_e_composer_item_menu("Accordion") ?>
        <div class="tab-box inverse">
            <div class="panel active">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_1" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_1" data-hc-id="main_content_1" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_2" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_2" data-hc-id="main_content_2" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_3" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_3" data-hc-id="main_content_3" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_4" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_4" data-hc-id="main_content_4" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_5" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_5" data-hc-id="main_content_5" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_6" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_6" data-hc-id="main_content_6" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_7" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_7" data-hc-id="main_content_7" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_8" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_8" data-hc-id="main_content_8" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_9" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_9" data-hc-id="main_content_9" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Name","hc") ?></p>
                        <input data-hc-setting="name_10" class="input-link" type="text" value="" />
                    </div>
                </div>
                <div data-hc-setting="content_10" data-hc-id="main_content_10" data-hc-container="repeater" class="row">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#">10</a></li>
            </ul>
        </div>
        <div class="button-inner-options">
            <i class="button-icon input-row hc-icon-gear"></i><?php hc_echo_component_options("hc_accordion") ?>
        </div>
    </div>
</div>
<div id="cnt_hc_image_grid_list">
    <div data-hc-id="_ID" data-hc-component="hc_image_grid_list" data-hc-setting="main_content" class="hc-grid-list hc-cnt-component">
       <?php hc_e_composer_item_menu("Image grid list") ?>
       <input type="hidden" class="file_require" value="lightbox">
       <input type="hidden" class="file_require" value="pagination">
       <div class="upload-box upload-multi upload-row upload-fixed" data-hc-setting="images" data-hc-id="images" data-hc-container="repeater">
           <span class="close-button"></span>
           <div class="upload-container upload-add">
               <div data-hc-component="upload" class="upload-btn"></div>
           </div>
        </div>
        <div class="clear"></div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <i class="input-row button-icon button-icons-list hc-icon-add" data-hc-setting="icon" data-hc-component="value" data-value=""></i>
            <div class="button-inner-options big-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_image_grid_list") ?>
            </div>
            <a class="input-row data-options-button" data-hc-setting="pag_data_options" data-hc-component="value" data-value="" href="#popover-box-pagination" data-dependence-show="pagination">
                <i class="button-icon input-row hc-icon-settings"></i>
            </a>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_grid_list">
    <div data-hc-id="_ID" data-hc-component="hc_grid_list" data-hc-setting="main_content" class="hc-grid-list hc-cnt-component layout-columns-1">
        <?php hc_e_composer_item_menu("Grid list") ?>
        <input type="hidden" class="file_require" value="pagination">
        <div data-hc-setting="content" data-hc-id="main_content" data-hc-container="repeater" class="row flex-repeater">
            <div class="clear"></div>
            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="button-inner-options big-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_grid_list") ?>
            </div>
            <a class="input-row data-options-button" data-hc-setting="pag_data_options" data-hc-component="value" data-value="" href="#popover-box-pagination" data-dependence-show="pagination">
                <i class="button-icon input-row hc-icon-settings"></i>
            </a>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_image_masonry_list">
    <div data-hc-id="_ID" data-hc-component="hc_image_masonry_list" data-hc-setting="main_content" class="hc-image-masonry-list hc-cnt-component">
        <input type="hidden" class="file_require" value="lightbox">
        <input type="hidden" class="file_require" value="masonry"><?php hc_e_composer_item_menu("Image masonry list") ?>
        <div class="tab-box inverse">
            <div class="panel active">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_1" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_1" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_1" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_1" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_1" data-hc-id="images_1" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_2" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_2" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_2" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_2" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_2" data-hc-id="images_2" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_3" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_3" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_3" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_3" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_3" data-hc-id="images_3" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_4" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_4" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_4" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_4" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_4" data-hc-id="images_4" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_5" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_5" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_5" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_5" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_5" data-hc-id="images_5" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_6" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_6" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_6" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_6" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_6" data-hc-id="images_6" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_7" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_7" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_7" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_7" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_7" data-hc-id="images_7" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_8" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_8" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_8" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_8" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_8" data-hc-id="images_8" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_9" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_9" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_9" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_9" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_9" data-hc-id="images_9" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_10" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_10" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_10" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_10" class="icon-image" value="">
                    </i>
                </div>
                <div class="input-row input-repeater" data-value="">
                    <div class="repeater-source ">
                        <div data-hc-setting="link" data-hc-component="upload" data-upload-link="http://placehold.it/700x420" data-upload-height="" data-upload-width="" data-upload-id="" class="upload-btn" style="background-image: url(http://placehold.it/700x420);"></div>
                    </div>
                    <div class="repeater-container repeater-image" data-hc-setting="images_10" data-hc-id="images_10" data-hc-container="repeater"></div>
                    <div class="clear"></div>
                    <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#">10</a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <i class="input-row button-icon button-icons-list hc-icon-add" data-hc-setting="icon" data-hc-component="value" data-value=""></i>
            <div class="button-inner-options big-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i><?php hc_echo_component_options("hc_image_masonry_list") ?>
            </div>
            <a class="input-row data-options-button" data-hc-setting="pag_data_options" data-hc-component="value" data-value="" href="#popover-box-pagination" data-dependence-show="pagination">
                <i class="button-icon input-row hc-icon-gear"></i>
            </a>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_masonry_list">
    <div data-hc-id="_ID" data-hc-component="hc_masonry_list" data-hc-setting="main_content" class="hc-masonry-list hc-cnt-component layout-columns-1">
        <input type="hidden" class="file_require" value="pagination">
        <input type="hidden" class="file_require" value="masonry">
        <?php hc_e_composer_item_menu("Masonry list") ?>
        <div class="tab-box inverse">
            <div class="panel active">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_1" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_1" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_1" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_1" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_1" data-hc-id="content_1" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_2" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_2" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_2" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_2" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_2" data-hc-id="content_2" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_3" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_3" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_3" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_3" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_3" data-hc-id="content_3" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_4" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_4" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_4" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_4" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_4" data-hc-id="content_4" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_5" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_5" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_5" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_5" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_5" data-hc-id="content_5" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_6" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_6" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_6" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_6" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_6" data-hc-id="content_6" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_7" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_7" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_7" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_7" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_7" data-hc-id="content_7" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_8" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_8" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_8" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_8" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_8" data-hc-id="content_8" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_9" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_9" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_9" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_9" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_9" data-hc-id="content_9" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="panel">
                <div class="flex-box">
                    <div class="input-row full-input" data-dependence-show="link_type_media">
                        <p><?php _e("Menu item","hc") ?></p>
                        <input data-hc-setting="name_10" class="input-link" type="text" value="" />
                    </div>
                    <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon_10" data-hc-component="value" data-value="">
                        <input type="hidden" data-hc-setting="icon_style_10" class="icon-style" value="">
                        <input type="hidden" data-hc-setting="icon_image_10" class="icon-image" value="">
                    </i>
                </div>
                <div data-hc-setting="content_10" data-hc-id="content_10" data-hc-container="repeater" class="row flex-repeater">
                    <div class="clear"></div>
                    <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                </div>
                <div class="clear"></div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#">10</a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="button-inner-options big-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_masonry_list") ?>
            </div>
            <a class="input-row data-options-button" data-hc-setting="pag_data_options" data-hc-component="value" data-value="" href="#popover-box-pagination" data-dependence-show="pagination">
                <i class="button-icon input-row hc-icon-settings"></i>
            </a>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="popover-box-pagination" class="popover-box popover-list" style="display: none">
    <span class="close-button"></span>
    <ul class="list">
        <li class="input-row input-text small-input">
            <p><?php _e("Start page","hc") ?></p>
            <input data-option-id="startPage" placeholder="1" data-mask="number" type="text">
        </li>
        <li class="input-row input-text small-input">
            <p><?php _e("Visible pages","hc") ?></p>
            <input data-option-id="visiblePages " placeholder="5" data-mask="number" type="text">
        </li>
        <li class="input-row input-text medium-input">
            <p><?php _e("Prev button text","hc") ?></p>
            <input data-option-id="prev" placeholder="<?php _e("Prev","hc") ?>" value="<?php _e("Prev","hc") ?>" type="text">
        </li>
        <li class="input-row input-text medium-input">
            <p><?php _e("Next button text","hc") ?></p>
            <input data-option-id="next" placeholder="<?php _e("Next","hc") ?>" value="<?php _e("Next","hc") ?>" type="text">
        </li>
        <li class="input-row input-checkbox">
            <p><?php _e("Loop","hc") ?></p>
            <input data-option-id="loop" data-default="false" type="checkbox">
        </li>
        <li class="input-row input-checkbox">
            <p><?php _e("Scroll top","hc") ?></p>
            <input data-option-id="scrollTop" data-default="false" type="checkbox">
        </li>
    </ul>
    <div class="clear"></div>
    <a class="button button-primary button-large popover-box-save"><?php _e("SAVE SETTINGS","hc") ?></a>
</div>
<div id="cnt_hc_album">
    <div data-hc-id="_ID" data-hc-component="hc_album" data-hc-setting="main_content" class="hc-album hc-cnt-component">
        <input type="hidden" class="file_require" value="pagination">
        <input type="hidden" class="file_require" value="image_box">
        <?php hc_e_composer_item_menu("Album") ?>
        <div class="area-label"><?php _e("Album menu","hc") ?>
        </div>
        <div class="input-row input-repeater" data-value="">
            <div class="repeater-source">
                <div class="upload-box upload-row full-input">
                    <span class="close-button"></span>
                    <div class="upload-container">
                        <div data-hc-setting="album_image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn upload-img-box"></div>
                    </div>
                </div>
                <div class="input-row input-text full-input">
                    <p><?php _e("Name","hc") ?></p>
                    <input data-hc-setting="album_name" type="text">
                </div>
            </div>
            <div class="repeater-container" data-hc-setting="menu_items" data-hc-id="slides" data-hc-container="repeater"></div>
            <div class="clear"></div>
            <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
        </div>
        <div class="clear"></div>
        <div class="area-label"><?php _e("Album content","hc") ?>
        </div>
        <div data-hc-setting="content" data-hc-id="main_content" data-hc-container="repeater" class="row">
            <div class="clear"></div>
            <div class="hc-add-component" data-components="only-col-12"><i class="hc-icon-add"></i></div>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_album") ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_fixed_area">
    <div data-hc-id="_ID" data-hc-component="hc_fixed_area" data-hc-setting="main_content" class="hc-fixed-area hc-cnt-component">
        <input type="hidden" class="file_require" value="sticky">
        <?php hc_e_composer_item_menu("Fixed area") ?>
        <div data-hc-setting="content" data-hc-id="main_content" data-hc-container="repeater" class="row">
            <div class="clear"></div>
            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_fixed_area") ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_steps">
    <div data-hc-id="_ID" data-hc-component="hc_steps" data-hc-setting="main_content" class="hc-steps hc-cnt-component">
        <input type="hidden" class="file_require" value="components"><?php hc_e_composer_item_menu("Steps") ?>
        <div class="tab-box inverse">
            <div class="panel active">
                <div class="row">
                    <div class="col-md-4">
                        <div class="flex-box">
                            <div class="input-row full-only-input">
                                <input data-hc-setting="name_1" placeholder="<?php _e("Step name","hc") ?>" class="input-link" type="text" value="" />
                            </div>
                            <div class="input-row small-input only-input">
                                <input data-hc-setting="number_1" class="input-link" type="text" value="1" />
                            </div>
                        </div>
                        <div data-hc-setting="content_1" data-hc-id="main_content_1" data-hc-container="repeater" class="row">
                            <div class="clear"></div>
                            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="flex-box">
                            <div class="input-row full-only-input">
                                <input data-hc-setting="name_2" placeholder="<?php _e("Step name","hc") ?>" class="input-link" type="text" value="" />
                            </div>
                            <div class="input-row small-input only-input">
                                <input data-hc-setting="number_2" class="input-link" type="text" value="2" />
                            </div>
                        </div>
                        <div data-hc-setting="content_2" data-hc-id="main_content_2" data-hc-container="repeater" class="row">
                            <div class="clear"></div>
                            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="flex-box">
                            <div class="input-row full-only-input">
                                <input data-hc-setting="name_3" placeholder="<?php _e("Step name","hc") ?>" class="input-link" type="text" value="" />
                            </div>
                            <div class="input-row small-input only-input">
                                <input data-hc-setting="number_3" class="input-link" type="text" value="3" />
                            </div>
                        </div>
                        <div data-hc-setting="content_3" data-hc-id="main_content_3" data-hc-container="repeater" class="row">
                            <div class="clear"></div>
                            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="row">
                    <div class="col-md-4">
                        <div class="flex-box">
                            <div class="input-row full-only-input">
                                <input data-hc-setting="name_4" placeholder="<?php _e("Step name","hc") ?>" class="input-link" type="text" value="" />
                            </div>
                            <div class="input-row small-input only-input">
                                <input data-hc-setting="number_4" class="input-link" type="text" value="4" />
                            </div>
                        </div>
                        <div data-hc-setting="content_4" data-hc-id="main_content_4" data-hc-container="repeater" class="row">
                            <div class="clear"></div>
                            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="flex-box">
                            <div class="input-row full-only-input">
                                <input data-hc-setting="name_5" placeholder="<?php _e("Step name","hc") ?>" class="input-link" type="text" value="" />
                            </div>
                            <div class="input-row small-input only-input">
                                <input data-hc-setting="number_5" class="input-link" type="text" value="5" />
                            </div>
                        </div>
                        <div data-hc-setting="content_5" data-hc-id="main_content_5" data-hc-container="repeater" class="row">
                            <div class="clear"></div>
                            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="flex-box">
                            <div class="input-row full-only-input">
                                <input data-hc-setting="name_6" placeholder="<?php _e("Step name","hc") ?>" class="input-link" type="text" value="" />
                            </div>
                            <div class="input-row small-input only-input">
                                <input data-hc-setting="number_6" class="input-link" type="text" value="6" />
                            </div>
                        </div>
                        <div data-hc-setting="content_6" data-hc-id="main_content_6" data-hc-container="repeater" class="row">
                            <div class="clear"></div>
                            <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">1-2-3</a></li>
                <li><a href="#">4-5-6</a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="box-content-bar">
            <div class="button-inner-options">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_steps") ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_page_lightbox">
    <div data-hc-id="_ID" data-hc-component="hc_page_lightbox" class="hc-section hc-page-element hc-page-lightbox">
        <input type="hidden" class="file_require" value="lightbox">
        This component has been deprecated. The new Page Lightbox can be found on the right menu of this page.
        <div class="clear"></div>
    </div>
</div>
<div id="cnt_hc_page_popup">
    <div data-hc-id="_ID" data-hc-component="hc_page_popup" class="hc-section hc-page-element hc-page-popup">
        This component has been deprecated. The new Page Popup can be found on the right menu of this page.
        <div class="clear"></div>
    </div>
</div>
