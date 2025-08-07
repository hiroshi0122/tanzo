//**************************************************************
// 2. Scroll ※topを離れたらclass付与
//**************************************************************
function init() {
  // スクロールして何ピクセルでクラスを付与させるか
  var px_change = 300;

  // スクロールのイベントハンドラを登録　ヘッダーにクラス名 smaller を付与
  window.addEventListener('scroll', function (e) {
    // 変化するポイントまでスクロールしたらクラスを追加
    if ($(window).scrollTop() > px_change) {
      $('header').addClass('smaller');

      // 変化するポイント以前であればクラスを削除
    } else if ($('header').hasClass('smaller')) {
      $('header').removeClass('smaller');
      $('#header-nav').removeAttr('checked').prop('checked', false).change();  // topでpull down用のcheckを外す
    }
  });
}
window.onload = init();



//**************************************************************
// 4. スクロールしたら メニューを隠す
//**************************************************************
var startPos = 0, winScrollTop = 0;
$(window).on('scroll', function () {
  winScrollTop = $(this).scrollTop();
  if (winScrollTop >= startPos) {
    if (winScrollTop >= 200) {
      $('.site-header').addClass('hide');
    }
  } else {
    $('.site-header').removeClass('hide');
  }
  startPos = winScrollTop;
});


//**********************************************************************
// 5. ハンバーガーメニューの起動
//**********************************************************************
$(function () {
  $('.hamburger').click(function () {
    $(this).toggleClass('active');

    if ($(this).hasClass('active')) {
      $('.menu-contents').addClass('active');
    }
    else {
      $('.menu-contents').removeClass('active');
    }
  });
});


//**********************************************************************
// 6. ハンバーガーメニューのメニュークリック後に 閉じる
//**********************************************************************
$(function () {
  $('.modal-close').on('click', function (event) {
    $('.menu-contents').removeClass('active');
    $('.hamburger').removeClass('active');
  });
});

$(function () {
  $('.hum-close').on('click', function (event) {
    $('.hamburger').removeClass('active');
  });
});

//**********************************************************************
// 7. アコーディオン PODCAST
//**********************************************************************


// //**********************************************************************
// // FADE IN ANIMATION（画面遷移）
// //**********************************************************************
// $(window).on('load', function(){
//   $('body').removeClass('fadeout');
// });

// $(function() {
//   // ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
//   $('a:not([href^="#"]):not([target])').on('click', function(e){
//     e.preventDefault(); // ナビゲートをキャンセル
//     url = $(this).attr('href'); // 遷移先のURLを取得
//     if (url !== '') {
//       $('body').addClass('fadeout');  // bodyに class="fadeout"を挿入
//       setTimeout(function(){
//         window.location = url;  // 0.8秒後に取得したURLに遷移
//       }, 800);
//     }
//     return false;
//   });
// });


