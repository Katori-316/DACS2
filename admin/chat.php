<?php
    // 1. Cấu hình
    $currentPage = 'chat';
    $pageTitle   = 'Hỗ trợ khách hàng';

    // 2. Nhúng khung giao diện
    require_once 'include/header.php';
    require_once 'include/sidebar.php';

?>
<main class="main-content">
    <?php require_once 'include/topbar.php'; ?>

    <div class="chat-container">

        <!-- CỘT TRÁI: DANH SÁCH USER -->
        <div class="chat-sidebar">
            <div class="chat-search">
                <i class="ri-search-line"></i>
                <input type="text" placeholder="Tìm người dùng..." id="search-user">
            </div>

            <div class="user-list" id="user-list-container">
                <!-- Danh sách user sẽ được JS render vào đây -->
                <!-- Loading giả lập -->
                <div class="user-item-skeleton"></div>
                <div class="user-item-skeleton"></div>
                <div class="user-item-skeleton"></div>
            </div>
        </div>

        <!-- CỘT PHẢI: KHUNG CHAT -->
        <div class="chat-window">

            <!-- Header của khung chat -->
            <div class="chat-header">
                <div class="current-user-info">
                    <img src="https://ui-avatars.com/api/?name=User&background=333&color=fff" id="chat-avatar" class="avatar-md">
                    <div>
                        <h4 id="chat-name">Chọn một người để chat</h4>
                        <span class="status-text" id="chat-status">Offline</span>
                    </div>
                </div>

            </div>

            <!-- Nội dung tin nhắn -->
            <div class="chat-body" id="chat-body">
                <div class="empty-state">
                    <div class="empty-icon"><i class="ri-chat-smile-2-line"></i></div>
                    <h3>Bắt đầu hỗ trợ người dùng</h3>
                    <p>Chọn một đoạn hội thoại từ danh sách bên trái để xem chi tiết.</p>
                </div>
            </div>

            <!-- Khu vực nhập liệu -->
            <div class="chat-footer">


                <input type="text" id="message-input" placeholder="Nhập tin nhắn..." disabled>

                <button class="btn-send" id="btn-send" disabled>
                    <i class="ri-send-plane-fill"></i>
                </button>
            </div>
        </div>
    </div>
</main>


<?php require_once 'include/footer.php'; ?>