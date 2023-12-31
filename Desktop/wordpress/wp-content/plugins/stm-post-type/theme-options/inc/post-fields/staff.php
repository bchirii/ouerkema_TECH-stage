<?php
add_filter(
	'consulting_post_options',
	function ( $setups ) {

	if ( isset( $_GET['source'] ) || get_the_ID() ) {// phpcs:ignore
		$post_id = ( isset( $_GET['source'] ) ) ? sanitize_text_field( $_GET['source'] ) : get_the_ID();// phpcs:ignore
			$custom_post_type = get_post_type( $post_id );
			if ( 'stm_staff' === $custom_post_type ) {
				$fields = array(
					'department'  => array(
						'label' => esc_html__( 'Department', 'stm_post_type' ),
						'type'  => 'text',
					),
					'address'     => array(
						'label' => esc_html__( 'Address', 'stm_post_type' ),
						'type'  => 'text',
					),
					'phone'       => array(
						'label' => esc_html__( 'Phone', 'stm_post_type' ),
						'type'  => 'text',
					),
					'skype'       => array(
						'label' => esc_html__( 'Skype', 'stm_post_type' ),
						'type'  => 'text',
					),
					'email'       => array(
						'label' => esc_html__( 'Email', 'stm_post_type' ),
						'type'  => 'text',
					),
					'facebook'    => array(
						'label' => esc_html__( 'Facebook', 'stm_post_type' ),
						'type'  => 'text',
					),
					'twitter'     => array(
						'label' => esc_html__( 'Twitter', 'stm_post_type' ),
						'type'  => 'text',
					),
					'google_plus' => array(
						'label' => esc_html__( 'Google+', 'stm_post_type' ),
						'type'  => 'text',
					),
					'linkedin'    => array(
						'label' => esc_html__( 'Linkedin', 'stm_post_type' ),
						'type'  => 'text',
					),
				);

				$custom_fields = array(
					'name'   => esc_html__( 'Staff Information', 'stm_post_type' ),
					'fields' => $fields,
				);

				$setups['page_setup']['section_data_staff'] = $custom_fields;
			}
		}

		return $setups;
	}
);
