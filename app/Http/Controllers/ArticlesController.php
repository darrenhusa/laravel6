<?php

namespace App\Http\Controllers;

use \App\Article;
use \App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
      if (request('tag'))
      {
        $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
      }
      else
      {
        $articles = Article::latest()->get();
      }
      
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

      Article::create($this->validateArticle());

      return redirect(route('articles.index'));

    }

    public function edit(Article $article)
    {

      return view('articles.edit', compact('article'));

    }

    public function update(Article $article)
    {
      $article->update($this->validateArticle());

      return redirect($article->path());

    }

    public function destroy()
    {

    }

    protected function validateArticle()
    {
      return request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
      ]);
    }
}
