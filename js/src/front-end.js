/**
 * imenet theme JavaScript.
 */

// Import modules (comment to disable)
import './modules/sticky-nav.js';
import backToTop from './modules/back-to-top.js';

// Ajax
import './modules/ajax-filters.js';
import './modules/ajax-pagination.js';

// Navigation
import './modules/navigation.js';
import menuObserver from './modules/menu-observer.js';
import smoothScroll from './modules/smooth-scroll.js';

// Swipers
import './modules/swipers.js';

// Fade animations
import fadeInAnimations from './modules/fade-in-animations.js';

// Lightbox popup for gallery
import './modules/gallery-popup.js';

// Define Javascript is active by changing the body class
document.body.classList.remove('no-js');
document.body.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {
  backToTop();
  menuObserver();
  smoothScroll();
  fadeInAnimations();
  
  // Remove # from link after scroll
  window.addEventListener('scroll', () => {
    history.pushState('', '', window.location.pathname);
  });
});
