@extends('layouts.frontend.app')


@section('content')
    <!-- ##### Viral News Breadcumb Area Start ##### -->
    <div class="viral-news-breadcumb-area section-padding-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center">

                <!-- Breadcumb Area -->
                <div class="col-12 col-md-4">
                    <h3>Trending</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                          <li class="breadcrumb-item"><a href="{{route('categories',[$cats->category_name,$cats->id])}}">{{$cats->category_name}}</a></li>
                        </ol>
                    </nav>
                </div>

                <!-- Add Widget -->
                <div class="col-12 col-md-8">
                    <div class="add-widget">
                        <a href="#"><img src="{{asset('assests/frontend/img/bg-img/add2.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Viral News Breadcumb Area End ##### -->
    <br>
    <!-- ##### Blog Post Area Start ##### -->
    <div class="viral-story-blog-post section-padding-0-50">

        <!-- Catagory Featured Post -->
        @if(!empty($firstPost->id))
        <div class="catagory-featured-post section-padding-100">
            <div class="container">
                <div class="row">
                    <!-- Catagory Thumbnail -->
                    <div class="col-12 col-md-7">
                        <div class="cata-thumbnail">
                            <a href="{{route('article',[$firstPost->category->category_name,$firstPost->id,$firstPost->title])}}"><img src="http://localhost:8000/storage/article/{{$firstPost->image}}" alt="articleImage"></a>
                        </div>
                    </div>
                    <!-- Catagory Content -->
                    <div class="col-12 col-md-5">
                        <div class="cata-content">
                            <a href="#" class="post-catagory">{{$firstPost->category->category_name}}</a>
                            <a href="{{route('article',[$firstPost->category->category_name,$firstPost->id,$firstPost->title])}}">
                                <h2>{{$firstPost->title}}</h2>
                            </a>
                            <div class="post-meta">
                                <p class="post-author">Posted By <a href="#"></a>{{$firstPost->user->name}}</p>
                                <p class="post-date">{{$firstPost->created_at}}</p>
                            </div>
                            <p class="">
                              {!! html_entity_decode(str_limit($firstPost->body,200)) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="container">
            <div class="row">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="row">

                        <!-- Single Blog Post -->
                        @foreach($article as $no=>$value)
                          @if($no==0)
                          @else
                          <div class="col-12 col-lg-6">
                              <div class="single-blog-post style-3">
                                  <!-- Post Thumb -->
                                  <div class="mb-1">
                                      <a href="{{route('article',[$value->category->category_name,$value->id,$value->title])}}"><img src="http://localhost:8000/storage/article/{{$value->image}}" alt="articleImage"></a>
                                  </div>
                                  <!-- Post Data -->
                                  <div class="post-data">
                                      <!-- <a href="#" class="post-catagory">{{$value->category->category_name}}</a> -->
                                      <a href="{{route('article',[$value->category->category_name,$value->id,$value->title])}}" class="post-title">
                                          <h6 class="text-justify">{{$value->title}}</h6>
                                          <p class="text-justify">{!! html_entity_decode(str_limit($value->body,100)) !!}</p>
                                      </a>
                                      <div class="post-meta">
                                          <!-- <p class="post-author">By <a href="#">{{$value->user->name}}</a></p> -->
                                          <p class="post-date">5 Hours Ago</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endif
                        @endforeach

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="viral-news-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">01</a></li>
                                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                                        <li class="page-item"><a class="page-link" href="#">04</a></li>
                                        <li class="page-item"><a class="page-link" href="#">05</a></li>
                                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Area -->
                <div class="col-12 col-lg-4">
                    <div class="sidebar-area">

                        <!-- Newsletter Widget -->
                        <div class="newsletter-widget mb-70">
                            <h4>Sign up to <br>our newsletter</h4>
                            <form action="#" method="post">
                                <input type="text" name="text" placeholder="Name">
                                <input type="email" name="email" placeholder="Email">
                                <button type="submit" class="btn w-100">Subscribe</button>
                            </form>
                        </div>

                        <!-- Trending Articles Widget -->
                        <div class="treading-articles-widget mb-70">
                            <h4>Trending Articles</h4>

                            <!-- Single Trending Articles -->
                            <div class="single-blog-post style-4">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <a href="#"><img src="img/bg-img/15.jpg" alt=""></a>
                                    <span class="serial-number">01.</span>
                                </div>
                                <!-- Post Data -->
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6>This Is How Notebooks Of An Artist Who Travels Around The World Look</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Trending Articles -->
                            <div class="single-blog-post style-4">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <a href="#"><img src="img/bg-img/16.jpg" alt=""></a>
                                    <span class="serial-number">02.</span>
                                </div>
                                <!-- Post Data -->
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6>Artist Recreates People’s Childhood Memories With Realistic Dioramas</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Trending Articles -->
                            <div class="single-blog-post style-4">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <a href="#"><img src="img/bg-img/17.jpg" alt=""></a>
                                    <span class="serial-number">03.</span>
                                </div>
                                <!-- Post Data -->
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6>Artist Recreates People’s Childhood Memories With Realistic Dioramas</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">Michael Smithson</a></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Add Widget -->
                        <div class="add-widget mb-70">
                            <a href="#"><img src="img/bg-img/add.png" alt=""></a>
                        </div>

                        <!-- Latest Comments -->
                        <div class="latest-comments-widget">
                            <h4>Latest Comments</h4>

                            <!-- Single Comment Widget -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail">
                                    <img src="img/bg-img/t1.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#"><span>Jamie Smith</span> on Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>

                            <!-- Single Comment Widget -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail">
                                    <img src="img/bg-img/t2.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#"><span>Tania Heffner</span> on Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>

                            <!-- Single Comment Widget -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail">
                                    <img src="img/bg-img/t3.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#"><span>Sandy Doe</span> on Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Post Area End ##### -->
@endsection
