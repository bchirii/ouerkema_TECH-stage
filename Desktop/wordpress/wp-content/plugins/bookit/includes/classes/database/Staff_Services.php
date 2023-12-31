<?php

namespace Bookit\Classes\Database;

use Bookit\Classes\Vendor\DatabaseModel;

class Staff_Services extends DatabaseModel {

	/**
	 * Create Table
	 */
	public static function create_table() {
		global $wpdb;
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		$table_name  = self::_table();
		$primary_key = self::$primary_key;

		$sql = "CREATE TABLE {$table_name} (
			id INT UNSIGNED NOT NULL AUTO_INCREMENT,
			staff_id INT UNSIGNED NOT NULL,
			service_id INT UNSIGNED NOT NULL,
			price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
			PRIMARY KEY ({$primary_key}),
			INDEX `idx_staff_id` (`staff_id`),
			INDEX `idx_service_id` (`service_id`)
		) {$wpdb->get_charset_collate()};";

		maybe_create_table( $table_name, $sql );
	}

	public static function get_staff_services( $staffIds ) {
		global $wpdb;

		return $wpdb->get_results(
			sprintf(
				'SELECT %1$s.staff_id, 
						%2$s.id as serviceId,
						%1$s.price, 
						%2$s.title
						FROM %1$s 
						LEFT JOIN %2$s ON %1$s.service_id = %2$s.id 
						WHERE %1$s.staff_id IN ( %3$s )
						ORDER BY %1$s.staff_id',
				self::_table(), // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				Services::_table(), // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				implode( ',', $staffIds ) // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
			),
			ARRAY_A
		);
	}

	/**
	 * Get Service price for choosen Staff
	 */
	public static function get_service_price_by_staff( $service_id, $staff_id ) {
		global $wpdb;
		$sql = sprintf(
			'SELECT %1$s.price
					FROM %1$s
					WHERE %1$s.staff_id = %%d 
					AND %1$s.service_id = %%d',
			self::_table()
		);
		return $wpdb->get_var(
			$wpdb->prepare(
				$sql, // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				intval( $staff_id ),
				intval( $service_id )
			)
		);
	}
}
