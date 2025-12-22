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

    // Endpoint para sugestões de pesquisa (API)
    public function searchSuggestions()
    {
        $query = $this->request->getGet('q');
        $bookModel = model('App\\Models\\BookModel');
        $suggestions = [];
        if ($query && strlen($query) > 1) {
            // Busca livros cujo título ou autor contenha o termo
            $books = $bookModel
                ->select('id, title, author, slug, cover_image')
                ->groupStart()
                    ->like('title', $query)
                    ->orLike('author', $query)
                ->groupEnd()
                ->where('status', 'active')
                ->orderBy('title', 'ASC')
                ->limit(8)
                ->findAll();
            foreach ($books as $book) {
                $suggestions[] = [
                    'id' => $book['id'],
                    'title' => $book['title'],
                    'author' => $book['author'],
                    'slug' => $book['slug'],
                    'cover_image' => $book['cover_image'],
                    'url' => base_url('livro/' . $book['id'])
                ];
            }
        }
        return $this->response->setJSON($suggestions);
    }

    // Todos os livros
    public function todosLivros()
    {
        $categoryModel = model('App\\Models\\CategoryModel');
        $categories = $categoryModel->getActiveCategories();
        $bookModel = model('App\\Models\\BookModel');
        $livros = $bookModel->getActiveBooks();
        $data = [
            'title' => 'Todos os Livros',
            'showCarousel' => false,
            'categories' => $categories,
            'livros' => $livros
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
