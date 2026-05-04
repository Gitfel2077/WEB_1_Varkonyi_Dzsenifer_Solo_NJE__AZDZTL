<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

require "db.php";

$email = $data["email"];
$password = $data["password"];

$stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        echo json_encode(["success" => true]);
        exit;
    }
}

echo json_encode(["success" => false]);
?>