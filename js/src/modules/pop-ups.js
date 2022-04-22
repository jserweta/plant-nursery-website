import "magnific-popup";

(function ($) {
	$(function () {
		$('.popup-gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			mainClass: 'mfp-img-mobile mfp-with-zoom',
			callbacks: {
				beforeOpen: function () {
					$('.nav-container').css("display", "none");
				},
				close: function () {
					$('.nav-container').css("display", "block");
				}
			},
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,2], // Will preload 0 - before current, and 1 after the current image
				arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

				tPrev: 'Previous (Left arrow key)', // title for left button
				tNext: 'Next (Right arrow key)', // title for right button
				tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
			},
			
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) {
					return item.el.attr('desc');
				}
			},
			zoom: {
				enabled: true,
				duration: 300 // don't foget to change the duration also in CSS
			}
		});

		$('.section-gallery__single-image-link').magnificPopup({
			type: 'image',
			mainClass: 'mfp-img-mobile mfp-with-zoom',					
			callbacks: {
				beforeOpen: function () {
					$('.nav-container').css("display", "none");
				},
				close: function () {
					$('.nav-container').css("display", "block");
				}
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) {
					return item.el.attr('desc');
				}
			},
			zoom: {
				enabled: true,
				duration: 300 // don't foget to change the duration also in CSS
			}
		});
	});
})(jQuery);