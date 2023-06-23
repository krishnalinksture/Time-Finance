/* ==================================================================================== *
 *
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 * & https://roots.io/sage/
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * ==================================================================================== *
 *
 * TweenMax
 * By GreenStock
 * https://greensock.com/tweenmax
 * https://ihatetomatoes.net/wp-content/uploads/2016/07/GreenSock-Cheatsheet-4.pdf
 *
 * ==================================================================================== */
window.Scrollanimate = () => {
	console.log( 'Scroll work' );
}
(function ($) {
	// Use this variable to set up the common and page specific functions. If you
	// rename this variable, you will also need to rename the namespace below.
	var stairliftstheme = {
		// All pages
		'common': {
			init: function () {
				let swiperObjs = [];
				let lastScroll = 0;

				/****** Swiper slider using params ******/
				$( '[data-slider-options]' ).each( function () {
					var _this           = $( this ),
						sliderOptions   = _this.attr( 'data-slider-options' );

						if ( typeof ( sliderOptions ) !== 'undefined' && sliderOptions !== null ) {
							sliderOptions = $.parseJSON( sliderOptions );

						var swiperObj = new Swiper(_this[0], sliderOptions);
                    	swiperObjs.push(swiperObj);
					}
				});
				if( $('.homepage-hero-slider' ).length > 0 ) {

					var mySwiper = new Swiper('.swiper', {
						// Optional parameters
							  loop: true,
							  simulateTouch: false,
							  slidesPerView: 1,
							  autoHeight: true,
							  autoplay: {
								  delay: 6000,
							  },
							  effect: 'fade',
							  fadeEffect: {
								  crossFade: true
							  },
							  pagination: {
								  el: '.swiper-pagination-homepage-hero',
								  clickable: true,
								  type: 'bullets',
								  progress: 1,
								  renderProgressbar: function (progressbarFillClass) {
									return '<span class="' + progressbarFillClass + '"></span>';
								  }
							  },
							  on: {
								slideChange: updSwiperNumericPagination
							  }
					  });
					  function updSwiperNumericPagination() {
						this.el.querySelector(".swiper-counter").innerHTML = '<span class="count">' + '0'+(this.realIndex + 1) + '</span>';
					  }

				}

				$(".mobile-icon").on("click",function(){
					if ( $(this).parent( '.menu-item-has-children' ).hasClass( 'show' ) ) {
					  $( this ).parent( '.menu-item-has-children ').removeClass( 'show' );
					  $( this ).next( '.mega-menu-wrapper' ).slideUp();
					} else {
					  $( this ).parent( '.menu-item-has-children' ).addClass( 'show' );
					  $( this ).parent( '.menu-item-has-children' ).siblings().removeClass( 'show' );
					  $( this ).parent( '.menu-item-has-children' ).siblings().find('.mega-menu-wrapper').slideUp();
					  $( this ).next( '.mega-menu-wrapper' ).slideDown();
					}
				});

			},
			finalize: function () {
				// JavaScript to be fired on all pages, after page specific JS is fired
			}
		},
		// Home/Index page example - if WordPress, 'index' will need to be changed to 'home'
		'home': {
			init: function () {
				// JavaScript to be fired on the home page
			},
			finalize: function () {
				// JavaScript to be fired on the home page, after the init JS
			}
		},
		// About us page, note the change from about-us to about_us.
		'about_us': {
			init: function () {
				// JavaScript to be fired on the about us page
			}
		}
		// ...
	};

	// The routing fires all common scripts, followed by the page specific scripts.
	// Add additional events for more control over timing e.g. a finalize event
	var UTIL = {
		fire: function (func, funcname, args) {
			var fire;
			var namespace = stairliftstheme;
			funcname = (funcname === undefined) ? 'init' : funcname;
			fire = func !== '';
			fire = fire && namespace[func];
			fire = fire && typeof namespace[func][funcname] === 'function';

			if (fire) {
				namespace[func][funcname](args);
			}
		},
		loadEvents: function () {
			// Fire common init JS
			UTIL.fire('common');

			// Fire page-specific init JS, and then finalize JS
			$.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
				UTIL.fire(classnm);
				UTIL.fire(classnm, 'finalize');
			});

			// Fire common finalize JS
			UTIL.fire('common', 'finalize');
		}
	};

	// Load Events
	$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
