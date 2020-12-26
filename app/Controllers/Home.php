<?php namespace App\Controllers;


use App\Libraries\Blog;
use App\Models\BlogModel;

class Home extends BaseController
{
    public function index()
    {
        echo view('common/header');
        echo view('hello_world');
        echo view('common/footer');
    }

    //--------------------------------------------------------------------
    public function about()
    {
        echo view('common/header');
        echo view('about');
        echo view('common/footer');
    }

    public function contact()
    {
        echo view('common/header');
        echo view('contact');
        echo view('common/footer');
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
        echo view('common/header');
        echo view('products/productList', $data);
        echo view('common/footer');
    }

    public function blogList()
    {
        $blogModel=new BlogModel();
        $data=['params'=>[
            'where'=>[],
            'select'=>'title,content,categoryName,blog_categories.pk'],
            'blogCats'=>$blogModel->blogCat('categoryName,sefLink',[])
        ];
        echo view('common/header');
        echo view('blog/blogList',$data);
        echo view('common/footer');
    }

    public function blogCategory($catName)
    {
        $blogModel=new BlogModel();
            $data = ['params' => [
                'where' => ['blog_categories.seflink' => $catName],
                'select' => 'title,content,categoryName,blog_categories.pk'],
                'blogCats'=>$blogModel->blogCat('categoryName,sefLink',[])
            ];
            echo view('common/header');
            echo view('blog/blogList', $data);
            echo view('common/footer');
    }
}
