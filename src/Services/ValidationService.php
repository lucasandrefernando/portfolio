<?php

namespace App\Services;

class ValidationService
{

    public static function validateContact(array $data): array
    {
        $errors = [];

        // Nome
        if (empty($data['name'])) {
            $errors['name'] = 'Nome é obrigatório';
        } elseif (strlen($data['name']) < 2) {
            $errors['name'] = 'Nome deve ter pelo menos 2 caracteres';
        } elseif (strlen($data['name']) > 100) {
            $errors['name'] = 'Nome deve ter no máximo 100 caracteres';
        }

        // Email
        if (empty($data['email'])) {
            $errors['email'] = 'Email é obrigatório';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email inválido';
        }

        // Telefone (opcional)
        if (!empty($data['phone'])) {
            $phone = preg_replace('/[^0-9]/', '', $data['phone']);
            if (strlen($phone) < 10 || strlen($phone) > 11) {
                $errors['phone'] = 'Telefone inválido';
            }
        }

        // Assunto
        if (empty($data['subject'])) {
            $errors['subject'] = 'Assunto é obrigatório';
        } elseif (strlen($data['subject']) < 5) {
            $errors['subject'] = 'Assunto deve ter pelo menos 5 caracteres';
        } elseif (strlen($data['subject']) > 200) {
            $errors['subject'] = 'Assunto deve ter no máximo 200 caracteres';
        }

        // Mensagem
        if (empty($data['message'])) {
            $errors['message'] = 'Mensagem é obrigatória';
        } elseif (strlen($data['message']) < 10) {
            $errors['message'] = 'Mensagem deve ter pelo menos 10 caracteres';
        } elseif (strlen($data['message']) > 2000) {
            $errors['message'] = 'Mensagem deve ter no máximo 2000 caracteres';
        }

        return [
            'valid' => empty($errors),
            'errors' => $errors
        ];
    }

    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validatePhone(string $phone): bool
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        return strlen($phone) >= 10 && strlen($phone) <= 11;
    }

    public static function validateUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public static function sanitizeString(string $input): string
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    public static function validateRequired(array $data, array $required): array
    {
        $errors = [];

        foreach ($required as $field) {
            if (empty($data[$field])) {
                $errors[$field] = ucfirst($field) . ' é obrigatório';
            }
        }

        return $errors;
    }
}
