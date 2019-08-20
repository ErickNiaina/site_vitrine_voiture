<!DOCTYPE html>
<?php 
	include('menu2.php');
	include('voiture.class.php');
	//Maka ny voiture reetra
	$voi = new Voiture();
	$voitures = $voi->getAll();
 ?> 
<html>
	<head>
		<meta charset="utf-8">
		<title>Voiture</title>
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>
		<div class="home">
			<header>
				<div class="div"><b><span>CAR</span>Rental</b></div>
				<div class="menu">
					<nav>
						<ul>
							<li class='footer'><a href=""><?php echo $home['home'];?></a></li>
							<li class='footer'><a href=""><?php echo $home['care'];?></a></li>
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
			<div class="contenu">
				<?php include('menutop.php'); ?>
				<div class="gauche">
					<?php
						for ($j=0; $j <count($voitures) ; $j++) { 
						 ?>
						<div class="haut">
							<div class="image">
								<?php echo "<img class='standards' src='Image/".$voitures[$j]->image.".jpg'>"; ?>
							</div>
							<div class="centre">
								<strong><?php echo $voitures[$j]->type; ?></strong><br>
								<span class="nom"><?php echo $voitures[$j]->nom;?></span><br>
								<b class="prenom"><?php echo $voitures[$j]->critere; ?></b><br>
								<b><?php echo "<img src='".$voitures[$j]->image1.".jpg'>"; ?></b><br><br>
								<b><?php echo $voitures[$j]->prix;?></b>	
							</div>
							<div  class="br"><a href="detail.php?indice=<?php echo $j; ?>"><button class="hidden">CONTINUE</button></a></div>	
						</div>	
					<?php }
			 	?>
				</div>
				<div class="droite">
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
							<li class='footer'><a href=""><?php echo $home['home'];?></a></li>
							<li class='footer'><a href=""><?php echo $home['care'];?></a></li>
						</ul>
					</nav>
				</div>
			</footer>
		</div>
	</body>
</html>