import Swiper, {
  Navigation,
  Pagination,
  Autoplay,
  EffectFade,
  Keyboard
} from 'swiper';

Swiper.use([Navigation, Pagination, Autoplay, EffectFade, Keyboard]);

const heroSwiper = new Swiper('.fp-hero-slider', {
  loop: true,
  slidesPerView: 1,
  centeredSlides: true,
  // effect: 'fade',
  keyboard: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: true,
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});

const productSwiper = new Swiper('.swiper-container.product__hero-swiper', {
  loop: true,
  slidesPerView: 1,
  direction: 'vertical',
  centeredSlides: true,
  effect: 'fade',
  keyboard: true,

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
