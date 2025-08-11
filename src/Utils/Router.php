<?php

namespace App\Utils;

class Router
{
    private $routes = [];

    public function get($path, $controller, $method = 'index')
    {
        $this->routes['GET'][$path] = ['controller' => $controller, 'method' => $method];
    }

    public function post($path, $controller, $method = 'store')
    {
        $this->routes['POST'][$path] = ['controller' => $controller, 'method' => $method];
    }

    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_SERVER['REQUEST_URI'];

        // Debug
        if (APP_DEBUG) {
            echo "<!-- DEBUG: URI = {$requestUri} -->";
        }

        // Limpar a URI
        $path = parse_url($requestUri, PHP_URL_PATH);
        $path = str_replace('/portfolio/public', '', $path);

        // Se vazio ou /, redirecionar para /home
        if (empty($path) || $path === '/') {
            $path = '/home';
        }

        // Debug
        if (APP_DEBUG) {
            echo "<!-- DEBUG: Path processado = {$path} -->";
        }

        // Verificar se a rota existe
        if (isset($this->routes[$requestMethod][$path])) {
            $route = $this->routes[$requestMethod][$path];
            $controllerName = $route['controller'];
            $methodName = $route['method'];

            try {
                $controller = new $controllerName();
                return $controller->$methodName();
            } catch (Exception $e) {
                if (APP_DEBUG) {
                    echo "<h2>Erro no Controller:</h2>";
                    echo "<pre>" . $e->getMessage() . "</pre>";
                } else {
                    $this->show404();
                }
            }
        } else {
            $this->show404();
        }
    }

    private function show404()
    {
        http_response_code(404);
        echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página não encontrada</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; background: #f8f9fa; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        h1 { color: #e74c3c; font-size: 4rem; margin-bottom: 20px; }
        h2 { color: #2c3e50; margin-bottom: 20px; }
        p { color: #7f8c8d; margin-bottom: 30px; }
        .btn { display: inline-block; padding: 12px 24px; margin: 10px; background: #3498db; color: white; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #2980b9; }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Página Não Encontrada</h2>
        <p>Ops! A página que você está procurando não existe ou foi movida.</p>
        <a href="/portfolio/public/" class="btn">🏠 Voltar ao Início</a>
        <a href="/portfolio/public/projetos" class="btn">💼 Ver Projetos</a>
        <a href="/portfolio/public/contato" class="btn">📧 Entrar em Contato</a>
    </div>
</body>
</html>';
    }
}
