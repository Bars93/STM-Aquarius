<!DOCTYPE html>
<html lang="ru">
<head>
    <title>СУЗ Aquarius</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/reg.css">
    <!-- <link rel="stylesheet" type="text/css" href=""> -->
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
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.nickvalid.js"></script>
    <script type="text/javascript" src="js/jquery.emailvalid.js"></script>
    <script type="text/javascript" src="js/jquery.passwordvalid.js"></script>
    <script type="text/javascript" src="js/jquery.typing-0.2.0.min.js"></script>
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
    <!--<iframe class="menuif" src="nav.html" scrolling="no"></iframe>-->
    <div class="nav_block">
        <?php
        include_once 'nav.php';
        ?>
    </div>
</nav>
<section class="bodysec">
    <article>
        <h1>Регистрация</h1>
        <?php
        if (!(@session_start()))
            echo 'Error with session working';
        if (!@isset($_SESSION['autorised'])) {
            echo '<form class="regform" id="regform" method="POST" action="reguser.php">
			<label for="login_name">Имя пользователя: </label><br>
			<input type="text" accesskey="1" lang="ru" name="login_name" id="login_name" class="login_name" tabindex="1" onkeyup="valid()">
			<div id="uname_err" class="error">Ник не должен быть длиннее 25 символов</div><br>
			<label for="login_email">E-mail: </label><br>
			<input type="text" lang="ru" name="login_email" id="login_email" class="login_email" tabindex="2">
			<div id="uemail_err" class="error">Введите e-mail правильно, например \'asm@mail.ru\'</div>
			<br>
			<label for="login_pw">Пароль: </label><br>
			<input type="password" lang="ru" name="login_pw" id="login_pw" class="login_pw" tabindex="3">
			<div id="upw_err" class="error">Пароль должен содержать не менее 6 символов. В том числе хотя бы одну букву и цифры (или наоборот)</div>
			<label for="login_cpw">Подтверждение пароля:</label><br>
			<input type="password" lang="ru" name="login_cpw" id="login_cpw" class="login_cpw" tabindex="4">
			<div id="cpw_err" class="error">Пароль и его подтверждение не совпадают</div>
			<br>
			<input type="submit" tabindex="5" value="Регистрация" name="reg_btn" id="reg_btn" class="reg_btn">
		</form>

		<script type="text/javascript">
		<!--
	    $(document).ready(function() {
	        nickok = false;
            $(this).validate();
	    });
	    //-->
		</script>';
        } else {
            echo '<div class="postreg">Вы уже зарегистрированны и авторизованны!</div>';
        }
        ?>
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