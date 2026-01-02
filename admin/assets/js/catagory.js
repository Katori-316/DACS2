/**
 * XỬ LÝ DANH MỤC
 * @param {string} action - 'add', 'edit', 'delete', 'hide', 'show'
 * @param {number} id - ID danh mục
 * @param {string} currentName - Tên hiện tại (dùng cho edit)
 */
function categoryAction(action, id = 0, currentName = "") {
  // 1. THÊM MỚI
  if (action === "add") {
    let name = prompt("Nhập tên danh mục mới:");
    if (!name) return; // Nếu hủy hoặc để trống

    console.log("Thêm danh mục:", name);
    // [API THÊM MỚI Ở ĐÂY]

    setTimeout(() => {
      notyfCat.success(`Đã thêm danh mục: ${name}`);
      // location.reload(); // Reload để thấy mới
    }, 500);
  }

  // 2. SỬA TÊN
  else if (action === "edit") {
    let newName = prompt("Đổi tên danh mục:", currentName);
    if (!newName || newName === currentName) return;

    console.log(`Sửa danh mục #${id} thành: ${newName}`);
    // [API UPDATE Ở ĐÂY]

    setTimeout(() => {
      notyfCat.success(`Đã cập nhật tên thành công!`);
      // Cập nhật giao diện ngay lập tức (DOM)
      const row = document.getElementById(`cat-row-${id}`);
      if (row) row.querySelector(".cat-name").innerText = newName;
    }, 500);
  }

  // 3. ẨN / HIỆN
  else if (action === "hide" || action === "show") {
    // Không cần confirm cho thao tác nhanh này, hoặc tùy bạn
    let statusText = action === "hide" ? "Đã ẩn" : "Đã hiển thị";

    // [API ĐỔI TRẠNG THÁI]

    setTimeout(() => {
      notyfCat.success(`${statusText} danh mục #${id}`);
      // location.reload();
    }, 300);
  }

  // 4. XÓA (Chỉ cho xóa khi không có bài viết - đã check ở PHP)
  else if (action === "delete") {
    if (!confirm(`Bạn có chắc muốn XÓA danh mục #${id}?`)) return;

    console.log(`Xóa danh mục #${id}`);
    // [API XÓA]

    setTimeout(() => {
      notyfCat.success(`Đã xóa danh mục #${id}`);
      removeCatRow(id);
    }, 500);
  }
}

// Hàm xóa dòng UI
function removeCatRow(id) {
  const row = document.getElementById(`cat-row-${id}`);
  if (row) {
    row.style.transition = "all 0.5s ease";
    row.style.opacity = "0";
    row.style.transform = "translateX(20px)";
    setTimeout(() => row.remove(), 500);
  }
}
