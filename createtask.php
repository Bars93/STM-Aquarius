<?php
require_once 'inc/init.inc';
session_start();
?>
<!DOCTYPE html>

<html lang="ru">
<head>
	<title>СУЗ Aquarius</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/etc.css"> 
	<link rel="stylesheet" type="text/css" href="css/themes/base/jquery-ui.css">
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
<script type="text/javascript" src="js/ui/jquery-ui.js"></script>
<script type="text/javascript" src="js/ui/jquery.ui.datepicker.js"></script>
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
		<h1>Создание задачи:</h1>
		<form action="addtask.php" method="POST" class="crtaskform">
		<label for="taskname">Название задачи: </label>
		<input type="text" class="taskname" name="taskname" placeholder="Name of task">
		<label for="datetask">Сроки задачи: </label>
		<input type="date" id="startdatetask" class="datetask" name="startdatetask" placeholder="Start date">
		</form>
		<script>
		<!--
		$(document).ready(function() {
		    $("#startdatetask").datepicker();
		});
		//-->
		</script>
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