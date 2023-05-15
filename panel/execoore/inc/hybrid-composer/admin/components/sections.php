<?php
// =============================================================================
// SECTIONS.PHP
// -----------------------------------------------------------------------------
// Hybric Composer sections admin components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. SECTION MANAGER BLOCK - Container for all the sections
//   02. SECTION IMAGE - Documentation and demo: framework-y.com/components/title/template-title-image.html
//   03. SECTION SLIDER - Documentation and demo: framework-y.com/components/title/template-title-slider.html
//   04. SECTION VIDEO - Documentation and demo: framework-y.com/components/title/template-title-video-mp4.html
//   05. SECTION ANIMATION - Documentation and demo: framework-y.com/components/title/template-title-animation.html
//   06. SECTION MAP - Documentation and demo: framework-y.com/sections/section-map.html
//   07. SECTION TWO BLOCKS - Documentation and demo: framework-y.com/sections/section-two-blocks.html
//   08. SECTION EMPTY - Default empty section
// =============================================================================
?>
<div id="cnt_hc_section">
    <div data-hc-id="_ID" data-hc-component="hc_section" class="hc-section">
        <i class="button-move-complete button-move-up"></i>
        <i class="button-move-complete button-move-down"></i>
        <div class="section-menu">
            <div class="section-menu-title">
                <span><?php _e("Section","hc") ?></span>
                <select title="Width" data-hc-setting="section_width">
                    <option selected value=""><?php _e("Container","hc") ?></option>
                    <option value="full-width"><?php _e("Full width","hc") ?></option>
                </select>
            </div>
            <i title="Animation" class="button-anima button-anima-section hc-icon-eye-view" data-hc-setting="animation" data-hc-component="value" data-value="">
                <input type="hidden" data-hc-setting="animation_time" class="animation-time" value="">
                <input type="hidden" data-hc-setting="timeline_animation" class="timeline-animation" value="">
                <input type="hidden" data-hc-setting="timeline_delay" class="timeline-delay" value="">
                <input type="hidden" data-hc-setting="timeline_order" class="timeline-order" value="">
            </i>
            <i title="Duplicate" class="button-copy hc-icon-files"></i>
            <i title="Center" class="button-vertical-row horizontal-row hc-icon-navicon-round" data-hc-setting="vertical_row" data-hc-component="value" data-value=""></i>
            <i title="Move" class="button-move hc-icon-arrow-move"></i>
            <i title="Settings" class="button-css hc-icon-gear" data-hc-setting="css_classes" data-hc-component="value" data-value="">
                <input type="hidden" data-hc-setting="custom_css_classes" class="custom-css-classes" value="">
                <input type="hidden" data-hc-setting="custom_css_styles" class="custom-css-styles" value="">
            </i>
            <i class="button-close hc-icon-remove-delete"></i>
        </div>
        <div class="section-content">
            <div data-hc-setting="section_content" data-hc-id="section_content" data-hc-container="repeater" class="row">
                <!--section-content-start-->
                <div class="clear"></div>
                <div title="Add section component" class="hc-add-component hc-type-section"><i class="hc-icon-add"></i></div>
            </div>
            <div class="section-panel">
                <div class="tab-box inverse tab-wp">
                    <div class="panel active">
                        <div data-hc-setting="section_settings"></div>
                        <div class="clear"></div>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="sec-tab-empty active"><a href="#"><?php _e("Base","hc") ?></a></li>
                        <li class="tab-panel-image"><a href="#hc_section_image"><?php _e("Image","hc") ?></a></li>
                        <li class="tab-panel-slider"><a href="#hc_section_slider"><?php _e("Slider","hc") ?></a></li>
                        <li class="tab-panel-video"><a href="#hc_section_video"><?php _e("Video","hc") ?></a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="cnt_hc_section_image">
    <div data-hc-id="section-image" data-hc-component="hc_section_image" data-hc-setting="section_settings">
        <div class="row">
            <div class="col-md-6">
                <div class="upload-box upload-row full-input">
                    <span class="close-button"></span>
                    <div class="upload-container">
                        <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-checkbox input-row">
                    <p><?php _e("Full screen","hc") ?></p>
                    <input data-hc-setting="full_screen" type="checkbox" data-dependence-trigger="show">
                </div>
                <div class="input-text input-row small-input" data-dependence-show="full_screen">
                    <p><?php _e("Offset","hc") ?></p>
                    <input data-hc-setting="full_screen_height" placeholder="" type="text" data-mask="number" value=""  />
                </div>
                <div class="input-checkbox input-row">
                    <p><?php _e("Parallax","hc") ?></p>
                    <input data-hc-setting="parallax" type="checkbox" data-require-file="parallax" data-dependence-trigger="show">
                </div>
                <div class="input-row input-text small-input" data-dependence-show="parallax">
                    <p class="sch"><?php _e("Bleed","hc") ?></p>
                    <input data-hc-setting="bleed" type="text" placeholder="70" data-mask="number" value="" />
                </div>
                <div class="input-select input-row" data-dependence-show="parallax">
                    <p><?php _e("Ken-burn animation","hc") ?></p>
                    <select data-hc-setting="ken_burn" data-require="parallax">
                        <option selected value=""><?php _e("None","hc") ?></option>
                        <option value="ken-burn-in"><?php _e("Zoom in","hc") ?></option>
                        <option value="ken-burn-out"><?php _e("Zoom out","hc") ?></option>
                        <option value="ken-burn-center"><?php _e("Zoom centered","hc") ?></option>
                    </select>
                </div>
                <div class="input-select input-row">
                    <p><?php _e("Background position","hc") ?></p>
                    <select data-hc-setting="bg_pos">
                        <option selected value=""><?php _e("Center","hc") ?></option>
                        <option value="bg-top"><?php _e("Top","hc") ?></option>
                        <option value="bg-bottom"><?php _e("Bottom","hc") ?></option>
                    </select>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_section_slider">
    <div data-hc-id="section-slider" data-hc-component="hc_section_slider" data-hc-setting="section_settings">
        <div class="upload-box upload-multi upload-row" data-hc-setting="slides" data-hc-id="slides" data-hc-container="repeater">
            <span class="close-button"></span>
            <div class="upload-container upload-add">
                <div data-hc-component="upload" class="upload-btn"></div>
            </div>
        </div>
        <hr class="space s" />
        <div class="button-inner-options">
            <i class="button-icon input-row hc-icon-gear"></i>
            <ul>
                <li class="input-checkbox input-row">
                    <p><?php _e("Full screen","hc") ?></p>
                    <input data-hc-setting="full_screen" type="checkbox">
                </li>
                <li class="input-text input-row small-input">
                    <p><?php _e("Offset","hc") ?></p>
                    <input data-hc-setting="full_screen_height" placeholder="" type="text" data-mask="number" value="" />
                </li>
                <li class="input-text input-row small-input">
                    <p><?php _e("Interval","hc") ?></p>
                    <input data-hc-setting="interval" placeholder="" type="text" data-mask="number" value="" />
                </li>
                <li class="input-text input-row small-input">
                    <p><?php _e("Parallax","hc") ?></p>
                     <input data-hc-setting="slider_parallax" type="checkbox">
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="cnt_hc_section_video">
    <div data-hc-id="section-video" data-hc-component="hc_section_video" data-hc-setting="section_settings">
        <div class="row">
            <div class="col-md-6">
                <div class="upload-link upload-row full-input">
                    <input data-hc-setting="video" placeholder="<?php _e("Youtube or MP4 video link","hc") ?>" type="text" value="" />
                    <a class="input-button input-row"><?php _e("Upload video","hc") ?></a>
                </div>
                <div class="upload-box upload-row full-input">
                    <span class="close-button"></span>
                    <div class="upload-container">
                        <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-checkbox input-row">
                    <p><?php _e("Full screen","hc") ?></p>
                    <input data-hc-setting="full_screen" type="checkbox">
                </div>
                <div class="input-text input-row small-input">
                    <p><?php _e("Offset","hc") ?></p>
                    <input data-hc-setting="full_screen_height" placeholder="" type="text" data-mask="number" value="" data-require="full_screen" data-require-action="hide" />
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_section_map">
    <div data-hc-id="_ID" data-hc-component="hc_section_map" class="hc-section hc-section-map">
        <input type="hidden" class="file_require" value="gmaps">
        <input type="hidden" class="file_require" value="gmaps_api">
        <i class="button-move-complete button-move-up"></i>
        <i class="button-move-complete button-move-down"></i>
        <div class="section-menu">
            <span><?php _e("Section map","hc") ?></span>
            <select data-hc-setting="section_width">
                <option selected value=""><?php _e("Container","hc") ?></option>
                <option value="full-width"><?php _e("Full width","hc") ?></option>
            </select>
            <i class="button-anima button-anima-section hc-icon-eye-view" data-hc-setting="animation" data-hc-component="value" data-value="">
                <input type="hidden" data-hc-setting="animation_time" class="animation-time" value="">
                <input type="hidden" data-hc-setting="timeline_animation" class="timeline-animation" value="">
                <input type="hidden" data-hc-setting="timeline_delay" class="timeline-delay" value="">
                <input type="hidden" data-hc-setting="timeline_order" class="timeline-order" value="">
            </i>
            <i class="button-copy hc-icon-files"></i>
            <i title="CSS" class="button-css hc-icon-gear" data-hc-setting="css_classes" data-hc-component="value" data-value="">
                <input type="hidden" data-hc-setting="custom_css_classes" class="custom-css-classes" value="">
                <input type="hidden" data-hc-setting="custom_css_styles" class="custom-css-styles" value="">
            </i>
            <i class="button-move hc-icon-arrow-move"></i>
            <i class="button-close hc-icon-remove-delete"></i>
        </div>
        <div class="section-content">
            <div data-hc-setting="section_content" data-hc-id="section_content" data-hc-container="repeater" class="row">
                <div class="clear"></div>
                <div class="hc-add-component hc-type-section"><i class="hc-icon-add"></i></div>
            </div>
            <div class="section-panel">
                <div class="input-row input-text">
                    <p class="sch"><?php _e("Map coordinates","hc") ?></p>
                    <input data-hc-setting="map_coordinates" type="text" placeholder="00.0000,00.0000" value="" />
                </div>
                <div class="button-inner-options">
                    <i class="button-icon input-row hc-icon-gear"></i>
                    <ul>
                        <li class="input-row input-select">
                            <p class="sch"><?php _e("Position","hc") ?></p>
                            <select data-hc-setting="position" data-default="left">
                                <option value=""><?php _e("Left","hc") ?></option>
                                <option value="section-map-right"><?php _e("Right","hc") ?></option>
                            </select>
                        </li>
                        <li class="input-row input-text small-input">
                            <p class="sch"><?php _e("Height","hc") ?></p>
                            <input data-hc-setting="map_height" type="text" placeholder="300" value="300" />
                        </li>
                        <li class="input-row input-text medium-input">
                            <p class="sch"><?php _e("Address","hc") ?></p>
                            <input data-hc-setting="map_address" type="text" placeholder="" value="" />
                        </li>
                        <li class="input-row input-text small-input">
                            <p class="sch"><?php _e("Zoom","hc") ?></p>
                            <input data-hc-setting="map_zoom" type="text" data-default="12" placeholder="12" data-mask="number" value="" />
                        </li>
                        <li class="upload-box upload-row input-row upload-mini">
                            <p><?php _e("Marker image","hc") ?></p>
                            <span class="close-button"></span>
                            <div class="upload-container">
                                <div data-hc-setting="marker_image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn"></div>
                            </div>
                        </li>
                        <li class="input-row input-text small-input">
                            <p class="sch"><?php _e("Marker top offset","hc") ?></p>
                            <input data-hc-setting="marker_position_top" type="text" placeholder="0" value="" />
                        </li>
                        <li class="input-row input-text small-input">
                            <p class="sch"><?php _e("Marker left offset","hc") ?></p>
                            <input data-hc-setting="marker_position_left" type="text" placeholder="0" value="" />
                        </li>
                        <li class="input-row input-select">
                            <p class="sch"><?php _e("Map skin","hc") ?></p>
                            <select data-hc-setting="map_skin" data-default="default">
                                <option value=""><?php _e("Default","hc") ?></option>
                                <option value="gray"><?php _e("Gray","hc") ?></option>
                                <option value="black"><?php _e("Black","hc") ?></option>
                                <option value="green"><?php _e("Green","hc") ?></option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="cnt_hc_section_two_blocks">
    <div data-hc-id="_ID" data-hc-component="hc_section_two_blocks" class="hc-section hc-section-two-blocks">
        <i class="button-move-complete button-move-up"></i>
        <i class="button-move-complete button-move-down"></i>
        <div class="section-menu">
            <span><?php _e("Section block","hc") ?></span>
            <select data-hc-setting="section_width">
                <option selected value=""><?php _e("Container","hc") ?></option>
                <option value="full-width"><?php _e("Full width","hc") ?></option>
            </select>
            <i class="button-anima button-anima-section hc-icon-eye-view" data-hc-setting="animation" data-hc-component="value" data-value="">
                <input type="hidden" data-hc-setting="animation_time" class="animation-time" value="">
                <input type="hidden" data-hc-setting="timeline_animation" class="timeline-animation" value="">
                <input type="hidden" data-hc-setting="timeline_delay" class="timeline-delay" value="">
                <input type="hidden" data-hc-setting="timeline_order" class="timeline-order" value="">
            </i>
            <i class="button-copy hc-icon-files"></i>
            <i class="button-vertical-row hc-icon-navicon-round" data-hc-setting="vertical_row" data-hc-component="value" data-value=""></i>
            <i class="button-move hc-icon-arrow-move"></i>
            <i class="button-css hc-icon-gear" data-hc-setting="css_classes" data-hc-component="value" data-value="">
                <input type="hidden" data-hc-setting="custom_css_classes" class="custom-css-classes" value="">
                <input type="hidden" data-hc-setting="custom_css_styles" class="custom-css-styles" value="">
            </i>
            <i class="button-close hc-icon-remove-delete"></i>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-md-6 col-content">
                    <div data-hc-setting="section_content" data-hc-id="section_content" data-hc-container="repeater" class="row">
                        <div class="clear"></div>
                        <div class="hc-add-component hc-type-section"><i class="hc-icon-add"></i></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-md-6">
                    <div data-hc-setting="custom_content" data-hc-id="section_content" data-hc-container="repeater" class="row">
                        <div class="clear"></div>
                        <div class="hc-add-component"><i class="hc-icon-add"></i></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section-panel">
                <div class="upload-box upload-row full-input">
                    <span class="close-button"></span>
                    <div class="upload-container">
                        <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn" data-upload-id="" processed="true"></div>
                    </div>
                </div>
                <div class="button-inner-options">
                    <i class="button-icon input-row hc-icon-gear"></i>
                    <ul>
                        <li class="input-checkbox input-row">
                            <p>Inverse</p>
                            <input data-hc-setting="inverse" type="checkbox">
                        </li>
                        <li class="input-checkbox input-row">
                            <p>Full mode</p>
                            <input data-hc-setting="full" type="checkbox">
                        </li>
                        <li class="upload-link upload-row input-row">
                            <p>Video</p>
                            <input data-hc-setting="video" placeholder="<?php _e("MP4 video link","hc") ?>" type="text" value="" />
                            <a class="input-button input-row"></a>
                        </li>
                        <li class="input-checkbox input-row">
                            <p><?php _e("Parallax image","hc") ?></p>
                            <input data-hc-setting="parallax" type="checkbox">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>