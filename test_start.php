<?php
session_start();
if(!(isset($_SESSION['role']) && $_SESSION['role'] == 'student')){
    header("Location: index.php");
    exit();
}
$page = 'test_start';
$access = 'user';
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Тестирование</title>
</head>
<body>
    <?php
    require 'leftmenu.php';
    ?>
    <form action="user_answer.php" method="post">

        <div class="mainblock">
            <?php
            require 'load_question.php';
            ?>

            <input type="submit" name="submit" value="Ответить">
        </div>
    </form>
</body>
</html>