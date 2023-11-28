const menubtn = document.querySelector('#menu-btn');
const navbar = document.querySelector('.header .navbar');

menubtn.addEventListener('click',()=>{
    navbar.classList.toggle('active');
    menubtn.classList.toggle('fa-times');
})
 

const swiper = new Swiper('.home-slider', {
    loop: true,
  
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

  }); 