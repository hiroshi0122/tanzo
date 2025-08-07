//**************************************************************
// 2. Scroll ※topを離れたらclass付与
//**************************************************************
function init() {
  // スクロールして何ピクセルでクラスを付与させるか
  var px_change = 300;

  // スクロールのイベントハンドラを登録　ヘッダーにクラス名 smaller を付与
  window.addEventListener('scroll', function (e) {
    // 変化するポイントまでスクロールしたらクラスを追加
    if (window.scrollY > px_change) {
      document.querySelector('header').classList.add('smaller');

      // 変化するポイント以前であればクラスを削除
    } else {
      document.querySelector('header').classList.remove('smaller');
      const headerNav = document.getElementById('header-nav');
      if (headerNav) {
        headerNav.checked = false;
        headerNav.dispatchEvent(new Event('change'));
      }
    }
  });
}
window.onload = init();



//**************************************************************
// 4. スクロールしたら メニューを隠す
//**************************************************************
let startPos = 0;
window.addEventListener('scroll', function () {
  const winScrollTop = window.scrollY;
  const siteHeader = document.querySelector('.site-header');
  if (winScrollTop >= startPos) {
    if (winScrollTop >= 200 && siteHeader) {
      siteHeader.classList.add('hide');
    }
  } else {
    if (siteHeader) siteHeader.classList.remove('hide');
  }
  startPos = winScrollTop;
});


//**********************************************************************
// 5. ハンバーガーメニューの起動
//**********************************************************************
document.addEventListener('DOMContentLoaded', function () {
  const hamburger = document.querySelector('.hamburger');
  const menuContents = document.querySelector('.menu-contents');

  if (hamburger && menuContents) {
    hamburger.addEventListener('click', function () {
      hamburger.classList.toggle('active');

      if (hamburger.classList.contains('active')) {
        menuContents.classList.add('active');
      }
      else {
        menuContents.classList.remove('active');
      }
    });
  }

  //**********************************************************************
  // 6. ハンバーガーメニューのメニュークリック後に 閉じる
  //**********************************************************************
  const modalClose = document.querySelector('.modal-close');
  if (modalClose) {
    modalClose.addEventListener('click', function (event) {
      if (menuContents) menuContents.classList.remove('active');
      if (hamburger) hamburger.classList.remove('active');
    });
  }

  const humClose = document.querySelector('.hum-close');
  if (humClose) {
    humClose.addEventListener('click', function (event) {
      if (hamburger) hamburger.classList.remove('active');
    });
  }
});




