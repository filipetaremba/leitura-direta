<?php
// app/Controllers/Books.php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class Books extends BaseController
{
    protected $bookModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Lista todos os livros
     */
    public function index()
    {
        // Paginação
        $perPage = 20;
        
        // Ordenação
        $orderBy = $this->request->getGet('ordem') ?? 'recentes';
        
        $builder = $this->bookModel
            ->select('books.*, categories.name as category_name, categories.slug as category_slug')
            ->join('categories', 'categories.id = books.category_id')
            ->where('books.status', 'active')
            ->where('categories.status', 'active');
        
        // Aplicar ordenação
        switch ($orderBy) {
            case 'az':
                $builder->orderBy('books.title', 'ASC');
                break;
            case 'za':
                $builder->orderBy('books.title', 'DESC');
                break;
            case 'preco_menor':
                $builder->orderBy('books.price', 'ASC');
                break;
            case 'preco_maior':
                $builder->orderBy('books.price', 'DESC');
                break;
            case 'mais_visualizados':
                $builder->orderBy('books.views', 'DESC');
                break;
            default: // recentes
                $builder->orderBy('books.created_at', 'DESC');
        }
        
        $data = [
            'page_title' => 'Todos os Livros',
            'livros' => $builder->paginate($perPage),
            'pager' => $this->bookModel->pager,
            'categories' => $this->categoryModel->getActiveCategories()
        ];

        return view('pages/todosLivros', $data);
    }

    /**
     * Livros por categoria
     */
    public function categoria($slug)
    {
        // Buscar categoria
        $category = $this->categoryModel->getCategoryBySlug($slug);
        
        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Categoria não encontrada');
        }

        // Paginação
        $perPage = 20;
        
        // Ordenação
        $orderBy = $this->request->getGet('ordem') ?? 'recentes';
        
        $builder = $this->bookModel
            ->select('books.*, categories.name as category_name, categories.slug as category_slug')
            ->join('categories', 'categories.id = books.category_id')
            ->where('books.category_id', $category['id'])
            ->where('books.status', 'active')
            ->where('categories.status', 'active');
        
        // Aplicar ordenação
        switch ($orderBy) {
            case 'az':
                $builder->orderBy('books.title', 'ASC');
                break;
            case 'za':
                $builder->orderBy('books.title', 'DESC');
                break;
            case 'preco_menor':
                $builder->orderBy('books.price', 'ASC');
                break;
            case 'preco_maior':
                $builder->orderBy('books.price', 'DESC');
                break;
            case 'mais_visualizados':
                $builder->orderBy('books.views', 'DESC');
                break;
            default: // recentes
                $builder->orderBy('books.created_at', 'DESC');
        }
        
        $data = [
            'page_title' => $category['name'] . ' - Livros',
            'currentCategory' => $category,
            'livros' => $builder->paginate($perPage),
            'pager' => $this->bookModel->pager,
            'categories' => $this->categoryModel->getActiveCategories()
        ];

        return view('pages/todos_livros', $data);
    }

    /**
     * Detalhes do livro individual
     */
    public function show($id)
    {
        $livro = $this->bookModel->find($id);

        if (!$livro) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Livro não encontrado');
        }

        // Incrementar visualizações
        $this->bookModel->incrementViews($id);

        // Buscar livros relacionados (mesma categoria)
        $livrosRelacionados = $this->bookModel->getRelatedBooks($livro['category_id'], $id, 5);

        $data = [
            'page_title' => $livro['title'],
            'livro' => $livro,
            'livrosRelacionados' => $livrosRelacionados
        ];

        return view('pages/livro_individual', $data);
    }

    /**
     * Busca de livros
     */
    public function buscar()
    {
        $termo = $this->request->getGet('q');
        
        if (!$termo) {
            return redirect()->to('livros');
        }

        $perPage = 20;
        
        $builder = $this->bookModel
            ->select('books.*, categories.name as category_name, categories.slug as category_slug')
            ->join('categories', 'categories.id = books.category_id')
            ->where('books.status', 'active')
            ->where('categories.status', 'active')
            ->groupStart()
                ->like('books.title', $termo)
                ->orLike('books.author', $termo)
                ->orLike('books.description', $termo)
            ->groupEnd()
            ->orderBy('books.created_at', 'DESC');
        
        $data = [
            'page_title' => 'Busca: ' . $termo,
            'termo_busca' => $termo,
            'livros' => $builder->paginate($perPage),
            'pager' => $this->bookModel->pager,
            'categories' => $this->categoryModel->getActiveCategories()
        ];

        return view('pages/todos_livros', $data);
    }
}