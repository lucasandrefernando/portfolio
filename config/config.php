<?php

/**
 * Configurações da Aplicação
 */

// Definir constantes de caminho
define('ROOT_PATH', dirname(__DIR__));
define('SRC_PATH', ROOT_PATH . '/src');
define('CONFIG_PATH', ROOT_PATH . '/config');
define('VIEWS_PATH', ROOT_PATH . '/views');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Carregar variáveis de ambiente
if (file_exists(ROOT_PATH . '/vendor/autoload.php')) {
    require_once ROOT_PATH . '/vendor/autoload.php';

    if (class_exists('Dotenv\Dotenv')) {
        try {
            $dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
            $dotenv->load(); // Mudei de safeLoad() para load()
        } catch (Exception $e) {
            error_log("Erro ao carregar .env: " . $e->getMessage());
        }
    }
}

// URLs
define('APP_URL', $_ENV['APP_URL'] ?? 'http://localhost/portfolio');
define('ASSETS_URL', APP_URL . '/public/assets');

// Configurações da aplicação
define('APP_ENV', $_ENV['APP_ENV'] ?? 'development');
define('APP_DEBUG', filter_var($_ENV['APP_DEBUG'] ?? 'true', FILTER_VALIDATE_BOOLEAN));

// Configurações do banco de dados
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'portfolio_db');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');

// Configurações de email - FORÇAR OS VALORES
define('MAIL_HOST', $_ENV['MAIL_HOST'] ?? 'smtp.gmail.com');
define('MAIL_PORT', $_ENV['MAIL_PORT'] ?? 587);
define('MAIL_USERNAME', $_ENV['MAIL_USERNAME'] ?? 'lucasandre.sanos@gmail.com');
define('MAIL_PASSWORD', $_ENV['MAIL_PASSWORD'] ?? 'azym wlno dsci lazh');
define('MAIL_FROM_NAME', $_ENV['MAIL_FROM_NAME'] ?? 'Portfolio - Lucas André');

// DEBUG: Log das configurações de email
if (defined('APP_DEBUG') && APP_DEBUG) {
    error_log("=== EMAIL CONFIG DEBUG ===");
    error_log("MAIL_HOST: " . MAIL_HOST);
    error_log("MAIL_USERNAME: " . MAIL_USERNAME);
    error_log("MAIL_PASSWORD: " . (MAIL_PASSWORD ? "***SET***" : "***EMPTY***"));
}

// Configurações de sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Timezone
date_default_timezone_set('America/Sao_Paulo');

// Headers de segurança
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
