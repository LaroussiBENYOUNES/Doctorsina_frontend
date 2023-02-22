<?php 
				$racine=$_SERVER['DOCUMENT_ROOT'] ;
				$fichier = $racine.'/etoubib/lp/classe.php';
				if (file_exists($fichier)){
				include($fichier);}
				else {echo " Ce Fichier n`existe pas sur le Serveur ";}
$mys = new Mysql_carte();

//echo $_POST['long'];
if (isset($_POST['lat'], $_POST['long'], $_POST['nom'], $_POST['categ']) AND !empty($_POST['nom']) AND !empty($_POST['categ']))
$mys->__inscription($_POST['nom'],$_POST['categ'],$_POST['lat'],$_POST['long']);
else echo"<script>alert('remplir tout le formulaire');</script>";
//header('Location: ../index.php?idm=2');
	?> 