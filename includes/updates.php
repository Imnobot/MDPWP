<?php

    add_filter('plugins_api', 'mvp_pud_plugin_info', 20, 3 );
    add_filter('update_plugins_interactivepixel.net_mvp', 'mvp_pud_update', 10, 4);
    add_filter('plugin_auto_update_setting_html', 'mvp_pud_plugin_auto_update_setting_html', 10, 3 );
    add_action('in_plugin_update_message-apmvp/mvp.php', 'mvp_pud_display_update_message', 10, 2 );

   /* add_action('init', function(){
        delete_transient( 'update_plugins' );
        delete_site_transient( 'update_plugins' );
    });*/

    function mvp_pud_plugin_auto_update_setting_html($html, $plugin_file, $plugin_data) { 
        if ($plugin_file == 'apmvp/mvp.php') {
            if(empty($plugin_data['package'])){
                $html = sprintf(__("<span style='color:red;'>%s</span>", MVP_TEXTDOMAIN), 'Auto-updates disabled');
            }
        }
        return $html; 
    }
    
    function mvp_pud_display_update_message( $plugin_info_array, $plugin_info_object ) {
        if(empty($plugin_info_array['package'])) {
            echo __( ' Update your support license to access automatic updates.', MVP_TEXTDOMAIN );
        }
    }

    function mvp_pud_request(){

        $token = '';

        if(get_option( 'apenv_key_' . MVP_ID)){
            $opt = get_option( 'apenv_key_' . MVP_ID);
            $token = $opt['token'];
        }

        if($token){

            $url = 'https://interactivepixel.net/vcode/update.php?t='.time();

            $response = wp_remote_post($url, array(
                'method' => 'POST',
                'timeout'     => 10,
                'headers' => array('Accept' => 'application/json'),
                'body' => array(
                    'token' => $token,
                    'plugin' => MVP_ID,
                    'website' => mvp_get_url()
                )
            ));

            if(is_wp_error($response) || 200 !== wp_remote_retrieve_response_code( $response ) || empty( wp_remote_retrieve_body( $response )) ){
                return false;
            }else{
                $remote = json_decode( wp_remote_retrieve_body( $response ) );
            }

            return $remote;

        }

    }

    function mvp_pud_plugin_info( $res, $action, $args ) {

        if('plugin_information' === $action && $args->slug == MVP_PLUGIN_SLUG) {
            
            $remote = mvp_pud_request();

            if( ! $remote ) {
                return $res;
            }

            $res = new stdClass();

            $res->name = $remote->name;
            $res->slug = $remote->slug;
            $res->version = $remote->version;
            $res->tested = $remote->tested;
            $res->requires = $remote->requires;
            $res->author = $remote->author;
            $res->author_profile = $remote->author_profile;
            $res->download_link = $remote->download_url;
            $res->trunk = $remote->download_url;
            $res->requires_php = $remote->requires_php;
            $res->last_updated = $remote->last_updated;
            $res->package = $remote->package;

            $res->sections = array(
                'description' => $remote->sections->description,
                'installation' => $remote->sections->installation,
                'changelog' => $remote->sections->changelog
            );

            if( ! empty( $remote->banners ) ) {
                $res->banners = array(
                    'low' => $remote->banners->low,
                    'high' => $remote->banners->high
                );
            }
        }

        return $res;

    }

    function mvp_pud_update($update, $plugin_data, $plugin_file, $locales) {

        $remote = mvp_pud_request();

        if($remote){

            if((float)MVP_PLUGIN_VERSION < (float)$remote->version
                && (float)$remote->requires <= (float)get_bloginfo('version')
                && (float)$remote->requires_php < (float)PHP_VERSION ) {
            
                if($remote->download_url && !empty($remote->download_url)){
                    $remote->package = $remote->download_url;
                }

            }else{

                if($remote->has_support && !empty($remote->has_support)){
                    $remote->package = '1';
                }  

            }

        }

        return $remote;

    }

?>