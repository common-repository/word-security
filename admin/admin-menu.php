<?php
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

function wordsecurity_add_toplevel_menu() {

	add_menu_page(
		'WordSecurity Settings',
		'WordSecurity',
		'manage_options',
		'wordseccurity',
		'wordsecurity_display_settings_page',
		'dashicons-admin-generic',
		null
	);
}
add_action( 'admin_menu', 'wordsecurity_add_toplevel_menu' );
