<?php 
	class Marque{
		private $id;
		private $nom;

		public function getId(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getAll(){
			$reqet = "SELECT * FROM marque";
			$query = connexion()->query($reqet);
			$marque =array();
			while ($brands = $query->fetch()) {
				$marques = new Marque();
				$marques->id = $brands['id'];
				$marques->nom = $brands['nom'];
				array_push($marque,$marques);
			}
			return $marque;
		}
		public function getByid($id){
			$reqet = "SELECT * FROM marque WHERE id=%s";
			$reqet = sprintf($reqet,$id);
			$query = connexion()->query($reqet);

			while ($brands = $query->fetch()) {
				$this->id = $brands['id'];
				$this->nom = $brands['nom'];
			}
		}
	}
 ?>