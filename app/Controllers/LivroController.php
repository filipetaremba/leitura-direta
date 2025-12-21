<?php

namespace App\Controllers;

class LivroController extends BaseController
{
    public function show($id)
    {
        // depois isso vem do banco
        $livro = [
            'id' => $id,
            'titulo' => 'No Final Nada Acontece',
            'autor' => 'Kathryn Nicolai',
            'preco' => 2490,
            'capa' => 'https://i.pinimg.com/1200x/f0/13/16/f01316e6e0f3f52396e9b660e008385c.jpg',
            'descricao' => 'Descrição do livro aqui'
        ];

        return view('pages/livro_individual', ['livro' => $livro]);
    }
}
