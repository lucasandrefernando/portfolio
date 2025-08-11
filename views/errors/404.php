<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página Não Encontrada | Portfolio</title>
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
                radial-gradient(circle at 20% 80%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 215, 0, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .error-content {
            text-align: center;
            position: relative;
            z-index: 2;
            max-width: 600px;
            padding: 2rem;
        }

        .error-code {
            font-size: clamp(6rem, 15vw, 12rem);
            font-weight: 700;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 1rem;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                filter: drop-shadow(0 0 20px rgba(212, 175, 55, 0.3));
            }

            to {
                filter: drop-shadow(0 0 30px rgba(212, 175, 55, 0.6));
            }
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

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-element {
            position: absolute;
            color: rgba(212, 175, 55, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            bottom: 30%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
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
        <div class="floating-elements">
            <i class="floating-element fas fa-code" style="font-size: 3rem;"></i>
            <i class="floating-element fas fa-bug" style="font-size: 2rem;"></i>
            <i class="floating-element fas fa-search" style="font-size: 2.5rem;"></i>
        </div>

        <div class="error-content">
            <div class="error-code">404</div>
            <h1 class="error-title">Página Não Encontrada</h1>
            <p class="error-description">
                Ops! A página que você está procurando não existe ou foi movida.
                Que tal explorar outras seções do meu portfolio?
            </p>

            <div class="error-actions">
                <a href="/" class="btn btn-primary">
                    <i class="fas fa-home"></i>
                    Voltar ao Início
                </a>
                <a href="/projetos" class="btn btn-secondary">
                    <i class="fas fa-folder-open"></i>
                    Ver Projetos
                </a>
                <a href="/contato" class="btn btn-secondary">
                    <i class="fas fa-envelope"></i>
                    Entrar em Contato
                </a>
            </div>
        </div>
    </div>

    <script>
        // Adicionar efeito de partículas
        document.addEventListener('DOMContentLoaded', function() {
            const errorPage = document.querySelector('.error-page');

            // Criar partículas flutuantes
            for (let i = 0; i < 20; i++) {
                const particle = document.createElement('div');
                particle.style.position = 'absolute';
                particle.style.width = '2px';
                particle.style.height = '2px';
                particle.style.background = 'rgba(212, 175, 55, 0.3)';
                particle.style.borderRadius = '50%';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animation = `float ${3 + Math.random() * 4}s ease-in-out infinite`;
                particle.style.animationDelay = Math.random() * 2 + 's';

                errorPage.appendChild(particle);
            }

            // Efeito de digitação no código de erro
            const errorCode = document.querySelector('.error-code');
            const originalText = errorCode.textContent;
            errorCode.textContent = '';

            let i = 0;
            const typeEffect = setInterval(() => {
                errorCode.textContent += originalText[i];
                i++;
                if (i >= originalText.length) {
                    clearInterval(typeEffect);
                }
            }, 200);
        });
    </script>
</body>

</html>