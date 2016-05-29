<?php

$configs = include ('config.php');
$mysqli = new mysqli($configs['host'], $configs['username'], $configs['password'],$configs['db_name']);

?>