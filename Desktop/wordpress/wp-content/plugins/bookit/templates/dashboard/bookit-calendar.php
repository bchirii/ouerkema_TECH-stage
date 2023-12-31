<div id="bookit-dashboard-app" class="admin">
	<h2><?php echo esc_html__( 'Calendar', 'bookit' ); ?></h2>
	<bookit
		:categories="<?php echo esc_attr( json_encode( $categories, JSON_UNESCAPED_UNICODE ) ); ?>"
		:filter_services="<?php echo esc_attr( json_encode( $filter_services, JSON_UNESCAPED_UNICODE ) ); ?>"
		:services="<?php echo esc_attr( json_encode( $services, JSON_UNESCAPED_UNICODE ) ); ?>"
		:staff="<?php echo esc_attr( json_encode( $staff, JSON_UNESCAPED_UNICODE ) ); ?>"
		:customers="<?php echo esc_attr( json_encode( $customers, JSON_UNESCAPED_UNICODE ) ); ?>"
		language="<?php echo esc_attr( $language ); ?>"
		:settings="<?php echo esc_attr( json_encode( $settings, JSON_UNESCAPED_UNICODE ) ); ?>"
		:time_slot_list="<?php echo esc_attr( json_encode( $time_slot_list, JSON_UNESCAPED_UNICODE ) ); ?>"
		:payment_methods="<?php echo esc_attr( json_encode( $payment_methods, JSON_UNESCAPED_UNICODE ) ); ?>"
		:appointment_statuses="<?php echo esc_attr( json_encode( $appointment_statuses, JSON_UNESCAPED_UNICODE ) ); ?>"
		:autorefresh_list="<?php echo esc_attr( json_encode( $autorefresh_list, JSON_UNESCAPED_UNICODE ) ); ?>"
	></bookit>
</div>
