<?php
/*
Plugin Name:  Word Security
Description:  This plugin helps you to secure your wordpress.
Plugin URI:   https://wordpress.org/plugins/Word-Security
Author:       SPcits - spcits.com
Author URI:   http://spcits.com
Version:      1.0
Text Domain:  wordsecurity
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/


// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


function wordsecurity_load_textdomain() {

	load_plugin_textdomain( 'wordsecurity', false, plugin_dir_path( __FILE__ ) . 'languages/' );

}
add_action( 'plugins_loaded', 'wordsecurity_load_textdomain' );


if(is_admin()) {
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callback.php';

}


	require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';

function wordsecurity_options_default() {

	return array(
		'wordsecurity_hide_file_listing'   => 'enable',
		'wordsecurity_protect_htaccess'    => 'enable',
		'wordsecurity_protect_wpconfig'    => 'enable',
		'restrict_ip_login' 						   => '0',
		'wordsecurity_allowed_ip'					 => '192.168.1.1'
	);

}
