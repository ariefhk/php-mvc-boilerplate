<?php

namespace App\Controller;

use App\Config\View;

class HomeController
{
    public function index()
    {

        $data = [
            "title" => "Belajar PHP MVC",
            "content" => "Selamat belajar PHP MVC Arief Rachman Hakim"
        ];

        View::render('Home/index', $data);
    }
}
