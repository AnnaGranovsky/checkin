<php
session_start();
if (){
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
