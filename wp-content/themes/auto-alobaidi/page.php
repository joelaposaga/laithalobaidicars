<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="lao_page">
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

</div><!-- .wrap -->

<?php
get_footer();
