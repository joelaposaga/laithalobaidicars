<?php

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
			$get_the_avatar = (!empty($featured_image) ? $featured_image : content_url() . '/uploads/2018/05/avatar.jpg');

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
			'name' 	=> 	'Audi',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/audi.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Audi',
		),
		array(
			'name' 	=> 	'BMW',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/bmw.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=BMW',
		),
		array(
			'name' 	=> 	'Chevrolet',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/chevrolet.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Chevrolet',
		),
		array(
			'name' 	=> 	'Chrysler',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/chrysler.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Chrysler',
		),
		array(
			'name' 	=> 	'Dodge',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/dodge.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Dodge',
		),
		array(
			'name' 	=> 	'Fiat',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/fiat.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Fiat',
		),
		array(
			'name' 	=> 	'Ford',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/ford.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Ford',
		),
		array(
			'name' 	=> 	'Honda',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/honda.png'),
			'url' 	=> 	home_url()  . '/car-stocks/?search_make=Honda',
		),
		array(
			'name' 	=> 	'Infiniti',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/infiniti.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Infiniti',
		),
		array(
			'name' 	=> 	'Jeep',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/jeep.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Jeep',
		),
		array(
			'name' 	=> 	'Land Rover',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/landrover.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Land+Rover',
		),
		array(
			'name' 	=> 	'Lexus',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/lexus.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Lexus',
		),
		array(
			'name' 	=> 	'Maserati',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/maserati.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Maserati',
		),
		array(
			'name' 	=> 	'Mazda',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/mazda.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Mazda',
		),
		array(
			'name' 	=> 	'Mercedes',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/mercedes.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Mercedes',
		),
		array(
			'name' 	=> 	'Mitsubishi',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/mitsubishi.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Mitsubishi',
		),
		array(
			'name' 	=> 	'Renault',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/renault.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Renault',
		),
		array(
			'name' 	=> 	'Trolly',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/trolly.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Trolly',
		),
		array(
			'name' 	=> 	'Volvo',
			'logo' 	=> 	get_theme_file_uri('/images/car-logos/volvo.png'),
			'url' 	=> 	home_url() . '/car-stocks/?search_make=Volvo',
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


/* Get the monthly deals */
function lao_get_monthly_deals_car() {

	$args = array(
		'post_type' => 'cars_for_sale',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'vehicle_tag',
				'field' => 'slug',
				'terms' => 'monthly-deal'
			),
		),
		'order' => 'DESC',
		'orderby' => 'date',
		'post_per_page' => '6',
	);

	$post_number = 0;

	$getMonthlyDealCars = new WP_Query($args);

	ob_start();

	?>
		<div class="row">
			<?php

			if ( $getMonthlyDealCars->have_posts() ) :
				while( $getMonthlyDealCars->have_posts() ) : $getMonthlyDealCars->the_post();

					if ($post_number === 6) {
						break;
					}

					$get_car_meta = get_post_meta( get_the_ID() );
					$specs = unserialize($get_car_meta['decode_string'][0]);

				?>
					<div class="col-lg-4 col-md-6">
						<a href="<?php the_permalink() ?>">
							<div class="home_monthly_deal_cars">
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
								<div><button>View Details <i class="fa fa-arrow-right" aria-hidden="true"></i></button></div>
							</div>
						</a>
					</div>

				<?php
					$post_number++;
				endwhile;
				wp_reset_postdata();
			endif;

			?>
			<div class="col-12 home_load_more_container">
				<a href="<?php echo home_url(); ?>/car-stocks/" class="load_more">Load More <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
			</div>
		</div>
	<?php

	return ob_get_clean();

}
add_shortcode( 'home_monthly_deal_cars', 'lao_get_monthly_deals_car' );

/* Get latest Cars*/
function lao_get_latest_cars() {
	$args = array(
		'post_type' => 'cars_for_sale',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'vehicle_condition',
				'field' => 'slug',
				'terms' => 'new'
			),
		),
		'order' => 'DESC',
		'orderby' => 'date',
		'post_per_page' => 12,
	);

	$post_number = 0;

	$getLatestCars = new WP_Query($args);

	ob_start();

	?>

		<div class="latest_cars">
			<?php 
				if ($getLatestCars->have_posts()) :
					while ($getLatestCars->have_posts()) : $getLatestCars->the_post();

						if ($post_number === 5) {
							break;
						}

						$get_car_meta = get_post_meta( get_the_ID() );
						$specs = unserialize($get_car_meta['decode_string'][0]);

						?>
							<div>
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
										<div><button>View Details <i class="fa fa-arrow-right" aria-hidden="true"></i></button></div>
									</div>
								</a>
							</div>
						<?php
						$post_number++;
					endwhile;					
					wp_reset_postdata();
				endif;
			?>
		</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'new_cars', 'lao_get_latest_cars' );

/* Get Blogs */
function lao_get_blogs() {

	ob_start();

	$paged = ( get_query_var('paged') ? get_query_var('paged') : 1 );

	$args = array(
		'post_type' => array('post'),
		'post_status' => array('publish'),
		'posts_per_page' => 9,
		'order' => 'DESC',
		'orderby' => 'date',
		'paged' => $paged,
	);

	$getBlogPosts = new WP_Query( $args );

	if ( $getBlogPosts->have_posts() ) {
		?>
			<div class="blog_container">
		<?php
			while ( $getBlogPosts->have_posts() ) {
				$getBlogPosts->the_post();

				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
				?>

					<div class="blog_tile">
						<a href="<?php the_permalink(); ?>"><div class="b_image" style="background-image: url('<?php echo $featured_img_url; ?>')"></div></a>
						<div class="b_excerpt">
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="b_read_more">Read More</a>
						</div>
					</div>

				<?php
			}
		?>
			</div>
			<div class="page_navigation">
				<?php 
					echo paginate_links(
						array( 
							'total' => $getBlogPosts->max_num_pages , 
							'type' => 'list',
							'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
							'next_text' => '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
						)
					); 
				?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php
	} else {
		?>
			<div class="no_result">No Blogs Added.</div>
		<?php
	}

	return ob_get_clean();
}
add_shortcode( 'get_blogs', 'lao_get_blogs' );

/* Get Events */
function lao_get_events() {

	ob_start();

	$paged = ( get_query_var('paged') ? get_query_var('paged') : 1 );

	$args = array(
		'post_type' => array('events'),
		'post_status' => array('publish'),
		'posts_per_page' => 9,
		'order' => 'DESC',
		'orderby' => 'date',
		'paged' => $paged,
	);

	$getBlogPosts = new WP_Query( $args );

	if ( $getBlogPosts->have_posts() ) {
		?>
			<div class="blog_container">
		<?php
			while ( $getBlogPosts->have_posts() ) {
				$getBlogPosts->the_post();

				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
				?>

					<div class="blog_tile">
						<a href="<?php the_permalink(); ?>"><div class="b_image" style="background-image: url('<?php echo $featured_img_url; ?>')"></div></a>
						<div class="b_excerpt">
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="b_read_more">Read More</a>
						</div>
					</div>

				<?php
			}
		?>
			</div>
			<div class="page_navigation">
				<?php 
					echo paginate_links(
						array( 
							'total' => $getBlogPosts->max_num_pages , 
							'type' => 'list',
							'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
							'next_text' => '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
						)
					); 
				?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php
	} else {
		?>
			<div class="no_result">No Events Added.</div>
		<?php
	}

	return ob_get_clean();
}
add_shortcode( 'get_events', 'lao_get_events' );

/* Get Board Members */
function lao_get_our_team_board_member() {

	ob_start();

	$args = array(
		'post_type' => 'our_team',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'designation',
				'field' => 'slug',
				'terms' => 'board-member',
			),
		),
	);

	$getBoardMember = new WP_Query( $args );


	if ( $getBoardMember->have_posts() ) {
		while ( $getBoardMember->have_posts() ) {
			$getBoardMember->the_post();

			$getMetaFacebook = get_post_meta( get_the_ID(), 'facebook', true );
			$getMetaTwitter = get_post_meta( get_the_ID(), 'twitter', true );
			$getMetaInstagram = get_post_meta( get_the_ID(), 'instagram', true );
			$getMetaLinkedin = get_post_meta( get_the_ID(), 'linkedin', true );
			$getMetaEmail = get_post_meta( get_the_ID(), 'email', true );
			
			?>

				<div class="col-md-6 col-12">
					<div class="bm_tile">
						<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" class="framed-bg">
						<h4><?php the_title(); ?></h4>
						<p><?php the_content(); ?></p>

						<div class="links">
							<ul>
								<li><a href="<?php echo esc_url( $getMetaFacebook ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo esc_url( $getMetaTwitter ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo esc_url( $getMetaInstagram ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo esc_url( $getMetaLinkedin ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo esc_url( $getMetaEmail ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			<?php

		}
		wp_reset_postdata();
	}

	return ob_get_clean();
}
add_shortcode( 'board_members', 'lao_get_our_team_board_member' );

/* Get Sales */
function lao_get_our_team_sales() {

	ob_start();

	$args = array(
		'post_type' => 'our_team',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'designation',
				'field' => 'slug',
				'terms' => 'sales',
			),
		),
	);

	$getSales = new WP_Query( $args );

	if ($getSales->have_posts()) {
		while ($getSales->have_posts()) {
			$getSales->the_post();

			$getSalesNumbers = get_post_meta( get_the_ID(), 'contact_numbers', true );
			$getMetaEmail = get_post_meta( get_the_ID(), 'email', true );
			$getSalesImage = (!empty(get_the_post_thumbnail_url( get_the_ID(), 'full' )) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : content_url() . '/uploads/2018/05/sales_avatar.png');

			?>

				<div class="col-md-4 col-sm-6 col-12">
					<div class="bm_tile">
						<img src="<?php echo $getSalesImage; ?>">
						<h4><?php the_title(); ?></h4>
						<div class="contact_number" style="margin-bottom: 15px;">
							<ul>
								<?php  

									foreach (explode( "\r\n", $getSalesNumbers) as $gsn_value) {
										?>
											<li><a href="tel:<?php str_replace(' ', '', $gsn_value) ?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $gsn_value; ?></a></li>
										<?php
									}

								?>
								<li><a href="<?php echo esc_url( $getMetaEmail ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $getMetaEmail; ?></a></li>	
							</ul>
							
						</div>
						<!-- <div class="links">
							<ul>
								<li><a href="<?php //echo esc_url( $getMetaFacebook ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="<?php //echo esc_url( $getMetaTwitter ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="<?php //echo esc_url( $getMetaInstagram ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="<?php //echo esc_url( $getMetaLinkedin ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="<?php //echo esc_url( $getMetaEmail ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
							</ul>
						</div> -->
					</div>
				</div>


			<?php

		}
		wp_reset_postdata();
	}

	return ob_get_clean();
}
add_shortcode( 'sales_team', 'lao_get_our_team_sales' );

/* contact us branches */
function lao_get_contact_us_branches() {


	ob_start();

	$argsTerm = array(
		'taxonomy' => 'branch_categories',
		'hide_empty' => false,
		'order' => 'DESC',
		'orderby' => 'name'
	);

	$getBranchCategory = get_terms( $argsTerm );

	foreach ($getBranchCategory as $gbc_value) {

		if ($gbc_value->parent === 0) {

			?>

				<div class="col-12 branches" style="padding-bottom: 30px;">
					<h3><?php echo $gbc_value->name; ?></h3>

					<?php  

						$getBranchCategoryChildren = get_term_children( $gbc_value->term_id, $gbc_value->taxonomy );

						if (count($getBranchCategoryChildren) !== 0) {

							?>

								<div class="tabs">
									<div class="h_tabs">
										<ul>

											<?php  
												$gbcc_count = 0;
												foreach ($getBranchCategoryChildren as $gbcc_value) {
													$gbcc_count++;

													$gbcc_term = get_term( $gbcc_value, $gbc_value->taxonomy );

														?>

															<li><a href="" data-panel="#p_<?php echo $gbcc_count; ?>" class="<?php echo ($gbcc_count === 1 ? 'active' : ''); ?>"><?php echo $gbcc_term->name; ?></a></li>

														<?php
												}
											?>
											
										</ul>
									</div>
									<div class="h_panel">

										<?php  
											$gbcc_count = 0;
											foreach ($getBranchCategoryChildren as $gbcc_value) {
												$gbcc_count++;
												$gbcc_term = get_term( $gbcc_value, $gbc_value->taxonomy );



												$gbcc_posts_args = array(
													'post_type' => 'branches',
													'post_status' => 'publish',
													'posts_per_page' => 1,
													'order' => 'ASC',
													'orderby' => 'date',
													'tax_query' => array(
														array(
															'taxonomy' => 'branch_categories',
															'field' => 'term_id',
															'terms' => $gbcc_term->term_id,
														),
													),
												);

												$gbcc_posts = new WP_Query( $gbcc_posts_args );

												if ($gbcc_posts->have_posts()) {
													while ($gbcc_posts->have_posts()) {
														$gbcc_posts->the_post();

														$gbcc_posts_meta_map = get_post_meta( get_the_ID(), 'location', true );
														$gbcc_posts_meta_address = get_post_meta( get_the_ID(), 'address', true );
														$gbcc_posts_meta_email_address = get_post_meta( get_the_ID(), 'email_address', true );
														$gbcc_posts_meta_phone_number = get_post_meta( get_the_ID(), 'phone_number', true );
														?>

															<div id="p_<?php echo $gbcc_count; ?>" class="<?php echo ($gbcc_count === 1 ? 'active_panel' : ''); ?>">
											    				<div class="h_panel_head <?php echo ($gbcc_count === 1 ? 'active' : ''); ?>" data-panel="#p_<?php echo $gbcc_count; ?>"><?php echo $gbcc_term->name; ?><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
											    				<div class="inner_panel">
											    					<?php /* ?><div class="row">
											    						<div class="col-lg-4">
											    							<div class="branch_info">
											    								
											    								<ul>
											    									<li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $gbcc_posts_meta_address; ?></li>
											    									<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $gbcc_posts_meta_email_address; ?></li>
											    									<?php  
											    										foreach (explode("\r\n", $gbcc_posts_meta_phone_number) as $gpmpn_value) {

										    												if (!empty($gpmpn_value)) {

												    											?>

												    												<li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $gpmpn_value; ?></li>

												    											<?php		

										    												}
											    										}
											    									?>
											    								</ul>

											    								<?php the_content() ?>

											    							</div>
											    						</div>
											    						<div class="col-lg-8">
											    							<div>
											    								<?php echo $gbcc_posts_meta_map; ?>
											    							</div>
											    						</div>
											    					</div><?php */ ?>

											    					<div class="branch_info_new">
											    						<div>
											    							<?php the_content() ?>
											    						</div>
											    						<div>
											    							<a href="#contact_us_map_<?php echo $gbcc_count; ?>" class="open_popup_general"><i class="fa fa-map" aria-hidden="true"></i> View Map </a>
											    							<div id="contact_us_map_<?php echo $gbcc_count; ?>" class="white-popup popup-map mfp-hide">
																				<?php echo $gbcc_posts_meta_map; ?>
																			</div>
											    						</div>
											    					</div>
											    				</div>
											    			</div>

														<?php

													}
												}

											}
										?>
									</div>
								</div>

							<?php
						} else {

							$gbc_posts_args = array (
								'post_type' => 'branches',
								'post_status' => 'publish',
								'posts_per_page' => 1,
								'order' => 'ASC',
								'orderby' => 'date',
								'tax_query' => array(
									array(
										'taxonomy' => 'branch_categories',
										'field' => 'term_id',
										'terms' => $gbc_value->term_id,
									),
								),
							);

							$gbc_posts = new WP_Query( $gbc_posts_args );

							if ($gbc_posts->have_posts()) {
								while ($gbc_posts->have_posts()) {
									$gbc_posts->the_post();

									$gbc_posts_meta_map = get_post_meta( get_the_ID(), 'location', true );
									$gbc_posts_meta_address = get_post_meta( get_the_ID(), 'address', true );
									$gbc_posts_meta_email_address = get_post_meta( get_the_ID(), 'email_address', true );
									$gbc_posts_meta_phone_number = get_post_meta( get_the_ID(), 'phone_number', true );

									?>
										<div style="background-color: rgba(0,0,0,0.3);">
											<div class="row">
					    						<div class="col-lg-4">
					    							<div class="branch_info">
					    								
					    								<ul>
					    									<li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $gbc_posts_meta_address; ?></li>
					    									<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $gbc_posts_meta_email_address; ?></li>
					    									<?php  
					    										foreach (explode("\r\n", $gbc_posts_meta_phone_number) as $gpmpn_value) {

				    												if (!empty($gpmpn_value)) {

						    											?>

						    												<li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $gpmpn_value; ?></li>

						    											<?php		

				    												}
					    										}
					    									?>
					    								</ul>

					    							</div>
					    						</div>
					    						<div class="col-lg-8">
					    							<div>
					    								<?php echo $gbc_posts_meta_map; ?>
					    							</div>
					    						</div>
					    					</div>
	
										</div>
				    					
									<?php

								}
							}

						}

					?>
										
				</div>

			<?php

		}

	}



	return ob_get_clean();
}
add_shortcode( 'contact_us_branches', 'lao_get_contact_us_branches' );

/* Get Testimonials */
function lao_get_testimonials() {
	ob_start();

	$paged = ( get_query_var('paged') ? get_query_var('paged') : 1 );

	$args = array(
		'post_type' => array('testimonials'),
		'post_status' => array('publish'),
		'posts_per_page' => 12,
		'order' => 'DESC',
		'orderby' => 'date',
		'paged' => $paged,
	);

	$getTestimonials = new WP_Query( $args );

		?> 
			<div class="row">
		<?php

			if ($getTestimonials->have_posts()) {
				while ($getTestimonials->have_posts()) {
					$getTestimonials->the_post();

					$testimonialAvatar = get_the_post_thumbnail_url( get_the_ID(), 'full' );
					$avatar = (empty($testimonialAvatar) ? content_url() . '/uploads/2018/05/avatar.jpg' : $testimonialAvatar );

					?>
						<div class="col-md-6">
							<div class="testimonial">
								<div class="says">
									<p><?php the_content(); ?></p>
								</div>
								<div class="customer">
									<div class="avatar" style="background-image: url('<?php echo $avatar; ?>');background-size: cover;background-position: center center;background-repeat: no-repeat;"></div>
									<span><?php the_title() ?></span>
								</div>
							</div>	
						</div>
					<?php
				}
				?>
					<div class="col-12">
						<div class="page_navigation">
							<?php 
								echo paginate_links(
									array( 
										'total' => $getTestimonials->max_num_pages , 
										'type' => 'list',
										'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
										'next_text' => '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
									)
								); 
							?>
						</div>
					</div>
				<?php
				wp_reset_postdata();
			} else {
				?>
					<div class="no_result">No Events Added.</div>
				<?php
			}

		?> 
			</div>
		<?php

	return ob_get_clean();
}
add_shortcode( 'testimonials', 'lao_get_testimonials' );

/* Get Careers */
function lao_get_career() {
	ob_start();

	$paged = ( get_query_var('paged') ? get_query_var('paged') : 1 );

	$args = array(
		'post_type' => array('career'),
		'post_status' => array('publish'),
		'posts_per_page' => 9,
		'order' => 'DESC',
		'orderby' => 'date',
		'paged' => $paged,
	);

	$getCareers = new WP_Query( $args );

	if ( $getCareers->have_posts() ) {
			$counter = 1;
			?>
				<div class="col-12">
					<div class="career_tile">
						<p>We are seeking to hire the following vacancies for new cars agency "USA brand" in Iraq. Baghdad, Basra, Erbil, Dohuk and Sulaymaniyah. All candidates MUST from Automotive industry with Experience of 5 -7 Years at less, English & Arabic is A must.</p>
			<?php
			while ( $getCareers->have_posts() ) {
				$getCareers->the_post();
				?>
					<h3><span><?php echo $counter; ?>.</span><?php the_title(); ?></h3>
					<!-- <div class="col-12">
						<div class="career_tile">
							<a href="#career_<?php //echo $counter; ?>" class="open_popup_general"><h3><?php //the_title(); ?></h3></a>
							<p><?php //the_content(); ?></p>
							<a href="#career_<?php //echo $counter; ?>" class="b_read_more open_popup_general">View More</a>
						</div>
						<div id="career_<?php //echo $counter; ?>" class="white-popup career_popup mfp-hide">
							<h3><?php //the_title(); ?></h3>
							<p><?php //the_content(); ?></p>
						</div>
					</div> -->

				<?php

				$counter++;
			}
		?>
					</div>
				</div>
			<?php /* ?><div class="col-12">
				<div class="page_navigation">
					<?php 
						echo paginate_links(
							array( 
								'total' => $getCareers->max_num_pages , 
								'type' => 'list',
								'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
								'next_text' => '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
							)
						); 
					?>
				</div>
			</div> <?php */ ?>
			<?php wp_reset_postdata(); ?>
		<?php
	} else {
		?>
			<div class="no_result">No Blogs Added.</div>
		<?php
	}

	return ob_get_clean();
}
add_shortcode( 'careers', 'lao_get_career' );

/* Get Accessories */
function lao_get_accessories() {
	ob_start();

	$paged = ( get_query_var('paged') ? get_query_var('paged') : 1 );

	$args = array(
		'post_type' => array('accessories'),
		'post_status' => array('publish'),
		'posts_per_page' => 9,
		'order' => 'DESC',
		'orderby' => 'date',
		'paged' => $paged,
	);

	$getAccessories = new WP_Query( $args );

	if ($getAccessories->have_posts()) {
		?>
			<div class="row" style="padding-bottom: 60px;">
		<?php
		while ($getAccessories->have_posts()) {
			$getAccessories->the_post();
			$accessoriesImage = get_the_post_thumbnail_url(get_the_ID(), 'full');

			?>

				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<a href="#accessories_inquiry_form" class="open_popup_general m_accessories_link" data-productname="<?php the_title(); ?>">
						<div class="m_accessories">
							<div class="ma_image"><img src="<?php echo $accessoriesImage; ?>" class="img-fluid"></div>
							<h4><?php the_title(); ?></h4>
							<div class="ma_button"><button>Inquire Now</button></div>
						</div>	
					</a>
				</div>

			<?php
		}
		?>
			</div>
		<?php
	}

	return ob_get_clean();
}
add_shortcode( 'accessories', 'lao_get_accessories' );

/* Branches Shortcodes */
function lao_get_branch_images($atts) {

	$branchImages = shortcode_atts(array(
		'branch' => 0,
	), $atts);

	ob_start();

	?>
		<div class="row branch_images">
	<?php

	if ($branchImages['branch'] > 0) {

		$args = array(
			'p' => $branchImages['branch'],
			'post_type' => 'branches',
			'post_status' => 'publish',
			'order' => 'DESC',
			'orderby' => 'date',
		);

		$getBranchImages = new WP_Query( $args );

		if ($getBranchImages->have_posts()) {
			while ($getBranchImages->have_posts()) {
				$getBranchImages->the_post();

				$images = miu_get_images(get_the_ID());

				if (count($images) > 0) {
					foreach ($images as $v_images) {
						?>
							<div class="col-md-4 col-sm-6 col-12"><div class="branch_image"><a href="<?php echo $v_images; ?>"><img src="<?php echo $v_images; ?>"></a></div></div>
						<?php
					}
				} else {
					?>
						<div class="col-12">No Images Found.</div>
					<?php
				}
			}
		} else {
			?>
				<div class="col-12">No Images Found.</div>
			<?php
		}		
	} else {
		?>
			<div class="col-12">No Images Found.</div>
		<?php
	}

	?>
		</div>
	<?php

	return ob_get_clean();

}
add_shortcode( 'branch_images', 'lao_get_branch_images' );

function lao_get_branch_details($atts) {
$branchImages = shortcode_atts(array(
		'branch' => 0,
	), $atts);

	ob_start();

	if ($branchImages['branch'] > 0) {

		$args = array(
			'p' => $branchImages['branch'],
			'post_type' => 'branches',
			'post_status' => 'publish',
			'order' => 'DESC',
			'orderby' => 'date',
		);

		$getBranchImages = new WP_Query( $args );

		if ($getBranchImages->have_posts()) {
			while ($getBranchImages->have_posts()) {
				$getBranchImages->the_post();

				$getBranchMap = get_post_meta( get_the_ID(), 'location', true );

				?>
					<!-- <div class="row">
						<div class="col-12">
							<div class="branch_showrooms"><?php //the_content(); ?></div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-12">
							<div class="branch_map_container"><?php echo $getBranchMap; ?></div>
						</div>
					</div>
				<?php
			}
		} else {
			?>
				<div style="text-align: center;color: #fff;">No Images Found.</div>
			<?php
		}		
	} else {
		?>
			<div style="text-align: center;color: #fff;">No Images Found.</div>
		<?php
	}

	return ob_get_clean();
}
add_shortcode( 'branch_details', 'lao_get_branch_details' );

function lao_get_site_url() {
	ob_start();

	echo site_url();

	return ob_get_clean();
}
add_shortcode( 'site_url', 'lao_get_site_url' );