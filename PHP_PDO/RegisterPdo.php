<?php
 include "Connect.php";

 if (isset($_POST['register'])) {
    $error = array(); 

    if (empty(trim($_POST['username']))) {
        $error['username']['required'] = 'Name không được để trống.'; 
    } else {
        if (strlen(trim($_POST['username'])) < 6 || strlen(trim($_POST['name'])) > 200) {
            $error['username']['max'] = 'Name không được nhỏ hơn 6 kí tự và dài hơn 255 kí tự.';
        } 
    }

    if (empty(trim($_POST['address']))) {
        $error['address']['required'] = 'Address không được để trống.'; 
    }

    if (strlen(trim($_POST['phone'])) < 10 || strlen(trim($_POST['phone'])) > 20) {
        $error['phone']['max'] = 'Phone không được nhỏ hơn 10 kí tự và dài hơn 20 kí tự.';
    }

    if (empty(trim($_POST['email']))) {
        $error['email']['required'] = 'Email không được để trống.'; 
    } else {
        if (strlen(trim($_POST['email'])) > 255) {
            $error['email']['max'] = 'Email dài hơn 255 kí tự.';
        } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $error['email']['invalid'] = 'Email không hợp lệ.';
        }
    }

    if (empty(trim($_POST['password']))) {
        $error['password']['required'] = 'Password không được để trống.'; 
    } else {
        if (strlen(trim($_POST['password'])) < 6 || strlen(trim($_POST['password'])) > 100) {
            $error['password']['max'] = 'Password không được nhỏ hơn 6 kí tự và dài hơn 255 kí tự.';
        } 
    }
    if (trim($_POST['password']) !== trim($_POST['rPassword'])) {
        $error['rPassword']['confirm_password'] = 'Confirm Password không khớp.';
    }

    if (empty($error)) {
        $name = $_POST['username'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $created_at = date("Y-m-d h:i:sa");
        
        $conn = Connection::getConnect();
        $statement = $conn->prepare("Insert into users set mail=:mail, name=:name, password=:password, phone=:phone, address=:address");
        $statement->execute(
            array(
                'mail' => $email,
                'name' => $name,
                'password' => $password,
                'phone' => $phone,
                'address' => $address,
            )
        );
        header("location:LoginPdo.php");
    }
 }
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