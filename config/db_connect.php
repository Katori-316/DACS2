<?php
$servername = "localhost";   // hoặc 127.0.0.1
$username = "root";          // tài khoản mặc định của XAMPP
$password = "";              // mật khẩu mặc định rỗng (nếu bạn chưa đặt)
$database = "test_dacs2"; // tên database bạn đang dùng

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Kết nối database thất bại: " . $conn->connect_error
    ]));
}

// Đặt charset UTF-8 để lưu tiếng Việt
$conn->set_charset("utf8mb4");
?>
