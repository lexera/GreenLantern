<?php
session_start();
include 'toolbox.php';
if (isset($_POST['login'])) {
    $login = $_POST['login'];
}
if ($login == '') {
    unset($login);
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if ($password == '') {
    unset($password);
}

if (empty($login) or empty($password)) {
    alert_redirect("Заполните поля логин и пароль!", "index.php");
}
$login = stripslashes($login);
$login = htmlspecialchars($login);
$login = trim($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$password = trim($password);

include("db.php");

$query = "SELECT * FROM users WHERE login_email = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();


if (empty($row)) {
    alert_redirect("Введенные логин и пароль не существуют!", "index.php");
} else {
    if (password_verify($password, $row['password'])) {
        $_SESSION['login'] = $row['login'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        if ($row['role'] == "student") {
            header('Location: dashboard.php');
        } else {
            header('Location: admin.php');
        }
    } else {
        alert_redirect("Введенные логин и пароль неверные!" , "index.php"); //
    }
}
?>