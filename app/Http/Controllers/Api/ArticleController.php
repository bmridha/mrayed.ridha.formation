<?php

namespace App\Http\Controllers\Api;

use response;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{


    public function index()
    {
        $title = 'Liste des articles';
        $articles = Article::Get()
            ->where('is_active', 1)
            ->sortByDesc('order');

            return response()->json([200 => 'success', 'data' =>[
                'titre' => $title,
                'articles' => $articles
            ]]);
    }

    public function store(Request $request)
    {
        /*$validated = $request->validate([
            'title' => 'required|min:2',
            'order' => 'required|numeric',
            'is_active' => 'required|boolean',
        ]);
        if($validated->fails())*/

        $article = new Article;
        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->order = $request->order;
        $article->is_active = $request->is_active;
        $article->save();
        return response()->json([200 => 'Article ajouté avec succès']);

    }



}
