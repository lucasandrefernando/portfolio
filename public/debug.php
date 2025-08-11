<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Debug Portfolio</h1>";

// Teste 1: PHP básico
echo "<h2>✅ PHP funcionando</h2>";

// Teste 2: Verificar se o arquivo config existe
$configPath = __DIR__ . '/../config/config.php';
echo "<h2>Teste Config:</h2>";
echo "Caminho: " . $configPath . "<br>";
echo "Existe: " . (file_exists($configPath) ? "✅ SIM" : "❌ NÃO") . "<br>";

// Teste 3: Verificar composer
$vendorPath = __DIR__ . '/../vendor/autoload.php';
echo "<h2>Teste Composer:</h2>";
echo "Caminho: " . $vendorPath . "<br>";
echo "Existe: " . (file_exists($vendorPath) ? "✅ SIM" : "❌ NÃO") . "<br>";

// Teste 4: Verificar .env
$envPath = __DIR__ . '/../.env';
echo "<h2>Teste .env:</h2>";
echo "Caminho: " . $envPath . "<br>";
echo "Existe: " . (file_exists($envPath) ? "✅ SIM" : "❌ NÃO") . "<br>";

if (file_exists($vendorPath)) {
    try {
        require_once $vendorPath;
        echo "<h2>✅ Autoload carregado</h2>";

        if (file_exists($configPath)) {
            require_once $configPath;
            echo "<h2>✅ Config carregado</h2>";
        }
    } catch (Exception $e) {
        echo "<h2>❌ Erro ao carregar:</h2>";
        echo "<pre>" . $e->getMessage() . "</pre>";
    }
}

phpinfo();
