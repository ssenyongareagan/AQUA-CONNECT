<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Services | AQUA-Connect</title>
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
    
    /* Page Header - Updated with new background image */
    .page-header {
      background: linear-gradient(rgba(0, 77, 182, 0.8), rgba(0, 180, 216, 0.6)), url('https://images.news18.com/ibnlive/uploads/2022/10/tap-water-166459739216x9.jpg') no-repeat center center/cover;
      color: white;
      padding: 4rem 2rem;
      text-align: center;
    }
    
    .page-header h1 {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 1rem;
      position: relative;
      display: inline-block;
    }
    
    .page-header h1::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background-color: white;
      border-radius: 4px;
    }
    
    .breadcrumbs {
      margin-top: 2rem;
      font-size: 1.1rem;
    }
    
    .breadcrumbs a {
      color: white;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .breadcrumbs a:hover {
      color: var(--primary-light);
    }
    
    .breadcrumbs .separator {
      margin: 0 0.5rem;
    }
    
    /* Main Content */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }
    
    .services-intro {
      padding: 4rem 0;
      text-align: center;
    }
    
    .services-intro p {
      max-width: 800px;
      margin: 0 auto;
      font-size: 1.2rem;
      color: var(--gray);
    }
    
    /* Service Categories */
    .service-categories {
      display: flex;
      justify-content: center;
      gap: 1rem;
      flex-wrap: wrap;
      margin-bottom: 3rem;
    }
    
    .category-pill {
      background-color: white;
      color: var(--primary);
      border: 2px solid var(--primary);
      border-radius: 50px;
      padding: 0.5rem 1.5rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .category-pill:hover, .category-pill.active {
      background-color: var(--primary);
      color: white;
    }
    
    /* Service Grid */
    .services-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
      gap: 2rem;
      margin-bottom: 5rem;
    }
    
    .service-card {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
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
    
    .service-tag {
      display: inline-block;
      background-color: var(--primary-light);
      color: var(--primary-dark);
      font-size: 0.8rem;
      font-weight: 600;
      padding: 0.25rem 0.75rem;
      border-radius: 50px;
      margin-bottom: 1rem;
    }
    
    .service-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--primary);
    }
    
    .service-description {
      margin-bottom: 1.5rem;
      color: var(--gray);
      flex-grow: 1;
    }
    
    .service-features {
      margin-bottom: 1.5rem;
    }
    
    .service-features ul {
      list-style: none;
    }
    
    .service-features li {
      margin-bottom: 0.5rem;
      display: flex;
      align-items: flex-start;
      gap: 0.5rem;
    }
    
    .service-features li i {
      color: var(--accent);
      margin-top: 0.25rem;
    }
    
    .service-link {
      background-color: var(--primary);
      color: white;
      padding: 0.75rem 1.5rem;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      text-align: center;
      margin-top: auto;
      display: inline-block;
    }
    
    .service-link:hover {
      background-color: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Featured Service */
    .featured-service {
      background-color: white;
      padding: 3rem;
      border-radius: 10px;
      margin-bottom: 5rem;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 3rem;
      position: relative;
      overflow: hidden;
    }
    
    .featured-service::before {
      content: 'Featured';
      position: absolute;
      top: 20px;
      right: -35px;
      background-color: var(--accent);
      color: white;
      padding: 0.5rem 3rem;
      font-weight: 600;
      transform: rotate(45deg);
    }
    
    .featured-service-content {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    
    .featured-title {
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1.5rem;
    }
    
    .featured-description {
      margin-bottom: 2rem;
      font-size: 1.1rem;
      color: var(--gray);
    }
    
    .featured-features {
      margin-bottom: 2rem;
    }
    
    .featured-features ul {
      list-style: none;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }
    
    .featured-features li {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    
    .featured-features li i {
      color: var(--success);
      font-size: 1.2rem;
    }
    
    .featured-image {
      background: url('/api/placeholder/550/400') no-repeat center center/cover;
      border-radius: 8px;
    }
    
    /* Process Section */
    .process-section {
      padding: 5rem 0;
      background-color: var(--primary-light);
      background: linear-gradient(135deg, rgba(144, 224, 239, 0.4) 0%, rgba(202, 240, 248, 0.7) 100%);
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
      margin: 1.5rem auto 0;
    }
    
    .process-steps {
      display: flex;
      justify-content: space-between;
      margin-top: 4rem;
      position: relative;
    }
    
    .process-steps::before {
      content: '';
      position: absolute;
      top: 90px;
      left: 50px;
      right: 50px;
      height: 4px;
      background-color: white;
      z-index: 1;
    }
    
    .step {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      position: relative;
      z-index: 2;
      flex: 1;
    }
    
    .step-number {
      width: 60px;
      height: 60px;
      background-color: var(--primary);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      position: relative;
    }
    
    .step-number::after {
      content: '';
      position: absolute;
      top: -10px;
      left: -10px;
      right: -10px;
      bottom: -10px;
      border: 2px solid var(--primary);
      border-radius: 50%;
      opacity: 0.3;
    }
    
    .step-title {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1rem;
    }
    
    .step-description {
      font-size: 0.9rem;
      color: var(--gray);
      max-width: 200px;
    }
    
    /* FAQ Section */
    .faq-section {
      padding: 5rem 0;
    }
    
    .faq-container {
      max-width: 800px;
      margin: 0 auto;
    }
    
    .faq-item {
      margin-bottom: 1rem;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
    
    .faq-question {
      background-color: white;
      padding: 1.5rem;
      font-weight: 600;
      color: var(--primary);
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-left: 4px solid transparent;
      transition: all 0.3s ease;
    }
    
    .faq-question:hover {
      background-color: #f9f9f9;
    }
    
    .faq-question.active {
      border-left-color: var(--accent);
    }
    
    .faq-answer {
      background-color: white;
      padding: 0 1.5rem;
      max-height: 0;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    
    .faq-answer.show {
      padding: 1.5rem;
      max-height: 500px;
      border-top: 1px solid var(--gray-light);
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
      
      .featured-service {
        grid-template-columns: 1fr;
        gap: 2rem;
      }
      
      .featured-image {
        height: 300px;
      }
      
      .process-steps {
        flex-direction: column;
        gap: 3rem;
      }
      
      .process-steps::before {
        display: none;
      }
    }
    
    @media (max-width: 768px) {
      .services-grid {
        grid-template-columns: 1fr;
      }
      
      .featured-features ul {
        grid-template-columns: 1fr;
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
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="services.php">Services</a></li>
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

  <section class="page-header">
    <h1>Our Services</h1>
    <div class="breadcrumbs">
      <a href="index.php">Home</a>
      <span class="separator">></span>
      <span>Services</span>
    </div>
  </section>

  <div class="container">
    <section class="services-intro">
      <p>AQUA-Connect provides comprehensive water and sanitation solutions for residential, commercial, and industrial customers. Our services are designed to ensure clean, reliable water supply and proper waste management for a healthier community.</p>
    </section>

    <section class="service-categories">
      <div class="category-pill active">All Services</div>
      <div class="category-pill">Residential</div>
      <div class="category-pill">Commercial</div>
      <div class="category-pill">Industrial</div>
      <div class="category-pill">Emergency</div>
    </section>

    <section class="featured-service">
      <div class="featured-service-content">
        <h2 class="featured-title">Smart Water Monitoring System</h2>
        <p class="featured-description">Our state-of-the-art smart water monitoring system helps you track water usage in real-time, detect leaks instantly, and save on water bills. The system sends alerts to your mobile device when unusual water usage is detected.</p>
        <div class="featured-features">
          <ul>
            <li><i class="fas fa-check-circle"></i> Real-time monitoring</li>
            <li><i class="fas fa-check-circle"></i> Leak detection alerts</li>
            <li><i class="fas fa-check-circle"></i> Water usage analytics</li>
            <li><i class="fas fa-check-circle"></i> Mobile app integration</li>
            <li><i class="fas fa-check-circle"></i> Easy installation</li>
            <li><i class="fas fa-check-circle"></i> 24/7 technical support</li>
          </ul>
        </div>
        <a href="services/smart-water-monitoring.php" class="service-link">Learn More</a>
      </div>
      <div class="featured-image"></div>
    </section>

    <section class="services-grid">
      <div class="service-card">
        <img src="https://kwa.kerala.gov.in/wp-content/uploads/2020/08/connection.webp" alt="New Water Connection" class="service-img">
        <div class="service-content">
          <span class="service-tag">Residential</span>
          <h3 class="service-title">New Water Connection</h3>
          <p class="service-description">Get your new property connected to our water supply network with professional installation and competitive rates.</p>
          <div class="service-features">
            <ul>
              <li><i class="fas fa-check"></i> Same-week installation</li>
              <li><i class="fas fa-check"></i> Quality materials</li>
              <li><i class="fas fa-check"></i> Compliance certification</li>
            </ul>
          </div>
          <a href="services/new-water-connection.php" class="service-link">Apply Now</a>
        </div>
      </div>

      <div class="service-card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS536PGB4Z3C2T6mYHNAfal-50gxv98Du-MFQ&s" alt="Sewer Connection" class="service-img">
        <div class="service-content">
          <span class="service-tag">Residential</span>
          <h3 class="service-title">Sewer Connection</h3>
          <p class="service-description">Connect your property to our modern sewer network with professional installation services.</p>
          <div class="service-features">
            <ul>
              <li><i class="fas fa-check"></i> Complete installation</li>
              <li><i class="fas fa-check"></i> Environmental compliance</li>
              <li><i class="fas fa-check"></i> Affordable packages</li>
            </ul>
          </div>
          <a href="services/sewer-connection.php" class="service-link">Apply Now</a>
        </div>
      </div>

      <div class="service-card">
        <img src="https://www.johnmooreservices.com/wp-content/uploads/2022/06/water-leaks-featured-image.webp" alt="Water Leak Repairs" class="service-img">
        <div class="service-content">
          <span class="service-tag">Emergency</span>
          <h3 class="service-title">Water Leak Repairs</h3>
          <p class="service-description">Fast response team to detect and fix water leaks to prevent property damage and water wastage.</p>
          <div class="service-features">
            <ul>
              <li><i class="fas fa-check"></i> 24/7 emergency service</li>
              <li><i class="fas fa-check"></i> Advanced leak detection</li>
              <li><i class="fas fa-check"></i> Professional repairs</li>
            </ul>
          </div>
          <a href="services/water-leak-repairs.php" class="service-link">Request Service</a>
        </div>
      </div>

      <div class="service-card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHr5bURn4h-pnEyef29yqLfNJOYdwmP9QwNQ&s" alt="Water Quality Testing" class="service-img">
        <div class="service-content">
          <span class="service-tag">Residential</span>
          <h3 class="service-title">Water Quality Testing</h3>
          <p class="service-description">Comprehensive testing of your water supply to ensure it meets all safety and quality standards.</p>
          <div class="service-features">
            <ul>
              <li><i class="fas fa-check"></i> Certified lab testing</li>
              <li><i class="fas fa-check"></i> Detailed reports</li>
              <li><i class="fas fa-check"></i> Treatment recommendations</li>
            </ul>
          </div>
          <a href="services/water-quality-testing.php" class="service-link">Book Testing</a>
        </div>
      </div>

      <div class="service-card">
        <img src="https://cdn1.npcdn.net/images/1615363889_b37d4650ab6bcd16657b72b343cb9595_en.jpg