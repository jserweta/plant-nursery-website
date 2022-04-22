import Swiper, {
    Navigation,
    Pagination,
    Autoplay,
    EffectFade
  } from 'swiper';
  Swiper.use([Navigation, Pagination, Autoplay, EffectFade]);

var heroSwiper = new Swiper('.fp-hero-slider', {
    loop: true,
    slidesPerView:1,
    centeredSlides:true,
    effect: "fade",
  
    autoplay: {
      delay: 3000,
      disableOnInteraction: true,
    },
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    }, 
  });

  var productSwiper = new Swiper('.swiper-container.product__hero-swiper', {
    loop: true,
    slidesPerView:1,
    direction: 'vertical',
    centeredSlides:true,
    effect: "fade",
  
    autoplay: {
      delay: 3000,
      disableOnInteraction: true,
    },
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    }, 
  });

