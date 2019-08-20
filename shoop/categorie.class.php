<?php
	class Categorie{
		private $id;
		private $nom;

		public function getID(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getAll(){
			$reqet = "SELECT * FROM categorie";
			$query = connexion()->query($reqet);
			$categorie =array();
			while ($category = $query->fetch()) {
				$categories = new Categorie();
				$categories->id = $category['id'];
				$categories->nom = $category['nom'];
				array_push($categorie,$categories);
			}
			return $categorie;
		}
		public function getByid($id){
			$reqet = "SELECT * FROM categorie WHERE id=%s";
			$reqet = sprintf($reqet,$id);
			$query = connexion()->query($reqet);

			while ($categorie = $query->fetch()) {
				$this->id = $categorie['id'];
				$this->nom = $categorie['nom'];
			}
		}
	}
 ?>