<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasicController extends Controller
{
    public function home()
    {
        $top10 =Article::latest()->paginate(10);
        $top5 =Article::latest()->paginate(5);
        $articles = Article::latest()->paginate(8);
        return view('index',compact('top10','articles','top5'));
    }

    public function ReadArticle($category,$id,$title)
    {

        $recentComment = Comment::latest()->paginate(5);
        $mostPopular =  Article::orderBy('view','desc')->paginate(2);
        $comment = Comment::where('article_id',$id)->latest()->paginate(5);
        $comment_count = $comment->count('id');
        $article = Article::find($id);
        $article->view = $article->view+1;
        $article->save();

        return view('read-article',compact('article','comment','comment_count','mostPopular','recentComment'));
    }

    public function Categories($article,$id){
      $cats = Category::find($id);
      $article = Article::latest()->where('category_id', $id)->get();
      $firstPost = Article::latest()->where('category_id',$id)->first();
      return view('categories', compact('article','firstPost','cats'));
    }
}
