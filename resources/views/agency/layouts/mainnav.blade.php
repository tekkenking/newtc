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
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                <p class="mnp-name">{{auth()->user()->profile->fullname}}</p>
                                <span class="mnp-desc">aaron.cha@themeon.net</span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-information icon-lg icon-fw"></i> Help
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                            </a>
                        </div>
                    </div>


                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile" data-original-title="" title="">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                        <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages" data-original-title="" title="">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                        <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity" data-original-title="" title="">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen" data-original-title="" title="">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                        <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        <li class="list-header">Navigation</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>

                        <!--Menu list item-->
                        <li>
                            <a href="{{route('agency.staff.list')}}" data-original-title="" title="">
                                <i class="demo-pli-split-vertical-2"></i>
                                <span class="menu-title">Staff Management</span>
                            </a>

                        <!--Menu list item-->
                        <li>
                            <a href="{{route('agency.bill.list')}}" data-original-title="" title="">
                                <i class="demo-pli-gear"></i>
                                <span class="menu-title">
                                    Bill Management
                                </span>
                            </a>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="{{route('agency.customers.list')}}" data-original-title="" title="">
                                <i class="demo-pli-boot-2"></i>
                                <span class="menu-title">Customers</span>
                            </a>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-pen-5"></i>
                                <span class="menu-title">Forms</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="forms-general.html">General</a></li>
                                <li><a href="forms-components.html">Advanced Components</a></li>
                                <li><a href="forms-validation.html">Validation</a></li>
                                <li><a href="forms-wizard.html">Wizard</a></li>
                                <li><a href="forms-file-upload.html">File Upload</a></li>
                                <li><a href="forms-text-editor.html">Text Editor</a></li>
                                <li><a href="forms-markdown.html">Markdown</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li class="active-sub active">
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-receipt-4"></i>
                                <span class="menu-title">Tables</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse in" aria-expanded="false">
                                <li><a href="tables-static.html">Static Tables</a></li>
                                <li class="active-link"><a href="tables-bootstrap.html">Bootstrap Tables</a></li>
                                <li><a href="tables-datatable.html">Data Tables</a></li>
                                <li><a href="tables-footable.html">Foo Tables</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-bar-chart"></i>
                                <span class="menu-title">Charts</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="charts-morris-js.html">Morris JS</a></li>
                                <li><a href="charts-flot-charts.html">Flot Charts</a></li>
                                <li><a href="charts-easy-pie-charts.html">Easy Pie Charts</a></li>
                                <li><a href="charts-sparklines.html">Sparklines</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-repair"></i>
                                <span class="menu-title">Miscellaneous</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="misc-timeline.html">Timeline</a></li>
                                <li><a href="misc-maps.html">Google Maps</a></li>
                                <li><a href="xplugins-notifications.html">Notifications<span class="label label-purple pull-right">Improved</span></a></li>
                                <li><a href="misc-nestable-list.html">Nestable List</a></li>
                                <li><a href="misc-animate-css.html">CSS Animations</a></li>
                                <li><a href="misc-css-loaders.html">CSS Loaders</a></li>
                                <li><a href="misc-spinkit.html">Spinkit</a></li>
                                <li><a href="misc-tree-view.html">Tree View</a></li>
                                <li><a href="misc-clipboard.html">Clipboard</a></li>
                                <li><a href="misc-x-editable.html">X-Editable</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-warning-window"></i>
                                <span class="menu-title">Grid System</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="grid-bootstrap.html">Bootstrap Grid</a></li>
                                <li><a href="grid-liquid-fixed.html">Liquid Fixed</a></li>
                                <li><a href="grid-match-height.html">Match Height</a></li>
                                <li><a href="grid-masonry.html">Masonry</a></li>

                            </ul></li>

                        <li class="list-divider"></li>

                        <!--Category name-->
                        <li class="list-header">More</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-computer-secure"></i>
                                <span class="menu-title">App Views</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="app-file-manager.html">File Manager</a></li>
                                <li><a href="app-users.html">Users</a></li>
                                <li><a href="app-users-2.html">Users 2</a></li>
                                <li><a href="app-profile.html">Profile</a></li>
                                <li><a href="app-calendar.html">Calendar</a></li>
                                <li><a href="app-taskboard.html">Taskboard</a></li>
                                <li><a href="app-chat.html">Chat</a></li>
                                <li><a href="app-contact-us.html">Contact Us</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-speech-bubble-5"></i>
                                <span class="menu-title">Blog Apps</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-list.html">Blog List</a></li>
                                <li><a href="blog-list-2.html">Blog List 2</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                                <li class="list-divider"></li>
                                <li><a href="blog-manage-posts.html">Manage Posts</a></li>
                                <li><a href="blog-add-edit-post.html">Add Edit Post</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-mail"></i>
                                <span class="menu-title">Email</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="mailbox.html">Inbox</a></li>
                                <li><a href="mailbox-message.html">View Message</a></li>
                                <li><a href="mailbox-compose.html">Compose Message</a></li>
                                <li><a href="mailbox-templates.html">Email Templates</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-file-html"></i>
                                <span class="menu-title">Other Pages</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-invoice.html">Invoice</a></li>
                                <li><a href="pages-search-results.html">Search Results</a></li>
                                <li><a href="pages-faq.html">FAQ</a></li>
                                <li><a href="pages-pricing.html">Pricing<span class="label label-success pull-right">New</span></a></li>
                                <li class="list-divider"></li>
                                <li><a href="pages-404-alt.html">Error 404 alt</a></li>
                                <li><a href="pages-500-alt.html">Error 500 alt</a></li>
                                <li class="list-divider"></li>
                                <li><a href="pages-404.html">Error 404 </a></li>
                                <li><a href="pages-500.html">Error 500</a></li>
                                <li><a href="pages-maintenance.html">Maintenance</a></li>
                                <li><a href="pages-login.html">Login</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-password-reminder.html">Password Reminder</a></li>
                                <li><a href="pages-lock-screen.html">Lock Screen</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-photo-2"></i>
                                <span class="menu-title">Gallery</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="gallery-columns.html">Columns</a></li>
                                <li><a href="gallery-justified.html">Justified</a></li>
                                <li><a href="gallery-nested.html">Nested</a></li>
                                <li><a href="gallery-grid.html">Grid</a></li>
                                <li><a href="gallery-carousel.html">Carousel</a></li>
                                <li class="list-divider"></li>
                                <li><a href="gallery-slider.html">Slider</a></li>
                                <li><a href="gallery-default-theme.html">Default Theme</a></li>
                                <li><a href="gallery-compact-theme.html">Compact Theme</a></li>
                                <li><a href="gallery-grid-theme.html">Grid Theme</a></li>

                            </ul></li>


                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-tactic"></i>
                                <span class="menu-title">Menu Level</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="#">Second Level Item</a></li>
                                <li><a href="#">Second Level Item</a></li>
                                <li><a href="#">Second Level Item</a></li>
                                <li class="list-divider"></li>
                                <li>
                                    <a href="#">Third Level<i class="arrow"></i></a>

                                    <!--Submenu-->
                                    <ul class="collapse" aria-expanded="false">
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Third Level<i class="arrow"></i></a>

                                    <!--Submenu-->
                                    <ul class="collapse" aria-expanded="false">
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li class="list-divider"></li>
                                        <li><a href="#">Third Level Item</a></li>
                                        <li><a href="#">Third Level Item</a></li>
                                    </ul>
                                </li>
                            </ul></li>


                        <li class="list-divider"></li>

                        <!--Category name-->
                        <li class="list-header">Extras</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-happy"></i>
                                <span class="menu-title">Icons Pack</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="icons-ionicons.html">Ion Icons</a></li>
                                <li><a href="icons-themify.html">Themify</a></li>
                                <li><a href="icons-font-awesome.html">Font Awesome</a></li>
                                <li><a href="icons-flagicons.html">Flag Icon CSS</a></li>
                                <li><a href="icons-weather-icons.html">Weather Icons</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li>
                            <a href="#" data-original-title="" title="">
                                <i class="demo-pli-medal-2"></i>
                                <span class="menu-title">
												PREMIUM ICONS
												<span class="label label-danger pull-right">BEST</span>
											</span>
                            </a>

                            <!--Submenu-->

                            <ul class="collapse" aria-expanded="false">
                                <li><a href="premium-line-icons.html">Line Icons Pack</a></li>
                                <li><a href="premium-solid-icons.html">Solid Icons Pack</a></li>

                            </ul></li>

                        <!--Menu list item-->
                        <li>
                            <a href="helper-classes.html" data-original-title="" title="">
                                <i class="demo-pli-inbox-full"></i>
                                <span class="menu-title">Helper Classes</span>
                            </a>
                        </li>                                </ul>


                    <!--Widget-->
                    <!--================================-->
                    <div class="mainnav-widget">

                        <!-- Show the button on collapsed navigation -->
                        <div class="show-small">
                            <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server" style="" data-original-title="" title="">
                                <i class="demo-pli-monitor-2"></i>
                            </a>
                        </div>

                        <!-- Hide the content on collapsed navigation -->

                        <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                            <ul class="list-group">
                                <li class="list-header pad-no mar-ver">Server Status</li>
                                <li class="mar-btm">
                                    <span class="label label-primary pull-right">15%</span>
                                    <p>CPU Usage</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                            <span class="sr-only">15%</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <span class="label label-purple pull-right">75%</span>
                                    <p>Bandwidth</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                            <span class="sr-only">75%</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View Details</a></li>
                            </ul>
                        </div></div>
                    <!--================================-->
                    <!--End widget-->

                </div>
                <div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 3003px; transform: translate(0px, 0px);"></div></div></div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>