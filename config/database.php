<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        try {
            $host = DB_HOST;
            $dbname = DB_NAME;
            $username = DB_USER;
            $password = DB_PASS;

            $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ]);
        } catch (PDOException $e) {
            error_log("Erro na conexão com o banco: " . $e->getMessage());
            if (APP_DEBUG) {
                die("Erro na conexão: " . $e->getMessage());
            } else {
                die("Erro interno do servidor");
            }
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

    public function prepare(string $sql): \PDOStatement
    {
        return $this->connection->prepare($sql);
    }

    public function query(string $sql): \PDOStatement
    {
        return $this->connection->query($sql);
    }

    public function lastInsertId(): string
    {
        return $this->connection->lastInsertId();
    }

    public function beginTransaction(): bool
    {
        return $this->connection->beginTransaction();
    }

    public function commit(): bool
    {
        return $this->connection->commit();
    }

    public function rollback(): bool
    {
        return $this->connection->rollback();
    }
}
