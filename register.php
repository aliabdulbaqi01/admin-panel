<?php
include "inc/user.php";
include "inc/to-in.php";

// script to register that will add the user if all validation is true
// if they aren't true it will return error for each specific error
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];
    if (validUsername($username) && validEmail($email) && validPassword($password) && ($password == $rePassword)) {
        addUser($username, $email, $password);
        header("location: login.php");
        exit;
    }
    if (!validEmail($email)) {
        $emailError = "invalid email";
    }
    if (!validUsername($username)) {
        $usernameError = "username must contain at least 1 number and 1letter and be more than 6";
    }
    if (!validPassword($password)) {
        $passwordError = "password must contain at least 1 number, upper and lower case letter";
    }
    if ($password != $rePassword) {
        $rePasswordError = "passwords aren't identical ";
    }

}
include "html/header.php";
?>



<!-- main -->
<div class="container mt-5 card px-4 shadow-lg p-3 bg-body roundded">
    <h2 class="text-center mt-3 mb-2">Register page</h2>
    <form action="" method="post">
        <div class="group-from mt-3">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username"
                required>
            <span style="color:red"><?= @$usernameError ?></span>
        </div>
        <div class="group-from mt-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            <span style="color:red"><?= @$emailError ?></span>
        </div>
        <div class="group-from mt-3">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="123456kK#">
            <span style="color:red"><?= @$passwordError ?></span>
        </div>
        <div class="group-from mt-3">
            <label for="repassword">Confirm Password:</label>
            <input type="password" name="rePassword" class="form-control" id="repassword" placeholder="123456kK#">
            <span style="color:red"><?= @$rePasswordError ?></span>
        </div>
        <input type="submit" class="btn btn-primary mt-2 " value="signUp">

        <p>have an account? <a href="login.php">login</a></p>
    </form>
</div>


<?php
include "html/footer.php";
?>