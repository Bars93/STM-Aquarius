<!DOCTYPE html><?phprequire_once 'inc/init.inc';@session_start();?><html lang="ru"><head><link rel="stylesheet" type="text/css" href="css/nav.css">	<meta charset="utf-8">	<!-- Enabling HTML5 support for Internet Explorer -->  <!--[if lt IE 9]>   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>   <![endif]-->   <!--[if gte IE 9]>  <style type="text/css">      <    .gradient {       filter: none;    }  </style>  <![endif]-->  </head><body><section id="navblock">	<ul class='mainNav'>	<li id="Home"><a href="index.php">Главная</a></li>	<li id="Tasks"><a href="tasks.php">Задачи</a></li>	<li id="Users"><a href="users.php">Пользователи</a></li>        <?php        if(isset($_SESSION['autorised']) and $_SESSION['autorised'] == 1) {            echo '<li id="Settings"><a href="settings.php">Настройки</a></a></li>';        }    ?>	</ul></section></body></html>