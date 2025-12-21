<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\CategoryModel;
use App\Models\AdminModel;

class Dashboard extends BaseController
{
    protected $bookModel;
    protected $categoryModel;
    protected $adminModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->categoryModel = new CategoryModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        // Busca dados do banco
        $data = [
            'page_title' => 'Dashboard',
            'total_books' => $this->bookModel->countAll(),
            'total_categories' => $this->categoryModel->countAll(),
            'total_users' => $this->adminModel->countAll(),
            'recent_books' => $this->bookModel->orderBy('created_at', 'DESC')->limit(5)->findAll()
        ];

        return view('admin/dashboard/dashboard', $data);
    }
}