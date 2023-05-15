<?php
// =============================================================================
// HEADER.PHP
// -----------------------------------------------------------------------------
// Hybric Composer titles admin components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. TITLE MANAGER BLOCK - Container for all the titles
//   02. TITLE IMAGE - Documentation and demo: framework-y.com/components/title/template-title-image.html
//   03. TITLE SLIDER - Documentation and demo: framework-y.com/components/title/template-title-slider.html
//   04. TITLE VIDEO - Documentation and demo: framework-y.com/components/title/template-title-video-mp4.html
//   05. TITLE BASE - Documentation and demo: framework-y.com/components/title/template-title-base-1.html
//   06. TITLE NONE - Without title
// =============================================================================
?>

<div id="cnt_hc_title">
    <div data-hc-id="main-title" data-hc-component="hc_title" id="main-title" class="hc-title">
        <input class="main_title" data-hc-setting="title" type="text" placeholder="<?php esc_attr_e("...","hc") ?>" value="<?php echo get_the_title() ?>" />
        <input class="main_subtitle" data-hc-setting="subtitle" type="text" placeholder="<?php esc_attr_e("...","hc") ?>" value="" />
        <div id="title-tab" class="tab-box inverse tab-wp">
            <div class="panel active">
                <div data-hc-setting="title_content" class="row"></div>
                <div class="clear"></div>
            </div>
            <ul class="nav nav-tabs">
                <li class="tab-title-image"><a href="#hc_title_image"><?php esc_attr_e("Image","hc") ?></a></li>
                <li class="tab-title-slider"><a href="#hc_title_slider"><?php esc_attr_e("Slider","hc") ?></a></li>
                <li class="tab-title-video"><a href="#hc_title_video"><?php esc_attr_e("Video","hc") ?></a></li>
                <li class="tab-title-base"><a href="#hc_title_base"><?php esc_attr_e("Base","hc") ?></a></li>
                <li class="tab-title-empty"><a href="#hc_title_empty"><?php esc_attr_e("None","hc") ?></a></li>
            </ul>
            <div class="clear"></div>
            <div id="hc-permalink"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_title_image">
    <div data-hc-id="title-image" data-hc-component="hc_title_image" data-hc-setting="title_content">
        <div class="upload-box upload-row full-input">
            <span class="close-button"></span>
            <div class="upload-container">
                <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn"></div>
            </div>
        </div>
        <hr class="space s" />
        <div class="input-checkbox input-row">
            <p><?php esc_attr_e("Fullscreen","hc") ?></p>
            <input data-hc-setting="full_screen" type="checkbox">
        </div>
        <div class="input-text input-row small-input">
            <p><?php esc_attr_e("Offset","hc") ?></p>
            <input data-hc-setting="full_screen_height" placeholder="px" type="text" data-mask="number" value="" data-require="full_screen" data-require-action="hide" />
        </div>  
        <div class="button-inner-options" data-width="315">
            <i class="button-icon input-row hc-icon-gear"></i>
            <ul>
                <li class="input-checkbox input-row">
                    <p><?php esc_attr_e("Parallax","hc") ?></p>
                    <input data-hc-setting="parallax" type="checkbox" data-require-file="parallax">
                </li>
                <li class="input-row input-text small-input" data-dependence-show="parallax">
                    <p class="sch"><?php _e("Bleed","hc") ?></p>
                    <input data-hc-setting="bleed" type="text" placeholder="70" data-mask="number" value="" />
                </li>
                <li class="input-select input-row">
                    <p><?php esc_attr_e("Ken-burn animation","hc") ?></p>
                    <select data-hc-setting="ken_burn" data-require="parallax">
                        <option selected value=""><?php esc_attr_e("None","hc") ?></option>
                        <option value="ken-burn-in"><?php esc_attr_e("Zoom in","hc") ?></option>
                        <option value="ken-burn-out"><?php esc_attr_e("Zoom out","hc") ?></option>
                        <option value="ken-burn-center"><?php esc_attr_e("Zoom centered","hc") ?></option>
                    </select>
                </li>
                <li class="input-checkbox input-row">
                    <p><?php esc_attr_e("Breadcrumbs","hc") ?></p>
                    <input data-hc-setting="breadcrumbs" type="checkbox">
                </li>
                <li class="input-checkbox input-row">
                    <p><?php esc_attr_e("Light","hc") ?></p>
                    <input data-hc-setting="light" type="checkbox">
                </li>
                <li class="input-select input-row">
                    <p><?php esc_attr_e("Alignment","hc") ?></p>
                    <select data-hc-setting="alignment">
                        <option selected value=""><?php esc_attr_e("Left","hc") ?></option>
                        <option value="align-right"><?php esc_attr_e("Right","hc") ?></option>
                        <option value="align-center"><?php esc_attr_e("Center","hc") ?></option>
                    </select>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="cnt_hc_title_slider">
    <div data-hc-id="title-slider" data-hc-component="hc_title_slider" data-hc-setting="title_content">
        <div class="upload-box upload-multi upload-row" data-hc-setting="slides" data-hc-id="slides" data-hc-container="repeater">
            <span class="close-button"></span>
            <div class="upload-container upload-add">
                <div data-hc-component="upload" class="upload-btn"></div>
            </div>
        </div>
        <hr class="space s" />
        <div class="input-checkbox input-row">
            <p><?php esc_attr_e("Fullscreen","hc") ?></p>
            <input data-hc-setting="full_screen" type="checkbox">
        </div>
        <div class="input-text input-row small-input">
            <p><?php esc_attr_e("Offset","hc") ?></p>
            <input data-hc-setting="full_screen_height" placeholder="px" type="text" data-mask="number" value="" data-require="full_screen" data-require-action="hide" />
        </div>
        <div class="button-inner-options" data-width="315">
            <i class="button-icon input-row hc-icon-gear"></i>
            <ul>
                <li class="input-text input-row small-input">
                    <p><?php esc_attr_e("Interval","hc") ?></p>
                    <input data-hc-setting="interval" data-mask="number" type="text">
                </li>
                <li class="input-checkbox input-row">
                    <p><?php esc_attr_e("Breadcrumbs","hc") ?></p>
                    <input data-hc-setting="breadcrumbs" type="checkbox">
                </li>
                <li class="input-checkbox input-row">
                    <p><?php esc_attr_e("Light","hc") ?></p>
                    <input data-hc-setting="light" type="checkbox">
                </li>
                <li class="input-select input-row">
                    <p><?php esc_attr_e("Alignment","hc") ?></p>
                    <select data-hc-setting="alignment">
                        <option selected value=""><?php esc_attr_e("Left","hc") ?></option>
                        <option value="align-right"><?php esc_attr_e("Right","hc") ?></option>
                        <option value="align-center"><?php esc_attr_e("Center","hc") ?></option>
                    </select>
                </li>
            </ul>
        </div>
     </div>
</div>
<div id="cnt_hc_title_video">
    <div data-hc-id="title-video" data-hc-component="hc_title_video" data-hc-setting="title_content">
        <div class="row">
            <div class="col-md-10">
                <div class="upload-link upload-row full-input">
                    <input data-hc-setting="video" placeholder="<?php esc_attr_e("MP4 video link","hc") ?>" type="text" value="" />
                    <a class="input-button input-row"><?php esc_attr_e("Upload video","hc") ?></a>
                </div>
                <div class="upload-box upload-row full-input">
                    <span class="close-button"></span>
                    <div class="upload-container">
                        <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-checkbox input-row">
                    <p><?php esc_attr_e("Fullscreen","hc") ?></p>
                    <input data-hc-setting="full_screen" type="checkbox">
                </div>
                <div class="input-text input-row small-input">
                    <p><?php esc_attr_e("Offset","hc") ?></p>
                    <input data-hc-setting="full_screen_height" placeholder="px" type="text" data-mask="number" value="" data-require="full_screen" data-require-action="hide" />
                </div>
                <div class="button-inner-options" data-width="315">
                    <i class="button-icon input-row hc-icon-gear"></i>
                    <ul>
                        <li class="input-checkbox input-row">
                            <p><?php esc_attr_e("Parallax","hc") ?></p>
                            <input data-hc-setting="parallax" type="checkbox" data-require-file="parallax">
                        </li>
                        <li class="input-checkbox input-row">
                            <p><?php esc_attr_e("Breadcrumbs","hc") ?></p>
                            <input data-hc-setting="breadcrumbs" type="checkbox">
                        </li>
                        <li class="input-checkbox input-row">
                            <p><?php esc_attr_e("Light","hc") ?></p>
                            <input data-hc-setting="light" type="checkbox">
                        </li>
                        <li class="input-select input-row">
                            <p><?php esc_attr_e("Alignment","hc") ?></p>
                            <select data-hc-setting="alignment">
                                <option selected value=""><?php esc_attr_e("Left","hc") ?></option>
                                <option value="align-right"><?php esc_attr_e("Right","hc") ?></option>
                                <option value="align-center"><?php esc_attr_e("Center","hc") ?></option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_title_base">
    <div data-hc-id="title-base" data-hc-component="hc_title_base" data-hc-setting="title_content">
        <div class="upload-box upload-row full-input">
            <span class="close-button"></span>
            <div class="upload-container">
                <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn"></div>
            </div>
        </div>
        <hr class="space s" />
        <div class="button-inner-options" data-width="315">
            <i class="button-icon input-row hc-icon-gear"></i>
            <ul>
                <li class="input-checkbox input-row">
                    <p><?php esc_attr_e("Breadcrumbs","hc") ?></p>
                    <input data-hc-setting="breadcrumbs" type="checkbox">
                </li>
                <li class="input-checkbox input-row">
                    <p><?php esc_attr_e("Light","hc") ?></p>
                    <input data-hc-setting="light" type="checkbox">
                </li>
                <li class="input-select input-row">
                    <p><?php esc_attr_e("Alignment","hc") ?></p>
                    <select data-hc-setting="alignment">
                        <option selected value=""><?php esc_attr_e("Left","hc") ?></option>
                        <option value="align-right"><?php esc_attr_e("Right","hc") ?></option>
                        <option value="align-center"><?php esc_attr_e("Center","hc") ?></option>
                    </select>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="cnt_hc_title_empty">
    <div data-hc-id="title-empty" data-hc-component="hc_title_empty" data-hc-setting="title_content"></div>
</div>
