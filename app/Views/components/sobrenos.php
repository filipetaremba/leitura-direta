<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <div class="grid md:grid-cols-2 gap-8 items-center">
            
            <!-- Coluna Esquerda - Conteúdo -->
            <div class="text-gray-900">
                <span class="text-gray-600 font-semibold text-sm uppercase tracking-wider">
                    Sobre Nós
                </span>
                
                <h2 class="text-3xl md:text-4xl font-bold mt-3 mb-4">
                    Sua Livraria Digital de Confiança
                </h2>

                <p class="text-gray-700 text-base leading-relaxed mb-4">
                    Somos apaixonados por livros e acreditamos no poder da leitura para transformar vidas. 
                    Nossa missão é tornar o acesso ao conhecimento mais fácil e acessível para todos.
                </p>

                <p class="text-gray-700 text-base leading-relaxed mb-6">
                    Com um catálogo diversificado que abrange desde os clássicos atemporais até os lançamentos 
                    mais recentes, oferecemos uma experiência de compra segura, rápida e personalizada.
                </p>

                <!-- Botão CTA -->
                <a href="<?= base_url('sobre') ?>" 
                   class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 
                          text-white font-bold py-3 px-8 
                          transition-all duration-200 shadow-md hover:shadow-lg">
                    Saiba Mais
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- Coluna Direita - Imagem -->
            <div class="flex justify-center md:justify-end">
                <div class="w-full max-w-md">
                    <img src="https://i.pinimg.com/736x/ff/ef/aa/ffefaa281a6b702f7b4860b3396abaeb.jpg" 
                         alt="Sobre Nós" 
                         class="w-full aspect-square object-cover shadow-xl">
                </div>
            </div>

        </div>

    </div>
</section>