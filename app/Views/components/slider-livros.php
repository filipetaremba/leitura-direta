<?php
/**
 * Componente Slider de Livros Reutilizável
 * 
 * Parâmetros esperados:
 * @param string $titulo - Título da seção
 * @param string $descricao - Descrição da seção
 * @param array $livros - Array de livros
 * @param string $sliderClass - Classe única para identificar o slider
 * @param string $linkMais - URL do botão "Ver Mais"
 */

// Usar variáveis já definidas no componente que incluiu isto
// Se não existirem, usar valores padrão
if (!isset($titulo)) $titulo = 'Livros';
if (!isset($descricao)) $descricao = 'Confira nossa seleção';
if (!isset($livros)) $livros = [];
if (!isset($sliderClass)) $sliderClass = 'slider-livros-generico';
if (!isset($linkMais)) $linkMais = '#';

$totalLivros = count($livros);

// Se não houver livros, mostrar mensagem
if ($totalLivros === 0) {
    echo '<div style="padding: 40px; text-align: center; color: #999;">';
    echo '<p>Nenhum livro disponível neste momento.</p>';
    echo '</div>';
    return;
}

// Triplicar livros para efeito infinito
$livrosInfinitos = array_merge($livros, $livros, $livros);
?>

<section class="py-10 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                <?= esc($titulo) ?>
            </h2>
            <p class="text-sm text-gray-600 mt-1">
                <?= esc($descricao) ?>
            </p>
        </div>

        <!-- Container do Slider -->
        <div class="relative book-slider-container" data-slider="<?= esc($sliderClass) ?>">
            
            <!-- Botão Anterior -->
            <button class="book-slider-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 
                           bg-white rounded-full p-3 shadow-lg hover:bg-gray-100 
                           transition-all duration-200 hidden md:block"
                    type="button"
                    aria-label="Slide anterior">
                <i class="fa-solid fa-chevron-left text-gray-800 text-xl"></i>
            </button>

            <!-- Botão Próximo -->
            <button class="book-slider-next absolute right-0 top-1/2 -translate-y-1/2 z-10 
                           bg-white rounded-full p-3 shadow-lg hover:bg-gray-100 
                           transition-all duration-200 hidden md:block"
                    type="button"
                    aria-label="Próximo slide">
                <i class="fa-solid fa-chevron-right text-gray-800 text-xl"></i>
            </button>

            <!-- Wrapper do Slider -->
            <div class="book-slider-wrapper overflow-hidden mx-12 md:mx-16">
                
                <!-- Track (container dos itens) -->
                <div class="book-slider-track flex transition-transform duration-500 ease-in-out" 
                     data-total="<?= $totalLivros ?>">
                    
                    <?php foreach ($livrosInfinitos as $livro): ?>
                        <div class="book-slider-item flex-shrink-0" 
                             style="width: calc(100% / 5); padding: 0.5rem;">
                            
                            <a href="<?= base_url('livro/' . $livro['id']) ?>" 
                               class="block h-full">
                                
                                <div class="bg-white shadow-sm flex flex-col items-center text-center overflow-hidden h-full hover:shadow-lg transition">
                    
                                    <!-- Imagem -->
                                    <img src="<?= $livro['capa'] ?>" 
                                        alt="Capa de <?= esc($livro['titulo']) ?>" 
                                        class="w-full h-[200px] sm:h-[250px] object-cover"
                                        loading="lazy">

                                    <!-- Conteúdo -->
                                    <div class="px-2 sm:px-3 py-2 sm:py-3 w-full flex flex-col flex-grow justify-between">
                                        
                                        <!-- Título -->
                                        <h3 class="text-xs sm:text-sm font-semibold text-gray-800 line-clamp-2 mb-1">
                                            <?= esc($livro['titulo']) ?>
                                        </h3>

                                        <!-- Autor -->
                                        <p class="text-gray-500 italic text-xs line-clamp-1 mb-2">
                                            <?= esc($livro['autor']) ?>
                                        </p>

                                        <!-- Avaliação -->
                                        <div class="flex justify-center text-yellow-400 text-xs sm:text-sm mb-2">
                                            <?php 
                                            $avaliacao = round($livro['avaliacao']);
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $avaliacao) {
                                                    echo '★';
                                                } else {
                                                    echo '<span class="text-gray-300">★</span>';
                                                }
                                            }
                                            ?>
                                        </div>

                                        <!-- Preço -->
                                        <p class="text-blue-600 font-bold text-xs sm:text-sm mb-2">
                                            MZN <?= number_format($livro['preco'], 2, ',', '.') ?>
                                        </p>

                                        <!-- Botão Obter -->
                                        <span class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-2 text-xs text-center transition-colors">
                                            Obter
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Indicadores (dots) -->
            <div class="flex justify-center mt-6 gap-2 book-slider-dots">
                <?php foreach ($livros as $index => $livro): ?>
                    <button class="book-slider-dot w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" 
                            type="button"
                            data-index="<?= $index ?>"
                            aria-label="Ir para slide <?= $index + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Botão Ver Mais -->
        <div class="text-center mt-8">
            <a href="<?= esc($linkMais) ?>" 
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 transition-colors duration-200 shadow-md hover:shadow-lg">
                Ver Mais
            </a>
        </div>
    </div>
</section>