<?php
// views/layouts/navigation.php (ATUALIZADO)
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo BASE_URL; ?>">
            <i class="fas fa-code me-2"></i>
            Portfólio
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Perfis
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>lucas">Lucas André</a></li>
                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>thays">Thays</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>contato">Contato</a>
                </li>
            </ul>
        </div>
    </div>
</nav>