<?php

    include("../require/database_connection.php");

    class orders{
        public static function getorderbyid($id , $connection){
            $query = "SELECT * FROM orders WHERE order_id = $id";
            $result = mysqli_query($connection->connection, $query);
            return mysqli_fetch_assoc($result);
        }
    }
















?>