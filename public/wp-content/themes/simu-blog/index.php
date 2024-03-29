<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simu Blog
 */

get_header();
?>



<main id="primary" class="site-main blog-post-area blog_style2 pt-80 pb-80">


	<div class="container">

		<div class="row">


			<div class="col-lg-<?php if (is_active_sidebar('sidebar')) {
									echo '8';
								} else {
									echo '12';
								} ?>">
				<div class="row">

					<?php
					if (have_posts()) :


					?>

					<?php


						/* Start the Loop */

						while (have_posts()) :
							the_post();


							/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */

							get_template_part('template-parts/content', 'archive');



						endwhile;



					else :

						get_template_part('template-parts/content', 'none');

					endif;
					?>

				</div>
				<div class="row pt-30">
					<div class="col-lg-12">
						<div class="blog_pagination pagination justify-content-center ">
							<?php

							if (function_exists('simublog_the_posts_pagination')) :
								simublog_the_posts_pagination();
							endif;

							?>

						</div> <!-- section title -->

					</div>
				</div> <!-- row -->


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
