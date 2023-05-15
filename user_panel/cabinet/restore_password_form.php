<?php

?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>Reset Password | AppStack - Admin &amp; Dashboard Template</title>

    <link rel="canonical" href="https://appstack.bootlab.io/pages-reset-password.html">
    <link rel="shortcut icon" href="img/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->
    <link class="js-stylesheet" href="css/dark.css" rel="stylesheet">
</head>


<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="main d-flex justify-content-center w-100">
    <main class="content d-flex p-0">
        <div class="container d-flex flex-column">
            <div class="row h-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Reset password</h1>
                            <p class="lead">
                                Enter your email to reset your password.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email">
                                        </div>
                                        <div class="text-center mt-3">
<!--                                            <a href="dashboard-default.html" class="btn btn-lg btn-primary">Reset password</a>-->
                                             <button type="submit" onclick="RestorePass()" class="btn btn-lg btn-primary">Reset password</button>
                                        </div>

                                        <div style="display: none" class="spinner-border text-success me-2" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>

                                        <div style="display: none" class="alert alert-success alert-dismissible" role="alert">
                                            <div class="alert-message">
                                                <strong>Hello there!</strong> A simple success alert—check it out!
                                            </div>
                                        </div>

                                        <div style="display: none" class="alert alert-danger alert-dismissible" role="alert">
                                            <div class="alert-message">
                                                <strong>Hello there!</strong> A simple danger alert—check it out!
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="js/restore_pass.js"></script>
<script src="js/app.js"></script>
</body></html>
