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
        header("location:Login.php");
    }
 }
?>