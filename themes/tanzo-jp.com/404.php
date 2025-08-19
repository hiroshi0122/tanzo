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
 **/



get_header();
?>

<?php // TEXT PAGE FIRST SECTION // *********************************************************** // ?>
<section class="first-sec text-page-first-sec">
    <div class="container text-center">
        <div class="main-title blur center">
            <span>404 not found</span>
            <h1>お探しのページは<br class="d-sm-none">見つかりません</h1>
        </div>
        <div class="description mb-5">
            <p>ご覧になっていたページのリンクが無効になっているか、<br class="d-none d-md-block">ページが削除された可能性があります。</p>
        </div>
        <div class="btn-area justify-content-center">
            <a class="btn-view-more" href="/">TOPに戻る >>></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>