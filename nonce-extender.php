<?php

/*
 * Plugin Name: Nonce Extender
 * Plugin URI: https://github.com/pcfreak30/nonce-extender
 * Description: Plugin to allow a configurable nonce security code lifetime
 * Version: 0.1.0
 * Author:            Derrick Hammer
 * Author URI:        https://www.derrickhammer.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nonce-extender
*/

function nonce_extender_register_fields() {
	register_setting( 'general', 'nonce', 'absint' );
	add_settings_field( 'nonce', '<label for="nonce">' . __( 'Nonce Lifetime', 'nonce-extender' ) . '</label>', 'nonce_extender_render_field', 'general' );
}

function nonce_extender_render_field() {
	$value = get_option( 'nonce', DAY_IN_SECONDS );
	?>
    <input type="number" id="nonce" name="nonce" value="<?php echo $value ?>" min="0"/>
    <p class="description"
       id="nonce-description"><?php echo sprintf( __( 'Set the nonce security code expire time in seconds. <b>Tip: Use %d for 1 hour, %d for 1 day, %d for 1 week, %d for 1 month, and %d for 1 year.</b>', 'nonce-extender' ), HOUR_IN_SECONDS, DAY_IN_SECONDS, WEEK_IN_SECONDS, MONTH_IN_SECONDS, YEAR_IN_SECONDS ); ?></p>
	<?php
}

function nonce_extender_nonce_filter( $lifetime ) {
	$nonce = get_option( 'nonce' );
	if ( false !== $nonce && ! ( defined( 'DISABLE_NONCE_EXTENDER' ) && DISABLE_NONCE_EXTENDER ) ) {
		$lifetime = absint( $nonce );
	}

	return $lifetime;
}

add_filter( 'admin_init', 'nonce_extender_register_fields' );
add_filter( 'nonce_life', 'nonce_extender_nonce_filter' );