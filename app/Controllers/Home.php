<?php

namespace App\Controllers;

class Home extends BaseController
{
    // Página inicial - Home
    public function index()
    {      // Dados mockados
        $livrosMaisAvaliados = [
            [   'id' => 1,
                'titulo' => 'No Final Nada Acontece',
                'autor' => 'Kathryn Nicolai',
                'preco' => 140,
                'capa' => 'https://i.pinimg.com/1200x/49/d8/4b/49d84b23e118891d57e77543f25eecb7.jpg',
                'avaliacao' => 3.5
            ],['id' => 2,
                'titulo' => 'Love Theoretica',
                'autor' => 'Ali Hazelwood',
                'preco' => 95,
                'capa' => 'https://i.pinimg.com/1200x/f0/13/16/f01316e6e0f3f52396e9b660e008385c.jpg',
                'avaliacao' => 3.5
            ],[ 'id' => 3,
                'titulo' => 'MindSet',
                'autor' => 'Carol Dweck',
                'preco' => 123,
                'capa' => 'https://i.pinimg.com/1200x/8d/51/86/8d5186c27b8dadcb28aadf7893a5a93b.jpg',
                'avaliacao' => 3.5
            ],
            [   'id' => 4,
                'titulo' => 'Livro Fantástico',
                'autor' => 'João Silva',
                'preco' => 130,
                'capa' => 'https://i.pinimg.com/736x/1a/91/38/1a91383e1033ba85034f6bff48426bc9.jpg',
                'avaliacao' => 5
            ],[   'id' => 4,
                'titulo' => 'Livro Fantástico',
                'autor' => 'João Silva',
                'preco' => 130,
                'capa' => 'https://i.pinimg.com/736x/1a/91/38/1a91383e1033ba85034f6bff48426bc9.jpg',
                'avaliacao' => 5
            ]
        ];

        // Passando para a view

        $data = [
            'maisVendidos' => $livrosMaisAvaliados,
            'maisLivros' => $livrosMaisAvaliados,
            'maisAvaliados' => $livrosMaisAvaliados,
            'title' => 'Portal dos Livros - Home',
            'showCarousel' => true
        ];
        return view('pages/home', $data);
    }

    // Todos os livros
    public function todosLivros()
    {
        $data = [
            'title' => 'Todos os Livros',
            'showCarousel' => false
        ];
        return view('pages/todosLivros', $data);
    }

    // Sobre nós
    public function sobreNos()
    {
        $data = [
            'title' => 'Sobre Nós',
            'showCarousel' => false
        ];
        return view('pages/sobrenos', $data);
    }

    // Contate-nos
    public function contateNos()
    {
        $data = [
            'title' => 'Contate-Nos',
            'showCarousel' => false
        ];
        return view('pages/contactenos', $data);
    }
}
