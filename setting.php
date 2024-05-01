<?php
include "inc/user.php";


if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

include "html/header.php";
include "html/header2.php";
include "html/nav.php";
?>



<?php if (isset($_SESSION["user"]) && $_SESSION["user"] == "manager") {
    ?>
    <h3> give manger authontication</h3>
    <?php
}
?>

<?php
include "html/footer.php";