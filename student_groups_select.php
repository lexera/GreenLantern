<?php
include('db.php');

$query = "SELECT DISTINCT student_group FROM users";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['student_group'] . "'>" . $row['student_group'] . "</option>";
}

?>