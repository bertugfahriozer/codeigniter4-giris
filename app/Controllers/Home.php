<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
	    //$this->load->helper('helperAdi');
	    helper('common');
	    //$this->load->view('hello_world'); eski versiyon için hatırlatma amaçlı yazıldı.
		return view('hello_world');
	}

	//--------------------------------------------------------------------
    public function about()
    {
        return view('about');
    }
}
