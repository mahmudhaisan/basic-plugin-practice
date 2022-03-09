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
    function register()
    {
        $this->add_to_admin_menu();
        $this->enqueue_files_to_dashboard();
    }


    //activate function
    function activate()
    {
        require_once(plugin_dir_path(__FILE__) . 'includes/plugin-activation-class.php');
        //calling static method
        activate::activation();
    }

    // deactivate function
    function deactivate()
    {
        require_once(plugin_dir_path(__FILE__) . 'includes/plugin-deactivation-class.php');
        //calling static method
        activate::deactivation();
    }

    // menu page setup
    function admin_menu_dashboard()
    {
        add_menu_page(
            'Basic Plugin',
            'Basic Plugin',
            'manage_options',
            'basic_plugin',
            array($this, 'add_to_admin_menu'),
            'dashicons-marker',
            17
        );
    }

    // adding action
    function add_to_admin_menu()
    {
        add_action('admin_menu', array($this, 'admin_menu_dashboard'));
    }


    // enqueue files
    function enqueue_files()
    {
        // enqueue css file
        wp_enqueue_style('custom-style', plugin_dir_url(__FILE__) . '/assets/css/style.css', array(), false, 'all');

        // enqueue js file
        wp_enqueue_script('custom-script', plugin_dir_url(__FILE__) . '/assets/js/script.js', array(), false, true);
    }

    // add enqueue files to admin dashboard
    function enqueue_files_to_dashboard()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_files'));
    }
}

$basicPlugin = new BasicPlugin;
$basicPlugin->register();

register_activation_hook(__FILE__, array($basicPlugin, 'activate'));
register_activation_hook(__FILE__, array($basicPlugin, 'deactivate'));
