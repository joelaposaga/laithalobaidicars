<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 */

get_header(); ?>

<div class="lao_page">
	<div class="main_container" style="background-image:url('<?php echo site_url(); ?>/wp-content/uploads/2018/04/background.jpg');background-size:cover;background-repeat:no-repeat;background-position:center top;background-attachment:fixed;">

		<div class="page_header"> <h1><?php the_title(); ?></h1> </div>
		<?php
			while ( have_posts() ) :
				the_post();

				if (is_page( 'car-stocks' )) {
					get_template_part( 'template-parts/page/content', 'car-stocks-listing' );
				} else {
					get_template_part( 'template-parts/page/content', 'page' );
				}
			endwhile;
		?>
	</div>
</div>

<?php
get_footer();
