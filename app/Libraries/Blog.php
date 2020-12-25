<?php

namespace App\Libraries;

class Blog
{
    public function recentBlogs($params)
    {
        return view('blog/blogViewCell', $params);
    }
}