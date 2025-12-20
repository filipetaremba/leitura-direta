<div class="page-header">
    <h1 class="page-title">✏️ Editar Categoria</h1>
    <a href="<?= base_url('admin/categories') ?>" class="btn btn-primary">⬅️ Voltar</a>
</div>

<form action="<?= base_url('admin/categories/update/' . $category['id']) ?>" method="POST">
    <?= csrf_field() ?>

    <div class="form-group">
        <label class="form-label">Nome da Categoria *</label>
        <input type="text" name="name" class="form-control" 
               value="<?= old('name') ?? esc($category['name']) ?>" required>
        <small style="color: #718096;">Slug atual: <code><?= esc($category['slug']) ?></code></small>
        <?php if ($validation->hasError('name')): ?>
            <div class="form-error"><?= $validation->getError('name') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label class="form-label">Descrição (Opcional)</label>
        <textarea name="description" class="form-control" rows="4"><?= old('description') ?? esc($category['description']) ?></textarea>
        <?php if ($validation->hasError('description')): ?>
            <div class="form-error"><?= $validation->getError('description') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label class="form-label">Status *</label>
        <select name="status" class="form-control" required>
            <option value="active" <?= (old('status') ?? $category['status']) == 'active' ? 'selected' : '' ?>>Ativo</option>
            <option value="inactive" <?= (old('status') ?? $category['status']) == 'inactive' ? 'selected' : '' ?>>Inativo</option>
        </select>
        <?php if ($validation->hasError('status')): ?>
            <div class="form-error"><?= $validation->getError('status') ?></div>
        <?php endif; ?>
    </div>

    <div style="display: flex; gap: 1rem;">
        <button type="submit" class="btn btn-success">💾 Atualizar Categoria</button>
        <a href="<?= base_url('admin/categories') ?>" class="btn btn-danger">❌ Cancelar</a>
    </div>
</form>