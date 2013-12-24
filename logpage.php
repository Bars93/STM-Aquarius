<!DOCTYPE html>
<?php
require_once 'inc/init.inc';
?>
<html lang="ru">
<head>
    <title>СУЗ Aquarius</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/etc.css">
    <!-- Enabling HTML5 support for Internet Explorer -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
    <![endif]-->
</head>

<body>
<header>
    <div class="hdr_block">
        <?php
        include_once 'header.php';
        ?>
    </div>
</header>
<nav>
    <div class="nav_block">
        <?php
        include_once 'nav.php';
        ?>
    </div>
</nav>
<section class="bodysec">
    <article id="login_block">
        <form class="logform" name="logform" action="login.php" method="POST">
            <input type="text" accesskey="1" tabindex="1" class="loginp" name="loginp" placeholder="username">
            <input type="password" class="passinp" tabindex="2" name="passinp" placeholder="password">
            <input type="submit" class="logbtn" tabindex="3" name="logbtn" value="Вход" >
            <div class="helpreg"><a href="registration.php">Регистрация</a>
                <!--<a href="recovery.php">Напомнить пароль</a>//--></div>
       </form>
    </article>
</section>

<footer>
    <div class="footer_block">
        <?php
        include_once 'footer.php';
        ?>
    </div>
</footer>
</body>
</html>