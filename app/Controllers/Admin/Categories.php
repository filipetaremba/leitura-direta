<?php
// app/Controllers/Admin/Categories.php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Listagem de categorias
     */
    public function index()
    {
        $data = [
            'page_title' => 'Gerenciar Categorias',
            'categories' => $this->categoryModel->getCategoriesWithBookCount()
        ];

        return view('admin/categories/index', $data);
    }

    /**
     * Salvar nova categoria
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'description' => 'permit_empty|max_length[500]',
            'status' => 'required|in_list[active,inactive]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $categoryData = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status')
        ];

        if ($this->categoryModel->insert($categoryData)) {
            return redirect()->to('admin/categories')->with('success', 'Categoria cadastrada com sucesso!');
        }

        return redirect()->back()->withInput()->with('error', 'Erro ao cadastrar categoria.');
    }

    /**
     * Formulário de edição
     */
    public function edit($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Categoria não encontrada');
        }

        $data = [
            'page_title' => 'Editar Categoria',
            'category' => $category
        ];

        return view('admin/categories/edit', $data);
    }

    /**
     * Atualizar categoria
     */
    public function update($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Categoria não encontrada');
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'description' => 'permit_empty|max_length[500]',
            'status' => 'required|in_list[active,inactive]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $categoryData = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status')
        ];

        if ($this->categoryModel->update($id, $categoryData)) {
            return redirect()->to('admin/categories')->with('success', 'Categoria atualizada com sucesso!');
        }

        return redirect()->back()->withInput()->with('error', 'Erro ao atualizar categoria.');
    }

    /**
     * Deletar categoria
     */
    public function delete($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return redirect()->to('admin/categories')->with('error', 'Categoria não encontrada.');
        }

        $bookModel = new \App\Models\BookModel();
        $booksCount = $bookModel->where('category_id', $id)->countAllResults();

        if ($booksCount > 0) {
            return redirect()->to('admin/categories')->with('error', "Não é possível deletar. Existem {$booksCount} livros vinculados a esta categoria.");
        }

        if ($this->categoryModel->delete($id)) {
            return redirect()->to('admin/categories')->with('success', 'Categoria deletada com sucesso!');
        }

        return redirect()->to('admin/categories')->with('error', 'Erro ao deletar categoria.');
    }

    /**
     * Toggle status
     */
    public function toggleStatus($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return redirect()->to('admin/categories')->with('error', 'Categoria não encontrada.');
        }

        $newStatus = ($category['status'] === 'active') ? 'inactive' : 'active';

        if ($this->categoryModel->update($id, ['status' => $newStatus])) {
            $message = ($newStatus === 'active') ? 'Categoria ativada!' : 'Categoria desativada!';
            return redirect()->to('admin/categories')->with('success', $message);
        }

        return redirect()->to('admin/categories')->with('error', 'Erro ao alterar status.');
    }
}
