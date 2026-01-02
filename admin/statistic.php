<?php
    // Khai báo tên trang để Sidebar biết đường active
    $currentPage = 'dashboard';
    $pageTitle   = 'Thống kê ';

    // 1. Nhúng Header và Sidebar
    require_once 'include/header.php';
    require_once 'include/sidebar.php';
?>

<main class="main-content">

    <?php require_once 'include/topbar.php'; ?>
<button class="btn-secondary">Xuất File</button>
     <div id="content-area" class="dashboard-grid">

                <div class="card wide-card">

                    <div class="card-header">
                        <h3>Thống kê bài viết</h3>

                        <div class="custom-select-wrapper">

                            <select id="time-filter" class="custom-select" onchange="app.handleFilter(this.value)">
                                <option value="today">Hôm nay</option>
                                <option value="week" selected>Tuần này</option>
                                <option value="month">Tháng này</option>
                                <option value="year">Năm nay</option>
                            </select>
                            <i class="ri-arrow-down-s-line select-arrow"></i>
                        </div>
                    </div>

                    <div class="chart-container">
                        <div class="pie-chart-wrapper">
                            <div class="pie-chart">
                                <div class="pie-center">
                                    <div class="total-count">21</div>
                                    <div class="total-label">Tổng bài viết</div>
                                </div>
                            </div>

                            <div class="chart-legend">
                                <div class="legend-item">
                                    <span class="legend-color" style="background-color: #4ecdc4;"></span>
                                    <span class="legend-text">Bài tìm đồ (5)</span>
                                    <span class="legend-percent">23%</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-color" style="background-color: #ffd166;"></span>
                                    <span class="legend-text">Bài nhặt đồ (4)</span>
                                    <span class="legend-percent">20%</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-color" style="background-color: #ff6b6b;"></span>
                                    <span class="legend-text">Chờ xử lý (12)</span>
                                    <span class="legend-percent">57%</span>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="right-column">
                    <div class="card metric-card">
                        <div class="card-header">
                            <h4>Bài viết chờ duyệt</h4>
                            <span class="status-dot red"></span>
                        </div>
                        <div class="metric-value">12</div>
                        <div class="sparkline green">+30%</div>
                    </div>
                    <div class="card metric-card">
                        <div class="card-header">
                            <h4>Người dùng mới</h4>
                            <span class="status-dot yellow"></span>
                        </div>
                        <div class="metric-value">8</div>
                        <div class="sparkline green">+56%</div>
                    </div>
                    <div class="card metric-card">
                        <div class="card-header">
                            <h4>Báo cáo vi phạm</h4>
                            <span class="status-dot green"></span>
                        </div>
                        <div class="metric-value">3</div>
                        <div class="sparkline red">+8%</div>
                    </div>
                </div>
            </div>
</main>

<?php
    // 4. Nhúng Footer
require_once 'include/footer.php';
?>