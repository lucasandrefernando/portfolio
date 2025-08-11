<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>
                    Olá, eu sou <span class="highlight">Lucas André</span>
                </h1>
                <p class="hero-subtitle">Desenvolvedor Full Stack</p>
                <p class="hero-description">
                    Especialista em PHP e JavaScript com mais de 10 anos de experiência em tecnologia,
                    infraestrutura e desenvolvimento de sistemas completos. Transformo ideias em soluções digitais robustas e escaláveis.
                </p>

                <div class="hero-buttons">
                    <a href="<?= APP_URL ?>/public/projetos" class="btn btn-primary">
                        Ver Projetos
                    </a>
                    <a href="<?= APP_URL ?>/public/contato" class="btn btn-secondary">
                        Entrar em Contato
                    </a>
                </div>

                <div class="hero-social">
                    <a href="https://github.com/lucasandrefernando" class="social-link" title="GitHub">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>
                    <a href="https://linkedin.com/in/lucasandrefernando" class="social-link" title="LinkedIn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                    <a href="mailto:lucas@anacron.com.br" class="social-link" title="Email">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-.904.732-1.636 1.636-1.636h.749L12 10.724l9.615-6.903h.749c.904 0 1.636.732 1.636 1.636z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="hero-image">
                <div class="hero-avatar">
                    <img src="<?= ASSETS_URL ?>/images/avatar-default.jpg" alt="Lucas André" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Preview -->
<?php if (!empty($projects)): ?>
    <section class="section">
        <div class="container">
            <h2 class="section-title">Projetos em Destaque</h2>

            <div class="projects-grid">
                <?php foreach ($projects as $project): ?>
                    <div class="project-card">
                        <div class="project-image">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0L19.2 12l-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
                            </svg>
                        </div>
                        <div class="project-content">
                            <h3><?= $project['title'] ?></h3>
                            <p><?= substr($project['description'], 0, 120) ?>...</p>
                            <div class="project-tech">
                                <?php
                                $techs = explode(',', $project['technologies']);
                                foreach (array_slice($techs, 0, 3) as $tech):
                                ?>
                                    <span class="tech-tag"><?= trim($tech) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center">
                <a href="<?= APP_URL ?>/public/projetos" class="btn btn-primary">Ver Todos os Projetos</a>
            </div>
        </div>
    </section>
<?php endif; ?>