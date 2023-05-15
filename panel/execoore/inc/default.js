'use strict';

/*
* ===========================================================
* DEFAULT SCRIPTS
* ===========================================================
* This file is loaded only if Hybrid Composer plugin is not active.
* 
* Schiocco - Copyright (c) Federico Schiocchet - Themekit
*/

(function ($) {
    var menu_open = false;
    $(document).ready(function () {
        $("body").on("click", ".menu-btn", function () {
            if (menu_open) {
                $("body > nav").removeClass("active");
                menu_open = false;
            } else {
                $("body > nav").addClass("active");
                menu_open = true;
            }
        });     

        $("body").on("click", "li.dropdown", function () {
            $(this).toggleClass("active");
        }); 

    });
}(jQuery));

