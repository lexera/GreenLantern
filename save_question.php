<?php
header('Content-Type: text/html; charset=utf-8');
include 'toolbox.php';
if(isset($_POST['question'])) { $question = $_POST['question']; }
if($question === '') { unset($question); }
if(isset($_POST['answer1'])) { $answer1 = $_POST['answer1']; }
if($answer1 === '') { unset($answer1); }
if(isset($_POST['answer2'])) { $answer2 = $_POST['answer2']; }
if($answer2 === '') { unset($answer2); }
if(isset($_POST['answer3'])) { $answer3 = $_POST['answer3']; }
if($answer3 === '') { unset($answer3); }
if(isset($_POST['answer4'])) { $answer4 = $_POST['answer4']; }
if($answer4 === '') { unset($answer4); }

if (empty($question) || empty($answer3) || empty($answer1) || empty($answer2) || empty($answer4)) {
    exit("Заполните все поля формы!");
}

$answer1_correct = (isset($_POST['correctness1'])) ? 1 : 0;
$answer2_correct = (isset($_POST['correctness2'])) ? 1 : 0;
$answer3_correct = (isset($_POST['correctness3'])) ? 1 : 0;
$answer4_correct = (isset($_POST['correctness4'])) ? 1 : 0;

include("db.php");
date_default_timezone_set('Europe/Kiev');
$curdate = date('Y/m/d', time());
$status = "active";

$error = false;
$query1 = "INSERT INTO questions (question, date_created, status)VALUES (?,?,?)";
$question_add_result = $mysqli->prepare($query1);
$question_add_result->bind_param("sss", $question, $curdate, $status);
$question_add_result->execute() ? $error = false : $error = true;
$question_add_result->close();


$q_id = $mysqli->insert_id;
$answers = array($answer1, $answer2, $answer3, $answer4);
$correctness = array($answer1_correct, $answer2_correct, $answer3_correct, $answer4_correct);

$query2 = "INSERT INTO answers (answer, date_created, question_id, correct, status) VALUES (?,?,?,?,?)";
$answer_add_result = $mysqli->prepare($query2);
$ansinsert = "";
$corinsert = "";
$answer_add_result->bind_param("ssiss", $ansinsert, $curdate, $q_id, $corinsert, $status );

for($i = 0; $i < 4; $i++) {
    $ansinsert = $answers[$i];
    $corinsert = $correctness[$i];
    $answer_add_result->execute();
}

$answer_add_result->close();
if($error) {
    alert_redirect("Вопрос не был добавлен!", "questions_add.php");
} else {
    alert_redirect("Вопрос успешно добавлен!", "questions_add.php");
}
?>

