<?php

get_header(); ?>

<div class="lao_page">
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
					?>

						<div class="slider"><?php echo do_shortcode( '[smartslider3 slider=2]' ); ?></div>
						<div class="main_container" style="background-image:url('<?php echo site_url(); ?>/wp-content/uploads/2018/04/background.jpg');background-size:cover;background-repeat:no-repeat;background-position:center top;background-attachment:fixed;">

							<?php
								the_content();
							?>

						</div>

					<?php
			endwhile;
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
	?>
</div>

<?php
get_footer();
