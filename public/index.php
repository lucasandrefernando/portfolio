<?php

/**
 * Portfolio - Entry Point
 */

// Ativar erros em desenvolvimento
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Carregar configurações
    require_once __DIR__ . '/../config/config.php';

    // Carregar rotas
    $router = require_once __DIR__ . '/../config/routes.php';

    // Processar requisição
    $router->dispatch();
} catch (Exception $e) {
    if (defined('APP_DEBUG') && APP_DEBUG) {
        echo "<h2>❌ ERRO:</h2>";
        echo "<pre>" . $e->getMessage() . "</pre>";
        echo "<pre>" . $e->getTraceAsString() . "</pre>";
    } else {
        echo "Erro interno do servidor";
    }
} catch (Error $e) {
    if (defined('APP_DEBUG') && APP_DEBUG) {
        echo "<h2>❌ ERRO FATAL:</h2>";
        echo "<pre>" . $e->getMessage() . "</pre>";
    } else {
        echo "Erro interno do servidor";
    }
}
