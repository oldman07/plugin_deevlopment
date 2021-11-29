<?php  

/**
 * Plugin Name: Pwsdk_plugin
 */
defined ('ABSPATH')|| die("canot acess directly");

add_action( 'init', 'pwspk_init' );

function pwspk_init(){
    add_shortcode( 'test', 'pwspk_my_shortcode' );
    }

function pwspk_my_shortcode($atts){
    $atts = shortcode_atts(array(
            'message' => 'hello worlds',
        ), $atts,'test');
     return $atts['message'];
}

add_filter( 'the_title' , 'pwspk_title' );
function pwspk_title($title){
    return "you title is hacked";
}

add_action( 'wp_enqueue_scripts' ,'pwspk_adding_script');

function pwspk_adding_script(){
    wp_enqueue_style( 'pwspk_plugin_dev', plugin_dir_url(__FILE__)."assets/css/style.css");

    wp_enqueue_script( 'pwspk_plugin_dev', plugin_dir_url(__FILE__)."assets/js/custom.js",true);
}

add_action( 'admin_menu','pwspk_options' );

function pwspk_options(){
    add_menu_page( 'pwspk option','pwspk option', 'manage_options', 'pwspk-option', 'pwspk_option_func' );
    add_submenu_page('pwspk-option', 'pwspk settings', 'pwspk settings', 'manage_options', 'pwspk settings','pwspk_settings_func' );
}

function pwspk_option_func(){
    echo '<h1>pwspk_option</h1>';
}
function pwspk_settings_func(){
    return true;
}