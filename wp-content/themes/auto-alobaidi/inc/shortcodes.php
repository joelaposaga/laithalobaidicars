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


/* Get the latest cara */

function lao_get_latest_cars() {

	$args = array(
		'post_type' => 'cars_for_sale',
		'post_status' => 'publish',
		'order' => 'DESC',
		'orderby' => 'date',
		'post_per_page' => '6',
	);

	$post_number = 0;

	$getLatestCars = new WP_Query($args);

	ob_start();

	?>
		<div class="row">
			<?php

			if ( $getLatestCars->have_posts() ) :
				while( $getLatestCars->have_posts() ) : $getLatestCars->the_post();

					if ($post_number === 6) {
						break;
					}

					$get_car_meta = get_post_meta( get_the_ID() );
					$specs = unserialize($get_car_meta['decode_string'][0]);

				?>
					<div class="col-lg-4">
						<a href="<?php the_permalink() ?>">
							<div class="home_new_cars">
								<div><?php the_post_thumbnail('car_thumb_img'); ?></div>
								<div><?php the_title(); ?></div>
								<div>
									<span><?php echo 'AED ' . number_format($get_car_meta['_price_value'][0]); ?></span>
									<span><?php echo '<i class="fa fa-tachometer" aria-hidden="true"></i> ' . $get_car_meta['_mileage_value'][0] . ' KM'; ?></span>
								</div>
								<div>
									<ul>

										<?php if(!empty($specs['condition'])) { ?>
											<li><?php echo $specs['condition']; ?></li>
										<?php } ?>
										<?php if(!empty($specs['decoded_model_year'])) { ?>
											<li><?php echo $specs['decoded_model_year']; ?></li>
										<?php } ?>
										<?php if(!empty($specs['decoded_transmission_long'])) { ?>
											<li><?php echo $specs['decoded_transmission_long']; ?></li>
										<?php } ?>
										<?php if(!empty($specs['exterior_color'])) { ?>
											<li><?php echo $specs['exterior_color']; ?></li>
										<?php } ?>
										<?php if(!empty($specs['fuel_type'])) { ?>
											<li><?php echo $specs['fuel_type']; ?></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</a>
					</div>

				<?php
					$post_number++;
				endwhile;
				wp_reset_postdata();
			endif;

			?>
			<div class="col-12" style="text-align: right;">
				<a href="<?php echo home_url(); ?>/car-stocks/" class="load_more">Load More <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
			</div>
		</div>
	<?php

	return ob_get_clean();

}
add_shortcode( 'home_new_cars', 'lao_get_latest_cars' );

function lao_get_latest_cars_footer() {
	$args = array(
		'post_type' => 'cars_for_sale',
		'post_status' => 'publish',
		'order' => 'DESC',
		'orderby' => 'date',
		'post_per_page' => '6',
	);

	$post_number = 0;

	$getLatestCarsFooter = new WP_Query($args);

	ob_start();

	?>

		<div class="latest_car_footer">
			<?php 
				if ($getLatestCarsFooter->have_posts()) :
					while ($getLatestCarsFooter->have_posts()) : $getLatestCarsFooter->the_post();

						if ($post_number === 5) {
							break;
						}

						$get_car_meta = get_post_meta( get_the_ID() );
						$specs = unserialize($get_car_meta['decode_string'][0]);

						?>
							<div>
								<a href="<?php the_permalink() ?>"><div class="lcf_image" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>');"></div></a>
								<div class="lcf_content">
									<a href="<?php the_permalink() ?>"><h4><?php the_title() ?></h4></a>
									<span><?php echo '<i class="fa fa-tachometer" aria-hidden="true"></i> ' . $get_car_meta['_mileage_value'][0] . ' KM'; ?></span>
								</div>
							</div>
						<?php
						$post_number++;
					endwhile;					
					wp_reset_postdata();
				endif;
			?>
		</div>

	<?php
}
add_shortcode( 'footer_new_cars', 'lao_get_latest_cars_footer' );