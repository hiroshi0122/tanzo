<?php

/**
 * Information single template file
 *
 * @link TANZO
 *
 * @package TANZO
 * @since 2025.8.11
 * @version 1.0
 *
 *
 **/

get_header();
?>


<article>
    <section class="single-sec first-sec">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post();?>
            <div class="container">
                <div class="title-area">
                    <span class="day"><?php the_time('Y.n.j'); ?></span>
                    <h1><?php the_title(); ?></h1>
                </div>
                <?php if ( get_the_post_thumbnail() ) : ?>
                    <div class="thumbnail">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url('', 'full')); ?>">
                    </div>
                <?php endif; ?>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</article>

<?php get_footer(); ?>