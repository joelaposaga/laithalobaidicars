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


/* Get the monthly deals */
function lao_get_latest_cars() {

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

/* Get latest Cars display in footer */
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

				<div class="col-lg-6">
					<div class="bm_tile">
						<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>">
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

			?>

				<div class="col-lg-4">
					<div class="bm_tile">
						<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>">
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
							</ul>
							
						</div>
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
											    				<div class="h_panel_head" class="<?php echo ($gbcc_count === 1 ? 'active' : ''); ?>"><?php echo $gbcc_term->name; ?></div>
											    				<div class="inner_panel">
											    					<div class="row">
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

											    							</div>
											    						</div>
											    						<div class="col-lg-8">
											    							<div>
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