<?php
unset($_SESSION['email']);
unset($_SESSION['password']);
setcookie('PHPSESSID', '', time()-100);
header('Location:registration.php');