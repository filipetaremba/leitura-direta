<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Admin</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 450px;
            padding: 3rem;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .register-subtitle {
            color: #718096;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #2d3748;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-register {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-register:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            display: none;
        }

        .alert.show {
            display: block;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .warning-box {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #856404;
        }

        .warning-box strong {
            display: block;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="register-header">
            <h1 class="register-title">➕ Cadastrar Admin</h1>
            <p class="register-subtitle">Crie uma nova conta de administrador</p>
        </div>

        <!-- AVISO -->
        <div class="warning-box">
            <strong>⚠️ ATENÇÃO:</strong>
            Esta página deve ser REMOVIDA em produção por questões de segurança!
        </div>

        <!-- ALERTAS -->
        <div id="alert" class="alert"></div>

        <!-- FORMULÁRIO -->
        <form id="registerForm">
            <div class="form-group">
                <label class="form-label">👤 Nome Completo</label>
                <input type="text" 
                       id="name"
                       name="name" 
                       class="form-control" 
                       placeholder="Digite seu nome completo"
                       required>
            </div>

            <div class="form-group">
                <label class="form-label">📧 Email</label>
                <input type="email" 
                       id="email"
                       name="email" 
                       class="form-control" 
                       placeholder="seu@email.com"
                       required>
            </div>

            <div class="form-group">
                <label class="form-label">🔒 Senha</label>
                <input type="password" 
                       id="password"
                       name="password" 
                       class="form-control" 
                       placeholder="Mínimo 6 caracteres"
                       required>
            </div>

            <button type="submit" id="btnSubmit" class="btn-register">
                🚀 Cadastrar Admin
            </button>
        </form>

        <div class="back-link">
            <a href="<?= base_url('admin/login') ?>">← Voltar para o login</a>
        </div>
    </div>

    <script>
        const form = document.getElementById('registerForm');
        const alertBox = document.getElementById('alert');
        const btnSubmit = document.getElementById('btnSubmit');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Desabilita botão
            btnSubmit.disabled = true;
            btnSubmit.textContent = '⏳ Cadastrando...';

            // Coleta dados
            const formData = new FormData(form);

            try {
                const response = await fetch('<?= base_url('admin/register') ?>', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    // Sucesso
                    alertBox.className = 'alert alert-success show';
                    alertBox.textContent = '✅ ' + result.message + ' Redirecionando...';
                    
                    form.reset();
                    
                    // Redireciona para login após 2 segundos
                    setTimeout(() => {
                        window.location.href = '<?= base_url('admin/login') ?>';
                    }, 2000);
                } else {
                    // Erro
                    alertBox.className = 'alert alert-error show';
                    
                    if (result.errors) {
                        let errorMsg = '❌ Erros:\n';
                        for (let field in result.errors) {
                            errorMsg += '• ' + result.errors[field] + '\n';
                        }
                        alertBox.textContent = errorMsg;
                    } else {
                        alertBox.textContent = '❌ ' + result.message;
                    }
                    
                    btnSubmit.disabled = false;
                    btnSubmit.textContent = '🚀 Cadastrar Admin';
                }
            } catch (error) {
                alertBox.className = 'alert alert-error show';
                alertBox.textContent = '❌ Erro ao conectar com o servidor';
                btnSubmit.disabled = false;
                btnSubmit.textContent = '🚀 Cadastrar Admin';
            }
        });
    </script>

</body>
</html>