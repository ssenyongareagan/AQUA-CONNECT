<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aqua_connect";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $issue = htmlspecialchars($_POST['issue']);
    $urgency = htmlspecialchars($_POST['urgency']);
    $description = htmlspecialchars($_POST['description']);
    $photo_path = NULL;
    
    // Handle file upload if present
    if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $allowed = array('jpg', 'jpeg', 'png');
        $filename = $_FILES['attachment']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        // Verify file extension
        if(in_array(strtolower($filetype), $allowed)) {
            // Check file size (5MB max)
            if($_FILES['attachment']['size'] < 5000000) {
                // Create unique filename
                $new_filename = uniqid() . '.' . $filetype;
                $upload_path = 'uploads/' . $new_filename;
                
                // Create uploads directory if it doesn't exist
                if (!file_exists('uploads')) {
                    mkdir('uploads', 0777, true);
                }
                
                // Upload file
                if(move_uploaded_file($_FILES['attachment']['tmp_name'], $upload_path)) {
                    $photo_path = $upload_path;
                }
            }
        }
    }
    
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO service_requests (name, email, phone, service_address, issue_type, urgency_level, description, photo_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("ssssssss", $name, $email, $phone, $address, $issue, $urgency, $description, $photo_path);
    
    // Execute SQL
    if($stmt->execute()) {
        // Get the request ID for reference
        $request_id = $conn->insert_id;
        
        // Return success response
        $response = array(
            'status' => 'success',
            'message' => 'Your request has been submitted successfully!',
            'request_id' => $request_id
        );
        echo json_encode($response);
    } else {
        // Return error response
        $response = array(
            'status' => 'error',
            'message' => 'Sorry, there was an error submitting your request. Please try again.'
        );
        echo json_encode($response);
    }
    
    // Close statement
    $stmt->close();
    
    // Close connection
    $conn->close();
    exit;
}
?>