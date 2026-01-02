document.addEventListener("DOMContentLoaded", function () {
  // --- 1. XỬ LÝ BÌNH LUẬN (Frontend Only - Cần nâng cấp AJAX sau này) ---
  const sendBtn = document.getElementById("sendComment");
  if (sendBtn) {
    sendBtn.addEventListener("click", function () {
      const input = document.getElementById("commentInput");
      const list = document.getElementById("commentList");
      const count = document.getElementById("commentCount");

      const text = input.value.trim();
      if (text === "") {
        alert("Vui lòng nhập bình luận!");
        return;
      }

      // Ẩn dòng "Chưa có bình luận"
      if (list.classList.contains("no-comment")) {
        list.classList.remove("no-comment");
        list.innerHTML = "";
      }

      // Tạo phần tử bình luận mới
      const comment = document.createElement("div");
      comment.className = "comment-item";
      // Nên thêm tên người dùng hiện tại vào đây nếu đã đăng nhập
      comment.innerHTML = `<strong>Bạn:</strong> ${text}`;
      list.appendChild(comment);

      // Cập nhật số lượng
      count.textContent = list.querySelectorAll(".comment-item").length;

      // Xóa input
      input.value = "";

      // TODO: Ở đây cần thêm code AJAX (fetch/axios) để gửi nội dung về PHP lưu vào CSDL
      console.log("Cần viết thêm AJAX để lưu comment này xuống Database");
    });
  }

  // --- 2. SAO CHÉP LINK ---
  const copyBtn = document.getElementById("copyLink");
  if (copyBtn) {
    copyBtn.addEventListener("click", function (e) {
      e.preventDefault();
      navigator.clipboard.writeText(window.location.href);
      alert("Đã sao chép liên kết bài viết!");
    });
  }

  // --- 3. BẢN ĐỒ LEAFLET (Đã sửa để lấy dữ liệu động) ---
  const mapElement = document.getElementById("map");

  if (mapElement) {
    // Lấy dữ liệu từ thẻ div (data-lat, data-lng)
    // Nếu không có dữ liệu thì lấy mặc định (Hà Nội)
    const lat = parseFloat(mapElement.getAttribute("data-lat")) || 21.0285;
    const lng = parseFloat(mapElement.getAttribute("data-lng")) || 105.8542;
    const address =
      mapElement.getAttribute("data-address") || "Vị trí bài viết";

    // Khởi tạo bản đồ
    var map = L.map("map").setView([lat, lng], 14);

    // Thêm lớp bản đồ nền
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution: "© OpenStreetMap contributors",
    }).addTo(map);

    // Thêm marker
    L.marker([lat, lng])
      .addTo(map)
      .bindPopup(`<b>Khu vực:</b><br>${address}`)
      .openPopup();
  }
});
