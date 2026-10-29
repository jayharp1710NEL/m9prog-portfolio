<?php
/**
 * Header-template.
 *
 * @package jay-portfolio
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Ga naar inhoud', 'jay-portfolio' ); ?></a>

<header class="site-header">
	<div class="container site-header__inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="brand__mark">&lt;/&gt;</span>
			<span class="brand__name"><?php bloginfo( 'name' ); ?></span>
		</a>

		<?php get_template_part( 'template-parts/navigation' ); ?>
	</div>
</header>

<main id="main" class="site-main">
