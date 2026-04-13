<?php
$page_title = "Cuz Coffee — Home";
$active_page = "home";

// All drinks — only tagged ones shown on homepage
// Put the FULL image path in 'img'. Leave '' if no photo yet — falls back to emoji.
$all_drinks = [
  ['name'=>"Jess'panyol",    'sub'=>'Spanish Latte',        'tag'=>'Best Seller', 'type'=>'coffee',    'img'=>'assets/css/Images/spanish.jpg'],
  ['name'=>"Vietna'em",      'sub'=>'Vietnamese Coffee',    'tag'=>'Best Seller', 'type'=>'coffee',    'img'=>'assets/css/Images/Vietna.jpg'],
  ['name'=>"Gab's Latte",    'sub'=>'Vanilla Latte',        'tag'=>'',            'type'=>'coffee',    'img'=>'assets/css/Images/softboi.jpg'],
  ['name'=>'Toto Cano',      'sub'=>'Americano',            'tag'=>'',            'type'=>'coffee',    'img'=>'assets/css/Images/toto.jpg'],
  ['name'=>'Sunny Cano',     'sub'=>'Orange Americano',     'tag'=>'Must Try',    'type'=>'coffee',    'img'=>'assets/css/Images/sunny.jpg'],
  ['name'=>'Mochawin',       'sub'=>'White Chocolate Mocha','tag'=>'',            'type'=>'coffee',    'img'=>'assets/css/Images/mochawin.jpg'],
  ['name'=>'Salted Kayramel','sub'=>'Salted Caramel Latte', 'tag'=>'',            'type'=>'coffee',    'img'=>'assets/css/Images/Salted Kayeramel.jpg'],
  ['name'=>'Biscoff ni Joy', 'sub'=>'Biscoff Latte',        'tag'=>'',            'type'=>'coffee',    'img'=>'assets/css/Images/Biscoff(1).jpg'],
  ['name'=>'HazelNald',      'sub'=>'Hazelnut Latte',       'tag'=>'',            'type'=>'coffee',    'img'=>'assets/css/Images/hazelnut.jpg'],
  ['name'=>'Fauwer Shot',    'sub'=>'Double Espresso Shot', 'tag'=>'',            'type'=>'coffee',    'img'=>'assets/css/Images/espesso.jpg'],
  ['name'=>'Matcha Miguel',  'sub'=>'Matcha Latte',         'tag'=>'Best Seller', 'type'=>'noncoffee', 'img'=>'assets/css/Images/matchamiguel.jpg'],
  ['name'=>'Marcocoa',       'sub'=>'Chocolate',            'tag'=>'Cuz Fave',    'type'=>'noncoffee', 'img'=>'assets/css/Images/marcocoa.jpg'],
  ['name'=>'Matcha Rose',    'sub'=>'Strawberry Matcha',    'tag'=>'',            'type'=>'noncoffee', 'img'=>'assets/css/Images/strawberry_matcha.jpg'],
  ['name'=>'Berry Kikay',    'sub'=>'Strawberry Milk',      'tag'=>'',            'type'=>'noncoffee', 'img'=>'assets/css/Images/strawberry_milk.jpg'],
];

// Filter: only Best Seller, Cuz Fave, Must Try
$featured_tags = ['Best Seller', 'Cuz Fave', 'Must Try'];
$featured = array_filter($all_drinks, fn($d) => in_array($d['tag'], $featured_tags));

include 'includes/header.php';
?>

<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-bg-circle"></div>
  <div class="hero-bg-circle"></div>
  <div class="hero-bg-circle"></div>
  <div class="hero-content">
    <div class="hero-logo-wrapper">
      <img src="assets/css/Images/Logocuz.jpg" alt="Cuz Coffee Logo" class="hero-logo-img">
    </div>
    <h1>Cuz Coffee</h1>
    <p class="hero-tagline">Your First Coffee Drive Thru in Alijis</p>
    <p class="hero-location">📍 Purok Himaya, Alijis &nbsp;·&nbsp; Open Daily 7AM – 7PM</p>
    <a href="#menu" class="btn-primary">See Our Menu</a>
  </div>
  <div class="hero-scroll-hint">
    <span>Scroll</span>
    <div class="scroll-line"></div>
  </div>
</section>

<!-- ABOUT STRIP -->
<section class="about-strip">
  <div class="strip-item"><span class="strip-icon">☕</span><p>Drive Thru Available</p></div>
  <div class="strip-item"><span class="strip-icon">🕐</span><p>Open Daily 7AM – 7PM</p></div>
  <div class="strip-item"><span class="strip-icon">📍</span><p>Purok Himaya, Alijis</p></div>
  <div class="strip-item"><span class="strip-icon">❤️</span><p>Made With Passion</p></div>
</section>

<!-- FEATURED MENU SECTION -->
<section class="home-menu section-pad" id="menu">
  <div class="container">

    <div class="section-header" style="margin-bottom:12px;">
      <p class="section-label">Our Offerings</p>
      <h2>Fan <em>Favorites</em></h2>
    </div>
    <p class="featured-sub">The drinks our regulars can't stop ordering.</p>

    <!-- TAG LEGEND -->
    <div class="tag-legend">
      <span class="legend-item"><span class="menu-tag tag-best-seller">Best Seller</span> Most ordered</span>
      <span class="legend-item"><span class="menu-tag tag-cuz-fave">Cuz Fave</span> Staff picks</span>
      <span class="legend-item"><span class="menu-tag tag-must-try">Must Try</span> You won't regret it</span>
    </div>

    <div class="menu-grid-real menu-grid-featured">
      <?php foreach($featured as $item):
        $tagClass = 'tag-' . strtolower(str_replace([' ',"'"], ['-',''], $item['tag']));
        $emoji    = $item['type'] === 'noncoffee' ? '🍵' : '☕';
        $imgClass = $item['type'] === 'noncoffee' ? 'noncoffee-img' : '';
        $hasPhoto = !empty($item['img']); // No file_exists() — browser handles missing images
      ?>
      <div class="menu-card-real reveal-card">
        <div class="menu-card-img-real <?= $imgClass ?><?= $hasPhoto ? ' has-photo' : '' ?>">
          <?php if($hasPhoto): ?>
            <img
              src="<?= htmlspecialchars($item['img']) ?>"
              alt="<?= htmlspecialchars($item['name']) ?>"
              class="drink-photo"
              onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';"
            >
            <span class="menu-card-emoji" style="display:none;"><?= $emoji ?></span>
          <?php else: ?>
            <span class="menu-card-emoji"><?= $emoji ?></span>
          <?php endif; ?>
          <span class="menu-tag <?= $tagClass ?>"><?= $item['tag'] ?></span>
        </div>
        <div class="menu-card-body-real">
          <h3 class="menu-name-real"><?= $item['name'] ?></h3>
          <p class="menu-sub-real"><?= strtoupper($item['sub']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="section-cta">
      <a href="menu.php" class="btn-primary">View Full Menu</a>
    </div>

  </div>
</section>

<style>
.menu-card-img-real.has-photo {
  padding: 0;
  overflow: hidden;
  position: relative;
}
.drink-photo {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.4s ease;
}
.menu-card-real:hover .drink-photo {
  transform: scale(1.06);
}
.menu-card-img-real.has-photo .menu-tag {
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 2;
}
.menu-card-img-real.has-photo::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.18) 0%, transparent 50%);
  pointer-events: none;
}
</style>

<!-- ================================================
     GRABFOOD TEASER SECTION
     ================================================ -->
<section class="grab-teaser" id="grab-teaser">

  <div class="gt-bg" aria-hidden="true">
    <span class="gt-deco gt-deco-1">☕</span>
    <span class="gt-deco gt-deco-2">🍵</span>
    <span class="gt-deco gt-deco-3">☕</span>
    <span class="gt-deco gt-deco-4">🍵</span>
    <span class="gt-deco gt-deco-5">☕</span>
  </div>

  <div class="gt-inner">
    <p class="gt-eyebrow">Still Thirsty?</p>
    <h2 class="gt-heading">Want more coffee?<br><em>We're on GrabFood!</em></h2>
    <p class="gt-sub">Can't make it to the drive thru? Order your Cuz Coffee favorites straight to your door — fast, easy, and always fresh.</p>

    <a
      href="https://food.grab.com/ph/en/restaurant/cuz-coffee-shop-alijis-delivery/2-C7UJJE5BG4LUCN"
      target="_blank"
      rel="noopener"
      class="gt-btn"
    >
      <svg class="gt-btn-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <line x1="3" y1="6" x2="21" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        <path d="M16 10a4 4 0 01-8 0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span>Order on GrabFood</span>
      <span class="gt-arrow">→</span>
    </a>

    <p class="gt-note">📍 Cuz Coffee Shop · Alijis · Delivered to your door</p>
  </div>
</section>

<style>
.grab-teaser {
  position: relative;
  overflow: hidden;
  background: #130d05;
  padding: 80px 24px;
  text-align: center;
}
.grab-teaser::before {
  content: '';
  display: block;
  position: absolute;
  top: -1px; left: 0; right: 0;
  height: 48px;
  background: inherit;
  clip-path: ellipse(55% 100% at 50% 0%);
}
.gt-bg { position: absolute; inset: 0; pointer-events: none; }
.gt-deco {
  position: absolute;
  font-size: 52px;
  opacity: 0.07;
  animation: gtFloat 7s ease-in-out infinite;
  user-select: none;
}
.gt-deco-1 { top: 8%;  left: 4%;   animation-delay: 0s;   animation-duration: 7s; }
.gt-deco-2 { top: 55%; left: 9%;   animation-delay: 1.8s; animation-duration: 9s; }
.gt-deco-3 { top: 15%; right: 6%;  animation-delay: 0.6s; animation-duration: 6.5s; }
.gt-deco-4 { top: 65%; right: 4%;  animation-delay: 2.5s; animation-duration: 8s; }
.gt-deco-5 { top: 40%; left: 48%;  animation-delay: 1.2s; animation-duration: 7.5s; }
@keyframes gtFloat {
  0%, 100% { transform: translateY(0)   rotate(-6deg); }
  50%       { transform: translateY(-20px) rotate(6deg); }
}
.gt-inner {
  position: relative;
  z-index: 2;
  max-width: 580px;
  margin: 0 auto;
  opacity: 0;
  transform: translateY(36px);
  transition: opacity 0.75s ease, transform 0.75s ease;
}
.gt-inner.gt-visible {
  opacity: 1;
  transform: translateY(0);
}
.gt-eyebrow {
  font-size: 11px;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: #c4a97d;
  font-weight: 500;
  margin-bottom: 14px;
}
.gt-heading {
  font-size: clamp(28px, 5vw, 42px);
  font-weight: 700;
  color: #f5e6c8;
  line-height: 1.2;
  margin-bottom: 18px;
}
.gt-heading em { font-style: italic; color: #00b14f; }
.gt-sub {
  font-size: 15px;
  color: #8a7060;
  line-height: 1.75;
  max-width: 420px;
  margin: 0 auto 40px;
}
.gt-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: #00b14f;
  color: #fff;
  padding: 16px 36px;
  border-radius: 50px;
  font-size: 16px;
  font-weight: 600;
  text-decoration: none;
  position: relative;
  overflow: hidden;
  transition: background 0.25s, transform 0.15s;
  animation: gtPulse 3s ease-out infinite;
}
.gt-btn:hover {
  background: #009944;
  color: #fff;
  text-decoration: none;
  transform: translateY(-3px);
  animation: none;
  box-shadow: 0 8px 24px rgba(0, 177, 79, 0.35);
}
.gt-btn:active { transform: scale(0.97); }
@keyframes gtPulse {
  0%   { box-shadow: 0 0 0 0   rgba(0,177,79,0.55); }
  65%  { box-shadow: 0 0 0 18px rgba(0,177,79,0); }
  100% { box-shadow: 0 0 0 0   rgba(0,177,79,0); }
}
.gt-btn::after {
  content: '';
  position: absolute;
  top: 0; left: -80%;
  width: 55%; height: 100%;
  background: linear-gradient(120deg, transparent, rgba(255,255,255,0.28), transparent);
  animation: gtShimmer 3.2s ease-in-out infinite;
}
@keyframes gtShimmer {
  0%   { left: -80%; }
  55%  { left: 130%; }
  100% { left: 130%; }
}
.gt-btn-icon { flex-shrink: 0; }
.gt-arrow { font-size: 15px; opacity: 0.8; transition: transform 0.2s; }
.gt-btn:hover .gt-arrow { transform: translateX(5px); }
.gt-note { margin-top: 22px; font-size: 12px; color: #4a3828; letter-spacing: 0.03em; }
</style>

<script>
(function () {
  var inner = document.querySelector('.gt-inner');
  if (!inner) return;
  var obs = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) {
        inner.classList.add('gt-visible');
        obs.disconnect();
      }
    });
  }, { threshold: 0.2 });
  obs.observe(inner);
})();
</script>
<!-- ================================================ -->

<!-- TESTIMONIALS -->
<section class="testimonials section-pad">
  <div class="container">
    <div class="section-header light">
      <p class="section-label">What They Say</p>
      <h2>Regulars <em>Love</em> Us</h2>
    </div>
    <div class="testi-grid">
      <?php
      $testimonials = [
        ['name'=>'Maria Santos', 'text'=>"Jess'panyol is my everyday order. Nothing beats it at the drive thru before work!", 'stars'=>5],
        ['name'=>'Jomar Reyes',  'text'=>'Matcha Miguel and Marcocoa are both unreal. Cuz Coffee never misses.', 'stars'=>5],
        ['name'=>'Tisha Lim',    'text'=>"Salted Kayramel is life. The drive thru is fast and the staff are always so warm!", 'stars'=>5],
      ];
      foreach($testimonials as $t): ?>
      <div class="testi-card">
        <div class="testi-stars"><?= str_repeat('★', $t['stars']) ?></div>
        <p class="testi-text">"<?= $t['text'] ?>"</p>
        <p class="testi-name">— <?= $t['name'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- VISIT / CTA -->
<section class="visit section-pad" id="visit">
  <div class="container visit-grid">
    <div class="visit-info">
      <p class="section-label">Find Us</p>
      <h2>Come Say <em>Hello</em></h2>
      <ul class="visit-list">
        <li>
          <span class="visit-icon">📍</span>
          <div><strong>Location</strong><br>Purok Himaya, Alijis, Bacolod City</div>
        </li>
        <li>
          <span class="visit-icon">🕐</span>
          <div><strong>Hours</strong><br>Open Daily: 7:00AM – 7:00PM</div>
        </li>
        <li>
          <span class="visit-icon">🚗</span>
          <div><strong>Drive Thru</strong><br>Your first coffee drive thru in Alijis!</div>
        </li>
      </ul>
      <a href="inquire.php" class="btn-primary" style="margin-top:28px; display:inline-block;">
        🚐 Book Cuz Cart for Your Event
      </a>
    </div>
    <div class="visit-map">
  <iframe
    src="https://www.google.com/maps?q=Cuz+Coffee+Purok+Himaya+Alijis&output=embed"
    width="100%"
    height="400"
    style="border:0;"
    allowfullscreen=""
    loading="lazy">
  </iframe>
</div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>