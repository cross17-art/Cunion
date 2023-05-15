<?php
// =============================================================================
// COLUMNS.PHP
// -----------------------------------------------------------------------------
// Hybric Composer columns admin component
// =============================================================================
?>
<div id="cnt_hc_column">
    <div data-hc-id="_ID" data-hc-component="hc_column" data-hc-setting="section_content" class="hc-column hc-tmp">
         <i class="button-move-complete button-move-up"></i>
        <i class="button-move-complete button-move-down"></i> 
        <div class="column-menu">
            <i title="Width" class="button-column hc-icon-grid" data-hc-setting="column_width" data-hc-component="value" data-value="hc-tmp"></i>
            <i title="Animation" class="button-anima button-anima-section hc-icon-eye-view" data-hc-setting="animation" data-hc-component="value" data-value="">
                <input type="hidden" data-hc-setting="animation_time" class="animation-time" value="" />
                <input type="hidden" data-hc-setting="timeline_animation" class="timeline-animation" value="" />
                <input type="hidden" data-hc-setting="timeline_delay" class="timeline-delay" value="" />
                <input type="hidden" data-hc-setting="timeline_order" class="timeline-order" value="" />
            </i>
            <i title="Duplicate" class="button-copy hc-icon-files"></i>
            <i title="Move" class="button-move hc-icon-arrow-move"></i>
            <i title="Settings" class="button-css hc-icon-gear" data-hc-setting="css_classes" data-hc-component="value" data-value="">
                <input type="hidden" data-hc-setting="custom_css_classes" class="custom-css-classes" value="" />
                <input type="hidden" data-hc-setting="custom_css_styles" class="custom-css-styles" value="" />
            </i>
            <i class="button-close hc-icon-remove-delete"></i>
        </div>
        <div class="column-content">
            <div data-hc-setting="main_content" data-hc-id="main_content" data-hc-container="repeater" class="row">
                <div class="clear"></div>
                <div title="Add component" class="hc-add-component column-add column-empty">
                    <i class="hc-icon-add"></i>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="cnt_hc_row">
    <div data-hc-id="_ID" data-hc-component="hc_row" data-hc-setting="section_content" class="hc-row col-md-12">
        <i class="button-move-complete button-move-up"></i>
        <i class="button-move-complete button-move-down"></i>
        <div class="column-menu">
            <i title="Width" class="button-column hc-icon-grid" data-hc-setting="  column_width" data-hc-component="value" data-value="hc-tmp"></i>
            <i title="Duplicate" class="button-copy hc-icon-files"></i>
            <i title="Move" class="button-move hc-icon-arrow-move"></i>
            <i class="button-close hc-icon-remove-delete"></i>
        </div>
        <div class="column-content">
            <div data-hc-setting="main_content" data-hc-id="main_content" data-hc-container="repeater" class="row"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="cnt_hc_container">
    <div data-hc-id="_ID" data-hc-component="hc_container" data-hc-setting="main_content" class="hc-container hc-cnt-component">
        <div data-hc-setting="content" data-hc-id="content" data-hc-container="repeater" class="row">
            <div class="clear"></div>
            <div class="hc-add-component">
                <i class="hc-icon-add"></i>
            </div>
        </div>
    </div>
</div>