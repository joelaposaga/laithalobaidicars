jQuery(function($){

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
			slidesToShow: 1,
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

		})

	});

	$(document).mouseup(function (e){
		var container = $(".selectBox .selectOptions");

		if (!container.is(e.target) && container.has(e.target).length === 0){
			container.css({'display':'none'});
		}
	});

});