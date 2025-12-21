<!-- Dashboard -->
<?= $this->extend('admin/layout/base') ?>
<?= $this->section('content') ?>

<div class="grid grid-cols-4 gap-6 mb-6">
    <div class="bg-white p-6 border border-gray-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total de Livros</p>
                <p class="text-3xl font-bold text-gray-900"><?= $total_books ?></p>
            </div>
            <i class="fas fa-book text-4xl text-blue-600"></i>
        </div>
    </div>
    
    <div class="bg-white p-6 border border-gray-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Categorias</p>
                <p class="text-3xl font-bold text-gray-900"><?= $total_categories ?></p>
            </div>
            <i class="fas fa-tags text-4xl text-gray-600"></i>
        </div>
    </div>
    
    <div class="bg-white p-6 border border-gray-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Usuários</p>
                <p class="text-3xl font-bold text-gray-900"><?= $total_users ?></p>
            </div>
            <i class="fas fa-users text-4xl text-gray-700"></i>
        </div>
    </div>
</div>

<div class="bg-white border border-gray-300 p-6">
    <h3 class="text-xl font-bold text-gray-900 mb-4">Últimos Livros Adicionados</h3>
    <table class="w-full">
        <thead class="bg-gray-200 border-b border-gray-300">
            <tr>
                <th class="px-4 py-3 text-left text-gray-700">Título</th>
                <th class="px-4 py-3 text-left text-gray-700">Autor</th>
                <th class="px-4 py-3 text-left text-gray-700">Data</th>
                <th class="px-4 py-3 text-left text-gray-700">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($recent_books as $book): ?>
            <tr class="border-b border-gray-200">
                <td class="px-4 py-3 text-gray-900"><?= esc($book['title']) ?></td>
                <td class="px-4 py-3 text-gray-600"><?= esc($book['author']) ?></td>
                <td class="px-4 py-3 text-gray-600"><?= date('d/m/Y', strtotime($book['created_at'])) ?></td>
                <td class="px-4 py-3">
                    <span class="px-3 py-1 <?= $book['status'] == 'active' ? 'bg-blue-600' : 'bg-gray-400' ?> text-white text-sm">
                        <?= $book['status'] == 'active' ? 'Ativo' : 'Inativo' ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>