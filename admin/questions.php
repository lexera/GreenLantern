<?php
session_start();
if(!(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')){
    header("Location: index.php");}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>Добавить вопрос</title>
    <script type="text/javascript" src="admin.js"></script>
</head>
<body>
<div id="leftmenu" class="light-grey" style="padding-top: 40px;">
    <a href="questions.php" class="active">Список вопросов</a>
    <a href="questions_add.php">Добавить вопрос</a>
    <a href="results.php">Результаты студентов</a>
</div>
<div id="exit" >
    <a href="../logout.php">Выход</a>
</div>
</body>

