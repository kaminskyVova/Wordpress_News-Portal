<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <header class="header">
        <div class="header_container">
            <div class="header-wrapper">
                <?php
                    if( has_custom_logo() ){
                        // логотип есть выводим его
                        the_custom_logo();
                    } else {
                        echo 'UNIVERSAL';
                    }
                ?>
                <?php 
                    wp_nav_menu( [
                        'theme_location'  => 'header_menu',
                        'container'       => 'nav', 
                        'container_class' => 'header-nav', 
                        'menu_class'      => 'header-menu', 
                        'echo'            => true,
                    ] );
                ?>
                <?php echo get_search_form(); ?>
            </div>
        </div>
    </header>