
<div class="lao_right_sidebar">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
</div>
<footer>
	<div class="footer_top" style="padding-left: 200px;padding-right: 200px;">
		<div class="container" style="">
			<div class="row">
				<div class="col-lg-9">
					<div id="footer_car_logo"><?php echo do_shortcode('[footer_car_logo]'); ?></div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer_middle" style="padding-left: 200px;padding-right: 200px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="fm_tile latest_autos">
						<h3><div class="thin-palallelogram"><span>/</span><span>/</span></div>Latest Autos</h3>
						<?php echo do_shortcode( '[footer_new_cars]' ); ?>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="fm_tile twitter_feeds">
						<h3><div class="thin-palallelogram"><span>/</span><span>/</span></div>From Twitter</h3>
						<div><a class="twitter-timeline" data-height="400" data-theme="dark" data-link-color="#E81C4F" href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="fm_tile contact_us">
						<?php $get_company_profile = get_option('bpfwp-settings'); ?>
						<h3><div class="thin-palallelogram"><span>/</span><span>/</span></div>Contact Us</h3>
						<ul>
							<li>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $get_company_profile['address']['text']; ?></p>
							</li>
							<li>
								<p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $get_company_profile['phone']; ?></p>
							</li>
							<li>
								<p><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $get_company_profile['contact-email']; ?></p>
							</li>
							<li>
								<a href="https://goo.gl/maps/CY6tBF8ShY82" target="blank">Open Location Map</a>
								<div><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14443.708620722822!2d55.3686147!3d25.1719374!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7a659f4650d8f854!2sLaith+Al+Obaidi+Cars+Trading+L.L.C!5e0!3m2!1sen!2sae!4v1524315403230" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe></div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3">
					
				</div>
			</div>
		</div>
	</div>
	<div class="footer_bottom"></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
