<?php 
session_start();
 var_dump($_SESSION['panier']);
		for ($i=0; $i <count($_SESSION['panier']) ; $i++) { 
			echo $_SESSION['panier'][$i]->getNom().'<br>';
		}

 ?>