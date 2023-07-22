<?php 
session_start(); 
require_once "core/functions.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
    if(!isset($_SESSION['auth_register'])){
        redirectTo("index.php");
        die;
    }
?>
    <div class="container">
        <div class="row d-flex col-12">
            <div class="col-4 mt-1">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $_SESSION['auth_register']['image'] ?>" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">Name : <?= $_SESSION['auth_register']['name']  ?>  </p>
                        <p class="card-text">E-mail : <?= $_SESSION['auth_register']['email'] ?></p>
                    </div>
                    <a href="handle/handlelogout.php" class="btn btn-danger mb-1">
                        Logout
                    </a>
                </div>
            </div>
            <div class="col-8 mt-1">
                <a href="" class="btn btn-primary">
                    add new task
                </a>
                <table class="table table-bordered mt-2">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 20px;">id</th>
                            <th>Task</th>
                            <th style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="" class="btn btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/bootstrap.min.js"></script>

</html>