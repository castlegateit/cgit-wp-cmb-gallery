<?php

/*

Plugin Name: Castlegate IT WP CMB Gallery
Plugin URI: http://github.com/castlegateit/cgit-wp-cmb-gallery
Description: Simple gallery field using Custom Meta Boxes.
Version: 1.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

/**
 * Add gallery fields
 */
function cgit_gallery_fields ($meta_boxes) {

    $subfields = array(
        array(
            'id'   => 'image',
            'name' => 'Image',
            'type' => 'image',
        ),
        array(
            'id'   => 'title',
            'name' => 'Title',
            'type' => 'text',
        ),
        array(
            'id'   => 'alt',
            'name' => 'Alternative text',
            'type' => 'text',
        ),
    );

    $fields = array(
        array(
            'id'         => 'gallery',
            'name'       => 'Gallery',
            'type'       => 'group',
            'fields'     => $subfields,
            'repeatable' => TRUE,
            'sortable'   => TRUE,
        ),
    );

    $meta_box = array(
        'id'      => 'cgit-wp-cmb-gallery',
        'title'   => 'Gallery',
        'pages'   => array('post', 'page'),
        'context' => 'normal',
        'fields'  => $fields,
    );

    $meta_boxes[] = apply_filters('cgit_gallery_fields', $meta_box);

    return $meta_boxes;

}

add_filter('cmb_meta_boxes', 'cgit_gallery_fields');

/**
 * Add basic shortcode
 */
function cgit_gallery_shortcode () {

    if ( ! class_exists('CMB_Meta_Box') ) {
        return FALSE;
    }

    global $post;

    $gallery = get_post_meta($post->ID, 'gallery', FALSE);
    $output  = '';

    if ($gallery) {

        $output .= '<div class="cgit-gallery"><ul>';

        foreach ($gallery as $item) {

            $image = wp_get_attachment_image_src($item['image'], 'full');
            $thumb = wp_get_attachment_image_src($item['image']);
            $title = $item['title'];
            $alt   = $item['alt'];

            $output .= "<li><a href='{$image[0]}' title='$title'><img src='{$thumb[0]}' alt='$alt' /></a></li>";

        }

        $output .= '</ul></div>';

    }

    return $output;

}

add_shortcode('cgit_gallery', 'cgit_gallery_shortcode');
