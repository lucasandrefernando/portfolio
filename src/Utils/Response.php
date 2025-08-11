<?php

namespace App\Utils;

class Response
{

    public static function json(array $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    public static function redirect(string $url, int $status = 302): void
    {
        http_response_code($status);
        header("Location: {$url}");
        exit;
    }

    public static function download(string $filePath, string $filename = null): void
    {
        if (!file_exists($filePath)) {
            self::error404();
            return;
        }

        $filename = $filename ?: basename($filePath);
        $mimeType = mime_content_type($filePath) ?: 'application/octet-stream';

        header('Content-Type: ' . $mimeType);
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($filePath));
        header('Cache-Control: no-cache, must-revalidate');

        readfile($filePath);
        exit;
    }

    public static function error404(string $message = 'Página não encontrada'): void
    {
        http_response_code(404);
        if (self::isAjax()) {
            self::json(['error' => $message], 404);
        } else {
            require_once VIEWS_PATH . '/errors/404.php';
        }
        exit;
    }

    public static function error500(string $message = 'Erro interno do servidor'): void
    {
        http_response_code(500);
        if (self::isAjax()) {
            self::json(['error' => $message], 500);
        } else {
            require_once VIEWS_PATH . '/errors/500.php';
        }
        exit;
    }

    public static function cors(array $origins = ['*'], array $methods = ['GET', 'POST', 'PUT', 'DELETE']): void
    {
        $origin = $_SERVER['HTTP_ORIGIN'] ?? '';

        if (in_array('*', $origins) || in_array($origin, $origins)) {
            header('Access-Control-Allow-Origin: ' . ($origin ?: '*'));
        }

        header('Access-Control-Allow-Methods: ' . implode(', ', $methods));
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        header('Access-Control-Allow-Credentials: true');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
    }

    private static function isAjax(): bool
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}
