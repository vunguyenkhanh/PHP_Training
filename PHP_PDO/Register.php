<?php
session_start();
require_once "RegisterPdo.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>Registation</title>
</head>
<body>
  <form class="form-horizontal" action="" style="margin-left: 20px;" method="POST">
    <fieldset>
        <div id="legend">
          <legend class="">Register</legend>
        </div>
        <div class="form-group ">
          <label class="col-sm-2 col-form-label">Name:</label>
          <div class="col-sm-10">
            <input type="text"  class="form-control" id="name" name="username" placeholder="Name..." value="<?php echo isset($_POST["username"]) ? htmlentities($_POST["username"]) : ''; ?>">
            <?php if (isset($error['username'])): ?>
                <?php foreach($error['username'] as $key => $value): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $value; ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group ">
          <label class="col-sm-2 col-form-label">Address:</label>
          <div class="col-sm-10">
            <input type="text"  class="form-control" id="address" name="address" placeholder="Address..." value="<?php echo isset($_POST["address"]) ? htmlentities($_POST["address"]) : ''; ?>">
            <?php if (isset($error['address'])): ?>
                <?php foreach($error['address'] as $key => $value): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $value; ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group ">
          <label class="col-sm-2 col-form-label">Phone Number:</label>
          <div class="col-sm-10">
            <input type="text"  class="form-control" id="phone" name="phone" placeholder="Phone..." value="<?php echo isset($_POST["phone"]) ? htmlentities($_POST["phone"]) : ''; ?>">
            <?php if (isset($error['phone'])): ?>
                <?php foreach($error['phone'] as $key => $value): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $value; ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-form-label">Email:</label>
          <div class="col-sm-10">
            <input type="text"  class="form-control" id="email" name="email" placeholder="Email..." value="<?php echo isset($_POST["email"]) ? htmlentities($_POST["email"]) : ''; ?>">
            <?php if (isset($error['email'])): ?>
                <?php foreach($error['email'] as $key => $value): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $value; ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group ">
          <label class="col-sm-2 col-form-label">Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password..." >
            <?php if (isset($error['password'])): ?>
                <?php foreach($error['password'] as $key => $value): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $value; ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group ">
          <label class="col-sm-2 col-form-label">Password Confirm:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="passwordCofirm" name="rPassword" placeholder="Password...">
            <?php if (isset($error['rPassword'])): ?>
                <?php foreach($error['rPassword'] as $key => $value): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $value; ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button class="btn btn-success" name="register">Register</button>
            <br>
            <a href='LoginPdo.php'> Login </a>
          </div>
      </div>
    </fieldset>
  </form>
</body>
</html>