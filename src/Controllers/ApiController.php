<?php

namespace App\Controllers;

use App\Models\Project;
use App\Models\Contact;

class ApiController extends BaseController
{

    public function projects(): void
    {
        $projectModel = new Project();

        $category = $_GET['category'] ?? null;
        $limit = (int)($_GET['limit'] ?? 10);
        $offset = (int)($_GET['offset'] ?? 0);

        $projects = $projectModel->getFiltered($category, $limit, $offset);
        $total = $projectModel->getCount($category);

        $this->json([
            'success' => true,
            'data' => $projects,
            'pagination' => [
                'total' => $total,
                'limit' => $limit,
                'offset' => $offset,
                'has_more' => ($offset + $limit) < $total
            ]
        ]);
    }

    public function contact(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['success' => false, 'message' => 'Método não permitido'], 405);
            return;
        }

        $contactController = new ContactController();
        $contactController->store();
    }

    public function skills(): void
    {
        $skills = [
            'frontend' => [
                ['name' => 'HTML5', 'level' => 95],
                ['name' => 'CSS3', 'level' => 90],
                ['name' => 'JavaScript', 'level' => 85],
                ['name' => 'React', 'level' => 80],
                ['name' => 'Vue.js', 'level' => 75]
            ],
            'backend' => [
                ['name' => 'PHP', 'level' => 90],
                ['name' => 'Node.js', 'level' => 80],
                ['name' => 'Python', 'level' => 75],
                ['name' => 'MySQL', 'level' => 85],
                ['name' => 'PostgreSQL', 'level' => 70]
            ],
            'tools' => [
                ['name' => 'Git', 'level' => 90],
                ['name' => 'Docker', 'level' => 75],
                ['name' => 'AWS', 'level' => 70],
                ['name' => 'Linux', 'level' => 80]
            ]
        ];

        $this->json([
            'success' => true,
            'data' => $skills
        ]);
    }
}
