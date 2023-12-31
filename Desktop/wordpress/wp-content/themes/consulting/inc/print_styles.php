<?php

if ( ! function_exists( 'consulting_print_styles' ) ) {
	function consulting_print_styles() {
		$post_id        = get_the_ID();
		$is_shop        = false;
		$page_for_posts = get_option( 'page_for_posts' );
		if ( is_home() || is_category() || is_search() || is_tag() || is_tax() ) {
			$post_id = $page_for_posts;
		}

		if ( ( function_exists( 'is_shop' ) && is_shop() )
			|| ( function_exists( 'is_product_category' ) && is_product_category() )
			|| ( function_exists( 'is_product_tag' ) && is_product_tag() )
		) {
			$is_shop = true;
		}
		if ( $is_shop ) {
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}

		$css = '';

		if ( consulting_theme_option( 'site_boxed' ) && consulting_theme_option( 'custom_bg_image' ) ) {
			$custom_bg_image_id = consulting_theme_option( 'custom_bg_image' );
			$custom_bg_image    = wp_get_attachment_image_src( $custom_bg_image_id, 'full' );
			$css               .= '
				body.boxed_layout{
					background-image: url( ' . esc_url( $custom_bg_image[0] ) . ' ) !important;
				}
			';
		}

		$config          = consulting_config();
		$base_color      = $config['base_color'];
		$secondary_color = $config['secondary_color'];
		$third_color     = $config['third_color'];

		$css_styles = array(
			'color'            => array(
				'base'      => array(
					'.mtc, .mtc_h:hover',
				),
				'secondary' => array(
					'.stc, .stc_h:hover',
				),
				'third'     => array(
					'.ttc, .ttc_h:hover',
				),
			),
			'background-color' => array(
				'base'      => array(
					'.mbc, .mbc_h:hover',
					'.stm-search .stm_widget_search button',
				),
				'secondary' => array(
					'.sbc, .sbc_h:hover',
				),
				'third'     => array(
					'.tbc, .tbc_h:hover',
				),
			),
			'border-color'     => array(
				'base'      => array(
					'.mbdc, .mbdc_h:hover',
				),
				'secondary' => array(
					'.sbdc, .sbdc_h:hover',
				),
				'third'     => array(
					'.tbdc, .tbdc_h:hover',
				),
			),
		);

		foreach ( $css_styles as $property => $colors ) {
			foreach ( $colors as $color => $elements ) {
				$css .= implode( ', ', $elements ) . '{
					' . $property . ': ' . ${$color . '_color'} . '!important
				}';
			}
		}

		$custom_css = consulting_theme_option( 'custom_css' );

		if ( $custom_css ) {
			$css .= preg_replace( '/\s+/', ' ', $custom_css );
		}

		wp_add_inline_style( 'consulting-layout', $css );

	}
}

add_action( 'wp_enqueue_scripts', 'consulting_print_styles' );

/*In consulting 3.5 CSS saved in uploads folder*/
function consulting_skin_custom() {
	$site_color = consulting_theme_option( 'site_skin', 'skin_default' );

	if ( 'skin_custom' === $site_color ) {
		global $wp_filesystem;

		if ( empty( $wp_filesystem ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}

		$consulting_config = consulting_config();
		$custom_style_css  = $wp_filesystem->get_contents( get_template_directory() . '/assets/css/layouts/' . $consulting_config['layout'] . '/main.css' );

		$base_color      = consulting_theme_option( 'site_skin_base_color', $consulting_config['base_color'] );
		$secondary_color = consulting_theme_option( 'site_skin_secondary_color', $consulting_config['secondary_color'] );
		$third_color     = consulting_theme_option( 'site_skin_third_color', $consulting_config['third_color'] );

		$colors_arr         = array();
		$colors_arr[]       = $base_color;
		$colors_arr[]       = $secondary_color;
		$colors_arr[]       = $third_color;
		$colors_differences = false;

		$search_colors = array(
			$consulting_config['base_color'],
			$consulting_config['secondary_color'],
			$consulting_config['third_color'],
			'../../../',
		);

		$replace_colors = array(
			$base_color,
			$secondary_color,
			$third_color,
			'/wp-content/themes/consulting/assets/',
		);

		if ( ! empty( $consulting_config['base_rgb_color']['alpha'] ) ) {
			foreach ( $consulting_config['base_rgb_color']['alpha'] as $val ) {
				$search_colors[] = 'rgba(' . str_replace( ' ', '', $consulting_config['base_rgb_color']['rgb'] ) . ',' . trim( $val, '0' ) . ')';
				if ( '#' === $base_color[0] && ( 7 === strlen( $base_color ) || 4 === strlen( $base_color ) ) ) {
					$replace_colors[] = consulting_hex2rgba( $base_color, trim( $val, '0' ) );
				} else {
					$base_color_pattern = str_replace( array( 'rgba(', ')' ), '', $base_color );
					$base_color_array   = explode( ',', $base_color_pattern );
					$replace_colors[]   = 'rgba(' . $base_color_array[0] . ',' . $base_color_array[1] . ',' . $base_color_array[2] . ',' . trim( $val, '0' ) . ')';
				}
			}
		}

		if ( ! empty( $consulting_config['secondary_rgb_color']['alpha'] ) ) {
			foreach ( $consulting_config['secondary_rgb_color']['alpha'] as $val ) {
				$search_colors[] = 'rgba(' . str_replace( ' ', '', $consulting_config['secondary_rgb_color']['rgb'] ) . ',' . trim( $val, '0' ) . ')';
				if ( '#' === $secondary_color[0] && ( strlen( 7 === $secondary_color ) || 4 === strlen( $secondary_color ) ) ) {
					$replace_colors[] = consulting_hex2rgba( $secondary_color, trim( $val, '0' ) );
				} else {
					$secondary_color_pattern = str_replace( array( 'rgba(', ')' ), '', $secondary_color );
					$secondary_color_array   = explode( ',', $secondary_color_pattern );
					$replace_colors[]        = 'rgba(' . $secondary_color_array[0] . ',' . $secondary_color_array[1] . ',' . $secondary_color_array[2] . ',' . trim( $val, '0' ) . ')';
				}
			}
		}

		if ( ! empty( $consulting_config['third_rgb_color']['alpha'] ) ) {
			foreach ( $consulting_config['third_rgb_color']['alpha'] as $val ) {
				$search_colors[] = 'rgba(' . str_replace( ' ', '', $consulting_config['third_rgb_color']['rgb'] ) . ',' . trim( $val, '0' ) . ')';
				if ( '#' === $third_color[0] && ( 7 === strlen( $third_color ) || 4 === strlen( $third_color ) ) ) {
					$replace_colors[] = consulting_hex2rgba( $third_color, trim( $val, '0' ) );
				} else {
					$third_color_pattern = str_replace( array( 'rgba(', ')' ), '', $third_color );
					$third_color_array   = explode( ',', $third_color_pattern );
					$replace_colors[]    = 'rgba(' . $third_color_array[0] . ',' . $third_color_array[1] . ',' . $third_color_array[2] . ',' . trim( $val, '0' ) . ')';
				}
			}
		}

		$custom_style_css = str_replace( $search_colors, $replace_colors, $custom_style_css );
		$custom_style_css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $custom_style_css );

		$upload_dir = wp_upload_dir();

		if ( ! $wp_filesystem->is_dir( $upload_dir['basedir'] . '/stm_uploads' ) ) {
			wp_mkdir_p( $upload_dir['basedir'] . '/stm_uploads' );
		}

		if ( $custom_style_css ) {
			$css_to_filter = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $custom_style_css );
			$css_to_filter = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css_to_filter );

			$custom_style_file = $upload_dir['basedir'] . '/stm_uploads/skin-custom.css';

			if ( $custom_style_file ) {
				$custom_style_content = $wp_filesystem->get_contents( $custom_style_file );

				if ( is_array( $colors_arr ) && ! empty( $colors_arr ) ) {
					foreach ( $colors_arr as $color ) {
						$color_find = strpos( $custom_style_content, $color );
						if ( ! $color_find && ! $colors_differences ) {
							$colors_differences = true;
						}
					}
				}

				if ( $colors_differences ) {
					$wp_filesystem->put_contents( $custom_style_file, $css_to_filter, FS_CHMOD_FILE );
				}
			} else {
				$wp_filesystem->put_contents( $custom_style_file, $css_to_filter, FS_CHMOD_FILE );
			}
		}
	}
}

add_action( 'wpcfto_after_settings_saved', 'consulting_skin_custom', 20 );

function stm_migrate_prev_settings() {
	$transition = get_option( 'stm_css_transition', 'no' );

	if ( 'no' === $transition ) {
		consulting_skin_custom();
		update_option( 'stm_css_transition', 'yes' );
	}
}

add_action( 'init', 'stm_migrate_prev_settings' );
