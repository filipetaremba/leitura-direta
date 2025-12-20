<div class="page-header">
    <h1 class="page-title">📊 Dashboard</h1>
</div>

<!-- ESTATÍSTICAS -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">📚 Total de Livros</div>
        <div class="stat-value"><?= number_format($totalBooks, 0, ',', '.') ?></div>
    </div>

    <div class="stat-card" style="border-left-color: #48bb78;">
        <div class="stat-label">✅ Livros Ativos</div>
        <div class="stat-value" style="color: #48bb78;"><?= number_format($activeBooks, 0, ',', '.') ?></div>
    </div>

    <div class="stat-card" style="border-left-color: #ed8936;">
        <div class="stat-label">📂 Categorias</div>
        <div class="stat-value" style="color: #ed8936;"><?= number_format($totalCategories, 0, ',', '.') ?></div>
    </div>

    <div class="stat-card" style="border-left-color: #f56565;">
        <div class="stat-label">❌ Livros Inativos</div>
        <div class="stat-value" style="color: #f56565;"><?= number_format($totalBooks - $activeBooks, 0, ',', '.') ?></div>
    </div>
</div>

<!-- AÇÕES RÁPIDAS -->
<div style="margin-bottom: 2rem;">
    <h2 style="font-size: 1.5rem; margin-bottom: 1rem; color: #2d3748;">⚡ Ações Rápidas</h2>
    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="<?= base_url('admin/books/create') ?>" class="btn btn-primary">➕ Novo Livro</a>
        <a href="<?= base_url('admin/categories/create') ?>" class="btn btn-success">➕ Nova Categoria</a>
        <a href="<?= base_url('/') ?>" target="_blank" class="btn btn-warning">👁️ Ver Site Público</a>
    </div>
</div>

<!-- LIVROS RECENTES -->
<div>
    <h2 style="font-size: 1.5rem; margin-bottom: 1rem; color: #2d3748;">📚 Livros Recentes</h2>
    
    <?php if (!empty($recentBooks)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Preço</th>
                    <th>Status</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recentBooks as $book): ?>
                    <tr>
                        <td><?= $book['id'] ?></td>
                        <td><strong><?= esc($book['title']) ?></strong></td>
                        <td><?= esc($book['author']) ?></td>
                        <td><?= format_price($book['price']) ?></td>
                        <td>
                            <?php if ($book['status'] === 'active'): ?>
                                <span class="badge badge-success">Ativo</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inativo</span>
                            <?php endif; ?>
                        </td>
                        <td><?= date('d/m/Y H:i', strtotime($book['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color: #718096;">Nenhum livro cadastrado ainda.</p>
    <?php endif; ?>
</div>