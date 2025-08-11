<!-- Hero About Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>A Jornada de <span class="highlight">Lucas André Fernando</span></h1>
                <p class="hero-subtitle">32 Anos | Desenvolvedor Full Stack</p>
                <p class="hero-description">
                    Uma história de transformação através da disciplina, tecnologia e valores sólidos.
                    Dos 14 anos em regime militar até se tornar um desenvolvedor especialista em soluções completas.
                </p>
            </div>

            <div class="hero-image">
                <div class="hero-avatar">
                    <img src="<?= ASSETS_URL ?>/images/avatar-default.jpg" alt="Lucas André Fernando" />
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Estilos específicos para a página Sobre */
    .stats-container {
        background: var(--bg-secondary);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .stats-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 30% 70%, rgba(0, 212, 255, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 70% 30%, rgba(99, 102, 241, 0.05) 0%, transparent 50%);
        pointer-events: none;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 32px;
        position: relative;
        z-index: 2;
    }

    .stat-card {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 40px 32px;
        text-align: center;
        border: 1px solid var(--border-primary);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-primary);
        opacity: 0.05;
        transition: left 0.5s ease;
    }

    .stat-card:hover::before {
        left: 0;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        border-color: var(--accent-primary);
        box-shadow: var(--shadow-xl);
    }

    .stat-icon {
        font-size: 48px;
        margin-bottom: 20px;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-number {
        font-family: 'Playfair Display', serif;
        font-size: 48px;
        font-weight: 700;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 8px;
        display: block;
    }

    .stat-label {
        color: var(--text-secondary);
        font-weight: 500;
        font-size: 16px;
    }

    .timeline-container {
        position: relative;
        max-width: 1000px;
        margin: 0 auto;
    }

    .timeline-line {
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--gradient-primary);
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 80px;
        opacity: 0;
        animation: fadeInUp 0.8s ease forwards;
    }

    .timeline-item:nth-child(1) {
        animation-delay: 0.2s;
    }

    .timeline-item:nth-child(2) {
        animation-delay: 0.4s;
    }

    .timeline-item:nth-child(3) {
        animation-delay: 0.6s;
    }

    .timeline-item:nth-child(4) {
        animation-delay: 0.8s;
    }

    .timeline-item:nth-child(5) {
        animation-delay: 1.0s;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .timeline-content {
        width: 45%;
        background: var(--bg-card);
        border-radius: 20px;
        padding: 40px;
        border: 1px solid var(--border-primary);
        position: relative;
        transition: all 0.4s ease;
    }

    .timeline-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-primary);
        border-radius: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .timeline-content:hover::before {
        opacity: 0.05;
    }

    .timeline-content:hover {
        transform: translateY(-8px);
        border-color: var(--accent-primary);
        box-shadow: var(--shadow-xl);
    }

    .timeline-item:nth-child(even) .timeline-content {
        margin-left: auto;
    }

    .timeline-content::after {
        content: '';
        position: absolute;
        top: 40px;
        width: 0;
        height: 0;
        border: 20px solid transparent;
    }

    .timeline-item:nth-child(odd) .timeline-content::after {
        right: -40px;
        border-left-color: var(--bg-card);
    }

    .timeline-item:nth-child(even) .timeline-content::after {
        left: -40px;
        border-right-color: var(--bg-card);
    }

    .timeline-icon {
        position: absolute;
        left: 50%;
        top: 30px;
        transform: translateX(-50%);
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-primary);
        font-size: 32px;
        border: 4px solid var(--bg-primary);
        z-index: 10;
        box-shadow: var(--shadow-lg);
    }

    .timeline-year {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .timeline-title {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 20px;
        color: var(--text-primary);
    }

    .timeline-description {
        color: var(--text-secondary);
        line-height: 1.8;
        margin-bottom: 24px;
        font-size: 16px;
    }

    .timeline-highlights {
        margin-bottom: 24px;
    }

    .timeline-highlights h4 {
        color: var(--accent-primary);
        font-size: 16px;
        margin-bottom: 12px;
        font-weight: 600;
    }

    .timeline-highlights ul {
        list-style: none;
        padding: 0;
    }

    .timeline-highlights li {
        color: var(--text-secondary);
        margin-bottom: 8px;
        padding-left: 20px;
        position: relative;
    }

    .timeline-highlights li::before {
        content: '▶';
        position: absolute;
        left: 0;
        color: var(--accent-primary);
        font-size: 12px;
    }

    .timeline-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .experience-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 32px;
    }

    .experience-card {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 32px;
        border: 1px solid var(--border-primary);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .experience-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-primary);
        border-radius: 0 2px 2px 0;
    }

    .experience-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: var(--accent-primary);
    }

    .experience-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .experience-title {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 8px;
    }

    .experience-company {
        color: var(--accent-primary);
        font-weight: 600;
        font-size: 16px;
    }

    .experience-period {
        background: var(--bg-tertiary);
        color: var(--text-secondary);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        border: 1px solid var(--border-secondary);
    }

    .experience-description {
        color: var(--text-secondary);
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .experience-achievements {
        margin-bottom: 20px;
    }

    .experience-achievements h4 {
        color: var(--accent-primary);
        font-size: 16px;
        margin-bottom: 12px;
        font-weight: 600;
    }

    .experience-achievements ul {
        list-style: none;
        padding: 0;
    }

    .experience-achievements li {
        color: var(--text-secondary);
        margin-bottom: 8px;
        padding-left: 20px;
        position: relative;
        line-height: 1.6;
    }

    .experience-achievements li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--accent-tertiary);
        font-weight: bold;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 32px;
    }

    .value-card {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 40px 32px;
        border: 1px solid var(--border-primary);
        transition: all 0.4s ease;
        position: relative;
        text-align: center;
    }

    .value-card::before {
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

    .value-card:hover::before {
        opacity: 0.05;
    }

    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: var(--accent-primary);
    }

    .value-icon {
        font-size: 48px;
        margin-bottom: 24px;
        display: block;
    }

    .value-title {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 16px;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .value-description {
        color: var(--text-secondary);
        line-height: 1.7;
    }

    @media (max-width: 768px) {
        .timeline-line {
            left: 30px;
        }

        .timeline-content {
            width: calc(100% - 80px);
            margin-left: 80px !important;
        }

        .timeline-icon {
            left: 30px;
        }

        .timeline-content::after {
            display: none;
        }

        .experience-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<!-- Estatísticas -->
<section class="stats-container">
    <div class="container">
        <h2 class="section-title">Números da Jornada</h2>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">🚀</div>
                <span class="stat-number">10+</span>
                <div class="stat-label">Anos de Experiência</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🎖️</div>
                <span class="stat-number">8</span>
                <div class="stat-label">Anos de Formação Militar</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🎓</div>
                <span class="stat-number">97%</span>
                <div class="stat-label">Aproveitamento Acadêmico</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">❤️</div>
                <span class="stat-number">13</span>
                <div class="stat-label">Anos de Casamento</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">💼</div>
                <span class="stat-number">6</span>
                <div class="stat-label">Empresas de Destaque</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🏠</div>
                <span class="stat-number">32</span>
                <div class="stat-label">Anos de Vida</div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline da Vida -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Linha do Tempo</h2>

        <div class="timeline-container">
            <div class="timeline-line"></div>

            <!-- 2007-2015: Formação Militar -->
            <div class="timeline-item">
                <div class="timeline-icon">🎖️</div>
                <div class="timeline-content">
                    <div class="timeline-year">2007 - 2015</div>
                    <h3 class="timeline-title">Formação na Disciplina</h3>
                    <p class="timeline-description">
                        Aos 14 anos, ingressei na <strong>Escola Estadual Cidade dos Meninos São Vicente de Paula</strong>,
                        uma instituição de internato com regime militar. Durante 8 anos, vivi uma experiência transformadora
                        que moldou meu caráter e me preparou para os desafios da vida.
                    </p>

                    <div class="timeline-highlights">
                        <h4>🎯 Valores Aprendidos:</h4>
                        <ul>
                            <li>Disciplina e organização pessoal</li>
                            <li>Responsabilidade e comprometimento</li>
                            <li>Respeito e trabalho em equipe</li>
                            <li>Foco em objetivos de longo prazo</li>
                        </ul>
                    </div>

                    <div class="timeline-highlights">
                        <h4>💻 Cursos Realizados:</h4>
                        <ul>
                            <li>Informática Básica e Avançada</li>
                            <li>Manutenção de Microcomputadores</li>
                            <li>Redes de Computadores</li>
                            <li>Projeção 3D e AutoCAD</li>
                            <li>Web Design e Programação</li>
                        </ul>
                    </div>

                    <div class="timeline-tags">
                        <span class="tech-tag">Disciplina</span>
                        <span class="tech-tag">Informática</span>
                        <span class="tech-tag">Redes</span>
                        <span class="tech-tag">Programação</span>
                        <span class="tech-tag">AutoCAD</span>
                    </div>
                </div>
            </div>

            <!-- 2012-2016: Formação Acadêmica -->
            <div class="timeline-item">
                <div class="timeline-icon">🎓</div>
                <div class="timeline-content">
                    <div class="timeline-year">2012 - 2016</div>
                    <h3 class="timeline-title">Excelência Acadêmica</h3>
                    <p class="timeline-description">
                        Um ano após minha formatura no ensino médio, iniciei o curso de <strong>Sistemas de Informação
                            na Faculdade Anhanguera</strong>. Foi um período de intensa dedicação aos estudos, onde consegui
                        um aproveitamento excepcional de 97%.
                    </p>

                    <div class="timeline-highlights">
                        <h4>📚 Conquistas Acadêmicas:</h4>
                        <ul>
                            <li>97% de aproveitamento no curso</li>
                            <li>Especialização em desenvolvimento Full Stack</li>
                            <li>Foco em tecnologias front-end</li>
                            <li>Múltiplas certificações complementares</li>
                        </ul>
                    </div>

                    <div class="timeline-highlights">
                        <h4>🛠️ Tecnologias Dominadas:</h4>
                        <ul>
                            <li>PHP - Linguagem principal</li>
                            <li>JavaScript - Especialidade front-end</li>
                            <li>Banco de dados relacionais</li>
                            <li>Desenvolvimento web completo</li>
                        </ul>
                    </div>

                    <div class="timeline-tags">
                        <span class="tech-tag">Sistemas de Informação</span>
                        <span class="tech-tag">PHP</span>
                        <span class="tech-tag">JavaScript</span>
                        <span class="tech-tag">Full Stack</span>
                        <span class="tech-tag">97% Aproveitamento</span>
                    </div>
                </div>
            </div>

            <!-- 2013-2019: Infraestrutura -->
            <div class="timeline-item">
                <div class="timeline-icon">🖥️</div>
                <div class="timeline-content">
                    <div class="timeline-year">2013 - 2019</div>
                    <h3 class="timeline-title">Especialista em Infraestrutura</h3>
                    <p class="timeline-description">
                        Na <strong>Apoio Mineiro S.A.</strong>, atuei como Analista de Infraestrutura de TI por mais de 5 anos.
                        Este período foi fundamental para construir uma base sólida em tecnologia e financiar minha evolução
                        acadêmica e profissional.
                    </p>

                    <div class="timeline-highlights">
                        <h4>🔧 Responsabilidades Principais:</h4>
                        <ul>
                            <li>Gerenciamento de servidores e redes</li>
                            <li>Implementação de soluções de segurança</li>
                            <li>Virtualização e cloud computing</li>
                            <li>Suporte técnico especializado</li>
                            <li>Gestão de backups e recuperação</li>
                        </ul>
                    </div>

                    <div class="timeline-highlights">
                        <h4>🎯 Conquistas:</h4>
                        <ul>
                            <li>Otimização da infraestrutura de TI</li>
                            <li>Redução de custos operacionais</li>
                            <li>Implementação de novos sistemas</li>
                            <li>Treinamento de equipes técnicas</li>
                        </ul>
                    </div>

                    <div class="timeline-tags">
                        <span class="tech-tag">Infraestrutura</span>
                        <span class="tech-tag">Servidores</span>
                        <span class="tech-tag">Virtualização</span>
                        <span class="tech-tag">Segurança</span>
                        <span class="tech-tag">Redes</span>
                    </div>
                </div>
            </div>

            <!-- 2020-2023: Evolução -->
            <div class="timeline-item">
                <div class="timeline-icon">📈</div>
                <div class="timeline-content">
                    <div class="timeline-year">2020 - 2023</div>
                    <h3 class="timeline-title">Transição para Desenvolvimento</h3>
                    <p class="timeline-description">
                        Período estratégico de transição da infraestrutura para o desenvolvimento. Trabalhei em empresas
                        de destaque aplicando conhecimento técnico em diferentes contextos, sempre evoluindo em direção
                        ao desenvolvimento de software.
                    </p>

                    <div class="timeline-highlights">
                        <h4>🏢 Experiências Profissionais:</h4>
                        <ul>
                            <li><strong>Telemont</strong> - Analista Regional de Planejamento</li>
                            <li><strong>Grupo Supernosso</strong> - OutSystems Developer</li>
                            <li><strong>Grupo DEC Minas</strong> - Gestor de Informação</li>
                        </ul>
                    </div>

                    <div class="timeline-highlights">
                        <h4>🚀 Competências Desenvolvidas:</h4>
                        <ul>
                            <li>Desenvolvimento low-code com OutSystems</li>
                            <li>Análise e gestão de dados</li>
                            <li>Business Intelligence e dashboards</li>
                            <li>Planejamento estratégico de TI</li>
                        </ul>
                    </div>

                    <div class="timeline-tags">
                        <span class="tech-tag">OutSystems</span>
                        <span class="tech-tag">PL/SQL</span>
                        <span class="tech-tag">Power BI</span>
                        <span class="tech-tag">Gestão</span>
                        <span class="tech-tag">Análise de Dados</span>
                    </div>
                </div>
            </div>

            <!-- 2024-Atual: Eagle Telecom -->
            <div class="timeline-item">
                <div class="timeline-icon">🦅</div>
                <div class="timeline-content">
                    <div class="timeline-year">2024 - Atual</div>
                    <h3 class="timeline-title">Desenvolvedor Especialista</h3>
                    <p class="timeline-description">
                        Na <strong>Eagle Telecom</strong>, atuo como Técnico de Suporte I, mas vou muito além do tradicional.
                        Desenvolvo sistemas completos, otimizo processos e combino minha experiência em infraestrutura
                        com desenvolvimento de soluções inovadoras.
                    </p>

                    <div class="timeline-highlights">
                        <h4>💻 Projetos Desenvolvidos:</h4>
                        <ul>
                            <li>Sistema completo de controle de estoque</li>
                            <li>Dashboards interativos com gráficos</li>
                            <li>Site institucional eagletelecom.com.br</li>
                            <li>Automações e otimizações de processos</li>
                        </ul>
                    </div>

                    <div class="timeline-highlights">
                        <h4>🔧 Suporte Técnico Especializado:</h4>
                        <ul>
                            <li>Instalação e configuração VoIP</li>
                            <li>Atendimento de 1º e 2º nível</li>
                            <li>Monitoramento de redes avançado</li>
                            <li>Resolução de problemas complexos</li>
                        </ul>
                    </div>

                    <div class="timeline-tags">
                        <span class="tech-tag">PHP</span>
                        <span class="tech-tag">MySQL</span>
                        <span class="tech-tag">JavaScript</span>
                        <span class="tech-tag">AJAX</span>
                        <span class="tech-tag">VoIP</span>
                        <span class="tech-tag">Redes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experiência Profissional Detalhada -->
<section class="section" style="background: var(--bg-secondary);">
    <div class="container">
        <h2 class="section-title">Experiência Profissional Detalhada</h2>

        <div class="experience-grid">
            <!-- Eagle Telecom -->
            <div class="experience-card">
                <div class="experience-header">
                    <div>
                        <h3 class="experience-title">Técnico de Suporte I</h3>
                        <div class="experience-company">Eagle Telecom</div>
                    </div>
                    <div class="experience-period">Nov 2024 - Atual</div>
                </div>

                <p class="experience-description">
                    Atuo como Suporte Técnico especializado em soluções VoIP e desenvolvimento de sistemas internos,
                    combinando conhecimento técnico em infraestrutura com habilidades de programação.
                </p>

                <div class="experience-achievements">
                    <h4>🎯 Principais Realizações:</h4>
                    <ul>
                        <li>Desenvolvimento completo do sistema de controle de estoque</li>
                        <li>Criação de dashboards interativos para análise de produtos</li>
                        <li>Desenvolvimento do site institucional da empresa</li>
                        <li>Otimização de processos através de automações</li>
                        <li>Suporte técnico especializado em VoIP e redes</li>
                    </ul>
                </div>

                <div class="timeline-tags">
                    <span class="tech-tag">PHP</span>
                    <span class="tech-tag">MySQL</span>
                    <span class="tech-tag">JavaScript</span>
                    <span class="tech-tag">AJAX</span>
                    <span class="tech-tag">VoIP</span>
                </div>
            </div>

            <!-- GRUPO DEC MINAS -->
            <div class="experience-card">
                <div class="experience-header">
                    <div>
                        <h3 class="experience-title">Gestor de Informação</h3>
                        <div class="experience-company">GRUPO DEC MINAS</div>
                    </div>
                    <div class="experience-period">Jan 2024 - Mai 2024</div>
                </div>

                <p class="experience-description">
                    Coordenação de gestão de dados e comunicação, com foco em impulsionar a performance da equipe
                    através de análises estratégicas e relatórios executivos.
                </p>

                <div class="experience-achievements">
                    <h4>🎯 Principais Realizações:</h4>
                    <ul>
                        <li>Criação de apresentações executivas impactantes</li>
                        <li>Desenvolvimento de dashboards analíticos</li>
                        <li>Otimização de processos de comunicação interna</li>
                        <li>Análise de dados para tomada de decisão</li>
                        <li>Gestão de informações estratégicas</li>
                    </ul>
                </div>

                <div class="timeline-tags">
                    <span class="tech-tag">PowerPoint</span>
                    <span class="tech-tag">Excel</span>
                    <span class="tech-tag">PL/SQL</span>
                    <span class="tech-tag">Dashboards</span>
                </div>
            </div>

            <!-- Grupo Supernosso -->
            <div class="experience-card">
                <div class="experience-header">
                    <div>
                        <h3 class="experience-title">OutSystems Developer</h3>
                        <div class="experience-company">Grupo Supernosso</div>
                    </div>
                    <div class="experience-period">Jan 2023 - Dez 2023</div>
                </div>

                <p class="experience-description">
                    Desenvolvimento e manutenção de aplicativos usando a plataforma OutSystems,
                    focando em soluções low-code para otimização de processos empresariais.
                </p>

                <div class="experience-achievements">
                    <h4>🎯 Principais Realizações:</h4>
                    <ul>
                        <li>Desenvolvimento de aplicações web responsivas</li>
                        <li>Integração com bases de dados Oracle</li>
                        <li>Customização de interfaces com HTML5/CSS3</li>
                        <li>Implementação de lógicas de negócio complexas</li>
                        <li>Manutenção e evolução de sistemas existentes</li>
                    </ul>
                </div>

                <div class="timeline-tags">
                    <span class="tech-tag">OutSystems</span>
                    <span class="tech-tag">PL/SQL</span>
                    <span class="tech-tag">HTML5</span>
                    <span class="tech-tag">CSS3</span>
                    <span class="tech-tag">JavaScript</span>
                </div>
            </div>

            <!-- Telemont -->
            <div class="experience-card">
                <div class="experience-header">
                    <div>
                        <h3 class="experience-title">Analista Regional de Planejamento</h3>
                        <div class="experience-company">Telemont</div>
                    </div>
                    <div class="experience-period">Fev 2021 - Jan 2023</div>
                </div>

                <p class="experience-description">
                    Planejamento e monitoramento de KPIs para operações regionais de fibra óptica,
                    com foco em análise de dados e otimização de processos operacionais.
                </p>

                <div class="experience-achievements">
                    <h4>🎯 Principais Realizações:</h4>
                    <ul>
                        <li>Desenvolvimento de dashboards em Power BI</li>
                        <li>Análise de KPIs operacionais regionais</li>
                        <li>Automação de relatórios com VBA</li>
                        <li>Otimização de processos de planejamento</li>
                        <li>Gestão de dados de infraestrutura de fibra</li>
                    </ul>
                </div>

                <div class="timeline-tags">
                    <span class="tech-tag">Power BI</span>
                    <span class="tech-tag">Excel</span>
                    <span class="tech-tag">PL/SQL</span>
                    <span class="tech-tag">VBA</span>
                    <span class="tech-tag">KPIs</span>
                </div>
            </div>

            <!-- Apoio Mineiro -->
            <div class="experience-card">
                <div class="experience-header">
                    <div>
                        <h3 class="experience-title">Analista de Infraestrutura de TI</h3>
                        <div class="experience-company">Apoio Mineiro S.A.</div>
                    </div>
                    <div class="experience-period">Jun 2013 - Jan 2019</div>
                </div>

                <p class="experience-description">
                    Responsável pela infraestrutura completa de TI da empresa, incluindo servidores,
                    redes, segurança e suporte técnico especializado para mais de 200 usuários.
                </p>

                <div class="experience-achievements">
                    <h4>🎯 Principais Realizações:</h4>
                    <ul>
                        <li>Gerenciamento de infraestrutura completa de TI</li>
                        <li>Implementação de soluções de virtualização</li>
                        <li>Gestão de segurança da informação</li>
                        <li>Administração de servidores Windows/Linux</li>
                        <li>Suporte técnico especializado N2/N3</li>
                        <li>Gestão de backups e disaster recovery</li>
                    </ul>
                </div>

                <div class="timeline-tags">
                    <span class="tech-tag">Infraestrutura</span>
                    <span class="tech-tag">Servidores</span>
                    <span class="tech-tag">Redes</span>
                    <span class="tech-tag">Firewall</span>
                    <span class="tech-tag">Virtualização</span>
                    <span class="tech-tag">Segurança</span>
                </div>
            </div>

            <!-- Experiência Adicional -->
            <div class="experience-card">
                <div class="experience-header">
                    <div>
                        <h3 class="experience-title">Projetos Freelance</h3>
                        <div class="experience-company">Diversos Clientes</div>
                    </div>
                    <div class="experience-period">2016 - Atual</div>
                </div>

                <p class="experience-description">
                    Desenvolvimento de soluções personalizadas para pequenas e médias empresas,
                    sempre aplicando as melhores práticas e tecnologias modernas.
                </p>

                <div class="experience-achievements">
                    <h4>🎯 Principais Realizações:</h4>
                    <ul>
                        <li>Desenvolvimento de sites institucionais</li>
                        <li>Sistemas de gestão personalizados</li>
                        <li>Consultoria em infraestrutura de TI</li>
                        <li>Automação de processos empresariais</li>
                        <li>Integração de sistemas legados</li>
                    </ul>
                </div>

                <div class="timeline-tags">
                    <span class="tech-tag">PHP</span>
                    <span class="tech-tag">WordPress</span>
                    <span class="tech-tag">MySQL</span>
                    <span class="tech-tag">JavaScript</span>
                    <span class="tech-tag">Consultoria</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Valores e Princípios -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Valores e Princípios</h2>

        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">⚖️</div>
                <h3 class="value-title">Disciplina e Foco</h3>
                <p class="value-description">
                    8 anos de formação militar me ensinaram a importância da disciplina, organização e foco
                    para alcançar objetivos de longo prazo. Aplico esses princípios em todos os projetos.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">👨‍👩‍👧</div>
                <h3 class="value-title">Família e Valores</h3>
                <p class="value-description">
                    Casado há 13 anos com Thays Rodrigues Santos e pai da Gabrielly Caroline (12 anos).
                    Procuro ser exemplo de bom pai, marido e profissional, sempre respeitando valores cristãos.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">🎯</div>
                <h3 class="value-title">Excelência Técnica</h3>
                <p class="value-description">
                    Busco constantemente a excelência em tudo que faço, desde o código que escrevo
                    até o atendimento que presto aos clientes. Qualidade é inegociável.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">🌱</div>
                <h3 class="value-title">Aprendizado Contínuo</h3>
                <p class="value-description">
                    A tecnologia evolui rapidamente. Mantenho-me sempre atualizado através de cursos,
                    certificações e prática constante. Nunca paro de aprender.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h3 class="value-title">Respeito e Ética</h3>
                <p class="value-description">
                    Respeito todas as pessoas independente de religião ou política. Acredito no
                    diálogo respeitoso, na ética profissional e na transparência.
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon">🥋</div>
                <h3 class="value-title">Equilíbrio e Saúde</h3>
                <p class="value-description">
                    Pratico BJJ (Faixa Branca) buscando equilíbrio entre vida profissional e pessoal,
                    sempre priorizando a saúde física e mental da família.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Vida Pessoal -->
<section class="section" style="background: var(--bg-secondary);">
    <div class="container">
        <h2 class="section-title">Vida Pessoal</h2>

        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background: var(--bg-card); padding: 40px; border-radius: 20px; border: 1px solid var(--border-primary); margin-bottom: 32px;">
                <h3 style="color: var(--accent-primary); margin-bottom: 20px; font-family: 'Playfair Display', serif; font-size: 24px;">🏠 Família</h3>
                <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 16px;">
                    Sou casado há 13 anos com <strong>Thays Rodrigues Santos</strong>, minha companheira de vida e
                    maior apoio em todos os momentos. Juntos, somos pais da <strong>Gabrielly Caroline</strong>,
                    de 12 anos, que é nossa maior alegria e motivação.
                </p>
                <p style="color: var(--text-secondary); line-height: 1.8;">
                    Nossa família é baseada no amor, respeito mútuo e valores cristãos. Procuro ser um exemplo
                    de dedicação, honestidade e trabalho para minha filha, sempre priorizando momentos de qualidade juntos.
                </p>
            </div>

            <div style="background: var(--bg-card); padding: 40px; border-radius: 20px; border: 1px solid var(--border-primary); margin-bottom: 32px;">
                <h3 style="color: var(--accent-primary); margin-bottom: 20px; font-family: 'Playfair Display', serif; font-size: 24px;">📍 Origens</h3>
                <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 16px;">
                    Natural de <strong>Governador Valadares</strong>, vivi toda minha vida em <strong>Belo Horizonte</strong>,
                    cidade que me acolheu e onde construí minha carreira e família. Tenho orgulho das minhas raízes mineiras
                    e dos valores que aprendi aqui.
                </p>
                <p style="color: var(--text-secondary); line-height: 1.8;">
                    Belo Horizonte é uma cidade que oferece oportunidades únicas na área de tecnologia,
                    e pretendo continuar contribuindo para o crescimento do setor aqui.
                </p>
            </div>

            <div style="background: var(--bg-card); padding: 40px; border-radius: 20px; border: 1px solid var(--border-primary); margin-bottom: 32px;">
                <h3 style="color: var(--accent-primary); margin-bottom: 20px; font-family: 'Playfair Display', serif; font-size: 24px;">🥋 Saúde e Bem-estar</h3>
                <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 16px;">
                    Atualmente pratico <strong>BJJ (Brazilian Jiu-Jitsu)</strong> como faixa branca, buscando não apenas
                    condicionamento físico, mas também disciplina mental e equilíbrio emocional. O esporte me ajuda a
                    manter o foco e a determinação necessários para os desafios profissionais.
                </p>
                <p style="color: var(--text-secondary); line-height: 1.8;">
                    Acredito que a saúde física e mental são fundamentais para uma carreira sólida e uma vida familiar feliz.
                    Por isso, sempre busco manter esse equilíbrio.
                </p>
            </div>

            <div style="background: var(--bg-card); padding: 40px; border-radius: 20px; border: 1px solid var(--border-primary);">
                <h3 style="color: var(--accent-primary); margin-bottom: 20px; font-family: 'Playfair Display', serif; font-size: 24px;">✝️ Valores e Crenças</h3>
                <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 16px;">
                    Respeito todas as religiões e não sou devoto a nenhuma específica, mas nunca deixei de ser
                    <strong>cristão</strong>. Minha fé me guia nos momentos difíceis e me ensina a importância da
                    humildade, compaixão e serviço ao próximo.
                </p>
                <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 16px;">
                    Não gosto de política, mas entendo que é um assunto sério que todos deveriam conhecer minimamente
                    para exercer a cidadania de forma consciente. Prefiro focar no que posso controlar: ser uma pessoa melhor a cada dia.
                </p>
                <p style="color: var(--text-secondary); line-height: 1.8;">
                    Minha base são os valores aprendidos com meus pais e fortalecidos durante os 8 anos na instituição militar:
                    <strong>honestidade, dedicação, respeito e busca pela excelência</strong>.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section">
    <div class="container">
        <div style="text-align: center; background: linear-gradient(135deg, var(--bg-card), var(--bg-tertiary)); padding: 60px 40px; border-radius: 24px; border: 1px solid var(--border-primary); position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at center, rgba(0, 212, 255, 0.1), transparent); pointer-events: none;"></div>
            <div style="position: relative; z-index: 2;">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 36px; background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 20px;">
                    Vamos Construir Algo Incrível Juntos?
                </h2>
                <p style="color: var(--text-secondary); margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto; font-size: 18px; line-height: 1.6;">
                    Estou sempre aberto a novos desafios e oportunidades. Se você tem um projeto interessante,
                    quer conversar sobre tecnologia ou simplesmente trocar experiências, vamos conectar!
                </p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?= APP_URL ?>/public/contato" class="btn btn-primary">
                        Entrar em Contato
                    </a>
                    <a href="<?= APP_URL ?>/public/projetos" class="btn btn-secondary">
                        Ver Projetos
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>