<?php

namespace App\service;

use App\Models\Article;

class selectArticleService
{
    public function select()
    {
return Article::all();

    }

}
