
<!-- Top Navigation - Only Desktop -->
<div class="bg-gray-200 border-b border-gray-300 hidden lg:block">
    <div class="max-w-7xl mx-auto px-4  flex justify-between items-center">
        <div class="text-sm text-gray-700 flex items-center">
            <i class="fas fa-envelope mr-2"></i>
            contato@travessa.com.br
        </div>
        <div class="flex space-x-4">
            <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors duration-200 p-2 hover:scale-110" aria-label="Facebook">
                <i class="fab fa-facebook text-lg"></i>
            </a>
            <a href="#" class="text-gray-700 hover:text-green-600 transition-colors duration-200 p-2 hover:scale-110" aria-label="WhatsApp">
                <i class="fab fa-whatsapp text-lg"></i>
            </a>
            <a href="#" class="text-gray-700 hover:text-pink-600 transition-colors duration-200 p-2 hover:scale-110" aria-label="Instagram">
                <i class="fab fa-instagram text-lg"></i>
            </a>
        </div>
    </div>
</div>

<!-- Header com Logo e User Actions -->
<header class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 py-4 md:py-8">
        <div class="flex items-center justify-between gap-4">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold tracking-wide text-gray-800">
                    PORTAL DOS LIVROS
                </h1>
            </div>

            <!-- Search Bar - Desktop Only -->
            <div class="hidden lg:flex flex-1 max-w-2xl mx-8">
                <div class="relative w-full">
                    <input 
                        type="text" 
                        placeholder="Buscar por título, autor, ISBN..." 
                        class="w-full border-2 border-gray-300 rounded-l px-5 py-2.5 text-sm focus:outline-none focus:border-[#0a66c2] focus:ring-2 focus:ring-[#0a66c2] focus:ring-opacity-20 transition-all"
                        aria-label="Campo de busca"
                    >
                    <button class="absolute right-0 top-0 h-full px-5 bg-[#0a66c2] text-white hover:bg-[#094d92] rounded-r transition-colors" aria-label="Buscar">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- User Actions -->
            <div class="flex items-center gap-3 sm:gap-6 flex-shrink-0">
                <!-- Account -->
                <a href="#" class="text-gray-700 hover:text-[#0a66c2] transition-colors text-center group min-w-[44px] min-h-[44px] flex flex-col items-center justify-center">
                    <i class="fas fa-user text-xl sm:text-2xl block mb-0 sm:mb-1 group-hover:scale-110 transition-transform"></i>
                    <span class="text-xs font-medium hidden sm:block">Conta</span>
                </a>

                <!-- Cart -->
                <a href="#" class="text-gray-700 hover:text-[#0a66c2] transition-colors text-center relative group min-w-[44px] min-h-[44px] flex flex-col items-center justify-center">
                    <i class="fas fa-shopping-cart text-xl sm:text-2xl block mb-0 sm:mb-1 group-hover:scale-110 transition-transform"></i>
                    <span class="text-xs font-medium hidden sm:block">Carrinho</span>
                    <span id="cartBadge" class="cart-badge absolute -top-1 -right-1 sm:top-0 sm:right-0 bg-[#0a66c2] text-white text-xs w-5 h-5 flex items-center justify-center font-bold rounded-full transform translate-x-2 -translate-y-1">0</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Navigation Menu - Sticky on Mobile -->
<nav class="bg-white border-b-2 border-[#0a66c2] shadow-sm sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 py-4 lg:py-0 ">
        <div class="flex items-center gap-3 ">
            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="lg:hidden text-gray-700 hover:text-[#0a66c2] transition-colors min-w-[44px] min-h-[44px] hover:bg-gray-50 rounded flex items-center justify-center" aria-label="Menu" aria-expanded="false">
                <i id="menuIcon" class="fas fa-bars text-xl"></i>
            </button>

            <!-- Search Bar - Mobile (Always Visible) -->
            <div class="flex-1 lg:hidden">
                <div class="relative w-full">
                    <input 
                        type="text" 
                        placeholder="Buscar livros..." 
                        class="w-full border-2 border-gray-300 rounded-l px-4 py-2 text-sm focus:outline-none focus:border-[#0a66c2] focus:ring-2 focus:ring-[#0a66c2] focus:ring-opacity-20 transition-all"
                        aria-label="Campo de busca mobile"
                    >
                    <button class="absolute right-0 top-0 h-full px-4 bg-[#0a66c2] text-white hover:bg-[#094d92] rounded-r transition-colors" aria-label="Buscar">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-1 mx-auto">
                <a href="<?= base_url('/') ?>" class="px-6 py-4 text-sm font-bold text-gray-700 hover:text-[#0a66c2] hover:bg-gray-50 transition-all relative group rounded">
                    HOME
                    <span class="absolute bottom-0 left-0 w-full h-1 bg-[#0a66c2] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
                <a href="<?= base_url('todos-livros') ?>" class="px-6 py-4 text-sm font-bold text-gray-700 hover:text-[#0a66c2] hover:bg-gray-50 transition-all relative group rounded">
                    TODOS LIVROS
                    <span class="absolute bottom-0 left-0 w-full h-1 bg-[#0a66c2] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
                <a href="<?= base_url('sobre-nos') ?>" class="px-6 py-4 text-sm font-bold text-gray-700 hover:text-[#0a66c2] hover:bg-gray-50 transition-all relative group rounded">
                    SOBRE NÓS
                    <span class="absolute bottom-0 left-0 w-full h-1 bg-[#0a66c2] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
                <a href=<?= base_url('contate-nos') ?>" class="px-6 py-4 text-sm font-bold text-gray-700 hover:text-[#0a66c2] hover:bg-gray-50 transition-all relative group rounded">
                    CONTATE-NOS
                    <span class="absolute bottom-0 left-0 w-full h-1 bg-[#0a66c2] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden pb-4 border-t border-gray-200 slide-down">
            <div class="flex flex-col space-y-1 mt-4">
                <a href="<?= base_url('/') ?>" class="px-4 py-3 hover:bg-gray-50 hover:text-[#0a66c2] transition-all font-bold text-sm border-l-4 border-transparent hover:border-[#0a66c2] rounded-r min-h-[44px] flex items-center active:bg-gray-100">
                    HOME
                </a>
                <a href="<?= base_url('todos-livros') ?>" class="px-4 py-3 hover:bg-gray-50 hover:text-[#0a66c2] transition-all font-bold text-sm border-l-4 border-transparent hover:border-[#0a66c2] rounded-r min-h-[44px] flex items-center active:bg-gray-100">
                    TODOS LIVROS
                </a>
                <a href="<?= base_url('sobre-nos') ?>" class="px-4 py-3 hover:bg-gray-50 hover:text-[#0a66c2] transition-all font-bold text-sm border-l-4 border-transparent hover:border-[#0a66c2] rounded-r min-h-[44px] flex items-center active:bg-gray-100">
                    SOBRE NÓS
                </a>
                <a href="<?= base_url('contate-nos') ?>" class="px-4 py-3 hover:bg-gray-50 hover:text-[#0a66c2] transition-all font-bold text-sm border-l-4 border-transparent hover:border-[#0a66c2] rounded-r min-h-[44px] flex items-center active:bg-gray-100">
                    CONTATE-NOS
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Menu Backdrop -->
<div id="menuBackdrop" class="hidden fixed inset-0 bg-black bg-opacity-50 z-30" aria-hidden="true"></div>

