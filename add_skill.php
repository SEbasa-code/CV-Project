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

$skillName = $data->skillName;
$skillLevel = $data->skillLevel;

$sql = "INSERT INTO skills (skill_name, skill_level) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $skillName, $skillLevel);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "id" => $conn->insert_id]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to add skill."]);
}

$stmt->close();
$conn->close();
?>
