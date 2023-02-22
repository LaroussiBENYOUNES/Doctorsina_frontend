<?php
  class Mysql_carte
  {
    private
      $Serveur     = '',
      $Bdd         = '',
      $Identifiant = '',
      $Mdp         = '',
      $Lien        = '',
      $Debogue     = true,
      $NbRequetes  = 0,
	 $_req = null;
	private static $_instance;
    /**
	
    * Constructeur de la classe
    * Connexion aux serveur de base de donn�e et s�lection de la base
    *
    * $Serveur     = L'h�te (ordinateur sur lequel Mysql est install�)
    * $Bdd         = Le nom de la base de donn�es
    * $Identifiant = Le nom d'utilisateur
    * $Mdp         = Le mot de passe
	
    */
    public function __construct($Serveur = 'localhost', $Bdd = 'bd_etoubib', $Identifiant = 'root', $Mdp = '')
    {
      $this->Serveur     = $Serveur;
      $this->Bdd         = $Bdd;
      $this->Identifiant = $Identifiant;
      $this->Mdp         = $Mdp;
      $this->Lien=mysql_connect($this->Serveur, $this->Identifiant, $this->Mdp);
      if(!$this->Lien && $this->Debogue)
        throw new MySQLExeption('Erreur de connexion au serveur MySql!!!');
      $Base = mysql_select_db($this->Bdd,$this->Lien);
      /*if (!$Base && $this->Debogue)
        throw new MySQLExeption('Erreur de connexion � la base de donnees!!!');*/
		
		$this->query("SET CHARACTER SET utf8;");
		$this->query("SET NAMES utf8;");
    }
	
	function query ( $sql_query ) {
		
		$this->_req = mysql_query( $sql_query);
		return $this->_req;
	}
	
	public static function getInstance () {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
 
        return self::$_instance;
    }    
	
	
	/**
	
    * fonction pour inscription de etoubib dans le tableau etoubib inscription 
	*(coordonner pour le moment)
   
    */
	public function __inscription($nom,$categ,$lat,$long) {
	global $_db;
		$res = $_db->query("INSERT INTO `coordonner` (`id`, `nom`, `categ`, `lat`, `long`) VALUES (NULL, '".$nom."', '".$categ."', '".$lat."', '".$long."')");
		return $res ;
	}
	
	public function __ajouter__categ($categ) {
	global $_db;
		$_db->query("INSERT INTO `categories` (`id_categ`, `nom_categ`) VALUES (NULL, '".$categ."')");
		echo"<script>alert('categorie ajouter avec succe�');</script>";
	}
	
	public function __select__categ() {
	global $_db;
		$res=$_db->query("select * from  categories");
		
		while ($row = mysql_fetch_array($res)) {
		   echo "<option value='".$row[1]."'>".$row[1]."</option>";
		   
		}
	}
	
	public function __list__categ() {
	global $_db;
		$res=$_db->query("select * from `categories`");
	while ($row = mysql_fetch_array($res)) {
		   echo "
		   <tr>
		   <td>".$row[0]."</td>
		   <td>".$row[1]."</td>
		   <td><a href='index.php?id_categ=".$row[0]."' >Delete</a></td>
		   </tr>
		   ";
		   
		}
	}
	
	
	public function __delete__categ($id_categ) {
	global $_db;
		$_db->query("DELETE fROM `categories` WHERE `categories`.`id_categ`=".$id_categ);
		
		}
		
		public function __creation_categ() {
		$categ[]=array();
		global $_db;
		$res=$_db->query("select * from `categories` ");
		
		while( $row = mysql_fetch_array( $res ) )
		{
		  echo "'".$row[1]."' ,";
		 
		}
		
	
		}
		
		
		
		
		
		
		
		
		
		
	public function __affiche__marker() {
	global $_db;
		$res=$_db->query("select * fROM `coordonner` ");
		
		
		                    
						while($row = mysql_fetch_array( $res)){
						echo"
							var temp = [];
							
								temp.push('".$row[1]." ".$row[2]."');
							
							$('#map_canvas').gmap('addMarker', { 'icon': 'doctor.png', 'tags':temp, 'bound':true, 'position': new google.maps.LatLng(".$row[3].", ".$row[4].") } ).click(function() {
								var visibleInViewport = ( $('#map_canvas').gmap('inViewport', $(this)[0]) ) ? 'I\'m visible in the viewport.' : 'I\'m sad and hidden.';
								$('#map_canvas').gmap('openInfoWindow', { 'content': $(this)[0].tags + '<br/>'  }, this);
							});
							";
						}
						echo" $(this).gmap('set', 'MarkerClusterer', new MarkerClusterer(map, $(this).gmap('get', 'markers'))); ";
							
						
						
		
		
		
		
		
	}	
		
  }
  $_db = Mysql_carte::getInstance();
?>