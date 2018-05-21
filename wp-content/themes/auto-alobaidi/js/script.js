jQuery(function($){

	$(window).load(function(){

		function initilizeAnimate() {
			var logo = $('.lao_left_sidebar .c_logo');
			var cdsf_item = $('.lao_left_sidebar .cdsf_item:not(.cd_hide)');
			var submit_button = $('.lao_left_sidebar .cdsf_item .cdsf_button_box input[type="submit"]');
			var s_social_links = $('.lao_left_sidebar .lao_lsb_container > div:nth-child(3) ul');

			var menu_links = $('.lao_right_sidebar .lao_lrb_container .main_menu > div > ul > li > a').get().reverse();
			var lang_switcher = $('.lao_right_sidebar .lao_lrb_container .lang-switcher>select');
			var contact_details = $('.contact_details ul li a');
			var join_us = $('.lao_right_sidebar .lao_lrb_container .join_us a');

			var tl = new TimelineLite();
			var tl1 = new TimelineLite();

			tl
				.to(logo, 0.5, {scale: 1})
				.staggerTo(cdsf_item, 0.5, {top: 0, opacity: 1, ease: Power0.easeNone}, 0.3)
				.to(submit_button, 0.5, {scale: 1})
				.to(s_social_links, 0.5, {marginLeft: 0, opacity: 1});

			tl1
				.staggerTo(menu_links, 1, {top: 0, opacity: 1, ease: Back.easeInOut.config(3)}, 0.2)
				.to(lang_switcher, 0.5, {right: 0})
				.staggerTo(contact_details, 0.5, {right: 0}, 0.1)
				.to(join_us, 0.5, {scale: 1});

		}

		$('.blinder.logo img').animate({
			opacity: '0',
			visibility: 'hidden',
		}, 200, function(){
			$('.blinder.logo').css({display: 'none'});
			$('.blinder.b_left').css({
				right: '100%',
			});
			$('.blinder.b_right').css({
				left: '100%',
			});
			$('body').addClass('initilized');

			if ($('body').hasClass('initilized')) {
				setTimeout(function(){
					initilizeAnimate();
				}, 600);	
			}
		});
		
	})

	$(document).ready(function() {
		
		
		/* car demon form */

		/* remove the word all in car demon search form */
		/*$('.cdsf_item .selectBox .selected').each(function(){
			var selfText = $(this).html();
			$(this).html(selfText.replace('ALL', ''));
		});*/

		$('#price_range').attr('readonly');

		$('#testimonial_home').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3,
			arrows: false,
		});

		$('.lao_truncate_testimonial').trunk8({
			lines: 3,
		});

		$('.blogs .blog_container .blog_tile h3').trunk8({
			lines: 2,
		});
		$('.blogs .blog_container .blog_tile .b_excerpt p').trunk8({
			lines: 2,
		});

		$('#footer_car_logo').slick({
			infinite: true,
			slidesToShow: 5,
			slidesToScroll: 5,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 2000,
			variableWidth: true,
		});

		$('.vdv_image_view .large').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			asNavFor: '.vdv_image_view .thumb'
		});

		$('.vdv_image_view .thumb').slick({
			slidesToShow: 5,
			slidesToScroll: 5,
			asNavFor: '.vdv_image_view .large',
			dots: false,
			centerMode: false,
			focusOnSelect: true,
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
		});

		$('.branch_showrooms').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>'
		});

		$('.latest_cars').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3,
			arrows: true,
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>'
		});


		$('.tabs .h_tabs ul li a').click(function(e){

			e.preventDefault();

			var self = $(this);
			var data_content = self.data('panel');			

			if (!self.hasClass('active')) {
				$('.tabs .h_tabs ul li a').removeClass('active');
				self.addClass('active');
			}

			if (!$(data_content).hasClass('active_panel')) {
				$('.tabs .h_panel [id^="p_"]').removeClass('active_panel');
				$(data_content).addClass('active_panel');
			}

		});

		var winHeight = $(window).height();

		$(window).scroll(function () {
			if ($(window).scrollTop() > 1000 ) {
				$("#to_top").css({
					'visibility': 'visible',
					'opacity'	: 1,
					'overflow'	: 'visible'
				});
			} else {
				$("#to_top").css({
					'visibility': 'hidden',
					'opacity'	: 0,
					'overflow'	: 'hidden'
				});
			}
		});

		$("#to_top").click(function(){
			$("html, body").animate({ scrollTop: 0 }, "slow");
		});

		var car = '';

		$('.car_lists_item .content .bottom .inquire_now').click(function(){
			var m_default = $('#inquiry_form').find('textarea').val();
			car = "'" + $(this).data('car') + "'";
			var new_m_default = m_default.replace('$car', car);

			$('#inquiry_form').find('textarea').val(new_m_default);
		});

		$('.vehicle_display_view .vdv_buttons .inquire_now').click(function(){
			var m_default = $('#inquiry_form').find('textarea').val();
			car = "'" + $(this).data('car') + "'";
			var new_m_default = m_default.replace('$car', car);

			$('#inquiry_form').find('textarea').val(new_m_default);
		});

		$('.open_popup_general').magnificPopup({
			type: 'inline',
			midClick: true,
		});

		$('.open_inquiry_listings').magnificPopup({
			type:'inline',
			midClick: true,
			callbacks: {
				beforeClose: function(){
					var r_m_default = $('#inquiry_form').find('textarea').val();
					var r_new_m_default = r_m_default.replace(car, "$car");

					$('#inquiry_form').find('textarea').val(r_new_m_default);
				}
			}
		});

		$('.open_email_to_a_friend_listings').magnificPopup({
			type:'inline',
			midClick: true,
		});

		$('.sharing_show_button_list').on('mouseover', function(){
			$(this).find('.sharing_buttons').css({'display':'block'});
		});

		$('.sharing_show_button_list > a').on('click', function(e){
			e.preventDefault();
			$(this).next('.sharing_buttons').css({'display':'block'});
		});

		$('.sharing_show_button_list').on('mouseout', function(){
			$(this).find('.sharing_buttons').css({'display':'none'});
		});

		$('.testimonials .testimonial .says p').trunk8({
			fill: '&hellip; <a id="read-more" href="#">read more</a>',
			lines: 3,
		});

		$('.career_tile p').trunk8({
			lines: 3,
		});

		$('.m_accessories h4').trunk8({
			lines: 2,
		});

		$('.main_menu .menu-item-has-children > a').click(function(e){
			e.preventDefault();
			$(this).next().slideToggle(200);
		});

		$(".selectBox .selectOptions").click(function(){
			$(this).css({'display':'none'});
		});

		$('.branch_images').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			}
		});

		/* find the tallest div */

		var branchTile1 = $('.branch-tile-1');
		var home_new_cars = $('.home_new_cars');
		var bm_tile = $('.bm_tile');
		var a_accessories = $('.a_accessories');

		function divSameHeight (selector) {
			var maxHeight = 0;
			selector.each(function(){
				if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
			});
			selector.height(maxHeight);
		}

		divSameHeight(branchTile1);
		divSameHeight(home_new_cars);
		divSameHeight(bm_tile);
		divSameHeight(a_accessories);

		$('.accessories .m_accessories_link').click(function(){
			var textareaValue = 'Hi, I wanted to know more about ' + $(this).data('productname') + '. Please send me an email or contact me on my number.';
			$('#accessories_inquiry_form').find('textarea').val(textareaValue);
		});

	});

	$(document).mouseup(function (e){
		var container = $(".selectBox .selectOptions");

		if (!container.is(e.target) && container.has(e.target).length === 0){
			container.css({'display':'none'});
		}
	});

	$(document).on('click', '#read-more', function (event) {
		$(this).parent().trunk8('revert').append(' <a id="read-less" href="#">read less</a>');
		return false;
	});

	$(document).on('click', '#read-less', function (event) {
		$(this).parent().trunk8();
		return false;
	});

});