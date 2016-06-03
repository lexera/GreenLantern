<?php
header('Content-Type: text/html; charset=utf-8');
require 'results.php';
include 'toolbox.php';
include 'db.php';


if(isset($_POST['city'])) { $city = $_POST['city']; }
if($city === '') { unset($city); }
if(isset($_POST['group'])) { $group = $_POST['group']; }
if($group === '') { unset($group); }

if(isset($_POST['datefrom'])) {
    $datefrom = date_format(DateTime::createFromFormat('Y-m-d', $_POST['datefrom']), 'Y/m/d');
}
if($datefrom === '') { unset($datefrom); }
if(isset($_POST['dateto'])) {
    $dateto =  date_format(DateTime::createFromFormat('Y-m-d', $_POST['dateto']), 'Y/m/d');
}
if($dateto === '') { unset($dateto); }

date_default_timezone_set('Europe/Kiev');

$error = false;
$query1 = "SELECT first_name, last_name,  login_email, cor_answers,
            q_answered, cities.city_name as city, student_group, t.date_created as date
            FROM
                (SELECT date_created, SUM(correctness) as cor_answers, COUNT(question_id) as q_answered, user_id
                 FROM user_scores
                 GROUP BY user_id, date_created) as t
            JOIN users ON t.user_id = users.id
            JOIN cities ON cities.id = users.city
            WHERE t.date_created >= ? AND t.date_created <= ?";
$show_results = $mysqli->prepare($query1);
if($city === "all" && $group === "all") {
    $show_results = $mysqli->prepare($query1);
    $show_results->bind_param("ss", $datefrom, $dateto);
} elseif ($group === "all") {
    $query1 .= " AND users.city = ?";
    $show_results = $mysqli->prepare($query1);
    $show_results->bind_param("sss", $datefrom, $dateto, $city);
} elseif ($city === "all") {
    $query1 .= " AND users.student_group  = ?";
    $show_results = $mysqli->prepare($query1);
    $show_results->bind_param("sss", $datefrom, $dateto, $group);
} else {
    $query1 .= " AND users.city = ? AND users.student_group = ?";
    $show_results = $mysqli->prepare($query1);
    $show_results->bind_param("ssss", $datefrom, $dateto, $city, $group);
}

$show_results->execute() ? $error = false : $error = true;
$result = $show_results->get_result();
$rows_number = mysqli_num_rows($result);

echo "<table class='mainblock'><tr>"
    ."<th>Имя</th>"."<th>Фамилия</th>"."<th>Отвечено вопросов</th>"
    ."<th>Правильные ответы</th>"."<th>Город</th>"."<th>Группа</th>"."<th>Дата</th></tr>";

while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['first_name'] . "</td>"
            . "<td>" . $row['last_name'] . "</td>"
            . "<td>" . $row['q_answered'] . "</td>"
            . "<td>" . $row['cor_answers'] . "</td>"
            . "<td>" . $row['city'] . "</td>"
            . "<td>" . $row['student_group'] . "</td>"
            . "<td>" . $row['date'] . "</td></tr>";
}
echo "</table>";
$show_results->close();


?>
