<?php
include "parent.php";

function addProduct($name, $price , $quantaty , $country= "spain")
{
    $products = getAllData("storage/products.json");
    $id = getLastId("storage/products.json") + 1;
    if (isExist($name, "productName", "storage/products.json")) {
        return false;
    } elseif ($price < 0 && $quantaty < 0) {
        return false;
    }
    $products[] = ["id" => $id, "productName" => $name, "price" => $price, "quantity" => $quantaty, "country" => $country];
    file_put_contents("storage/products.json", json_encode($products, JSON_PRETTY_PRINT));
    $news = $name . " has been added successfully ";
    addNews($news);

}
