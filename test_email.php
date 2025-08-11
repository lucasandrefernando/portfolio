<?php
require_once 'config/config.php';
require_once 'vendor/autoload.php';

// Carregar classes manualmente
require_once 'src/Utils/EmailService.php';
require_once 'src/Controllers/BaseController.php';
require_once 'src/Models/BaseModel.php';
require_once 'src/Models/Contact.php';
require_once 'src/Controllers/ContactController.php';

use App\Controllers\ContactController;

// Simular dados POST
$_POST = [
    'name' => 'Teste Direto',
    'email' => 'teste@teste.com',
    'phone' => '31999999999',
    'subject' => 'projeto',
    'message' => 'Teste direto do ContactController'
];

$_SERVER['REQUEST_METHOD'] = 'POST';

echo "=== TESTE DIRETO DO CONTACTCONTROLLER ===\n";

try {
    $controller = new ContactController();
    echo "Controller criado com sucesso\n";

    echo "Chamando método store()...\n";
    $controller->store();
} catch (Exception $e) {
    echo "ERRO: " . $e->getMessage() . "\n";
    echo "TRACE: " . $e->getTraceAsString() . "\n";
}
