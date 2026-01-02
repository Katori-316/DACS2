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

    <style>
        /* --- COPY BỘ MÀU CỦA BẠN VÀO ĐÂY ĐỂ ĐỒNG BỘ --- */
        :root {
            --bg-dark: #0f0f11;
            --card-bg: #18181b;
            --text-primary: #ffffff;
            --text-secondary: #a1a1aa;
            --accent-red: #ff4d4f;
            --border-color: #27272a;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Inter", sans-serif; }

        body {
            background-color: var(--bg-dark);
            color: var(--text-primary);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Khung đăng nhập */
        .login-card {
            background: var(--card-bg);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .brand-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 32px;
            font-weight: 800;
            color: var(--accent-red);
            margin-bottom: 10px;
            display: inline-block;
        }

        .subtitle {
            color: var(--text-secondary);
            font-size: 14px;
        }

        /* Form Style */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 500;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            background: #0f0f11;
            border: 1px solid var(--border-color);
            padding: 12px 40px 12px 15px; /* Padding phải chừa chỗ cho icon */
            border-radius: 8px;
            color: #fff;
            outline: none;
            transition: 0.3s;
        }

        .form-input:focus {
            border-color: var(--accent-red);
        }

        /* Icon bên trong input (Con mắt) */
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: var(--accent-red);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* Thông báo lỗi */
        .error-msg {
            background: rgba(255, 77, 79, 0.1);
            color: var(--accent-red);
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .footer-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--text-secondary);
        }
        .footer-link a {
            color: var(--accent-red);
            text-decoration: none;
        }
    </style>
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