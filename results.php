<?php
session_start();
if(!(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')){
    header("Location: index.php");}
$page = 'results';
$access = 'admin';
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Результаты</title>
    <script type="text/javascript" src="admin.js"></script>

</head>
<body>
    <?php
    require 'leftmenu.php';
    ?>
    <form class="mainblock" action="show_student_results.php" method="post">
        <br><label>Город:</label>
        <?php
        echo "<select name='city'>";
        echo "<option value='all'>все</option>";
        include ('cities_select.php');
        echo "</select>";
        ?><br>
        <label>Группа:</label>
        <?php
        echo "<select name='group'>";
        echo "<option value='all'>все</option>";
        include ('student_groups_select.php');
        echo "</select>";
        ?><br>
        <label>Дата сдачи c:</label>
        <input type="date" name="datefrom" <?php echo "value='".date("Y-m-d", strtotime("-1 week"))."'"?>><br>
        <label>Дата сдачи по:</label>
        <input type="date" name="dateto" <?php echo "value='".date("Y-m-d")."'"?>><br>
        <p>
            <input type="submit" name="submit" value="Показать результаты">
        </p><br>

    </form><br>
</body>

