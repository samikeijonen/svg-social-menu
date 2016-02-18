<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package svg-social-menu
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'svg-social-menu' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'svg-social-menu' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'svg-social-menu' ), 'SVG Social Menu', '<a href="https://foxland.fi/" rel="designer">Sami Keijonen</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	
	</div><!-- #site-wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
