<?php

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

require("../require/database_connection.php");
echo "<pre>";
print_r($connection);
echo "</pre>";
// die();

if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'register') {
    require_once 'classes.php';
    $validation = new validation();

    // Assuming you have the necessary fields in your form
    $first_name = $_REQUEST['first_name'];
    $middle_name = $_REQUEST['middle_name'];
    $last_name = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $address = $_REQUEST['address'];
    $phone_no = $_REQUEST['phone'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $country = $_REQUEST['country'];
    $post_code = $_REQUEST['postal_code'];


    if ($password === $_REQUEST['confirm_password']) {

        $flage = $validation->register_process($first_name, $middle_name, $last_name, $email, $password, $address);

        if (add_users::already_exist($email, $connection)) {

            // Call the validation method
            if ($flage) {
                $register = add_users::register($first_name, $middle_name, $last_name, $email, $password, $phone_no, $address, $city, $state, $country, $post_code, $connection);
                if ($register) {
                    // echo "Registration successful!";
                    header("location:login.php?msg=Registration successful");
                }
            } else {
                // echo "Registration failed!";
                header("location:register.php?msg=Registration failed");
            }

        } else {
            // email already Exist
            header("location:register.php?msg=Email already exists");
        }

    } else {
        // correct the confirm password
        header("location:register.php?msg=Passwords do not match");
    }


}

// login logic
elseif (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'login') {
    include "classes.php";
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if (empty($email) || empty($password)) {
        header("location:login.php?msg=Email and Password are required");
        exit;
    }else{
        $login = add_users::login_process($email, $password, $connection);
        if ($login === true) {
            header("location:../index.php");
        } else {
            header("location:login.php?msg=" . urlencode($login));
        }
    }

}


else {
    header("location:login.php?msg=Invalid request");
}







?>