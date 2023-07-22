<?php
session_start();
require_once "../core/filesystem.php";
require_once "../core/functions.php";
require_once "../core/validations.php";



if(checkRequestMethod("POST"))
{
    $errors = [];
    foreach($_POST as $key => $value){
        $$key = sanitize($value);
    }

    if(requiredVal($name)){
        $errors['name'] = "Name is required";
    }elseif(maxdVal($name,3)){
        $errors['name'] = "Name is must be greater than 3 characters";
    }elseif(mindVal($name,20)){
        $errors['name'] = "Name is must be smaller than 20 characters";
    }

    if(requiredVal($email)){
        $errors['email'] = "E-mail is required";
    }elseif(!emailval($email)){
        $errors['email'] = "E-mail is invalid";
    }

    $users = readJsonFile("../data/users.json");
    foreach($users as $user){
        if($user['email'] == $email){
            $errors['email'] = "Email Already Exists";
        }
    }


    
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#{}`,>'<.?&])[A-Za-z\d@$><.,#{}'`!%*?&]{8,}$/";
    if(requiredVal($password)){
        $errors['password'] = "Password is required";
    }elseif(!preg_match($password_pattern,$password)){
        $errors['password'] = "Password not match";
    }


    $image = $_FILES['image'];
    
  
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_type = $image['type'];
    $allowed_ext = ['jpg', 'png', 'jpeg', 'jfif'];
    $allowed_mimes = ['image/jpeg', 'image/png'];
    if (!empty($image['name'])) {
        $ext = explode('/', mime_content_type($image_tmp_name));
        $extension = end($ext);
        if (!in_array($image_type, $allowed_mimes)) {
            $errors['image'] = 'Error In Mime Type';
        } elseif (!in_array($extension, $allowed_ext)) {
            $errors['image'] = 'Not Allowed Extension';
        }
        $img_name =  time() . rand(100,10000) . "." . $extension;
    } else {
        $errors['image'] = 'image is required';
    }
    if(empty($errors))
    {
        move_uploaded_file($image_tmp_name,"../img/$img_name");
        $users = readJsonFile("../data/users.json");

        $data = ['name' => $name , 'email' => $email , 'password' => password_hash($password,PASSWORD_BCRYPT) , 'image' => "img/$img_name"];

        $users [] = $data;
        file_put_contents("../data/users.json",json_encode($users,JSON_PRETTY_PRINT));
        $_SESSION['auth_register'] = $data;
        redirectTo("../profile.php");
        die;
    }
    else
    {
        $_SESSION['errors'] = $errors;
        redirectTo("../register.php");
        die;
    }
}
else
{
    $_SESSION['error_method'] = "Not Allowed";
    redirectTo("../register.php");
    die();
}
?>