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
                            <h1 class="h2"></h1>
                            <p class="lead">
                                Email verification.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form>

                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <div class="alert-message">
                                                <strong>Thanks!</strong> Now you are verified user!
                                            </div>
                                        </div>

                                        <div style="" class="text-center mt-3">
                                            <button type="submit" onclick="RedirectToCabinet()" class="btn btn-lg btn-primary">Go to Admin panel</button>
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


<script>
    RedirectToCabinet = function (){
        location.href = "https://cunion.io/panel/cabinet/cabinet"
    }
</script>