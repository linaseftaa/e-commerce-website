<!--?php
@include 'config.php';

if(isset($_POST['btn-ajouter'])){
    $nom= $_POST['nom'];
    $description= $_POST['description'];
    $file= $_FILES['image']['name']; 
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    $prix= $_POST['prix'];
    $sql="INSERT INTO articles(nom,location,image,prix) VALUES('$nom','$description','$dst_db','prix')";
    $result= mysqli_query($conn,$sql);
    if($result)
    {
        header('location:ajouter_article.php');
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion vetements</title>
    <link rel="stylesheet" href="ajouter.css">
</head>
<body>
    <section class="input_add">
        <form action="" method="POST" enctype="multipart/form-data">
         <label>Nom d'article</label>
         <input type="text" name="nom">
         <label>Description d'article</label>
         <textarea name="description" cols="30" rows="10"></textarea>
         <label>Ajouter une image</label>
         <input type="file" name="image">
         <label>Prix</label>
         <input type="text" name="prix">
         <input type="submit" value="Ajouter" name="btn-ajouter">
    
</body>
</html>-->


<?php
  if(isset($_POST['btn-ajouter'])){
      //connexion à la base de données
      $con = mysqli_connect("localhost","root","","clothes");
      //recupération des données du formulaire
      $titre = $_POST['titre'];
      $prix = $_POST['prix'];
      $description = $_POST['description'];
      $cat= $_POST['categorie'];
    
      if(!empty($titre) && !empty($description)){
          //verifier si le produit existe déjà dans la base de données
          $req1 = mysqli_query($con, "SELECT titre ,descrip,prix,categorie FROM prod WHERE titre ='$titre' AND descrip = '$description' AND prix='$prix' AND categorie='$cat'");
          if(mysqli_num_rows($req1) > 0) {
              //si le produit existe déjà:
              $message = '<p style="color:red" >Le produit existe déjà</p>';
          }else {
              //sinon
              if(isset($_FILES['image'])){
                  //si une image a été télécharger:
                  $img_nom = $_FILES['image']['name']; //On récupère le nom de l'image 
                  $tmp_nom = $_FILES['image']['tmp_name']; //Nous définissons un nom temporaire
                  $time =time(); //On recupere l'heure actuelle
                  //On renomme l'image

                  $nouveau_nom_img = $time.$img_nom ;

                  //On déplace l'image dans le dossier images-produits

                  $deplacer_image = move_uploaded_file($tmp_nom,"img/".$nouveau_nom_img) ;

                  if($deplacer_image){
                      //si l'image a été déplacé :
                      //insérons le titre ,la description  et le nom de l'image dans la base de donnée 
                      $req2 = mysqli_query($con,"INSERT INTO prod VALUES (NULL,'$titre','$description','$prix','$nouveau_nom_img','$cat')") ;
                       if($req2){
                           //si les informations ont été inséré dans la base de données
                           $message = '<p style="color:green">Produit ajouté ! </p>';
                       }else {
                           //si non
                           $message = '<p style="color:red ">Produit Non ajouté !</p>';
                       }
                  }

              }
          }
      }else {
          //si tous les champs ne sont pas remplie on a :
        $message = '<p style="color:red">Veuillez remplir tous les champs !</p>';
      }
  }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUITS GESTION</title>
    <link rel="stylesheet" href="ajouter.css">
</head>
<body>
    <section class="input_add">
        <form action="" method="POST" enctype="multipart/form-data">
           <div class="message">
               <?php 
               if(isset($message)){
                   //si la variable message existe , on affiche le contenu de la variable
                   echo $message ;
               }

                   ?>
           </div>
            <label>Nom du produit</label>
            <input type="text" name="titre">
            <label>Description du produit</label>
            <textarea name="description"  cols="30" rows="10"></textarea>
            <label>Ajouter une image</label>
            <input type="file" name="image">
            <label>prix</label>
            <input type="text" name="prix">
            <label>categorie</label>
            <input type="text" name="categorie">
            <input type="submit" value="Ajouter" name="btn-ajouter">
            <a class="btn-liste-prod" href="resultats.php"> Liste des produits</a>
        </form>
    </section>
</body>
</html>