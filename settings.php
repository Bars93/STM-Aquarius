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
    <script type="text/javascript" src="js/jquery.usersettings.js"></script>
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
        <h1>Профиль пользователя</h1>
        <table class="userinfo">
            <thead>
            <tr>
                <th colspan="2">
                <div class="nickname">
                    irbis
                </div>
                <div class="fullname">
                    Попов Даниил
                </div>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="avatar">
                    <img src="img/default.png">
                </td>
                <td>
                     <div class="headinfo">
                         E-mail
                     </div>
                     <div class="info">
                         dan93irbis@mail.ru
                     </div>
                </td>
            </tr>
            <tr>
                <td>
                    etc.
                </td>
            </tr>
            </tbody>
        </table>
    </article>

</section>
<?php
echo'<script type="text/javascript">
    <!--
    $(document).ready(function() {
        newpassok = false;
        $(this).usersettings('.$user_id.');
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