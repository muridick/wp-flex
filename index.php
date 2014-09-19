<?php get_header(); ?>

<main id="content" class="clearfix" role="main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<?php if ( has_post_thumbnail() ) : ?>
					<figure>
						<?php the_post_thumbnail(); ?>
					</figure>
				<?php endif; ?>

				<h1 class="entry-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h1>

				<!-- meta tags for posts -->
				<?php get_template_part( 'inc/meta' ); ?>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<footer class="entry-footer">
				<?php get_template_part( 'inc/comment-count' ); ?>
				<?php get_template_part( 'inc/taxonomy' ); ?>
			</footer>

		</article>
	<?php endwhile; ?>

	<?php else : ?>
		<p><?php echo ( 'Holy smokes! This is totally crazy. No posts match anything even remotely close to that in our database. Sorry Mon Frere, try again' ); ?></p>
	<?php endif; ?>

	<?php
		global $wp_query;
		$big = 999999999;
		echo paginate_links( array(
			'base'         => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format'       => '?paged=%#%',
			'total'        => $wp_query -> max_num_pages,
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'show_all'     => False,
			'end_size'     => 1,
			'mid_size'     => 2,
			'prev_next'    => True,
			'prev_text'    => '&larr; Previous',
			'next_text'    => 'Next &rarr;',
			'type'         => 'plain',
			'add_args'     => False,
			'add_fragment' => ''
		));
	?>
</main>

<aside id="sidebar" role="complementary">
	<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>