<?php
namespace App\Controllers;

class BaseController {
    
    protected function render($view, $data = []) {
        // Extrair variáveis para a view
        extract($data);
        
        // Capturar o conteúdo da view
        ob_start();
        include VIEWS_PATH . "/pages/{$view}.php";  // ← LINHA CORRIGIDA
        $content = ob_get_clean();
        
        // Incluir o layout principal
        include VIEWS_PATH . '/layouts/app.php';
    }
    
    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    protected function redirect($url) {
        header("Location: {$url}");
        exit;
    }
}
?>