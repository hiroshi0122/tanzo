<?php

/**
 * Displays footer navigation
 *
 * @package TANZO
 * @since 2025.8.11
 * @version 1.0
 */

include 'navigation.php';  // 配列を読み込み
?>

<div class="row align-items-center">
    <div class="col-md-3">
        <a class="footer-logo" href="/">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/logo/tanzo_logo.svg" alt="tanzoロゴ">
        </a>
    </div>
    <div class="col-md-9">
        <nav class="footer-nav">
            <ul class="navigation row justify-content-end">
                <?php foreach ($navigation as $key => $menu): ?>
                    <li class="col-6 col-md-auto g-0">
                        <a class="menu-link" href="/<?php echo esc_html($menu['link']); ?>">
                            <p><?php echo esc_html($menu['menu']); ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>
<div class="second-nav-area">
    <div class="row align-items-center justify-content-between">
        <div class="col-md-auto order-1 order-md-0">
            <small class="copyright">&copy; <?php echo date("Y"); ?> TANZO Rights Reserved.</small>
        </div>
        <div class="col order-0 order-md-1">
            <nav class="footer-second-nav">
                <ul class="navigation row justify-content-end">
                    <?php foreach ($second_navigation as $key => $menu): ?>
                        <li class="col-6 col-md-auto g-0">
                            <a class="menu-link" href="/<?php echo esc_html($menu['link']); ?>">
                                <p><?php echo esc_html($menu['menu']); ?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>