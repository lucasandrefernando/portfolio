<?php

namespace App\Utils;

class Cache
{
    private static $instance = null;
    private $cacheDir;
    private $defaultTtl = 3600; // 1 hora

    private function __construct()
    {
        $this->cacheDir = ROOT_PATH . '/cache';

        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0755, true);
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get(string $key, $default = null)
    {
        $filename = $this->getFilename($key);

        if (!file_exists($filename)) {
            return $default;
        }

        $data = file_get_contents($filename);
        $cache = unserialize($data);

        if ($cache['expires'] < time()) {
            unlink($filename);
            return $default;
        }

        return $cache['data'];
    }

    public function set(string $key, $value, int $ttl = null): bool
    {
        $ttl = $ttl ?? $this->defaultTtl;
        $filename = $this->getFilename($key);

        $cache = [
            'data' => $value,
            'expires' => time() + $ttl,
            'created' => time()
        ];

        return file_put_contents($filename, serialize($cache)) !== false;
    }

    public function delete(string $key): bool
    {
        $filename = $this->getFilename($key);

        if (file_exists($filename)) {
            return unlink($filename);
        }

        return true;
    }

    public function clear(): bool
    {
        $files = glob($this->cacheDir . '/*.cache');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        return true;
    }

    public function remember(string $key, callable $callback, int $ttl = null)
    {
        $value = $this->get($key);

        if ($value === null) {
            $value = $callback();
            $this->set($key, $value, $ttl);
        }

        return $value;
    }

    private function getFilename(string $key): string
    {
        $hash = md5($key);
        return $this->cacheDir . '/' . $hash . '.cache';
    }

    public function cleanExpired(): int
    {
        $files = glob($this->cacheDir . '/*.cache');
        $cleaned = 0;

        foreach ($files as $file) {
            if (is_file($file)) {
                $data = file_get_contents($file);
                $cache = unserialize($data);

                if ($cache['expires'] < time()) {
                    unlink($file);
                    $cleaned++;
                }
            }
        }

        return $cleaned;
    }

    public function getStats(): array
    {
        $files = glob($this->cacheDir . '/*.cache');
        $totalSize = 0;
        $totalFiles = count($files);
        $expired = 0;

        foreach ($files as $file) {
            if (is_file($file)) {
                $totalSize += filesize($file);

                $data = file_get_contents($file);
                $cache = unserialize($data);

                if ($cache['expires'] < time()) {
                    $expired++;
                }
            }
        }

        return [
            'total_files' => $totalFiles,
            'total_size' => $totalSize,
            'total_size_formatted' => $this->formatBytes($totalSize),
            'expired_files' => $expired,
            'cache_dir' => $this->cacheDir
        ];
    }

    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, 2) . ' ' . $units[$pow];
    }
}
