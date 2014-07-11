<?php
/*
Plugin Name: CFS - Phone Add-on
Plugin URI: http://uproot.us/
Description: A phone field extension for Custom Field Suite
Version: .1
Author: Austin Stewart
Author URI: http://austinthedeveloper.com/
License: GPL2
*/

$dirPlugin = plugin_dir_url( $file ). 'phone-plugin';

if (is_admin()) {
wp_register_script('maskedInput', $dirPlugin . '/jquery.maskedinput.min.js', array(), '1.0.0'); // Call Masked Input
wp_enqueue_script('maskedInput'); // Enqueue it!
wp_register_script('adminControls', $dirPlugin . '/admin.js', array(), '1.0.0'); // Call a JS file that shows up on the dashboard
wp_enqueue_script('adminControls'); // Enqueue it!
}

$cfs_phone_addon = new cfs_phone_addon();

class cfs_phone_addon
{
    function __construct() {
        add_filter( 'cfs_field_types', array( $this, 'cfs_field_types' ) );
    }

    function cfs_field_types( $field_types )
    {
        $field_types['phone'] = dirname( __FILE__ ) . '/phone.php';
        return $field_types;
    }
}
