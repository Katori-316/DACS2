<?php

header("Content-Type: application/json");
session_start();
require_once "db_connect.php"; // file kết nối DB

// Giả sử đã đăng nhập, lấy ID user từ session
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    echo json_encode(["status" => "error", "message" => "Bạn cần đăng nhập."]);
    exit;
}

$message = trim($_POST['message'] ?? '');

if ($message === '') {
    echo json_encode(["status" => "error", "message" => "Tin nhắn rỗng."]);
    exit;
}

// Lưu vào database
$stmt = $conn->prepare("
    INSERT INTO support_messages (user_id, sender_type, message, created_at)
    VALUES (?, 'user', ?, NOW())
");
$stmt->bind_param("is", $user_id, $message);

if ($stmt->execute()) {
    echo json_encode(["status" => "ok"]);
} else {
    echo json_encode(["status" => "error", "message" => "Không thể lưu tin nhắn."]);
}
