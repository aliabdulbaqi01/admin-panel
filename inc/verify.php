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
// this function will check the 2 passwords then return true

function validPassword($password)
{
    if (strlen($password >= 8)) {
        if (!preg_match('/^[a-zA-Z0-9]{8,}$/', $password)) {
            return true;
        }
    }
    return false;
}

// script for email validation 
function validEmail($email)
{
    if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (!isEmailExist($email)) {
                return true;
            }
        }
    } else
        return false;

}


// "Valid username, alphanumeric & longer than or equals 5 chars<br>"
function validUsername($username)
{
    if (!empty($username)) {
        if (preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
            if (!isUserExist($username)) {
                return true;
            }
        }
    } else {
        return false;
    }
}