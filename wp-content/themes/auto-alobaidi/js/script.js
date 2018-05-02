jQuery(function($){

	$(window).load(function(){
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
			})
		})
	})

	$(document).ready(function() {
		
		/* car demon form */

		/* remove the word all in car demon search form */
		$('.cdsf_item .selectBox .selected').each(function(){
			var selfText = $(this).html();
			$(this).html(selfText.replace('ALL', ''));
		});

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

		$('#footer_car_logo').slick({
			infinite: true,
			slidesToShow: 8,
			slidesToScroll: 5,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 2000,
		});

		$('.vdv_image_view .large').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			asNavFor: '.vdv_image_view .thumb'
		});

		$('.vdv_image_view .thumb').slick({
			slidesToShow: 5,
			slidesToScroll: 3,
			asNavFor: '.vdv_image_view .large',
			dots: false,
			centerMode: true,
			focusOnSelect: true,
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
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

	});

	$(document).mouseup(function (e){
		var container = $(".selectBox .selectOptions");

		if (!container.is(e.target) && container.has(e.target).length === 0){
			container.css({'display':'none'});
		}
	});

});