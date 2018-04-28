<?php

get_header(); ?>
<div class="lao_page">
	<?php
		while ( have_posts() ) :
			the_post();

			if (is_singular('cars_for_sale')) {
				get_template_part( 'template-parts/page/content', 'car-single-view' );
			} else {
				the_content();
			}

		endwhile;			
	?>
</div>
<?php
get_footer();
