<?php

namespace App\Controllers;

class ContactController extends BaseController
{
    public function index()
    {
        $this->render('contact', [
            'title' => 'Contato - Lucas André Fernando',
            'description' => 'Entre em contato comigo para discutir projetos, oportunidades ou colaborações',
            'page' => 'contact'
        ]);
    }

    public function store()
    {
        // LIMPAR QUALQUER SAÍDA ANTERIOR
        if (ob_get_level()) {
            ob_end_clean();
        }

        // INICIAR NOVO BUFFER
        ob_start();

        // FORÇAR HEADER JSON
        header('Content-Type: application/json');

        try {
            // VERIFICAR SE É POST
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                $response = ['success' => false, 'message' => 'Método não permitido'];
                ob_clean();
                echo json_encode($response);
                exit;
            }

            // CARREGAR EMAILSERVICE
            require_once SRC_PATH . '/Utils/EmailService.php';

            // VALIDAR DADOS
            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
                $response = ['success' => false, 'message' => 'Preencha todos os campos obrigatórios'];
                ob_clean();
                echo json_encode($response);
                exit;
            }

            // PREPARAR DADOS
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'] ?? '',
                'subject' => $_POST['subject'] ?? 'outros',
                'message' => $_POST['message']
            ];

            // ENVIAR EMAIL
            $emailService = new \App\Utils\EmailService();
            $result = $emailService->sendContactForm($data);

            if ($result) {
                $response = [
                    'success' => true,
                    'message' => 'Mensagem enviada com sucesso! Retornarei em breve.'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Erro ao enviar email'
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        // LIMPAR BUFFER E ENVIAR APENAS O JSON
        ob_clean();
        echo json_encode($response);
        exit;
    }
}
