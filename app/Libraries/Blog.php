<?php

namespace App\Libraries;
use App\Models\BlogModel;
class Blog
{
    public function recentBlogs(array $params=[])
    {
        $blogModel=new BlogModel();
        $data=['blogs'=>$blogModel->blogList($params['select'],$params['where'])];
        return view('blog/blogViewCell', $data);
    }
}