//**************************************************************
// Accordion
//**************************************************************

const panels = document.querySelectorAll('.acc-panel');

// 画像や中身の変化に追随したい場合、開いてる間だけ高さを追従
const ro = new ResizeObserver(entries => {
  for (const entry of entries) {
    const panel = entry.target;
    if (!panel.hasAttribute('hidden') && panel.dataset.animating !== '1') {
      // 開いていて、アニメ中でない → autoにしておくか、一瞬だけ高さを合わせ直す
      panel.style.height = 'auto';
    }
  }
});
panels.forEach(p => ro.observe(p));

function openPanel(panel, btn) {
  panel.removeAttribute('hidden');        // まず表示可能に
  panel.style.height = '0px';             // 起点を0pxに
  panel.dataset.animating = '1';
  requestAnimationFrame(() => {
    const target = panel.scrollHeight;    // 開くべき高さ
    panel.style.height = target + 'px';   // 0 → target にアニメ
    panel.addEventListener('transitionend', function te(e) {
      if (e.propertyName !== 'height') return;
      panel.removeEventListener('transitionend', te);
      panel.style.height = 'auto';        // 開き切ったらautoに戻す
      panel.dataset.animating = '0';
      if (window.lenis) window.lenis.resize(); // Lenisのリサイズ
    }, { once: true });
  });
  btn.setAttribute('aria-expanded', 'true');
}

function closePanel(panel, btn) {
  // autoだとアニメできないので、いったん現在の高さ(px)を固定
  const current = panel.scrollHeight;
  panel.style.height = current + 'px';
  panel.dataset.animating = '1';
  requestAnimationFrame(() => {
    panel.style.height = '0px';           // targetを0に
    panel.addEventListener('transitionend', function te(e) {
      if (e.propertyName !== 'height') return;
      panel.removeEventListener('transitionend', te);
      panel.setAttribute('hidden', '');   // 完全に閉じたら非表示
      panel.dataset.animating = '0';
      if (window.lenis) window.lenis.resize(); // Lenisのリサイズ
    }, { once: true });
  });
  btn.setAttribute('aria-expanded', 'false');
}

// クリックでトグル
document.querySelectorAll('.acc-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const panel = document.getElementById(btn.getAttribute('aria-controls'));
    if (panel.hasAttribute('hidden')) {
      openPanel(panel, btn);
    } else {
      closePanel(panel, btn);
    }
  });
});

// 画像読み込みで高さが変わるケースにも対応（開いてる時だけ）
document.querySelectorAll('.acc-panel img').forEach(img => {
  img.addEventListener('load', () => {
    const panel = img.closest('.acc-panel');
    if (panel && !panel.hasAttribute('hidden') && panel.dataset.animating !== '1') {
      panel.style.height = 'auto'; // 開いてるなら自動追従
    }
  });
});


// パネル内の画像ロードでも高さ更新
document.querySelectorAll('.acc-panel img').forEach(img => {
  img.addEventListener('load', () => {
    if (window.lenis) window.lenis.resize();
  });
});