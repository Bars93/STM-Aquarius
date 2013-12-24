<?php
require_once 'inc/init.inc';
session_start();
if(isset($_POST['taskname']) && isset($_SESSION['autorised'])) {
    $task_name = mysqli_real_escape_string($db_connect,$_POST['taskname']);
    $start_date = mysqli_real_escape_string($db_connect,$_POST['startdatetask']);
    $start_date = preg_replace('#(\d{2}).(\d{2}).(\d{4})#','$3-$2-$1',$start_date);
    $end_date = mysqli_real_escape_string($db_connect,$_POST['enddatetask']);
    $end_date = preg_replace('#(\d{2}).(\d{2}).(\d{4})#','$3-$2-$1',$end_date);
    $edit_by_user = isset($_POST['edit_by_user']) ? TRUE : FALSE;
    $priority = $_POST['task_prior'];
    $task_user = mysqli_real_escape_string($db_connect,$_POST['task_user']);
    $task_comm = mysqli_real_escape_string($db_connect,$_POST['task_comm']);
    if(mb_strlen($task_name) > 0 && mb_strlen($start_date) > 0 &&
        mb_strlen($end_date) > 0 && mb_strlen($task_user) > 0 && mb_strlen($task_comm) > 0 ) {
        $query = 'SELECT user_id FROM `users` WHERE user_name="'.$task_user.'"';
        $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
        if(mysqli_num_rows($res) != 0) {
            $task_uid = mysqli_fetch_array($res)[0];

        $query = 'INSERT INTO `tasks` VALUES(NULL,"'.$task_name.'",'.$_SESSION["user_id"].','.$task_uid.','.$priority.',NOW(),NOW(),'.$_SESSION["user_id"].',"'.$start_date.'","'.$end_date.'",NULL,"'.$task_comm.'",'.$edit_by_user.')';

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