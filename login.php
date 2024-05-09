<?php

include "inc/user.php";
include "inc/to-in.php";

$usernameErr = false;
$passwordErr = false;

// when the user enter submit
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (loginUser($username, $password)) {
        header('location: index.php');
        exit;
    } elseif (!(loginUser($username, $password))) {
        $usernameError = 'user not exist';
    } else {
        $passwordErr = 'invalid password';
    }

}
include "html/header.php";
?>
<div class="container mt-5 card px-4 shadow-lg p-3 bg-body rounded"
    style="min-width:585px; max-width:50%; margin-top:50px">
    <h2 class="text-center mt-3 mb-2">Login page</h2>
    <form method="post">
        <div class="form-group">
            <label for="username">Enter Your Username:</label>
            <input type="text" class="form-control mt-2 " id="username" name="username" placeholder="Enter username"
                required>
            <span style='color:#9eeaf9' role='alert'>
                <?= @$usernameError ?>
            </span>
        </div>
        <div class="form-group">
            <label for="password" class="mt-3">Enter Your Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                min="8" required>
            <span style='color:#9eeaf9' role='alert'>
                <?= @$passwordError ?>
            </span>
        </div>
        <input type="submit" class="btn btn-primary mt-3 " value="login">

        <p>don't have account? <a href="register.php">register</a></p>
    </form>
</div>

<?php
include "html/footer.php";
?>