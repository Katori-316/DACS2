<?php
    // 1. Cấu hình
    $currentPage = 'categories';
    $pageTitle   = 'Quản lý Danh mục';

    // 2. Nhúng khung giao diện
    require_once 'include/header.php';
    require_once 'include/sidebar.php';

    // 3. MOCK DATA (Dữ liệu giả lập)
    $categories = [
        [
            'id'     => 1,
            'name'   => 'Giấy tờ tùy thân',
            'count'  => 5,
            'status' => 'active',
        ],
        [
            'id'     => 2,
            'name'   => 'Điện thoại',
            'count'  => 2,
            'status' => 'active',
        ],
        [
            'id'     => 3,
            'name'   => 'Cảnh báo lừa đảo',
            'count'  => 0,
            'status' => 'hidden',
        ],
        [
            'id'     => 4,
            'name'   => 'Ví tiền',
            'count'  => 2,
            'status' => 'active',
        ],
    ];
?>

<main class="main-content">
    <?php require_once 'include/topbar.php'; ?>

    <div class="dashboard-grid flex-col-gap">

        <div class="stats-row stats-grid-3">
            <div class="card metric-card">
                <div class="card-header"><h4>Tổng danh mục</h4><span class="status-dot green"></span></div>
                <div class="metric-value"><?php echo count($categories); ?></div>
            </div>
            <div class="card metric-card">
                <div class="card-header"><h4>Danh mục ẩn</h4><span class="status-dot yellow"></span></div>
                <div class="metric-value">1</div>
            </div>
            <div class="card metric-card">
                <div class="card-header"><h4>Tổng bài viết</h4><span class="status-dot blue"></span></div>
                <div class="metric-value">9</div>
            </div>
        </div>

        <!-- 2. Bảng danh sách -->
        <div class="card wide-card">
            <!-- Header có border dưới -->
            <div class="card-header card-header-bordered">
                <h3 class="no-margin">Danh sách Danh mục</h3>
                <div class="actions">
                    <button class="btn-sm" onclick="categoryAction('add')">
                        <i class="ri-add-line"></i> Thêm danh mục
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Số bài viết</th>
                            <th>Trạng thái</th>
                            <th class="text-right">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $cat): ?>
                        <tr id="cat-row-<?php echo $cat['id'] ?>">
                            <td>#<?php echo $cat['id'] ?></td>
                            <td>
                                <!-- Class .cat-name (đậm, size 15px) -->
                                <span class="cat-name"><?php echo $cat['name'] ?></span>
                            </td>
                            <td>
                                <!-- Class .badge-dark (nền tối) -->
                                <span class="badge badge-dark"><?php echo $cat['count'] ?> bài</span>
                            </td>
                            <td>
                                <?php if ($cat['status'] == 'active'): ?>
                                    <span class="status-dot green" title="Hiển thị"></span> Hiển thị
                                <?php else: ?>
                                    <span class="status-dot red" title="Đang ẩn"></span> Đang ẩn
                                <?php endif; ?>
                            </td>
                            <td class="text-right">
                                <!-- Nút Sửa -->
                                <button class="btn-icon btn-secondary" title="Sửa tên" onclick="categoryAction('edit',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <?php echo $cat['id'] ?>, '<?php echo $cat['name'] ?>')">
                                    <i class="ri-edit-line"></i>
                                </button>

                                <!-- Nút Ẩn/Hiện -->
                                <?php if ($cat['status'] == 'active'): ?>
                                    <button class="btn-icon btn-reject" title="Ẩn danh mục" onclick="categoryAction('hide',<?php echo $cat['id'] ?>)">
                                        <i class="ri-eye-off-line"></i>
                                    </button>
                                <?php else: ?>
                                    <button class="btn-icon btn-approve" title="Hiện danh mục" onclick="categoryAction('show',<?php echo $cat['id'] ?>)">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                <?php endif; ?>

                                <!-- Nút Xóa -->
                                <?php if ($cat['count'] == 0): ?>
                                    <!-- Class .btn-delete-soft (nền đỏ nhạt) -->
                                    <button class="btn-icon btn-delete-soft" title="Xóa" onclick="categoryAction('delete',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php echo $cat['id'] ?>)">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                <?php else: ?>
                                    <!-- Class .btn-disabled (mờ, không click được) -->
                                    <button class="btn-icon btn-disabled" title="Không thể xóa danh mục có bài viết">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Load JS xử lý danh mục -->

<?php require_once 'include/footer.php'; ?>