<!DOCTYPE html>
<?php
require_once 'inc/init.inc';
@session_start();
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
    <article>
       <h1>Редактирование задачи</h1><br>
        <form action="taskupdate.php" method="POST" class="crtaskform">
        <?php
        if(isset($_GET['id'])) {
            $query = "SELECT * FROM tasks WHERE task_id=".$_GET['id'];
            $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
            if(is_null($res)) {
                echo 'Task not found or has deleted<br>';
            }
            else {
                $task_info = mysqli_fetch_assoc($res);
                if(isset($_SESSION['autorised']) ) {
                    if(($_SESSION['user_id'] == $task_info['author_id']) ||
                        (($_SESSION['user_id'] == $task_info['user_id']) && $task_info['edit_by_user'])) {
                           $query = "SELECT user_name FROM users WHERE user_id=".$task_info['user_id'];
                            $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
                            $task_user = mysqli_fetch_array($res)[0];
                           echo '<input type="hidden" name="task_id" value="'.$task_info['task_id'].'">';
                           echo '<label for="task_name">Название задачи:</label>';
                           echo '<input type="text" class="task_name" name="task_name" value="'.$task_info['task_name'].'"><br>';
                           echo '<label for="datetask">Сроки задачи: </label>
            <div id="daterange">
		<input type="date" id="startdatetask" class="datetask" name="startdatetask" placeholder="Start date" value="'.preg_replace('#(\d{4})-(\d{2})-(\d{2})#','$3.$2.$1',$task_info['start_time']).'">';
        echo '<input type="date" id="enddatetask" class="datetask" name="enddatetask" placeholder="End date" value="'.preg_replace('#(\d{4})-(\d{2})-(\d{2})#','$3.$2.$1',$task_info['end_time']).'">
            </div>
                <label for="task_prior">Приоритет</label>';
            for($i = 1; $i <= 7; $i++) {
                    $str = '<input type="radio" value="'.$i.'" name="task_prior" class="task_prior" ';
                    if($i == intval($task_info['priority'])) {
                        $str = $str.' checked> '.$i;
                    }
                else {
                    $str = $str.'>'.$i;
                }
                echo $str;
            }
                        echo '
            <br>
            <label for="edit_by_user">Разрешить редактирование пользователем: </label>';
            $str = '<input type="checkbox" value="1" name="edit_by_user" class="edit_by_user" ';
                        if($task_info['edit_by_user'])
                            $str = $str.' checked>';
                        else
                            $str = $str.'>';
            echo $str;

            echo '<label for="task_user">Назначение пользователю: </label>
            <input type="text" class="task_user" id="task_user" name="task_user" placeholder="User" value="'.$task_user.'">
            <label for="task_comm">Комментарий: </label>
            <textarea type="text" rows="20" name="task_comm" id="task_comm" class="task_comm">'.$task_info['comment'].'</textarea><br>
            <input type="submit" id="createbtn">';
                    }
                    else {
                        $query = "SELECT user_name FROM users WHERE user_id=".$task_info['author_id'];
                        $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
                        echo 'Вы не можете редактировать эту задачу. Обратитесь к '.mysqli_fetch_array($res)[0].' для получения разрешений. Данные доступны только для чтения';
                        $query = "SELECT user_name FROM users WHERE user_id=".$task_info['user_id'];
                        $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
                        $task_user = mysqli_fetch_array($res)[0];
                        echo '<input disabled type="hidden" name="task_id" value="'.$task_info['task_id'].'">';
                        echo '<label for="task_name">Название задачи:</label>';
                        echo '<input disabled type="text" class="task_name" name="task_name" value="'.$task_info['task_name'].'"><br>';
                        echo '<label for="datetask">Сроки задачи: </label>
            <div id="daterange">
		<input type="date" disabled id="startdatetask" class="datetask" name="startdatetask" placeholder="Start date" value="'.preg_replace('#(\d{4})-(\d{2})-(\d{2})#','$3.$2.$1',$task_info['start_time']).'">';
                        echo '<input type="date" disabled id="enddatetask" class="datetask" name="enddatetask" placeholder="End date" value="'.preg_replace('#(\d{4})-(\d{2})-(\d{2})#','$3.$2.$1',$task_info['end_time']).'">
            </div>
                <label for="task_prior">Приоритет</label>';
                        for($i = 1; $i <= 7; $i++) {
                            $str = '<input disabled type="radio" value="'.$i.'" name="task_prior" class="task_prior" ';
                            if($i == intval($task_info['priority'])) {
                                $str = $str.' checked> '.$i;
                            }
                            else {
                                $str = $str.'>'.$i;
                            }
                            echo $str;
                        }
                        echo '
            <br>
            <label for="edit_by_user">Разрешить редактирование пользователем: </label>';
                        $str = '<input disabled type="checkbox" value="1" name="edit_by_user" class="edit_by_user" ';
                        if($task_info['edit_by_user'])
                            $str = $str.' checked>';
                        else
                            $str = $str.'>';
                        echo $str;

                        echo '<label for="task_user">Назначение пользователю: </label>
            <input type="text" disabled class="task_user" id="task_user" name="task_user" placeholder="User" value="'.$task_user.'">
            <label for="task_comm">Комментарий: </label>
            <textarea type="text" disabled rows="20" name="task_comm" id="task_comm" class="task_comm">'.$task_info['comment'].'</textarea>';
                    }
                }
                else {
                    echo 'Редактировать можно только <a href="/logpage.php">авторизовавшись</a>';
                }
            }
        }
        else {
            echo '<meta http-equiv="refresh" content="0;URL=/tasks.php">';
        }
        ?>
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