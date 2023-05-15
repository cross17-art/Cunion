<?php
// =============================================================================
// CONTENT_BOX.PHP
// -----------------------------------------------------------------------------
// Hybric Composer content boxes admin components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. CONTENT BOX - Documentation and demo: framework-y.com/components/content-box.html
//   02. NICHE CONTENT BOX BLOG - Documentation and demo: framework-y.com/components/content-box.html#niche-box
//   03. NICHE CONTENT BOX TESTIMONIALS - Documentation and demo: framework-y.com/components/content-box.html#niche-box
//   04. NICHE CONTENT BOX TEAM - Documentation and demo: framework-y.com/components/content-box.html#niche-box
//   05. NICHE CONTENT BOX PRICING TABLES - Documentation and demo: framework-y.com/components/content-box.html#niche-box
//   06. NICHE CONTENT BOX CALL TO ACTION - Documentation and demo: framework-y.com/components/content-box.html#niche-box
// =============================================================================
?>
<div id="cnt_hc_content_box">
    <div data-hc-id="_ID" data-hc-component="hc_content_box" data-hc-setting="main_content" class="hc-content-box hc-content-box-base hc-cnt-component">
        <input type="hidden" class="file_require" value="lightbox">
        <input type="hidden" class="file_require" value="content_box">
        <?php hc_e_composer_item_menu("Content box") ?>
        <div class="upload-box upload-row full-input content-box-upload">
            <span class="close-button"></span>
            <div class="upload-container">
                <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn upload-img-box"></div>
            </div>
        </div>
        <div class="flex-box">
            <div class="input-text input-row full-only-input">
                <input type="text" placeholder="<?php esc_attr_e("Title ...","hc") ?>" data-hc-setting="title" />
            </div>
            <div class="flex-sub-box">
                <i class="input-row button-icons-list-all button-icon hc-icon-add" data-hc-setting="icon" data-hc-component="value" data-value="">
                    <input type="hidden" data-hc-setting="icon_style" class="icon-style" value="">
                    <input type="hidden" data-hc-setting="icon_image" class="icon-image" value="">
                </i>
                <div class="button-inner-options" data-width="330">
                    <i class="button-icon input-row hc-icon-gear"></i>
                    <?php hc_echo_component_options("hc_content_box") ?>
                </div>
            </div>
        </div>
        <div class="input-textarea input-row full-only-input">
            <textarea data-hc-setting="text" placeholder="<?php esc_attr_e("Text ...","hc") ?>"></textarea>
        </div>
        <?php hc_get_link_engine(); ?>
    </div>
</div>
<div id="cnt_hc_info_box">
    <div data-hc-id="_ID" data-hc-component="hc_info_box" data-hc-setting="main_content" class="hc-content-box hc-info-box hc-cnt-component">
        <input type="hidden" class="file_require" value="lightbox" />
        <input type="hidden" class="file_require" value="content_box" />
        <?php hc_e_composer_item_menu("Info box") ?>
        <div class="upload-box upload-row full-input content-box-upload">
            <span class="close-button"></span>
            <div class="upload-container">
                <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn upload-img-box"></div>
            </div>
        </div>
        <div class="flex-box">
            <div class="input-text input-row full-only-input">
                <input type="text" placeholder="<?php esc_attr_e("Title ...","hc") ?>" data-hc-setting="title" />
            </div>
            <div class="flex-sub-box">
                <div class="button-inner-options" data-width="330">
                    <i class="button-icon input-row hc-icon-gear"></i>
                    <?php hc_echo_component_options("hc_info_box") ?>
                </div>
            </div>
        </div>
        <div class="input-textarea input-row full-only-input">
            <textarea data-hc-setting="text" placeholder="<?php esc_attr_e("Text ...","hc") ?>"></textarea>
        </div>
        <?php hc_get_link_engine(); ?>
    </div>
</div>
<div id="cnt_hc_niche_content_box_testimonials">
    <div data-hc-id="_ID" data-hc-component="hc_niche_content_box_testimonials" data-hc-setting="main_content" class="hc-content-box hc-testimonials-content-box hc-cnt-component">
        <input type="hidden" class="file_require" value="content_box">
        <?php hc_e_composer_item_menu("Testimonials box") ?>
        <div class="row">
            <div class="col-md-3">
                <div class="upload-box upload-row full-input upload-fixed">
                    <span class="close-button"></span>
                    <div class="upload-container">
                        <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn upload-img-box"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="flex-box">
                    <div class="input-text input-row full-only-input">
                        <input type="text" placeholder="<?php esc_attr_e("Title ...","hc") ?>" data-hc-setting="title" />
                    </div>
                    <div class="button-inner-options" data-width="330">
                        <i class="button-icon input-row hc-icon-gear"></i>
                        <?php hc_echo_component_options("hc_niche_content_box_testimonials") ?>
                    </div>
                </div>
                <div class="input-text input-row full-only-input">
                    <input type="text" placeholder="<?php esc_attr_e("Subtitle ...","hc") ?>" data-hc-setting="subtitle" />
                </div>
                <div class="input-textarea input-row full-only-input">
                    <textarea data-hc-setting="text" placeholder="<?php esc_attr_e("Text ...","hc") ?>"></textarea>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="cnt_hc_niche_content_box_team">
    <div data-hc-id="_ID" data-hc-component="hc_niche_content_box_team" data-hc-setting="main_content" class="hc-content-box hc-team-content-box hc-cnt-component">
        <input type="hidden" class="file_require" value="content_box">
        <?php hc_e_composer_item_menu("Team box") ?>
        <div class="upload-box upload-row full-input">
            <span class="close-button"></span>
            <div class="upload-container">
                <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn upload-img-box"></div>
            </div>
        </div>
        <div class="flex-box">
            <div class="input-text input-row full-only-input">
                <input type="text" placeholder="<?php esc_attr_e("Name ...","hc") ?>" data-hc-setting="title" />
            </div>
            <div class="button-inner-options" data-width="330">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_niche_content_box_team") ?>
            </div>
        </div>
        <div class="input-text input-row full-only-input">
            <input type="text" placeholder="<?php esc_attr_e("Subtitle ...","hc") ?>" data-hc-setting="subtitle" />
        </div>
        <div class="input-textarea input-row full-only-input">
            <textarea data-hc-setting="text" placeholder="<?php esc_attr_e("Text ...","hc") ?>"></textarea>
        </div>
    </div>
</div>
<div id="cnt_hc_niche_content_box_pricing_table">
    <div data-hc-id="_ID" data-hc-component="hc_niche_content_box_pricing_table" data-hc-setting="main_content" class="hc-content-box hc-pricing-table-content-box hc-cnt-component">
        <input type="hidden" class="file_require" value="content_box">
        <?php hc_e_composer_item_menu("Pricing table box") ?>
        <div class="flex-box">
            <div class="input-text input-row full-only-input">
                <input type="text" placeholder="<?php esc_attr_e("Title ...","hc") ?>" data-hc-setting="title" />
            </div>
            <div class="button-inner-options" data-width="330">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_niche_content_box_pricing_table") ?>
            </div>
        </div>
        <div class="input-text input-row input-repeater" data-value="">
            <div class="repeater-source">
                <input type="text" data-hc-setting="text" />
            </div>
            <div class="repeater-container" data-hc-setting="rows" data-hc-id="slides" data-hc-container="repeater"></div>
            <div class="clear"></div>
            <div class="repeater-add-new"><i class="hc-icon-add"></i></div>
        </div>
    </div>
</div>
<div id="cnt_hc_niche_content_box_call">
    <div data-hc-id="_ID" data-hc-component="hc_niche_content_box_call" data-hc-setting="main_content" class="hc-content-box hc-call-content-box hc-cnt-component">
        <input type="hidden" class="file_require" value="content_box">
        <?php hc_e_composer_item_menu("Call to action box") ?>
        <div class="flex-box">
            <div class="input-text input-row full-only-input">
                <input type="text" placeholder="<?php esc_attr_e("Content ...","hc") ?>" data-hc-setting="content" />
            </div>
            <div class="flex-sub-box">
                <i class="input-row button-icons-list button-icon hc-icon-add" data-hc-setting="icon" data-hc-component="value" data-value=""></i>
                <div class="button-inner-options" data-width="330">
                    <i class="button-icon input-row hc-icon-gear"></i>
                    <?php hc_echo_component_options("hc_niche_content_box_call") ?>
                </div>
            </div>
        </div>
        <?php hc_get_link_engine(); ?>
    </div>
</div>
