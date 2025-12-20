<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    
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

        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 450px;
            padding: 3rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
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

        .form-error {
            color: #e53e3e;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }

        .btn-login {
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

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            font-weight: 500;
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

        .default-credentials {
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .default-credentials strong {
            display: block;
            margin-bottom: 0.5rem;
            color: #856404;
        }

        .default-credentials code {
            background: white;
            padding: 0.2rem 0.5rem;
            border-radius: 3px;
            font-family: monospace;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-header">
            <h1 class="login-title">🔐 Login Admin</h1>
            <p class="login-subtitle">Acesse o painel administrativo</p>
        </div>

        <!-- CREDENCIAIS PADRÃO (REMOVER EM PRODUÇÃO) -->
        <div class="default-credentials">
            <strong>⚠️ Credenciais Padrão (Desenvolvimento):</strong>
            <div>Email: <code>admin@catalogo.com</code></div>
            <div>Senha: <code>admin123</code></div>
        </div>

        <!-- ALERTAS -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                ✅ <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error">
                ❌ <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-error">
                <strong>❌ Erros de validação:</strong>
                <ul style="margin-top: 0.5rem; margin-left: 1.5rem;">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- FORMULÁRIO DE LOGIN -->
        <form action="<?= base_url('admin/login') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="form-group">
                <label class="form-label">📧 Email</label>
                <input type="email" 
                       name="email" 
                       class="form-control" 
                       placeholder="seu@email.com"
                       value="<?= old('email') ?>"
                       required>
                <?php if ($validation->hasError('email')): ?>
                    <div class="form-error"><?= $validation->getError('email') ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label class="form-label">🔒 Senha</label>
                <input type="password" 
                       name="password" 
                       class="form-control" 
                       placeholder="••••••••"
                       required>
                <?php if ($validation->hasError('password')): ?>
                    <div class="form-error"><?= $validation->getError('password') ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn-login">
                🚀 Entrar no Admin
            </button>
        </form>

        <div class="back-link">
            <a href="<?= base_url('/') ?>">← Voltar para o site</a>
        </div>
    </div>

</body>
</html>