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

				$('.postcode-checker .name-field input[name="text-1"]').attr('autocomplete', 'off');


				$('.postcode-checker .name-field input[name="text-1"]').attr('id', 'postcode-checker-input');
				$('.we-buy-house-postcode .input-postcode input[name="text-1"]').attr('id', 'webuy-postcode-checker-input');
				$('.blog-postcode .input-blog-postcode input[name="text-1"]').attr('id', 'blog-postcode-checker-input');
				$('.contact-form input[name="text-1"]').attr('id', 'contact-postcode-checker-input');

				//Postcode button js.
				$(".blog-postcode button.btn-postcode").hide().css('display', 'none');
				$('.blog-postcode .input-blog-postcode .forminator-input').on('change', function(){
					$(".blog-postcode button.btn-postcode").show().css('display', 'block');
				});

				$(".full-with-banner-block .we-buy-house-postcode button.btn-postcode").hide().css('display', 'none');
				$('.full-with-banner-block .we-buy-house-postcode .input-postcode .forminator-input').on('change', function(){
					$(".full-with-banner-block .we-buy-house-postcode button.btn-postcode").show().css('display', 'block');
				});

				$(".large-postcode-cta-block .we-buy-house-postcode button.btn-postcode").hide().css('display', 'none');
				$('.large-postcode-cta-block .we-buy-house-postcode .input-postcode .forminator-input').on('change', function(){
					$(".large-postcode-cta-block .we-buy-house-postcode button.btn-postcode").show().css('display', 'block');
				});

				$(".content-detail-page-block .we-buy-house-postcode button.btn-postcode").hide().css('display', 'none');
				$('.content-detail-page-block .we-buy-house-postcode .input-postcode .forminator-input').on('change', function(){
					$(".content-detail-page-block .we-buy-house-postcode button.btn-postcode").show().css('display', 'block');
				});

				//Tab changes
				var href = $( '.tab-content .next-step a' ).attr( 'href' );
				$('.tab-pane .btn').click(function(e) {
					e.preventDefault()
					document.querySelector(`#${e.target.getAttribute("data-target")}`).querySelector(`#${e.target.getAttribute("data-id")}`)?.click()
			  	});

				$('.detailed-step-block .tab-content .tab-pane .btn:last').addClass('last-tab');

				$('.detailed-step-block .tab-content .tab-pane .last-tab').click(function(e) {
					var link = $(this).attr('href');
					$('html, body').animate({ scrollTop: ($(link).offset().top-100)} , 500);
					return false;
				});

				//Glide slider
				if ( $( '.logo_glide' ).length > 0) {
					$( '.logo_glide' ).each(function(){
						const logo_glide = new Glide( '.logo_glide', {
							type: 'carousel',
							perView: 6,
							autoplay: 2000,
							bound: true,
							gap: 30,
							breakpoints: {
								991: {
								perView: 4
								},
								767: {
								perView: 3
								},
								575: {
								perView: 2
								},
							},
						}).mount();
					});
				}
				if ( $( '.category_glide' ).length > 0) {
					$( '.category_glide' ).each(function(){
						const category_glide = new Glide( '.category_glide', {
							type: 'carousel',
							perView: 3,
							autoplay: 2000,
							bound: true,
							gap: 30,
							breakpoints: {
								991: {
								perView: 3
								},
								767: {
								perView: 2
								},
								575: {
								perView: 1
								},
							},
						}).mount();
					});
				}

				//Blog post filter
				searchBlogCategoriesClickHandler();
				function searchBlogCategoriesClickHandler() {
					$(".post-search-button").on("click", function(e) {
						e.preventDefault();
						var keyword = $("#blogCategoriesSearch").val();
						var $posts = $("li.recent-post-filter.dev-pag-container");

						var count = $("li.recent-post-filter.dev-pag-container").nextAll().length - 1;

						if(keyword && keyword.trim().length > 0) {
							var k = keyword.trim().toLowerCase();
							$posts.each(function(i) {
								var $this = $(this);
								if($this.find(".title-filter").text().toLowerCase().indexOf(k) > -1) {
									$this.removeClass("js-hide");
								} else {
									$this.addClass("js-hide");
								}
							});
						} else {
							$posts.removeClass("js-hide");
						}
					});
				}


				/****** Video magnific popup ******/
				$( '.popup-youtube, .popup-vimeo' ).magnificPopup({
					// disableOn: 767,
					type: 'iframe',
					mainClass: 'mfp-fade',
					removalDelay: 160,
					preloader: false,
					fixedContentPos: true,
					closeBtnInside: false
				});

				// search career post

				function debounce(func, wait, immediate) {
					var timeout;
					return function() {
						var context = this, args = arguments;
						var later = function() {
							timeout = null;
							if (!immediate) func.apply(context, args);
						};
						var callNow = immediate && !timeout;
						clearTimeout(timeout);
						timeout = setTimeout(later, wait);
						if (callNow) func.apply(context, args);
					};
				}

				//Search jobs
				$("#jobSearch").on("keyup", debounce(function() {
					var keyword = $(this).val();

					var $allItems = $(".careers-data .js-item");

					$allItems.removeClass("js-include").addClass("js-hide");

					if(keyword && keyword.trim().length > 0) {
						var lowerCasekeyword = keyword.trim().toLocaleLowerCase();
						$allItems.each(function() {
							var $this = $(this);
							var title = $this.find("h5").text();
							if(title && title.toLocaleLowerCase().indexOf(lowerCasekeyword) > -1) {
								$this.addClass("js-include").removeClass("js-hide");
							}
						});
					} else {
						$allItems.addClass("js-include");
					}

					$(".careers-data .js-include:lt(" + 4 + ")").removeClass("js-hide");

					if($(".careers-data .js-include").length > 4) {
						$(".load-more-btn").show();
					} else {
						$(".load-more-btn").hide();
					}
				}, 200));

				// Load more jobs
				$(".load-more-btn").on("click", function(e) {
					e.preventDefault();
					$(".load-more-btn-wrapper").addClass('hide');
					var $this = $(this);

					var $allIncludedItems = $(".careers-data .js-include");

					var numberOfAllIncludedItems =  $allIncludedItems.length;
					var numberOfVisibleItems = $allIncludedItems.not(".js-hide").length;

					var numberOfItemsToBeVisible = numberOfVisibleItems + 4;

					$(".careers-data .js-include:lt(" + numberOfItemsToBeVisible + ")").removeClass("js-hide");

					if(numberOfAllIncludedItems <= numberOfItemsToBeVisible) {
						$this.hide();
					}
				});

				// Twitter feed
				window.addEventListener('load', function () { GetLiveData('https://www.apteve.com/thirdparty/module/__ob0bPFR__q0=/--n__sDlSYxBg=/', '#replacemodule2bikdphm5cz7kvy8qakq-9enab0eiheh', false, '') });
				function GetLiveData(url, id, iscached, querystring) {
					if (typeof querystring === 'undefined') { querystring = location.search; }
					if ($(id).length) {
						$.ajax({
							url: url + location.search,
							cache: iscached,
							crossDomain : true,
							dataType: 'jsonp',
							type: "GET",
							success: function (data) {
							if (data == "PageNotFound")
								{
									window.location = "page-not-found";
								}
							else
								{ $(id).html(data) }
							},
							error: function (reponse) {
								$(id).html("error : " + reponse.responseText);
							}
						});
					}
				}

				//Contact Form
				if ( $(".contact-form").find("form").find("[data-step=0]").attr("hidden") !== "hidden" ) {
					$(document).on('click', ".forminator-pagination-footer .forminator-button-next", function(e){
						$(".forminator-pagination-footer .forminator-button-next").addClass('step-two');
					});
				}

				$(document).on('click', ".forminator-pagination-footer .step-two", function(e){
					e.preventDefault();
					$(".forminator-pagination-footer .forminator-button-submit").removeClass('step-two');
					var value = $("[name=text-1]").val();
					var address = $("input[type='radio'][name='radio-1']:checked").val();
					var image = $("input[type='radio'][name='radio-1']:checked").next().next().next().find('span').css('background-image');
					var bgimage = image.replace('url(','').replace(')','').replace(/\"/gi, "");
					var contactform = $(".contact-form").find("form").find("[data-step=2]");
					contactform.prepend('<div class="summary"><img src="'+ bgimage +'" ><div class="form-details"><div class="address"><b>Address</b>:'+ value +'</div><div class="property-type"><b>Property Type</b>:'+ address +'</div></div></div>');

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

				//blogpostcode cookie store.
				$( document ).on( 'click', '.blog-postcode .forminator-button-submit', function ( e ) {
					var  _self = $( this );
					var name_val     = _self.parents( '.blog-postcode' ).find( '.input-blog-postcode input' ).val();

					$.cookie( 'blog_postcode_val', name_val, { path: '/' } );

				});
				var blog_postcode_val     = $.cookie( 'blog_postcode_val' );
				$('.contact-form input[name="text-1"]').val(blog_postcode_val);


				//postcode cookie store.
				$( document ).on( 'click', '.postcode-checker .forminator-button-submit', function ( e ) {
					var  _self = $( this );
					var name_val     = _self.parents( '.postcode-checker' ).find( '.name-field input' ).val();
					$.cookie( 'cookie_data', name_val, { path: '/' } );
					$.cookie( 'postcode_name_val', name_val, { path: '/' } );
				});
					var postcode_val = $.cookie( 'cookie_data' );
					var name_val = $.cookie( 'postcode_name_val' );
					$('.postcode-checker .name-field input[name="text-1"]').val(name_val);
					$('.contact-form input[name="text-1"]').val(postcode_val);
					$(window).load(function(e){
						$.removeCookie('postcode_name_val', { path: '/' });
					});


				//webuy-postcode cookie store.
				$( document ).on( 'click', '.we-buy-house-postcode .forminator-button-submit', function ( e ) {
					var  _self = $( this );
					var input_val     = _self.parents( '.we-buy-house-postcode' ).find( '.input-postcode input' ).val();
					$.cookie( 'cookie_data', input_val, { path: '/' } );
					$.cookie( 'webuy_input_val', input_val, { path: '/' } );
				});
				var postcode_input = $.cookie( 'cookie_data' );
				var input_val = $.cookie( 'webuy_input_val' );
				$('.postcode .input-postcode input[name="text-1"]').val(input_val);
				$('.contact-form input[name="text-1"]').val(postcode_input);
				$(window).load(function(e){
					$.removeCookie('webuy_input_val', { path: '/' });
				});

				//blogpostcode cookie store.
				$( document ).on( 'click', '.blog-postcode .forminator-button-submit', function ( e ) {
					var  _self = $( this );
					var blog_input_val     = _self.parents( '.blog-postcode' ).find( '.input-blog-postcode input' ).val();
					$.cookie( 'cookie_data', blog_input_val, { path: '/' } );
					$.cookie( 'blog_input_val', blog_input_val, { path: '/' } );
				});
				var blog_postcode_input = $.cookie( 'cookie_data' );
				var blog_input_val = $.cookie( 'blog_input_val' );
				$('.postcode .input-blog-postcode input[name="text-1"]').val(blog_input_val);
				$('.contact-form input[name="text-1"]').val(blog_postcode_input);
				$(window).load(function(e){
					$.removeCookie('blog_input_val', { path: '/' });
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
