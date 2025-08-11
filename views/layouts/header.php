<header class="header" id="header">
    <div class="container">
        <nav class="nav">
            <a href="/" class="logo">
                <span>Lucas André</span>
            </a>

            <ul class="nav-menu" id="nav-menu">
                <li><a href="/" class="nav-link <?= ($page ?? '') === 'home' ? 'active' : '' ?>">Início</a></li>
                <li><a href="/sobre" class="nav-link <?= ($page ?? '') === 'about' ? 'active' : '' ?>">Sobre</a></li>
                <li><a href="/projetos" class="nav-link <?= ($page ?? '') === 'projects' ? 'active' : '' ?>">Projetos</a></li>
                <li><a href="/contato" class="nav-link <?= ($page ?? '') === 'contact' ? 'active' : '' ?>">Contato</a></li>

                <!-- Dropdown para Perfis -->
                <li class="nav-dropdown">
                    <a href="#" class="nav-link dropdown-toggle">
                        Perfis <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/perfil/lucas" class="dropdown-link">Lucas André</a></li>
                        <li><a href="/perfil/thays" class="dropdown-link">Thays</a></li>
                    </ul>
                </li>
            </ul>

            <div class="nav-actions">
                <!-- Theme Toggle -->
                <button class="theme-toggle" id="theme-toggle" aria-label="Alternar tema">
                    <i class="fas fa-moon"></i>
                </button>

                <!-- Mobile Menu Toggle -->
                <button class="nav-toggle" id="nav-toggle" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>
    </div>
</header>