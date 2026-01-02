<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Kết nối cấu hình
require_once 'config/config.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Danh sách các trang không cần header và footer (Layout tối giản)
$no_layout_pages = ['login', 'logout'];

// Kiểm tra xem trang hiện tại có cần Layout (Header/Footer) không
$needs_full_layout = ! in_array($page, $no_layout_pages);

// 4. Gọi Header CHỈ KHI CẦN
if ($needs_full_layout) {
    require_once 'app/view/layout/header.php';
}

// 5. Điều hướng nội dung
if ($page == 'home') {
    if (file_exists('app/view/home_view.php')) {
        include 'app/view/home_view.php';
    } else {
        echo "<h3 style='text-align:center; margin-top:50px; color:red'>Lỗi: Không tìm thấy file app/view/home_view.php</h3>";
    }
} elseif ($page == 'login') {
    include 'app/view/auth/login.php';
} elseif ($page == 'logout') {
    include 'app/view/auth/login.php';
} elseif ($page == 'post') {
    include 'app/view/post/create-post.php';
} elseif ($page == 'lost') {
    include 'app/view/home/lost.php';
} elseif ($page == 'policy') {
    include 'app/view/home/policy.php';
} elseif ($page == 'found') {
    include 'app/view/home/found.php';
} elseif ($page == 'my-posts') {
    include 'app/view/home/my-posts.php';
} elseif ($page == 'profile') {
    include 'app/view/home/profile.php';
} elseif ($page == 'detail') {
    if (file_exists('app/controller/PostController.php')) {
        require_once 'app/controller/PostController.php';
        $controller = new PostController();
        $controller->detail();
    } else {
        echo "Lỗi: Không tìm thấy PostController";
    }
} else {
    echo "<h3 style='text-align:center; padding: 50px;'>404 - Trang không tồn tại</h3>";
}

// 6. Gọi Footer CHỈ KHI CẦN
if ($needs_full_layout) {
    require_once 'app/view/layout/footer.php';
}
