<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\UsersEntity;
use App\Models\UsersModel;

class Users extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel=new UsersModel();
    }

    public function index()
    {
        $data=['navs'=>$this->navs,'users'=>$this->userModel->findAll()];
        return view('usersList',$data);
    }

    public function new()
    {
        // Create
        $user = new UsersEntity();
        $user->username = 'foo';
        $user->email    = 'foo@example.com';
        $this->userModel->save($user);
    }

    public function password_reset($id)
    {
        $user=$this->userModel->find($id);
        d($user);
        if (! isset($user->password)) {
            $user->setPassword('123456');
        }

        //$user->password=password_hash('123456', PASSWORD_BCRYPT);

        if($this->userModel->save($user)===true)
        echo 'Güncellendi';
    }
}
