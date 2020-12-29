<?php

namespace App\Models;
use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $DBGroup = 'default';
    protected $table ='blogs';

    public function blogList($select,$where)
    {
        $blogModel=new BlogModel();
        return $blogModel->select($select)
            ->join('blog_categories','blogs.category=blog_categories.pk')
            ->where($where)
            ->findAll();
    }

    public function blogCat($select,$where)
    {
        $blogModel=new BlogModel();
        return $blogModel->select($select)
            ->join('blog_categories','blogs.category=blog_categories.pk')
            ->where($where)
            ->groupBy('categoryName')
            ->findAll();
    }

    public function blogCatInfo($select,$where)
    {
        $blogModel=new BlogModel();
        return $blogModel->select($select)
            ->join('blog_categories','blogs.category=blog_categories.pk')
            ->where($where)
            ->groupBy('categoryName')
            ->first();
    }
}