<?php
$fullname = $_POST['fullname'];
$Email = $_POST['Email'];
$Phonenumber = $_POST['Phonenumber'];
$Birthdate = $_POST['Birthdate'];
$Gender = $_POST['Gender'];
$HomeAddress = $_POST['HomeAddress'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');

// Check connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO personal (fullname, Email, Phonenumber, Birthdate, Gender, HomeAddress) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("ssssss", $fullname, $Email, $Phonenumber, $Birthdate, $Gender, $HomeAddress);
    
    // Execute the statement
    $stmt->execute();
    echo "Saved successfully...";
    
    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>












