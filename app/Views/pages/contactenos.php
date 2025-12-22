<?= $this->extend('layouts/layout_base') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Contate-Nos</h1>
            <p class="text-lg md:text-xl text-blue-100">Estamos aqui para ajudar e responder às suas perguntas</p>
        </div>
    </div>
</section>

<!-- Informações de Contacto -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Telefone -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-lg transition text-center">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-phone"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Telefone</h3>
                <p class="text-gray-600 mb-2">+258 21 123 456</p>
                <p class="text-sm text-gray-500">Seg-Sex: 8:00 - 17:00</p>
            </div>

            <!-- Email -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-lg transition text-center">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Email</h3>
                <p class="text-gray-600 mb-2">contato@portallivros.mz</p>
                <p class="text-sm text-gray-500">Resposta em até 24h</p>
            </div>

            <!-- Localização -->
            <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-lg transition text-center">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Localização</h3>
                <p class="text-gray-600 mb-2">Maputo, Moçambique</p>
                <p class="text-sm text-gray-500">Av. Paulo Samuel Kankhomba</p>
            </div>
        </div>
    </div>
</section>

<!-- Formulário de Contacto -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-3xl">
        <div class="bg-white rounded-lg shadow-md p-8 md:p-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center">Envie-nos uma Mensagem</h2>
            <p class="text-gray-600 text-center mb-8">Preencha o formulário abaixo e entraremos em contacto brevemente.</p>

            <form id="contactForm" method="POST" action="<?= base_url('contacto/enviar') ?>" class="space-y-6">
                <?= csrf_field() ?>

                <!-- Nome -->
                <div>
                    <label for="nome" class="block text-gray-800 font-semibold mb-2">Nome Completo *</label>
                    <input type="text" id="nome" name="nome" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition"
                           placeholder="Seu nome completo">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-800 font-semibold mb-2">Email *</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition"
                           placeholder="seu.email@example.com">
                </div>

                <!-- Telefone -->
                <div>
                    <label for="telefone" class="block text-gray-800 font-semibold mb-2">Telefone</label>
                    <input type="tel" id="telefone" name="telefone"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition"
                           placeholder="+258 84 123 4567">
                </div>

                <!-- Assunto -->
                <div>
                    <label for="assunto" class="block text-gray-800 font-semibold mb-2">Assunto *</label>
                    <select id="assunto" name="assunto" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition bg-white">
                        <option value="">Selecione um assunto</option>
                        <option value="pedido">Questão sobre Pedido</option>
                        <option value="devolucao">Devoluções</option>
                        <option value="sugestao">Sugestões de Livros</option>
                        <option value="parceria">Parcerias</option>
                        <option value="reclamacao">Reclamação</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>

                <!-- Mensagem -->
                <div>
                    <label for="mensagem" class="block text-gray-800 font-semibold mb-2">Mensagem *</label>
                    <textarea id="mensagem" name="mensagem" required rows="6"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition resize-none"
                              placeholder="Escreva sua mensagem aqui..."></textarea>
                </div>

                <!-- Checkbox -->
                <div class="flex items-start">
                    <input type="checkbox" id="privacidade" name="privacidade" required
                           class="mt-1 w-4 h-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300">
                    <label for="privacidade" class="ml-3 text-gray-600 text-sm">
                        Concordo com a <a href="<?= base_url('privacidade') ?>" class="text-blue-600 hover:underline">política de privacidade</a>
                    </label>
                </div>

                <!-- Botão -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i> Enviar Mensagem
                </button>
            </form>
        </div>
    </div>
</section>

<!-- FAQs -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-3xl">
        <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">Perguntas Frequentes</h2>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden">
                <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition flex items-center justify-between">
                    <span>Qual é o prazo de entrega?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-content hidden px-6 py-4 text-gray-600">
                    <p>O prazo de entrega é de 3 a 5 dias úteis para Maputo e 5 a 7 dias para o resto do país, após a confirmação do pagamento.</p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden">
                <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition flex items-center justify-between">
                    <span>Posso devolver um livro?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-content hidden px-6 py-4 text-gray-600">
                    <p>Sim! Você tem 14 dias a partir da data de recebimento para devolver um livro em condições de novo. Entre em contacto conosco para iniciar o processo.</p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden">
                <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition flex items-center justify-between">
                    <span>Quais são as formas de pagamento?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-content hidden px-6 py-4 text-gray-600">
                    <p>Aceitamos cartão de crédito, transferência bancária, e-Mola e dinheiro na entrega para algumas localidades.</p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden">
                <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition flex items-center justify-between">
                    <span>Como posso rastrear meu pedido?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-content hidden px-6 py-4 text-gray-600">
                    <p>Você receberá um número de rastreamento por email assim que seu pedido for enviado. Pode acompanhar o status a qualquer momento na sua conta.</p>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="bg-gray-50 rounded-lg overflow-hidden">
                <button class="faq-button w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-100 transition flex items-center justify-between">
                    <span>Vocês entregam em todo o país?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-content hidden px-6 py-4 text-gray-600">
                    <p>Sim! Entregamos em todo o território moçambicano. Consulte o valor do frete na página de checkout para sua localização específica.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script para FAQs -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('.faq-button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Fechar outros abertos
            faqButtons.forEach(otherButton => {
                if (otherButton !== button) {
                    otherButton.nextElementSibling.classList.add('hidden');
                    otherButton.querySelector('i').classList.remove('fa-chevron-up');
                    otherButton.querySelector('i').classList.add('fa-chevron-down');
                }
            });
            
            // Toggle o atual
            content.classList.toggle('hidden');
            icon.classList.toggle('fa-chevron-up');
            icon.classList.toggle('fa-chevron-down');
        });
    });
});
</script>

<?= $this->endSection() ?>