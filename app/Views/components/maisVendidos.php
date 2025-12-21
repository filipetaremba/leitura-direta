<section class="py-10 bg-gray-50">
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
            <button id="prevBtnMaisVendidos"
                class="absolute left-0 top-1/2 -translate-y-1/2 z-10 
                    p-3 transition-all duration-200 hidden md:block">
                <i class="fa-solid fa-chevron-left text-gray-800 text-xl"></i>
            </button>

            <button id="nextBtnMaisVendidos"
                class="absolute right-0 top-1/2 -translate-y-1/2 z-10 
                    p-3 transition-all duration-200 hidden md:block">
                <i class="fa-solid fa-chevron-right text-gray-800 text-xl"></i>
            </button>


            <!-- Slider -->
            <div class="overflow-hidden mx-12 md:mx-16 slider-container-mobile">
                <div id="sliderTrackMaisVendidos" class="flex transition-transform duration-500 ease-in-out draggable">
                    <?php 
                    // Duplicar livros para efeito infinito (3 cópias)
                    $livrosInfinitos = array_merge($maisVendidos, $maisVendidos, $maisVendidos);
                    
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
                <?php foreach ($maisVendidos as $index => $livro): ?>
                    <button class="slider-dot-maisVendidos w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" 
                            data-index="<?= $index ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="<?= base_url('livros/mais-vendidos') ?>" 
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 transition-colors duration-200 shadow-md hover:shadow-lg">
                Ver Mais
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sliderTrack = document.getElementById('sliderTrackMaisVendidos');
    const prevBtn = document.getElementById('prevBtnMaisVendidos');
    const nextBtn = document.getElementById('nextBtnMaisVendidos');
    const dots = document.querySelectorAll('.slider-dot-maisVendidos');
    
    const totalLivros = <?= count($maisVendidos) ?>;
    let currentIndex = totalLivros; // Começa no meio (primeira cópia)
    let isTransitioning = false;
    
    // Variáveis para o arrasto (mobile)
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;
    let startTime = 0;
    
    // Calcular quantos itens visíveis baseado na largura da tela
    function getVisibleItems() {
        const width = window.innerWidth;
        if (width <= 768) return 2;      // Mobile: 2 livros
        if (width <= 1024) return 3;     // Tablet: 3 livros
        return 5;                        // Desktop: 5 livros
    }
    
    // Calcular largura do item
    function getItemWidth() {
        const visibleItems = getVisibleItems();
        return sliderTrack.parentElement.offsetWidth / visibleItems;
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
        const dotIndex = currentIndex % totalLivros;
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
            if (currentIndex >= totalLivros * 2) {
                currentIndex = totalLivros;
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
            if (currentIndex < totalLivros) {
                currentIndex = totalLivros * 2 - 1;
                updateSlider(false);
            }
            isTransitioning = false;
        }, 500);
    }
    
    // Event listeners para botões
    if (prevBtn) prevBtn.addEventListener('click', prevSlide);
    if (nextBtn) nextBtn.addEventListener('click', nextSlide);
    
    // Dots click
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            if (isTransitioning) return;
            currentIndex = totalLivros + index;
            updateSlider(true);
        });
    });
    
    // ===== FUNCIONALIDADE DE ARRASTAR (MOBILE) =====
    
    function touchStart(index) {
        return function(event) {
            if (isTransitioning) return;
            
            startTime = Date.now();
            isDragging = true;
            startPos = event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
            animationID = requestAnimationFrame(animation);
            sliderTrack.style.cursor = 'grabbing';
        }
    }
    
    function touchMove(event) {
        if (isDragging) {
            const currentPosition = event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
            currentTranslate = prevTranslate + currentPosition - startPos;
        }
    }
    
    function touchEnd() {
        if (!isDragging) return;
        
        isDragging = false;
        cancelAnimationFrame(animationID);
        sliderTrack.style.cursor = 'grab';
        
        const movedBy = currentTranslate - prevTranslate;
        const timeTaken = Date.now() - startTime;
        const velocity = Math.abs(movedBy) / timeTaken;
        
        // Se movimento rápido (swipe) ou moveu mais de 50px
        if (velocity > 0.5 || Math.abs(movedBy) > 50) {
            if (movedBy < -50) {
                nextSlide();
            } else if (movedBy > 50) {
                prevSlide();
            } else {
                updateSlider(true);
            }
        } else {
            updateSlider(true);
        }
        
        currentTranslate = 0;
        prevTranslate = 0;
    }
    
    function animation() {
        if (isDragging) {
            const itemWidth = getItemWidth();
            const baseTranslate = -currentIndex * itemWidth;
            sliderTrack.style.transition = 'none';
            sliderTrack.style.transform = `translateX(${baseTranslate + currentTranslate}px)`;
            requestAnimationFrame(animation);
        }
    }
    
    // Adicionar eventos de toque/mouse
    sliderTrack.addEventListener('touchstart', touchStart(0));
    sliderTrack.addEventListener('touchmove', touchMove);
    sliderTrack.addEventListener('touchend', touchEnd);
    
    sliderTrack.addEventListener('mousedown', touchStart(0));
    sliderTrack.addEventListener('mousemove', touchMove);
    sliderTrack.addEventListener('mouseup', touchEnd);
    sliderTrack.addEventListener('mouseleave', touchEnd);
    
    // Prevenir comportamento padrão de arrastar imagens/links
    sliderTrack.addEventListener('dragstart', (e) => e.preventDefault());
    
    // Posição inicial
    updateSlider(false);
    
    // Atualizar ao redimensionar
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            updateSlider(false);
        }, 100);
    });
});
</script>