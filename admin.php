<?php
session_start();
if(!(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')){
    header("Location: index.php");
    exit();
}
$page = 'admin';
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Администрирование</title>
</head>
<body>
    <?php
    require 'leftmenu.php';
    ?>
</body>
</html>