<?php
include('db.php');

$query = "SELECT * FROM cities";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$result = $stmt->get_result();


while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['city_name'] . "</option>";
}

?>