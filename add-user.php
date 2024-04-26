<?php
include "inc/verify.php";
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
include "header.php";
?>

<?php 
include "header2.php";
?>
<!-- button -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">add
                        User</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">userName</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            $users = getAllData("storage/users.json");
                            foreach ($users as $user): ?>
                                <tr>
                                    <th scope="row"><?= $user["id"] ?></th>
                                    <td><?= $user["username"] ?></td>
                                    <td><?= $user["email"] ?></td>
                                    <td>
                                        <form action="" method="get"><input type="submit" value="delete"
                                                name="delete<?= $user["id"] ?>"></form>
                                    </td>
                                    <?php if (isset($_GET["delete" . $user['id']])) {
                                        deleteUser($user['id'], $users);
                                    } ?>
                                </tr>
                            <?php endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>







<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">add User</h4>
            </div>
            <div class="modal-body">
                <form method="post">

                    <div class="user-box">
                        <label>Username</label>
                        <input type="text" name="add_username" class="form-control" required>

                    </div>
                    <div class="user-box">
                        <label>Email</label>
                        <input type="email" class="form-control" name="add_email" required>

                    </div>
                    <div class="user-box">
                        <label>Password</label>
                        <input type="password" class="form-control" name="add_password" minlength="8" required>

                    </div>
                    <div class="user-box">
                        <label>Confirm Password</label>
                        <input type="password" name="add_repassword" class="form-control" minlength="8" required>

                    </div>
                    <input type="submit" value="register" class="btn btn-primary mt-2 float-center">
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>

</div>
</div>


<?php

include "html/footer.php";
?>