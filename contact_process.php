<?php 


require("require/database_connection.php");

if(isset($_POST['submit']) && $_REQUEST['submit'] === "submit_message"){
    // Process the contact form submission
    $name = $_REQUEST['full_name'] ?? '';
    $subject  = $_REQUEST['subject'] ?? '';
    $email = $_REQUEST['email'] ?? '';
    $message = $_REQUEST['message'] ?? '';

    $query = "INSERT INTO messages (full_name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    $result = mysqli_query($connection->connection, $query);
    if($result){    
        // echo "Message sent successfully.";
        header("Location: contact.php?msg=Message sent successfully. Our Team Will Reach you  Soon...!");
    }else{
        // echo "Error sending message.";
        header("Location: contact.php?msg=Error sending message");

    }

}

?>