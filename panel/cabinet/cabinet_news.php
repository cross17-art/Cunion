<?php
session_start();
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/NewsModel.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/user.php");

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}

$user = new User($_SESSION['user_email']);
if ($user->two_auth_enable == 1 && $user->authentication_verified == 0) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}

$user->SetLastSeenDevBlog();

?>

<script src="../cabinet/js/login.js"></script>
<script src="js/verification_script.js"></script>

<html lang="en">
<?php include("header.php") ?>

<?php

$newsList = NewsModel::GetAllNews();
?>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="cabinet_news">
        <?php include("cabinet_header.php"); ?>

        <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">News</h1>

                <?php
                    foreach ($newsList as $news) {
                ?>
                        <div class="card">
                            <div class="card-header">
                                <?= $news['title'] ?>
                                <div><?= $news['date'] ?></div>
                            </div>
                            <div class="card-body">
                                <?= $news['text'] ?>
                            </div>
                        </div>
                <?php
                    }
                ?>



            </div>
        </main>


        <?php include("footer.php") ?>

    </div>
</div>

<script src="js/app.js"></script>
<script src="js/node_modules/qrcode/build/qrcode.min.js"></script>

</body>
</html>


