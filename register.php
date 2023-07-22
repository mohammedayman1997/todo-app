<?php session_start(); ?> 
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resgister</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container w-75">
        <div class="row">
            <?php if(isset($_SESSION['error_method'])): ?>
                <div class="alert alert-danger">
                    <?php
                        echo $_SESSION['error_method'];
                        unset($_SESSION['error_method']);
                    ?>
                </div>
            <?php endif; ?>
            <form action="handle/handelregister.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                    <?php if(isset($_SESSION['errors']['name'])): ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errors']['name'];
                                unset($_SESSION['errors']['name']);
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                    <?php if(isset($_SESSION['errors']['email'])): ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errors']['email'];
                                unset($_SESSION['errors']['email']);
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                    <?php if(isset($_SESSION['errors']['password'])): ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errors']['password'];
                                unset($_SESSION['errors']['password']);
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                    <?php if(isset($_SESSION['errors']['image'])): ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION['errors']['image'];
                                unset($_SESSION['errors']['image']);
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                <input type="submit" value="register" class="btn btn-success">
                <a href="index.php" class="btn btn-info">
                    Login
                </a>
            </form>
        </div>
    </div>
</body>
<script src="assets/js/bootstrap.min.js"></script>

</html>