<?php
// config/server.php
// Configurações específicas para produção na KingHost

// Configurações de erro para produção
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '../logs/php_errors.log');

// Configurações de sessão
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_strict_mode', 1);

// Configurações de upload
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');

// Timezone
date_default_timezone_set('America/Sao_Paulo');

// Configurações de cache
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Função para sanitizar dados
function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

// Função para validar CSRF token
function validateCSRF($token)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Gerar CSRF token
function generateCSRF()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}
