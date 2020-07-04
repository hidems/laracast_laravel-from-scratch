<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        // Render a list of a resource.

        if(request('tag')) {
            // Get articles by requested tag
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest('updated_at')->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article) // This argument can be used instaed of $id and find() is not necessary.
    {
        // Show a singel resource.
        // $article = Article::findOrFail($id);

        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        // Shows a view to create a new resource.

        $tags = Tag::all();
        return view('articles.create', [
            'tags' => $tags
        ]);
    }

    public function store()
    {
        // Persist the new resource.

        // It can be used due to user_id added in articles table.
        // Article::create($this->validateArticle());

        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 3;
        $article->save();

        if (request()->has('tags')) {
            $article->tags()->attach(request('tags'));
        }

        return redirect(route('articles.index'));

    }

    public function edit($id) // In case of using $id. <> show()
    {
        // Shows a view to edit an existing resource.

        // find the article associated with the id
        $article = Article::find($id);

        return view('articles.edit', ['article' => $article]);

    }

    public function update($id)
    {
        // Persist the edited resource.

        // request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        $article = Article::find($id);

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        $article->update($this->validateArticle()); // This can be replaceble above code.

        return redirect($article->path());

    }

    public function destroy()
    {
        // Delete the resource.

    }

    // Execute validation and return each value.
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
