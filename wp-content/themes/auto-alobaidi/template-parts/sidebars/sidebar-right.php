<div class="lao_lrb_container">
	<div class="lang-switcher">
		<?php
			$args = array(
				'dropdown' => 1,
				'show_flags' => true
			);
			pll_the_languages($args);
		?>
	</div>	
	<div class="main_menu">
		<?php  
			$args = array(
				'theme_location' => 'top'
			);

			wp_nav_menu( $args );

		?>
	</div>
	<div class="contact_details">
		<ul>
			<?php 
				$get_company_profile = get_option('bpfwp-settings');
				ob_start();
				foreach ($get_company_profile as $gcp_key => $gcp_value) {

					if ($gcp_key == 'phone') {
					?>

						<li><a href=""><i class="fa fa-phone" aria-hidden="true"></i><?php echo $gcp_value; ?></a></li>

					<?php
					}

					if ($gcp_key == 'contact-email') {
					?>

						<li><a href=""><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $gcp_value; ?></a></li>

					<?php
					}
				}
				ob_get_flush();
			?>
		</ul>
	</div>
	<div class="join_us">
		<a href="">Join Us <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
	</div>
</div>

<div id="to_top"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>

