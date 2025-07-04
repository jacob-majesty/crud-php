<?php
// delete.php - Handles client deletion

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Verify the request method and ID parameter
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare the DELETE statement
    $sql = "DELETE FROM clients WHERE id = ?";
    $stmt = $connection->prepare($sql);
    
    if ($stmt === false) {
        die("Prepare failed: " . $connection->error);
    }
    
    // Bind parameters and execute
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $successMessage = "Client deleted successfully";
    } else {
        $errorMessage = "Error deleting client: " . $stmt->error;
    }
    
    $stmt->close();
}

// Close connection and redirect
$connection->close();

// Redirect with appropriate message
if (isset($successMessage)) {
    header("Location: /crud-php/index.php?success=" . urlencode($successMessage));
} elseif (isset($errorMessage)) {
    header("Location: /crud-php/index.php?error=" . urlencode($errorMessage));
} else {
    header("Location: /crud-php/index.php");
}
exit;
?>