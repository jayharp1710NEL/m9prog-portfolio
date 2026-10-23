<?php
/**
 * Template voor losse pagina's.
 *
 * @package jay-portfolio
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class( 'section' ); ?>>
		<div class="container container--narrow">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<div class="page-content"><?php the_content(); ?></div>
		</div>
	</article>
	<?php
endwhile;

get_footer();
