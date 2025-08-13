<?php

/**
 * Home template file
 *
 * @link TANZO
 *
 * @package TANZO
 * @since 2025.8.11
 * @version 1.0
 *
 * Template Name: NEWS
 **/

$paged = get_query_var('paged') ? (int) get_query_var('paged') : 1;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => get_query_var('paged') ?: 1
);
$query = new WP_Query($args);


get_header();
?>

<?php // NEWS SECTION // *********************************************************** // ?>
<section class="news-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="main-title blur">
                    <span>NEWS</span>
                    <h2 class="daily-title">お知らせ一覧</h2>
                </div>
            </div>
            <div class="col-md-8">
                <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                        <div class="news-contents">
                            <div class="text-area">
                                <span class="date"><?php echo get_post_time('Y.n.j'); ?></span>
                                <a class="title-link" href="<?php the_permalink(); ?>">
                                    <h4><?php the_title(); ?></h4>
                                    <?php the_excerpt(); ?>
                                </a>
                            </div>
                        </div>

                    <?php endwhile; ?>

                    <?php
                    // 必要ならページネーション
                    the_posts_pagination([
                        'mid_size'  => 1,
                        'prev_text' => '«',
                        'next_text' => '»',
                    ]);
                    ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>