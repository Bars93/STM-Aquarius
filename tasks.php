<?php
require_once 'inc/init.inc';
@session_start();
?>
<!DOCTYPE html>

<html lang="ru">
<head>
    <title>СУЗ Aquarius</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/tasks.css">
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
    <!--	<iframe src="header.html" scrolling="no" class="pagehdr"></iframe>-->
    <div class="hdr_block">
        <?php
        include_once 'header.php';
        ?>
    </div>
</header>
<nav>
    <!--<iframe class="menuif" src="nav.html" scrolling="no"></iframe>-->
    <div class="nav_block">
        <?php
        include_once 'nav.php';
        ?>
    </div>
</nav>
<section class="bodysec">
    <article>
        <h1>Текущие задачи системы</h1>
        <?php
        $query = 'SELECT COUNT(1) FROM `tasks`';
        $res = mysqli_query($db_connect, $query) or die('MySQL access error: ' . mysqli_error($db_connect));
        $tasks_count = mysqli_fetch_array($res)[0];
        $tasks_per_page = (isset($_SESSION['tasks_count'])) ? $_SESSION['tasks_count'] : 5;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        $totalpages = ceil($tasks_count / $tasks_per_page);
        if ($page > $totalpages) {
            $page = $totalpages;
            echo '<meta http-equiv="refresh" content="0;URL=/tasks.php?page=' . $page . '">';
        }
        if ($page < 1) {
            $page = 1;
            echo '<meta http-equiv="refresh" content="0;URL=/tasks.php?page=' . $page . '">';
        }

        if ($totalpages - 1 != 0) {
            echo '<ul class="paging">';
            if ($page == 1) {
                echo '<li><a href="/tasks.php?page=1"  id="curpage_container">1</a></li>';
            } else {
                echo '<li><a href="/tasks.php?page=1"  class="pages_container">1</a></li>';
            }
            if ($page - 3 > 1)
                echo '...';
            for ($i = $page - 3; $i <= $page + 3; $i++) {
                if (($i < $totalpages) && $i > 1) {

                    if ($i == $page) {
                        echo '<li><a href="/tasks.php?page=' . $i . '"  id="curpage_container">' . $i . '</a></li>';
                    } else {
                        echo '<li><a href="/tasks.php?page=' . $i . '"  class="pages_container">' . $i . '</a></li>';
                    }
                }
            }
            if ($page + 3 < $totalpages)
                echo '...';
            if ($page == $totalpages) {
                echo '<li><a href="/tasks.php?page=' . $totalpages . '"  id="curpage_container">' . $totalpages . '</a></li>';
            } else {
                echo '<li><a href="/tasks.php?page=' . $totalpages . '"  class="pages_container">' . $totalpages . '</a></li>';
            }
            echo '</ul>';
        }
        $lim_start = ($page - 1) * $tasks_per_page;

        ?>
        <table class="tasks">
            <tr>
            <th>Задача</th>
            <th>Пользователь</th>
            <th>Приоритет</th>
            <th>Сроки</th>
            <th>Подробности</th>
            <?php
            if (!$tasks_count) {
                echo '<tr><td colspan="5">В настоящее время задач нет</td></tr>';
            } else {
                $query = "SELECT * FROM `tasks` WHERE stop_time IS NULL OR stop_time = 0 ORDER BY create_time LIMIT $lim_start,$tasks_per_page";
                $res = mysqli_query($db_connect, $query) or die('MySQL access error: ' . mysqli_error($db_connect));
                while ($resar = mysqli_fetch_assoc($res)) {
                    $query = "SELECT user_id,user_name FROM `users` WHERE user_id='" . $resar['author_id'] . "'";
                    $res_user = mysqli_query($db_connect, $query) or die('MySQL access error: ' . mysqli_error($db_connect));
                    if ($res_user) {
                        echo '<tr><td><a href="taskedit.php?id=' . $resar['task_id'] . '">';
                        if (mb_strlen($resar['task_name']) <= 20) {
                            echo $resar['task_name'] . '</a></td>';
                        } else {
                            echo mb_substr($resar['task_name'], 0, 20) . ' ...</a></td>';
                        }
                        echo '<td><a href="settings.php?id=' . $resar['author_id'] . '">' . mysqli_fetch_array($res_user)['user_name'];
                        echo '</a></td>';
                        echo '<td>' . $resar['priority'] . '</td><td>' . preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$3.$2.$1', $resar['start_time']);
                        echo ' - ' . preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$3.$2.$1', $resar['end_time']) . '</td>';
                        if (mb_strlen($resar['comment']) < 31) {
                            echo '<td>' . $resar['comment'] . '</td></tr>';
                        } else {
                            echo '<td>' . mb_substr($resar['comment'], 0, 30) . '...</td></tr>';
                        }
                    }
                }
            }
            ?>
        </table>
        <?php
        if ($totalpages - 1 != 0) {
            echo '<ul class="paging">';
            if ($page == 1) {
                echo '<li><a href="/tasks.php?page=1"  id="curpage_container">1</a></li>';
            } else {
                echo '<li><a href="/tasks.php?page=1"  class="pages_container">1</a></li>';
            }
            if ($page - 3 > 1)
                echo '...';
            for ($i = $page - 3; $i <= $page + 3; $i++) {
                if (($i < $totalpages) && $i > 1) {
                    if ($i == $page) {
                        echo '<li><a href="/tasks.php?page=' . $i . '"  id="curpage_container">' . $i . '</a></li>';
                    } else {
                        echo '<li><a href="/tasks.php?page=' . $i . '"  class="pages_container">' . $i . '</a></li>';
                    }
                }
            }
            if ($page + 3 < $totalpages)
                echo '...';
            if ($page == $totalpages) {
                echo '<li><a href="/tasks.php?page=' . $totalpages . '"  id="curpage_container">' . $totalpages . '</a></li>';
            } else {
                echo '<li><a href="/tasks.php?page=' . $totalpages . '"  class="pages_container">' . $totalpages . '</a></li>';
            }
            echo '</ul>';
        }
        ?>
        <a href="createtask.php" class="createtaskbtn">Создать задачу</a>
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