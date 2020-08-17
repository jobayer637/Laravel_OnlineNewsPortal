<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('assests/backend/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          <i class="material-icons">input</i>
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">

            <li class="header">MAIN NAVIGATION</li>

            @if(Request::is('admin*'))
                <li class="{{Request::is('admin/dashboard')?'active':''}}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/user*')?'active':''}}">
                    <a href="{{route('admin.user.index')}}">
                        <i class="material-icons">home</i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/tag*')?'active':''}}">
                    <a href="{{route('admin.tag.index')}}">
                        <i class="material-icons">home</i>
                        <span>Tags</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/category*')?'active':''}}">
                    <a href="{{route('admin.category.index')}}">
                        <i class="material-icons">home</i>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/article*')?'active':''}}">
                    <a href="{{route('admin.article.index')}}">
                        <i class="material-icons">home</i>
                        <span>Article's</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/pending-article*')?'active':''}}">
                    <a href="{{route('admin.pending-article.index')}}">
                        <i class="material-icons">home</i>
                        <span>Pending Article's</span>
                    </a>
                </li>



                <li class="header">SYSTEM</li>
                <li class="{{Request::is('admin/profile*')?'active':''}}">
                    <a href="{{route('admin.profileIndex')}}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li title="{{Auth::user()->name}}">
                    <a  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">

                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            @endif

            @if(Request::is('author*'))

            @endif

        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
