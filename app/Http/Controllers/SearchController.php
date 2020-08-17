<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SearchController extends Controller
{
    public function Search(Request $request){
      $getValue = '';
      $searchValue = $request->get('searchValue');
      $choose = $request->get('choose');

      if($searchValue != ''){

        if($choose=='all'){
          $data = Article::where('id', 'like', '%'.$searchValue.'%')
          ->orWhere('title', 'like', '%'.$searchValue.'%')
          ->orWhere('created_at', 'like', '%'.$searchValue.'%')
          ->get();
          foreach ($data as $value) {
            $getValue .='
            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                <div class="single-blog-post style-3">
                    <div class="mb-1">
                        <a href="'.route("article",[$value->category->category_name,$value->id,$value->title]).'"><img src="http://localhost:8000/storage/article/'.$value->image.'" alt="image"></a>
                    </div>
                    <!-- Post Data -->
                    <div class="post-data">
                        <a href="#" class="badge-primary badge ">'.$value->category->category_name.'</a>
                        <a href="'.route("article",[$value->category->category_name,$value->id,$value->title]).'" class="post-title">
                            <h6>'.$value->title.'</h6>
                        </a>
                        <div class="post-meta">
                            <p class="post-date">'.$value->created_at.'</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
          }
          return response($getValue);
        }

        if($choose=='id'){
          $data = Article::where('id', 'like', '%'.$searchValue.'%')->get();
          foreach ($data as $value) {
            $getValue .='
            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                <div class="single-blog-post style-3">
                    <div class="mb-1">
                        <a href="'.route("article",[$value->category->category_name,$value->id,$value->title]).'"><img src="http://localhost:8000/storage/article/'.$value->image.'" alt="image"></a>
                    </div>
                    <!-- Post Data -->
                    <div class="post-data">
                        <a href="#" class="badge-primary badge ">'.$value->category->category_name.'</a>
                        <a href="'.route("article",[$value->category->category_name,$value->id,$value->title]).'" class="post-title">
                            <h6>'.$value->title.'</h6>
                        </a>
                        <div class="post-meta">
                            <p class="post-date">'.$value->created_at.'</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
          }
          return response($getValue);
        }

        if($choose=='title'){
          $data = Article::where('title', 'like', '%'.$searchValue.'%')->get();
          foreach ($data as $value) {
            $getValue .='
            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                <div class="single-blog-post style-3">
                    <div class="mb-1">
                        <a href="'.route("article",[$value->category->category_name,$value->id,$value->title]).'"><img src="http://localhost:8000/storage/article/'.$value->image.'" alt="image"></a>
                    </div>
                    <!-- Post Data -->
                    <div class="post-data">
                        <a href="#" class="badge-primary badge ">'.$value->category->category_name.'</a>
                        <a href="'.route("article",[$value->category->category_name,$value->id,$value->title]).'" class="post-title">
                            <h6>'.$value->title.'</h6>
                        </a>
                        <div class="post-meta">
                            <p class="post-date">'.$value->created_at.'</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
          }
          return response($getValue);
        }


        if($choose=='time'){
          $data = Article::where('created_at', 'like', '%'.$searchValue.'%')->get();
          foreach ($data as $value) {
            $getValue .='
            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                <div class="single-blog-post style-3">
                    <div class="mb-1">
                        <a href="'.route("article",[$value->category->category_name,$value->id,$value->title]).'"><img src="http://localhost:8000/storage/article/'.$value->image.'" alt="image"></a>
                    </div>
                    <!-- Post Data -->
                    <div class="post-data">
                        <a href="#" class="badge-primary badge ">'.$value->category->category_name.'</a>
                        <a href="'.route("article",[$value->category->category_name,$value->id,$value->title]).'" class="post-title">
                            <h6>'.$value->title.'</h6>
                        </a>
                        <div class="post-meta">
                            <p class="post-date">'.$value->created_at.'</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
          }
          return response($getValue);
        }
      }
      else{
          $getValue ='
          <div class="col-6 col-sm-6 col-md-3 col-lg-3">
              <h3>No search data...</h3>
          </div>
          ';
        return response($getValue);
      }
    }
}
