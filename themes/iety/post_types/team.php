<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 02.02.16
 * Time: 14:33
 */

if(! function_exists('team_post_type')):

    function team_post_type(){
        $singular = 'Team';
        $pulural = 'Teams';
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
            'menu_position'       => 35,
            'menu_icon'           => 'dashicons-groups',
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
        register_post_type('team', $args);
    };

endif;

add_action('init', 'team_post_type');

