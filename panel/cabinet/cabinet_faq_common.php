<?php
session_start();
include("classes/user.php");
include("classes/MasterHandler.php");

$user = new User($_SESSION['user_email']);

$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "trd_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


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
<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky" class="">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main" page="main_page">
        <?php include("cabinet_header.php"); ?>
        <main class="content">
            <div class="container-fluid p-0">



                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-3 col-xl-2">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">FAQ</h5>
                                </div>

                                <div class="list-group list-group-flush" role="tablist">
                                    <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#qst1" role="tab"> Какой принцип и механика работы копитрейдинга? </a>
                                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#qst2" role="tab"> Что такое копитрейдинг? </a>
                                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#qst3" role="tab"> Чем копитрейдинг отличается от инвестирования с финансовым консультантом? </a>
                                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#qst4" role="tab"> Зачем нужен API и что это такое? </a>
                                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#qst5" role="tab"> Безопасно ли подключать свой биржевой аккаунт ? </a>
                                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#qst6" role="tab"> Как узнать и где найти свой API-ключ? </a>
                                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#qst7" role="tab"> Могу ли я установить ограничение по IP для своего API-ключа? </a>
                                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#qst8" role="tab"> Могу ли я потерять все свои цифровые активы мгновенно? </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 col-xl-10">
                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="qst1" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Какой принцип и механика работы копитрейдинга?</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Платформа в автоматическом режиме копирует сделки трейдера к которому вы произвели подключение в личном кабинете , через API & Secret key выбрав трейдера торговую стратегию которого вы хотели бы использовать на своем аккаунте.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="qst2" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Что такое копитрейдинг?</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Платформа в автоматическом режиме копирует сделки трейдера к которому вы произвели подключение в личном кабинете , через API & Secret key выбрав трейдера торговую стратегию которого вы хотели бы использовать на своем аккаунте.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="qst3" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Чем копитрейдинг отличается от инвестирования с финансовым консультантом?</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>В случае копитрейдинга нет необходимости перевода ваших активов на счет финансового консультанта. Во втором случае, средства переводятся на счет консультанта, и уже тот торгует ими на рынке.</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="qst4" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Зачем нужен API и что это такое?</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Аббревиатура API расшифровывается как «Application Programming Interface» API – это интерфейс прикладного программирования, который помогает приложениям взаимодействовать друг с другом. В повседневной жизни мы постоянно используем API, однако не всегда осознаём, что имеем дело именно с ними. Большое количество криптовалютных бирж предоставляют своим клиентам API для пользовательских задач. В нашем случае API ключи нужны для получения информации о сделках трейдеров и совершения сделок на аккаунтах инвесторов. </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="qst5" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Безопасно ли подключать свой биржевой аккаунт?</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>При подключении и добавлении вашего API-ключа , вы устанавливайте разрешение с доступом исключительно для функций “Разрешить только чтение” и “Включить спотовую и маржинальную торговлю”. Доступ необходим только для копирования торговых операций. Важное примечание: Не устанавливайте разрешение в поле «Включить возможность вывода средств» в целях вашей безопасности , тем самым ограничив возможность вывода ваших личных средств через API-ключи. Ваш персональный аккаунт всегда защищен двухфакторной аутентификацией </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="qst6" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Как узнать и где найти свой API-ключ?</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Инструкцию о получении и созданию API-ключа вы можете получить в следующих разделах:
                                            <ul>
                                                <li><a href="https://cunion.io/panel/cabinet/cabinet_faq_api_keys.php" > FAQ -> API Keys -> Kucoin</a></li>
                                                <li><a href="https://cunion.io/panel/cabinet/cabinet_faq_api_keys.php?tag=binance">FAQ -> API Keys -> Binance</a></li>
                                                <li>API-ключ нужен для подключения к платформе Cunion</li>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="qst7" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Могу ли я установить ограничение по IP для своего API-ключа?</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Установка ограничения по IP для вашего API-ключа технически невозможна для работы на нашей платформе</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="qst8" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Могу ли я потерять все свои цифровые активы мгновенно?</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>С технической точки зрения , потеря всех ваших средств мгновенно - невозможна.
                                                В случае неверных решений через определенный период времени в режиме торговли мастера , ваши потери как и доход будут пропорциональны изменению баланса мастера к которому вы произвели подключение.
                                                <br>
                                                <br>
                                                Предупреждение о рисках: Инвестиции в криптовалюту сопровождаются высокими рыночными рисками. Пожалуйста, совершайте сделки с осторожностью. Cunion.io не несет ответственности за полученные вами убытки в результате ваших решений.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?php include("footer.php") ?>
    </div>

</div>
<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>


<!---->
</body>
</html>

<script src="js/verification_script.js"></script>






