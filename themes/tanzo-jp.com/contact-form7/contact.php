<div class="form-group">
  <label for="inquiry-type">お問い合わせ内容 <span class="required">※必須</span></label>
  [select* inquiry-type id:inquiry-type include_blank "お問い合わせ" "リペアのお申込み"]
</div>

<div class="form-group">
  <label for="your-name">氏名 <span class="required">※必須</span></label>
  [text* your-name id:your-name placeholder "佐藤 大輔"]
</div>

<div class="form-group">
  <label for="your-name-kana">氏名（フリガナ） <span class="required">※必須</span></label>
  [text* your-name-kana id:your-name-kana class:kana placeholder "サトウ ダイスケ"]
</div>

<div class="form-group">
  <label for="your-email">メールアドレス <span class="required">※必須</span></label>
  [email* your-email id:your-email placeholder "daisuke_sato@example.com"]
</div>

<div class="form-group">
  <label for="your-tel">電話番号</label>
  [tel your-tel id:your-tel placeholder "09012345678"]
</div>

<!-- 条件表示：リペアのお申込みのときに見せるブロック -->
<div class="cond-block" data-show-when="リペアのお申込み" aria-hidden="true">
  <p class="attention">※添付の画像はJPEG、PNG等の一般的なフォーマットでお願いいたします。</p>
  <div class="form-group">
    <label for="your-image1">不具合箇所の画像1（任意 / 3MBまで）</label>
    [file your-image1 id:your-image1 filetypes:jpg|jpeg|png|gif limit:3mb]
  </div>
  <div class="form-group">
    <label for="your-image2">不具合箇所の画像2（任意 / 3MBまで）</label>
    [file your-image2 id:your-image2 filetypes:jpg|jpeg|png|gif limit:3mb]
  </div>
  <div class="form-group">
    <label for="your-image3">不具合箇所の画像3（任意 / 3MBまで）</label>
    [file your-image3 id:your-image3 filetypes:jpg|jpeg|png|gif limit:3mb]
  </div>
</div>

<div class="form-group">
  <label for="your-message">メッセージ <span class="required">※必須</span></label>
  [textarea* your-message id:your-message rows:6 placeholder "お問い合わせ内容をご記入ください"]
</div>

<div class="form-group agree">
  [acceptance agree optional]
    <a href="https://tanzo.stores.jp/privacy_policy/" target="_blank">プライバシーポリシー</a>に同意します
  [/acceptance]
</div>

<div class="form-group submit-area">
  [submit class:btn "送信する"]
</div>