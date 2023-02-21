<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $articles = Article::paginate(5);
        return response()->view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $article = new Article();
        return response()->view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:20']);
        $article = new Article();
        $article->fill($data);
        $article->save();
        return redirect()->route('articles.index')->with('flash', 'Article successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): Response
    {
        $article = Article::findOrFail($article->id);
        return response()->view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): Response
    {
        $article = Article::findOrFail($article->id);
        return response()->view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $article = Article::findOrFail($article->id);
        $data = $this->validate($request, [
            'name' => 'required|unique:articles,name' . $article->id,
            'body' => 'required|min:100']);
        $article->fill($data);
        $article->save();
        return redirect()->route('articles.show', $article)->with('flash', 'Article successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article = Article::find($article->id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index')->with('flash', 'Article successfully deleted!');
    }
}
