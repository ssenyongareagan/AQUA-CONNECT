<?php
/**
 * Database Connection for Aqua Connect Contact System
 * 
 * This file handles the database connection configuration and provides
 * a function to get a database connection instance.
 */

// Database configuration constants
define('DB_HOST', 'localhost');     // Database host
define('DB_NAME', 'aqua_connect_contact');  // Database name
define('DB_USER', 'username');      // Database username - replace with actual username
define('DB_PASS', 'password');      // Database password - replace with actual password
define('DB_CHARSET', 'utf8mb4');    // Character set

/**
 * Establishes a connection to the database
 * 
 * @return PDO A PDO instance representing the database connection
 */
function getDbConnection() {
    try {
        // Set DSN (Data Source Name)
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        
        // Set PDO options
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,    // Throw exceptions for errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,          // Return data as associative arrays
            PDO::ATTR_EMULATE_PREPARES   => false,                     // Use real prepared statements
        ];
        
        // Create a new PDO instance
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        
        return $pdo;
    } catch (PDOException $e) {
        // Handle connection error
        die('Database Connection Error: ' . $e->getMessage());
    }
}

/**
 * Example usage: Getting all contact messages 
 */
function getAllContactMessages() {
    $db = getDbConnection();
    $query = "SELECT * FROM contact_messages ORDER BY created_at DESC";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return ['error' => 'Error fetching messages: ' . $e->getMessage()];
    }
}

/**
 * Example usage: Adding a new contact message
 */
function addContactMessage($name, $email, $subject, $message, $ipAddress, $userAgent) {
    $db = getDbConnection();
    $query = "INSERT INTO contact_messages (name, email, subject, message, ip_address, user_agent) 
              VALUES (:name, :email, :subject, :message, :ip_address, :user_agent)";
    
    try {
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':ip_address', $ipAddress);
        $stmt->bindParam(':user_agent', $userAgent);
        
        $stmt->execute();
        return ['success' => true, 'message_id' => $db->lastInsertId()];
    } catch (PDOException $e) {
        return ['success' => false, 'error' => 'Error adding message: ' . $e->getMessage()];
    }
}

// Example of usage in another file:
/*
require_once 'database.php';

// Get all messages
$messages = getAllContactMessages();

// Add a new message
$result = addContactMessage(
    'John Doe', 
    'john@example.com', 
    'Water Supply Issue',
    'I have not had water supply for the past 2 days.',
    $_SERVER['REMOTE_ADDR'],
    $_SERVER['HTTP_USER_AGENT']
);
*/
?>