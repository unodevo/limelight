<style>
  /* Add a class to the footer container */
  .footer-container {
    background: linear-gradient(rgba(8, 46, 84, 0.6), rgba(8, 46, 84, 0.4)),
      url('images/footer.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }



  .bg-warning {
    background-color: rgba(14, 4, 123, 0.796) !important;
    /* Yellow with 50% transparency */
    padding: 20px 0;
    /* Add top and bottom padding as needed */
    margin: 20px 0;
    /* Add top and bottom margin as needed */
  }

  h5 {
    color: gold;
  }
  
  
  .copyright-section {
    font-weight: 400;
    font-size: 0.9em;
    text-align: center;
    padding: 10px 0;
}

.copyright-year {
    font-weight: 600;
}

.developer {
    font-style: italic;
}

.institution,
.project {
    font-weight: 600;
}

</style>
<footer class="bg-dark text-white py-5 footer-container">
  <div class="container">
    <div class="row">

      <!-- Privacy and Policy -->
      <div class="col-md-3">
        <h5>Policies</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Privacy</a></li>
          <li><a href="#" class="text-white">Policy</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-md-3">
        <h5>Contact Info</h5>
        <ul class="list-unstyled">
          <li><i class="fas fa-map-marker-alt"></i> Address: young street, Edinburgh</li>
          <li><i class="fas fa-phone"></i> Phone: +1 234 567 890</li>
          <li><i class="fas fa-envelope"></i> Email: info@limelight.com</li>
        </ul>
      </div>

      <!-- Events -->
      <div class="col-md-3">
        <h5>Events</h5>
        <ul class="list-unstyled">
          <li><a href="events.php" class="text-white">Events</a></li>
        </ul>
      </div>

      <!-- Contact Form -->
      <div class="col-md-3">
        <h5>Contact Us</h5>
        <form action="/path_to_your_script" method="post">
          <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="mb-3">
            <textarea name="message" class="form-control" rows="2" placeholder="Message" required></textarea>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-light">Send</button>
          </div>
        </form>
      </div>
     <div class="bg-warning copyright-section">
    <span class="copyright-year">© <?php echo date("Y"); ?></span>
    <span class="developer">Developed by Stefania Annunziata</span> | 
    <span class="institution">Edinburgh College</span> – 
    <span class="project">Project: Limelight Cinema</span>. All rights reserved.
</div>

      </div>
    </div>

  </div>

</footer>