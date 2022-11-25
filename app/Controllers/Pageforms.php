<?php namespace App\Controllers;

class Pageforms extends BaseController
{
    public function contactForm()
    {
        //if(strtolower($this->request->getMethod()) ==='post'){}

        $valData=([
           'fullName'=>['label'=>'Ad Soyad','rules'=>'required'],
           'email'=>['label'=>'E-mail','rules'=>'required|valid_email'],
           'subject'=>['label'=>'Konu','rules'=>'required'],
           'content'=>['label'=>'Mesajınız','rules'=>'required']
        ]);
        if($this->validate($valData)==false) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        _printrDie($_POST);
    }
}