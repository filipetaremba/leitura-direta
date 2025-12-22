<?php

namespace App\Controllers;

class Home extends BaseController
{
    // Página inicial - Home
    public function index()
    {
        $bookModel = model('App\\Models\\BookModel');

        // Livros mais avaliados (exemplo: últimos adicionados)
        $maisAvaliados = $bookModel->getActiveBooks(5);

        // Livros mais vendidos (exemplo: mais visualizados)
        $maisVendidos = $bookModel->select('books.*, categories.name as category_name, categories.slug as category_slug')
            ->join('categories', 'categories.id = books.category_id')
            ->where('books.status', 'active')
            ->where('categories.status', 'active')
            ->orderBy('books.views', 'DESC')
            ->limit(5)
            ->findAll();

        // Mais livros (exemplo: últimos adicionados)
        $maisLivros = $bookModel->getActiveBooks(10);

        $data = [
            'maisVendidos' => $maisVendidos,
            'maisLivros' => $maisLivros,
            'maisAvaliados' => $maisAvaliados,
            'title' => 'Portal dos Livros - Home',
            'showCarousel' => true
        ];
        return view('pages/home', $data);
    }

    // Todos os livros
    public function todosLivros()
    {
        $data = [
            'title' => 'Todos os Livros',
            'showCarousel' => false
        ];
        return view('pages/todosLivros', $data);
    }

    // Sobre nós
    public function sobreNos()
    {
        $data = [
            'title' => 'Sobre Nós',
            'showCarousel' => false
        ];
        return view('pages/sobrenos', $data);
    }

    // Contate-nos
    public function contateNos()
    {
        $data = [
            'title' => 'Contate-Nos',
            'showCarousel' => false
        ];
        return view('pages/contactenos', $data);
    }
}
