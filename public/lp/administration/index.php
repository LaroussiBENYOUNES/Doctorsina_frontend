<?php	
				$racine=$_SERVER['DOCUMENT_ROOT'] ;
				$fichier = $racine.'/etoubib/lp/classe.php';
				if (file_exists($fichier)){
				include($fichier);}
				else {echo " Ce Fichier n`existe pas sur le Serveur ";}
				
if (isset($_POST['categ']) AND !empty($_POST['categ']) ){
$mys = new Mysql();
$mys->__ajouter__categ($_POST['categ']);
}
if (isset($_GET['id_categ']) AND !empty($_GET['id_categ']) ){
$mysd = new Mysql();
$mysd->__delete__categ($_GET['id_categ']);
}
?>
<form action="index.php" method="post">
ajouter nouvelle categorie : <input type='text'  name='categ'>
<input type="submit" value="Ajouter">
</form>
<?php
	echo"<div id='list__categ'><table>";
	$mys = new Mysql();
	$mys->__list__categ();
	echo"</table></div>";
?>

