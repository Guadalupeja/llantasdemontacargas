import './bootstrap';
// resources/js/app.js
import '@fortawesome/fontawesome-free/css/all.min.css'

  // Toggle acordeón
  (function () {
    const btn = document.getElementById('toc-button');
    const panel = document.getElementById('toc-panel');
    const caret = btn.querySelector('[aria-hidden="true"]');

    function toggle() {
      const open = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', String(!open));
      panel.hidden = open;
      if (caret) caret.textContent = open ? '▸' : '▾';
    }

    btn.addEventListener('click', toggle);
    btn.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggle(); }
    });
  })();

  // Resaltar enlace activo según scroll (opcional pero pro)
  (function () {
    const links = Array.from(document.querySelectorAll('nav[aria-label="Tabla de contenido"] a[href^="#"]'));
    const map = links
      .map(a => ({ a, id: decodeURIComponent(a.getAttribute('href').slice(1)) }))
      .filter(x => x.id && document.getElementById(x.id));

    if (!map.length || !('IntersectionObserver' in window)) return;

    const opts = { rootMargin: '0px 0px -70% 0px', threshold: 0 }; // activa al entrar 30% alto
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        const m = map.find(x => x.id === entry.target.id);
        if (!m) return;
        if (entry.isIntersecting) {
          links.forEach(l => l.classList.remove('text-[#ff6000]'));
          m.a.classList.add('text-[#ff6000]');
        }
      });
    }, opts);

    map.forEach(({ id }) => io.observe(document.getElementById(id)));
  })();

//js para palabras que cambian en vista inicio:
 (function () {
    const el = document.getElementById('word-rotator');
    if (!el) return;

    const words = ['Desempeño', 'Vida', 'Ciclos'];
    let i = 0;
    let timer = null;

    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function showNext() {
      // salida
      el.classList.add('opacity-0', 'translate-y-2', 'transition', 'duration-300', 'ease-out');
      // cambiar texto después de la salida
      setTimeout(() => {
        i = (i + 1) % words.length;
        el.textContent = words[i];
        // entrada
        el.classList.remove('translate-y-2');
        el.classList.add('-translate-y-2');
        // forzar reflow para que la transición de entrada se aplique
        // eslint-disable-next-line no-unused-expressions
        el.offsetHeight;
        el.classList.remove('opacity-0');
        el.classList.remove('-translate-y-2');
      }, 300);
    }

    function start() {
      if (prefersReduced) return; // sin animaciones para usuarios con R.M.
      if (timer) return;
      timer = setInterval(showNext, 2200); // cada 2.2s
    }

    function stop() {
      if (!timer) return;
      clearInterval(timer);
      timer = null;
    }

    // Arranca solo cuando el bloque sea visible
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => (e.isIntersecting ? start() : stop()));
      },
      { threshold: 0.2 }
    );
    io.observe(el);
  })();

//CARRUSEL IMAGENES Y PREGUNTAS////////////////////
// CARRUSEL IMÁGENES Y PREGUNTAS (robusto a tab-hide/resize/font-load)
(function () {
  'use strict';
  const CONFIG = { autoplay: true, autoplayDelay: 4000, pauseOnHover: true, loop: true, announce: true };

  document.querySelectorAll('[data-carousel]').forEach(initCarousel);

  function initCarousel(root) {
    const track   = root.querySelector('.js-track');
    const prevBtn = root.querySelector('.js-prev');
    const nextBtn = root.querySelector('.js-next');
    const dotsBox = root.querySelector('.js-dots');
    const live    = root.querySelector('.js-live');

    let realSlides = Array.from(root.querySelectorAll('.js-slide'));
    if (!track || realSlides.length === 0) return;

    // clones para loop infinito
    const firstClone = realSlides[0].cloneNode(true);
    const lastClone  = realSlides[realSlides.length - 1].cloneNode(true);
    firstClone.classList.add('is-clone');
    lastClone.classList.add('is-clone');
    track.prepend(lastClone);
    track.append(firstClone);

    let slides = Array.from(track.querySelectorAll('.js-slide'));
    let index = 1;             // primer REAL
    let slideW = 0;
    let autoplayId = null;

    // ---------- utilidades ----------
    const raf = (fn) => requestAnimationFrame(fn);
    const safeNumber = (n, fallback) => (Number.isFinite(n) && n > 0 ? n : fallback);

    function measure() {
      // medimos ANCHO del slide visible (un real si es posible)
      const probe = slides[1] || slides[0];
      let w = 0;
      if (probe) {
        const r = probe.getBoundingClientRect();
        w = r.width;
      }
      // fallback si el slide está a 0 (pestaña oculta, fuentes no aplicadas, etc.)
      w = safeNumber(w, root.clientWidth || track.clientWidth || 1);
      slideW = w;
      update(false); // re-sincroniza sin animación
    }

    // Re-medimos cuando:
    // - cambia tamaño del track (ResizeObserver)
    // - el doc vuelve a ser visible (visibilitychange)
    // - la página “reaparece” desde BFCache (pageshow)
    const ro = new ResizeObserver(() => measure());
    ro.observe(root);
    ro.observe(track);

    document.addEventListener('visibilitychange', () => {
      if (!document.hidden) {
        // al volver: re-medir DOS veces por seguridad (fonts/layout)
        raf(() => { measure(); raf(() => measure()); startAutoplay(); });
      } else {
        stopAutoplay();
      }
    });
    window.addEventListener('pageshow', () => { raf(measure); startAutoplay(); });

    // si las imágenes de la primera slide cargan tarde, re-medir al completar
    root.querySelectorAll('img').forEach(img => {
      if (!img.complete) img.addEventListener('load', () => raf(measure), { once: true });
    });

    // bullets de reales
    if (dotsBox) {
      dotsBox.innerHTML = '';
      realSlides.forEach((_, i) => {
        const b = document.createElement('button');
        b.type = 'button';
        b.className = 'mx-[6px] inline-block h-[6px] w-[6px] rounded-full bg-black opacity-20 focus:outline-none';
        b.setAttribute('aria-label', `Ir a la diapositiva ${i + 1}`);
        b.addEventListener('click', () => goTo(i + 1, true));
        dotsBox.appendChild(b);
      });
    }

    function currentRealIndex() {
      const n = realSlides.length;
      if (index === 0) return n - 1;
      if (index === n + 1) return 0;
      return index - 1;
    }

    function goTo(i, user = false) {
      index = i; // con loop y clones el 'transitionend' corrige los bordes
      update(true);
      if (user && CONFIG.announce && live) {
        const n = realSlides.length;
        live.textContent = `Diapositiva ${currentRealIndex() + 1} de ${n}`;
      }
    }

    function update(animate = true) {
      // si por cualquier motivo slideW fuese 0, usa fallback para no “volarte” el track
      const w = safeNumber(slideW, root.clientWidth || 1);
      const x = -index * w;

      if (!animate) track.style.transition = 'none';
      raf(() => {
        track.style.transition ||= 'transform 500ms ease-out';
        track.style.transform = `translate3d(${x}px,0,0)`;
        if (!animate) { void track.offsetWidth; track.style.transition = 'transform 500ms ease-out'; }
      });

      // bullets activos
      if (dotsBox) {
        const real = currentRealIndex();
        dotsBox.querySelectorAll('button').forEach((d, i) => d.style.opacity = i === real ? '1' : '0.2');
      }
    }

    track.addEventListener('transitionend', () => {
      const last = slides.length - 1;
      if (slides[index]?.classList.contains('is-clone')) {
        index = (index === last) ? 1 : slides.length - 2; // salta al real correspondiente
        update(false);
      }
    });

    // Controles
    prevBtn?.addEventListener('click', () => goTo(index - 1, true));
    nextBtn?.addEventListener('click', () => goTo(index + 1, true));
    root.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft')  { e.preventDefault(); goTo(index - 1, true); }
      if (e.key === 'ArrowRight') { e.preventDefault(); goTo(index + 1, true); }
    });

    // Swipe básico
    let startX = 0, startY = 0, isSwiping = false;
    const threshold = 40;
    track.addEventListener('touchstart', (e) => { const t = e.touches[0]; startX = t.clientX; startY = t.clientY; isSwiping = false; }, { passive: true });
    track.addEventListener('touchmove', (e) => {
      const t = e.touches[0], dx = t.clientX - startX, dy = t.clientY - startY;
      if (!isSwiping && Math.abs(dx) > Math.abs(dy) && Math.abs(dx) > 10) { isSwiping = true; e.preventDefault(); }
    }, { passive: false });
    track.addEventListener('touchend', (e) => {
      if (!isSwiping) return;
      const dx = e.changedTouches[0].clientX - startX;
      if (dx >  threshold) goTo(index - 1, true);
      if (dx < -threshold) goTo(index + 1, true);
    });

    // Autoplay: al avanzar automáticamente NO marcar como “user” para no reiniciar timer
    function startAutoplay() {
      if (!CONFIG.autoplay) return;
      stopAutoplay();
      autoplayId = setInterval(() => goTo(index + 1, /*user*/ false), CONFIG.autoplayDelay);
    }
    function stopAutoplay() { if (autoplayId) { clearInterval(autoplayId); autoplayId = null; } }

    // Init
    measure();
    goTo(1, false);
    startAutoplay();
  }
})();


// Carrusel productos (inicio)
(function () {
  const root    = document.getElementById('carousel-products');
  if (!root) return;

  const track   = root.querySelector('[data-carousel-track]');
  const slides  = Array.from(track.children);
  const btnPrev = root.querySelector('[data-carousel-prev]');
  const btnNext = root.querySelector('[data-carousel-next]');
  const dotsBox = root.querySelector('[data-carousel-dots]');
  const status  = root.querySelector('[data-carousel-status]');

  // Config desde data-atributos
  const itemsMobile    = parseInt(root.dataset.itemsMobile  || '1', 10);
  const itemsDesktop   = parseInt(root.dataset.itemsDesktop || '2', 10);
  const loopEnabled    = (root.dataset.loop || 'false') === 'true';
  const autoplayMs     = parseInt(root.dataset.autoplay || '0', 10); // 0 = off
  const pauseOnHover   = (root.dataset.pauseOnHover || 'false') === 'true';
  const respectReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const mqlMd = window.matchMedia('(min-width: 768px)');

  let itemsPerView = mqlMd.matches ? itemsDesktop : itemsMobile;
  let page = 0;
  let pages = Math.max(1, Math.ceil(slides.length / itemsPerView));
  let autoplayTimer = null;
  let isPaused = false;

  function updatePages() {
    itemsPerView = mqlMd.matches ? itemsDesktop : itemsMobile;
    pages = Math.max(1, Math.ceil(slides.length / itemsPerView));
    if (page >= pages) page = pages - 1;
    buildDots();
    goTo(page, false);
    refreshAutoplay(true);
  }

  function goTo(newPage, animate = true) {
    if (!loopEnabled) {
      newPage = Math.max(0, Math.min(pages - 1, newPage));
    } else {
      if (newPage < 0) newPage = pages - 1;
      if (newPage >= pages) newPage = 0;
    }
    page = newPage;

    const percent = -(page * 100);
    if (!animate) track.style.transitionDuration = '0ms';
    track.style.transform = `translateX(${percent}%)`;
    if (!animate) {
      void track.offsetHeight;
      track.style.transitionDuration = '';
    }
    updateAria();
    highlightDots();
  }

  function next() { goTo(page + 1); }
  function prev() { goTo(page - 1); }

  function updateAria() {
    const start = page * itemsPerView;
    const end   = start + itemsPerView - 1;
    slides.forEach((sl, idx) => {
      const visible = idx >= start && idx <= end;
      sl.setAttribute('aria-hidden', (!visible).toString());
    });
    if (status) status.textContent = `Página ${page + 1} de ${pages}`;
  }

  function buildDots() {
    if (!dotsBox) return;
    dotsBox.innerHTML = '';
    for (let i = 0; i < pages; i++) {
      const b = document.createElement('button');
      b.type = 'button';
      b.setAttribute('aria-label', `Ir a la página ${i + 1}`);
      b.className = 'h-2 w-2 rounded-full bg-black/60 hover:bg-black focus:outline-none focus:ring-2 focus:ring-white/60';
      b.addEventListener('click', () => { goTo(i); refreshAutoplay(true); });
      dotsBox.appendChild(b);
    }
    highlightDots();
  }
  function highlightDots() {
    if (!dotsBox) return;
    const dots = dotsBox.querySelectorAll('button');
    dots.forEach((d, i) => {
      d.classList.toggle('bg-white', i === page);
      d.classList.toggle('bg-black/60', i !== page);
    });
  }

  function startAutoplay() {
    if (autoplayMs <= 0) return;
    if (respectReduced) return;
    if (pages <= 1) return;
    stopAutoplay();
    autoplayTimer = setInterval(() => { if (!isPaused) next(); }, autoplayMs);
  }
  function stopAutoplay() {
    if (autoplayTimer) { clearInterval(autoplayTimer); autoplayTimer = null; }
  }
  function refreshAutoplay(reset = false) {
    if (autoplayMs <= 0 || respectReduced) return;
    if (reset) stopAutoplay();
    startAutoplay();
  }

  // Pausas por hover/focus
  if (pauseOnHover && autoplayMs > 0) {
    root.addEventListener('mouseenter', () => { isPaused = true; });
    root.addEventListener('mouseleave', () => { isPaused = false; });
    root.addEventListener('focusin',  () => { isPaused = true; });
    root.addEventListener('focusout', () => { isPaused = false; });
  }
  document.addEventListener('visibilitychange', () => {
    if (document.hidden) stopAutoplay(); else refreshAutoplay(true);
  });

  btnNext && btnNext.addEventListener('click', () => { next(); refreshAutoplay(true); });
  btnPrev && btnPrev.addEventListener('click', () => { prev(); refreshAutoplay(true); });

  // Teclado
  root.tabIndex = 0;
  root.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') { next();  refreshAutoplay(true); }
    else if (e.key === 'ArrowLeft') { prev(); refreshAutoplay(true); }
  });

  // Swipe táctil
  let startX = null, deltaX = 0, swiping = false;
  const thresh = 40;
  root.addEventListener('touchstart', (e) => {
    if (!e.touches || !e.touches[0]) return;
    startX = e.touches[0].clientX; deltaX = 0; swiping = true;
    track.style.transitionDuration = '0ms';
    isPaused = true;
  }, { passive: true });

  root.addEventListener('touchmove', (e) => {
    if (!swiping || startX === null) return;
    deltaX = e.touches[0].clientX - startX;
    const viewport = root.clientWidth;
    const shiftPct = (deltaX / viewport) * 100;
    const basePct  = -(page * 100);
    track.style.transform = `translateX(${basePct + shiftPct}%)`;
  }, { passive: true });

  root.addEventListener('touchend', () => {
    track.style.transitionDuration = '';
    if (Math.abs(deltaX) > thresh) {
      if (deltaX < 0) next(); else prev();
    } else {
      goTo(page);
    }
    startX = null; deltaX = 0; swiping = false;
    isPaused = false;
    refreshAutoplay(true);
  });

  // Recalcular en cambios de breakpoint / resize / carga de fuentes
  mqlMd.addEventListener('change', updatePages);
  window.addEventListener('resize', () => goTo(page, false));
  window.addEventListener('load', updatePages);

  // Init
  updatePages();
  startAutoplay();
})();
