<?php
$configs = include ('config.php');
$connect = mysqli_connect($configs['host'], $configs['username'], $configs['password'],$configs['db_name']);
$result = mysqli_query($connect, "SELECT * FROM cities");
?>