<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CONTENU</title>
		<link rel="stylesheet" type="text/css" href="contenu.css">
	</head>
	<body>
		<form method="POST" action="contenu.php">
			<input type="text" name="nb1">
			<input type="text" name="nb2">
			<select name="signe">
				<option value="+">Addition</option>
				<option value="-">soustraction</option>
				<option value="*">multiplication</option>
				<option value="/">division</option>
			</select>
			<input type="submit" name="submit">
		</form>
		<p><strong>RANDRIATSIFERANA</strong>JOSOA</p>
		<?php 
			function calcul($signe,$nb1,$nb2){
				if ($signe=='+') {
					$resultat=$nb1+$nb2;
					return $resultat;
				}
				if ($signe=='-') {
					$resultat=$nb1-$nb2;
					return $resultat;
				}
				if ($signe=='*') {
					$resultat=$nb1*$nb2;
					return $resultat;
				}
				if ($signe=='/') {
					$resultat=$nb1/$nb2;
					return $resultat;
				}
			}
			echo calcul($_POST['signe'],$_POST['nb1'],$_POST['nb2']);
		 ?><br>
		 <?php 
		 function puissance($value,$puissance){
		 	$resultat=1;
		 	for ($i=0; $i < $puissance; $i++) { 
				$resultat=$resultat*$value;
		 	}
		 	return $resultat;
		 }
		 echo puissance(5,2);
		  ?>
	</body>
</html>