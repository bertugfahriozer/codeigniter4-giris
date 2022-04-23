<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'users';
    protected $returnType = \App\Entities\UsersEntity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id',
        'email',
        'pass',
        'created_at',
        'deleted_at'
    ];

    // Dates
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
