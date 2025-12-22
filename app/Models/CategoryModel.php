<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'slug',
        'description',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[100]',
        // 'slug' => 'required|alpha_dash|max_length[120]|is_unique[categories.slug,id,{id}]',
        'status' => 'required|in_list[active,inactive]'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'O nome da categoria é obrigatório',
            'min_length' => 'O nome deve ter no mínimo 3 caracteres',
            'max_length' => 'O nome deve ter no máximo 100 caracteres'
        ],
        'slug' => [
            'required' => 'O slug é obrigatório',
            'alpha_dash' => 'O slug deve conter apenas letras, números, traços e underlines',
            'is_unique' => 'Este slug já está em uso'
        ],
        'status' => [
            'required' => 'O status é obrigatório',
            'in_list' => 'Status inválido'
        ]
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $beforeInsert = ['generateSlug'];
    protected $beforeUpdate = ['generateSlug'];

    /**
     * Gera slug automaticamente se não foi fornecido
     */
    protected function generateSlug(array $data)
    {
        if (!isset($data['data']['slug']) || empty($data['data']['slug'])) {
            if (isset($data['data']['name'])) {
                $data['data']['slug'] = url_title($data['data']['name'], '-', true);
            }
        }
        return $data;
    }

    /**
     * Busca categorias ativas
     */
    public function getActiveCategories()
    {
        return $this->where('status', 'active')
                    ->orderBy('name', 'ASC')
                    ->findAll();
    }

    /**
     * Busca categoria por slug
     */
    public function getCategoryBySlug($slug)
    {
        return $this->where('slug', $slug)
                    ->where('status', 'active')
                    ->first();
    }

    /**
     * Conta livros por categoria
     */
    public function getCategoriesWithBookCount()
    {
        return $this->select('categories.*, COUNT(books.id) as book_count')
                    ->join('books', 'books.category_id = categories.id', 'left')
                    ->where('categories.status', 'active')
                    ->groupBy('categories.id')
                    ->orderBy('categories.name', 'ASC')
                    ->findAll();
    }
}