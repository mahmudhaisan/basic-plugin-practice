<?php

/*
* @basic plugin
*/

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}


// first way to delete db post type posts
$books = get_posts(array(
    'post_type' => 'book',
    'numberposts' => -1 //get all posts

));

foreach ($books as $book) {
    wp_delete_post($book->ID, true); // delete posts according to id
}


// 2nd way


// global $wpdb;
// $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'"); 
