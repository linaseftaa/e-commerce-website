<?php
session_start();
 $con = mysqli_connect("localhost","root","","clothes");
 if(isset($_SESSION['logged_in'])){
    header('location:account.php');
    exit;
}

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword =$_POST['confirmPassword'];
    //if password dont match
    if($password !== $confirmPassword){
        header('location:register.php?error=password dont match');
    }
    //if passwors is less then 6 char
else if (strlen($password < 6)) {
    header('location:register.php?error=password must be at least 6 charachters');
    //if is no error 
}else{
//check whether there is a user with this email or not 
$stmt1=$con->prepare("SELECT count(*) FROM user where email=?");
$stmt1->bind_param('s',$email);
$stmt1->execute();
$stmt1->bind_result($num_rows);
$stmt1->store_result();
$stmt1->fetch();
//if there is a user alerfy register with this email
if($num_rows != 0){
    header('location:register.php?error=user with this email already exists');
    //if no user register with this email beform
}else{
//create a new user
$stmt=$con->prepare("INSERT INTO user(first_name,last_name,email,password)VALUES (?,?,?,?)");

$stmt->bind_param('ssss',$firstname,$lastname,$email,md5($password));
//if account is created succsesfully



 if($stmt->execute()){
$_SESSION['email']=$email;
$_SESSION['first_name'] = $firstname;
$_SESSION['last_name'] = $lastname;
$_SESSION['logged_in'] = true;
header('location:register.php?message=you registered sucssfully');
//account could not created 
}else{
header('location:register.php?error=could not creat an account at the momente');
}

}
}
}
//if user has already registered then take user to account page


?>

   
   
   
   






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendy Threads Boutique</title>
    <link rel="stylesheet" href="css/styleXX.css">
    <link rel="stylesheet" href="css/login.css">
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
           <a href="login.php" id="form-open"><div class="fas fa-user"id="form-open" id='login-form'onclick="document.getElementById('login-page').style.display='block'" style="width:auto;"></div></a> 
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
    </div> 
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                    <button type='button'onclick='register()'class='toggle-btn'>Register</button>
                </div>
                <form id='login' class='input-group-login'>
                <p style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                    <input type='text'class='input-field'placeholder='Email Id' required >
		    <input type='password'class='input-field'placeholder='Enter Password' required>
		    <input type='checkbox'class='check-box'><span>Remember Password</span>
		    <button type='submit'class='submit-btn'>Log in</button>
		 </form>
         <form id='register' class='input-group-register' method="POST" action="register.php">
         <p style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
		     <input type='text'class='input-field'name="firstname" placeholder='First Name' required>
		     <input type='text'class='input-field'name="lastname" placeholder='Last Name ' required>
		     <input type='email'class='input-field'name="email" placeholder='entre your Email ' required>
		     <input type='password'class='input-field'name="password" placeholder='Enter your Password' required>
		     <input type='password'class='input-field'name="confirmPassword" placeholder='Confirm your Password'  required>
		     <input type='checkbox'class='check-box'><span>I agree to the terms and                                                   conditions</span>
                    <button type='submit'class='submit-btn' id="regester-btn" name="register">Register</button>
                    <div class="form-groupe">
                        <a id="login-url" href="login.php" class="btn">Do you have an account ? Login</a>
                    </div>
	         </form>
            </div>
        </div>
    </div>
    <script>
        /*
        const formOpenBtn = document.querySelector("#form-open"),
        let login-page= document.querySelector('.login-page');
       login-page = document.querySelector(".login-page"),
       formBox = document.querySelector(".form-box"),

       formColseBtn = document.querySelector(".form-box"),
       fasfauser = document.querySelector("#fas fa-user"),
       pWShowHide = document.querySelector(".input-field");
       formOpenBtn.addEventListener("click",()=> login.classList.add("show"))
       formCloseBtn.addEventListener("click",()=> login.classList.remove("show"))
       fasfauser.onclick = () =>{
        form-box.classList.toggle('active')
}

*/
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
