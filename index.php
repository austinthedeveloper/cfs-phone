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
