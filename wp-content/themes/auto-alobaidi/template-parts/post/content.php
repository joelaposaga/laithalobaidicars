<div class="page_header" style="background-image:url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>');">
	<?php  
		if( !is_singular( 'post' ) && !is_singular( 'events' ) ) {
			?> <h2><?php the_title(); ?></h2> <?php
		}
	?>
</div>

<div class="container single_blog_content">
	<div class="row">
		
			<?php  
				if( is_singular( 'post' ) || is_singular( 'events' ) ) {
					?>
						<div class="col-12">
							<h3><?php the_title(); ?></h3>
						</div>
					<?php
				}
			?>
			
		
		<div class="col-12">
			<?php 
				if (is_single() ) {
					add_filter('the_content', 'wpautop');
				}
				
				the_content(); 
			?>
		</div>
	</div>
</div>