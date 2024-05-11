<?php
include "inc/parent.php";
// to check if the user is exist or not 
function isUserExist($username)
{
    $allData = getAllData("storage/users.json");
    foreach ($allData as $one) {
        if ($one['username'] == $username) {
            return true;
        } else {
            return false;
        }
    }
}

//script to check is the email exist 
function isEmailExist($email)
{
    $users = getAllData("storage/users.json");

    foreach ($users as $user) {
        if ($user["email"] == $email) {
            return true;
        }
    }
    return false;
}
// this function will check the  passwords then return true if it more than
// 8 chaers or numbers, have number, upper and lower case letter

function validPassword($password)
{
    if (strlen($password) >= 8) {
        if (preg_match('/[a-z]/i', $password)) {
            if (preg_match('/[A-Z]/', $password)) {
                if (preg_match('/[0-9]/', $password)) {
                    return true;
                }
            }
        }
    }
    return false;
}

// script for email validation 
function validEmail($email)
{
    if (!empty($email)) {
        if (!isEmailExist($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
        }
    }
    return false;
}


// "Valid username, alphanumeric & longer than or equals 5 chars<br>"
function validUsername($username)
{
    if (!isUserExist($username)) {
        if (strlen($username) >= 6) {
            if (preg_match('/[a-z]/i', $username)) {
                if (preg_match('/[0-9]/', $username)) {
                    return true;
                }
            }
        }
    }

    return false;
}

function isProductexist($name)
{
    $allData = getAllData("storage/products.json");
    foreach ($allData as $one) {
        if ($one['productName'] == $name) {
            return true;
        } else {
            return false;
        }
    }
}
function validQuantity($quantaty)
{
    if ($quantaty >= 0) {
        return true;
    }
    return false;
}

function validPrice($price)
{
    if ($price >= 100) {
        return true;
    }
    return false;
}