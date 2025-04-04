<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requestId = $_POST['request-id'];

    // Check if the request ID exists in the database
    $sql = "SELECT * FROM requests WHERE request_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $requestId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'data' => $row]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Request ID not found']);
    }

    $stmt->close();
    $conn->close();
}
?>