<?php
session_start();

include('classe.php');
$mys = new Mysqlmap(); 
$getcpte = new cabinet_docteur(); // création d'un objet cabinet
$getuser = new membre(); // création d'un objet cabinet


$ligne_update_p_generaux = "none";  // le formulaire update par défaut non affiché
$ligne_p_generaux = "inherit";  //les informations par défaut seront affichés

$ligne_update1 = "inherit"; //afficher lien modifier p.généraux
$ligne_update2 = "inherit"; //afficher lien modifier password sec
$ligne_update3 = "inherit"; //afficher lien modifier password doc


$ligne_p_confidentiel_sec = "none";  // le formulaire update password sec par défaut non affiché
$ligne_p_confidentiel_doc = "none";  // le formulaire update password doc par défaut non affiché


if (!empty($_POST['save_update_passwd_sec'])) //update mot de passe sécrétaire
{

	$getuser->update_user_sec($_SESSION['id_cabinet']);
	if (!empty($getuser->mess_error)) // en cas d'erreur lors de l'execution 
		{
			$mess_update_passwd_sec = $getuser->mess_error;
			$bgcolor = "#FFC1C1";
			$bordercolor = "#FF5959";
			$ligne_p_confidentiel_sec = "inherit";
			$ligne_update2 = "none";
		}	
	else
		{
			$mess_update_passwd_sec = $getuser->mess_ok;
			$bgcolor = "#00ECB1";
			$bordercolor = "#00CC99";
		}


}

if (!empty($_POST['save_update_passwd_doc'])) //update mot de passe docteur
{

	$getuser->update_user_doc($_SESSION['id_cabinet']);
	if (!empty($getuser->mess_error)) // en cas d'erreur lors de l'execution 
		{
			$mess_update_passwd_doc = $getuser->mess_error;
			$bgcolor = "#FFC1C1";
			$bordercolor = "#FF5959";
			$ligne_p_confidentiel_doc = "inherit";
			$ligne_update3 = "none";
		}	
	else
		{
			$mess_update_passwd_doc = $getuser->mess_ok;
			$bgcolor = "#00ECB1";
			$bordercolor = "#00CC99";
		}
}


if (!empty($_POST['save_update'])) //update paramètres généraux
{
	
	if(!empty($_POST['txt_email']) )
	{
		$existe_email = $getcpte->get_cabinet_email_id($_POST['txt_email'],$_SESSION['id_cabinet']); // vérifier l'existance de l'email

		if(empty($existe_email))
			{
				
				$getcpte->update_cabinet($_SESSION['id_cabinet']); //update table cabinet par id cabinet
				
				if (!empty($getcpte->mess_error)) // en cas d'erreur lors de l'execution 
					{
						$mess = $getcpte->mess_error;
						$bgcolor = "#FFC1C1";
						$bordercolor = "#FF5959";
						$ligne_update_p_generaux = "inherit";
						$ligne_p_generaux = "none";
						$ligne_update1 = "none";
					}	
				else
					{
						$mess = $getcpte->mess_ok;
						$bgcolor = "#00ECB1";
						$bordercolor = "#00CC99";
					}
			} // fin empty($existe_email))
		
		else  //if(empty($existe_email)) existe email
			{
				$mess = "prière de changer votre email , email existant.";
				$bgcolor = "#FFC1C1";
				$bordercolor = "#FF5959";
				$ligne_update_p_generaux = "inherit";
				$ligne_p_generaux = "none";
				$ligne_update1 = "none";
			}

	}// fin if(!empty($_POST['txt_email']) )
	else
	{
		$mess = "vérifier vos champs.";
		$bgcolor = "#FFC1C1";
		$bordercolor = "#FF5959";
		$ligne_update_p_generaux = "inherit";
		$ligne_p_generaux = "none";
		$ligne_update1 = "none";
	}

}// fin if (!empty($_POST['save_update']))


$getcpte->get_cabinet($_SESSION['id_cabinet']); //récupérer les donn�es de la table cabinet par id cabinet
if($getcpte->id_specialite == -1)
	{
		$colonne_label_autre = "inherit";
		$colonne_champ_autre = "inherit";
	}
else
	{
		$colonne_label_autre = "none";
		$colonne_champ_autre = "none";
	}
 ?>
<script language="javascript" src="../js/jquery.js"></script><!-- bibliotheque jquery --> 
<script language="javascript" src="../js/jquery.maskedinput-1.3.min.js"></script><!-- maskedinput --> 
<script language="javascript" src="../js/filtre_date_cin.js"></script><!-- maskedinput : filtrage des dates,cin --> 

<script type="text/javascript">
function affiche_update_p_generaux() //affiche le formulaire si vous voulez modifier 
{
		document.getElementById("ligne_p_generaux").style.display = "none";
		document.getElementById("lien_update1").style.display = "none";
		document.getElementById("lien_update2").style.display = "inherit";
		document.getElementById("lien_update3").style.display = "inherit";
		document.getElementById("ligne_update_p_generaux").style.display = "inherit";
		document.getElementById("ligne_p_confidentiel_sec").style.display = "none";
		document.getElementById("ligne_p_confidentiel_doc").style.display = "none";
		//document.getElementById("ligne_mess_sec").style.display = "none";
		//document.getElementById("ligne_mess_doc").style.display = "none";
}
function affiche_p_genraux() //affiche les paramètres généraux si on click au boutton annuler
{
		document.getElementById("ligne_p_generaux").style.display = "inherit";
		document.getElementById("lien_update1").style.display = "inherit";
		document.getElementById("ligne_update_p_generaux").style.display = "none";
}

function affiche_update_p_confidentiel_sec() //affiche le formulaire si vous voulez modifier le mot de passe
{
		document.getElementById("lien_update2").style.display = "none";
		document.getElementById("lien_update3").style.display = "inherit";
		document.getElementById("lien_update1").style.display = "inherit";
		
		document.getElementById("ligne_p_confidentiel_sec").style.display = "inherit";
		document.getElementById("ligne_p_confidentiel_doc").style.display = "none";
		//document.getElementById("ligne_mess_doc").style.display = "none";
		document.getElementById("ligne_update_p_generaux").style.display = "none";
		document.getElementById("ligne_p_generaux").style.display = "inherit";
}

function affiche_update_p_confidentiel_doc() //affiche le formulaire si vous voulez modifier le mot de passe
{
		document.getElementById("lien_update3").style.display = "none";
		document.getElementById("lien_update1").style.display = "inherit";
		document.getElementById("lien_update2").style.display = "inherit";
		document.getElementById("ligne_p_confidentiel_doc").style.display = "inherit";
		document.getElementById("ligne_p_confidentiel_sec").style.display = "none";
		//document.getElementById("ligne_mess_sec").style.display = "none";
		document.getElementById("ligne_update_p_generaux").style.display = "none";
		document.getElementById("ligne_p_generaux").style.display = "inherit";
}


function affiche_p_confidentiel_sec() //rien n'afficher si on click au boutton annuler du paramètre confidentiel
{
		document.getElementById("lien_update2").style.display = "inherit";
		document.getElementById("ligne_p_confidentiel_sec").style.display = "none";
		//document.getElementById("ligne_mess_sec").style.display = "none";
}

function affiche_p_confidentiel_doc() //rien n'afficher si on click au boutton annuler du paramètre confidentiel
{
		document.getElementById("lien_update3").style.display = "inherit";
		document.getElementById("ligne_p_confidentiel_doc").style.display = "none";
		//document.getElementById("ligne_mess_doc").style.display = "none";
}

function affiche_autre_specialite()
{
	
				sel = document.getElementById("specialite");
				specialite = sel.options[sel.selectedIndex].value;
	
	if	(specialite == -1)
		{
			document.getElementById("line_label_autre").style.display = "inherit";
			document.getElementById("line_champ_autre").style.display = "inherit";
		}
	else
		{
			document.getElementById("line_label_autre").style.display = "none";
			document.getElementById("line_champ_autre").style.display = "none";
		}
}


</script>
<script type="text/javascript">
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


<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

<!-- DEBUT css pour RDV-map (selmen) -->
		<link type="text/css" rel="stylesheet" href="../css/960/min/960.css" />
		<link type="text/css" rel="stylesheet" href="../css/960/min/960_16_col.css" />
		<link type="text/css" rel="stylesheet" href="../css/normalize/min/normalize.css" />
		<link type="text/css" rel="stylesheet" href="../css/prettify/min/prettify.css" />
		<link type="text/css" rel="stylesheet" href="../css/style33.css" />
		<!-- carte map  -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<link rel="stylesheet" type="text/css" href="../map_style.css">
	
<!-- fin carte  -->
		<!--FIN css pour RDV-map (selmen) -->
		
		<!-- DEBUT JS pour RDV-map (selmen) -->
		<script type="text/javascript" src="js/markerclustererplus-2.0.6/markerclusterer.min.js"></script>
		<script type="text/javascript" src="js/modernizr-2.0.6/modernizr.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
		<script type="text/javascript" src="js/jquery-1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/underscore-1.2.2/underscore.min.js"></script>
		<script type="text/javascript" src="js/backbone-0.5.3/backbone.min.js"></script>
		<script type="text/javascript" src="js/prettify/prettify.min.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="ui/jquery.ui.map.js"></script>
		<!-- DEBUT JS pour RDV-map (selmen) -->

<link href="css/style.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellpadding="4" cellspacing="4">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0">
      <tr>
        <td align="left" class="titpass" >Paramètres généraux du compte </td>
        <td align="right" class="view_more" ><a href="#" onclick="affiche_update_p_generaux()" class="view_more" id="lien_update1" style="display:<?php echo $ligne_update1; ?>">modifier</a></td>
      </tr>
      <tr>
        <td colspan="2" align="left" class="textgras" ><hr size="1" /></td>
      </tr>
      
    </table></td>
  </tr>
 <?php if (!empty($mess)){?>
  <tr>
    <td align="center">
            <table width="40%" border="0" cellpadding="6" cellspacing="0" style="border:1px solid <?php echo $bordercolor ; ?>">
              <tr bgcolor="<?php echo $bgcolor ; ?>">
                <td align="left" class="textgris"><?php echo $mess ; ?></td>
              </tr>
    </table>          </td>
  </tr>
  <?php } ?>
  <tr>
    <td><table width="100%" border="0" cellpadding="4" id="ligne_p_generaux" style="display:<?php echo $ligne_p_generaux; ?>" >
      <tr>
        <td align="left" class="textgras" ><strong>Prénom:</strong> <?php echo $getcpte->prenom_medecin; ?> </td>
      </tr>
      <tr>
        <td align="left" class="textgras"><strong>Nom de famille : </strong><?php echo $getcpte->nom_medecin; ?></td>
      </tr>
      <tr>
        <td align="left" class="textgras"><strong>Spécialité : </strong><?php if($getcpte->id_specialite == -1) echo $getcpte->autre_specialite; else echo htmlentities($getcpte->specialite); ?></td>
      </tr>
      <tr>
        <td align="left" class="textgras" ><strong>Observation :</strong> <?php echo $getcpte->observation; ?></td>
      </tr>
      <tr>
        <td align="left" class="textgras" ><strong>Code conventionnel avec CNAM  :</strong> <?php echo $getcpte->code_cnam; ?></td>
      </tr>
      <tr>
        <td align="left" class="textgras"><strong>Tél :</strong> <?php echo $getcpte->tel_cab; ?></td>
      </tr>
      <tr>
        <td align="left" class="textgras" ><strong>Fax :</strong> <?php echo $getcpte->fax_cab; ?></td>
      </tr>
      <tr>
        <td align="left" class="textgras" ><strong>Email :</strong> <?php echo $getcpte->email; ?></td>
      </tr>
      <tr>
        <td align="left" class="textgras" ><strong>Pays : </strong><?php echo $getcpte->pays; ?></td>
      </tr>
      <tr>
        <td align="left" class="textgras" ><strong>Ville :</strong> <?php echo $getcpte->ville; ?></td>
      </tr>
      <tr>
        <td align="left" class="textgras" ><strong>Adresse  :</strong> <?php echo $getcpte->adresse_cab; ?></td>
      </tr>
	  <tr>
        <td align="left" class="textgras" ><strong>site personelle  :</strong> <a href="<?php echo $getcpte->site_personelle; ?>" TARGET='_blank'><?php echo $getcpte->site_personelle; ?></a></td>
      </tr>
	  <tr>
        <td align="left" class="textgras" ><strong>réseaux sociaux  :</strong> 
		
		<strong>FB:</strong> <a href="<?php echo $getcpte->fb; ?>" TARGET='_blank'><?php echo $getcpte->fb; ?></a>
		<strong>tw:</strong> <a href="<?php echo $getcpte->tw; ?>" TARGET='_blank'><?php echo $getcpte->tw; ?></a>
		<strong>li:</strong> <a href="<?php echo $getcpte->li; ?>" TARGET='_blank'><?php echo $getcpte->li; ?></a>
		</td>
      </tr>
	  
	  
	  <tr>
	  <td align="left" class="textgras" >
	  <!-- AFFICHAGE RDV-map (selmen) -->
		
			
		
		<div id="content"></div>
       
     
		
			

	<!-- FIN AFFICHAGE RDV-map (selmen) -->
	  </td>
	  </tr>
    
	
	</table></td>
  </tr>
  <tr>
    <td>
	
	<form action="" name="frm1" method="post">
	<table width="100%" border="0" cellpadding="4" bgcolor="#E4E4E4" id="ligne_update_p_generaux" style="display:<?php echo $ligne_update_p_generaux; ?>" >
      <tr>
        <td align="left" class="textgras" >&nbsp;</td>
        <td align="left" class="textgras" >&nbsp;</td>
      </tr>
      <tr>
        <td align="left" class="textgras" >Prénom: </td>
        <td align="left" class="textgras" ><input name="txt_prenom" value="<?php echo $getcpte->prenom_medecin; ?>" type="text" size="64" /></td>
      </tr>
      <tr>
        <td align="left" class="textgras">Nom de famille : </td>
        <td align="left" class="textgras"><input name="txt_nom" value="<?php echo $getcpte->nom_medecin; ?>" type="text" size="64" /></td>
      </tr>
      <tr>
        <td align="left" class="textgras">Spécialité : </td>
        <td align="left" class="textgras">
		<select name="specialite" id="specialite" onchange="affiche_autre_specialite()">
		<option value="<?php echo $getcpte->id_specialite; ?>"><?php echo htmlentities($getcpte->specialite); ?></option>
            <?php 
	
				 $sql_specialite = "select * from cabinet_sp"; // liste des continents
				 $specialite = $Mysql_list->TabResSQL($sql_specialite);
				  foreach ($specialite as $Va_specialite)
					{
					   
					   echo '<option value="'.$Va_specialite['id_specialite'].'">'.$Va_specialite['specialite'].'</option>';
					}
			?>
        </select>		</td>
      </tr>
      <tr>
        <td align="left" class="textgras" ><span style="display:<?php echo $colonne_label_autre ?>" id="line_label_autre">Autre spécialité</span></td>
        <td align="left" class="textgras" ><input name="autre_specialite" style="display:<?php echo $colonne_champ_autre ?>"  id="line_champ_autre" size="64"  type="text"   aria-required="true" placeholder="Votre spécialité"  aria-label="Votre spécialité" value="<?php echo $getcpte->autre_specialite; ?>"/></td>
      </tr>
      <tr>
        <td align="left" class="textgras" >Observation : </td>
        <td align="left" class="textgras" ><input name="observation" id="observation" value="<?php echo $getcpte->observation; ?>" type="text" size="64" /></td>
      </tr>
      <tr>
        <td align="left" class="textgras" >Code conventionnel avec CNAM  :</td>
        <td align="left" class="textgras" ><input name="txt_code_cnam" id="code_cnam" value="<?php echo $getcpte->code_cnam; ?>" type="text" size="64" /></td>
      </tr>
      <tr>
        <td align="left" class="textgras">Tél :</td>
        <td align="left" class="textgras"><input name="txt_tel_cab" id="tel" value="<?php echo $getcpte->tel_cab; ?>" type="text" size="64" /></td>
      </tr>
      <tr>
        <td align="left" class="textgras" >Fax :</td>
        <td align="left" class="textgras" ><input name="txt_fax_cab" id="fax" value="<?php echo $getcpte->fax_cab; ?>" type="text" size="64" /></td>
      </tr>
      <tr>
        <td align="left" class="textgras" >Email :</td>
        <td align="left" class="textgras" ><input name="txt_email" value="<?php echo $getcpte->email; ?>" type="text" size="64" /></td>
      </tr>
      <tr>
        <td align="left" class="textgras" >Pays : </td>
        <td align="left" class="textgras" ><select name="pays" id="pays" style="width:390px" >
		  <option value="<?php echo $getcpte->id_pays; ?>"><?php echo $getcpte->pays; ?></option>
          <?php 
	
				 $sql_pays = "select * from p_pays"; // liste des continents
				 $pays = $Mysql_list->TabResSQL($sql_pays);
				  foreach ($pays as $Va_pays)
					{
					   
					   echo '<option value="'.$Va_pays['id_pays'].'">'.$Va_pays['pays'].'</option>';
					}
			?>
        </select></td>
      </tr>
      <tr>
        <td align="left" class="textgras" >Ville :</td>
        <td align="left" class="textgras" ><input name="txt_ville" value="<?php echo $getcpte->ville; ?>" type="text" size="64" /></td>
      </tr>
      <tr>
        <td align="left" class="textgras" >Adresse  :</td>
        <td align="left" class="textgras" ><input name="txt_adresse_cab" value="<?php echo $getcpte->adresse_cab; ?>" type="text" size="64" /></td>
      </tr>
	  
	  
	  
	  
	  
	  
	  
	  <tr>
        <td align="left" class="textgras" >site personelle  :</td>
        <td align="left" class="textgras" ><input name="site_personelle" value="<?php echo $getcpte->site_personelle; ?>" type="text" size="64" /></td>
      </tr>
	  
	  <tr>
        <td align="left" class="textgras" >réseaux sociaux  :</td>
        <td align="left" class="textgras" >FB: <input name="fb" value="<?php echo $getcpte->fb; ?>" type="text" size="20" /></td>
		<td align="left" class="textgras" >TW: <input name="tw" value="<?php echo $getcpte->tw; ?>" type="text" size="20" /></td>
		<td align="left" class="textgras" >LI: <input name="li" value="<?php echo $getcpte->li; ?>" type="text" size="20" /></td>
      </tr>
	 
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
      <tr>
        <td align="left" class="textgras" >&nbsp;</td>
        <td align="left" class="textgras" >&nbsp;</td>
      </tr>
      <tr>
        <td align="left" class="textgras" >&nbsp;</td>
        <td align="left" class="textgras" ><input type="image" src="../images/icones/enregistrer.jpg" name="save_update" value="Enregistrer les modifications" />
          <input type="image" src="../images/icones/annuler.jpg" name="annuler" height="23" value="Annuler" onclick="affiche_p_genraux()" /></td>
      </tr>
    </table>
	</form>	</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0">
      <tr>
        <td align="left" class="titpass" >Paramètres confidentielles du compte sécrétaire </td>
        <td align="right" class="view_more" ><a href="#" class="view_more" onclick="affiche_update_p_confidentiel_sec()" id="lien_update2" style="display:<?php echo $ligne_update2; ?>">modifier</a></td>
      </tr>
      <tr>
        <td colspan="2" align="left" class="textgras" ><hr size="1" /></td>
      </tr>
    </table></td>
  </tr>
  

  
 <?php if (!empty($mess_update_passwd_sec)){?>
  <tr id="ligne_mess_sec">
    <td colspan="2" align="center">
            <table width="40%" border="0"  cellpadding="4" cellspacing="0" style="border:1px solid <?php echo $bordercolor ; ?>">
              <tr bgcolor="<?php echo $bgcolor ; ?>">
                <td align="left" class="textgris"><?php echo $mess_update_passwd_sec ; ?></td>
              </tr>
    </table>          </td>
  </tr>
  <?php } ?>       
  <tr>
    <td><form action="" name="frm2" method="post">
      <table width="100%"   border="0" cellpadding="4" bgcolor="#E4E4E4" id="ligne_p_confidentiel_sec" style="display:<?php echo $ligne_p_confidentiel_sec; ?>" >
   <tr>
     <td  align="left" class="textgras" >&nbsp;</td>
     <td  align="left" class="textgras" >&nbsp;</td>
   </tr>
   <tr>
          <td  align="left" class="textgras" >Mot de passe actuel du sécrétaire : </td>
          <td  align="left" class="textgras" ><input name="txt_passwd_actuel_sec" type="password" size="30" /></td>
        </tr>
        <tr>
          <td  align="left" class="textgras" >Nouveau mot de passe du sécrétaire  :</td>
          <td  align="left" class="textgras" ><input name="txt_new_passwd_sec" type="password" size="30" /></td>
        </tr>
        <tr>
          <td  align="left" class="textgras" >Saisir à nouveau le mot de passe sécrétaire  :</td>
          <td  align="left" class="textgras" ><input name="txt_saisir_passwd_sec" type="password" size="30" /></td>
        </tr>
        <tr>
          <td align="left" class="textgras" >&nbsp;</td>
          <td align="left" class="textgras" >&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="textgras" >&nbsp;</td>
          <td align="left" class="textgras" ><input type="image" src="../images/icones/enregistrer-modifications.jpg" name="save_update_passwd_sec" value="Enregistrer les modifications" />
            <input name="annuler_sec" type="image" onclick="affiche_p_confidentiel_sec()" height="23" value="Annuler" src="../images/icones/annuler.jpg" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
  
  <tr style="<?php if ($_SESSION['type_user']== 1) echo "display:none;";?>">
    <td><table width="100%" border="0" cellpadding="0">
      <tr>
       <td align="left" class="titpass" >Paramètres confidentielles du compte docteur </td>
        <td align="right" class="view_more" ><a href="#" class="view_more" onclick="affiche_update_p_confidentiel_doc()" id="lien_update3" style="display:<?php echo $ligne_update3; ?>">modifier</a></td>
      </tr>
       <tr>
        <td colspan="2" align="left" class="textgras" ><hr size="1" /></td>
      </tr>
    </table></td>
  </tr>
 
 <?php if (!empty($mess_update_passwd_doc)){?>
  <tr id="ligne_mess_doc">
    <td colspan="2" align="center">
            <table width="40%" border="0"  cellpadding="4" cellspacing="0" style="border:1px solid <?php echo $bordercolor ; ?>">
              <tr bgcolor="<?php echo $bgcolor ; ?>">
                <td align="left" class="textgris"><?php echo $mess_update_passwd_doc ; ?></td>
              </tr>
    </table>          </td>
  </tr>
  <?php } ?>
  
  <tr>
    <td><form action="" method="post" name="frm3" id="frm3">
      <table width="100%"   border="0" cellpadding="4" bgcolor="#E4E4E4" id="ligne_p_confidentiel_doc" style="display:<?php echo $ligne_p_confidentiel_doc; ?>" >
        <tr>
          <td  align="left" class="textgras" >&nbsp;</td>
          <td  align="left" class="textgras" >&nbsp;</td>
        </tr>
        <tr>
          <td  align="left" class="textgras" >Mot de passe actuel du docteur : </td>
          <td  align="left" class="textgras" ><input name="txt_passwd_actuel_doc" type="password" size="30" /></td>
        </tr>
        <tr>
          <td  align="left" class="textgras" >Nouveau mot de passe docteur  :</td>
          <td  align="left" class="textgras" ><input name="txt_new_passwd_doc" type="password" size="30" /></td>
        </tr>
        <tr>
          <td  align="left" class="textgras" >Saisir à nouveau le mot de passe docteur  :</td>
          <td  align="left" class="textgras" ><input name="txt_saisir_passwd_doc" type="password" size="30" /></td>
        </tr>
        <tr>
          <td align="left" class="textgras" >&nbsp;</td>
          <td align="left" class="textgras" >&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="textgras" >&nbsp;</td>
           <td align="left" class="textgras" ><input type="image" src="../images/icones/enregistrer-modifications.jpg" name="save_update_passwd_doc" value="Enregistrer les modifications" />
            <input name="annuler_doc" type="image" onclick="affiche_p_confidentiel_doc()" height="23" value="Annuler" src="../images/icones/annuler.jpg" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

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
				
					icon : "doctor.png",
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
					icon : "doctor.png",
                    draggable : true
                });
				
				map_addListener();
	}
	
</script>
