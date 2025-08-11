<!-- Hero Projects Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Meus <span class="highlight">Projetos</span></h1>
                <p class="hero-subtitle">Soluções Desenvolvidas</p>
                <p class="hero-description">
                    Uma coleção de sistemas e soluções que desenvolvi ao longo da minha carreira,
                    sempre focando em resolver problemas reais e otimizar processos empresariais.
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
    /* Estilos específicos para projetos */
    .projects-stats {
        background: var(--bg-secondary);
        padding: 60px 0;
        position: relative;
        overflow: hidden;
    }

    .projects-stats::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 25% 75%, rgba(0, 212, 255, 0.06) 0%, transparent 50%),
            radial-gradient(circle at 75% 25%, rgba(99, 102, 241, 0.06) 0%, transparent 50%);
        pointer-events: none;
    }

    .stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .stat-item {
        text-align: center;
        padding: 32px 20px;
        background: var(--bg-card);
        border-radius: 16px;
        border: 1px solid var(--border-primary);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-primary);
        opacity: 0.03;
        transition: left 0.4s ease;
    }

    .stat-item:hover::before {
        left: 0;
    }

    .stat-item:hover {
        transform: translateY(-6px);
        border-color: var(--accent-primary);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .stat-icon {
        font-size: 36px;
        margin-bottom: 16px;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
    }

    .stat-number {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        font-weight: 700;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        margin-bottom: 8px;
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .projects-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 32px;
    }

    .project-card {
        background: var(--bg-card);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--border-primary);
        transition: all 0.4s ease;
        position: relative;
        display: flex;
        flex-direction: column;
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
    }

    .project-card:hover::before {
        opacity: 0.02;
    }

    .project-card:hover {
        transform: translateY(-8px);
        border-color: var(--accent-primary);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .project-header {
        padding: 28px 28px 0;
        position: relative;
        z-index: 2;
        flex-grow: 1;
    }

    .project-status-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .project-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-completed {
        background: var(--gradient-success);
        color: var(--text-primary);
    }

    .status-active {
        background: var(--gradient-primary);
        color: var(--text-primary);
    }

    .project-year {
        color: var(--text-muted);
        font-size: 12px;
        font-weight: 600;
        background: var(--bg-tertiary);
        padding: 6px 12px;
        border-radius: 12px;
        border: 1px solid var(--border-secondary);
    }

    .project-title {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 12px;
        color: var(--text-primary);
        line-height: 1.3;
    }

    .project-company {
        color: var(--accent-primary);
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .project-company::before {
        content: '🏢';
        font-size: 14px;
    }

    .project-description {
        color: var(--text-secondary);
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .project-features {
        margin-bottom: 20px;
    }

    .project-features h4 {
        color: var(--accent-primary);
        font-size: 14px;
        margin-bottom: 12px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .project-features ul {
        list-style: none;
        padding: 0;
        display: grid;
        gap: 6px;
    }

    .project-features li {
        color: var(--text-secondary);
        padding-left: 16px;
        position: relative;
        line-height: 1.5;
        font-size: 13px;
    }

    .project-features li::before {
        content: '▶';
        position: absolute;
        left: 0;
        color: var(--accent-primary);
        font-size: 10px;
    }

    .project-tech-stack {
        padding: 0 28px 28px;
        position: relative;
        z-index: 2;
        border-top: 1px solid var(--border-secondary);
        padding-top: 20px;
    }

    .project-tech-stack h4 {
        color: var(--text-primary);
        font-size: 14px;
        margin-bottom: 16px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .tech-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
    }

    .tech-item {
        background: var(--bg-tertiary);
        color: var(--accent-primary);
        padding: 6px 12px;
        border-radius: 16px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        border: 1px solid var(--border-secondary);
        transition: all 0.3s ease;
    }

    .tech-item:hover {
        background: var(--accent-primary);
        color: var(--text-primary);
        transform: translateY(-2px);
    }

    .project-actions {
        display: flex;
        gap: 12px;
    }

    .btn-project {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 20px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        font-size: 13px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-primary-project {
        background: var(--gradient-primary);
        color: var(--text-primary);
    }

    .btn-primary-project:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 212, 255, 0.3);
    }

    .future-projects {
        background: var(--bg-secondary);
        padding: 60px 0;
    }

    .future-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
    }

    .future-card {
        background: var(--bg-card);
        border-radius: 16px;
        padding: 24px;
        border: 1px solid var(--border-primary);
        text-align: center;
        transition: all 0.3s ease;
    }

    .future-card:hover {
        transform: translateY(-6px);
        border-color: var(--accent-warm);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }

    .future-icon {
        font-size: 40px;
        margin-bottom: 16px;
        background: var(--gradient-warm);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .future-title {
        font-family: 'Playfair Display', serif;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 12px;
        color: var(--text-primary);
    }

    .future-description {
        color: var(--text-secondary);
        line-height: 1.5;
        margin-bottom: 16px;
        font-size: 13px;
    }

    .future-status {
        background: var(--gradient-warm);
        color: var(--text-primary);
        padding: 6px 12px;
        border-radius: 16px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    @media (max-width: 768px) {
        .stats-row {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .projects-container {
            grid-template-columns: 1fr;
        }

        .project-header {
            padding: 20px 20px 0;
        }

        .project-tech-stack {
            padding: 16px 20px 20px;
        }
    }
</style>

<!-- Estatísticas -->
<section class="projects-stats">
    <div class="container">
        <div class="stats-row">
            <div class="stat-item">
                <div class="stat-icon">🚀</div>
                <span class="stat-number">6</span>
                <div class="stat-label">Projetos Concluídos</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">⚡</div>
                <span class="stat-number">4</span>
                <div class="stat-label">Projetos Futuros</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">🛠️</div>
                <span class="stat-number">10+</span>
                <div class="stat-label">Tecnologias</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">💯</div>
                <span class="stat-number">100%</span>
                <div class="stat-label">Dedicação</div>
            </div>
        </div>
    </div>
</section>

<!-- Projetos -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Portfólio de Projetos</h2>

        <div class="projects-container">
            <!-- Sistema de Estoque -->
            <div class="project-card">
                <div class="project-header">
                    <div class="project-status-row">
                        <div class="project-status status-completed">✓ Concluído</div>
                        <div class="project-year">2024</div>
                    </div>
                    <h3 class="project-title">Sistema de Controle de Estoque</h3>
                    <div class="project-company">Eagle Telecom</div>
                    <p class="project-description">
                        Sistema completo para controle de fluxo de estoque com dashboards interativos,
                        relatórios em tempo real e gestão automatizada de produtos VoIP.
                    </p>

                    <div class="project-features">
                        <h4>🎯 Principais Funcionalidades</h4>
                        <ul>
                            <li>Controle de entrada e saída de produtos</li>
                            <li>Dashboards com gráficos interativos</li>
                            <li>Relatórios automatizados em PDF</li>
                            <li>Alertas de estoque mínimo</li>
                            <li>Histórico de movimentações</li>
                        </ul>
                    </div>
                </div>

                <div class="project-tech-stack">
                    <h4>⚡ Tecnologias</h4>
                    <div class="tech-grid">
                        <span class="tech-item">PHP</span>
                        <span class="tech-item">MySQL</span>
                        <span class="tech-item">JavaScript</span>
                        <span class="tech-item">AJAX</span>
                        <span class="tech-item">Chart.js</span>
                    </div>
                </div>
            </div>

            <!-- Sistema de Chamados -->
            <div class="project-card">
                <div class="project-header">
                    <div class="project-status-row">
                        <div class="project-status status-completed">✓ Concluído</div>
                        <div class="project-year">2023</div>
                    </div>
                    <h3 class="project-title">Sistema de Chamados Internos</h3>
                    <div class="project-company">Hospital Madre Teresa</div>
                    <p class="project-description">
                        Sistema de gestão de chamados para ambiente hospitalar com controle
                        de prioridades e SLA específicos para o setor de saúde.
                    </p>

                    <div class="project-features">
                        <h4>🎯 Principais Funcionalidades</h4>
                        <ul>
                            <li>Abertura por departamento hospitalar</li>
                            <li>Sistema de prioridades críticas</li>
                            <li>Controle de SLA hospitalar</li>
                            <li>Notificações automáticas</li>
                            <li>Relatórios de performance</li>
                        </ul>
                    </div>
                </div>

                <div class="project-tech-stack">
                    <h4>⚡ Tecnologias</h4>
                    <div class="tech-grid">
                        <span class="tech-item">PHP</span>
                        <span class="tech-item">MySQL</span>
                        <span class="tech-item">JavaScript</span>
                        <span class="tech-item">jQuery</span>
                    </div>
                </div>
            </div>

            <!-- Sistema de Agendamento -->
            <div class="project-card">
                <div class="project-header">
                    <div class="project-status-row">
                        <div class="project-status status-completed">✓ Concluído</div>
                        <div class="project-year">2023</div>
                    </div>
                    <h3 class="project-title">Sistema de Agendamento de Cargas</h3>
                    <div class="project-company">Emtel</div>
                    <p class="project-description">
                        Sistema para controle e expedição de caminhões com agendamento
                        inteligente de cargas e otimização de fluxo logístico.
                    </p>

                    <div class="project-features">
                        <h4>🎯 Principais Funcionalidades</h4>
                        <ul>
                            <li>Agendamento online de cargas</li>
                            <li>Controle de docas disponíveis</li>
                            <li>Gestão de motoristas e veículos</li>
                            <li>Otimização de rotas</li>
                            <li>Relatórios de produtividade</li>
                        </ul>
                    </div>
                </div>

                <div class="project-tech-stack">
                    <h4>⚡ Tecnologias</h4>
                    <div class="tech-grid">
                        <span class="tech-item">PHP</span>
                        <span class="tech-item">MySQL</span>
                        <span class="tech-item">Calendar.js</span>
                        <span class="tech-item">API REST</span>
                    </div>
                </div>
            </div>

            <!-- Sistema SSH -->
            <div class="project-card">
                <div class="project-header">
                    <div class="project-status-row">
                        <div class="project-status status-completed">✓ Concluído</div>
                        <div class="project-year">2024</div>
                    </div>
                    <h3 class="project-title">Sistema de Controle SSH</h3>
                    <div class="project-company">Eagle Telecom</div>
                    <p class="project-description">
                        Interface web para controle remoto de servidores via SSH com
                        monitoramento em tempo real e gestão centralizada.
                    </p>

                    <div class="project-features">
                        <h4>🎯 Principais Funcionalidades</h4>
                        <ul>
                            <li>Conexão SSH segura via web</li>
                            <li>Execução de comandos remotos</li>
                            <li>Monitoramento de recursos</li>
                            <li>Gestão de múltiplos servidores</li>
                            <li>Logs de atividades</li>
                        </ul>
                    </div>
                </div>

                <div class="project-tech-stack">
                    <h4>⚡ Tecnologias</h4>
                    <div class="tech-grid">
                        <span class="tech-item">PHP</span>
                        <span class="tech-item">SSH2</span>
                        <span class="tech-item">WebSocket</span>
                        <span class="tech-item">Linux</span>
                    </div>
                </div>
            </div>

            <!-- Sistema de Chamadas -->
            <div class="project-card">
                <div class="project-header">
                    <div class="project-status-row">
                        <div class="project-status status-completed">✓ Concluído</div>
                        <div class="project-year">2024</div>
                    </div>
                    <h3 class="project-title">Sistema de Exibição de Chamadas</h3>
                    <div class="project-company">Mirian Dayrell</div>
                    <p class="project-description">
                        Sistema para análise de chamadas telefônicas do dia anterior
                        com relatórios detalhados e dashboards executivos.
                    </p>

                    <div class="project-features">
                        <h4>🎯 Principais Funcionalidades</h4>
                        <ul>
                            <li>Relatórios automáticos D-1</li>
                            <li>Análise de performance</li>
                            <li>Gráficos de volume</li>
                            <li>Filtros por período e ramal</li>
                            <li>Exportação de dados</li>
                        </ul>
                    </div>
                </div>

                <div class="project-tech-stack">
                    <h4>⚡ Tecnologias</h4>
                    <div class="tech-grid">
                        <span class="tech-item">PHP</span>
                        <span class="tech-item">MySQL</span>
                        <span class="tech-item">Chart.js</span>
                        <span class="tech-item">VoIP</span>
                    </div>
                </div>
            </div>

            <!-- Site Eagle Telecom -->
            <div class="project-card">
                <div class="project-header">
                    <div class="project-status-row">
                        <div class="project-status status-active">⚡ Ativo</div>
                        <div class="project-year">2024</div>
                    </div>
                    <h3 class="project-title">Site Oficial Eagle Telecom</h3>
                    <div class="project-company">Eagle Telecom</div>
                    <p class="project-description">
                        Site institucional oficial com foco em conversão e experiência
                        do usuário, apresentando serviços de telecomunicações.
                    </p>

                    <div class="project-features">
                        <h4>🎯 Principais Funcionalidades</h4>
                        <ul>
                            <li>Design responsivo e moderno</li>
                            <li>Otimização completa para SEO</li>
                            <li>Formulários de contato</li>
                            <li>Performance otimizada</li>
                            <li>Integração com redes sociais</li>
                        </ul>
                    </div>
                </div>

                <div class="project-tech-stack">
                    <h4>⚡ Tecnologias</h4>
                    <div class="tech-grid">
                        <span class="tech-item">PHP</span>
                        <span class="tech-item">HTML5</span>
                        <span class="tech-item">CSS3</span>
                        <span class="tech-item">SEO</span>
                    </div>

                    <div class="project-actions">
                        <a href="https://eagletelecom.com.br" target="_blank" class="btn-project btn-primary-project">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z" />
                            </svg>
                            Visitar Site
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projetos Futuros -->
<section class="future-projects">
    <div class="container">
        <h2 class="section-title">Projetos Futuros</h2>

        <div class="future-grid">
            <div class="future-card">
                <div class="future-icon">🤖</div>
                <h3 class="future-title">IA para Atendimento</h3>
                <p class="future-description">
                    Chatbot inteligente para automatizar atendimento e qualificar leads.
                </p>
                <div class="future-status">Planejamento</div>
            </div>

            <div class="future-card">
                <div class="future-icon">📱</div>
                <h3 class="future-title">App Mobile Eagle</h3>
                <p class="future-description">
                    Aplicativo para clientes acompanharem serviços e suporte.
                </p>
                <div class="future-status">Desenvolvimento</div>
            </div>

            <div class="future-card">
                <div class="future-icon">☁️</div>
                <h3 class="future-title">Plataforma Cloud</h3>
                <p class="future-description">
                    Monitoramento proativo de equipamentos VoIP em nuvem.
                </p>
                <div class="future-status">Análise</div>
            </div>

            <div class="future-card">
                <div class="future-icon">🔗</div>
                <h3 class="future-title">API Completa</h3>
                <p class="future-description">
                    Integração robusta com sistemas ERP e CRM externos.
                </p>
                <div class="future-status">Conceito</div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section">
    <div class="container">
        <div style="text-align: center; background: var(--bg-card); padding: 60px 40px; border-radius: 20px; border: 1px solid var(--border-primary);">
            <h2 style="font-family: 'Playfair Display', serif; font-size: 32px; background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 20px;">
                Vamos Trabalhar Juntos?
            </h2>
            <p style="color: var(--text-secondary); margin-bottom: 32px; max-width: 500px; margin-left: auto; margin-right: auto;">
                Tenho experiência comprovada para transformar sua ideia em uma solução real e eficiente.
            </p>
            <a href="<?= APP_URL ?>/public/contato" class="btn btn-primary">
                Entrar em Contato
            </a>
        </div>
    </div>
</section>