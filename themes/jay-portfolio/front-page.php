<?php
/**
 * Homepage-template.
 *
 * @package jay-portfolio
 */

get_header();

// Les 3 – testkop: toont welk template-bestand WordPress heeft gekozen.
echo '<p class="template-flag">front-page.php</p>';

/*
 * Projectkaarten. Pas deze gerust aan: titel, beschrijving, tags en link.
 * Minimaal drie kaarten (eis van de opdracht).
 */
$projects = array(
	array(
		'title' => 'Kalender-app',
		'desc'  => 'Een overzichtelijke agenda-/kalenderapplicatie om afspraken en taken te plannen en te beheren.',
		'tags'  => array( 'JavaScript', 'UI', 'App' ),
		'link'  => 'https://github.com/jayharp1710NEL/kalender',
		'thumb' => 1,
	),
	array(
		'title' => 'Social media-app',
		'desc'  => 'Een social-media-applicatie waarin gebruikers berichten plaatsen en met elkaar in contact komen.',
		'tags'  => array( 'JavaScript', 'Front-end', 'App' ),
		'link'  => 'https://github.com/jayharp1710NEL/socialmedia',
		'thumb' => 2,
	),
	array(
		'title' => 'Meer op GitHub',
		'desc'  => 'Nieuwsgierig naar de rest? Bekijk al mijn projecten, experimenten en code op mijn GitHub-profiel.',
		'tags'  => array( 'Open source', 'Code' ),
		'link'  => 'https://github.com/jayharp1710NEL',
		'thumb' => 3,
	),
);

// Herbruikbaar onderdeel: hero.
get_template_part( 'template-parts/hero' );
?>

<section class="section" id="projecten">
	<div class="container">
		<header class="section__head">
			<p class="eyebrow">Projecten</p>
			<h2 class="section__title">Een greep uit wat ik maakte</h2>
		</header>

		<div class="project-grid">
			<?php
			// Les 8: projecten uit het Custom Post Type halen.
			$project_query = new WP_Query(
				array(
					'post_type'      => 'project',
					'posts_per_page' => 3,
					'no_found_rows'  => true,
				)
			);

			if ( $project_query->have_posts() ) :
				while ( $project_query->have_posts() ) :
					$project_query->the_post();
					get_template_part( 'template-parts/project-card-cpt' );
				endwhile;
				wp_reset_postdata();
			else :
				// Terugval: handmatige kaarten zolang er nog geen projecten zijn aangemaakt.
				foreach ( $projects as $project ) :
					get_template_part( 'template-parts/project-card', null, $project );
				endforeach;
			endif;
			?>
		</div>

		<?php if ( $project_query->post_count > 0 && get_post_type_archive_link( 'project' ) ) : ?>
			<p class="projects-more">
				<a class="btn btn--ghost" href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>">
					<?php esc_html_e( 'Alle projecten', 'jay-portfolio' ); ?>
				</a>
			</p>
		<?php endif; ?>
	</div>
</section>

<section class="section section--alt" id="over">
	<div class="container container--narrow">
		<header class="section__head">
			<p class="eyebrow">Over mij</p>
			<h2 class="section__title">Developer met een maker-mentaliteit</h2>
		</header>
		<div class="about-panel">
			<p>Ik bouw al jaren eigen projecten — van browsergames tot AI-tools voor contentmakers. Daardoor ben ik gewend om zelf uit te zoeken hoe iets werkt en het af te maken. Voor mijn stage wil ik dat omzetten in professioneel teamwerk: nette code, versiebeheer met Git en werken in een Docker-omgeving.</p>
			<ul class="skills">
				<li>HTML &amp; CSS / SASS</li>
				<li>JavaScript</li>
				<li>PHP &amp; WordPress</li>
				<li>Docker &amp; MySQL</li>
				<li>Git &amp; NPM</li>
			</ul>
		</div>
	</div>
</section>

<?php
get_footer();
