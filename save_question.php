<?php
header('Content-Type: text/html; charset=utf-8');
include 'toolbox.php';
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

$answer1_correct = (isset($_POST['correctness1'])) ? 1 : 0;
$answer2_correct = (isset($_POST['correctness2'])) ? 1 : 0;
$answer3_correct = (isset($_POST['correctness3'])) ? 1 : 0;
$answer4_correct = (isset($_POST['correctness4'])) ? 1 : 0;

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

$question_add_result = $mysqli->prepare("INSERT INTO questions (question, date_created, status)
                      VALUES (?,?,?)");
$question_add_result->bind_param("sss", $question, $curdate, $status);
$question_add_result->execute();

//
//if($question_add_result->execute()) {
//    alert_redirect("Вопрос успешно добавлен!", "questions_add.php");
//} else {
//    alert_redirect("Вопрос не был добавлен!", "questions_add.php");
//}
$q_id = mysqli_insert_id($db);
$answers_to_insert = array(
    "answer" => array("$answer1", "$answer2", "$answer3", "$answer4"),
    "correctness" => array("$answer1_correct", "$answer2_correct", "$answer3_correct", "$answer4_correct")
);
//
//$query = "INSERT INTO answers (answer, date_created, question_id, correct, status) VALUES (?,?,?,?,?)";
//$answer_add_result = $mysqli->prepare($query);

foreach($answers_to_insert as $one) {

    $answer = $one['answer'];
    $correct = $one['correctness'];
//    $answer_add_result->bind_param("sssss", $answer, $curdate, $q_id, $correct, $status );
//    $answer_add_result->execute();
}
//$answer_add_result->close();

/*
$question_add_result = mysqli_query($db, "INSERT INTO questions (question, date_created, status)
                      VALUES ('$question', '$curdate', '$status')");
$q_id = mysqli_insert_id($db);

$answer_add_result1 = mysqli_query($db, "INSERT INTO answers (answer, date_created, question_id, correct, status)
                      VALUES ('$answer1', '$curdate', '$q_id', '$answer1_correct', '$status' ),
                      ('$answer2', '$curdate', '$q_id', '$answer2_correct', '$status' ),
                      ('$answer3', '$curdate', '$q_id', '$answer3_correct', '$status' ),
                      ('$answer4', '$curdate', '$q_id', '$answer4_correct', '$status' )
                      " );
alert_redirect("Вопрос успешно добавлен!", "questions_add.php");
*/
?>

