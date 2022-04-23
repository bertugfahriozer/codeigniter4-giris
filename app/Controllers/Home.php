<?php namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\TagModel;

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
        if(!empty($catName)) $where=['blog_categories.seflink' => $catName];
        $data=['params'=>[
            'where'=>$where,
            'select'=>'title,content,categoryName,blog_categories.pk'],
            'blogCats'=>$blogModel->blogCat('categoryName,sefLink',[]),
            'navs'=>$this->navs
        ];
        return view('blog/blogList',$data);
    }

    public function contact()
    {
        $data=['navs'=>$this->navs];
        return view('contact',$data);
    }

    public function tagList()
    {
        $tagModel=new TagModel();
        $data=['navs'=>$this->navs,
        'tags'=>$tagModel->findAll()];
        return view('tagList',$data);
    }

    public function tagAddView()
    {
        $data=['navs'=>$this->navs];
        return view('tagAdd',$data);
    }

    public function tagAdd()
    {
        $tagModel=new TagModel();
        $return=$tagModel->insert(['tag'=>$this->request->getPost('tag')]);

        if($return===false) return redirect()->back()->withInput()->with('errors',$tagModel->errors());

        return redirect()->back()->with('message','Başarılı bir şekilde kayıt edildi.');
    }

    public function tagUpdateView($pk)
    {
        $tagModel=new TagModel();
        $data=['navs'=>$this->navs,
            'tag'=>$tagModel->find($pk)];
        return view('tagUpdate',$data);
    }

    public function tagUpdate($pk)
    {
        $tagModel=new TagModel();
        $return=$tagModel->update($pk,['tag'=>$this->request->getPost('tag')]);

        if($return===false) return redirect()->back()->withInput()->with('errors',$tagModel->errors());

        return redirect()->to('/tags')->with('message','Başarılı bir şekilde güncellendi.');
    }

    public function tagDelete($pk)
    {
        $tagModel=new TagModel();
        $return=$tagModel->delete($pk);

        if($return===false) return redirect()->back()->with('errors',$tagModel->errors());

        return redirect()->back()->with('message','Başarılı bir şekilde kayıt edildi.');
    }

    public function recoveryTag($pk)
    {
        $tagModel=new TagModel();
        $data=['id'=>$pk,'deleted_at'=>NULL];
        $return=$tagModel->save($data);

        if($return===false) return redirect()->back()->with('errors',$tagModel->errors());

        return redirect()->to('/tags')->with('message','Başarılı bir şekilde silinenlerden kaldırıldı.');
    }

    public function deletedTags()
    {
        $tagModel=new TagModel();
        $data=['navs'=>$this->navs,
            'tags'=>$tagModel->onlyDeleted()->findAll()];
        return view('tagList',$data);
    }
}