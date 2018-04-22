jQuery(function($){

	$(document).ready(function() {
		
		/*$('#car-demon-search-cars div').each(function(){
			$(this).html($(this).html().replace(/&nbsp;/gi,''));
		});*/

		/* Change select label */
		/*$('#car-demon-search-cars select[name="search_condition"] option').first().html('Car Status');
		$('#car-demon-search-cars select[name="search_make"] option').first().html('Car Make');
		$('#car-demon-search-cars select[name="search_year"] option').first().html('Year');
		$('#car-demon-search-cars select[name="search_model"] option').first().html('Model');
		$('#car-demon-search-cars select[name="search_dropdown_Min_price"] option').first().html('Min Price');
		$('#car-demon-search-cars select[name="search_dropdown_Max_price"] option').first().html('Max Price');
		$('#car-demon-search-cars select[name="search_dropdown_body"] option').first().html('Car Type');*/

		/*$('#car-demon-search-cars select[name="search_condition"] option').first(function(){
			console.log($(this).html());
		});*/


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

});