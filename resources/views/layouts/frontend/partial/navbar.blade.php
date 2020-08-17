<div class="viral-news-main-menu" id="stickyMenu">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="viralnewsNav">

                <!-- Logo -->
                <a class="nav-brand" href="{{route('home')}}"><img src="{{asset('assests/frontend/img/core-img/logo.png')}}" alt="Logo"></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                          <li class="
                              @if(isset($article->category) && $article->category->category_name == 'Home') active border-bottom border-danger @endif
                              {{Request::is('/')?'active border-bottom border-danger':''}}"><a href="{{route('home')}}">Home</a>
                          </li>
                          @foreach(App\Category::all() as $n=>$y)
                          @if($n==0)
                          @else
                            <li class="
                                @if(isset($article->category) && $article->category->category_name == $y->category_name)active border-bottom border-danger @else  @endif
                                {{Request::path()==$y->category_name.'/'.$y->id?'active border-bottom border-danger':''}}"><a href="{{route('categories',[$y->category_name,$y->id])}}">{{$y->category_name}}</a>
                            </li>
                          @endif
                          @endforeach
                        </ul>

                        <!-- Search Button -->
                        <div class="search-btn">
                            <i id="searchbtn" class="fa fa-search" aria-hidden="true"></i>
                        </div>

                        <!-- Search Form -->
                        <div class="viral-search-form">
                          <div class="container mt-1">
                            <div class="card bg-light" >
                              <div class="card-header mb-4">
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                                    <div class="form-group">
                                     <select id="inputState" class="form-control border border-info">
                                       <option selected value="all">Search by choice (all)</option>
                                       <option value="id">Id</option>
                                       <option value="title">Title</option>
                                       <option value="time">Time</option>
                                     </select>
                                   </div>
                                  </div>
                                  <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                                    <input id="dataSearch" class="form-control border border-danger" type="text" placeholder="Data Live Search....">
                                  </div>
                                </div>
                              </div>

                              <div class="card-body">
                                <div id="showSearchData" class="row" style="overflow-x:auto;">

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <script src="{{asset('assests/frontend/js/ajax/ajax.js')}}"></script>
                        <script type="text/javascript">
                          $("#dataSearch").on('keyup', function(){
                            var searchValue = $(this).val();
                            var choose = $("#inputState").val();
                            console.log(searchValue);
                            $.ajax({
                              url: "{{route('data.search')}}",
                              method: 'GET',
                              data:{
                                searchValue:searchValue,
                                choose:choose,
                              },
                              success: function(data){
                                console.log(data);
                                $("#showSearchData").html(data);
                              }
                            });
                          });
                        </script>

                        <!-- Logout btn -->
                        <div class="add-post-button">
                          @if(Auth::check())
                          <a class="btn btn-outline-warning" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                          @else
                          <h2> <span class="btn btn-info disabled">Please sign in OR regestration</span> </h2>
                          @endif
                        </div>

                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>
