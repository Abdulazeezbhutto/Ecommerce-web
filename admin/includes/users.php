<?php
require("../require/database_connection.php");
class  users{

    public static function get_all_users($connection){
        $query = "SELECT users.*, role.role_type FROM users INNER JOIN role ON users.role_id = role.role_id";
        $result = mysqli_query($connection, $query);
        return $result;
    }

}

$users = users::get_all_users($connection->connection);



 




?>