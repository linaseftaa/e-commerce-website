<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/pict.avif" type="image/x-icon" >
    <link rel="stylesheet" href="http://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Trendy Threads Boutique</title>
   
</head>
<body>
<section id="header">
    <a href="#"><img src="img/logo-removebg-preview.png" alt="" width="140" class="logo"></a>
    <div>
        <ul id="navbar">
            <li><a class="active" href="index.html">Home</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href=""><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>

        </ul>
    </div>

</section>
<section id="hero">
    <h1>Trade-in-offer</h1>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with coupons & up to 70% off!</p>
    <button>Shop Now</button>

</section>
<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="img/free-shipping.jpg" alt="" width="130">
        <h6>Free Shipping</h6>

    </div>
    <div class="fe-box">
        <img src="img/online order.jpg" alt="" width="130">
        <h6>Online Order</h6>

    </div>
    <div class="fe-box">
        <img src="img/save money.avif" alt="" width="200">
        <h6>Save Money</h6>

    </div>
    <div class="fe-box">
        <img src="img/pro.jpg" alt="" width="130">
        <h6>Promotions</h6>

    </div>
    <div class="fe-box">
        <img src="img/free sell.jpg" alt="" width="130">
        <h6>Happy Sell</h6>

    </div>
    <div class="fe-box">
        <img src="img/service.jpg" alt="" width="130">
        <h6>F24/7 Support</h6>

    </div>
</section>
<section id="product1"class="section-p1">
     
      <h2>Featured Products</h2>
      <p>Winter Collection New Morden Design</p>
        <a href="ajouter_article.php"></a>
    
                <?php 
                 //Nous allons afficher tous les produits ajouté :
                   //connexion à la base de données
                   $con = mysqli_connect("localhost","root","","vetements");
                   $req3 = mysqli_query($con , "SELECT * FROM produits");
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
                                      <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                                    </div>
                            </div>    
                           ';
                       }
                   }

                ?>
                 <!--produit -->
</section>            
            
       
    
        
        <!--div class="pro">
            <img src="img/produit/pro1.jpg" alt="">
            <div class="des">
                <span>Dior</span>
                <h5>Wilfred Free Rourke Sweater</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$79</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="img/produit/pro2.jpg" alt="">
            <div class="des">
                <span>Dior</span>
                <h5>Wilfred Free Rourke Sweater</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$79</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="img/produit/pro3.jpg" alt="">
            <div class="des">
                <span>Dior</span>
                <h5>Wilfred Free Rourke Sweater</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$79</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="img/produit/pro4.jpg" alt="">
            <div class="des">
                <span>Dior</span>
                <h5>Wilfred Free Rourke Sweater</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$79</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="img/produit/pro6.jpg" alt="">
            <div class="des">
                <span>Dior</span>
                <h5>Wilfred Free Rourke Sweater</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$79</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="img/produit/pro7.jpg" alt="">
            <div class="des">
                <span>Dior</span>
                <h5>Wilfred Free Rourke Sweater</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$79</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="img/produit/pro8.jpg" alt="">
            <div class="des">
                <span>Dior</span>
                <h5>Wilfred Free Rourke Sweater</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$79</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="img/produit/pro9.jpg" alt="">
            <div class="des">
                <span>Dior</span>
                <h5>Wilfred Free Rourke Sweater</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$79</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div-->
    



<section id="banner" class="section-m1">
    <h4>Rapair Service</h4>
    <h2>Up to <span>70% Off </span> All t_Shirt & Accessories</h2>
    <button class="normal">Exeplore More</button>
</section>

    <script src="scripte.js"></script>
</body>
</html>