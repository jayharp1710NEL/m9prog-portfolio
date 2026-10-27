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
?>

<section class="hero">
	<div class="container hero__inner">
		<p class="status-badge"><span class="status-badge__dot"></span> Beschikbaar voor stage</p>
		<p class="eyebrow">Webdeveloper &middot; stagiair</p>
		<h1 class="hero__title">Hoi, ik ben <span class="accent"><?php bloginfo( 'name' ); ?></span>.<br>Ik bouw snelle web-apps en games.</h1>
		<p class="hero__lead">Op zoek naar een stageplek webdevelopment. Ik werk met HTML, CSS/SASS, JavaScript, PHP en WordPress — en ik lever graag iets af dat echt werkt.</p>
		<div class="hero__actions">
			<a class="btn btn--primary" href="#projecten">Bekijk mijn werk</a>
			<a class="btn btn--ghost" href="#contact">Neem contact op</a>
		</div>
	</div>
</section>

<section class="section" id="projecten">
	<div class="container">
		<header class="section__head">
			<p class="eyebrow">Projecten</p>
			<h2 class="section__title">Een greep uit wat ik maakte</h2>
		</header>

		<div class="project-grid">
			<?php foreach ( $projects as $project ) : ?>
				<article class="project-card">
					<div class="project-card__thumb project-card__thumb--<?php echo (int) $project['thumb']; ?>" aria-hidden="true"></div>
					<div class="project-card__body">
						<ul class="tags">
							<?php foreach ( $project['tags'] as $tag ) : ?>
								<li class="tag"><?php echo esc_html( $tag ); ?></li>
							<?php endforeach; ?>
						</ul>
						<h3 class="project-card__title"><?php echo esc_html( $project['title'] ); ?></h3>
						<p class="project-card__desc"><?php echo esc_html( $project['desc'] ); ?></p>
						<a class="project-card__link" href="<?php echo esc_url( $project['link'] ); ?>">Bekijk project <span aria-hidden="true">&rarr;</span></a>
					</div>
				</article>
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
