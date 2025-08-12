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
                <img src="<?php bloginfo('template_url'); ?>/assets/images/logo/tanzo_logo.svg" alt="tanzoロゴ">
            </a>
        </div>
        <nav class="col d-none d-lg-block">
            <ul class="navigation row justify-content-end">
                <?php foreach($navigation as $key => $menu): ?>
                    <li class="col-auto">
                        <a class="menu-link" href="/<?php echo esc_html($menu['link']); ?>">
                            <p><?php echo esc_html($menu['menu']); ?></p>
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
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/logo/tanzo_logo.svg" alt="TANZOロゴ">
                </a>
                <?php foreach($navigation as $key => $menu): ?>
                    <li class="menu modal-close">
                        <a href="/<?php echo esc_html($menu['link']); ?>">
                            <p><?php echo esc_html($menu['menu']); ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
