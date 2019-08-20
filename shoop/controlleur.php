<?php 
	include('utilisateur.class.php');
	include('produit.class.php');
	include('panier.class.php');
	if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password'])){
		$nom = $_POST['nom'];
		$email = $_POST['email'];
		$mot_de_passe = $_POST['password'];
		$utilisateur = new Utilisateur();
		$utilisateur->insertionUtilisateur($nom,$email,$mot_de_passe);
		header('location:index.php');
	}
/*	if(isset($_GET['id_produit'])){
		session_start();
		$select['qte'] = 1; 
		if (!isset($_SESSION['panier'])){
		    $_SESSION['panier']=array();
		    $_SESSION['panier']['qte'] = array(); 
		    $_SESSION['panier']['taille'] = array(); 
		    $_SESSION['panier']['nom'] = array();
		    $_SESSION['panier']['prix'] = array(); 
		    $_SESSION['panier']['id'] = array();
			}
   		//Si le panier existe
   		elseif (isset($_SESSION['id_utilisateur']) && isset($_SESSION['panier'])) {
   				$panier = new Produit();
   				$id = $_GET['id_produit'];
   				$panier->getByid($id);
   				  //Sinon on ajoute le produit
   				array_push($_SESSION['panier']['id'],$panier->getId()); 
   				array_push($_SESSION['panier']['taille'],$panier->getImage()); 
				array_push($_SESSION['panier']['qte'],$select['qte']); 
				array_push($_SESSION['panier']['nom'],$panier->getNom()); 
				array_push($_SESSION['panier']['prix'],$panier->getPrix()); 
				header('location:cart.php');
   				}
		elseif(empty($_SESSION['id_utilisateur'])){
			header('location:login.php');
		}
	}*/
	if (isset($_GET['id_produit'])) {
		$id = $_GET['id_produit'];
		session_start();
		if (isset($_SESSION['id_utilisateur']) && isset($_GET['id_produit'])) {
			$panier = new Panier();
			$produit = new Produit();
			$produit->getByid($id);
			$qte = 1;
				$panier->ajout($produit->getID(),$produit->getImage(),$produit->getNom(),$produit->getPrix(),$qte);
				var_dump($_SESSION['panier']);
		//	header('location:cart.php');
			
	//	echo count($_SESSION['panier']);

		}
		else{
			header('location:login.php');
		}
	}
	if(isset($_POST['pwd']) && isset($_POST['mail'])){
		$utilisateur = new Utilisateur();
		$email=$_POST['mail'];
		$name=$_POST['pwd'];
		$utilisateur->login($email,$name);
	}
	if (isset($_GET['id_panier'])) {
		$panier = new Panier();
		$id = $_GET['id_panier'];
		$panier->supprim_article($id);
		header('location:cart.php');
	}
	if (isset($_POST['deconnexion'])) {
		session_start();
		
		session_destroy();
		header('location:index.php');
	}
	/*if (isset($_POST['submit'])) {
		$photo = $_POST['photo'];
		$nom_image = $_POST['nom_image'];
		$prix = $_POST['prix'];
		$categorie = $_POST['categorie'];
		$marque = $_POST['marque'];
		$id = $_POST['id'];
		$produit = new Produit();
		function upload($index,$destination){
		return move_uploaded_file($_FILES[$index]['tmp_name'], $destination.$_FILES[$index]['name']);
	}
	if (isset($_POST['submit'])) {
	 if (upload('photo','')) {
	 	echo 'jnvjcfvb ';
	 }
	 $id = $_POST['id'];
	 $nom_image = $_POST['nom_image'];
	 $n
	 } */
 ?>