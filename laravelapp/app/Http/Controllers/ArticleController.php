<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use  App\Models\Category;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'destroy']]);
    }


    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }


    public function store(Request $request) {
        $category = Category::findOrFail($request->category_id);
        $article = new Article($request->all());
        $article->author_id = 1;
        $article->category()->associate($category)->save();
        $article->tags()->sync($request->tags);
        if ($request->hasFile('file') &&
            $request->file('file')->isValid()) {
            $path = $request->file->storePublicly('articles', 'public');
            $article->file = $path;

        }
        $article->save();
        return redirect('articles');
    }
    public function index()
    {
        $articles = Article::paginate(7);
        return view('articles.index', compact("articles"));
    }

    public function show($article)
    {
        $article = Article::find($article);
        return view('articles.show', compact("article"));
    }
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('articles');
    }



}
