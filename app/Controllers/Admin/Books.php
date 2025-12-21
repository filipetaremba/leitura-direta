<?php
// app/Controllers/Admin/Books.php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
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
     * Listagem de livros
     */
    public function index()
    {
        $data = [
            'page_title' => 'Gerenciar Livros',
            'books' => $this->bookModel->getAllBooksWithCategory(),
            'categories' => $this->categoryModel->getActiveCategories()
        ];

        return view('admin/books/index', $data);
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        $data = [
            'page_title' => 'Novo Livro',
            'categories' => $this->categoryModel->getActiveCategories()
        ];

        return view('admin/books/create', $data);
    }

    /**
     * Salvar novo livro
     */
    public function store()
    {
        $rules = [
            'category_id' => 'required|is_not_unique[categories.id]',
            'title' => 'required|min_length[3]|max_length[200]',
            'author' => 'required|min_length[3]|max_length[150]',
            'description' => 'required|min_length[10]',
            'price' => 'required|decimal|greater_than[0]',
            'status' => 'required|in_list[active,inactive]',
            'cover_image' => 'uploaded[cover_image]|max_size[cover_image,2048]|is_image[cover_image]|mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $coverImage = $this->request->getFile('cover_image');
        $coverName = null;

        if ($coverImage && $coverImage->isValid() && !$coverImage->hasMoved()) {
            $coverName = $coverImage->getRandomName();
            $coverImage->move(FCPATH . 'uploads/covers', $coverName);
        }

        $bookData = [
            'category_id' => $this->request->getPost('category_id'),
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'status' => $this->request->getPost('status'),
            'cover_image' => $coverName
        ];

        if ($this->bookModel->insert($bookData)) {
            return redirect()->to('admin/books')->with('success', 'Livro cadastrado com sucesso!');
        }

        return redirect()->back()->withInput()->with('error', 'Erro ao cadastrar livro.');
    }

    /**
     * Formulário de edição
     */
    public function edit($id)
    {
        $book = $this->bookModel->find($id);

        if (!$book) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Livro não encontrado');
        }

        $data = [
            'page_title' => 'Editar Livro',
            'book' => $book,
            'categories' => $this->categoryModel->getActiveCategories()
        ];

        return view('admin/books/edit', $data);
    }

    /**
     * Atualizar livro
     */
    public function update($id)
    {
        $book = $this->bookModel->find($id);

        if (!$book) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Livro não encontrado');
        }

        $rules = [
            'category_id' => 'required|is_not_unique[categories.id]',
            'title' => 'required|min_length[3]|max_length[200]',
            'author' => 'required|min_length[3]|max_length[150]',
            'description' => 'required|min_length[10]',
            'price' => 'required|decimal|greater_than[0]',
            'status' => 'required|in_list[active,inactive]'
        ];

        $coverImage = $this->request->getFile('cover_image');
        if ($coverImage && $coverImage->isValid()) {
            $rules['cover_image'] = 'max_size[cover_image,2048]|is_image[cover_image]|mime_in[cover_image,image/jpg,image/jpeg,image/png,image/webp]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $bookData = [
            'category_id' => $this->request->getPost('category_id'),
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'status' => $this->request->getPost('status')
        ];

        if ($coverImage && $coverImage->isValid() && !$coverImage->hasMoved()) {
            if ($book['cover_image'] && file_exists(FCPATH . 'uploads/covers/' . $book['cover_image'])) {
                unlink(FCPATH . 'uploads/covers/' . $book['cover_image']);
            }

            $coverName = $coverImage->getRandomName();
            $coverImage->move(FCPATH . 'uploads/covers', $coverName);
            $bookData['cover_image'] = $coverName;
        }

        if ($this->bookModel->update($id, $bookData)) {
            return redirect()->to('admin/books')->with('success', 'Livro atualizado com sucesso!');
        }

        return redirect()->back()->withInput()->with('error', 'Erro ao atualizar livro.');
    }

    /**
     * Deletar livro
     */
    public function delete($id)
    {
        $book = $this->bookModel->find($id);

        if (!$book) {
            return redirect()->to('admin/books')->with('error', 'Livro não encontrado.');
        }

        if ($book['cover_image'] && file_exists(FCPATH . 'uploads/covers/' . $book['cover_image'])) {
            unlink(FCPATH . 'uploads/covers/' . $book['cover_image']);
        }

        if ($this->bookModel->delete($id)) {
            return redirect()->to('admin/books')->with('success', 'Livro deletado com sucesso!');
        }

        return redirect()->to('admin/books')->with('error', 'Erro ao deletar livro.');
    }

    /**
     * Toggle status
     */
    public function toggleStatus($id)
    {
        $book = $this->bookModel->find($id);

        if (!$book) {
            return redirect()->to('admin/books')->with('error', 'Livro não encontrado.');
        }

        $newStatus = ($book['status'] === 'active') ? 'inactive' : 'active';

        if ($this->bookModel->update($id, ['status' => $newStatus])) {
            $message = ($newStatus === 'active') ? 'Livro ativado!' : 'Livro desativado!';
            return redirect()->to('admin/books')->with('success', $message);
        }

        return redirect()->to('admin/books')->with('error', 'Erro ao alterar status.');
    }
}
