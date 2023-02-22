<?php 
				$racine=$_SERVER['DOCUMENT_ROOT'] ;
				$fichier = $racine.'/etoubib/lp/classe.php';
				if (file_exists($fichier)){
				include($fichier);}
				else {echo " Ce Fichier n`existe pas sur le Serveur ";}
				
$mys = new Mysql_carte();
if(!empty($_POST['inscrit']))
{

//echo $_POST['long'];
if (isset($_POST['lat'], $_POST['long'], $_POST['nom'], $_POST['categ']) AND !empty($_POST['nom']) AND !empty($_POST['categ']))
{
$res = $mys->__inscription($_POST['nom'],$_POST['categ'],$_POST['lat'],$_POST['long']);
					
					
					if (!empty($res)) // en cas d'erreur lors de l'execution 
					{
						$mess = "query successful";
						$bgcolor = "#00ECB1";
						$bordercolor = "#00CC99";
					}	
					else
					{
						$mess = "erreur lors de l'execution de la requête";
						$bgcolor = "#FFC1C1";
						$bordercolor = "#FF5959";
					}	
}
else
{
						$mess = "erreur lors de l'execution de la requête";
						$bgcolor = "#FFC1C1";
						$bordercolor = "#FF5959";


};
//header('Location: ../index.php?idm=2');
}
	?> 

<!DOCTYPE html>
<html>
  <head>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<link rel="stylesheet" type="text/css" href="../lp/map_style.css">
	
	<script>
	function zoomch() {
	zoomCourant = map.getZoom();
	switch (zoomCourant) {
 case 0:
 marge=32;
 break;
 case 1:
 marge=16;
 break;
 case 2:
 marge=8;
 break;
 case 3:
 marge=4;
 break;
 case 4:
 marge=2;
 break;
 case 5:
 marge=1;
 break;
 case 6:
  marge=0.5;
 break;
 case 7:
 marge=0.25;
 break;
 case 8:
 marge=0.125;
 break;
 case 9:
 marge=0.064;
 break;
 case 10:
 marge=0.032;
 break;
 case 11:
 marge=0.016;
 break;
 case 12:
 marge=0.008;
 break;
 case 13:
 marge=0.004;
 break;
 case 14:
 marge=0.002;
 break;
 case 15:
 marge=0.001;
 break;
 case 16:
 marge=0.0005;
 break;
 case 17:
 marge=0.00025;
 break;
 case 18:
 marge=0.000125;
 break;
 case 19:
 marge=0.0000625;
 break;
 case 20:
 marge=0.00003125;
 break;
 case 21:
 marge=0.0000106;
 break;

}

	}
	 function update() {
	 
	var center = map.getCenter();
		var lng = center.lng();
		var lat = center.lat();
		
	if(enregister==false){	
		var lat2 = center.lat() + marge;
		marker2.setPosition(new google.maps.LatLng(lat, lng));
		infowindow.setPosition(new google.maps.LatLng(lat2, lng));
	}
	else{
	updatewindow();
	}
	}
	
	function updatewindow() {
	
		var latiw= marker2.getPosition().lat() + marge ;
		var lngiw= marker2.getPosition().lng();
		infowindow.setPosition(new google.maps.LatLng(latiw, lngiw));
		
	
	}
	
	function affiche() {
	alert(marker2.getPosition().lat());
	alert(marker2.getPosition().lng());
	
	}
	
	
	</script>
	

	
	 </head>
  <body>
  <table width="100%" border="0" cellpadding="0">
  <tr>
    <td>  <!-- <input type="button" value="Afficher" onClick="affiche();">--></td>

  </tr>
  <tr>
    <td>    <?php if (!empty($mess)){?>
            <table width="40%" border="0" align="center" cellpadding="6" cellspacing="0" style="border:1px solid <?php echo $bordercolor ; ?>">
              <tr bgcolor="<?php echo $bgcolor ; ?>">
                <td align="left"><?php echo $mess; ?></td>
              </tr>
            </table>
          <?php } ?>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

	<div id="content"></div>
    
	
	
	<form action="" method="post">
	 <p id="coordonner"> </p>
	 saisir votre nom: <input type='text'  name='nom'  value=''> </br>
	
	choisir votre  categorie: <select name="categ">
							  <option value=""></option>
							  
							  <?php
							  //include('../lp/classe.php');
							  //$mys = new Mysql_carte();
							  $mys->__select__categ();
							  ?>
							 </select>
	 
	  
	 <p> <input type="submit" name="inscrit" value="s'inscrire"> </p>
	</form>
	
	
		
	
	
	
		
		
	
	<script>
	
      var initialLocation;
      var tunisie = new google.maps.LatLng(34.18205277072746, 9.461568898266592);
      var lat2;
	  var lng2;
	  var latlng2;
	  var marker2;
      var map;
	  var cordonner;
	  var zoomCourant;
	  var marge=0.7;
	  var html_enr="<input type='button' value='modifier' onclick='modifier();'class='button_map' />";
	  var html_mod="<input type='button' value='enregistrer' onclick='enregistrer();' class='button_map'/>";
	  var enregister=false;
      var infowindow = new google.maps.InfoWindow({Width: '100'});
      var mapOptions = {
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
       
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, onError());
        navigator.geolocation.watchPosition(showPosition);
		
      } else {
        onError();
      }
	  
       
      function showPosition(position) {
        map = new google.maps.Map(document.getElementById("content"), mapOptions);
        
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
       
        initialLocation = new google.maps.LatLng(lat, lng);
        map.setCenter(initialLocation);
		marker2 = new google.maps.Marker({
                    map : map, 
                    position : initialLocation,
                    animation: google.maps.Animation.DROP,
				
					icon : "../lp/doctor.png",
                    draggable : true
                });

			map_addListener();
      }
	  
	function map_addListener() {
	
			google.maps.event.addListener(map, 'zoom_changed', zoomch);
			
			google.maps.event.addListener(map, 'bounds_changed', update);
			google.maps.event.addListener(marker2, 'drag', updatewindow);
			
			
			infowindow.setContent('Marquer votre adresse ' + html_mod);
			infowindow.setPosition(initialLocation);
			infowindow.open(map);
	}
	
	function enregistrer(){
	infowindow.setContent('Modifier votre adresse ' + html_enr);
	marker2.setDraggable(false);
	enregister=true;
	
	document.getElementById("coordonner").innerHTML = "<input type='hidden'  name='lat'  value='"+marker2.getPosition().lat()+"'> <input type='hidden'  name='long'  value='"+marker2.getPosition().lng()+"'>";
	
	}
	
	function modifier(){
	infowindow.setContent("Marker votre adresse " + html_mod);
	marker2.setDraggable(true);
	enregister=false;
	}
	
	
       
    function onError() {
        
        initialLocation = tunisie;
		marge=0.7;
        mapOptions.zoom = 6;
        map = new google.maps.Map(document.getElementById("content"), mapOptions);
        map.setCenter(initialLocation);
         marker2 = new google.maps.Marker({
                    map : map, 
                    position : initialLocation,
                    animation: google.maps.Animation.DROP,
					icon : "../lp/doctor.png",
                    draggable : true
                });
				
				map_addListener();
	}
	
    </script>
  </body>
</html>