<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['question'])) {
    $question = $_POST['question'];
}
if($question === '') {
    unset($question);
}
if(isset($_POST['answer1'])) {
    $answer1 = $_POST['answer1'];
}
if($answer1 === '') {
    unset($answer1);
}
if(isset($_POST['answer2'])) {
    $answer2 = $_POST['answer2'];
}
if($answer2 === '') {
    unset($answer2);
}
if(isset($_POST['answer3'])) {
    $answer3 = $_POST['answer3'];
}
if($answer3 === '') {
    unset($answer3);
}
if(isset($_POST['answer4'])) {
    $answer4 = $_POST['answer4'];
}
if($answer4 === '') {
    unset($answer4);
}
if (empty($question) || empty($answer3) || empty($answer1) || empty($answer2) || empty($answer4)) {
    exit("Заполните все поля формы!");
}
if(isset($_POST['correctness1'])) {
    $answer1_correct = 1;
} else  {
    $answer1_correct = 0;
}

if(isset($_POST['correctness2'])) {
    $answer2_correct = 1;
} else  {
    $answer2_correct = 0;
}
if(isset($_POST['correctness3'])) {
    $answer3_correct = 1;
} else  {
    $answer3_correct = 0;
}
if(isset($_POST['correctness4'])) {
    $answer4_correct = 1;
} else  {
    $answer4_correct = 0;
}
include("db.php");
date_default_timezone_set('Europe/Kiev');
$curdate = date('Y/m/d', time());
$status = "active";
/*
if (!mysqli_query($db, "INSERT INTO questions (question, date_created, status)
                      VALUES ('$question', '$curdate', '$status')")) {
    echo("Error description: " . mysqli_error($db));
}
*/

$question_add_result = mysqli_query($db, "INSERT INTO questions (question, date_created, status)
                      VALUES ('$question', '$curdate', '$status')");
$q_id = mysqli_insert_id($db);

$answer_add_result1 = mysqli_query($db, "INSERT INTO answers (answer, date_created, question_id, correct, status)
                      VALUES ('$answer1', '$curdate', '$q_id', '$answer1_correct', '$status' ) " );
$answer_add_result2 = mysqli_query($db, "INSERT INTO answers (answer, date_created, question_id, correct, status)
                      VALUES ('$answer2', '$curdate', '$q_id', '$answer2_correct', '$status' ) " );
$answer_add_result3 = mysqli_query($db, "INSERT INTO answers (answer, date_created, question_id, correct, status)
                      VALUES ('$answer3', '$curdate', '$q_id', '$answer3_correct', '$status' ) " );
$answer_add_result4 = mysqli_query($db, "INSERT INTO answers (answer, date_created, question_id, correct, status)
                      VALUES ('$answer4', '$curdate', '$q_id', '$answer4_correct', '$status' ) " );
header('Location: questions_add.php');

?>

