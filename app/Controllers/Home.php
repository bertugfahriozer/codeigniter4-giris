<?php namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\TagModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    public function index($sefLink = '/')
    {
        $this->defData['pageContent'] = $this->pageModel->pageInfo('*', ['sefLink' => $sefLink]);
        return view('pages', $this->defData);
    }

    public function productList()
    {
        $this->secondModel->create('products_categories',['categoryName'=>rand(1,100).' kategorisi']);
        dd($this->secondModel->lists('products_categories'));
        $this->defData['products'] =
            [
                ['id' => 1,
                    'productTitle' => 'NortPas Şınav Tahtası',
                    'productCategory' => 'Spor Malzemeleri',
                    'price' => 24,
                    'stock' => 34],
                ['id' => 2,
                    'productTitle' => 'HP Pavilion G135',
                    'productCategory' => 'Laptop',
                    'price' => 47,
                    'stock' => 3],
                ['id' => 3,
                    'productTitle' => 'Logitech Sessiz Fare',
                    'productCategory' => 'Mouse',
                    'price' => 8,
                    'stock' => 90]
            ];
        return view('products/productList', $this->defData);
    }

    public function blogList($catName = '')
    {
        $blogModel = new BlogModel();
        $where = [];
        if (!empty($catName)) $where = ['blog_categories.seflink' => $catName];
        $this->defData['params'] = [
            'where' => $where,
            'select' => 'title,content,categoryName,blog_categories.pk'];
        $this->defData['blogCats'] = $blogModel->blogCat('categoryName,sefLink', []);
        return view('blog/blogList', $this->defData);
    }

    public function contact()
    {
        return view('contact', $this->defData);
    }

    public function tagList()
    {
        $tagModel = new TagModel();
        $this->defData['tags'] = $tagModel->findAll();
        return view('tagList', $this->defData);
    }

    public function tagAddView()
    {
        return view('tagAdd', $this->defData);
    }

    public function tagAdd()
    {
        $tagModel = new TagModel();
        $return = $tagModel->insert(['tag' => $this->request->getPost('tag')]);

        if ($return === false) return redirect()->back()->withInput()->with('errors', $tagModel->errors());

        return redirect()->back()->with('message', 'Başarılı bir şekilde kayıt edildi.');
    }

    public function tagUpdateView($pk)
    {
        $tagModel = new TagModel();
            $this->defData['tag'] = $tagModel->find($pk);
        return view('tagUpdate', $this->defData);
    }

    public function tagUpdate($pk)
    {
        $tagModel = new TagModel();
        $return = $tagModel->update($pk, ['tag' => $this->request->getPost('tag')]);

        if ($return === false) return redirect()->back()->withInput()->with('errors', $tagModel->errors());

        return redirect()->to('/tags')->with('message', 'Başarılı bir şekilde güncellendi.');
    }

    public function tagDelete($pk)
    {
        $tagModel = new TagModel();
        $return = $tagModel->delete($pk);

        if ($return === false) return redirect()->back()->with('errors', $tagModel->errors());

        return redirect()->back()->with('message', 'Başarılı bir şekilde kayıt edildi.');
    }

    public function recoveryTag($pk)
    {
        $tagModel = new TagModel();
        $data = ['id' => $pk, 'deleted_at' => NULL];
        $return = $tagModel->save($data);

        if ($return === false) return redirect()->back()->with('errors', $tagModel->errors());

        return redirect()->to('/tags')->with('message', 'Başarılı bir şekilde silinenlerden kaldırıldı.');
    }

    public function deletedTags()
    {
        $tagModel = new TagModel();
            $this->defData['tags'] = $tagModel->onlyDeleted()->findAll();
        return view('tagList', $this->defData);
    }

    public function imgMan_view()
    {
        return view('imgMan', $this->defData);
    }
}