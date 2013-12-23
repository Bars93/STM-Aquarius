<!DOCTYPE html>

<html lang="ru">
<head>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <meta charset="utf-8">
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
<section id="authblock">
    <ul><li id="logblock">
    <div class="rpos">
        <form class="logform" name="logform" action="login.php" target="_parent" method="POST">
        <?php
        include_once 'inc/init.inc';
        if (@session_start()) {
            if (!isset($_SESSION['autorised'])) {
                echo '<input type="text" accesskey="1" tabindex="6" class="loginp" name="loginp" placeholder="username">
		<input type="password" class="passinp" tabindex="7" name="passinp" placeholder="password">
		<input type="submit" class="logbtn" tabindex="8" name="logbtn" value="Вход" >
	<div class="helpreg"><a href="registration.php">Регистрация</a>
	<!--<a href="recovery.php">Напомнить пароль</a>//--></div>';
            } else {
                echo '<div class="login_nick">'.$_SESSION['user_name'].'</div> <input type="submit" value="Log off" class="logbtn">';
                $_SESSION['action'] = 'logout';
            }
        } else {
            echo 'Error with start sessions';
        }
        ?>
        </form>
    </div>
    </li>
</ul>
</section>

<a href="/">
    <img src="img/logo.gif" title="Logo" class="logo" id="logo">
</a>
</body>
</html>