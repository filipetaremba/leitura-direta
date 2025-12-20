<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'books';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id',
        'title',
        'slug',
        'author',
        'description',
        'price',
        'cover_image',
        'status',
        'views'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'category_id' => 'required|numeric|is_not_unique[categories.id]',
        'title' => 'required|min_length[3]|max_length[200]',
        'slug' => 'required|alpha_dash|max_length[220]|is_unique[books.slug,id,{id}]',
        'author' => 'required|min_length[3]|max_length[150]',
        'description' => 'required|min_length[10]',
        'price' => 'required|decimal|greater_than[0]',
        'status' => 'required|in_list[active,inactive]'
    ];

    protected $validationMessages = [
        'category_id' => [
            'required' => 'A categoria é obrigatória',
            'is_not_unique' => 'Categoria inválida'
        ],
        'title' => [
            'required' => 'O título é obrigatório',
            'min_length' => 'O título deve ter no mínimo 3 caracteres',
            'max_length' => 'O título deve ter no máximo 200 caracteres'
        ],
        'slug' => [
            'required' => 'O slug é obrigatório',
            'is_unique' => 'Este slug já está em uso'
        ],
        'author' => [
            'required' => 'O autor é obrigatório'
        ],
        'description' => [
            'required' => 'A descrição é obrigatória',
            'min_length' => 'A descrição deve ter no mínimo 10 caracteres'
        ],
        'price' => [
            'required' => 'O preço é obrigatório',
            'decimal' => 'O preço deve ser um valor decimal válido',
            'greater_than' => 'O preço deve ser maior que zero'
        ]
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $beforeInsert = ['generateSlug'];
    protected $beforeUpdate = ['generateSlug'];

    /**
     * Gera slug automaticamente
     */
    protected function generateSlug(array $data)
    {
        if (!isset($data['data']['slug']) || empty($data['data']['slug'])) {
            if (isset($data['data']['title'])) {
                $data['data']['slug'] = url_title($data['data']['title'], '-', true);
            }
        }
        return $data;
    }

    /**
     * Busca livros ativos com informações da categoria
     */
    public function getActiveBooks($limit = null, $offset = 0)
    {
        $builder = $this->select('books.*, categories.name as category_name, categories.slug as category_slug')
                        ->join('categories', 'categories.id = books.category_id')
                        ->where('books.status', 'active')
                        ->where('categories.status', 'active')
                        ->orderBy('books.created_at', 'DESC');

        if ($limit) {
            $builder->limit($limit, $offset);
        }

        return $builder->findAll();
    }

    /**
     * Busca livro por slug com informações da categoria
     */
    public function getBookBySlug($slug)
    {
        return $this->select('books.*, categories.name as category_name, categories.slug as category_slug')
                    ->join('categories', 'categories.id = books.category_id')
                    ->where('books.slug', $slug)
                    ->where('books.status', 'active')
                    ->where('categories.status', 'active')
                    ->first();
    }

    /**
     * Busca livros por categoria
     */
    public function getBooksByCategory($categorySlug, $limit = null)
    {
        $builder = $this->select('books.*, categories.name as category_name, categories.slug as category_slug')
                        ->join('categories', 'categories.id = books.category_id')
                        ->where('categories.slug', $categorySlug)
                        ->where('books.status', 'active')
                        ->where('categories.status', 'active')
                        ->orderBy('books.created_at', 'DESC');

        if ($limit) {
            $builder->limit($limit);
        }

        return $builder->findAll();
    }

    /**
     * Incrementa visualizações
     */
    public function incrementViews($id)
    {
        return $this->set('views', 'views+1', false)
                    ->where('id', $id)
                    ->update();
    }

    /**
     * Busca livros relacionados (mesma categoria)
     */
    public function getRelatedBooks($categoryId, $currentBookId, $limit = 4)
    {
        return $this->select('books.*, categories.name as category_name')
                    ->join('categories', 'categories.id = books.category_id')
                    ->where('books.category_id', $categoryId)
                    ->where('books.id !=', $currentBookId)
                    ->where('books.status', 'active')
                    ->where('categories.status', 'active')
                    ->orderBy('books.views', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Busca com todas as informações (para admin)
     */
    public function getAllBooksWithCategory()
    {
        return $this->select('books.*, categories.name as category_name')
                    ->join('categories', 'categories.id = books.category_id')
                    ->orderBy('books.created_at', 'DESC')
                    ->findAll();
    }
}