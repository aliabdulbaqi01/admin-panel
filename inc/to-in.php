<?php
// check if user is already logged in if he redirect to index page
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}