<?php
$page_title = "Cuz Coffee — Contact";
$active_page = "contact";

$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = trim($_POST['name'] ?? '');
  $email   = trim($_POST['email'] ?? '');
  $subject = trim($_POST['subject'] ?? '');
  $message = trim($_POST['message'] ?? '');

  if (!$name)    $errors[] = 'Name is required.';
  if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
  if (!$message) $errors[] = 'Message is required.';

  if (empty($errors)) {
    // In production: mail() or PHPMailer would go here
    $success = true;
  }
}

include 'includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <p class="section-label">Get In Touch</p>
    <h1>Say <em>Hello</em></h1>
    <p class="page-hero-sub">We'd love to hear from you. Drop us a message anytime.</p>
  </div>
</section>

<section class="contact-page section-pad">
  <div class="container contact-grid">

    <div class="contact-form-col">
      <h2>Send Us a <em>Message</em></h2>

      <?php if ($success): ?>
        <div class="form-success">
          <span>☕</span>
          <p>Thanks for reaching out! We'll get back to you shortly.</p>
        </div>
      <?php endif; ?>

      <?php if (!empty($errors)): ?>
        <div class="form-errors">
          <?php foreach($errors as $e): ?><p>⚠ <?= htmlspecialchars($e) ?></p><?php endforeach; ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="contact.php" class="cuz-form">
        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" placeholder="Juan dela Cruz" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="juan@email.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" placeholder="Reservation, feedback, partnership..." value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" placeholder="Write your message here..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn-primary full-width">Send Message ☕</button>
      </form>
    </div>

    <div class="contact-info-col">
      <h2>Visit <em>Us</em></h2>
      <ul class="visit-list">
        <li>
          <span class="visit-icon">📍</span>
          <div><strong>Address</strong><br>123 Brew Street<br>Roxas City, Capiz 5800</div>
        </li>
        <li>
          <span class="visit-icon">🕐</span>
          <div><strong>Opening Hours</strong><br>Monday – Friday: 7:00am – 9:00pm<br>Saturday – Sunday: 8:00am – 10:00pm</div>
        </li>
        <li>
          <span class="visit-icon">📞</span>
          <div><strong>Phone</strong><br>+63 912 345 6789</div>
        </li>
        <li>
          <span class="visit-icon">✉️</span>
          <div><strong>Email</strong><br>hello@cuzcoffee.ph</div>
        </li>
        <li>
          <span class="visit-icon">📱</span>
          <div><strong>Follow Us</strong><br>@cuzcoffee on Instagram & Facebook</div>
        </li>
      </ul>

      <div class="map-placeholder contact-map">
        <span>📍 Cuz Coffee<br><small>Roxas City, Capiz</small></span>
      </div>
    </div>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
