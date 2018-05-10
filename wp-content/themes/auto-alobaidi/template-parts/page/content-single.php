<div class="lao_page">
	<div style="background-image:url('<?php echo site_url(); ?>/wp-content/uploads/2018/04/background.jpg');background-size:cover;background-repeat:no-repeat;background-position:center top;background-attachment:fixed;padding-left:200px;padding-right:200px;">

		<div class="page_header">
			<h2>
				<?php  

					/*if (is_singular( 'post' )) {
						echo "Blogs";
					} else {
						the_title();
					}*/

				?>
			</h2>
		</div>
		<?php
			while ( have_posts() ) :
				the_post();

				the_content();

			endwhile;
		?>
	</div>
</div>