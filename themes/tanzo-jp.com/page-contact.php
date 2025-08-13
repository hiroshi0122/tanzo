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
 * Template Name: CONTACT
 **/



get_header();
?>

<?php // TEXT PAGE FIRST SECTION // *********************************************************** // ?>
<section class="first-sec text-page-first-sec">
    <div class="container">
        <div class="main-title blur">
            <span>Contact</span>
            <h1>お問い合わせ</h1>
        </div>
        <div class="description">
            <p>製品に関するお問い合わせや、<br>リペアサービスのお申し込みはこちらからお申し込みください。</p>
        </div>
    </div>
</section>


<?php // CONTACT FORM SECTION // *********************************************************** // ?>
<section class="contact-form-sec">
    <div class="container">
        <?php echo do_shortcode('[contact-form-7 id="e652b93" title="お問い合わせフォーム"]'); ?>
    </div>
</section>

<?php get_footer(); ?>