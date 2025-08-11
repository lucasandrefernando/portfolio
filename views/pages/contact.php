<!-- Hero Contact Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Entre em <span class="highlight">Contato</span></h1>
                <p class="hero-subtitle">Vamos Conversar</p>
                <p class="hero-description">
                    Estou sempre aberto a novos projetos, oportunidades de colaboração e conversas sobre tecnologia.
                    Entre em contato e vamos transformar sua ideia em realidade!
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
    .contact-section {
        padding: 60px 0;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: start;
    }

    .contact-info,
    .contact-form {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 40px;
        border: 1px solid var(--border-primary);
    }

    .contact-info h3,
    .contact-form h3 {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 24px;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 16px 20px;
        background: var(--bg-tertiary);
        border: 1px solid var(--border-secondary);
        border-radius: 12px;
        color: var(--text-primary);
        font-size: 16px;
        transition: all 0.3s ease;
        font-family: inherit;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--accent-primary);
        background: var(--bg-secondary);
        box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .btn-submit {
        width: 100%;
        background: var(--gradient-primary);
        color: var(--text-primary);
        border: none;
        padding: 18px 32px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 212, 255, 0.3);
    }

    .form-message {
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        font-weight: 600;
        display: none;
    }

    .form-message.success {
        background: rgba(16, 185, 129, 0.1);
        color: var(--accent-tertiary);
        border: 1px solid var(--accent-tertiary);
    }

    .form-message.error {
        background: rgba(239, 68, 68, 0.1);
        color: #EF4444;
        border: 1px solid #EF4444;
    }

    @media (max-width: 768px) {
        .contact-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="contact-section">
    <div class="container">
        <div class="contact-container">
            <div class="contact-info">
                <h3>Informações de Contato</h3>
                <p>Estou sempre disponível para discutir novos projetos, oportunidades de trabalho ou simplesmente trocar ideias sobre tecnologia.</p>

                <div style="margin-top: 32px;">
                    <p><strong>📧 Email:</strong> lucasandre.sanos@gmail.com</p>
                    <p><strong>📍 Localização:</strong> Belo Horizonte, MG - Brasil</p>
                    <p><strong>🏢 Empresa:</strong> Eagle Telecom - Desenvolvedor</p>
                    <p><strong>⏱️ Resposta:</strong> Até 2 horas em dias úteis</p>
                </div>
            </div>

            <div class="contact-form">
                <h3>Envie uma Mensagem</h3>

                <div id="form-message" class="form-message"></div>

                <form id="contact-form" method="POST" action="<?= APP_URL ?>/public/contato">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nome Completo *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="subject">Assunto *</label>
                            <select id="subject" name="subject" required>
                                <option value="">Selecione um assunto</option>
                                <option value="projeto">Novo Projeto</option>
                                <option value="freelance">Trabalho Freelance</option>
                                <option value="consultoria">Consultoria</option>
                                <option value="emprego">Oportunidade de Emprego</option>
                                <option value="parceria">Parceria</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Mensagem *</label>
                        <textarea id="message" name="message" placeholder="Conte-me sobre seu projeto..." required></textarea>
                    </div>

                    <button type="submit" class="btn-submit" id="submit-btn">
                        Enviar Mensagem
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    // Formulário de contato
    document.getElementById('contact-form').addEventListener('submit', async function(e) {
        e.preventDefault();

        const submitBtn = document.getElementById('submit-btn');
        const messageDiv = document.getElementById('form-message');
        const formData = new FormData(this);

        // Desabilitar botão
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';

        // DEBUG: Log dos dados
        console.log('=== DADOS DO FORMULÁRIO ===');
        for (let [key, value] of formData.entries()) {
            console.log(key + ': ' + value);
        }

        try {
            console.log('Enviando para:', '<?= APP_URL ?>/public/contato');

            const response = await fetch('<?= APP_URL ?>/public/contato', {
                method: 'POST',
                body: formData
            });

            console.log('Status da resposta:', response.status);
            console.log('Headers da resposta:', response.headers);

            const responseText = await response.text();
            console.log('Resposta bruta:', responseText);

            let result;
            try {
                result = JSON.parse(responseText);
            } catch (parseError) {
                console.error('Erro ao fazer parse do JSON:', parseError);
                console.log('Resposta não é JSON válido:', responseText);
                throw new Error('Resposta inválida do servidor');
            }

            console.log('Resultado parseado:', result);

            if (result.success) {
                messageDiv.className = 'form-message success';
                messageDiv.textContent = 'Mensagem enviada com sucesso! Retornarei em breve.';
                messageDiv.style.display = 'block';
                this.reset();
            } else {
                throw new Error(result.message || 'Erro ao enviar mensagem');
            }
        } catch (error) {
            console.error('Erro completo:', error);
            messageDiv.className = 'form-message error';
            messageDiv.textContent = 'Erro ao enviar mensagem: ' + error.message;
            messageDiv.style.display = 'block';
        } finally {
            // Reabilitar botão
            submitBtn.disabled = false;
            submitBtn.textContent = 'Enviar Mensagem';

            // Esconder mensagem após 10 segundos (aumentei para debug)
            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 10000);
        }
    });

    // Máscara para telefone
    document.getElementById('phone').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length <= 11) {
            value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            if (value.length < 14) {
                value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
            }
        }
        e.target.value = value;
    });
</script>