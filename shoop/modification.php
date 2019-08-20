<!DOCTYPE html>
<?php
	include('produit.class.php');
	$produit = new Produit();
	$categorie = new Categorie();
	$categories = $categorie->getAll();
	$marque = new Marque();
	$marques = $marque->getAll();
	$produit->getByid($_GET['id_produit']);
    if(isset($_GET['id_produit']) && !empty($_GET['id_produit']))
    {
        $id = $_GET['id_produit'];
        $stmt_edit = connexion()->prepare('SELECT image,nom,prix,id_marque,id_categorie FROM produit WHERE id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location:admin.php");
    }    
    if(isset($_POST['btn_save_updates']))
    {
        $nom = $_POST['nom'];// user name
        $prix = $_POST['prix'];// user email
        $marque = $_POST['marque'];
        $categorie = $_POST['categorie'];
            
        $imgFile = $_FILES['image']['name'];
        $tmp_dir = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];
                    
        if($imgFile)
        {
            $upload_dir = 'images/'; // upload directory   
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userpic = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['image']);
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $userpic = $edit_row['image']; // old image from database
        }   
                        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt ='UPDATE produit SET image=\'%s\',nom=\'%s\',prix=%s,id_marque=%s,id_categorie=%s  WHERE id=%s';
            $stmt = sprintf($stmt,$userpic,$nom,$prix,$marque,$categorie,$id);
            $requet= connexion()->prepare($stmt);
            if($requet->execute()){
                header('location:admin.php');
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
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
            <div class="page-header">
                <h1 class="h2"><a class="btn btn-success" href="admin.php">All Product</a></h1>
            </div>
            <div class="clearfix"></div>
            <form method="post" enctype="multipart/form-data" class="form-horizontal">    
                <?php
                if(isset($errMSG)){
                    ?>
                    <div class="alert alert-danger">
                      <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
                    </div>
                    <?php
                }
                ?>
                <table class="table table-bordered table-responsive">
                    <tr>
                        <td><label class="control-label">Nom de produit</label></td>
                        <td><input class="form-control" type="text" name="nom" value="<?php echo $produit->getNom(); ?>" required /></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Prix</label></td>
                        <td><input class="form-control" type="number" name="prix" value="<?php echo $produit->getPrix(); ?>" required /></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Marque</label></td>
                        <td>
                            <select class="form-control" name="marque">
                                <?php for ($i=0; $i <count($marques) ; $i++) { ?>
                                <option value="<?php echo $marques[$i]->getId(); ?>"><?php echo $marques[$i]->getNom(); ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Categorie</label></td>
                        <td>
                            <select class="form-control" name="categorie">
                                <?php for ($i=0; $i <count($categories) ; $i++) { ?>
                                <option value="<?php echo $categories[$i]->getId(); ?>"><?php echo $categories[$i]->getNom(); ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Product image</label></td>
                        <td>
                            <p><img src="images/<?php echo $produit->getImage(); ?>" class="img-rounded" width="250px" height="250px"/></p>
                            <input class="input-group" type="file" name="image" accept="image/*" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>Update
                        </button>
                        <a class="btn btn-success" href="admin.php"><span class="glyphicon glyphicon-backward"></span> cancel </a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
	</body>
</html>