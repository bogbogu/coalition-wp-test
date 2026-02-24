<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>

	<header id="masthead" class="site-header">
		<?php if ( is_page_template( 'homepage.php' ) ) : ?>
			<div class="homepage-topbar">
				<div class="homepage-topbar__inner">
					<p><span>Call us now!</span><strong>385.154.11.28.35</strong></p>
					<div class="homepage-topbar__links">
						<a href="#">Login</a>
						<a href="#">Signup</a>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="site-header-main">

		<div class="site-branding">
			<?php if ( is_page_template( 'homepage.php' ) ) : ?>
				<p class="site-title site-title--mockup"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">YOUR<span>LOGO</span></a></p>
			<?php else : ?>
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$ct_custom_description = get_bloginfo( 'description', 'display' );
				if ( $ct_custom_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $ct_custom_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ct-custom' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		</div><!-- .site-header-main -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
