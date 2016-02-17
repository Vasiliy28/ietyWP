<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 02.02.16
 * Time: 14:33
 */

if(! function_exists('history_post_type')):

    function history_post_type(){
        $singular = 'History';
        $pulural = 'Histores';
        $slug = str_replace( ' ', '_', strtolower( $singular ) );

        $labels = array(
            'name'                  => $pulural,
            'singular_name'         => $singular,
            'add_new'               => 'Add New',
            'add_new_item'          => 'Add New ' . $singular,
            'edit'                  => 'Edit',
            'edit_item'             => 'Edit ' . $singular,
            'new_item'              => 'New ' . $singular,
            'view'                  => 'View ' . $singular,
            'view_item'             => 'View ' . $singular,
            'search_term'           => 'Search ' . $pulural,
            'parent'                => 'Parent ' . $singular,
            'not_found'             => 'No ' . $pulural . ' found',
            'not_found_in_trash'    => 'No ' . $pulural . ' in Trash'
        );

        $args = array(
            'labels' =>  $labels,
            'public'              => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'show_in_nav_menus'   => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 27,
            'menu_icon'           => 'dashicons-chart-line',
            'can_export'          => true,
            'delete_with_user'    => false,
            'hierarchical'        => true,
            'has_archive'         => true,
            'query_var'           => true,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,

            // 'capabilities' => array(),
            'rewrite'             => array(
                'slug' => $slug,
                'with_front' => true,
                'pages' => true,
                'feeds' => true,
            ),
            'supports'            => array(
                'title',
                'page-attributes'
            )

        );
        register_post_type('history', $args);
    };

endif;

add_action('init', 'history_post_type');

if(! function_exists('history_post_type_taxonomy')):
    function history_post_type_taxonomy(){
        $singular = 'Type post history';
        $plural = 'Type post historys';
        $slug = str_replace( ' ', '_', strtolower( $singular ) );
        $labels = array(
            'name'                       => $plural,
            'singular_name'              => $singular,
            'search_items'               => 'Search ' . $plural,
            'popular_items'              => 'Popular ' . $plural,
            'all_items'                  => 'All ' . $plural,
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => 'Edit ' . $singular,
            'update_item'                => 'Update ' . $singular,
            'add_new_item'               => 'Add New ' . $singular,
            'new_item_name'              => 'New ' . $singular . ' Name',
            'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
            'add_or_remove_items'        => 'Add or remove ' . $plural,
            'choose_from_most_used'      => 'Choose from the most used ' . $plural,
            'not_found'                  => 'No ' . $plural . ' found.',
            'menu_name'                  => $plural,
        );
        $args = array(

            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => false,
            'show_in_quick_edit'    => true,
            'show_tagcloud'         => false,
            'show_in_nav_menus'     =>true,


            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => $slug ),
        );
        register_taxonomy( $slug, 'history', $args );
    };
endif;

add_action('init','history_post_type_taxonomy');

if(! function_exists('history_when_taxonomy')):
    function history_when_taxonomy(){
        $singular = 'When';
        $plural = 'Whens';
        $slug = str_replace( ' ', '_', strtolower( $singular ) );
        $labels = array(
            'name'                       => $plural,
            'singular_name'              => $singular,
            'search_items'               => 'Search ' . $plural,
            'popular_items'              => 'Popular ' . $plural,
            'all_items'                  => 'All ' . $plural,
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => 'Edit ' . $singular,
            'update_item'                => 'Update ' . $singular,
            'add_new_item'               => 'Add New ' . $singular,
            'new_item_name'              => 'New ' . $singular . ' Name',
            'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
            'add_or_remove_items'        => 'Add or remove ' . $plural,
            'choose_from_most_used'      => 'Choose from the most used ' . $plural,
            'not_found'                  => 'No ' . $plural . ' found.',
            'menu_name'                  => $plural,
        );
        $args = array(

            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => false,
            'show_in_quick_edit'    => true,
            'show_tagcloud'         => false,
            'show_in_nav_menus'     =>true,



            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => $slug ),
        );
        register_taxonomy( $slug, 'history', $args );
    };
endif;

add_action('init','history_when_taxonomy');

