<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress_Boilerplate_2.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wpbp' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<?php /* Use the following code to implement a logo-image with screenreader text

                 <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo('template_url') ?>/images/xuits.png" alt="<?php echo esc_attr( get_bloginfo('sitename') ) ?>" title="<?php echo esc_attr( get_bloginfo('sitename') ) ?>"><span class="screen-reader-text"><?php echo esc_html( get_bloginfo('sitename') ) ?></span></a></h1>

                 */ ?>

				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

				<?php /* Use the following code to implement a logo-image for sub-pages

                 <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo('template_url') ?>/images/xuits.png" alt="<?php echo esc_attr( get_bloginfo('sitename') ) ?>" title="<?php echo esc_attr( get_bloginfo('sitename') ) ?>"><span class="screen-reader-text"><?php echo esc_html( get_bloginfo('sitename') ) ?></span></a></p>

                 */ ?>

				<?php
			endif;
			$wpbp_description = get_bloginfo( 'description', 'display' );
			if ( $wpbp_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $wpbp_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wpbp' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
