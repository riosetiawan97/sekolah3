/* Interaksi halaman publik: menu, slider hero, lightbox galeri, FAQ. */
(function () {
  var nav = document.querySelector('.nav');

  // Navbar transparan di beranda, berubah saat digulir
  if (nav && nav.classList.contains('nav-beranda')) {
    var cek = function () { nav.classList.toggle('tergulir', window.scrollY > 60); };
    window.addEventListener('scroll', cek, { passive: true });
    cek();
  }

  // Menu HP
  var burger = document.querySelector('.hamburger');
  if (burger) {
    burger.addEventListener('click', function () {
      var buka = nav.classList.toggle('menu-buka');
      burger.setAttribute('aria-expanded', buka ? 'true' : 'false');
    });
  }

  // Dropdown: hover di desktop, klik di semua ukuran
  var desktop = window.matchMedia('(min-width: 1024px)');
  document.querySelectorAll('.menu > li.punya-sub').forEach(function (li) {
    var tombol = li.querySelector('.menu-link');
    var timer;
    var set = function (buka) {
      li.classList.toggle('buka', buka);
      tombol.setAttribute('aria-expanded', buka ? 'true' : 'false');
    };
    li.addEventListener('mouseenter', function () { if (desktop.matches) { clearTimeout(timer); set(true); } });
    li.addEventListener('mouseleave', function () { if (desktop.matches) { timer = setTimeout(function () { set(false); }, 180); } });
    tombol.addEventListener('click', function () { set(!li.classList.contains('buka')); });
  });
  document.addEventListener('click', function (e) {
    if (!desktop.matches) return;
    document.querySelectorAll('.menu > li.buka').forEach(function (li) {
      if (!li.contains(e.target)) li.classList.remove('buka');
    });
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') document.querySelectorAll('.menu > li.buka').forEach(function (li) { li.classList.remove('buka'); });
  });

  // Tutup menu HP setelah klik link ke bagian di halaman
  document.querySelectorAll('.menu-wrap a').forEach(function (a) {
    a.addEventListener('click', function () { if (nav) nav.classList.remove('menu-buka'); });
  });

  // Pita pengumuman
  var pita = document.querySelector('.pita');
  if (pita) {
    pita.querySelector('button').addEventListener('click', function () { pita.remove(); });
  }

  // Slider hero (carousel geser: panah, titik, swipe, otomatis tiap 5 detik)
  var hero = document.querySelector('.hero');
  var trek = document.querySelector('.hero-trek');
  var slides = document.querySelectorAll('.hero-slide');
  var titik = document.querySelectorAll('.hero-titik button');
  if (hero && trek && slides.length > 1) {
    var i = 0, jalan;
    var ke = function (n) {
      slides[i].classList.remove('aktif'); if (titik[i]) titik[i].classList.remove('aktif');
      i = (n + slides.length) % slides.length;
      trek.style.transform = 'translateX(' + (-i * 100) + '%)';
      slides[i].classList.add('aktif'); if (titik[i]) titik[i].classList.add('aktif');
    };
    var mulai = function () { clearInterval(jalan); jalan = setInterval(function () { ke(i + 1); }, 5000); };
    titik.forEach(function (b, n) { b.addEventListener('click', function () { ke(n); mulai(); }); });
    var kiri = hero.querySelector('.hero-panah.kiri'), kanan = hero.querySelector('.hero-panah.kanan');
    if (kiri) kiri.addEventListener('click', function () { ke(i - 1); mulai(); });
    if (kanan) kanan.addEventListener('click', function () { ke(i + 1); mulai(); });
    // Geser dengan jari di HP/tablet
    var xAwal = null, yAwal = null;
    hero.addEventListener('touchstart', function (e) { xAwal = e.touches[0].clientX; yAwal = e.touches[0].clientY; }, { passive: true });
    hero.addEventListener('touchend', function (e) {
      if (xAwal === null) return;
      var dx = e.changedTouches[0].clientX - xAwal, dy = e.changedTouches[0].clientY - yAwal;
      if (Math.abs(dx) > 50 && Math.abs(dx) > Math.abs(dy)) { ke(dx < 0 ? i + 1 : i - 1); mulai(); }
      xAwal = null;
    });
    // Berhenti sebentar saat kursor di atas gambar
    hero.addEventListener('mouseenter', function () { clearInterval(jalan); });
    hero.addEventListener('mouseleave', mulai);
    mulai();
  }

  // YouTube di beranda: carousel + video baru dimuat saat diklik (halaman tetap ringan)
  document.querySelectorAll('.yt-video').forEach(function (b) {
    b.addEventListener('click', function () {
      if (b.querySelector('iframe')) return;
      var f = document.createElement('iframe');
      f.src = 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(b.getAttribute('data-yt')) + '?autoplay=1&rel=0';
      f.title = b.getAttribute('aria-label') || 'Video YouTube';
      f.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
      f.allowFullscreen = true;
      b.appendChild(f);
      ytBerhenti = true; clearInterval(ytJalan);
    });
  });
  var ytTrek = document.querySelector('.yt-trek');
  var ytJalan, ytBerhenti = false;
  if (ytTrek) {
    var ytItem = ytTrek.querySelectorAll('.yt-item');
    var ytKiri = document.querySelector('.yt-panah.kiri'), ytKanan = document.querySelector('.yt-panah.kanan');
    var ytPos = 0;
    var ytTampak = function () { return Math.max(1, Math.round(ytTrek.parentNode.offsetWidth / ytItem[0].offsetWidth)); };
    var ytKe = function (n) {
      var maks = Math.max(0, ytItem.length - ytTampak());
      ytPos = n > maks ? 0 : (n < 0 ? maks : n);
      ytTrek.style.transform = 'translateX(' + (-ytItem[0].offsetWidth * ytPos) + 'px)';
      var geser = maks > 0;
      ytKiri.hidden = !geser; ytKanan.hidden = !geser;
    };
    var ytMulai = function () { clearInterval(ytJalan); if (!ytBerhenti) ytJalan = setInterval(function () { ytKe(ytPos + 1); }, 5000); };
    ytKiri.addEventListener('click', function () { ytKe(ytPos - 1); ytMulai(); });
    ytKanan.addEventListener('click', function () { ytKe(ytPos + 1); ytMulai(); });
    var ytX = null;
    ytTrek.addEventListener('touchstart', function (e) { ytX = e.touches[0].clientX; }, { passive: true });
    ytTrek.addEventListener('touchend', function (e) {
      if (ytX === null) return;
      var dx = e.changedTouches[0].clientX - ytX;
      if (Math.abs(dx) > 50) { ytKe(ytPos + (dx < 0 ? 1 : -1)); ytMulai(); }
      ytX = null;
    });
    window.addEventListener('resize', function () { ytKe(ytPos); });
    ytKe(0); ytMulai();
  }

  // Lightbox galeri
  var lb = document.querySelector('.lightbox');
  if (lb) {
    var foto = [], pos = 0, img = lb.querySelector('img'), cap = lb.querySelector('.cap');
    var tampil = function (n) {
      pos = (n + foto.length) % foto.length;
      img.src = foto[pos].src;
      img.alt = foto[pos].cap;
      cap.textContent = foto[pos].cap;
    };
    document.querySelectorAll('[data-lightbox]').forEach(function (el, n) {
      foto.push({ src: el.getAttribute('data-lightbox'), cap: el.getAttribute('data-cap') || '' });
      el.addEventListener('click', function () { tampil(n); lb.classList.add('buka'); lb.querySelector('.lb-tutup').focus(); });
    });
    var tutup = function () { lb.classList.remove('buka'); img.src = ''; };
    lb.querySelector('.lb-tutup').addEventListener('click', tutup);
    lb.querySelector('.lb-kiri').addEventListener('click', function (e) { e.stopPropagation(); tampil(pos - 1); });
    lb.querySelector('.lb-kanan').addEventListener('click', function (e) { e.stopPropagation(); tampil(pos + 1); });
    lb.addEventListener('click', function (e) { if (e.target === lb) tutup(); });
    document.addEventListener('keydown', function (e) {
      if (!lb.classList.contains('buka')) return;
      if (e.key === 'Escape') tutup();
      if (e.key === 'ArrowLeft') tampil(pos - 1);
      if (e.key === 'ArrowRight') tampil(pos + 1);
    });
    if (foto.length < 2) { lb.querySelector('.lb-kiri').hidden = true; lb.querySelector('.lb-kanan').hidden = true; }
  }

  // Akordeon FAQ
  document.querySelectorAll('.akor > button').forEach(function (b) {
    b.addEventListener('click', function () {
      var akor = b.parentNode;
      var buka = !akor.classList.contains('buka');
      akor.parentNode.querySelectorAll('.akor.buka').forEach(function (a) {
        a.classList.remove('buka'); a.querySelector('button').setAttribute('aria-expanded', 'false');
      });
      akor.classList.toggle('buka', buka);
      b.setAttribute('aria-expanded', buka ? 'true' : 'false');
    });
  });

  // Tab kategori FAQ (tanpa muat ulang)
  document.querySelectorAll('[data-tab]').forEach(function (b) {
    b.addEventListener('click', function (e) {
      var target = document.getElementById(b.getAttribute('data-tab'));
      if (!target) return;
      e.preventDefault();
      document.querySelectorAll('[data-tab]').forEach(function (x) { x.classList.toggle('aktif', x === b); });
      document.querySelectorAll('.tab-isi').forEach(function (x) { x.hidden = x !== target; });
      if (history.replaceState) history.replaceState(null, '', b.getAttribute('href'));
    });
  });

  // Tombol kirim: cegah klik ganda
  document.querySelectorAll('form[data-kirim]').forEach(function (f) {
    f.addEventListener('submit', function () {
      var b = f.querySelector('[type=submit]');
      if (b) { b.disabled = true; b.style.opacity = '.7'; b.textContent = 'Mengirim…'; }
    });
  });
})();
