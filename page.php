<?php get_header(); ?>
<header>
	<?php the_title( '<h1>', '</h1>' ); ?>
</header><!-- .entry-header -->

<div class="entry-content">
	<?php the_content(); ?>
	<section class="left">
		<?php rbm_field( 'trouble_yes' ); ?>
	</section>
	<section class="right">
		<?php rbm_field( 'trouble_no' ); ?>
	</section>
</div><!-- .entry-content -->
<?php get_footer(); ?>