<?= $this->extend('layouts/layout_base') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Sobre Nós</h1>
            <p class="text-lg md:text-xl text-blue-100">Descobra a história por trás do Portal dos Livros</p>
        </div>
    </div>
</section>

<!-- Missão, Visão e Valores -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Missão -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Nossa Missão</h3>
                <p class="text-gray-600 leading-relaxed">
                    Conectar leitores apaixonados com os melhores livros, tornando a leitura acessível e inspiradora para todos, em qualquer lugar.
                </p>
            </div>

            <!-- Visão -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Nossa Visão</h3>
                <p class="text-gray-600 leading-relaxed">
                    Ser a plataforma de referência em Moçambique para descoberta e compra de livros, promovendo a cultura da leitura e o conhecimento.
                </p>
            </div>

            <!-- Valores -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Nossos Valores</h3>
                <p class="text-gray-600 leading-relaxed">
                    Qualidade, integridade, inovação e compromisso com a excelência no atendimento aos nossos clientes e parceiros.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- História -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-7xl">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Nossa História</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <img src="https://images.unsplash.com/photo-150784272343-583f20270319?w=600&h=400&fit=crop" alt="Biblioteca" class="rounded-lg shadow-lg">
            </div>
            <div>
                <p class="text-gray-600 text-lg leading-relaxed mb-4">
                    Fundado em 2020, o Portal dos Livros nasceu da paixão por leitura e da necessidade de criar um espaço acessível onde leitores moçambicanos pudessem descobrir, explorar e adquirir livros de forma fácil e segura.
                </p>
                <p class="text-gray-600 text-lg leading-relaxed mb-4">
                    Começamos com uma pequena seleção de títulos e crescemos para uma vasta biblioteca com milhares de obras, desde clássicos até lançamentos contemporâneos.
                </p>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Hoje, servimos centenas de leitores em todo o país, oferecendo não apenas livros, mas também uma comunidade de apaixonados pela literatura.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Estatísticas -->
<section class="py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">5k+</div>
                <p class="text-blue-100">Livros em Catálogo</p>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">2k+</div>
                <p class="text-blue-100">Clientes Satisfeitos</p>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">500+</div>
                <p class="text-blue-100">Autores Disponíveis</p>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">4.8★</div>
                <p class="text-blue-100">Avaliação Média</p>
            </div>
        </div>
    </div>
</section>

<!-- Equipa -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">Nossa Equipa</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Membro 1 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition text-center">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop" alt="Membro da equipa" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-1">João Silva</h3>
                    <p class="text-blue-600 font-semibold mb-3">Fundador & CEO</p>
                    <p class="text-gray-600 text-sm">Apaixonado por livros e tecnologia, com mais de 10 anos de experiência em e-commerce.</p>
                </div>
            </div>

            <!-- Membro 2 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition text-center">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop" alt="Membro da equipa" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-1">Maria Costa</h3>
                    <p class="text-blue-600 font-semibold mb-3">Diretora de Conteúdo</p>
                    <p class="text-gray-600 text-sm">Especialista em curação de livros e recomendações literárias personalizadas.</p>
                </div>
            </div>

            <!-- Membro 3 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition text-center">
                <img src="https://images.unsplash.com/photo-1517849845537-1d51a20414de?w=400&h=400&fit=crop" alt="Membro da equipa" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-1">Pedro Neves</h3>
                    <p class="text-blue-600 font-semibold mb-3">Gerente de Operações</p>
                    <p class="text-gray-600 text-sm">Garante que cada livro chegue aos nossos clientes com qualidade e agilidade.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-7xl text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Faça Parte da Nossa Comunidade</h2>
        <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
            Junte-se a milhares de leitores que já descobriram seus próximos livros favoritos no Portal dos Livros.
        </p>
        <a href="<?= base_url('livros') ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded transition-colors duration-200 shadow-md hover:shadow-lg">
            Explorar Livros
        </a>
    </div>
</section>

<?= $this->endSection() ?>