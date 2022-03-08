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

    function __construct()
    {
        // adding custom post 'book' to wordpress dashboard
        add_action('init', array($this, 'custom_post'));
    }

    function activate()
    {
        // in case plugin activation get failed
        $this->activate();
        //refresh db
        flush_rewrite_rules();
    }

    function deactivate()
    {
        //refresh databse upon in deactivation
        flush_rewrite_rules();
    }


    function custom_post()
    {
        // registering custom post type
        register_post_type('book', array(
            'label' => 'book',
            'public' => true,
        ));
    }
}

// initializing basicPlugin class
$basicInit = new BasicPlugin();

// activation hook
register_activation_hook(__FILE__, array($basicInit, 'activate'));

// deactivation hook
register_activation_hook(__FILE__, array($basicInit, 'deactivate'));
