<!DOCTYPE html>
<?php
require_once 'inc/init.inc';
session_start();
if(isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
}
else if(isset($_SESSION['autorised'])) {
	$user_id = intval($_SESSION['user_id']);
}
else {
	$user_id = -1;
}
?>
<html lang="ru">
<head>
    <title>СУЗ Aquarius</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/users.css">
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
    <script type="text/javascript" src="js/jquery.typing-0.2.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.usersettings.js"></script>
    <script type="text/javascript" src="js/jquery.us_nickvalid.js"></script>
    <script type="text/javascript" src="js/jquery.us_valid.js"></script>
    <script type="text/javascript" src="js/jquery.emailvalid.js"></script>
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
    <article id="showuser">
        <?php
        $query = 'SELECT user_name,user_full_name,email,img_path,regdate FROM users WHERE user_id='.$user_id;
        $res = mysqli_query($db_connect,$query) or die("MySQLi error: ".mysqli_error($db_connect));
        if((!is_null($res)) && $user_id != -1) {
            $user_info = mysqli_fetch_array($res);
        echo'<h1>Профиль пользователя</h1>
        <table class="userinfo">
            <thead>
            <tr>
                <th colspan="2">
                <div class="nickname">'.$user_info['user_name'].'
                </div>
                <div class="fullname">'
                    .$user_info["user_full_name"].'
                </div>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="avatar">
                    <img src="'.$user_info['img_path'].'">
                </td>
                <td>
                     <div class="headinfo">
                     E-mail
                       </div>
                     <div class="info">'.$user_info['email'].'
                     </div>
                </td>
            </tr>
            <tr>
                <td>
                    <small>'.$user_info['regdate'].'</small>
                </td>
                <td>';
            if(isset($_SESSION['autorised']) && $_SESSION['user_id']==$user_id)
                    echo '<input type="button" class="editbtn" value="Редактировать" id="editbtn">';
                echo '</td>
            </tr>
            </tbody>
        </table>';
        }
        else {
            echo '<div class="error">Такой пользователь не найден</div>';
        }
        ?>
    </article>
</section>
<?php
echo'<script type="text/javascript">
    <!--
    $(document).ready(function() {
        nickok = false;
        $("#editbtn").usersettings('.$user_id.');
    });
        //-->
</script>';
?>
<footer>
    <div class="footer_block">
        <?php
        include_once 'footer.php';
        ?>
    </div>
</footer>
</body>
</html>