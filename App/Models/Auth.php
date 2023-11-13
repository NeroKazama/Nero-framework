<?php

namespace App\Models;

use App\Controllers\Controller;
use App\Src\Connection;
use PDOException;

class Auth extends Controller {
    
    private $conn;

    private $table = 'users';

    public function __construct() {
        parent::__construct();
        $this->conn = new Connection;
        $this->conn = $this->conn->connect();
    }

    public function login(string $email, string $password) {
        // $sql = "INSERT INTO $this->table (firstname, lastname, email)
        // VALUES ('John', 'Doe', 'john@example.com')";

    }

    public function create(string $email, string $name, string $password) {
        try {
            $pass = $this->Helper->passHash($password);
            $sql = sprintf("INSERT INTO %s (email, name, password) VALUES ('%s', '%s', '%s')", $this->table, $email, $name, $pass);

            $this->conn->exec($sql);

        } catch(PDOException $e) {
            echo "Something went wrong";
        }
    }

}