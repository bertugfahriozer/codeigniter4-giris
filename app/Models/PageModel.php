<?php

namespace App\Models;
use CodeIgniter\Model;

class PageModel extends Model
{
    protected $DBGroup = 'default';
    protected $table ='pages';

    public function pageList($select,$where)
    {
        $page=new PageModel();
        return $page->select($select)
            ->where($where)
            ->orderBy('sort','asc')
            ->findAll();
    }

    public function pageInfo($select,$where)
    {
        $page=new PageModel();
        return $page->select($select)
            ->where($where)->first();
    }
}