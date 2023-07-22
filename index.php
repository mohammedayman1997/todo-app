<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php if (isset($_SESSION['error_method'])) : ?>
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['error_method'];
            unset($_SESSION['error_method']);
            ?>
        </div>
    <?php endif; ?>
    <div class="container w-75">
        <div class="row">
            <form action="handle/handlelogin.php" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                    <?php if (isset($_SESSION['errors']['email'])) : ?>
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
                <input type="submit" value="login" class="btn btn-success">
                <a href="register.php" class="btn btn-info">
                    create Account
                </a>
            </form>
        </div>
    </div>
</body>
<script src="assets/js/bootstrap.min.js"></script>

</html>