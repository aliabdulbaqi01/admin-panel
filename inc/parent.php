<?php 
session_start();
// to check for id;
function isExist($id, $existId, $file)
{
    $items = getAllData($file);
    foreach ($items as $item) {
        if ($item[$existId] == $id) {
            return true;
        }
    }
    return false;
}
// function to get all Data as array
function getAllData($file)
{
    $allData = json_decode(file_get_contents($file), true);
    return $allData;
}


// script to get the last id in the storage
function getLastId($file)
{
    $allData = getAllData($file);
    $lastElement = end($allData);
    return $lastElement["id"];
}
function addNews($news)
{
    $allNews = getAllData("storage/news.json");

    $allNews[] = $news . " at " . date('Y-m-d H:i:s');
    file_put_contents('storage/news.json', json_encode($allNews, JSON_PRETTY_PRINT));
}

