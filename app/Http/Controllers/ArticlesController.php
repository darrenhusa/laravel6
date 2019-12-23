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

    public function show($id)
    {
      // dd($articleId);
      $article = Article::find($id);
      // return $article;
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

    public function edit($id)
    {

      $article = Article::findOrFail($id);

      return view('articles.edit', compact('article'));

    }

    public function update($id)
    {
      request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
      ]);

      $article = Article::findOrFail($id);

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
