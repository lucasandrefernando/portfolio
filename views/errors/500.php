<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Erro Interno | Portfolio</title>
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .error-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-dark);
            position: relative;
            overflow: hidden;
        }

        .error-page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 30% 70%, rgba(231, 76, 60, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 30%, rgba(212, 175, 55, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .error-content {
            text-align: center;
            position: relative;
            z-index: 2;
            max-width: 600px;
            padding: 2rem;
        }

        .error-icon {
            font-size: 5rem;
            color: #e74c3c;
            margin-bottom: 2rem;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        .error-code {
            font-size: clamp(4rem, 10vw, 8rem);
            font-weight: 700;
            color: #e74c3c;
            line-height: 1;
            margin-bottom: 1rem;
        }

        .error-title {
            font-size: 2.5rem;
            color: var(--text-white);
            margin-bottom: 1rem;
        }

        .error-description {
            font-size: 1.2rem;
            color: rgba(245, 245, 245, 0.8);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .error-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .error-details {
            background: rgba(26, 26, 26, 0.8);
            border: 1px solid rgba(231, 76, 60, 0.3);
            border-radius: 8px;
            padding: 1rem;
            margin: 2rem 0;
            text-align: left;
            max-width: 100%;
            overflow-x: auto;
        }

        .error-details h4 {
            color: #e74c3c;
            margin-bottom: 0.5rem;
        }

        .error-details p {
            color: rgba(245, 245, 245, 0.9);
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            margin: 0;
        }

        @media (max-width: 768px) {
            .error-actions {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>

<body>
    <div class="error-page">
        <div class="error-content">
            <div class="error-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>

            <div class="error-code">500</div>
            <h1 class="error-title">Erro Interno do Servidor</h1>
            <p class="error-description">
                Oops! Algo deu errado no servidor. Nossa equipe foi notificada
                e está trabalhando para resolver o problema o mais rápido possível.
            </p>

            <?php if (APP_DEBUG && isset($message)): ?>
                <div class="error-details">
                    <h4>Detalhes do Erro (Modo Debug):</h4>
                    <p><?= htmlspecialchars($message) ?></p>
                </div>
            <?php endif; ?>

            <div class="error-actions">
                <a href="/" class="btn btn-primary">
                    <i class="fas fa-home"></i>
                    Voltar ao Início
                </a>
                <button onclick="window.location.reload()" class="btn btn-secondary">
                    <i class="fas fa-redo"></i>
                    Tentar Novamente
                </button>
                <a href="/contato" class="btn btn-secondary">
                    <i class="fas fa-envelope"></i>
                    Reportar Problema
                </a>
            </div>
        </div>
    </div>

    <script>
        // Auto-reload após 30 segundos (opcional)
        setTimeout(() => {
            if (confirm('Deseja tentar recarregar a página automaticamente?')) {
                window.location.reload();
            }
        }, 30000);
    </script>
</body>

</html>