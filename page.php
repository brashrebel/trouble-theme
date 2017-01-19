<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<?php the_title( '<h1>', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
			<?php if ( ! rbm_get_field( 'trouble_solved' ) ) : ?>
			<section class="left">
				<a href="<?php echo get_permalink( rbm_get_field( 'trouble_yes' ) ); ?>">Yes</a>
			</section>
			<section class="right">
				<a href="<?php echo get_permalink( rbm_get_field( 'trouble_no' ) ); ?>">No</a>
			</section>
			<?php endif; ?>
		</article>
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>