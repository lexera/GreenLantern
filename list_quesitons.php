<?php
$configs = include ('config.php');
$connect = mysqli_connect($configs['host'], $configs['username'], $configs['password'],$configs['db_name']);
$result = mysqli_query($connect, "SELECT * FROM questions WHERE status = 'active'");
echo "<table id='question_list'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . substr($row['question'], 0, 100) . "...</td></tr>";
}
echo "</table>";
?>