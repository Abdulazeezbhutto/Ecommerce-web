<?php

    include("../require/database_connection.php");

    class orders{
        public static function getorderbyid($id , $connection){
            $query = "SELECT o.*, oi.* 
                        FROM orders o
                        INNER JOIN order_items oi ON o.order_id = oi.order_id
                        WHERE o.order_id = $id;";
            $result = mysqli_query($connection->connection, $query);
            return $result;
        }
    }
















?>