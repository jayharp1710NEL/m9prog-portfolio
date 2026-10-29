<?php
/**
 * Veilige verwerking van het contactformulier (les 6).
 *
 * @package jay-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Verwerkt een ingediend contactformulier.
 *
 * Doet nonce-controle, honeypot-check, sanitizing, validatie en verzending.
 * Geeft een array terug met foutmeldingen, de ingevulde waarden en de status.
 *
 * @return array{errors: array<string,string>, values: array<string,string>, sent: bool, submitted: bool}
 */
function jayportfolio_handle_contact_form() {
	$result = array(
		'errors'    => array(),
		'values'    => array(
			'naam'    => '',
			'email'   => '',
			'bedrijf' => '',
			'bericht' => '',
		),
		'sent'      => false,
		'submitted' => false,
	);

	// Alleen verwerken als het formulier daadwerkelijk is verstuurd.
	if ( empty( $_POST['jayportfolio_contact_submit'] ) ) {
		return $result;
	}
	$result['submitted'] = true;

	// 1. Nonce-controle (beschermt tegen CSRF).
	$nonce = isset( $_POST['jayportfolio_contact_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['jayportfolio_contact_nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'jayportfolio_contact' ) ) {
		$result['errors']['algemeen'] = __( 'De beveiligingscontrole is mislukt. Ververs de pagina en probeer het opnieuw.', 'jay-portfolio' );
		return $result;
	}

	// 2. Honeypot: dit veld is verborgen voor mensen. Is het ingevuld, dan is het vrijwel zeker een bot.
	if ( ! empty( $_POST['website'] ) ) {
		$result['sent'] = true; // Doe alsof het gelukt is, zonder iets te versturen.
		return $result;
	}

	// 3. Input opschonen (sanitizing).
	$naam    = isset( $_POST['naam'] ) ? sanitize_text_field( wp_unslash( $_POST['naam'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$bedrijf = isset( $_POST['bedrijf'] ) ? sanitize_text_field( wp_unslash( $_POST['bedrijf'] ) ) : '';
	$bericht = isset( $_POST['bericht'] ) ? sanitize_textarea_field( wp_unslash( $_POST['bericht'] ) ) : '';

	$result['values'] = compact( 'naam', 'email', 'bedrijf', 'bericht' );

	// 4. Validatie van verplichte velden.
	if ( '' === $naam ) {
		$result['errors']['naam'] = __( 'Vul je naam in.', 'jay-portfolio' );
	}
	if ( '' === $email ) {
		$result['errors']['email'] = __( 'Vul je e-mailadres in.', 'jay-portfolio' );
	} elseif ( ! is_email( $email ) ) {
		$result['errors']['email'] = __( 'Vul een geldig e-mailadres in.', 'jay-portfolio' );
	}
	if ( '' === $bericht ) {
		$result['errors']['bericht'] = __( 'Vul een bericht in.', 'jay-portfolio' );
	}

	if ( ! empty( $result['errors'] ) ) {
		return $result;
	}

	// 5. Versturen via wp_mail naar het beheerders-e-mailadres van de site.
	$to      = get_option( 'admin_email' );
	$subject = sprintf( '[Portfolio] Nieuw bericht van %s', $naam );

	$lines = array(
		'Naam:    ' . $naam,
		'E-mail:  ' . $email,
		'Bedrijf: ' . ( '' !== $bedrijf ? $bedrijf : '-' ),
		'',
		'Bericht:',
		$bericht,
	);
	$body = implode( "\n", $lines );

	// Reply-To op de afzender, zodat je direct kunt terugmailen.
	$headers = array( 'Reply-To: ' . $naam . ' <' . $email . '>' );

	$result['sent'] = wp_mail( $to, $subject, $body, $headers );

	if ( ! $result['sent'] ) {
		$result['errors']['algemeen'] = __( 'Er ging iets mis bij het verzenden. Probeer het later opnieuw of mail me direct.', 'jay-portfolio' );
	}

	return $result;
}
