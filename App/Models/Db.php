<?php

namespace App\Models;

class Db {

    private $conn = null;

    public function __construct($user, $pass, $db, $host) {
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        try {
            $this->conn = new \PDO($dsn, $user, $pass);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}