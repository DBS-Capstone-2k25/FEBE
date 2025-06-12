<?php

namespace App\Controllers;

class Articles extends BaseController
{
    public function index()
    {
        return view('articles/index');
    }

    public function detail($slug = null)
    {
        // In a real application, you would fetch the article data from a database
        // For now, we'll just display the static view
        return view('articles/detail');
    }
}