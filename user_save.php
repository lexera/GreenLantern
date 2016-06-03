<?php
header('Content-Type: text/html; charset=utf-8');
include 'toolbox.php';
if(isset($_POST['fname'])) { $fname = $_POST['fname']; }
if($fname === '') { unset($fname); }
if(isset($_POST['lname'])) { $lname = $_POST['lname']; }
if($lname === '') { unset($lname); }
if(isset($_POST['login'])) { $login = $_POST['login']; }
if($login === '') { unset($login); }
if(isset($_POST['password'])) {
    $password = $_POST['password'];
}
if($password === '') {
    unset($password);
}
if(isset($_POST['password_repeat'])) {
    $password_repeat = $_POST['password_repeat'];
}
if($password_repeat === '') {
    unset($password_repeat);
}
if(isset($_POST['student_group'])) {
    $student_group = $_POST['student_group'];
}
if($student_group === '') {
    unset($student_group);
}
if(isset($_POST['city'])) {
    $city = $_POST['city'];
}
if($city === '') {
    unset($city);
}
if($password !== $password_repeat) {
    alert_redirect("Введенные пароли не совпадают!", "registration.php");
}
if (empty($fname) || empty($lname) || empty($password)
    || empty($login) || empty($password_repeat) || empty($student_group)
    || empty($city)) {
    alert_redirect("Заполните все поля формы!", "registration.php");
}

$fname = stripslashes($fname);
$fname = htmlspecialchars($fname);
$fname = trim($fname);
$lname = stripslashes($lname);
$lname = htmlspecialchars($lname);
$lname = trim($lname);
$login = stripslashes($login);
$login = htmlspecialchars($login);
$login = trim($login);
$student_group = stripslashes($student_group);
$student_group = htmlspecialchars($student_group);
$student_group = trim($student_group);
$city = stripslashes($city);
$city = htmlspecialchars($city);
$city = trim($city);
$password = password_hash($password, PASSWORD_DEFAULT);

include("db.php");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$result = $mysqli->prepare("SELECT id FROM users WHERE login_email = ?");
$result->bind_param("s",$login);
$result->execute();
$result->bind_result($found_user);
$result->fetch();

if(!empty($found_user)) {
    $mysqli->close();
    alert_redirect("Такой логин уже зарегистрирован, введите другой логин!", "registration.php");
}
else {
    $role = "student";
    $status = "active";
    date_default_timezone_set('Europe/Kiev');
    $curdate = date('Y/m/d', time());

    $new_result = $mysqli->prepare("INSERT INTO users (login_email, password, city, student_group, date_created,
      status, role, first_name, last_name)VALUES (?,?,?,?,?,?,?,?,?)");
    $new_result->bind_param("sssssssss", $login, $password, $city, $student_group,
        $curdate, $status, $role, $fname, $lname);
    if($new_result->execute()) {
        alert_redirect("Вы успешно зарегистрированы!", "index.php");
    } else {
        alert_redirect("Регистрация не прошла!", "registration.php");
    }
}

?>