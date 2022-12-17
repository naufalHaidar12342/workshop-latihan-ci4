<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'created_date',
        'created_by',
        'updated_date',
        'updated_by'
    ];
    protected $returnType = 'App\Entities\Kategori';
    protected $useTimestamps = false;
}
