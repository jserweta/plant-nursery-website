/**
 * imenet theme JavaScript.
 */

// Import modules (comment to disable)
import MoveTo from 'moveto';
import './modules/sticky-nav.js'
import 'what-input';

// Ajax
import './modules/ajax-filters.js';
import './modules/ajax-pagination.js';
//ajaxFilters();

// Navigation
import './modules/navigation.js';

//Swipers
import './modules/swipers.js';

//Lightbox pop-ups
import './modules/pop-ups.js';


// import { gsap } from 'gsap';

// Define Javascript is active by changing the body class
document.body.classList.remove('no-js');
document.body.classList.add('js');

// jQuery start
(function ($) {
  // Accessibility: Ensure back to top is right color on right background
  // Note: Needs .has-light-bg or .has-dark-bg class on all blocks
  var stickyOffset = $('.back-to-top').offset();
  var $contentDivs = $('.block');
  $(document).scroll(function () {
    $contentDivs.each(function (k) {
      var _thisOffset = $(this).offset();
      var _actPosition = _thisOffset.top - $(window).scrollTop();
      if (
        _actPosition < stickyOffset.top &&
        _actPosition + $(this).height() > 0
      ) {
        $('.back-to-top')
          .removeClass('has-light-bg has-dark-bg')
          .addClass(
            $(this).hasClass('has-light-bg') ? 'has-light-bg' : 'has-dark-bg'
          );
        return false;
      }
    });
  });

  // Detect Visible section on viewport from bottom
  // @link https://codepen.io/BoyWithSilverWings/pen/MJgQqR
  $.fn.isInViewport = function () {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
  };

  // Accessibility: Ensure back to top is right color on right background
  $(window).on('resize scroll', function () {
    $('.block').each(function () {
      if ($(this).isInViewport()) {
        $('.back-to-top')
          .removeClass('has-light-bg has-dark-bg')
          .addClass(
            $(this).hasClass('has-light-bg') ? 'has-light-bg' : 'has-dark-bg'
          );
      }
    });
  });

  // Accessibility add "External link:" aria label for external links
  var currentHost = new RegExp(location.host);
  // exclude menu links - fix for one-page sites
  $('a').not('.menu-item a').each(function () {
    var attr = $(this).attr('aria-label');
    if (!currentHost.test($(this).attr('href')) && !attr) {
      if ('#content' !== $(this).attr('href')) {
        // A link that does not contain the current host
        var txt = $(this).text();
        $(this).addClass('is-external-link');
        $(this).attr('aria-label', imenet_screenReaderText.external_link + ' ' + txt);
      }
    }

    // If is outside link and has target="_blank"
    if (!currentHost.test($(this).attr('href')) && !attr && '_blank' === $(this).attr('target')) {
      $(this).attr('aria-label', imenet_screenReaderText.external_link + ', ' + imenet_screenReaderText.target_blank + ' ' + txt);
    }
  });

  // Hide or show the 'back to top' link
  $(window).scroll(function () {
    // Back to top
    var offset = 300; // Browser window scroll (in pixels) after which the 'back to top' link is shown
    var offset_opacity = 1200; // Browser window scroll (in pixels) after which the link opacity is reduced
    var scroll_top_duration = 700; // Duration of the top scrolling animation (in ms)
    var link_class = '.back-to-top';

    if ($(this).scrollTop() > offset) {
      $(link_class).addClass('is-visible');
    } else {
      $(link_class).removeClass('is-visible');
    }

    if ($(this).scrollTop() > offset_opacity) {
      $(link_class).addClass('fade-out');
    } else {
      $(link_class).removeClass('fade-out');
    }
  });

  // Document ready start
  $(function () {
    // Your JavaScript here

    // Remove accidental empty <p> tags
    $('p:empty').remove();
  });
})(jQuery);

document.addEventListener('DOMContentLoaded', function () {
  const easeFunctions = {
    easeInQuad: function (t, b, c, d) {
      t /= d;
      return c * t * t + b;
    },
    easeOutQuad: function (t, b, c, d) {
      t /= d;
      return -c * t * (t - 2) + b;
    }
  };
  const moveTo = new MoveTo({
      ease: 'easeInQuad',
      tolerance: 60
    },
    easeFunctions
  );
  const triggers = document.getElementsByClassName('js-trigger');
  for (var i = 0; i < triggers.length; i++) {
    moveTo.registerTrigger(triggers[i]);
  }
});
