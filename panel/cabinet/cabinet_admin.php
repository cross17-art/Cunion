<?php
session_start();

if (!isset($_SESSION['logged'])) {
    ?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
}

include("classes/user.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/RegistrationHandler.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/FullConnectionIntervalModel.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/Debtor/DeptHandler.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/ReferralTransactionHandler.php");
include_once ($_SERVER['DOCUMENT_ROOT']."/panel/cabinet/classes/TraderTransactionHandler.php");

$debt_handler = new DeptHandler();
$user = new User($_SESSION['user_email']);


if(!$user->IsAdmin()){
    ?>

    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>

    <?php
}

?>
<script src="js/verification_script.js"></script>


<meta http-equiv="pragma" content="no-cache" />
<html lang="en">

<?php include("header.php") ?>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="cabinet_setting">
        <?php include("cabinet_header.php"); ?>

        <main class="content"  >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6" style="display: inline-block; width: 49%">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Register alpha tester user</h5>
                            </div>

                            <div class="input-group mb-3">
                                <input id="Email" name="email"  class="form-control" placeholder="tester email">
                            </div>

                            <div class="input-group mb-3">
                                <input id="Pass" name="pass" class="form-control" placeholder="tester pass word">
                            </div>

                            <div class="input-group mb-3">
                                <input id="Telegram" name="telegram" class="form-control" placeholder="tester telegram">
                            </div>

                            <button class="btn btn-info" onclick="RegisterTester()">Register Tester</button>
                        </div>


                        <div id="success_msg" style="display: none" class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-message">
                                <strong>Hello there!</strong> Tester was registrated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="display: inline-block;">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Non Registered Users</h5>
                            </div>

                            <table class="table table-striped table-sm" style="font-size: 10px" ">
                                <thead>
                                <?php
                                foreach (RegistrationHandler::GetRegistrationRecordsKeys() as $key){
                                    echo ("<th class='text-center'>". $key ."</th>");
                                }
                                ?>
                                </thead>
                                <tbody>
                                <?php
                                foreach (RegistrationHandler::GetNonRegisteredUsers() as $nonRegisteredUser){
                                    echo ("<tr>");
                                    foreach ($nonRegisteredUser as $key => $value){
                                        echo ("<td class='text-center' >");
                                        echo $value;
                                        echo ("</td>");
                                    }
                                    echo ("</tr>");
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="display: inline-block;">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">The Debtors</h5>
                                <button class="btn btn-primary" style="float: right" onclick="SendDebtorNotifications()">Send Debtor Notifications</button>
                            </div>

                            <table class="table table-striped table-sm" style="font-size: 15px" ">
                            <thead>
                            <th class="text-center">User Email</th>
                            <th class="text-center">Nickname</th>
                            <th class="text-center">Debt</th>
                            <th class="text-center">Telegramm</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Last Transaction Date</th>
                            <th class="text-center">Actions</th>

                            </thead>
                            <tbody>

                            <?php
                            foreach ($debt_handler->GetDebtorList() as $key => $value){
                                /**
                                 * @var User $debtor
                                */
                                $debtor = new User($key);
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $debtor->user_email ?></td>
                                        <td class="text-center"><?= $debtor->nickname ?></td>
                                        <td class="text-center"> <span style="color: #4bbf73">$<?= number_format($debtor->debt->GetTotalDebt(),2) ?></span></td>
                                        <td class="text-center"><?= $debtor->telegram ?></td>

                                        <td class="text-center"><?= $debtor->disabled ? "<span class='badge badge-soft-danger'>Disabled</span>" :
                                                                                        "<span class='badge badge-soft-success'>Enabled</span>" ?></td>
                                        <td class="text-center"><?= $debtor->transactions->GetLastTransaction()['date'] ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-success" onclick="EnableUser('<?= $debtor->user_email ?>')">Enable</button>
                                            <button class="btn btn-danger" onclick="DisableUser('<?= $debtor->user_email ?>')">Disable</button>
                                            <button class="btn btn-secondary">Send Debtor Email</button>
                                        </td>
                                    </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                    include ("cabinet_admin_parts/referral_await_transaction_list.php");
                    include ("cabinet_admin_parts/trader_await_transaction_list.php")
                ?>
        </main>


        <?php include ("footer.php") ?>

    </div>
</div>

<script src="js/app.js"></script>

</body>
</html>


<script src="js/change_pass.js"> </script>
<script src="js/register_user.js"> </script>
<script src="js/admin/admin_js.js"> </script>
