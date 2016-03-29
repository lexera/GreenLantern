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
    <div class="form">
        <h1>Green Lantern</h1>
        <form  action="login.php" method="post">
            <p>
                <br>
                <input placeholder="E-mail" name="login" type="text" size="30" maxlength="30">
            </p>
            <p>
                <input placeholder="Пароль" name="password" type="password" size="30" maxlength="30">
                <br>
            </p>
            <p>
                <input type="submit" name="submit" value="Войти">
                <br><br>
                <a href = 'registration.php' style="color: white";>Регистрация</a>
            </p>
            <br>
            <label>Пожалуйста, зарегистрируйтесь, чтобы войти на сайт.</label>
            <br><br>
        </form>
    </div>
</body>
</html>