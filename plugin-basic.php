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

        require_once(plugin_dir_path(__FILE__) . 'includes/plugin-activation-class.php');
        //calling static method
        activate::activation();
    }

    function deactivate()
    {
        require_once(plugin_dir_path(__FILE__) . 'includes/plugin-deactivation-class.php');
        //calling static method
        activate::deactivation();
    }


    // add book post type on dashboard
    function add_post_type_to_menu()
    {
        // trigger custom post to admin menu
        add_action('init', array($this, 'custom_post_book'));
    }

    // enqueue files
    function enqueue_files()
    {
        // enqueue css file
        wp_enqueue_style('custom-style', plugin_dir_url(__FILE__) . '/assets/css/style.css', array(), false, 'all');

        // enqueue js file
        wp_enqueue_script('custom-script', plugin_dir_url(__FILE__) . '/assets/js/script.js', array(), false, true);
    }

    function enqueue_files_to_dashboard()
    {
        // add enqueue files to admin dashboard
        add_action('admin_enqueue_scripts', array($this, 'enqueue_files'));
    }
}

$basicPlugin = new BasicPlugin;

register_activation_hook(__FILE__, array($basicPlugin, 'activate'));
