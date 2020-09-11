<?php namespace App\Controllers;

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
}
