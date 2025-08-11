<?php
// Configurações específicas para produção

// Configurações da aplicação
define('APP_NAME', 'Portfolio Lucas André');
define('APP_URL', 'https://anacron.com.br');
define('APP_DEBUG', false);

// Configurações do banco
define('DB_HOST', 'mysql49-farm1.kinghost.net');
define('DB_NAME', 'anacron01');
define('DB_USER', 'anacron01');
define('DB_PASS', 'X9a7T4p2M8c5L1z0');

// Configurações de email
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'lucasandre.sanos@gmail.com');
define('SMTP_PASS', getenv('MAIL_PASSWORD')); // Será definido pelo GitHub Actions
define('SMTP_FROM_EMAIL', 'lucasandre.sanos@gmail.com');
define('SMTP_FROM_NAME', 'Lucas André Fernando');

// Caminhos
define('ROOT_PATH', dirname(__DIR__));
define('SRC_PATH', ROOT_PATH . '/src');
define('VIEWS_PATH', ROOT_PATH . '/views');
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('ASSETS_URL', APP_URL . '/assets');
