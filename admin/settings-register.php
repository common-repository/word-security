<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

function wordsecurity_register_settings() {

	register_setting(
		'wordsecurity_options',
		'wordsecurity_options',
		'wordsecurity_callback_validate_options'
	);

	add_settings_section(
		'wordsecurity_section_files',
		'File Structure Security',
		'wordsecurity_callback_section_files',
		'wordsecurity'
	);
	add_settings_section(
		'wordsecurity_login_section',
		'Secure Wordpress Login Page',
		'wordsecurity_callback_login_section',
		'wordsecurity'
	);


	add_settings_field(
		'wordsecurity_hide_file_listing',
		'Directory Browsing',
		'wordsecurity_callback_field_file_listing',
		'wordsecurity',
		'wordsecurity_section_files',
		[ 'id' => 'wordsecurity_hide_file_listing', 'label' => 'Directory Browsing' ]
	);

	add_settings_field(
		'wordsecurity_protect_htaccess',
		'Protect .htaccess',
		'wordsecurity_callback_protect_htaccess',
		'wordsecurity',
		'wordsecurity_section_files',
		[ 'id' => 'wordsecurity_protect_htaccess', 'label' => 'Protect .htaccess' ]
	);

	add_settings_field(
		'wordsecurity_protect_wpconfig',
		'Protect wp-config.php file',
		'wordsecurity_callback_protect_wpconfig',
		'wordsecurity',
		'wordsecurity_section_files',
		[ 'id' => 'wordsecurity_protect_wpconfig', 'label' => 'Protect wp-config.php' ]
	);

	add_settings_field(
		'wordsecurity_restrict_ip_admin_login',
		'Restrict Login Access By IP',
		'wordsecurity_callback_restrict_ip_admin_login',
		'wordsecurity',
		'wordsecurity_login_section',
		[ 'id' => 'restrict_ip_login', 'label' => 'Only allowed ip addresses would be able to login into wordpress' ]
	);

	add_settings_field(
			'wordsecurity_allowed_login_ip_address',
			'Allowed IP Addresses',
			'wordsecurity_callback_allowed_login_ip_address',
			'wordsecurity',
			'wordsecurity_login_section',
			[ 'id' => 'wordsecurity_allowed_ip', 'label' => 'Please enter the ip address to allow access from. <br /> For multiple ips make them comma seperated eg. 192.168.1.2,192.168.1.3 ' ]
		);


}

add_action( 'admin_init', 'wordsecurity_register_settings' );
