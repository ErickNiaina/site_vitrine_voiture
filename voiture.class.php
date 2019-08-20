<?php 
    class Voiture {
	      public $image;
	      public $prix;
	      public $type;
	      public $caractere;
	      public $nom;
	      public $image1;

        public function __construct() {}

        public function getOne($i){
    	    include('menu2.php');
    		$this->image = $voiture[$i]['image'];
    		$this->prix = $voiture[$i]['prix'];
    		$this->type = $voiture[$i]['caractere'];
    		$this->nom = $voiture[$i]['nom'];
    		$this->critere = $voiture[$i]['critere'];
    		$this->image1 = $voiture[$i]['image1']; 
    	}
        public function rechercheVoitureParCaractere($caractere){
            include('menu.php');
            $resultat = array();//array vaoavao ny azo;
            for ($i=0; $i < count($voiture); $i++) { 
               if ($voiture[$i]['caractere']==$caractere) {
                    $voi = new Voiture();
                    $voi->image = $voiture[$i]['image'];
                    $voi->prix = $voiture[$i]['prix'];
                    $voi->type = $voiture[$i]['caractere'];
                    $voi->nom = $voiture[$i]['nom'];
                    $voi->critere = $voiture[$i]['critere'];
                    $voi->image1 = $voiture[$i]['image1']; 
                    array_push($resultat, $voi); 
                }
            }
            return $resultat;
        }
        
    	//Maka ny voiture reetra 
    	public function getAll(){
    		include('menu2.php');
    		$resultat = array();
    		for($i = 0; $i < count($voiture); $i++){
    			$voi = new Voiture();
    			$voi->image = $voiture[$i]['image'];
	    		$voi->prix = $voiture[$i]['prix'];
	    		$voi->type = $voiture[$i]['caractere'];
	    		$voi->nom = $voiture[$i]['nom'];
	    		$voi->critere = $voiture[$i]['critere'];
	    		$voi->image1 = $voiture[$i]['image1'];
	    		array_push($resultat, $voi);
    		}
    		return $resultat;
    	}
	}
 ?>