<nav class="nav-bar-header">
    <span class="part-1">
        @if(!auth()->check())
            <a href="" class="btn-get-start">GET START</a>
            <a href="{{url('login')}}">LOG IN</a>
        @else
            <a href="">{{auth()->user()->email}}</a>
        @endif
        <button class="menu-icon-header"><img src="{{url('Data/Image/Index/menu.png')}}" alt=""></button>
        <button class="menu-icon-header-search"><img src="{{url('Data/Image/Index/search.png')}}" alt=""></button>
    </span>
    <span class="part-2">
        <span>
            <ul>
                <li>
                    <a href="">
                        TOPICS
                    </a>
                </li>
                <li>
                     <a href="">
                        SERIES
                    </a>
                </li>
                <li>
                    <a href="">
                        DISCUSS
                    </a>
                </li>
                <li>
                    <a href="">
                        PODCAST
                    </a>
                </li>
            </ul>
        </span>
    </span>
    <span class="part-3">
        <a href="">
            <img src="{{url('Data/Image/Index/laracasts.png')}}" alt="">
        </a>
    </span>
</nav>
<div class="menu-view-mobile">
    <ul>
        <li class="exit-menu-mobile"><b><a>+</a></b></li>
        <li>LOG IN</li>
        <li>GET START</li>
        <li>HOME</li>
        <li>TOPICS</li>
        <li>SERIES</li>
        <li>DISCUSS</li>
        <li>PODCAST</li>
    </ul>
</div>
<div class="blur-all-page"></div>
<div class="group-form-search">
    <div class="group-form-search-shit">
        <img src="{{url('Data/Image/Index/search2.png')}}" alt="">
        <input type="text" name="input_search_index_page" placeholder="TYPE TEXT SEARCH...">
    </div>
</div>
