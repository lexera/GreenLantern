<?php
session_start();
if(!(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')){
    header("Location: index.php");}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Администрирование</title>
</head>
<body>
    <div id="leftmenu" class="light-grey" style="padding-top: 40px;">
        <a href="admin/questions.php">Список вопросов</a>
        <a href="admin/questions_add.php">Добавить вопрос</a>
        <a href="admin/results.php">Результаты студентов</a>
    </div>
    <div id="exit" >
        <a href="logout.php">Выход</a>
    </div>
</body>
</html>