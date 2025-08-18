<?php

require("require/database_connection.php");
if(isset($_POST['email'])){
$query = "INSERT INTO news_teller (email) VALUES ('" . $_POST['email'] . "')";
$result = mysqli_query($connection->connection, $query);

if($result){
    header("location: index.php?msg=success");
}else{
    header("location: index.php?msg=error");
}
}
else{
    header("location: index.php");
}