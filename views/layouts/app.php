<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Lucas André Fernando - Desenvolvedor Full Stack' ?></title>
    <meta name="description" content="<?= $description ?? 'Portfolio profissional de Lucas André Fernando' ?>">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* === NOVA PALETA ELEGANTE === */
            --bg-primary: #0A0A0A;
            --bg-secondary: #151515;
            --bg-tertiary: #1F1F1F;
            --bg-card: #1A1A1A;

            /* === CORES DE DESTAQUE === */
            --accent-primary: #00D4FF;
            --accent-secondary: #6366F1;
            --accent-tertiary: #10B981;
            --accent-warm: #F59E0B;

            /* === GRADIENTES === */
            --gradient-primary: linear-gradient(135deg, #00D4FF 0%, #6366F1 100%);
            --gradient-secondary: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
            --gradient-warm: linear-gradient(135deg, #F59E0B 0%, #EF4444 100%);
            --gradient-success: linear-gradient(135deg, #10B981 0%, #059669 100%);

            /* === TEXTO === */
            --text-primary: #FFFFFF;
            --text-secondary: #E5E7EB;
            --text-muted: #9CA3AF;
            --text-dark: #374151;

            /* === BORDAS === */
            --border-primary: #2D2D2D;
            --border-secondary: #404040;
            --border-accent: #00D4FF;

            /* === SOMBRAS === */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --shadow-glow: 0 0 20px rgba(0, 212, 255, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            font-weight: 400;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ===== TRANSIÇÕES DE PÁGINA ===== */
        .page-transition {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-primary);
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page-transition.active {
            opacity: 1;
            visibility: visible;
        }

        .page-transition::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .main {
            margin-top: 80px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ===== HEADER ===== */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-primary);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            position: relative;
            transition: all 0.3s ease;
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-primary);
            transition: width 0.4s ease;
        }

        .logo:hover::after {
            width: 100%;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 40px;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            position: relative;
            transition: all 0.3s ease;
            padding: 8px 0;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--accent-primary);
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            width: 100%;
        }

        /* ===== HERO SECTION ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background:
                radial-gradient(circle at 20% 80%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(99, 102, 241, 0.1) 0%, transparent 50%),
                var(--bg-primary);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23333" stroke-width="0.5" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.5;
            pointer-events: none;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 56px;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 24px;
            color: var(--text-primary);
        }

        .highlight {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 20px;
            font-weight: 600;
            color: var(--accent-primary);
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero-description {
            font-size: 18px;
            color: var(--text-secondary);
            margin-bottom: 40px;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 32px;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: var(--text-primary);
            border: none;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #6366F1 0%, #00D4FF 100%);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .btn-primary:hover::before {
            left: 0;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-glow);
        }

        .btn-secondary {
            background: transparent;
            color: var(--accent-primary);
            border: 2px solid var(--accent-primary);
        }

        .btn-secondary:hover {
            background: var(--accent-primary);
            color: var(--bg-primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .hero-social {
            display: flex;
            gap: 16px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: var(--bg-card);
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 12px;
            border: 1px solid var(--border-primary);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: var(--gradient-primary);
            transition: width 0.3s ease;
            z-index: -1;
        }

        .social-link:hover::before {
            width: 100%;
        }

        .social-link:hover {
            color: var(--text-primary);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            border-color: var(--accent-primary);
        }

        .hero-image {
            position: relative;
        }

        .hero-avatar {
            width: 350px;
            height: 350px;
            border-radius: 24px;
            overflow: hidden;
            position: relative;
            margin: 0 auto;
            background: var(--bg-card);
            border: 2px solid var(--border-secondary);
            transition: all 0.3s ease;
        }

        .hero-avatar::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: var(--gradient-primary);
            border-radius: 26px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .hero-avatar:hover::before {
            opacity: 1;
        }

        .hero-avatar:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .hero-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 22px;
        }

        /* ===== SECTIONS ===== */
        .section {
            padding: 80px 0;
            position: relative;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 60px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -16px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        /* ===== PROJECTS ===== */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 32px;
            margin-bottom: 48px;
        }

        .project-card {
            background: var(--bg-card);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-primary);
            transition: all 0.3s ease;
            position: relative;
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gradient-primary);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            border-radius: 20px;
        }

        .project-card:hover::before {
            opacity: 0.05;
        }

        .project-card:hover {
            transform: translateY(-8px);
            border-color: var(--accent-primary);
            box-shadow: var(--shadow-xl);
        }

        .project-image {
            height: 200px;
            background: var(--bg-tertiary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-primary);
            font-size: 48px;
        }

        .project-content {
            padding: 32px;
        }

        .project-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 16px;
            color: var(--text-primary);
        }

        .project-content p {
            color: var(--text-secondary);
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tech-tag {
            background: var(--bg-tertiary);
            color: var(--accent-primary);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 1px solid var(--border-secondary);
        }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--bg-secondary);
            border-top: 1px solid var(--border-primary);
            padding: 60px 0 24px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer h3,
        .footer h4 {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        .footer ul {
            list-style: none;
        }

        .footer ul li {
            margin-bottom: 12px;
        }

        .footer a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--accent-primary);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid var(--border-primary);
            color: var(--text-muted);
        }

        .text-center {
            text-align: center;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 40px;
            }

            .hero-text h1 {
                font-size: 40px;
            }

            .hero-avatar {
                width: 280px;
                height: 280px;
            }

            .nav-menu {
                flex-direction: column;
                gap: 20px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .section-title {
                font-size: 36px;
            }
        }
    </style>
</head>

<body>

    <!-- Page Transition -->
    <div class="page-transition" id="pageTransition"></div>

    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="<?= APP_URL ?>/public/" class="logo">Lucas André</a>
                <ul class="nav-menu">
                    <li><a href="<?= APP_URL ?>/public/" class="nav-link <?= $page === 'home' ? 'active' : '' ?>" onclick="pageTransition(this.href)">Início</a></li>
                    <li><a href="<?= APP_URL ?>/public/sobre" class="nav-link <?= $page === 'about' ? 'active' : '' ?>" onclick="pageTransition(this.href)">Sobre</a></li>
                    <li><a href="<?= APP_URL ?>/public/projetos" class="nav-link <?= $page === 'projects' ? 'active' : '' ?>" onclick="pageTransition(this.href)">Projetos</a></li>
                    <li><a href="<?= APP_URL ?>/public/contato" class="nav-link <?= $page === 'contact' ? 'active' : '' ?>" onclick="pageTransition(this.href)">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <?= $content ?>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <h3>Lucas André Fernando</h3>
                    <p>Desenvolvedor Full Stack especializado em PHP e JavaScript com mais de 10 anos de experiência em tecnologia e infraestrutura.</p>
                </div>
                <div>
                    <h4>Contato Profissional</h4>
                    <ul>
                        <li>✉️ lucas@anacron.com.br</li>
                        <li>📍 Belo Horizonte, MG</li>
                        <li>🏢 Eagle Telecom</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> Lucas André Fernando. Desenvolvido com excelência e dedicação.</p>
            </div>
        </div>
    </footer>

    <script>
        // Transições de página
        function pageTransition(url) {
            event.preventDefault();
            const transition = document.getElementById('pageTransition');
            transition.classList.add('active');

            setTimeout(() => {
                window.location.href = url;
            }, 500);
        }

        // Remover transição ao carregar
        window.addEventListener('load', () => {
            const transition = document.getElementById('pageTransition');
            transition.classList.remove('active');
        });

        // Adicionar transição nos botões também
        document.querySelectorAll('.btn').forEach(btn => {
            if (btn.href && !btn.href.includes('mailto:') && !btn.href.includes('http')) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    pageTransition(this.href);
                });
            }
        });
    </script>

</body>

</html>