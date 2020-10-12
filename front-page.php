<?php get_header(); ?>

<main class="front-page-header">

    <div class="container">

        <div class="hero">

            <div class="left">
                <!--  -->

                <?php

                     // глобальная переменная
                    global $post;

                    // в переменную мы запихнем по запросу на сервер посты
                    $myposts = get_posts([ 
                        'numberposts' => 1,    // выводим последние постоы
                        'category_name' => 'javascript', // рубрика
                    ]);

                    // проверяем если есть посты 
                    if( $myposts ){
                        foreach( $myposts as $post ){
                            setup_postdata( $post );
                    ?>
                    <!-- обрываем цикл ... и  -->
                    <!-- Вывода постов, функции цикла: the_title() и т.д. -->
                        
                    <!--  -->
                <img src="<?php echo  get_the_post_thumbnail_url() ?>" alt="category-image" class="post-thumb">
                <?php $author_id = get_the_author_meta('ID'); ?>
                <a href="<?php echo get_author_posts_url($author_id); ?>" class="author">
                    <img src="<?php echo get_avatar_url($author_id); ?>" alt="" class="avatar">
                    <div class="author-bio">
                        <span class="author-name"><?php the_author(); ?></span>
                        <span class="author-rank">Должность</span>
                    </div>
                </a>
                <div class="post-text">
                    <?php the_category(); ?>
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <a href="<?php echo get_the_permalink(); ?>" class="more">Читать дальше</a>
                </div>

                <!--  -->
                 <!-- //на пример выведим заголовок поста -->
                <p><?php the_title(); ?></p>
                <!-- усли пост 1 то и заголовок один если больше то выведит все то есть по циклу -->

                <?php 

                    }
                    } else {
                    // если Постов не найдено то обрываем цикл и... 
                ?>
                <p>Постов нет!</p>

                <?php
                    }

                    wp_reset_postdata(); // Сбрасываем $post
                ?>


            </div>

            <div class="right">
                <h3 class="recommend">Рекомендуем</h3>
                <ul class="posts-list">
                    <!--  -->

                    <?php
                        global $post;

                        $myposts = get_posts([ 
                        'numberposts' => 5,    // выводим последние постоы
                        'offset' => 1, // пропускаем последний и выводим следующие
                        // 'orderby'     => 'date',
                        // 'order'       => 'ASC', 
                        ]);
                        if( $myposts ){
                        foreach( $myposts as $post ){
                            setup_postdata( $post );
                    ?>
                    <!--  -->
                    <li class="post">
                        <?php the_category(); ?>
                        <a class="post-permalink" href="<?php echo get_the_permalink(); ?>">
                            <h4 class="post-title"><?php the_title(); ?></h4>
                        </a>
                    </li>
                    <!--  -->
                    <?php 
                        }
                        } else {
                        // если Постов не найдено то обрываем цикл и... 
                    ?>
                    <p>Постов нет!</p>
                    <?php
                        }
                        wp_reset_postdata(); // Сбрасываем $post
                    ?>
                </ul>
            </div>

        </div>

    </div>

</main>

<div class="container">
    <ul class="posts-list">
        <!--  -->
        <?php
            global $post;

            $myposts = get_posts([ 
            'numberposts' => 4,
            ]);
            if( $myposts ){
            foreach( $myposts as $post ){
                setup_postdata( $post );
        ?>
        <!--  -->
        <li class="post-item">
            <a class="post-permalink" href="<?php echo get_the_permalink(); ?>">
                <h4 class="post-title"><?php the_title(); ?></h4>
            </a>
            <img width="65" height="65" src="<?php echo get_the_post_thumbnail_url(null, 'thumbnail'); ?>" alt="">
        </li>
        <!--  -->
        <?php 
            }
            } else {
            // если Постов не найдено то обрываем цикл и... 
        ?>
        <p>Постов нет!</p>
        <?php
            }
            wp_reset_postdata(); // Сбрасываем $post
        ?>
    </ul>
</div>