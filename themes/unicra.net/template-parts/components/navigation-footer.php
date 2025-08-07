<?php
/**
 * Displays footer navigation
 *
 * @package KURAFT
 * @since 2024
 * @version 1.0
 */

include 'navigation.php';  // 配列を読み込み
?>

<nav class="footer-nav">
    <ul class="navigation row justify-content-between">
        <?php foreach($navigation as $key => $menu): ?>
            <li class="col-6 col-md-auto">
                <a class="menu-link" href="/<?php echo esc_html($menu['link']); ?>">
                    <span><?php echo esc_html($menu['sub-title']); ?></span>
                    <p><?php echo esc_html($menu['menu']); ?></p>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="navigation-bottom row justify-content-between g-0">
        <?php foreach($footer_navigation as $key => $menu): ?>
            <?php if($key == 0):?>
                <div class="border-box col-auto"></div>
            <?php endif;?>
            <li class="col-6 col-md-auto">
                <a class="menu-link" href="/<?php echo esc_html($menu['link']); ?>"><?php echo esc_html($menu['menu']); ?></a>
            </li>
            <div class="border-box col-auto"></div>
        <?php endforeach; ?>
    </ul>
</nav>
