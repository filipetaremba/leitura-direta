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

<div class="flex items-center justify-between mb-6">
    <div class="flex items-center gap-4">
        <input type="text" placeholder="Buscar livros..." class="px-4 py-2 border border-gray-300 w-80 focus:outline-none focus:border-blue-600">
        <select class="px-4 py-2 border border-gray-300 bg-white focus:outline-none focus:border-blue-600">
            <option>Todas as Categorias</option>
            <?php foreach($categories ?? [] as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= esc($cat['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <a href="<?= base_url('admin/books/create') ?>" class="px-6 py-2 bg-blue-600 text-white hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i>Adicionar Livro
    </a>
</div>

<div class="bg-white border border-gray-300">
    <?php if(!empty($books)): ?>
    <table class="w-full">
        <thead class="bg-gray-200 border-b border-gray-300">
            <tr>
                <th class="px-4 py-3 text-left text-gray-700">ID</th>
                <th class="px-4 py-3 text-left text-gray-700">Título</th>
                <th class="px-4 py-3 text-left text-gray-700">Autor</th>
                <th class="px-4 py-3 text-left text-gray-700">Categoria</th>
                <th class="px-4 py-3 text-left text-gray-700">Preço</th>
                <th class="px-4 py-3 text-left text-gray-700">Status</th>
                <th class="px-4 py-3 text-left text-gray-700">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $book): ?>
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-600"><?= str_pad($book['id'], 3, '0', STR_PAD_LEFT) ?></td>
                <td class="px-4 py-3 text-gray-900 font-medium"><?= esc($book['title']) ?></td>
                <td class="px-4 py-3 text-gray-600"><?= esc($book['author']) ?></td>
                <td class="px-4 py-3 text-gray-600"><?= esc($book['category_name'] ?? 'N/A') ?></td>
                <td class="px-4 py-3 text-gray-600">R$ <?= number_format($book['price'], 2, ',', '.') ?></td>
                <td class="px-4 py-3">
                    <span class="px-3 py-1 <?= $book['status'] == 'active' ? 'bg-blue-600' : 'bg-gray-400' ?> text-white text-sm">
                        <?= $book['status'] == 'active' ? 'Ativo' : 'Inativo' ?>
                    </span>
                </td>
                <td class="px-4 py-3">
                    <a href="<?= base_url('admin/books/edit/' . $book['id']) ?>" class="text-blue-600 hover:text-blue-800 mr-3">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('admin/books/toggleStatus/' . $book['id']) ?>" class="text-gray-600 hover:text-gray-800 mr-3">
                        <i class="fas fa-power-off"></i>
                    </a>
                    <a href="<?= base_url('admin/books/delete/' . $book['id']) ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Tem certeza que deseja deletar este livro?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="p-8 text-center text-gray-500">
        <i class="fas fa-book text-4xl mb-4"></i>
        <p>Nenhum livro cadastrado.</p>
        <a href="<?= base_url('admin/books/create') ?>" class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white hover:bg-blue-700">
            Adicionar Primeiro Livro
        </a>
    </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>