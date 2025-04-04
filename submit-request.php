<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aqua_connect";

// Create connection with error handling
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to utf8mb4 for proper encoding
    $conn->set_charset("utf8mb4");

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Initialize response array
        $response = array();
        
        // Validate required fields
        $required = ['name', 'email', 'phone', 'address', 'issue', 'urgency', 'description'];
        $missing = array();
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $missing[] = $field;
            }
        }
        
        if (!empty($missing)) {
            $response = array(
                'status' => 'error',
                'message' => 'Missing required fields: ' . implode(', ', $missing)
            );
            echo json_encode($response);
            exit;
        }
        
        // Get form data and sanitize inputs
        $name = $conn->real_escape_string(htmlspecialchars(trim($_POST['name'])));
        $email = $conn->real_escape_string(filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL));
        $phone = $conn->real_escape_string(htmlspecialchars(trim($_POST['phone'])));
        $address = $conn->real_escape_string(htmlspecialchars(trim($_POST['address'])));
        $issue = $conn->real_escape_string(htmlspecialchars(trim($_POST['issue'])));
        $urgency = $conn->real_escape_string(htmlspecialchars(trim($_POST['urgency'])));
        $description = $conn->real_escape_string(htmlspecialchars(trim($_POST['description'])));
        $photo_path = NULL;
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = array(
                'status' => 'error',
                'message' => 'Invalid email format'
            );
            echo json_encode($response);
            exit;
        }
        
        // Handle file upload if present
        if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $filename = $_FILES['attachment']['name'];
            $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $filesize = $_FILES['attachment']['size'];
            $tmp_name = $_FILES['attachment']['tmp_name'];
            
            // Verify file extension
            if(!in_array($filetype, $allowed)) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Only JPG, JPEG, PNG & GIF files are allowed'
                );
                echo json_encode($response);
                exit;
            }
            
            // Check file size (5MB max)
            $max_size = 5 * 1024 * 1024; // 5MB
            if($filesize > $max_size) {
                $response = array(
                    'status' => 'error',
                    'message' => 'File size must be less than 5MB'
                );
                echo json_encode($response);
                exit;
            }
            
            // Create upload directory if it doesn't exist
            $upload_dir = 'uploads/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            
            // Generate unique filename and set path
            $new_filename = uniqid('img_', true) . '.' . $filetype;
            $upload_path = $upload_dir . $new_filename;
            
            // Verify file is actually an image
            $check = getimagesize($tmp_name);
            if($check === false) {
                $response = array(
                    'status' => 'error',
                    'message' => 'File is not an image'
                );
                echo json_encode($response);
                exit;
            }
            
            // Upload file
            if(move_uploaded_file($tmp_name, $upload_path)) {
                $photo_path = $upload_path;
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'There was an error uploading your file'
                );
                echo json_encode($response);
                exit;
            }
        }
        
        // Prepare SQL statement with error handling
        $stmt = $conn->prepare("INSERT INTO service_requests 
            (name, email, phone, service_address, issue_type, urgency_level, description, photo_path, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        // Bind parameters
        $bind_result = $stmt->bind_param("ssssssss", $name, $email, $phone, $address, $issue, $urgency, $description, $photo_path);
        
        if (!$bind_result) {
            throw new Exception("Bind failed: " . $stmt->error);
        }
        
        // Execute SQL
        if($stmt->execute()) {
            // Get the request ID for reference
            $request_id = $conn->insert_id;
            
            // Log the successful submission (optional)
            error_log("New service request submitted - ID: $request_id");
            
            // Return success response
            $response = array(
                'status' => 'success',
                'message' => 'Your request has been submitted successfully!',
                'request_id' => $request_id
            );
        } else {
            // Return error response
            $response = array(
                'status' => 'error',
                'message' => 'Database error: ' . $stmt->error
            );
        }
        
        // Close statement
        $stmt->close();
        
        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        
        // Close connection
        $conn->close();
        exit;
    }
} catch (Exception $e) {
    // Handle any exceptions
    $response = array(
        'status' => 'error',
        'message' => 'An error occurred: ' . $e->getMessage()
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Request - AQUA-Connect</title>
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
      background-image: url('https://images.news18.com/ibnlive/uploads/2022/10/tap-water-166459739216x9.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
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
      width: 40px;
      margin-right: 10px;
      border-radius: 50%;
      object-fit: cover;
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
      padding: 40px 0;
      min-height: calc(100vh - 180px);
    }
    
    .page-title {
      text-align: center;
      margin-bottom: 40px;
      color: var(--white);
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
    }
    
    .page-title h1 {
      font-size: 2.2rem;
      font-weight: 600;
      margin-bottom: 10px;
    }
    
    .page-title p {
      color: var(--white);
      font-size: 1.1rem;
    }
    
    .form-card {
      background-color: var(--white);
      border-radius: 12px;
      box-shadow: var(--shadow);
      padding: 30px;
      max-width: 700px;
      margin: 0 auto;
      opacity: 0.95;
    }
    
    .form-header {
      margin-bottom: 25px;
    }
    
    .form-header h2 {
      color: var(--primary);
      font-size: 1.5rem;
      margin-bottom: 8px;
    }
    
    .form-header p {
      color: var(--light-text);
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
      padding: 12px 15px;
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
    
    textarea.form-control {
      min-height: 150px;
      resize: vertical;
    }
    
    .btn-primary {
      background-color: var(--primary);
      color: var(--white);
      border: none;
      padding: 12px 25px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 6px;
      cursor: pointer;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }
    
    .btn-primary:hover {
      background-color: var(--primary-dark);
      transform: translateY(-2px);
    }
    
    .btn-primary i {
      margin-right: 8px;
    }
    
    .form-submit {
      text-align: center;
    }
    
    .form-support {
      text-align: center;
      margin-top: 25px;
      color: var(--light-text);
      font-size: 0.9rem;
    }
    
    .form-support a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
    }
    
    .form-support a:hover {
      text-decoration: underline;
    }
    
    .urgency-select {
      display: flex;
      gap: 15px;
      margin-top: 10px;
    }
    
    .urgency-option {
      flex: 1;
      text-align: center;
      padding: 12px;
      border: 1px solid #dde1e5;
      border-radius: 6px;
      cursor: pointer;
      transition: var(--transition);
    }
    
    .urgency-option:hover {
      border-color: var(--primary);
    }
    
    .urgency-option.active {
      border-color: var(--primary);
      background-color: rgba(0, 136, 204, 0.08);
    }
    
    .urgency-option i {
      font-size: 1.5rem;
      margin-bottom: 8px;
      color: var(--light-text);
    }
    
    .urgency-option.active i {
      color: var(--primary);
    }
    
    .urgency-option span {
      display: block;
      font-weight: 500;
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
    
    /* Success and error message styles */
    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 6px;
      font-weight: 500;
      display: none;
    }
    
    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    
    .alert-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
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
      
      .urgency-select {
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
            <li><a href="submit-request.php" class="active">Submit Request</a></li>
            <li><a href="Track-request.php">Track Request</a></li>
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
        <h1>Submit a Service Request</h1>
        <p>Please provide the details of your water service issue and we'll address it promptly</p>
      </div>
      
      <div class="form-card">
        <div id="alert-message" class="alert" style="display: none;"></div>
        
        <div class="form-header">
          <h2><i class="fas fa-clipboard-list"></i> Request Details</h2>
          <p>Fields marked with an asterisk (*) are required</p>
        </div>
        
        <form id="requestForm" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Full Name *</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
          </div>
          
          <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
          </div>
          
          <div class="form-group">
            <label for="phone">Phone Number *</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
          </div>
          
          <div class="form-group">
            <label for="address">Service Address *</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your complete address" required>
          </div>
          
          <div class="form-group">
            <label for="issue">Issue Type *</label>
            <select class="form-control" id="issue" name="issue" required>
              <option value="" disabled selected>Select an issue type</option>
              <option value="water-quality">Water Quality</option>
              <option value="leakage">Water Leakage</option>
              <option value="no-water">No Water Supply</option>
              <option value="low-pressure">Low Water Pressure</option>
              <option value="billing">Billing Issue</option>
              <option value="connection">New Connection</option>
              <option value="other">Other</option>
            </select>
          </div>
          
          <div class="form-group">
            <label>Urgency Level</label>
            <div class="urgency-select">
              <div class="urgency-option" data-value="low">
                <i class="far fa-clock"></i>
                <span>Low</span>
                <small>Can wait a few days</small>
              </div>
              <div class="urgency-option active" data-value="medium">
                <i class="fas fa-hourglass-half"></i>
                <span>Medium</span>
                <small>Needs attention soon</small>
              </div>
              <div class="urgency-option" data-value="high">
                <i class="fas fa-exclamation-circle"></i>
                <span>High</span>
                <small>Urgent matter</small>
              </div>
            </div>
            <input type="hidden" name="urgency" id="urgency" value="medium">
          </div>
          
          <div class="form-group">
            <label for="description">Description of Issue *</label>
            <textarea class="form-control" id="description" name="description" placeholder="Please provide detailed information about your issue..." required></textarea>
          </div>
          
          <div class="form-group">
            <label for="attachment">Attach Photo (Optional)</label>
            <input type="file" class="form-control" id="attachment" name="attachment" accept="image/*">
            <small>Max file size: 5MB. Supported formats: JPG, PNG</small>
          </div>
          
          <div class="form-submit">
            <button type="submit" class="btn-primary">
              <i class="fas fa-paper-plane"></i> Submit Request
            </button>
          </div>
          
          <div class="form-support">
            Need immediate assistance? <a href="contact.php">Contact our support team</a>
          </div>
        </form>
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
    
    // Urgency selector
    const urgencyOptions = document.querySelectorAll('.urgency-option');
    const urgencyInput = document.getElementById('urgency');
    
    urgencyOptions.forEach(option => {
      option.addEventListener('click', function() {
        // Remove active class from all options
        urgencyOptions.forEach(opt => opt.classList.remove('active'));
        
        // Add active class to clicked option
        this.classList.add('active');
        
        // Set hidden input value
        urgencyInput.value = this.getAttribute('data-value');
      });
    });
    
    // Form submission with AJAX
    document.getElementById('requestForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const form = e.target;
      const formData = new FormData(form);
      const alertBox = document.getElementById('alert-message');
      
      // Show loading state
      const submitBtn = form.querySelector('button[type="submit"]');
      const originalBtnText = submitBtn.innerHTML;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
      submitBtn.disabled = true;
      
      fetch('submit-request.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          // Show success message
          alertBox.style.display = 'block';
          alertBox.className = 'alert alert-success';
          alertBox.textContent = data.message + ' Your request ID: ' + data.request_id;
          
          // Reset form
          form.reset();
          
          // Reset urgency selector to default
          urgencyOptions.forEach(opt => opt.classList.remove('active'));
          document.querySelector('.urgency-option[data-value="medium"]').classList.add('active');
          urgencyInput.value = 'medium';
        } else {
          // Show error message
          alertBox.style.display = 'block';
          alertBox.className = 'alert alert-error';
          alertBox.textContent = data.message;
        }
      })
      .catch(error => {
        // Show error message
        alertBox.style.display = 'block';
        alertBox.className = 'alert alert-error';
        alertBox.textContent = 'An error occurred while submitting your request. Please try again.';
      })
      .finally(() => {
        // Restore button state
        submitBtn.innerHTML = originalBtnText;
        submitBtn.disabled = false;
        
        // Scroll to alert message
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });
  </script>
</body>
</html>