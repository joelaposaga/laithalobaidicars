<div class="lao_lsb_container">
	<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo site_url( '/' ); ?>wp-content/uploads/2018/04/laith-al-obaidi-logo.png"></a></div>
	<div>
		<?php echo do_shortcode( '[pro_search title="Find Your Cars" custom_class="lao_ls_search" hide_location="on" style="" hide_year_range="on" hide_mileage="on"]' ) ?>
	</div>
	<div>
		<?php  
			$args = array(
				'theme_location' => 'social',
				'container' => ''
			);
			wp_nav_menu( $args );
		?>
	</div>
</div>