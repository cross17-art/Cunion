<?php
session_start();
include("classes/user.php");
$user = new User($_SESSION['user_email']);
?>

<html lang="en">
<?php include("header.php") ?>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>

    <div class="main">

        <?php include("cabinet_header.php"); ?>

        <main class="content">
            <div class="container-fluid p-0">

                <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3>Analytics</h3>
                    </div>

                    <div class="col-auto ms-auto text-end mt-n1">

                        <div class="dropdown me-2 d-inline-block">
                            <a class="btn btn-light bg-white shadow-sm dropdown-toggle" href="#"
                               data-bs-toggle="dropdown" data-bs-display="static">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-calendar align-middle mt-n1">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                Today
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <h6 class="dropdown-header">Settings</h6>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>

                        <button class="btn btn-primary shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-filter align-middle">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                        </button>
                        <button class="btn btn-primary shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-refresh-cw align-middle">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <polyline points="1 20 1 14 7 14"></polyline>
                                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-5 d-flex">
                        <div class="w-100">

                            <div class="row">
                                <div class="col-sm-6 col-lg-12 col-xxl-6 d-flex">
                                    <div class="card illustration flex-fill">
                                        <div class="card-body p-0 d-flex flex-fill">
                                            <div class="row g-0 w-100">
                                                <div class="col-6">
                                                    <div class="illustration-text p-3 m-1">
                                                        <h4 class="illustration-text">Welcome Back, Chris!</h4>
                                                        <p class="mb-0">AppStack Dashboard</p>
                                                    </div>
                                                </div>
                                                <div class="col-6 align-self-end text-end">
                                                    <img src="img/illustrations/searching.png" alt="Searching"
                                                         class="img-fluid illustration-img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12 col-xxl-6 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Bounce</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat stat-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-arrow-up-right align-middle">
                                                            <line x1="7" y1="17" x2="17" y2="7"></line>
                                                            <polyline points="7 7 17 7 17 17"></polyline>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="h1 d-inline-block mt-1 mb-4">2.364</span>
                                            <div class="mb-0">
                                                <span class="badge badge-soft-success me-2"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> +3.65% </span>
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-lg-none d-xxl-flex">
                                <div class="col-sm-6 col-lg-12 col-xxl-6 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Real-Time</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat stat-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-clock align-middle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <polyline points="12 6 12 12 16 14"></polyline>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="h1 d-inline-block mt-1 mb-4">1.856</span>
                                            <div class="mb-0">
                                                <span class="badge badge-soft-success me-2"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> +2.25% </span>
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12 col-xxl-6 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Visitors</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat stat-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-users align-middle">
                                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="9" cy="7" r="4"></circle>
                                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="h1 d-inline-block mt-1 mb-4">17.212</span>
                                            <div class="mb-0">
                                                <span class="badge badge-soft-danger me-2"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> -1.25% </span>
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-7">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown show">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <i class="align-middle" data-feather="more-horizontal"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Real-Time</h5>
                            </div>
                            <div class="card-body p-2">
                                <div id="world_map" style="height:279px;"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown show">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Languages</h5>
                            </div>
                            <table class="table table-striped my-0">
                                <thead>
                                <tr>
                                    <th>Language</th>
                                    <th class="text-end">Users</th>
                                    <th class="d-none d-xl-table-cell w-75">% Users</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>en-us</td>
                                    <td class="text-end">735</td>
                                    <td class="d-none d-xl-table-cell">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 43%;"
                                                 aria-valuenow="43" aria-valuemin="0" aria-valuemax="100">43%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>en-gb</td>
                                    <td class="text-end">223</td>
                                    <td class="d-none d-xl-table-cell">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 27%;"
                                                 aria-valuenow="27" aria-valuemin="0" aria-valuemax="100">27%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>fr-fr</td>
                                    <td class="text-end">181</td>
                                    <td class="d-none d-xl-table-cell">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 22%;"
                                                 aria-valuenow="22" aria-valuemin="0" aria-valuemax="100">22%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>es-es</td>
                                    <td class="text-end">132</td>
                                    <td class="d-none d-xl-table-cell">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 16%;"
                                                 aria-valuenow="16" aria-valuemin="0" aria-valuemax="100">16%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>de-de</td>
                                    <td class="text-end">118</td>
                                    <td class="d-none d-xl-table-cell">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 15%;"
                                                 aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ru-ru</td>
                                    <td class="text-end">98</td>
                                    <td class="d-none d-xl-table-cell">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 13%;"
                                                 aria-valuenow="13" aria-valuemin="0" aria-valuemax="100">13%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown show">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Mobile / Desktop</h5>
                            </div>
                            <div class="card-body d-flex w-100">
                                <div class="align-self-center chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="chartjs-dashboard-bar-devices"
                                            style="display: block; height: 300px; width: 573px;" width="488"
                                            height="256" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown show">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Interests</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="chartjs-dashboard-radar" width="488" height="256"
                                            style="display: block; height: 300px; width: 573px;"
                                            class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-5 col-xl-4 d-flex">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown show">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Source / Medium</h5>
                            </div>
                            <div class="card-body d-flex">
                                <div class="align-self-center w-100">
                                    <div class="py-3">
                                        <div class="chart chart-xs">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="chartjs-dashboard-pie" width="488" height="128"
                                                    style="display: block; height: 150px; width: 573px;"
                                                    class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>

                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>Source</th>
                                            <th class="text-end">Revenue</th>
                                            <th class="text-end">Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><i class="fas fa-square-full text-primary"></i> Direct</td>
                                            <td class="text-end">$ 2602</td>
                                            <td class="text-end text-success">+43%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-square-full text-warning"></i> Affiliate</td>
                                            <td class="text-end">$ 1253</td>
                                            <td class="text-end text-success">+13%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-square-full text-danger"></i> E-mail</td>
                                            <td class="text-end">$ 541</td>
                                            <td class="text-end text-success">+24%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-square-full text-dark"></i> Other</td>
                                            <td class="text-end">$ 1465</td>
                                            <td class="text-end text-success">+11%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-8 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown show">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-more-horizontal align-middle">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Traffic</h5>
                            </div>
                            <div id="datatables-dashboard-traffic_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatables-dashboard-traffic"
                                               class="table table-striped my-0 dataTable no-footer" role="grid"
                                               aria-describedby="datatables-dashboard-traffic_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="datatables-dashboard-traffic" rowspan="1" colspan="1"
                                                    aria-label="Source: activate to sort column ascending">Source
                                                </th>
                                                <th class="text-end sorting sorting_desc" tabindex="0"
                                                    aria-controls="datatables-dashboard-traffic" rowspan="1" colspan="1"
                                                    aria-sort="descending"
                                                    aria-label="Users: activate to sort column ascending">Users
                                                </th>
                                                <th class="d-none d-xl-table-cell text-end sorting" tabindex="0"
                                                    aria-controls="datatables-dashboard-traffic" rowspan="1" colspan="1"
                                                    aria-label="Sessions: activate to sort column ascending">Sessions
                                                </th>
                                                <th class="d-none d-xl-table-cell text-end sorting" tabindex="0"
                                                    aria-controls="datatables-dashboard-traffic" rowspan="1" colspan="1"
                                                    aria-label="Bounce Rate: activate to sort column ascending">Bounce
                                                    Rate
                                                </th>
                                                <th class="d-none d-xl-table-cell text-end sorting" tabindex="0"
                                                    aria-controls="datatables-dashboard-traffic" rowspan="1" colspan="1"
                                                    aria-label="Avg. Session Duration: activate to sort column ascending">
                                                    Avg. Session Duration
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            <tr class="odd">
                                                <td>Google</td>
                                                <td class="text-end sorting_1">1023</td>
                                                <td class="d-none d-xl-table-cell text-end">1265</td>
                                                <td class="d-none d-xl-table-cell text-end text-success">27.23%</td>
                                                <td class="d-none d-xl-table-cell text-end">00:06:25</td>
                                            </tr>
                                            <tr class="even">
                                                <td>Direct</td>
                                                <td class="text-end sorting_1">872</td>
                                                <td class="d-none d-xl-table-cell text-end">1077</td>
                                                <td class="d-none d-xl-table-cell text-end text-success">32.70%</td>
                                                <td class="d-none d-xl-table-cell text-end">00:09:18</td>
                                            </tr>
                                            <tr class="odd">
                                                <td>Facebook</td>
                                                <td class="text-end sorting_1">812</td>
                                                <td class="d-none d-xl-table-cell text-end">1003</td>
                                                <td class="d-none d-xl-table-cell text-end text-success">24.83%</td>
                                                <td class="d-none d-xl-table-cell text-end">00:05:56</td>
                                            </tr>
                                            <tr class="even">
                                                <td>GitHub</td>
                                                <td class="text-end sorting_1">713</td>
                                                <td class="d-none d-xl-table-cell text-end">881</td>
                                                <td class="d-none d-xl-table-cell text-end text-success">38.09%</td>
                                                <td class="d-none d-xl-table-cell text-end">00:06:19</td>
                                            </tr>
                                            <tr class="odd">
                                                <td>DuckDuckGo</td>
                                                <td class="text-end sorting_1">693</td>
                                                <td class="d-none d-xl-table-cell text-end">856</td>
                                                <td class="d-none d-xl-table-cell text-end text-success">37.36%</td>
                                                <td class="d-none d-xl-table-cell text-end">00:09:12</td>
                                            </tr>
                                            <tr class="even">
                                                <td>Pinterest</td>
                                                <td class="text-end sorting_1">623</td>
                                                <td class="d-none d-xl-table-cell text-end">770</td>
                                                <td class="d-none d-xl-table-cell text-end text-danger">52.81%</td>
                                                <td class="d-none d-xl-table-cell text-end">00:03:10</td>
                                            </tr>
                                            <tr class="odd">
                                                <td>Bing</td>
                                                <td class="text-end sorting_1">504</td>
                                                <td class="d-none d-xl-table-cell text-end">623</td>
                                                <td class="d-none d-xl-table-cell text-end text-danger">66.76%</td>
                                                <td class="d-none d-xl-table-cell text-end">00:04:42</td>
                                            </tr>
                                            <tr class="even">
                                                <td>Twitter</td>
                                                <td class="text-end sorting_1">462</td>
                                                <td class="d-none d-xl-table-cell text-end">571</td>
                                                <td class="d-none d-xl-table-cell text-end text-success">31.53%</td>
                                                <td class="d-none d-xl-table-cell text-end">00:08:05</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="datatables-dashboard-traffic_info"
                                             role="status" aria-live="polite">Showing 1 to 8 of 8 entries
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                             id="datatables-dashboard-traffic_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="datatables-dashboard-traffic_previous"><a href="#"
                                                                                                  aria-controls="datatables-dashboard-traffic"
                                                                                                  data-dt-idx="0"
                                                                                                  tabindex="0"
                                                                                                  class="page-link">Previous</a>
                                                </li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                                                                aria-controls="datatables-dashboard-traffic"
                                                                                                data-dt-idx="1"
                                                                                                tabindex="0"
                                                                                                class="page-link">1</a>
                                                </li>
                                                <li class="paginate_button page-item next disabled"
                                                    id="datatables-dashboard-traffic_next"><a href="#"
                                                                                              aria-controls="datatables-dashboard-traffic"
                                                                                              data-dt-idx="2"
                                                                                              tabindex="0"
                                                                                              class="page-link">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Support</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Help Center</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Privacy</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Terms of Service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 text-end">
                        <p class="mb-0">
                            © 2021 - <a href="index.html" class="text-muted">AppStack</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite"
     style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar-devices"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .5,
                    categoryPercentage: .5
                }, {
                    label: "Desktop",
                    backgroundColor: window.theme["primary-light"],
                    borderColor: window.theme["primary-light"],
                    hoverBackgroundColor: window.theme["primary-light"],
                    hoverBorderColor: window.theme["primary-light"],
                    data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
                    barPercentage: .5,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                cornerRadius: 15,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        },
                        stacked: true,
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        },
                        stacked: true,
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var markers = [{
            coords: [31.230391, 121.473701],
            name: "Shanghai"
        },
            {
                coords: [39.904202, 116.407394],
                name: "Beijing"
            },
            {
                coords: [28.704060, 77.102493],
                name: "Delhi"
            },
            {
                coords: [6.524379, 3.379206],
                name: "Lagos"
            },
            {
                coords: [39.343357, 117.361649],
                name: "Tianjin"
            },
            {
                coords: [24.860735, 67.001137],
                name: "Karachi"
            },
            {
                coords: [41.008240, 28.978359],
                name: "Istanbul"
            },
            {
                coords: [35.689487, 139.691711],
                name: "Tokyo"
            },
            {
                coords: [23.129110, 113.264381],
                name: "Guangzhou"
            },
            {
                coords: [19.075983, 72.877655],
                name: "Mumbai"
            },
            {
                coords: [40.7127837, -74.0059413],
                name: "New York"
            },
            {
                coords: [34.052235, -118.243683],
                name: "Los Angeles"
            },
            {
                coords: [41.878113, -87.629799],
                name: "Chicago"
            },
            {
                coords: [29.760427, -95.369804],
                name: "Houston"
            },
            {
                coords: [33.448376, -112.074036],
                name: "Phoenix"
            },
            {
                coords: [51.507351, -0.127758],
                name: "London"
            },
            {
                coords: [48.856613, 2.352222],
                name: "Paris"
            },
            {
                coords: [55.755825, 37.617298],
                name: "Moscow"
            },
            {
                coords: [40.416775, -3.703790],
                name: "Madrid"
            }
        ];
        var map = new jsVectorMap({
            map: "world",
            selector: "#world_map",
            zoomButtons: true,
            markers: markers,
            markerStyle: {
                initial: {
                    r: 9,
                    stroke: window.theme.white,
                    strokeWidth: 7,
                    stokeOpacity: .4,
                    fill: window.theme.primary
                },
                hover: {
                    fill: window.theme.primary,
                    stroke: window.theme.primary
                }
            },
            regionStyle: {
                initial: {
                    fill: window.theme["gray-200"]
                }
            },
            zoomOnScroll: false
        });
        window.addEventListener("resize", () => {
            map.updateSize();
        });
        setTimeout(function () {
            map.updateSize();
        }, 250);
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Direct", "Affiliate", "E-mail", "Other"],
                datasets: [{
                    data: [2602, 1253, 541, 1465],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger,
                        "#E8EAED"
                    ],
                    borderWidth: 5,
                    borderColor: window.theme.white
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                cutoutPercentage: 70,
                legend: {
                    display: false
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Radar chart
        new Chart(document.getElementById("chartjs-dashboard-radar"), {
            type: "radar",
            data: {
                labels: ["Technology", "Sports", "Media", "Gaming", "Arts"],
                datasets: [{
                    label: "Interests",
                    backgroundColor: "rgba(0, 123, 255, 0.2)",
                    borderColor: "#2979ff",
                    pointBackgroundColor: "#2979ff",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#2979ff",
                    data: [70, 53, 82, 60, 33]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $("#datatables-dashboard-traffic").DataTable({
            pageLength: 8,
            lengthChange: false,
            bFilter: false,
            autoWidth: false,
            order: [
                [1, "desc"]
            ]
        });
    });
</script>


<div class="settings js-settings">
    <div class="settings-toggle">
        <div class="settings-toggle-option settings-toggle-option-text js-settings-toggle" title="Theme Builder">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-sliders align-middle">
                <line x1="4" y1="21" x2="4" y2="14"></line>
                <line x1="4" y1="10" x2="4" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12" y2="3"></line>
                <line x1="20" y1="21" x2="20" y2="16"></line>
                <line x1="20" y1="12" x2="20" y2="3"></line>
                <line x1="1" y1="14" x2="7" y2="14"></line>
                <line x1="9" y1="8" x2="15" y2="8"></line>
                <line x1="17" y1="16" x2="23" y2="16"></line>
            </svg>
            Builder
        </div>
        <a class="settings-toggle-option" title="Documentation" href="docs-introduction.html" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-book-open align-middle">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
            </svg>
        </a>
    </div>

    <div class="settings-panel">
        <div class="settings-content">
            <div class="settings-title d-flex align-items-center">
                <button type="button" class="btn-close float-right js-settings-toggle" aria-label="Close"></button>

                <h4 class="mb-0 ms-2 d-inline-block">Theme Builder</h4>
            </div>

            <div class="settings-body">

                <div class="alert alert-primary" role="alert">
                    <div class="alert-message">
                        <strong>Hey there!</strong> Set your own customized style below. Choose the ones that best fits
                        your needs.
                    </div>
                </div>

                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Color scheme</span>
                    <span class="d-block text-muted mb-2">The perfect color mode for your app.</span>

                    <div class="row g-0 text-center mx-n1 mb-2">
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label" type="radio" name="theme" value="default">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-default"></div>
                                </div>
                            </label>
                            Default
                        </div>
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label" type="radio" name="theme" value="colored">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-colored"></div>
                                </div>
                            </label>
                            Colored
                        </div>
                    </div>
                    <div class="row g-0 text-center mx-n1">
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label" type="radio" name="theme" value="dark">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-dark"></div>
                                </div>
                            </label>
                            Dark
                        </div>
                        <div class="col">
                            <label class="mx-1 d-block mb-1">
                                <input class="settings-scheme-label" type="radio" name="theme" value="light">
                                <div class="settings-scheme">
                                    <div class="settings-scheme-theme settings-scheme-theme-light"></div>
                                </div>
                            </label>
                            Light
                        </div>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Sidebar position</span>
                    <span class="d-block text-muted mb-2">Toggle the position of the sidebar.</span>

                    <div>
                        <label>
                            <input class="settings-button-label" type="radio" name="sidebarPosition" value="left">
                            <div class="settings-button">
                                Left
                            </div>
                        </label>
                        <label>
                            <input class="settings-button-label" type="radio" name="sidebarPosition" value="right">
                            <div class="settings-button">
                                Right
                            </div>
                        </label>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Sidebar behavior</span>
                    <span class="d-block text-muted mb-2">Change the behavior of the sidebar.</span>

                    <div>
                        <label>
                            <input class="settings-button-label" type="radio" name="sidebarBehavior" value="sticky">
                            <div class="settings-button">
                                Sticky
                            </div>
                        </label>
                        <label>
                            <input class="settings-button-label" type="radio" name="sidebarBehavior" value="fixed">
                            <div class="settings-button">
                                Fixed
                            </div>
                        </label>
                        <label>
                            <input class="settings-button-label" type="radio" name="sidebarBehavior" value="compact">
                            <div class="settings-button">
                                Compact
                            </div>
                        </label>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <span class="d-block font-size-lg font-weight-bold">Layout</span>
                    <span class="d-block text-muted mb-2">Toggle container layout system.</span>

                    <div>
                        <label>
                            <input class="settings-button-label" type="radio" name="layout" value="fluid">
                            <div class="settings-button">
                                Fluid
                            </div>
                        </label>
                        <label>
                            <input class="settings-button-label" type="radio" name="layout" value="boxed">
                            <div class="settings-button">
                                Boxed
                            </div>
                        </label>
                    </div>
                </div>

            </div>

            <div class="settings-footer">
                <div class="d-grid">
                    <a class="btn btn-primary btn-lg btn-block"
                       href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/"
                       target="_blank">Purchase</a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="jvm-tooltip" style="display: none; top: 254.453px; left: 1405px;">United States</div>
<iframe name="_hjRemoteVarsFrame" title="_hjRemoteVarsFrame" id="_hjRemoteVarsFrame"
        src="https://vars.hotjar.com/box-25a418976ea02a6f393fbbe77cec94bb.html"
        style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;"></iframe>
</body>
</html>