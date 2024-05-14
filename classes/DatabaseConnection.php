<?php

namespace Classes;

use Dotenv\Dotenv;
class DatabaseConnection
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->safeLoad();

        $host = $_ENV['DB_HOST'] ?? '';
        $user = $_ENV['DB_USER'] ?? '';
        $password = $_ENV['DB_PASS'] ?? '';
        $database = $_ENV['DB_NAME'] ?? '';

        $this->conn = mysqli_connect($host, $user, $password, $database);

        if (!$this->conn) {
            echo "Error: No se pudo conectar a MySQL.";
            echo "errno de depuración: " . mysqli_connect_errno();
            echo "error de depuración: " . mysqli_connect_error();
            exit;
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}