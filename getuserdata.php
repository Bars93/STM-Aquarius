<?php
require_once 'inc/init.inc';
header("Content-type: text/xml");
echo chr(60) . chr(63) . 'xml version="1.0" encoding="utf-8" ' . chr(63) . chr(62);
?>
<list>
    <?php
    session_start();
    if (isset($_SESSION['autorised']) && isset($_POST['uid'])) {
        $user_id = intval($_POST['uid']);
            $query = "SELECT * from users WHERE user_id=".$user_id;
            $res = mysqli_query($db_connect,$query) or die("MySQLi error: ");
            $userdata = mysqli_fetch_assoc($res);
            if(!is_null($userdata)) {
                echo '<userinfo>';
                echo '<user_id>'.$user_id.'</user_id>';
                echo '<user_name>'.$userdata['user_name'].'</user_name>';
                if(is_null($userdata['user_full_name'])){
                    echo '<full_name></full_name>';
                }
                else {
                    echo '<full_name>'.$userdata['user_full_name'].'</full_name>';
                }
                echo '<e_mail>'.$userdata['email'].'</e_mail>';
                echo '<avatar>'.$userdata['img_path'].'</avatar>';
                echo '<rows>'.$userdata['rows_per_page'].'</rows>';
                echo '<regdate>'.$userdata['regdate'].'</regdate>';
                echo '</userinfo>';
                echo '<error><text>no</text></error>';
            }
            else {
                echo '<error><text>User not found!</text></error>';
            }
    }
    else {
        echo '<error><text>You are not authorised or input data had not send</text></error>';
    }
    ?>

</list>