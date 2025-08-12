<?php

require("database_connection.php");

class products_oper
{
    // Store mysqli connection inside a static property via setter method
    private static $Connection = null;

    // Setter method to set the mysqli connection object
    public static function setConnection($connection)
    {
        self::$Connection = $connection;
    }

    public static function fetchall_product_categories()
    {
        if (!self::$Connection) {
            die("Database connection failed");
        }

        $query = "SELECT * FROM categories"; 
        $result = mysqli_query(self::$Connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error(self::$Connection));
        }

        $categories = [];

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $categories[] = $row;
            }
        } else {
            echo "No records found";
        }

        return $categories;
    }
}

// Set the connection before calling any methods
products_oper::setConnection($connection->connection);

// Fetch categories
$categories = products_oper::fetchall_product_categories();
