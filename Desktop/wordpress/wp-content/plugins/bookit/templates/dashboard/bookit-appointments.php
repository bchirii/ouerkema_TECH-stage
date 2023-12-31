<div id="bookit-dashboard-app">
	<h2><?php echo esc_html( $page ); ?></h2>
	<bookit-appointments
		:services="<?php echo esc_attr( json_encode( $services, JSON_UNESCAPED_UNICODE ) ); ?>"
		:staff="<?php echo esc_attr( json_encode( $staff, JSON_UNESCAPED_UNICODE ) ); ?>"
		:customers="<?php echo esc_attr( json_encode( $customers, JSON_UNESCAPED_UNICODE ) ); ?>"
		:settings="<?php echo esc_attr( json_encode( $settings, JSON_UNESCAPED_UNICODE ) ); ?>"
		time_format="<?php echo esc_attr( $time_format ); ?>"
		:time_slot_list="<?php echo esc_attr( json_encode( $time_slot_list, JSON_UNESCAPED_UNICODE ) ); ?>"
		:payment_methods="<?php echo esc_attr( json_encode( $payment_methods, JSON_UNESCAPED_UNICODE ) ); ?>"
		:appointment_statuses="<?php echo esc_attr( json_encode( $appointment_statuses, JSON_UNESCAPED_UNICODE ) ); ?>"
	></bookit-appointments>
</div>
