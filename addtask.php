<?php
require_once 'inc/init.inc';
session_start();
if(isset($_POST['taskname']) && isset($_SESSION['autorised'])) {
    $task_name = mysqli_real_escape_string($db_connect,$_POST['taskname']);
    $start_date = mysqli_real_escape_string($db_connect,$_POST['startdatetask']);
    $start_date = preg_replace('#(\d{2}).(\d{2}).(\d{4})#','$3-$2-$1',$start_date);
    $end_date = mysqli_real_escape_string($db_connect,$_POST['enddatetask']);
    $end_date = preg_replace('#(\d{2}).(\d{2}).(\d{4})#','$3-$2-$1',$end_date);
    $task_user = mysqli_real_escape_string($db_connect,$_POST['task_user']);
    $task_comm = mysqli_real_escape_string($db_connect,$_POST['task_comm']);
    if(mb_strlen($task_name) > 0 && mb_strlen($start_date) > 0 &&
        mb_strlen($end_date) > 0 && mb_strlen($task_user) > 0 && mb_strlen($task_comm) > 0 ) {
        $query = 'SELECT COUNT(1) FROM `tasks`';
        $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
        $tasks_count = mysqli_fetch_array($res)[0];
        $tasks_count += 1;
        $query = 'SELECT user_id FROM `users` WHERE user_name="'.$task_user.'"';
        $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
        if(mysqli_num_rows($res) != 0) {
            $task_uid = mysqli_fetch_array($res)[0];
            echo "<br> Task_uid = ".$task_user;
        $query = 'INSERT INTO `tasks` VALUES(NULL,"'.$task_name.'","'.$_SESSION["user_id"].'",'.$task_uid.',4,NOW(),"'.$start_date.'","'.$end_date.'","'.$task_comm.'")';

            $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
            echo 'Task added successfully';
            echo '<meta http-equiv="refresh" content="0;URL=/tasks.php">';
            exit;
        }

        else {
            echo 'User not found!';
            echo '<meta http-equiv="refresh" content="0;URL=/tasks.php">';
            exit;
        }

    }
    else {
        echo '<meta http-equiv="refresh" content="0;URL=/tasks.php"';
        exit;
    }
}