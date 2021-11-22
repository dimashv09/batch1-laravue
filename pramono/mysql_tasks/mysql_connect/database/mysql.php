<?php
namespace Database;

include "config.php";

use Database\Config;
use mysqli;

class MysqlConnection extends Config 
{   

    public function connect()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->databasename);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function query($query)
    {
        $query = $this->connect()->query($query);
        return $query;

    }

}

