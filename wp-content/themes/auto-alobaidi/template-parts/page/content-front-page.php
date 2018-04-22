<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >


	<div class="panel-content">
		<div class="wrap">

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content();
				?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
