<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function wordsecurity_callback_section_files() {
	echo '<p>These settings enable you to secure your wordpress files and folders.</p>';
}


function wordsecurity_callback_login_section() {
	echo '<p>These settings enable you to secure your wrdpress login page.</p>';
}

function wordsecurity_callback_field_file_listing( $args ) {
	$options = get_option( 'wordsecurity_options', wordsecurity_options_default() );
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
  $path = get_home_path();
	$htaccess = $path.".htaccess";
	if($selected_option == "disable")
	{
		insert_with_markers($htaccess, "Disable_File_Listing","Options All -Indexes");
	}
	else {
		insert_with_markers($htaccess, "Disable_File_Listing","");
	}
	$radio_options = array(
		'enable'  => 'Enable Directory Browsing',
		'disable' => 'Disable Directory Browsing (Secure)'
	);

	foreach ( $radio_options as $value => $label ) {
		$checked = checked( $selected_option === $value, true, false );
		echo '<label><input name="wordsecurity_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
	}
}

function wordsecurity_callback_protect_htaccess( $args ) {
	$options = get_option( 'wordsecurity_options', wordsecurity_options_default() );
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
  $path = get_home_path();
	$htaccess = $path.".htaccess";
	if($selected_option == "disable")
	{
		$code = "
		<files ~ \"^.*\.([Hh][Tt][Aa])\">
		order allow,deny
		deny from all
		satisfy all
		</files>
		";
		insert_with_markers($htaccess, "protect_htaccess",$code);
	}
	else {
		insert_with_markers($htaccess, "protect_htaccess","");
	}
	$radio_options = array(

		'enable'  => 'Enable HTTP Access to .htaccess',
		'disable' => 'Disable HTTP Access to .htaccess (Secure)'

	);
	foreach ( $radio_options as $value => $label ) {
		$checked = checked( $selected_option === $value, true, false );
		echo '<label><input name="wordsecurity_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
	}
}

function wordsecurity_callback_protect_wpconfig( $args ) {
	$options = get_option( 'wordsecurity_options', wordsecurity_options_default() );
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
  $path = get_home_path();
	$htaccess = $path.".htaccess";
	if($selected_option == "disable")
	{
		$code = "
		<files wp-config.php>
		order allow,deny
		deny from all
		</files>
		";
		insert_with_markers($htaccess, "protect_wpconfig",$code);
	}
	else {
		insert_with_markers($htaccess, "protect_wpconfig","");
	}
	$radio_options = array(
		'enable'  => 'Enable HTTP Access to wp-config.php',
		'disable' => 'Disable HTTP Access to wp-config.php (Secure)'
	);

	foreach ( $radio_options as $value => $label ) {
		$checked = checked( $selected_option === $value, true, false );
		echo '<label><input name="wordsecurity_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
	}
}

function wordsecurity_callback_restrict_ip_admin_login( $args ) {
	$options = get_option( 'wordsecurity_options', wordsecurity_options_default() );
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	echo '<input id="wordsecurity_options_'. $id .'" name="wordsecurity_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="wordsecurity_options_'. $id .'">'. $label .'</label>';
}


function wordsecurity_callback_allowed_login_ip_address( $args ) {
	$options = get_option( 'wordsecurity_options', wordsecurity_options_default() );
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	echo '<input id="wordsecurity_options_'. $id .'" name="wordsecurity_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="wordsecurity_options_'. $id .'">'. $label .'</label>';
}
