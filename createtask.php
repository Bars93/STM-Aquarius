<?php
require_once 'inc/init.inc';
@session_start();
?>
<!DOCTYPE html>

<html lang="ru">
<head>
    <title>СУЗ Aquarius</title>
    <meta charset="utf-8">
    <?php
    if (!isset($_SESSION['autorised'])) {
        echo '<meta http-equiv="refresh" content="0;URL=/logpage.php">';
    }
    ?>
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
    <script type="text/javascript" src="js/ui/i18n/jquery.ui.datepicker-ru.js"></script>
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
    <article>
        <h1>Создание задачи:</h1>

        <form action="addtask.php" method="POST" class="crtaskform">
            <label for="taskname">Название задачи: </label>
            <input type="text" class="taskname" name="taskname" placeholder="Name of task">
            <label for="datetask">Сроки задачи: </label>

            <div id="daterange">
                <input type="date" id="startdatetask" class="datetask" name="startdatetask" placeholder="Start date">
                <input type="date" id="enddatetask" class="datetask" name="enddatetask" placeholder="End date">
            </div>
            <label for="task_prior">Приоритет</label>
            <input type="radio" value="1" name="task_prior" class="task_prior">1
            <input type="radio" value="2" name="task_prior" class="task_prior">2
            <input type="radio" value="3" name="task_prior" class="task_prior">3
            <input type="radio" value="4" name="task_prior" class="task_prior">4
            <input type="radio" value="5" name="task_prior" class="task_prior">5
            <input type="radio" value="6" name="task_prior" class="task_prior">6
            <input type="radio" value="7" name="task_prior" class="task_prior">7
            <br>
            <label for="edit_by_user">Разрешить редактирование пользователем: </label>
            <input type="checkbox" value="1" name="edit_by_user" class="edit_by_user">
            <label for="task_user">Назначение пользователю: </label>
            <input type="text" class="task_user" id="task_user" name="task_user" placeholder="User">
            <label for="task_comm">Комментарий: </label>
            <textarea type="text" rows="20" name="task_comm" id="task_comm"
                      class="task_comm">Commentaries</textarea><br>
            <input type="submit" id="createbtn" value="Создать задачу">
        </form>
        <script type="text/javascript">
            <!--
            $(document).ready(function () {
                $("#startdatetask").datepicker();
                $("#enddatetask").datepicker();
            });
            //-->
        </script>
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