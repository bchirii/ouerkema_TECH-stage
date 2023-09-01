<?php

namespace awr\services;

use awr\models\CommonModel as CommonModel;

class CommonService {

	/* For Singleton Pattern */
    private static $_instance = null;
    private function __construct() {  
    }
 
    public static function get_instance() {
 
        if(is_null(self::$_instance)) {
            self::$_instance = new CommonService();  
        }

        return self::$_instance;
    }

    public function get_show_notifications () {
        return CommonModel::get_instance()->get_show_notifications();  
    }
    
    public function show_notifications( $show ) {
        return CommonModel::get_instance()->show_notifications( $show );
    }
    
    public function save_hidden_bloc ($bloc_id, $hidden) {
        return CommonModel::get_instance()->save_hidden_bloc ($bloc_id, $hidden);
    }
    
    public function get_hidden_blocs () {
        return CommonModel::get_instance()->get_hidden_blocs ();
    }
	
    public function get_system_infos () {
        return CommonModel::get_instance()->get_system_infos ();
    }

    public function save_nav ( $nav_anchor ) {
        return CommonModel::get_instance()->save_nav ( $nav_anchor );
    }

    public function get_nav () {
        return CommonModel::get_instance()->get_nav ();
    }

    public function get_next_pp_infos () {

        $next_index = CommonModel::get_instance()->get_next_pp_infos ();

        $next = AWR_PP_INFOS[$next_index];

        $utm_campaign = 'ongoing';
        $utm_source = 'free_plugin';
        // the remaining vars are definied in their locations, banners, popup, etc.

        // Right banner
        $banner_utm_medium  = 'popup';
        $banner_utm_content = '';
        $banner_utm_detail  = $next['code'];

        $link = AWR_PLUGIN_PRO_STORE_URL . '?utm_campaign=' . $utm_campaign . '&utm_source=' . $utm_source . '&utm_medium=' . $banner_utm_medium . '&utm_content=' . $banner_utm_content . '&utm_detail=' . $banner_utm_detail; 

        $text = $next['text'];

        return array (
            'link' => $link,
            'text' => $text,
        );

    }

    public function get_current_banner_infos () {
        
        $current_index = CommonModel::get_instance()->get_current_pp_infos ();

        $current = AWR_PP_INFOS[$current_index];

        $utm_campaign = 'ongoing';
        $utm_source = 'free_plugin';
        // the remaining vars are definied in their locations, banners, popup, etc.

        // Right banner
        $banner_utm_medium  = 'banners';
        $banner_utm_content = 'sidebar';
        $banner_utm_detail  = $current['code'];

        $link = AWR_PLUGIN_PRO_STORE_URL . '?utm_campaign=' . $utm_campaign . '&utm_source=' . $utm_source . '&utm_medium=' . $banner_utm_medium . '&utm_content=' . $banner_utm_content . '&utm_detail=' . $banner_utm_detail; 

        $img = AWR_PLUGIN_IMG_URL . '/' . $current['img'];

        return array (
            'link' => $link,
            'img' => $img,
        );
    }


}