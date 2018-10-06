<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" style="width: 50%" src="{{asset('imgs/avatar.png')}}">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{auth()->user()->profile->name}}</span>
                        <!--<span class="text-muted text-xs block">POSITION<b class="caret"></b></span>-->
                    </a>
                </div>

            </li>

            @foreach(config_get_menu(tc_str()) as $menu)
                @php
                    $link = prepare_href($menu);
                @endphp
                <li class="{{is_menu_active($link)}}">
                    <a href="{{$link}}">
                        @if(isset($menu['icon']))
                            <i class="{{$menu['icon']}}"></i>
                        @endif
                        <span class="nav-label">{{$menu['name']}}</span>
                    </a>
                </li>
            @endforeach

        </ul>

    </div>
</nav>