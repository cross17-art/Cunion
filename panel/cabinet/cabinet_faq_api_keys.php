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

if($user->two_auth_enable==1 && $user->authentication_verified==0 ){
?>
    <script> location.href = "https://cunion.io/panel/cabinet/sign_in_form.php"</script>
    <?php
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
                <h2>API Keys Faq</h2>
                <div class="tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#kucoin_tab" data-bs-toggle="tab" role="tab">Kucoin</a></li>
                        <li class="nav-item"><a class="nav-link" href="#binance_tab" data-bs-toggle="tab" role="tab">Binance</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="kucoin_tab" role="tabpanel">
                            <h4 class="tab-title">Как создать API-ключ на Kucoin?</h4>
                            <p>Краткая инструкция о том , как создать API-ключ на криптовалютной бирже Kucoin.
                                <br>Важно! Для создания API-ключей вы обязаны включить двухфакторную аутентификацию на Kucoin , так же вам понадобится «Торговый пароль» установленный вами заранее — что является требованием самой биржи. Для создания API-ключа необходимость в KYC - отсутствует.  
                            </p>
                            <p><strong>Последовательность действий</strong></p>
                            <ol>
                                <li class="faq-kucoin-item">
                                    <p>Войдите в свой аккаунт Kucoin.</p>
                                    <a href="../../img/faq/kucoin_faq_1.png" target="_blank"><img width="600px" src="../../img/faq/kucoin_faq_1.png"></a>
                                </li>

                                <li class="faq-kucoin-item">
                                    <p>Зайдите в свой Профиль - далее выберите вкладку - Управление API. </p>
                                    <a href="../../img/faq/kucoin_faq_2.png" target="_blank"><img width="400px" src="../../img/faq/kucoin_faq_2.png"></a>

                                </li>

                                <li class="faq-kucoin-item">
                                    <p>В появившемся окне выберите нажмите кнопку - «Создать API» Данный API - только для KuCoin и не может использоваться для Фьючерсов. Если вам нужен API для торговли фьючерсами, пожалуйста, перейдите на Futures API. (Обращаем внимание , на данный момент на копитрейдинговой платформе реализована торговля «Спот» , фьючерсная торговля планируется в будущих дополнениях) </p>
                                    <a href="../../img/faq/kucoin_faq_3.png" target="_blank"><img width="800px" src="../../img/faq/kucoin_faq_3.png"></a>

                                </li>

                                <li class="faq-kucoin-item">
                                    <p>В параметрах создания API-ключа необходимо установить следующие пункты:
                                    <ul>
                                        <li>Название API - произвольное название</li>
                                        <li>Пароль API - придумайте и сохраните любой пароль</li>
                                    </ul>
                                    <p><br> Примечание: «Торговый пароль» не является паролем для API <strong>ВАЖНО ! Пароль созданный вами для API понадобится в дальнейших шагах для подключения вашего аккаунта на Cunion.io</strong>
                                    <p>
                                    <ul>
                                        <li>Установите галочку в пунктах «Общее» и «Торговля» - данная функция необходима для копирования торговых ордеров и работоспособности принципа копитрейдинга</li>
                                        <li>Доступ IP - писать про него или нет стоит?</li>
                                        <li>Нажмите кнопку «Далее»</li>
                                    </ul>
                                    <br> <br>
                                    <p><strong>Примечание - не устанавливайте разрешение в поле «Перевод» - «Вывод» в целях вашей безопасности , тем самым ограничив возможность вывода ваших личных средств через API-ключи.</strong></p>

                                    <a href="../../img/faq/kucoin_faq_4.png" target="_blank"><img width="400px" src="../../img/faq/kucoin_faq_4.png"></a>

                                </li>

                                <li class="faq-kucoin-item">
                                    <p>Следующим шагом Kucoin попросит вас ввести три кода: один из письма на ваш электронный ящик, второй из приложения Google Authenticator и последним является ваш «Торговый пароль» установленный вам заранее. Чтобы получить код на ящик, нажмите кнопку «Отправить код». Чтобы получить код из приложения Google Authenticator, просто откройте его в приложении. Имея все необходимые коды на руках, введите их и нажмите «Подтвердить».</p>
                                    <a href="../../img/faq/kucoin_faq_5.png" target="_blank"><img width="400px" src="../../img/faq/kucoin_faq_5.png"></a>

                                </li>

                                <li class="faq-kucoin-item">
                                    <p>API Secret не может быть восстановлен и будет показан ТОЛЬКО один раз. Пожалуйста, сохраните его. Нажмите кнопку «Подтвердить»</p>
                                    <a href="../../img/faq/kucoin_faq_6.png" target="_blank"><img width="400px" src="../../img/faq/kucoin_faq_6.png"></a>

                                </li>
                            </ol>
                        </div>
                        <div class="tab-pane" id="binance_tab" role="tabpanel">
                            <h4 class="tab-title">Как создать API-ключ на Binance?</h4>
                            <p>Мы подготовили краткую инструкцию о том , как создать API-ключ на криптовалютной бирже Binance. Важно! Для создания API-ключей вы обязаны включить двухфакторную аутентификацию на Binance — это требование самой биржи. Обратите внимание - для создания API - ключа криптовалютная биржа Binance имеет ограничение для пользователей у которых отсутсвует один из следующих видов подтверждения личности. Пройдите промежуточную или расширенную KYC для личного аккаунта. Для корпоративных аккаунтов необходимо пройти проверку корпоративных аккаунтов соответственно.  </p>
                            <br> <strong> Последовательность действий </strong> <br><br>
                            <ol>
                                <li class="binance-faq-item">
                                    <p>Войдите в свой аккаунт Binance.</p>
                                    <a href="../../img/faq/binance_faq_1.png" target="_blank"> <img target="_blank" width="600px" src="../../img/faq/binance_faq_1.png"></a>
                                </li>

                                <li class="binance-faq-item">
                                    <p>Зайдите в свой Профиль - далее выберите вкладку - Управление API. </p>
                                    <a href="../../img/faq/binance_faq_2.png" target="_blank"> <img width="300px" src="../../img/faq/binance_faq_2.png"></a>

                                </li>

                                <li class="binance-faq-item">
                                    <p>В открывшемся окне укажите метку (имя) вашего API-ключа и нажмите «Создать» </p>
                                    <a href="../../img/faq/binance_faq_3.png" target="_blank"><img width="600px" src="../../img/faq/binance_faq_3.png"> </a>

                                </li>


                                <li class="binance-faq-item">
                                    <p>Следующим шагом Binance попросит вас ввести два кода: один из письма на ваш электронный ящик, а второй из приложения Google Authenticator. Чтобы получить код на ящик, нажмите кнопку «Отправить код». Чтобы получить код из приложения Google Authenticator, просто откройте его. Имея два кода на руках, введите их и нажмите «Отправить». </p>
                                    <a href="../../img/faq/binance_faq_4.png" target="_blank"><img width="400px" src="../../img/faq/binance_faq_4.png"> </a>

                                </li>

                                <li class="binance-faq-item">
                                    <p>Ваш созданный ключ появится в списке ключей на самой верхней позиции. Обратите внимание на секретный ключ — вы видите его первый и последний раз. В дальнейшем он будет зашифрован. </p>
                                    <p>По умолчанию система выставит вашему ключу ограничения <strong>«Разрешить только чтение»</strong> , дополнительно необходимо установить разрешение
                                        <strong>«Включить спотовую и маржинальную торговлю»</strong> и последним пунктом нужно указать «Ограничения доступа по IP» - Неограниченный.
                                        <strong>Примечание - не устанавливайте разрешение в поле «Включить возможность вывода средств» в целях вашей безопасности </strong>, тем самым ограничив возможность вывода ваших личных средств через API-ключи.
                                    </p>
                                    <p>
                                        Данные параметры и ограничения выставленные вами соответствуют требованиям для работы на нашей платформе. </p>
                                    <a href="../../img/faq/binance_faq_5.png" target="_blank"><img width="600px" src="../../img/faq/binance_faq_5.png"> </a>

                                </li>
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("footer.php") ?>
    </div>


    <style>
        .binance-faq-item {
            margin-bottom: 35px;
        }

        .faq-kucoin-item {
            margin-bottom: 35px;
        }

        @media screen and (max-width: 700px){
            li>a>img{
                max-width: 240px;
            }
        }


    </style>


ipt>
</div>


<script src="js/app.js"></script>
<div class="notyf"></div>
<div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>


<!---->
</body>
</html>

<script src="js/verification_script.js"></script>



<script>
    document.addEventListener("DOMContentLoaded", () => {
        let queryString = window.location.search;
        let urlParams = new URLSearchParams(queryString)
        if(urlParams.get('tag') === "binance"){
            document.querySelectorAll("ul.nav.nav-tabs>li>a").forEach((link) => {
                link.classList.remove('active')
            })
            document.querySelector("[href='#binance_tab']").classList.add('active');
            document.querySelectorAll(".tab-pane").forEach((tab) => {
                tab.classList.remove('active');
            })

            document.querySelector("#binance_tab").classList.add('active');
        }
    })


</script>





