<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}


/*
* first way
*/


// clear this plugins data that is stored in db
$books = get_posts(array(
    'post_type' => 'book',
    'numberposts' => -1  // get all posts using this -1 
));

// get all posts and stores one by one in $book
foreach ($books as $book) {
    wp_delete_post($book->ID, true); // get $book id one by one and delete
}


/*
* second way
*/

//access the databse using sql
global $wpdb;

// run a query
$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'"); // delete post types
