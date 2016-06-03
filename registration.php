<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Регистрация</title>
</head>
<body>
<div class="form">
    <br><h2>Регистрация</h2><br>
    <form  action="user_save.php" method="post">
        <p>
            <input name="fname" placeholder="Имя" size="30" maxlength="40">
        </p>
        <p>
            <input name="lname" placeholder="Фамилия" size="30" maxlength="40">
        </p>
        <p>
            <input name="login" placeholder="E-mail" type="email" size="30" maxlength="30">
        </p>
        <p>
            <input name="password" placeholder="Пароль" type="password" id="txtNewPassword" size="30" maxlength="30">
        </p>
        <p>
            <input name="password_repeat" placeholder="Повторите пароль" type="password" id="txtConfirmPassword" size="30" maxlength="30">
        </p>
        <p>
            <input name="student_group" placeholder="Учебная группа" type="text" size="30" maxlength="30">
        </p>
    <p>
        <label>Город:</label>
        <?php
        echo "<select name='city'>";
        include ('cities_select.php');
        echo "</select>";
        ?>
    </p><br>
    <p>
        <input type="submit" name="submit" value="Зарегистрироваться">
    </p><br>
</form>
<a href="index.php" style="color: white;">назад</a><br><br>
</div>
</body>
</html>