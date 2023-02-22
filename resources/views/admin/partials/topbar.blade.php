
<!-- top navigation -->
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
			<div class="animated flipInY col-md-6 tile_stats_count navbar-center">
			<div class="">
				<h1 class="graph_title count green">
					Smart Medical Record
				</h1>
			</div>
			</div>

            <ul class="nav navbar-nav col-md-2 navbar-right">

                <li class="">
                    <a href="{{ url(config('quickadmin.homeRoute')) }}" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ url('quickadmin/') }}/images/img.jpg" alt="">
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li><a href="{{ url('/profile') }}">{{trans('quickadmin::admin.partials-sidebar-profile')}}</a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>{{trans('quickadmin::admin.partials-sidebar-settings')}}</span>
                            </a>
                        </li>
						<!--<li>{{trans('quickadmin::admin.partials-sidebar-chooselanguage')}}</li>
						<li>
							<select class="form-control">
								<option>{{trans('quickadmin::admin.partials-sidebar-chooselanguage')}}</option>
								<option>Eglish</option>
								<option>Chinees</option>
								<option>Turkish</option>
								<option>عربي</option>
							</select>
						</li>-->
                        <li>
                            <a href="javascript:;">{{trans('quickadmin::admin.partials-sidebar-help')}}</a>
                        </li>
                        <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> {{ trans('quickadmin::admin.partials-sidebar-logout') }}</a>
                        </li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                        <li>
                            <a>
                                            <span class="image">
                                        <img src="images/doctorsina.ico" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                            <span class="image">
                                        <img src="images/doctorsina.ico" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                            <span class="image">
                                        <img src="images/doctorsina.ico" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                            <span class="image">
                                        <img src="images/doctorsina.ico" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong><a href="#">See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->