<?php
// =============================================================================
// IMAGE_BOX.PHP
// -----------------------------------------------------------------------------
// Hybric Composer image boxes admin components
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. IMAGE BOX - Documentation and demo: framework-y.com/components/image-box.html
//   02. ADVANCED IMAGE BOX - Documentation and demo: framework-y.com/components/image-box.html#advanced-image-box
//   03. IMAGE - Static image
// =============================================================================
?>
<div id="cnt_hc_image_box">
    <div data-hc-id="_ID" data-hc-component="hc_image_box" data-hc-setting="main_content" class="hc-image-box hc-cnt-component">
        <input type="hidden" class="file_require" value="lightbox">
        <?php hc_e_composer_item_menu("Image box") ?>
        <div class="upload-box upload-row full-input">
            <span class="close-button"></span>
            <div class="upload-container">
                <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn upload-img-box"></div>
            </div>
        </div>
        <div class="flex-box flex-box-link">
            <?php hc_get_link_engine(); ?>
            <i class="input-row button-icons-list button-icon hc-icon-add" data-hc-setting="icon" data-hc-component="value" data-value=""></i>
            <div class="button-inner-options" data-width="330">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_image_box") ?>
            </div>
        </div>
    </div>
</div>
<div id="cnt_hc_media_box">
    <div data-hc-id="_ID" data-hc-component="hc_media_box" data-hc-setting="main_content" class="hc-image-box hc-media-box hc-cnt-component">
        <input type="hidden" class="file_require" value="lightbox">
        <input type="hidden" class="file_require" value="media_box">
        <?php hc_e_composer_item_menu("Media box") ?>
        <div class="upload-box upload-row full-input">
            <span class="close-button"></span>
            <div class="upload-container">
                <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn upload-img-box"></div>
            </div>
        </div>
        <div class="flex-box">
            <div class="input-text input-row caption-img-box text-bold">
                <input type="text" data-hc-setting="title" placeholder="<?php _e("Title ...","hc") ?>" />
            </div>
            <div class="button-inner-options" data-width="330">
                <i class="button-icon input-row hc-icon-gear"></i>
                <?php hc_echo_component_options("hc_media_box") ?>
            </div>
        </div>
        <?php hc_get_link_engine(); ?>
    </div>
</div>
<div id="cnt_hc_image">
    <div data-hc-id="_ID" data-hc-component="hc_image" data-hc-setting="main_content" class="hc-image-box hc-image hc-cnt-component">
        <?php hc_e_composer_item_menu("Image") ?>
        <div class="upload-box upload-row full-input">
            <span class="close-button"></span>
            <div class="upload-container">
                <div data-hc-setting="image" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn upload-img-box"></div>
            </div>
        </div>
        <div class="button-inner-options btn-inner">
            <i class="button-icon input-row hc-icon-gear"></i>
            <?php hc_echo_component_options("hc_image") ?>
        </div>
    </div>
</div>
