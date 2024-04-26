<?php
include "inc/verify.php";
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
$nameErr = $emailErr = $repasswordErr = $passwordErr = "";
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if (validPassword($password) && validEmail($email) && validUsername($username) && ($password == $repassword)) {
        addUser($username, $email, $password);
        header("location: login.php");
        exit;
    } else {
        $nameErr = (validUsername($username)) ? "" : validUsername($username);
        $emailErr = (validEmail($email)) ? "" : validEmail($email);
        $passwordErr = (validPassword($password)) ? "" : validPassword($password);
        $repasswordErr = ($password == $repassword) ? "" : "confirm password doesn't match the password <br>";
    }
}
include "html/header.php";
?>
<link rel="stylesheet" href="css/form.css">
<?php
include "html/header2.php";
?>


<div class="form-box">
    <h2>Register</h2>
    <?php

    ?>
    <form method="post">

        <div class="user-box">
            <input type="text" name="username" required>
            <label>Username</label>
        </div>
        <div class="user-box">
            <span style="color:#03e9f4"><?= @$nameErr ?></span>
            <input type="email" name="email" required>
            <label>Email</label>
        </div>
        <div class="user-box">
            <span style="color:#03e9f4"><?= @$emailErr ?></span>
            <input type="password" name="password" minlength="8" required>
            <label>Password</label>
        </div>
        <div class="user-box">
            <span style="color:#03e9f4"><?= @$passwordErr ?></span>
            <input type="password" name="repassword" minlength="8" required>
            <label>Confirm Password</label>
        </div>
        <span style="color:#03e9f4"><?= @$repasswordErr ?></span>
        <input type="submit" value="register" class="my-button">
        <p>Don't have an Account? <a href="login.php">Login Now!</a> </p>
    </form>
</div>


<?php
include "html/footer.php";
?>