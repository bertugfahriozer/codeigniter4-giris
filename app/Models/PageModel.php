<?php

namespace App\Models;
use CodeIgniter\Model;

class PageModel extends Model
{
    protected $DBGroup = 'default';
    protected $table ='pages';
    protected $allowedFields=['pageContent'];

    public function pageInfo($select,$where)
    {
        $page=new PageModel();
        return $page->select($select)
            ->where($where)->first();
    }
}