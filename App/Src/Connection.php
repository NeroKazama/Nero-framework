<?php

namespace App\Src;

use PDO;
use PDOException;

class Connection {

    private $connection;

    private $host;

    private $port;

    private $database;

    private $username;

    private $password;

    private $conn;

    public function __construct() {
        $this->connection = $_ENV['DB_CONNECTION'];
        $this->host = $_ENV['DB_HOST'];
        $this->port = $_ENV['DB_PORT'];
        $this->database = $_ENV['DB_DATABASE'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
    }

    public function connect() {
        try {
            $dsn = $this->connection . ':dbname=' . $this->database . ';host=' . $this->host;
            $this->conn = new PDO($dsn, $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;
        } catch(PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
        }

    }

    public function __destruct() {
        $this->conn = null; 
    }
 
}


?>