<?php 

class Utilisateur{
	private $id;
	private $nom;
	private $email;
	private $mot_de_passe;

	public function getId(){
		return $this->id;
	}
	public function getNom(){
		return $this->nom;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getMot_de_passe(){
		return $this->mot_de_passe;
	}
	public function getALL(){
		$requet = "SELECT * FROM utilisateur";
		$query = connexion()->query($requet);

		$utilisateur = array();
		while ($user = $query->fetch()) {
			$utilisateurs = new Utilisateur();

			$utilisateurs->id = $user['id'];
			$utilisateurs->nom = $user['nom'];
			$utilisateurs->email = $user['email'];
			$utilisateurs->mot_de_passe = $user['mot_de_passe'];
			array_push($utilisateur,$utilisateurs);
		}
		return $utilisateur;
	}
	public function insertionUtilisateur($nom,$email,$mot_de_passe){
		$requet = "INSERT INTO utilisateur (nom,email,mot_de_passe) VALUES ('%s','%s','%s')";
		$requet = sprintf($requet,$nom,$email,$mot_de_passe);
		$exec = connexion()->exec($requet);
	}
	public function login($email,$nom){
		$user = $this->getUseremail($email);
		if ($user->nom === $nom) {
			session_start();
			$_SESSION['id_utilisateur'] = $user->id;
			$_SESSION['nom'] = $user->nom;
			header("location:index.php");
		}
		else {	
			header('location:login.php');
			}	
	}
	public function getUseremail($email){
		$requet = 'SELECT * FROM utilisateur WHERE email=\'%s\'';
		$requet = sprintf($requet,$email);
		$query = connexion()->query($requet);
		$utilisateur = null;
		while ($user = $query->fetch()) {
			$utilisateur = new Utilisateur();
			$utilisateur->id = $user['id'];
			$utilisateur->nom = $user['nom'];
			$utilisateur->email = $user['email'];
			$utilisateur->mot_de_passe = $user['mot_de_passe'];
			return $utilisateur;
		} 

		if (!$utilisateur) {
			header('location:login.php?mot=VOUS DEVEZ S\'INSCRIRE');
		}
	}
}
 ?>
