<?php
session_start();
if(!(isset($_SESSION['role']) && $_SESSION['role'] == 'student')){
    header("Location: index.php");
    exit();
}
$access = 'user';
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Главная страница</title>
</head>
<body>
    <?php
    require 'leftmenu.php';
    ?>

</body>
</html>