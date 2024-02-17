<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simu blog
 */

?>

<!-- Blog Col -->
<article class="col-lg-4 col-md-6" id="post-<?php the_ID(); ?>">
	<div class="blog-card mt-10 mb-10">
		<div class="blog-image post-thumbnail lazy-load" <?php if ('post' === get_post_type()) : ?> <?php if (has_post_thumbnail()) : ?> style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');" <?php else : ?> style="background-image: url('<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/no-thumb.png');" <?php endif; ?> <?php endif; ?>>
			<a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
			<div class="cap-cat">
				<?php simublog_get_category(); ?>
			</div>


		</div>
		<div class="blog-content">

			<?php
			if (is_singular()) :
				the_title('<h5 class="entry-title blog-title">', '</h5>');
			else :
				the_title('<h5 class="entry-title blog-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>');
			endif;


			?>

		</div>
		<div class="post-meta text-center py-1">

			<?php simublog_posted_on(); ?>

		</div>
	</div> <!-- blog card -->
</article>
<!-- Blog Col -->