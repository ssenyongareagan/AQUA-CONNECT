<?php
require("trackdatabase.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Track Your Request - AQUA-Connect</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --primary: #0088cc;
      --primary-dark: #006699;
      --secondary: #f8f9fa;
      --accent: #17a2b8;
      --text: #333333;
      --light-text: #6c757d;
      --white: #ffffff;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      --transition: all 0.3s ease;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background-color: #f0f5f9;
      color: var(--text);
      line-height: 1.6;
    }
    
    .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    header {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--white);
      padding: 20px 0;
      box-shadow: var(--shadow);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
    }
    
    .header-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .logo {
      display: flex;
      align-items: center;
    }
    
    .logo img {
      height: 40px;
      margin-right: 10px;
    }
    
    .logo-text {
      font-size: 1.5rem;
      font-weight: 600;
    }
    
    nav {
      display: flex;
    }
    
    .nav-links {
      display: flex;
      list-style: none;
    }
    
    .nav-links li {
      margin: 0 5px;
    }
    
    .nav-links a {
      color: var(--white);
      text-decoration: none;
      padding: 8px 15px;
      border-radius: 4px;
      transition: var(--transition);
      font-weight: 500;
    }
    
    .nav-links a:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }
    
    .nav-links a.active {
      background-color: rgba(255, 255, 255, 0.3);
    }
    
    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      color: var(--white);
      font-size: 1.5rem;
      cursor: pointer;
    }
    
    main {
      margin-top: 100px;
      padding: 40px 0 80px;
      min-height: calc(100vh - 180px);
    }
    
    .page-title {
      text-align: center;
      margin-bottom: 40px;
      color: var(--primary-dark);
    }
    
    .page-title h1 {
      font-size: 2.2rem;
      font-weight: 600;
      margin-bottom: 10px;
    }
    
    .page-title p {
      color: var(--light-text);
      font-size: 1.1rem;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .track-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 1000px;
      margin: 0 auto;
    }
    
    .track-card {
      background-color: var(--white);
      border-radius: 12px;
      box-shadow: var(--shadow);
      padding: 30px;
      width: 100%;
      max-width: 500px;
      margin-bottom: 30px;
    }
    
    .card-header {
      text-align: center;
      margin-bottom: 25px;
    }
    
    .card-header h2 {
      color: var(--primary);
      font-size: 1.5rem;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .card-header h2 i {
      margin-right: 10px;
      font-size: 1.25em;
    }
    
    .card-header p {
      color: var(--light-text);
    }
    
    .track-form {
      position: relative;
    }
    
    .form-group {
      margin-bottom: 25px;
    }
    
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--text);
    }
    
    .form-control {
      width: 100%;
      padding: 15px;
      border: 1px solid #dde1e5;
      border-radius: 6px;
      font-size: 1rem;
      transition: var(--transition);
      color: var(--text);
    }
    
    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(0, 136, 204, 0.15);
    }
    
    .form-control::placeholder {
      color: #b7b9bd;
    }
    
    .btn-primary {
      background-color: var(--primary);
      color: var(--white);
      border: none;
      padding: 14px 25px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 6px;
      cursor: pointer;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 100%;
    }
    
    .btn-primary:hover {
      background-color: var(--primary-dark);
      transform: translateY(-2px);
    }
    
    .btn-primary i {
      margin-right: 8px;
    }
    
    .recent-requests {
      display: flex;
      margin-top: 10px;
      flex-wrap: wrap;
      gap: 10px;
      justify-content: center;
    }
    
    .recent-request-item {
      background-color: rgba(0, 136, 204, 0.1);
      border-radius: 4px;
      padding: 5px 12px;
      color: var(--primary-dark);
      font-size: 0.9rem;
      cursor: pointer;
      transition: var(--transition);
    }
    
    .recent-request-item:hover {
      background-color: rgba(0, 136, 204, 0.2);
    }
    
    .or-separator {
      text-align: center;
      position: relative;
      margin: 25px 0;
      color: var(--light-text);
    }
    
    .or-separator:before,
    .or-separator:after {
      content: "";
      position: absolute;
      top: 50%;
      width: 40%;
      height: 1px;
      background-color: #dde1e5;
    }
    
    .or-separator:before {
      left: 0;
    }
    
    .or-separator:after {
      right: 0;
    }
    
    .qr-section {
      text-align: center;
    }
    
    .qr-code {
      width: 150px;
      height: 150px;
      margin: 20px auto;
      background-color: #fff;
      padding: 10px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .qr-text {
      color: var(--light-text);
      font-size: 0.9rem;
      margin-top: 10px;
    }
    
    .help-section {
      background-color: rgba(23, 162, 184, 0.1);
      border-radius: 8px;
      padding: 20px;
      margin-top: 30px;
      text-align: center;
      border-left: 4px solid var(--accent);
    }
    
    .help-section h3 {
      color: var(--accent);
      margin-bottom: 10px;
    }
    
    .help-section p {
      color: var(--light-text);
      margin-bottom: 15px;
    }
    
    .help-links {
      display: flex;
      justify-content: center;
      gap: 15px;
    }
    
    .help-links a {
      color: var(--accent);
      text-decoration: none;
      display: flex;
      align-items: center;
    }
    
    .help-links a i {
      margin-right: 5px;
    }
    
    .help-links a:hover {
      text-decoration: underline;
    }
    
    footer {
      background-color: var(--primary-dark);
      color: var(--white);
      padding: 20px 0;
      text-align: center;
    }
    
    .footer-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .footer-links {
      display: flex;
      list-style: none;
      gap: 20px;
    }
    
    .footer-links a {
      color: var(--white);
      text-decoration: none;
      font-size: 0.9rem;
      opacity: 0.8;
      transition: var(--transition);
    }
    
    .footer-links a:hover {
      opacity: 1;
    }
    
    .copyright {
      font-size: 0.9rem;
      opacity: 0.8;
    }
    
    @media (max-width: 768px) {
      .header-content {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .logo {
        margin-bottom: 15px;
      }
      
      .mobile-menu-btn {
        display: block;
        position: absolute;
        right: 20px;
        top: 20px;
      }
      
      .nav-links {
        display: none;
        flex-direction: column;
        width: 100%;
        margin-top: 15px;
      }
      
      .nav-links.active {
        display: flex;
      }
      
      .nav-links li {
        margin: 5px 0;
      }
      
      .nav-links a {
        display: block;
        padding: 10px 0;
      }
      
      main {
        margin-top: 150px;
      }
      
      .footer-content {
        flex-direction: column;
        gap: 15px;
      }
      
      .footer-links {
        flex-wrap: wrap;
        justify-content: center;
      }
      
      .help-links {
        flex-direction: column;
        gap: 10px;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <div class="header-content">
        <div class="logo">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRubONN9PduxMKddL4xeekBoXR-tnaYnyKQLA&s" alt="AQUA-Connect Logo">
          <div class="logo-text">AQUA-Connect</div>
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">
          <i class="fas fa-bars"></i>
        </button>
        <nav>
          <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="submit-request.php">Submit Request</a></li>
            <li><a href="Track-request.php" class="active">Track Request</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="FAQs.php">FAQ</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="page-title">
        <h1>Track Your Service Request</h1>
        <p>Monitor the status of your service request in real-time and receive updates on its progress</p>
      </div>
      
      <div class="track-section">
        <div class="track-card">
          <div class="card-header">
            <h2><i class="fas fa-search-location"></i> Request Tracker</h2>
            <p>Enter your request ID to check the current status</p>
          </div>
          
          <form class="track-form">
            <div class="form-group">
              <label for="request-id">Request ID</label>
              <input type="text" class="form-control" id="request-id" name="request-id" placeholder="e.g., AQC-2025-04567" required>
            </div>
            
            <button type="submit" class="btn-primary">
              <i class="fas fa-search"></i> Track Request
            </button>
            
            <div class="recent-requests">
              <span class="recent-request-item">AQC-2025-04567</span>
              <span class="recent-request-item">AQC-2025-04521</span>
            </div>
          </form>
          
          <div class="or-separator">OR</div>
          
          <div class="qr-section">
            <h3>Use Our Mobile App</h3>
            <p>Scan this QR code to download our app</p>
            <div class="qr-code">
              <img src="/api/placeholder/150/150" alt="QR Code">
            </div>
            <p class="qr-text">Get real-time notifications and updates directly on your phone</p>
          </div>
        </div>
        
        <div class="help-section">
          <h3>Need Assistance?</h3>
          <p>Can't find your request or having issues? Our support team is ready to help.</p>
          <div class="help-links">
            <a href="contact.php"><i class="fas fa-headset"></i> Contact Support</a>
            <a href="FAQs.php"><i class="fas fa-question-circle"></i> View FAQs</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <div class="container">
      <div class="footer-content">
        <ul class="footer-links">
          <li><a href="privacy.php">Privacy Policy</a></li>
          <li><a href="terms.php">Terms of Service</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div class="copyright">
          &copy; 2025 AQUA-Connect. All rights reserved.
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Mobile menu toggle
    document.getElementById('mobileMenuBtn').addEventListener('click', function() {
      document.getElementById('navLinks').classList.toggle('active');
    });
    
    // Recent request items functionality
    const recentItems = document.querySelectorAll('.recent-request-item');
    recentItems.forEach(item => {
      item.addEventListener('click', function() {
        document.getElementById('request-id').value = this.textContent;
      });
    });
    
    // Form submission
    document.querySelector('.track-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const requestId = document.getElementById('request-id').value;
      // Here you would normally handle the form submission via AJAX
      alert(`Tracking request ${requestId}. In a real implementation, this would show the status of your request.`);
    });
  </script>
</body>
</html>