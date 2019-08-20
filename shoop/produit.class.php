<?php
 	include('connexion.php');
	include('categorie.class.php');
	include('marque.class.php');
	class Produit{
		private $id;
		private $image;
		private $nom;
		private $prix;
		private $id_marque;
		private $id_categorie;

		public function getId(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}

		public function getImage(){
			return $this->image;
		}
		public function getPrix(){
			return $this->prix;
		}
		public function getMarque(){
			$marque = new Marque();
			$marque->getByid($this->id_marque);
			return $marque->getNom();
		}
		public function getCategorie(){
			$categorie = new Categorie();
			$categorie->getByid($this->id_categorie);
			return $categorie->getNom();
		}
		public function getByid($id){
			$requet = "SELECT p.id,p.nom AS nom,p.image,p.prix,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque m ON p.id_marque=m.id  WHERE p.id=%s";
			$requet = sprintf($requet,$id);
			$query = connexion()->query($requet);
		
			while ($produits = $query->fetch()) {

				$this->id = $produits['id'];
				$this->nom = $produits['nom'];
				$this->image = $produits['image'];
				$this->prix = $produits['prix'];
				$this->id_categorie = $produits['id_categorie'];
				$this->id_marque = $produits['id_marque'];
			}
		}
		public function getALL(){
			$requet = "SELECT p.id,p.nom AS nom,p.image,p.prix,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque m ON p.id_marque=m.id  WHERE p.id BETWEEN 1 AND 12";
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		}
		public function getTout_produit(){
			$requet = "SELECT p.id,p.nom AS nom,p.image,p.prix,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque m ON p.id_marque=m.id  WHERE p.id";
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		}
		public function getALL2($id1,$id2){
			$requet = "SELECT p.id,p.nom AS nom,p.image,p.prix,p.stock,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque m ON p.id_marque=m.id  WHERE p.id BETWEEN %s AND %s";
			$requet = sprintf($requet,$id1,$id2);
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		}
		public function getALL3(){
			$requet = "SELECT p.id,p.nom AS nom,p.image,p.prix,p.stock,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque m ON p.id_marque=m.id  WHERE p.id BETWEEN 1 AND 2";
			$requet = sprintf($requet);
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		} 
		public function getALLmenu(){
			$requet = "SELECT p.id,p.nom AS nom,p.image,p.prix,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque ma ON p.id_marque=ma.id WHERE p.id BETWEEN 13 and 16";
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		}
		public function getrecommande1(){
			$requet = "SELECT p.id,p.nom AS nom,p.image,p.prix,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque ma ON p.id_marque=ma.id WHERE p.id BETWEEN 17 and 19";
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		}
		public function getrecommande2(){
			$requet = "SELECT p.id,p.nom AS nom,p.image,p.prix,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque ma ON p.id_marque=ma.id WHERE p.id BETWEEN 20 and 22";
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		}
		public function getByid_categorie($id){
			$requet = 'SELECT p.id,p.nom AS nom,p.image,p.prix,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque m ON p.id_marque=m.id WHERE p.id_categorie=%s';
			$requet = sprintf($requet,$id);
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		}
		public function getByid_marque($id){
			$requet = 'SELECT p.id,p.nom AS nom,p.image,p.prix,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque m ON p.id_marque=m.id WHERE p.id_marque=%s';
			$requet = sprintf($requet,$id);
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		}
		public function Produit_entre_le_prix_min_et_max($prix_min,$prix_max){
			$requet = 'SELECT p.id,p.nom AS nom,p.image,p.prix,p.id_marque,p.id_categorie FROM produit p JOIN categorie c ON p.id_categorie=c.id JOIN marque m ON p.id_marque=m.id WHERE p.prix BETWEEN %s AND %s';
			$requet = sprintf($requet,$prix_min,$prix_max);
			$query = connexion()->query($requet);
			$produit = array();
			while ($produits = $query->fetch()) {
				$product = new Produit();

				$product->id = $produits['id'];
				$product->nom = $produits['nom'];
				$product->image = $produits['image'];
				$product->prix = $produits['prix'];
				$product->id_categorie = $produits['id_categorie'];
				$product->id_marque = $produits['id_marque'];
				array_push($produit,$product);
			}
			return $produit;
		}
	} 
 ?>