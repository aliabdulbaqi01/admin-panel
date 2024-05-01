<?php
include "inc/parent.php";
include "html/header.php";
?>
<?php
include "html/header2.php";
include "html/nav.php";
?>
<div class="container mt-5">
    <?php
    $news = getAllData("storage/news.json");
    for ($i = count($news) - 1; $i >= 0; $i--): ?>
        <div class="card mb-3 bg-light text-secondary text-capitalize fs-5">
            <div class="card-body">
                <?= $news[$i] ?>
            </div>
        </div>

        <?php
    endfor;
    ?>
</div>
<?php
include "html/footer.php";