<?php
require_once 'inc/init.inc';
header("Content-type: text/xml");
echo chr(60). chr(63).'xml version="1.0" encoding="UTF-8" ' . chr(63) .chr(62);

?>
<list>
    <?php
    $user_name = isset($_GET['user_name']) ? urldecode($_GET['user_name']) : "";
    $user_name = mysqli_real_escape_string($db_connect,$user_name);
    $query = "SELECT user_id FROM users WHERE user_name='".$user_name."'";
    $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
    $user = mysqli_fetch_array($res)[0];
    echo '<result><taken>';
    if(is_null($user)) {
        echo 'false';
    }
    else {
        echo 'true';
    }
    echo '</taken></result>';
    ?>
</list>