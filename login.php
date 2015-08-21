<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once 'Db.php';
require_once 'Login.php';

session_start();
if (!empty($_SESSION['email'])){
header('Location:index.php');
}
if (isset($_POST['email']) && isset($_POST['password'])){
    $enter = new Login($_POST['email'], $_POST['password']);
    $check = $enter->login();
    if ($check){
        header('Location:index.php');
    }else {
        echo "wrong".$enter->password;
        $n = $_POST['email'];
        $db = Db::getInstance();
        $db_pass = $db->query("SELECT password FROM users WHERE mail='$n' LIMIT 1");
        var_dump($db_pass);
    }
}
?>

<form method="POST" action="login.php">
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
        <input type="submit" value="Register">
    </div>
</form>
