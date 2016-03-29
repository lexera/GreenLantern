<?php
session_start();
if(!(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')){
    header("Location: index.php");}
$page = 'questions';
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Добавить вопрос</title>
    <script type="text/javascript" src="admin.js"></script>
</head>
<body>
    <?php
    require 'leftmenu.php';
    ?>
</body>

