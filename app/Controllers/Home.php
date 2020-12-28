<?php namespace App\Controllers;


use App\Libraries\Blog;
use App\Models\BlogModel;

class Home extends BaseController
{
    public function index()
    {
        return view('hello_world');
    }

    //--------------------------------------------------------------------
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function productList()
    {
        $data['products'] = [['productTitle' => 'NortPas Şınav Tahtası',
                              'productCategory' => 'Spor Malzemeleri',
                              'stock' => 34],
                             ['productTitle' => 'HP Pavilion G135',
                              'productCategory' => 'Laptop',
                              'stock' => 3],
                             ['productTitle' => 'Logitech Sessiz Fare',
                              'productCategory' => 'Mouse',
                              'stock' => 90]];
        return view('products/productList', $data);
    }

    public function blogList()
    {
        $blogModel=new BlogModel();
        $data=['params'=>[
            'where'=>[],
            'select'=>'title,content,categoryName,blog_categories.pk'],
            'blogCats'=>$blogModel->blogCat('categoryName,sefLink',[])
        ];
        return view('blog/blogList',$data);
    }

    public function blogCategory($catName)
    {
        $blogModel=new BlogModel();
            $data = ['params' => [
                'where' => ['blog_categories.seflink' => $catName],
                'select' => 'title,content,categoryName,blog_categories.pk'],
                'blogCats'=>$blogModel->blogCat('categoryName,sefLink',[])
            ];
            return view('blog/blogList', $data);
    }
}