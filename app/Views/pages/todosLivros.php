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
                    <div class="bg-blue-600 text-white px-4 py-3">
                        <h2 class="font-bold text-lg">CATEGORIAS</h2>
                    </div>
                    <div>
                        <ul class="text-sm divide-y divide-gray-200">
                            <?php foreach ($categories as $cat): ?>
                                <li>
                                    <a href="<?= base_url('categoria/' . $cat['slug']) ?>"
                                       data-slug="<?= esc($cat['slug']) ?>"
                                       class="category-link block px-6 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors border-l-4 <?= (isset($currentCategory) && $currentCategory['slug'] === $cat['slug']) ? 'border-blue-600 bg-blue-50 text-blue-600 font-semibold' : 'border-transparent' ?>">
                                        <?= esc($cat['name']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </aside>

            <!-- Conteúdo Principal - Livros (Direita) -->
            <main class="flex-1">
                
                <!-- Cabeçalho com Filtro -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-blue-600">
                            <?= isset($currentCategory) ? esc($currentCategory['name']) : 'Todos os Livros' ?>
                        </h1>
                        <p class="text-sm text-gray-600 mt-1">
                            <?= count($livros) ?> livros encontrados
                        </p>
                    </div>

                    <!-- Ordenar por -->
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-random text-gray-600"></i>
                        <span class="text-sm text-gray-700 font-medium">Ordenar por</span>
                        <form id="formOrdenar" method="get" class="inline">
                            <?php $request = service('request'); ?>
                            <select name="ordem" class="border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="document.getElementById('formOrdenar').submit()">
                                <option value="recentes" <?= ($request->getGet('ordem') == 'recentes' || !$request->getGet('ordem')) ? 'selected' : '' ?>>RECENTES</option>
                                <option value="az" <?= ($request->getGet('ordem') == 'az') ? 'selected' : '' ?>>A-Z</option>
                                <option value="za" <?= ($request->getGet('ordem') == 'za') ? 'selected' : '' ?>>Z-A</option>
                                <option value="preco_menor" <?= ($request->getGet('ordem') == 'preco_menor') ? 'selected' : '' ?>>Menor Preço</option>
                                <option value="preco_maior" <?= ($request->getGet('ordem') == 'preco_maior') ? 'selected' : '' ?>>Maior Preço</option>
                                <option value="mais_visualizados" <?= ($request->getGet('ordem') == 'mais_visualizados') ? 'selected' : '' ?>>Mais Visualizados</option>
                            </select>
                        </form>
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
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6">
                        <?php foreach ($livros as $livro): ?>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Interceptar cliques nos links de categoria
    const categoryLinks = document.querySelectorAll('.category-link');
    
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const slug = this.getAttribute('data-slug');
            loadCategoryBooks(slug);
            
            // Atualizar estado visual dos links
            categoryLinks.forEach(l => {
                l.classList.remove('border-blue-600', 'bg-blue-50', 'text-blue-600', 'font-semibold');
                l.classList.add('border-transparent');
            });
            this.classList.add('border-blue-600', 'bg-blue-50', 'text-blue-600', 'font-semibold');
            this.classList.remove('border-transparent');
        });
    });
    
    function loadCategoryBooks(slug) {
        // Obter parâmetro de ordenação se existir
        const orderParam = new URLSearchParams(window.location.search).get('ordem') || 'recentes';
        
        const url = `<?= base_url('api/categoria-livros') ?>/${slug}?ordem=${orderParam}`;
        
        console.log('Carregando livros de:', url);
        
        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            console.log('Status da resposta:', response.status);
            if (!response.ok) {
                throw new Error(`Erro HTTP! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Dados recebidos:', data);
            if (data.success) {
                updateBooksGrid(data.livros, data.categoria);
                // Scroll suave para o topo do conteúdo
                document.querySelector('main').scrollIntoView({ behavior: 'smooth' });
            } else {
                throw new Error(data.error || 'Erro desconhecido');
            }
        })
        .catch(error => {
            console.error('Erro ao carregar livros:', error);
            alert('Erro ao carregar livros: ' + error.message);
        });
    }
    
    function updateBooksGrid(livros, categoria) {
        const mainContent = document.querySelector('main');
        
        if (livros.length === 0) {
            mainContent.innerHTML = `
                <div class="text-center py-16">
                    <i class="fa-solid fa-book text-6xl text-gray-300 mb-4"></i>
                    <p class="text-xl text-gray-600">Nenhum livro encontrado nesta categoria.</p>
                    <a href="<?= base_url('todos-livros') ?>" 
                       class="inline-block mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        Ver Todos os Livros
                    </a>
                </div>
            `;
            return;
        }
        
        const gridHTML = `
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-blue-600">
                        ${categoria.name}
                    </h1>
                    <p class="text-sm text-gray-600 mt-1">
                        ${livros.length} livro${livros.length !== 1 ? 's' : ''} encontrado${livros.length !== 1 ? 's' : ''}
                    </p>
                </div>

                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-random text-gray-600"></i>
                    <span class="text-sm text-gray-700 font-medium">Ordenar por</span>
                    <form id="formOrdenar" method="get" class="inline">
                        <select name="ordem" class="border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="document.getElementById('formOrdenar').submit()">
                            <option value="recentes">RECENTES</option>
                            <option value="az">A-Z</option>
                            <option value="za">Z-A</option>
                            <option value="preco_menor">Menor Preço</option>
                            <option value="preco_maior">Maior Preço</option>
                            <option value="mais_visualizados">Mais Visualizados</option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6">
                ${livros.map(livro => `
                    <a href="${baseUrl}livro/${livro.id}" 
                       class="group flex flex-col bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                        
                        <div class="relative overflow-hidden aspect-[2/3]">
                            <img src="${livro.cover_image}" 
                                 alt="${livro.title}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            
                            <div class="absolute inset-0 bg-blue-600 bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                        </div>

                        <div class="p-3 flex-1 flex flex-col">
                            <div class="flex gap-1 mb-2">
                                <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                                <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                                <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                                <i class="fa-regular fa-star text-yellow-400 text-xs"></i>
                                <i class="fa-regular fa-star text-yellow-400 text-xs"></i>
                            </div>

                            <h3 class="font-bold text-gray-900 text-sm mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                ${livro.title}
                            </h3>

                            <p class="text-xs text-gray-600 italic mb-2">
                                ${livro.author}
                            </p>

                            <p class="text-sm font-bold text-blue-600 mb-3">
                                MZN ${parseFloat(livro.price).toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.')}
                            </p>

                            <button class="mt-auto w-full bg-blue-600 text-white text-xs font-bold py-2 px-3 rounded hover:bg-blue-700 transition-colors uppercase tracking-wider">
                                BAIXAR OU LER ONLINE
                            </button>
                        </div>
                    </a>
                `).join('')}
            </div>
        `;
        
        mainContent.innerHTML = gridHTML;
    }
});

const baseUrl = '<?= base_url() ?>';
</script>

<?= $this->endSection() ?>