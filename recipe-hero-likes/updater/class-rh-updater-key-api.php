<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * RH_Likes_Updater_Key_API
 */
class RH_Likes_Updater_Key_API {
	private static $endpoint = 'http://recipehero.in/?wc-api=wp_plugin_licencing_activation_api';

	/**
	 * Attempt to activate a plugin licence
	 */
	public static function activate( $args ) {
		$defaults = array(
			'request'  => 'activate',
			'instance' => site_url(),
		);

		$args    = wp_parse_args( $defaults, $args );
		$request = wp_remote_get( self::$endpoint . '&' . http_build_query( $args, '', '&' ) );

		if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			return false;
		} else {
			return wp_remote_retrieve_body( $request );
		}
	}

	/**
	 * Attempt to deactivate a licence
	 */
	public static function deactivate( $args ) {
		$defaults = array(
			'request'  => 'deactivate',
			'instance' => site_url(),
		);

		$args    = wp_parse_args( $defaults, $args );
		$request = wp_remote_get( self::$endpoint . '&' . http_build_query( $args, '', '&' ) );

		if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			return false;
		} else {
			return wp_remote_retrieve_body( $request );
		}
	}
}