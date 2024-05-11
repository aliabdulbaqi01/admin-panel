<?php
include "inc/user.php";
include "inc/to-out.php";


if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$error = false;
$authError = false;
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $coPassword = $_POST['coPassword'];
    if (!resetPassword($password, $coPassword)) {
        $error = "enter valid password ";
    }
}
if (isset($_POST['userauth'])) {
    $usernameAuth = $_POST['userauth'];
    if (!setManager($usernameAuth)) {
        $userAuthError = $usernameAuth . " is already a manager";
    }
    setManager($usernameAuth);
}

include "html/header.php";

?>

<div class="container mt-5 card px-4 shadow-lg p-3 bg-body rounded"
    style="min-width:585px; max-width:50%; margin-top:50px">
    <h2 class="text-center mt-3 mb-2">Reset the password</h2>
    <span style="color: red"><?= @$error ?></span>
    <form method="post">
        <div class="form-group">
            <label for="password" class="mx-2 mt-3 mb-2"> Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" min="8"
                required>
        </div>
        <div class="form-group ">
            <label for="copassword" class="mx-2 mt-3 mb-2">Confirm Password:</label>
            <input type="password" class="form-control  " id="coPassword" name="coPassword"
                placeholder="confirmed password" required>

        </div>

        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success mt-3 " value="reset">
        </div>
    </form>
</div>

<?php if (isset($_SESSION["user"]) && $_SESSION["user"] == "manager") {
    ?>
    <div class="container mt-5 card px-4 shadow-lg p-3 bg-body rounded"
        style="min-width:585px; max-width:50%; margin-top:50px">
        <h2 class="text-center mt-3 mb-2">Give managere authonication</h2>
        <form action="" method="post">
            <select class="form-select mt-3" name="userauth" aria-label="Default select example">
                <option selected>choose user</option>
                <?php
                $users = getAllData("storage/users.json");
                foreach ($users as $user) { ?>
                    <option value="<?= $user['username'] ?>"><?= $user['username'] ?></option>
                <?php }
                ?>
            </select>
            <span style="color:red"><?= @$userAuthError ?></span>
            <div class="d-flex justify-content-center mt-2">
                <input type="submit" class="btn btn-success mt-3 " value="set Manager">
            </div>
        </form>
        <?php
}
?>

    <?php
    include "html/footer.php";