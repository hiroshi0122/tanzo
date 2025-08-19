<section class="btn-sec blur">
    <div class="container xs-container">
        <div class="btn-area">
            <?php if ( is_page('simple') ) : ?>
                <a class="btn-view-more" href="/to-table">調理からテーブルへ >>></a>
                <a class="btn-view-more" href="/quality">TANZOのこだわり >>></a>
            <?php elseif ( is_page('quality') ) : ?>
                <a class="btn-view-more" href="/simple">手間なし・かんたん >>></a>
                <a class="btn-view-more" href="/to-table">調理からテーブルへ >>></a>
            <?php elseif ( is_page('to-table') ) : ?>
                <a class="btn-view-more" href="/simple">手間なし・かんたん >>></a>
                <a class="btn-view-more" href="/quality">TANZOのこだわり >>></a>
            <?php endif;?>
        </div>
    </div>
</section>