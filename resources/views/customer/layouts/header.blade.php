<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
                <img src="{{asset('imgs/logo.png')}}" alt="@lang('general.sitename') Logo" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text">@lang('general.sitename')</span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content">
            <ul class="nav navbar-top-links">

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-list-view"></i>
                    </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toogle button-->



                <!--Search-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li>
                    <div class="custom-search-form">
                        <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">
                            <i class="demo-pli-magnifi-glass"></i>
                        </label>
                        <form>
                            <div class="search-container collapse" id="nav-searchbox">
                                <input id="search-input" type="text" class="form-control" placeholder="Type for search...">
                            </div>
                        </form>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Search-->

            </ul>
            <ul class="nav navbar-top-links">

                <!--Notification dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="demo-pli-bell"></i>
                        <span class="badge badge-header badge-danger"></span>
                    </a>


                    <!--Notification dropdown menu-->
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <div class="nano scrollable has-scrollbar" style="height: 0px;">
                            <div class="nano-content" tabindex="0" style="right: -15px;">
                                <ul class="head-list">
                                    <li>
                                        <a href="#" class="media add-tooltip" data-title="Used space : 95%" data-container="body" data-placement="bottom" data-original-title="" title="">
                                            <div class="media-left">
                                                <i class="demo-pli-data-settings icon-2x text-main"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-nowrap text-main text-semibold">HDD is full</p>
                                                <div class="progress progress-sm mar-no">
                                                    <div style="width: 95%;" class="progress-bar progress-bar-danger">
                                                        <span class="sr-only">95% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media" href="#">
                                            <div class="media-left">
                                                <i class="demo-pli-file-edit icon-2x"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="mar-no text-nowrap text-main text-semibold">Write a news article</p>
                                                <small>Last Update 8 hours ago</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media" href="#">
                                            <span class="label label-info pull-right">New</span>
                                            <div class="media-left">
                                                <i class="demo-pli-speech-bubble-7 icon-2x"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="mar-no text-nowrap text-main text-semibold">Comment Sorting</p>
                                                <small>Last Update 8 hours ago</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media" href="#">
                                            <div class="media-left">
                                                <i class="demo-pli-add-user-star icon-2x"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="mar-no text-nowrap text-main text-semibold">New User Registered</p>
                                                <small>4 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media" href="#">
                                            <div class="media-left">
                                                <img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/9.png">
                                            </div>
                                            <div class="media-body">
                                                <p class="mar-no text-nowrap text-main text-semibold">Lucy sent you a message</p>
                                                <small>30 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media" href="#">
                                            <div class="media-left">
                                                <img class="img-circle img-sm" alt="Profile Picture" src="img/profile-photos/3.png">
                                            </div>
                                            <div class="media-body">
                                                <p class="mar-no text-nowrap text-main text-semibold">Jackson sent you a message</p>
                                                <small>40 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 20px; transform: translate(0px, 0px);"></div></div></div>

                        <!--Dropdown footer-->
                        <div class="pad-all bord-top">
                            <a href="#" class="btn-link text-main box-block">
                                <i class="pci-chevron chevron-right pull-right"></i>Show All Notifications
                            </a>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End notifications dropdown-->
            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>