<?= $this->extend('admin/templates/layout') ?>
<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/categories') ?>" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i>Voltar para Categorias
    </a>
</div>

<?php if(session()->getFlashdata('errors')): ?>
<div class="mb-4 px-4 py-3 bg-red-600 text-white border border-red-700">
    <ul class="list-disc list-inside">
        <?php foreach(session()->getFlashdata('errors') as $error): ?>
        <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<div class="bg-white border border-gray-300 p-6 max-w-2xl">
    <h3 class="text-2xl font-bold text-gray-900 mb-6">Editar Categoria</h3>
    
    <form action="<?= base_url('admin/categories/update/' . $category['id']) ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Nome da Categoria <span class="text-red-600">*</span></label>
            <input type="text" name="name" value="<?= old('name', $category['name']) ?>" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Descrição</label>
            <textarea name="description" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" rows="4"><?= old('description', $category['description']) ?></textarea>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Status <span class="text-red-600">*</span></label>
            <select name="status" class="w-full px-4 py-2 border border-gray-300 bg-white focus:outline-none focus:border-blue-600" required>
                <option value="active" <?= old('status', $category['status']) == 'active' ? 'selected' : '' ?>>Ativo</option>
                <option value="inactive" <?= old('status', $category['status']) == 'inactive' ? 'selected' : '' ?>>Inativo</option>
            </select>
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i>Atualizar Categoria
            </button>
            <a href="<?= base_url('admin/categories') ?>" class="px-6 py-2 bg-gray-300 text-gray-700 hover:bg-gray-400">
                <i class="fas fa-times mr-2"></i>Cancelar
            </a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>