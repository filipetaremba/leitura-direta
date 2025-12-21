<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login Admin') ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .bg-custom-gradient {
            background: #f6f6f6ff;
        }
    </style>
</head>

<body class="bg-custom-gradient min-h-screen flex items-center justify-center px-4">

    <div class="relative w-full max-w-sm p-10 bg-white/20 backdrop-blur-lg 
                border border-black shadow-2xl">

        <h2 class="text-2xl font-bold text-black mb-2 tracking-wider uppercase">
            Login Admin
        </h2>

        <p class="text-sm text-black mb-6">
            Acesse o painel administrativo
        </p>

        <!-- ALERTAS -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="mb-4 p-3 bg-green-200 text-green-900 text-sm font-semibold">
                ✅ <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="mb-4 p-3 bg-red-200 text-red-900 text-sm font-semibold">
                ❌ <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="mb-4 p-3 bg-red-200 text-red-900 text-sm">
                <strong>❌ Erros:</strong>
                <ul class="list-disc ml-5 mt-1">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- FORM LOGIN -->
        <form action="<?= base_url('admin/login') ?>" method="POST" class="space-y-5">
            <?= csrf_field() ?>

            <!-- EMAIL -->
            <div>
                <input 
                    type="email"
                    name="email"
                    placeholder="E-mail"
                    value="<?= old('email') ?>"
                    required
                    class="w-full px-4 py-3 bg-white text-black placeholder-black
                           focus:outline-none focus:ring-2 focus:ring-black
                           transition-all shadow-inner"
                />
                <?php if ($validation->hasError('email')): ?>
                    <p class="text-red-700 text-xs mt-1">
                        <?= $validation->getError('email') ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- SENHA -->
            <div>
                <input 
                    type="password"
                    name="password"
                    placeholder="Senha"
                    required
                    class="w-full px-4 py-3 bg-white text-black placeholder-black
                           focus:outline-none focus:ring-2 focus:ring-black
                           transition-all shadow-inner"
                />
                <?php if ($validation->hasError('password')): ?>
                    <p class="text-red-700 text-xs mt-1">
                        <?= $validation->getError('password') ?>
                    </p>
                <?php endif; ?>
            </div>

            <button 
                type="submit"
                class="w-full py-2  bg-blue-600 hover:bg-blue-700
                       text-black font-bold shadow-lg transition-all
                       active:scale-[0.98] tracking-widest text-lg"
            >
                SIGN IN
            </button>
        </form>

        <p class="text-center text-xs text-black mt-6">
            Criar Conta?
            <a href="<?= base_url('/admin/register') ?>" 
               class="underline font-bold hover:text-gray-800 transition-colors">
                Registrar
            </a>
        </p>

    </div>

</body>
</html>
