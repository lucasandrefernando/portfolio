<?php

namespace App\Utils;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailService
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $this->configure();
    }

    private function configure()
    {
        try {
            // Configurações do servidor
            $this->mailer->isSMTP();
            $this->mailer->Host       = MAIL_HOST;
            $this->mailer->SMTPAuth   = true;
            $this->mailer->Username   = MAIL_USERNAME;
            $this->mailer->Password   = MAIL_PASSWORD;
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port       = MAIL_PORT;

            // ATIVAR DEBUG
            $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mailer->Debugoutput = function ($str, $level) {
                error_log("SMTP DEBUG: $str");
            };

            // Configurações de charset
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->Encoding = 'base64';
        } catch (Exception $e) {
            error_log("Erro na configuração do email: " . $e->getMessage());
            throw $e;
        }
    }

    public function sendContactForm($data)
    {
        try {
            // Log das configurações
            error_log("=== CONFIGURAÇÕES DE EMAIL ===");
            error_log("Host: " . MAIL_HOST);
            error_log("Port: " . MAIL_PORT);
            error_log("Username: " . MAIL_USERNAME);
            error_log("Password: " . (MAIL_PASSWORD ? "***DEFINIDA***" : "***VAZIA***"));

            // Remetente
            $this->mailer->setFrom(MAIL_USERNAME, MAIL_FROM_NAME);

            // Destinatário
            $this->mailer->addAddress(MAIL_USERNAME, 'Lucas André Fernando');

            // Reply-to (responder para o remetente)
            $this->mailer->addReplyTo($data['email'], $data['name']);

            // Assunto
            $this->mailer->Subject = 'Novo Contato do Portfolio - ' . $data['subject'];

            // Corpo do email
            $this->mailer->isHTML(true);
            $this->mailer->Body = $this->getEmailTemplate($data);

            // Log antes de enviar
            error_log("Tentando enviar email para: " . MAIL_USERNAME);

            // Enviar
            $result = $this->mailer->send();

            error_log("Email enviado com sucesso!");

            // Limpar destinatários para próximo envio
            $this->mailer->clearAddresses();
            $this->mailer->clearReplyTos();

            return $result;
        } catch (Exception $e) {
            error_log("ERRO DETALHADO DO EMAIL: " . $e->getMessage());
            error_log("STACK TRACE: " . $e->getTraceAsString());
            throw $e;
        }
    }

    private function getEmailTemplate($data)
    {
        $subjectLabels = [
            'projeto' => 'Novo Projeto',
            'freelance' => 'Trabalho Freelance',
            'consultoria' => 'Consultoria',
            'emprego' => 'Oportunidade de Emprego',
            'parceria' => 'Parceria',
            'outros' => 'Outros'
        ];

        $subjectText = $subjectLabels[$data['subject']] ?? 'Outros';

        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Novo Contato do Portfolio</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #00D4FF 0%, #6366F1 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
                .field { margin-bottom: 20px; }
                .field strong { color: #00D4FF; }
                .message-box { background: white; padding: 20px; border-left: 4px solid #00D4FF; margin: 20px 0; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>📧 Novo Contato do Portfolio</h1>
                    <p>Você recebeu uma nova mensagem</p>
                </div>
                
                <div class='content'>
                    <div class='field'>
                        <strong>👤 Nome:</strong> {$data['name']}
                    </div>
                    
                    <div class='field'>
                        <strong>📧 Email:</strong> {$data['email']}
                    </div>
                    
                    " . (!empty($data['phone']) ? "
                    <div class='field'>
                        <strong>📱 Telefone:</strong> {$data['phone']}
                    </div>
                    " : "") . "
                    
                    <div class='field'>
                        <strong>📋 Assunto:</strong> {$subjectText}
                    </div>
                    
                    <div class='field'>
                        <strong>💬 Mensagem:</strong>
                        <div class='message-box'>
                            " . nl2br(htmlspecialchars($data['message'])) . "
                        </div>
                    </div>
                    
                    <div class='field'>
                        <strong>🕒 Data/Hora:</strong> " . date('d/m/Y H:i:s') . "
                    </div>
                </div>
            </div>
        </body>
        </html>
        ";
    }
}
