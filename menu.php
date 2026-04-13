<?php
$page_title = "Cuz Coffee — Menu";
$active_page = "menu";
include 'includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="section-label">What We Brew</p>
    <h1>Our <em>Menu</em></h1>
    <p class="page-hero-sub">8oz HOT &nbsp;/&nbsp; 16oz ICED &nbsp;·&nbsp; Open Daily 7AM – 7PM</p>
  </div>
</section>

<section class="menu-page section-pad">
  <div class="container">

    <!-- COFFEE -->
    <div class="menu-section">
      <h2 class="menu-category-title">☕ Coffee</h2>
      <div class="menu-grid-real">
        <?php
        // Put the FULL path in 'img' for each drink.
        // Examples already filled in where you have the file.
        // For the rest, add your path the same way as spanish.jpg.
        $coffee = [
          ['name'=>"Jess'panyol",    'sub'=>'Spanish Latte',         'tag'=>'Best Seller', 'img'=>'assets/css/Images/spanish.jpg'],
          ['name'=>"Vietna'em",      'sub'=>'Vietnamese Coffee',     'tag'=>'Best Seller', 'img'=>'assets/css/Images/Vietna.jpg'],
          ['name'=>"Gab's Latte",    'sub'=>'Vanilla Latte',         'tag'=>'',            'img'=>'assets/css/Images/softboi.jpg'],
          ['name'=>'Toto Cano',      'sub'=>'Americano',             'tag'=>'',            'img'=>'assets/css/Images/toto.jpg'],
          ['name'=>'Sunny Cano',     'sub'=>'Orange Americano',      'tag'=>'Must Try',    'img'=>'assets/css/Images/orange-americano.jpg'],
          ['name'=>'Mochawin',       'sub'=>'White Chocolate Mocha', 'tag'=>'',            'img'=>'assets/css/Images/mochawin.jpg'],
          ['name'=>'Salted Kayramel','sub'=>'Salted Caramel Latte',  'tag'=>'',            'img'=>'assets/css/Images/Salted Kayeramel.jpg'],
          ['name'=>'Biscoff ni Joy', 'sub'=>'Biscoff Latte',         'tag'=>'',            'img'=>'assets/css/Images/Biscoff(1).jpg'],
          ['name'=>'HazelNald',      'sub'=>'Hazelnut Latte',        'tag'=>'',            'img'=>'assets/css/Images/hazelnut-latte.jpg'],
          ['name'=>'Pauwer Shot',    'sub'=>'Double Espresso Shot',  'tag'=>'',            'img'=>'assets/css/Images/double-espresso-shot.jpg'],
        ];
        foreach($coffee as $item):
          $tagClass = $item['tag'] ? 'tag-' . strtolower(str_replace([' ','\''], ['-',''], $item['tag'])) : '';
          $hasPhoto = !empty($item['img']) && file_exists($item['img']);
        ?>
        <div class="menu-card-real">
          <div class="menu-card-img-real<?= $hasPhoto ? ' has-photo' : '' ?>">
            <?php if($hasPhoto): ?>
              <img src="<?= $item['img'] ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="drink-photo">
            <?php else: ?>
              <span class="menu-card-emoji">☕</span>
            <?php endif; ?>
            <?php if($item['tag']): ?>
              <span class="menu-tag <?= $tagClass ?>"><?= $item['tag'] ?></span>
            <?php endif; ?>
          </div>
          <div class="menu-card-body-real">
            <h3 class="menu-name-real"><?= $item['name'] ?></h3>
            <p class="menu-sub-real"><?= strtoupper($item['sub']) ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- NON-COFFEE -->
    <div class="menu-section">
      <h2 class="menu-category-title">🍵 Non-Coffee</h2>
      <div class="menu-grid-real menu-grid-four">
        <?php
        $noncoffee = [
          ['name'=>'Matcha Miguel','sub'=>'Matcha Latte',      'tag'=>'Best Seller', 'img'=>'assets/css/Images/matchamiguel.jpg'],
          ['name'=>'Marcocoa',     'sub'=>'Chocolate Drink',   'tag'=>'Cuz Fave',    'img'=>'assets/css/Images/marcocoa.jpg'],
          ['name'=>'Matcha Rose',  'sub'=>'Strawberry Matcha', 'tag'=>'',            'img'=>'assets/css/Images/matcha-rose.jpg'],
          ['name'=>'Berry Kikay',  'sub'=>'Strawberry Milk',   'tag'=>'',            'img'=>'assets/css/Images/berry-kikay.jpg'],
        ];
        foreach($noncoffee as $item):
          $tagClass = $item['tag'] ? 'tag-' . strtolower(str_replace([' ','\''], ['-',''], $item['tag'])) : '';
          $hasPhoto = !empty($item['img']) && file_exists($item['img']);
        ?>
        <div class="menu-card-real">
          <div class="menu-card-img-real noncoffee-img<?= $hasPhoto ? ' has-photo' : '' ?>">
            <?php if($hasPhoto): ?>
              <img src="<?= $item['img'] ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="drink-photo">
            <?php else: ?>
              <span class="menu-card-emoji">🍵</span>
            <?php endif; ?>
            <?php if($item['tag']): ?>
              <span class="menu-tag <?= $tagClass ?>"><?= $item['tag'] ?></span>
            <?php endif; ?>
          </div>
          <div class="menu-card-body-real">
            <h3 class="menu-name-real"><?= $item['name'] ?></h3>
            <p class="menu-sub-real"><?= strtoupper($item['sub']) ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>

<style>
.menu-card-img-real.has-photo {
  padding: 0;
  overflow: hidden;
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

<?php include 'includes/footer.php'; ?>