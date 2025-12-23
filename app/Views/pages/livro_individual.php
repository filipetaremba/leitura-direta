<?= $this->extend('layouts/layout_base') ?>

<?= $this->section('content') ?>

<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-200">
    <div class="container mx-auto px-3 sm:px-4 py-2 sm:py-3 max-w-7xl">
        <nav class="flex items-center gap-1 sm:gap-2 text-xs sm:text-sm text-gray-600 overflow-x-auto">
            <a href="<?= base_url() ?>" class="hover:text-blue-600 transition-colors whitespace-nowrap">HOME</a>
            <i class="fa-solid fa-chevron-right text-xs flex-shrink-0"></i>
            <a href="<?= base_url('autoajuda') ?>" class="hover:text-blue-600 transition-colors whitespace-nowrap">AUTOAJUDA</a>
            <i class="fa-solid fa-chevron-right text-xs flex-shrink-0"></i>
            <span class="text-gray-900 font-medium truncate"><?= esc($livro['title']) ?></span>
        </nav>
    </div>
</div>

<!-- Conteúdo Principal -->
<section class="py-6 sm:py-12 bg-white">
    <div class="container mx-auto px-3 sm:px-4 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 mb-12 sm:mb-16">
            
            <!-- Coluna Esquerda - Imagem -->
            <div class="flex justify-center">
                <div class="relative group w-full max-w-xs sm:max-w-sm lg:max-w-md">
                    <img src="<?= esc($livro['cover_image']) ?>" 
                        alt="<?= esc($livro['title']) ?>"
                         class="w-full rounded-lg shadow-lg sm:shadow-2xl transition-transform duration-300 group-hover:scale-105">
                    
                    <!-- Badge de Desconto (se houver) -->
                    <?php if (isset($livro['desconto']) && $livro['desconto'] > 0): ?>
                    <div class="absolute top-2 sm:top-4 right-2 sm:right-4 bg-red-500 text-white px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-bold">
                        -<?= $livro['desconto'] ?>%
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Coluna Direita - Informações -->
            <div class="flex flex-col justify-center">
                
                <!-- Título -->
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-3 sm:mb-4">
                    <?= esc($livro['title']) ?>
                </h1>

                <!-- Autor -->
                <div class="mb-4 sm:mb-6">
                    <a href="<?= base_url('autor/' . url_title($livro['author'])) ?>" 
                       class="inline-flex items-center gap-2 bg-gray-900 text-white px-3 sm:px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors text-sm sm:text-base">
                        <span class="font-semibold"><?= esc($livro['author']) ?></span>
                    </a>
                </div>

                <!-- Avaliação -->
                <div class="flex items-center gap-2 sm:gap-3 mb-4 sm:mb-6">
                    <div class="flex gap-0.5 sm:gap-1">
                        <i class="fa-solid fa-star text-yellow-400 text-xs sm:text-sm"></i>
                        <i class="fa-solid fa-star text-yellow-400 text-xs sm:text-sm"></i>
                        <i class="fa-solid fa-star text-yellow-400 text-xs sm:text-sm"></i>
                        <i class="fa-regular fa-star text-yellow-400 text-xs sm:text-sm"></i>
                        <i class="fa-regular fa-star text-yellow-400 text-xs sm:text-sm"></i>
                    </div>
                    <span class="text-xs sm:text-sm text-gray-600 font-medium">3 Avaliações: 150</span>
                </div>

                <!-- Preço -->
                <div class="mb-6 sm:mb-8">
                    <div class="flex items-baseline gap-2 sm:gap-3 flex-wrap">
                        <?php if (isset($livro['original_price'])): ?>
                        <span class="text-lg sm:text-2xl text-gray-400 line-through">
                            <?= number_format($livro['original_price'], 2, ',', '.') ?> MT
                        </span>
                        <?php endif; ?>
                        <span class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900">
                            <?= number_format($livro['price'], 2, ',', '.') ?> MT
                        </span>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 mb-6 sm:mb-8">
                    <!-- Botão Comprar via WhatsApp -->
                    <?php
                        $waNumber = '258853592701';
                        $waMsg = "Olá, quero adquirir o livro: {$livro['title']}\nAutor: {$livro['author']}\nPreço: MT ".number_format($livro['price'], 2, ',', '.');
                        $waLink = 'https://wa.me/' . $waNumber . '?text=' . urlencode($waMsg);
                    ?>
                    <a href="<?= $waLink ?>" target="_blank" rel="noopener" class="flex-1 min-h-[44px] sm:min-h-12 bg-green-500 text-white font-bold py-3 px-4 sm:px-6 rounded-lg hover:bg-green-600 transition-all duration-200 flex items-center justify-center gap-2 text-sm sm:text-base">
                        <i class="fa-brands fa-whatsapp text-lg sm:text-xl"></i>
                        <span class="hidden sm:inline">COMPRAR VIA WHATSAPP</span>
                        <span class="sm:hidden">WHATSAPP</span>
                    </a>
                    <button class="min-h-[44px] sm:min-h-12 border-2 border-blue-600 text-blue-600 font-bold py-3 px-3 sm:px-6 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-heart"></i>
                        <span class="hidden sm:inline">SALVAR</span>
                    </button>
                    <button class="min-h-[44px] sm:min-h-12 border-2 border-blue-600 text-blue-600 font-bold py-3 px-3 sm:px-6 rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-share-nodes"></i>
                        <span class="hidden sm:inline">COMPARTILHAR</span>
                    </button>
                </div>

                <!-- Informações Adicionais -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 sm:p-6 space-y-2 sm:space-y-3 text-sm sm:text-base">
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
                        <span class="text-gray-900 font-semibold text-xs sm:text-base">978-1234567890</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Sinopse -->
        <div class="mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4 sm:mb-6">SINOPSE</h2>
            <div class="prose prose-sm sm:prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                    <?= esc($livro['description']) ?>
                </p>
            </div>
        </div>

        <!-- Livros Relacionados -->
        <div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-0 mb-6 sm:mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">LIVROS RELACIONADOS</h2>
                <a href="<?= base_url('categoria/desenvolvimento-pessoal') ?>" 
                   class="text-blue-600 hover:text-blue-700 font-semibold flex items-center gap-1 sm:gap-2 text-sm sm:text-base whitespace-nowrap">
                    Ver mais
                    <i class="fa-solid fa-arrow-right text-xs sm:text-sm"></i>
                </a>
            </div>

            <!-- Grid de Livros -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                
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
                                <div class="bg-white text-blue-600 px-3 sm:px-4 py-2 rounded-lg font-bold text-xs sm:text-sm whitespace-nowrap">
                                    VER DETALHES
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informações -->
                    <div class="p-3 sm:p-4 flex-1 flex flex-col">
                        <!-- Avaliação -->
                        <div class="flex gap-0.5 mb-2">
                            <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                            <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                            <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                            <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                            <i class="fa-regular fa-star text-yellow-400 text-xs"></i>
                        </div>

                        <!-- Título -->
                        <h3 class="font-bold text-gray-900 text-xs sm:text-sm mb-1 sm:mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                            <?= esc($livroRel['title']) ?>
                        </h3>

                        <!-- Autor -->
                        <p class="text-xs text-gray-600 mb-2 sm:mb-3 line-clamp-1">
                            <?= esc($livroRel['author']) ?>
                        </p>

                        <!-- Botão -->
                        <button class="mt-auto w-full bg-blue-600 text-white text-xs font-bold py-2 px-3 rounded hover:bg-blue-700 transition-colors min-h-[36px] sm:min-h-10">
                            BAIXAR OU LER
                        </button>
                    </div>
                </a>

                <?php endforeach; ?>
                
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>