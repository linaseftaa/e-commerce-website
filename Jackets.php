<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendy Threads Boutique</title>
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="styl.css">
     <link rel="stylesheet" href="shop.css">
     <!--link rel="stylesheet" href="cart.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"/>
</head>
<body>
    <div class="header">
        <a href="#" id="logo">shopMe <span>.</span></a>
        <nav class="navbar">
        <a href="ingo.php">Home</a>
        <a href="clothes.php">clothes</a>
        <a href="#">Blog</a>
       <a href="#">Contact</a>
        </nav>
        <div class="icons">
            <div class="fas fa-bars" id="menu-bar"></div>
            <div class="fas fa-shopping-cart" id="shop-cart"></div>
            <div class="fas fa-search" id="search-bar"></div>
           <a href="login.php"><div class="fas fa-user" id='login-form'></div></a> 
        </div>

        <div class="search-box">
            <input type="search" placeholder="search here">
        </div>
        <!-- shoping cart -->

        <div class="shopping-cart">
            <div class="shopping-box">
                <i class="fas fa-times"></i>
                <img src="img/shirt1.png" alt="">
                <div class="shop-content">
                    <h3>online shopping</h3>
                    <span class="quantity">1</span>
                    <span class="multiply">*</span>
                    <span class="multiply">$3.00</span>
                </div>
            </div>
            <div class="shopping-box">
                <i class="fas fa-times"></i>
                <img src="img/shirt1.png" alt="">
                <div class="shop-content">
                    <h3>online shopping</h3>
                    <span class="quantity">1</span>
                    <span class="multiply">*</span>
                    <span class="multiply">$3.00</span>
                </div>
            </div>
            <div class="shopping-box">
                <i class="fas fa-times"></i>
                <img src="img/shirt1.png" alt="">
                <div class="shop-content">
                    <h3>online shopping</h3>
                    <span class="quantity">1</span>
                    <span class="multiply">*</span>
                    <span class="multiply">$3.00</span>
                </div>
            </div>
        </div>

        <!-- shoping cart ended  -->

    </div class="shopy">
    
    <div class="musthave__nav">
        <a href="clothes.php">ALL</a>
        <a href="Dresses.php">Dresses</a>
        <a href="Sweaters.php">Sweaters</a>
        <a href="Pants.php">Pants</a>
        <a href="Jackets.php">Jackets</a>
        <a href="Coats.php">Coats</a>
      </div>
      <section id="product1"class="section-p1">
      <?php 
                 //Nous allons afficher tous les produits ajouté :
                   //connexion à la base de données
                   $con = mysqli_connect("localhost","root","","clothes");
                  // $req1 = mysqli_query($con , "SELECT nom_cat FROM categories");
                 //while( $row = mysqli_fetch_assoc($req1)){
                  // $categorie = $row['nom_cat']; 

                   $req3 = mysqli_query($con, "SELECT * FROM prod WHERE categorie = 'Jacket'");

                  
                   if(mysqli_num_rows($req3) == 0){
                      //si la base de donnée ne contient aucun produit , alors affichons :
                      echo " Aucun produit trouvé";
                   }else {//si oui
                       while($row = mysqli_fetch_assoc($req3)){
                           //affichons les informations
                           echo ' 
                           <div class="pro-container">
                                   <div class="pro">
                                        <img src="img/'.$row['image'].'" alt=""> 
                                        <div class="des">
                                           <strong><p class="titre">'.$row['titre'].'</p></strong>
                                           <p class="prix">'.$row['prix'].'</p>
                                             <div class="star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                             </div>
                                        </div>
                                      <a href="single.php"><i class="fas fa-shopping-cart shop"></i></a>
                                    </div>
                            </div>    
                           ';
                       }
                   }

                ?>
     </section> 
     <section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
</section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="script.js"></script>
</body>
</html>