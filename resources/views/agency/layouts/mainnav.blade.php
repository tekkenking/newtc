<nav id="mainnav-container">
    <div id="mainnav">


        <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
        <!--It will only appear on small screen devices.-->
        <!--================================
        <div class="mainnav-brand">
            <a href="index.html" class="brand">
                <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                <span class="brand-text">Nifty</span>
            </a>
            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
        </div>
        -->



        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano has-scrollbar">
                <div class="nano-content" tabindex="0" style="right: -15px;">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="{{asset('imgs/avatar.png')}}" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <p class="mnp-name">{{auth()->user()->profile->fullname}}</p>

                            </a>
                        </div>
                    </div>

                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        <li class="list-header">Navigation</li>

                        @foreach(config_get_menu(agency_str()) as $menu)
                            @php
                                $link = prepare_href($menu);
                            @endphp
                            <li class="{{is_menu_active($link)}}">
                                <a href="{{$link}}">
                                    @if(isset($menu['icon']))
                                        <i class="{{$menu['icon']}}"></i>
                                    @endif
                                    <span class="menu-title">{{$menu['name']}}</span>
                                </a>
                            </li>
                    @endforeach

                    </ul>

                </div>
                <div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 3003px; transform: translate(0px, 0px);"></div></div></div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>