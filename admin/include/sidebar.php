<aside class="sidebar">
    <div class="brand">
        <div class="logo-icon">A-</div>
        <span>LoFo</span>
    </div>

    <nav class="menu">
        <div class="menu-label">Quản lý chung</div>

        <a href="index.php" class="menu-item                                                                                                                                                                                                                                                                                                                                                                                                             <?php echo($currentPage == 'p') ? 'active' : '' ?>">
            <i class="ri-dashboard-line"></i> Duyệt bài<span class="badge">12</span>
        </a>


        <a href="user.php" class="menu-item                                                                                                                                                                                                                                                                                                                                                                                                    <?php echo($currentPage == 'user') ? 'active' : '' ?>">
            <i class="ri-user-settings-line"></i> Quản lý người dùng
        </a>

        <a href="category.php" class="menu-item                                                                                                                                                                                                                                                                                                                                                                                                                                        <?php echo($currentPage == 'category') ? 'active' : '' ?>">
            <i class="ri-list-check"></i> Quản lý danh mục
        </a>

        <a href="chat.php" class="menu-item                                                                                                                                                                                                                                                                                                                                                                                                    <?php echo($currentPage == 'chat') ? 'active' : '' ?>">
            <i class="ri-chat-smile-3-line"></i> Tương tác với user
        </a>
         <a href="statistic.php" class="menu-item                                                                                                                                                                                                                                                                                                                                                                                                                                                          <?php echo($currentPage == 'statistic') ? 'active' : '' ?>">
            <i class="ri-article-line"></i> Thống kê
        </a>

    </nav>

    <div class="user-profile">
        <div class="avatar">TM</div>
        <div class="info">
            <span class="name">Trí Mẫn</span>
        </div>
            </div>
<!-- Ví dụ chèn vào cuối menu trong sidebar.php -->
<a href="logout.php" class="menu-item" >
    <i class="ri-logout-box-line"></i> Đăng xuất
</a>
</aside>