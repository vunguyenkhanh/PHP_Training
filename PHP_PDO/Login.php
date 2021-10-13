<?php
session_start();
require_once "LoginPdo.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
        <?php echo isset($_SESSION["errors"]) ? $_SESSION['errors'] : ""; ?>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo isset($_COOKIE['mail']) ? $_COOKIE['mail'] : ''; ?>">
                                <?php if (isset($error['email'])): ?>
                                    <?php foreach($error['email'] as $key => $value): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $value; ?>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
                            </div>
                            <?php if (isset($error['password'])): ?>
                                    <?php foreach($error['password'] as $key => $value): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $value; ?>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            <div class="form-group">
                                <label for="" class="text-info"><span>Remember me</span> <span><input id="remember" name="remember" type="checkbox" value="<?php echo isset($_COOKIE['userLogin']) ? $_COOKIE['userLogin'] : ''; ?>"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="Register.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>