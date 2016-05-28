<?php
header('Content-Type: text/html; charset=utf-8');
include 'toolbox.php';
include 'db.php';
session_start();

$answer1_correct = (isset($_POST['correctness1'])) ? 1 : 0;
$answer2_correct = (isset($_POST['correctness2'])) ? 1 : 0;
$answer3_correct = (isset($_POST['correctness3'])) ? 1 : 0;
$answer4_correct = (isset($_POST['correctness4'])) ? 1 : 0;

$user_id = $_SESSION["id"];
$q_id = $_SESSION['question_id'];

date_default_timezone_set('Europe/Kiev');
$curdate = date('Y/m/d', time());

$error = false;
$query1 = "INSERT INTO user_answers (user_id, question_id, answer_id, date_created) VALUES (?,?,?,?)";
$answer_add_result = $mysqli->prepare($query1);
$answer_id = "";
$empty_flag = 0;
$answer_add_result->bind_param("ssss", $user_id, $q_id, $answer_id, $curdate);

$correctness = array($answer1_correct, $answer2_correct, $answer3_correct, $answer4_correct);

$score = 0;
$correct = 0;
$query2 = "INSERT INTO user_scores (user_id, question_id, correctness, date_created) VALUES (?,?,?,?)";
$score_add = $mysqli->prepare($query2);
$score_add->bind_param("ssss", $user_id, $q_id, $correct, $curdate);

//добавляем каждый положительный ответ в таблицу ответов
for($i = 0; $i < 4; $i++) {
    if ($correctness[$i] > 0) {
        $answer_id = $_SESSION['answer_id'][$i];
        $answer_add_result->execute() ? $error = false : $error = true;
        $empty_flag++;
    };
    if ($correctness[$i] == $_SESSION['correct'][$i]) {
        $score++;
    }
}
if($empty_flag === 0) {
    alert_redirect("Выберете хотя бы один правильный вариант ответа!", "test_start.php");
}
$answer_add_result->close();

//Добавляем результат ответа в агрегированную таблицу
if ($score === 4) {
    $correct = 1;
} else { $correct = 0; }
$score_add->execute() ? $error = false : $error = true;
$score_add->close();

if($error) {
    alert_redirect("Ответ не был добавлен!", "test_start.php");
} else {
    header('Location: test_start.php');
}

?>