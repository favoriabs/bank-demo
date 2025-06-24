<?php

namespace App\Briqsbank;

use App\Briqsbank\Database\DB;
use PDO;

class User {
    private $db;

    public function __construct() {
        $this->db = DB::getInstance()->getConnection();
    }

    public function register(string $name, string $email): int {
        $statement = $this->db->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $statement->execute([$name, $email]);
        return $this->db->lastInsertId();
    }

    public function getUser(int $id): array|false {
        $statement = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers(): array {
        
    }
}