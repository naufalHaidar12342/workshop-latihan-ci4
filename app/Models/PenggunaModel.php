<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username',
        'avatar',
        'password',
        'salt',
        'created_date',
        'created_by',
        'updated_date',
        'updated_by',
    ];
    protected $returnType = 'App\Entities\Pengguna';
    protected $useTimestamps = false;
}
