<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'ADMIN' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <style>
        * {
            border-radius: 0 !important;
        }
        body {
            font-family: system-ui, -apple-system, sans-serif;
        }
    </style>
    <?= $this->renderSection('css') ?>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-gray-300 flex flex-col">
        <div class="p-6 bg-black border-b border-gray-800">
            <h1 class="text-xl font-bold text-white">
                <i class="fas fa-tools mr-2 text-blue-500"></i>
                Admin Panel
            </h1>
        </div>
        
        <nav class="flex-1 p-4">
            <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                <i class="fas fa-chart-line w-5 mr-3"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="<?= base_url('admin/books') ?>" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                <i class="fas fa-book w-5 mr-3"></i>
                <span>Livros</span>
            </a>
            
            <a href="<?= base_url('admin/categories') ?>" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                <i class="fas fa-tags w-5 mr-3"></i>
                <span>Categorias</span>
            </a>
            
            <a href="<?= base_url('admin/users') ?>" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                <i class="fas fa-users w-5 mr-3"></i>
                <span>Usuários</span>
            </a>
            
            <a href="<?= base_url('admin/settings') ?>" class="flex items-center px-4 py-3 mb-2 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                <i class="fas fa-cog w-5 mr-3"></i>
                <span>Configurações</span>
            </a>
        </nav>
        
        <div class="p-4 border-t border-gray-800">
            <div class="flex items-center px-4 py-3 text-sm text-gray-400">
                <i class="fas fa-user-circle w-5 mr-3 text-lg"></i>
                <span><?= esc(session()->get('admin_name')) ?></span>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white border-b border-gray-300 shadow-sm">
            <div class="px-6 py-4 flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-900"><?= $page_title ?? 'Painel Administrativo' ?></h2>
                
                <div class="flex items-center gap-4">
                    <a href="<?= base_url('/') ?>" target="_blank" class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">
                        <i class="fas fa-eye mr-2"></i>
                        Ver Site
                    </a>
                    <a href="<?= base_url('admin/logout') ?>" class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Sair
                    </a>
                </div>
            </div>
        </header>

        <!-- Conteúdo principal -->
        <main class="p-6 flex-1 overflow-auto">
            <?= $this->renderSection('content') ?>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-300 px-6 py-4">
            <div class="text-sm text-gray-600 text-center">
                <i class="fas fa-copyright mr-1"></i>
                <?= date('Y') ?> Admin Panel - Todos os direitos reservados
            </div>
        </footer>
    </div>

    <script src="<?= base_url('js/admin.js') ?>"></script>
    <?= $this->renderSection('js') ?>
</body>
</html>