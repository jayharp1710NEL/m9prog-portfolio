<?php
/**
 * Footer-template.
 *
 * @package jay-portfolio
 */
?>
</main>

<footer class="site-footer" id="contact">
	<div class="container site-footer__inner">
		<p class="site-footer__copy">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. Gemaakt met WordPress, PHP &amp; SASS.</p>
		<ul class="site-footer__links">
			<li><a href="mailto:jayharp1710@gmail.com">E-mail</a></li>
			<li><a href="https://github.com/jayharp1710NEL" target="_blank" rel="noopener">GitHub</a></li>
			<li><a href="https://www.youtube.com/@bigjtg" target="_blank" rel="noopener">YouTube</a></li>
		</ul>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
