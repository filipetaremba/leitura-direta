<div class="page-header">
    <h1 class="page-title">📂 Gerenciar Categorias</h1>
    <a href="<?= base_url('admin/categories/create') ?>" class="btn btn-primary">➕ Nova Categoria</a>
</div>

<?php if (!empty($categories)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Descrição</th>
                <th>Livros</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><strong><?= esc($category['name']) ?></strong></td>
                    <td><code><?= esc($category['slug']) ?></code></td>
                    <td><?= truncate_text(esc($category['description'] ?? '-'), 80) ?></td>
                    <td>
                        <span style="background: #667eea; color: white; padding: 0.3rem 0.8rem; border-radius: 20px; font-weight: bold;">
                            <?= $category['book_count'] ?> livro(s)
                        </span>
                    </td>
                    <td>
                        <?php if ($category['status'] === 'active'): ?>
                            <span class="badge badge-success">Ativo</span>
                        <?php else: ?>
                            <span class="badge badge-danger">Inativo</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            <a href="<?= base_url('admin/categories/edit/' . $category['id']) ?>" 
                               class="btn btn-warning btn-sm">
                                ✏️ Editar
                            </a>
                            <a href="<?= base_url('admin/categories/toggle-status/' . $category['id']) ?>" 
                               class="btn btn-primary btn-sm">
                                <?= ($category['status'] === 'active') ? '❌ Desativar' : '✅ Ativar' ?>
                            </a>
                            <?php if ($category['book_count'] == 0): ?>
                                <a href="<?= base_url('admin/categories/delete/' . $category['id']) ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirmDelete('Tem certeza que deseja deletar esta categoria?')">
                                    🗑️ Deletar
                                </a>
                            <?php else: ?>
                                <button class="btn btn-danger btn-sm" 
                                        disabled 
                                        title="Não é possível deletar categorias com livros vinculados">
                                    🔒 Bloqueado
                                </button>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div style="text-align: center; padding: 3rem; color: #718096;">
        <p style="font-size: 1.2rem; margin-bottom: 1rem;">📭 Nenhuma categoria cadastrada</p>
        <a href="<?= base_url('admin/categories/create') ?>" class="btn btn-primary">➕ Cadastrar Primeira Categoria</a>
    </div>
<?php endif; ?>