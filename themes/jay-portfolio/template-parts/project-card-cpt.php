<?php
/**
 * Herbruikbaar onderdeel: projectkaart uit de 'project'-CPT (les 8).
 * Gebruikt de huidige post in de loop (the_post() is al aangeroepen).
 *
 * @package jay-portfolio
 */

$terms = get_the_terms( get_the_ID(), 'technologie' );
?>
<article <?php post_class( 'project-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="project-card__thumb-img" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'medium' ); ?>
		</a>
	<?php else : ?>
		<div class="project-card__thumb project-card__thumb--1" aria-hidden="true"></div>
	<?php endif; ?>

	<div class="project-card__body">
		<?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
			<ul class="tags">
				<?php foreach ( $terms as $term ) : ?>
					<li class="tag"><?php echo esc_html( $term->name ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<h3 class="project-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<p class="project-card__desc"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<a class="project-card__link" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'Bekijk project', 'jay-portfolio' ); ?> <span aria-hidden="true">&rarr;</span>
		</a>
	</div>
</article>
