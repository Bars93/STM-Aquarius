<?php
require_once 'inc/init.inc';
if (@session_start()) {
    if (isset($_POST['loginp'])) {
        $login_name = mysqli_real_escape_string($db_connect, $_POST['loginp']);
        $login_pw = md5(mysqli_real_escape_string($db_connect, $_POST['passinp']) . SALTCONSTANT);
        $query = 'SELECT * FROM ' . USERSTABLE . ' WHERE user_name="' . $login_name . '" AND password="' . $login_pw . '"';
        $res = mysqli_query($db_connect, $query) or trigger_error('MySQLi error: ' . mysqli_error($res) . '<br> Query: ' . $query);
        if ($data = mysqli_fetch_assoc($res)) {
            $_SESSION['user_id']
                = $data['user_id'];
            $_SESSION['user_name'] = $data['user_name'];
            $_SESSION['access_ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['autorised'] = 1;
            unset($_SESSION['incorrect']);
            echo '<meta http-equiv="refresh" content="0;URL=' . $_SERVER['HTTP_REFERER'] . '">';
            $_SESSION['tasks_count'] = 5;
            exit;
        } else {
            $_SESSION['incorrect'] = 1;
            exit;
        }
    }
    if (isset($_SESSION['action']) && $_SESSION['action'] == 'logout') {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;URL=' . $_SERVER['HTTP_REFERER'] . '">';
        exit;
    }

} else {
    echo 'Session error!';
}