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
				if( $('.homepage-hero-slider' ).length > 0 ) {
					setTimeout(function(){
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
								slideChange: function() {
									$('.count').text( '0' + ( this.realIndex + 1 ) );
								  },
								}
						});
					}, 500);
				}

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

				// Form Toggle.
				$(".cta-form").css("display", "none");
				$( ".cta-block .send-message" ).on( "click", function() {
					$( ".cta-form" ).slideToggle(500);
				});
				$(".cta-form .thankyou-msg-cta").css("display", "none");
				$(".cta-form .forminator-button-submit").on( "click", function(){

					var cta_popup = $( '.cta-form').find('.forminator-custom-form').find('.forminator-is_filled');
					if( cta_popup.length > 0 ) {
						$(".cta-form .thankyou-msg-cta").css("display", "block");
						$(".cta-form .forminator-custom-form").css("display", "none");
					}
				});

				// Calculator Form
				$(".calculator-block .submit").on("click",function(e){
					e.preventDefault();
					var value = $('.calculator-block input[name="amount_value"]').val(),
					replace_value = value.replace( ',', ''),
					calculate_value = ( parseInt( replace_value ) * 9 ) / 10,
					calculatorform = $(".calculator-block").find(".result");
					calculatorform.text( '£' + calculate_value.toLocaleString() + '*' );
					setTimeout(function(){
						$('.calculator-block input[name="amount_value"]').val(value);
					}, 600);
				});


				// Search Page And Post.
				function ScrollStop() {
					return false;
				}
				function ScrollStart() {
					return true;
				}
				var isMobile = false;
				$('.header-search-form').magnificPopup({
					mainClass: 'mfp-fade timefinance-search-popup',
					closeOnBgClick: false,
					preloader: false,
					// for white background
					fixedContentPos: false,
					closeBtnInside: false,
					callbacks: {
						open: function () {
							$("#search-header input").focus(function(){
								$("#search-header .search-form").addClass('lighten');
							});
							$("#search-header input").focusout(function(){
								$("#search-header .search-form").removeClass('lighten');
							});
							$('#search-header').parent().addClass('search-popup');
							if (!isMobile) {
								$('body').addClass('overflow-hidden');
								$('body').addClass('width-100');
								document.onmousewheel = ScrollStop;
							} else {
								$('body, html').on('touchmove', function (e) {
									e.preventDefault();
								});
							}
						},
						close: function () {
							if (!isMobile) {
								$('body').removeClass('overflow-hidden');
								$('body').removeClass('width-100');
								$('#search-header input[type=text]').each(function (index) {
									if (index == 0) {
										$(this).val('');
										$("#search-header").find("input:eq(" + index + ")");
									}
								});
								document.onmousewheel = ScrollStart;
							} else {
								$('body, html').unbind('touchmove');
							}
						}
					}
				});

				// Search Again.
				$('#search-again input[type=text]').each(function (index) {
					if (index == 0) {
						$(this).val('');
						$("#search-again").find("input:eq(" + index + ")");
					}
				});
				//Resourse Popup Form
				$(".resources-filter-block .resource-popup-form .thankyou-msg").css("display", "none");
				$(".resources-filter-block .resource-popup-form .forminator-button-submit").on( "click", function(){

					var resourse_popup = $( '.resources-filter-block').find('.forminator-custom-form').find('.forminator-is_filled');
					if( resourse_popup.length > 0 ) {
						$(".resources-filter-block .resource-popup-form .thankyou-msg").css("display", "block");
						$(".resources-filter-block .resource-popup-form .forminator-custom-form").css("display", "none");
					}
				});

				//BDT Popup Form
				$(".bdt-filter-block .bdt-popup-form .thankyou-msg-bdt").css("display", "none");
				$(".bdt-filter-block .bdt-popup-form .forminator-button-submit").on( "click", function(){

					var bdt_popup = $( '.bdt-filter-block').find('.forminator-custom-form').find('.forminator-is_filled');
					if( bdt_popup.length > 0 ) {
						$(".bdt-filter-block .bdt-popup-form .thankyou-msg-bdt").css("display", "block");
						$(".bdt-filter-block .bdt-popup-form .forminator-custom-form").css("display", "none");
					}
				});

				//Contact Form
				$(".contact-block .contact-form .thankyou-msg-contact").css("display", "none");
				$(".contact-block .contact-form .forminator-button-submit").on( "click", function(){

					var contact_popup = $( '.contact-block').find('.forminator-custom-form').find('.forminator-is_filled');
					if( contact_popup.length > 0 ) {
						$(".contact-block .contact-form .thankyou-msg-contact").css("display", "block");
						$(".contact-block .contact-form .forminator-custom-form").css("display", "none");
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
