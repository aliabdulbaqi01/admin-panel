<?php
include "verify.php";

function addProduct($name, $price, $quantaty, $country = "egypt")
{
    $products = getAllData("storage/products.json");
    $id = getLastId("storage/products.json") + 1;
    $products[] = ["id" => $id, "productName" => $name, "price" => $price, "quantity" => $quantaty, "country" => $country];
    file_put_contents("storage/products.json", json_encode($products, JSON_PRETTY_PRINT));
    $news = $name . " product has been added successfully ";
    addNews($news);

}

function getAllProduct()
{
    $counter = 0;
    $allData = getAllData("storage/products.json");
    foreach ($allData as $one) {
        $counter += 1;
    }
    return $counter;
}
