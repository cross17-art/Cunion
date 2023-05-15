<?php
// =============================================================================
// CONFIG.PHP
// -----------------------------------------------------------------------------
// This file contain all the options of every components.
// This file is used by the back-end and the front-end page builder
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. TITLE MANAGER BLOCK - Container for all the titles
//   02. TITLE IMAGE - Documentation and demo: framework-y.com/components/title/template-title-image.html
//   03. TITLE SLIDER - Documentation and demo: framework-y.com/components/title/template-title-slider.html
//   04. TITLE VIDEO - Documentation and demo: framework-y.com/components/title/template-title-video-mp4.html
//   05. TITLE ANIMATION - Documentation and demo: framework-y.com/components/title/template-title-animation.html
//   06. TITLE BASE - Documentation and demo: framework-y.com/components/title/template-title-base-1.html
// =============================================================================

if (!defined('HC_FRONT')) {
    define("HC_FRONT", ((isset($_GET["hc"]) && $_GET["hc"] == "front" && current_user_can('administrator')) ? true: false));
}
global $HC_COMPONENTS_SETTINGS;
global $HC_FRONT_COMPONENTS_SETTINGS;
global $HC_PLUGINS_SETTINGS;

$hc_arr_sizes = array("","Default","text-lg","Large","text-md","Medium","text-sm","Small","text-xs","Extra small");
$hc_arr_alignment = array("","Default","align-left","Left","align-center","Center","align-right","Right");
$hc_arr_animations =  array("","None","fade-in","Fade in","fade-left","Fade left","fade-right","Fade right","fade-top","Fade top","fade-bottom","Fade bottom","show-scale","Show scale","scale","Scale","scale-rotate","Scale rotate","pulse","Pulse","pulse-horizontal","Pulse horizontal");
$hc_arr_image_animations = array("","None","scale","Scale","scale-rotate","Scale rotate","pulse","Pulse","pulse-horizontal","Pulse horizontal");
$hc_arr_thumb_size = array("full","Original","hd","HD","ultra-large","Ultra large","large","Large","medium","Medium","thumbnail","Thumbnail");

$HC_PLUGINS_SETTINGS =  array(
    "circle_progress_bar" => array(
        "progress_circle_options" => array("label" => "Progress bar advanced options", "type" => "divider"),
        "startAngle" => array("label" => "Start angle", "type" => "text", "value" => ""),
        "reverse" => array("label" => "Reverse", "type" => "checkbox", "value" => ""),
        "lineCap" => array("label" => "Line cap", "type" => "select", "value" => array("","Butt","round","Round","square","Square")),
        "fill" => array("label" => "Fill", "type" => "text", "value" => ""),
        "animation" => array("label" => "Animation", "type" => "text", "value" => ""),
        "animationStartValue" => array("label" => "Animation start", "type" => "text", "value" => "")
    ),
    "facebook" => array(
        "facebook_options" => array("label" => "Facebook options", "type" => "divider"),
        "limit" => array("label" => "Limit", "type" => "text", "value" => ""),
        "timeout" => array("label" => "Timeout", "type" => "text", "value" => ""),
        "speed" => array("label" => "Speed", "type" => "text", "value" => ""),
        "effect" => array("label" => "Effect", "type" => "select", "value" => array("","Slide","fade","Fade","none","None")),
        "locale" => array("label" => "Locale", "type" => "text", "value" => ""),
        "avatar_size" => array("label" => "Avatar size", "type" => "select", "value" => array("","Default","small","Small","normal","Normal","large","Large")),
        "message_length" => array("label" => "Message length", "type" => "text", "value" => ""),
        "show_guest_entries" => array("label" => "Show guest entries", "type" => "checkbox", "value" => "checked"),
    ),
    "twitter" => array(
        "twitter_options" => array("label" => "Twitter options", "type" => "divider"),
        "count" => array("label" => "Limit", "type" => "text", "value" => ""),
        "profile_image" => array("label" => "Profile image", "type" => "checkbox", "value" => "checked"),
        "show_time" => array("label" => "Show time", "type" => "checkbox", "value" => "checked"),
        "show_media" => array("label" => "Show media", "type" => "checkbox", "value" => "checked"),
        "show_retweeted_text" => array("label" => "Show retweeted text", "type" => "checkbox", "value" => ""),
    ),
    "slimscroll" => array(
        "slimscroll_options" => array("label" => "Scroll box options", "type" => "divider"),
        "size" => array("label" => "Size", "type" => "number", "value" => ""),
        "direction" => array("label" => "Position", "type" => "select", "value" => array("right","Right","left","Left")),
        "color" => array("label" => "Color", "type" => "text", "value" => ""),
        "alwaysVisible" => array("label" => "Always visible", "type" => "checkbox", "value" => ""),
        "distance" => array("label" => "Distance", "type" => "text", "value" => ""),
        "start" => array("label" => "Start", "type" => "text", "value" => ""),
        "wheelStep" => array("label" => "Wheel step", "type" => "text", "value" => ""),
        "railVisible" => array("label" => "Rail visible", "type" => "checkbox", "value" => ""),
        "railColor" => array("label" => "Rail color", "type" => "text", "value" => ""),
        "railOpacity" => array("label" => "Rail opacity", "type" => "text", "value" => ""),
        "allowPageScroll" => array("label" => "Allow page scroll", "type" => "checkbox", "value" => ""),
        "touchScrollStep" => array("label" => "Touch scroll step", "type" => "text", "value" => "")
    ),
    "pagination" => array(
        "pagination_options" => array("label" => "Advanced pagination options", "type" => "divider"),
        "startPage" => array("label" => "Start page", "type" => "number", "value" => ""),
        "visiblePages" => array("label" => "Visible pages", "type" => "number", "value" => ""),
        "first" => array("label" => "First button text", "type" => "text", "value" => ""),
        "prev" => array("label" => "Prev button text", "type" => "text", "value" => ""),
        "next" => array("label" => "Next button text", "type" => "text", "value" => ""),
        "last" => array("label" => "Last button text", "type" => "text", "value" => ""),
        "loop" => array("label" => "Loop", "type" => "checkbox", "value" => ""),
        "scrollTop" => array("label" => "Scroll to top", "type" => "checkbox", "value" => "")
    ),
    "slider" => array(
        "slider_options" => array("label" => "Slider options", "type" => "divider"),
        "type" => array("label" => "Type", "type" => "select", "value" => array("slider","Slider","carousel","Carousel")),
        "perView" => array("label" => "Viewport items", "type" => "number", "value" => ""),
        "perViewLg" => array("label" => "Viewport items on desktop", "type" => "number", "value" => ""),
        "perViewMd" => array("label" => "Viewport items on notebook", "type" => "number", "value" => ""),
        "perViewSm" => array("label" => "Viewport items on tablets", "type" => "number", "value" => ""),
        "perViewXs" => array("label" => "Viewport items on smartphones", "type" => "number", "value" => ""),
        "gap" => array("label" => "Items margin", "type" => "number", "value" => ""),
        "arrows" => array("label" => "Arrows", "type" => "checkbox", "value" => ""),
        "nav" => array("label" => "Bullets", "type" => "checkbox", "value" => ""),
        "focusAt" => array("label" => "Focused item", "type" => "number", "value" => ""),
        "controls" => array("label" => "Outer controls", "type" => "checkbox", "value" => "")
    ),

);

$HC_COMPONENTS_SETTINGS =  array(
    "hc_icon_box" => array(
        "icon_position" => array("label" => "Icon position", "type" => "select", "value" => array("icon-box-left","Left","icon-box-right","Right","icon-box-top","Top"), "front" => true),
        "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment, "front" => true),
        "icon_size" => array("label" => "Icon size", "type" => "select", "value" => $hc_arr_sizes, "front" => true),
        "title_size" => array("label" => "Title size", "type" => "select", "value" => $hc_arr_sizes, "front" => true),
        "text_size" => array("label" => "Text size", "type" => "select", "value" => $hc_arr_sizes, "front" => true)
     ),
     "hc_subtitle" => array(
        "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment, "front" => true)
     ),
     "hc_icon_list" => array(
        "direction" => array("label" => "Direction", "type" => "select", "value" =>  array("","Vertical","icon-list-horizontal","Horizontal"), "front" => true),
        "size" => array("label" => "Size", "type" => "select", "value" =>  array("","Default","icon-md","Medium","icon-lg","Large"), "front" => true),
        "style" => array("label" => "Style", "type" => "select", "value" => array("","Icons","icon-decimal","Decimal","icon-circle","Circle","icon-line","Line"), "front" => true)
     ),
     "hc_button" => array(
        "style" => array("label" => "Style", "type" => "select", "value" => array("circle","Circle","square","Square","circle-border","Circle border","square-border","Square border","link","Link"), "front" => true),
        "size" => array("label" => "Size", "type" => "select", "value" =>  array("btn-lg","Large","btn-sm","Medium","btn-xs","Small"), "front" => true),
        "position" => array("label" => "Position", "type" => "select", "value" => array("left","Left","right","Right","center","Center","full","Full"), "front" => true),
        "inner_animation" => array("label" => "Animated", "type" => "checkbox", "value" => "", "front" => true)
     ),
      "hc_image" => array(
         "alt" => array("label" => "Alt text", "type" => "text", "value" => "", "front" => true),
         "thumb_size" => array("label" => "Image size", "type" => "select", "value" =>  $hc_arr_thumb_size, "front" => true)
     ),
      "hc_image_box" => array(
         "image_animation" => array("label" => "Image animation", "type" => "select", "value" =>  $hc_arr_image_animations, "front" => true),
         "icon_animation" => array("label" => "Icon animation", "type" => "select", "value" =>  $hc_arr_animations, "front" => true),
         "thumb_size" => array("label" => "Image size", "type" => "select", "value" =>  $hc_arr_thumb_size, "front" => true),
         "icon_hidden" => array("label" => "Hidden icon", "type" => "checkbox", "value" => "checked", "front" => true),
         "caption_img_box" => array("label" => "Title", "type" => "text", "value" => "", "front" => true),
         "alt" => array("label" => "Alt text", "type" => "text", "value" => "", "front" => true)
     ),
      "hc_media_box" => array(
         "box_style" => array("label" => "Box style", "type" => "select", "value" => array("half","Half","full","Full","down","Down","reveal","Reveal"), "front" => true),
         "image_animation" => array("label" => "Image animation", "type" => "select", "value" =>  $hc_arr_image_animations, "front" => true),
         "content_animation" => array("label" => "Content animation", "type" => "select", "value" =>  $hc_arr_animations, "front" => true),
         "thumb_size" => array("label" => "Image size", "type" => "select", "value" => $hc_arr_thumb_size, "front" => true),
         "subtitle" => array("label" => "Subtitle", "type" => "text", "value" => "", "front" => true),
         "extra_content" => array("label" => "Extra content", "type" => "text", "value" => "", "front" => true),
         "text" => array("label" => "Main text", "type" => "textarea", "value" => "Pellentesque in ipsum dapibus", "front" => true),
         "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment, "front" => true),
         "alt" => array("label" => "Alt text", "type" => "text", "value" => "", "front" => true),
     ),
      "hc_content_box" => array(
         "box_style" => array("label" => "Box style", "type" => "select", "value" => array("side_content","Side image","top_icon_image","Top image","top_icon","Top icon","side_icon","Side icon","multiple_box","Badge"), "front" => true),
         "boxed" => array("label" => "Boxed", "type" => "checkbox", "value" =>  "", "front" => true),
         "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment, "front" => true),
         "title_size" => array("label" => "Title size", "type" => "select", "value" => $hc_arr_sizes, "front" => true),
         "text_size" => array("label" => "Text size", "type" => "select", "value" => $hc_arr_sizes, "front" => true),
         "extra_content" => array("label" => "Extra content", "type" => "text", "value" => "[hidden]", "front" => true),
         "alt" => array("label" => "Image alt text", "type" => "text", "value" => "", "front" => true),
         "button_text" => array("label" => "Button text", "type" => "text", "value" => "")
     ),
     "hc_info_box" => array(
         "boxed" => array("label" => "Boxed", "type" => "checkbox", "value" =>  "", "front" => true),
         "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment, "front" => true),
         "title_size" => array("label" => "Title size", "type" => "select", "value" => $hc_arr_sizes, "front" => true),
         "text_size" => array("label" => "Text size", "type" => "select", "value" => $hc_arr_sizes, "front" => true),
         "info_1" => array("label" => "Info 1", "type" => "text", "value" => "", "front" => true),
         "info_2" => array("label" => "Info 2", "type" => "text", "value" => "", "front" => true),
         "info_3" => array("label" => "Info 3", "type" => "text", "value" => "", "front" => true),
         "info_4" => array("label" => "Info 4", "type" => "text", "value" => "", "front" => true),
         "extra_content" => array("label" => "Extra content", "type" => "text", "value" => "", "front" => true),
         "bottom_content" => array("label" => "Bottom content", "type" => "text", "value" => "", "front" => true),
         "alt" => array("label" => "Image alt text", "type" => "text", "value" => "", "front" => true),
         "button_text" => array("label" => "Button text", "type" => "text", "value" => "")
     ),
     "hc_niche_content_box_blog" => array(
         "box_style" => array("label" => "Style", "type" => "select", "value" => array("side","Side","full_width","Full width","full_width_2","Full width 2"), "front" => true),
         "boxed" => array("label" => "Boxed", "type" => "checkbox", "value" =>  "", "front" => true),
         "extra_content" => array("label" => "Extra content", "type" => "text", "value" => "", "front" => true),
         "alt" => array("label" => "Image alt text", "type" => "text", "value" => "", "front" => true),
         "button_text" => array("label" => "Button text", "type" => "text", "value" => "")
     ),
     "hc_niche_content_box_testimonials" => array(
         "box_style" => array("label" => "Style", "type" => "select", "value" => array("style_1","Style 1","style_2","Style 2"), "front" => true)
     ),
     "hc_niche_content_box_team" => array(
          "social_fb" => array("label" => "Facebook", "type" => "text", "value" => ""),
          "social_tw" => array("label" => "Twitter", "type" => "text", "value" => ""),
          "social_pi" => array("label" => "Pinterest", "type" => "text", "value" => ""),
          "social_in" => array("label" => "LinkedIn", "type" => "text", "value" => ""),
          "social_yt" => array("label" => "Youtube", "type" => "text", "value" => ""),
          "social_ig" => array("label" => "Instagram", "type" => "text", "value" => ""),
          "alt" => array("label" => "Alt text", "type" => "text", "value" => ""),
          "link" => array("label" => "Link", "type" => "text", "value" => "")
     ),
     "hc_niche_content_box_pricing_table" => array(
          "price" => array("label" => "Price", "type" => "text", "value" => ""),
          "price_unit" => array("label" => "Price unit", "type" => "text", "value" => ""),
          "subtitle" => array("label" => "Subtitle", "type" => "text", "value" => ""),
          "featured" => array("label" => "Featured", "type" => "checkbox", "value" => ""),
          "button_text" => array("label" => "Button text", "type" => "text", "value" => ""),
          "button_link" => array("label" => "Button link", "type" => "text", "value" => ""),
          "button_style" => array("label" => "Button style", "type" => "select", "value" => array("circle","Circle","square","Square","circle-border","Circle border","square-border","Square border","link","Link")),
     ),
     "hc_niche_content_box_call" => array(
         "title" => array("label" => "Title", "type" => "text", "value" => ""),
         "button_text" => array("label" => "Button text", "type" => "text", "value" => "")
      ),
     "hc_text_list" => array(
         "type" => array("label" => "Type", "type" => "select", "value" => array("base","Base","image","Image","side","Side","line","Line","bold","Bold"))
     ),
     "hc_icon_links" => array(
         "style" => array("label" => "Style", "type" => "select", "value" => array("","Base","icon-links-grid","Grid","icon-links-button","Button","icon-links-popup","Popup")),
         "size" => array("label" => "Size", "type" => "select", "value" => array("","Default","icon-lg","Large"), "front" => true),
         "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment, "front" => true)
      ),
     "hc_counter" => array(
         "style" => array("label" => "Style", "type" => "select", "value" => array("counter-vertical","Vertical","counter-horizontal","Horizontal")),
         "from" => array("label" => "Start number", "type" => "number", "value" => ""),
         "speed" => array("label" => "Speed", "type" => "number", "value" => ""),
         "interval" => array("label" => "Refresh interval", "type" => "number", "value" => ""),
         "title" => array("label" => "Title", "type" => "text", "value" => ""),
         "subtitle" => array("label" => "Subitle", "type" => "text", "value" => ""),
         "separator" => array("label" => "Separator", "type" => "text", "value" => ""),
         "text_size" => array("label" => "Numbers size", "type" => "select", "value" => $hc_arr_sizes),
         "text_size_2" => array("label" => "Label size", "type" => "select", "value" => $hc_arr_sizes),
         "icon_size" => array("label" => "Icon size", "type" => "select", "value" => $hc_arr_sizes),
      ),
     "hc_countdown" => array(
         "style" => array("label" => "Style", "type" => "select", "value" => array("countdown-vertical","Vertical","countdown-horizontal","Horizontal")),
         "offset" => array("label" => "UTC offset", "type" => "text", "value" => "[hidden]"),
         "days" => array("label" => "Show days", "type" => "checkbox", "value" => "checked"),
         "hours" => array("label" => "Show hours", "type" => "checkbox", "value" => "checked"),
         "minutes" => array("label" => "Show minutes", "type" => "checkbox", "value" => "checked"),
         "seconds" => array("label" => "Show seconds", "type" => "checkbox", "value" => "checked"),
         "days_text" => array("label" => "Days text", "type" => "text", "value" => ":"),
         "hours_text" => array("label" => "Days text", "type" => "text", "value" => ":"),
         "minutes_text" => array("label" => "Days text", "type" => "text", "value" => ":"),
         "seconds_text" => array("label" => "Days text", "type" => "text", "value" => ":"),
         "title" => array("label" => "Title", "type" => "text", "value" => "[hidden]"),
         "subtitle" => array("label" => "Subtitle", "type" => "text", "value" => "[hidden]"),
         "number_size" => array("label" => "Number size", "type" => "select", "value" => $hc_arr_sizes),
         "text_size" => array("label" => "Text size", "type" => "select", "value" => $hc_arr_sizes),
      ),
      "hc_progress_bar" => array(
         "unit" => array("label" => "Unit", "type" => "text", "value" => "%"),
         "trigger" => array("label" => "Trigger", "type" => "select", "value" => array("","Auto","manual","Manual"))
      ),
     "hc_circle_progress_bar" => array(
         "size" => array("label" => "Size", "type" => "number", "value" => "[hidden]"),
         "size_md" => array("label" => "Size tablets", "type" => "number", "value" => "[hidden]"),
         "size_sm" => array("label" => "Size smartphones", "type" => "number", "value" => "[hidden]"),
         "hide_percentage" => array("label" => "Hide percentage", "type" => "checkbox", "value" => ""),
         "unit" => array("label" => "Unit", "type" => "text", "value" => "[hidden]"),
         "color" => array("label" => "Color", "type" => "text", "value" => "[hidden]"),
         "subtitle" => array("label" => "Subtitle", "type" => "text", "value" => "[hidden]"),
         "trigger" => array("label" => "Trigger", "type" => "select", "value" => array("","Auto","manual","Manual"))
      ),
      "hc_google_map" => array(
         "map_height" => array("label" => "Map height", "type" => "number", "value" => ""),
         "map_coordinates" => array("label" => "Map coordinates", "type" => "text", "value" => "40.741895,-73.989308"),
         "map_address" => array("label" => "Map address", "type" => "text", "value" => "[hidden]"),
         "map_zoom" => array("label" => "Map zoom", "type" => "text", "value" => "[hidden]"),
         "marker_image" => array("label" => "Marker image", "type" => "image", "value" => "[hidden]"),
         "marker_position" => array("label" => "Marker position", "type" => "select", "value" => array("","Center","col-md-6-left","Left","col-md-6-right","Right","center-top","Center top","center-bottom","Center bottom")),
         "marker_position_top" => array("label" => "Marker top offset", "type" => "text", "value" => "[hidden]"),
         "marker_position_left" => array("label" => "Marker left offset", "type" => "text", "value" => "[hidden]"),
         "map_skin" => array("label" => "Map skin", "type" => "select", "value" => array("","Default","gray","Gray","black","Black","green","Green")),
         "trigger" => array("label" => "Trigger", "type" => "select", "value" => array("","Auto","manual","Manual")),
      ),
     "hc_social_feeds" => array(
         "container_type" => array("label" => "Type", "type" => "select", "value" => array("","None","scroll_box","Scroll box","slider","Slider")),
         "trigger" => array("label" => "Trigger", "type" => "select", "value" => array("","Auto","manual","Manual")),
         "access_token" => array("label" => "Access token", "type" => "text", "value" => "[hidden]")
      ),
      "hc_social_share_buttons" => array(
         "style" => array("label" => "Style", "type" => "select", "value" => array("","Base","icon-links-grid","Grid","icon-links-button","Button","icon-links-popup","Popup")),
         "size" => array("label" => "Size", "type" => "select", "value" => array("","Default","icon-lg","Large"), "front" => true),
         "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment, "front" => true),
         "type" => array("label" => "Type", "type" => "select", "value" => array("","Share","link","Link"), "front" => true),
         "social_colors" => array("label" => "Social colors", "type" => "checkbox", "value" => ""),
         "fb" => array("label" => "Facebook", "type" => "checkbox", "value" => "checked"),
         "fb_link" => array("label" => "Facebook link", "type" => "text", "value" => ""),
         "tw" => array("label" => "Twitter", "type" => "checkbox", "value" => "checked"),
         "tw_link" => array("label" => "Twitter link", "type" => "text", "value" => ""),
         "pi" => array("label" => "Pinterest", "type" => "checkbox", "value" => ""),
         "pi_link" => array("label" => "Pinterest link", "type" => "text", "value" => ""),
         "li" => array("label" => "LinkedIn", "type" => "checkbox", "value" => ""),
         "li_link" => array("label" => "LinkedIn link", "type" => "text", "value" => "")
      ),
      "hc_quote" => array(
         "style" => array("label" => "Style", "type" => "select", "value" => array("","Single quote","quote-double","Double quote")),
         "author" => array("label" => "Author", "type" => "text", "value" => "Author")
      ),
      "hc_inner_menu" => array(
         "type" => array("label" => "Type", "type" => "select", "value" => array("horizontal","Horizontal","vertical","Vertical")),
         "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment, "front" => true),
         "active_item" => array("label" => "Active item", "type" => "number", "value" => "", "front" => true),
      ),
      "hc_contact_form" => array(
         "recipient_email" => array("label" => "Recipient's email", "type" => "text", "value" => ""),
         "subject" => array("label" => "Subject", "type" => "text", "value" => ""),
         "label" => array("label" => "Label", "type" => "checkbox", "value" => ""),
         "placeholder" => array("label" => "Placeholder", "type" => "checkbox", "value" => ""),
         "checkbox" => array("label" => "Checkbox message", "type" => "text", "value" => ""),
         "button_position" => array("label" => "Alignment", "type" => "select", "value" => array("left","Left","center","Center","right","Right","inline","Inline"), "front" => true),
         "success_message" => array("label" => "Success message", "type" => "text", "value" => "Congratulations. Your message has been sent successfully."),
         "error_message" => array("label" => "Error message", "type" => "text", "value" => "Error, please retry. Your message has not been sent.")
      ),
      "hc_video" => array(
         "width" => array("label" => "Width", "type" => "number", "value" => ""),
         "height" => array("label" => "Height", "type" => "number", "value" => ""),
         "autoplay" => array("label" => "Autoplay", "type" => "checkbox", "value" => ""),
         "loop" => array("label" => "Loop", "type" => "checkbox", "value" => ""),
         "controls" => array("label" => "Controls", "type" => "checkbox", "value" => "checked"),
         "muted" => array("label" => "Muted", "type" => "checkbox", "value" => ""),
      ),
      "hc_table" => array(
         "style" => array("label" => "Style", "type" => "select", "value" => array("table-border","Border","table-full-border","Full border","","No border")),
         "full_mobile" => array("label" => "Mobile full width", "type" => "checkbox", "value" => "")
      ),
      "hc_grid_table" => array(
         "style" => array("label" => "Style", "type" => "select", "value" => array("table-border","Border","table-full-border","Full border","","No border")),
         "responsive" => array("label" => "Responsive", "type" => "select", "value" => array("","None","table-6-md","Table 6 md","table-full-sm","Table full sm","table-6-md table-full-sm","Table 6 md full sm")),
         "full_mobile" => array("label" => "Mobile full width", "type" => "checkbox", "value" => ""),
      ),
      "hc_scroll_box" => array(
         "height" => array("label" => "Height", "type" => "text", "value" => "100", "extra" => array("placeholder='Number, .class, #ID'")),
         "remove_height" => array("label" => "Offset height", "type" => "number", "value" => ""),
         "responsive" => array("label" => "Responsive", "type" => "select", "value" => array("","Always active","disable-md","Disable on tablets and smartphones","disable-sm","Disable on smartphones")),
      ),
      "hc_image_slider" => array(
         "lightbox" => array("label" => "Lightbox", "type" => "checkbox", "value" => ""),
         "lightbox_animation" => array("label" => "Lightbox animation", "type" => "select", "value" => $hc_arr_animations),
         "image_animation" => array("label" => "Images animation", "type" => "select", "value" => $hc_arr_image_animations),
         "thumb_size" => array("label" => "Images size", "type" => "select", "value" => $hc_arr_thumb_size),
         "image_size" => array("label" => "Lightbox image size", "type" => "select", "value" => $hc_arr_thumb_size),
         "png" => array("label" => "PNG optimized", "type" => "checkbox", "value" => ""),
         "custom_classes" => array("label" => "CSS classes", "type" => "text", "value" => ""),
         "trigger" => array("label" => "Trigger", "type" => "select", "value" => array("","Auto","manual","Manual")),
      ),
       "hc_slider" => array(
         "trigger" => array("label" => "Trigger", "type" => "select", "value" => array("","Auto","manual","Manual"))
      ),
       "hc_steps" => array(
         "direction" => array("label" => "Direction", "type" => "select", "value" => array("","Horitzontal","box-steps-vertical","Vertical")),
         "columns" => array("label" => "Columns", "type" => "select", "value" => array("", "Default", "1","1","2","2","3","3","4","4","5","5","6","6"))
      ),
      "hc_tab" => array(
          "style" => array("label" => "Style", "type" => "select", "value" => array("","Horizontal","tab-inverse","Horizontal inverted","tab-vertical","Vertical","tab-vertical tab-inverse","Vertical inverted")),
         "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment),
         "tab_animation" => array("label" => "Animation", "type" => "select", "value" => $hc_arr_animations),
      ),
      "hc_collapse" => array(
         "button_text" => array("label" => "Button text", "type" => "text", "value" => ""),
         "button_open_text" => array("label" => "Open button text", "type" => "text", "value" => ""),
         "alignment" => array("label" => "Alignment", "type" => "select", "value" => $hc_arr_alignment),
         "height" => array("label" => "Height", "type" => "number", "value" => ""),
         "time" => array("label" => "Opening time", "type" => "number", "value" => ""),
      ),
      "hc_accordion" => array(
         "open_type" => array("label" => "Type", "type" => "select", "value" => array("","Default","multiple","Multiple")),
         "time" => array("label" => "Opening time", "type" => "number", "value" => ""),
         "open" => array("label" => "Open tab number", "type" => "number", "value" => "")
      ),
      "hc_fixed_area" => array(
        "top" => array("label" => "Offset top", "type" => "number", "value" => ""),
      ),
      "hc_image_grid_list" => array(
         "images_options" => array("label" => "Images options", "type" => "divider"),
         "thumb_size" => array("label" => "Images size", "type" => "select", "value" => $hc_arr_thumb_size),
         "lightbox_size" => array("label" => "Lightbox images size", "type" => "select", "value" => $hc_arr_thumb_size),
         "lightbox_animation" => array("label" => "Lightbox animation", "type" => "select", "value" => $hc_arr_animations),
         "hover_animation" => array("label" => "Image animation", "type" => "select", "value" => $hc_arr_image_animations),
         "icon_animation" => array("label" => "Icon animation", "type" => "select", "value" => $hc_arr_animations),
         "hide_icon" => array("label" => "Hidden icon", "type" => "checkbox", "value" => "checked"),
         "css" => array("label" => "CSS classes", "type" => "text", "value" => "")
      ),
      "hc_grid_list" => array(
         "grid_options" => array("label" => "Grid options", "type" => "divider"),
         "column" => array("label" => "Columns", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6"), "extra" => array("data-layout='column'")),
         "column_lg" => array("label" => "Columns desktop", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_md" => array("label" => "Columns notebook", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_sm" => array("label" => "Columns tablet", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_xs" => array("label" => "Columns phone", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "margins" => array("label" => "Margins", "type" => "number", "value" => ""),
         "pagination_options" => array("label" => "Pagination options", "type" => "divider"),
         "pag_type" => array("label" => "Pagination type", "type" => "select", "value" => array("","None","pagination","Pagination","load_more","Load more")),
         "pag_items" => array("label" => "Items per page", "type" => "number", "value" => ""),
         "pag_animation" => array("label" => "Animation", "type" => "select", "value" => $hc_arr_animations),
         "pag_size" => array("label" => "Size", "type" => "select", "value" => array("","Default","pagination-lg","Large")),
         "pag_position" => array("label" => "Position", "type" => "select", "value" => $hc_arr_alignment),
         "lm_lazy" => array("label" => "Lazy load", "type" => "checkbox", "value" => ""),
         "lm_button_text" => array("label" => "Load more text", "type" => "text", "value" => ""),
      ),
      "hc_image_masonry_list" => array(
         "images_options" => array("label" => "Images options", "type" => "divider"),
         "thumb_size" => array("label" => "Images size", "type" => "select", "value" => $hc_arr_thumb_size),
         "lightbox_size" => array("label" => "Lightbox images size", "type" => "select", "value" => $hc_arr_thumb_size),
         "lightbox_animation" => array("label" => "Lightbox animation", "type" => "select", "value" => $hc_arr_animations),
         "hover_animation" => array("label" => "Image animation", "type" => "select", "value" => $hc_arr_image_animations),
         "icon_animation" => array("label" => "Icon animation", "type" => "select", "value" => $hc_arr_animations),
         "hide_icon" => array("label" => "Hidden icon", "type" => "checkbox", "value" => "checked"),
         "css" => array("label" => "CSS classes", "type" => "text", "value" => "")
       ),
       "hc_masonry_list" => array(
         "masonry_options" => array("label" => "Masonry options", "type" => "divider"),
         "menu" => array("label" => "Show menu", "type" => "checkbox", "value" => "checked"),
         "menu_alignment" => array("label" => "Menu position", "type" => "select", "value" =>  array("","Left","nav-right","Right","nav-center","Center")),
         "all_text" => array("label" => "All button text", "type" => "text", "value" => "All"),
         "menu_btn_all" => array("label" => "Show all button", "type" => "checkbox", "value" => "checked"),
         "menu_btn_order" => array("label" => "Show order button", "type" => "checkbox", "value" => "checked"),
         "auto_masonry" => array("label" => "Auto masonry", "type" => "checkbox", "value" => ""),
         "column" => array("label" => "Columns", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6"), "extra" => array("data-layout='column'")),
         "column_lg" => array("label" => "Columns desktop", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_md" => array("label" => "Columns notebook", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_sm" => array("label" => "Columns tablet", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_xs" => array("label" => "Columns phone", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "margins" => array("label" => "Margins", "type" => "number", "value" => ""),
         "pagination_options" => array("label" => "Pagination options", "type" => "divider"),
         "pag_type" => array("label" => "Pagination type", "type" => "select", "value" => array("","None","pagination","Pagination","load_more","Load more")),
         "pag_items" => array("label" => "Items per page", "type" => "number", "value" => ""),
         "pag_animation" => array("label" => "Animation", "type" => "select", "value" => $hc_arr_animations),
         "pag_size" => array("label" => "Size", "type" => "select", "value" => array("","Default","pagination-lg","Large")),
         "pag_position" => array("label" => "Position", "type" => "select", "value" => $hc_arr_alignment),
         "lm_lazy" => array("label" => "Lazy load", "type" => "checkbox", "value" => ""),
         "lm_button_text" => array("label" => "Load more text", "type" => "text", "value" => ""),
       ),
       "hc_album" => array(
         "image_animation" => array("label" => "Image animation", "type" => "select", "value" => $hc_arr_image_animations),
         "album_animation" => array("label" => "Album animation", "type" => "select", "value" => $hc_arr_animations),
         "column" => array("label" => "Columns", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6"), "extra" => array("data-layout='column'")),
         "column_md" => array("label" => "Columns tablet", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_sm" => array("label" => "Columns phone", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
       ),
       "hc_space" => array(
         "size" => array("label" => "Height", "type" => "select", "value" =>  array("space-lg","Space lg","space-md","Space md","space","Space","space-sm","Space sm","space-xs","Space xs")),
         "height" => array("label" => "Custom height", "type" => "number", "value" => "")
      ),
       "hc_pt_grid_list" => array(
         "list_options" => array("label" => "List options", "type" => "divider"),
         "post_type_slug" => array("label" => "Post Type", "type" => "select", "value" => hc_arr_post_types()),
         "post_type_category" => array("label" => "Category", "type" => "select", "value" => hc_arr_categories()),
         "column" => array("label" => "Columns", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6"), "extra" => array("data-layout='column'")),
         "column_lg" => array("label" => "Columns desktop", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_md" => array("label" => "Columns notebook", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_sm" => array("label" => "Columns tablet", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "column_xs" => array("label" => "Columns phone", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6")),
         "margins" => array("label" => "Margins", "type" => "number", "value" => ""),
         "pag_type" => array("label" => "Pagination type", "type" => "select", "value" => array("","None","pagination_wp","Pagination","pagination","HTML Pagination","load_more","HTML Load more")),
         "pag_items" => array("label" => "Items per page", "type" => "number", "value" => ""),
         "pag_size" => array("label" => "Navigation size", "type" => "select", "value" => array("","Default","pagination-lg","Large")),
         "pagination_options" => array("label" => "Pagination options", "type" => "divider"),
         "pag_animation" => array("label" => "Animation", "type" => "select", "value" => $hc_arr_animations),
         "pag_scroll_top" => array("label" => "Scroll top", "type" => "checkbox", "value" => ""),
         "pag_position" => array("label" => "Position", "type" => "select", "value" => $hc_arr_alignment),
         "pag_button_prev" => array("label" => "Prev text", "type" => "text", "value" => ""),
         "pag_button_next" => array("label" => "Next text", "type" => "text", "value" => ""),
         "loadmore_options" => array("label" => "Load more options", "type" => "divider"),
         "lm_lazy" => array("label" => "Lazy load", "type" => "checkbox", "value" => ""),
         "lm_button_text" => array("label" => "Button text", "type" => "text", "value" => ""),
         "box_options" => array("label" => "Box options", "type" => "divider"),
         "box" => array("label" => "Box type", "type" => "select", "value" => array("side_content","Side image","top_icon_image","Top image","blog_side","Blog side","blog_top","Blog top","image_half_content","Half","image_full_content","Full","image_down_text","Down","image_classic_box","Reveal")),
         "boxed" => array("label" => "Boxed", "type" => "checkbox", "value" => ""),
         "extra" => array("label" => "Show extra", "type" => "checkbox", "value" => ""),
         "content" => array("label" => "Content", "type" => "select", "value" => array("","All","subtitle","Subtitle","description","Excerpt","extra","Extra 1")),
         "title_length" => array("label" => "Title length", "type" => "number", "value" => ""),
         "excerpt_length" => array("label" => "Excerpt length", "type" => "number", "value" => ""),
         "title_size" => array("label" => "Title size", "type" => "select", "value" => $hc_arr_sizes),
         "custom_css" => array("label" => "Custom CSS", "type" => "text", "value" => "")
       ),
       "hc_pt_masonry_list" => array(
         "maso_options" => array("label" => "Masonry options", "type" => "divider"),
         "menu" => array("label" => "Show menu", "type" => "checkbox", "value" => "checked"),
         "menu_position" => array("label" => "Menu position", "type" => "select", "value" => array("","Left","nav-center","Center","nav-right","Right","nav-center nav-menu-outer","Outer right")),
         "menu_style" => array("label" => "Menu style", "type" => "select", "value" => array("","Default","menu-rounded","Rounded","menu-minimal","Minimal")),
         "menu_btn_all" => array("label" => "Show all button", "type" => "checkbox", "value" => "checked"),
         "menu_btn_order" => array("label" => "Show order button", "type" => "checkbox", "value" => "checked"),
         "auto_masonry" => array("label" => "Auto masonry", "type" => "checkbox", "value" => "")
       ),
       "hc_pt_slider" => array(
         "list_options" => array("label" => "Slider options", "type" => "divider"),
         "post_type_slug" => array("label" => "Post Type", "type" => "select", "value" => hc_arr_post_types()),
         "post_type_category" => array("label" => "Category", "type" => "select", "value" => hc_arr_categories()),
         "num_items" => array("label" => "Items number", "type" => "number", "value" => ""),
         "trigger" => array("label" => "Trigger", "type" => "select", "value" => array("","Auto","manual","Manual")),
         "box_options" => array("label" => "Box options", "type" => "divider"),
         "box" => array("label" => "Box type", "type" => "select", "value" => array("side_content","Side image","top_icon_image","Top image","blog_side","Blog side","blog_top","Blog top","image_half_content","Half","image_full_content","Full","image_down_text","Down","image_classic_box","Reveal")),
         "boxed" => array("label" => "Boxed", "type" => "checkbox", "value" => ""),
         "extra" => array("label" => "Show extra", "type" => "checkbox", "value" => ""),
         "content" => array("label" => "Content", "type" => "select", "value" => array("","All","subtitle","Subtitle","description","Excerpt","extra","Extra 1")),
         "title_length" => array("label" => "Title length", "type" => "number", "value" => ""),
         "excerpt_length" => array("label" => "Excerpt length", "type" => "number", "value" => ""),
         "title_size" => array("label" => "Title size", "type" => "select", "value" => $hc_arr_sizes),
         "custom_css" => array("label" => "Custom CSS", "type" => "text", "value" => "")
        ),
        "hc_pt_menu" => array(
          "post_type_slug" => array("label" => "Post Type", "type" => "select", "value" => hc_arr_post_types()),
          "type" => array("label" => "Type", "type" => "select", "value" => array("horizontal","Horizontal","vertical","Vertical")),
          "style" => array("label" => "Style", "type" => "select", "value" => array("","Classic","menu-rounded","Rounded","menu-minimal","Minimal")),
          "alignment" => array("label" => "Alignment", "type" => "select", "value" => array("","Left","nav-right","Right","nav-center","Center")),
          "all_button_text" => array("label" => "All button text", "type" => "text", "value" => "", "extra" => array("placeholder='All'"))
        ),
        "hc_pt_tag_cloud" => array(
          "post_type_slug" => array("label" => "Post Type", "type" => "select", "value" => array("","Posts")),
          "orderby" => array("label" => "Order by", "type" => "select", "value" => array("","Default","count","Count","name","Name")),
          "order" => array("label" => "Order", "type" => "select", "value" => array("","Asc","desc","Desc")),
          "items" => array("label" => "Items", "type" => "number", "value" => "")
        ),
        "hc_pt_navigation" => array(
          "post_type_slug" => array("label" => "Post Type", "type" => "select", "value" => hc_arr_post_types()),
          "archive_link" => array("label" => "Archive link", "type" => "text", "value" => ""),
          "previous_text" => array("label" => "Previous text", "type" => "text", "value" => "Previous"),
          "next_text" => array("label" => "Next text", "type" => "text", "value" => "Next")
        ),
        "hc_pt_post_informations" => array(
          "post_type_slug" => array("label" => "Post Type", "type" => "select", "value" => array("","Current post")),
          "position" => array("label" => "Position", "type" => "select", "value" => array("align-left","Left","align-right","Right","align-center","Center")),
          "date" => array("label" => "Date", "type" => "checkbox", "value" => "checked"),
          "categories" => array("label" => "Categories", "type" => "checkbox", "value" => "checked"),
          "author" => array("label" => "Author", "type" => "checkbox", "value" => ""),
        )
);

$HC_FRONT_COMPONENTS_SETTINGS =  array(
     "hc_title_tag" => array(
        "tag" => array("label" => "Tag type", "type" => "select", "value" => array("h1","H1","h2","H2","h3","H3","h4","H4","h5","H5","h6","H6")),
        "text" => array("label" => "Title text", "type" => "text", "value" => "Insert your title here")
     ),
     "hc_subtitle" => array(
        "title" => array("label" => "Title text", "type" => "text", "value" => "Insert your title here"),
        "subtitle" => array("label" => "Subtitle text", "type" => "text", "value" => "Insert your subtitle here")
     ),
     "hc_text_block" => array(
        "content" => array("label" => "Text", "type" => "textarea", "value" => "")
     ),
     "hc_wp_editor" => array(
        "editor_content" => array("label" => "HTML", "type" => "textarea", "value" => "")
     ),
     "hc_button" => array(
       "icon" => array("label" => "Icon", "type" => "icon", "value" => "")
     ),
     "hc_image" => array(
        "image" => array("label" => "Image", "type" => "image", "value" => "")
     ),
     "hc_image_box" => array(
        "image" => array("label" => "Image", "type" => "image", "value" => ""),
        "icon" => array("label" => "Icon", "type" => "icon", "value" => "")
     ),
     "hc_icon_list" => array(
        "rows" => array("label" => "Items", "type" => "repeater", "value" => "<li data-hc-repeater-item='true'><i class='fa-li hc-icon-add' data-hc-setting='icon'></i><p data-hc-setting='text'>Nulla porttitor accumsan tincidunt</p></li>")
     ),
     "hc_icon_box" => array(
        "icon" => array("label" => "Icon", "type" => "icon", "value" => ""),
        "title" => array("label" => "Title", "type" => "text", "value" => "Title here"),
        "subtitle" => array("label" => "Subtitle text", "type" => "text", "value" => "Subtitle here"),
     ),
     "hc_code_block" => array(
        "content" => array("label" => "Content", "type" => "base64", "value" => ""),
        "language" => array("label" => "Language", "type" => "select", "value" => array("","Generic","js","Javascript","css","CSS")),
     ),
     "hc_media_box" => array(
        "image" => array("label" => "Image", "type" => "image", "value" => ""),
        "title" => array("label" => "Title", "type" => "text", "value" => "Insert your title here")
     ),
     "hc_content_box" => array(
        "image" => array("label" => "Image", "type" => "image", "value" => ""),
        "title" => array("label" => "Title", "type" => "text", "value" => "Insert your title here"),
        "text" => array("label" => "Text", "type" => "textarea", "value" => ""),
        "icon" => array("label" => "Icon", "type" => "icon", "value" => "")
      ),
      "hc_niche_content_box_blog" => array(
        "title" => array("label" => "Title", "type" => "text", "value" => ""),
        "subtitle" => array("label" => "Subtitle", "type" => "text", "value" => ""),
        "text" => array("label" => "Text", "type" => "textarea", "value" => "")
      ),
      "hc_niche_content_box_testimonials" => array(
         "title" => array("label" => "Title", "type" => "text", "value" => "Name"),
         "subtitle" => array("label" => "Subtitle", "type" => "text", "value" => "Company"),
         "text" => array("label" => "Text", "type" => "textarea", "value" => ""),
         "image" => array("label" => "Image", "type" => "image", "value" => "")
      ),
      "hc_niche_content_box_team" => array(
         "title" => array("label" => "Title", "type" => "text", "value" => "Name"),
         "subtitle" => array("label" => "Subtitle", "type" => "text", "value" => "Subtitle"),
         "text" => array("label" => "Text", "type" => "textarea", "value" => ""),
         "image" => array("label" => "Image", "type" => "image", "value" => "")
      ),
      "hc_niche_content_box_pricing_table" => array(
         "title" => array("label" => "Title", "type" => "text", "value" => ""),
         "rows" => array("label" => "Items", "type" => "repeater", "value" => "<li data-hc-repeater-item='true' data-hc-setting='text' data-hc-default='Feature descriptiont'>Feature description</div>")
      ),
      "hc_niche_content_box_call" => array(
         "content" => array("label" => "Content", "type" => "text", "value" => ""),
         "icon" => array("label" => "Icon", "type" => "icon", "value" => "")
      ),
      "hc_text_list" => array(
         "rows" => array("label" => "Items", "type" => "repeater", "value" => "<li data-hc-repeater-item='true'><h3 data-hc-setting='title'>Text list base</h3><p data-hc-setting='subtitle'>Nulla porttitor accumsan tincidunt</p><div data-hc-setting='extra'>123</div></li>","extra" => array("<li data-hc-repeater-item='true'><img src='http://placehold.it/90x90' data-hc-setting='image_link'><div class='content'><h3 data-hc-setting='title'>Text list base</h3><p data-hc-setting='subtitle'>Nulla porttitor accumsan tincidunt</p><div data-hc-setting='extra'>123</div></div></li>", "<li data-hc-repeater-item='true'><b data-hc-setting='title'>Title</b><p><label data-hc-setting='subtitle'>subtitle</label> <span data-hc-setting='extra'>Extra</span></p></li>"))
      ),
      "hc_icon_links" => array(
         "rows" => array("label" => "Items", "type" => "repeater", "value" => "<a target='_blank' href='javascript:void(0)' data-hc-repeater-item='true' data-hc-setting='link'><i class='hc-icon-add' data-hc-setting='icon'></i></a>")
      ),
      "hc_counter" => array(
         "count_to" => array("label" => "Count", "type" => "number", "value" => ""),
         "icon" => array("label" => "Icon", "type" => "icon", "value" => ""),
      ),
      "hc_countdown" => array(
         "date" => array("label" => "Date time", "type" => "text", "value" => "10/10/2100 10:10:10")
      ),
      "hc_progress_bar" => array(
         "title" => array("label" => "Title", "type" => "text", "value" => "Progress"),
         "progress" => array("label" => "Progress value", "type" => "number", "value" => "50"),
      ),
      "hc_circle_progress_bar" => array(
         "title" => array("label" => "Title", "type" => "text", "value" => "[hidden]"),
         "progress" => array("label" => "Progress value", "type" => "number", "value" => "50")
      ),
      "hc_timeline" => array(
         "rows" => array("label" => "Items", "type" => "repeater", "value" => "<div data-hc-repeater-item='true'><div class='badge'><p data-hc-setting='date'>1234</p><span data-hc-setting='date_subtitle'>12 January 1234</span></div><div class='panel'><h3 class='timeline-title' data-hc-setting='title'>Mussum ipsum cacilds</h3><p data-hc-setting='content'>Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.</p></div></div>")
      ),
      "hc_social_feeds" => array(
         "page_id" => array("label" => "ID", "type" => "text", "value" => "156149777783739"),
         "type" => array("label" => "Source", "type" => "select", "value" => array("fb","Facebook","tw","Twitter")),
      ),
      "hc_quote" => array(
         "text" => array("label" => "Text", "type" => "textarea", "value" => "")
      ),
      "hc_table" => array(
         "columns" => array("label" => "Columns", "type" => "select", "value" => array("1","1","2","2","3","3","4","4","5","5","6","6","7","7","8","8")),
         "rows" => array("label" => "Rows", "type" => "repeater", "value" => "<tr data-hc-repeater-item='true'></tr>")
      ),
      "hc_inner_menu" => array(
         "rows" => array("label" => "Items", "type" => "repeater", "value" => "<li data-hc-repeater-item='true'><a href='javascript:void(0);'><i class='hc-icon-add' data-hc-setting='icon'></i><span class='menu-text' data-hc-setting='text'>Menu text</span></a></li>")
      ),
      "hc_video" => array(
         "link" => array("label" => "Link", "type" => "link", "value" => "")
      ),
      "hc_breadcrumbs" => array(
         "position" => array("label" => "Position", "type" => "select", "value" => $hc_arr_alignment)
      ),
       "hc_grid_table" => array(
         "rows" => array("label" => "Rows", "type" => "text", "value" => "1"),
         "cols" => array("label" => "Columns", "type" => "text", "value" => "1")
      ),
      "hc_slider" => array(
         "content" => array("label" => "Items", "type" => "repeater", "value" => "<li class='glide__slide'></li>")
      ),
      "hc_image_slider" => array(
         "slides" => array("label" => "Images", "type" => "repeater", "value" => "<li class='glide__slide' data-hc-repeater-item='true'><a class='img-box' href='#'><img src='' data-hc-setting='link' /></a></li>")
      ),
       "hc_tab" => array(
         "content_" => array("label" => "Tabs", "type" => "repeater", "value" => '<div class="panel"> <div class="clear"></div></div>')
      ),
      "hc_accordion" => array(
         "content_" => array("label" => "Items", "type" => "repeater", "value" => '<div class="list-group-item"><div class="panel"><div class="inner"></div></div></div>')
      ),
      "hc_image_grid_list" => array(
        "icon" => array("label" => "Icon", "type" => "icon", "value" => ""),
        "images" => array("label" => "Images", "type" => "repeater", "value" => "<div data-hc-repeater-item='true' class='grid-item' data-hc-setting='images'><a class='img-box' href='' data-trigger='hover' data-hc-setting='link'><img src=''></a></div>")
      ),
       "hc_grid_list" => array(
         "content" => array("label" => "Items", "type" => "repeater", "value" => '<div class="grid-item"><div class="hc-add-component hc-add-container"><i class="hc-icon-add"></i></div></div>')
      ),
      "hc_image_masonry_list" => array(
        "icon" => array("label" => "Icon", "type" => "icon", "value" => ""),
        "images" => array("label" => "Images", "type" => "repeater", "value" => "<div data-hc-repeater-item='true' data-menu='' data-sort='' class='maso-item' data-hc-setting='images' style='visibility: visible'><a class='img-box' href='' style='opacity: 1;'><img data-hc-setting='link' src=''></a></div>")
      ),
      "hc_masonry_list" => array(
         "content_" => array("label" => "Items", "type" => "repeater", "value" => '<div class="maso-item" data-hc-setting="content"></div>')
      ),
      "hc_album" => array(
        "menu_items" => array("label" => "Album items", "type" => "repeater", "value" => "<div data-hc-repeater-item='true' class='album-box'><div class='img-box scale adv-img adv-img-half-content' data-trigger='hover' data-anima='scale-up'><a class='img-box anima'><img data-hc-setting='album_image' src=''></a><div class='caption'><h2 class='album-name' data-hc-setting='album_name'>Album title</h2></div></div></div>")
      ),
      "hc_steps" => array(
        "name_1" => array("label" => "Name - 1", "type" => "text", "value" => ""),
        "number_1" => array("label" => "Number - 1", "type" => "text", "value" => ""),
        "name_2" => array("label" => "Name - 2", "type" => "text", "value" => ""),
        "number_2" => array("label" => "Number - 2", "type" => "text", "value" => ""),
        "name_3" => array("label" => "Name - 3", "type" => "text", "value" => ""),
        "number_3" => array("label" => "Number - 3", "type" => "text", "value" => ""),
        "name_4" => array("label" => "Name - 4", "type" => "text", "value" => ""),
        "number_4" => array("label" => "Number - 4", "type" => "text", "value" => ""),
        "name_5" => array("label" => "Name - 5", "type" => "text", "value" => ""),
        "number_5" => array("label" => "Number - 5", "type" => "text", "value" => ""),
        "name_6" => array("label" => "Name - 6", "type" => "text", "value" => ""),
        "number_6" => array("label" => "Number - 6", "type" => "text", "value" => ""),
        "content_" => array("label" => "Items content", "type" => "repeater", "value" => '<div class="step-item" data-hc-setting="item"><span class="step-number"></span><h3></h3><div class="step-content"></div></div>')
      )
);

$hc_arr_options_button = array(
    "button_text" => array("label" => "Button text", "type" => "text", "value" => "", "front" => true),
    "button_style" => array("label" => "Button style", "type" => "select", "value" => array("circle","Circle","square","Square","circle-border","Circle border","square-border","Square border","link","Link","hidden","Hidden"), "front" => true),
    "button_dimensions" => array("label" => "Button size", "type" => "select", "value" => array("btn-lg","Large","btn-sm","Medium","btn-xs","Small"), "front" => true),
    "button_animation" => array("label" => "Animated button", "type" => "checkbox", "value" => "", "front" => true),
    "button_icon" => array("label" => "Button icon", "type" => "icon", "value" => "", "front" => true)
);
$hc_arr_options_button_front = array(
    "link" => array("label" => "Link", "type" => "link", "value" =>  ""),
    "link_type" => array("label" => "Link type", "type" => "select", "value" => array("classic","Link","lightbox","Media lightbox","custom","Custom lightbox")),
    "lightbox_animation" => array("label" => "Lightbox animation", "type" => "select", "value" => $hc_arr_animations),
    "new_window" => array("label" => "New window?", "type" => "checkbox", "value" => "")
);

$HC_COMPONENTS_SETTINGS["hc_content_box"] = $HC_COMPONENTS_SETTINGS["hc_content_box"] + $hc_arr_options_button;
$HC_COMPONENTS_SETTINGS["hc_contact_form"] = $HC_COMPONENTS_SETTINGS["hc_contact_form"] + $hc_arr_options_button;
$HC_COMPONENTS_SETTINGS["hc_image_grid_list"] = $HC_COMPONENTS_SETTINGS["hc_image_grid_list"] + $HC_COMPONENTS_SETTINGS["hc_grid_list"];
$HC_COMPONENTS_SETTINGS["hc_image_masonry_list"] = $HC_COMPONENTS_SETTINGS["hc_image_masonry_list"] + $HC_COMPONENTS_SETTINGS["hc_masonry_list"];
$HC_COMPONENTS_SETTINGS["hc_pt_grid_list"] = $HC_COMPONENTS_SETTINGS["hc_pt_grid_list"] + $hc_arr_options_button;
$HC_COMPONENTS_SETTINGS["hc_pt_masonry_list"] = $HC_COMPONENTS_SETTINGS["hc_pt_grid_list"] + $hc_arr_options_button + $HC_COMPONENTS_SETTINGS["hc_pt_masonry_list"];
$HC_COMPONENTS_SETTINGS["hc_pt_slider"] = $HC_COMPONENTS_SETTINGS["hc_pt_slider"] + $hc_arr_options_button;

$HC_FRONT_COMPONENTS_SETTINGS["hc_media_box"] = $hc_arr_options_button_front + $HC_FRONT_COMPONENTS_SETTINGS["hc_media_box"];
$HC_FRONT_COMPONENTS_SETTINGS["hc_content_box"] = $hc_arr_options_button_front + $HC_FRONT_COMPONENTS_SETTINGS["hc_content_box"];
$HC_FRONT_COMPONENTS_SETTINGS["hc_image_box"] = $hc_arr_options_button_front + $HC_FRONT_COMPONENTS_SETTINGS["hc_image_box"];
$HC_FRONT_COMPONENTS_SETTINGS["hc_button"] = $HC_FRONT_COMPONENTS_SETTINGS["hc_button"] + $hc_arr_options_button_front;
$HC_FRONT_COMPONENTS_SETTINGS["hc_niche_content_box_team"] = $HC_FRONT_COMPONENTS_SETTINGS["hc_niche_content_box_team"];
$HC_FRONT_COMPONENTS_SETTINGS["hc_niche_content_box_call"] = $HC_FRONT_COMPONENTS_SETTINGS["hc_button"] + $hc_arr_options_button_front;


function hc_echo_arr_options() {
    global $HC_COMPONENTS_SETTINGS;
    global $HC_FRONT_COMPONENTS_SETTINGS;
    global $HC_PLUGINS_SETTINGS;
    echo "var HC_ARR_COMPONENTS_SETTINGS = " . json_encode($HC_COMPONENTS_SETTINGS) . ";";
    echo "var HC_ARR_COMPONENTS_SETTINGS_FRONT = " . json_encode($HC_FRONT_COMPONENTS_SETTINGS) . ";";
    echo "var HC_ARR_PLUGINS_SETTINGS = " . json_encode($HC_PLUGINS_SETTINGS) . ";";
}
function hc_echo_component_options($component_name) {
    global $HC_COMPONENTS_SETTINGS;
    global $HC_FRONT_COMPONENTS_SETTINGS;
    $html = '<ul class="list">';
    if (isset($HC_COMPONENTS_SETTINGS[$component_name])) {
        $arr = $HC_COMPONENTS_SETTINGS[$component_name];
        foreach ($arr as $key => $value){
            if (!HC_FRONT || $value["front"] == true) {
                $html .= hc_get_component_option($key, $value);
            }
        }
    }
    if (HC_FRONT && isset($HC_FRONT_COMPONENTS_SETTINGS[$component_name])) {
        $arr = $HC_FRONT_COMPONENTS_SETTINGS[$component_name];
        foreach ($arr as $key => $value) {
            $html .= hc_get_component_option($key, $value);
        }
    }
    $html .= '</ul>';
    echo $html;
}
function hc_echo_plugin_options($plugin_name) {
    global $HC_PLUGINS_SETTINGS;
    $html = '';
    if (isset($HC_PLUGINS_SETTINGS[$plugin_name])) {
        $html = '<ul class="list">';
        $arr = $HC_PLUGINS_SETTINGS[$plugin_name];
        foreach ($arr as $key => $value){
            $html .= hc_get_component_option($key, $value);
        }
        $html .= '</ul>';
    }
    echo $html;
}
function hc_get_component_option($key, $value, $type = "") {
    $html = '<li class="input-row input-' . $value["type"] . '"><p>' . __($value["label"],"hc") . '</p>';
    $extra = "";
    $setting_key = "data-hc-setting";
    if ($type == "plugin") {
        $setting_key = "data-option-id";
    }
    if (isset($value["extra"])) {
        for ($i = 0; $i < count($value["extra"]); $i++) {
            $extra .= " " . $value["extra"][$i];
        }
    }
    if (isset($value["value"]) && $value["value"] == "[hidden]") {
        $value["value"] = "";
    }
    switch ($value["type"]) {
        case "select":
            $options = $value["value"];
            $html .= '<select ' . $setting_key . '="' . $key . '" ' . $extra . '><option selected value="' . $options[0] . '">' . __($options[1],"hc") . '</option>';
            for ($i = 2; $i < count($options); $i+=2) {
                $html .= '<option value="' . $options[$i] . '">' . __($options[$i + 1],"hc") . '</option>';
            }
            $html .= '</select>';
            break;
        case "checkbox":
            $html .= '<input ' . $setting_key . '="' . $key . '" ' . $value["value"] . ' type="checkbox" ' . $extra . '>';
            break;
        case "icon":
        case "text":
            $html .= '<input ' . $setting_key . '="' . $key . '" value="' . $value["value"] . '" type="text" ' . $extra . '>';
            break;
        case "textarea":
            $html .= '<textarea ' . $setting_key . '="' . $key . '" ' . $extra . '>' . $value["value"] . '</textarea>';
            break;
        case "number":
            $html .= '<input ' . $setting_key . '="' . $key . '" value="' . $value["value"] . '" type="number" ' . $extra . '>';
            break;
        case "repeater":
            $html .= $value["value"];
            break;
        case "divider":
            $html = '<li class="divider">' . __($value["label"], "hc");
            break;
        case "image":
            $html = '<li class="upload-box upload-row input-row upload-mini"><p>' . __($value["label"], "hc") . '</p><span class="close-button"></span><div class="upload-container"><div data-hc-setting="' . $key . '" data-hc-component="upload" data-upload-link="" data-upload-height="" data-upload-width="" class="upload-btn"></div></div></li>';
            break;
    }
    return $html . '</li>';
}
function hc_arr_categories() {
    global $hc_all_post_types;
    $arr = array("","All");
    for ($i = 0; $i < count($hc_all_post_types); $i++) {
        if ($hc_all_post_types[$i][1] != "page" && $hc_all_post_types[$i][1] != "y-post-types" && $hc_all_post_types[$i][1] != "post" && $hc_all_post_types[$i][1] != "y-post-types-arc") {
            $catsArr = get_terms(array('taxonomy' => $hc_all_post_types[$i][1] . '-cat','hide_empty' => false));
            foreach ( $catsArr as $term ) {
                array_push($arr,$term->slug);
                array_push($arr,$term->name);
            }
        }
    }
    $catsArr = get_categories();
    foreach ( $catsArr as $term ) {
        if ($term->term_id > 1) {
            array_push($arr,$term->slug);
            array_push($arr,$term->name);
        }
    }
    return $arr;
}
function hc_arr_post_types() {
    global $hc_all_post_types;
    $arr = array("","--");
    for ($i = 0; $i < count($hc_all_post_types); $i++) {
        if ($hc_all_post_types[$i][1] != "page" && $hc_all_post_types[$i][1] != "y-post-types" && $hc_all_post_types[$i][1] != "y-post-types-arc") {
            array_push($arr,$hc_all_post_types[$i][1]);
            array_push($arr,$hc_all_post_types[$i][0]);
        }
    }
    return $arr;
}
?>
