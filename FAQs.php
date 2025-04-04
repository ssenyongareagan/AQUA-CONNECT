<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frequently Asked Questions | Aqua Connect</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <style>
    :root {
      --primary-color: #0096c7;
      --primary-dark: #0077b6;
      --secondary-color: #48cae4;
      --text-color: #333;
      --light-color: #f8f9fa;
      --gray-color: #6c757d;
      --light-blue: #e6f2ff;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      color: var(--text-color);
      background-color: #f0f7ff;
    }

    /* Header Styles */
    header {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
      padding: 1rem 0;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }

    .header-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: white;
    }

    .logo img {
      height: 40px;
      margin-right: 10px;
      border-radius: 50%;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    .logo h2 {
      font-size: 1.5rem;
      font-weight: 600;
    }

    .logo span {
      color: var(--secondary-color);
    }

    /* Navigation */
    nav {
      position: relative;
    }

    .menu-toggle {
      display: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
      background: none;
      border: none;
    }

    .nav-menu {
      display: flex;
      list-style: none;
    }

    .nav-menu li {
      margin: 0 1rem;
    }

    .nav-menu li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      padding: 0.5rem 0;
      position: relative;
      transition: all 0.3s ease;
    }

    .nav-menu li a:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: var(--secondary-color);
      transition: width 0.3s ease;
    }

    .nav-menu li a:hover:after {
      width: 100%;
    }

    .nav-menu li a.active {
      color: var(--secondary-color);
    }

    .nav-menu li a.active:after {
      width: 100%;
    }

    /* Page Header */
    .page-header {
      text-align: center;
      padding: 3rem 0 2rem;
    }

    .page-header h1 {
      font-size: 2.5rem;
      color: var(--primary-dark);
      margin-bottom: 1rem;
      position: relative;
      display: inline-block;
    }

    .page-header h1:after {
      content: '';
      position: absolute;
      left: 50%;
      bottom: -10px;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: var(--secondary-color);
    }

    .page-header p {
      max-width: 700px;
      margin: 0 auto;
      color: var(--gray-color);
    }

    /* FAQ Styles */
    .faq-container {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
      padding: 2rem;
      margin-bottom: 4rem;
    }

    .faq-filter {
      display: flex;
      justify-content: center;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .filter-btn {
      background: none;
      border: none;
      padding: 0.5rem 1.5rem;
      margin: 0.5rem;
      font-size: 0.9rem;
      font-weight: 500;
      color: var(--gray-color);
      border-radius: 30px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .filter-btn:hover {
      color: var(--primary-color);
    }

    .filter-btn.active {
      background-color: var(--primary-color);
      color: white;
    }

    .faq-item {
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      margin-bottom: 1rem;
    }

    .faq-question {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 0;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .faq-question h3 {
      font-size: 1.2rem;
      font-weight: 500;
      color: var(--text-color);
      transition: color 0.3s ease;
    }

    .faq-question:hover h3 {
      color: var(--primary-color);
    }

    .faq-toggle {
      background-color: var(--light-blue);
      width: 30px;
      height: 30px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .faq-toggle i {
      color: var(--primary-color);
      font-size: 0.8rem;
      transition: transform 0.3s ease;
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
    }

    .faq-answer-content {
      padding: 0 0 1.5rem;
      color: var(--gray-color);
    }

    .faq-item.active .faq-question h3 {
      color: var(--primary-color);
    }

    .faq-item.active .faq-toggle {
      background-color: var(--primary-color);
    }

    .faq-item.active .faq-toggle i {
      color: white;
      transform: rotate(45deg);
    }

    .faq-item.active .faq-answer {
      max-height: 1000px;
    }

    .help-section {
      text-align: center;
      margin: 3rem 0;
      padding: 2rem;
      background-color: var(--light-blue);
      border-radius: 12px;
    }

    .help-section h2 {
      color: var(--primary-dark);
      margin-bottom: 1rem;
    }

    .help-section p {
      max-width: 700px;
      margin: 0 auto 1.5rem;
    }

    .btn {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      font-weight: 500;
      text-align: center;
      text-decoration: none;
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn:hover {
      background-color: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 119, 182, 0.2);
    }

    /* Footer Styles */
    footer {
      background: var(--primary-dark);
      color: white;
      padding: 2rem 0 1rem;
      margin-top: 3rem;
    }

    .footer-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
    }

    .footer-section h3 {
      position: relative;
      padding-bottom: 0.5rem;
      margin-bottom: 1.5rem;
      font-size: 1.2rem;
    }

    .footer-section h3:after {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      width: 50px;
      height: 2px;
      background: var(--secondary-color);
    }

    .footer-links {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 0.75rem;
    }

    .footer-links a {
      color: #ccc;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .footer-links a:hover {
      color: white;
      margin-left: 5px;
    }

    .copyright {
      text-align: center;
      padding-top: 2rem;
      margin-top: 2rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      font-size: 0.9rem;
    }

    /* Search Section */
    .search-section {
      margin-bottom: 2rem;
    }

    .search-form {
      display: flex;
      max-width: 600px;
      margin: 0 auto;
    }

    .search-input {
      flex: 1;
      padding: 0.75rem 1rem;
      border: 1px solid #e1e5e9;
      border-right: none;
      border-radius: 6px 0 0 6px;
      font-size: 1rem;
    }

    .search-input:focus {
      outline: none;
      border-color: var(--primary-color);
    }

    .search-btn {
      padding: 0.75rem 1.5rem;
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 0 6px 6px 0;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .search-btn:hover {
      background-color: var(--primary-dark);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        text-align: center;
      }

      .logo {
        margin-bottom: 1rem;
      }

      .menu-toggle {
        display: block;
        position: absolute;
        top: -45px;
        right: 0;
      }

      .nav-menu {
        display: none;
        flex-direction: column;
        width: 100%;
        background-color: var(--primary-dark);
        position: absolute;
        top: 100%;
        left: 0;
        padding: 1rem 0;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        border-radius: 0 0 8px 8px;
      }

      .nav-menu.active {
        display: flex;
      }

      .nav-menu li {
        margin: 0.5rem 1rem;
      }

      .footer-container {
        grid-template-columns: 1fr;
      }

      .search-form {
        flex-direction: column;
      }

      .search-input {
        border-right: 1px solid #e1e5e9;
        border-radius: 6px;
        margin-bottom: 0.5rem;
      }

      .search-btn {
        border-radius: 6px;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="container header-container">
      <a href="index.php" class="logo">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRubONN9PduxMKddL4xeekBoXR-tnaYnyKQLA&s" alt="Aqua Connect Logo">
        <h2>Aqua<span>Connect</span></h2>
      </a>
      <nav>
        <button class="menu-toggle" id="menuToggle">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu" id="navMenu">
          <li><a href="index.php">Home</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="submit-request.php">Submit Request</a></li>
          <li><a href="track-request.php">Track Request</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="faqs.php" class="active">FAQs</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container">
    <div class="page-header">
      <h1>Frequently Asked Questions</h1>
      <p>Find answers to the most common questions about our water services and support system.</p>
    </div>

    <div class="search-section">
      <form class="search-form">
        <input type="text" class="search-input" placeholder="Search for questions...">
        <button type="submit" class="search-btn">
          <i class="fas fa-search"></i> Search
        </button>
      </form>
    </div>

    <div class="faq-filter">
      <button class="filter-btn active" data-filter="all">All Questions</button>
      <button class="filter-btn" data-filter="requests">Water Requests</button>
      <button class="filter-btn" data-filter="services">Services</button>
      <button class="filter-btn" data-filter="billing">Billing</button>
      <button class="filter-btn" data-filter="technical">Technical Issues</button>
    </div>

    <div class="faq-container">
      <div class="faq-item active" data-category="requests">
        <div class="faq-question">
          <h3>How do I submit a request?</h3>
          <div class="faq-toggle">
            <i class="fas fa-plus"></i>
          </div>
        </div>
        <div class="faq-answer">
          <div class="faq-answer-content">
            <p>To submit a request, follow these simple steps:</p>
            <ol>
              <li>Visit the "Submit Request" page from the main navigation menu</li>
              <li>Fill out the required details in the form, including your name, contact information, and the nature of your request</li>
              <li>Add any relevant attachments if needed (photos, documents)</li>
              <li>Review your information and click the "Submit" button</li>
              <li>You'll receive a confirmation email with your unique request ID for tracking purposes</li>
            </ol>
            <p>Our team typically responds to new requests within 24-48 hours during business days.</p>
          </div>
        </div>
      </div>

      <div class="faq-item" data-category="requests">
        <div class="faq-question">
          <h3>How can I track my request?</h3>
          <div class="faq-toggle">
            <i class="fas fa-plus"></i>
          </div>
        </div>
        <div class="faq-answer">
          <div class="faq-answer-content">
            <p>Tracking your request is easy:</p>
            <ol>
              <li>Go to the "Track Request" page in the main navigation</li>
              <li>Enter your unique request ID (provided in your confirmation email)</li>
              <li>Click "Track" to view the current status of your request</li>
            </ol>
            <p>The system will show you the current status, assigned team member, and estimated completion date. You can also add comments or additional information to your existing request through this tracking system.</p>
          </div>
        </div>
      </div>

      <div class="faq-item" data-category="services">
        <div class="faq-question">
          <h3>What types of issues can I report?</h3>
          <div class="faq-toggle">
            <i class="fas fa-plus"></i>
          </div>
        </div>
        <div class="faq-answer">
          <div class="faq-answer-content">
            <p>You can report various water-related issues through our system, including:</p>
            <ul>
              <li><strong>Water Supply Issues:</strong> Leaks, low water pressure, water quality concerns</li>
              <li><strong>Installation Requests:</strong> New water connections, meter installations</li>
              <li><strong>Maintenance:</strong> Pipe repairs, valve replacements, general maintenance</li>
              <li><strong>Billing Inquiries:</strong> Questions about your water bill, payment issues</li>
              <li><strong>Service Interruptions:</strong> Reporting planned or unexpected water outages</li>
            </ul>
            <p>If you're unsure whether your issue can be handled through our system, please contact our customer support team for assistance.</p>
          </div>
        </div>
      </div>

      <div class="faq-item" data-category="billing">
        <div class="faq-question">
          <h3>How is my water bill calculated?</h3>
          <div class="faq-toggle">
            <i class="fas fa-plus"></i>
          </div>
        </div>
        <div class="faq-answer">
          <div class="faq-answer-content">
            <p>Your water bill is calculated based on your water consumption as measured by your water meter. The billing process follows these steps:</p>
            <ol>
              <li>Your meter is read at the beginning and end of each billing cycle</li>
              <li>The difference between readings determines your water usage in cubic meters</li>
              <li>Usage is multiplied by the current water rate for your area and property type</li>
              <li>Additional fixed charges may apply (service fee, infrastructure maintenance)</li>
            </ol>
            <p>For detailed information about rates and charges specific to your area, please visit our billing section or contact customer support.</p>
          </div>
        </div>
      </div>

      <div class="faq-item" data-category="technical">
        <div class="faq-question">
          <h3>What should I do in case of a water emergency?</h3>
          <div class="faq-toggle">
            <i class="fas fa-plus"></i>
          </div>
        </div>
        <div class="faq-answer">
          <div class="faq-answer-content">
            <p>In case of a water emergency such as a major leak or burst pipe:</p>
            <ol>
              <li>First, locate and turn off your main water valve to minimize damage</li>
              <li>Call our 24/7 emergency hotline at +256-123-456-790</li>
              <li>Provide your location and details about the emergency</li>
              <li>If safe to do so, take photos of the issue for our technicians</li>
              <li>Follow any safety instructions provided by our emergency team</li>
            </ol>
            <p>Our emergency response team operates around the clock and will dispatch technicians as quickly as possible for urgent situations.</p>
          </div>
        </div>
      </div>

      <div class="faq-item" data-category="services">
        <div class="faq-question">
          <h3>How long does it take to process a new water connection?</h3>
          <div class="faq-toggle">
            <i class="fas fa-plus"></i>
          </div>
        </div>
        <div class="faq-answer">
          <div class="faq-answer-content">
            <p>The processing time for new water connections depends on several factors:</p>
            <ul>
              <li><strong>Application Review:</strong> 3-5 business days</li>
              <li><strong>Site Inspection:</strong> 5-7 business days after application approval</li>
              <li><strong>Installation:</strong> 7-14 business days after inspection and payment</li>
            </ul>
            <p>The entire process typically takes 2-4 weeks from submission to completion, depending on your location, property type, and current workload. Priority processing is available for certain situations - please contact customer service for more information.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="help-section">
      <h2>Didn't Find What You're Looking For?</h2>
      <p>Our customer support team is ready to assist you with any other questions or concerns you might have about our water services.</p>
      <a href="contact.php" class="btn">Contact Us</a>
    </div>
  </div>

  <footer>
    <div class="container footer-container">
      <div class="footer-section">
        <h3>About Us</h3>
        <p>Aqua Connect is dedicated to providing reliable water services and solutions to communities across Uganda.</p>
      </div>
      
      <div class="footer-section">
        <h3>Quick Links</h3>
        <ul class="footer-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="about-us.php">About Us</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
      
      <div class="footer-section">
        <h3>Customer Support</h3>
        <ul class="footer-links">
          <li><a href="submit-request.php">Submit Request</a></li>
          <li><a href="track-request.php">Track Request</a></li>
          <li><a href="faqs.php">FAQs</a></li>
          <li><a href="privacy-policy.php">Privacy Policy</a></li>
        </ul>
      </div>
    </div>
    
    <div class="copyright">
      <p>&copy; 2025 Aqua Connect. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Mobile menu toggle
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.getElementById('navMenu').classList.toggle('active');
    });

    // FAQ toggle functionality
    document.querySelectorAll('.faq-question').forEach(question => {
      question.addEventListener('click', () => {
        const faqItem = question.parentElement;
        faqItem.classList.toggle('active');
      });
    });

    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(button => {
      button.addEventListener('click', () => {
        // Remove active class from all buttons
        document.querySelectorAll('.filter-btn').forEach(btn => {
          btn.classList.remove('active');
        });
        
        // Add active class to clicked button
        button.classList.add('active');
        
        const filter = button.getAttribute('data-filter');
        
        // Show/hide FAQ items based on filter
        document.querySelectorAll('.faq-item').forEach(item => {
          if (filter === 'all' || item.getAttribute('data-category') === filter) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  </script>
</body>
</html>