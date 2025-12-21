<?= $this->extend('admin/layout/base') ?>
<?= $this->section('content') ?>

<?php if(session()->getFlashdata('success')): ?>
<div class="mb-4 px-4 py-3 bg-blue-600 text-white border border-blue-700">
    <?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
<div class="mb-4 px-4 py-3 bg-red-600 text-white border border-red-700">
    <?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>

<div class="grid grid-cols-3 gap-6">
    <div class="col-span-2 bg-white border border-gray-300 p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Categorias Existentes</h3>
        
        <?php if(!empty($categories)): ?>
        <table class="w-full">
            <thead class="bg-gray-200 border-b border-gray-300">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-700">ID</th>
                    <th class="px-4 py-3 text-left text-gray-700">Nome</th>
                    <th class="px-4 py-3 text-left text-gray-700">Total de Livros</th>
                    <th class="px-4 py-3 text-left text-gray-700">Status</th>
                    <th class="px-4 py-3 text-left text-gray-700">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $category): ?>
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-600"><?= str_pad($category['id'], 2, '0', STR_PAD_LEFT) ?></td>
                    <td class="px-4 py-3 text-gray-900 font-medium"><?= esc($category['name']) ?></td>
                    <td class="px-4 py-3 text-gray-600"><?= $category['book_count'] ?? 0 ?> livros</td>
                    <td class="px-4 py-3">
                        <span class="px-3 py-1 <?= $category['status'] == 'active' ? 'bg-blue-600' : 'bg-gray-400' ?> text-white text-sm">
                            <?= $category['status'] == 'active' ? 'Ativo' : 'Inativo' ?>
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <a href="<?= base_url('admin/categories/edit/' . $category['id']) ?>" class="text-blue-600 hover:text-blue-800 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= base_url('admin/categories/delete/' . $category['id']) ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Tem certeza que deseja deletar esta categoria?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p class="text-center text-gray-500 py-8">Nenhuma categoria cadastrada.</p>
        <?php endif; ?>
    </div>
    
    <div class="bg-white border border-gray-300 p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Adicionar Categoria</h3>
        
        <?php if(session()->getFlashdata('errors')): ?>
        <div class="mb-4 px-4 py-3 bg-red-600 text-white border border-red-700 text-sm">
            <ul class="list-disc list-inside">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        
        <form action="<?= base_url('admin/categories/store') ?>" method="POST">
            <?= csrf_field() ?>
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nome da Categoria <span class="text-red-600">*</span></label>
                <input type="text" name="name" value="<?= old('name') ?>" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" placeholder="Ex: Suspense" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Descrição</label>
                <textarea name="description" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" rows="4" placeholder="Descrição opcional"><?= old('description') ?></textarea>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Status <span class="text-red-600">*</span></label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 bg-white focus:outline-none focus:border-blue-600" required>
                    <option value="active" <?= old('status') == 'active' ? 'selected' : '' ?>>Ativo</option>
                    <option value="inactive" <?= old('status') == 'inactive' ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>
            
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white hover:bg-blue-700">
                <i class="fas fa-plus mr-2"></i>Adicionar
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
