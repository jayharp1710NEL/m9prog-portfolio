<?php
/**
 * Herbruikbaar onderdeel: hero-sectie (les 7).
 *
 * @package jay-portfolio
 */
?>
<section class="hero">
	<div class="container hero__inner">
		<p class="status-badge"><span class="status-badge__dot"></span> <?php esc_html_e( 'Beschikbaar voor stage', 'jay-portfolio' ); ?></p>
		<p class="eyebrow"><?php esc_html_e( 'Webdeveloper · stagiair', 'jay-portfolio' ); ?></p>
		<h1 class="hero__title">
			<?php esc_html_e( 'Hoi, ik ben', 'jay-portfolio' ); ?>
			<span class="accent"><?php bloginfo( 'name' ); ?></span>.<br>
			<?php esc_html_e( 'Ik bouw snelle web-apps en games.', 'jay-portfolio' ); ?>
		</h1>
		<p class="hero__lead"><?php esc_html_e( 'Op zoek naar een stageplek webdevelopment. Ik werk met HTML, CSS/SASS, JavaScript, PHP en WordPress — en ik lever graag iets af dat echt werkt.', 'jay-portfolio' ); ?></p>
		<div class="hero__actions">
			<a class="btn btn--primary" href="#projecten"><?php esc_html_e( 'Bekijk mijn werk', 'jay-portfolio' ); ?></a>
			<a class="btn btn--ghost" href="#contact"><?php esc_html_e( 'Neem contact op', 'jay-portfolio' ); ?></a>
		</div>
	</div>
</section>
