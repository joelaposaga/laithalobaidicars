jQuery(function($){

	$(document).ready(function() {
		
		/* car demon form */

		/* remove the word all in car demon search form */
		$('.cdsf_item .selectBox .selected').each(function(){
			var selfText = $(this).html();
			$(this).html(selfText.replace('ALL', ''));
		});

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
			slidesToShow: 5,
			slidesToScroll: 5,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 2000,
		});

	});

	$(document).mouseup(function (e){
		var container = $(".selectBox .selectOptions");

		if (!container.is(e.target) && container.has(e.target).length === 0){
			container.css({'display':'none'});
		}
	});

});