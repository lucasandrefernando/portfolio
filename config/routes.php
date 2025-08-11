<?php
// Carregar classes manualmente
require_once SRC_PATH . '/Database/Database.php';
require_once SRC_PATH . '/Utils/Router.php';
require_once SRC_PATH . '/Controllers/BaseController.php';
require_once SRC_PATH . '/Controllers/HomeController.php';
require_once SRC_PATH . '/Controllers/ProfileController.php';
require_once SRC_PATH . '/Controllers/ContactController.php';
require_once SRC_PATH . '/Models/BaseModel.php';
require_once SRC_PATH . '/Models/User.php';
require_once SRC_PATH . '/Models/Project.php';
require_once SRC_PATH . '/Models/Contact.php';

use App\Utils\Router;
use App\Controllers\HomeController;
use App\Controllers\ProfileController;
use App\Controllers\ContactController;

$router = new Router();

// Definir rotas
$router->get('/home', HomeController::class, 'index');
$router->get('/', HomeController::class, 'index');
$router->get('/sobre', ProfileController::class, 'about');
$router->get('/projetos', ProfileController::class, 'projects');
$router->get('/contato', ContactController::class, 'index');
$router->post('/contato', ContactController::class, 'store'); // ← CORRIGIDO AQUI

return $router;
