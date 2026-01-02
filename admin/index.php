<?php
    session_start(); // 1. Khởi động session

    // 2. Kiểm tra xem người dùng đã đăng nhập chưa
    // Nếu chưa có 'user_id' trong session -> Chưa đăng nhập
    if (! isset($_SESSION['user_id'])) {
        // Chuyển hướng về trang đăng nhập
        header('Location: login.php');
        exit(); // Dừng chạy code phía dưới
    }
    // 1. Cấu hình thông tin trang
    $currentPage = 'post';
    $pageTitle   = 'Duyệt bài';

    // 2. Nhúng các file khung giao diện
    require_once 'include/header.php';
    require_once 'include/sidebar.php';

    // 3. DỮ LIỆU GIẢ LẬP (Sau này thay bằng câu lệnh SQL: SELECT * FROM posts...)
    $posts = [
        [
            'id'       => 101,
            'author'   => 'Nguyễn Huệ Minh',
            'title'    => 'Mình nhặt được thẻ sinh viên tại nhà xe',
            'category' => 'Nhặt được',
            'time'     => '10 phút trước',
            'status'   => 'pending', // pending, approved, rejected
        ],
        [
            'id'       => 102,
            'author'   => 'Trần Thị Như Quỳnh',
            'title'    => 'Tìm chìa khóa xe Airblade màu đen',
            'category' => 'Cần tìm',
            'time'     => '1 giờ trước',
            'status'   => 'approved',
            'image'    => null,
        ],
        [
            'id'       => 103,
            'author'   => 'Lê Văn Dũng',
            'title'    => 'Nhặt được điện thoại Samsung tại thư viện',
            'category' => 'Nhặt được',
            'time'     => '2 giờ trước',
            'status'   => 'rejected',
        ],
        [
            'id'       => 104,
            'author'   => 'Phạm Quỳnh Phương',
            'title'    => 'Nhặt được ví Sen tại canteen',
            'category' => 'Nhặt được',
            'time'     => '3 giờ trước',
            'status'   => 'pending',
        ],
    ];
?>

<main class="main-content">

    <?php require_once 'include/topbar.php'; ?>

    <div class="dashboard-grid" style="display: flex; flex-direction: column; gap: 20px;">

        <div class="stats-row" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <div class="card metric-card">
                <div class="card-header"><h4>Chờ duyệt</h4><span class="status-dot yellow"></span></div>
                <div class="metric-value">12</div>
            </div>
            <div class="card metric-card">
                <div class="card-header"><h4>Đã duyệt hôm nay</h4><span class="status-dot green"></span></div>
                <div class="metric-value">5</div>
            </div>
            <div class="card metric-card">
                <div class="card-header"><h4>Bị từ chối</h4><span class="status-dot red"></span></div>
                <div class="metric-value">3</div>
            </div>
        </div>

        <div class="card wide-card">
            <div class="card-header" style="border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom: 0;">
                <h3 style="margin:0;">Danh sách bài viết</h3>

                <div class="filter-tabs">
                    <button class="tab-btn active">Tất cả</button>
                    <button class="tab-btn">Chờ duyệt</button>
                    <button class="tab-btn">Đã duyệt</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người đăng</th>
                            <th>Tiêu đề</th>
                            <th>Loại bài</th>
                            <th>Trạng thái</th>
                            <th class="text-right">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                        <tr>
                            <td>#<?php echo $post['id'] ?></td>
                            <td>
                                <div class="user-cell">
                                    <div>
                                        <div class="user-name"><?php echo $post['author'] ?></div>
                                        <div class="time-ago"><?php echo $post['time'] ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="content-cell">

                                    <span><?php echo $post['title'] ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="category-tag"><?php echo $post['category'] ?></span>
                            </td>
                            <td>
                                <?php
                                    // Logic hiển thị Badge màu sắc
                                    $badgeClass = '';
                                    $statusText = '';
                                    switch ($post['status']) {
                                        case 'pending':$badgeClass = 'warning';
                                            $statusText                = 'Chờ duyệt';
                                            break;
                                        case 'approved':$badgeClass = 'success';
                                            $statusText                 = 'Hiển thị';
                                            break;
                                        case 'rejected':$badgeClass = 'danger';
                                            $statusText                 = 'Từ chối';
                                            break;
                                    }
                                ?>
                                <span class="badge badge-<?php echo $badgeClass ?>"><?php echo $statusText ?></span>
                            </td>
                            <td class="text-right">
    <?php if ($post['status'] == 'pending'): ?>
        <button class="btn-icon btn-approve" title="Duyệt bài" onclick="confirmAction('approve',<?php echo $post['id'] ?>)">
            <i class="ri-check-line"></i>
        </button>

        <button class="btn-icon btn-reject" title="Từ chối" onclick="confirmAction('reject',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo $post['id'] ?>)">
            <i class="ri-close-line"></i>
        </button>
    <?php endif; ?>
    </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination-area">
                <div class="pagination-buttons">
                    <button class="btn-page"><i class="ri-arrow-left-s-line"></i></button>
                    <button class="btn-page active">1</button>
                    <button class="btn-page">2</button>
                    <button class="btn-page">...</button>
                    <button class="btn-page"><i class="ri-arrow-right-s-line"></i></button>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require_once 'include/footer.php'; ?>