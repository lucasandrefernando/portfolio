<?php

namespace App\Models;

class Project extends BaseModel
{
    protected $table = 'projects';

    public function getFeatured($limit = 3)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE featured = 1 AND status = 'completed' ORDER BY created_at DESC LIMIT ?";
            return $this->db->fetchAll($sql, [$limit]);
        } catch (Exception $e) {
            // Retornar projetos de exemplo
            return [
                [
                    'id' => 1,
                    'title' => 'Sistema de Gestão Empresarial',
                    'description' => 'Sistema completo para gestão de empresas com módulos de vendas, estoque, financeiro e relatórios.',
                    'technologies' => 'PHP, MySQL, JavaScript, HTML5, CSS3',
                    'category' => 'web',
                    'image' => null,
                    'github_url' => 'https://github.com/exemplo',
                    'demo_url' => 'https://demo.exemplo.com'
                ],
                [
                    'id' => 2,
                    'title' => 'E-commerce Responsivo',
                    'description' => 'Plataforma de e-commerce moderna e responsiva com carrinho de compras.',
                    'technologies' => 'PHP, MySQL, JavaScript, Bootstrap',
                    'category' => 'web',
                    'image' => null,
                    'github_url' => 'https://github.com/exemplo',
                    'demo_url' => 'https://demo.exemplo.com'
                ]
            ];
        }
    }

    public function getAll()
    {
        try {
            return $this->findAll();
        } catch (Exception $e) {
            return $this->getFeatured(10);
        }
    }
}
