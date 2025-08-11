<div class="news-contents">
    <div class="text-area">
        <span class="date"><?php echo get_post_time('Y.n.j'); ?></span>
        <a class="title-link" href="<?php the_permalink(); ?>">
            <h4><?php the_title(); ?></h4>
            <?php the_excerpt(); ?>
        </a>
    </div>
</div>