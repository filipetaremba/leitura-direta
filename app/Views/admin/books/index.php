<div class="page-header">
    <h1 class="page-title">📚 Gerenciar Livros</h1>
    <a href="<?= base_url('admin/books/create') ?>" class="btn btn-primary">➕ Novo Livro</a>
</div>

<?php if (!empty($books)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Capa</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Status</th>
                <th>Visualizações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td>
                        <img src="<?= get_cover_url($book['cover_image']) ?>" alt="Capa">
                    </td>
                    <td><strong><?= esc($book['title']) ?></strong></td>
                    <td><?= esc($book['author']) ?></td>
                    <td><?= esc($book['category_name']) ?></td>
                    <td><?= format_price($book['price']) ?></td>
                    <td>
                        <?php if ($book['status'] === 'active'): ?>
                            <span class="badge badge-success">Ativo</span>
                        <?php else: ?>
                            <span class="badge badge-danger">Inativo</span>
                        <?php endif; ?>
                    </td>
                    <td><?= number_format($book['views'], 0, ',', '.') ?> 👁️</td>
                    <td>
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            <a href="<?= base_url('admin/books/edit/' . $book['id']) ?>" 
                               class="btn btn-warning btn-sm">
                                ✏️ Editar
                            </a>
                            <a href="<?= base_url('admin/books/toggle-status/' . $book['id']) ?>" 
                               class="btn btn-primary btn-sm">
                                <?= ($book['status'] === 'active') ? '❌ Desativar' : '✅ Ativar' ?>
                            </a>
                            <a href="<?= base_url('admin/books/delete/' . $book['id']) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirmDelete('Tem certeza que deseja deletar este livro?')">
                                🗑️ Deletar
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div style="text-align: center; padding: 3rem; color: #718096;">
        <p style="font-size: 1.2rem; margin-bottom: 1rem;">📭 Nenhum livro cadastrado</p>
        <a href="<?= base_url('admin/books/create') ?>" class="btn btn-primary">➕ Cadastrar Primeiro Livro</a>
    </div>
<?php endif; ?>