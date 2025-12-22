<?php

/**
 * Helper para geração de links do WhatsApp
 */

if (!function_exists('generate_whatsapp_link')) {
    /**
     * Gera link do WhatsApp com mensagem personalizada
     *
     * @param array $book Dados do livro
     * @return string URL do WhatsApp
     */
    function generate_whatsapp_link($book)
    {
        // Número do WhatsApp (configurado no .env)
        $phone = getenv('whatsapp.number');
        
        // Monta a mensagem
        $message = "Olá! 👋\n\n";
        $message .= "Tenho interesse no livro:\n\n";
        $message .= "📚 *{$book['title']}*\n";
        $message .= "✍️ Autor: {$book['author']}\n";
        $message .= "💰 Preço: MT " . number_format($book['price'], 2, ',', '.') . "\n\n";
        $message .= "🔗 Link: " . base_url("livro/{$book['slug']}") . "\n\n";
        $message .= "Gostaria de mais informações!";
        
        // Codifica a mensagem para URL
        $encodedMessage = urlencode($message);
        
        // Retorna o link completo
        return "https://wa.me/{$phone}?text={$encodedMessage}";
    }
}

if (!function_exists('format_price')) {
    /**
     * Formata preço para exibição
     *
     * @param float $price
     * @return string
     */
    function format_price($price)
    {
        return 'MT ' . number_format($price, 2, ',', '.');
    }
}

if (!function_exists('get_cover_url')) {
    /**
     * Retorna URL da capa do livro
     *
     * @param string|null $coverImage
     * @return string
     */
    function get_cover_url($coverImage)
    {
        if ($coverImage && file_exists(FCPATH . 'uploads/covers/' . $coverImage)) {
            return base_url('uploads/covers/' . $coverImage);
        }
        
        // Imagem padrão se não houver capa
        return base_url('assets/images/no-cover.jpg');
    }
}

if (!function_exists('truncate_text')) {
    /**
     * Trunca texto para exibição em cards
     *
     * @param string $text
     * @param int $limit
     * @return string
     */
    function truncate_text($text, $limit = 150)
    {
        if (strlen($text) <= $limit) {
            return $text;
        }
        
        return substr($text, 0, $limit) . '...';
    }
}