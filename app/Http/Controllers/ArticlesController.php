<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;



class ArticlesController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware(middleware:'auth');
    // }




    public function index(){
        // $articles = Article::all();
        $articles = Article::orderBy('id')->get();
        // $articles = Article::paginate(5);
        return view('articles.index', ['articles' => $articles]);
    }


    public function create(){
        return view('articles.create');
    }


    public function store(Request $request){
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:5',
        ]);

        auth()->user()->articles()->create($content);
        return redirect()->route(route:'root')->with('notice','success');
    }

    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit' , ['article' => $article]);
    }


    public function update(Request $request, $id){
        $article = auth()->user()->articles()->find($id);

        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:5',
        ]);
        $article->update($content);
        return redirect()->route(route:'root')->with('notice','edit success');
    }



    public function destroy($id){
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('root')->with('notice', 'delete success');
    }
    
    

}




