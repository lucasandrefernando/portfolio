<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Project;

class HomeController extends BaseController
{

    public function index()
    {
        try {
            // Buscar dados do usuário
            $userModel = new User();
            $user = $userModel->getProfile();

            // Buscar projetos em destaque
            $projectModel = new Project();
            $featuredProjects = $projectModel->getFeatured(3);

            // Renderizar a view
            $this->render('home', [ // ← REMOVIDO "pages/"
                'title' => 'Lucas André Fernando - Desenvolvedor Full Stack',
                'description' => 'Portfolio profissional de Lucas André Fernando',
                'page' => 'home',
                'user' => $user,
                'projects' => $featuredProjects
            ]);
        } catch (Exception $e) {
            if (APP_DEBUG) {
                echo "Erro no HomeController: " . $e->getMessage();
            } else {
                $this->render('errors/500');
            }
        }
    }
}
