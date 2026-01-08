document.addEventListener("DOMContentLoaded", function () {
  // 1. Tìm ô input search (đảm bảo input của bạn có name="keyword")
  const searchInput = document.querySelector('input[name="keyword"]');

  if (searchInput) {
    searchInput.addEventListener("keypress", function (e) {
      // 2. Bắt sự kiện phím Enter
      if (e.key === "Enter") {
        e.preventDefault(); // Chặn việc submit form mặc định (để tránh reload sai)

        const keyword = this.value.trim();

        if (keyword === "") {
          alert("Vui lòng nhập từ khóa tìm kiếm");
          return;
        }

        // 3. CHUYỂN HƯỚNG SANG TRANG TÌM KIẾM (PHP xử lý)
        // Lưu ý: Phải thêm "&keyword=" để PHP nhận được $_GET['keyword']
        window.location.href = `index.php?page=search&keyword=${encodeURIComponent(
          keyword
        )}`;
      }
    });
  }
});
