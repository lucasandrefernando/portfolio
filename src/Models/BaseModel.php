<?php

namespace App\Models;

use App\Database\Database;

class BaseModel
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->db->fetch($sql, [$id]);
    }

    public function findAll($limit = null, $offset = 0)
    {
        $sql = "SELECT * FROM {$this->table}";

        if ($limit) {
            $sql .= " LIMIT {$limit} OFFSET {$offset}";
        }

        return $this->db->fetchAll($sql);
    }

    public function create($data)
    {
        $fields = array_keys($data);
        $placeholders = array_fill(0, count($fields), '?');

        $sql = "INSERT INTO {$this->table} (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";

        $this->db->query($sql, array_values($data));
        return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $fields = array_keys($data);
        $setClause = implode(' = ?, ', $fields) . ' = ?';

        $sql = "UPDATE {$this->table} SET {$setClause} WHERE id = ?";

        $params = array_values($data);
        $params[] = $id;

        return $this->db->query($sql, $params);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
