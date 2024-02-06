let searchbar = document.querySelector('#search-bar');
let searchbox = document.querySelector('.search-box');
let shop = document.querySelector('#shop-cart');
let shopcart = document.querySelector('.shopping-cart');
let menubar = document.querySelector('#menu-bar');
let mynav = document.querySelector('.navbar');
let formbox = document.querySelector('.form-box');
const formOpenBtn = document.querySelector("#form-open"),

formBox = document.querySelector(".form-box"),
formColseBtn = document.querySelector(".form-box"),
fasfauser = document.querySelector("#fas fa-user"),
pWShowHide = document.querySelector(".input-field");
formOpenBtn.addEventListener("click",()=> login.classList.add("show"))
formCloseBtn.addEventListener("click",()=> login.classList.remove("show"))

fasfauser.onclick = () =>{
form-box.classList.toggle('active')
}



formopen.onclick = () =>{
  formbox.classList.toggle('active')
}

searchbar.onclick = () =>{
    searchbox.classList.toggle('active')
}
shop.onclick = () =>{
    shopcart.classList.toggle('active');
}
menubar.onclick = () =>{
    mynav.classList.toggle('active');
}

$('.slides').slick({
    dots: false,
    infinite: false,
    autoplay:true,
    arrows:false,   
    speed: 200,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
     
    ]
  });
 