<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Category;

        $this->validate($request,[
            'category_name' => 'required|unique:categories',
            'image' => 'required|image',
        ]);

        $cat->category_name = $request->category_name;
        $cat->category_slug = md5($request->category_name);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');

            $randomname = str_random(10);
            $extension  = $image->getClientOriginalExtension();

            $imagename = $randomname.'.'.$extension;

            if(!Storage::disk('public')->exists('category'))
            {
                Storage::disk('public')->makeDirectory('category');
            }
            $categoryImage = Image::make($image)->resize(700,450)->save('foo');
            Storage::disk('public')->put('category/'.$imagename, $categoryImage);

        }

        $cat->image = $imagename;
        $cat->save();

        return redirect()->route('admin.category.index');
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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

//        $this->validate($request,[
//            'category_name' => 'required|unique:categories',
//        ]);

        $cat = Category::find($id);
        $cat->category_name = $request->category_name;
        $cat->category_slug = md5($request->category_name);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');

            $randomname = str_random(10);
            $extension  = $image->getClientOriginalExtension();

            $imagename = $randomname.'.'.$extension;

            if(!Storage::disk('public')->exists('category'))
            {
                Storage::disk('public')->makeDirectory('category');
            }
            $categoryImage = Image::make($image)->resize(750,450)->save('foo');
            Storage::disk('public')->put('category/'.$imagename, $categoryImage);
            $cat->image = $imagename;

        }

        $cat->save();

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->route('admin.category.index');
    }
}
