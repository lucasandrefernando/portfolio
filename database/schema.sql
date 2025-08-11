-- Portfolio Database Schema
-- Author: Lucas André Fernando
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
    AUTOCOMMIT = 0;

START TRANSACTION;

SET
    time_zone = "+00:00";

-- Database: portfolio_db
CREATE DATABASE IF NOT EXISTS `portfolio_db` DEFAULT CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `portfolio_db`;

-- --------------------------------------------------------
-- Tabela de usuários
CREATE TABLE
    `users` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `username` varchar(50) NOT NULL UNIQUE,
        `name` varchar(100) NOT NULL,
        `email` varchar(100) NOT NULL UNIQUE,
        `bio` text,
        `avatar` varchar(255),
        `title` varchar(100),
        `location` varchar(100),
        `phone` varchar(20),
        `website` varchar(255),
        `github` varchar(255),
        `linkedin` varchar(255),
        `instagram` varchar(255),
        `profile_views` int (11) DEFAULT 0,
        `last_login` timestamp NULL DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `idx_username` (`username`),
        KEY `idx_email` (`email`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de projetos
CREATE TABLE
    `projects` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `user_id` int (11) NOT NULL,
        `title` varchar(200) NOT NULL,
        `slug` varchar(200) NOT NULL UNIQUE,
        `description` text NOT NULL,
        `content` longtext,
        `image` varchar(255),
        `gallery` json,
        `technologies` text,
        `category` varchar(50) NOT NULL,
        `status` enum ('draft', 'completed', 'in_progress', 'archived') DEFAULT 'draft',
        `featured` tinyint (1) DEFAULT 0,
        `github_url` varchar(255),
        `demo_url` varchar(255),
        `client` varchar(100),
        `start_date` date,
        `end_date` date,
        `views` int (11) DEFAULT 0,
        `likes` int (11) DEFAULT 0,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
        KEY `idx_slug` (`slug`),
        KEY `idx_category` (`category`),
        KEY `idx_status` (`status`),
        KEY `idx_featured` (`featured`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de habilidades
CREATE TABLE
    `skills` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `category` varchar(50) NOT NULL,
        `icon` varchar(100),
        `color` varchar(7),
        `description` text,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `idx_category` (`category`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de relacionamento usuário-habilidades
CREATE TABLE
    `user_skills` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `user_id` int (11) NOT NULL,
        `skill_id` int (11) NOT NULL,
        `level` int (11) NOT NULL CHECK (
            `level` >= 0
            AND `level` <= 100
        ),
        `years_experience` decimal(3, 1) DEFAULT 0.0,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
        FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
        UNIQUE KEY `unique_user_skill` (`user_id`, `skill_id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de experiências profissionais
CREATE TABLE
    `experiences` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `user_id` int (11) NOT NULL,
        `company` varchar(100) NOT NULL,
        `position` varchar(100) NOT NULL,
        `description` text,
        `location` varchar(100),
        `start_date` date NOT NULL,
        `end_date` date NULL,
        `current` tinyint (1) DEFAULT 0,
        `company_url` varchar(255),
        `logo` varchar(255),
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
        KEY `idx_user_date` (`user_id`, `start_date`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de contatos
CREATE TABLE
    `contacts` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `email` varchar(100) NOT NULL,
        `phone` varchar(20),
        `subject` varchar(200) NOT NULL,
        `message` text NOT NULL,
        `status` enum ('pending', 'read', 'replied', 'archived') DEFAULT 'pending',
        `ip_address` varchar(45),
        `user_agent` text,
        `replied_at` timestamp NULL DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `idx_status` (`status`),
        KEY `idx_email` (`email`),
        KEY `idx_created_at` (`created_at`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de categorias de blog (para futuras expansões)
CREATE TABLE
    `blog_categories` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `slug` varchar(100) NOT NULL UNIQUE,
        `description` text,
        `color` varchar(7),
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `idx_slug` (`slug`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de posts do blog (para futuras expansões)
CREATE TABLE
    `blog_posts` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `user_id` int (11) NOT NULL,
        `category_id` int (11),
        `title` varchar(200) NOT NULL,
        `slug` varchar(200) NOT NULL UNIQUE,
        `excerpt` text,
        `content` longtext NOT NULL,
        `featured_image` varchar(255),
        `status` enum ('draft', 'published', 'archived') DEFAULT 'draft',
        `featured` tinyint (1) DEFAULT 0,
        `views` int (11) DEFAULT 0,
        `reading_time` int (11) DEFAULT 0,
        `published_at` timestamp NULL DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
        FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL,
        KEY `idx_slug` (`slug`),
        KEY `idx_status` (`status`),
        KEY `idx_featured` (`featured`),
        KEY `idx_published_at` (`published_at`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de configurações do sistema
CREATE TABLE
    `settings` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `key` varchar(100) NOT NULL UNIQUE,
        `value` longtext,
        `type` enum ('string', 'integer', 'boolean', 'json', 'text') DEFAULT 'string',
        `description` text,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `idx_key` (`key`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de logs do sistema
CREATE TABLE
    `system_logs` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `level` enum ('debug', 'info', 'warning', 'error', 'critical') NOT NULL,
        `message` text NOT NULL,
        `context` json,
        `user_id` int (11) NULL,
        `ip_address` varchar(45),
        `user_agent` text,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
        KEY `idx_level` (`level`),
        KEY `idx_created_at` (`created_at`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

COMMIT;