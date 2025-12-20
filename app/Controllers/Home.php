<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $bookModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Página inicial - Listagem de todos os livros
     */
    public function index()
    {
        $data = [
            'title' => 'Catálogo de Livros Digitais',
            'books' => $this->bookModel->getActiveBooks(),
            'categories' => $this->categoryModel->getActiveCategories()
        ];

        return view('layout/header', $data)
             . view('home/index', $data)
             . view('layout/footer');
    }

    /**
     * Listagem de livros por categoria
     */
    public function category($categorySlug)
    {
        // Busca a categoria
        $category = $this->categoryModel->getCategoryBySlug($categorySlug);

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Categoria não encontrada');
        }

        // Busca livros da categoria
        $books = $this->bookModel->getBooksByCategory($categorySlug);

        $data = [
            'title' => $category['name'] . ' - Catálogo',
            'category' => $category,
            'books' => $books,
            'categories' => $this->categoryModel->getActiveCategories()
        ];

        return view('layout/header', $data)
             . view('home/category', $data)
             . view('layout/footer');
    }
}