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
      $tags = Tag::all();
      return view('articles.create', compact('tags'));
    }
    public function store()
    {
      // dd(request()->all());
      // dd(request()->all());
      $this->validateArticle();

      $article = new Article(request(['title', 'excerpt', 'body']));
      $article->user_id = 1;
      $article->save();

      $article->tags()->attach(request('tags'));

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
        'tags' => 'exists:tags,id',
      ]);
    }
}
