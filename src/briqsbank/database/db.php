<?php
namespace App\Briqsbank\Database;

use PDO;
use PDOException;

class DB {
    //singleton
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $dbName = 'bank';
    private $username = 'root';
    private $password = 'jenodoys@PHP1';

    private function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";
            $this->connection = new PDO($dsn, 
                                $this->username, 
                                $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,
                                PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("DB connection error: " . $e->getMessage());
        }
        
    }

    public static function getInstance(): DB {
        if(self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}