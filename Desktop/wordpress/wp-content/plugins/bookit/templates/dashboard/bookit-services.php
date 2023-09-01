<div id="bookit-dashboard-app">
	<h2><?php esc_html_e( 'Services', 'bookit' ); ?></h2>
	<bookit-services
		:rows="<?php echo esc_attr( json_encode( $services, JSON_UNESCAPED_UNICODE ) ); ?>"
		:categories="<?php echo esc_attr( json_encode( $categories, JSON_UNESCAPED_UNICODE ) ); ?>"
	></bookit-services>
</div>
