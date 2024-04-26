<?php

include "inc/product.php";

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
$error = "";
if (isset($_POST["productName"])) {
    $name = $_POST['productname'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $country = $_POST['country'];
    if (addProduct($name, $price, $quantity, $country)) {
        header("location: add-product.php");
    } else {
        $error = "something worng happens";
    }
}
include "html/header.php";
?>
<link rel="stylesheet" href="css/page.css">
<?php

include "html/header2.php";
include "html/nav.php";
?>


<!-- button -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">add
                        Products</button>
                    <span><?= @$error ?></span>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr class="">
                                <th scope="col">#</th>
                                <th scope="col">Products</th>
                                <th scope="col">price</th>
                                <th scope="col">quantaty</th>
                                <th scope="col">country</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            $products = getAllData("storage/products.json");
                            foreach ($products as $product): ?>
                                <tr>
                                    <th scope="row"><?= $product["id"] ?></th>
                                    <td><?= $product["productName"] ?></td>
                                    <td><?= $product["price"] ?> QR</td>
                                    <td><?= $product["quantity"] ?> M2</td>
                                    <td><?= $product["country"] ?></td>
                                    <td>
                                        <form action="" method="get"><input type="submit" value="delete"
                                                name="delete<?= $user["id"] ?>"></form>
                                    </td>
                                    <?php
                                    //  if (isset($_GET["delete" . $user['id']])) {
                                    //     deleteUser($user['id'], $users);
                                    // } 
                                    ?>
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
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title">add User</h4>
            </div>
            <div class="modal-body">
                <form method="post">

                    <div class="user-box">
                        <label>product name</label>
                        <input type="text" name="productname" class="form-control" required>

                    </div>
                    <div class="user-box">
                        <label>price</label>
                        <input type="text" class="form-control" name="price">

                    </div>
                    <div class="user-box">
                        <label>quantaty</label>
                        <input type="text" class="form-control" name="quantity">

                    </div>
                    <div class="user-box">
                        <label>country</label>
                        <input type="text" name="country" class="form-control" placeholder="apain">

                    </div>
                    <input type="submit" value="add" class="btn btn-primary mt-2 float-center">
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