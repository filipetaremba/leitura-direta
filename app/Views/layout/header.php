<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Catálogo de Livros') ?></title>
    
    <!-- SEO -->
    <meta name="description" content="Catálogo completo de livros digitais. Compre pelo WhatsApp!">
    <meta name="keywords" content="livros digitais, ebooks, comprar livros">
    
    <!-- CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        /* HEADER */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        .logo:hover {
            opacity: 0.9;
        }

        /* NAVEGAÇÃO */
        .nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }

        .nav a:hover {
            opacity: 0.8;
        }

        /* CATEGORIAS */
        .categories-bar {
            background: white;
            padding: 1rem 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .categories-list {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            list-style: none;
        }

        .categories-list a {
            padding: 0.5rem 1rem;
            background: #f0f0f0;
            border-radius: 20px;
            text-decoration: none;
            color: #667eea;
            font-weight: 500;
            transition: all 0.3s;
        }

        .categories-list a:hover,
        .categories-list a.active {
            background: #667eea;
            color: white;
        }

        /* ALERTAS */
        .alert {
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 5px;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav {
                gap: 1rem;
            }

            .categories-list {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="<?= base_url('/') ?>" class="logo">
                    📚 Catálogo de Livros
                </a>
                <nav class="nav">
                    <a href="<?= base_url('/') ?>">Início</a>
                    <a href="<?= base_url('admin') ?>" target="_blank">Admin</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- BARRA DE CATEGORIAS -->
    <?php if (!empty($categories)): ?>
    <div class="categories-bar">
        <div class="container">
            <ul class="categories-list">
                <li><a href="<?= base_url('/') ?>" class="<?= (current_url() == base_url('/')) ? 'active' : '' ?>">Todas</a></li>
                <?php foreach ($categories as $cat): ?>
                    <li>
                        <a href="<?= base_url('categoria/' . $cat['slug']) ?>" 
                           class="<?= (isset($category) && $category['id'] == $cat['id']) ? 'active' : '' ?>">
                            <?= esc($cat['name']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="container">