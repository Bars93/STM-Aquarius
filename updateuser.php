<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 10.01.14
 * Time: 15:16
 */
require_once 'inc/init.inc';
@session_start();
if(isset($_SESSION['autorised'])) {
    $id = intval(mysqli_real_escape_string($db_connect,$_POST['id']));
    $name = mysqli_real_escape_string($db_connect,$_POST['name']);
    $fullname = mysqli_real_escape_string($db_connect,$_POST['fname']);
    $mail = mysqli_real_escape_string($db_connect,$_POST['email']);
    $row_per_page = mysqli_real_escape_string($db_connect,$_POST['rpp']);
    if(mb_strlen($name) <= 25) {
        if (preg_match('.@.', $mail)) {
            $query = 'UPDATE users SET user_name="'.$name.'", user_full_name="'.$fullname.'", email="'.$mail.'", rows_per_page='.$row_per_page;
            $query = $query.' WHERE user_id='.$id;
            $res = mysqli_query($db_connect,$query) or die('MySQLi error: '.mysqli_error($db_connect));
            echo '  correct';
            $_SESSION['user_name'] = $name;
            $_SESSION['user_full_name'] = $fullname;
            $_SESSION['tasks_count'] = $row_per_page;
        }
        else {
            echo 'email format is wrong';
        }
    }
    else {
        echo 'user name is too short';
    }
}
else {
    echo 'вы не авторизованны или произошла ошибка в передаче данных';
}



mysqli_close($db_connect);