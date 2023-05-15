<?php
include($_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/NewsModel.php");
$newsList = NewsModel::GetLastNumNews(5);
?>

<div hline=""
     style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">
</div>
<section id="news" class="vc_rows wpb_row vc_row-fluid section-pad no-pb section-bg-alt">
    <div class="container">
        <div class="row">
            <div data-animate="fadeInUp" data-delay="0"
                 class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-3 vc_col-lg-6 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                 style="visibility: visible;">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="section-head text-center">
                            <h2 style="margin-bottom: 45px" class="section-title" lng="eng">
                                NEWS <span>NEWS</span></h2>
                            <h2 style="margin-bottom: 45px" class="section-title" lng="rus">
                                НОВОСТИ<span>NEWS</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>
<section style="padding-bottom: 150px" class="vc_rows wpb_row vc_row-fluid section-bg-alt">
    <div class="container">
        <div class="row">
            <div data-animate="fadeInUp" data-delay="0.5"
                 class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-offset-2 vc_col-md-8 animated fadeInUp"
                 style="visibility: visible; animation-delay: 0.5s;">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="vc_tta-container" data-vc-action="collapse">
                            <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-grey vc_tta-style-classic vc_tta-shape-rounded vc_tta-spacing-1  ot-tabs vc_tta-tabs-position-top vc_tta-controls-align-left">
                                <div class="vc_tta-panels-container">
                                    <div class="vc_tta-panels">
                                        <div class="vc_tta-panel vc_active" id="1520927186706-24e6240e-867e"
                                             data-vc-content=".vc_tta-panel-body">

                                            <div class="vc_tta-panel-body">
                                                <div class="accordion text-subtitle" id="accordion-965">

                                                    <?php
                                                    $index = 0;
                                                    foreach ($newsList as $news) {
                                                        $index++;
                                                        ?>
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="text-subtitle">
                                                                    <a lng="eng" class="collapsed"
                                                                       data-toggle="collapse"
                                                                       data-target="#collapse-83<?= $index ?>">
                                                                        <?= $news['title'] ?>
                                                                        <span class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span></a>
                                                                    <a lng="rus" class="collapsed  faq-rus"
                                                                       data-toggle="collapse"
                                                                       data-target="#collapse-83<?= $index ?>"><?= $news['title'] ?>
                                                                        <span class="plus-minus"><span
                                                                                    class="ti ti-angle-up"></span></span></a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse-83<?= $index ?>" class="collapse "
                                                                 data-parent="#accordion-965">
                                                                <div class="card-body _text">
                                                                    <p lng="eng"
                                                                       class="_text _gray"><?= $news['text'] ?></p>
                                                                    <p lng="rus"
                                                                       class="_text _gray"><?= $news['text'] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                                <style>
                                                    .accordion a {
                                                        /*border: 2px solid red;*/
                                                        margin-left: -20px;
                                                    }
                                                </style>
                                                <style>
                                                    ._gray {
                                                        color: #a2b4d2;
                                                        font-size: 1.0em;
                                                    }
                                                </style>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>






<div hline=""
     style="background-image: linear-gradient(to right,#2b56f5 0%,#46bdf4 100%); width: 1080px; height: 3px; display: block; margin: auto; margin-top: 150px; border-radius: 50%; margin-bottom: 30px">
</div>
