@extends('layouts.exeption_template.homewithoutslider')

@section('content')
<!-- Content Start -->
			<div class="padd-vertical-45">
			    	<div class="container">
						<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
						<div id="map_canvas" style="height: 450px; width: 100%;">
							<script type="text/javascript"> 
								function init_map(){
									var myOptions = {zoom:10,center:new google.maps.LatLng(39.73910,-75.55262),
									mapTypeId: google.maps.MapTypeId.ROADMAP};
									map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
									marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(39.73910,-75.55262)});
									infowindow = new google.maps.InfoWindow({content:"<div class='noScroll'><b>Headquarter</b><br/>2880 Broadway<br/> New York</div>" });
									google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});
									infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
							</script>
						</div>
					</div>
				</div>
			<!-- Content End -->
@stop

