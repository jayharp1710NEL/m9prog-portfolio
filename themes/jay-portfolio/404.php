<?php
/**
 * 404-template.
 *
 * @package jay-portfolio
 */

get_header();
?>
<section class="section section--center">
	<div class="container container--narrow">
		<p class="eyebrow">404</p>
		<h1 class="page-title"><?php esc_html_e( 'Pagina niet gevonden', 'jay-portfolio' ); ?></h1>
		<p><?php esc_html_e( 'Deze pagina bestaat niet (meer). Ga terug naar de homepage.', 'jay-portfolio' ); ?></p>
		<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Naar home', 'jay-portfolio' ); ?></a></p>
	</div>
</section>
<?php
get_footer();
