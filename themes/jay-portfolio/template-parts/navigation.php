<?php
/**
 * Herbruikbaar onderdeel: hoofdnavigatie met mobile-first hamburger-toggle (les 7).
 *
 * @package jay-portfolio
 */
?>
<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav"
	aria-label="<?php esc_attr_e( 'Menu openen', 'jay-portfolio' ); ?>">
	<span class="nav-toggle__bars" aria-hidden="true"></span>
</button>

<nav id="site-nav" class="site-nav" aria-label="<?php esc_attr_e( 'Hoofdmenu', 'jay-portfolio' ); ?>">
	<?php
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'site-nav__list',
				'depth'          => 1,
			)
		);
	} else {
		echo '<ul class="site-nav__list">';
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/#projecten' ) ), esc_html__( 'Projecten', 'jay-portfolio' ) );
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/#over' ) ), esc_html__( 'Over mij', 'jay-portfolio' ) );
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/#contact' ) ), esc_html__( 'Contact', 'jay-portfolio' ) );
		echo '</ul>';
	}
	?>
</nav>
