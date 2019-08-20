<!DOCTYPE html>
<?php
	include('produit.class.php');
	$produit = new Produit();
	$produits = $produit->getTout_produit();
  ?>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="index.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body class="body">
		<div class="container well">
			<table class="table">
				<tr>
					<td><h2 class="text">Image</h2></td>
					<td><h2 class="text">Nom</h2></td>
					<td><h2 class="text">Prix</h2></td>
					<td><h2 class="text">Marque</h2></td>
					<td><h2 class="text">Categetie</h2></td>
				</tr>
				<?php for ($i=0; $i <count($produits) ; $i++) { ?>
				<tr>
					<td><img src="images/<?php echo $produits[$i]->getImage(); ?>" class="img-rounded" width="250px" height="250px"></td>
					<td><?php echo $produits[$i]->getNom(); ?></td>
					<td><?php echo $produits[$i]->getPrix(); ?>$</td>
					<td><?php echo $produits[$i]->getMarque(); ?></td>
					<td><?php echo $produits[$i]->getCategorie(); ?></td>
					<td>
        				<a class="btn btn-info" href="modification.php?id_produit=<?php echo $produits[$i]->getId(); ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>
					</td>
					<td>
        				<a class="btn btn-danger" href="controlleur.php?delet_by_id=<?php echo $produits[$i]->getId(); ?>"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
					</td>
				</tr>
				<?php } ?>
			</table>
			<form action="insertion.php" method="POST">
				<input class="btn btn-success" type="submit" name="insertion" value="insertion">
			</form>
		</div>
	</body>
</html>