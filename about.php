<?php
$page_title = "Cuz Coffee — About Us";
$active_page = "about";
include 'includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="section-label">Who We Are</p>
    <h1>About <em>Cuz Coffee</em></h1>
    <p class="page-hero-sub">More than a coffee shop — a place to belong.</p>
  </div>
</section>

<!-- ================================================
     STORY SECTION — Picture on top, story below
     ================================================ -->
<section class="about-story section-pad">
  <div class="container">

    <!-- ── PICTURE BLOCK ── -->
    <div class="story-picture-wrap">

      <!-- ↓↓↓ REPLACE src with your image path ↓↓↓ -->
      <img
        src="assets/css/Images/cuzstory.jpg"
        alt="Cuz Coffee story photo"
        class="story-picture"
        onerror="this.parentElement.classList.add('story-picture-fallback'); this.style.display='none';"
      >
      <!-- ↑↑↑ REPLACE src with your image path ↑↑↑ -->

      <!-- Overlay badge -->
      <div class="story-picture-badge">Est. 2020</div>

      <!-- Bottom gradient for smooth blend into story text -->
      <div class="story-picture-fade"></div>
    </div>

    <!-- ── STORY TEXT BLOCK ── -->
    <div class="story-text-block">
      <div class="story-text-inner">
        <p class="section-label">The Beginning</p>
        <h2>Born From a Love of <em>Good Coffee</em></h2>
        <p class="body-text">Cuz Coffee started in a small corner of Bacolod City with one espresso machine, two cousins, and a dream. We wanted to create a space where every visitor felt like family — hence the name.</p>
        <p class="body-text">Today, we remain committed to that same warmth. Our beans are sourced from local Philippine farms and roasted in-house every morning. We believe the best coffee is the one made with intention and served with care.</p>

        <!-- Quick stats row -->
        <div class="story-stats">
          <div class="story-stat">
            <span class="stat-num">5+</span>
            <span class="stat-label">Years Brewing</span>
          </div>
          <div class="story-stat-divider"></div>
          <div class="story-stat">
            <span class="stat-num">14</span>
            <span class="stat-label">Signature Drinks</span>
          </div>
          <div class="story-stat-divider"></div>
          <div class="story-stat">
            <span class="stat-num">1st</span>
            <span class="stat-label">Drive Thru in Alijis</span>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<style>
/* ===== STORY SECTION ===== */
.about-story { padding-top: 0; }
.about-story > .container { padding: 0; max-width: 100%; }

/* Picture wrap */
.story-picture-wrap {
  position: relative;
  width: 100%;
  aspect-ratio: 16 / 7;
  overflow: hidden;
  background: #2b1c0a;
}
.story-picture {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 8s ease;
  transform-origin: center center;
}
/* Subtle slow Ken Burns zoom */
.story-picture-wrap:hover .story-picture {
  transform: scale(1.04);
}

/* Fallback when no image */
.story-picture-fallback {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 80px;
  opacity: 0.15;
}
.story-picture-fallback::after {
  content: '☕';
}

/* Est badge */
.story-picture-badge {
  position: absolute;
  top: 24px;
  right: 28px;
  background: rgba(26, 16, 8, 0.75);
  color: #c4a97d;
  font-size: 12px;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  padding: 8px 18px;
  border-radius: 50px;
  border: 1px solid rgba(196, 169, 125, 0.35);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}

/* Bottom fade so picture melts into text */
.story-picture-fade {
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 120px;
  background: linear-gradient(to bottom, transparent, var(--bg-primary, #fff));
  pointer-events: none;
}

/* Story text block */
.story-text-block {
  background: #fff;
  padding: 0 24px 64px;
}
.story-text-inner {
  max-width: 720px;
  margin: 0 auto;
  padding-top: 8px;
}
.story-text-inner h2 {
  margin: 10px 0 20px;
  font-size: clamp(24px, 4vw, 36px);
  font-weight: 700;
  line-height: 1.2;
}
.story-text-inner h2 em {
  font-style: italic;
}
.story-text-inner .body-text {
  font-size: 15px;
  line-height: 1.8;
  color: #5a4a3a;
  margin-bottom: 14px;
}

/* Stats row */
.story-stats {
  display: flex;
  align-items: center;
  gap: 0;
  margin-top: 36px;
  padding: 28px 32px;
  background: #1a1008;
  border-radius: 16px;
  flex-wrap: wrap;
}
.story-stat {
  flex: 1;
  text-align: center;
  min-width: 100px;
}
.stat-num {
  display: block;
  font-size: 32px;
  font-weight: 700;
  color: #c4a97d;
  line-height: 1;
  margin-bottom: 6px;
}
.stat-label {
  display: block;
  font-size: 12px;
  color: #8a7060;
  letter-spacing: 0.06em;
  text-transform: uppercase;
}
.story-stat-divider {
  width: 1px;
  height: 40px;
  background: rgba(196, 169, 125, 0.2);
  flex-shrink: 0;
}

/* Responsive */
@media (max-width: 600px) {
  .story-picture-wrap { aspect-ratio: 4 / 3; }
  .story-stat-divider { display: none; }
  .story-stats { gap: 16px; padding: 20px; }
  .story-stat { flex-basis: 45%; }
}
</style>
<!-- ================================================ -->

<section class="values section-pad values-bg">
  <div class="container">
    <div class="section-header light">
      <p class="section-label">What Drives Us</p>
      <h2>Our <em>Values</em></h2>
    </div>
    <div class="values-grid">
      <?php
      $values = [
        ['icon'=>'🫘', 'title'=>'Quality First', 'text'=>'We use only specialty-grade beans, sourced directly from trusted Philippine farms.'],
        ['icon'=>'🤝', 'title'=>'Community', 'text'=>'We support local farmers, artists, and makers. Every purchase you make here gives back.'],
        ['icon'=>'♻️', 'title'=>'Sustainability', 'text'=>'Compostable cups, minimal waste, and eco-conscious practices in everything we do.'],
        ['icon'=>'💛', 'title'=>'Warmth', 'text'=>'Our baristas are trained not just to make coffee, but to make your day a little brighter.'],
      ];
      foreach($values as $v): ?>
      <div class="value-card">
        <div class="value-icon"><?= $v['icon'] ?></div>
        <h3><?= $v['title'] ?></h3>
        <p><?= $v['text'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>



<?php include 'includes/footer.php'; ?>