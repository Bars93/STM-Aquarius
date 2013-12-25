<!DOCTYPE html>
<?php
require_once 'inc/init.inc';
?>
<html lang="ru">
<head>
    <title>СУЗ Aquarius</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/common.css">
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
    <!--<iframe src="header.html" scrolling="no" class="pagehdr"></iframe>-->
    <div class="hdr_block">
        <?php
        include_once 'header.php';
        ?>
    </div>
</header>
<nav>
    <!--<iframe class="menuif" src="nav.html" scrolling="no"	></iframe>-->
    <div class="nav_block">
        <?php
        include_once 'nav.php';
        ?>
    </div>
</nav>
<section class="bodysec">
    <article>
        <div class="welcome">
            Добро пожаловать в систему управления задачами Aquarius! Пожалуйста, авторизуйтесь или пройдите регистрацию,
            чтобы приступить к управлению задачами!
        </div>
    </article>

</section>

<footer>
    <!--<iframe class="footerif" src="footer.html" scrolling="no"></iframe>-->
    <div class="footer_block">
        <?php
        include_once 'footer.php';
        ?>
    </div>
</footer>
</body>
</html>