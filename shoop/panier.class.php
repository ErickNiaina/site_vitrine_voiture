<?php 
	class Panier{
		
		public function __construct(){
			if (!isset($_SESSION)) {			
				session_start();
			
			if(!isset($_SESSION['panier'])) 
			{ 
			    $_SESSION['panier'] = array(); 
				$_SESSION['panier']['id'] = array();
			    $_SESSION['panier']['image'] = array();
			    $_SESSION['panier']['nom'] = array();  
			    $_SESSION['panier']['prix'] = array(); 
			    $_SESSION['panier']['qte'] = array();
			    $_SESSION['panier'] = new Panier();
			} 
		}
	}
		 public function ajout($id,$image,$nom,$prix,$qte) 
			{ 
				$positionProduit = array_search($id,$_SESSION['panier']['id']);
			//	$positionProduit = array_search($produit,$_SESSION['panier']);
      			if ($positionProduit !== false)
      				{
         				$_SESSION['panier']['qte'][$positionProduit] += $qte ;
         			//	$_SESSION['panier'][$positionProduit]++ ;
      				}
      			else{
      				array_push($_SESSION['panier']["id"],$id); 
				    array_push($_SESSION['panier']['image'],$image); 
				    array_push($_SESSION['panier']['nom'],$nom); 
				    array_push($_SESSION['panier']['prix'],$prix);
				    array_push($_SESSION['panier']['qte'],$qte);
      			}
		}
	/*	public function ajout($produit,$qte) {
				$positionProduit = array_search($produit,$_SESSION['panier']);
			if ($positionProduit !== false) {
				$_SESSION['panier']['qte'][$positionProduit] += $qte ;
			}else{
				array_push($_SESSION['panier'],$produit);
				array_push($_SESSION['panier']['qte'],$qte);
			}
		}*/
		public function supprim_article($id) 
			{ 
			    $suppression = false;  
			    $panier_tmp = array("id"=>array(),"image"=>array(),"nom"=>array(),"prix"=>array(),"qte"=>array()); 
			    $nb_articles = count($_SESSION['panier']['id']); 
			    for($i = 0; $i < $nb_articles; $i++) 
			    {
			        if($_SESSION['panier']['id'][$i] != $id) 
			        { 
			            array_push($panier_tmp['id'],$_SESSION['panier']['id'][$i]); 
			            array_push($panier_tmp['image'],$_SESSION['panier']['image'][$i]); 
			            array_push($panier_tmp['nom'],$_SESSION['panier']['nom'][$i]); 
			            array_push($panier_tmp['prix'],$_SESSION['panier']['prix'][$i]); 
			            array_push($panier_tmp['qte'],$_SESSION['panier']['qte'][$i]); 
			        } 
			    } 
			    $_SESSION['panier'] = $panier_tmp;
			    unset($panier_tmp); 
			    $suppression = true; 
			    return $suppression; 
		} 
		public function montant_panier() 
			{ 
			    $montant = 0; 
			    $nb_articles = count($_SESSION['panier']['id']); 
			    for($i = 0; $i < $nb_articles; $i++) 
			    { 
			        $montant += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i]; 
			    } 
			    return $montant; 
		}    
	}
 ?>