<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Регистрация</title>
</head>
<body>
<h3>Регистрация</h3>
<form action="user_save.php" method="post">
    <p>
        <input name="login" placeholder="E-mail" type="email" size="25" maxlength="25">
    </p>
    <p>
        <input name="password" placeholder="Пароль" type="password" id="txtNewPassword" size="25" maxlength="25">
    </p>
    <p>
        <input name="password_repeat" placeholder="Повторите пароль" type="password" id="txtConfirmPassword" size="25" maxlength="25">
    </p>
    <p>
        <input name="student_group" placeholder="Учебная группа" type="text" size="25" maxlength="25">
    </p>
    <p>
        <label>Город:</label>
        <?php
        include ('cities_select.php');
        echo "<select name='city'>";
        while ($row = mysqli_fetch_array($result)) {
            #echo "<option value='" . $row['PcID'] . "'>" . $row['PcID'] . "</option>";
            echo "<option value='" . $row['id'] . "'>" . $row['city_name'] . "</option>";
        }
        echo "</select>"; ?>
    </p>
    <p>
        <input type="submit" name="submit" value="Зарегистрироваться">
    </p>
</form>
</body>
</html>