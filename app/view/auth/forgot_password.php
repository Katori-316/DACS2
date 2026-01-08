<?php
    // Khai báo biến đường dẫn an toàn:
    $public_url = '';

    // 1. Kiểm tra xem hằng số PUBLIC_URL đã được định nghĩa chưa (qua Router)
    if (defined('PUBLIC_URL')) {
        $public_url = PUBLIC_URL;
    } else {
        // 2. Nếu chưa, dùng đường dẫn tuyệt đối tĩnh (truy cập trực tiếp)
        $public_url = '/DACS2/public';
    }

    // 3. Sử dụng biến $public_url đã được đảm bảo để tạo các đường dẫn tài nguyên
    $css_link = $public_url . '/assets/css/forgot_password.css';
    $logo_src = $public_url . '/images/login.png';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu - LoFo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="<?php echo $css_link; ?>">
</head>

<body>

    <div class="container">

        <div class="form-section">
            <form action="" method="POST" style="width: 100%; max-width: 380px; text-align: center;">
                <h1>Quên Mật Khẩu</h1>
                <span>Nhập email của bạn để nhận mã xác thực.</span>

                <div class="input-group">
                    <input type="email" name="email" placeholder="Nhập địa chỉ Email của bạn" required>
                </div>

                <button type="submit" class="btn-submit">Gửi yêu cầu</button>

                <a href="login.php" class="back-link">
                    <i class="fa-solid fa-arrow-left"></i> Quay lại đăng nhập
                </a>
            </form>
        </div>

        <div class="info-section">
            <h2>Đừng lo lắng!</h2>
            <p>Hãy kiểm tra kỹ hộp thư (bao gồm cả thư mục Spam/Rác) sau khi gửi yêu cầu nhé.</p>
        </div>

    </div>

</body>
</html>
