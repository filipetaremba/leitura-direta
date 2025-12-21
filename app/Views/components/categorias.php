<section class="py-12 bg-white overflow-hidden">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Título -->
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-gray-900">
                Explorar por Categoria
            </h2>
            <p class="text-sm text-gray-600 mt-1">
                Descubra livros do seu género favorito
            </p>
        </div>

        <!-- Container do Slider -->
        <div class="relative">
            <!-- Botão Anterior -->
            <button id="prevBtn" 
                    class="absolute left-0 top-1/2 -translate-y-1/2 z-10 
                           transition-all duration-200 hidden md:block">
                <i class="fa-solid fa-chevron-left text-gray-800 text-xl"></i>
            </button>

            <!-- Botão Próximo -->
            <button id="nextBtn" 
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-10 
                           transition-all duration-200 hidden md:block">
                <i class="fa-solid fa-chevron-right text-gray-800 text-xl"></i>
            </button>

            <!-- Slider -->
            <div class="overflow-hidden mx-12 md:mx-16">
                <div id="sliderTrack" class="flex transition-transform duration-500 ease-in-out gap-6 md:gap-8">
                    <?php 
                    $categorias = [
                        ['nome' => 'Romance', 'icone' => 'fa-solid fa-heart', 'slug' => 'romance'],
                        ['nome' => 'Ficção', 'icone' => 'fa-solid fa-book-open', 'slug' => 'ficcao'],
                        ['nome' => 'Suspense', 'icone' => 'fa-solid fa-user-secret', 'slug' => 'suspense'],
                        ['nome' => 'Fantasia', 'icone' => 'fa-solid fa-hat-wizard', 'slug' => 'fantasia'],
                        ['nome' => 'Biografia', 'icone' => 'fa-solid fa-user-pen', 'slug' => 'biografia'],
                        ['nome' => 'Desenvolvimento Pessoal', 'icone' => 'fa-solid fa-seedling', 'slug' => 'desenvolvimento-pessoal'],
                        ['nome' => 'Finanças', 'icone' => 'fa-solid fa-coins', 'slug' => 'financas'],
                        ['nome' => 'Negócios', 'icone' => 'fa-solid fa-briefcase', 'slug' => 'negocios'],
                    ];

                    // Duplicar categorias para efeito infinito
                    $categoriasInfinitas = array_merge($categorias, $categorias, $categorias);

                    foreach ($categoriasInfinitas as $index => $categoria):
                    ?>
                        <a href="<?= base_url('categoria/' . $categoria['slug']) ?>"
                           class="group flex flex-col items-center transition-transform duration-300 hover:scale-110 flex-shrink-0"
                           style="width: calc((100% - 4 * 2rem) / 5);">

                            <!-- Círculo -->
                            <div class="w-28 h-28 sm:w-32 sm:h-32 md:w-36 md:h-36 lg:w-40 lg:h-40
                                        rounded-full bg-white border-2 border-gray-300 
                                        flex items-center justify-center 
                                        shadow-md group-hover:shadow-xl transition-all duration-300">
                                
                                <i class="<?= $categoria['icone'] ?> text-black text-3xl sm:text-4xl md:text-5xl lg:text-6xl
                                           group-hover:text-blue-600 transition-colors"></i>
                            </div>

                            <!-- Nome -->
                            <p class="mt-3 text-sm sm:text-base md:text-lg font-semibold text-gray-900 
                                      group-hover:text-blue-600 transition-colors text-center px-2">
                                <?= esc($categoria['nome']) ?>
                            </p>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Indicadores (dots) -->
            <div class="flex justify-center mt-6 gap-2">
                <?php foreach ($categorias as $index => $cat): ?>
                    <button class="slider-dot w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" 
                            data-index="<?= $index ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Botão -->
        <div class="text-center mt-10">
            <a href="<?= base_url('categorias') ?>"
               class="inline-block border-2 border-black text-black 
                      hover:bg-black hover:text-white 
                      font-bold py-2 px-6 rounded-lg transition-all duration-200">
                Ver Todas as Categorias
            </a>
        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sliderTrack = document.getElementById('sliderTrack');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dots = document.querySelectorAll('.slider-dot');
    
    const totalCategories = <?= count($categorias) ?>;
    let currentIndex = totalCategories; // Começa no meio (primeira cópia)
    let isTransitioning = false;
    
    // Calcular largura do item (incluindo gap)
    function getItemWidth() {
        const containerWidth = sliderTrack.parentElement.offsetWidth;
        const gap = window.innerWidth >= 768 ? 32 : 24; // gap-8 ou gap-6
        return (containerWidth + gap) / 5; // 5 itens visíveis
    }
    
    // Atualizar posição do slider
    function updateSlider(withTransition = true) {
        const itemWidth = getItemWidth();
        const offset = currentIndex * itemWidth;
        
        if (withTransition) {
            sliderTrack.style.transition = 'transform 500ms ease-in-out';
        } else {
            sliderTrack.style.transition = 'none';
        }
        
        sliderTrack.style.transform = `translateX(-${offset}px)`;
        
        // Atualizar dots
        const dotIndex = currentIndex % totalCategories;
        dots.forEach((dot, i) => {
            if (i === dotIndex) {
                dot.classList.add('bg-blue-600', 'w-6');
                dot.classList.remove('bg-gray-300', 'w-2');
            } else {
                dot.classList.remove('bg-blue-600', 'w-6');
                dot.classList.add('bg-gray-300', 'w-2');
            }
        });
    }
    
    // Próximo slide
    function nextSlide() {
        if (isTransitioning) return;
        isTransitioning = true;
        
        currentIndex++;
        updateSlider(true);
        
        setTimeout(() => {
            if (currentIndex >= totalCategories * 2) {
                currentIndex = totalCategories;
                updateSlider(false);
            }
            isTransitioning = false;
        }, 500);
    }
    
    // Slide anterior
    function prevSlide() {
        if (isTransitioning) return;
        isTransitioning = true;
        
        currentIndex--;
        updateSlider(true);
        
        setTimeout(() => {
            if (currentIndex < totalCategories) {
                currentIndex = totalCategories * 2 - 1;
                updateSlider(false);
            }
            isTransitioning = false;
        }, 500);
    }
    
    // Event listeners
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    
    // Dots click
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            if (isTransitioning) return;
            currentIndex = totalCategories + index;
            updateSlider(true);
        });
    });
    
    // Auto-play (opcional)
    let autoplayInterval = setInterval(nextSlide, 3000);
    
    // Pausar autoplay no hover
    sliderTrack.addEventListener('mouseenter', () => {
        clearInterval(autoplayInterval);
    });
    
    sliderTrack.addEventListener('mouseleave', () => {
        autoplayInterval = setInterval(nextSlide, 3000);
    });
    
    // Posição inicial
    updateSlider(false);
    
    // Atualizar ao redimensionar
    window.addEventListener('resize', () => updateSlider(false));
});
</script>