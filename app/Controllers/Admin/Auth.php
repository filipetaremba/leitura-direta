<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    /**
     * Exibe tela de login
     */
    public function login()
    {
        // Se já estiver logado, redireciona para dashboard
        if (session()->get('admin_logged_in')) {
            return redirect()->to('/admin/dashboard');
        }

        $data = [
            'title' => 'Login - Admin',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/auth/login', $data);
    }

    /**
     * Processa login
     */
    public function attemptLogin()
    {
        // Validação
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Verifica credenciais
        $admin = $this->adminModel->verifyCredentials($email, $password);

        if (!$admin) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Email ou senha incorretos');
        }

        // Cria sessão
        $sessionData = [
            'admin_id' => $admin['id'],
            'admin_name' => $admin['name'],
            'admin_email' => $admin['email'],
            'admin_logged_in' => true
        ];

        session()->set($sessionData);

        return redirect()->to('/admin/dashboard')
                       ->with('success', 'Login realizado com sucesso!');
    }

    /**
     * Logout
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login')
                       ->with('success', 'Você saiu com sucesso!');
    }

    /**
     * Registra novo admin (usar apenas para criar primeiro usuário)
     * REMOVER EM PRODUÇÃO!
     */
    public function register()
    {
        // Validação
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|is_unique[admins.email]',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        // Dados do admin
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'status' => 'active'
        ];

        // Salva no banco
        if ($this->adminModel->insert($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Admin cadastrado com sucesso!',
                'data' => [
                    'name' => $data['name'],
                    'email' => $data['email']
                ]
            ])->setStatusCode(201);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Erro ao cadastrar admin'
        ])->setStatusCode(500);
    }

    public function showRegister()
    {
        return view('admin/auth/register');
    }
}