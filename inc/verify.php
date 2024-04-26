<?php

include "user.php";


// this function will check the 2 passwords then return true
function validPassword($password)
{

    if (!preg_match('/^[a-zA-Z0-9]{8,}$/', $password)) {
        return "Must contain at least one number and one uppercase or lowercase letter, and at least 8 or more characters<br>";
    }
    return true;
}
$pass = 12345679;
echo is_bool("must contain");
function validEmail($email)
{
    if (empty($email)) {
        return "email is require<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format<br>";
    } elseif (isEmailExist($email)) {
        return "email is exist<br>";
    } else {
        return true;
    }
}
function validUsername($username)
{
    if (empty($username)) {
        return "username is require<br>";
    } elseif (!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
        return "Valid username, alphanumeric & longer than or equals 5 chars<br>";
    } elseif (isEmailExist($username)) {
        return "username is exist <br>";
    } else {
        return true;
    }
}




// get message of problem

// function errorIssiu($error)
// {
//     if ($error == "invalidpass") {
//         return "please enter password bigger than 8 & have chars";
//     } elseif ($error == "passnotequal") {
//         return "confirm password does not match the password";
//     } elseif ($error == "invalidemail") {
//         return "plese enter a valid email";
//     } elseif ($error == "emailexist") {
//         return "email is already exist try another one ";
//     } elseif ($error = "userexist") {
//         return "username is exist try another one";
//     } else {
//         return false;
//     }
// }