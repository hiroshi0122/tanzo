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
 * Template Name: TO TABLE（調理からテーブルへ）
 **/


$picture = [
    [
        'title' => '調理からテーブルへ',
        'image' => 'to_table',
    ],
    [
        'title' => '食卓へ彩りを添えるデザイン',
        'image' => 'color',
    ],
    [
        'title' => '食べ終わるまで料理が冷めません',
        'image' => 'hot',
    ],
];


get_header();
?>

<?php // DAILY PAGE FIRST SECTION // *********************************************************** // ?>
<section class="first-sec daily-page-first-sec table">
    <div class="container-fluid">
        <div class="main-title blur center">
            <span>From Cooking to the Table</span>
            <h1>調理からテーブルへ</h1>
            <h3>つくる・盛る・たのしむ<br>すべて、この器で</h3>
        </div>
        <div class="description">
            <p>TANZOは調理器具でありながら、器としてそのまま食卓へ。<br class="d-none d-sm-block">火からそのまま、料理の温もりと美味しさを届けます。</p>
        </div>
    </div>
</section>


<?php // TABLE PICTURE SECTION // *********************************************************** // ?>
<section class="table-picture-sec p-0">
    <div class="container s-container">
        <?php foreach($picture as $content): ?>
            <div class="picture-contents blur">
                <div class="border-title">
                    <h2><?php echo esc_html($content['title']); ?></h2>
                </div>
                <div class="image">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/to_table/image_<?php echo esc_html($content['image']); ?>.webp" alt="<?php echo esc_html($content['title']); ?>">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<?php get_template_part('template-parts/components/sec-btn'); ?>



<?php get_footer(); ?>