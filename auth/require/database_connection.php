<?php

require("database_settings.php");


class database_connection{
    public $host_name       ="";
    public $user_name       ="";
    public $password        ="";
    public $database_name   ="";
    public $connection      ="";



    public function __construct($host_name,$user_name,$password,$database_name){

        $this->host_name = $host_name;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->database_name = $database_name;

        $this->connection = new mysqli($this->host_name, $this->user_name, $this->password, $this->database_name);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
}













?>