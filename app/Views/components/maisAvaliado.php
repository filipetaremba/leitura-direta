<section class="py-10 bg-whitepy-8">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                Mais Avaliados
            </h2>
            <p class="text-sm text-gray-600 mt-1">
                Os livros preferidos pelos leitores
            </p>
        </div>

        <div class="flex justify-center">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                <?php foreach($maisAvaliados as $livro): ?>
                    <a href="<?= base_url('livro/' . $livro['id']) ?>" class="mx-auto block w-full">
                        <div class="bg-white shadow-sm flex flex-col items-center text-center overflow-hidden w-full max-w-[210px] h-[330px] sm:h-[400px] hover:shadow-lg transition mx-auto">
            
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

        <div class="text-center mt-8">
            <a href="<?= base_url('livros/mais-avaliados') ?>" 
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8  transition-colors duration-200 shadow-md hover:shadow-lg">
                Ver Mais
            </a>
        </div>
    </div>
</section>