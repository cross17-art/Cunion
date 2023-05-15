<?php

/*
=============================================================================
CUSTOM SETTINGS FOR THE THEME OPTIONS PANEL
=============================================================================

Add new settings to the theme options panel here.
Every array item is a new setting.

Available values for "type" setting: checkbox,select,text,textarea,color,image_upload
Available values for "label" setting: main,layout,menu,footer,lists,titles,customizations,social

$HC_CUSTOM_PANEL
name : Theme's name
version : Theme's version
colors : Theme's panel colors

Documentation: wordpress.framework-y.com/advanced-api-documentation/#custom-theme

 */

global $HC_CUSTOM_PANEL;

$HC_CUSTOM_PANEL = array(
	'name'    => 'Execoore',
	'version' => '1.0',
    'colors'  => array("#00bdc7","#004965"),
    'demos' => array(array('id' => 'execoore','name' => 'Main')),
    'demos_url' => 'http://themes.framework-y.com/demo-import/'
);


$HC_CUSTOM_FONT = "Montserrat:500,600,700,800";
$HC_SITE_FONTS = 'body, textarea, button, .input-text, .input-select, .input-textarea {
    font-family: [FONT-1] !important;
}';


$HC_SITE_COLORS = 'body > nav, footer, .progress-bar > div, .progress-bar > div span, .shop-menu-cnt .shop-menu, i.scroll-top-btn, .tab-nav li a:before, .tab-nav li a:after, .btn:not(.btn-border):hover,
section .cnt-box.boxed.light .caption, .img-box-caption span, .cnt-box-badge .badge, .cnt-box-blog-side .blog-date, .menu-fixed.scroll-menu, .cnt-box-blog-top .blog-date,
.dropdown ul:not(.icon-list) li:hover > a, .lan-menu > li:hover > a, .glide__bullets > button:hover, .glide__bullets > button.glide__bullet--active,
main > section.section-base.section-color.light, .section-color.light .input-text, .section-color.light .input-select, .section-color.light .input-textarea, .counter i,
.cnt-box-side-icon.boxed.light > i, .cnt-box-top-icon.boxed.light > i, .media-box-half, .album-box .caption, .album-box .img-box, .icon-box i, .media-box-reveal .extra-field,
.list-nav a.list-archive:hover, .header-base h2, .list-tags a, .img-box:before, .menu-mini, .menu-side, .btn-video:empty:hover, .tweets_txt, .tagcloud a, main #sb-main .sb-header, body .sb-chat,
body .woocommerce ul.products li.product .onsale, .woocommerce main span.onsale, .woocommerce main div.product form.cart .button:hover, .woocommerce main #respond input#submit:hover, .woocommerce main a.button:hover,
.woocommerce main button.button:hover, .woocommerce main input.button:hover, main .woocommerce a.button:hover, main .woocommerce button.button:hover, main .woocommerce input.button:hover,
.woocommerce main #payment #place_order, .woocommerce-page main #payment #place_order, .widget .woocommerce-product-search [type="submit"] {
    background-color: [MAIN-COLOR];
}

.boxed-area.light, .media-box-full .caption, #sb-main .sb-chat-btn, #sb-main .sb-chat-header, #sb-main .sb-card.sb-card-right .sb-files a, #sb-main .sb-header, #sb-main .sb-chat .sb-card.sb-card-right,
#sb-main .sb-card-contacts .sb-btn-email, .sb-chat .sb-card.sb-card-right.sb-card-no-msg .sb-files a, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button {
    background-color: [MAIN-COLOR] !important;
}

h1, h2, h3, h4, h5, h6, .cnt-call .caption .btn-text, .section-color .icon-box i, .counter .value span, .breadcrumb li a, .step-item > span, .cnt-pricing-table .price span, .cnt-pricing-table .top-area p,
.album-title span, .text-list-bold li > b:first-child, .text-list-line li b, .list-nav a, .menu-inner-image li a span, .controls-bottom-right .glide__arrow, .icon-list-blog a, .quote, .table-time th,
.form-box p, .countdown-vertical [data-time] > div > span, .countdown-horizontal [data-time] > div > span:last-child, .media-box.media-box-down .caption h2, .menu-inner .menu-btn, .menu-inner > div > span,
.comment-list .reply a, main .sb-account .sb-input div, body .woocommerce ul.products li.product .price, .woocommerce .comment-reply-title, main .woocommerce form .form-row label, .menu-cnt > ul > li ul a,
.woocommerce-MyAccount-content form fieldset legend, .product-name a, .widget .woocommerce ul.product_list_widget li .star-rating span:before, .widget .woocommerce ul.product_list_widget li .star-rating:before,
.woocommerce main ul.products li.product .price {
    color: [MAIN-COLOR];
}

.light .dropdown ul li:not(:hover) > a, .text-color-1, .tparrows:before, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce table a.remove {
    color: [MAIN-COLOR] !important;
}

.btn:hover, .input-text:focus, .input-select:focus, .input-textarea:focus, .search-bar input[type=text]:focus, .glide__bullets > button, .accordion-list > li, .table-time td, .table-time th {
    border-color: [MAIN-COLOR];
}

.tab-nav li:not(.active):not(:hover) a, .btn.btn-border:hover, .btn.btn-border.active {
    color: [MAIN-COLOR];
    border-color: [MAIN-COLOR];
}

.tab-nav li.active a, .tab-nav li:hover a, .btn:not(.btn-border).active, .icon-links-button:not(.social-colors):not(.social-colors-hover) a:hover, main #sb-main .sb-card.sb-card-right, main #sb-main .sb-btn:hover,
body main #sb-main .sb-chat .sb-card.sb-card-right, main #sb-main .sb-btn, main .rich-buttons .rich-content > div, main .rich-quickreplies .rich-content > div:hover, main .rich-box.rich-closed .rich-content > div {
    background-color: [MAIN-COLOR];
    border-color: [MAIN-COLOR];
}

@media (max-width: 991.98px) {
    nav .menu-cnt > ul > li > a, nav .menu-cnt > ul > li.nav-label > a span, .menu-cnt .menu-right, body nav .lan-menu > li > a, .lan-menu li a, .lan-menu .dropdown > ul > li > a, body .lan-menu > li:hover > a,
    body nav:not(.menu-transparent) .lan-menu > li:hover > a {
        color: [MAIN-COLOR];
    }

    nav.light .menu-cnt a {
        color: [MAIN-COLOR] !important;
    }

    .search-box-menu {
        border-color: [MAIN-COLOR];
    }
}

.light .shop-menu .shop-cart .cart-item .cart-content, .btn-video:after, .menu-cnt > ul > li:hover > a, .icon-list li > i, .icon-links:not(.social-colors) a i, .btn.btn-border, .title p,
.accordion-list > li > a:before, nav:not(.menu-transparent) .menu-cnt > ul > li:hover > a, .cnt-box-info .cnt-info > div > span:last-child, .btn-text:after, .menu-cnt > ul > li.nav-label > a,
.cnt-box-top-icon > i, .cnt-box-side-icon > im.btn-border:hover, .icon-links a:hover i, .icon-links-popup:hover > i, .breadcrumb li:not(:last-child):hover a, .pagination li:not(.page):hover a,
.search-bar input[type=submit]:hover, .accordion-list > li:hover > a, .btn-text:hover, .menu-inner li:hover > a, .menu-inner li.active > a, .menu-inner .dropdown ul > li:hover > a,
.album-title > a:hover, .glide__arrow:hover, .mega-menu .icon-list li a:hover, nav.active .menu-btn, .menu-transparent .menu-cnt > ul > li:hover > a, .list-nav a:hover, .counter .value [data-to],
body > header h2, .breadcrumb li:last-child a, .cnt-box-side .extra-field, .cnt-box-team .caption, .timeline .badge span, .cnt-pricing-table .price, .cnt-pricing-table > ul > li:before, .media-box .extra-field,
.album-title > a:before, .accordion-list > li.active > a, .media-box.media-box-reveal .caption h3, .cnt-box-top .extra-field, .list-nav a:first-child:before, .list-nav a:last-child:before,
.cnt-box-testimonials-bubble .thumb-bar span:last-child, .cnt-box-side-icon > i, .countdown-vertical [data-time] > div > span:first-child, .countdown-horizontal [data-time] > div > span:first-child,
.social-feed a, body .woocommerce .star-rating::before, body .woocommerce .star-rating span::before, body .woocommerce ul.products li.product .button, .woocommerce main .star-rating, .comment-form-rating label,
.woocommerce p.stars a:before, .woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-MyAccount-navigation ul li.is-active a {
    color: [HOVER-COLOR];
}

footer.light a, .cnt-box.light .extra-field, nav.light .menu-cnt > ul > li:hover > a, .section-home-slider [data-to], .section-home-slider h2, .light .title p, body > header.light h2,
.boxed-area.light .text-list-bold li b, .text-color-2, .light .text-color-2, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-info:before, .woocommerce-message:before,
body .woocommerce ul.products li.product .button, .woocommerce form .form-row .required {
    color: [HOVER-COLOR] !important;
}

.cnt-box-blog-side .blog-date span:last-child, .progress-bar > div > div, footer .icon-list li:before, .shop-menu .cart-buttons a:hover, .cnt-box-blog-top .blog-date span:last-child, .btn-video:empty,
.dropdown ul:not(.icon-list) li:hover > a, .cnt-box-info .extra-field, .menu-cnt > ul > li:hover > a, .lan-menu > li:hover > a, .dropdown > ul:before, .shop-menu-cnt .cart-count, .light .icon-box i, .light .counter i,
.section-color.light .btn:not(.btn-border):hover, .breadcrumb li a:after, .menu-inner li:before, .text-list-base li > div, .text-list-image .content > div, .text-list-side li > div, .text-line:before,
.icon-line li:before, .icon-line span:before, .icon-circle li:before, .arrows-inner-right .glide__arrow, .light .breadcrumb li a:after, .list-tags a:hover, .media-box-full:before,
.woocommerce main div.product form.cart .button, .woocommerce main div.product .woocommerce-tabs ul.tabs li, .woocommerce main #respond input#submit, .woocommerce main a.button,
.woocommerce main button.button, .woocommerce main input.button, .woocommerce-MyAccount-navigation ul li:before, main .woocommerce #respond input#submit, main .woocommerce a.button,
main .woocommerce button.button, main .woocommerce input.button, nav .menu-badge:before, nav .menu-badge:after, .search-box-menu > input[type=submit] {
    background-color: [HOVER-COLOR];
}

.btn, .icon-links-grid a:hover, .icon-links-button a, .pagination li.page:hover a, .pagination li.page.active a, .list-nav a.list-archive, .light .btn:not(.btn-border):hover, main #sb-main .sb-btn {
    background-color: [HOVER-COLOR];
    border-color: [HOVER-COLOR];
}

.light .glide__bullets > button.glide__bullet--active, .section-home-slider .glide__arrow {
    background-color: [HOVER-COLOR] !important;
    border-color: [HOVER-COLOR] !important;
}

.shop-menu, .menu-cnt > ul li ul li:hover + li > a, nav .menu-right .custom-area, nav .menu-right .menu-custom-area, .input-text, .input-select, .input-textarea, .light .glide__bullets > button,
.light .text-list-line li hr, .media-box-half .extra-field + p, .album-box .caption, .cnt-box-top .extra-field, .icon-links-grid a, .cnt-box-testimonials-bubble > p, .sb-account .sb-input input,
body main .woocommerce ul.products li.product .button, .woocommerce main div.product .woocommerce-tabs ul.tabs li, main .woocommerce-info, main .woocommerce-message,
main .select2-container .select2-selection--single, .widget .woocommerce-product-search input.search-field {
    border-color: [HOVER-COLOR];
}

.woocommerce div.product .woocommerce-tabs ul.tabs:before, .woocommerce div.product .woocommerce-tabs ul.tabs li::after, .woocommerce div.product .woocommerce-tabs ul.tabs li::before,
.woocommerce div.product .woocommerce-tabs ul.tabs li::after, .woocommerce div.product .woocommerce-tabs ul.tabs li::before, .woocommerce main #review_form #respond textarea {
    border-color: [HOVER-COLOR] !important;
}

.woocommerce main div.product .woocommerce-tabs ul.tabs li:after {
    box-shadow: -2px 2px 0 [HOVER-COLOR];
}
body, p, a, .btn-text, .input-text, .input-select, .input-textarea, .cnt-box-blog-side .btn-text:not(:hover):after, .cnt-box-blog-top .btn-text:not(:hover):after, .icon-list span, .icon-list span a,
.social-links a i, a, .glide__arrow, .search-bar input[type=submit], .menu-cnt > ul > li a, .media-box.media-box-down .caption p {
    color: [COLOR-3];
}

';
?>
