<?php
                           // 1. Cấu hình
    $currentPage = 'user'; // Để sidebar active đúng chỗ
    $pageTitle   = 'Quản lý Người dùng';

    // 2. Nhúng khung giao diện
    require_once 'include/header.php';
    require_once 'include/sidebar.php';

    // 3. MOCK DATA (Dữ liệu giả lập)
    $user = [
        [
            'id'        => 1,
            'name'      => 'Yuri Gokerayn',
            'email'     => 'admin@lofo.vn',
            'role'      => 'Admin',
            'avatar'    => 'https://ui-avatars.com/api/?name=Yuri+Gokerayn&background=0D8ABC&color=fff',
            'status'    => 'active',
            'join_date' => '20/11/2023',
        ],
        [
            'id'        => 15,
            'name'      => 'Nguyen Van A',
            'email'     => 'vana.student@school.edu.vn',
            'role'      => 'Member',
            'avatar'    => 'https://ui-avatars.com/api/?name=Nguyen+Van+A&background=random',
            'status'    => 'active',
            'join_date' => '22/11/2023',
        ],
        [
            'id'        => 23,
            'name'      => 'Spammer 123',
            'email'     => 'spam@rac.com',
            'role'      => 'Member',
            'avatar'    => 'https://ui-avatars.com/api/?name=Spammer&background=random',
            'status'    => 'banned', // Tài khoản bị khóa
            'join_date' => '25/11/2023',
        ],
        [
            'id'        => 40,
            'name'      => 'Le Thi B',
            'email'     => 'thib@school.edu.vn',
            'role'      => 'Moderator',
            'avatar'    => 'https://ui-avatars.com/api/?name=Le+Thi+B&background=random',
            'status'    => 'active',
            'join_date' => '26/11/2023',
        ],
    ];
?>

<main class="main-content">
    <?php require_once 'include/topbar.php'; ?>

    <div class="dashboard-grid" style="display: flex; flex-direction: column; gap: 20px;">

        <!-- 1. Stats Row: Thống kê thành viên -->
        <div class="stats-row" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <div class="card metric-card">
                <div class="card-header"><h4>Tổng thành viên</h4><span class="status-dot green"></span></div>
                <div class="metric-value">8</div>
                <div class="sparkline green">+5 mới hôm nay</div>
            </div>

            <div class="card metric-card">
                <div class="card-header"><h4>Tài khoản bị khóa</h4><span class="status-dot red"></span></div>
                <div class="metric-value">4</div>
                <div class="sparkline red">Cần xem xét</div>
            </div>
        </div>

        <!-- 2. Bảng danh sách User -->
        <div class="card wide-card">
            <div class="card-header">
                <h3 style="margin:0;">Danh sách người dùng</h3>
                <div class="actions" >
                    <input type="text" placeholder="Tìm theo tên, email..." >
                </div>
            </div>

            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thành viên</th>
                            <th>Ngày tham gia</th>
                            <th>Trạng thái</th>
                            <th class="text-right">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $u): ?>
                        <tr id="user-row-<?php echo $u['id'] ?>">
                            <td>#<?php echo $u['id'] ?></td>
                            <td>
                                <div class="user-cell">
                                    <img src="<?php echo $u['avatar'] ?>" class="avatar-sm" alt="ava">
                                    <div>
                                        <div class="user-name"><?php echo $u['name'] ?></div>
                                        <div class="time-ago"                                                                                                                                                                                                                                                     <?php echo $u['email'] ?> </div>
                                    </div>
                                </div>
                            </td>

                            <td><?php echo $u['join_date'] ?></td>
                            <td>
                                <?php if ($u['status'] == 'active'): ?>
                                    <span class="status-dot green" title="Đang hoạt động"></span> Active
                                <?php else: ?>
                                    <span class="status-dot red" title="Bị khóa"></span> Banned
                                <?php endif; ?>
                            </td>
                            <td class="text-right">


                                <?php if ($u['status'] == 'active'): ?>
                                    <!-- Nút Khóa tài khoản -->
                                    <button class="btn-icon btn-reject" title="Khóa tài khoản" onclick="userAction('ban',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <?php echo $u['id'] ?>)">
                                        <i class="ri-lock-line"></i>
                                    </button>
                                <?php else: ?>
                                    <!-- Nút Mở khóa -->
                                    <button class="btn-icon btn-approve" title="Mở khóa" onclick="userAction('unban',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <?php echo $u['id'] ?>)">
                                        <i class="ri-lock-unlock-line"></i>
                                    </button>
                                <?php endif; ?>

                                <!-- Nút Xóa vĩnh viễn -->
                                <button class="btn-icon btn-reject"  title="Xóa vĩnh viễn" onclick="userAction('delete',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <?php echo $u['id'] ?>)">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
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