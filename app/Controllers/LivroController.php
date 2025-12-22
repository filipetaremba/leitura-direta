<?php

namespace App\Controllers;

class LivroController extends BaseController
{
    public function show($id)
    {
        $bookModel = model('App\\Models\\BookModel');
        $livro = $bookModel->find($id);
        if (!$livro) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Livro não encontrado');
        }
        // Buscar livros relacionados (mesma categoria, exceto o atual)
        $livrosRelacionados = [];
        if (isset($livro['category_id'])) {
            $livrosRelacionados = $bookModel->getRelatedBooks($livro['category_id'], $livro['id'], 4);
        }
        return view('pages/livro_individual', [
            'livro' => $livro,
            'livrosRelacionados' => $livrosRelacionados
        ]);
    }
}
