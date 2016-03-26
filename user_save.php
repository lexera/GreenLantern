<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['login'])) {
    $login = $_POST['login'];
}
if($login == '') {
    unset($login);
}
if(isset($_POST['password'])) {
    $password = $_POST['password'];
}
if($password == '') {
    unset($password);
}
if(isset($_POST['password_repeat'])) {
    $password_repeat = $_POST['password_repeat'];
}
if($password_repeat == '') {
    unset($password_repeat);
}
if(isset($_POST['student_group'])) {
    $student_group = $_POST['student_group'];
}
if($student_group == '') {
    unset($student_group);
}
if(isset($_POST['city'])) {
    $city = $_POST['city'];
}
if($city == '') {
    unset($city);
}
if($password !== $password_repeat) {
    exit("Введенные пароли не совпадают!");
}
if (empty($password) or empty($login) or empty($password_repeat) or empty($student_group)
    or empty($city)) {
    exit("Заполните все поля формы!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$login = trim($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$password = trim($password);
$student_group = stripslashes($student_group);
$student_group = htmlspecialchars($student_group);
$student_group = trim($student_group);
$city = stripslashes($city);
$city = htmlspecialchars($city);
$city = trim($city);
$password = password_hash($password, PASSWORD_DEFAULT);

include("db.php");

$result = mysqli_query($db, "SELECT id FROM users WHERE login_email = '$login'");
$found_user = mysqli_fetch_array($result);

if(!empty($found_user['id'])) {
    exit("Такой логин уже зарегистрирован, введите другой логин");
}
$role = "student";
$status = "active";
date_default_timezone_set('Europe/Kiev');
$curdate = date('Y/m/d', time());

/* Debugging connection error
if (!mysqli_query($db,"INSERT INTO users (login_email, password, city, student_group, date_created, status, role)
                      VALUES ('$login', '$password', '$city', '$student_group', '$curdate', '$status', '$role')")) {
    echo("Error description: " . mysqli_error($db));
}
*/

$new_result = mysqli_query($db, "INSERT INTO users (login_email, password, city, student_group, date_created, status, role)
                      VALUES ('$login', '$password', '$city', '$student_group', '$curdate', '$status', '$role')");
if($new_result == 'TRUE') {
    echo "Вы успешно зарегистрированы! <a href='index.php'>Возврат на главную страницу</a>";
}
else {
    echo "Регистрация не прошла!";
}

?>