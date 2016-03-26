<?php
session_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Green Lantern</title>
</head>
<body>
<h2>Green Lantern</h2>
<form action="login.php" method="post">
    <p>
        <input placeholder="E-mail" name="login" type="text" size="30" maxlength="30">
    </p>
    <p>
        <input placeholder="Пароль" name="password" type="password" size="25" maxlength="25">
        <br>
    </p>
    <p>
        <input type="submit" name="submit" value="Войти">
        <br><br>
        <a href = 'registration.php'>Регистрация</a>
    </p>
</form>
<br>
<?php
if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
    echo "Пожалуйста, зарегистрируйтесь, чтобы войти на сайт.";
} else {
    echo "Приветсвуем, " . $_SESSION['login'] . "<br><a href='dashboard.php'></a>";
}
?>
</body>
</html>