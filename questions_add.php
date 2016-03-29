<?php
session_start();
if(!(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')){
    header("Location: index.php");}
$page = 'questions_add';
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Добавить вопрос</title>
    <script type="text/javascript" src="admin.js"></script>
</head>
<body>
    <?php
    require 'leftmenu.php';
    ?>
    <form action="save_question.php" method="post">
        <div class="mainblock">
            <label>Вопрос</label>
            <textarea id="question" name="question" rows="15" placeholder="не больше 1500 знаков" ></textarea><br>
            <label>Ответ 1</label>
            <input type="checkbox" name="correctness">правильный<br>
            <textarea class="answer" name="answer1" rows="4" placeholder="не больше 500 знаков" ></textarea><br>
            <label>Ответ 2</label>
            <input type="checkbox" name="correctness">правильный<br>
            <textarea class="answer" name="answer2" rows="4" placeholder="не больше 500 знаков" ></textarea><br>
            <label>Ответ 3</label>
            <input type="checkbox" name="correctness">правильный<br>
            <textarea class="answer" name="answer3" rows="4" placeholder="не больше 500 знаков" ></textarea><br>
            <label>Ответ 4</label>
            <input type="checkbox" name="correctness">правильный<br>
            <textarea class="answer" name="answer4" rows="4" placeholder="не больше 500 знаков" ></textarea><br>
            <input type="submit" name="submit" value="Добавить">
        </div>
    </form>
</body>

