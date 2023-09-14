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
	console.log('Scroll work');
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
				var sliderBreakPoint = 991;

				function getWindowWidth() {
					return $(window).width();
				}
				function pad(d) {
					return (d < 10) ? '0' + d.toString() : d.toString();
				}
				/***** Setup swiper slider *****/
				setupSwiper();
				function setupSwiper() {

					/***** Swiper slider using params *****/
					var swiperItems = document.querySelectorAll(".swiper:not( .instafeed-wrapper )");
					swiperItems.forEach(function (swiperItem, index) {
						var _this = $(swiperItem),
							sliderOptions = _this.attr('data-slider-options');
						if (typeof (sliderOptions) !== 'undefined' && sliderOptions !== null) {

							sliderOptions = $.parseJSON(sliderOptions);

							var mdDirection = _this.attr('data-slider-md-direction');
							if (mdDirection != '' && mdDirection != undefined) {

								var direction = (sliderOptions['direction'] != '' && sliderOptions['direction'] != undefined) ? sliderOptions['direction'] : mdDirection;
								sliderOptions['on'] = {
									init: function () {
										if (getWindowWidth() <= sliderBreakPoint) {
											this.changeDirection(mdDirection);
										} else {
											this.changeDirection(direction);
										}
										this.update();
									},
									resize: function () {
										if (getWindowWidth() <= sliderBreakPoint) {
											this.changeDirection(mdDirection);
										} else {
											this.changeDirection(direction);
										}
										this.update();
									}
								};
							}

							var numberPagination = _this.attr('data-slider-number-pagination');
							if (numberPagination != '' && numberPagination != undefined) {

								sliderOptions['on']['slideChange'] = function () {
									if ($('.swiper-pagination-current').length > 0) {
										$('.swiper-pagination-current').html(pad(this.realIndex + 1, 2));

										$('.swiper-pagination-bullet-active').prevAll(".swiper-pagination-bullet").addClass('filled');

										var activeIndex = this.activeIndex;
										var realIndex = this.slides.eq(activeIndex).attr('data-swiper-slide-index');
										if( realIndex == 0 ){
											$('.swiper-pagination-bullet-active').removeClass('filled');
										}
										$('.swiper-pagination-bullet-active').nextAll(".swiper-pagination-bullet").removeClass('filled');
									}
								};
							}
							var swiperObj = new Swiper(swiperItem, sliderOptions);
							swiperObjs.push(swiperObj);
						}
					});
				}

				$(".mobile-icon").on("click", function () {
					if ($(this).parent('.menu-item-has-children').hasClass('show')) {
						$(this).parent('.menu-item-has-children ').removeClass('show');
						$(this).next('.mega-menu-wrapper').slideUp();
					} else {
						$(this).parent('.menu-item-has-children').addClass('show');
						$(this).parent('.menu-item-has-children').siblings().removeClass('show');
						$(this).parent('.menu-item-has-children').siblings().find('.mega-menu-wrapper').slideUp();
						$(this).next('.mega-menu-wrapper').slideDown();
					}
				});

				// Form Toggle.
				$(".cta-form").css("display", "none");
				$(".cta-block .send-message").on("click", function () {
					$(".cta-form").slideToggle(500);
				});

				// Thankyou Message.
				$(".cta-form .thankyou-msg-cta").css("display", "none");
				$(".send-message-form .forminator-button-submit").on("click", function () {
					var cta_popup = $('.cta-form').find('.forminator-custom-form').find('.forminator-is_filled');
					if (cta_popup.length > 0) {
						$(".cta-form .thankyou-msg-cta").css("display", "block");
						$(".cta-form .forminator-custom-form").css("display", "none");
						$('html, body').animate({
							scrollTop: 0,
						}, 9999999999);
					}
				});

				// Calculator Form
				$(".calculator-block .submit").on("click", function (e) {
					e.preventDefault();
					var value = $('.calculator-block input[name="amount_value"]').val(),
						replace_value = value.replace(',', ''),
						calculate_value = (parseInt(replace_value) * 9) / 10,
						calculatorform = $(".calculator-block").find(".result");
					calculatorform.text('£' + calculate_value.toLocaleString() + '*');
					setTimeout(function () {
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
							$("#search-header input").focus(function () {
								$("#search-header .search-form").addClass('lighten');
							});
							$("#search-header input").focusout(function () {
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
				$(".resources-filter-block .resource-popup-form .forminator-button-submit").on("click", function () {

					var resourse_popup = $('.resources-filter-block').find('.forminator-custom-form').find('.forminator-is_filled');
					if (resourse_popup.length > 0) {
						$(".resources-filter-block .resource-popup-form .thankyou-msg").css("display", "block");
						$(".resources-filter-block .resource-popup-form .forminator-custom-form").css("display", "none");
						$('html, body').animate({
							scrollTop: 0,
						}, 9999999999);
					}
				});

				//BDT Popup Form
				$(".bdt-filter-block .bdt-popup-form .thankyou-msg-bdt").css("display", "none");
				$(".bdt-filter-block .bdt-popup-form .forminator-button-submit").on("click", function () {

					var bdt_popup = $('.bdt-filter-block').find('.forminator-custom-form').find('.forminator-is_filled');
					if (bdt_popup.length > 0) {
						$(".bdt-filter-block .bdt-popup-form .thankyou-msg-bdt").css("display", "block");
						$(".bdt-filter-block .bdt-popup-form .forminator-custom-form").css("display", "none");
						$('html, body').animate({
							scrollTop: 0,
						}, 9999999999);
					}
				});

				//Contact Form
				$(".contact-block .contact-form .thankyou-msg-contact").css("display", "none");
				$(".contact-block .contact-form .forminator-button-submit").on("click", function () {

					var contact_popup = $('.contact-block').find('.forminator-custom-form').find('.forminator-is_filled');
					if (contact_popup.length > 0) {
						$(".contact-block .contact-form .thankyou-msg-contact").css("display", "block");
						$(".contact-block .contact-form .forminator-custom-form").css("display", "none");
						$('html, body').animate({
							scrollTop: 0,
						}, 9999999999);
					}
				});

				//Mobile Menu Toggle Class.
				$(".navbar .navbar-toggler").on("click", function () {
					$("html").toggleClass("show-menu");
				});

				//Footer Popup Form
				$("footer .modal-body .form-subscribtion-data").css("display", "none");
				$("footer .modal-body .forminator-button-submit").on("click", function () {

					var footer_popup = $('footer').find('.forminator-custom-form').find('.forminator-is_filled');
					if (footer_popup.length > 0) {
						$("footer .modal-body .form-subscribtion-data").css("display", "block");
						$("footer .modal-body .forminator-custom-form").css("display", "none");
					}
				});

				// GDPR
				var gdpr_cookie_name = 'gdpr_cookie_notice_accepted',
				div_wrap = $( '.cookie-policy-wrapper' );

				if ( typeof getCookie( gdpr_cookie_name ) != 'undefined' && getCookie( gdpr_cookie_name ) ) {
					div_wrap.addClass( 'banner-visited' );
					div_wrap.removeClass( 'show' );
					div_wrap.remove();
				}else{
					div_wrap.removeClass( 'banner-visited' );
					div_wrap.addClass( 'show' );
				}
				$( '.cookie-policy-button' ).on( 'click', function() {
					div_wrap.remove();
					setCookie( gdpr_cookie_name, 'visited', '7' );
				});

				$('.decline-button').on('click', function(){
					div_wrap.remove();
				});

				/* Set Cookie Function */
				function setCookie( cname, cvalue, exdays ) {
					var d = new Date();
					d.setTime( d.getTime() + ( exdays*24*60*60*1000 ) );
					var expires = ( exdays != 0 && exdays != '' ) ? d.toUTCString() : 0;
					document.cookie = cname + "=" + cvalue + ";expires=" + expires + ";path=/";
				}

				/* Remove Cookie Function */
				function getCookie( cname ) {
					var name = cname + "=";
					var decodedCookie = decodeURIComponent( document.cookie );
					var ca = decodedCookie.split( ';' );
					for ( var i = 0; i < ca.length; i++ ) {
						var c = ca[i];
						while ( c.charAt(0) == ' ' ) {
							c = c.substring(1);
						}
						if ( c.indexOf(name) == 0 ) {
							return c.substring( name.length, c.length );
						}
					}
					return "";
				}

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
