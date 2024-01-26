<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simu Blog
 */

get_header();
?>

<main id="site-content" class="site-main single-page-details about_inner_info pt-80 pb-80">
	<div class="container">

		<div class="row <?php if (is_active_sidebar('sidebar')) {
							echo '';
						} else {
							echo 'align-items-center justify-content-center';
						} ?>">

			<div class="col-lg-<?php if (is_active_sidebar('sidebar')) {
									echo '8';
								} else {
									echo '10';
								} ?>">

				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', 'page');

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>


			</div>

			<!-- Sidebar  -->
			<?php if (is_active_sidebar('sidebar')) : ?>
				<div class="col-sm-12 blog-post-sidebar mt-10 col-md-12 col-lg-4">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>



		</div> <!-- row -->

	</div> <!-- container -->
</main><!-- #main -->

<?php

get_footer();
