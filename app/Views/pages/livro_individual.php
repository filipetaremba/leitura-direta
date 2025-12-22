<?= $this->extend('layouts/layout_base') ?>

<?= $this->section('content') ?>

<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-200">
    <div class="container mx-auto px-4 py-3 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm text-gray-600">
            <a href="<?= base_url() ?>" class="hover:text-blue-600 transition-colors">HOME</a>
            <i class="fa-solid fa-chevron-right text-xs"></i>
            <a href="<?= base_url('autoajuda') ?>" class="hover:text-blue-600 transition-colors">AUTOAJUDA</a>
            <i class="fa-solid fa-chevron-right text-xs"></i>
            <span class="text-gray-900 font-medium"><?= esc($livro['title']) ?></span>
        </nav>
    </div>
</div>

<!-- Conteúdo Principal -->
<section class="py-12 bg-white">
    <div class="container mx-auto pr-4 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            
            <!-- Coluna Esquerda - Imagem -->
            <div class="flex justify-center lg:justify-start pl-0">
                <div class="relative group">
                    <img src="<?= esc($livro['cover_image']) ?>" 
                        alt="<?= esc($livro['title']) ?>"
                         class="w-full max-w-md rounded-lg shadow-2xl transition-transform duration-300 group-hover:scale-105">
                    
                    <!-- Badge de Desconto (se houver) -->
                    <?php if (isset($livro['desconto']) && $livro['desconto'] > 0): ?>
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        -<?= $livro['desconto'] ?>%
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Coluna Direita - Informações -->
            <div class="flex flex-col justify-center">
                
                <!-- Título -->
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    <?= esc($livro['title']) ?>
                </h1>

                <!-- Autor -->
                <div class="mb-6">
                    <a href="<?= base_url('autor/' . url_title($livro['author'])) ?>" 
                       class="inline-flex items-center gap-2 bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors">
                        <span class="text-sm font-semibold"><?= esc($livro['author']) ?></span>
                    </a>
                </div>

                <!-- Avaliação -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex gap-1">
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-regular fa-star text-yellow-400"></i>
                        <i class="fa-regular fa-star text-yellow-400"></i>
                    </div>
                    <span class="text-sm text-gray-600 font-medium">3 Avaliações: 150</span>
                </div>

                <!-- Preço -->
                <div class="mb-8">
                    <div class="flex items-baseline gap-3">
                        <?php if (isset($livro['original_price'])): ?>
                        <span class="text-2xl text-gray-400 line-through">
                            <?= number_format($livro['original_price'], 2, ',', '.') ?> MT
                        </span>
                        <?php endif; ?>
                        <span class="text-4xl font-bold text-gray-900">
                            <?= number_format($livro['price'], 2, ',', '.') ?> MT
                        </span>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="flex flex-col sm:flex-row gap-4 mb-8">
                    <button class="flex-1 bg-blue-600 text-white font-bold py-4 px-6 rounded-lg hover:bg-blue-700 transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-download"></i>
                        <span>BAIXAR OU LER ONLINE</span>
                    </button>
                    
                    <button class="border-2 border-blue-600 text-blue-600 font-bold py-4 px-6 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                    
                    <button class="border-2 border-blue-600 text-blue-600 font-bold py-4 px-6 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-share-nodes"></i>
                    </button>
                </div>

                <!-- Informações Adicionais -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-medium">Formato:</span>
                        <span class="text-gray-900 font-semibold">EPUB, PDF, MOBI</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-medium">Páginas:</span>
                        <span class="text-gray-900 font-semibold">224</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-medium">Idioma:</span>
                        <span class="text-gray-900 font-semibold">Português</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-medium">ISBN:</span>
                        <span class="text-gray-900 font-semibold">978-1234567890</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Sinopse -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">SINOPSE</h2>
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed">
                    <?= esc($livro['description']) ?>
                </p>
            </div>
        </div>

        <!-- Livros Relacionados -->
        <div>
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">LIVROS RELACIONADOS</h2>
                <a href="<?= base_url('categoria/desenvolvimento-pessoal') ?>" 
                   class="text-blue-600 hover:text-blue-700 font-semibold flex items-center gap-2">
                    Ver mais
                    <i class="fa-solid fa-arrow-right text-sm"></i>
                </a>
            </div>

            <!-- Grid de Livros -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                
                <?php 
                // Exemplo de livros relacionados (depois vem do banco)
                foreach ($livrosRelacionados as $livroRel): 
                ?>
                
                <a href="<?= base_url('livro/' . $livroRel['id']) ?>" 
                   class="group flex flex-col bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    
                    <!-- Imagem -->
                    <div class="relative overflow-hidden aspect-[2/3]">
                            <img src="<?= esc($livroRel['cover_image']) ?>" 
                                alt="<?= esc($livroRel['title']) ?>"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        
                        <!-- Overlay no hover -->
                        <div class="absolute inset-0 bg-blue-600 bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                            <div class="transform scale-0 group-hover:scale-100 transition-transform duration-300">
                                <div class="bg-white text-blue-600 px-4 py-2 rounded-lg font-bold text-sm">
                                    VER DETALHES
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informações -->
                    <div class="p-4 flex-1 flex flex-col">
                        <!-- Avaliação -->
                        <div class="flex gap-1 mb-2">
                            <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                            <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                            <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                            <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                            <i class="fa-regular fa-star text-yellow-400 text-xs"></i>
                        </div>

                        <!-- Título -->
                        <h3 class="font-bold text-gray-900 text-sm mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                            <?= esc($livroRel['title']) ?>
                        </h3>

                        <!-- Autor -->
                        <p class="text-xs text-gray-600 mb-3">
                            <?= esc($livroRel['author']) ?>
                        </p>

                        <!-- Botão -->
                        <button class="mt-auto w-full bg-blue-600 text-white text-xs font-bold py-2 px-3 rounded hover:bg-blue-700 transition-colors">
                            BAIXAR OU LER ONLINE
                        </button>
                    </div>
                </a>

                <?php endforeach; ?>
                
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>