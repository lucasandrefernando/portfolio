<?php

namespace App\Models;

class Contact extends BaseModel
{
    protected $table = 'contacts';

    public function saveContact($data): ?int
    {
        try {
            $sql = "INSERT INTO {$this->table} (name, email, phone, subject, message, created_at) 
                    VALUES (:name, :email, :phone, :subject, :message, :created_at)";

            $stmt = $this->db->prepare($sql);

            $result = $stmt->execute([
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':subject' => $data['subject'],
                ':message' => $data['message'],
                ':created_at' => $data['created_at']
            ]);

            return $result ? (int)$this->db->lastInsertId() : null;
        } catch (\PDOException $e) {
            error_log("Erro ao salvar contato: " . $e->getMessage());
            return null;
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
}
