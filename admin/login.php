<?php
    session_start();

    // --- XỬ LÝ ĐĂNG NHẬP ---
    $error = '';

    if (isset($_POST['btn_login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // 1. Kiểm tra tài khoản (Ở đây mình để cứng để test, sau này bạn kết nối SQL ở đây)
        if ($username === 'admin' && $password === '123456') {

            // Lưu session để biết là đã đăng nhập
            $_SESSION['user_id']   = 1;
            $_SESSION['user_name'] = 'Yuri Gokerayn';
            $_SESSION['user_role'] = 'admin';

            // Chuyển hướng vào trang quản trị
            header('Location: index.php');
            exit();
        } else {
            $error = 'Tên đăng nhập hoặc mật khẩu không đúng!';
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản trị - LoFo</title>
    <!-- Nhúng Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

    <div class="login-card">
        <div class="brand-section">
            <div class="logo">LoFo Admin</div>
            <div class="subtitle">Đăng nhập để quản lý hệ thống</div>
        </div>

        <!-- Hiện thông báo lỗi nếu có -->
        <?php if (! empty($error)): ?>
            <div class="error-msg">
                <i class="ri-error-warning-fill"></i>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label">Tên đăng nhập</label>
                <div class="input-wrapper">
                    <input type="text" name="username" class="form-input" placeholder="admin" required value="<?php echo isset($username) ? $username : '' ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Mật khẩu</label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="passInput" class="form-input" placeholder="••••••" required>
                    <!-- Nút hiện/ẩn mật khẩu -->
                    <i class="ri-eye-off-line input-icon" id="togglePass" onclick="togglePassword()"></i>
                </div>
            </div>

            <button type="submit" name="btn_login" class="btn-submit">Đăng nhập</button>
        </form>

        <div class="footer-link">
            Quên mật khẩu? <a href="#">Liên hệ kỹ thuật</a>
        </div>
    </div>

    <!-- Script xử lý hiện/ẩn mật khẩu -->
    <script>
        function togglePassword() {
            const passInput = document.getElementById('passInput');
            const icon = document.getElementById('togglePass');

            if (passInput.type === 'password') {
                passInput.type = 'text';
                icon.classList.remove('ri-eye-off-line');
                icon.classList.add('ri-eye-line');
            } else {
                passInput.type = 'password';
                icon.classList.remove('ri-eye-line');
                icon.classList.add('ri-eye-off-line');
            }
        }
    </script>
</body>
</html>