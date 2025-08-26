//**************************************************************
// 2. Scroll ※topを離れたらclass付与
//**************************************************************
// function init() {
//   // スクロールして何ピクセルでクラスを付与させるか
//   var px_change = 300;

//   // スクロールのイベントハンドラを登録　ヘッダーにクラス名 smaller を付与
//   window.addEventListener('scroll', function (e) {
//     // 変化するポイントまでスクロールしたらクラスを追加
//     if (window.scrollY > px_change) {
//       document.querySelector('header').classList.add('smaller');

//       // 変化するポイント以前であればクラスを削除
//     } else {
//       document.querySelector('header').classList.remove('smaller');
//       const headerNav = document.getElementById('header-nav');
//       if (headerNav) {
//         headerNav.checked = false;
//         headerNav.dispatchEvent(new Event('change'));
//       }
//     }
//   });
// }
// window.onload = init();



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


//**********************************************************************
// 7. SLIDER
//**********************************************************************
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const progress = document.getElementById('progress');
let current = 0;
let isAnimating = false;
const duration = 6000; // 6秒

if (slides.length > 0 && dots.length > 0 && progress) {
  // 初期表示の1枚目を出す！
  slides[current].style.opacity = 1;
  slides[current].style.transform = 'scale(1.05)';
  slides[current].classList.add('active');

  function goToSlide(index) {
    if (isAnimating || index === current) return;
    isAnimating = true;

    gsap.to(slides[current], {
      opacity: 0,
      scale: 1,
      duration: 1,
      onComplete: () => {
        slides[current].classList.remove('active');
        slides[current].style.zIndex = 0;
      }
    });

    slides[index].style.zIndex = 1;
    slides[index].classList.add('active');
    slides[index].style.opacity = 0;
    slides[index].style.transform = 'scale(1.05)';

    gsap.fromTo(slides[index], {
      opacity: 0,
      scale: 1
    }, {
      opacity: 1,
      scale: 1.05,
      duration: 1.2,
      ease: "power2.out",
      onComplete: () => {
        isAnimating = false;
      }
    });

    dots[current].classList.remove('active');
    dots[index].classList.add('active');
    current = index;

    animateProgressBar();
  }

  function animateProgressBar() {
    gsap.fromTo(progress, {
      width: "0%"
    }, {
      width: "100%",
      duration: duration / 1000,
      ease: "none"
    });
  }

  animateProgressBar();

  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => goToSlide(i));
  });

  setInterval(() => {
    const next = (current + 1) % slides.length;
    goToSlide(next);
  }, duration);
}
