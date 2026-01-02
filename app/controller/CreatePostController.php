<?php
// ---- KẾT NỐI DATABASE ----
$host = "localhost";
$user = "root";
$pass = ""; // nếu bạn dùng XAMPP thường sẽ để trống
$dbname = "test_dacs2";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// ---- KIỂM TRA SUBMIT ----
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu từ form
    $post_type = $_POST["post_type"] ?? "";
    $title = $_POST["title"] ?? "";
    $description = $_POST["message"] ?? "";
    $category_id = $_POST["category_id"] ?? null;
    $found_date = $_POST["found_date"] ?? null;
    $city = $_POST["city"] ?? "";
    $address = $_POST["district"] ?? "";
    $contact_phone = $_POST["contact_phone"] ?? "";
    $contact_email = $_POST["contact_email"] ?? "";

    // ---- XỬ LÝ ẢNH ----
    $image_path = null;
    if (!empty($_FILES["photos"]["name"])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = time() . "_" . basename($_FILES["photos"]["name"]);
        $target_file = $target_dir . $file_name;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["photos"]["tmp_name"]);

        if ($check !== false) {
            if (move_uploaded_file($_FILES["photos"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            } else {
                echo "❌ Lỗi khi tải ảnh lên.";
                exit;
            }
        } else {
            echo "❌ File không phải là hình ảnh.";
            exit;
        }
    }

    // ---- THÊM DỮ LIỆU VÀO DATABASE ----
    $stmt = $conn->prepare("INSERT INTO posts 
        (post_type, title, description, category_id, found_date, city, address, image_path, contact_phone, contact_email)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssissssss",
        $post_type,
        $title,
        $description,
        $category_id,
        $found_date,
        $city,
        $address,
        $image_path,
        $contact_phone,
        $contact_email
    );

    $new_id = $conn->insert_id; // lấy id bài vừa thêm
header("Location: ../xem_bai.php?id=$new_id");
exit;


    $stmt->close();
    $conn->close();
}
?>
