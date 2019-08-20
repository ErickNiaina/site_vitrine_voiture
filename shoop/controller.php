<?php 
  include('produit.class.php');
    if(isset($_GET['delet_by_id']))
  {
    // select image from db to delete
    $stmt_select = connexion()->prepare('SELECT image FROM produit WHERE id =:uid');
    $stmt_select->execute(array(':uid'=>$_GET['delet_by_id']));
    $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink("images/".$imgRow['image']);
    
    // it will delete an actual record from db
    $stmt_delete = connexion()->prepare('DELETE FROM produit WHERE id =:uid');
    $stmt_delete->bindParam(':uid',$_GET['delet_by_id']);
    $stmt_delete->execute();
    
    header("Location:admin.php");
  } 
    if(isset($_POST['insertion']))
    {
      $name = $_POST['name'];// user name
      $price = $_POST['price'];// user email
      $marque = $_POST['marque'];
      $categorie = $_POST['categorie'];

      $imgFile = $_FILES['image']['name'];
      $tmp_dir = $_FILES['image']['tmp_name'];
      $imgSize = $_FILES['image']['size'];

      if(empty($name)){
          $errMSG = "Please Enter Product ' s name";
          echo $errMSG."<a class='retoure' href='insertion.php'>".'retoure'."<a/>";
                  }
      else if(empty($price)){
          $errMSG = "Please Enter Product ' s price";
          echo $errMSG."<a class='retoure' href='insertion.php'>".'retoure'."<a/>";
                  }
      else if(empty($imgFile)){
          $errMSG = "Please Select Image File.";
          echo $errMSG."<a class='retoure' href='insertion.php'>".'retoure'."<a/>";
                }
      else
          {
           $upload_dir = 'images/'; // upload directory
           $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
          
           // valid image extensions
           $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
          
           // rename uploading image
           $userpic = rand(1000,1000000).".".$imgExt;
            
           // allow valid image file formats
           if(in_array($imgExt, $valid_extensions)){   
            // Check file size '5MB'
            if($imgSize < 5000000)    {
               move_uploaded_file($tmp_dir,$upload_dir.$userpic);
            }
            else{
             $errMSG = "Sorry, your file is too large.";
            }
           }
           else{
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
           }
          }
  
  
          // if no error occured, continue ....
        if(!isset($errMSG))
          {
            $requet = 'INSERT INTO produit (image,nom,prix,id_marque, id_categorie) VALUES(\'%s\',\'%s\',%s,%s,%s)';
            $requet = sprintf($requet,$userpic,$name,$price,$marque,$categorie);
            $stmt = connexion()->exec($requet);
           header("location:admin.php"); // redirects image view page after 5 seconds.
        }
    }
    if(isset($_POST['id_produit']) && !empty($_POST['id_produit']))
      {
          $id = $_POST['id_produit'];
          $stmt = connexion()->prepare('SELECT * FROM produit WHERE id =:pid');
          $stmt->execute(array(':pid'=>$id));
          $edit_row = $stmt->fetch(PDO::FETCH_ASSOC);
          extract($edit_row);
      }   
    else
      {
          header("Location: admin.php");
      }
    if(isset($_POST['btn_save_updates']))
      {
        $name = $_POST['name'];// user name
        $price = $_POST['price'];// user email
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
                  echo $errMSG;
                  }
              }
            else
              {
              $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
              echo $errMSG; 
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
            $stmt = connexion()->exec('UPDATE produit SET image=:userpic, nom=:name,prix=:price,id_marque=:marque,id_categorie=:id_categorie WHERE id=:id');
         //   $stmt->bindParam(':userpic',$userpic);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':price',$price);
            $stmt->bindParam(':marque',$marque);
            $stmt->bindParam(':categorie',$categorie);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            
            if($stmt->execute())
              { ?>
                  <script>
            alert('Successfully Updated ...');
            window.location.href='admin.php';
            </script>
                <?php
              }
            else{
              $errMSG = "Sorry Data Could Not Updated !";
              echo $errMSG;
              }
          }    
      }
    ?>