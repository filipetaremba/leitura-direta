<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    protected $bookModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Dashboard principal do admin
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard - Admin',
            'totalBooks' => $this->bookModel->countAll(),
            'activeBooks' => $this->bookModel->where('status', 'active')->countAllResults(),
            'totalCategories' => $this->categoryModel->countAll(),
            'recentBooks' => $this->bookModel->orderBy('created_at', 'DESC')->limit(5)->findAll()
        ];

        return view('admin/layout/header', $data)
             . view('admin/dashboard/index', $data)
             . view('admin/layout/footer');
    }
}