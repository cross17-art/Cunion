
    <style>:root {
            --retina-src: ''
        }


        #bs {
            overflow: hidden
        }

        #bs .bs-helper {
            height: 100%;
            left: 0;
            top: 0;
            width: 100%;
            z-index: -1
        }

        .background {
            background: 50% 50% no-repeat;
            background-size: cover
        }

        .background-stretch {
            background-size: 100% 100%
        }

        .background-crop {
            background: no-repeat 50% 50%;
            background-size: cover
        }

        .background-mask {
            background-repeat: no-repeat;
            background-size: auto auto
        }

        .background-aspect {
            background: no-repeat 50% 50%;
            background-size: contain
        }

        .background-tile {
            background-repeat: repeat
        }

        .slide {
            height: 100%;
            left: 0;
            overflow: hidden;
            position: absolute;
            top: 0;
            transition: none;
            width: 100%;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-perspective-origin: center;
            perspective-origin: center
        }

        .slide > .slide-hover {
            display: none;
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%
        }

        .slide > .eff-helper {
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden
        }

        .slide.buildin > .slide-hover, .slide.buildout > .slide-hover {
            display: block
        }

        .element {
            position: absolute;
            perspective-origin: center;
            -webkit-perspective-origin: center
        }

        .element > .eff-helper {
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0)
        }

        @media all and (-ms-high-contrast: none) {
            .element {
                transform-style: preserve-3d;
                -webkit-transform-style: preserve-3d
            }

            .element > .eff-helper {
                backface-visibility: visible;
                -webkit-backface-visibility: visible;
                transform: none;
                -webkit-transform: none
            }
        }

        @supports (-ms-ime-align:auto) {
            .element {
                -webkit-transform-style: flat;
                transform-style: flat
            }
        }

        .element .text {
            line-height: 1.4;
            margin: 0;
            white-space: pre-line;
            word-break: normal;
            word-wrap: break-word
        }

        .element .shape {
            height: 100%;
            width: 100%
        }

        .element .shape.circle {
            border-radius: 50%
        }

        .element .embed {
            height: 100%;
            overflow: hidden;
            width: 100%
        }

        .element .svg, .element .svg img {
            width: 100%;
            height: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center
        }

        .element .menu {
            -webkit-align-content: center;
            align-content: center;
            -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
            overflow: hidden;
            white-space: nowrap;
            display: flex
        }

        .element .menu label {
            cursor: pointer;
            display: inline-block;
            flex: 1 1 auto;
            text-align: center;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .element .menu label span {
            display: inline-block;
            position: relative;
            white-space: nowrap
        }

        .element .menu.ie9 {
            display: table;
            table-layout: auto
        }

        .element .menu.ie9 label {
            display: table-cell;
            padding: 0 5px
        }

        .bs-btn {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            overflow: hidden;
            border-radius: .01px
        }

        .bs-btn label {
            cursor: pointer;
            float: left;
            margin: 0;
            position: relative;
            text-align: center;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            white-space: nowrap
        }

        .bs-btn.no-hand-cursor label, .bs-btn.no-hand-cursor div {
            cursor: default
        }

        .bs-image {
            height: 100%;
            width: 100%
        }

        .bs-clipart, .bs-clipart-blur {
            height: 100%;
            position: relative;
            width: 100%
        }

        .bs-clipart svg {
            position: absolute
        }

        .image-stretch {
            background-size: 100% 100%
        }

        .image-crop {
            background: no-repeat 50% 50%;
            background-size: cover
        }

        .image-mask {
            background-repeat: no-repeat;
            background-size: auto auto
        }

        .image-aspect {
            background: no-repeat 50% 50%;
            background-size: contain
        }

        .image-tile {
            background-repeat: repeat
        }

        .eff-helper {
            width: 100%;
            height: 100%
        }

        .action-container {
            width: 100%;
            height: 100%;
            display: block;
            text-decoration: none
        }

        .bs-video {
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center;
            object-position: center;
            outline: 0
        }

        .hide-media-controls::-webkit-media-controls {
            display: none
        }

        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .retina {
                background-image: var(--retina-src) !important
            }
        }</style>
    <script src="front_js/5da5a34bf20c0f9fc4dfec044e33a448.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.bsOpenURL = function (url, target) {
            if (url && url.length > 0) {
                window.open(url, target);
            }
        }

    </script>
    <script type="text/javascript">

        window.mediaPlayTimeout = [];
        window.goToURLWithoutBSURL = null;
        window.bannerURL = "https://cunion.io/panel/cabinet/cabinet.php";
        window.bannerConfig = {
            "startSlide": 0,
            "noAnimation": false,
            "preview": false,
            "printScreen": false,
            "showOnlyOneSlide": false,
            "video": false,
            "download": true,
            "showWatermark": false,
            "env": "live",
            "fontLocalPath": "fonts/",
            "imgLocalPath": "media/"
        };
        window.bannerJson = {
            "banner": {
                "properties": {
                    "width": 250,
                    "height": 100,
                    "loop": false,
                    "loopCount": 1,
                    "bannerUrl": "https:\/\/cunion.io\/panel\/cabinet\/cabinet.php",
                    "urlTarget": "_blank",
                    "useHandCursor": true,
                    "backgroundColor": {
                        "borderColor": "#3d3d3d",
                        "scolor": "#000000",
                        "type": "none",
                        "gradColors": [{"c": "#5b2b7f", "p": "0"}, {"c": "#2d1440", "p": "100"}],
                        "rgradPos": null,
                        "backgroundRotation": "270",
                        "contentScale": 10,
                        "scaleMode": "aspect",
                        "useBorder": false,
                        "horizontalAlign": "center",
                        "verticalAlign": "middle",
                        "contentOffsetX": 50,
                        "contentOffsetY": 50,
                        "originalWidth": 1500,
                        "originalHeight": 977,
                        "url": "ec29936603314c7cbc46119f99498828",
                        "hqUrl": null
                    },
                    "useAsClickTag": false,
                    "retina": false
                }, "elements": [{
                    "properties": {
                        "duration": 4,
                        "id": 1,
                        "bannersetElementId": 1,
                        "stopSlide": false,
                        "guidelines": {"v": [], "h": []}
                    },
                    "type": "slide",
                    "elements": [{
                        "type": "layer",
                        "layerType": "svg",
                        "properties": {
                            "id": 49,
                            "bannersetElementId": null,
                            "elementCategory": "shapes",
                            "opacity": 30,
                            "rotation": 0,
                            "x": 27,
                            "y": 7,
                            "width": 203.98357664233578,
                            "height": 86.60948905109488,
                            "buildIn": {
                                "type": "alpha",
                                "crosstype": "hide",
                                "direction": "b2t",
                                "duration": 4,
                                "wordsDuration": 0.5,
                                "wordsAppearOrder": "l2r",
                                "delay": 0,
                                "tween": "Quad",
                                "ease": "easeOut",
                                "slidePosX": 50,
                                "slidePosY": 0,
                                "alphaOffset": 0,
                                "slideOffset": 50,
                                "blurAmount": 0,
                                "zoom": 1,
                                "preset": "fade"
                            },
                            "actions": [],
                            "locked": false,
                            "lockedProperties": [],
                            "visible": true,
                            "group": null,
                            "url": null,
                            "colorGroups": {"0": "#006bdf"},
                            "originalWidth": 400,
                            "originalHeight": 385,
                            "resourceKey": "3",
                            "lineData": null
                        }
                    }, {
                        "type": "layer",
                        "layerType": "svg",
                        "properties": {
                            "id": 42,
                            "bannersetElementId": null,
                            "elementCategory": null,
                            "opacity": 100,
                            "rotation": 0,
                            "x": 6,
                            "y": 16,
                            "width": 408.9748920758284,
                            "height": 114,
                            "buildIn": {
                                "type": "slide",
                                "crosstype": "hide",
                                "direction": "l2r",
                                "duration": 4,
                                "wordsDuration": 0.5,
                                "wordsAppearOrder": "l2r",
                                "delay": 0,
                                "tween": "Quart",
                                "ease": "easeOut",
                                "slidePosX": 50,
                                "slidePosY": 0,
                                "alphaOffset": 0,
                                "slideOffset": 50,
                                "blurAmount": 0,
                                "zoom": 1,
                                "preset": "slideRight"
                            },
                            "actions": [],
                            "locked": false,
                            "lockedProperties": [],
                            "visible": true,
                            "group": null,
                            "initialFontSize": 10.13721681857642,
                            "textDirection": "ltr",
                            "scale": 0.4787172713686616,
                            "url": "",
                            "scaleMode": "crop",
                            "colorGroups": [],
                            "localUrl": "7f1dc3acc94cc97ade9b66c7784e207b.svg"
                        }
                    }, {
                        "type": "layer",
                        "layerType": "text",
                        "properties": {
                            "id": 43,
                            "bannersetElementId": null,
                            "elementCategory": null,
                            "opacity": 100,
                            "rotation": 0,
                            "x": 52,
                            "y": 57,
                            "width": 312.5255952858568,
                            "height": 29,
                            "buildIn": {
                                "type": "slide",
                                "crosstype": "hide",
                                "direction": "r2l",
                                "duration": 4,
                                "wordsDuration": 0.5,
                                "wordsAppearOrder": "l2r",
                                "delay": 0,
                                "tween": "Quart",
                                "ease": "easeOut",
                                "slidePosX": 50,
                                "slidePosY": 0,
                                "alphaOffset": 0,
                                "slideOffset": 50,
                                "blurAmount": 0,
                                "zoom": 1,
                                "preset": "slideLeft"
                            },
                            "actions": [],
                            "locked": false,
                            "lockedProperties": [],
                            "visible": true,
                            "group": null,
                            "text": "copy trading unification",
                            "alignment": "center",
                            "fontSize": 20.667771914947075,
                            "lineHeight": 1.4,
                            "letterSpacing": 3,
                            "config": [{
                                "offset": 0,
                                "length": 24,
                                "nodeType": "div",
                                "style": {
                                    "fontStyle": "normal",
                                    "color": "#ffffff",
                                    "fontWeight": 400,
                                    "fontFamily": "Work Sans",
                                    "textDecoration": "none",
                                    "textTransform": "none",
                                    "fontType": "google"
                                },
                                "children": [{"offset": 0, "length": 24, "nodeType": "span", "style": null}]
                            }],
                            "initialFontSize": 10.667771914947075,
                            "textDirection": "ltr",
                            "scale": 0.1047362687293264
                        }
                    }]
                }], "resources": {
                    "3": {
                        "content": "<svg id=\"Layer_1\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\" viewBox=\"0 0 400 385\" width=\"10%\" height=\"10%\" preserveAspectRatio=\"none\"><title>Shapes<\/title><path d=\"M371.21374,178.23768c-22.9726-26.46193-42.98388-51.40083-60.63941-73.40424-28.72525-35.7988-51.4138-64.07517-73.21216-82.42958C213.467,2.2819,192.82159-3.914,170.421,2.32433c-13.66032,3.802-25.15836,6.58227-36.185,8.74956-11.80705,2.3197-26.64252,7.49172-38.64367,18.86859a67.672,67.672,0,0,0-6.71057,4.71533A69.11286,69.11286,0,0,0,76.0146,43.14218,66.76515,66.76515,0,0,0,59.80289,55.33081a66.54655,66.54655,0,0,0-5.68612,4.26312A65.47666,65.47666,0,0,0,32.02632,78.14318C13.68449,92.64649-.11045,119.48358,8.78749,169.06605c7.01357,39.08379,1.01656,71.16437-3.8023,96.94183C-3.96475,313.887-9.87732,345.51871,70.71577,372.11127,96.50487,380.61964,127.30405,385,158.77423,385a331.59036,331.59036,0,0,0,55.44759-4.61484c46.36835-7.916,82.94332-24.98189,102.21854-47.39843a112.07412,112.07412,0,0,0,17.71354-13.63126c.63031-.46,1.25748-.92174,1.87082-1.389q4.80515-2.895,9.10545-6.01a122.098,122.098,0,0,0,19.41843-13.648c10.714-7.26,19.24306-15.439,25.17842-24.33037C412.93783,239.20763,392.47083,202.72213,371.21374,178.23768ZM24.63637,156.67309c-3.84144-21.40659-5.4779-53.13042,11.11425-75.69993.90773-.69842,1.85355-1.374,2.823-2.035-8.30369,15.85437-12.032,38.3915-6.28288,70.42909,7.01356,39.08379,1.01655,71.16436-3.80174,96.94182-8.95,47.87912-14.86308,79.50972,65.73057,106.1034,25.7891,8.50837,56.58717,12.88873,88.0579,12.88873a331.71385,331.71385,0,0,0,55.4476-4.61485q11.06909-1.89009,21.35466-4.46689A272.7252,272.7252,0,0,1,224.79,364.2896c-48.16675,8.22252-100.9874,5.19212-141.29681-8.10863-76.793-25.33864-71.4754-53.78809-62.66469-100.92021C25.71555,229.11594,31.79756,196.5798,24.63637,156.67309ZM363.3961,287.2654a69.70141,69.70141,0,0,1-5.91572,7.59947c20.5-33.96871.55028-69.236-20.16973-93.10189-22.97316-26.46192-42.98444-51.40082-60.64-73.40423-28.72526-35.7988-51.4138-64.074-73.21216-82.42958C181.11659,27.117,161.615,20.48334,140.86107,24.7967c2.681-.709,5.42009-1.44876,8.271-2.2421a55.8141,55.8141,0,0,1,15.04872-2.12374c37.58125,0,70.153,40.59006,120.2986,103.08527,17.68181,22.03578,37.72273,47.01153,60.754,73.53934C374.222,230.44579,380.50253,261.6398,363.3961,287.2654ZM36.79982,148.56111c-3.77434-21.032-5.416-52.02333,10.26544-74.50742.06877-.03294.13427-.06811.20325-.10105-6.98931,15.60035-9.75947,37.079-4.45211,66.655C49.83,179.69147,43.83295,211.772,39.01466,237.5495c-8.94995,47.87912-14.86308,79.50971,65.73057,106.10339,25.7891,8.50837,56.58717,12.88873,88.0579,12.88873a331.71279,331.71279,0,0,0,55.4476-4.61484A269.69566,269.69566,0,0,0,288.891,341.8457a250.88627,250.88627,0,0,1-51.93816,14.33192c-48.16786,8.22252-100.98851,5.19211-141.29624-8.10864C18.863,322.73034,24.18121,294.2809,32.99193,247.14766,37.879,221.004,43.961,188.46782,36.79982,148.56111ZM352.01213,294.9676c-.58118.87038-1.19556,1.73238-1.82937,2.5888,14.88859-32.05266-3.90938-64.58657-23.39777-87.03381-22.97316-26.46193-42.98444-51.40083-60.64-73.40424-28.72526-35.7988-51.4138-64.074-73.21216-82.42958-23.89466-20.11972-44.5417-26.31565-66.9406-20.07841-13.36061,3.71878-24.6554,6.45609-35.477,8.605q.57463-.87763,1.1829-1.73908a93.12327,93.12327,0,0,1,9.51931-2.3906c11.15528-2.19186,22.76291-4.99783,36.53059-8.82883a55.81376,55.81376,0,0,1,15.04872-2.12374c37.58126,0,70.153,40.59006,120.29861,103.08526,17.68181,22.03579,37.72273,47.01154,60.754,73.53934C362.83806,238.148,369.11856,269.342,352.01213,294.9676ZM47.32548,139.8015c-3.45534-19.25437-5.127-46.858,6.64682-68.63809,1.00237-.36177,2.03109-.70624,3.07749-1.03786-5.78027,15.22964-7.73013,35.58106-2.84942,62.77993,7.01356,39.08379,1.01656,71.16437-3.80174,96.94182-8.94994,47.87913-14.86308,79.51083,65.73058,106.1034,25.78909,8.50837,56.58716,12.88873,88.0579,12.88873a331.71478,331.71478,0,0,0,55.44759-4.61484q9.30837-1.58946,18.06875-3.66407a277.44383,277.44383,0,0,1-30.22493,6.8575c-48.16842,8.2214-100.98851,5.191-141.29624-8.10864C29.38869,313.97074,34.70687,285.5213,43.51759,238.38806,48.40466,212.24436,54.48666,179.70822,47.32548,139.8015Zm291.70165,167.338c-.71726.3199-1.44781.632-2.1766.94519,17.02179-32.82645-2.2507-66.43731-22.229-89.449-22.9726-26.46192-42.98388-51.40082-60.64-73.40423-28.7247-35.7988-51.41325-64.07517-73.21161-82.43069-23.89577-20.12085-44.54058-26.31342-66.94116-20.07842-9.90135,2.75629-18.66,4.96992-26.93447,6.80782.16216-.32549.32956-.6493.49745-.972,1.08135-.25123,2.17682-.49241,3.3-.71294,11.15528-2.19185,22.76291-4.99783,36.53059-8.82883a55.81415,55.81415,0,0,1,15.04872-2.12374c37.58126,0,70.153,40.59006,120.29861,103.08527,17.68181,22.03578,37.72273,47.01153,60.754,73.53933,28.98862,33.39033,35.26912,64.58434,18.16269,90.20994C340.71783,304.8784,339.88747,306.01341,339.02713,307.13948ZM70.39649,124.578c-2.91841-16.26305-4.56591-38.48195,2.08616-58.11708q1.8577-.39276,3.742-.80785c-2.96943,13.61116-3.26257,30.48944.49479,51.42818,7.01356,39.08379,1.01655,71.16437-3.80174,96.94183-8.94994,47.87912-14.86308,79.51083,65.73057,106.10339,25.7891,8.50837,56.58773,12.88873,88.05847,12.88873a331.58379,331.58379,0,0,0,55.447-4.61484,279.66516,279.66516,0,0,0,31.82056-7.29688,261.8544,261.8544,0,0,1-43.42484,11.091c-48.16787,8.22141-100.98852,5.191-141.29625-8.10863C52.4597,298.74724,57.77789,270.29779,66.5886,223.16567,71.47567,197.022,77.55767,164.48471,70.39649,124.578Zm8.13245-68.61967c.15474-.03071.31208-.0642.467-.09435q-.8267,2.3331-1.53406,4.82252c-1.0153.23058-2.0313.46171-3.03178.68112q1.09739-2.57094,2.4167-5.05422C77.40565,56.19393,77.95922,56.07,78.52894,55.95833Zm36.53-8.82995c44.41925-12.36728,78.6433,30.294,135.34788,100.96264,17.68182,22.03579,37.72217,47.01154,60.75348,73.53934,28.63873,32.98724,35.098,63.82618,18.75617,89.2748-.27608.10608-.54972.21383-.82728.31934,10.11454-30.06011-7.54148-59.96223-25.808-81.002-22.97315-26.46193-42.985-51.40195-60.64108-73.40535-28.72414-35.79768-51.41268-64.07406-73.211-82.42847-23.89466-20.12084-44.53947-26.31676-66.9406-20.07953-7.02412,1.95514-13.471,3.63616-19.58213,5.1067q.759-2.37748,1.676-4.70417C93.91287,52.72135,103.751,50.27492,115.059,47.12838Zm-33.8304,69.1467c-2.61045-14.54686-4.19924-33.85762.25386-51.82345,6.90383-1.619,14.19439-3.49882,22.23618-5.73645C148.13227,46.35012,182.36079,89.0081,239.06538,159.6767c17.68181,22.03578,37.72328,47.01265,60.75459,73.54045,25.26733,29.10377,33.27586,56.53768,23.58964,80.0708a263.529,263.529,0,0,1-42.02743,10.60364c-48.16619,8.22253-100.988,5.19212-141.29681-8.10863C63.29178,290.44432,68.61,261.99487,77.42068,214.86275,82.30775,188.71905,88.38975,156.18179,81.22857,116.27508Zm.03893-66.06827c-.08681.19205-.16971.38912-.25526.58341-.329.06755-.65519.13232-.98314.19875q.17068-.25458.34409-.508C80.66752,50.38713,80.96961,50.29837,81.2675,50.20681ZM68.75192,62.56292c-.81679.16637-1.63694.3361-2.44794.49577-.27154.053-.54742.1111-.8221.16748q1.30057-2.38167,2.82523-4.66229,1.2035-.38271,2.44542-.73862Q69.69017,60.10811,68.75192,62.56292Zm-1.701,5.01123c-4.42422,14.61106-5.53213,33.46514-1.16354,57.81C72.901,164.468,66.904,196.54854,62.08567,222.326c-8.94994,47.87913-14.86308,79.51083,65.73057,106.1034,25.7891,8.50837,56.58717,12.88873,88.05791,12.88873a331.71478,331.71478,0,0,0,55.44759-4.61484q6.6095-1.12887,12.94054-2.50729-12.09247,3.23167-25.39978,5.51983c-48.16843,8.22252-100.98908,5.19212-141.29625-8.10863C40.77266,306.26855,46.09085,277.8191,54.90156,230.687c4.88707-26.1437,10.96907-58.681,3.80789-98.58767-3.19407-17.79891-4.86527-42.73279,4.19993-63.60453C64.25962,68.16594,65.634,67.855,67.051,67.57415Zm-5.88853-6.35783q-.92838,1.68325-1.78456,3.472-.84661.23364-1.70468.48907,1.30792-1.86582,2.77617-3.65068Q60.80394,61.37013,61.16242,61.21632Zm39.71174-26.72655a90.98044,90.98044,0,0,1,11.72729-3.10522c6.52857-1.283,13.22579-2.78476,20.4043-4.57018C121.096,30.06307,110.77985,32.52737,100.87416,34.48977Zm274.209,245.25432a70.98554,70.98554,0,0,1-7.28022,9.10965c22.218-34.48569,1.95574-70.5307-19.1083-94.793-22.97316-26.46193-42.98444-51.40083-60.64-73.40423C259.3294,84.85776,236.64085,56.5825,214.84249,38.227,193.60169,20.34153,174.9266,13.46952,155.303,16.54291c1.80378-.48627,3.63615-.9865,5.51606-1.50962a55.814,55.814,0,0,1,15.04871-2.12374c37.58126,0,70.153,40.59006,120.29861,103.08527,17.68181,22.03578,37.72273,47.01153,60.754,73.53934C385.90851,222.92448,392.189,254.11849,375.08314,279.74409ZM114.51518,26.33145a92.81529,92.81529,0,0,1,9.77331-2.46821c3.50748-.68949,7.071-1.44821,10.72039-2.27113C127.75019,23.44564,121.02418,24.99992,114.51518,26.33145Zm98.93444,349.54494c-48.16731,8.22364-100.98852,5.19323-141.2968-8.10863C-4.64022,342.42912.67741,313.97968,9.48812,266.84643c4.88708-26.1437,10.96964-58.67984,3.80845-98.58655-3.73415-20.8081-5.3871-51.36677,9.76388-73.78834-5.84681,15.25366-7.83791,35.67486-2.93316,63.00772,7.01357,39.08379,1.01712,71.16437-3.80174,96.94182C7.37561,302.30021,1.463,333.93191,82.05613,360.52448c25.78909,8.50837,56.58716,12.88873,88.0579,12.88873a331.71641,331.71641,0,0,0,55.44815-4.61484c25.11587-4.28824,47.34953-11.26522,65.52648-20.31848C271.46831,360.98842,244.78385,370.5274,213.44962,375.87639Zm172.4656-104.4341q-1.50481,2.25438-3.248,4.44345c16.92743-32.79352-2.32835-66.35915-22.2856-89.34626-22.97316-26.46193-42.98444-51.40083-60.64-73.40423-28.72525-35.7988-51.4138-64.07406-73.21216-82.42958C202.636,10.58706,181.99174,4.39448,159.58893,10.62725c-13.648,3.79862-25.14606,6.57892-36.185,8.74955-1.52162.29869-3.09587.64818-4.70563,1.049a86.70673,86.70673,0,0,1,16.4223-4.86552c11.14577-2.18962,22.75341-4.9956,36.5306-8.82995a55.814,55.814,0,0,1,15.04871-2.12374c37.58126,0,70.15355,40.59118,120.29973,103.08639,17.68125,22.03578,37.72217,47.01153,60.75292,73.53933C396.74059,214.62268,403.02109,245.81669,385.91522,271.44229Z\" fill=\"#1a1a1a\" data-color-group=\"0\"\/><\/svg>",
                        "usages": 1
                    }
                }
            }, "hash": "bti0b808c", "userId": 43344338
        };
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", ()=>{
            document.querySelector("#bs").style.transform = "scale(1)";
        })

    </script>