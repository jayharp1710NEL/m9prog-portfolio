<?php
/**
 * Fallback-template voor archief- en overzichtsweergaven.
 *
 * @package jay-portfolio
 */

get_header();

// Les 3 – testkop: toont welk template-bestand WordPress heeft gekozen.
echo '<p class="template-flag">index.php</p>';
?>
<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post-list">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'card' ); ?>>
					<h2 class="card__title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="card__body"><?php the_excerpt(); ?></div>
				</article>
				<?php
			endwhile;
			?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nog geen berichten gevonden.', 'jay-portfolio' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
