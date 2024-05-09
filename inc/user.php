<?php

include "inc/verify.php";

// function that return the user and its data;
function getUser($username)
{
    $allData = getAllData("storage/users.json");
    foreach ($allData as $one) {
        if ($one['username'] == $username) {
            return $one;
        } else {
            return false;
        }
    }
}


// script to crlear input from spaces html special chartacter
function clearInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// script to add user or register
function addUser($username, $email, $password, $user = "admin")
{
    $username = clearInput($username);
    $email = clearInput($email);
    $password = clearInput($password);
    $users = getAllData("storage/users.json");
    $id = getLastId("storage/users.json") + 1;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $users[] = ["id" => $id, "username" => $username, "email" => $email, "password" => $password, "user" => $user];
    file_put_contents("storage/users.json", json_encode($users, JSON_PRETTY_PRINT));
    $news = $username . " has been register successfully ";
    addNews($news);
}

// fucntion to login
function loginUser($username, $password)
{
    if (isUserExist($username)) {
        $user = getUser($username);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['user'];
            $_SESSION['username'] = $username;
            $news = $username . " is login";
            addNews($news);
            return true;
        } else {
            return "password is wrong";
        }
    } else {
        return false;
    }
}


// script to logout 
function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("location:index.php");
}

// script to delete user from the storage
function deleteUser($id, $users)
{
    unset($users[$id - 1]);
    $news = " user " . $id . " has been deleted by " . $_SESSION["user"];
    addNews($news);
    file_put_contents("storage/users.json", json_encode($users, JSON_PRETTY_PRINT));
}


// script to update user data from the storages
function updateUser($username, $emeil, $password)
{
    $news = $username . " has been register successfully ";
    addNews($news);
    return true;
}

// reset your password
function resetPassword($password, $coPassword)
{
    $theUser = getUser($_SESSION['username']);
    if (validPassword($password)) {
        if ($password == $coPassword) {
            $theUser['password'] = password_hash($password, PASSWORD_DEFAULT);
            return true;
        }
    }
    return false;
}

function setManager($username)
{
    if (isUserExist($username)) {
        $user = getUser($username);
        $user = $user['user'];
        if ($user == "manager") {
            return false;
        }

        $user['user'] = "manager";
        return true;

    }

    return false;
}

