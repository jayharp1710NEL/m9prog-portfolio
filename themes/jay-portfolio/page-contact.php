<?php
/**
 * Contactpagina-template (les 6).
 *
 * Wordt automatisch gebruikt voor de pagina met slug "contact"
 * (WordPress-templatehiërarchie: page-{slug}.php).
 *
 * @package jay-portfolio
 */

get_header();

// Formulier verwerken: nonce, honeypot, sanitizing, validatie, verzending.
$contact = jayportfolio_handle_contact_form();
$errors  = $contact['errors'];
$values  = $contact['values'];
?>

<section class="section">
	<div class="container container--narrow">
		<p class="template-flag">page-contact.php</p>

		<header class="section__head">
			<p class="eyebrow">Contact</p>
			<h1 class="page-title">Een stageplek of project?</h1>
			<p>Stuur gerust een bericht via het formulier hieronder. Ik reageer meestal binnen een paar dagen.</p>
		</header>

		<?php if ( $contact['sent'] ) : ?>

			<div class="alert alert-success" role="status">
				<?php esc_html_e( 'Bedankt! Je bericht is verzonden. Ik neem snel contact met je op.', 'jay-portfolio' ); ?>
			</div>

		<?php else : ?>

			<?php if ( ! empty( $errors ) ) : ?>
				<div class="alert alert-danger" role="alert" tabindex="-1" id="contact-errors">
					<p class="mb-1"><strong><?php esc_html_e( 'Controleer het formulier:', 'jay-portfolio' ); ?></strong></p>
					<ul class="mb-0">
						<?php foreach ( $errors as $error ) : ?>
							<li><?php echo esc_html( $error ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<form class="contact-form" method="post" action="" novalidate>
				<?php wp_nonce_field( 'jayportfolio_contact', 'jayportfolio_contact_nonce' ); ?>

				<?php // Honeypot: verborgen voor mensen; bots vullen het vaak wél in. ?>
				<div class="contact-form__hp" aria-hidden="true">
					<label for="website"><?php esc_html_e( 'Laat dit veld leeg', 'jay-portfolio' ); ?></label>
					<input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
				</div>

				<div class="mb-3">
					<label class="form-label" for="naam">
						<?php esc_html_e( 'Naam', 'jay-portfolio' ); ?> <span class="req" aria-hidden="true">*</span>
					</label>
					<input
						class="form-control<?php echo isset( $errors['naam'] ) ? ' is-invalid' : ''; ?>"
						type="text" id="naam" name="naam"
						value="<?php echo esc_attr( $values['naam'] ); ?>"
						required aria-required="true"
						<?php echo isset( $errors['naam'] ) ? 'aria-invalid="true" aria-describedby="naam-error"' : ''; ?>>
					<?php if ( isset( $errors['naam'] ) ) : ?>
						<div class="invalid-feedback d-block" id="naam-error"><?php echo esc_html( $errors['naam'] ); ?></div>
					<?php endif; ?>
				</div>

				<div class="mb-3">
					<label class="form-label" for="email">
						<?php esc_html_e( 'E-mail', 'jay-portfolio' ); ?> <span class="req" aria-hidden="true">*</span>
					</label>
					<input
						class="form-control<?php echo isset( $errors['email'] ) ? ' is-invalid' : ''; ?>"
						type="email" id="email" name="email"
						value="<?php echo esc_attr( $values['email'] ); ?>"
						required aria-required="true"
						<?php echo isset( $errors['email'] ) ? 'aria-invalid="true" aria-describedby="email-error"' : ''; ?>>
					<?php if ( isset( $errors['email'] ) ) : ?>
						<div class="invalid-feedback d-block" id="email-error"><?php echo esc_html( $errors['email'] ); ?></div>
					<?php endif; ?>
				</div>

				<div class="mb-3">
					<label class="form-label" for="bedrijf">
						<?php esc_html_e( 'Bedrijf', 'jay-portfolio' ); ?>
						<span class="form-optional">(<?php esc_html_e( 'optioneel', 'jay-portfolio' ); ?>)</span>
					</label>
					<input
						class="form-control" type="text" id="bedrijf" name="bedrijf"
						value="<?php echo esc_attr( $values['bedrijf'] ); ?>">
				</div>

				<div class="mb-3">
					<label class="form-label" for="bericht">
						<?php esc_html_e( 'Bericht', 'jay-portfolio' ); ?> <span class="req" aria-hidden="true">*</span>
					</label>
					<textarea
						class="form-control<?php echo isset( $errors['bericht'] ) ? ' is-invalid' : ''; ?>"
						id="bericht" name="bericht" rows="6"
						required aria-required="true"
						<?php echo isset( $errors['bericht'] ) ? 'aria-invalid="true" aria-describedby="bericht-error"' : ''; ?>><?php echo esc_textarea( $values['bericht'] ); ?></textarea>
					<?php if ( isset( $errors['bericht'] ) ) : ?>
						<div class="invalid-feedback d-block" id="bericht-error"><?php echo esc_html( $errors['bericht'] ); ?></div>
					<?php endif; ?>
				</div>

				<p class="form-note"><?php esc_html_e( 'Velden met * zijn verplicht.', 'jay-portfolio' ); ?></p>

				<button class="btn btn-primary" type="submit" name="jayportfolio_contact_submit" value="1">
					<?php esc_html_e( 'Verstuur bericht', 'jay-portfolio' ); ?>
				</button>
			</form>

		<?php endif; ?>

		<?php // Privacyvriendelijke contactgegevens: e-mail versleuteld tegen spambots. ?>
		<p class="contact-alt">
			<?php esc_html_e( 'Liever direct mailen?', 'jay-portfolio' ); ?>
			<?php
			$admin_mail = antispambot( get_option( 'admin_email' ) );
			printf( '<a href="mailto:%1$s">%1$s</a>', esc_html( $admin_mail ) );
			?>
		</p>
	</div>
</section>

<?php
get_footer();
