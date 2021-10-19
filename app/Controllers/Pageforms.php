<?php namespace App\Controllers;

class Pageforms extends BaseController
{
    public function contactForm()
    {
        _printrDie($_POST);
    }
}