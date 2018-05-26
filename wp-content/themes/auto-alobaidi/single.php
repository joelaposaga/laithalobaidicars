<?php

get_header(); ?>
<div class="lao_page">
	<div class="main_container" style="background-image:url('<?php echo site_url(); ?>/wp-content/uploads/2018/04/background.jpg');background-size:cover;background-repeat:no-repeat;background-position:center top;background-attachment:fixed;">
		<?php
			while ( have_posts() ) :
				the_post();

				if (is_singular('cars_for_sale')) {
					get_template_part( 'template-parts/page/content', 'car-single-view' );
				} else {
					get_template_part( 'template-parts/post/content' );
				}

			endwhile;			
		?>
	</div>
</div>
<?php
get_footer();
