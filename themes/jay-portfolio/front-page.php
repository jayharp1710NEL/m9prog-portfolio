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
		'title' => 'ViralMind AI',
		'desc'  => 'Webtool die contentmakers helpt met ideeën, scripts en thumbnails. Front-end, API-koppeling en gebruikersaccounts.',
		'tags'  => array( 'JavaScript', 'API', 'SaaS' ),
		'link'  => '#',
		'thumb' => 1,
	),
	array(
		'title' => 'Browsergame (Peggle-stijl)',
		'desc'  => 'Zelfstandige single-file HTML5-game met physics op canvas. Volledig in de browser, zonder dependencies.',
		'tags'  => array( 'HTML5 Canvas', 'JavaScript', 'Game' ),
		'link'  => '#',
		'thumb' => 2,
	),
	array(
		'title' => 'Portfolio van mini-apps',
		'desc'  => 'Verzameling kleine, self-contained web-apps en experimenten. Focus op snelle, toegankelijke interfaces.',
		'tags'  => array( 'HTML', 'CSS', 'UI' ),
		'link'  => '#',
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
			<?php foreach ( $projects as $project ) : ?>
				<?php get_template_part( 'template-parts/project-card', null, $project ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--alt" id="over">
	<div class="container container--narrow">
		<header class="section__head">
			<p class="eyebrow">Over mij</p>
			<h2 class="section__title">Developer met een maker-mentaliteit</h2>
		</header>
		<p>Ik bouw al jaren eigen projecten — van browsergames tot AI-tools voor contentmakers. Daardoor ben ik gewend om zelf uit te zoeken hoe iets werkt en het af te maken. Voor mijn stage wil ik dat omzetten in professioneel teamwerk: nette code, versiebeheer met Git en werken in een Docker-omgeving.</p>
		<ul class="skills">
			<li>HTML &amp; CSS / SASS</li>
			<li>JavaScript</li>
			<li>PHP &amp; WordPress</li>
			<li>Docker &amp; MySQL</li>
			<li>Git &amp; NPM</li>
		</ul>
	</div>
</section>

<?php
get_footer();
