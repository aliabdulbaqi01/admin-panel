<?php

include "inc/user.php";
include "inc/to-out.php";
if (isset($_POST["logout"])) {
    logout();
}
include "html/header.php";
?>
<div class="contain">
    <!-- start aside -->
    <aside>
        <div class="top">
            <div class="logo">
                <h2> <span class="success"> Green Valley</span> </h2>
            </div>
            <div class="close" id="close_btn">
                <span class="material-symbols-sharp">
                    close
                </span>
            </div>
        </div>
        <!-- end top -->
        <div class="sidebar">
            <!-- <a href="#">
                <span class="material-symbols-sharp">grid_view </span>
                <h3>Dashbord</h3>
            </a> -->
            <?php
            if (isset($_SESSION["user"]) && $_SESSION["user"] == "manager") {
                ?>
                <a href="add-user.php">
                    <span class="material-symbols-sharp">person_outline </span>
                    <h3>USERS</h3>
                </a>
                <?php
            }
            ?>

            <a href="add-product.php">
                <span class="material-symbols-sharp">receipt_long </span>
                <h3>Products</h3>
            </a>
            <a href="news.php">
                <span class="material-symbols-sharp">feed </span>
                <h3>news</h3>
            </a>
            <a href="setting.php">
                <span class="material-symbols-sharp">settings </span>
                <h3>settings</h3>
            </a>
            <!-- Button trigger modal -->


            <a href="logout.php">
                <span class="material-symbols-sharp">logout </span>

                <form method="post">
                    <input type="submit" name="logout" value="logout" class="btn btn-success">
                </form>
            </a>
        </div>
    </aside>
    <!-- start main part -->

    <main>
        <h1>Dashbord</h1>

        <div class="date">
            <h2><?= date("Y/m/d") ?></h2>
        </div>
        <div class="recent_order">
            <table>
                <thead>
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Products</th>
                        <th scope="col">price</th>
                        <th scope="col">quantaty</th>
                        <th scope="col">country</th>
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
                        </tr>
                    <?php endforeach;
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"> total products</td>
                        <td> <?= getLastId("storage/products.json") ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
</div>

<?php
include "html/footer.php";