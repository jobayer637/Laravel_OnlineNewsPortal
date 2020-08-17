@extends('layouts.frontend.app')

@push('css')

@endpush

@section('content')

    <!-- ##### Viral News Breadcumb Area Start ##### -->
    <div class="viral-news-breadcumb-area section-padding-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center">

                <!-- Breadcumb Area -->
                <div class="col-12 col-md-4">
                    <h3>Articles</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('categories',[$article->category->category_name,$article->category_id])}}">{{$article->category->category_name}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
                          <?php   echo $article->category->category_id; ?>
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

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                        <div class="single-blog-post-details">
                            <div class="post-thumb">
                                <img src="http://localhost:8000/storage/article/{{$article->image}}" alt="image">
                            </div>
                            <div class="post-data">
                                <a href="#" class="badge badge-info">{{$article->category->category_name}}</a>
                                <h2 class="post-title">{{$article->title}}</h2>
                                <div class="post-meta">

                                    <!-- Post Details Meta Data -->
                                    <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
                                        <!-- Post Author & Date -->
                                        <div class="post-authors-date">
                                            <p class="post-author">By <a href="#">{{$article->user->name}}</a></p>
                                            <p class="post-date">{{$article->created_at}}</p>
                                        </div>
                                        <!-- View Comments -->
                                        <div class="view-comments">
                                            <p class="views">{{$article->view}} Views</p>
                                            <a href="#comments" class="comments">3 comments</a>
                                        </div>
                                    </div>
                                    {!! html_entity_decode($article->body) !!}
                                </div>
                                @foreach($article->tags as $tag)
                                <button class="btn btn-outline-primary">{{$tag->tag_name}}</button>
                                @endforeach
                                
                            </div>
                            <!-- Login with Facebook to post comments -->
                            <div class="login-with-facebook my-5">
                                <a href="#">Login with Facebook to post comments</a>
                            </div>
                        </div>

                        <!-- Related Articles Area -->
                        <div class="related-articles-">
                            <h4 class="">Most Read News</h4>

                            <div class="row">
                                <!-- Single Post -->
                                @foreach($mostPopular as $value)
                                    <div class="col-12">
                                        <div class="single-blog-post style-3 style-5 d-flex align-items-center mb-50">
                                            <!-- Post Thumb -->
                                            <div class="post-thumb">
                                                <a href="{{route('article',[$value->category->category_name,$value->id,$value->title])}}"><img src="http://localhost:8000/storage/article/{{$value->image}}" alt="image"></a>
                                            </div>
                                            <!-- Post Data -->
                                            <div class="post-data">
                                                <a href="#" class="post-catagory">{{$value->category->category_name}}</a>
                                                <a href="{{route('article',[$value->category->category_name,$value->id,$value->title])}}" class="post-title">
                                                    <h6>{{$value->title}}</h6>
                                                </a>
                                                <div class="post-meta">
                                                    <p class="post-author">Posted By <a href="#">{{$value->user->name}}</a></p>
                                                    <p class="post-date">{{$value->created_at}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix" id="comments">

                            <h4 class="title mb-70">{{$comment_count}} comments</h4>
                            <!-- comment ---------------------------->
                             @foreach($comment as $value)
                             <hr>
                            <div class="card-body p-2 mb-3 bg-light">
                              <div class="row">
                                <!-- comment left side for image -->
                                <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                  <!-- <img src="http://localhost:8000/storage/user/{{$value->article->user->image}}" alt="author" height="50px" width="50px" style="border-radius:50%;"> -->
                                    <img src="http://localhost:8000/storage/profile/jobayer.jpg" style="border-radius:50%;"  height="70px" width="70px" alt="image">
                                </div>
                                <!-- comment left side end for image -->

                                <!-- comment Right side-->
                                <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                  <div class="mycomments">
                                    <div class="row">
                                      <!-------->
                                      <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                        <p class="m-0 p-0">{{$value->user->name}}</p>
                                        <p class="mt-0 pt-0">{{$value->created_at}}</p>
                                      </div>
                                      <!-------->
                                      <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <button onclick="shhd({{$value->id}})" class="rbtn btn btn-outline-primary btn-sm float-right" data-form-id="{{$value->id}}">Reply</button>
                                        @if(Auth::check() && Auth::user()->id==$value->uesr_id)
                                        <a class="btn btn-sm btn-outline-warning float-right mr-1" href=""  onclick="return confirm('are you sure?')">Delete</a>
                                        @else
                                        @endif
                                      </div>
                                    </div>
                                    <div class="comments">
                                      <p>{{$value->comment}}</p>
                                    </div>

                                    <!-- Reply form -->
                                      <div id="{{$value->id}}" class="raf mt-2 d-none">
                                      <form class="rForm" id="replyForm" method="post" v-if="replyComment" action="{{route('replyComment',$value->id)}}">@csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="reply" class="form-control bg-light" rows="3" placeholder="Message" required></textarea>
                                            </div>
                                            <div class="col-12">
                                              <button onclick="cbtn({{$value->id}})" class="btn btn-sm btn-outline-primary mt-1" type="reset">cancel</button>
                                              <button class="btn btn-sm btn-outline-primary ml-1" type="submit">submit</button>
                                            </div>
                                        </div>
                                      </form>
                                    </div>

                                    <!--Rep comment ---------------------------->
                                    @foreach($value->replies as $value)
                                    <div class="ReplyComment">
                                      <hr>
                                      <div class="row">
                                        <!-- comment left side for image -->
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                          <img src="http://localhost:8000/storage/profile/jobayer.jpg" style="border-radius:50%;"height="70px" width="70px" alt="image">
                                        </div>
                                        <!-- comment left side end for image -->

                                        <!-- comment Right side-->
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                          <div class="mycomments">

                                              <div class="replyComment">
                                                <p class="m-0 p-0">{{$value->user->name}}</p>
                                                <p class="mt-0 pt-0">{{$value->created_at}}</p>
                                              </div>

                                            <div class="comments">
                                              <p>{{$value->reply}}</p>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- comment right site end-->
                                      </div>
                                    </div>
                                    @endforeach
                                    <!-- Rep comment ---------------------------->
                                  </div>
                                </div>
                                <!-- comment right site end-->
                              </div>
                            </div>
                            @endforeach
                            <!-- end comment ---------------------------->


                            <br><br><br>

                        </div>

                        <!-- Comment Form -->
                        <div class="post-a-comment-area">
                                <div class="mt-4">
                                    <div class="card-header bg-light">
                                        <h3>Leave a comment</h3>
                                    </div>
                                    <div id="lans" class="card-body">
                                        @if(Auth::check())
                                            <p>Logged in as <strong class="text-muted">{{Auth::user()->name}}</strong></p>
                                            <form class="mt-2" name="formAnswer" action="{{route('comment',$article->id)}}" method="post" onsubmit="return answerSubmit()">
                                            @csrf
                                               <textarea name="comment" class="form-control bg-light" rows="5" placeholder="Enter your Proper comment..." required></textarea>
                                               <input class="btn btn-primary w-100 mt-1" type="submit" name="submit" value="Submit">
                                            </form>
                                        @else
                                        <span class=" navbar-toggler" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                        @if(Auth::check())
                                        <small style="cursor:pointer;font-size:18px; font-weight:500;" class="text-white"><i class="fa fa-vcard-o" style="font-size:24px"></i> My Profile</small>
                                        @else
                                        <small style="cursor:pointer;" class="text-primary"><i class="fa fa-user"></i>Please  SIgn in</small>
                                        @endif
                                      </span>
                                        @endif
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

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
                            <a href="#"><img src="{{asset('assests/frontend/img/bg-img/add.png')}}" alt=""></a>
                        </div>

                        <!-- Latest Comments -->
                        <div class="latest-comments-widget">
                          <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@endsection

@push('js')
    <script type="text/javascript">
    function answerSubmit(){
        var cmntts = document.formAnswer.qanswer;
        if(cmntts.value==""){
            cmntts.classList.add("border-danger");
            return false;
        }
        else{
            cmntts.classList.remove("border-danger");
        }
    }
</script>

<script type="text/javascript">
    var rform = document.getElementsByClassName("raf");
    var rbt = document.getElementsByClassName("rbtn");
    var i;
    function shhd(v){
        for(i=0;i<rform.length;i++){
            if(v==rform[i].id){
                rform[i].classList.remove("d-none");
            }
            else{
                 rform[i].classList.add("d-none");
            }
        }
    }

    function cbtn(c){
        for(i=0;i<rform.length;i++){
            if(c==rform[i].id){
                rform[i].classList.add("d-none");
            }
        }
    }
</script>
@endpush
