<!doctype html>

<html lang="en">
   <head>
		<title>Example with Google maps and filtering - Google maps jQuery plugin</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta http-equiv="content-language" content="en" />
		<meta name="author" content="Johan Säll Larsson" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="keywords" content="Google maps, jQuery, plugin, filtering" />
		<meta name="description" content="An example how to filter markers by different criterias" />
		<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
		<meta name="DC.title" content="Example with Google maps and filtering - Google maps jQuery plugin" />
		<meta name="DC.subject" content="Google maps;jQuery;plugin;filtering" />
		<meta name="DC.description" content="An example how to filter markers by different criterias" />
		<meta name="DC.creator" content="Johan Säll Larsson" />
		<meta name="DC.language" content="en" />
		<link type="text/css" rel="stylesheet" href="../css/960/min/960.css" />
		<link type="text/css" rel="stylesheet" href="../css/960/min/960_16_col.css" />
		<link type="text/css" rel="stylesheet" href="../css/normalize/min/normalize.css" />
		<link type="text/css" rel="stylesheet" href="../css/prettify/min/prettify.css" />
		<link type="text/css" rel="stylesheet" href="../css/style.css" />
		<script type="text/javascript" src="js/markerclustererplus-2.0.6/markerclusterer.min.js"></script>
		<script type="text/javascript" src="js/modernizr-2.0.6/modernizr.min.js"></script>
    </head>
    <body>
	
	<?php 
				$racine=$_SERVER['DOCUMENT_ROOT'] ;
				$fichier = $racine.'/etoubib/lp/classe.php';
				if (file_exists($fichier)){
				include($fichier);}
				else {echo " Ce Fichier n`existe pas sur le Serveur ";}
	?>	
$mys = new Mysql();

 ?> 
		<header class="dark">
			<div class="container_16">
				<h1><a href="/">CARTE ETOUBIB </a>VERSION TEST 1.0</h1>
			</div>
		</header>
		<div  style="width:100%;">
			<article class="grid_16" style=" float:left;width:100%;height:100%;">
				<div class="item rounded dark">
					<div id="map_canvas" class="map rounded"></div>
				</div>
				<div id="radios" class="item gradient rounded shadow" style="margin:10px;padding:5px 5px 5px 10px;position:absolute;width:15%;height:auto;"></div>
				<!--<div id="tags-control" class="item gradient rounded shadow" style="margin:5px;padding:5px 5px 5px 10px;">
					<label style="color:#555;font-size:12px; font-weight:bold;" for="tags">Filter by tag</label>
					<select id="tags" style="outline:none;"></select>
				</div>-->

			</article>
		</div>

		
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
		<script type="text/javascript" src="js/jquery-1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/underscore-1.2.2/underscore.min.js"></script>
		<script type="text/javascript" src="js/backbone-0.5.3/backbone.min.js"></script>
		<script type="text/javascript" src="js/prettify/prettify.min.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="ui/jquery.ui.map.js"></script>
		<script type="text/javascript">
            $(function() { 
				demo.add(function() {			
					$('#map_canvas').gmap({'disableDefaultUI':true}).bind('init', function(evt, map) { 
						//$('#map_canvas').gmap('addControl', 'tags-control', google.maps.ControlPosition.TOP_LEFT);
						//$('#map_canvas').gmap('addControl', 'radios', google.maps.ControlPosition.TOP_LEFT);
						var southWest = map.getBounds().getSouthWest();
						var northEast = map.getBounds().getNorthEast();
						var lngSpan = northEast.lng() - southWest.lng();
						var latSpan = northEast.lat() - southWest.lat();
						var images = ['http://google-maps-icons.googlecode.com/files/friends.png', 'http://google-maps-icons.googlecode.com/files/home.png', 'http://google-maps-icons.googlecode.com/files/girlfriend.png', 'http://google-maps-icons.googlecode.com/files/dates.png', 'http://google-maps-icons.googlecode.com/files/realestate.png', 'http://google-maps-icons.googlecode.com/files/apartment.png', 'http://google-maps-icons.googlecode.com/files/family.png'];
						//var tags = ['Medecins', 'Pharmacies', 'Dentiste', 'Opticiens', 'Cliniques', 'Hopitaux Universitaires', 'Hôpitaux de circonscription', 'Hopitaux Regionaux', 'Lobaratoires Analyses', 'Centres de Radiologie', 'PSYCHOLOGUES'];
						
						
						
						var tags = [<?php $mys->__creation_categ(); ?>];
						
						
						
						//$('#tags').append('<option value="all">All</option>');
						$.each(tags, function(i, tag) {
							//$('#tags').append(('<option value="{0}">{1}</option>').format(tag, tag));
							$('#radios').append(('<label style="margin-right:5px;display:block;"><input type="checkbox" style="margin-right:3px" value="{0}"/>{1}</label>').format(tag, tag));
						});
						
						
						// creation des markeures et des clusters
						<?php $mys->__affiche__marker(); ?>
						// fin création de markeures et des clusters
						
						
						
						$('input:checkbox').click(function() {
							$('#map_canvas').gmap('closeInfoWindow');
							$('#map_canvas').gmap('set', 'bounds', null);
							var filters = [];
							$('input:checkbox:checked').each(function(i, checkbox) {
								filters.push($(checkbox).val());
							});
							if ( filters.length > 0 ) {
								$('#map_canvas').gmap('find', 'markers', { 'property': 'tags', 'value': filters, 'operator': 'OR' }, function(marker, found) {
									if (found) {
										$('#map_canvas').gmap('addBounds', marker.position);
									}
									marker.setVisible(found); 
									
								});
							} else {
								$.each($('#map_canvas').gmap('get', 'markers'), function(i, marker) {
									$('#map_canvas').gmap('addBounds', marker.position);
									marker.setVisible(true);
											
								});
							}
						});
						
						$("#tags").change(function() {
							$('#map_canvas').gmap('closeInfoWindow');
							$('#map_canvas').gmap('set', 'bounds', null);
							if ( $(this).val() == 'all' ) {
								$.each($('#map_canvas').gmap('get', 'markers'), function(i, marker) {
									marker.setVisible(true); 
								});
							} else {
								$('#map_canvas').gmap('find', 'markers', { 'property': 'tags', 'value': $(this).val() }, function(marker, found) {
									if (found) {
										$('#map_canvas').gmap('addBounds', marker.position);
									}
									marker.setVisible(found); 
								});
							}
						});

						
					}); 
				}).load();
			});
        </script>
    
	</body>
</html>