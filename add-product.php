<?php
include "inc/product.php";
include "inc/to-out.php";

if (isset($_POST["productName"])) {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $country = ($_POST['country']) ? $_POST['country'] : "egypt";
    if (validPrice($price) && validQuantity($quantity) && !isProductexist($productName)) {
        addProduct($productName, $price, $quantity, $country);
        header("location: add-product.php");
    }
    if (isProductexist(($productName))) {
        $productError = "product is exist";
    }
    if (!validPrice($price)) {
        $priceError = "price must be more than 100 QR";
    }
    if (!validQuantity(!$quantity)) {
        $quantityError = "the quantity should be more than 0";
    }

}
if (isset($_POST['productId'])) {
    echo $_POST['productID'];
}

include "html/header.php";
?>


<!-- button -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form method="post">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">add
                            Products</button>
                        <span style="color:red"><?= @$productError . "<br>" ?></span>
                        <span style="color:red"><?= @$priceError . "<br>" ?></span>
                        <span style="color:red"><?= @$quantityError ?></span>
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
                                    <td scope="row"><?= $product["id"] ?></td>
                                    <td><?= $product["productName"] ?></td>
                                    <td><?= $product["price"] ?> QR</td>
                                    <td><?= $product["quantity"] ?> M2</td>
                                    <td><?= $product["country"] ?></td>
                                    <td>
                                        <a href="add-product.php?viewID=<?= $product['id'] ?>"
                                            class="btn btn-sm btn-info">view</a>
                                        <a href="add-product.php?updateID=<?= $product['id'] ?>"
                                            class="btn btn-sm btn-dark">update</a>
                                        <form method="post">
                                            <input type="hidden" name="productId" value="<?= $product['productName'] ?>" />
                                            <input type="submit" class="btn btn-sm btn-danger" value="delete">
                                        </form>
                                        <!-- <form action="" method="get"><input type="submit" value="delete"
                                                name="delete //$user["id"] "></form> -->
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
                        <tfoot>
                            <tr>
                                <td colspan="5"> total products</td>
                                <td> <?= getAllProduct() ?></td>
                            </tr>
                        </tfoot>
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
                        <input type="text" name="productName" class="form-control" required>

                    </div>
                    <div class="user-box">
                        <label>price</label>
                        <input type="text" class="form-control" name="price" required>

                    </div>
                    <div class="user-box">
                        <label>quantaty</label>
                        <input type="text" class="form-control" name="quantity" requierd>

                    </div>
                    <div class="user-box">
                        <label>country</label>
                        <input type="text" name="country" class="form-control" placeholder="egypt">

                    </div>
                    <input type="submit" value="add" class="btn btn-success mt-2 float-center">
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
    </div>

</div>
</div>

<?php
include "html/footer.php";
?>