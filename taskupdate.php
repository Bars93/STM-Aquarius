<?php
require_once 'inc/init.inc';
session_start();
if (isset($_POST['task_name'])  && isset($_SESSION['autorised'])) {
    $task_id = mysqli_real_escape_string($db_connect,$_POST['task_id']);
    $task_name = mysqli_real_escape_string($db_connect, $_POST['task_name']);
    $start_date = mysqli_real_escape_string($db_connect, $_POST['startdatetask']);
    $end_date = mysqli_real_escape_string($db_connect, $_POST['enddatetask']);
    if(preg_match('#\d{2}.\d{2}.\d{4}#',$start_date) && preg_match('#\d{2}.\d{2}.\d{4}#',$end_date)) {
        $st_ar = explode('.',$start_date);
        $et_ar = explode('.',$end_date);
        $time_comp = date('Y-m-d',mktime(0,0,0,$st_ar[1],$st_ar[0],$st_ar[2])) <= date('Y-m-d',mktime(0,0,0,$et_ar[1],$et_ar[0],$et_ar[2]));
        echo ' '.date('Y-m-d',mktime(0,0,0,$st_ar[1],$st_ar[0],$st_ar[2])).' <= '.date('Y-m-d',mktime(0,0,0,$et_ar[1],$et_ar[0],$et_ar[2])).'<br>';
        if($time_comp) {
        $start_date = preg_replace('#(\d{2}).(\d{2}).(\d{4})#', '$3-$2-$1', $start_date);
        $end_date = preg_replace('#(\d{2}).(\d{2}).(\d{4})#', '$3-$2-$1', $end_date);
        }
        else {
            echo 'End date is earler start date!';
           echo '<meta http-equiv="refresh" content="0;URL=' . $_SERVER['HTTP_REFERER'] . '">';
            exit;
        }
    }
    else {
        echo 'Data format is not corrected
        , please enter it again!';
        echo '<meta http-equiv="refresh" content="0;URL=' . $_SERVER['HTTP_REFERER'] . '">';
        exit;
    }
    $edit_by_user = isset($_POST['edit_by_user']) ? TRUE : FALSE;
    $priority = $_POST['task_prior'];
    $task_user = mysqli_real_escape_string($db_connect, $_POST['task_user']);
    $task_comm = mysqli_real_escape_string($db_connect, $_POST['task_comm']);
    $query = 'SELECT author_id FROM tasks WHERE task_id =' . $task_id;
    $res = mysqli_query($db_connect, $query) or die("MySQLi error: " . mysqli_error($db_connect));
    if (!$edit_by_user && ($_SESSION['user_id'] == mysqli_fetch_array($res)[0])) {
        $edit_by_user = TRUE;
    }
    if (mb_strlen($task_name) > 0 && mb_strlen($start_date) > 0 &&
        mb_strlen($end_date) > 0 && mb_strlen($task_user) > 0
    ) {
        $query = 'SELECT user_id FROM `users` WHERE user_name="' . $task_user . '"';
        $res = mysqli_query($db_connect, $query) or die("MySQLi error: " . mysqli_error($db_connect));
        if (mysqli_num_rows($res) != 0) {
            $task_uid = mysqli_fetch_array($res)[0];
            $query = "UPDATE tasks SET task_name = '" . $task_name . "', user_id=" . $task_uid . ", priority=" . $priority;
            $query = $query . ", last_edit=NOW(), last_editor=" . $_SESSION['user_id'] . ",start_time='" . $start_date;
            $query = $query . "',end_time='" . $end_date . "',comment='" . $task_comm . "',edit_by_user=" . $edit_by_user;
            if (isset($_POST['stop_task']))
                $query = $query . ' , stop_time=NOW() ';
            $query = $query . " WHERE task_id=" . $task_id;
            $res = mysqli_query($db_connect, $query) or die("MySQLi error: " . mysqli_error($db_connect));
            echo 'Task updated successfully';
            echo '<meta http-equiv="refresh" content="0;URL=/tasks.php">';
            exit;
        } else {
            echo 'User not found! Edit data of task again!';
            echo '<meta http-equiv="refresh" content="2;URL=' . $_SERVER['HTTP_REFERER'] . '">';
            exit;
        }
    } else {
        echo 'Some data is null! Edit data of task again!';
        echo '<meta http-equiv="refresh" content="2;URL=' . $_SERVER['HTTP_REFERER'] . '">';
        exit;
    }
}
else if(isset($_POST['task_comm']) && isset($_SESSION['autorised'])) {
    $task_id = mysqli_real_escape_string($db_connect,$_POST['task_id']);
    $task_comm = mysqli_real_escape_string($db_connect,$_POST['task_comm']);
        $query = "UPDATE tasks SET ";
        $query = $query . " last_edit=NOW(), last_editor=" . $_SESSION['user_id'];
        $query = $query ." ,comment='" . $task_comm . "'";
        if (isset($_POST['stop_task']))
            $query = $query . ' , stop_time=NOW() ';
        $query = $query . " WHERE task_id=" . $task_id;
        echo "Q:  ".$query.'<br>';
        $res = mysqli_query($db_connect, $query) or die("MySQLi error: " . mysqli_error($db_connect));
        echo 'Task updated successfully';
        echo '<meta http-equiv="refresh" content="0;URL=/tasks.php">';
        exit;
}
else {
    echo '<a href="/logpage.php">Авторизуйтесь</a>, чтобы редактировать задачу!!';
    echo '<meta http-equiv="refresh" content="2;URL=/logpage.php">';
    exit;
}
