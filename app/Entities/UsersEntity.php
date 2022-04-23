<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UsersEntity extends Entity
{
    protected $datamap = [
        'pass' => 'password',
        'adsoyad' => 'username'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [];

    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
        $this->attributes['updated_at'] = date('Y-m-d H:i:s');
        return $this;
    }
}
