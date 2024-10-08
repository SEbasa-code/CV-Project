<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cv_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));

// Ensure all expected data is present
if (isset($data->startYear, $data->endYear, $data->degree, $data->description)) {
    $startYear = $conn->real_escape_string($data->startYear);
    $endYear = $conn->real_escape_string($data->endYear);
    $degree = $conn->real_escape_string($data->degree);
    $description = $conn->real_escape_string($data->description);

    $sql = "INSERT INTO education (start_year, end_year, degree, description) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $startYear, $endYear, $degree, $description);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "id" => $conn->insert_id]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add new education."]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid data"]);
}

$conn->close();
?>
