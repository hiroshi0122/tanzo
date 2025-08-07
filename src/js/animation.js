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

// TOPのロゴのアニメーション ------------------------------//
// gsap.utils.toArray(".to-and-logo").forEach((target) => {
//   let tl = gsap.timeline({
//     scrollTrigger: {
//       trigger: target,
//       start: "top 20%", // ロゴが20%の位置に来たらスタート
//       end: "top -200px", // 上までスクロールしたらアニメ完了
//       scrub: true, // スクロールに完全同期
//       onLeave: () => target.classList.add("fixed-logo"), // 固定モードON
//       onEnterBack: () => target.classList.remove("fixed-logo") // 戻ったら解除
//     }
//   })
//     .fromTo(target, 
//       { scale: 1 },  // 初期状態
//       { scale: 0.2, ease: "expo.inOut" } // スクロールで縮小
//     );
// });


// FADE IN LEFT ------------------------------//
// var target = gsap.utils.toArray(".fadeInLeft");
// gsap.utils.toArray(".fadeInLeft").forEach((target) => {
//   gsap.timeline({
//     scrollTrigger: {
//       trigger: target,
//       start: "top 80%",
//       end: "bottom 80%",
//       toggleActions: "play none none none"
//     }
//   })
//     .from(target, {
//       x: -60, autoAlpha: 0, stagger: 0.5,
//     })
//     .to(target, {
//       x: 0, autoAlpha: 1, ease: "expo.inOut", duration: 1,
//     })
// });

// FADE IN RIGHT ------------------------------//
// var target = gsap.utils.toArray(".fadeInRight");
// gsap.utils.toArray(".fadeInRight").forEach((target) => {
//   gsap.timeline({
//     scrollTrigger: {
//       trigger: target,
//       start: "top 80%",
//       end: "bottom 80%",
//       toggleActions: "play none none none"
//     }
//   })
//     .from(target, {
//       x: 60, autoAlpha: 0, stagger: 0.5,
//     })
//     .to(target, {
//       x: 0, autoAlpha: 1, ease: "expo.inOut", duration: 1,
//     })
// });


// FADE IN UP STAGGER（順番に表示させる） ------------------------------//
//トリガーはfadeInUp-stagger
gsap.utils.toArray(".fadeInUp-stagger").forEach((target) => {
  const radiusBoxes = target.querySelectorAll('.works-content,.blog-contents');
  //まずはボックス自体を非表示にする
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
document.addEventListener("DOMContentLoaded", function () {
  let marqueeInner = document.querySelector(".scrolling-msg-inner");

  gsap.to(marqueeInner, {
    x: "-50%", // 50%ずらす
    duration: 40,
    ease: "linear",
    repeat: -1
  });
});


// LENISを使った慣性スクロール ------------------------------//
import Lenis from "@studio-freight/lenis";

const lenis = new Lenis({
  duration: 2,
  smooth: true,
  lerp: 0.2, // 慣性の強さ
});

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

