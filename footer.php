<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Trouble Theme
 */
?>
<footer>
	<?php if ( ! is_home() ) : ?>
	<a href="<?php echo get_site_url(); ?>">Start over</a>
	<?php endif; ?>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
