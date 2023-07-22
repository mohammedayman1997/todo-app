<?php
session_start();
require_once "../core/filesystem.php";
require_once "../core/functions.php";
require_once "../core/validations.php";

if (checkRequestMethod("POST")) {
    $errors = [];
    foreach ($_POST as $key => $val) {
        $$key = $val;
    }

    if (requiredVal($email)) {
        $errors['email'] = "E-mail is required";
    } elseif (!emailval($email)) {
        $errors['email'] = "E-mail is invalid";
    }

    if (requiredVal($password)) {
        $errors['password'] = "Password is required";
    }

    if (empty($errors)) {
        $users = readJsonFile("../data/users.json");
        foreach ($users as $user) {
            if ($user['email'] == $email) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['auth_register'] = $user;
                    redirectTo("../profile.php");
                    die;
                } else {
                    $errors['password'] = "Password wrong";
                    $_SESSION['errors'] = $errors;
                    redirectTo("../index.php");
                    die;
                }
            }
        }
        $errors['email'] = "E-mail not found";
        $_SESSION['errors'] = $errors;
        redirectTo("../index.php");
        die;
    } else {
        $_SESSION['errors'] = $errors;
        redirectTo("../index.php");
        die;
    }
} else {
    $_SESSION['error_method'] = "Not Allowed";
    redirectTo("../index.php");
    die();
}
