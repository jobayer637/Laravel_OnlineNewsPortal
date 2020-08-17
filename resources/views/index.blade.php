@extends('layouts.frontend.app')

@section('content')
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-slides owl-carousel">
                        <!-- Single Blog Post -->
                        @foreach($top10 as $value)
                            <div class="single-blog-post d-flex align-items-center mb-50">
                                <div class="post-thumb">
                                    <a href="{{route('article',[$value->category->category_name,$value->id,$value->title])}}"><img src="http://localhost:8000/storage/articleTop10/{{$value->image}}" alt="image"></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{route('article',[$value->category->category_name,$value->id,$value->title])}}" class="post-title">
                                        <h6>{{str_limit($value->subtitle,80)}}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-date"><a href="#">2 Days Ago</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->


    <!-- ##### Blog Post Area Start ##### -->
    <div class="viral-story-blog-post section-padding-0-50 pt-4">
        <div class="container">
            <div class="row">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="row">

                        <!-- Single Blog Post -->
                       @foreach($articles as $value)
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3">
                                    <!-- Post Thumb -->
                                    <div class="mb-1">
                                        <a href="{{route('article',[$value->category->category_name,$value->id,$value->title])}}"><img src="http://localhost:8000/storage/article/{{$value->image}}" alt="image"></a>
                                    </div>
                                    <!-- Post Data -->
                                    <div class="post-data">
                                        <a href="#" class="badge-primary badge ">{{$value->category->category_name}}</a>
                                        <a href="{{route('article',[$value->category->category_name,$value->id,$value->title])}}" class="post-title">
                                            <h6>{{$value->title}}</h6>
                                        </a>
                                        <div class="post-meta">
                                            <!-- <p class="post-author">By <a href="#">{{$value->user->name}}</a></p> -->
                                            <p class="post-date">{{$value->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="viral-news-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item {{!$articles->previousPageUrl()?'disabled':''}}"><a class="page-link {{!$articles->previousPageUrl()?'text-secondary':'text-primary'}}" href="{{$articles->previousPageUrl()}}">Previous Page</a></li>
                                        <li class="page-item"><a class="page-link" href="{{$articles->currentPage()}}">{{$articles->currentPage()}}</a></li>
                                        <li class="page-item {{!$articles->hasMorePages()?'disabled':''}}"><a class="page-link {{!$articles->hasMorePages()?'text-secondary':'text-primary'}}" href="{{$articles->nextPageUrl()}}">Next Page</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Area -->
                <div class="col-12 col-lg-4">
                    <div class="sidebar-area">

                      <!-- Practice login or signup -->
                    @if(Auth::check())
                    <h2 class="badge badge-success">You are already loged in</h2>
                    @else
                    <div class="card mb-4 bg-info">
                      <div class="card-header">
                        <button onclick="loginBtnScript()" class="lbt btn" type="button" name="button">Lon in</button>
                        <button onclick="signupBtnScript()" class="sbt btn" type="button" name="button">SIgn up</button>
                      </div>
                      <!-- Start login body -->
                      <div id="loginBodyScript" class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter Email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Enter Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                      </div>
                      <!-- end login body -->

                      <!-- Start signup bodu -->
                      <div id="signupBodyScript" class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter Name">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Enter Email">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Enter Password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                      </div>
                      <!-- End Signup body -->
                    </div>
                    @endif
                      <!-- End Practice -->

                        <!-- Newsletter Widget -->
                        <!-- @if (!auth()->check())
                        <div class="card mb-4 bg-info">
                          <div class="card-body">
                              <h5 class="card-header mb-2 bg-danger">Signup to our newsletter</h5>
                              <form method="POST" action="{{ route('register') }}">
                                  @csrf
                                  <div class="form-group row">
                                      <div class="col-md-12">
                                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                          @if ($errors->has('name'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-md-12">
                                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                          @if ($errors->has('email'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-md-12">
                                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                          @if ($errors->has('password'))
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <div class="col-md-12">
                                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                      </div>
                                  </div>

                                  <div class="form-group row mb-0">
                                      <div class="col-md-12">
                                          <button type="submit" class="btn btn-primary">
                                              {{ __('Register') }}
                                          </button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                        </div>
                        @endif -->

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

    <!--Start login or signup Form Srtipt -->
    <script type="text/javascript">
      var loginBody = document.getElementById("loginBodyScript");
      var signupBody = document.getElementById("signupBodyScript");
      var sx = document.getElementsByClassName("sbt")[0];
      var lx = document.getElementsByClassName("lbt")[0];
      signupBody.style.display = "none";
      lx.classList.add('bg-warning');
      function loginBtnScript(){
        loginBody.style.display = "block";
        signupBody.style.display = "none";
        sx.classList.remove('bg-warning');
        lx.classList.add('bg-warning');

      }

      function signupBtnScript(){
        loginBody.style.display = "none";
        signupBody.style.display = "block";

        sx.classList.add('bg-warning');
        lx.classList.remove('bg-warning');
      }
    </script>
    <!--End login or signup Form Srtipt -->
@endsection
