<?php

require("../require/database_connection.php");

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

if(isset($_REQUEST['order_id']) && isset($_REQUEST['order_status'])){

        $query = "UPDATE orders SET order_Status = '".$_REQUEST['order_status']."' WHERE order_id = '".$_REQUEST['order_id']."'";

        $result = mysqli_query($connection->connection,$query);

        if($result){

            header("location: orders.php?msg=Success");
        }else{
            header("location: orders.php?msg=Error");

        }
}






?>