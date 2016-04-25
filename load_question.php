<?php
include("db.php");

$user_id = $_SESSION["id"];

//$result = $mysqli->query("SELECT * FROM user_answers WHERE user_id = 'active'");

$result = $mysqli->query("SELECT * FROM questions WHERE status = 'active' AND
    id NOT IN (SELECT question_id FROM user_answers WHERE user_id = $user_id)
    LIMIT 1");
$row = $result->fetch_assoc();
$result->close();
$question_id = $row['id'];

$answer = $mysqli->query("SELECT answer FROM answers WHERE status = 'active' AND
    question_id = $question_id");
$answ_row = $answer->fetch_assoc();
$answer->close();

echo "<label>Вопрос</label>";
echo "<textarea readonly id=\"question\" name=\"question\" rows=\"10\">".$row['question']."</textarea><br>";

$counter = 1;
foreach($answ_row as $one) {
    echo "<label>Ответ ".$counter."</label>";
    echo "<input type=\"checkbox\" name=\"correctness".$counter."\">правильный<br>";
    echo "<textarea readonly class=\"answer\" name=\"answer".$counter."\" rows=\"4\">".$one."</textarea><br>";
    $counter++;
}
//
//for($i = 0; $i < count($answ_row); $i++) {
//    $counter = $i+1;
//    echo "<label>Ответ ".$counter."</label>";
//    echo "<input type=\"checkbox\" name=\"correctness".$counter."\">правильный<br>";
//    echo "<textarea readonly class=\"answer\" name=\"answer".$counter."\" rows=\"4\">".count($answ_row)."</textarea><br>";
//}

//echo "<label>Ответ 1</label>";
//echo "<input type=\"checkbox\" name=\"correctness1\">правильный<br>";
//echo "<textarea readonly class=\"answer\" name=\"answer1\" rows=\"4\">".$answ_row[] "</textarea><br>";
//            <label>Ответ 2</label>
//            <input type="checkbox" name="correctness2">правильный<br>
//            <textarea readonly class="answer" name="answer2" rows="4" placeholder="не больше 500 знаков" ></textarea><br>
//            <label>Ответ 3</label>
//            <input type="checkbox" name="correctness3">правильный<br>
//            <textarea readonly class="answer" name="answer3" rows="4" placeholder="не больше 500 знаков" ></textarea><br>
//            <label>Ответ 4</label>
//            <input type="checkbox" name="correctness4">правильный<br>
//            <textarea readonly class="answer" name="answer4" rows="4" placeholder="не больше 500 знаков" ></textarea><br>



?>