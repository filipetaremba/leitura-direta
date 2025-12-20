<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class Book extends BaseController
{
    protected $bookModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Página de detalhes do livro
     */
    public function show($slug)
    {
        // Busca o livro
        $book = $this->bookModel->getBookBySlug($slug);

        if (!$book) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Livro não encontrado');
        }

        // Incrementa visualizações
        $this->bookModel->incrementViews($book['id']);

        // Busca livros relacionados
        $relatedBooks = $this->bookModel->getRelatedBooks($book['category_id'], $book['id'], 4);

        $data = [
            'title' => $book['title'] . ' - ' . $book['author'],
            'book' => $book,
            'relatedBooks' => $relatedBooks,
            'categories' => $this->categoryModel->getActiveCategories(),
            'whatsappLink' => generate_whatsapp_link($book)
        ];

        return view('layout/header', $data)
             . view('book/show', $data)
             . view('layout/footer');
    }
}