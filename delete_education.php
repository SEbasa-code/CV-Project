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

if (isset($data->id)) {
    $id = $data->id;

    $sql = "DELETE FROM education WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to delete education entry."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "ID not provided."]);
}

$conn->close();
?>
