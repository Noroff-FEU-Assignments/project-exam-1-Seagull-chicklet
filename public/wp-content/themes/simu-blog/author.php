<?php

/**
 * The template for displaying author pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simu blog
 */

get_header();
?>
<main id="site-content" class="site-main blog-post-area blog_style2 pt-80 pb-80">
	<div class="container">

		<div class="row">

			<div class="col-lg-<?php if (is_active_sidebar('sidebar')) {
									echo '8';
								} else {
									echo '12';
								} ?>">
				<section class="authorpage">
					<?php
					if (is_author()) :
						$author = get_user_by('slug', get_query_var('author_name'));
						do_action('simublog_author', $author->ID);
					endif;
					?>
				</section>
				<div class="row">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


							<?php get_template_part('template-parts/content', 'archive'); ?>


						<?php endwhile; ?>
						<div class="blog_pagination pagination mt-5 justify-content-center ">
							<?php

							if (function_exists('simublog_the_posts_pagination')) :
								simublog_the_posts_pagination();
							endif;

							?>

						</div> <!-- section title -->
					<?php else : ?>
						<p><?php esc_html_e('No posts by this author.', 'simu-blog'); ?></p>
					<?php endif; ?>
				</div>
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
