
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AQUA-Connect | Water Service Portal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    :root {
      --primary: #0077b6;
      --primary-dark: #005f8f;
      --primary-light: #90e0ef;
      --accent: #00b4d8;
      --light: #f8f9fa;
      --dark: #212529;
      --success: #20c997;
      --gray: #6c757d;
      --gray-light: #e9ecef;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--dark);
      line-height: 1.6;
      background-color: var(--light);
    }
    
    /* Header Styles */
    header {
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      color: white;
      padding: 0;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .nav-container {
      max-width: 1400px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.75rem 2rem;
    }
    
    .logo-container {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .logo-container img {
      height: 40px;
      border-radius: 50%;
      background-color: white;
      padding: 3px;
    }
    
    .logo-text {
      font-size: 1.5rem;
      font-weight: 700;
      color: white;
    }
    
    .navbar {
      display: flex;
      align-items: center;
    }
    
    .nav-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }
    
    .nav-links li {
      position: relative;
      margin: 0 0.75rem;
    }

    .nav-links li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      padding: 0.75rem 0.5rem;
      display: block;
      transition: all 0.3s ease;
    }
    
    .nav-links li a:hover {
      color: var(--primary-light);
    }
    
    .nav-links li.active a {
      border-bottom: 3px solid white;
    }
    
    .hamburger {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
    }
    
    .btn-primary {
      background-color: white;
      color: var(--primary);
      font-weight: 600;
      padding: 0.5rem 1.5rem;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      display: inline-block;
      transition: all 0.3s ease;
      margin-left: 1rem;
    }
    
    .btn-primary:hover {
      background-color: var(--primary-light);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Hero Section */
    .hero {
      position: relative;
      height: 500px;
      display: flex;
      align-items: center;
      background: url('https://images.news18.com/ibnlive/uploads/2022/10/tap-water-166459739216x9.jpg') no-repeat center center/cover;
    }
    
    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(0deg, rgba(0, 77, 182, 0.8), rgba(0, 180, 216, 0.6));
    }
    
    .hero-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem;
      position: relative;
      z-index: 1;
      color: white;
      width: 100%;
    }
    
    .hero h1 {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 1rem;
      line-height: 1.2;
    }
    
    .hero p {
      font-size: 1.25rem;
      max-width: 600px;
      margin-bottom: 2rem;
    }
    
    .hero-buttons {
      display: flex;
      gap: 1rem;
    }
    
    .btn-secondary {
      background-color: transparent;
      color: white;
      font-weight: 600;
      padding: 0.5rem 1.5rem;
      border: 2px solid white;
      border-radius: 6px;
      text-decoration: none;
      display: inline-block;
      transition: all 0.3s ease;
    }
    
    .btn-secondary:hover {
      background-color: rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
    }
    
    /* Services Section */
    .section {
      padding: 5rem 2rem;
    }
    
    .section-title {
      text-align: center;
      margin-bottom: 3rem;
    }
    
    .section-title h2 {
      font-size: 2.5rem;
      font-weight: 700;
      position: relative;
      display: inline-block;
      color: var(--primary);
    }
    
    .section-title h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background-color: var(--accent);
      border-radius: 2px;
    }
    
    .section-subtitle {
      color: var(--gray);
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto;
      text-align: center;
    }
    
    .services-container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      padding: 2rem 0;
    }
    
    .service-card {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    
    .service-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    .service-img {
      height: 200px;
      width: 100%;
      object-fit: cover;
    }
    
    .service-content {
      padding: 1.5rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    
    .service-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--primary);
    }
    
    .service-description {
      margin-bottom: 1.5rem;
      flex-grow: 1;
    }
    
    .service-link {
      color: var(--accent);
      text-decoration: none;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-top: auto;
    }
    
    .service-link:hover {
      color: var(--primary);
    }
    
    /* Features Section */
    .features {
      background-color: var(--primary-light);
      background: linear-gradient(135deg, rgba(144, 224, 239, 0.4) 0%, rgba(202, 240, 248, 0.7) 100%);
    }
    
    .features-container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }
    
    .feature-card {
      background-color: white;
      padding: 2rem;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }
    
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .feature-icon {
      font-size: 2.5rem;
      color: var(--accent);
      margin-bottom: 1rem;
    }
    
    .feature-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--primary);
    }
    
    /* CTA Section */
    .cta {
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      color: white;
      text-align: center;
      padding: 4rem 2rem;
    }
    
    .cta-container {
      max-width: 800px;
      margin: 0 auto;
    }
    
    .cta h2 {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }
    
    .cta p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
    }
    
    .cta-btn {
      background-color: white;
      color: var(--primary);
      font-weight: 600;
      padding: 0.75rem 2rem;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      display: inline-block;
      transition: all 0.3s ease;
      font-size: 1.1rem;
    }
    
    .cta-btn:hover {
      background-color: var(--primary-light);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Footer */
    footer {
      background-color: var(--dark);
      color: white;
      padding: 4rem 2rem 2rem;
    }
    
    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
    }
    
    .footer-logo {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 1rem;
    }
    
    .footer-logo img {
      height: 40px;
      border-radius: 50%;
      background-color: white;
      padding: 3px;
    }
    
    .footer-column h3 {
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      position: relative;
      padding-bottom: 0.75rem;
    }
    
    .footer-column h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50px;
      height: 3px;
      background-color: var(--accent);
      border-radius: 2px;
    }
    
    .footer-links {
      list-style: none;
    }
    
    .footer-links li {
      margin-bottom: 0.75rem;
    }
    
    .footer-links a {
      color: var(--gray-light);
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .footer-links a:hover {
      color: var(--accent);
    }
    
    .contact-info {
      list-style: none;
    }
    
    .contact-info li {
      margin-bottom: 1rem;
      display: flex;
      align-items: flex-start;
      gap: 0.75rem;
    }
    
    .contact-info i {
      color: var(--accent);
      font-size: 1.2rem;
      margin-top: 0.25rem;
    }
    
    .social-icons {
      display: flex;
      gap: 1rem;
      margin-top: 1.5rem;
    }
    
    .social-icons a {
      color: white;
      background-color: rgba(255, 255, 255, 0.1);
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }
    
    .social-icons a:hover {
      background-color: var(--accent);
      transform: translateY(-3px);
    }
    
    .footer-bottom {
      max-width: 1200px;
      margin: 0 auto;
      padding-top: 2rem;
      margin-top: 3rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1rem;
    }
    
    .copyright {
      color: var(--gray);
    }
    
    .footer-bottom-links {
      display: flex;
      list-style: none;
      gap: 1.5rem;
    }
    
    .footer-bottom-links a {
      color: var(--gray);
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .footer-bottom-links a:hover {
      color: var(--accent);
    }
    
    /* Responsive Styles */
    @media (max-width: 992px) {
      .nav-links {
        position: fixed;
        flex-direction: column;
        background: var(--primary);
        top: 70px;
        left: 0;
        width: 100%;
        height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
        z-index: 999;
      }
      
      .nav-links.show {
        height: auto;
        padding: 1rem 0;
      }
      
      .nav-links li {
        margin: 0.5rem 0;
        width: 100%;
        text-align: center;
      }
      
      .hamburger {
        display: block;
      }
      
      .hero h1 {
        font-size: 2.5rem;
      }
    }
    
    @media (max-width: 768px) {
      .hero {
        height: 400px;
      }
      
      .hero-buttons {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .section {
        padding: 3rem 1.5rem;
      }
      
      .section-title h2 {
        font-size: 2rem;
      }
      
      .footer-bottom {
        flex-direction: column;
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="nav-container">
      <div class="logo-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRubONN9PduxMKddL4xeekBoXR-tnaYnyKQLA&s" alt="AQUA-Connect Logo">
        <span class="logo-text">AQUA-Connect</span>
      </div>
      <nav class="navbar">
        <ul class="nav-links">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="services.php">Services</a></li>
    
          <li><a href="submit-request.php">Submit Request</a></li>
          <li><a href="track-request.php">Track Request</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="faqs.php">FAQs</a></li>
        </ul>
        <a href="account.php" class="btn-primary">Customer Login</a>
        <button class="hamburger">
          <i class="fas fa-bars"></i>
        </button>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="hero-content">
      <h1>Clean Water Solutions<br>For A Better Tomorrow</h1>
      <p>Your reliable partner for all water and sanitation services. Submit, track, and resolve your requests with ease.</p>
      <div class="hero-buttons">
        <a href="submit-request.php" class="btn-primary">Submit A Request</a>
        <a href="track-request.php" class="btn-secondary">Track Your Request</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="section-title">
      <h2>Our Services</h2>
      <p class="section-subtitle">Comprehensive water and sanitation solutions for homes and businesses</p>
    </div>
    <div class="services-container">
      <div class="service-card">
        <img src="https://www.southwestwater.co.uk/siteassets/images/pipes/new_water_pipes_double.png" alt="New Water Connection" class="service-img">
        <div class="service-content">
          <h3 class="service-title">New Water Connection</h3>
          <p class="service-description">Apply for a new water connection for your home or business with our streamlined application process.</p>
          <a href="services/new-water-connection.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="service-card">
        <img src="https://www.drainwizard.co.uk/wp-content/uploads/2022/05/IMG_20190806_121606-scaled.jpg" alt="Sewer Connection" class="service-img">
        <div class="service-content">
          <h3 class="service-title">Sewer Connection</h3>
          <p class="service-description">Connect to our modern sewer network with professional installation and maintenance services.</p>
          <a href="services/sewer-connection.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="service-card">
        <img src="https://img.waterworld.com/files/base/ebm/ww/image/2022/03/16x9/2204WWft2_p01.622f4674f3076.png?auto=format,compress&fit=fill&fill=blur&w=1200&h=630" alt="Water Leaks Repair" class="service-img">
        <div class="service-content">
          <h3 class="service-title">Water Leak Repairs</h3>
          <p class="service-description">Report water leaks and pressure issues for prompt resolution by our expert technicians.</p>
          <a href="services/water-leak-repairs.php" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </section>

  <section class="section features">
    <div class="section-title">
      <h2>Why Choose Us</h2>
      <p class="section-subtitle">Experience the AQUA-Connect difference with our customer-focused approach</p>
    </div>
    <div class="features-container">
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-clipboard-check"></i>
        </div>
        <h3 class="feature-title">Easy Submission</h3>
        <p>Submit your service requests online with just a few clicks through our user-friendly interface.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-tachometer-alt"></i>
        </div>
        <h3 class="feature-title">Real-Time Tracking</h3>
        <p>Monitor the status of your requests in real-time and receive regular updates on progress.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-headset"></i>
        </div>
        <h3 class="feature-title">24/7 Support</h3>
        <p>Our dedicated customer support team is available around the clock to assist with any queries.</p>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="cta-container">
      <h2>Ready to Get Started?</h2>
      <p>Submit your water service request today and experience our efficient resolution process.</p>
      <a href="submit-request.php" class="cta-btn">Submit Request Now</a>
    </div>
  </section>

  <footer>
    <div class="footer-container">
      <div class="footer-column">
        <div class="footer-logo">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRubONN9PduxMKddL4xeekBoXR-tnaYnyKQLA&s" alt="AQUA-Connect Logo">
          <span class="logo-text">AQUA-Connect</span>
        </div>
        <p>Providing reliable water and sanitation services for over 25 years. Your trusted partner for all water-related needs.</p>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="footer-column">
        <h3>Quick Links</h3>
        <ul class="footer-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="submit-request.php">Submit Request</a></li>
          <li><a href="track-request.php">Track Request</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Our Services</h3>
        <ul class="footer-links">
          <li><a href="services/new-water-connection.php">New Water Connection</a></li>
          <li><a href="services/sewer-connection.php">Sewer Connection</a></li>
          <li><a href="services/water-leak-repairs.php">Water Leak Repairs</a></li>
          <li><a href="services/billing-inquiries.php">Billing Inquiries</a></li>
          <li><a href="services/water-quality.php">Water Quality Testing</a></li>
          <li><a href="services/maintenance.php">Maintenance Services</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Contact Us</h3>
        <ul class="contact-info">
          <li>
            <i class="fas fa-map-marker-alt"></i>
            <span>123 Water Street, Cityville, State 12345</span>
          </li>
          <li>
            <i class="fas fa-phone-alt"></i>
            <span>+256 705150599</span>
          </li>
          <li>
            <i class="fas fa-envelope"></i>
            <span>info@aqua-connect.com</span>
          </li>
          <li>
            <i class="fas fa-clock"></i>
            <span>Monday - Friday: 8:00 AM - 8:00 PM<br>Saturday: 9:00 AM - 5:00 PM</span>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="copyright">&copy; 2025 AQUA-Connect. All rights reserved.</p>
      <ul class="footer-bottom-links">
        <li><a href="privacy-policy.php">Privacy Policy</a></li>
        <li><a href="terms-of-service.php">Terms of Service</a></li>
        <li><a href="sitemap.php">Sitemap</a></li>
      </ul>
    </div>
  </footer>

  <script>
    // Toggle mobile navigation
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    
    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('show');
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
      if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
        navLinks.classList.remove('show');
      }
    });
    
    // Highlight active nav item based on URL
    const currentLocation = location.href;
    const navItems = document.querySelectorAll('.nav-links li a');
    
    navItems.forEach(item => {
      if (item.href === currentLocation) {
        item.parentElement.classList.add('active');
      }
    });
  </script>
</body>
</html>
