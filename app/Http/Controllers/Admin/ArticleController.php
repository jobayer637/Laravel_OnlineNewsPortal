<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Intervention\Image\ImageManager;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::latest()->get();
        return view('admin.article.index',compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        $tag = Tag::all();
        return view('admin.article.create', compact('cat','tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;

        $this->validate($request,[
            'title' => 'required|unique:articles',
            'subtitle' => 'required|unique:articles',
            'image' => 'required|image',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');

            $randomname = str_random(15);
            $extension  = $image->getClientOriginalExtension();

            $imagename = $randomname.'.'.$extension;

            if(!Storage::disk('public')->exists('article'))
            {
                Storage::disk('public')->makeDirectory('article');
            }
            $articleImage = Image::make($image)->resize(700,350)->save('foo');
            Storage::disk('public')->put('article/'.$imagename, $articleImage);

            if(!Storage::disk('public')->exists('articleTop10'))
            {
                Storage::disk('public')->makeDirectory('articleTop10');
            }
            $articleTop10 = Image::make($image)->resize(150,150)->save('foo');
            Storage::disk('public')->put('articleTop10/'.$imagename, $articleTop10);

        }

        $article->user_id = Auth::user()->id;
        $article->category_id = $request->category;
        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->slug = md5($request->title);
        $article->body = $request->body;
        $article->image = $imagename;
        $article->image_title = $request->image_title;

        if(isset($request->status))
        {
            $article->status = true;
        }
        else
        {
            $article->status = false;
        }

        $article->save();

        $article->tags()->attach($request->tags);

        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::all();
        $cat = Category::all();
        $article = Article::find($id);
        return view('admin.article.edit',compact('article','tag','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');

            $randomname = str_random(15);
            $extension  = $image->getClientOriginalExtension();

            $imagename = $randomname.'.'.$extension;

            if(!Storage::disk('public')->exists('article'))
            {
                Storage::disk('public')->makeDirectory('article');
            }
            $articleImage = Image::make($image)->resize(700,350)->save('foo');
            Storage::disk('public')->put('article/'.$imagename, $articleImage);

            if(!Storage::disk('public')->exists('articleTop10'))
            {
                Storage::disk('public')->makeDirectory('articleTop10');
            }
            $articleTop10 = Image::make($image)->resize(150,150)->save('foo');
            Storage::disk('public')->put('articleTop10/'.$imagename, $articleTop10);

            $article->image = $imagename;

        }

        $article->user_id = Auth::user()->id;
        $article->category_id = $request->category;
        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->slug = md5($request->title);
        $article->body = $request->body;
        $article->image_title = $request->image_title;

        if(isset($request->status))
        {
            $article->status = true;
        }
        else
        {
            $article->status = false;
        }

        $article->save();

        $article->tags()->sync($request->tags);

        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::where('id',$id)->delete();
        return redirect()->route('admin.article.index');
    }
}
