<?php
$title = $title ?? 'Perfil - ' . ($user['name'] ?? 'Usuário');
$description = $description ?? $user['bio'] ?? 'Perfil profissional';

ob_start();
?>

<!-- Profile Hero -->
<section class="hero profile-hero">
    <div class="container">
        <div class="profile-hero-content">
            <div class="profile-avatar-large animate-fade-in-up">
                <img src="<?= ASSETS_URL ?>/images/profiles/<?= htmlspecialchars($user['avatar'] ?? 'default.jpg') ?>"
                    alt="<?= htmlspecialchars($user['name']) ?>"
                    class="avatar-image">
                <div class="avatar-badge">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>

            <div class="profile-info animate-fade-in-up">
                <h1><?= htmlspecialchars($user['name']) ?></h1>
                <p class="profile-title"><?= htmlspecialchars($user['title'] ?? 'Profissional') ?></p>

                <?php if (!empty($user['location'])): ?>
                    <div class="profile-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?= htmlspecialchars($user['location']) ?></span>
                    </div>
                <?php endif; ?>

                <div class="profile-social">
                    <?php if (!empty($user['github'])): ?>
                        <a href="<?= htmlspecialchars($user['github']) ?>" target="_blank" class="social-link">
                            <i class="fab fa-github"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($user['linkedin'])): ?>
                        <a href="<?= htmlspecialchars($user['linkedin']) ?>" target="_blank" class="social-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($user['instagram'])): ?>
                        <a href="<?= htmlspecialchars($user['instagram']) ?>" target="_blank" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($user['email'])): ?>
                        <a href="mailto:<?= htmlspecialchars($user['email']) ?>" class="social-link">
                            <i class="fas fa-envelope"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Profile Content -->
<section class="section profile-content">
    <div class="container">
        <div class="profile-grid grid grid-3">
            <!-- About -->
            <div class="profile-section animate-fade-in-left">
                <div class="card">
                    <h3>
                        <i class="fas fa-user"></i>
                        Sobre
                    </h3>

                    <?php if (!empty($user['bio'])): ?>
                        <p><?= nl2br(htmlspecialchars($user['bio'])) ?></p>
                    <?php else: ?>
                        <p>Informações sobre o perfil serão adicionadas em breve.</p>
                    <?php endif; ?>

                    <div class="profile-details">
                        <?php if (!empty($user['email'])): ?>
                            <div class="detail-item">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:<?= htmlspecialchars($user['email']) ?>">
                                    <?= htmlspecialchars($user['email']) ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($user['phone'])): ?>
                            <div class="detail-item">
                                <i class="fas fa-phone"></i>
                                <a href="tel:<?= htmlspecialchars($user['phone']) ?>">
                                    <?= htmlspecialchars($user['phone']) ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($user['website'])): ?>
                            <div class="detail-item">
                                <i class="fas fa-globe"></i>
                                <a href="<?= htmlspecialchars($user['website']) ?>" target="_blank">
                                    Website
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Skills -->
            <div class="profile-section animate-fade-in-up">
                <div class="card">
                    <h3>
                        <i class="fas fa-code"></i>
                        Habilidades
                    </h3>

                    <?php if (!empty($skills)): ?>
                        <div class="skills-compact">
                            <?php foreach ($skills as $category => $categorySkills): ?>
                                <div class="skill-category-compact">
                                    <h4><?= ucfirst($category) ?></h4>
                                    <div class="skills-tags">
                                        <?php foreach (array_slice($categorySkills, 0, 5) as $skill): ?>
                                            <span class="skill-tag" data-level="<?= $skill['level'] ?>">
                                                <?= htmlspecialchars($skill['name']) ?>
                                                <span class="skill-level"><?= $skill['level'] ?>%</span>
                                            </span>
                                        <?php endforeach; ?>

                                        <?php if (count($categorySkills) > 5): ?>
                                            <span class="skill-tag skill-more">
                                                +<?= count($categorySkills) - 5 ?> mais
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>Habilidades serão adicionadas em breve.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Stats -->
            <div class="profile-section animate-fade-in-right">
                <div class="card">
                    <h3>
                        <i class="fas fa-chart-bar"></i>
                        Estatísticas
                    </h3>

                    <div class="profile-stats-list">
                        <div class="stat-item-profile">
                            <div class="stat-icon">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number"><?= count($projects ?? []) ?></span>
                                <span class="stat-label">Projetos</span>
                            </div>
                        </div>

                        <div class="stat-item-profile">
                            <div class="stat-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number"><?= count($skills ?? []) ?></span>
                                <span class="stat-label">Tecnologias</span>
                            </div>
                        </div>

                        <div class="stat-item-profile">
                            <div class="stat-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number"><?= number_format($user['profile_views'] ?? 0) ?></span>
                                <span class="stat-label">Visualizações</span>
                            </div>
                        </div>

                        <div class="stat-item-profile">
                            <div class="stat-icon">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <div class="stat-info">
                                <span class="stat-number"><?= date('Y') - date('Y', strtotime($user['created_at'] ?? 'now')) ?></span>
                                <span class="stat-label">Anos Ativo</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<?php if (!empty($projects)): ?>
    <section class="section profile-projects">
        <div class="container">
            <div class="section-header">
                <h2>Projetos de <?= htmlspecialchars($user['name']) ?></h2>
                <p>Principais trabalhos e realizações</p>
            </div>

            <div class="projects-grid grid grid-2">
                <?php foreach (array_slice($projects, 0, 4) as $project): ?>
                    <div class="project-card-profile card animate-fade-in-up">
                        <div class="project-image-profile">
                            <img src="<?= ASSETS_URL ?>/images/projects/<?= htmlspecialchars($project['image'] ?? 'placeholder.jpg') ?>"
                                alt="<?= htmlspecialchars($project['title']) ?>"
                                loading="lazy">

                            <div class="project-overlay-profile">
                                <div class="project-actions-profile">
                                    <?php if (!empty($project['demo_url'])): ?>
                                        <a href="<?= htmlspecialchars($project['demo_url']) ?>"
                                            target="_blank"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-external-link-alt"></i>
                                            Ver Demo
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($project['github_url'])): ?>
                                        <a href="<?= htmlspecialchars($project['github_url']) ?>"
                                            target="_blank"
                                            class="btn btn-secondary btn-sm">
                                            <i class="fab fa-github"></i>
                                            Código
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="project-content-profile">
                            <div class="project-header-profile">
                                <span class="project-category-profile">
                                    <?= ucfirst(htmlspecialchars($project['category'])) ?>
                                </span>

                                <?php if ($project['featured']): ?>
                                    <span class="project-featured">
                                        <i class="fas fa-star"></i>
                                        Destaque
                                    </span>
                                <?php endif; ?>
                            </div>

                            <h3><?= htmlspecialchars($project['title']) ?></h3>
                            <p><?= htmlspecialchars(substr($project['description'], 0, 120)) ?>...</p>

                            <?php if (!empty($project['technologies'])): ?>
                                <div class="project-tech-profile">
                                    <?php foreach (array_slice(explode(',', $project['technologies']), 0, 3) as $tech): ?>
                                        <span class="tech-tag-small"><?= htmlspecialchars(trim($tech)) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (count($projects) > 4): ?>
                <div class="text-center mt-4">
                    <a href="/projetos" class="btn btn-primary">
                        <i class="fas fa-folder-open"></i>
                        Ver Todos os Projetos (<?= count($projects) ?>)
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<!-- Experience Section -->
<?php if (!empty($experience)): ?>
    <section class="section profile-experience">
        <div class="container">
            <div class="section-header">
                <h2>Experiência Profissional</h2>
                <p>Trajetória e principais conquistas</p>
            </div>

            <div class="experience-list">
                <?php foreach (array_slice($experience, 0, 3) as $exp): ?>
                    <div class="experience-item card animate-fade-in-up">
                        <div class="experience-header">
                            <div class="experience-info">
                                <h3><?= htmlspecialchars($exp['position']) ?></h3>
                                <h4><?= htmlspecialchars($exp['company']) ?></h4>
                                <div class="experience-period">
                                    <i class="fas fa-calendar"></i>
                                    <?= date('M Y', strtotime($exp['start_date'])) ?> -
                                    <?= $exp['current'] ? 'Presente' : date('M Y', strtotime($exp['end_date'])) ?>
                                </div>
                            </div>

                            <?php if ($exp['current']): ?>
                                <div class="experience-current">
                                    <span class="current-badge">
                                        <i class="fas fa-circle"></i>
                                        Atual
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="experience-description">
                            <p><?= htmlspecialchars($exp['description']) ?></p>
                        </div>

                        <?php if (!empty($exp['location'])): ?>
                            <div class="experience-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <?= htmlspecialchars($exp['location']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Contact CTA -->
<section class="section profile-cta">
    <div class="container">
        <div class="cta-content text-center">
            <h2>Interessado em Colaborar?</h2>
            <p>
                Entre em contato para discutir oportunidades de trabalho,
                projetos ou apenas para trocar ideias sobre tecnologia.
            </p>
            <div class="cta-actions">
                <a href="/contato" class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    Entrar em Contato
                </a>

                <?php if (!empty($user['website'])): ?>
                    <a href="<?= htmlspecialchars($user['website']) ?>" target="_blank" class="btn btn-secondary">
                        <i class="fas fa-globe"></i>
                        Visitar Website
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
    /* Estilos específicos para a página de perfil */
    .profile-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        text-align: center;
    }

    .profile-hero-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2rem;
    }

    .profile-avatar-large {
        position: relative;
    }

    .profile-avatar-large .avatar-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 4px solid var(--gold-classic);
        object-fit: cover;
    }

    .avatar-badge {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: var(--gold-classic);
        color: var(--primary-black);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }

    .profile-social {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .profile-social .social-link {
        width: 40px;
        height: 40px;
        background: rgba(212, 175, 55, 0.1);
        border: 2px solid var(--gold-classic);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition-normal);
    }

    .profile-social .social-link:hover {
        background: var(--gold-classic);
        color: var(--primary-black);
        transform: translateY(-3px);
    }

    .profile-details {
        margin-top: 1.5rem;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
        color: rgba(245, 245, 245, 0.8);
    }

    .detail-item i {
        color: var(--gold-classic);
        width: 16px;
    }

    .skills-compact .skill-category-compact {
        margin-bottom: 1.5rem;
    }

    .skills-compact h4 {
        color: var(--gold-classic);
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .skills-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .skill-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        padding: 0.25rem 0.5rem;
        background: rgba(212, 175, 55, 0.1);
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 4px;
        font-size: 0.8rem;
        color: var(--text-white);
    }

    .skill-level {
        background: var(--gold-classic);
        color: var(--primary-black);
        padding: 0.1rem 0.3rem;
        border-radius: 3px;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .profile-stats-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .stat-item-profile {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.75rem;
        background: rgba(26, 26, 26, 0.5);
        border-radius: 8px;
        border: 1px solid rgba(212, 175, 55, 0.1);
    }

    .stat-item-profile .stat-icon {
        width: 40px;
        height: 40px;
        background: var(--gradient-gold);
        color: var(--primary-black);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-info {
        display: flex;
        flex-direction: column;
    }

    .stat-info .stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--gold-classic);
    }

    .stat-info .stat-label {
        font-size: 0.9rem;
        color: rgba(245, 245, 245, 0.8);
    }

    .project-card-profile {
        overflow: hidden;
    }

    .project-image-profile {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .project-image-profile img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition-slow);
    }

    .project-overlay-profile {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(13, 13, 13, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: var(--transition-normal);
    }

    .project-card-profile:hover .project-overlay-profile {
        opacity: 1;
    }

    .project-card-profile:hover .project-image-profile img {
        transform: scale(1.1);
    }

    .project-actions-profile {
        display: flex;
        gap: 0.5rem;
    }

    .project-content-profile {
        padding: 1.5rem;
    }

    .project-header-profile {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .project-category-profile {
        background: rgba(212, 175, 55, 0.1);
        color: var(--gold-classic);
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .project-featured {
        background: var(--gradient-gold);
        color: var(--primary-black);
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .project-tech-profile {
        display: flex;
        flex-wrap: wrap;
        gap: 0.25rem;
        margin-top: 1rem;
    }

    .tech-tag-small {
        background: rgba(26, 26, 26, 0.8);
        color: rgba(245, 245, 245, 0.8);
        padding: 0.2rem 0.4rem;
        border-radius: 3px;
        font-size: 0.7rem;
    }

    .experience-item {
        margin-bottom: 1.5rem;
    }

    .experience-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1rem;
    }

    .experience-info h3 {
        color: var(--gold-classic);
        margin-bottom: 0.25rem;
    }

    .experience-info h4 {
        color: var(--text-white);
        margin-bottom: 0.5rem;
    }

    .experience-period {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: rgba(245, 245, 245, 0.7);
        font-size: 0.9rem;
    }

    .current-badge {
        background: #2ecc71;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .current-badge i {
        font-size: 0.6rem;
        animation: pulse 2s ease-in-out infinite;
    }

    .experience-location {
        margin-top: 1rem;
        color: rgba(245, 245, 245, 0.7);
        font-size: 0.9rem;
    }

    .experience-location i {
        color: var(--gold-classic);
        margin-right: 0.5rem;
    }

    @media (max-width: 768px) {
        .profile-grid {
            grid-template-columns: 1fr;
        }

        .projects-grid {
            grid-template-columns: 1fr;
        }

        .experience-header {
            flex-direction: column;
            gap: 0.5rem;
        }

        .profile-social {
            justify-content: center;
        }
    }
</style>

<?php
$content = ob_get_clean();
include VIEWS_PATH . '/layouts/app.php';
?>