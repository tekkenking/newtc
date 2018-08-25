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
                                <button
                                        type="button"
                                        class="btn btn-xs btn-success btn-block text-bold">
                                    Balance: {{format_currency(2000, true)}}
                                </button>
                            </a>
                        </div>

                    </div>


                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        <li class="list-header">Navigation</li>

                        <!--Menu list item-->
                        <li>
                            <a href="{{route('customer.dashboard')}}">
                                <i class="demo-pli-home"></i>
                                    <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="{{route('customer.profile.show')}}">
                                <i class="demo-pli-split-vertical-2"></i>
                                <span class="menu-title">Profile</span>
                            </a>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="{{route('customer.agency.show')}}">
                                <i class="demo-pli-gear"></i>
                                <span class="menu-title">
                                    {{str_plural('Agency', $agenciescount)}}
                                    <span class="pull-right badge badge-warning-black">{{$agenciescount}}</span>
                                </span>
                            </a>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="{{route('customer.report.tabs')}}">
                                <i class="demo-pli-gear"></i>
                                <span class="menu-title">
                                    Reports
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('get.logout.action')}}">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i>
                                <span class="menu-title">
                                    Logout
                                </span>
                            </a>
                        </li>

                    </ul>

                </div>
                <div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 2073px; transform: translate(0px, 0px);"></div></div></div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>