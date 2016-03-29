<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['question'])) {
    $question = $_POST['question'];
}
if($question == '') {
    unset($question);
}
if(isset($_POST['answer1'])) {
    $answer1 = $_POST['answer1'];
}
if($answer1 == '') {
    unset($answer1);
}
if(isset($_POST['answer2'])) {
    $answer2 = $_POST['answer2'];
}
if($answer2 == '') {
    unset($answer2);
}
if(isset($_POST['answer3'])) {
    $answer3 = $_POST['answer3'];
}
if($answer3 == '') {
    unset($answer3);
}
if(isset($_POST['answer4'])) {
    $answer4 = $_POST['answer4'];
}
if($answer4 == '') {
    unset($answer4);
}
if (empty($question) or empty($answer3) or empty($answer1) or empty($answer2) or empty($answer4)) {
    exit("Заполните все поля формы!");
}
?>

