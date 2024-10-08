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

$year = $data->year;
$title = $data->title;
$description = $data->description;

$sql = "INSERT INTO experiance (year, title, description) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $year, $title, $description);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "id" => $conn->insert_id]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to add new experience."]);
}

$stmt->close();
$conn->close();
?>
