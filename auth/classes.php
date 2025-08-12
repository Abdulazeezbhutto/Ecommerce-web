<?php
session_start();
class validation
{

    public static function register_process($first_name, $middle_name, $last_name, $email, $password, $address)
    {
        // Define regex patterns
        $name_pattern = "/^[a-zA-Z\s]+$/";  // letters and spaces only
        $allowed_image_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Validate first name
        if (empty($first_name) || strlen($first_name) < 3 || !preg_match($name_pattern, $first_name)) {
            header("Location: auth/register.php?msg=First+name+must+be+at+least+3+letters+and+contain+only+letters+and+spaces");
            exit;
        }

        // Validate middle name (optional)
        if (!empty($middle_name) && !preg_match($name_pattern, $middle_name)) {
            header("Location: register.php?msg=Middle+name+can+contain+only+letters+and+spaces");
            exit;
        }

        // Validate last name
        if (empty($last_name)) {
            header("Location: register.php?msg=Last+name+is+required");
            exit;
        }
        if (!preg_match($name_pattern, $last_name)) {
            header("Location: register.php?msg=Last+name+can+contain+only+letters+and+spaces");
            exit;
        }

        // Validate email
        if (empty($email)) {
            header("Location: register.php?msg=Email+is+required");
            exit;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: register.php?msg=Invalid+email+format");
            exit;
        }

        // Validate password
        if (empty($password)) {
            header("Location: register.php?msg=Password+is+required");
            exit;
        }
        if (strlen($password) < 6) {
            header("Location: register.php?msg=Password+must+be+at+least+6+characters");
            exit;
        }

        // Validate address (optional)
        if (!empty($address) && strlen($address) > 500) {
            header("Location: register.php?msg=Address+must+be+less+than+500+characters");
            exit;
        }

        // All validations passed
        return true;
    }

    public static function login_process($email, $password)
    {
        // Check if email is empty or invalid format
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: login.php?msg=Invalid+or+empty+email");
            exit;
        }

        // Check if password is empty or too short (min 6 chars)
        if (empty($password) || strlen($password) < 6) {
            header("Location: login.php?msg=Password+must+be+at+least+6+characters");
            exit;
        }

        return true; // or actual login success/fail logic
    }
}



class add_users
{

    public static function register($first_name, $middle_name, $last_name, $email, $password, $phone_no, $address, $city, $state, $country, $post_code, $connection)
    {
        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Regular SQL query (⚠ less secure, vulnerable to SQL injection)
        $sql = "INSERT INTO users 
            (first_name, middle_name, last_name, email, password_hash, phone, address, city, state, postal_code,country) 
            VALUES (
                '$first_name', '$middle_name', '$last_name', '$email', '$hashed_password', 
                '$phone_no', '$address', '$city', '$state', '$post_code','$country' 
            )";

        // Execute query
        if (mysqli_query($connection->connection, $sql)) {
            return true; // Success
        } else {
            return "Error: " . mysqli_error($connection);
        }
    }

    public static function already_exist($email, $connection)
    {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection->connection, $query);
        if (mysqli_num_rows($result) > 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function login_process($email, $password, $connection)
    {
        // Check if email exists
      $query = "SELECT * FROM users WHERE email = '".$email."' LIMIT 1";

       $result = mysqli_query($connection->connection,$query);
       if ($result && mysqli_num_rows($result) > 0) {
           $user = mysqli_fetch_assoc($result);
           // Verify password
           if (password_verify($password, $user['password_hash'])) {
               $_SESSION['user']=$user;
               return true; // Login successful
           } else {
               return "Invalid password";
           }
       } else {
           return "Email not found";
       }
    }

}



?>