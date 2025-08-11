    <?php

    namespace App\Utils;

    use Monolog\Logger as MonologLogger;
    use Monolog\Handler\StreamHandler;
    use Monolog\Handler\RotatingFileHandler;
    use Monolog\Formatter\LineFormatter;

    class Logger
    {
        private static $instance = null;
        private $logger;

        private function __construct()
        {
            $this->logger = new MonologLogger('portfolio');

            // Handler para arquivo rotativo
            $handler = new RotatingFileHandler(
                ROOT_PATH . '/logs/app.log',
                0, // Manter todos os arquivos
                MonologLogger::DEBUG
            );

            // Formatter personalizado
            $formatter = new LineFormatter(
                "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n",
                'Y-m-d H:i:s'
            );

            $handler->setFormatter($formatter);
            $this->logger->pushHandler($handler);

            // Handler para erros críticos (email, se configurado)
            if (!APP_DEBUG) {
                $criticalHandler = new StreamHandler(
                    ROOT_PATH . '/logs/critical.log',
                    MonologLogger::CRITICAL
                );
                $this->logger->pushHandler($criticalHandler);
            }
        }

        public static function getInstance(): self
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function debug(string $message, array $context = []): void
        {
            $this->logger->debug($message, $context);
        }

        public function info(string $message, array $context = []): void
        {
            $this->logger->info($message, $context);
        }

        public function warning(string $message, array $context = []): void
        {
            $this->logger->warning($message, $context);
        }

        public function error(string $message, array $context = []): void
        {
            $this->logger->error($message, $context);
        }

        public function critical(string $message, array $context = []): void
        {
            $this->logger->critical($message, $context);
        }

        public function logRequest(): void
        {
            $this->info('Request', [
                'method' => $_SERVER['REQUEST_METHOD'] ?? 'Unknown',
                'uri' => $_SERVER['REQUEST_URI'] ?? 'Unknown',
                'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown',
                'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'
            ]);
        }

        public function logPerformance(float $executionTime, int $memoryUsage): void
        {
            $this->info('Performance', [
                'execution_time' => round($executionTime, 4) . 's',
                'memory_usage' => round($memoryUsage / 1024 / 1024, 2) . 'MB'
            ]);
        }
    }
