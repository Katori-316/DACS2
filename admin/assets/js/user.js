/**
 * XỬ LÝ HÀNH ĐỘNG USER
 * @param {string} action - 'ban', 'unban', 'delete'
 * @param {number} id - ID User
 */
function userAction(action, id) {
  // 1. KHÓA TÀI KHOẢN (BAN)
  if (action === "ban") {
    if (
      !confirm(
        `Bạn muốn KHÓA tài khoản #${id} không? Người này sẽ không thể đăng nhập.`
      )
    )
      return;

    console.log(`Đang gửi yêu cầu KHÓA user #${id}`);

    // [GỌI API KHÓA Ở ĐÂY]

    setTimeout(() => {
      notyfUser.error(`Đã khóa tài khoản #${id}`);
      // Reload lại trang hoặc dùng JS đổi icon sang ổ khóa mở (đơn giản nhất là reload)
      // location.reload();
    }, 500);
  }

  // 2. MỞ KHÓA (UNBAN)
  else if (action === "unban") {
    if (!confirm(`Mở khóa cho tài khoản #${id}?`)) return;

    console.log(`Đang mở khóa user #${id}`);

    // [GỌI API MỞ KHÓA Ở ĐÂY]

    setTimeout(() => {
      notyfUser.success(`Đã mở khóa tài khoản #${id}`);
      // location.reload();
    }, 500);
  }

  // 3. XÓA VĨNH VIỄN
  else if (action === "delete") {
    if (
      !confirm(
        `CẢNH BÁO: Bạn có chắc muốn XÓA VĨNH VIỄN user #${id}? Hành động này không thể hoàn tác!`
      )
    )
      return;

    console.log(`Đang xóa user #${id}`);

    // [GỌI API XÓA Ở ĐÂY]

    setTimeout(() => {
      notyfUser.success(`Đã xóa thành công user #${id}`);
      removeUserRow(id);
    }, 500);
  }
}

// Hàm xóa dòng User khỏi bảng (Hiệu ứng mờ dần)
function removeUserRow(id) {
  const row = document.getElementById(`user-row-${id}`);
  if (row) {
    row.style.transition = "all 0.5s ease";
    row.style.opacity = "0";
    row.style.transform = "translateX(20px)";
    setTimeout(() => row.remove(), 500);
  }
}
