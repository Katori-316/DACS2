/**
 * HÀM XỬ LÝ HÀNH ĐỘNG DUYỆT / TỪ CHỐI
 * @param {string} action - 'approve' hoặc 'reject'
 * @param {number} id - ID của bài viết
 */
function confirmAction(action, id) {
  // ---------------------------------------------------------
  // TRƯỜNG HỢP 1: DUYỆT BÀI
  // ---------------------------------------------------------
  if (action === "approve") {
    // Bước 1: Xác nhận phía Client (Có thể bỏ nếu muốn duyệt nhanh)
    if (!confirm("Bạn có chắc chắn muốn DUYỆT bài viết #" + id + "?")) {
      return; // Nếu user bấm Hủy thì dừng lại
    }

    // ========================================================
    // [KHU VỰC XỬ LÝ LOGIC DỮ LIỆU / SERVER]
    // Tại đây bạn sẽ gọi AJAX gửi lên PHP
    // Ví dụ: fetch('api/approve_post.php?id=' + id)...
    // ========================================================
    console.log(`Đang gửi yêu cầu DUYỆT bài #${id} lên server...`);

    // Giả lập thành công (Sau này code server trả về OK thì mới chạy đoạn này)
    setTimeout(() => {
      // 1. Hiển thị thông báo thành công
      notyf.success(`Đã duyệt bài viết #${id} thành công!`);

      // 2. Cập nhật giao diện (Xóa dòng đó đi hoặc đổi trạng thái)
      removeRowFromTable(id);
    }, 500); // Giả lập độ trễ mạng 0.5s
  }

  // ---------------------------------------------------------
  // TRƯỜNG HỢP 2: TỪ CHỐI / XÓA BÀI
  // ---------------------------------------------------------
  else {
    // Bước 1: Xác nhận hành động (Đã bỏ nhập lý do)
    if (!confirm("Bạn có chắc chắn muốn TỪ CHỐI bài viết #" + id + " không?")) {
      return;
    }

    // ========================================================
    // [KHU VỰC XỬ LÝ LOGIC DỮ LIỆU / SERVER]
    // Gửi ID lên PHP (Không cần gửi reason nữa)
    // Ví dụ: $.post('api/reject.php', {id: id})...
    // ========================================================
    console.log(`Đang gửi yêu cầu TỪ CHỐI bài #${id}`);

    // Giả lập thành công
    setTimeout(() => {
      // 1. Hiển thị thông báo lỗi (dùng type error cho màu đỏ)
      notyf.error(`Đã từ chối bài viết #${id}`);

      // 2. Cập nhật giao diện
      removeRowFromTable(id);
    }, 500);
  }
}

/**
 * HÀM HỖ TRỢ: Xóa dòng khỏi bảng HTML sau khi xử lý xong
 * Để hàm này chạy, thẻ <tr> trong PHP cần có id="post-row-{id}"
 */
function removeRowFromTable(id) {
  // Tìm dòng tương ứng trong bảng
  // Lưu ý: Trong file PHP, thẻ <tr> bạn nên sửa thành: <tr id="row-<?php echo $post['id'] ?>">
  const row = document.getElementById(`row-${id}`); // Giả sử bạn đặt ID cho thẻ tr là row-101

  if (row) {
    // Hiệu ứng mờ dần trước khi xóa
    row.style.transition = "all 0.5s ease";
    row.style.opacity = "0";
    row.style.transform = "translateX(20px)";

    setTimeout(() => {
      row.remove();
      // Cập nhật lại số lượng trên UI nếu cần
    }, 500);
  } else {
    console.warn(
      "Không tìm thấy dòng để xóa trên giao diện. Hãy thêm id='row-" +
        id +
        "' vào thẻ <tr> trong PHP."
    );
  }
}
