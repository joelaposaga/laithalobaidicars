<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="lao_page">
	<div class="main_container" style="background-image:url('<?php echo site_url(); ?>/wp-content/uploads/2018/04/background.jpg');background-size:cover;background-repeat:no-repeat;background-position:center top;background-attachment:fixed;">

		<div class="page_header"> <h1>Page Not Found</h1> </div>
		<div class="container page_not_found">
			<h2>404</h2>
			<p>Oops!. We can't seem to find the page you're looking for.</p>
			<div><a href="<?php echo home_url(); ?>">Go Homepage</a></div>
		</div>
	</div>
</div>

<?php
get_footer();
