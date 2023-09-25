<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Dashboard & Apps</li>
                    <li><a href="{{ url('/') }}"><i class="icon-Layout-4-blocks"><span class="path1">
                                </span><span class="path2"></span></i>
                            Dashboard</a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-utensils"><span class="path1"></span><span class="path2"></span></i> Build
                            Meals
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('build-food') }}"><i class="fa fa-utensils"><span
                                            class="path1"></span><span class="path2"></span></i> Build
                                    Meals</a></li>
                                    <li><a href="{{ url('build-food') }}"><i class="fa fa-shopping-cart"><span
                                        class="path1"></span><span class="path2"></span></i>My Shopping
                                List</a></li>
                            <li><a href="{{ url('build-food') }}"><i class="fa fa-search"><span
                                            class="path1"></span><span class="path2"></span></i> Meal
                                    History</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('set-your-goals') }}">
                            <i class="fa fa-trophy"><span class="path1">
                                </span><span class="path2"></span></i>
                            Set Your Goals
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('risk-assessment/result') }}">
                            <i class="fa fa-heart"><span class="path1">
                                </span><span class="path2"></span></i>
                            Your Scores
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('tele-monitoring') }}">
                            <i class="fa fa-tv"><span class="path1">
                                </span><span class="path2"></span></i>
                            Tele-Monitoring
                        </a>
                    </li>
{{-- 
                    <li>
                        <a href="{{ url('set-your-goals') }}">
                            <i class="fa fa-dumbbell"><span class="path1">
                                </span><span class="path2"></span></i>
                            Physical Activities
                        </a>
                    </li> --}}

                </ul>
            </div>
        </div>
    </section>
    <div class="sidebar-footer">
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><span class="icon-Settings-2"></span></a>
        <a href="mailbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><span
                class="icon-Mail"></span></a>
        <a href="{{ url('logout') }}" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span
                    class="path2"></span></span></a>
    </div>
</aside>
