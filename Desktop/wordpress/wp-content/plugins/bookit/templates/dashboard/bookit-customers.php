<div id="bookit-dashboard-app">
	<h2><?php echo esc_html( $page ); ?></h2>
	<bookit-customers
		:wp_users="<?php echo esc_attr( json_encode( $wp_users, JSON_UNESCAPED_UNICODE ) ); ?>"
	></bookit-customers>
</div>
