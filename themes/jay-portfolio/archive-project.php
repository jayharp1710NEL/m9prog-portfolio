<?php
/**
 * Archief-template voor het Custom Post Type "project" (les 8).
 *
 * @package jay-portfolio
 */

get_header();

echo '<p class="template-flag">archive-project.php</p>';
?>

<section class="section">
	<div class="container">
		<header class="section__head">
			<p class="eyebrow"><?php esc_html_e( 'Projecten', 'jay-portfolio' ); ?></p>
			<h1 class="section__title"><?php post_type_archive_title(); ?></h1>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="project-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/project-card-cpt' );
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nog geen projecten gepubliceerd.', 'jay-portfolio' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
