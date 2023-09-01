<?php 

if ( !defined("AWR_IS_PRO_VERSION") ) {
	define( "AWR_IS_PRO_VERSION", false );
}

if ( !defined("AWR_PLUGIN_NAME") ) {
define( "AWR_PLUGIN_NAME", 'Advanced WP Reset' );
}

if ( !defined("AWR_PLUGIN_SHORT_NAME") ) {
	define( "AWR_PLUGIN_SHORT_NAME", 'Advanced WP Reset' );
}

if ( !defined("AWR_PLUGIN_TEXTDOMAIN") ) {
	define( "AWR_PLUGIN_TEXTDOMAIN", 'advanced-wp-reset' );
}

define("AWR_PLUGIN_VERSION", "2.0");

// Plugin options:
define( 'AWR_SHOW_NOTIFICATIONS', 'awr_show_notifications' );
define( 'AWR_HIDDEN_BLOCS', 'awr_hidden_blocs' );
define( 'AWR_PREVIOUS_VERSION', 'awr_previous_version' );
define( 'AWR_PLUGIN_UPDATE_NOTICE', 'awr_plugin_update_notice' );
define( 'AWR_ACTIVATION_DISPLAYED', 'awr_activation_displayed' );
define( 'AWR_CURRENT_PP', 'awr_current_pp' );

define ( 'AWR_OPTIONS', 
			array (
				AWR_SHOW_NOTIFICATIONS,
				AWR_HIDDEN_BLOCS,
				AWR_PREVIOUS_VERSION,
				AWR_PLUGIN_UPDATE_NOTICE,
				AWR_ACTIVATION_DISPLAYED,
				AWR_CURRENT_PP
			)
);

define ( 'AWR_OPTIONS_NAME', 
			array (
				'AWR_SHOW_NOTIFICATIONS',
				'AWR_HIDDEN_BLOCS',
				'AWR_PREVIOUS_VERSION',
				'AWR_PLUGIN_UPDATE_NOTICE',
				'AWR_ACTIVATION_DISPLAYED',
				'AWR_CURRENT_PP'
			) 
);

// this is the URL our updater / license checker pings. This should be the URL of the site with EDD installed
define( 'AWR_PLUGIN_STORE_URL', "http://sigmaplugin.com/" );
define( 'AWR_PLUGIN_SUPPORT', "http://sigmaplugin.com/contact");
define ('AWR_PLUGIN_RATING' , "https://wordpress.org/support/plugin/advanced-wp-reset/reviews/?filter=5#new-post");
define( 'AWR_PLUGIN_PRO_STORE_URL', "https://awpreset.com/ref/2/");

define ( 'AWR_PP_INFOS', array (

	0 => array ( 'code' => 'get_50off', 'img' => 'banner_get_50off.jpg', 'text' => 'See Pricing'),
	1 => array ( 'code' => 'grab_deal', 'img' => 'banner_grab_deal.jpg', 'text' => 'Upgrade to Pro'),
	2 => array ( 'code' => 'see_plans', 'img' => 'banner_see_plans.jpg', 'text' => 'Upgrade Now'),
	3 => array ( 'code' => 'see_pricing', 'img' => 'banner_see_pricing.jpg', 'text' => 'See Plans'),
	4 => array ( 'code' => 'upgrad_now', 'img' => 'banner_upgrad_now.jpg', 'text' => 'Get 50% OFF'),
	5 => array ( 'code' => 'upgrade_to_pro', 'img' => 'banner_upgrade_to_pro.jpg', 'text' => 'Grab Deal'),
) );

?>