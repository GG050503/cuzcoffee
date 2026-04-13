<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?? 'Cuz Coffee' ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css?v=2">
</head>
<body>

<nav class="navbar" id="navbar">
  <a href="index.php" class="nav-logo">Cuz Coffee </a>
  <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
    <span></span><span></span><span></span>
  </button>
  <ul class="nav-links" id="navLinks">
    <li><a href="index.php"   class="<?= $active_page==='home'   ? 'active' : '' ?>">Home</a></li>
    <li><a href="menu.php"    class="<?= $active_page==='menu'   ? 'active' : '' ?>">Menu</a></li>
    <li><a href="about.php"   class="<?= $active_page==='about'  ? 'active' : '' ?>">About</a></li>
    <li><a href="inquire.php" class="<?= $active_page==='inquire'? 'active' : '' ?>">Book Cuz Cart</a></li>
    <li><a href="inquire.php" class="nav-cta">🚐 Book Now</a></li>
  </ul>
</nav>
