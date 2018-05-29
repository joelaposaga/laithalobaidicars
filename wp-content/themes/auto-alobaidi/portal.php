<?php  

/*
Template Name: Portal
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body>
	<div class="portal_container">
		<div class="pc_logo">
			<img src="<?php echo site_url( '/' ); ?>wp-content/uploads/2018/05/LAITH-ALOBAIDI-NEW-LOGOdESIGNbY-ASMAA.png">
		</div>		
		<div class="maps">
			<button class="map_nav mn_left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
			<div class="dubai" data-position="0">
				<div class="pc_image">
					<img src="<?php echo get_template_directory_uri() ?>/images/dubai-map.png">
					<h2>Dubai</h2>
				</div>
			</div>
			<div class="kuwait" data-position="1">
				<div class="pc_image">
					<img src="<?php echo get_template_directory_uri() ?>/images/kuwait-map.png">
					<h2>Kuwait</h2>
				</div>
			</div>
			<div class="iraq" data-position="2">
				<div class="pc_image">
					<img src="<?php echo get_template_directory_uri() ?>/images/iraq-map.png">
					<h2>Iraq</h2>
				</div>
			</div>
			<button class="map_nav mn_right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>