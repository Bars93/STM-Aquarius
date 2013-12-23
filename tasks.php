<?php
    require_once 'inc/init.inc'
?>
<!DOCTYPE html>

<html lang="ru">
<head>
	<title>СУЗ Aquarius</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/common.css"> 
	<link rel="stylesheet" type="text/css" href="css/tasks.css">
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
<!--	<iframe src="header.html" scrolling="no" class="pagehdr"></iframe>-->
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
	<h1>Текущие задачи системы</h1>
	<table class="tasks">
	<tr>
	<th>Задача</th>
	<th>Пользователь</th>
	<th>Приоритет</th>
	<th>Сроки</th>
	<th>Подробности</th>
        <?php
            $query = "SELECT COUNT(1) FROM `tasks`";
            $res = mysqli_query($db_connect,$query) or die('MySQL access error: '.mysqli_error($db_connect));
            if(!mysqli_fetch_array($res)[0]) {
                echo '<tr><td colspan="5">В настоящее время задач нет</td></tr>';
            }
        ?>
    <!-- <tr>
	<td><a href="tasks.php?id=1">Построение плана</a></td><td><a href="user.php?id=1">irbis</a></td><td>Высокий (4)</td><td>04.12.13</td><td>-</td>
	</tr><tr>
	<td><a href="tasks.php?id=2">Перестройка сайта</a></td><td><a href="user.php?id=2">Alchor</a></td><td>Средний (3)</td><td>09.11.13</td><td>-</td>
	</tr>-->
	</table>
	<a href="createtask.php" class="createtaskbtn">Создать задачу</a>
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