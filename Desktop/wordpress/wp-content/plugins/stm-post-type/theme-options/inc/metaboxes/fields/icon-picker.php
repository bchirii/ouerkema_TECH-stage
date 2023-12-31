<?php

/**
 * @var $field
 * @var $field_id
 * @var $field_value
 * @var $field_label
 * @var $field_name
 * @var $field_data
 * @var $section_name
 *
 */
$field = "data['{$section_name}']['fields']['{$field_name}']";

wp_enqueue_script( 'consulting-icon-picker', STM_POST_TYPE_URL . 'theme-options/inc/metaboxes/components/js/icon-picker.js', array( 'vue.js' ), STM_POST_TYPE_PLUGIN_VERSION, true );

?>

<consulting_icon_picker
	:fields="<?php echo esc_attr( $field ); ?>"
	:field_label="<?php echo esc_attr( $field_label ); ?>"
	:field_name="'<?php echo esc_attr( $field_name ); ?>'"
	:field_id="'<?php echo esc_attr( $field_id ); ?>'"
	:field_value="<?php echo esc_attr( $field_value ); ?>"
	:field_data='<?php echo str_replace( "'","", wp_json_encode( $field_data ) ); // phpcs:ignore?>'
	@wpcfto-get-value="<?php echo esc_attr( $field_value ); ?> = $event">

</consulting_icon_picker>
<input type="hidden" name="<?php echo esc_attr( $field_name ); ?>" v-bind:id="'<?php echo esc_attr( $field_id ); ?>'" v-model="<?php echo esc_attr( wp_unslash( $field_value ) ); ?>" />
