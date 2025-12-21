<header class="admin-header">
    <div class="admin-container">
        <div class="admin-header-content">
            <a href="<?= base_url('admin') ?>" class="admin-logo">
                🔧 Admin - Catálogo de Livros
            </a>
            <nav class="admin-nav">
                <span class="admin-user">👤 <?= esc(session()->get('admin_name')) ?></span>
                <a href="<?= base_url('/') ?>" target="_blank">👁️ Ver Site</a>
                <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
                <a href="<?= base_url('admin/logout') ?>" class="btn-logout">
                    🚪 Sair
                </a>
            </nav>
        </div>
    </div>
</header>
