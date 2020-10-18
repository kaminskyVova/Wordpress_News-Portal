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
                        'category_name' => 'javascript, css, html, web design', // рубрика
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
                    <h2 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?></h2>
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
                        'category_name' => 'javascript, css, html, web design',
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
                            <h4 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...' ); ?></h4>
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

    <ul class="article-list">
        <!--  -->
        <?php
            global $post;

            $myposts = get_posts([ 
            'numberposts' => 4,
            'category_name' => 'articles',
            ]);
            if( $myposts ){
            foreach( $myposts as $post ){
                setup_postdata( $post );
        ?>
        <!--  -->
        <li class="article-item">
            <a class="article-permalink" href="<?php echo get_the_permalink(); ?>">
                <h4 class="article-title"><?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?></h4>
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

    <div class="main-grid">
        <ul class="article-grid">
            <?php		
                global $post;
                // запрос в базу
                $query = new WP_Query( [
                    'posts_per_page' => 7, 
                ] );

                if ( $query -> have_posts() ) {
                    // формируем счетчик постов 
                    $cnt = 0;
                    while ( $query->have_posts() ) {
                        
                        $query->the_post();
                        $cnt++;
                        
                        switch ($cnt) {
                            case '1':
            ?> 
                                <li class="article-grid-item article-grid-item-1">
                                    <a href="<?php the_permalink() ?>" class="article-grid-permalink">
                                    <img class="article-grid-thumb" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" srcset="">
                                        <span class="category-name">
                                            <?php 
                                                $category = get_the_category();
                                                echo $category[0]->name;
                                            ?>
                                        </span>
                                        <h4 class="article-grid-title">
                                            <?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?>
                                        </h4>
                                        <div class="article-grid-excerpt">
                                            <?php echo mb_strimwidth(get_the_excerpt(), 0, 150, '...'); ?>
                                        </div>
                                        <div class="article-grid-info">
                                            <div class="author">
                                                <?php $author_id = get_the_author_meta('ID'); ?>
                                                <img src="<?php echo get_avatar_url($author_id); ?>" alt="author-avatar" class="author-avatar">
                                                <span class="author-name">
                                                    <strong><?php the_author(); ?>:</strong>
                                                    <?php the_author_meta('description'); ?>
                                                </span>
                                            </div>
                                            <div class="comments">
                                                <img src="<?php echo get_template_directory_uri() . './assets/images/comment.svg' ?>" alt="comment-icon" class="comments-icon">
                                                <span class="comments-counter"><?php comments_number('0', '1', '%'); ?></span>
                                            </div>
                                        </div>
                                        <!-- <img src="<?php echo  get_the_post_thumbnail_url() ?>" alt="article-image" class=""> -->
                                    </a>
                                </li>
            <?php
                                break;
                                    
                                case '2':
                                    
            ?> 
                                    <li class="article-grid-item article-grid-item-2">
                                        <img class="article-grid-thumb" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="background">
                                        <a href="<?php the_permalink() ?>" class="article-grid-permalink">
                                            <span class="tag"> 
                                                <?php 
                                                    $posttags = get_the_tags();
                                                    if($posttags) {
                                                        echo $posttags[0]->name . ' ';
                                                    }
                                                ?>
                                            </span>
                                            <span class="category-name">
                                                <?php 
                                                    $category = get_the_category();
                                                    echo $category[0]->name;
                                                ?>
                                            </span>
                                            <h4 class="article-grid-title">
                                                <?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?>
                                            </h4>
                                            <!-- <p class="article-grid-excerpt">
                                                <?php the_excerpt(); ?>
                                            </p> -->
                                            <div class="article-grid-info">
                                                <div class="author">
                                                    <?php $author_id = get_the_author_meta('ID'); ?>
                                                    <img src="<?php echo get_avatar_url($author_id); ?>" alt="author-avatar" class="author-avatar">
                                                    <div class="author-info">
                                                        <span class="author-name">
                                                            <strong><?php the_author(); ?></strong>
                                                        </span>
                                                        <span class="date"><?php the_time('j F'); ?></span>
                                                        <!-- </div> -->
                                                        <div class="comments">
                                                            <img src="<?php echo get_template_directory_uri() . './assets/images/comment-white.svg' ?>" alt="comment-icon" class="comments-icon">
                                                            <span class="comments-counter"><?php comments_number('0', '1', '%'); ?></span>
                                                        </div>
                                                        <div class="likes">
                                                            <img src="<?php echo get_template_directory_uri() . './assets/images/count-heart.svg' ?>" alt="likes-icon" class="likes-icon">
                                                            <span class="comments-counter"><?php comments_number('0', '1', '%'); ?></span>
                                                        </div>
                                                    </div>
                                                    <!-- /.author-info -->
                                                </div>
                                            </div>
                                        </a>
                                    </li>
            <?php

                                    break;

                                    case '3':
            ?> 
                                        <li class="article-grid-item article-grid-item-3">
                                            <a href="<?php the_permalink() ?>" class="article-grid-permalink">
                                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="article-image" class="article-thumb">
                                                <h4 class="article-grid-title">
                                                    <?php echo mb_strimwidth(get_the_title(), 0, 50, '...'); ?>
                                                </h4>
                                            </a>
                                        </li>
            <?php
                                        break;
                            
                                    default: // выводим остальные посты
            ?>
                                        <li class="article-grid-item article-grid-item-default">
                                            <a href="<?php the_permalink() ?>" class="article-grid-permalink">
                                                <h4 class="article-grid-title">
                                                    <?php echo mb_strimwidth(get_the_title(), 0, 20, '...'); ?>
                                                </h4>
                                                <div class="article-grid-excerpt">
                                                    <?php echo mb_strimwidth(get_the_excerpt( ), 0, 90, '...'); ?>
                                                </div>
                                                <span class="article-grid-data"><?php the_time('j F'); ?></span>
                                            </a>
                                        </li>
            <?php
                                        break;
                        }
            ?>
                <!-- Вывода постов, функции цикла: the_title() и т.д. -->
            <?php 
                    }
                } else {
                    // Постов не найдено
                }

                wp_reset_postdata(); // Сбрасываем $post
            ?>
        </ul>
        <!-- /.article-grid -->

        <!-- //Подключаем сайдбар -->
        <?php get_sidebar('front-page'); ?>
        
    </div>
    
</div>

<?php get_footer(); ?>

