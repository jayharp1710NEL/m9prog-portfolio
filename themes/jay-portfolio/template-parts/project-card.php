<?php
/**
 * Herbruikbaar onderdeel: één projectkaart (les 7).
 *
 * Verwacht $args met: title, desc, tags (array), link, thumb.
 *
 * @package jay-portfolio
 */

$project = wp_parse_args(
	$args,
	array(
		'title' => '',
		'desc'  => '',
		'tags'  => array(),
		'link'  => '#',
		'thumb' => 1,
	)
);

// Externe links (http...) openen in een nieuw tabblad.
$is_external = ( 0 === strpos( $project['link'], 'http' ) );
?>
<article class="project-card">
	<div class="project-card__thumb project-card__thumb--<?php echo (int) $project['thumb']; ?>" aria-hidden="true"></div>
	<div class="project-card__body">
		<ul class="tags">
			<?php foreach ( (array) $project['tags'] as $tag ) : ?>
				<li class="tag"><?php echo esc_html( $tag ); ?></li>
			<?php endforeach; ?>
		</ul>
		<h3 class="project-card__title"><?php echo esc_html( $project['title'] ); ?></h3>
		<p class="project-card__desc"><?php echo esc_html( $project['desc'] ); ?></p>
		<a class="project-card__link" href="<?php echo esc_url( $project['link'] ); ?>"
			<?php echo $is_external ? 'target="_blank" rel="noopener"' : ''; ?>>
			<?php esc_html_e( 'Bekijk project', 'jay-portfolio' ); ?> <span aria-hidden="true">&rarr;</span>
		</a>
	</div>
</article>
