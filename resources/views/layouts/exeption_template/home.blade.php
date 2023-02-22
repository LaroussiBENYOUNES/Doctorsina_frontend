

<!--Header-->
	@include("layouts.exeption_template.header")
<!-- /header -->

<body>
		<!--Header-->
			@include("layouts.exeption_template.top")
		<!-- /header -->

		<!--Header-->
			@include("layouts.exeption_template.slider")
			@include("layouts.exeption_template.presentation")
			@include("layouts.exeption_template.smartservices")
			@include("layouts.exeption_template.services")
			@include("layouts.exeption_template.offres")
		<!-- /header -->

		<!--content
				@yield('content')
				@yield('presentation')
				@yield('services')
				@yield('offres')-->
		{{--@include("layouts.exeption_template.content")--}}
		<!-- /content -->

		<!--Header-->
			@include("layouts.exeption_template.footer")
		<!-- /header -->
</body>
</html>