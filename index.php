<?php $base = ''; ?>
<?php include 'includes/header.php'; ?>

  <main class="hero-bg crt-flicker relative overflow-hidden">

    <div class="crt-overlay"></div>

    <div class="hero-bg-image"></div>

    <div class="vignette"></div>

    <div class="hero-content mx-auto max-w-[1200px] px-6 pt-16 pb-20 sm:pt-24 sm:pb-32">

      <div class="fade-in mb-4 text-center">
        <h1
          class="glitch font-pixel text-xl leading-relaxed tracking-wider text-white drop-shadow-[0_0_12px_rgba(255,0,51,0.3)] sm:text-3xl lg:text-5xl"
          data-text="THE VOID THRESHOLD">
          THE VOID THRESHOLD
        </h1>
      </div>

      <p class="fade-in fade-in-delay mb-12 text-center font-retro text-xl tracking-wide text-white/60 sm:text-3xl">
        Más allá de la realidad. Enfrenta al vacío.
      </p>

      <div id="features" class="fade-in fade-in-delay-2 mx-auto mb-6 grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-3">

      </div>

      <div id="download" class="fade-in fade-in-delay-3 text-center">
        <a href="javascript:void(0)" target="_blank" rel="noopener noreferrer"
          class="neon-btn mb-4 inline-block rounded bg-[#ff0033] px-8 py-3 font-pixel text-[10px] text-white transition-all hover:bg-[#ff1a4d] sm:text-xs">
          DESCARGAR DEMO
        </a>
        <p class="font-retro text-sm text-white/30">Demo gratuita &middot; Windows &middot; Próximamente 2026</p>
      </div>

    </div>
  </main>

  <section id="gallery-entrance" class="gallery-entrance">
    <div class="gallery-grid"></div>
    <div class="gallery-entrance-text">
      <h2 class="gallery-title section-glitch font-pixel text-2xl sm:text-4xl tracking-[0.5em] text-white" data-text="GALERÍA">GALERÍA</h2>
      <div class="scroll-indicator mt-4 flex flex-col items-center gap-4 mb-4">
        <div class="chevron-down"></div>
      </div>
      <p class="font-retro text-sm sm:text-base text-white/50 tracking-[0.2em]">IMÁGENES DEL MUNDO</p>
    </div>
  </section>

  <section id="carousel" class="carousel-section">
    <div class="carousel-scene" id="carousel-scene">

      <canvas id="starfield-canvas" class="starfield-canvas"></canvas>
      <div class="carousel-stage" id="carousel-stage">
        <div class="carousel-card" data-index="0"><img src="uploads/galeria/foto_0.jpg" alt="Foto 01"></div>
        <div class="carousel-card" data-index="1"><img src="uploads/galeria/foto_1.jpg" alt="Foto 02"></div>
        <div class="carousel-card" data-index="2"><img src="uploads/galeria/foto_2.jpg" alt="Foto 03"></div>
        <div class="carousel-card" data-index="3"><img src="uploads/galeria/foto_3.jpg" alt="Foto 04"></div>
        <div class="carousel-card" data-index="4"><img src="uploads/galeria/foto_4.jpg" alt="Foto 05"></div>
        <div class="carousel-card" data-index="5"><img src="uploads/galeria/foto_5.jpg" alt="Foto 06"></div>
        <div class="carousel-card" data-index="6"><img src="uploads/galeria/foto_6.jpg" alt="Foto 07"></div>
        <div class="carousel-card" data-index="7"><img src="uploads/galeria/foto_7.jpg" alt="Foto 08"></div>
        <div class="carousel-card" data-index="8"><img src="uploads/galeria/foto_8.jpg" alt="Foto 09"></div>
        <div class="carousel-card" data-index="9"><img src="uploads/galeria/foto_9.jpg" alt="Foto 10"></div>
      </div>
    </div>
  </section>

  <div id="carousel-progress" class="carousel-progress"></div>

  <div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-label="Galería">
    <div class="lightbox-backdrop" id="lightbox-backdrop"></div>
    <button type="button" class="lightbox-close" id="lightbox-close" aria-label="Cerrar">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
        <path d="M18 6L6 18M6 6l12 12"/>
      </svg>
    </button>
    <button type="button" class="lightbox-nav lightbox-prev" id="lightbox-prev" aria-label="Anterior">
      <svg class="lb-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"/>
      </svg>
      <span class="lb-label font-retro">← ANTERIOR</span>
    </button>
    <button type="button" class="lightbox-nav lightbox-next" id="lightbox-next" aria-label="Siguiente">
      <span class="lb-label font-retro">SIGUIENTE →</span>
      <svg class="lb-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="9 18 15 12 9 6"/>
      </svg>
    </button>
    <div class="lightbox-content">
      <div id="lightbox-img-wrapper" class="lightbox-img-wrapper">
        <div class="lightbox-spinner" id="lightbox-spinner"></div>
        <img id="lightbox-img-a" class="lb-slide active" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="">
        <img id="lightbox-img-b" class="lb-slide" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="">
      </div>
      <div id="lightbox-desc" class="lightbox-desc font-retro"></div>
      <div class="lightbox-info">
        <div class="lightbox-counter font-pixel" id="lightbox-counter"></div>
      </div>
    </div>
  </div>

  <div id="feature-modal" class="feature-modal" role="dialog" aria-modal="true" aria-label="Detalle de característica">
    <div class="feature-modal-backdrop" id="feature-modal-backdrop"></div>
    <div class="feature-modal-content">
      <button type="button" class="feature-modal-close" id="feature-modal-close" aria-label="Cerrar">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6L6 18M6 6l12 12"/>
        </svg>
      </button>
      <div class="feature-modal-inner">
        <div class="feature-modal-text">
          <span class="feature-modal-number" id="feature-modal-number">01</span>
          <h3 class="feature-modal-title" id="feature-modal-title"></h3>
          <p class="feature-modal-desc" id="feature-modal-desc"></p>
        </div>
        <div class="feature-modal-image" id="feature-modal-image-wrapper">
          <img id="feature-modal-img" src="" alt="">
        </div>
      </div>
    </div>
  </div>

  <section id="news" class="gallery-entrance relative min-h-screen py-24 flex flex-col items-center justify-center overflow-x-hidden">
    <div class="gallery-grid"></div>
    <div class="gallery-entrance-text max-w-[1100px] px-6 relative z-10 text-center w-full">
      <h2 class="gallery-title section-glitch section-glitch-slow font-pixel text-2xl sm:text-4xl tracking-[0.3em] text-white mb-6" data-text="NOVEDADES" style="animation-delay: 5s, 0s;">NOVEDADES</h2>
      <div class="scroll-indicator mt-4 flex flex-col items-center gap-4 mb-4">
        <div class="chevron-down"></div>
      </div>
      <p class="font-retro text-base sm:text-xl text-white/60 tracking-[0.2em] mb-12">ACTUALIZACIONES RECIENTES</p>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-left">

      </div>

      <div id="news-more-container" class="mt-12 text-center hidden">
        <a href="pages/novedades.php" class="inline-block font-pixel text-xs text-white/50 hover:text-white transition-colors duration-300 news-glow-link">
          VER HISTORIAL COMPLETO →
        </a>
      </div>
    </div>
  </section>

  <section id="figura">
    <div id="particle-container"></div>
    <div class="figura-overlay">
      <h1 class="glitch font-pixel text-xl sm:text-3xl tracking-wider drop-shadow-[0_0_12px_rgba(255,0,51,0.3)]" data-text="THE VOID THRESHOLD">THE VOID THRESHOLD</h1>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>

  <script>
    gsap.registerPlugin(ScrollTrigger);

    (function () {
      const entrance = document.getElementById('gallery-entrance');
      const text = document.querySelector('.gallery-entrance-text');
      const grid = document.querySelector('.gallery-grid');
      const heroContent = document.querySelector('.hero-content');
      const heroBg = document.querySelector('.hero-bg');

      if (heroBg && heroContent) {
        gsap.to(heroContent, {
          opacity: 0,
          y: -120,
          scale: 0.9,
          scrollTrigger: {
            trigger: heroBg,
            start: 'top top',
            end: '80% top',
            scrub: 1.2,
          }
        });
      }

      if (entrance && text) {
        gsap.fromTo(text,
          { opacity: 0, y: 40, scale: 0.9 },
          {
            opacity: 1, y: 0, scale: 1,
            scrollTrigger: {
              trigger: entrance,
              start: 'top bottom',
              end: 'top center',
              scrub: 1.2,
            }
          }
        );

        if (grid) {
          gsap.to(grid, {
            opacity: 0,
            scrollTrigger: {
              trigger: entrance,
              start: '30% top',
              end: '80% top',
              scrub: true,
            }
          });
        }
      }

      const newsSection = document.getElementById('news');
      const newsText = newsSection && newsSection.querySelector('.gallery-entrance-text');
      if (newsText) {
        gsap.fromTo(newsText,
          { opacity: 0, y: 40, scale: 0.9 },
          {
            opacity: 1, y: 0, scale: 1,
            scrollTrigger: {
              trigger: newsSection,
              start: 'top bottom',
              end: 'top center',
              scrub: 1.2,
            }
          }
        );
      }

      const figuraSection = document.getElementById('figura');
      const figuraText = figuraSection && figuraSection.querySelector('.glitch');
      if (figuraText) {
        gsap.fromTo(figuraText,
          { opacity: 0, y: 40, scale: 0.9 },
          {
            opacity: 1, y: 0, scale: 1,
            scrollTrigger: {
              trigger: figuraSection,
              start: 'top bottom',
              end: 'top center',
              scrub: 1.2,
            }
          }
        );
      }
    })();

    (function () {
      const section = document.getElementById('carousel');
      const scene = document.getElementById('carousel-scene');
      const stage = document.getElementById('carousel-stage');
      const cards = gsap.utils.toArray('#carousel-stage .carousel-card');
      const progressBar = document.getElementById('carousel-progress');
      const N = cards.length;

      if (!section || !scene || N === 0) return;

      const targets = [
        { x: -740, y: -80, z: -300, rY: -55, rZ: -22, s: 0.70 },
        { x: -560, y: 140, z: -180, rY: -38, rZ: 16, s: 0.80 },
        { x: -360, y: -160, z: -50, rY: -22, rZ: -20, s: 0.88 },
        { x: -190, y: 120, z: 50, rY: -10, rZ: 11, s: 0.94 },
        { x: 0, y: -30, z: 240, rY: 0, rZ: -4, s: 1.05 },
        { x: 190, y: 120, z: 50, rY: 10, rZ: 11, s: 0.94 },
        { x: 360, y: -160, z: -50, rY: 22, rZ: -20, s: 0.88 },
        { x: 560, y: 140, z: -180, rY: 38, rZ: 16, s: 0.80 },
        { x: 740, y: -80, z: -300, rY: 55, rZ: -22, s: 0.70 },
        { x: 880, y: 80, z: -400, rY: 68, rZ: 28, s: 0.65 },
      ];

      gsap.set(cards, {
        x: 0, y: 0, z: 0,
        rotateY: 0, rotateZ: 0, rotateX: 0,
        scale: (i) => i === 0 ? 1 : 0.85,
        opacity: (i) => i === 0 ? 1 : 0,
        transformOrigin: '50% 50%',
        zIndex: (i) => N - i,
      });

      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: section,
          start: 'top top',
          end: 'bottom bottom',
          scrub: 1,
          onUpdate: (self) => {
            if (progressBar) progressBar.style.transform = 'scaleX(' + self.progress + ')';
          }
        }
      });

      cards.forEach((card, i) => {
        const t = targets[i] || targets[N - 1];
        tl.fromTo(card,
          { x: 0, y: 0, z: 0, rotateY: 0, rotateZ: 0, scale: i === 0 ? 1 : 0.85, opacity: i === 0 ? 1 : 0 },
          {
            x: t.x, y: t.y, z: t.z, rotateY: t.rY, rotateZ: t.rZ, scale: t.s,
            opacity: 1,
            ease: 'power2.inOut'
          },
          0
        );
      });

    })();

    (function () {
      const canvas = document.getElementById('starfield-canvas');
      if (!canvas) return;
      const ctx = canvas.getContext('2d');
      let W, H, particles, comets;
      const STAR_COUNT = 240;
      const MAX_COMETS = 7;

      function resize() {
        W = canvas.width = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
      }

      function rand(a, b) { return a + Math.random() * (b - a); }

      function createStar() {
        const size = rand(0.4, 3.0);
        return {
          x: rand(0, W), y: rand(0, H), size,
          opacity: rand(0.15, size > 1.8 ? 0.95 : 0.6),
          twinkleSpeed: rand(0.006, 0.022),
          twinklePhase: rand(0, Math.PI * 2),
          baseVx: rand(-0.25, 0.25),
          baseVy: rand(-0.2, 0.2),
          floatFreq: rand(0.005, 0.02),
          floatAmp: rand(0.1, 0.3),
          glow: size > 1.6,
        };
      }

      function createComet(immediate) {
        const dir = Math.random() > 0.5 ? 1 : -1;
        const speed = rand(7, 15);
        const angleDeg = rand(20, 55);
        const angle = angleDeg * (Math.PI / 180);
        const tailLen = rand(130, 300);

        let startX, startY;
        if (dir === 1) {
          const fromTop = Math.random() > 0.4;
          startX = fromTop ? rand(-100, W * 0.7) : rand(-200, -80);
          startY = fromTop ? rand(-200, -60) : rand(0, H * 0.5);
        } else {
          const fromTop = Math.random() > 0.4;
          startX = fromTop ? rand(W * 0.3, W + 100) : rand(W + 80, W + 200);
          startY = fromTop ? rand(-200, -60) : rand(0, H * 0.5);
        }

        return {
          x: startX,
          y: startY,
          vx: dir * Math.cos(angle) * speed,
          vy: Math.sin(angle) * speed,
          tailLen,
          headR: rand(1.6, 3.5),
          hue: `${Math.floor(rand(220, 255))}, ${Math.floor(rand(5, 45))}, ${Math.floor(rand(5, 30))}`,
          delay: immediate ? Math.floor(rand(0, 80)) : Math.floor(rand(20, 180)),
          active: immediate && Math.random() > 0.3,
        };
      }

      function initComets() {
        comets = [];
        for (let i = 0; i < MAX_COMETS; i++) {
          comets.push(createComet(i < 3));
        }
      }

      function drawComet(c) {
        if (!c.active) return;

        const tailX = c.x - c.vx * (c.tailLen / Math.hypot(c.vx, c.vy));
        const tailY = c.y - c.vy * (c.tailLen / Math.hypot(c.vx, c.vy));

        const grad = ctx.createLinearGradient(c.x, c.y, tailX, tailY);
        grad.addColorStop(0,   `rgba(255, 255, 240, 1)`);
        grad.addColorStop(0.06, `rgba(255, 120, 80, 0.95)`);
        grad.addColorStop(0.18, `rgba(${c.hue}, 0.85)`);
        grad.addColorStop(0.5,  `rgba(${c.hue}, 0.35)`);
        grad.addColorStop(1,    `rgba(${c.hue}, 0)`);

        ctx.save();
        ctx.strokeStyle = grad;
        ctx.lineWidth = c.headR * 1.6;
        ctx.lineCap = 'round';
        ctx.beginPath();
        ctx.moveTo(c.x, c.y);
        ctx.lineTo(tailX, tailY);
        ctx.stroke();

        const grd = ctx.createRadialGradient(c.x, c.y, 0, c.x, c.y, c.headR * 5);
        grd.addColorStop(0,   'rgba(255, 255, 255, 1)');
        grd.addColorStop(0.2, `rgba(255, 100, 60, 0.9)`);
        grd.addColorStop(0.6, `rgba(${c.hue}, 0.4)`);
        grd.addColorStop(1,   `rgba(${c.hue}, 0)`);
        ctx.beginPath();
        ctx.arc(c.x, c.y, c.headR * 5, 0, Math.PI * 2);
        ctx.fillStyle = grd;
        ctx.fill();

        ctx.beginPath();
        ctx.arc(c.x, c.y, c.headR, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(255, 255, 255, 1)';
        ctx.fill();

        ctx.restore();
      }

      function updateComet(c, i) {
        if (!c.active) {
          c.delay--;
          if (c.delay <= 0) c.active = true;
          return;
        }
        c.x += c.vx;
        c.y += c.vy;

        if (c.x > W + 350 || c.x < -350 || c.y > H + 350) {
          comets[i] = createComet(false);
        }
      }

      function init() {
        resize();
        particles = Array.from({ length: STAR_COUNT }, createStar);
        initComets();
      }

      let frame = 0;
      let canvasVisible = true;
      let rafId = null;
      function draw() {
        if (!canvasVisible) { rafId = null; return; }
        ctx.clearRect(0, 0, W, H);
        frame++;

        for (let p of particles) {
          const twinkle = Math.sin(frame * p.twinkleSpeed + p.twinklePhase);
          const alpha = Math.max(0.05, p.opacity + twinkle * (p.opacity * 0.5));

          if (p.glow) {
            const grd = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.size * 4);
            grd.addColorStop(0,   `rgba(255, 20, 40, ${alpha})`);
            grd.addColorStop(0.4, `rgba(200, 0, 20, ${alpha * 0.4})`);
            grd.addColorStop(1,   'rgba(120, 0, 10, 0)');
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.size * 4, 0, Math.PI * 2);
            ctx.fillStyle = grd;
            ctx.fill();
          }

          ctx.beginPath();
          ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
          const r = Math.floor(rand(200, 255));
          ctx.fillStyle = `rgba(${r}, ${Math.floor(r * 0.04)}, ${Math.floor(r * 0.08)}, ${alpha})`;
          ctx.fill();

          p.x += p.baseVx + Math.cos(frame * p.floatFreq + p.twinklePhase) * p.floatAmp;
          p.y += p.baseVy + Math.sin(frame * p.floatFreq + p.twinklePhase) * p.floatAmp;

          if (p.x < -10) p.x = W + 10;
          if (p.x > W + 10) p.x = -10;
          if (p.y < -10) p.y = H + 10;
          if (p.y > H + 10) p.y = -10;
        }

        comets.forEach((c, i) => {
          updateComet(c, i);
          drawComet(c);
        });

        rafId = requestAnimationFrame(draw);
      }

      const canvasObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          canvasVisible = entry.isIntersecting;
          if (canvasVisible && !rafId) draw();
        });
      }, { threshold: 0.1 });

      let resizeTimer;
      window.addEventListener('resize', () => { clearTimeout(resizeTimer); resizeTimer = setTimeout(resize, 200); });
      init();
      const carouselSection = document.getElementById('carousel');
      if (carouselSection) canvasObserver.observe(carouselSection);
      draw();
    })();

    (function () {
      const cards = Array.from(document.querySelectorAll('#carousel-stage .carousel-card'));
      const lightbox = document.getElementById('lightbox');
      const imgA = document.getElementById('lightbox-img-a');
      const imgB = document.getElementById('lightbox-img-b');
      const lightboxCounter = document.getElementById('lightbox-counter');
      const lightboxDesc = document.getElementById('lightbox-desc');
      const lightboxSpinner = document.getElementById('lightbox-spinner');
      const closeBtn = document.getElementById('lightbox-close');
      const prevBtn = document.getElementById('lightbox-prev');
      const nextBtn = document.getElementById('lightbox-next');
      const backdrop = document.getElementById('lightbox-backdrop');

      let activeImg = imgA;
      let hiddenImg = imgB;
      let sources = [];
      let current = 0;
      let isAnimating = false;
      let spinnerTimer = null;

      window.updateLightboxSources = function() {
        const latestCards = Array.from(document.querySelectorAll('#carousel-stage .carousel-card'));
        sources = latestCards.map(c => {
          const imgEl = c.querySelector('img');
          const src = imgEl ? imgEl.src : '';
          if (src) {
            const pre = new Image();
            pre.src = src;
          }
          return {
            src: src,
            alt: imgEl ? imgEl.alt : '',
            desc: imgEl ? (imgEl.getAttribute('data-desc') || '') : ''
          };
        });
      };

      window.updateLightboxSources();

      function showSpinner(show) {
        if (spinnerTimer) {
          clearTimeout(spinnerTimer);
          spinnerTimer = null;
        }
        if (show) {
          spinnerTimer = setTimeout(() => {
            if (lightboxSpinner) lightboxSpinner.classList.add('visible');
          }, 120);
        } else {
          if (lightboxSpinner) lightboxSpinner.classList.remove('visible');
        }
      }

      function updateInfo(idx) {
        if (lightboxCounter) {
          lightboxCounter.textContent = String(idx + 1).padStart(2, '0') + ' / ' + String(sources.length).padStart(2, '0');
        }
        if (lightboxDesc) {
          lightboxDesc.textContent = sources[idx]?.desc || '';
        }
      }

      const DUR = 360;
      const EASE = 'cubic-bezier(0.22, 1, 0.36, 1)';

      function setImgStyle(img, tx, opacity, animated) {
        img.style.transition = animated
          ? `transform ${DUR}ms ${EASE}, opacity ${DUR * 0.85}ms ease`
          : 'none';
        img.style.transform = `translate(calc(-50% + ${tx}), -50%)`;
        img.style.opacity = String(opacity);
      }

      function resetImgToCenter(img, visible) {
        img.style.transition = 'none';
        img.style.transform = 'translate(-50%, -50%)';
        img.style.opacity = visible ? '1' : '0';
      }

      function openLightbox(index) {
        window.updateLightboxSources();
        current = ((index % sources.length) + sources.length) % sources.length;

        activeImg.src = sources[current].src;
        activeImg.alt = sources[current].alt;
        activeImg.className = 'lb-slide active';
        activeImg.style.transition = 'none';

        hiddenImg.src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';
        hiddenImg.className = 'lb-slide';
        resetImgToCenter(hiddenImg, false);

        updateInfo(current);

        resetImgToCenter(activeImg, true);
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
      }

      function closeLightbox() {
        showSpinner(false);
        gsap.killTweensOf(activeImg);
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
        setTimeout(() => {
          activeImg.src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';
          hiddenImg.src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';
          activeImg.className = 'lb-slide active';
          hiddenImg.className = 'lb-slide';
          resetImgToCenter(activeImg, true);
          resetImgToCenter(hiddenImg, false);
        }, 350);
      }

      function navigateTo(newIdx, direction) {
        if (isAnimating) return;
        newIdx = ((newIdx % sources.length) + sources.length) % sources.length;
        if (newIdx === current) return;
        isAnimating = true;

        current = newIdx;
        const targetSrc = sources[current].src;
        const targetAlt = sources[current].alt;
        const isNext = direction === 'next';
        const offScreen = isNext ? '100vw' : '-100vw';
        const outDir   = isNext ? '-100vw' : '100vw';

        const checkImg = new Image();
        checkImg.src = targetSrc;
        const isLoaded = checkImg.complete && checkImg.naturalWidth > 0;
        if (!isLoaded) showSpinner(true);

        const executeSlide = () => {
          showSpinner(false);

          hiddenImg.src = targetSrc;
          hiddenImg.alt = targetAlt;
          hiddenImg.className = 'lb-slide';
          setImgStyle(hiddenImg, offScreen, 0, false);

          requestAnimationFrame(() => {
            requestAnimationFrame(() => {
              setImgStyle(activeImg, outDir, 0, true);
              setImgStyle(hiddenImg, '0px', 1, true);

              hiddenImg.className = 'lb-slide active';

              const temp = activeImg;
              activeImg = hiddenImg;
              hiddenImg = temp;

              updateInfo(current);

              setTimeout(() => {
                hiddenImg.style.transition = 'none';
                hiddenImg.style.opacity = '0';
                isAnimating = false;
              }, DUR + 20);
            });
          });
        };

        if (isLoaded) {
          executeSlide();
        } else {
          checkImg.onload = executeSlide;
          checkImg.onerror = executeSlide;
        }
      }

      function showNext() { navigateTo(current + 1, 'next'); }
      function showPrev() { navigateTo(current - 1, 'prev'); }

      cards.forEach((card, i) => {
        card.addEventListener('click', () => openLightbox(i));
      });

      closeBtn.addEventListener('click', closeLightbox);
      backdrop.addEventListener('click', closeLightbox);
      nextBtn.addEventListener('click', showNext);
      prevBtn.addEventListener('click', showPrev);

      document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'ArrowRight') showNext();
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'Escape') closeLightbox();
      });

      let touchStartX = 0;
      let touchStartY = 0;
      lightbox.addEventListener('touchstart', e => {
        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
      }, { passive: true });
      lightbox.addEventListener('touchend', e => {
        const dx = touchStartX - e.changedTouches[0].clientX;
        const dy = Math.abs(touchStartY - e.changedTouches[0].clientY);
        if (Math.abs(dx) > 50 && dy < 80) dx > 0 ? showNext() : showPrev();
      });
    })();

    (function () {
      const modal = document.getElementById('feature-modal');
      const backdrop = document.getElementById('feature-modal-backdrop');
      const closeBtn = document.getElementById('feature-modal-close');
      const numberEl = document.getElementById('feature-modal-number');
      const titleEl = document.getElementById('feature-modal-title');
      const descEl = document.getElementById('feature-modal-desc');
      const imgEl = document.getElementById('feature-modal-img');
      const imgWrapper = document.getElementById('feature-modal-image-wrapper');

      function openFeatureModal(feat) {
        if (!modal) return;
        numberEl.textContent = feat.numero || '01';
        numberEl.style.color = feat.color || '#ff0033';
        titleEl.textContent = feat.titulo || '';
        titleEl.style.color = feat.color || '#ff0033';
        descEl.textContent = feat.descripcion || '';
        if (feat.imagen) {
          const src = feat.imagen.startsWith('http') ? feat.imagen : feat.imagen + '?v=' + Date.now();
          imgEl.src = src;
          imgEl.alt = feat.titulo || '';
          imgWrapper.style.display = 'block';
        } else {
          imgEl.src = '';
          imgWrapper.style.display = 'none';
        }
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
      }

      function closeFeatureModal() {
        if (!modal) return;
        modal.classList.remove('active');
        document.body.style.overflow = '';
      }

      window.openFeatureModal = openFeatureModal;

      if (closeBtn) closeBtn.addEventListener('click', closeFeatureModal);
      if (backdrop) backdrop.addEventListener('click', closeFeatureModal);
      document.addEventListener('keydown', (e) => {
        if (modal && modal.classList.contains('active') && e.key === 'Escape') closeFeatureModal();
      });
    })();

    (function () {
      function applyConfig(cfg) {
        if (!cfg) return;

          if (cfg.general) {
            if (cfg.general.titulo) {
              document.querySelectorAll('.glitch').forEach(el => {
                el.textContent = cfg.general.titulo;
                el.setAttribute('data-text', cfg.general.titulo);
              });
              document.title = cfg.general.titulo;
            }
            if (cfg.general.subtitulo) {
              const subEl = document.querySelector('main p.font-retro');
              if (subEl) subEl.textContent = cfg.general.subtitulo;
            }
            if (cfg.general.boton_descarga_texto) {
              document.querySelectorAll('.neon-btn').forEach(btn => {
                if (btn.tagName === 'A' && (btn.innerText.includes('DESCARGAR') || btn.innerText.includes('JUGAR'))) {
                  btn.textContent = cfg.general.boton_descarga_texto;
                }
              });
            }
            if (cfg.general.subtexto_descarga) {
              const subDesc = document.querySelector('#download p.font-retro');
              if (subDesc) subDesc.textContent = cfg.general.subtexto_descarga;
            }
            if (cfg.general.enlace_descarga) {
              document.querySelectorAll('a[href="#download"], a.neon-btn').forEach(a => {
                a.href = cfg.general.enlace_descarga;
                if (cfg.general.enlace_descarga !== 'javascript:void(0)' && cfg.general.enlace_descarga !== '#') {
                  a.target = '_blank';
                  a.rel = 'noopener noreferrer';
                }
              });
            }
          }

          if (cfg.caracteristicas && Array.isArray(cfg.caracteristicas)) {
            const featuresGrid = document.getElementById('features');
            if (featuresGrid) {
              featuresGrid.innerHTML = '';
              cfg.caracteristicas.forEach((feat, idx) => {
                const card = document.createElement('div');
                card.className = 'pixel-border rounded-sm bg-[#18181B]/80 p-6 backdrop-blur-sm transition-all hover:bg-[#1e1e22]/90 feat-clickable';
                card.setAttribute('data-feat-index', idx);
                card.style.cursor = 'pointer';
                card.innerHTML = `
                  <div class="mb-3 font-pixel text-[10px]" style="color: ${feat.color || '#ff0033'}">${feat.numero || String(idx + 1).padStart(2, '0')}</div>
                  <h3 class="mb-2 font-pixel text-[10px] text-white">${feat.titulo || ''}</h3>
                  <p class="font-retro text-base leading-relaxed text-white/50">${(feat.descripcion || '').substring(0, 80)}${(feat.descripcion || '').length > 80 ? '...' : ''}</p>
                `;
                featuresGrid.appendChild(card);
              });

              document.querySelectorAll('.feat-clickable').forEach(card => {
                card.addEventListener('click', () => {
                  const idx = parseInt(card.getAttribute('data-feat-index'));
                  const feat = cfg.caracteristicas[idx];
                  if (!feat) return;
                  openFeatureModal(feat);
                });
              });
            }
          }

          if (cfg.novedades && Array.isArray(cfg.novedades)) {
            const newsGrid = document.querySelector('#news .grid');
            if (newsGrid) {
              newsGrid.innerHTML = '';
              const top6 = cfg.novedades.slice(0, 6);
              top6.forEach(nov => {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'pixel-border rounded bg-zinc-800/20 p-6 backdrop-blur-md transition-all hover:bg-zinc-800/40 flex flex-col justify-between';

                const wrapper = document.createElement('div');
                const header = document.createElement('div');
                header.className = 'flex items-center justify-between mb-3';

                const tag = document.createElement('span');
                tag.className = 'font-pixel text-[9px]';
                tag.style.color = nov.tag_color || '#ff0033';
                tag.textContent = nov.tag || '';

                const fecha = document.createElement('span');
                fecha.className = 'font-retro text-xs text-white/40';
                fecha.textContent = nov.fecha || '';

                header.appendChild(tag);
                header.appendChild(fecha);

                const titulo = document.createElement('h3');
                titulo.className = 'font-pixel text-xs text-white mb-2 leading-relaxed';
                titulo.textContent = nov.titulo || '';

                const desc = document.createElement('p');
                desc.className = 'font-retro text-sm text-white/60 leading-relaxed';
                desc.textContent = nov.descripcion || '';

                wrapper.appendChild(header);
                wrapper.appendChild(titulo);
                wrapper.appendChild(desc);
                itemDiv.appendChild(wrapper);
                newsGrid.appendChild(itemDiv);
              });

              const btnContainer = document.getElementById('news-more-container');
              if (btnContainer) {
                if (cfg.novedades.length > 6) {
                  btnContainer.classList.remove('hidden');
                } else {
                  btnContainer.classList.add('hidden');
                }
              }
            }
          }

          if (cfg.multimedia) {
            if (cfg.multimedia.fondo) {
              const heroBgImage = document.querySelector('.hero-bg-image');
              if (heroBgImage) heroBgImage.style.backgroundImage = `url('${cfg.multimedia.fondo}')`;
            }
            if (cfg.multimedia.logo_oscuro) {
              const fav = document.getElementById('favicon');
              if (fav) fav.href = cfg.multimedia.logo_oscuro;
            }
            if (cfg.multimedia.fotos && Array.isArray(cfg.multimedia.fotos)) {
              const carouselCards = document.querySelectorAll('#carousel-stage .carousel-card img');
              cfg.multimedia.fotos.forEach((fotoItem, i) => {
                const url = typeof fotoItem === 'string' ? fotoItem : (fotoItem?.url || '');
                const desc = typeof fotoItem === 'string' ? '' : (fotoItem?.descripcion || '');
                if (carouselCards[i]) {
                  if (url) carouselCards[i].src = url;
                  carouselCards[i].setAttribute('data-desc', desc);
                }
              });
              if (typeof window.updateLightboxSources === 'function') {
                window.updateLightboxSources();
              }
            }
          }
      }
      if (window.siteConfig) {
        applyConfig(window.siteConfig);
      } else {
        fetch('api/obtener_config.php?v=' + Date.now())
          .then(res => res.json())
          .then(cfg => { window.siteConfig = cfg; applyConfig(cfg); })
          .catch(() => console.log('Landing usando contenido estático por defecto.'));
      }

      fetch('api/metricas.php?tipo=visita').catch(() => {});

      document.addEventListener('click', (e) => {
        const btn = e.target.closest('a');
        if (btn && (btn.getAttribute('href') === '#download' || btn.classList.contains('neon-btn'))) {
          fetch('api/metricas.php?tipo=descarga').catch(() => {});
        }
      });
    })();

    /* ════════════════════════════════════════════════════════════════════════
       FIGURA — Particle Logo Animation (dark/light adaptive)
       ════════════════════════════════════════════════════════════════════════ */
    (function () {
      const FIG_EASE = {
        easeOut: function (t) { return 1 - (1 - t) * (1 - t); },
        easeInOut: function (t) { return t < 0.5 ? 2 * t * t : 1 - 2 * (1 - t) * (1 - t); },
        easeIn: function (t) { return t * t; },
        linear: function (t) { return t; },
      };

      var figuraCanvas, figuraCtx;
      var figuraContainer;
      var figuraParticles = [];
      var figuraDims = { W: 0, H: 0 };
      var figuraMouse = { x: -99999, y: -99999, active: false };
      var figuraPrevMouse = { x: -99999, y: -99999 };
      var figuraMouseSpeed = 0;
      var figuraSmoothMouse = { x: -99999, y: -99999 };
      var figuraAnimState = "active";
      var figuraAnimStartTime = 0;
      var figuraAnimTimer = null;
      var figuraRoamFadeStart = 0;
      var figuraRoamFadeFrom = 1;
      var figuraRoamFadeTo = 1;
      var figuraAnimFrame = null;
      var figuraVisible = false;
      var figuraInitialized = false;

      var FIGURE_CONFIG = {
        particleCount: 50,
        particleSize: 5,
        particleShape: "circle",
        hoverEnabled: true,
        hoverType: "roam",
        roamWidth: 0,
        roamHeight: 0,
        roamShape: "rectangle",
        roamOpacity: 0.5,
        hideType: "scatter",
        transitionDuration: 0.8,
        transitionEase: "easeInOut",
        repulsionEnabled: true,
        repulsionMode: "outside",
        repulsionForce: 10,
        repulsionRadius: 50,
      };

      function figuraContainRect(iW, iH, cW, cH) {
        var a = iW / iH, b = cW / cH;
        return a > b
          ? { x: 0, y: Math.round((cH - cW / a) / 2), w: cW, h: Math.round(cW / a) }
          : { x: Math.round((cW - cH * a) / 2), y: 0, w: Math.round(cH * a), h: cH };
      }

      function figuraShuffle(a) {
        for (var i = a.length - 1; i > 0; i--) {
          var j = Math.floor(Math.random() * (i + 1));
          var tmp = a[i]; a[i] = a[j]; a[j] = tmp;
        }
      }

      function figuraRandomInShape(shape, bx, by, bw, bh) {
        var cx = bx + bw / 2, cy = by + bh / 2;
        if (shape === "circle") {
          var r = bw / 2, ang = Math.random() * Math.PI * 2, d = Math.sqrt(Math.random()) * r;
          return [cx + Math.cos(ang) * d, cy + Math.sin(ang) * d];
        }
        if (shape === "oval") {
          var rx = bw / 2, ry = bh / 2, ang2 = Math.random() * Math.PI * 2, d2 = Math.sqrt(Math.random());
          return [cx + d2 * rx * Math.cos(ang2), cy + d2 * ry * Math.sin(ang2)];
        }
        return [bx + Math.random() * bw, by + Math.random() * bh];
      }

      function figuraGetTransitionParams() {
        return {
          easeFn: FIG_EASE[FIGURE_CONFIG.transitionEase] || FIG_EASE.easeOut,
          durMs: (FIGURE_CONFIG.transitionDuration || 0.8) * 1000,
        };
      }

      function figuraMkParticle(src, x, y, idleX, idleY) {
        return {
          x: x, y: y, vx: 0, vy: 0, startX: x, startY: y,
          repX: 0, repY: 0,
          homeX: src.homeX, homeY: src.homeY,
          idleX: idleX, idleY: idleY,
          r: src.r, g: src.g, b: src.b, a: src.a,
          inZone: false,
          roamTargetX: 0, roamTargetY: 0,
          repTargetX: 0, repTargetY: 0,
        };
      }

      function figuraStartAnim(newState) {
        var W = figuraDims.W, H = figuraDims.H;
        var ht = FIGURE_CONFIG.hoverType, rw = FIGURE_CONFIG.roamWidth, rh = FIGURE_CONFIG.roamHeight;
        var rs = FIGURE_CONFIG.roamShape, rOp = FIGURE_CONFIG.roamOpacity;
        var durMs = figuraGetTransitionParams().durMs;
        var bw = Math.max(80, rw || W), bh = Math.max(80, rh || H);
        var bx = (W - bw) / 2, by = (H - bh) / 2;

        figuraParticles.forEach(function (p) {
          p.startX = p.x;
          p.startY = p.y;
          if (newState === "scattering" && ht === "roam") {
            var t = figuraRandomInShape(rs, bx, by, bw, bh);
            p.roamTargetX = t[0];
            p.roamTargetY = t[1];
            p.idleX = t[0];
            p.idleY = t[1];
          }
        });

        var _rOp = rOp != null ? rOp : 0.5;
        if (ht === "roam") {
          if (newState === "scattering") {
            figuraRoamFadeStart = Date.now();
            figuraRoamFadeFrom = 1;
            figuraRoamFadeTo = _rOp;
          } else if (newState === "assembling") {
            figuraRoamFadeStart = Date.now();
            figuraRoamFadeFrom = _rOp;
            figuraRoamFadeTo = 1;
          }
        }

        if (newState === "scattering" && ht === "roam") {
          clearTimeout(figuraAnimTimer);
          figuraAnimState = "idle";
          return;
        }

        figuraAnimStartTime = Date.now();
        figuraAnimState = newState;
        clearTimeout(figuraAnimTimer);
        var next = newState === "assembling" ? "active" : "idle";
        figuraAnimTimer = setTimeout(function () {
          if (figuraAnimState === newState) figuraAnimState = next;
        }, durMs);
      }

      function figuraGetIsDark() {
        return document.documentElement.classList.contains("dark");
      }

      function figuraInitParticles() {
        var W = figuraDims.W, H = figuraDims.H;
        if (!W || !H || !figuraCanvas) return;

        var isDark = figuraGetIsDark();
        var imageUrl = isDark ? "figura/oscuro/logo-oscuro.png" : "figura/claro/logo-claro.png";

        var isMobile = W < 768;
        FIGURE_CONFIG.particleSize = isMobile ? 3 : 5;
        FIGURE_CONFIG.repulsionRadius = isMobile ? 35 : 50;
        FIGURE_CONFIG.repulsionForce = isMobile ? 6 : 10;

        clearTimeout(figuraAnimTimer);
        var gap = Math.max(2, Math.round(150 / Math.max(1, FIGURE_CONFIG.particleCount)));
        var dpr = window.devicePixelRatio || 1;
        figuraCanvas.width = Math.round(W * dpr);
        figuraCanvas.height = Math.round(H * dpr);
        figuraMouse = { x: -99999, y: -99999, active: false };
        figuraParticles = [];

        var tryLoad = function (cors) {
          var img = new Image();
          if (cors) img.crossOrigin = "anonymous";
          img.onerror = function () { if (cors) tryLoad(false); };
          img.onload = function () {
            var base = figuraContainRect(img.naturalWidth || img.width, img.naturalHeight || img.height, W, H);
            var sc = isMobile ? 7 : 5;
            var f = Math.max(1, Math.min(20, sc)) / 10;
            var w = base.w * f, h = base.h * f;
            var rect = { x: (W - w) / 2, y: (H - h) / 2, w: w, h: h };

            var off = document.createElement("canvas");
            off.width = W;
            off.height = H;
            var oc = off.getContext("2d");
            oc.drawImage(img, rect.x, rect.y, rect.w, rect.h);

            var px;
            try { px = oc.getImageData(0, 0, W, H).data; } catch (_) { return; }

            var src = [];
            var colorMul = isDark ? 1 : 0.3;
            for (var y = 0; y < H; y += gap) {
              for (var x = 0; x < W; x += gap) {
                var i = (y * W + x) * 4;
                if (px[i + 3] >= 20) {
                  src.push({
                    homeX: x, homeY: y,
                    r: Math.round(px[i] * colorMul),
                    g: Math.round(px[i + 1] * colorMul),
                    b: Math.round(px[i + 2] * colorMul),
                    a: px[i + 3],
                  });
                }
              }
            }
            figuraShuffle(src);

            var ht = FIGURE_CONFIG.hoverType;
            var rw = FIGURE_CONFIG.roamWidth, rh = FIGURE_CONFIG.roamHeight;
            var rs = FIGURE_CONFIG.roamShape;
            var bw = Math.max(80, rw || W), bh = Math.max(80, rh || H);
            var bx = (W - bw) / 2, by = (H - bh) / 2;

            if (!FIGURE_CONFIG.hoverEnabled) {
              figuraAnimState = "active";
              figuraParticles = src.map(function (p) { return figuraMkParticle(p, p.homeX, p.homeY, p.homeX, p.homeY); });
            } else if (ht === "roam") {
              figuraParticles = src.map(function (p) {
                var rnd = figuraRandomInShape(rs, bx, by, bw, bh);
                var pt = figuraMkParticle(p, rnd[0], rnd[1], rnd[0], rnd[1]);
                var tgt = figuraRandomInShape(rs, bx, by, bw, bh);
                pt.roamTargetX = tgt[0];
                pt.roamTargetY = tgt[1];
                pt.vx = (Math.random() - 0.5) * 1.2;
                pt.vy = (Math.random() - 0.5) * 1.2;
                return pt;
              });
              figuraAnimState = "idle";
            } else {
              figuraParticles = src.map(function (p) {
                var maxD = Math.max(W, H);
                var d = 0.5 * maxD;
                var angle = Math.random() * Math.PI * 2;
                var ox = p.homeX + Math.cos(angle) * d;
                var oy = p.homeY + Math.sin(angle) * d;
                return figuraMkParticle(p, ox, oy, ox, oy);
              });
              figuraAnimState = "idle";
            }
          };
          img.src = imageUrl;
        };
        tryLoad(true);
      }

      function figuraDraw() {
        if (!figuraVisible) {
          figuraAnimFrame = null;
          return;
        }
        figuraAnimFrame = requestAnimationFrame(figuraDraw);
        var PW = figuraCanvas.width, PH = figuraCanvas.height;
        if (!PW || !PH) return;
        var dpr = window.devicePixelRatio || 1;
        if (!figuraParticles.length) return;

        if (!figuraCtx._idata || PW !== figuraCtx._bW || PH !== figuraCtx._bH) {
          figuraCtx._idata = figuraCtx.createImageData(PW, PH);
          figuraCtx._bW = PW;
          figuraCtx._bH = PH;
        }
        var idata = figuraCtx._idata;
        idata.data.fill(0);
        var buf = idata.data;

        var ht = FIGURE_CONFIG.hoverType;
        var rw = FIGURE_CONFIG.roamWidth, rh = FIGURE_CONFIG.roamHeight;
        var rOp = FIGURE_CONFIG.roamOpacity, rs = FIGURE_CONFIG.roamShape;
        var repOn = FIGURE_CONFIG.repulsionEnabled;
        var rF = FIGURE_CONFIG.repulsionForce, rR = FIGURE_CONFIG.repulsionRadius;
        var rMode = FIGURE_CONFIG.repulsionMode;
        var pSz = FIGURE_CONFIG.particleSize;
        var pShape = FIGURE_CONFIG.particleShape;

        var state = figuraAnimState;
        var rawMx = figuraMouse.x, rawMy = figuraMouse.y, active = figuraMouse.active;
        var hitSpeed = figuraMouseSpeed;
        figuraMouseSpeed *= 0.88;

        var sm = figuraSmoothMouse;
        if (active) {
          var lerpFactor = Math.max(0.08, 0.3 - hitSpeed * 0.006);
          if (sm.x < -9000) { sm.x = rawMx; sm.y = rawMy; }
          else { sm.x += (rawMx - sm.x) * lerpFactor; sm.y += (rawMy - sm.y) * lerpFactor; }
        } else { sm.x = -99999; sm.y = -99999; }

        var mx = sm.x, my = sm.y;
        var ps = Math.max(1, Math.ceil((pSz / 4) * dpr));
        var tp = figuraGetTransitionParams();
        var easeFn = tp.easeFn, durMs = tp.durMs;
        var elapsed = Date.now() - figuraAnimStartTime;
        var animT = easeFn(Math.min(1, elapsed / durMs));
        var DW = figuraDims.W, DH = figuraDims.H;
        var bw = Math.max(80, rw || DW), bh = Math.max(80, rh || DH);
        var bx = (DW - bw) / 2, by = (DH - bh) / 2;

        var half = ps / 2;
        var drawParticle = function (cx, cy, r, g, b, a, isCircle) {
          var px0 = Math.round(cx) - (ps >> 1);
          var py0 = Math.round(cy) - (ps >> 1);
          for (var dy = 0; dy < ps; dy++) {
            var iy = py0 + dy;
            if (iy < 0 || iy >= PH) continue;
            var row = iy * PW;
            for (var dx = 0; dx < ps; dx++) {
              if (isCircle) {
                var ddx = dx - half + 0.5, ddy = dy - half + 0.5;
                if (ddx * ddx + ddy * ddy > half * half) continue;
              }
              var ix = px0 + dx;
              if (ix < 0 || ix >= PW) continue;
              var i = (row + ix) * 4;
              buf[i] = r; buf[i + 1] = g; buf[i + 2] = b; buf[i + 3] = a;
            }
          }
        };

        var repCutoff = Math.max(1, rR);
        var repCutoffSq = repCutoff * repCutoff;
        var pIdx = 0;

        for (var pi = 0; pi < figuraParticles.length; pi++) {
          var p = figuraParticles[pi];
          var isCircle = pShape === "circle" || (pShape === "both" && pIdx % 2 === 1);
          pIdx++;

          var baseX = p.x, baseY = p.y;
          if (state === "assembling") {
            baseX = p.startX + (p.homeX - p.startX) * animT;
            baseY = p.startY + (p.homeY - p.startY) * animT;
          } else if (state === "scattering") {
            baseX = p.startX + (p.idleX - p.startX) * animT;
            baseY = p.startY + (p.idleY - p.startY) * animT;
          } else if (state === "active") {
            baseX = p.homeX;
            baseY = p.homeY;
          } else if (state === "idle") {
            if (ht === "roam") {
              var dtx = p.roamTargetX - p.x, dty = p.roamTargetY - p.y;
              if (Math.sqrt(dtx * dtx + dty * dty) < 3) {
                var tgt = figuraRandomInShape(rs, bx, by, bw, bh);
                p.roamTargetX = tgt[0];
                p.roamTargetY = tgt[1];
              }
              p.vx = (p.vx || 0) * 0.98 + (p.roamTargetX - p.x) * 0.003;
              p.vy = (p.vy || 0) * 0.98 + (p.roamTargetY - p.y) * 0.003;
              var sp2 = Math.sqrt(p.vx * p.vx + p.vy * p.vy);
              if (sp2 > 1.5) { p.vx = (p.vx / sp2) * 1.5; p.vy = (p.vy / sp2) * 1.5; }
              p.x += p.vx;
              p.y += p.vy;
              baseX = p.x;
              baseY = p.y;
            } else {
              baseX = p.idleX;
              baseY = p.idleY;
            }
          }

          if (repOn) {
            if (rMode === "random") {
              var dxr = baseX - rawMx, dyr = baseY - rawMy;
              var distR = Math.sqrt(dxr * dxr + dyr * dyr);
              if (distR < repCutoff) {
                if (!p.inZone) {
                  var angR = Math.random() * Math.PI * 2;
                  var dR = Math.random() * rF * 5;
                  p.repTargetX = Math.cos(angR) * dR;
                  p.repTargetY = Math.sin(angR) * dR;
                  p.inZone = true;
                }
                p.repX += (p.repTargetX - p.repX) * 0.15;
                p.repY += (p.repTargetY - p.repY) * 0.15;
              } else { p.inZone = false; }
            } else {
              if (active) {
                var dx = baseX - mx, dy = baseY - my;
                var distSq = dx * dx + dy * dy;
                if (distSq > 0 && distSq < repCutoffSq) {
                  var dist = Math.sqrt(distSq);
                  var nx = dx / dist, ny = dy / dist;
                  var falloff = 1 - dist / repCutoff;
                  var push = falloff * hitSpeed * rF * 0.05;
                  p.repX += nx * push;
                  p.repY += ny * push;
                  var targetRepX = nx * (repCutoff - dist);
                  var targetRepY = ny * (repCutoff - dist);
                  p.repX += (targetRepX - p.repX) * 0.06;
                  p.repY += (targetRepY - p.repY) * 0.06;
                  p.inZone = true;
                } else { p.inZone = false; }
              } else { p.inZone = false; }
            }
          } else { p.inZone = false; }

          if (!p.inZone) { p.repX *= 0.97; p.repY *= 0.97; }
          p.x = baseX + p.repX;
          p.y = baseY + p.repY;

          var dr, dg, db, da;
          if (state === "active") {
            dr = p.r; dg = p.g; db = p.b; da = p.a;
          } else if (ht === "roam" && FIGURE_CONFIG.hoverEnabled) {
            var alphaMul;
            if (figuraRoamFadeStart === 0) { alphaMul = rOp != null ? rOp : 0.5; }
            else {
              var fadeElapsed = Date.now() - figuraRoamFadeStart;
              var fadeT = Math.min(1, Math.max(0, fadeElapsed / durMs));
              var easedFadeT = easeFn(fadeT);
              alphaMul = figuraRoamFadeFrom + (figuraRoamFadeTo - figuraRoamFadeFrom) * easedFadeT;
            }
            dr = p.r; dg = p.g; db = p.b;
            da = Math.round(p.a * alphaMul);
          } else if (ht === "hide" && FIGURE_CONFIG.hoverEnabled) {
            var alphaMul2;
            if (state === "idle") alphaMul2 = 0;
            else if (state === "assembling") alphaMul2 = animT;
            else if (state === "scattering") alphaMul2 = 1 - animT;
            else alphaMul2 = 1;
            dr = p.r; dg = p.g; db = p.b;
            da = Math.round(p.a * alphaMul2);
          } else {
            dr = p.r; dg = p.g; db = p.b; da = p.a;
          }
          if (da < 1) continue;

          drawParticle(p.x * dpr, p.y * dpr, dr, dg, db, da, isCircle);
        }
        figuraCtx.putImageData(idata, 0, 0);
      }

      function figuraOnMouseMove(e) {
        if (!figuraCanvas) return;
        var rect = figuraCanvas.getBoundingClientRect();
        var W = figuraDims.W, H = figuraDims.H;
        var scaleX = rect.width > 0 ? W / rect.width : 1;
        var scaleY = rect.height > 0 ? H / rect.height : 1;
        var mx = (e.clientX - rect.left) * scaleX;
        var my = (e.clientY - rect.top) * scaleY;

        if (figuraPrevMouse.x > -9999) {
          var ddx = mx - figuraPrevMouse.x, ddy = my - figuraPrevMouse.y;
          figuraMouseSpeed = Math.sqrt(ddx * ddx + ddy * ddy);
        }
        figuraPrevMouse = { x: mx, y: my };
        figuraMouse = { x: mx, y: my, active: true };

        if (FIGURE_CONFIG.hoverEnabled) {
          var s = figuraAnimState;
          if (s === "idle" || s === "scattering") figuraStartAnim("assembling");
        }
      }

      function figuraOnMouseLeave() {
        figuraMouse = { x: -99999, y: -99999, active: false };
        if (FIGURE_CONFIG.hoverEnabled) {
          var s = figuraAnimState;
          if (s === "assembling" || s === "active") figuraStartAnim("scattering");
        }
      }

      function figuraBuild() {
        figuraContainer = document.getElementById("particle-container");
        if (!figuraContainer) return;

        if (!figuraCanvas) {
          figuraCanvas = document.createElement("canvas");
          figuraContainer.appendChild(figuraCanvas);
          figuraCtx = figuraCanvas.getContext("2d");
          figuraCanvas.addEventListener("mousemove", figuraOnMouseMove);
          figuraCanvas.addEventListener("mouseleave", figuraOnMouseLeave);

          if ('ontouchstart' in window) {
            var figuraTouchStartX = 0;
            var figuraTouchStartY = 0;
            var figuraTouchIsScroll = false;

            figuraCanvas.addEventListener("touchstart", function(e) {
              figuraTouchStartX = e.touches[0].clientX;
              figuraTouchStartY = e.touches[0].clientY;
              figuraTouchIsScroll = false;
              figuraOnMouseMove(e.touches[0]);
            }, { passive: true });

            figuraCanvas.addEventListener("touchmove", function(e) {
              var dx = Math.abs(e.touches[0].clientX - figuraTouchStartX);
              var dy = Math.abs(e.touches[0].clientY - figuraTouchStartY);
              if (dy > 10 && dy > dx) {
                if (!figuraTouchIsScroll) {
                  figuraTouchIsScroll = true;
                  figuraOnMouseLeave();
                }
                return;
              }
              e.preventDefault();
              figuraOnMouseMove(e.touches[0]);
            }, { passive: false });

            figuraCanvas.addEventListener("touchend", function() {
              figuraOnMouseLeave();
            });
          }
        }

        var ro = new ResizeObserver(function (entries) {
          var r = entries[0] && entries[0].contentRect;
          if (!r) return;
          var W = Math.round(r.width), H = Math.round(r.height);
          if (!W || !H) return;
          figuraDims = { W: W, H: H };
          figuraInitParticles();
        });
        ro.observe(figuraContainer);

        figuraDraw();
        figuraInitialized = true;
      }

      var figuraSectionObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            figuraVisible = true;
            if (!figuraInitialized) figuraBuild();
            else if (!figuraAnimFrame) figuraDraw();
          } else {
            figuraVisible = false;
          }
        });
      }, { threshold: 0.1 });

      var figuraSection = document.getElementById("figura");
      if (figuraSection) figuraSectionObserver.observe(figuraSection);

      var figuraThemeObserver = new MutationObserver(function (mutations) {
        for (var i = 0; i < mutations.length; i++) {
          if (mutations[i].attributeName === "class") {
            if (figuraInitialized) figuraInitParticles();
            break;
          }
        }
      });
      figuraThemeObserver.observe(document.documentElement, { attributes: true, attributeFilter: ["class"] });

    })();
  </script>
</body>
</html>
