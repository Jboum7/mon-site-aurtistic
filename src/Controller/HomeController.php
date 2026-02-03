<?php

namespace App\Controller;

use App\Core\Controller;


class HomeController extends Controller
{
    public function index()
    {
        $this->render('home', [
            'title' => 'Page Home',
            'description' => 'Voici une description de page Home',
            'age' => 54
        ]);
    }

    public function contact(): void
    {
        $method=null;

        $this->render('contact', [
            'title' => 'Page Contact'
        ]);
    }
}