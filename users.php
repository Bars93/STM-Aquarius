<!DOCTYPE html>
<?php
require_once 'inc/init.inc';
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
        <table class="userstable">
            <tr>
                <th>
                    Пользователь
                </th>
                <th>
                    Количество задач
                </th>
                <th>
                    Создано задач
                </th>
            </tr>
            <?php
            $query = "SELECT COUNT(1) FROM `users`";
            $res = mysqli_query($db_connect, $query) or die('MySQLi error: ' . mysqli_error($db_connect));
            $user_count = mysqli_fetch_array($res)[0];
            if (!$user_count)
                echo '<tr><td colspan="3">Нет пользователей в системе!</td></tr>';
            else {
                $query = 'SELECT user_id,user_name FROM `users`';
                $res = mysqli_query($db_connect, $query) or die('MySQLi error: ' . mysqli_error($db_connect));
                if (!is_null($res)) {
                    while ($users = mysqli_fetch_assoc($res)) {
                        $query = 'SELECT COUNT(1) FROM `tasks` WHERE user_id=' . $users['user_id'];
                        $count_res = mysqli_query($db_connect, $query) or die('MySQLi error: ' . mysqli_error($db_connect));
                        $task_count = mysqli_fetch_array($count_res)[0];
                        $query = 'SELECT COUNT(1) FROM `tasks` WHERE author_id=' . $users['user_id'];
                        $count_res = mysqli_query($db_connect, $query) or die('MySQLi error: ' . mysqli_error($db_connect));
                        $task_created = mysqli_fetch_array($count_res)[0];
                        echo '<tr><td><a href="settings.php?id=' . $users['user_id'] . '">' . $users['user_name'] . '</a></td><td>' . $task_count . '</td><td>' . $task_created . '</td></tr>';
                    }

                }
            }

            ?>
            <!--<tr>
            <td><a href="users.php?id=1">irbis</a></td>
            <td>1</td>
            <td>1</td>
            </tr>-->
        </table>
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