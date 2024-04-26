<?php
include "inc/user.php";
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

$error = false;
if (isset($_POST['username'])) {
    if (login($_POST['username'], $_POST["password"])) {
        header("Location: index.php");
        exit;
    } elseif (!login($_POST['username'], $_POST["password"])) {
        $error = "user not exist";
    } else {
        $error = "wrong pass";
    }
}
include "html/header.php";
?>
<link rel="stylesheet" href="css/form.css">
<?php
include "html/header2.php";
?>
<div class="form-box">
    <h2>Login</h2>
     <?php
     if ($error) {
       echo "<div class='alert alert-info' role='alert'>";
       echo $error;
       echo "</div>";
      } 

    ?>
    <form action="login.php" method="post">
        <div class="user-box">
            <input type="text" name="username" required="">
            <label>Username</label>
        </div>
        <!-- <span style='color:#9eeaf9' role='alert'>
         //@$passError 
    </span> -->
        <div class="user-box">
            <input type="password" name="password" required="">
            <label>Password</label>
        </div>
        <input type="submit" value="Login" class="my-button">
        <p>Not a member? <a href="register.php">Register</a></p>
    </form>
</div>


<?php
include "html/footer.php";
?>