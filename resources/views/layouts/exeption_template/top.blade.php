
<body class="bg1">

<!-- site preloader start -->

<!-- site preloader end -->




    <!--New code Login start-->
    <div class="panel-body login-box">
        <a class="close-login" href="#"><i class="fa fa-times"></i></a>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>{{ trans('quickadmin::auth.whoops') }}</strong> {{ trans('quickadmin::auth.some_problems_with_input') }}
                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal"
              role="form"
              method="POST"
              action="{{ url('login') }}">
            <div class="container">
                <div class="login-controls">
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">

                    <div class="inline-block">
                        <span class="fa fa-user-md inside-input" aria-hidden="true"></span>
                        <input type="email"
                               class="txt-box-login round_corner"
                               name="email"
                               id="username"
                               placeholder="email"
                               value="{{ old('email') }}">

                        <span class="fa fa-key inside-input" aria-hidden="true"></span>
                        <input type="password"
                               class="txt-box-login round_corner"
                               placeholder="Password"
                               name="password">

                        <button type="submit"
                                class="btn1"
                                style="margin-right: 15px;">
                            {{ trans('quickadmin::auth.login-btnlogin') }}
                        </button>
                    </div>

                    <div class="checkbox checkbox-primary col-md-8">
                        <input id="checkbox2"
                               class="styled"
                               type="checkbox">
                        <label for="checkbox2">
                            {{ trans('quickadmin::auth.login-remember_me') }}
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--New code Login end-->

    <!-- Header Start -->
    <div id="headWrapper" class="clearfix">
        <!-- top bar start -->
        <div class="top-bar">

			<br>
            <div class="container">
                <div class="row">
                    <div class="cell-5">
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope"></i>contact@doctorsina.net</a></li>
                            <li><span><i class="fa fa-phone"></i> Call Us: +216 58 87 46 41</span></li>
                        </ul>
                    </div>
                    <div class="cell-7 right-bar">
                        <ul class="right">
                      
                            <li><a href="#"><i class="fa fa-sitemap"></i>Site Map</a></li>

							@if (Auth::check())
								<li><a href="{{ url('/admin') }} "><i class="fa fa-user"></i>{{ auth()->user()->name }}</a></li>
								<li><a href="{{ url('/admin') }} "><i class="fa fa-user"></i>Dashboard</a></li>
							@else 
								<li><a href="{{ url('/register') }}"><i class="fa fa-user"></i>Register</a></li>
								<li><a href="#" class="login-btn"><i class="fa fa-unlock-alt"></i> Login</a></li>
							@endif
							
			
							
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- top bar end -->

        <!-- Logo, global navigation menu and search start -->
			    <header class="top-head top-head-4" data-sticky="false">
		
				
					    <div class="nav-4">
						    <div class="gray-nav">							
							    <!-- top navigation menu start -->
								<div class="container">
							    <nav class="top-nav mega-menu news">
								    <ul>
										<li class="logo"><a href="{{ url('/') }}"></a>
										</li>
										<li class="selected"><a href="#"><span>Home</span></a>
								      		<ul>
												@if (!Auth::check())
													<li><a href="{{ url('/login') }}" >login</a></li>
												@else 
													<li><a href="{{ route('logout') }}">logout</a></li>
												@endif
												<li class="selected"><a href="#">Home News Magazine</a></li>
												<li><a href="{{ url('/map') }}"><span>Geolocalisation</span></a></li>
											</ul>
										</li>
								      <li><a href="{{ url('/video') }}"><span>Presentation</span></a></li>
								      <li><a href="{{ url('/partners') }}"><span>Partners</span></a>
								
								      </li>
								      <li><a href="#"><span>E-Health</span></a>
								
								      </li>
								      <li><a href="#"><span>Magazine</span></a>
								      
								      </li>
								      <li><a href="{{ url('/contact') }}"><span>Contact</span></a>
													
								      </li>
								      <li><a href="#"><span>About-Us</span></a>
											<ul>
												<li><a href="{{ url('/aboutus') }}">About Us</a></li>
												<li><a href="{{ url('/ourteam') }}">Our team</a></li>
										      	<li><a href="{{ url('/privacy') }}">Privacy policy</a></li>
										      	<li><a href="{{ url('/terms') }}">Terms of use</a></li>
												
											</ul>
										</li>
								      <li><a href="{{ url('/oursolution') }}"><span>Our Solutions</span></a>
								      </li>
								    </ul>
							    </nav>
							    <!-- top navigation menu end -->
</div>
	
							</div>
					    </div>
				   
			    </header>
			    <!-- Logo, Global navigation menu and search end -->


    <!-- Header End -->