<?php
// Database connection configuration
$host = 'localhost';
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'aqua_connect';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
$successMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $subject = $conn->real_escape_string(trim($_POST['subject']));
    $message = $conn->real_escape_string(trim($_POST['message']));
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $successMessage = '<div class="error-message">Please enter a valid email address.</div>';
    } else {
        // Insert into database
        $sql = "INSERT INTO contact_messages (name, email, subject, message, created_at) 
                VALUES ('$name', '$email', '$subject', '$message', NOW())";
        
        if ($conn->query($sql) === TRUE) {
            $successMessage = '<div class="success-message">Your message has been sent successfully! We\'ll get back to you soon.</div>';
        } else {
            $successMessage = '<div class="error-message">Error: ' . $conn->error . '</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Aqua Connect</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <style>
    :root {
      --primary-color: #0096c7;
      --primary-dark: #0077b6;
      --secondary-color: #48cae4;
      --text-color: #333;
      --light-color: #f8f9fa;
      --gray-color: #6c757d;
      --success-color: #28a745;
      --error-color: #dc3545;
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

    /* Main Content */
    main {
      padding: 4rem 0;
    }

    .contact-container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      background-color: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    }

    .contact-info {
      padding: 2rem;
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
      color: white;
    }

    .contact-info h2 {
      margin-bottom: 1.5rem;
      font-size: 2rem;
    }

    .contact-info p {
      margin-bottom: 1.5rem;
      line-height: 1.8;
    }

    .contact-item {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .contact-icon {
      width: 40px;
      height: 40px;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 1rem;
    }

    .contact-text {
      font-size: 1rem;
    }

    .contact-text a {
      color: white;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .contact-text a:hover {
      color: var(--secondary-color);
    }

    .social-links {
      display: flex;
      margin-top: 2rem;
    }

    .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      margin-right: 1rem;
      color: white;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .social-links a:hover {
      background-color: white;
      color: var(--primary-color);
      transform: translateY(-3px);
    }

    /* Form Styles */
    .contact-form {
      padding: 2rem;
    }

    .contact-form h2 {
      margin-bottom: 1.5rem;
      font-size: 2rem;
      color: var(--primary-dark);
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      color: var(--gray-color);
      font-size: 0.9rem;
    }

    .form-control {
      width: 100%;
      padding: 0.75rem 1rem;
      font-size: 1rem;
      border: 1px solid #e1e5e9;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(0, 150, 199, 0.1);
    }

    textarea.form-control {
      min-height: 150px;
      resize: vertical;
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

    .btn-block {
      display: block;
      width: 100%;
    }

    .success-message {
      background-color: rgba(40, 167, 69, 0.1);
      color: var(--success-color);
      padding: 1rem;
      border-radius: 6px;
      margin-top: 1rem;
      border-left: 4px solid var(--success-color);
    }

    .error-message {
      background-color: rgba(220, 53, 69, 0.1);
      color: var(--error-color);
      padding: 1rem;
      border-radius: 6px;
      margin-top: 1rem;
      border-left: 4px solid var(--error-color);
    }

    /* Footer Styles */
    footer {
      background: var(--primary-dark);
      color: white;
      padding: 2rem 0 1rem;
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

    /* Responsive Styles */
    @media (max-width: 992px) {
      .contact-container {
        grid-template-columns: 1fr;
      }
    }

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
          <li><a href="contact.php" class="active">Contact</a></li>
          <li><a href="faqs.php">FAQs</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="contact-container">
        <div class="contact-info">
          <h2>Get in Touch</h2>
          <p>We're here to help with any questions you might have about our services. Reach out to us using any of the methods below or send us a message through the form.</p>
          
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="contact-text">
              <a href="mailto:support@aqua-connect.com">support@aqua-connect.com</a>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-phone-alt"></i>
            </div>
            <div class="contact-text">
              <a href="tel:+256123456789">+256 123 456 789</a>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="contact-text">
              123 Water Street, Kampala, Uganda
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-clock"></i>
            </div>
            <div class="contact-text">
              Monday - Friday: 8:00 AM - 6:00 PM
            </div>
          </div>
          
          <div class="social-links">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        
        <div class="contact-form">
          <h2>Send us a Message</h2>
          <form id="contactForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" id="subject" name="subject" class="form-control" placeholder="What is this regarding?">
            </div>
            
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" class="form-control" placeholder="Type your message here" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-block">Send Message</button>
            
            <?php if (!empty($successMessage)) echo $successMessage; ?>
          </form>
        </div>
      </div>
    </div>
  </main>

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
  </script>
</body>
</html>
<?php
// Close database connection
$conn->close();
?>