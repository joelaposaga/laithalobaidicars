
<div class="lao_right_sidebar">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
</div>
<footer>
	<div class="footer_top" style="padding-left: 200px;padding-right: 200px;">
		<div class="container" style="">
			<div class="row">
				<div class="col-12">
					<div id="footer_car_logo"><?php echo do_shortcode('[footer_car_logo]'); ?></div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer_middle" style="padding-left: 200px;padding-right: 200px;">
		<div class="container" style="max-width: 992px;">
			<div class="row">
				<div class="col-lg-5">
					<div class="fm_tile about_footer">

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h2><img src="<?php echo site_url( '/' ); ?>wp-content/uploads/2018/04/laith-al-obaidi-logo.png"> Laith Al Obaidi Cars Trading LLC</h2></a>

						<p>Laith AlObaidi Co. succeeded in setting a Quality Standard that has been a benchmark the automotive industry in the Middle East.</p>

						<div class="f_contact">
							<ul>
								<li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>Show room # 9 , Auto Market - Dubai</a></li>
							</ul>
						</div>

						<div class="f_map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14443.708620722822!2d55.3686147!3d25.1719374!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7a659f4650d8f854!2sLaith+Al+Obaidi+Cars+Trading+L.L.C!5e0!3m2!1sen!2sae!4v1524315403230" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>

						<!-- <h3><div class="thin-palallelogram"><span>/</span><span>/</span></div>Latest Autos</h3> -->
					</div>
				</div>
				<div class="col-lg-4">
					<div class="fm_tile opening_branches">
						<div class="opening">
							<h3><div class="thin-palallelogram"><span>/</span><span>/</span></div>Opening Hours</h3>
							<ul>
								<li>
									<h4>Sales Department</h4>
									<p>Sat - Friday : 8:00am - 8:00pm</p>
								</li>
								<li>
									<h4>Service Department</h4>
									<p>Sat - Thurs : 8:00am - 8:00pm</p>
									<p>Friday is closed</p>
								</li>
							</ul>
						</div>
						<div class="branches">
							<h3><div class="thin-palallelogram"><span>/</span><span>/</span></div>Branches</h3>
							<ul>
								<li><a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> Dubai Branch</a></li>
								<li><a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> Sharjah Branch</a></li>
								<li><a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> Abu Dhabi Branch</a></li>
								<li><a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> Jordan Branch</a></li>
								<li><a href=""><i class="fa fa-arrow-right" aria-hidden="true"></i> Iraq Branch</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="fm_tile f_links">
						<ul>
							<li><a href=""><i class="fa fa-circle" aria-hidden="true"></i> Our Stocks</a></li>
							<li><a href=""><i class="fa fa-circle" aria-hidden="true"></i> Services</a></li>
							<li><a href=""><i class="fa fa-circle" aria-hidden="true"></i> About Us</a></li>
							<li><a href=""><i class="fa fa-circle" aria-hidden="true"></i> Read Our Blog</a></li>
							<li><a href=""><i class="fa fa-circle" aria-hidden="true"></i> Events</a></li>
							<li><a href=""><i class="fa fa-circle" aria-hidden="true"></i> Contact Us</a></li>
							<li><a href=""><i class="fa fa-circle" aria-hidden="true"></i> Terms and Conditions</a></li>
							<li><a href=""><i class="fa fa-circle" aria-hidden="true"></i> Privacy Policy</a></li>
							<li><a href=""><i class="fa fa-circle" aria-hidden="true"></i> Sitemap</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer_bottom">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="copy">Copyright &copy; <?php echo date("Y"); ?> Laith Al Obaidi Cars Trading LLC</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Universal Modals -->
<div id="inquiry_form" class="white-popup mfp-hide" data-form-car="">
	<?php echo do_shortcode( '[contact-form-7 id="170" title="Inquiry Form"]' ); ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
