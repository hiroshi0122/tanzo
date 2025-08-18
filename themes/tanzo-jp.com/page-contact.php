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
            <h1>お問い合わせ・リペアお申し込み</h1>
        </div>
        <div class="description">
            <p class="mb-3">製品に関するお問い合わせや、<br>リペアサービスのお申し込みはこちらからお申し込みください。</p>
            <p>※リペアをご希望のお客様は、「製品の状態」をご記入いただき、写真（別方向から撮ったもの3枚程度）を添付して送信してください。<br>メール確認後、担当者より個別のお見積りと納期のご連絡を差し上げます。</p>
        </div>
    </div>
</section>


<?php // CONTACT FORM SECTION // *********************************************************** // ?>
<section class="contact-form-sec">
    <div class="container">
        <?php echo do_shortcode('[contact-form-7 id="e652b93" title="お問い合わせフォーム"]'); ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const select = document.getElementById('inquiry-type');
  const blocks = document.querySelectorAll('.cond-block');

  const toggleBlocks = (val) => {
    blocks.forEach(block => {
      const show = block.dataset.showWhen === val;
      block.setAttribute('aria-hidden', show ? 'false' : 'true');
      block.querySelectorAll('input, select, textarea').forEach(el => {
        // 非表示時はバリデーション対象外にする
        el.disabled = !show;
      });
    });
  };

  if (select) {
    // 初期化
    toggleBlocks(select.value);

    // 選択肢が変わったときに実行
    select.addEventListener('change', () => toggleBlocks(select.value));
  }
});
</script>

<?php get_footer(); ?>