    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="{{ url(config('quickadmin.route')) }}" class="site_title"><i class="fa fa-user-md"></i> <span>DoctorSina©</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu prile quick info -->
            <div class="profile">
                <div class="profile_pic">
                    <img src="{{ url('quickadmin') }}/images/img.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome Dr,</span>
                    <h2>L. BenYounes</h2>
                </div>
            </div>
            <!-- /menu prile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu"
                        data-keep-expanded="false"
                        data-auto-scroll="true"
                        data-slide-speed="200">
                        @if(Auth::user()->role_id == config('quickadmin.defaultRole'))
                            <li @if(Request::path() == config('quickadmin.route').'/menu') class="active" @endif>
                                <a href="{{ url(config('quickadmin.route').'/menu') }}">
                                    <i class="fa fa-list"></i>
                                    <span class="title">{{ trans('quickadmin::admin.partials-sidebar-menu') }}</span>
                                </a>
                            </li>
                            <li @if(Request::path() == 'users') class="active" @endif>
                                <a href="{{ url('users') }}">
                                    <i class="fa fa-users"></i>
                                    <span class="title">{{ trans('quickadmin::admin.partials-sidebar-users') }}</span>
                                </a>
                            </li>
                            <li @if(Request::path() == 'roles') class="active" @endif>
                                <a href="{{ url('roles') }}">
                                    <i class="fa fa-gavel"></i>
                                    <span class="title">{{ trans('quickadmin::admin.partials-sidebar-roles') }}</span>
                                </a>
                            </li>
                            <li @if(Request::path() == config('quickadmin.route').'/actions') class="active" @endif>
                                <a href="{{ url(config('quickadmin.route').'/actions') }}">
                                    <i class="fa fa-users"></i>
                                    <span class="title">{{ trans('quickadmin::admin.partials-sidebar-user-actions') }}</span>
                                </a>
                            </li>
                        @endif
                        @foreach($menus as $menu)
                            @if($menu->menu_type != 2 && is_null($menu->parent_id))
                                @if(Auth::user()->role->canAccessMenu($menu))
                                    <li @if(isset(explode('/',Request::path())[1]) && explode('/',Request::path())[1] == strtolower($menu->name)) class="active" @endif>
                                        <a href="{{ route(config('quickadmin.route').'.'.strtolower($menu->name).'.index') }}">
                                            <i class="fa {{ $menu->icon }}"></i>
                                            <span class="title">{{ $menu->title }}</span>
                                        </a>
                                    </li>
                                @endif
                            @else
                                @if(Auth::user()->role->canAccessMenu($menu) && !is_null($menu->children()->first()) && is_null($menu->parent_id))
                                    <li>
                                        <a href="#">
                                            <i class="fa {{ $menu->icon }}"></i>
                                            <span class="title">{{ $menu->title }}</span>
                                            {{--<span class="fa arrow"></span>--}}
                                            <span class="fa fa-chevron-down"></span>
                                        </a>
                                        <ul class="nav child_menu">
                                            @foreach($menu['children'] as $child)
                                                @if(Auth::user()->role->canAccessMenu($child))
                                                    <li
                                                            @if(isset(explode('/',Request::path())[1]) && explode('/',Request::path())[1] == strtolower($child->name)) class="active active-sub" @endif>
                                                        <a href="{{ route(strtolower(config('quickadmin.route').'.'.$child->name).'.index') }}">
                                                            <i class="fa {{ $child->icon }}"></i>
                                                            <span class="title">
                                                                {{ $child->title  }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                        {{--<li>--}}
                            {{--{!! Form::open(['url' => 'logout']) !!}--}}
                            {{--<button type="submit" class="logout">--}}
                                {{--<i class="fa fa-sign-out fa-fw"></i>--}}
                                {{--<span class="title">{{ trans('quickadmin::admin.partials-sidebar-logout') }}</span>--}}
                            {{--</button>--}}
                            {{--{!! Form::close() !!}--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>


<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title={{trans('quickadmin::admin.partials-sidebar-settings')}}>
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title={{trans('quickadmin::admin.partials-sidebar-FullScreen')}}>
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title={{trans('quickadmin::admin.partials-sidebar-Lock')}}>
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a  href="{{ url('logout') }}" data-toggle="tooltip" data-placement="top" title={{trans('quickadmin::admin.partials-sidebar-logout')}}>
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->