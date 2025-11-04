document.addEventListener('DOMContentLoaded', () => {
  // Colors - Gradients
  let FIGMA_GRADIENTS = [
    ['#8ff78dff', '#0ACF83'],
    ['#C084FC', '#A259FF'],
    ['#f1b444ff', '#F24E1E'],
    ['#9ec8f9ff', '#1ABCFE'],
    ['#feada5ff', '#FF7262']
  ];

  let ORB_COUNT_DESKTOP = 7;
  let ORB_COUNT_MOBILE = 4;

  let orbsContainer = document.getElementById('orbs');
  if (!orbsContainer) return; 

  // Hilfsfunktionen
  function random(min, max) { return Math.random() * (max - min) + min; }

  function hexToRgba(hex, alpha = 1) {
    if (!hex || typeof hex !== 'string') return `rgba(255,255,255,${alpha})`;
    let h = hex.replace('#','').trim();

    if (h.length === 3) h = h.split('').map(c => c + c).join(''); // umschreiben, maps:  

    if (h.length !== 6) return `rgba(255,255,255,${alpha})`;
    let r = parseInt(h.substring(0,2), 16);
    let g = parseInt(h.substring(2,4), 16);
    let b = parseInt(h.substring(4,6), 16);
    return `rgba(${r}, ${g}, ${b}, ${alpha})`;
  }

  // Erzeugt eine einzelne Orb DOM-Element
  function createOrb(gradient) {
    let orb = document.createElement('div');
    orb.className = 'orb';

    // Werte
    let size = Math.round(random(120, 520));       // px
    let left = Math.round(random(-10, 90));        // %
    let top = Math.round(random(-20, 85));         // %

   // let blur = Math.round(random(18, 70));         // px
    let opacity = +(random(0.12, 0.95).toFixed(2));  // ?? fixed!! Anzahl der Werten bei der , stellen 
    let duration = Math.round(random(10, 28));     // s
    let tx = Math.round(random(-60, 60));          // px
    let ty = Math.round(random(-60, 60));          // px
    let tz = Math.round(random(-200, 200));        // px

    // Inline-Stile (robust)
    orb.style.width = `${size}px`;
    orb.style.height = `${size}px`;
    orb.style.left = `${left}%`;
    orb.style.top = `${top}%`;

    //orb.style.filter = `blur(${blur}px)`;
    orb.style.opacity = String(opacity);
    orb.style.pointerEvents = 'none';
    orb.style.position = 'absolute';
    orb.style.transformStyle = 'preserve-3d';

    // Animation & Delay
    let delay = `${(random(0, duration)).toFixed(2)}s`;
    orb.style.animation = `float ${duration}s ease-in-out infinite`;
    orb.style.animationDelay = delay;

    // CSS-Variablen für Keyframes (falls benutzt)
    orb.style.setProperty('--tx', `${tx}px`);
    orb.style.setProperty('--ty', `${ty}px`);
    orb.style.setProperty('--tz', `${tz}px`);

    // Gradient aus dem Pair
    let c1 = hexToRgba(gradient[0], 0.92);
    let c2 = hexToRgba(gradient[1], 0.18);
    orb.style.background = `radial-gradient(circle at 30% 30%, ${c1} 0%, ${c2} 55%, rgba(255,255,255,0) 100%)`;
    orb.style.mixBlendMode = 'screen';

    return orb;
  }

  // Baut Orbs (responsive)
  function buildOrbs() {
    orbsContainer.innerHTML = '';
    let isMobile = window.innerWidth <= 640;
    let count = isMobile ? ORB_COUNT_MOBILE : ORB_COUNT_DESKTOP;

    for (let i = 0; i < count; i++) {
      let grad = FIGMA_GRADIENTS[i % FIGMA_GRADIENTS.length];
      let orb = createOrb(grad);
      orbsContainer.appendChild(orb);
    }

    // prefers-reduced-motion respektieren
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      orbsContainer.querySelectorAll('.orb').forEach(o => {
        o.style.animation = 'none';
        o.style.transition = 'none';
      });
    }
  }

  // initial + resize (debounced)
  buildOrbs();
  let resizeTimer = null;
  window.addEventListener('resize', () => {
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout(buildOrbs, 220);
  });
});