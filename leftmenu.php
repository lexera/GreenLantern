<?php
echo "<div id=\"leftmenu\" class=\"light-grey\" style=\"padding-top: 40px;\">";
if($page === "questions") {
    echo "<a href=\"questions.php\" class=\"active\">Список вопросов</a>";
} else {
    echo "<a href=\"questions.php\">Список вопросов</a>";
}
if($page === "questions_add") {
    echo "<a href=\"questions_add.php\" class=\"active\">Добавить вопрос</a>";
} else {
    echo "<a href=\"questions_add.php\">Добавить вопрос</a>";
}
if($page === "results") {
    echo "<a href=\"results.php\" class=\"active\">Результаты студентов</a></div>";
} else {
    echo "<a href=\"results.php\">Результаты студентов</a></div>";
}
echo "<div id=\"exit\"><a href=\"logout.php\">Выход</a></div>";

?>