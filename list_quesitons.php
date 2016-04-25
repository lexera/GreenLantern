<?php

include("db.php");
$result = $mysqli->query("SELECT * FROM questions WHERE status = 'active'");
echo "<table id='question_list'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . substr($row['question'], 0, 100) . "...</td></tr>";
}
echo "</table>";
?>