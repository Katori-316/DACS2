<?php
    // Tên file: app/view/layout/header.php

    // === LOGIC PHP GIẢ ĐỊNH ===
    $currentPage    = isset($_GET['page']) ? $_GET['page'] : 'home';
    $user_logged_in = true; // Giả định đã đăng nhập
    $username       = "Hạnh Thúy";
    $user_email     = "thuyhanhdaidam@gmail.com";
    $avatar_url     = PUBLIC_URL . '/images/user-avatar.jpg'; // Đường dẫn avatar (đã sửa lỗi ảnh thường)

    function isCurrent($pageName, $currentPage)
    {
        return $pageName === $currentPage ? ' class="current"' : '';
    }

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>LoFo</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <!-- CÁC FILE CSS CỦA BẠN -->
    <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>/assets/css/chat_widget.css" />
    <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>/assets/css/profile_dropdown.css" />
    <link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>/assets/css/create-post.css" />


    <!-- NHÚNG FONT AWESOME CHO ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="homepage is-preload">
    <div id="page-wrapper">

        <nav id="nav">
            <div class="search-bar">
                <a href="index.php?page=home" class="logo">
<img src="<?php echo PUBLIC_URL; ?>/images/2.png" alt="Logo">
                </a>

                <div class="group">
                    <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                        <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                    </svg>
                    <input name="keyword" placeholder="Tìm kiếm..." type="search" class="input" />
                </div>

                <div class="user-section">
                    <a href="index.php?page=post" class="button primary">+ Đăng bài</a>

                    <!-- KHỐI TÀI KHOẢN (AVATAR + DROPDOWN) -->
                    <div class="profile-dropdown-container">
                        <div class="user-info">
                            <img src="<?php echo $avatar_url; ?>" alt="Avatar" class="avatar" />
                            <span><?php echo htmlspecialchars($username); ?></span>
                        </div>

                        <!-- DROPDOWN MENU -->
                        <div class="profile-dropdown-menu">
                            <!-- Phần Header: Tên và Email -->
                            <div class="menu-header">
                                <strong><?php echo htmlspecialchars($username); ?></strong>
                                <small><?php echo htmlspecialchars($user_email); ?></small>
                            </div>

                            <!-- Liên kết Trang Cá Nhân -->
                            <div class="menu-item">
                                <a href="index.php?page=profile">
                                    <i class="fa-solid fa-user"></i> Trang cá nhân
                                </a>
                            </div>

                            <!-- Liên kết Quản lý tin -->
                            <div class="menu-item">
                                <a href="index.php?page=my-posts">
                                    <i class="fa-solid fa-list-check"></i> Quản lý tin
                                </a>
                            </div>

                            <!-- Liên kết Đăng xuất -->
                            <div class="menu-item logout-item">
                                <a href="index.php?page=logout">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PHẦN THỨ HAI CỦA NAV (Menu chính) -->
            <ul>
                <li<?php echo isCurrent('home', $currentPage); ?>><a href="index.php?page=home">Trang chủ</a></li>
                <li<?php echo isCurrent('lost', $currentPage); ?>><a href="index.php?page=lost">Tin mất và thất lạc</a></li>
                <li<?php echo isCurrent('found', $currentPage); ?>><a href="index.php?page=found">Nhặt được và tìm thấy</a></li>
                <li<?php echo isCurrent('policy', $currentPage); ?>><a href="index.php?page=policy">Chính sách và điều khoản</a></li>
            </ul>
        </nav>
<!-- ... KHÔNG BAO GỒM PHẦN </body>, </footer> ... -->