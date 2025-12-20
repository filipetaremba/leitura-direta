<div class="page-header">
    <h1 class="page-title">✏️ Editar Livro</h1>
    <a href="<?= base_url('admin/books') ?>" class="btn btn-primary">⬅️ Voltar</a>
</div>

<form action="<?= base_url('admin/books/update/' . $book['id']) ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
        <label class="form-label">Categoria *</label>
        <select name="category_id" class="form-control" required>
            <option value="">Selecione uma categoria</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>" 
                    <?= (old('category_id') ?? $book['category_id']) == $category['id'] ? 'selected' : '' ?>>
                    <?= esc($category['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if ($validation->hasError('category_id')): ?>
            <div class="form-error"><?= $validation->getError('category_id') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label class="form-label">Título *</label>
        <input type="text" name="title" class="form-control" 
               value="<?= old('title') ?? esc($book['title']) ?>" required>
        <?php if ($validation->hasError('title')): ?>
            <div class="form-error"><?= $validation->getError('title') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label class="form-label">Autor *</label>
        <input type="text" name="author" class="form-control" 
               value="<?= old('author') ?? esc($book['author']) ?>" required>
        <?php if ($validation->hasError('author')): ?>
            <div class="form-error"><?= $validation->getError('author') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label class="form-label">Descrição *</label>
        <textarea name="description" class="form-control" required><?= old('description') ?? esc($book['description']) ?></textarea>
        <?php if ($validation->hasError('description')): ?>
            <div class="form-error"><?= $validation->getError('description') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label class="form-label">Preço (R$) *</label>
        <input type="number" step="0.01" name="price" class="form-control" 
               value="<?= old('price') ?? $book['price'] ?>" required>
        <?php if ($validation->hasError('price')): ?>
            <div class="form-error"><?= $validation->getError('price') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label class="form-label">Capa Atual:</label>
        <div style="margin: 0.5rem 0;">
            <img src="<?= get_cover_url($book['cover_image']) ?>" 
                 alt="Capa atual" 
                 style="width: 150px; height: 200px; object-fit: cover; border-radius: 5px;">
        </div>
        <label class="form-label">Nova Capa (Opcional - JPG, PNG, WEBP - Max: 2MB)</label>
        <input type="file" name="cover_image" class="form-control" accept="image/*">
        <small style="color: #718096;">Deixe em branco para manter a capa atual</small>
        <?php if ($validation->hasError('cover_image')): ?>
            <div class="form-error"><?= $validation->getError('cover_image') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label class="form-label">Status *</label>
        <select name="status" class="form-control" required>
            <option value="active" <?= (old('status') ?? $book['status']) == 'active' ? 'selected' : '' ?>>Ativo</option>
            <option value="inactive" <?= (old('status') ?? $book['status']) == 'inactive' ? 'selected' : '' ?>>Inativo</option>
        </select>
        <?php if ($validation->hasError('status')): ?>
            <div class="form-error"><?= $validation->getError('status') ?></div>
        <?php endif; ?>
    </div>

    <div style="display: flex; gap: 1rem;">
        <button type="submit" class="btn btn-success">💾 Atualizar Livro</button>
        <a href="<?= base_url('admin/books') ?>" class="btn btn-danger">❌ Cancelar</a>
    </div>
</form>