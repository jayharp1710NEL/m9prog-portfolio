<?php
/**
 * Detail-template voor één "project" (les 8).
 *
 * @package jay-portfolio
 */

get_header();

echo '<p class="template-flag">single-project.php</p>';

while ( have_posts() ) :
	the_post();
	$terms = get_the_terms( get_the_ID(), 'technologie' );
	?>
	<article <?php post_class( 'section' ); ?>>
		<div class="container container--narrow">
			<p class="eyebrow">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>">
					&larr; <?php esc_html_e( 'Alle projecten', 'jay-portfolio' ); ?>
				</a>
			</p>

			<h1 class="page-title"><?php the_title(); ?></h1>

			<?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
				<ul class="tags">
					<?php foreach ( $terms as $term ) : ?>
						<li class="tag"><?php echo esc_html( $term->name ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="page-thumb"><?php the_post_thumbnail( 'large' ); ?></figure>
			<?php endif; ?>

			<div class="page-content"><?php the_content(); ?></div>
		</div>
	</article>
	<?php
endwhile;

get_footer();
