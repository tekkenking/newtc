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


                <!--Mega dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="mega-dropdown">
                    <a href="#" class="mega-dropdown-toggle">
                        <i class="demo-pli-layout-grid"></i>
                    </a>
                    <div class="dropdown-menu mega-dropdown-menu">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">

                                <!--Mega menu list-->
                                <ul class="list-unstyled">
                                    <li class="dropdown-header"><i class="demo-pli-file icon-lg icon-fw"></i> Pages</li>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Search Result</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Sreen Lock</a></li>
                                    <li><a href="#">Maintenance</a></li>
                                    <li><a href="#">Invoice</a></li>
                                    <li><a href="#" class="disabled">Disabled</a></li>                                        </ul>

                            </div>
                            <div class="col-sm-4 col-md-3">

                                <!--Mega menu list-->
                                <ul class="list-unstyled">
                                    <li class="dropdown-header"><i class="demo-pli-mail icon-lg icon-fw"></i> Mailbox</li>
                                    <li><a href="#"><span class="pull-right label label-danger">Hot</span>Indox</a></li>
                                    <li><a href="#">Read Message</a></li>
                                    <li><a href="#">Compose</a></li>
                                    <li><a href="#">Template</a></li>
                                </ul>
                                <p class="pad-top text-main text-sm text-uppercase text-bold"><i class="icon-lg demo-pli-calendar-4 icon-fw"></i>News</p>
                                <p class="pad-top mar-top bord-top text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                            </div>
                            <div class="col-sm-4 col-md-3">
                                <!--Mega menu list-->
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#" class="media mar-btm">
                                            <span class="badge badge-success pull-right">90%</span>
                                            <div class="media-left">
                                                <i class="demo-pli-data-settings icon-2x"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-semibold text-main mar-no">Data Backup</p>
                                                <small class="text-muted">This is the item description</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="media mar-btm">
                                            <div class="media-left">
                                                <i class="demo-pli-support icon-2x"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-semibold text-main mar-no">Support</p>
                                                <small class="text-muted">This is the item description</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="media mar-btm">
                                            <div class="media-left">
                                                <i class="demo-pli-computer-secure icon-2x"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-semibold text-main mar-no">Security</p>
                                                <small class="text-muted">This is the item description</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="media mar-btm">
                                            <div class="media-left">
                                                <i class="demo-pli-map-2 icon-2x"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text-semibold text-main mar-no">Location</p>
                                                <small class="text-muted">This is the item description</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <p class="dropdown-header"><i class="demo-pli-file-jpg icon-lg icon-fw"></i> Gallery</p>
                                <div class="row img-gallery">
                                    <div class="col-xs-4">
                                        <img class="img-responsive" src="img/thumbs/img-1.jpg" alt="thumbs">
                                    </div>
                                    <div class="col-xs-4">
                                        <img class="img-responsive" src="img/thumbs/img-3.jpg" alt="thumbs">
                                    </div>
                                    <div class="col-xs-4">
                                        <img class="img-responsive" src="img/thumbs/img-2.jpg" alt="thumbs">
                                    </div>
                                    <div class="col-xs-4">
                                        <img class="img-responsive" src="img/thumbs/img-4.jpg" alt="thumbs">
                                    </div>
                                    <div class="col-xs-4">
                                        <img class="img-responsive" src="img/thumbs/img-6.jpg" alt="thumbs">
                                    </div>
                                    <div class="col-xs-4">
                                        <img class="img-responsive" src="img/thumbs/img-5.jpg" alt="thumbs">
                                    </div>
                                </div>
                                <a href="#" class="btn btn-block btn-primary">Browse Gallery</a>
                            </div>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End mega dropdown-->



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



                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <i class="demo-pli-male"></i>
                                </span>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--You can also display a user name in the navbar.-->
                        <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    </a>


                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">
                            <li>
                                <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                            </li>
                            <li>
                                <a href="#"><span class="label label-success pull-right">New</span><i class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                            </li>
                            <li>
                                <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen</a>
                            </li>
                            <li>
                                <a href="pages-login.html"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->


                <li>
                    <a href="#" class="aside-toggle">
                        <i class="demo-pli-dot-vertical"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>