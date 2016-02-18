<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package svg-social-menu
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	// Import svg icons.
	get_template_part( 'svg-icons' );
?>

<div id="page" class="site">
	<div id="site-wrapper" class="site-wrapper">
	
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'svg-social-menu' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<?php if ( has_nav_menu( 'social' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
	
				<nav class="menu-social social-navigation menu" role="navigation" aria-label="<?php esc_attr_e( 'Social Menu', 'svg-social-menu' ); ?>">
		
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'social',
							'menu_id'        => 'menu-social-items',
							'menu_class'     => 'menu-social-items',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span><svg class="icon icon-rating-full"><use xlink:href="#icon-rating-full"></use></svg>',
							'fallback_cb'    => '',
						)
					);
				?>
					
				</nav><!-- .menu-social -->

			<?php endif; // End check for menu. ?>
			
		</header><!-- #masthead -->

		<div id="content" class="site-content">
