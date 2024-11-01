<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
function wordsecurity_display_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			settings_fields( 'wordsecurity_options' );
			do_settings_sections( 'wordsecurity' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}
