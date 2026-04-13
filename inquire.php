<?php
$page_title = "Cuz Coffee — Book Cuz Cart";
$active_page = "inquire";

$success = false;
$errors  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name       = trim($_POST['name']       ?? '');
  $contact    = trim($_POST['contact']    ?? '');
  $email      = trim($_POST['email']      ?? '');
  $event_type = trim($_POST['event_type'] ?? '');
  $event_date = trim($_POST['event_date'] ?? '');
  $location   = trim($_POST['location']   ?? '');
  $guests     = trim($_POST['guests']     ?? '');
  $hours      = trim($_POST['hours']      ?? '');
  $message    = trim($_POST['message']    ?? '');

  if (!$name)    $errors[] = 'Full name is required.';
  if (!$contact) $errors[] = 'Contact number is required.';
  if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email address is required.';
  if (!$event_type) $errors[] = 'Please select an event type.';
  if (!$event_date) $errors[] = 'Preferred event date is required.';
  if (!$location)   $errors[] = 'Event location is required.';

  if (empty($errors)) {
    $success = true;
  }
}

include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero inquire-hero">
  <div class="container">
    <p class="section-label">Events & Catering</p>
    <h1>Book the <em>Cuz Cart</em></h1>
    <p class="page-hero-sub">Bring Cuz Coffee to your celebration. We'll brew, you enjoy.</p>
  </div>
</section>

<!-- WHAT IS CUZ CART -->
<section class="cuzcart-intro section-pad">
  <div class="container cuzcart-intro-grid">

    <!-- ── LEFT: IMAGE ── -->
    <div class="cuzcart-visual">
      <!-- ↓↓↓ REPLACE src with your image path ↓↓↓ -->
      <img
        src="assets/css/Images/cuzcart.jpg"
        alt="Cuz Cart mobile coffee setup"
        class="cuzcart-photo"
        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
      >
      <!-- ↑↑↑ REPLACE src with your image path ↑↑↑ -->
      <!-- Fallback if no image -->
      <div class="cuzcart-img-frame" style="display:none;">
        <div class="cuzcart-img-inner">
          <span class="cuzcart-big-icon">🚐☕</span>
        </div>
      </div>
    </div>

    <!-- ── RIGHT: TEXT ── -->
    <div class="cuzcart-text">
      <p class="section-label">What is Cuz Cart?</p>
      <h2>Your Event Deserves <em>Great Coffee</em></h2>
      <p class="body-text">The Cuz Cart is our mobile coffee setup — a fully equipped barista station on wheels that we bring straight to your event. Whether it's a wedding, birthday, corporate gathering, or school fair, we set up, brew, and serve.</p>
      <p class="body-text">Your guests get freshly made Cuz Coffee drinks while you focus on making memories.</p>
      <div class="cuzcart-highlights">
        <div class="cuzcart-hl"><span>🎉</span><p>Weddings & Debuts</p></div>
        <div class="cuzcart-hl"><span>🎂</span><p>Birthday Parties</p></div>
        <div class="cuzcart-hl"><span>💼</span><p>Corporate Events</p></div>
        <div class="cuzcart-hl"><span>🏫</span><p>School & Org Events</p></div>
        <div class="cuzcart-hl"><span>🛍️</span><p>Bazaars & Pop-ups</p></div>
        <div class="cuzcart-hl"><span>🎊</span><p>Any Celebration!</p></div>
      </div>
    </div>

  </div>
</section>

<style>
/* ===== CUZ CART SIDE LAYOUT ===== */
.cuzcart-intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 48px;
  align-items: center;
}

/* Photo */
.cuzcart-visual {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  aspect-ratio: 4 / 5;
  background: #2b1c0a;
}
.cuzcart-photo {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  border-radius: 16px;
  transition: transform 0.6s ease;
}
.cuzcart-visual:hover .cuzcart-photo {
  transform: scale(1.04);
}

/* Responsive — stack on mobile */
@media (max-width: 768px) {
  .cuzcart-intro-grid {
    grid-template-columns: 1fr;
    gap: 28px;
  }
  .cuzcart-visual {
    aspect-ratio: 16 / 9;
  }
}
</style>

<!-- INQUIRY FORM -->
<section class="inquire-section section-pad inquire-bg">
  <div class="container inquire-wrap">

    <div class="inquire-header">
      <p class="section-label" style="color:var(--caramel-light)">Fill Out the Form</p>
      <h2 style="color:#fff;">Send Your <em>Inquiry</em></h2>
      <p style="color:rgba(255,255,255,.7); margin-top:10px;">We'll get back to you within 24 hours to discuss details and availability.</p>
    </div>

    <?php if($success): ?>
    <div class="form-success inquire-success">
      <span>🚐☕</span>
      <div>
        <strong>Inquiry sent successfully!</strong>
        <p>Thank you, <?= htmlspecialchars($name) ?>! We'll reach out to you at <?= htmlspecialchars($contact) ?> within 24 hours to confirm your booking.</p>
      </div>
    </div>
    <?php endif; ?>

    <?php if(!empty($errors)): ?>
    <div class="form-errors" style="max-width:760px; margin:0 auto 24px;">
      <?php foreach($errors as $e): ?><p>⚠ <?= htmlspecialchars($e) ?></p><?php endforeach; ?>
    </div>
    <?php endif; ?>

    <form method="POST" action="inquire.php" class="inquire-form">

      <div class="inquire-form-section">
        <h3 class="inquire-form-heading">👤 Your Details</h3>
        <div class="form-row">
          <div class="form-group">
            <label for="name">Full Name *</label>
            <input type="text" id="name" name="name" placeholder="Juan dela Cruz"
              value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <label for="contact">Contact Number *</label>
            <input type="text" id="contact" name="contact" placeholder="09XX XXX XXXX"
              value="<?= htmlspecialchars($_POST['contact'] ?? '') ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email Address *</label>
          <input type="email" id="email" name="email" placeholder="juan@email.com"
            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
        </div>
      </div>

      <div class="inquire-form-section">
        <h3 class="inquire-form-heading">🎉 Event Details</h3>
        <div class="form-row">
          <div class="form-group">
            <label for="event_type">Type of Event *</label>
            <select id="event_type" name="event_type" required>
              <option value="" disabled <?= empty($_POST['event_type']) ? 'selected' : '' ?>>Select event type</option>
              <option value="Wedding"         <?= ($_POST['event_type']??'')==='Wedding'         ?'selected':'' ?>>💍 Wedding</option>
              <option value="Debut"           <?= ($_POST['event_type']??'')==='Debut'           ?'selected':'' ?>>🎀 Debut / 18th Birthday</option>
              <option value="Birthday Party"  <?= ($_POST['event_type']??'')==='Birthday Party'  ?'selected':'' ?>>🎂 Birthday Party</option>
              <option value="Corporate Event" <?= ($_POST['event_type']??'')==='Corporate Event' ?'selected':'' ?>>💼 Corporate Event</option>
              <option value="School/Org Event"<?= ($_POST['event_type']??'')==='School/Org Event'?'selected':'' ?>>🏫 School / Org Event</option>
              <option value="Bazaar/Pop-up"   <?= ($_POST['event_type']??'')==='Bazaar/Pop-up'   ?'selected':'' ?>>🛍️ Bazaar / Pop-up</option>
              <option value="Other"           <?= ($_POST['event_type']??'')==='Other'           ?'selected':'' ?>>🎊 Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="event_date">Preferred Date *</label>
            <input type="date" id="event_date" name="event_date"
              value="<?= htmlspecialchars($_POST['event_date'] ?? '') ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="location">Event Location / Venue *</label>
          <input type="text" id="location" name="location" placeholder="e.g. Barangay Hall, Alijis, Roxas City"
            value="<?= htmlspecialchars($_POST['location'] ?? '') ?>" required>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="guests">Estimated Number of Guests</label>
            <select id="guests" name="guests">
              <option value="" disabled <?= empty($_POST['guests']) ? 'selected' : '' ?>>Select range</option>
              <option value="Below 50"    <?= ($_POST['guests']??'')==='Below 50'    ?'selected':'' ?>>Below 50</option>
              <option value="50–100"      <?= ($_POST['guests']??'')==='50–100'      ?'selected':'' ?>>50 – 100</option>
              <option value="100–200"     <?= ($_POST['guests']??'')==='100–200'     ?'selected':'' ?>>100 – 200</option>
              <option value="200–500"     <?= ($_POST['guests']??'')==='200–500'     ?'selected':'' ?>>200 – 500</option>
              <option value="500+"        <?= ($_POST['guests']??'')==='500+'        ?'selected':'' ?>>500+</option>
            </select>
          </div>
          <div class="form-group">
            <label for="hours">Hours of Service Needed</label>
            <select id="hours" name="hours">
              <option value="" disabled <?= empty($_POST['hours']) ? 'selected' : '' ?>>Select duration</option>
              <option value="2 hours"  <?= ($_POST['hours']??'')==='2 hours'  ?'selected':'' ?>>2 Hours</option>
              <option value="3 hours"  <?= ($_POST['hours']??'')==='3 hours'  ?'selected':'' ?>>3 Hours</option>
              <option value="4 hours"  <?= ($_POST['hours']??'')==='4 hours'  ?'selected':'' ?>>4 Hours</option>
              <option value="5+ hours" <?= ($_POST['hours']??'')==='5+ hours' ?'selected':'' ?>>5+ Hours</option>
              <option value="Full Day" <?= ($_POST['hours']??'')==='Full Day' ?'selected':'' ?>>Full Day</option>
            </select>
          </div>
        </div>
      </div>

      <div class="inquire-form-section">
        <h3 class="inquire-form-heading">💬 Additional Notes</h3>
        <div class="form-group">
          <label for="message">Tell us more about your event</label>
          <textarea id="message" name="message" rows="4"
            placeholder="Any special requests, preferred drinks, theme, or other details we should know..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
        </div>
      </div>

      <button type="submit" class="btn-primary full-width inquire-submit">
        🚐 Send My Inquiry
      </button>
      <p class="inquire-note">We'll respond within 24 hours. For urgent inquiries, message us on Facebook or Instagram @cuzcoffee.</p>

    </form>
  </div>
</section>

<!-- FAQ -->
<section class="faq-section section-pad">
  <div class="container faq-wrap">
    <div class="section-header">
      <p class="section-label">Got Questions?</p>
      <h2>Cuz Cart <em>FAQs</em></h2>
    </div>
    <div class="faq-list">
      <?php
      $faqs = [
        ['q'=>'How far in advance should I book?',
         'a'=>'We recommend booking at least 2 weeks before your event to secure your preferred date. For peak seasons (December, Valentine\'s, holidays), 1 month advance is ideal.'],
        ['q'=>'What areas do you cover?',
         'a'=>'We are based in Alijis, Roxas City and currently serve events within Roxas City and nearby barangays. Contact us to check availability for farther locations.'],
        ['q'=>'What drinks will be served at the event?',
         'a'=>'We serve our full menu including Coffee and Non-Coffee drinks. You can also request specific drinks for your event. Add-ons like Oat Milk, extra syrup, and espresso shots are available.'],
        ['q'=>'Is there a minimum number of guests?',
         'a'=>'There is no strict minimum, but the Cuz Cart package is most cost-effective for events with 50+ guests. Contact us and we\'ll find the right setup for your event.'],
        ['q'=>'How much does it cost?',
         'a'=>'Pricing depends on the number of guests, hours of service, and drinks requested. Submit your inquiry and we will send you a customized quote.'],
      ];
      foreach($faqs as $i => $faq): ?>
      <div class="faq-item" id="faq-<?= $i ?>">
        <button class="faq-question" onclick="toggleFaq(<?= $i ?>)">
          <span><?= $faq['q'] ?></span>
          <span class="faq-icon">+</span>
        </button>
        <div class="faq-answer" id="faq-ans-<?= $i ?>">
          <p><?= $faq['a'] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
function toggleFaq(id) {
  const ans  = document.getElementById('faq-ans-' + id);
  const icon = document.querySelector('#faq-' + id + ' .faq-icon');
  const open = ans.classList.toggle('open');
  icon.textContent = open ? '−' : '+';
}
</script>

<?php include 'includes/footer.php'; ?>