<!DOCTYPE html>
<?php
	include('produit.class.php');
	$produit = new Produit();
	$categorie = new Categorie();
	$categories = $categorie->getAll();
	$marque = new Marque();
	$marques = $marque->getAll();
 ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Insertion</title>
		<link rel="stylesheet" type="text/css" href="">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body>
		<div class="container well">
			<form method="post" enctype="multipart/form-data" class="form-horizontal" action="controller.php">
 				<table class="table table-bordered table-responsive">
    				<tr>
     					<td><label class="control-label">Nom</label></td>
        				<td><input class="form-control" type="text" name="name" placeholder="Enter product 's name" value="" /></td>
    				</tr>
    				<tr>
     					<td><label class="control-label">Prix</label></td>
       					<td><input class="form-control" type="number" name="price" placeholder="Your price" value="" /></td>
    				</tr>
    				<tr>
    					<td><label class="control-label">Image de produit</label></td>
        				<td><input class="input-group" type="file" name="image" accept="image/*" /></td>
    				</tr>
    				<tr>
    					<td><label class="control-label">Categorie</label></td>
        				<td>
        					<select class="form-control" name="categorie">
        						<?php for ($i=0; $i <count($categories) ; $i++) { ?>
        						<option value="<?php echo $categories[$i]->getId() ?>"><?php echo $categories[$i]->getNom() ?></option>
        					<?php } ?>
        					</select>
        				</td>
    				</tr>
    				<tr>
    					<td><label class="control-label">Marque</label></td>
        				<td>
        					<select class="form-control" name="marque">
        						<?php for ($i=0; $i <count($marques) ; $i++) { ?>
        						<option value="<?php echo $marques[$i]->getId() ?>"><?php echo $marques[$i]->getNom() ?></option>
        					<?php } ?>
        					</select>
        				</td>
    				</tr>
    				<tr>
				        <td colspan="2"><button type="submit" name="insertion" class="btn btn-default">
				        <span class="glyphicon glyphicon-save"></span> &nbsp; save
				        </button>
				        </td>
    				</tr>
    			</table>    
			</form>
		</div>
	</body>
</html>