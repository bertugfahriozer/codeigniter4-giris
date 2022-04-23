<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Blog;

class BlogModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'blogs';
    protected $returnType = Blog::class;
    protected $useTimestamps = true;
    protected $primaryKey = 'blog_pk';
    protected $allowedFields = [
        'blog_pk',
        'title',
        'content',
        'category',
        'created_at',
        'updated_at',
    ];

    public function blogList($select, $where)
    {
        $blogModel = $this->builder();
        return $blogModel->select($select)
            ->join('blog_categories', 'blogs.category=blog_categories.pk')
            ->where($where)
            ->get()->getResult();
    }

    public function blogCat($select, $where)
    {
        $blogModel = $this->builder();
        return $blogModel->select($select)
            ->join('blog_categories', 'blogs.category=blog_categories.pk')
            ->where($where)
            ->groupBy('categoryName')
            ->get()->getResult();
    }

    public function blogCatInfo($select, $where)
    {
        $blogModel = $this->builder();
        return $blogModel->select($select)
            ->join('blog_categories', 'blogs.category=blog_categories.pk')
            ->where($where)
            ->groupBy('categoryName')
            ->get()->getRow();
    }
}