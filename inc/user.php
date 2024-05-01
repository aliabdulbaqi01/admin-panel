<?php

include "parent.php";


function getUserData($username)
{
    $users = getAllData("storage/users.json");

    foreach ($users as $user) {
        if ($user["username"] == $username) {
            return $user;
        }
    }
    return false;
}

function isUserExist($username)
{
    $users = getAllData("storage/users.json");

    foreach ($users as $user) {
        if ($user["username"] == $username) {
            return true;
        }
    }
    return false;
}
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

// function register($username, $email, $password, $coPassword) {
//     $username= testInput($username);
//     $email= testInput($email);
//     $password= testInput($password);
//     $password= testInput($coPassword);
// $users = getAllData("storage/users.json");
// if (isUserExist($username) && empty($username)) {
//     header("location: register.php?error=userexist");
//     exit;
// }
// else {
//     if(isEmailExist($email)) {
//         header("location: register.php?error=emailexist");
//             exit;
//         }
//         else {
//             if(!validPassword($password))  {
//                 header("location: register.php?error=invalidpass");
//                 exit;

//             }
//             else {
//                 if ($password !== $coPassword) {
//                     header("location: register.php?error=passnotequal");
//                 exit;
//                 }
//                 else {
//                     header("location: login.php");
//                 }
//             }  
//         }
// }

// }
function clearInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function addUser($username, $email, $password)
{
    $username = clearInput($username);
    $email = clearInput($email);
    $password = clearInput($password);
    $users = getAllData("storage/users.json");
    $id = getLastId("storage/users.json") + 1;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $users[] = ["id" => $id, "username" => $username, "email" => $email, "password" => $password, "user" => "admin"];
    file_put_contents("storage/users.json", json_encode($users, JSON_PRETTY_PRINT));
    $news = $username . " has been register successfully ";
    addNews($news);
}
function login($username, $password)
{
    if (isUserExist($username)) {
        $user = getUserData($username);
        if (password_verify($password, $user["password"])) {
            $_SESSION['username'] = $username;
            $_SESSION['user'] = $user["user"];
            $news = $username . " is login";
            addNews($news);
            return true;
        } else {
            return "password";
        }
    } else {
        return false;
    }
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("location:index.php");
}


function deleteUser($id, $users)
{
    unset($users[$id - 1]);
    $news = " user " . $id . " has been deleted by " . $_SESSION["user"];
    addNews($news);
    file_put_contents("storage/users.json", json_encode($users, JSON_PRETTY_PRINT));
}