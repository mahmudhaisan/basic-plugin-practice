<?php

/**
 * Plugin Name: Plugin Basic
 * Plugin URI: https://mahmudhaisan.com
 * Description: Plugin oop
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Mahmud Haisan
 * Author URI: https://mahmudhaisan.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://mahmudhaisan.com
 * Text Domain: Plba
 **/



// defining the Abspath
if (!defined('ABSPATH')) {
    die;
}



class BasicPlugin
{
    function activate()
    {
        // refresh database table
        flush_rewrite_rules();
    }

    function deactivate()
    {
        // refresh database table
        flush_rewrite_rules();
    }


    // add book post type on dashboard
    function add_post_type_to_menu()
    {
        // trigger custom post to admin menu
        add_action('init', array($this, 'custom_post_book'));
    }

    // enqueue files
    static function enqueue_files() // changed this method to static keyword
    {
        // enqueue css file
        wp_enqueue_style('custom-style', plugin_dir_url(__FILE__) . '/assets/css/style.css', array(), false, 'all');

        // enqueue js file
        wp_enqueue_script('custom-script', plugin_dir_url(__FILE__) . '/assets/js/script.js', array(), false, true);
    }

    static function enqueue_files_to_dashboard()
    {
        // add enqueue files to admin dashboard
        add_action('admin_enqueue_scripts', array('BasicPlugin', 'enqueue_files')); // change $this to BasicPlugin as of static keyword
    }
}


// call static method
BasicPlugin::enqueue_files_to_dashboard();
