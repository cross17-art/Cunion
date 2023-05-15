<?php

/**
 * @var array $serviceInvestments ;
 */

?>

<div class="row">

    <div class="col-md-3 col-sm-12 _trd_col-md-6 stat-block">
        <div class="card flex-fill">
            <div class="card-body py-4 statistics-card">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <div class="d-inline-block ms-3 trd_to_right">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-share-2 align-middle me-2">
                                    <circle cx="18" cy="5" r="3"></circle>
                                    <circle cx="6" cy="12" r="3"></circle>
                                    <circle cx="18" cy="19" r="3"></circle>
                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                </svg>
                            </div>
                        </div>
                        <h3 class="mb-2" id="total_trades">Copied Trades
                            <i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip" style="margin-bottom: 5px">
                                <span class="trd_tooltiptext">Количество скопированных операций за определенный период времени / всего </span>
                            </i>
                        </h3>
                        <div class="mb-2">
                            <div class="platform-characteristic-row">
                                <span class="text-muted" style="">Total Trades:</span>
                                <span total_trades class="badge badge-soft-success me-2 badge-statistics-primary" style=""> .. </span>
                            </div>
                            <div class="platform-characteristic-row">
                                <span class="text-muted" style="">For today:</span>
                                <span today_total_trades class="badge badge-soft-info me-2 badge-statistics-info 0 "> .. </span>
                            </div>
                            <div class="platform-characteristic-row">
                                <span class="text-muted">For last day:</span>
                                <span last_day_total_trades class="badge badge-soft-info me-2 badge-statistics-info"> .. </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-12 _trd_col-md-6 stat-block">
        <div class="card flex-fill">
            <div class="card-body py-4 statistics-card">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <div class="d-inline-block ms-3 trd_to_right">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-dollar-sign align-middle text-success">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="mb-2">Volume & Investments
                            <i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip" style="margin-bottom: 5px">
                                <span class="trd_tooltiptext">Общая сумма операций из расчета ордеров в долларовом эквиваленте</span>
                            </i>
                        </h3>
                        <div class="mb-2">
                            <div class="platform-characteristic-row">
                                <span class="text-muted" style="">Total trades volume:</span>
                                <span total_transaction_funds class="badge badge-soft-success me-2 badge-statistics-primary" style=""> ... </span>
                            </div>
                            <div class="platform-characteristic-row">
                                <span class="text-muted">Volume for last 30 days:</span>
                                <span funds_30_days class="badge badge-soft-info me-2 badge-statistics-info"> ... </span>
                            </div>
                            <div class="platform-characteristic-row">
                                <span class="text-muted">Total investments volume:</span>
                                <span total_investment_funds class="badge badge-soft-info me-2 badge-statistics-info"> $<?= number_format($serviceInvestments['total_users_funds'], 0) ?>  </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-12 _trd_col-md-6 stat-block">
        <div class="card flex-fill">
            <div class="card-body py-4 statistics-card">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <div class="d-inline-block ms-3 trd_to_right">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-clock align-middle me-2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                        </div>
                        <h3 class="mb-2">
                            Delay
                            <i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip" style="margin-bottom: 5px">
                                <span class="trd_tooltiptext">Время затраченное на копирование и дублирование позиции, среднее значение и последние три сделки</span>
                            </i>
                        </h3>
                        <div class="mb-2">
                            <div class="platform-characteristic-row">
                                <span class="text-mute">Average Delay:</span>
                                <span average_delay class="badge badge-soft-success me-2 badge-statistics-primary" style=""> .. </span>
                            </div>
                            <div class="platform-characteristic-row">
                                <span class="text-mute ">Last 3 copied trades:</span>
                                <br>
                                <div delay-1-row>
                                    <span delay class="badge badge-soft-info me-2 delay badge-statistics-info"> .. </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-12 _trd_col-md-6 stat-block">
        <div class="card flex-fill">
            <div class="card-body py-4 statistics-card">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <div class="d-inline-block ms-3 trd_to_right">
                            <div class="stat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-users align-middle me-2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="mb-2">
                            Users
                            <i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip" style="margin-bottom: 5px">
                                <span class="trd_tooltiptext">Количество пользователей платформы, подключенных и активных </span>
                            </i>
                        </h3>
                        <div class="mb-2">

                            <div class="platform-characteristic-row">
                                <span class="text-mute">Total Users: </span>
                                <span total_users class="badge badge-soft-success me-2 badge-statistics-primary" style=""> .. </span>
                            </div>
                            <div class="platform-characteristic-row">
                                <span class="text-muted">Traders:</span>
                                <span traders class="badge badge-soft-info me-2 badge-statistics-info 0"> .. <i class="align-middle me-2 fas fa-fw fa-user-check"></i></span>
                            </div>
                            <div class="platform-characteristic-row">
                                <span class="text-muted">Investors:</span>
                                <span investors class="badge badge-soft-info me-2 badge-statistics-info"> .. <i class="align-middle me-2 fas fa-fw fa-user-cog"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>

    .badge-statistics-primary{
        max-height: 23px;
        min-height: 23px;
        padding: 6px;
        font-size: 12px;
    }

    .badge-statistics-info{
        max-height: 23px;
        min-height: 23px;
        font-size: 12px;
        padding: 6px;
    }

    .mb-5px{
        margin-bottom: 5px;
    }

    badge-soft-orange{
        color: #cc8b37
        background-color: #cc8c382b;
    }

    badge-soft-blue{
        color: #1f9bcf
        background-color: #1f9bcf2b;
    }

    .stat-block {
        min-width: 375px;
    }

    .delay {
        min-width: 73px;
    }

    .badge-extra-padding {
     padding: 6px;
    }


    .statistics-card {
        height: 185px;
    }

    .platform-characteristic-row{
        margin-bottom: 7px;
    }

    @media screen and (min-width: 300px) and (max-width: 1200px) {

        .stat {
            display: none;
        }

        .hide-on-medium {
            display: none !important;
        }
    }


    /* on wide*/
    @media screen and (min-width: 1440px) {

        .stat {
            display: "";
        }

        .hide-on-wide {
            display: none !important;
        }
    }


    @media screen and (min-width: 300px) and (max-width: 700px) {
        .stat {
            display: none;
        }
    }

    @media screen and (min-width: 300px) and (max-width: 1310px) {
        .stat {
            display: block !important;
        }
    }

    @media screen and (min-width: 768px) and (max-width: 1456px) {
        ._trd_col-md-6{
            flex: 0 0 auto;
            width: 50%;
        }
    }


    .trd_to_right{
        float: right;
    }
</style>
