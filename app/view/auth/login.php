<?php
    // Khai báo biến đường dẫn an toàn:
    $public_url = '';

    // 1. Kiểm tra xem hằng số PUBLIC_URL đã được định nghĩa chưa (qua Router)
    if (defined('PUBLIC_URL')) {
        $public_url = PUBLIC_URL;
    } else {
        // 2. Nếu chưa, dùng đường dẫn tuyệt đối tĩnh (truy cập trực tiếp)
        $public_url = '/TEST_DACS2/public';
    }

    // 3. Sử dụng biến $public_url đã được đảm bảo để tạo các đường dẫn tài nguyên
    $css_link = $public_url . '/assets/css/login.css';
    $logo_src = $public_url . '/images/login.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoFo</title>
    <link rel="stylesheet" href="<?php echo $css_link; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
      <div class="container" id="container">
        <div class="form-container sign-up">
            <form id="registerForm" novalidate>
                <h1>Đăng Ký</h1>
                <br>
                <div class="input-group">
                    <input type="text" id="regName" placeholder="Họ và tên" required>
                    <div class="error-message" id="nameError"></div>
                </div>

                <div class="input-group">
                    <input type="email" id="regEmail" placeholder="Email" required>
                    <div class="error-message" id="emailError"></div>
                </div>

                <div class="input-group">
                    <input type="password" id="regPassword" placeholder="Mật Khẩu" required minlength="6">
                    <div class="error-message" id="passwordError"></div>
                </div>

                <div class="input-group">
                    <input type="password" id="regConfirmPassword" placeholder="Xác nhận mật khẩu" required>
                    <div class="error-message" id="confirmPasswordError"></div>
                </div>

                <button type="submit">Đăng Ký</button>
                <br>
                <span>Hoặc đăng nhập bằng tài khoản mạng xã hội</span>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </form>
        </div>
        <div class="form-container sign-in">
            <form id="loginForm" novalidate>
                <h1>Đăng Nhập</h1>
                <br>
                <div class="input-group">
                    <input type="email" id="loginEmail" placeholder="Email" required>
                    <div class="error-message" id="loginEmailError"></div>
                </div>

                <div class="input-group">
                    <input type="password" id="loginPassword" placeholder="Password" required>
                    <div class="error-message" id="loginPasswordError"></div>
                </div>

                <a href="#">Quên mật khẩu?</a>
                <button type="submit">Đăng Nhập</button>
                <br>
                <span>Hoặc đăng nhập bằng tài khoản mạng xã hội</span>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Chào mừng bạn trở lại!</h1>
                    <p>Nhập thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
                    <button class="hidden" id="login">Đăng Nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Chào bạn!</h1>
                    <p>Nếu bạn chưa có tài khoản, hãy đăng ký thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
                    <button class="hidden" id="register">Đăng Ký</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo $public_url; ?>/assets/js/login.js"></script>
</body>
</html>