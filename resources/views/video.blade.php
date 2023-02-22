@extends('layouts.exeption_template.homewithoutslider')

@section('content')
<!-- Content Start -->

			<div id="contentWrapper">
				<div class="page-title title-1">
					<div class="container">
						<div class="row">
							<div class="cell-12">
								<h1 class="fx" data-animate="fadeInLeft">Video <span>Presentation</span></h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><span>Video</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="sectionWrapper">
					<div class="container">
						<div class="fx" data-animate="fadeInUp">
							<h3 class="block-head">Introduction</h3>
							<iframe width="100%" height="600px" src="https://www.youtube.com/embed/uWYXdxpHjms" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
							</iframe>
						</div>
					</div>	
						
				</div>
			</div>
			<!-- Content End -->
@stop

