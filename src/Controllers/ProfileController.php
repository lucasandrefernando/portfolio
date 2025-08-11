<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Project;

class ProfileController extends BaseController
{

    public function about()
    {
        try {
            $userModel = new User();
            $user = $userModel->getProfile();

            $this->render('about', [ // ← REMOVIDO "pages/"
                'title' => 'Sobre - ' . ($user['name'] ?? 'Lucas André Fernando'),
                'description' => 'Conheça mais sobre ' . ($user['name'] ?? 'Lucas André Fernando'),
                'page' => 'about',
                'user' => $user
            ]);
        } catch (Exception $e) {
            if (APP_DEBUG) {
                echo "Erro no ProfileController::about: " . $e->getMessage();
            } else {
                $this->render('errors/500');
            }
        }
    }

    public function projects()
    {
        try {
            $projectModel = new Project();
            $projects = $projectModel->getAll();

            $this->render('projects', [ // ← REMOVIDO "pages/"
                'title' => 'Projetos - Portfolio',
                'description' => 'Confira todos os projetos desenvolvidos',
                'page' => 'projects',
                'projects' => $projects
            ]);
        } catch (Exception $e) {
            if (APP_DEBUG) {
                echo "Erro no ProfileController::projects: " . $e->getMessage();
            } else {
                $this->render('errors/500');
            }
        }
    }
}
