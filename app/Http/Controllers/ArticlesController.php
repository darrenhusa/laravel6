<?php

namespace App\Http\Controllers;

use \App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
      $articles = Article::latest()->get();
      // return $articles;
      return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
      return view('articles.show', compact('article'));
    }

    public function create()
    {
      return view('articles.create');
    }
    public function store()
    {
      request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
      ]);

      $article = new Article();

      $article->title = request('title');
      $article->excerpt = request('excerpt');
      $article->body = request('body');

      $article->save();

      return redirect('/articles');

      // dd(request()->all());
    }

    public function edit(Article $article)
    {

      return view('articles.edit', compact('article'));

    }

    public function update(Article $article)
    {
      request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
      ]);

      $article->title = request('title');
      $article->excerpt = request('excerpt');
      $article->body = request('body');

      $article->save();

      return redirect('/articles/' . $article->id);

    }

    public function destroy()
    {

    }
}
