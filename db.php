<?php
header('Content-Type: text/html; charset=utf-8');
$configs = include ('config.php');
$db = mysqli_connect($configs['host'], $configs['username'], $configs['password'],$configs['db_name']);
mysqli_select_db($db, "greenLantern");

$mysqli = new mysqli($configs['host'], $configs['username'], $configs['password'],$configs['db_name']);

?>