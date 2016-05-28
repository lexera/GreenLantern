<?php
include("db.php");
include("toolbox.php");
session_start();
$user_id = $_SESSION['id'];

$query1 = "SELECT * FROM questions WHERE status = 'active' AND id NOT IN
  (SELECT question_id FROM user_answers WHERE user_id = $user_id) LIMIT 1";
if($result = $mysqli->query($query1)) {
    $row = $result->fetch_assoc();
    $result->close();
    $question_id = $row['id'];
    $_SESSION['question_id'] = $row['id'];
} else alert_redirect("Тест окончен", "dashboard.php");

$query2 = "SELECT * FROM answers WHERE status = 'active' AND question_id = $question_id";

if($answer = $mysqli->query($query2)) {
    echo "<label>Вопрос</label>";
    echo "<textarea readonly id=\"question\" name=\"question\" rows=\"10\">"
        . $row['question'] . "</textarea><br>";
    $counter = 1;

    while ($answ_row = $answer->fetch_assoc()) {
        echo "<label>Ответ " . $counter . "</label>";
        echo "<input type=\"checkbox\" name=\"correctness" . $counter . "\">правильный<br>";
        echo "<textarea readonly class=\"answer\" name=\"answer" . $counter
            . "\" rows=\"4\">" . $answ_row['answer'] . "</textarea><br>";
        $_SESSION['answer_id'][$counter - 1] = $answ_row['id'];
        $_SESSION['correct'][$counter - 1] = $answ_row['correct'];
        $counter++;
    }
} else alert_redirect("Тест окончен", "dashboard.php");
$answer->close();

?>