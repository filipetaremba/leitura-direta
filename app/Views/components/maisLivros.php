

<section class="py-10 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                Mais Vendidos
            </h2>
            <p class="text-sm text-gray-600 mt-1">
                Os livros preferidos pelos leitores
            </p>
        </div>

        <!-- Container do Slider -->
        <div class="relative">
            <!-- Botão Anterior -->
            <button id="prevBtnLivros" 
                    class="absolute left-0 top-1/2 -translate-y-1/2 z-10 
                           bg-white rounded-full p-3 shadow-lg hover:bg-gray-100 
                           transition-all duration-200 hidden md:block">
                <i class="fa-solid fa-chevron-left text-gray-800 text-xl"></i>
            </button>

            <!-- Botão Próximo -->
            <button id="nextBtnLivros" 
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-10 
                           bg-white rounded-full p-3 shadow-lg hover:bg-gray-100 
                           transition-all duration-200 hidden md:block">
                <i class="fa-solid fa-chevron-right text-gray-800 text-xl"></i>
            </button>

            <!-- Slider -->
            <div class="overflow-hidden mx-12 md:mx-16 slider-container-mobile">
                <div id="sliderTrackLivros" class="flex transition-transform duration-500 ease-in-out draggable">
                    <?php 
                    // Duplicar livros para efeito infinito (3 cópias)
                    $livrosInfinitos = array_merge($maisAvaliados, $maisAvaliados, $maisAvaliados);
                    
                    foreach ($livrosInfinitos as $index => $livro):
                    ?>
                        <a href="<?= base_url('livro/' . $livro['id']) ?>" 
                           class="book-slider-item block flex-shrink-0 px-2">
                            <div class="bg-white shadow-sm flex flex-col items-center text-center overflow-hidden w-full h-[330px] sm:h-[400px] hover:shadow-lg transition">
                
                                <img src="<?= $livro['capa'] ?>" 
                                    alt="Capa de <?= esc($livro['titulo']) ?>" 
                                    class="w-full h-[200px] sm:h-[250px] object-cover">

                                <div class="px-2 sm:px-3 py-2 sm:py-3 w-full flex flex-col flex-grow">
                                    <h2 class="text-xs sm:text-sm font-semibold text-gray-800 line-clamp-2">
                                        <?= esc($livro['titulo']) ?>
                                    </h2>

                                    <p class="text-gray-500 italic text-xs mt-1 line-clamp-1">
                                        <?= esc($livro['autor']) ?>
                                    </p>

                                    <div class="flex justify-center mt-2 text-yellow-400 text-xs sm:text-sm">
                                        <?php 
                                        $avaliacao = round($livro['avaliacao']);
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $avaliacao ? '★' : '<span class="text-gray-300">★</span>';
                                        }
                                        ?>
                                    </div>

                                    <p class="text-blue-600 font-bold text-xs sm:text-sm mt-2">
                                        MZN <?= number_format($livro['preco'], 2, ',', '.') ?>
                                    </p>

                                    <span class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-2 uppercase tracking-wider transition-colors text-xs mt-2 text-center">
                                        Obter
                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Indicadores (dots) -->
            <div class="flex justify-center mt-6 gap-2">
                <?php foreach ($maisAvaliados as $index => $livro): ?>
                    <button class="slider-dot-livros w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" 
                            data-index="<?= $index ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="<?= base_url('livros/mais-avaliados') ?>" 
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 transition-colors duration-200 shadow-md hover:shadow-lg">
                Ver Mais
            </a>
        </div>
    </div>
</section>
