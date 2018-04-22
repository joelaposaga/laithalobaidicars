<?php

/* background-container */
function lao_background_container ($attr, $content = null) {
	$s_attr = shortcode_atts(array(
		'background_image' => ''
	), $attr);

	$display = '<div style="background-image:url('. esc_attr($s_attr['background_image']) .');background-size:cover;background-repeat:no-repeat;background-position:center top;background-attachment:fixed;padding-left:200px;padding-right:200px;">'. do_shortcode($content) .'</div>';

	return $display;
}
add_shortcode( 'background_container', 'lao_background_container' );

/* testimonials */
function lao_testimonials () {

	ob_start();

	$args = array(
		'post_type' => 'testimonials',
		'post_status' => 'publish',
		'posts_per_page' => 12,
		'order' => 'DESC',
		'orderby' => 'date'
	);
	$testimonial = new WP_Query( $args );

	if ($testimonial->have_posts()) {
		while ($testimonial->have_posts()) {
			$testimonial->the_post();
			$featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$get_the_avatar = (!empty($featured_image) ? $featured_image : get_theme_file_uri('/images/avatar.png'));

			?>

			<div>
				<div class="testimonial-tile">
					<div>
						<figure><img src="<?php echo $get_the_avatar; ?>"></figure>
						<h4><?php the_title(); ?></h4>
					</div>
					<div>
						<p class="lao_truncate_testimonial" data-truncate-line="3"><?php the_content(); ?></p>
					</div>
				</div>
			</div>

			<?php

		}
		wp_reset_postdata();
	}

	return ob_get_clean();
}
add_shortcode( 'testimonials_slider', 'lao_testimonials' );

/* 
* footer car company logo 
* Make sure the height of the image is exactly 100px and width is any size.	
*/
function lao_footer_car_company_logo () {

	ob_start();

	$company_logo = array(
		array(
			'name' 	=> 	'BMW',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/bmw.png'),
			'url' 	=> 	home_url(),
		),
		array(
			'name' 	=> 	'Hyundai',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/hyundai.png'),
			'url' 	=> 	home_url(),
		),
		array(
			'name' 	=> 	'Jaguar',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/jaguar.png'),
			'url' 	=> 	home_url(),
		),
		array(
			'name' 	=> 	'Kia',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/kia.png'),
			'url' 	=> 	home_url(),
		),
		array(
			'name' 	=> 	'Land Rover',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/landrover.png'),
			'url' 	=> 	home_url(),
		),
		array(
			'name' 	=> 	'Mitsubishi',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/mitsubishi.png'),
			'url' 	=> 	home_url(),
		),
		array(
			'name' 	=> 	'Nissan',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/nissan.png'),
			'url' 	=> 	home_url(),
		),
		array(
			'name' 	=> 	'Toyota',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/toyota.png'),
			'url' 	=> 	home_url(),
		),
		array(
			'name' 	=> 	'Volkswagen',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/volkswagen.png'),
			'url' 	=> 	home_url(),
		),
	);

	for ($i=0; $i < count($company_logo) ; $i++) { 
		?>

			<div>
				<div class="footer_car_logo">
					<a href="<?php echo $company_logo[$i]['url'] ?>"><img src="<?php echo $company_logo[$i]['logo'] ?>" title="<?php echo $company_logo[$i]['name'] ?>"></a>
				</div>
			</div>

		<?php
	}

	return ob_get_clean();
}
add_shortcode( 'footer_car_logo', 'lao_footer_car_company_logo' );