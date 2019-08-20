<!DOCTYPE htm>
<?php include('menu.php');
	include('menu2.php');
	include('voiture.class.php');
	//Maka ny voiture reetra
	$voici = new Voiture();
	$voici->getOne($_GET['indice']);//maka anilay boucle $j @ index ary apetrany ay @ class ary soloiny;
 ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Recherche</title>
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>
	 	<div class="home2">
			<header>
				<div class="div"><b><span>CAR</span>Rental</b></div>
				<div class="menu">
					<nav>
						<ul>
							<li class='footer'><a href=""><?php include('menu.php');echo $home['home'];?></a></li>
							<li class='footer'><a href=""><?php include('menu.php');echo $home['care'];?></a></li>
						</ul>
					</nav>
				</div>
				<div class="tete">
					<form action="recherch.php" method="POST">
						<select class="dire" name="nom">
							<option value="Economy">Economy</option>
							<option value="Small">Small</option>
							<option value="Standard">Standard</option>
							<option value="Premium">Premium</option>
							<option value="Luxury">Luxury</option>
							<option value="Special">Special</option>
						</select>
						<input class="rire" type="submit" name="ok" value="submit">
					</form>
				</div>
			</header>
			<div class="contenu2">
				<?php include('menutop.php'); ?>
				<div class="gauche2">
					<div class="image1">
						<?php
							echo "<img src='voiture/".$voici->image.".jpg'>";
						?>
					</div>
					<div class="centre2">
						<?php 
							$paragraphe['paragraphe']=array('Audi RS 5 Coupe 2,9 TFSI 450 Quattro : disponible à la commande','News:','Les commandes de la seconde génération de l’un des modèles les plus performants de l’histoire du constructeur d’Ingolstadt, l’Audi RS 5 Coupé, sont ouvertes.   Le nouveau coupé...' );?>
							<strong><?php echo $voici->type; ?></strong><br><br>
							<span class="nom"><?php echo $voici->nom;?></span><br><br>
							<b><?php echo $voici->prix;?></b><br><br>	
							<b class="red"><?php echo $paragraphe['paragraphe'][0]; ?></b><br><br>	
							<b class="blue"><?php echo $paragraphe['paragraphe'][1]; ?></b>
							<p><?php echo $paragraphe['paragraphe'][2]; ?></p>	
					</div>
				</div>
				<div class="droite2">
					<div class="bas">
						<h3 class="weekend">Weekend<br>Car Rental Special</h3>
						<img class="but" src="Voiture/bop.jpg">
						<p class="php">Nulla cursus dolor in enim sagittis<br>fringilla.Aenean consequant tellus eu<br>nisl bibendumb facilisis.</p>
					</div>
					<div class="bas1">
						<h3 class="weekend">Our<br>Location</h3>
						<img class="but" src="Voiture/sary1.jpg">
						<p class="php">Nulla cursus dolor in enim sagittis<br>fringilla.Aenean consequant tellus eu<br>nisl bibendumb facilisis.</p>
						<div class="hr"><span>ALL LOCATION</span></div>
					</div>
				</div>
			</div>
			<footer>
				<div class="menu2">
					<nav>
						<ul>
							<li class='footer'><a href=""><?php include('menu.php');echo $home['home'];?></a></li>
							<li class='footer'><a href=""><?php include('menu.php');echo $home['care'];?></a></li>
						</ul>
					</nav>
				</div>
			</footer>
		</div>
	</body>
</html>

