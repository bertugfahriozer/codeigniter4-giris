<?php namespace App\Controllers;

use App\Models\BlogModel;

class Home extends BaseController
{
    public function index($sefLink='/')
    {
        $data=['navs'=>$this->navs,
            'pageContent'=>$this->pageModel->pageInfo('*',['sefLink'=>$sefLink])];
        return view('pages',$data);
    }

    public function productList()
    {
        $data=['products'=> [['productTitle' => 'NortPas Şınav Tahtası',
                              'productCategory' => 'Spor Malzemeleri',
                              'stock' => 34],
                             ['productTitle' => 'HP Pavilion G135',
                              'productCategory' => 'Laptop',
                              'stock' => 3],
                             ['productTitle' => 'Logitech Sessiz Fare',
                              'productCategory' => 'Mouse',
                              'stock' => 90]],
            'navs'=>$this->navs];

        return view('products/productList', $data);
    }

    public function blogList($catName='')
    {
        $blogModel=new BlogModel();
        $where=[];
        if(!empty($catName))
            $where=['blog_categories.seflink' => $catName];
        $data=['params'=>[
            'where'=>$where,
            'select'=>'title,content,categoryName,blog_categories.pk'],
            'blogCats'=>$blogModel->blogCat('categoryName,sefLink',[]),
            'navs'=>$this->navs
        ];
        return view('blog/blogList',$data);
    }
}