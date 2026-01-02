<?php
                                      // app/controller/PostController.php
require_once 'config/db_connect.php'; // Đảm bảo đường dẫn file connect đúng

class PostController
{
    public function detail()
    {
        global $conn; // Sử dụng biến kết nối từ db_connect.php

        // 1. Lấy ID từ URL
        // Sử dụng toán tử null coalescing để đảm bảo không lỗi nếu không có id
        $post_id = $_GET['id'] ?? null;

        // 2. Kiểm tra ID hợp lệ
        if (! $post_id || ! is_numeric($post_id)) {
            // Hiển thị thông báo lỗi đẹp hơn hoặc chuyển hướng trang 404
            echo "<div style='text-align:center; margin-top:50px;'>";
            echo "<h3 style='color:red;'>❌ Lỗi: ID bài viết không hợp lệ.</h3>";
            echo "<a href='index.php?page=home' style='text-decoration:underline;'>Quay lại trang chủ</a>";
            echo "</div>";
            return; // Dừng hàm
        }

        // 3. Truy vấn SQL để lấy thông tin chi tiết bài viết
        // Lấy tất cả các trường để View có thể hiển thị đầy đủ (bao gồm lat, lng cho bản đồ)
        $sql = "SELECT * FROM posts WHERE id = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $post_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                echo "<div style='text-align:center; margin-top:50px;'>";
                echo "<h3 style='color:red;'>❌ Lỗi: Bài viết không tồn tại hoặc đã bị xóa.</h3>";
                echo "<a href='index.php?page=home' style='text-decoration:underline;'>Quay lại trang chủ</a>";
                echo "</div>";
                $stmt->close();
                return;
            }

            // Lấy dữ liệu bài viết
            $post = $result->fetch_assoc();
            $stmt->close();

            // 4. Gọi View để hiển thị giao diện
            // Truyền biến $post sang view (View sẽ dùng biến này)
            // Đảm bảo tên file view khớp với file bạn đã tạo: detail_view.php
            if (file_exists('app/view/post/detail_view.php')) {
                require_once 'app/view/post/detail_view.php';
            } else {
                echo "Lỗi: Không tìm thấy file giao diện (app/view/post/detail_view.php)";
            }

        } else {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $conn->error;
        }
    }
}
