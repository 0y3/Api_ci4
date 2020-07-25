<?php namespace App\Models;

use CodeIgniter\Model;

class Books extends Model
{
    protected $DBGroup    = 'default';
    protected $table      = 'books';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name',
        'isbn',
        'authors',
        'number_of_pages',
        'publisher',
        'country',
        'release_date'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'name' => 'required|alpha_numeric_space|min_length[3]|max_length[255]|is_unique[books.name,id,{id}]',
        'isbn' => 'required|alpha_numeric_punct',
        'authors' => 'required|alpha_numeric_punct',
        'number_of_pages' => 'required|numeric',
        'publisher' => 'required|alpha_numeric_space',
        'country' => 'required|alpha_numeric_space',
        'release_date' => 'required|valid_date',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}