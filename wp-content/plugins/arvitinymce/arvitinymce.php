<?php
/*
Plugin Name: Arvi Custom Buttons
Description: Hello
Version: 0.1
Requires at least: 3.7
Tested up to: 4.5
Author: Unbeatable
Author URI: 
Text Domain: 
Domain Path: 
License: A "Slug" license name e.g. GPL2
*/
?>
<?php
add_action( 'init', 'arvi_buttons' );
function arvi_buttons() {
    add_filter( "mce_external_plugins", "arvi_add_buttons" );
    add_filter( "mce_buttons", "arvi_register_buttons" );
}
function arvi_add_buttons( $plugin_array ) {
    $plugin_array['arvi'] = plugin_dir_url( __FILE__ ) . 'arvi-editor-buttons/arvi-plugin.js';
    return $plugin_array;
}
function arvi_register_buttons( $buttons ) {
    array_push( $buttons, 'blockquotearvi' ); // dropcap', 'recentposts
    return $buttons;
}
?>
