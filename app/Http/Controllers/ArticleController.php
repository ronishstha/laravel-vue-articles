<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $articles = Article::paginate(15);

        // Return collection of articles as a resource
        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->id = $request->article_id;
        $article->title = $request->title;
        $article->body = $request->body;

        if ($article->save()) {
            return new ArticleResource($article);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->body = $request->body;

        if ($article->save()) {
            return new ArticleResource($article);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get article
        $article = Article::findOrFail($id);

        // Return single article as a resource
        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get article
        $article = Article::findOrFail($id);

        if ($article->delete()) {
            return new ArticleResource($article);
        }
    }
}
