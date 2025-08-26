//**************************************************************
// GSAP ANIMATION
//**************************************************************
// COMMON ANIMATION
// ==================================================
// FADE IN UP ------------------------------//
// gsap.utils.toArray(".fadeInUp").forEach((target) => {
//   gsap.timeline({
//     scrollTrigger: {
//       trigger: target,
//       start: "top 100%",
//       end: "bottom 80%",
//       toggleActions: "play none none none"
//     }
//   })
//     .from(target, {
//       y: 60, 
//       autoAlpha: 0, 
//       scale: 0.9, 
//       stagger: 0.5,
//       filter: "blur(10px)",
//     })
//     .to(target, {
//       y: 0, 
//       autoAlpha: 1, 
//       scale: 1, 
//       ease: "expo.inOut", 
//       duration: 1,
//       filter: "blur(0px)",
//     })
// });

// FADE IN UP（タイトルテンプレート） ------------------------------//
gsap.utils.toArray(".fadeInUp").forEach((target) => {
  gsap.timeline({
    scrollTrigger: {
      trigger: target,
      start: "top 100%",
      end: "bottom 100%",
      toggleActions: "play none none none"
    }
  })
    .from(target, {
      y: 20, opacity: 0, scale: 0.95,
      filter: "blur(10px)",
    })
    .to(target, {
      y: 0, opacity: 1, scale: 1, duration: 1,
      filter: "blur(0px)",
      ease: "expo.inOut", 
    })
});


// BLUR アニメーション（ぼかし） ------------------------------//
var target = gsap.utils.toArray(".blur");
gsap.utils.toArray(".blur").forEach((target) => {
  gsap.timeline({
    scrollTrigger: {
      trigger: target,
      start: "top 80%",
      end: "bottom 80%",
      toggleActions: "play none none none"
    }
  })
    .from(target, {
      filter: "blur(20px)",
      opacity: 0,
    })
    .to(target, {
      filter: "blur(0px)",
      ease: "expo.inOut",
      opacity: 1,
      duration: 10,
    })
});


// FVキャッチコピー ------------------------------//
window.addEventListener("load", function() {
  gsap.fromTo(".movie-area .catch",
    { opacity: 0, filter: "blur(20px)", },                 // 初期状態
    { opacity: 1, duration: 2,  filter: "blur(0px)", delay: 3.5, ease: "power2.out" } 
  );
});


// FADE IN UP STAGGER（順番に表示させる） ------------------------------//
//トリガーはfadeInUp-stagger
gsap.utils.toArray(".fadeInUp-stagger").forEach((target) => {
  const radiusBoxes = target.querySelectorAll('.stagger');
  gsap.set(radiusBoxes, { y: 50, autoAlpha: 0, scale: 0.9 });

  gsap.fromTo(
    radiusBoxes,
    {
      y: 50,
      autoAlpha: 0,
      scale: 0.9,
      filter: "blur(10px)",
    },
    {
      y: 0,
      autoAlpha: 1,
      scale: 1,
      stagger: 0.1,
      filter: "blur(0px)",
      ease: "expo.inOut",
      duration: 1,
      scrollTrigger: {
        trigger: target,
        start: "top 80%",
        end: "bottom 80%",
        toggleActions: "play none none none",
      },
    }
  );
});

// 無限スクロール ------------------------------//
// document.addEventListener("DOMContentLoaded", function () {
//   let marqueeInner = document.querySelector(".scrolling-msg-inner");

//   gsap.to(marqueeInner, {
//     x: "-50%", // 50%ずらす
//     duration: 40,
//     ease: "linear",
//     repeat: -1
//   });
// });


// LENISを使った慣性スクロール ------------------------------//
import Lenis from "@studio-freight/lenis";

const lenis = new Lenis({
  duration: 2,
  smooth: true,
  lerp: 0.2, // 慣性の強さ
});

window.lenis = lenis;

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

// すべてのアンカーリンクを取得
const anchors = document.querySelectorAll(".js-anchor");

anchors.forEach(anchor => {
  anchor.addEventListener("click", (e) => {
    e.preventDefault();
    
    // クリックされたaタグの href を取得（`/` を削除）
    const targetId = anchor.getAttribute("href").replace("/", ""); 
    
    // IDがある場合のみスクロール実行
    if (targetId && document.querySelector(targetId)) {
      lenis.scrollTo(targetId, {
        offset: -50, // 必要ならオフセットを調整（例: 固定ヘッダー対策）
        duration: 1.5
      });
    }
  });
});

//**********************************************************************
// 8. MENU OPEN
//**********************************************************************
document.addEventListener('DOMContentLoaded', () => {
  const parents = document.querySelectorAll('.nav-item.has-children');

  parents.forEach(li => {
    const link = li.querySelector('.menu-link');

    // マウスが乗ったら open クラスを付与
    li.addEventListener('mouseenter', () => {
      li.classList.add('open');
      if (link) link.setAttribute('aria-expanded', 'true');
    });

    // マウスが外れたら open クラスを削除
    li.addEventListener('mouseleave', () => {
      li.classList.remove('open');
      if (link) link.setAttribute('aria-expanded', 'false');
    });
  });
});