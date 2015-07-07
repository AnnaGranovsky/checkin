<form method="POST" action="registration.php">
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
        <label>Repeat your password</label>
        <input type="password" placeholder="repeat password" name="dubl_password" minlength="6" required>
    </div>
    <div>
        <input type="submit" value="Register">
    </div>
</form>

<?php
require_once 'Db.php';
$db = Db::getInstance();
if (!empty($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dubPassword = $_POST['dubl_password'];
    if ($password===$dubPassword) {
        $passmd5 = md5($password);
        $login = explode("@", $email);
        $inqury = "INSERT INTO users (login, password, mail) VALUES ('".$login['0']."', '".$passmd5."', '".$email."');";
        $db->query ($inqury);
        echo "Good job man!";
    }
 else {
    echo "<h4>You repeated incorrect password! Please try again.</h4>";
    }
}
?>