<?php 

// правильный способ подключить стили и скрипты
function enqueue_universal_style() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'universal-theme',
        get_template_directory_uri() . '/assets/css/universal-theme.css' , 
        'style'
    );
    wp_enqueue_style( 
        'Roboto-Slab', 
        'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap',
    );
};
add_action( 'wp_enqueue_scripts', 'enqueue_universal_style' );


// добавляем расширеные возможности
if ( ! function_exists( 'universal_theme_setup' ) ) :
    // добавляем тег title 
    function universal_theme_setup() {
        add_theme_support( 'title-tag' );


        // добавления миниатюр
        add_theme_support( 'post-thumbnails', array( 'post' ) ); 

         // добавляем лого 
        add_theme_support( 'custom-logo', [
            'width'       => 163,
            'header-text' => 'Universal',
            'flex-height' => true,
            'unlink-homepage-logo' => false, 
        ] );

        // регистрация меню сайта
        register_nav_menus( [
            'header_menu' => 'Меню в шапке',
            'footer_menu' => 'Меню в подвале'
        ] );
    };
endif;
add_action( 'after_setup_theme', 'universal_theme_setup' );


## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
}


