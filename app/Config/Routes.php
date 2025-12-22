<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==================================================
// ROTAS PÚBLICAS
// ==================================================
// Home
$routes->get('/', 'Home::index');

// Todos os livros
$routes->get('todos-livros', 'Home::todosLivros');
$routes->get('livro/(:num)', 'LivroController::show/$1');

// Sobre nós
$routes->get('sobre-nos', 'Home::sobreNos');

// Contate-nos
$routes->get('contatenos', 'Home::contateNos');

// ==================================================
// ROTAS DE AUTENTICAÇÃO ADMIN (SEM PROTEÇÃO)
// ==================================================

$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::attemptLogin');
$routes->get('admin/logout', 'Admin\Auth::logout');
$routes->get('admin/register', 'Admin\Auth::showRegister');
$routes->post('admin/register', 'Admin\Auth::register'); // ← ADICIONE ESTA LINHA

// ==================================================
// ROTAS ADMINISTRATIVAS (COM PROTEÇÃO)
// ==================================================

$routes->group('admin', ['filter' => 'adminauth'], function($routes) {
    
    // Dashboard
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    // Livros
    $routes->get('books', 'Admin\Books::index');
    $routes->get('books/create', 'Admin\Books::create');
    $routes->post('books/store', 'Admin\Books::store');
    $routes->get('books/edit/(:num)', 'Admin\Books::edit/$1');
    $routes->post('books/update/(:num)', 'Admin\Books::update/$1');
    $routes->get('books/delete/(:num)', 'Admin\Books::delete/$1');
    $routes->get('books/toggle-status/(:num)', 'Admin\Books::toggleStatus/$1');
    
    // Categorias
    $routes->get('categories', 'Admin\Categories::index');
    $routes->get('categories/create', 'Admin\Categories::create');
    $routes->post('categories/store', 'Admin\Categories::store');
    $routes->get('categories/edit/(:num)', 'Admin\Categories::edit/$1');
    $routes->post('categories/update/(:num)', 'Admin\Categories::update/$1');
    $routes->get('categories/delete/(:num)', 'Admin\Categories::delete/$1');
    $routes->get('categories/toggle-status/(:num)', 'Admin\Categories::toggleStatus/$1');
});


//ROTA DE TESTE
$routes->get('teste', 'Home::teste');