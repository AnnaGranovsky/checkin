<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkin-Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="reg-body">

<form method="POST" action="registration.php" class="reg-form">
    <h3>Please enter your information</h3>
    <div>
        <label>Your email</label>
        <input type="text" placeholder="enter email" name="email" required>
    </div>
    <div>
        <label>Your password</label>
        <input type="password" placeholder="enter password" name="password" minlength="6" required>
    </div>
    <div>
        <input type="submit" name="auth" value="Login">
    </div>
    <div align="center">or</div>
    <div>
        <label>Repeat your password</label>
        <input type="password" placeholder="repeat password" name="dubl_password" minlength="6">
    </div>
    <div>
        <input type="submit" name="reg" value="Register">
    </div>
</form>

</body>
</html>

<?php
session_start();
require_once 'Db.php';
require_once 'Login.php';
if (!empty($_SESSION['email'])){
    header('Location:index.php');
}
//проверка на запрос пост
if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $enter = new Login($_POST['email'], $_POST['password']);
    $check = $enter->login();
    if (isset($_POST['auth']) && !empty($_POST['auth'])) {
        //проверка авторизации
        if ($check) {
            $_SESSION['email'] = $enter->email;
            $_SESSION['password'] = $enter->password;
            $_SESSION['id'] = $enter->id;
            header('Location:index.php');
        } else {
            //добавить сообщение
            echo "wrong";
        }

    } elseif (isset($_POST['reg']) && !empty($_POST['reg'])) {
        //регистрация
        $db = Db::getInstance();
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $dubPassword = $_POST['dubl_password'];
            if ($password === $dubPassword) {
                $passmd5 = md5($password);
                $login = explode("@", $email);
                $inqury = "INSERT INTO users (login, password, mail) VALUES ('" . $login['0'] . "', '" . $passmd5 . "', '" . $email . "');";
                $db->query($inqury);
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['id'] = $enter->id;
                header('Location:index.php');
            } else {
                echo "<h4>You repeated incorrect password! Please try again.</h4>";
            }
        }
    }
}

?>