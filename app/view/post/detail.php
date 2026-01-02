<!-- Link thư viện bản đồ Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- CSS riêng cho trang chi tiết -->
<link rel="stylesheet" href="<?php echo PUBLIC_URL; ?>/assets/css/detail.css" />

<div class="post-container">
    <!-- Nút quay lại -->
    <a href="index.php?page=home" class="formbold-btn" style="display:inline-block; margin-bottom:15px;">
        <i class="fa fa-arrow-left"></i> Quay lại
    </a>

    <!-- Tiêu đề bài viết -->
    <h2 class="post-title">
        <?php echo htmlspecialchars($post['title']); ?>
    </h2>

    <!-- Thông tin meta (Người đăng, ngày đăng, danh mục) -->
    <p class="post-meta">
        Đăng bởi: <b><?php echo htmlspecialchars($post['user_id'] ?? 'Ẩn danh'); ?></b> •
        <?php
            $date = $post['created_at'] ?? $post['found_date'] ?? null;
        echo $date ? date('d/m/Y', strtotime($date)) : 'N/A';
        ?> •
        <span class="category-tag"><?php echo htmlspecialchars($post['category_id'] ?? 'Tin tức'); ?></span>
    </p>

    <!-- Nội dung chính -->
    <div class="post-body">
        <!-- Hình ảnh bài viết -->
        <?php if (! empty($post['image_path'])): ?>
            <img
                src="<?php echo PUBLIC_URL; ?>/uploads/<?php echo htmlspecialchars($post['image_path']); ?>"
                alt="<?php echo htmlspecialchars($post['title']); ?>"
                class="post-image"
                onerror="this.src='<?php echo PUBLIC_URL; ?>/images/no-image.jpg'"
            />
        <?php else: ?>
            <img src="<?php echo PUBLIC_URL; ?>/images/no-image.jpg" alt="Không có ảnh" class="post-image" />
        <?php endif; ?>

        <!-- Mô tả chi tiết -->
        <div class="post-content">
            <br />
            <?php echo nl2br(htmlspecialchars($post['description'])); ?>
        </div>
    </div>

    <!-- Thông tin liên hệ & Khu vực -->
    <div class="post-info-section">
        <h3>Thông tin liên hệ</h3>
        <p>
            <strong>Số điện thoại:</strong>
            <a href="tel:<?php echo htmlspecialchars($post['contact_phone'] ?? ''); ?>">
                <?php echo htmlspecialchars($post['contact_phone'] ?? 'Không có'); ?>
            </a>
            <br />
            <strong>Email:</strong>
            <?php echo htmlspecialchars($post['contact_email'] ?? 'Không có'); ?>
        </p>

        <br />
        <h3>Khu vực:</h3>
        <span id="lostLocation">
            <i class="fa fa-map-marker-alt"></i>
            <?php echo htmlspecialchars($post['address'] ?? ''); ?>,<?php echo htmlspecialchars($post['city'] ?? ''); ?>
        </span>

        <!-- Bản đồ -->
        <div id="map" class="map"
             style="height: 300px; margin-top: 15px; border-radius: 8px;"
             data-lat="<?php echo htmlspecialchars($post['lat'] ?? '21.0285'); ?>"
             data-lng="<?php echo htmlspecialchars($post['lng'] ?? '105.8542'); ?>"
             data-address="<?php echo htmlspecialchars($post['address'] ?? 'Vị trí chưa xác định'); ?>">
        </div>
    </div>

    <!-- Chia sẻ -->
    <div class="share">
        🔗 Chia sẻ:
        <a href="#">Facebook</a> • <a href="#">Zalo</a> •
        <a href="#" id="copyLink">Sao chép liên kết</a>
    </div>

    <!-- Bình luận -->
    <div class="comment-section">
        <div class="comment-title">
            Bình luận (<span id="commentCount">0</span>)
        </div>
        <div id="commentList" class="no-comment">Chưa có bình luận nào</div>

        <textarea
            id="commentInput"
            class="comment-input"
            placeholder="Viết bình luận của bạn..."
        ></textarea>
        <button id="sendComment" class="comment-button">Gửi bình luận</button>
    </div>
</div>

<script>
    // Xử lý nút sao chép link
    document.getElementById("copyLink").addEventListener("click", function (e) {
        e.preventDefault();
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert("Đã sao chép liên kết bài viết!");
        }).catch(err => {
            console.error('Không thể sao chép: ', err);
        });
    });

    // Script Bản đồ Leaflet
    var mapElement = document.getElementById('map');
    if (mapElement) {
        var lat = mapElement.getAttribute('data-lat') || 21.0285;
        var lng = mapElement.getAttribute('data-lng') || 105.8542;
        var address = mapElement.getAttribute('data-address');

        var map = L.map('map').setView([lat, lng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
            .bindPopup(address)
            .openPopup();
    }
</script>