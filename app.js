// ── Scroll animation ──────────────────────────────────────────────────────────
function initScrollAnimation() {
  const els = document.querySelectorAll('.fade-in-up');
  if (!els.length) return;
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  els.forEach(el => obs.observe(el));
}

// ── Mobile menu ───────────────────────────────────────────────────────────────
function initMobileMenu() {
  const btn = document.getElementById('hamburger-btn');
  const drawer = document.getElementById('mobile-drawer');
  const iconOpen = document.getElementById('icon-open');
  const iconClose = document.getElementById('icon-close');
  if (!btn || !drawer) return;

  btn.addEventListener('click', () => {
    const isOpen = drawer.classList.toggle('open');
    iconOpen.style.display = isOpen ? 'none' : 'block';
    iconClose.style.display = isOpen ? 'block' : 'none';
  });

  // Close drawer on nav link click
  drawer.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      drawer.classList.remove('open');
      iconOpen.style.display = 'block';
      iconClose.style.display = 'none';
    });
  });
}

// ── Comparison page ───────────────────────────────────────────────────────────
function initComparison() {
  const container = document.getElementById('comparison-container');
  if (!container) return;

  const tabs = document.querySelectorAll('.criterion-tab');
  let currentCriterion = tabs[0] ? tabs[0].dataset.key : 'politics';

  function renderCards() {
    const crit = COMPARISON_CRITERIA.find(c => c.key === currentCriterion);

    container.innerHTML = OLYMPICS_LIST.map(o => {
      const d = OLYMPICS_DATA[o.id];
      return `
        <div style="display:flex;flex-direction:row;border-radius:12px;overflow:hidden;border:2px solid ${d.colorAccent}55;background:rgba(255,255,255,0.03);">
          <div style="width:160px;flex-shrink:0;position:relative;min-height:130px;">
            <img src="${(d.heroSrcs || [])[0] || ''}" alt="${d.city}"
                 style="width:100%;height:100%;object-fit:cover;display:block;filter:sepia(50%) brightness(0.55);min-height:130px;">
            <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 30%,rgba(10,15,30,0.6) 100%);"></div>
            <div style="position:absolute;left:0;top:0;bottom:0;width:4px;background:${d.colorAccent};"></div>
            <div style="position:absolute;bottom:0;left:0;right:0;padding:12px 14px;">
              <div class="font-serif font-black" style="font-size:1.4rem;line-height:1;color:${d.colorAccent};">${d.year}</div>
              <div class="font-serif font-bold" style="font-size:0.85rem;color:#fff;margin-top:4px;">${d.city}</div>
            </div>
          </div>
          <div style="padding:20px 24px;display:flex;flex-direction:column;justify-content:center;flex:1;">
            <p class="text-xs uppercase tracking-widest font-medium" style="color:#c9a227;letter-spacing:0.1em;margin-bottom:8px;">${crit ? crit.label : ''}</p>
            <p class="text-gray-300 leading-relaxed" style="font-size:0.95rem;">${d.comparisonData[currentCriterion] || ''}</p>
          </div>
        </div>
      `;
    }).join('');

  }

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      currentCriterion = tab.dataset.key;
      tabs.forEach(t => t.classList.toggle('active', t === tab));
      renderCards();
    });
  });

  renderCards();
}

// ── Boot ──────────────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
  initScrollAnimation();
  initMobileMenu();
  initComparison();
});
