<?php

namespace App\Models;

class User extends BaseModel
{
    protected $table = 'users';

    public function getProfile($id = 1)
    {
        try {
            $user = $this->find($id);
            if (!$user) {
                // Retornar dados padrão se não encontrar
                return [
                    'id' => 1,
                    'name' => 'Lucas André Fernando',
                    'email' => 'lucas@anacron.com.br',
                    'title' => 'Desenvolvedor Full Stack',
                    'bio' => 'Desenvolvedor apaixonado por criar soluções digitais inovadoras e funcionais.',
                    'location' => 'São Paulo, SP',
                    'phone' => '(11) 99999-9999',
                    'website' => 'https://anacron.com.br',
                    'github' => 'https://github.com/lucasandrefernando',
                    'linkedin' => 'https://linkedin.com/in/lucasandrefernando',
                    'instagram' => 'https://instagram.com/lucasandrefernando',
                    'avatar' => null
                ];
            }
            return $user;
        } catch (Exception $e) {
            // Em caso de erro, retornar dados padrão
            return [
                'id' => 1,
                'name' => 'Lucas André Fernando',
                'email' => 'lucas@anacron.com.br',
                'title' => 'Desenvolvedor Full Stack',
                'bio' => 'Desenvolvedor apaixonado por criar soluções digitais inovadoras e funcionais.',
                'location' => 'São Paulo, SP',
                'phone' => '(11) 99999-9999',
                'website' => 'https://anacron.com.br',
                'github' => 'https://github.com/lucasandrefernando',
                'linkedin' => 'https://linkedin.com/in/lucasandrefernando',
                'instagram' => 'https://instagram.com/lucasandrefernando',
                'avatar' => null
            ];
        }
    }
}
