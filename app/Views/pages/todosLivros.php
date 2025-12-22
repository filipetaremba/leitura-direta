<?= $this->extend('layouts/layout_base') ?>

<?= $this->section('content') ?>

<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-200">
    <div class="container mx-auto px-4 py-3 max-w-7xl">
        <nav class="flex items-center gap-2 text-sm text-gray-600">
            <a href="<?= base_url() ?>" class="hover:text-blue-600 transition-colors">HOME</a>
            <i class="fa-solid fa-chevron-right text-xs"></i>
            <span class="text-gray-900 font-medium uppercase">
                <?= isset($currentCategory) ? esc($currentCategory['name']) : 'Todos os Livros' ?>
            </span>
        </nav>
    </div>
</div>

<!-- Conteúdo Principal -->
<section class="py-8 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar - Categorias (Esquerda) -->
            <aside class="lg:w-64 flex-shrink-0">
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden sticky top-4">
                    
                    <!-- Cabeçalho -->
                    <div class="bg-gray-900 text-white px-4 py-3">
                        <h2 class="font-bold text-lg">CATEGORIAS</h2>
                    </div>

                    <!-- Lista de Categorias -->
                    <div class="divide-y divide-gray-200">
                        
                        <!-- Literatura e Ficção -->
                        <div>
                            <h3 class="px-4 py-3 font-bold text-gray-900 bg-gray-50 text-sm">
                                LITERATURA E FICÇÃO
                            </h3>
                            <ul class="text-sm">
                                <li>
                                    <a href="<?= base_url('categoria/romance') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'romance') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Romance
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/aventura') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'aventura') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Aventura
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/biografias-memorias') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'biografias-memorias') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Biografias e Memórias
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/ficcao') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'ficcao') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Ficção
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/ficcao-fantastica') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'ficcao-fantastica') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Ficção Fantástica
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/ficcao-cientifica') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'ficcao-cientifica') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Ficção Científica
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/contos-cronicas') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'contos-cronicas') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Contos e Crônicas
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/infanto-juvenil') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'infanto-juvenil') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Infanto e Juvenil
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/policial') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'policial') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Policial
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/humor') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'humor') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Humor
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/poemas-poesia') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'poemas-poesia') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Poemas e Poesia
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/suspense-terror') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'suspense-terror') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Suspense e Terror
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Técnicos e Acadêmicos -->
                        <div>
                            <h3 class="px-4 py-3 font-bold text-gray-900 bg-gray-50 text-sm">
                                TÉCNICOS E ACADÊMICOS
                            </h3>
                            <ul class="text-sm">
                                <li>
                                    <a href="<?= base_url('categoria/artes-musica') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'artes-musica') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Artes e Música
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/administracao-economia') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'administracao-economia') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Administração e Economia
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/direito') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'direito') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Direito
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/politica') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'politica') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Política
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/filosofia') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'filosofia') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Filosofia
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/didaticos') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'didaticos') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Didáticos
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/concurso-publico') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'concurso-publico') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Concurso Público
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/informatica') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'informatica') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Informática
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/historia') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'historia') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        História
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/gastronomia') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'gastronomia') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Gastronomia
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/humanas-sociais') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'humanas-sociais') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Humanas e Sociais
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/psicologia') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'psicologia') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Psicologia
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/nutricao-dietas') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'nutricao-dietas') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Nutrição e Dietas
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/ciencias') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'ciencias') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Ciências
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/saude-medicina') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'saude-medicina') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Saúde, Medicina
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Vida Prática e Outros -->
                        <div>
                            <h3 class="px-4 py-3 font-bold text-gray-900 bg-gray-50 text-sm">
                                VIDA PRÁTICA E OUTROS
                            </h3>
                            <ul class="text-sm">
                                <li>
                                    <a href="<?= base_url('categoria/autoajuda') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'autoajuda') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Autoajuda
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/esportes-jogos') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'esportes-jogos') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Esportes e Jogos
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/espiritualidade') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'espiritualidade') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Espiritualidade
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/turismo-guias-viagem') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'turismo-guias-viagem') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Turismo e Guias de Viagem
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/lelivros-pdf-epub') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'lelivros-pdf-epub') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        LeLivros - Le Livros PDF ePub
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/le-livros-gratis') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'le-livros-gratis') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Le Livros Livros Grátis
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('categoria/livros-baixar-epub-pdf') ?>" 
                                       class="block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === 'livros-baixar-epub-pdf') ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        Livros Baixar ePub Pdf
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </aside>

            <!-- Conteúdo Principal - Livros (Direita) -->
            <main class="flex-1">
                
                <!-- Cabeçalho com Filtro -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
                            <?= isset($currentCategory) ? esc($currentCategory['name']) : 'Todos os Livros' ?>
                        </h1>
                        <p class="text-sm text-gray-600 mt-1">
                            <?= count($livros ?? []) ?> livros encontrados
                        </p>
                    </div>

                    <!-- Ordenar por -->
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-random text-gray-600"></i>
                        <span class="text-sm text-gray-700 font-medium">Ordenar por</span>
                        <select class="border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="recentes">RECENTES</option>
                            <option value="az">A-Z</option>
                            <option value="za">Z-A</option>
                            <option value="preco_menor">Menor Preço</option>
                            <option value="preco_maior">Maior Preço</option>
                            <option value="mais_visualizados">Mais Visualizados</option>
                        </select>
                    </div>
                </div>

                <!-- Grid de Livros -->
                <?php if (empty($livros)): ?>
                    <div class="text-center py-16">
                        <i class="fa-solid fa-book text-6xl text-gray-300 mb-4"></i>
                        <p class="text-xl text-gray-600">Nenhum livro encontrado nesta categoria.</p>
                        <a href="<?= base_url('livros') ?>" 
                           class="inline-block mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            Ver Todos os Livros
                        </a>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                        <?php foreach (($livros ?? []) as $livro): ?>
                            <a href="<?= base_url('livro/' . $livro['id']) ?>" 
                               class="group flex flex-col bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                                
                                <!-- Imagem -->
                                <div class="relative overflow-hidden aspect-[2/3]">
                                    <img src="<?= esc($livro['cover_image']) ?>" 
                                         alt="<?= esc($livro['title']) ?>"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    
                                    <!-- Overlay no hover -->
                                    <div class="absolute inset-0 bg-blue-600 bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                </div>

                                <!-- Informações -->
                                <div class="p-3 flex-1 flex flex-col">
                                    <!-- Avaliação -->
                                    <div class="flex gap-1 mb-2">
                                        <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                                        <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                                        <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                                        <i class="fa-regular fa-star text-yellow-400 text-xs"></i>
                                        <i class="fa-regular fa-star text-yellow-400 text-xs"></i>
                                    </div>

                                    <!-- Título -->
                                    <h3 class="font-bold text-gray-900 text-sm mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                        <?= esc($livro['title']) ?>
                                    </h3>

                                    <!-- Autor -->
                                    <p class="text-xs text-gray-600 italic mb-2">
                                        <?= esc($livro['author']) ?>
                                    </p>

                                    <!-- Preço -->
                                    <p class="text-sm font-bold text-blue-600 mb-3">
                                        MZN <?= number_format($livro['price'], 2, ',', '.') ?>
                                    </p>

                                    <!-- Botão -->
                                    <button class="mt-auto w-full bg-blue-600 text-white text-xs font-bold py-2 px-3 rounded hover:bg-blue-700 transition-colors uppercase tracking-wider">
                                        BAIXAR OU LER ONLINE
                                    </button>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <!-- Paginação -->
                    <?php if (isset($pager)): ?>
                        <div class="mt-12">
                            <?= $pager->links() ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </main>

        </div>
    </div>
</section>

<?= $this->endSection() ?>