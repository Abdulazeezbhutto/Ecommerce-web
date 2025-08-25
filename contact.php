<?php

include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();





?>

<?php if (isset($_GET['msg']) && !empty($_GET['msg'])): ?>
    <div class="container mt-3">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php echo htmlspecialchars($_GET['msg']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<!-- Contact Form Section -->
<section class="contact-form-section py-5">
  <div class="container">
    <h2 class="mb-4 text-center">Contact Us</h2>
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <form method = "POST" action = "contact_process.php">
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" placeholder="Your full name" name = "full_name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name = "email"required>
          </div>
          <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" placeholder="Subject" name = "subject" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Write your message here..."  name = "message" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-100" name = "submit" value = "submit_message">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Contact Info Section -->
<section class="contact-info-section py-5 bg-light">
  <div class="container">
    <div class="row text-center text-md-start g-4">
      
      <div class="col-md-4">
        <h5 class="mb-3">Our Address</h5>
        <p>123 Main Street, Cityname, Country</p>
      </div>
      
      <div class="col-md-4">
        <h5 class="mb-3">Call Us</h5>
        <p>Phone: <a href="tel:+1234567890" class="text-decoration-none">+1 234 567 890</a></p>
        <p>Fax: +1 234 567 891</p>
      </div>
      
      <div class="col-md-4">
        <h5 class="mb-3">Email & Social</h5>
        <p>Email: <a href="mailto:info@yourdomain.com" class="text-decoration-none">abdulazeezbhutto085@gmail.com</a></p>
        <div class="d-flex justify-content-center justify-content-md-start gap-3 mt-2">
          <a href="#" class="text-primary fs-4"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-info fs-4"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-danger fs-4"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-primary fs-4"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
      
    </div>
  </div>
</section>

<!-- Optional: Google Map Section -->
<section class="map-section">
  <div class="container-fluid p-0">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.019731054868!2d-122.41941568468188!3d37.77492977975925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c8f1f54d7%3A0xf37a8e99a5664b26!2sSan%20Francisco!5e0!3m2!1sen!2sus!4v1618324775552!5m2!1sen!2sus"
      width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
      title="Google Map"></iframe>
  </div>
</section>


















<?php WebConfig::footer(); ?>
