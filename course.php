<?php
$servername = "localhost";
$username = "trd_db_user";
$password = "trd_db_pass01";
$database = "course";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<head>
    <link rel="stylesheet" href="course.css" type="text/css" media="all">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>

<body>
    <div class="section"><img class="logo on-center" src="img/CunionLogo.png"></div>
    <div class="section"></div>
    <div class="section">
        <h1 class="main-title on-center">Онлайн курс</h1>
        <h2 class="title on-center">"Основы копитрейдинга. <br> Как зарабатывать 24/7 </h2>
        <img class="tomas-logo on-center" src="img/Tomas.png">
    </div>
    <div class="section on-center">
        <h2 class="on-center">Программа курса</h2>
        <ul>
            <li>
                Что такое криптовалюта?
            </li>
            <li>
                Что такое блокчен?
            </li>
            <li>
                Что такое биржа и как завести аккаунт?
            </li>
            <li>
                Как вводить и выводить деньги?
            </li>
            <li>
                Кто такие трейдеры
            </li>
            <li>
                Что такое копитрейдинг и как на нем зарабатывать?
            </li>
        </ul>
    </div>
    <div class="section">
        <div id="registration_form" class="form on-center">
            <h2>Регистрация на онлайн-курс</h2>
            <div class="input-group">
                <label>Ваше имя</label>
                <input type="text" placeholder="Имя Фамилия" name="name">
            </div>
            <div class="input-group">
                <label>Ваш e-mail</label>
                <input type="text" placeholder="mail@example.com" name="email">
            </div>
            <div class="input-group">
                <label>Ваш номер телефона</label>
                <input type="text" placeholder="Ваш номер телефона" name="phone">
            </div>
            <button class="registration-button" onclick="SendForm()">Зарегистрироваться</button>
        </div>

        <div id="success_form" class="form on-center" style="display: none">
            <h2>Ваша заявка принята! Спасибо за регистрацию.</h2>
        </div>
    </div>

    <div>
        <h1 class="on-center">Наши партнеры</h1>
        <div class="partners on-center">
            <div class="partner"><img class="partner-image" src="img/parnters/DigitalOcean.swg"></div>
            <div class="partner"><img class="partner-image" src="img/parnters/kucoin.svg"></div>
            <div class="partner"><img class="partner-image" src="img/parnters/CoinPayments.swg"></div>
        </div>
    </div>
    <div class="section footer"><img class="logo on-center" src="img/CunionLogo.png"></div>
</body>


<script src="course/send_course_form.js"></script>