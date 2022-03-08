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
 */



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

    function custom_post_book()
    {
        // create custom post type
        register_post_type('book', array(
            'label' => 'book',
            'public' => true
        ));
    }


    function add_post_type_to_menu()
    {
        // triger custom post to admin menu
        add_action('init', array($this, 'custom_post_book'));
    }
}

$basicPlugin = new BasicPlugin;
$basicPlugin->add_post_type_to_menu();

// register activation hook
register_activation_hook(__FILE__, array($basicPlugin, 'activate'));

// register activation hook
register_activation_hook(__FILE__, array($basicPlugin, 'deactivate'));
