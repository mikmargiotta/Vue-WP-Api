<?php
/*==================================
=            JAVASCRIPT            =
==================================*/
if (!is_admin()) add_action('wp_enqueue_scripts','my_theme_scripts_function', 11);
function my_theme_scripts_function() {
    wp_enqueue_script('vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', null, null, true);
    wp_enqueue_script('axiosjs', 'https://unpkg.com/axios/dist/axios.min.js', null, null, true);
    wp_enqueue_script('js_custom', get_template_directory_uri() . '/js/script.js', array( 'vuejs' ), null, true);
    wp_localize_script( 'js_custom', 'wpApiSettings', array(
        'root' => esc_url_raw( rest_url() ),
        'nonce' => wp_create_nonce( 'wp_rest' )
    ) );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}

/*=========================================
=            WORDPRESS GENERAL            =
=========================================*/
define( 'DISALLOW_FILE_EDIT', true );


/*----------  Rimuovere visualizzazione della versione  ----------*/
//remove_action('wp_head', 'wp_generator');
add_filter( 'the_generator', '__return_empty_string' );


















