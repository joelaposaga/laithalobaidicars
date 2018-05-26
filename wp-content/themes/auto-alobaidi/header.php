<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-ishomepage="<?php echo (is_front_page() ? 'true' : 'false'); ?>">

<header>
	<div class="container-fluid">
		<div class="logo">
			<a href=""><img src="<?php echo get_template_directory_uri() ?>/images/logo-wide.png"></a>
		</div>	
		<div class="menu">
			<ul>
				<li><a href="" class="search_menu"><i class="fa fa-search" aria-hidden="true"></i><span>Search Our Stock</span></a></li>
				<li><a href="" class="menu_menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a></li>
			</ul>
		</div>
	</div>
</header>

<div class="lao_left_sidebar">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>
</div>
