<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database
    $conn = new mysqli("localhost", "root", "", "innovative");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO form_data (name, email, phone, help, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $help, $message);

    // Set parameters and execute
    $name = $_POST['form_fields']['name'];
    $email = $_POST['form_fields']['email'];
    $phone = $_POST['form_fields']['field_af8262f'];
    $help = $_POST['form_fields']['field_ecceb8c'];
    $message = $_POST['form_fields']['message'];
    $stmt->execute();

    echo "Form submitted successfully";

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Error: Form not submitted";
}
?>
