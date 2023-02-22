<!--Header-->
        @include("layouts.exeption_template.header")
        <head>
        <script>

                function _type() {
                       
                        select = document.getElementById('type_user')
                        var options = select.options;
                        var idtype = options.selectedIndex
                        
                        if(idtype == 1)
                                document.getElementById("group_med").style.display = "none";
                        else 
                                document.getElementById("group_med").style.display = "block";
                }
        
            </script>
        </head>
<!-- /header -->

<body>
<!--Header-->
        @include("layouts.exeption_template.top")
<!-- /header -->

<!--Header-->
        {{--@include("layouts.exeption_template.slider")--}}
<!-- /header -->

<!--content-->
        @yield('content')
{{--			@include("layouts.exeption_template.content")--}}
<!-- /content -->

<!--Header-->
        @include("layouts.exeption_template.footer")
<!-- /header -->
</body>
</html>