<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin - Catálogo de Livros') ?></title>
    
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
        }

        /* ADMIN HEADER */
        .admin-header {
            background: #2d3748;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .admin-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .admin-nav {
            display: flex;
            gap: 2rem;
        }

        .admin-nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .admin-nav a:hover {
            color: #667eea;
        }

        /* SIDEBAR + CONTENT */
        .admin-layout {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 2rem;
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        /* SIDEBAR */
        .sidebar {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .sidebar-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #2d3748;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1rem;
            color: #4a5568;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #667eea;
            color: white;
        }

        .sidebar-menu .icon {
            font-size: 1.2rem;
        }

        /* MAIN CONTENT */
        .admin-content {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            min-height: 500px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .page-title {
            font-size: 2rem;
            color: #2d3748;
        }

        /* BUTTONS */
        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5568d3;
        }

        .btn-success {
            background: #48bb78;
            color: white;
        }

        .btn-success:hover {
            background: #38a169;
        }

        .btn-warning {
            background: #ed8936;
            color: white;
        }

        .btn-warning:hover {
            background: #dd6b20;
        }

        .btn-danger {
            background: #f56565;
            color: white;
        }

        .btn-danger:hover {
            background: #e53e3e;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
        }

        /* ALERTS */
        .alert {
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
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

        /* TABLE */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .table th,
        .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        .table th {
            background: #f7fafc;
            font-weight: 600;
            color: #2d3748;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .table tr:hover {
            background: #f7fafc;
        }

        .table img {
            width: 60px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        /* BADGE */
        .badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }

        /* FORM */
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
            padding: 0.8rem;
            border: 1px solid #cbd5e0;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-error {
            color: #e53e3e;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }

        /* STATS CARDS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border-left: 4px solid #667eea;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #718096;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #2d3748;
        }

        /* RESPONSIVE */
        @media (max-width: 968px) {
            .admin-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }

            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

    <!-- ADMIN HEADER -->
    <header class="admin-header">
        <div class="admin-container">
            <div class="admin-header-content">
                <a href="<?= base_url('admin') ?>" class="admin-logo">
                    🔧 Admin - Catálogo de Livros
                </a>
                <nav class="admin-nav">
                <span style="opacity: 0.8;">👤 <?= esc(session()->get('admin_name')) ?></span>
                <a href="<?= base_url('/') ?>" target="_blank">👁️ Ver Site</a>
                <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
                <a href="<?= base_url('admin/logout') ?>" 
                   onclick="return confirm('Tem certeza que deseja sair?')"
                   style="color: #f56565;">
                    🚪 Sair
                </a>
            </nav>
            </div>
        </div>
    </header>

    <!-- LAYOUT -->
    <div class="admin-layout">
        
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-title">📋 Menu</div>
            <ul class="sidebar-menu">
                <li>
                    <a href="<?= base_url('admin/dashboard') ?>" 
                       class="<?= (current_url() == base_url('admin') || current_url() == base_url('admin/dashboard')) ? 'active' : '' ?>">
                        <span class="icon">📊</span>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/books') ?>" 
                       class="<?= (strpos(current_url(), 'admin/books') !== false) ? 'active' : '' ?>">
                        <span class="icon">📚</span>
                        Livros
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/categories') ?>" 
                       class="<?= (strpos(current_url(), 'admin/categories') !== false) ? 'active' : '' ?>">
                        <span class="icon">📂</span>
                        Categorias
                    </a>
                </li>
            </ul>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="admin-content">
            
            <!-- ALERTAS DE SESSÃO -->
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