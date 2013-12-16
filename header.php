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
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>

<body>

<section id="logblock">
    <div class="rpos">
        <form class="logform" name="logform" action="login.php" target="_parent" method="POST">
        <?php
        include_once 'inc/init.inc';
        if (@session_start()) {
            if (!isset($_SESSION['autorised'])) {
                echo '<input type="text" accesskey="1" tabindex="1" class="loginp" name="loginp" placeholder="username">
		<input type="password" class="passinp" tabindex="2" name="passinp" placeholder="password">
		<input type="submit" class="logbtn" tabindex="3" name="logbtn" value="Вход" >
	<div class="helpreg"><a href="registration.php">Регистрация</a>
	<!--<a href="recovery.php">Напомнить пароль</a>//--></div>';
            } else {
                echo '<div class="login_nick">'.$_SESSION['user_name'].'</div> <input type="submit" value="log off" class="logbtn">';
                $_SESSION['action'] = 'logout';
            }
        } else {
            echo 'Error with start sessions';
        }
        ?>
        </form>
    </div>
</section>
<a href="/">
    <img src="img/logo.gif" title="Logo" class="logo" id="logo">
</a>
<script type="text/javascript">
    <!--
        $(document).ready(function() {
           var p = document.getElementById('logblock');
            var elem = document.getElementsByClassName('login_nick')[0];
            if(elem) {
                var new_w = elem.innerHTML.length + 150;
                p.style.width = ""+new_w+"px";
            }
        });
        //-->
</script>
</body>
</html>