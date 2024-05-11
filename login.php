<?php

include "inc/user.php";
include "inc/to-in.php";

$usernameErr = false;
$passwordErr = false;

// when the user enter submit
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (login($username, $password)) {
        header('location: index.php');
        exit;
    } elseif (login($username, $password) != false) {
        $passError = "wrong password";

    } else {
        $usernameError = "user not exist";
    }
    // var_dump((login($username, $password) == "pass"));


}
include "html/header.php";
?>
<div class="container mt-5 card px-4 shadow-lg p-3 bg-body rounded">
    <h2 class="text-center mt-3 mb-2">Login page</h2>
    <form method="post">
        <div class="form-group">
            <label for="username">Enter Your Username:</label>
            <input type="text" class="form-control mt-2 " id="username" name="username" placeholder="Enter username">
            <span style="color:red"><?= @$usernameError ?></span>
        </div>
        <div class="form-group">
            <label for="password" class="mt-3">Enter Your Password:</label>
            <input type="password" name="password" class=" form-control" id="password" placeholder="Password" min="8">
            <span style="color:red"><?= @$passError ?></span>
        </div>
        <input type="submit" class="btn btn-primary mt-4 " value="login">

        <p>don't have account? <a href="register.php">register</a></p>
    </form>
</div>

<?php
include "html/footer.php";
?>