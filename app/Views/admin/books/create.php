<?= $this->extend('admin/layout/base') ?>
<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/books') ?>" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i>Voltar para Livros
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

<div class="bg-white border border-gray-300 p-6">
    <h3 class="text-2xl font-bold text-gray-900 mb-6">Adicionar Novo Livro</h3>
    
    <form action="<?= base_url('admin/books/store') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 mb-2">Título <span class="text-red-600">*</span></label>
                <input type="text" name="title" value="<?= old('title') ?>" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" required>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Autor <span class="text-red-600">*</span></label>
                <input type="text" name="author" value="<?= old('author') ?>" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" required>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Categoria <span class="text-red-600">*</span></label>
                <select name="category_id" class="w-full px-4 py-2 border border-gray-300 bg-white focus:outline-none focus:border-blue-600" required>
                    <option value="">Selecione uma categoria</option>
                    <?php foreach($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= old('category_id') == $category['id'] ? 'selected' : '' ?>>
                        <?= esc($category['name']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Preço <span class="text-red-600">*</span></label>
                <input type="number" step="0.01" name="price" value="<?= old('price') ?>" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" required>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Status <span class="text-red-600">*</span></label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 bg-white focus:outline-none focus:border-blue-600" required>
                    <option value="active" <?= old('status') == 'active' ? 'selected' : '' ?>>Ativo</option>
                    <option value="inactive" <?= old('status') == 'inactive' ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>
            
            <div class="col-span-2">
                <label class="block text-gray-700 mb-2">Imagem da Capa <span class="text-red-600">*</span></label>
                
                <div class="flex gap-4 mb-3">
                    <label class="flex items-center">
                        <input type="radio" name="image_type" value="upload" class="mr-2" checked onchange="toggleImageInput()">
                        <span class="text-gray-700">Upload de Arquivo</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="image_type" value="url" class="mr-2" onchange="toggleImageInput()">
                        <span class="text-gray-700">URL da Imagem</span>
                    </label>
                </div>
                
                <div id="upload-input">
                    <input type="file" name="cover_image" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" accept="image/*">
                    <p class="text-sm text-gray-500 mt-1">JPG, PNG ou WEBP (máx. 2MB)</p>
                </div>
                
                <div id="url-input" style="display: none;">
                    <input type="text" name="cover_image_url" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" placeholder="https://exemplo.com/imagem.jpg">
                    <p class="text-sm text-gray-500 mt-1">Cole a URL completa da imagem</p>
                </div>
            </div>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Descrição <span class="text-red-600">*</span></label>
            <textarea name="description" rows="5" class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-blue-600" required><?= old('description') ?></textarea>
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i>Salvar Livro
            </button>
            <a href="<?= base_url('admin/books') ?>" class="px-6 py-2 bg-gray-300 text-gray-700 hover:bg-gray-400">
                <i class="fas fa-times mr-2"></i>Cancelar
            </a>
        </div>
    </form>
</div>

<script>
function toggleImageInput() {
    const imageType = document.querySelector('input[name="image_type"]:checked').value;
    const uploadInput = document.getElementById('upload-input');
    const urlInput = document.getElementById('url-input');
    const uploadFile = document.querySelector('input[name="cover_image"]');
    const urlField = document.querySelector('input[name="cover_image_url"]');
    
    if (imageType === 'upload') {
        uploadInput.style.display = 'block';
        urlInput.style.display = 'none';
        uploadFile.required = true;
        urlField.required = false;
        urlField.value = '';
    } else {
        uploadInput.style.display = 'none';
        urlInput.style.display = 'block';
        uploadFile.required = false;
        urlField.required = true;
    }
}
</script>

<?= $this->endSection() ?>