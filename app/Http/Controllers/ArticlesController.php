<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
      $articles = \App\Article::latest()->get();
      // return $articles;
      return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
      // dd($articleId);
      $article = \App\Article::find($id);
      // return $article;
      return view('articles.show', compact('article'));
    }
}
