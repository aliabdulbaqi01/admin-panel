<?php

include "inc/user.php";
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST["logout"])) {
    logout();
}
include "html/header.php";
?>
<link rel="stylesheet" href="css/style.css">
<?php
include "html/header2.php";
?>
<div class="container">
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
            <a href="#">
                <span class="material-symbols-sharp">grid_view </span>
                <h3>Dashbord</h3>
            </a><?php
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
            <a href="#">
                <span class="material-symbols-sharp">settings </span>
                <h3>settings</h3>
            </a>
            <!-- Button trigger modal -->


            <a href="logout.php">
                <span class="material-symbols-sharp">logout </span>

                <form method="post">
                    <input type="submit" name="logout" value="logout" class="btn btn-primary">
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

</div>

<?php
include "html/footer.php";