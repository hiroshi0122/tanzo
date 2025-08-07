<?php
/**
 * Displays header navigation
 *
 * @package Unicra
 * @since 2025.3.17
 * @version 2.0
 */

include 'navigation.php';  // 配列を読み込み
?>

<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-auto">
            <a class="logo-side" href="/">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/logo/unicra_logo.svg" alt="ユニクラのロゴ">
            </a>
        </div>
        <nav class="col d-none d-lg-block">
            <ul class="navigation row justify-content-end">
                <?php foreach($navigation as $key => $menu): ?>
                    <li class="col-auto">
                        <a class="menu-link js-anchor" href="/<?php echo esc_html($menu['link']); ?>">
                            <p><?php echo esc_html($menu['menu']); ?></p>
                            <span><?php echo esc_html($menu['sub-title']); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <?php // # MOBILE NAVIGATION =======================/?>
        <div class="hamburger d-lg-none">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="menu-contents d-lg-none">
            <ul class="menu-list">
                <a class="logo" href="/">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/logo/unicra_logo_white.svg" alt="ロゴ">
                </a>
                <?php foreach($navigation as $key => $menu): ?>
                    <li class="menu modal-close">
                        <a href="/<?php echo esc_html($menu['link']); ?>">
                            <p><?php echo esc_html($menu['menu']); ?></p>
                            <span><?php echo nl2br($menu['sub-title']); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- <div class="sns-links">
                <a class="insta" href="/" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a class="facebook" href="/" target="_blank">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div> -->
        </div>
    </div>
</div>
