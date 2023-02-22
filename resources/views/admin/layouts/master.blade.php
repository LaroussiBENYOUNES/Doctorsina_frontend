@include('admin.partials.header')
@include('admin.partials.sidebar')
@include('admin.partials.topbar')

    <div class="right_col" role="main">
        <div class="page-container">
            <div class="page-content-wrapper">
                <div class="page-content">
                    {{--<h3 class="page-title">--}}
                        {{--{{ preg_replace('/([a-z0-9])?([A-Z])/','$1 $2',str_replace('Controller','',explode("@",class_basename(app('request')->route()->getAction()['controller']))[0])) }}--}}
                    {{--</h3>--}}
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">

                            @if (Session::has('message'))
                                <div class="note note-info">
                                    <p>{{ Session::get('message') }}</p>
                                </div>
                            @endif

                            @yield('content')

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="scroll-to-top"
             style="display: none;">
            <i class="fa fa-arrow-up"></i>
        </div>
    </div>
@include('admin.partials.footer')
@include('admin.partials.javascripts')

@yield('javascript')


