-- Portfolio Database Seeds
-- Author: Lucas André Fernando
USE `portfolio_db`;

-- Inserir usuários
INSERT INTO
    `users` (
        `username`,
        `name`,
        `email`,
        `bio`,
        `title`,
        `location`,
        `phone`,
        `website`,
        `github`,
        `linkedin`,
        `instagram`
    )
VALUES
    (
        'lucas',
        'Lucas André Fernando',
        'lucas@anacron.com.br',
        'Desenvolvedor Full Stack apaixonado por criar soluções digitais inovadoras e funcionais. Com mais de 5 anos de experiência, especializo-me em PHP, JavaScript e tecnologias modernas.',
        'Desenvolvedor Full Stack',
        'São Paulo, SP',
        '(11) 99999-9999',
        'https://anacron.com.br',
        'https://github.com/lucasandrefernando',
        'https://linkedin.com/in/lucasandrefernando',
        'https://instagram.com/lucasandrefernando'
    ),
    (
        'thays',
        'Thays Silva',
        'thays@anacron.com.br',
        'Designer UX/UI e desenvolvedora frontend com foco em experiências digitais excepcionais.',
        'UX/UI Designer',
        'São Paulo, SP',
        '(11) 88888-8888',
        'https://thays.design',
        'https://github.com/thayssilva',
        'https://linkedin.com/in/thayssilva',
        'https://instagram.com/thaysdesign'
    );

-- Inserir habilidades
INSERT INTO
    `skills` (`name`, `category`, `icon`, `color`)
VALUES
    ('PHP', 'backend', 'fab fa-php', '#777BB4'),
    (
        'JavaScript',
        'frontend',
        'fab fa-js-square',
        '#F7DF1E'
    ),
    ('MySQL', 'database', 'fas fa-database', '#4479A1'),
    ('HTML5', 'frontend', 'fab fa-html5', '#E34F26'),
    ('CSS3', 'frontend', 'fab fa-css3-alt', '#1572B6'),
    ('React', 'frontend', 'fab fa-react', '#61DAFB'),
    ('Vue.js', 'frontend', 'fab fa-vuejs', '#4FC08D'),
    ('Node.js', 'backend', 'fab fa-node-js', '#339933'),
    ('Git', 'tools', 'fab fa-git-alt', '#F05032'),
    ('Docker', 'tools', 'fab fa-docker', '#2496ED'),
    ('AWS', 'tools', 'fab fa-aws', '#232F3E'),
    ('Linux', 'tools', 'fab fa-linux', '#FCC624'),
    ('Figma', 'design', 'fab fa-figma', '#F24E1E'),
    (
        'Photoshop',
        'design',
        'fas fa-palette',
        '#31A8FF'
    );

-- Relacionar habilidades com usuários
INSERT INTO
    `user_skills` (
        `user_id`,
        `skill_id`,
        `level`,
        `years_experience`
    )
VALUES
    -- Lucas
    (1, 1, 95, 5.0), -- PHP
    (1, 2, 90, 4.5), -- JavaScript
    (1, 3, 90, 5.0), -- MySQL
    (1, 4, 95, 6.0), -- HTML5
    (1, 5, 90, 6.0), -- CSS3
    (1, 6, 85, 3.0), -- React
    (1, 7, 80, 2.5), -- Vue.js
    (1, 8, 80, 3.0), -- Node.js
    (1, 9, 90, 5.0), -- Git
    (1, 10, 75, 2.0), -- Docker
    (1, 11, 70, 1.5), -- AWS
    (1, 12, 80, 4.0), -- Linux
    -- Thays
    (2, 2, 85, 3.0), -- JavaScript
    (2, 4, 95, 4.0), -- HTML5
    (2, 5, 95, 4.0), -- CSS3
    (2, 6, 80, 2.0), -- React
    (2, 7, 75, 1.5), -- Vue.js
    (2, 13, 95, 4.0), -- Figma
    (2, 14, 90, 5.0);

-- Photoshop
-- Inserir projetos
INSERT INTO
    `projects` (
        `user_id`,
        `title`,
        `slug`,
        `description`,
        `content`,
        `image`,
        `technologies`,
        `category`,
        `status`,
        `featured`,
        `github_url`,
        `demo_url`,
        `start_date`,
        `end_date`
    )
VALUES
    (
        1,
        'Sistema de Gestão Empresarial',
        'sistema-gestao-empresarial',
        'Sistema completo para gestão de empresas com módulos de vendas, estoque, financeiro e relatórios.',
        'Sistema desenvolvido em PHP com arquitetura MVC, utilizando MySQL para banco de dados e JavaScript para interações dinâmicas. Inclui dashboard administrativo, controle de usuários, gestão de produtos, vendas e relatórios avançados.',
        'projeto-gestao.jpg',
        'PHP, MySQL, JavaScript, HTML5, CSS3, Chart.js',
        'web',
        'completed',
        1,
        'https://github.com/lucasandrefernando/sistema-gestao',
        'https://demo.anacron.com.br/gestao',
        '2023-01-15',
        '2023-04-30'
    ),
    (
        1,
        'E-commerce Responsivo',
        'ecommerce-responsivo',
        'Plataforma de e-commerce moderna e responsiva com carrinho de compras e integração de pagamentos.',
        'E-commerce desenvolvido com foco em performance e experiência do usuário. Inclui catálogo de produtos, carrinho de compras, checkout seguro, painel administrativo e integração com gateways de pagamento.',
        'projeto-ecommerce.jpg',
        'PHP, MySQL, JavaScript, Bootstrap, PayPal API',
        'ecommerce',
        'completed',
        1,
        'https://github.com/lucasandrefernando/ecommerce',
        'https://demo.anacron.com.br/loja',
        '2023-05-01',
        '2023-08-15'
    ),
    (
        1,
        'API RESTful para Mobile',
        'api-restful-mobile',
        'API robusta para aplicações mobile com autenticação JWT e documentação completa.',
        'API desenvolvida seguindo padrões REST, com endpoints para autenticação, CRUD de dados, upload de arquivos e notificações push. Inclui documentação interativa e testes automatizados.',
        'projeto-api.jpg',
        'PHP, MySQL, JWT, Swagger, PHPUnit',
        'api',
        'completed',
        1,
        'https://github.com/lucasandrefernando/api-mobile',
        'https://api.anacron.com.br/docs',
        '2023-09-01',
        '2023-11-30'
    ),
    (
        1,
        'Dashboard Analytics',
        'dashboard-analytics',
        'Dashboard interativo para análise de dados com gráficos e relatórios em tempo real.',
        'Dashboard desenvolvido com foco em visualização de dados, incluindo gráficos interativos, filtros avançados, exportação de relatórios e atualizações em tempo real via WebSockets.',
        'projeto-dashboard.jpg',
        'PHP, MySQL, JavaScript, Chart.js, WebSockets',
        'web',
        'completed',
        0,
        'https://github.com/lucasandrefernando/dashboard',
        'https://demo.anacron.com.br/dashboard',
        '2023-12-01',
        '2024-02-28'
    ),
    (
        1,
        'Sistema de Blog CMS',
        'blog-cms',
        'Sistema de gerenciamento de conteúdo para blogs com editor WYSIWYG e SEO otimizado.',
        'CMS completo para blogs com editor de texto rico, gestão de categorias, tags, comentários, SEO otimizado e sistema de templates personalizáveis.',
        'projeto-blog.jpg',
        'PHP, MySQL, JavaScript, TinyMCE, SEO',
        'cms',
        'in_progress',
        0,
        'https://github.com/lucasandrefernando/blog-cms',
        NULL,
        '2024-03-01',
        NULL
    ),
    (
        2,
        'Redesign UX/UI - App Financeiro',
        'redesign-app-financeiro',
        'Redesign completo da interface de um aplicativo de gestão financeira pessoal.',
        'Projeto de redesign focado em melhorar a experiência do usuário, com nova arquitetura de informação, design system consistente e interfaces mais intuitivas.',
        'projeto-redesign.jpg',
        'Figma, Adobe XD, Principle, InVision',
        'design',
        'completed',
        1,
        NULL,
        'https://www.figma.com/proto/redesign-financeiro',
        '2023-06-01',
        '2023-07-30'
    ),
    (
        2,
        'Design System - E-commerce',
        'design-system-ecommerce',
        'Criação de design system completo para plataforma de e-commerce.',
        'Desenvolvimento de design system escalável incluindo componentes, padrões, guidelines de marca e biblioteca de ícones para garantir consistência em toda a plataforma.',
        'projeto-design-system.jpg',
        'Figma, Sketch, Zeplin, Storybook',
        'design',
        'completed',
        1,
        NULL,
        'https://www.figma.com/design-system',
        '2023-08-15',
        '2023-10-30'
    );

-- Inserir experiências profissionais
INSERT INTO
    `experiences` (
        `user_id`,
        `company`,
        `position`,
        `description`,
        `location`,
        `start_date`,
        `end_date`,
        `current`,
        `company_url`
    )
VALUES
    (
        1,
        'Anacron Desenvolvimento',
        'Desenvolvedor Full Stack Senior',
        'Desenvolvimento de sistemas web complexos utilizando PHP, JavaScript e MySQL. Liderança técnica de projetos e mentoria de desenvolvedores juniores.',
        'São Paulo, SP',
        '2021-01-01',
        NULL,
        1,
        'https://anacron.com.br'
    ),
    (
        1,
        'TechSolutions Ltda',
        'Desenvolvedor PHP Pleno',
        'Desenvolvimento e manutenção de sistemas web, integração com APIs externas e otimização de performance de aplicações.',
        'São Paulo, SP',
        '2019-03-01',
        '2020-12-31',
        0,
        'https://techsolutions.com.br'
    ),
    (
        1,
        'WebDev Startup',
        'Desenvolvedor Junior',
        'Desenvolvimento de websites responsivos, landing pages e pequenos sistemas web utilizando PHP e JavaScript.',
        'São Paulo, SP',
        '2018-01-15',
        '2019-02-28',
        0,
        NULL
    ),
    (
        2,
        'Design Studio Creative',
        'UX/UI Designer Senior',
        'Criação de interfaces digitais, pesquisa com usuários, prototipagem e desenvolvimento de design systems para diversos clientes.',
        'São Paulo, SP',
        '2020-06-01',
        NULL,
        1,
        'https://designstudio.com.br'
    ),
    (
        2,
        'Agência Digital Plus',
        'Designer Gráfico',
        'Criação de materiais gráficos, identidades visuais e interfaces web para clientes de diversos segmentos.',
        'São Paulo, SP',
        '2018-08-01',
        '2020-05-31',
        0,
        'https://agenciaplus.com.br'
    );

-- Inserir categorias de blog
INSERT INTO
    `blog_categories` (`name`, `slug`, `description`, `color`)
VALUES
    (
        'Desenvolvimento Web',
        'desenvolvimento-web',
        'Artigos sobre desenvolvimento web, frameworks e boas práticas',
        '#3498db'
    ),
    (
        'JavaScript',
        'javascript',
        'Tutoriais e dicas sobre JavaScript e suas bibliotecas',
        '#f1c40f'
    ),
    (
        'PHP',
        'php',
        'Conteúdo sobre PHP, frameworks e desenvolvimento backend',
        '#8e44ad'
    ),
    (
        'Design',
        'design',
        'Artigos sobre design, UX/UI e tendências visuais',
        '#e74c3c'
    ),
    (
        'Carreira',
        'carreira',
        'Dicas sobre carreira em tecnologia e desenvolvimento profissional',
        '#2ecc71'
    ),
    (
        'Tutoriais',
        'tutoriais',
        'Tutoriais passo a passo sobre diversas tecnologias',
        '#f39c12'
    );

-- Inserir posts do blog (exemplos)
INSERT INTO
    `blog_posts` (
        `user_id`,
        `category_id`,
        `title`,
        `slug`,
        `excerpt`,
        `content`,
        `status`,
        `featured`,
        `reading_time`,
        `published_at`
    )
VALUES
    (
        1,
        1,
        'Como Criar uma Arquitetura MVC em PHP',
        'arquitetura-mvc-php',
        'Aprenda a implementar o padrão MVC em PHP do zero, criando uma estrutura organizada e escalável para seus projetos.',
        'Conteúdo completo do artigo sobre MVC em PHP...',
        'published',
        1,
        8,
        '2024-01-15 10:00:00'
    ),
    (
        1,
        2,
        'JavaScript ES6+: Principais Features que Você Precisa Conhecer',
        'javascript-es6-features',
        'Descubra as principais funcionalidades do ES6+ que revolucionaram o desenvolvimento JavaScript moderno.',
        'Conteúdo completo sobre ES6+...',
        'published',
        1,
        12,
        '2024-01-20 14:30:00'
    ),
    (
        1,
        3,
        'Otimização de Performance em Aplicações PHP',
        'otimizacao-performance-php',
        'Técnicas avançadas para melhorar a performance de suas aplicações PHP e reduzir o tempo de resposta.',
        'Conteúdo sobre otimização PHP...',
        'published',
        0,
        10,
        '2024-01-25 09:15:00'
    ),
    (
        2,
        4,
        'Princípios de Design para Interfaces Digitais',
        'principios-design-interfaces',
        'Conheça os princípios fundamentais do design de interfaces que garantem uma boa experiência do usuário.',
        'Conteúdo sobre princípios de design...',
        'published',
        1,
        7,
        '2024-01-30 16:45:00'
    );

-- Inserir configurações do sistema
INSERT INTO
    `settings` (`key`, `value`, `type`, `description`)
VALUES
    (
        'site_name',
        'Portfolio - Lucas André Fernando',
        'string',
        'Nome do site'
    ),
    (
        'site_description',
        'Desenvolvedor Full Stack especializado em PHP, JavaScript e tecnologias modernas',
        'string',
        'Descrição do site'
    ),
    (
        'site_keywords',
        'desenvolvedor, php, javascript, portfolio, full stack, web developer',
        'string',
        'Palavras-chave do site'
    ),
    (
        'contact_email',
        'contato@anacron.com.br',
        'string',
        'Email de contato principal'
    ),
    (
        'social_github',
        'https://github.com/lucasandrefernando',
        'string',
        'URL do GitHub'
    ),
    (
        'social_linkedin',
        'https://linkedin.com/in/lucasandrefernando',
        'string',
        'URL do LinkedIn'
    ),
    (
        'social_instagram',
        'https://instagram.com/lucasandrefernando',
        'string',
        'URL do Instagram'
    ),
    (
        'analytics_google',
        '',
        'string',
        'Código do Google Analytics'
    ),
    (
        'maintenance_mode',
        'false',
        'boolean',
        'Modo de manutenção ativo'
    ),
    (
        'max_upload_size',
        '10485760',
        'integer',
        'Tamanho máximo de upload em bytes (10MB)'
    ),
    (
        'projects_per_page',
        '9',
        'integer',
        'Número de projetos por página'
    ),
    (
        'blog_posts_per_page',
        '6',
        'integer',
        'Número de posts por página'
    );

-- Inserir alguns contatos de exemplo
INSERT INTO
    `contacts` (
        `name`,
        `email`,
        `phone`,
        `subject`,
        `message`,
        `status`,
        `ip_address`
    )
VALUES
    (
        'João Silva',
        'joao@exemplo.com',
        '(11) 99999-1111',
        'Desenvolvimento de Website',
        'Olá! Gostaria de solicitar um orçamento para desenvolvimento de um website institucional para minha empresa.',
        'pending',
        '192.168.1.100'
    ),
    (
        'Maria Santos',
        'maria@exemplo.com',
        '(11) 88888-2222',
        'Consultoria',
        'Preciso de uma consultoria técnica para otimizar meu sistema atual. Podemos conversar?',
        'read',
        '192.168.1.101'
    ),
    (
        'Pedro Costa',
        'pedro@exemplo.com',
        NULL,
        'Aplicação Web',
        'Tenho uma ideia para uma aplicação web e gostaria de discutir a viabilidade do projeto.',
        'replied',
        '192.168.1.102'
    );

COMMIT;