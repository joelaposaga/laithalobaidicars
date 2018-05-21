<div class="lao_lsb_container">
	<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo site_url( '/' ); ?>wp-content/uploads/2018/05/LAITH-ALOBAIDI-NEW-LOGOdESIGNbY-ASMAA.png" class="c_logo"></a></div>
	<div>
		<h4>Search Our Stock</h4>
		<?php echo do_shortcode( '[pro_search title="Find Your Cars" custom_class="lao_ls_search" hide_location="on" style="" hide_year_range="on" hide_mileage="on" label_make="CAR MAKE"]' ) ?>
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