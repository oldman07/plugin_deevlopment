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